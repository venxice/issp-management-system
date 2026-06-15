<?php

namespace App\Controllers\Employee;

use App\Controllers\BaseController;
use App\Models\AuditLogModel;
use App\Models\UserModel;

class DashboardController extends BaseController
{
    public function index()
    {
        $currentUserId = (int) session()->get('user_id');
        $userModel = new UserModel();
        $auditLogModel = new AuditLogModel();

        return view('frontend/employee/dashboard/index', [
            'title' => 'Employee Dashboard',
            'active' => 'dashboard',
            'currentUser' => $userModel->findWithRole($currentUserId),
            'myLogs' => $auditLogModel->where('user_id', $currentUserId)->orderBy('created_at', 'DESC')->findAll(10),
        ]);
    }
}
