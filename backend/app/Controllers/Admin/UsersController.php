<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\AuditLogModel;
use App\Models\DepartmentModel;
use App\Models\PositionModel;
use App\Models\RoleModel;
use App\Models\UserModel;

class UsersController extends BaseController
{
    public function index()
    {
        $query = trim((string) $this->request->getGet('q'));
        $department = trim((string) $this->request->getGet('department'));
        $page = (int) ($this->request->getGet('page') ?? 1);
        $perPage = 25;

        $userModel = new UserModel();
        $builder = $userModel->select('users.*, roles.name AS role_name, roles.slug AS role_slug, departments.name AS department_name, positions.name AS position_name')
            ->join('roles', 'roles.id = users.role_id', 'left')
            ->join('departments', 'departments.id = users.department_id', 'left')
            ->join('positions', 'positions.id = users.position_id', 'left');

        if ($query !== '') {
            $builder->groupStart()
                ->like('users.name', $query)
                ->orLike('users.email', $query)
                ->orLike('roles.name', $query)
                ->orLike('departments.name', $query)
                ->groupEnd();
        }

        if ($department !== '') {
            $builder->where('users.department_id', $department);
        }

        $builder->orderBy('users.created_at', 'DESC');

        $total = $builder->countAllResults(false);
        $users = $builder->paginate($perPage, 'default', $page);

        $pager = $userModel->pager;

        return view('frontend/admin/users/index', [
            'title' => 'User Management',
            'active' => 'users',
            'users' => $users,
            'query' => $query,
            'departmentFilter' => $department,
            'roles' => (new RoleModel())->orderBy('LOWER(name)', 'ASC')->findAll(),
            'departments' => (new DepartmentModel())->orderBy('LOWER(name)', 'ASC')->findAll(),
            'positions' => (new PositionModel())->orderBy('LOWER(name)', 'ASC')->findAll(),
            'pager' => $pager,
            'total' => $total,
            'perPage' => $perPage,
            'currentPage' => $page,
        ]);
    }

    public function create()
    {
        return view('frontend/admin/users/form', [
            'title' => 'Create User',
            'active' => 'users',
            'user' => null,
            'roles' => (new RoleModel())->orderBy('LOWER(name)', 'ASC')->findAll(),
            'departments' => (new DepartmentModel())->orderBy('LOWER(name)', 'ASC')->findAll(),
            'positions' => (new PositionModel())->orderBy('LOWER(name)', 'ASC')->findAll(),
        ]);
    }

