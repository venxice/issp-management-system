<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddAuditLogFields extends Migration
{
    public function up()
    {
        $fields = [
            'page_url'       => ['type' => 'TEXT', 'null' => true],
            'user_agent'     => ['type' => 'TEXT', 'null' => true],
            'ip_address'     => ['type' => 'VARCHAR', 'constraint' => 45, 'null' => true],
            'new_data'       => ['type' => 'TEXT', 'null' => true],
            'contact_number' => ['type' => 'VARCHAR', 'constraint' => 64, 'null' => true],
            'position'       => ['type' => 'VARCHAR', 'constraint' => 128, 'null' => true],
        ];

        // Isa-isahing i-check kung umiiral na ang column para iwas duplicate error
        $fieldsToAdd = [];
        foreach ($fields as $columnName => $attributes) {
            if (!$this->db->fieldExists($columnName, 'logs')) {
                $fieldsToAdd[$columnName] = $attributes;
            }
        }

        // Kung may mga columns na wala pa, doon lang natin sila idadagdag
        if (!empty($fieldsToAdd)) {
            $this->forge->addColumn('logs', $fieldsToAdd);
        }
    }

    public function down()
    {
        // Sa pag-drop naman, i-drop lang ang mga nage-exist para walang error
        $fieldsToDrop = ['page_url', 'user_agent', 'ip_address', 'new_data', 'contact_number', 'position'];
        
        foreach ($fieldsToDrop as $columnName) {
            if ($this->db->fieldExists($columnName, 'logs')) {
                $this->forge->dropColumn('logs', $columnName);
            }
        }
    }
}
