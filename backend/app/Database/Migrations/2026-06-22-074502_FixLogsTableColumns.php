<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class FixLogsTableColumns extends Migration
{
    public function up()
    {
        $fields = [
            'user_id' => [
                'type'       => 'INT',
                'constraint' => 11,
                'unsigned'   => true,
                'null'       => true,
                'after'      => 'id'
            ],
            'action' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
                'null'       => true,
                'after'      => 'user_id'
            ],
            'description' => [
                'type'       => 'TEXT',
                'null'       => true,
                'after'      => 'action'
            ],
        ];

        // I-add lang ang mga kolum kung wala pa sila sa logs table
        foreach ($fields as $column => $attributes) {
            if (!$this->db->fieldExists($column, 'logs')) {
                $this->forge->addColumn('logs', [$column => $attributes]);
            }
        }
    }

    public function down()
    {
        $fieldsToDrop = ['user_id', 'action', 'description'];
        foreach ($fieldsToDrop as $column) {
            if ($this->db->fieldExists($column, 'logs')) {
                $this->forge->dropColumn('logs', $column);
            }
        }
    }
}
