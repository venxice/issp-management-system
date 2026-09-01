<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddReturnedResubmittedStatus extends Migration
{
    public function up()
    {
        $this->db->query("ALTER TABLE issp_records MODIFY COLUMN status ENUM('draft','pending','endorsed','approved','rejected','revision','returned','resubmitted') DEFAULT 'draft'");
    }

    public function down()
    {
        $this->db->query("ALTER TABLE issp_records MODIFY COLUMN status ENUM('draft','pending','endorsed','approved','rejected','revision') DEFAULT 'draft'");
    }
}
