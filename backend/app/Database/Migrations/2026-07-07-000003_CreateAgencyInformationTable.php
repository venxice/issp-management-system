<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateAgencyInformationTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'                   => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'created_by'           => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true],
            'legal_basis'          => ['type' => 'TEXT', 'null' => true],
            'function'             => ['type' => 'TEXT', 'null' => true],
            'vision_statement'     => ['type' => 'TEXT', 'null' => true],
            'mission_statement'    => ['type' => 'TEXT', 'null' => true],
            'organizational_outcome' => ['type' => 'TEXT', 'null' => true],
            'cio_name'             => ['type' => 'VARCHAR', 'constraint' => 255, 'null' => true],
            'cio_plantilla'        => ['type' => 'VARCHAR', 'constraint' => 255, 'null' => true],
            'cio_unit'             => ['type' => 'VARCHAR', 'constraint' => 255, 'null' => true],
            'cio_email'            => ['type' => 'VARCHAR', 'constraint' => 255, 'null' => true],
            'cio_contact'          => ['type' => 'VARCHAR', 'constraint' => 255, 'null' => true],
            'focal_name'           => ['type' => 'VARCHAR', 'constraint' => 255, 'null' => true],
            'focal_position'       => ['type' => 'VARCHAR', 'constraint' => 255, 'null' => true],
            'focal_unit'           => ['type' => 'VARCHAR', 'constraint' => 255, 'null' => true],
            'focal_email'          => ['type' => 'VARCHAR', 'constraint' => 255, 'null' => true],
            'focal_contact'        => ['type' => 'VARCHAR', 'constraint' => 255, 'null' => true],
            'plantilla_it'         => ['type' => 'INT', 'constraint' => 11, 'null' => true, 'default' => 0],
            'plantilla_non_it'     => ['type' => 'INT', 'constraint' => 11, 'null' => true, 'default' => 0],
            'plantilla_male'       => ['type' => 'INT', 'constraint' => 11, 'null' => true, 'default' => 0],
            'plantilla_female'     => ['type' => 'INT', 'constraint' => 11, 'null' => true, 'default' => 0],
            'contractual_it'       => ['type' => 'INT', 'constraint' => 11, 'null' => true, 'default' => 0],
            'contractual_non_it'   => ['type' => 'INT', 'constraint' => 11, 'null' => true, 'default' => 0],
            'contractual_male'     => ['type' => 'INT', 'constraint' => 11, 'null' => true, 'default' => 0],
            'contractual_female'   => ['type' => 'INT', 'constraint' => 11, 'null' => true, 'default' => 0],
            'outsourced_it'        => ['type' => 'INT', 'constraint' => 11, 'null' => true, 'default' => 0],
            'outsourced_non_it'    => ['type' => 'INT', 'constraint' => 11, 'null' => true, 'default' => 0],
            'outsourced_male'      => ['type' => 'INT', 'constraint' => 11, 'null' => true, 'default' => 0],
            'outsourced_female'    => ['type' => 'INT', 'constraint' => 11, 'null' => true, 'default' => 0],
            'stakeholder_data'     => ['type' => 'LONGTEXT', 'null' => true],
            'created_at'           => ['type' => 'DATETIME', 'null' => true],
            'updated_at'           => ['type' => 'DATETIME', 'null' => true],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addUniqueKey('created_by');
        $this->forge->createTable('agency_information');
    }

    public function down()
    {
        $this->forge->dropTable('agency_information');
    }
}
