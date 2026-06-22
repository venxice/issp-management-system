<?php

namespace App\Controllers\IctPlanner;

use App\Controllers\BaseController;
use App\Models\UserModel;

class DashboardController extends BaseController
{
    public function index()
    {
        $currentUserId = (int) session()->get('user_id');
        $userModel = new UserModel();

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
