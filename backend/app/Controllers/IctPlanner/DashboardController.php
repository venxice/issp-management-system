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

        $stats = $isspModel->getStatusSummary();
        $submittedProjects = (int) $stats['total'];
        $totalConsolidates = $submittedProjects;
        $pendingConsolidation = (int) $stats['pending'] + (int) $stats['resubmitted'];
        $endorsedCount = (int) $stats['endorsed'] + (int) $stats['approved'] + (int) $stats['rejected'] + (int) $stats['returned'];
        $totalProposedBudget = (float) $stats['total_budget'];
        $submissionsByMonth = $isspModel->getSubmissionsByMonth();
        $divisionData = $isspModel->getProjectsPerDivision();
        $recentProjects = $isspModel->getRecentSubmittedRecords(50);

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
            'pendingCount' => (int) $stats['pending'],
            'approvedCount' => (int) $stats['approved'],
            'rejectedCount' => (int) $stats['rejected'],
            'returnedCount' => (int) $stats['returned'],
            'resubmittedCount' => (int) $stats['resubmitted'],
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

        helper('notification');

        $currentUser = (new UserModel())->findWithRole((int) session()->get('user_id'));

        $directorGenerals = (new UserModel())->getUsersByRole('director_general');

        foreach ($directorGenerals as $dg) {
            sendEndorsementNotification($record, $currentUser, $dg);
        }

        $employee = (new UserModel())->findWithRole((int) $record['created_by']);
        if ($employee && !empty($employee['email'])) {
            sendEndorsementToEmployeeNotification($record, $currentUser, $employee);
        }

        return redirect()->back()->with('success', 'Project endorsed to Director General for approval.');
    }
}
