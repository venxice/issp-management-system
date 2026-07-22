<?php

namespace App\Controllers\IctPlanner;

use App\Controllers\BaseController;
use App\Models\ISspRecordModel;
use App\Models\ResourceRequirementModel;
use App\Models\AgencyInformationModel;

class ConsolidationController extends BaseController
{
    public function index()
    {
        $query = trim((string) $this->request->getGet('q'));
        $dateRange = trim((string) $this->request->getGet('date_range'));
        $statusFilter = trim((string) $this->request->getGet('status'));
        $page = (int) ($this->request->getGet('page') ?? 1);
        $perPage = 25;

        $statusCounts = [
            'pending'     => (new ISspRecordModel())->where('status', 'pending')->countAllResults(),
            'endorsed'    => (new ISspRecordModel())->where('status', 'endorsed')->countAllResults(),
            'approved'    => (new ISspRecordModel())->where('status', 'approved')->countAllResults(),
            'rejected'    => (new ISspRecordModel())->where('status', 'rejected')->countAllResults(),
            'returned'    => (new ISspRecordModel())->where('status', 'returned')->countAllResults(),
            'resubmitted' => (new ISspRecordModel())->where('status', 'resubmitted')->countAllResults(),
        ];

        $isspModel = new ISspRecordModel();

        if ($query !== '') {
            $isspModel->groupStart()
                ->like('issp_records.title', $query)
                ->orLike('users.name', $query)
                ->orLike('departments.name', $query)
                ->groupEnd();
        }

        if ($dateRange !== '') {
            $dates = explode(' to ', $dateRange);
            if (count($dates) === 2) {
                $isspModel->where('issp_records.created_at >=', trim($dates[0]) . ' 00:00:00')
                    ->where('issp_records.created_at <=', trim($dates[1]) . ' 23:59:59');
            }
        }

        $builder = $isspModel
            ->select('issp_records.*, departments.name AS department_name, users.name AS created_by_name')
            ->join('departments', 'departments.id = issp_records.department_id', 'left')
            ->join('users', 'users.id = issp_records.created_by', 'left')
            ->notDraftFilter()
            ->orderBy('COALESCE(issp_records.updated_at, issp_records.created_at)', 'DESC', false);

        if ($statusFilter !== '' && in_array($statusFilter, ['pending', 'endorsed', 'approved', 'rejected', 'returned', 'resubmitted'])) {
            $builder->where('issp_records.status', $statusFilter);
        }

        $total = $builder->countAllResults(false);
        $projects = $builder->paginate($perPage, 'default', $page);
        $pager = $isspModel->pager;

        return view('frontend/ict_planner/consolidation/index', [
            'title' => 'Consolidation',
            'active' => 'consolidation',
            'projects' => $projects,
            'query' => $query,
            'date_range' => $dateRange,
            'statusFilter' => $statusFilter,
            'pager' => $pager,
            'total' => $total,
            'perPage' => $perPage,
            'currentPage' => $page,
            'statusCounts' => $statusCounts,
        ]);
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
            return redirect()->to('ict-planner/consolidation')->with('error', 'Project not found.');
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
            'active' => 'consolidation',
            'project' => $project,
            'formData' => $formData,
        ]);
    }

    private function loadProject(int $id): ?array
    {
        $isspModel = new ISspRecordModel();

        $project = $isspModel
            ->select('issp_records.*, departments.name AS department_name, users.name AS created_by_name')
            ->join('departments', 'departments.id = issp_records.department_id', 'left')
            ->join('users', 'users.id = issp_records.created_by', 'left')
            ->where('issp_records.id', $id)
            ->first();

        return $project ?: null;
    }

    private function extractFormData(array $project): array
    {
        $formData = [];
        if (!empty($project['form_data'])) {
            $decoded = json_decode($project['form_data'], true);
            if (is_array($decoded)) {
                $formData = $decoded;
            }
        }
        return $formData;
    }

    private function loadResourceData(): array
    {
        $resourceModel = new ResourceRequirementModel();
        return [
            'year1' => $resourceModel->getByYear(1),
            'year2' => $resourceModel->getByYear(2),
            'year3' => $resourceModel->getByYear(3),
            'generalSummary' => $resourceModel->getGeneralSummary(),
            'fundSource' => $resourceModel->getFundSourceSummary(),
            'statementOfExpenditure' => $resourceModel->getStatementOfExpenditureSummary(),
            'objectOfExpenditure' => $resourceModel->getObjectOfExpenditureSummary(),
        ];
    }

    private function loadAgencyData(): array
    {
        $model = new AgencyInformationModel();
        $record = $model->orderBy('id', 'DESC')->first();
        return $record ?? [];
    }

    public function download(int $id)
    {
        $project = $this->loadProject($id);

        if ($project === null) {
            return redirect()->to('ict-planner/consolidation')->with('error', 'Project not found.');
        }

        $formData = $this->extractFormData($project);
        $resourceData = $this->loadResourceData();
        $agencyData = $this->loadAgencyData();

        $html = view('frontend/ict_planner/consolidation/pdf_template', [
            'project' => $project,
            'formData' => $formData,
            'resourceData' => $resourceData,
            'agencyData' => $agencyData,
            'batchMode' => false,
        ]);

        $dompdf = new \Dompdf\Dompdf();
        $dompdf->loadHtml(mb_convert_encoding($html, 'HTML-ENTITIES', 'UTF-8'));
        $dompdf->setPaper('A4', 'landscape');
        $dompdf->render();

        $filename = 'ISSP_' . preg_replace('/[^a-zA-Z0-9]/', '_', $project['title'] ?? 'submission') . '_' . $id . '.pdf';

        $dompdf->stream($filename, ['Attachment' => true]);
        exit;
    }

    public function batchDownload()
    {
        $projectIds = $this->request->getPost('project_ids');
        if (empty($projectIds) || !is_array($projectIds)) {
            return redirect()->to('ict-planner/consolidation')->with('error', 'No projects selected.');
        }

        $projectIds = array_map('intval', $projectIds);
        $files = [];
        $resourceData = $this->loadResourceData();
        $agencyData = $this->loadAgencyData();

        foreach ($projectIds as $id) {
            $project = $this->loadProject($id);
            if ($project === null) continue;

            $formData = $this->extractFormData($project);

            $html = view('frontend/ict_planner/consolidation/pdf_template', [
                'project' => $project,
                'formData' => $formData,
                'resourceData' => $resourceData,
                'agencyData' => $agencyData,
                'batchMode' => true,
            ]);

            $dompdf = new \Dompdf\Dompdf();
            $dompdf->loadHtml(mb_convert_encoding($html, 'HTML-ENTITIES', 'UTF-8'));
            $dompdf->setPaper('A4', 'landscape');
            $dompdf->render();

            $safeTitle = preg_replace('/[^a-zA-Z0-9]/', '_', $project['title'] ?? 'submission');
            $filename = 'ISSP_' . $safeTitle . '_' . $id . '.pdf';
            $files[$filename] = $dompdf->output();
        }

        if (empty($files)) {
            return redirect()->to('ict-planner/consolidation')->with('error', 'No valid projects found.');
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
