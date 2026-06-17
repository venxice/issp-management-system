<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddAuditLogFields extends Migration
{
    public function up()
    {
        $fields = [
            'page_url' => ['type' => 'TEXT', 'null' => true],
            'user_agent' => ['type' => 'TEXT', 'null' => true],
            'ip_address' => ['type' => 'VARCHAR', 'constraint' => 45, 'null' => true],
            'new_data' => ['type' => 'TEXT', 'null' => true],
            'contact_number' => ['type' => 'VARCHAR', 'constraint' => 64, 'null' => true],
            'position' => ['type' => 'VARCHAR', 'constraint' => 128, 'null' => true],
        ];

        $this->forge->addColumn('logs', $fields);
    }

    public function down()
    {
        $this->forge->dropColumn('logs', ['page_url', 'user_agent', 'ip_address', 'new_data', 'contact_number', 'position']);
    }
}
