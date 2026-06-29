<?php

namespace App\Controllers\IctPlanner;

use App\Controllers\BaseController;
use App\Models\UserModel;
use App\Models\AuditLogModel;

class DashboardController extends BaseController
{
    public function index()
    {
        $currentUserId = (int) session()->get('user_id');
        $userModel = new UserModel();

        (new AuditLogModel())->insert([
            'user_id' => $currentUserId,
            'action' => 'dashboard.viewed',
            'description' => 'Viewed ICT Planner dashboard',
            'created_at' => date('Y-m-d H:i:s'),
        ]);

        return view('frontend/ict_planner/dashboard/index', [
            'title' => 'ICT Planner Dashboard',
            'active' => 'dashboard',
            'currentUser' => $userModel->findWithRole($currentUserId),
            'submittedProjects' => 0, 
            'totalConsolidates' => 0,
            'pendingConsolidation' => 0, 
            'totalProposedBudget' => 0,
        ]);
    }
}
