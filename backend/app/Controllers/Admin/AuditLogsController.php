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
        $page = (int) ($this->request->getGet('page') ?? 1);
        $perPage = 25;

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

        $builder = $logs->select('logs.*, logs.page_url, logs.user_agent, logs.ip_address, logs.new_data, logs.contact_number, logs.position, users.name AS user_name, users.email AS user_email, roles.name AS role_name, departments.name AS department_name')
            ->join('users', 'users.id = logs.user_id', 'left')
            ->join('roles', 'roles.id = users.role_id', 'left')
            ->join('departments', 'departments.id = users.department_id', 'left')
            ->whereNotIn('logs.action', ['login', 'logout'])
            ->orderBy('logs.created_at', 'DESC');

        $total = $builder->countAllResults(false);
        $logsData = $builder->paginate($perPage, 'default', $page);

        $pager = $logs->pager;

        return view('frontend/admin/audit_logs/index', [
            'title' => 'Audit Logs',
            'active' => 'audit',
            'query' => $query,
            'date' => $date,
            'logs' => $logsData,
            'pager' => $pager,
            'total' => $total,
            'perPage' => $perPage,
            'currentPage' => $page,
        ]);
    }

    public function json($id = null)
    {
        $id = (int) $id;
        if ($id <= 0) {
            return $this->response->setStatusCode(400)->setJSON(['error' => 'Invalid id']);
        }

        $logs = new AuditLogModel();
        $log = $logs->select('logs.*, logs.page_url, logs.user_agent, logs.ip_address, logs.new_data, logs.contact_number, logs.position, users.name AS user_name, users.email AS user_email, roles.name AS role_name, departments.name AS department_name')
            ->join('users', 'users.id = logs.user_id', 'left')
            ->join('roles', 'roles.id = users.role_id', 'left')
            ->join('departments', 'departments.id = users.department_id', 'left')
            ->where('logs.id', $id)
            ->first();

        if (! $log) {
            return $this->response->setStatusCode(404)->setJSON(['error' => 'Log not found']);
        }

        $payload = [
            'id' => $log['id'] ?? '',
            'action' => $log['action'] ?? '',
            'description' => $log['description'] ?? '',
            'created_at' => $log['created_at'] ?? '',
            'user_name' => $log['user_name'] ?? '',
            'role_name' => $log['role_name'] ?? '',
            'user_email' => $log['user_email'] ?? '',
            'department_name' => $log['department_name'] ?? '',
            'page_url' => $log['page_url'] ?? '-',
            'user_agent' => $log['user_agent'] ?? '-',
            'ip_address' => $log['ip_address'] ?? '-',
            'contact_number' => $log['contact_number'] ?? '-',
            'position' => $log['position'] ?? '',
            'new_data' => $log['new_data'] ?? '-',
        ];

        return $this->response->setJSON($payload);
    }
}
