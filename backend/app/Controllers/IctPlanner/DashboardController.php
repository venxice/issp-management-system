<?php

namespace App\Controllers\IctPlanner;

use App\Controllers\BaseController;
use App\Models\AuditLogModel;
use App\Models\DepartmentModel;
use App\Models\UserModel;

class DashboardController extends BaseController
{
    public function index()
    {
        $currentUserId = (int) session()->get('user_id');
        $userModel = new UserModel();
        $auditLogModel = new AuditLogModel();

        return view('frontend/ict_planner/dashboard/index', [
            'title' => 'ICT Planner Dashboard',
            'active' => 'dashboard',
            'currentUser' => $userModel->findWithRole($currentUserId),
            'totalUsers' => $userModel->countAllResults(),
            'activeUsers' => (new UserModel())->where('status', 'active')->countAllResults(),
            'departments' => (new DepartmentModel())->countAllResults(),
            'recentLogs' => $auditLogModel->recent(8),
        ]);
    }
}
