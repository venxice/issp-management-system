<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddPositionsTableAndUserPositionId extends Migration
{
    public function up()
    {
        // Create positions table
        if (! $this->db->tableExists('positions')) {
            $this->forge->addField([
                'id' => [
                    'type'           => 'INT',
                    'auto_increment' => true,
                ],
                'name' => [
                    'type'       => 'VARCHAR',
                    'constraint' => 120,
                ],
                'created_at' => [
                    'type' => 'DATETIME',
                    'null' => true,
                ],
                'updated_at' => [
                    'type' => 'DATETIME',
                    'null' => true,
                ],
            ]);
            $this->forge->addKey('id', true);
            $this->forge->createTable('positions', true);
        }

        // Add position_id column to users table if it doesn't exist
        if (! $this->db->fieldExists('position_id', 'users')) {
            $this->forge->addColumn('users', [
                'position_id' => [
                    'type' => 'INT',
                    'null' => true,
                    'after' => 'department_id',
                ],
            ]);
            $this->forge->addKey('position_id', false, false, 'users_position_id_key');
        }

        // Seed initial positions
        $positionsTable = $this->db->table('positions');
        $positions = [
            ['name' => 'Director General'],
            ['name' => 'Assistant Director'],
            ['name' => 'Chief ICT'],
            ['name' => 'ICT Planner'],
            ['name' => 'Network Administrator'],
            ['name' => 'Software Developer'],
            ['name' => 'Computer Maintenance Technologist'],
            ['name' => 'Data Management Specialist'],
            ['name' => 'Administrative Aide'],
            ['name' => 'Project Manager'],
        ];

        foreach ($positions as $position) {
            $exists = $positionsTable->where('name', $position['name'])->countAllResults(false);
            if ($exists == 0) {
                $positionsTable->insert(array_merge($position, ['created_at' => date('Y-m-d H:i:s')]));
            }
        }
    }

    public function down()
    {
        // Remove position_id column from users table
        if ($this->db->fieldExists('position_id', 'users')) {
            $this->forge->dropColumn('users', 'position_id');
        }

        // Drop positions table
        if ($this->db->tableExists('positions')) {
            $this->forge->dropTable('positions');
        }
    }
}
