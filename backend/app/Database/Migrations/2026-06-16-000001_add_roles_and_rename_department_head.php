<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddRolesAndRenameDepartmentHead extends Migration
{
    public function up()
    {
        $db = \Config\Database::connect();
        $rolesTable = $db->table('roles');

        // Roles are now managed via AuthSeeder only.
        // This migration is retained for legacy compatibility.
    }

    public function down()
    {
        // No-op: roles are managed via AuthSeeder.
    }
}
