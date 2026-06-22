<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddUpdatedAtToLogs extends Migration
{
    public function up()
    {
        $fields = [
            'updated_at' => ['type' => 'DATETIME', 'null' => true],
        ];

        $this->forge->addColumn('logs', $fields);
    }

    public function down()
    {
        $this->forge->dropColumn('logs', 'updated_at');
    }
}
