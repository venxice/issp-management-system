<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddRolesAndRenameDepartmentHead extends Migration
{
    public function up()
    {
        $db = \Config\Database::connect();
        $rolesTable = $db->table('roles');

        // Rename existing Department Head role (if present)
        // Try match by slug or name
        $rolesTable->where('slug', 'department_head')->update(['slug' => 'division_head', 'name' => 'Division Head']);
        $rolesTable->where('name', 'Department Head')->update(['slug' => 'division_head', 'name' => 'Division Head']);

        // Insert roles if they don't exist
        $roles = [
            ['slug' => 'ict_planner', 'name' => 'ICT Planner'],
            ['slug' => 'network_management_team', 'name' => 'Network Management Team'],
            ['slug' => 'software_development_team', 'name' => 'Software Development Team'],
            ['slug' => 'computer_maintenance_technologist_ii', 'name' => 'Computer Maintenance Technologist II'],
            ['slug' => 'data_management_team', 'name' => 'Data Management Team'],
        ];

        foreach ($roles as $role) {
            $exists = $rolesTable->where('slug', $role['slug'])->orWhere('name', $role['name'])->countAllResults(false);
            if ($exists == 0) {
                $rolesTable->insert(array_merge($role, ['created_at' => date('Y-m-d H:i:s')]));
            }
        }
    }

    public function down()
    {
        $db = \Config\Database::connect();
        $rolesTable = $db->table('roles');

        // Remove inserted roles
        $slugs = ['ict_planner', 'network_management_team', 'software_development_team', 'computer_maintenance_technologist_ii', 'data_management_team'];
        $rolesTable->whereIn('slug', $slugs)->delete();

        // Try revert division_head back to department_head if it was renamed by this migration
        $rolesTable->where('slug', 'division_head')->where('name', 'Division Head')->update(['slug' => 'department_head', 'name' => 'Department Head']);
    }
}
