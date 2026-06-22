<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = 'users';
    protected $primaryKey = 'id';
    protected $returnType = 'array';
    protected $useTimestamps = true;
    protected $allowedFields = [
        'name',
        'first_name',
        'last_name',
        'middle_initial',
        'email',
        'password',
        'role_id',
        'department_id',
        'position_id',
        'status',
        'sso_provider',
        'sso_subject',
        'email_verified',
        'last_login_at',
    ];

    public function findByEmailWithRole(string $email): ?array
    {
        return $this->select('users.*, roles.name AS role_name, roles.slug AS role_slug, departments.name AS department_name, positions.name AS position_name')
            ->join('roles', 'roles.id = users.role_id', 'left')
            ->join('departments', 'departments.id = users.department_id', 'left')
            ->join('positions', 'positions.id = users.position_id', 'left')
            ->where('users.email', strtolower(trim($email)))
            ->first();
    }

    public function findWithRole(int $id): ?array
    {
        return $this->select('users.*, roles.name AS role_name, roles.slug AS role_slug, departments.name AS department_name, positions.name AS position_name')
            ->join('roles', 'roles.id = users.role_id', 'left')
            ->join('departments', 'departments.id = users.department_id', 'left')
            ->join('positions', 'positions.id = users.position_id', 'left')
            ->where('users.id', $id)
            ->first();
    }

    public function listWithRelationships(): array
    {
        return $this->select('users.*, roles.name AS role_name, roles.slug AS role_slug, departments.name AS department_name, positions.name AS position_name')
            ->join('roles', 'roles.id = users.role_id', 'left')
            ->join('departments', 'departments.id = users.department_id', 'left')
            ->join('positions', 'positions.id = users.position_id', 'left')
            ->orderBy('users.created_at', 'DESC')
            ->findAll();
    }
}
