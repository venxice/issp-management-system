<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\AuditLogModel;

class AuditLogsController extends BaseController
{
    public function index()
    {
        $query = trim((string) $this->request->getGet('q'));
        $date = trim((string) $this->request->getGet('date'));
        $logs = new AuditLogModel();

        if ($query !== '') {
            $logs->groupStart()
                ->like('logs.action', $query)
                ->orLike('logs.description', $query)
                ->orLike('users.name', $query)
                ->groupEnd();
        }

        if ($date !== '') {
            $logs->where('logs.created_at >=', $date . ' 00:00:00')
                ->where('logs.created_at <=', $date . ' 23:59:59');
        }

        return view('frontend/admin/audit_logs/index', [
            'title' => 'Audit Logs',
            'active' => 'audit',
            'query' => $query,
            'date' => $date,
            'logs' => $logs->select('logs.*, users.name AS user_name, users.email AS user_email, roles.name AS role_name, departments.name AS department_name')
                ->join('users', 'users.id = logs.user_id', 'left')
                ->join('roles', 'roles.id = users.role_id', 'left')
                ->join('departments', 'departments.id = users.department_id', 'left')
                ->orderBy('logs.created_at', 'DESC')
                ->findAll(25),
        ]);
    }
}
