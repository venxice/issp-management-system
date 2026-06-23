<?php

namespace App\Models;

use CodeIgniter\Model;

class ISspRecordModel extends Model
{
    protected $table = 'resource_requirements';
    protected $primaryKey = 'id';
    protected $returnType = 'array';
    protected $useTimestamps = true;
    protected $allowedFields = [
        'year'
        'strategic_category'
        'item'
        'office_location'
        'fund_source'
        'unit_cost'
        'physical_target'
        'total_cost'
        'expenditure_type'
        'object_of_expenditure'
        'uacs_code'
        'remarks'
        'created_by'
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
}