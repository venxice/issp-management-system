<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class RolesSeeder extends Seeder
{
    public function run()
    {
        $roles = [
            ['slug' => 'division_head', 'name' => 'Division Head'],
            ['slug' => 'ict_planner', 'name' => 'ICT Planner'],
            ['slug' => 'network_management_team', 'name' => 'Network Management Team'],
            ['slug' => 'software_development_team', 'name' => 'Software Development Team'],
            ['slug' => 'computer_maintenance_technologist_ii', 'name' => 'Computer Maintenance Technologist II'],
            ['slug' => 'data_management_team', 'name' => 'Data Management Team'],
        ];

        $builder = $this->db->table('roles');
        foreach ($roles as $role) {
            $exists = $builder->where('slug', $role['slug'])->orWhere('name', $role['name'])->countAllResults(false);
            if ($exists == 0) {
                $builder->insert(array_merge($role, ['created_at' => date('Y-m-d H:i:s')]));
            }
        }
    }
}
