<?php

namespace App\Controllers\IctPlanner;

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
            'description' => 'Viewed ICT Planner dashboard',
            'created_at' => date('Y-m-d H:i:s'),
        ]);

        $submittedProjects = $isspModel->countSubmitted();
        $totalConsolidates = $isspModel->countAllResults();
        $pendingConsolidation = $isspModel->countPending();
        $endorsedCount = $isspModel->countEndorsed();
        $totalProposedBudget = $isspModel->sumSubmittedBudget();
        $submissionsByMonth = $isspModel->getSubmissionsByMonth();
        $divisionData = $isspModel->getProjectsPerDivision();
        $recentProjects = $isspModel->getRecentSubmittedRecords(10);

        return view('frontend/ict_planner/dashboard/index', [
            'title' => 'ICT Planner Dashboard',
            'active' => 'dashboard',
            'currentUser' => $userModel->findWithRole($currentUserId),
            'submittedProjects' => $submittedProjects,
            'totalConsolidates' => $totalConsolidates,
            'pendingConsolidation' => $pendingConsolidation,
            'endorsedCount' => $endorsedCount,
            'totalProposedBudget' => $totalProposedBudget,
            'submissionsByMonth' => $submissionsByMonth,
            'divisionData' => $divisionData,
            'recentProjects' => $recentProjects,
        ]);
    }

    public function endorse(int $id)
    {
        $isspModel = new ISspRecordModel();
        $record = $isspModel->find($id);

        if ($record === null) {
            return redirect()->back()->with('error', 'Project not found.');
        }

        if ($record['status'] !== 'pending') {
            return redirect()->back()->with('error', 'Only pending projects can be endorsed.');
        }

        $isspModel->update($id, [
            'status' => 'endorsed',
            'updated_at' => date('Y-m-d H:i:s'),
        ]);

        (new AuditLogModel())->insert([
            'user_id' => (int) session()->get('user_id'),
            'action' => 'project.endorsed',
            'description' => 'Endorsed project #' . $id . ' (' . ($record['title'] ?? 'Untitled') . ') to Director General.',
            'created_at' => date('Y-m-d H:i:s'),
        ]);

        return redirect()->back()->with('success', 'Project endorsed to Director General for approval.');
    }
}
