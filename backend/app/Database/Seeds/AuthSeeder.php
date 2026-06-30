<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class AuthSeeder extends Seeder
{
    public function run()
    {
        $now = date('Y-m-d H:i:s');

        $adminRoleId = $this->upsertRole([
            'name'        => 'Administrator',
            'slug'        => 'admin',
            'description' => 'Full access to system settings, users, roles, and all ISSP records.',
            'is_system'   => 1,
        ], $now);

        $this->upsertRole([
            'name'        => 'Director General',
            'slug'        => 'director_general',
            'description' => 'Views consolidated planning and management summaries.',
            'is_system'   => 1,
        ], $now);

        $this->upsertRole([
            'name'        => 'Employee',
            'slug'        => 'employee',
            'description' => 'Encodes assigned ISSP tasks and submissions.',
            'is_system'   => 1,
        ], $now);

        $this->upsertRole([
            'name'        => 'ICT Planner',
            'slug'        => 'ict_planner',
            'description' => 'Manages ICT planning data, monitoring, and technical coordination.',
            'is_system'   => 1,
        ], $now);

        $departmentId = $this->upsertDepartment('Office of the Director-General', $now);
        $this->upsertDepartment('Information Technology', $now);
        $this->upsertDepartment('Finance', $now);
        $this->upsertDepartment('Planning', $now);

        $email = env('SEED_ADMIN_EMAIL') ?: 'admin@issp.test';
        $password = env('SEED_ADMIN_PASSWORD') ?: 'Admin@12345';
        $users = $this->db->table('users');
        $admin = $users->where('email', $email)->get()->getRowArray();

        $payload = [
            'name'          => env('SEED_ADMIN_NAME') ?: 'System Administrator',
            'email'         => $email,
            'role_id'       => $adminRoleId,
            'department_id' => $departmentId,
            'status'        => 'active',
            'updated_at'    => $now,
        ];
        $payload += $this->nameColumns($payload['name']);

        if ($admin === null) {
            $payload['password'] = password_hash($password, PASSWORD_DEFAULT);
            $payload['email_verified'] = 1;
            $payload['created_at'] = $now;
            $users->insert($payload);

            return;
        }

        if (empty($admin['password'])) {
            $payload['password'] = password_hash($password, PASSWORD_DEFAULT);
        }

        $users->where('id', $admin['id'])->update($payload);
    }

    private function upsertRole(array $role, string $now): int
    {
        $roles = $this->db->table('roles');
        $existing = $roles
            ->groupStart()
                ->where('slug', $role['slug'])
                ->orWhere('name', $role['name'])
            ->groupEnd()
            ->get()
            ->getRowArray();

        $payload = [
            'name'        => $role['name'],
            'slug'        => $role['slug'],
            'description' => $role['description'],
            'is_system'   => $role['is_system'],
            'updated_at'  => $now,
        ];

        if ($existing !== null) {
            $roles->where('id', $existing['id'])->update($payload);

            return (int) $existing['id'];
        }

        $payload['created_at'] = $now;
        $roles->insert($payload);

        return (int) $this->db->insertID();
    }

    private function upsertDepartment(string $name, string $now): int
    {
        $departments = $this->db->table('departments');
        $existing = $departments->where('name', $name)->get()->getRowArray();

        if ($existing !== null) {
            $departments->where('id', $existing['id'])->update(['updated_at' => $now]);

            return (int) $existing['id'];
        }

        $departments->insert([
            'name'       => $name,
            'created_at' => $now,
            'updated_at' => $now,
        ]);

        return (int) $this->db->insertID();
    }

    private function nameColumns(string $name): array
    {
        $parts = preg_split('/\s+/', trim($name)) ?: [];

        if (count($parts) <= 1) {
            return [
                'first_name'     => $name,
                'last_name'      => 'User',
                'middle_initial' => null,
            ];
        }

        $lastName = array_pop($parts);

        return [
            'first_name'     => implode(' ', $parts),
            'last_name'      => $lastName,
            'middle_initial' => null,
        ];
    }
}
