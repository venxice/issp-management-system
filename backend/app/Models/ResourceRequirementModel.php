<?php

namespace App\Models;

use CodeIgniter\Model;

class ResourceRequirementModel extends Model
{
    protected $table = 'resource_requirements';
    protected $primaryKey = 'id';
    protected $returnType = 'array';
    protected $useTimestamps = true;

    protected $allowedFields = [
        'issp_record_id',
        'year',
        'strategic_category',
        'item',
        'office',
        'fund_source',
        'unit_cost',
        'physical_target',
        'total_cost',
        'expenditure_type',
        'object_of_expenditure',
        'uacs_code',
        'remarks',
        'created_by',
    ];

    /**
     * Get requirements for a specific year/project.
     *
     * If no project ID is supplied, only legacy/unlinked records
     * with NULL issp_record_id are returned.
     */
    public function getByYear(int $year, ?int $isspRecordId = null)
    {
        $builder = $this->where('year', $year);

        if ($isspRecordId !== null) {
            $builder->where('issp_record_id', $isspRecordId);
        } else {
            $builder->where('issp_record_id IS NULL', null, false);
        }

        return $builder
            ->orderBy('strategic_category')
            ->findAll();
    }

       public function getYearStatus(int $isspRecordId): array
{
    $rows = $this->select('year, COUNT(*) AS record_count')
        ->where('issp_record_id', $isspRecordId)
        ->whereIn('year', [1, 2, 3])
        ->groupBy('year')
        ->findAll();

    $status = [
        1 => false,
        2 => false,
        3 => false,
    ];

    foreach ($rows as $row) {
        $year = (int) $row['year'];

        if (isset($status[$year])) {
            $status[$year] = ((int) $row['record_count'] > 0);
        }
    }

    return $status;
}

    /**
     * Get Year total for a specific project.
     */
    public function getYearTotal(int $year, ?int $isspRecordId = null)
    {
        $builder = $this->selectSum('total_cost')
            ->where('year', $year);

        if ($isspRecordId !== null) {
            $builder->where('issp_record_id', $isspRecordId);
        } else {
            $builder->where('issp_record_id IS NULL', null, false);
        }

        return $builder->first();
    }


    /**
     * General Summary
     */
    public function getGeneralSummary(?int $isspRecordId = null)
    {
        $where = '';

        if ($isspRecordId !== null) {
            $where = 'AND issp_record_id = ' . (int) $isspRecordId;
        } else {
            $where = 'AND issp_record_id IS NULL';
        }

        return $this->db->query("
            SELECT
                strategic_category,
                SUM(CASE WHEN year = 1 THEN total_cost ELSE 0 END) AS year1,
                SUM(CASE WHEN year = 2 THEN total_cost ELSE 0 END) AS year2,
                SUM(CASE WHEN year = 3 THEN total_cost ELSE 0 END) AS year3,
                SUM(total_cost) AS total
            FROM resource_requirements
            WHERE strategic_category IS NOT NULL
            $where
            GROUP BY strategic_category
            ORDER BY strategic_category
        ")->getResultArray();
    }

    /**
     * Fund Source Summary
     */
    public function getFundSourceSummary(?int $isspRecordId = null)
    {
        $where = '';

        if ($isspRecordId !== null) {
            $where = 'AND issp_record_id = ' . (int) $isspRecordId;
        } else {
            $where = 'AND issp_record_id IS NULL';
        }

        return $this->db->query("
            SELECT
                fund_source,
                SUM(CASE WHEN year = 1 THEN total_cost ELSE 0 END) AS year1,
                SUM(CASE WHEN year = 2 THEN total_cost ELSE 0 END) AS year2,
                SUM(CASE WHEN year = 3 THEN total_cost ELSE 0 END) AS year3,
                SUM(total_cost) AS total
            FROM resource_requirements
            WHERE fund_source IS NOT NULL
            $where
            GROUP BY fund_source
            ORDER BY fund_source
        ")->getResultArray();
    }

    /**
     * Statement of Expenditure Summary
     */
    public function getStatementOfExpenditureSummary(?int $isspRecordId = null)
    {
        $where = '';

        if ($isspRecordId !== null) {
            $where = 'AND issp_record_id = ' . (int) $isspRecordId;
        } else {
            $where = 'AND issp_record_id IS NULL';
        }

        return $this->db->query("
            SELECT
                expenditure_type,
                SUM(CASE WHEN year = 1 THEN total_cost ELSE 0 END) AS year1,
                SUM(CASE WHEN year = 2 THEN total_cost ELSE 0 END) AS year2,
                SUM(CASE WHEN year = 3 THEN total_cost ELSE 0 END) AS year3,
                SUM(total_cost) AS total
            FROM resource_requirements
            WHERE expenditure_type IS NOT NULL
            $where
            GROUP BY expenditure_type
            ORDER BY expenditure_type
        ")->getResultArray();
    }

    /**
     * Object of Expenditure Summary
     */
    public function getObjectOfExpenditureSummary(?int $isspRecordId = null)
    {
        $where = '';

        if ($isspRecordId !== null) {
            $where = 'AND issp_record_id = ' . (int) $isspRecordId;
        } else {
            $where = 'AND issp_record_id IS NULL';
        }

        return $this->db->query("
            SELECT
                uacs_code,
                object_of_expenditure,
                SUM(CASE WHEN year = 1 THEN total_cost ELSE 0 END) AS year1,
                SUM(CASE WHEN year = 2 THEN total_cost ELSE 0 END) AS year2,
                SUM(CASE WHEN year = 3 THEN total_cost ELSE 0 END) AS year3,
                SUM(total_cost) AS total
            FROM resource_requirements
            WHERE uacs_code IS NOT NULL
            $where
            GROUP BY uacs_code, object_of_expenditure
            ORDER BY uacs_code
        ")->getResultArray();
    }
}