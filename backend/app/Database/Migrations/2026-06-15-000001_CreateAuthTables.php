<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateAuthTables extends Migration
{
    public function up()
    {
        $this->ensureRolesTable();
        $this->ensureDepartmentsTable();
        $this->ensureUsersTable();
        $this->ensureLogsTable();
        $this->ensureSessionsTable();
    }

    public function down()
    {
        if ($this->db->tableExists('ci_sessions')) {
            $this->forge->dropTable('ci_sessions');
        }
    }

    private function ensureRolesTable(): void
    {
        if (! $this->db->tableExists('roles')) {
            $this->forge->addField([
                'id' => [
                    'type'           => 'INT',
                    'auto_increment' => true,
                ],
                'name' => [
                    'type'       => 'VARCHAR',
                    'constraint' => 80,
                ],
                'slug' => [
                    'type'       => 'VARCHAR',
                    'constraint' => 80,
                ],
                'description' => [
                    'type'       => 'VARCHAR',
                    'constraint' => 255,
                    'null'       => true,
                ],
                'is_system' => [
                    'type'       => 'TINYINT',
                    'constraint' => 1,
                    'default'    => 0,
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
            $this->forge->addKey('slug', false, true);
            $this->forge->createTable('roles', true);

            return;
        }

        $this->ensureColumn('roles', 'slug', [
            'type'       => 'VARCHAR',
            'constraint' => 80,
            'null'       => true,
        ]);
        $this->ensureColumn('roles', 'description', [
            'type'       => 'VARCHAR',
            'constraint' => 255,
            'null'       => true,
        ]);
        $this->ensureColumn('roles', 'is_system', [
            'type'       => 'TINYINT',
            'constraint' => 1,
            'default'    => 0,
        ]);
        $this->ensureColumn('roles', 'created_at', [
            'type' => 'DATETIME',
            'null' => true,
        ]);
        $this->ensureColumn('roles', 'updated_at', [
            'type' => 'DATETIME',
            'null' => true,
        ]);
    }

    private function ensureDepartmentsTable(): void
    {
        if (! $this->db->tableExists('departments')) {
            $this->forge->addField([
                'id' => [
                    'type'           => 'INT',
                    'auto_increment' => true,
                ],
                'name' => [
                    'type'       => 'VARCHAR',
                    'constraint' => 120,
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
            $this->forge->createTable('departments', true);

            return;
        }

        $this->ensureColumn('departments', 'created_at', [
            'type' => 'DATETIME',
            'null' => true,
        ]);
        $this->ensureColumn('departments', 'updated_at', [
            'type' => 'DATETIME',
            'null' => true,
        ]);
    }

    private function ensureUsersTable(): void
    {
        if (! $this->db->tableExists('users')) {
            $this->forge->addField([
                'id' => [
                    'type'           => 'INT',
                    'auto_increment' => true,
                ],
                'name' => [
                    'type'       => 'VARCHAR',
                    'constraint' => 120,
                    'null'       => true,
                ],
                'first_name' => [
                    'type'       => 'VARCHAR',
                    'constraint' => 100,
                    'null'       => true,
                ],
                'last_name' => [
                    'type'       => 'VARCHAR',
                    'constraint' => 100,
                    'null'       => true,
                ],
                'middle_initial' => [
                    'type'       => 'VARCHAR',
                    'constraint' => 10,
                    'null'       => true,
                ],
                'email' => [
                    'type'       => 'VARCHAR',
                    'constraint' => 190,
                ],
                'password' => [
                    'type'       => 'VARCHAR',
                    'constraint' => 255,
                    'null'       => true,
                ],
                'role_id' => [
                    'type' => 'INT',
                ],
                'department_id' => [
                    'type' => 'INT',
                    'null' => true,
                ],
                'status' => [
                    'type'       => 'ENUM',
                    'constraint' => ['active', 'inactive'],
                    'default'    => 'active',
                ],
                'sso_provider' => [
                    'type'       => 'VARCHAR',
                    'constraint' => 50,
                    'null'       => true,
                ],
                'sso_subject' => [
                    'type'       => 'VARCHAR',
                    'constraint' => 190,
                    'null'       => true,
                ],
                'email_verified' => [
                    'type'       => 'TINYINT',
                    'constraint' => 1,
                    'default'    => 0,
                ],
                'last_login_at' => [
                    'type' => 'DATETIME',
                    'null' => true,
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
            $this->forge->addKey('email', false, true);
            $this->forge->addKey('role_id');
            $this->forge->addKey('department_id');
            $this->forge->createTable('users', true);

            return;
        }

        $this->ensureColumn('users', 'name', [
            'type'       => 'VARCHAR',
            'constraint' => 120,
            'null'       => true,
        ]);
        $this->ensureColumn('users', 'first_name', [
            'type'       => 'VARCHAR',
            'constraint' => 100,
            'null'       => true,
        ]);
        $this->ensureColumn('users', 'last_name', [
            'type'       => 'VARCHAR',
            'constraint' => 100,
            'null'       => true,
        ]);
        $this->ensureColumn('users', 'middle_initial', [
            'type'       => 'VARCHAR',
            'constraint' => 10,
            'null'       => true,
        ]);

        if ($this->db->fieldExists('password', 'users')) {
            $this->forge->modifyColumn('users', [
                'password' => [
                    'type'       => 'VARCHAR',
                    'constraint' => 255,
                    'null'       => true,
                ],
            ]);
        }

        $this->ensureColumn('users', 'sso_provider', [
            'type'       => 'VARCHAR',
            'constraint' => 50,
            'null'       => true,
        ]);
        $this->ensureColumn('users', 'sso_subject', [
            'type'       => 'VARCHAR',
            'constraint' => 190,
            'null'       => true,
        ]);
        $this->ensureColumn('users', 'email_verified', [
            'type'       => 'TINYINT',
            'constraint' => 1,
            'default'    => 0,
        ]);
        $this->ensureColumn('users', 'last_login_at', [
            'type' => 'DATETIME',
            'null' => true,
        ]);
        $this->ensureColumn('users', 'updated_at', [
            'type' => 'DATETIME',
            'null' => true,
        ]);
    }

    private function ensureLogsTable(): void
    {
        if ($this->db->tableExists('logs')) {
            return;
        }

        $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'auto_increment' => true,
            ],
            'user_id' => [
                'type' => 'INT',
                'null' => true,
            ],
            'action' => [
                'type'       => 'VARCHAR',
                'constraint' => 120,
                'null'       => true,
            ],
            'description' => [
                'type' => 'TEXT',
                'null' => true,
            ],
            'created_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addKey('user_id');
        $this->forge->createTable('logs', true);
    }

    private function ensureSessionsTable(): void
    {
        if ($this->db->tableExists('ci_sessions')) {
            return;
        }

        $this->forge->addField([
            'id' => [
                'type'       => 'VARCHAR',
                'constraint' => 128,
            ],
            'ip_address' => [
                'type'       => 'VARCHAR',
                'constraint' => 45,
            ],
            'timestamp' => [
                'type'       => 'INT',
                'constraint' => 10,
                'unsigned'   => true,
                'default'    => 0,
            ],
            'data' => [
                'type' => 'BLOB',
            ],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addKey('timestamp');
        $this->forge->createTable('ci_sessions', true);
    }

    private function ensureColumn(string $table, string $column, array $definition): void
    {
        if (! $this->db->fieldExists($column, $table)) {
            $this->forge->addColumn($table, [$column => $definition]);
        }
    }
}
