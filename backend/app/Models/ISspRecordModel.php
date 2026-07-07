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
        'remarks',
    ];

    public function getRecentRecordsByUser(int $userId, int $limit = 10): array
    {
        return $this->select('issp_records.*, departments.name AS department_name')
            ->join('departments', 'departments.id = issp_records.department_id', 'left')
            ->where('issp_records.created_by', $userId)
            ->orderBy('COALESCE(issp_records.updated_at, issp_records.created_at)', 'DESC', false)
            ->limit($limit)
            ->findAll();
    }

    public function getRecentRecordsWithDetails(int $limit = 10): array
    {
        return $this->select('issp_records.*, departments.name AS department_name, users.name AS created_by_name')
            ->join('departments', 'departments.id = issp_records.department_id', 'left')
            ->join('users', 'users.id = issp_records.created_by', 'left')
            ->orderBy('COALESCE(issp_records.updated_at, issp_records.created_at)', 'DESC', false)
            ->limit($limit)
            ->findAll();
    }

    public function notDraftFilter()
    {
        return $this->where('issp_records.status IS NOT NULL')
            ->where('issp_records.status !=', '')
            ->where('issp_records.status !=', 'draft');
    }

    public function getRecentSubmittedRecords(int $limit = 10): array
    {
        return $this->select('issp_records.*, departments.name AS department_name, users.name AS created_by_name')
            ->join('departments', 'departments.id = issp_records.department_id', 'left')
            ->join('users', 'users.id = issp_records.created_by', 'left')
            ->notDraftFilter()
            ->orderBy('COALESCE(issp_records.updated_at, issp_records.created_at)', 'DESC', false)
            ->limit($limit)
            ->findAll();
    }

    public function getStatusSummary(): array
    {
        $row = $this->select("
            COALESCE(SUM(CASE WHEN status IN ('pending','endorsed','approved','rejected','returned','resubmitted') THEN budget ELSE 0 END), 0) AS total_budget,
            COALESCE(SUM(CASE WHEN status = 'pending' THEN 1 ELSE 0 END), 0) AS pending,
            COALESCE(SUM(CASE WHEN status = 'endorsed' THEN 1 ELSE 0 END), 0) AS endorsed,
            COALESCE(SUM(CASE WHEN status = 'approved' THEN 1 ELSE 0 END), 0) AS approved,
            COALESCE(SUM(CASE WHEN status = 'rejected' THEN 1 ELSE 0 END), 0) AS rejected,
            COALESCE(SUM(CASE WHEN status = 'returned' THEN 1 ELSE 0 END), 0) AS returned,
            COALESCE(SUM(CASE WHEN status = 'resubmitted' THEN 1 ELSE 0 END), 0) AS resubmitted,
            COALESCE(SUM(CASE WHEN status IN ('pending','endorsed','approved','rejected','returned','resubmitted') THEN 1 ELSE 0 END), 0) AS total
        ")
            ->where('issp_records.status IS NOT NULL')
            ->where('issp_records.status !=', '')
            ->where('issp_records.status !=', 'draft')
            ->get()
            ->getRowArray();

        return $row ?: [
            'total_budget' => 0,
            'pending' => 0,
            'endorsed' => 0,
            'approved' => 0,
            'rejected' => 0,
            'returned' => 0,
            'resubmitted' => 0,
            'total' => 0,
        ];
    }

    public function countSubmitted(): int
    {
        return $this->notDraftFilter()->countAllResults();
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
            ->notDraftFilter()
            ->get()
            ->getRowArray();

        return (float) ($result['budget'] ?? 0);
    }

    public function getSubmissionsByMonth(): array
    {
        return $this->select("DATE_FORMAT(created_at, '%Y-%m') AS month, COUNT(*) AS total")
            ->notDraftFilter()
            ->groupBy('month')
            ->orderBy('month', 'ASC')
            ->findAll();
    }

    public function getProjectsPerDivision(): array
    {
        return $this->select('departments.name AS name, COUNT(issp_records.id) AS total, COALESCE(SUM(issp_records.budget), 0) AS budget')
            ->join('departments', 'departments.id = issp_records.department_id', 'left')
            ->notDraftFilter()
            ->groupBy('departments.id, departments.name')
            ->orderBy('total', 'DESC')
            ->findAll();
    }
}
