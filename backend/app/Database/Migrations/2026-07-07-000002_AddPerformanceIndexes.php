<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddPerformanceIndexes extends Migration
{
    public function up()
    {
        $this->db->query('ALTER TABLE issp_records ADD INDEX idx_status (status)');
        $this->db->query('ALTER TABLE issp_records ADD INDEX idx_created_by (created_by)');
        $this->db->query('ALTER TABLE issp_records ADD INDEX idx_created_at (created_at)');
        $this->db->query('ALTER TABLE issp_records ADD INDEX idx_status_created_by (status, created_by)');
        $this->db->query('ALTER TABLE logs ADD INDEX idx_user_id (user_id)');
        $this->db->query('ALTER TABLE logs ADD INDEX idx_action (action)');
        $this->db->query('ALTER TABLE logs ADD INDEX idx_created_at (created_at)');
        $this->db->query('ALTER TABLE ci_sessions ADD INDEX idx_timestamp (timestamp)');
    }

    public function down()
    {
        $this->db->query('ALTER TABLE issp_records DROP INDEX idx_status');
        $this->db->query('ALTER TABLE issp_records DROP INDEX idx_created_by');
        $this->db->query('ALTER TABLE issp_records DROP INDEX idx_created_at');
        $this->db->query('ALTER TABLE issp_records DROP INDEX idx_status_created_by');
        $this->db->query('ALTER TABLE logs DROP INDEX idx_user_id');
        $this->db->query('ALTER TABLE logs DROP INDEX idx_action');
        $this->db->query('ALTER TABLE logs DROP INDEX idx_created_at');
        $this->db->query('ALTER TABLE ci_sessions DROP INDEX idx_timestamp');
    }
}
