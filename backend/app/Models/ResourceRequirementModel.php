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

    public function getgeneralSummary()
{
    return $this->select('strategic_category, year, SUM(total_cost) as total')
                ->groupBy('strategic_category, year')
                ->orderBy('strategic_category')
                ->findAll();
}

public function getfundSourceSummary()
{
    return $this->select('fund_source, year, SUM(total_cost) as total')
                ->groupBy('fund_source, year')
                ->orderBy('fund_source')
                ->findAll();
}

public function getstatementOfExpenditureSummary()
{
    return $this->select('expenditure_type, year, SUM(total_cost) as total')
                ->groupBy('expenditure_type, year')
                ->orderBy('expenditure_type')
                ->findAll();
}

public function getobjectOfExpenditureSummary()
{
    return $this->select('uacs_code, object_of_expenditure, year, SUM(total_cost) as total')
                ->groupBy('uacs_code, object_of_expenditure, year')
                ->orderBy('uacs_code')
                ->findAll();
}
}