    public function store()
    {
        $rules = [
            'first_name' => 'required|min_length[2]|max_length[80]',
            'last_name' => 'required|min_length[2]|max_length[80]',
            'middle_initial' => 'permit_empty|max_length[10]',
            'email' => 'required|valid_email|is_unique[users.email]',
            'password' => 'required|min_length[8]',
            'password_confirmation' => 'required|matches[password]',
            'role_id' => 'required|integer',
            'position_id' => 'required|integer',
            'department_id' => 'required|integer',
            'status' => 'required|in_list[active,inactive]',
        ];

        if (! $this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        // Additional password validation
        $password = $this->request->getPost('password');
        if (!preg_match('/[A-Z]/', $password)) {
            return redirect()->back()->withInput()->with('error', 'Password must contain at least one uppercase letter');
        }
        if (!preg_match('/[a-z]/', $password)) {
            return redirect()->back()->withInput()->with('error', 'Password must contain at least one lowercase letter');
        }
        if (!preg_match('/[0-9]/', $password)) {
            return redirect()->back()->withInput()->with('error', 'Password must contain at least one number');
        }
        if (!preg_match('/[!@#$%^&*(),.?":{}|<>]/', $password)) {
            return redirect()->back()->withInput()->with('error', 'Password must contain at least one special character');
        }

        $payload = $this->userPayload();
        $payload['password'] = password_hash((string) $this->request->getPost('password'), PASSWORD_DEFAULT);

        $id = (new UserModel())->insert($payload, true);
        $this->writeLog('user.created', 'Created user #' . $id . ' (' . $payload['email'] . ').');

        return redirect()->to(site_url('admin/users'))->with('success', 'User created successfully');
    }

    public function edit(int $id)
    {
        $user = (new UserModel())->find($id);

        if ($user === null) {
            return redirect()->to(site_url('admin/users'))->with('error', 'User not found');
        }

        return view('frontend/admin/users/form', [
            'title' => 'Edit User',
            'active' => 'users',
            'user' => $user,
            'roles' => (new RoleModel())->orderBy('LOWER(name)', 'ASC')->findAll(),
            'departments' => (new DepartmentModel())->orderBy('LOWER(name)', 'ASC')->findAll(),
            'positions' => (new PositionModel())->orderBy('LOWER(name)', 'ASC')->findAll(),
        ]);
    }

    public function update(int $id)
    {
        $userModel = new UserModel();
        $user = $userModel->find($id);

        if ($user === null) {
            return redirect()->to(site_url('admin/users'))->with('error', 'User not found');
        }

        $rules = [
            'first_name' => 'required|min_length[2]|max_length[80]',
            'last_name' => 'required|min_length[2]|max_length[80]',
            'middle_initial' => 'permit_empty|max_length[10]',
            'email' => 'required|valid_email|is_unique[users.email,id,' . $id . ']',
            'password' => 'permit_empty|min_length[8]',
            'password_confirmation' => 'required_with[password]|matches[password]',
            'role_id' => 'required|integer',
            'position_id' => 'required|integer',
            'department_id' => 'required|integer',
            'status' => 'required|in_list[active,inactive]',
        ];

        if (! $this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $password = $this->request->getPost('password');
        if ($password !== '') {
            if (!preg_match('/[A-Z]/', $password)) {
                return redirect()->back()->withInput()->with('error', 'Password must contain at least one uppercase letter');
            }
            if (!preg_match('/[a-z]/', $password)) {
                return redirect()->back()->withInput()->with('error', 'Password must contain at least one lowercase letter');
            }
            if (!preg_match('/[0-9]/', $password)) {
                return redirect()->back()->withInput()->with('error', 'Password must contain at least one number');
            }
            if (!preg_match('/[!@#$%^&*(),.?":{}|<>]/', $password)) {
                return redirect()->back()->withInput()->with('error', 'Password must contain at least one special character');
            }
        }

        if ((int) session()->get('user_id') === $id && $this->request->getPost('status') === 'inactive') {
            return redirect()->back()->withInput()->with('error', 'You cannot deactivate your own account');
        }

        $payload = $this->userPayload();
        $password = (string) $this->request->getPost('password');

        if ($password !== '') {
            $payload['password'] = password_hash($password, PASSWORD_DEFAULT);
        }

        $userModel->update($id, $payload);
        $this->writeLog('user.updated', 'Updated user #' . $id . ' (' . $payload['email'] . ').');

        return redirect()->to(site_url('admin/users'))->with('success', 'User updated successfully');
    }

    public function deactivate(int $id)
    {
        if ((int) session()->get('user_id') === $id) {
            return redirect()->to(site_url('admin/users'))->with('error', 'You cannot deactivate your own account');
        }

        $userModel = new UserModel();
        $user = $userModel->find($id);

        if ($user === null) {
            return redirect()->to(site_url('admin/users'))->with('error', 'User not found');
        }

        $userModel->update($id, ['status' => 'inactive']);
        $this->writeLog('user.deactivated', 'Deactivated user #' . $id . ' (' . $user['email'] . ').');

        return redirect()->to(site_url('admin/users'))->with('success', 'User deactivated successfully');
    }

    public function reactivate(int $id)
    {
        $userModel = new UserModel();
        $user = $userModel->find($id);

        if ($user === null) {
            return redirect()->to(site_url('admin/users'))->with('error', 'User not found');
        }

        $userModel->update($id, ['status' => 'active']);
        $this->writeLog('user.reactivated', 'Reactivated user #' . $id . ' (' . $user['email'] . ').');

        return redirect()->to(site_url('admin/users'))->with('success', 'User reactivated successfully');
    }

    private function userPayload(): array
    {
        $firstName = trim((string) $this->request->getPost('first_name'));
        $lastName = trim((string) $this->request->getPost('last_name'));
        $middleInitial = trim((string) $this->request->getPost('middle_initial'));
        $departmentId = $this->request->getPost('department_id');
        $positionId = $this->request->getPost('position_id');
        $name = trim((string) $this->request->getPost('name'));

        if ($firstName !== '' || $lastName !== '' || $middleInitial !== '') {
            $nameParts = array_filter([
                $firstName,
                $middleInitial !== '' ? $middleInitial : null,
                $lastName,
            ], static fn ($part): bool => $part !== null && $part !== '');

            $name = trim(implode(' ', $nameParts));
        }

        $derivedNames = $this->nameColumns($name);

        return [
            'name' => $name,
            'email' => strtolower(trim((string) $this->request->getPost('email'))),
            'role_id' => (int) $this->request->getPost('role_id'),
            'department_id' => $departmentId === '' ? null : (int) $departmentId,
            'position_id' => $positionId === '' ? null : (int) $positionId,
            'status' => (string) $this->request->getPost('status'),
            'first_name' => $firstName !== '' ? $firstName : $derivedNames['first_name'],
            'last_name' => $lastName !== '' ? $lastName : $derivedNames['last_name'],
            'middle_initial' => $middleInitial !== '' ? $middleInitial : $derivedNames['middle_initial'],
        ];
    }

    private function writeLog(string $action, string $description): void
    {
        (new AuditLogModel())->insert([
            'user_id' => (int) session()->get('user_id'),
            'action' => $action,
            'description' => $description,
            'created_at' => date('Y-m-d H:i:s'),
        ]);
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
