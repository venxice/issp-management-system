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

    public function getRecentSubmittedRecords(int $limit = 10): array
    {
        return $this->select('issp_records.*, departments.name AS department_name, users.name AS created_by_name')
            ->join('departments', 'departments.id = issp_records.department_id', 'left')
            ->join('users', 'users.id = issp_records.created_by', 'left')
            ->where('issp_records.status !=', 'draft')
            ->orderBy('issp_records.created_at', 'DESC')
            ->limit($limit)
            ->findAll();
    }

    public function countSubmitted(): int
    {
        return $this->where('status !=', 'draft')->countAllResults();
    }

    public function countPending(): int
    {
        return $this->where('status', 'pending')->countAllResults();
    }

    public function countEndorsed(): int
    {
        return $this->where('status', 'endorsed')->countAllResults();
    }

    public function sumSubmittedBudget(): float
    {
        $result = $this->selectSum('budget')
            ->where('status !=', 'draft')
            ->get()
            ->getRowArray();

        return (float) ($result['budget'] ?? 0);
    }

    public function getSubmissionsByMonth(): array
    {
        return $this->select("DATE_FORMAT(created_at, '%Y-%m') AS month, COUNT(*) AS total")
            ->where('status !=', 'draft')
            ->groupBy('month')
            ->orderBy('month', 'ASC')
            ->findAll();
    }

    public function getProjectsPerDivision(): array
    {
        return $this->select('departments.name AS name, COUNT(issp_records.id) AS total, COALESCE(SUM(issp_records.budget), 0) AS budget')
            ->join('departments', 'departments.id = issp_records.department_id', 'left')
            ->where('issp_records.status !=', 'draft')
            ->groupBy('departments.id, departments.name')
            ->orderBy('total', 'DESC')
            ->findAll();
    }
}
