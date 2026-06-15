<?php

namespace App\Controllers;

use App\Models\AuditLogModel;
use App\Models\DepartmentModel;
use App\Models\RoleModel;
use App\Models\UserModel;

class DashboardController extends BaseController
{
    public function index()
    {
        $divisionStats = (new UserModel())
            ->select('departments.name AS name, COUNT(users.id) AS total')
            ->join('departments', 'departments.id = users.department_id', 'left')
            ->groupBy('departments.id, departments.name')
            ->orderBy('total', 'DESC')
            ->findAll();

        return view('dashboard/index', [
            'title'         => 'Dashboard',
            'active'        => 'dashboard',
            'totalUsers'    => (new UserModel())->countAllResults(),
            'activeUsers'   => (new UserModel())->where('status', 'active')->countAllResults(),
            'totalRoles'    => (new RoleModel())->countAllResults(),
            'departments'   => (new DepartmentModel())->countAllResults(),
            'recentLogs'    => (new AuditLogModel())->recent(),
            'divisionStats' => $divisionStats,
        ]);
    }
}
