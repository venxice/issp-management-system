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

    public function getRecentRecordsByUser(int $userId, int $limit = 10, ?int $year = null, ?int $month = null): array
    {
        $builder = $this->select('issp_records.*, departments.name AS department_name')
            ->join('departments', 'departments.id = issp_records.department_id', 'left')
            ->where('issp_records.created_by', $userId);

        if ($year !== null) {
            $builder->where('YEAR(COALESCE(issp_records.updated_at, issp_records.created_at))', $year);
        }
        if ($month !== null) {
            $builder->where('MONTH(COALESCE(issp_records.updated_at, issp_records.created_at))', $month);
        }

        return $builder
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

    public function getRecentSubmittedRecords(int $limit = 10, ?int $year = null, ?int $month = null): array
    {
        $builder = $this->select('issp_records.*, departments.name AS department_name, users.name AS created_by_name')
            ->join('departments', 'departments.id = issp_records.department_id', 'left')
            ->join('users', 'users.id = issp_records.created_by', 'left')
            ->notDraftFilter();

        if ($year !== null) {
            $builder->where('YEAR(COALESCE(issp_records.updated_at, issp_records.created_at))', $year);
        }
        if ($month !== null) {
            $builder->where('MONTH(COALESCE(issp_records.updated_at, issp_records.created_at))', $month);
        }

        return $builder
            ->orderBy('COALESCE(issp_records.updated_at, issp_records.created_at)', 'DESC', false)
            ->limit($limit)
            ->findAll();
    }

    public function getStatusSummary(?int $year = null, ?int $month = null): array
    {
        $builder = $this->select("status, budget, form_data")
            ->where('issp_records.status IS NOT NULL')
            ->where('issp_records.status !=', '')
            ->where('issp_records.status !=', 'draft');

        if ($year !== null) {
            $builder->where('YEAR(COALESCE(issp_records.updated_at, issp_records.created_at))', $year);
        }
        if ($month !== null) {
            $builder->where('MONTH(COALESCE(issp_records.updated_at, issp_records.created_at))', $month);
        }

        $rows = $builder->findAll();

        $stats = [
            'total_budget' => 0,
            'pending' => 0,
            'endorsed' => 0,
            'approved' => 0,
            'rejected' => 0,
            'returned' => 0,
            'resubmitted' => 0,
            'total' => 0,
        ];

        foreach ($rows as $r) {
            $status = $r['status'] ?? '';
            if (!isset($stats[$status])) continue;

            $stats[$status]++;
            $stats['total']++;

            $fd = !empty($r['form_data']) ? json_decode($r['form_data'], true) : [];
            $ict = $fd['ict-projects-form'] ?? [];
            $internal = (float) ($ict['internal_total_cost'] ?? $r['budget'] ?? 0);
            $cross = (float) ($ict['cross_total_cost'] ?? 0);
            $stats['total_budget'] += $internal + $cross;
        }

        return $stats;
    }

    public function getAvailableYears(): array
    {
        return $this->select("DISTINCT YEAR(COALESCE(updated_at, created_at)) AS year")
            ->where('status IS NOT NULL')
            ->where('status !=', '')
            ->where('status !=', 'draft')
            ->orderBy('year', 'DESC')
            ->findAll();
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

    public function getSubmissionsByMonth(?int $year = null, ?int $month = null): array
    {
        $builder = $this->select("DATE_FORMAT(COALESCE(issp_records.updated_at, issp_records.created_at), '%Y-%m') AS month, COUNT(*) AS total")
            ->notDraftFilter();

        if ($year !== null) {
            $builder->where('YEAR(COALESCE(issp_records.updated_at, issp_records.created_at))', $year);
        }
        if ($month !== null) {
            $builder->where('MONTH(COALESCE(issp_records.updated_at, issp_records.created_at))', $month);
        }

        return $builder
            ->groupBy('month')
            ->orderBy('month', 'ASC')
            ->findAll();
    }

    public function getSubmissionsByMonthPerDivision(?int $year = null, ?int $month = null): array
    {
        $builder = $this->select("DATE_FORMAT(COALESCE(issp_records.updated_at, issp_records.created_at), '%m') AS month_num, departments.name AS division, COUNT(issp_records.id) AS total")
            ->join('departments', 'departments.id = issp_records.department_id', 'left')
            ->notDraftFilter();

        if ($year !== null) {
            $builder->where('YEAR(COALESCE(issp_records.updated_at, issp_records.created_at))', $year);
        }
        if ($month !== null) {
            $builder->where('MONTH(COALESCE(issp_records.updated_at, issp_records.created_at))', $month);
        }

        return $builder
            ->groupBy('month_num, departments.id, departments.name')
            ->orderBy('month_num', 'ASC')
            ->findAll();
    }

    public function getProjectsPerDivision(?int $year = null, ?int $month = null): array
    {
        $builder = $this->select('departments.name AS name, COUNT(issp_records.id) AS total, COALESCE(SUM(issp_records.budget), 0) AS budget')
            ->join('departments', 'departments.id = issp_records.department_id', 'left')
            ->notDraftFilter();

        if ($year !== null) {
            $builder->where('YEAR(COALESCE(issp_records.updated_at, issp_records.created_at))', $year);
        }
        if ($month !== null) {
            $builder->where('MONTH(COALESCE(issp_records.updated_at, issp_records.created_at))', $month);
        }

        return $builder
            ->groupBy('departments.id, departments.name')
            ->orderBy('total', 'DESC')
            ->findAll();
    }
}
