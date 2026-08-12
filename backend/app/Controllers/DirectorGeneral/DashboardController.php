<?php

namespace App\Controllers\DirectorGeneral;

use App\Controllers\BaseController;
use App\Models\UserModel;
use App\Models\AuditLogModel;
use App\Models\ISspRecordModel;
use App\Models\ResourceRequirementModel;

class DashboardController extends BaseController
{
    public function index()
    {
        $currentUserId = (int) session()->get('user_id');
        $userModel = new UserModel();
        $isspModel = new ISspRecordModel();

        $year = $this->request->getGet('year') !== null ? (int) $this->request->getGet('year') : null;
        $month = $this->request->getGet('month') !== null ? (int) $this->request->getGet('month') : null;

        $dgBuilder = $isspModel->select("
            COALESCE(SUM(CASE WHEN status = 'endorsed' THEN 1 ELSE 0 END), 0) AS endorsed,
            COALESCE(SUM(CASE WHEN status = 'approved' THEN 1 ELSE 0 END), 0) AS approved,
            COALESCE(SUM(CASE WHEN status = 'rejected' THEN 1 ELSE 0 END), 0) AS rejected,
            COALESCE(SUM(CASE WHEN status = 'resubmitted' THEN 1 ELSE 0 END), 0) AS resubmitted
        ");

        if ($year !== null) {
            $dgBuilder->where('YEAR(COALESCE(issp_records.updated_at, issp_records.created_at))', $year);
        }
        if ($month !== null) {
            $dgBuilder->where('MONTH(COALESCE(issp_records.updated_at, issp_records.created_at))', $month);
        }

        $dgStats = $dgBuilder->get()->getRowArray();

        $pendingApproval = (int) ($dgStats['endorsed'] ?? 0);
        $totalApprovedProjects = (int) ($dgStats['approved'] ?? 0);

        $approvedBuilder = $isspModel->select('budget, form_data')
            ->where('status', 'approved');

        if ($year !== null) {
            $approvedBuilder->where('YEAR(COALESCE(issp_records.updated_at, issp_records.created_at))', $year);
        }
        if ($month !== null) {
            $approvedBuilder->where('MONTH(COALESCE(issp_records.updated_at, issp_records.created_at))', $month);
        }

        $approvedRecords = $approvedBuilder->findAll();
        $totalApprovedBudget = array_reduce($approvedRecords, function ($carry, $r) {
            $fd = !empty($r['form_data']) ? json_decode($r['form_data'], true) : [];
            $ict = $fd['ict-projects-form'] ?? [];
            $internal = (float) ($ict['internal_total_cost'] ?? $r['budget'] ?? 0);
            $cross = (float) ($ict['cross_total_cost'] ?? 0);
            return $carry + $internal + $cross;
        }, 0);

        $deptBuilder = $isspModel->select('department_id')->distinct()->whereIn('status', ['endorsed', 'approved', 'rejected']);
        if ($year !== null) {
            $deptBuilder->where('YEAR(COALESCE(issp_records.updated_at, issp_records.created_at))', $year);
        }
        if ($month !== null) {
            $deptBuilder->where('MONTH(COALESCE(issp_records.updated_at, issp_records.created_at))', $month);
        }
        $totalDepartments = $deptBuilder->countAllResults();

        $submissionsByMonth = $isspModel->getSubmissionsByMonth($year, $month);
        $submissionsByMonthPerDivision = $isspModel->getSubmissionsByMonthPerDivision($year, $month);

        $recentBuilder = $isspModel->select('issp_records.*, departments.name AS department_name, users.name AS created_by_name')
            ->join('departments', 'departments.id = issp_records.department_id', 'left')
            ->join('users', 'users.id = issp_records.created_by', 'left')
            ->whereIn('issp_records.status', ['endorsed', 'approved', 'rejected']);

        if ($year !== null) {
            $recentBuilder->where('YEAR(COALESCE(issp_records.updated_at, issp_records.created_at))', $year);
        }
        if ($month !== null) {
            $recentBuilder->where('MONTH(COALESCE(issp_records.updated_at, issp_records.created_at))', $month);
        }

        $recentProjects = $recentBuilder
            ->orderBy('COALESCE(issp_records.updated_at, issp_records.created_at)', 'DESC', false)
            ->limit(10)
            ->findAll();

        foreach ($recentProjects as &$project) {
            $formData = [];
            if (!empty($project['form_data'])) {
                $decoded = json_decode($project['form_data'], true);
                if (is_array($decoded)) {
                    $formData = $decoded;
                }
            }
            $project['cross_title'] = $formData['cross_agency_title'] ?? ($formData['cross_title'] ?? '');
            $project['int_title'] = $formData['project_title'] ?? ($formData['internal_title'] ?? $project['title']);
        }
        unset($project);

        $approvedCount = (int) ($dgStats['approved'] ?? 0);
        $pendingCount = (int) ($dgStats['endorsed'] ?? 0);
        $rejectedCount = (int) ($dgStats['rejected'] ?? 0);
        $resubmittedCount = (int) ($dgStats['resubmitted'] ?? 0);

        $availableYears = $isspModel->getAvailableYears();

        return view('frontend/director_general/dashboard/index', [
            'title' => 'Director General Dashboard',
            'active' => 'dashboard',
            'currentUser' => $userModel->findWithRole($currentUserId),
            'pendingApproval' => $pendingApproval,
            'totalApprovedProjects' => $totalApprovedProjects,
            'totalApprovedBudget' => $totalApprovedBudget,
            'totalDepartments' => $totalDepartments,
            'submissionsByMonth' => $submissionsByMonth,
            'submissionsByMonthPerDivision' => $submissionsByMonthPerDivision,
            'recentProjects' => $recentProjects,
            'approvedCount' => $approvedCount,
            'pendingCount' => $pendingCount,
            'rejectedCount' => $rejectedCount,
            'resubmittedCount' => $resubmittedCount,
            'selectedYear' => $year,
            'selectedMonth' => $month,
            'availableYears' => $availableYears,
        ]);
    }

    public function approve(int $id)
    {
        $isspModel = new ISspRecordModel();
        $record = $isspModel->find($id);

        if ($record === null) {
            return redirect()->back()->with('error', 'Project not found.');
        }

        if (!in_array($record['status'], ['endorsed', 'resubmitted'])) {
            return redirect()->back()->with('error', 'Only endorsed or resubmitted projects can be approved.');
        }

        $isspModel->update($id, [
            'status' => 'approved',
            'updated_at' => date('Y-m-d H:i:s'),
        ]);

        (new AuditLogModel())->insert([
            'user_id' => (int) session()->get('user_id'),
            'action' => 'project.approved',
            'description' => 'Approved project #' . $id . ' (' . ($record['title'] ?? 'Untitled') . ').',
            'created_at' => date('Y-m-d H:i:s'),
        ]);

        helper('notification');
        sendDGDecisionNotification($record, 'approved');

        return redirect()->back()->with('success', 'Project approved successfully.');
    }

    public function reject(int $id)
    {
        $isspModel = new ISspRecordModel();
        $record = $isspModel->find($id);

        if ($record === null) {
            return redirect()->back()->with('error', 'Project not found.');
        }

        if (!in_array($record['status'], ['endorsed', 'resubmitted'])) {
            return redirect()->back()->with('error', 'Only endorsed or resubmitted projects can be rejected.');
        }

        $isspModel->update($id, [
            'status' => 'rejected',
            'updated_at' => date('Y-m-d H:i:s'),
        ]);

        (new AuditLogModel())->insert([
            'user_id' => (int) session()->get('user_id'),
            'action' => 'project.rejected',
            'description' => 'Rejected project #' . $id . ' (' . ($record['title'] ?? 'Untitled') . ').',
            'created_at' => date('Y-m-d H:i:s'),
        ]);

        helper('notification');
        sendDGDecisionNotification($record, 'rejected');

        return redirect()->back()->with('success', 'Project rejected.');
    }

    public function return(int $id)
    {
        $isspModel = new ISspRecordModel();
        $record = $isspModel->find($id);

        if ($record === null) {
            return redirect()->back()->with('error', 'Project not found.');
        }

        if (!in_array($record['status'], ['endorsed', 'resubmitted'])) {
            return redirect()->back()->with('error', 'Only endorsed or resubmitted projects can be returned.');
        }

        $remarks = $this->request->getPost('remarks');
        if (empty(trim($remarks ?? ''))) {
            return redirect()->back()->with('error', 'Please provide remarks on why the project is being returned.');
        }

        $isspModel->update($id, [
            'status' => 'returned',
            'remarks' => $remarks,
            'updated_at' => date('Y-m-d H:i:s'),
        ]);

        (new AuditLogModel())->insert([
            'user_id' => (int) session()->get('user_id'),
            'action' => 'project.returned',
            'description' => 'Returned project #' . $id . ' (' . ($record['title'] ?? 'Untitled') . ') to submitter. Remarks: ' . $remarks,
            'created_at' => date('Y-m-d H:i:s'),
        ]);

        helper('notification');
        sendDGDecisionNotification($record, 'returned', $remarks);

        return redirect()->back()->with('success', 'Project returned to submitter successfully.');
    }

    public function viewFull(int $id)
    {
        $isspModel = new ISspRecordModel();
        $project = $isspModel
            ->select('issp_records.*, departments.name AS department_name, users.name AS created_by_name')
            ->join('departments', 'departments.id = issp_records.department_id', 'left')
            ->join('users', 'users.id = issp_records.created_by', 'left')
            ->where('issp_records.id', $id)
            ->first();

        if ($project === null) {
            return redirect()->to('director-general/dashboard')->with('error', 'Project not found.');
        }

        $formData = [];
        if (!empty($project['form_data'])) {
            $decoded = json_decode($project['form_data'], true);
            if (is_array($decoded)) {
                $formData = $decoded;
            }
        }

        return view('frontend/ict_planner/consolidation/view_full', [
            'title' => 'View Full Submission',
            'active' => 'dashboard',
            'project' => $project,
            'formData' => $formData,
        ]);
    }

    public function download(int $id)
    {
        $isspModel = new ISspRecordModel();
        $project = $isspModel
            ->select('issp_records.*, departments.name AS department_name, users.name AS created_by_name')
            ->join('departments', 'departments.id = issp_records.department_id', 'left')
            ->join('users', 'users.id = issp_records.created_by', 'left')
            ->where('issp_records.id', $id)
            ->first();

        if ($project === null) {
            return redirect()->to('director-general/dashboard')->with('error', 'Project not found.');
        }

        $formData = [];
        if (!empty($project['form_data'])) {
            $decoded = json_decode($project['form_data'], true);
            if (is_array($decoded)) {
                $formData = $decoded;
            }
        }

        $resourceModel = new ResourceRequirementModel();
        $resourceData = [
            'year1' => $resourceModel->getByYear(1),
            'year2' => $resourceModel->getByYear(2),
            'year3' => $resourceModel->getByYear(3),
            'generalSummary' => $resourceModel->getGeneralSummary(),
            'fundSource' => $resourceModel->getFundSourceSummary(),
            'statementOfExpenditure' => $resourceModel->getStatementOfExpenditureSummary(),
            'objectOfExpenditure' => $resourceModel->getObjectOfExpenditureSummary(),
        ];

        $agencyModel = new \App\Models\AgencyInformationModel();
        $agencyData = $agencyModel->orderBy('id', 'DESC')->first() ?? [];

        $viewData = [
            'project' => $project,
            'formData' => $formData,
            'resourceData' => $resourceData,
            'agencyData' => $agencyData,
            'batchMode' => false,
        ];

        $pageNumbers = $this->extractPageNumbers($viewData);

        $html = view('frontend/ict_planner/consolidation/pdf_template', array_merge($viewData, [
            'scanMode' => false,
            'pageNumbers' => $pageNumbers,
        ]));

        helper('pdf');

        $dompdf = run_with_retry(function () use ($html) {
            $dp = new \Dompdf\Dompdf();
            $dp->loadHtml(mb_convert_encoding($html, 'HTML-ENTITIES', 'UTF-8'));
            $dp->setPaper('A4', 'landscape');
            $dp->render();
            return $dp;
        });
        $fd = !empty($project['form_data']) ? json_decode($project['form_data'], true) : [];
        $ict = $fd['ict-projects-form'] ?? [];
        $title = $ict['internal_project_title'] ?? $project['title'] ?? 'submission';
        $filename = 'ISSP_' . preg_replace('/[^a-zA-Z0-9]/', '_', $title) . '_' . $id . '.pdf';
        $dompdf->stream($filename, ['Attachment' => 1]);
        exit;
    }

    private function extractPageNumbers(array $viewData): array
    {
        return [];
    }
    public function batchDownload()
    {
        $projectIds = $this->request->getPost('project_ids');
        if (empty($projectIds) || !is_array($projectIds)) {
            return redirect()->to('director-general/pending-approval')->with('error', 'No projects selected.');
        }

        $projectIds = array_map('intval', $projectIds);
        $isspModel = new ISspRecordModel();
        $resourceModel = new ResourceRequirementModel();
        $resourceData = [
            'year1' => $resourceModel->getByYear(1),
            'year2' => $resourceModel->getByYear(2),
            'year3' => $resourceModel->getByYear(3),
            'generalSummary' => $resourceModel->getGeneralSummary(),
            'fundSource' => $resourceModel->getFundSourceSummary(),
            'statementOfExpenditure' => $resourceModel->getStatementOfExpenditureSummary(),
            'objectOfExpenditure' => $resourceModel->getObjectOfExpenditureSummary(),
        ];

        $agencyModel = new \App\Models\AgencyInformationModel();
        $agencyData = $agencyModel->orderBy('id', 'DESC')->first() ?? [];

        $files = [];

        foreach ($projectIds as $id) {
            $project = $isspModel
                ->select('issp_records.*, departments.name AS department_name, users.name AS created_by_name')
                ->join('departments', 'departments.id = issp_records.department_id', 'left')
                ->join('users', 'users.id = issp_records.created_by', 'left')
                ->where('issp_records.id', $id)
                ->first();

            if ($project === null) continue;

            $formData = [];
            if (!empty($project['form_data'])) {
                $decoded = json_decode($project['form_data'], true);
                if (is_array($decoded)) {
                    $formData = $decoded;
                }
            }

            $viewData = [
                'project' => $project,
                'formData' => $formData,
                'resourceData' => $resourceData,
                'agencyData' => $agencyData,
                'batchMode' => true,
            ];

            $pageNumbers = $this->extractPageNumbers($viewData);

            $html = view('frontend/ict_planner/consolidation/pdf_template', array_merge($viewData, [
                'scanMode' => false,
                'pageNumbers' => $pageNumbers,
            ]));

            helper('pdf');

            $dompdf = run_with_retry(function () use ($html) {
                $dp = new \Dompdf\Dompdf();
                $dp->loadHtml(mb_convert_encoding($html, 'HTML-ENTITIES', 'UTF-8'));
                $dp->setPaper('A4', 'landscape');
                $dp->render();
                return $dp;
            });

            $safeTitle = preg_replace('/[^a-zA-Z0-9]/', '_', $project['title'] ?? 'submission');
            $filename = 'ISSP_' . $safeTitle . '_' . $id . '.pdf';
            $files[$filename] = $dompdf->output();
        }

        if (empty($files)) {
            return redirect()->to('director-general/pending-approval')->with('error', 'No valid projects found.');
        }

        if (count($files) === 1) {
            $name = array_key_first($files);
            header('Content-Type: application/pdf');
            header('Content-Disposition: attachment; filename="' . $name . '"');
            header('Content-Length: ' . strlen($files[$name]));
            echo $files[$name];
            exit;
        }

        $zipData = $this->buildZip($files);
        $zipName = 'ISSP_Batch_' . date('Ymd_His') . '.zip';
        header('Content-Type: application/zip');
        header('Content-Disposition: attachment; filename="' . $zipName . '"');
        header('Content-Length: ' . strlen($zipData));
        echo $zipData;
        exit;
    }

    private function buildZip(array $files): string
    {
        $centralDir = '';
        $localFiles = '';
        $offset = 0;

        foreach ($files as $name => $data) {
            $nameLen = strlen($name);
            $dataLen = strlen($data);
            $crc = crc32($data);

            $localHeader = pack('VvvvvvVVVv',
                0x04034b50,
                20,
                0,
                0,
                0,
                0,
                $crc,
                $dataLen,
                $dataLen,
                $nameLen
            ) . $name;

            $localFiles .= $localHeader . $data;

            $centralDir .= pack('VvvvvvvVVVVvvvvvVV',
                0x02014b50,
                20,
                20,
                0,
                0,
                0,
                0,
                $crc,
                $dataLen,
                $dataLen,
                $nameLen,
                0,
                0,
                0,
                0,
                0,
                $offset
            ) . $name;

            $offset += strlen($localHeader) + $dataLen;
        }

        $centralDirOffset = $offset;
        $centralDirSize = strlen($centralDir);
        $count = count($files);

        $eocd = pack('VvvvvVV',
            0x06054b50,
            0,
            0,
            $count,
            $count,
            $centralDirSize,
            $centralDirOffset,
            0
        );

        return $localFiles . $centralDir . $eocd;
    }
}
