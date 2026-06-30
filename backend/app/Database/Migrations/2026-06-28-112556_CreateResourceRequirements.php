<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateResourceRequirements extends Migration
{
   public function up()
{
    $this->forge->addField([
        'id' => [
            'type' => 'INT',
            'constraint' => 11,
            'unsigned' => true,
            'auto_increment' => true,
        ],
        'year' => [
            'type' => 'INT',
            'constraint' => 1,
        ],
        'strategic_category' => [
            'type' => 'VARCHAR',
            'constraint' => 255,
        ],
        'item' => [
            'type' => 'VARCHAR',
            'constraint' => 255,
        ],
        'office_location' => [
            'type' => 'VARCHAR',
            'constraint' => 255,
        ],
        'fund_source' => [
            'type' => 'VARCHAR',
            'constraint' => 255,
        ],
        'unit_cost' => [
            'type' => 'DECIMAL',
            'constraint' => '15,2',
        ],
        'physical_target' => [
            'type' => 'INT',
            'constraint' => 11,
        ],
        'total_cost' => [
            'type' => 'DECIMAL',
            'constraint' => '15,2',
        ],
        'expenditure_type' => [
            'type' => 'VARCHAR',
            'constraint' => 255,
        ],
        'object_of_expenditure' => [
            'type' => 'VARCHAR',
            'constraint' => 255,
        ],
        'uacs_code' => [
            'type' => 'VARCHAR',
            'constraint' => 100,
        ],
        'remarks' => [
            'type' => 'TEXT',
            'null' => true,
        ],
        'created_by' => [
            'type' => 'INT',
            'constraint' => 11,
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
    $this->forge->createTable('resource_requirements');
}

public function down()
{
    $this->forge->dropTable('resource_requirements');
}

}
