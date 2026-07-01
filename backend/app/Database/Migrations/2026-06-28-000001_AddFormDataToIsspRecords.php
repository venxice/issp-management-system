<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddFormDataToIsspRecords extends Migration
{
    public function up()
    {
        if ($this->db->tableExists('issp_records')) {
            if (!$this->db->fieldExists('form_data', 'issp_records')) {
                $this->forge->addColumn('issp_records', [
                    'form_data' => [
                        'type' => 'LONGTEXT',
                        'null' => true,
                        'after' => 'status',
                    ],
                ]);
            }
            if (!$this->db->fieldExists('updated_at', 'issp_records')) {
                $this->forge->addColumn('issp_records', [
                    'updated_at' => [
                        'type' => 'DATETIME',
                        'null' => true,
                        'after' => 'created_at',
                    ],
                ]);
            }
        }
    }

    public function down()
    {
        if ($this->db->tableExists('issp_records') && $this->db->fieldExists('form_data', 'issp_records')) {
            $this->forge->dropColumn('issp_records', 'form_data');
        }
    }
}
