<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\AuditLogModel;
use App\Models\UserModel;

class DashboardController extends BaseController
{
    public function index()
    {
        $userModel = new UserModel();
        $auditLogModel = new AuditLogModel();

        $divisionStats = $userModel
            ->select('departments.name AS name, COUNT(users.id) AS total')
            ->join('departments', 'departments.id = users.department_id', 'left')
            ->groupBy('departments.id, departments.name')
            ->orderBy('total', 'DESC')
            ->findAll();

        return view('frontend/admin/dashboard/index', [
            'title'          => 'Admin Dashboard',
            'active'         => 'dashboard',
            'totalUsers'     => $userModel->countAllResults(),
            'activeUsers'    => (new UserModel())->where('status', 'active')->countAllResults(),
            'totalEmployees' => (new UserModel())
                ->join('roles', 'roles.id = users.role_id', 'left')
                ->where('roles.slug', 'employee')
                ->countAllResults(),
            'technicalStaff' => (new UserModel())
                ->join('roles', 'roles.id = users.role_id', 'left')
                ->groupStart()
                    ->where('roles.slug', 'employee')
                    ->orWhere('roles.slug', 'ict_planner')
                ->groupEnd()
                ->countAllResults(),
            'recentLogs'     => (new AuditLogModel())->select('logs.*, logs.page_url, logs.user_agent, logs.ip_address, logs.new_data, logs.contact_number, logs.position, users.name AS user_name, users.email AS user_email, roles.name AS role_name, departments.name AS department_name')
                ->join('users', 'users.id = logs.user_id', 'left')
                ->join('roles', 'roles.id = users.role_id', 'left')
                ->join('departments', 'departments.id = users.department_id', 'left')
                ->whereNotIn('logs.action', ['login', 'logout'])
                ->orderBy('logs.created_at', 'DESC')
                ->findAll(10),
            'divisionStats'  => $divisionStats,
        ]);
    }
}
