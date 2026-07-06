<?php

namespace App\Controllers\DirectorGeneral;

use App\Controllers\BaseController;
use App\Models\UserModel;
use App\Models\AuditLogModel;
use App\Models\ISspRecordModel;

class DashboardController extends BaseController
{
    public function index()
    {
        $currentUserId = (int) session()->get('user_id');
        $userModel = new UserModel();
        $isspModel = new ISspRecordModel();

        (new AuditLogModel())->insert([
            'user_id' => $currentUserId,
            'action' => 'dashboard.viewed',
            'description' => 'Viewed Director General dashboard',
            'created_at' => date('Y-m-d H:i:s'),
        ]);

        $pendingApproval = $isspModel->where('status', 'endorsed')->countAllResults();
        $totalApprovedProjects = $isspModel->where('status', 'approved')->countAllResults();
        $totalProposedBudget = $isspModel->selectSum('budget')->whereIn('status', ['endorsed', 'approved', 'rejected'])->get()->getRowArray()['budget'] ?? 0;
        $totalDepartments = $isspModel->select('department_id')->distinct()->whereIn('status', ['endorsed', 'approved', 'rejected'])->countAllResults();

        $submissionsByMonth = $isspModel->getSubmissionsByMonth();
        $recentProjects = $isspModel->select('issp_records.*, departments.name AS department_name, users.name AS created_by_name')
            ->join('departments', 'departments.id = issp_records.department_id', 'left')
            ->join('users', 'users.id = issp_records.created_by', 'left')
            ->whereIn('issp_records.status', ['endorsed', 'returned'])
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

        $approvedCount = $isspModel->where('status', 'approved')->countAllResults();
        $pendingCount = $isspModel->where('status', 'endorsed')->countAllResults();
        $rejectedCount = $isspModel->where('status', 'rejected')->countAllResults();
        $returnedCount = $isspModel->where('status', 'returned')->countAllResults();

        return view('frontend/director_general/dashboard/index', [
            'title' => 'Director General Dashboard',
            'active' => 'dashboard',
            'currentUser' => $userModel->findWithRole($currentUserId),
            'pendingApproval' => $pendingApproval,
            'totalApprovedProjects' => $totalApprovedProjects,
            'totalProposedBudget' => (float) $totalProposedBudget,
            'totalDepartments' => $totalDepartments,
            'submissionsByMonth' => $submissionsByMonth,
            'recentProjects' => $recentProjects,
            'approvedCount' => $approvedCount,
            'pendingCount' => $pendingCount,
            'rejectedCount' => $rejectedCount,
            'returnedCount' => $returnedCount,
        ]);
    }

    public function approve(int $id)
    {
        $isspModel = new ISspRecordModel();
        $record = $isspModel->find($id);

        if ($record === null) {
            return redirect()->back()->with('error', 'Project not found.');
        }

        if ($record['status'] !== 'endorsed') {
            return redirect()->back()->with('error', 'Only endorsed projects can be approved.');
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

        if ($record['status'] !== 'endorsed') {
            return redirect()->back()->with('error', 'Only endorsed projects can be rejected.');
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

        if ($record['status'] !== 'endorsed') {
            return redirect()->back()->with('error', 'Only endorsed projects can be returned.');
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

        $html = view('frontend/ict_planner/consolidation/pdf_template', [
            'project' => $project,
            'formData' => $formData,
            'batchMode' => false,
        ]);

        $dompdf = new \Dompdf\Dompdf();
        $dompdf->loadHtml(mb_convert_encoding($html, 'HTML-ENTITIES', 'UTF-8'));
        $dompdf->setPaper('A4', 'landscape');
        $dompdf->render();
        $dompdf->stream('project-' . $id . '.pdf', ['Attachment' => 1]);
        exit;
    }
}
