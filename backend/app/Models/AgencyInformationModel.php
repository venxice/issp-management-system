<?php

namespace App\Models;

use CodeIgniter\Model;

class AgencyInformationModel extends Model
{
    protected $table = 'agency_information';
    protected $primaryKey = 'id';
    protected $returnType = 'array';
    protected $useTimestamps = true;
    protected $allowedFields = [
        'created_by',
        'legal_basis',
        'function',
        'vision_statement',
        'mission_statement',
        'organizational_outcome',
        'cio_name',
        'cio_plantilla',
        'cio_unit',
        'cio_email',
        'cio_contact',
        'focal_name',
        'focal_position',
        'focal_unit',
        'focal_email',
        'focal_contact',
        'plantilla_it',
        'plantilla_non_it',
        'plantilla_male',
        'plantilla_female',
        'contractual_it',
        'contractual_non_it',
        'contractual_male',
        'contractual_female',
        'outsourced_it',
        'outsourced_non_it',
        'outsourced_male',
        'outsourced_female',
        'stakeholder_data',
    ];

    public function __construct()
    {
        parent::__construct();
        $this->ensureTable();
    }

    private function ensureTable(): void
    {
        $db = \Config\Database::connect();
        if (!$db->tableExists('agency_information')) {
            $db->query("CREATE TABLE IF NOT EXISTS `agency_information` (
                `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
                `created_by` INT(11) UNSIGNED NOT NULL,
                `legal_basis` TEXT NULL,
                `function` TEXT NULL,
                `vision_statement` TEXT NULL,
                `mission_statement` TEXT NULL,
                `organizational_outcome` TEXT NULL,
                `cio_name` VARCHAR(255) NULL,
                `cio_plantilla` VARCHAR(255) NULL,
                `cio_unit` VARCHAR(255) NULL,
                `cio_email` VARCHAR(255) NULL,
                `cio_contact` VARCHAR(255) NULL,
                `focal_name` VARCHAR(255) NULL,
                `focal_position` VARCHAR(255) NULL,
                `focal_unit` VARCHAR(255) NULL,
                `focal_email` VARCHAR(255) NULL,
                `focal_contact` VARCHAR(255) NULL,
                `plantilla_it` INT(11) NULL DEFAULT 0,
                `plantilla_non_it` INT(11) NULL DEFAULT 0,
                `plantilla_male` INT(11) NULL DEFAULT 0,
                `plantilla_female` INT(11) NULL DEFAULT 0,
                `contractual_it` INT(11) NULL DEFAULT 0,
                `contractual_non_it` INT(11) NULL DEFAULT 0,
                `contractual_male` INT(11) NULL DEFAULT 0,
                `contractual_female` INT(11) NULL DEFAULT 0,
                `outsourced_it` INT(11) NULL DEFAULT 0,
                `outsourced_non_it` INT(11) NULL DEFAULT 0,
                `outsourced_male` INT(11) NULL DEFAULT 0,
                `outsourced_female` INT(11) NULL DEFAULT 0,
                `stakeholder_data` LONGTEXT NULL,
                `created_at` DATETIME NULL,
                `updated_at` DATETIME NULL,
                PRIMARY KEY (`id`),
                UNIQUE KEY `created_by` (`created_by`)
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4");
        }
    }

    public function getByUser(int $userId): ?array
    {
        return $this->where('created_by', $userId)->first();
    }

    public function upsert(int $userId, array $data): void
    {
        $existing = $this->getByUser($userId);
        $data['created_by'] = $userId;

        if ($existing) {
            $this->update($existing['id'], $data);
        } else {
            $this->insert($data);
        }
    }
}
