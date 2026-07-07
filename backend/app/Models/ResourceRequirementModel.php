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
        'year',
        'strategic_category',
        'item',
        'office_location',
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

    public function getByYear(int $year)
    {
        return $this->where('year', $year)
        ->orderBy('strategic_category')
        ->findAll();
    }

       public function getYearTotal(int $year)
    {
        return $this->selectSum('total_cost')
                    ->where('year', $year)
                    ->first();
    }

public function getGeneralSummary()
{
    return $this->db->query("
        SELECT
            strategic_category,
            SUM(CASE WHEN year = 1 THEN total_cost ELSE 0 END) AS year1,
            SUM(CASE WHEN year = 2 THEN total_cost ELSE 0 END) AS year2,
            SUM(CASE WHEN year = 3 THEN total_cost ELSE 0 END) AS year3,
            SUM(total_cost) AS total
        FROM resource_requirements
        WHERE strategic_category IS NOT NULL
        GROUP BY strategic_category
        ORDER BY strategic_category
    ")->getResultArray();
}

public function getFundSourceSummary()
{
    return $this->db->query("
        SELECT
            fund_source,
            SUM(CASE WHEN year = 1 THEN total_cost ELSE 0 END) AS year1,
            SUM(CASE WHEN year = 2 THEN total_cost ELSE 0 END) AS year2,
            SUM(CASE WHEN year = 3 THEN total_cost ELSE 0 END) AS year3,
            SUM(total_cost) AS total
        FROM resource_requirements
        WHERE fund_source IS NOT NULL
        GROUP BY fund_source
        ORDER BY fund_source
    ")->getResultArray();
}

public function getStatementOfExpenditureSummary()
{
    return $this->db->query("
        SELECT
            expenditure_type,
            SUM(CASE WHEN year = 1 THEN total_cost ELSE 0 END) AS year1,
            SUM(CASE WHEN year = 2 THEN total_cost ELSE 0 END) AS year2,
            SUM(CASE WHEN year = 3 THEN total_cost ELSE 0 END) AS year3,
            SUM(total_cost) AS total
        FROM resource_requirements
        WHERE expenditure_type IS NOT NULL
        GROUP BY expenditure_type
        ORDER BY expenditure_type
    ")->getResultArray();
}

public function getObjectOfExpenditureSummary()
{
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
        GROUP BY uacs_code, object_of_expenditure
        ORDER BY uacs_code
    ")->getResultArray();
}
}