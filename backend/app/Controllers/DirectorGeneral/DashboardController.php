<?php

namespace App\Controllers\DirectorGeneral;

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

        return view('frontend/director_general/dashboard/index', [
            'title' => 'Director General Dashboard',
            'active' => 'dashboard',
            'currentUser' => $userModel->findWithRole($currentUserId),
            'totalUsers' => $userModel->countAllResults(),
            'activeUsers' => (new UserModel())->where('status', 'active')->countAllResults(),
            'totalEmployees' => (new UserModel())
                ->join('roles', 'roles.id = users.role_id', 'left')
                ->where('roles.slug', 'employee')
                ->countAllResults(),
            'departments' => (new DepartmentModel())->countAllResults(),
            'recentLogs' => $auditLogModel->recent(8),
            'myLogs' => $auditLogModel->where('user_id', $currentUserId)->orderBy('created_at', 'DESC')->findAll(10),
        ]);
    }
}
