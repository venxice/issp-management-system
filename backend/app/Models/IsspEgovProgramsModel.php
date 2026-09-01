<?php
namespace App\Models;

use CodeIgniter\Model;

class IsspEgovProgramsModel extends Model
{
    protected $table = 'issp_egov_programs';
    protected $primaryKey = 'id';
    protected $returnType = 'array';

    protected $allowedFields = [
        'id',
        'issp_id',
        'program_name',
        'description',
        'status',
        'created_at'
    ];
}