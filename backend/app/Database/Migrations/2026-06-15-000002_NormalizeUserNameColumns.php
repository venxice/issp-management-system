<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class NormalizeUserNameColumns extends Migration
{
    public function up()
    {
        if (! $this->db->tableExists('users')) {
            return;
        }

        $this->ensureColumn('users', 'name', [
            'type'       => 'VARCHAR',
            'constraint' => 120,
            'null'       => true,
        ]);
        $this->ensureColumn('users', 'first_name', [
            'type'       => 'VARCHAR',
            'constraint' => 100,
            'null'       => true,
        ]);
        $this->ensureColumn('users', 'last_name', [
            'type'       => 'VARCHAR',
            'constraint' => 100,
            'null'       => true,
        ]);
        $this->ensureColumn('users', 'middle_initial', [
            'type'       => 'VARCHAR',
            'constraint' => 10,
            'null'       => true,
        ]);

        $this->db->query("
            UPDATE users
            SET name = TRIM(CONCAT_WS(' ', first_name, NULLIF(middle_initial, ''), last_name))
            WHERE name IS NULL OR name = ''
        ");
    }

    public function down()
    {
    }

    private function ensureColumn(string $table, string $column, array $definition): void
    {
        if (! $this->db->fieldExists($column, $table)) {
            $this->forge->addColumn($table, [$column => $definition]);
        }
    }
}
