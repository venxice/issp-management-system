<?php

namespace App\Models;

use CodeIgniter\Model;

class AuditLogModel extends Model
{
    protected $table = 'logs';
    protected $primaryKey = 'id';
    protected $returnType = 'array';
    protected $useTimestamps = false;
    protected $allowedFields = [
        'user_id',
        'action',
        'description',
        'created_at',
    ];

    public function recent(int $limit = 8): array
    {
        return $this->select('logs.*, users.name AS user_name, users.email AS user_email, roles.name AS role_name, departments.name AS department_name')
            ->join('users', 'users.id = logs.user_id', 'left')
            ->join('roles', 'roles.id = users.role_id', 'left')
            ->join('departments', 'departments.id = users.department_id', 'left')
            ->orderBy('logs.created_at', 'DESC')
            ->findAll($limit);
    }
}
