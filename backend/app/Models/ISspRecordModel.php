<?php

namespace App\Models;

use CodeIgniter\Model;

class ISspRecordModel extends Model
{
    protected $table = 'issp_records';
    protected $primaryKey = 'id';
    protected $returnType = 'array';
    protected $useTimestamps = true;
    protected $allowedFields = [
        'title',
        'description',
        'department_id',
        'created_by',
        'status',
        'budget',
        'start_date',
        'end_date',
        'form_data',
    ];

    public function getRecentRecordsByUser(int $userId, int $limit = 10): array
    {
        return $this->select('issp_records.*, departments.name AS department_name')
            ->join('departments', 'departments.id = issp_records.department_id', 'left')
            ->where('issp_records.created_by', $userId)
            ->orderBy('issp_records.created_at', 'DESC')
            ->limit($limit)
            ->findAll();
    }

    public function getRecentRecordsWithDetails(int $limit = 10): array
    {
        return $this->select('issp_records.*, departments.name AS department_name, users.name AS created_by_name')
            ->join('departments', 'departments.id = issp_records.department_id', 'left')
            ->join('users', 'users.id = issp_records.created_by', 'left')
            ->orderBy('issp_records.created_at', 'DESC')
            ->limit($limit)
            ->findAll();
    }
}
