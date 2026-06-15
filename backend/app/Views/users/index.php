<?= $this->include('layout/header') ?>
<?= $this->include('layout/alerts') ?>

<?php
$roles = $roles ?? [];
$departments = $departments ?? [];

$userPayload = static function (array $user): array {
    return [
        'id' => $user['id'] ?? '',
        'name' => $user['name'] ?? '',
        'first_name' => $user['first_name'] ?? '',
        'last_name' => $user['last_name'] ?? '',
        'middle_initial' => $user['middle_initial'] ?? '',
        'email' => $user['email'] ?? '',
        'role_id' => $user['role_id'] ?? '',
        'role_name' => $user['role_name'] ?? '',
        'department_id' => $user['department_id'] ?? '',
        'department_name' => $user['department_name'] ?? '',
        'status' => $user['status'] ?? '',
        'sso_provider' => $user['sso_provider'] ?? '',
        'email_verified' => $user['email_verified'] ?? '',
        'last_login_at' => $user['last_login_at'] ?? '',
        'created_at' => $user['created_at'] ?? '',
        'updated_at' => $user['updated_at'] ?? '',
    ];
};
?>

<section class="panel">
    <div class="panel-header d-flex flex-wrap gap-3 align-items-center justify-content-between">
        <div>
            <h2 class="panel-title">Users List</h2>
            <p class="panel-subtitle">Manage local and SSO-enabled user accounts.</p>
        </div>

        <div class="d-flex flex-wrap align-items-center justify-content-end toolbar-form">
            <form class="d-flex flex-wrap align-items-center toolbar-form" method="get" action="<?= site_url('users') ?>">
                <input class="form-control form-control-sm" name="q" value="<?= esc($query ?? '') ?>" placeholder="Search Users" style="width: 168px;">
                <select class="form-select form-select-sm" name="role" style="width: 150px;">
                    <option value="">All Roles</option>
                    <?php foreach ($roles as $role): ?>
                        <option value="<?= esc($role['slug']) ?>" <?= ($roleFilter ?? '') === $role['slug'] ? 'selected' : '' ?>>
                            <?= esc($role['name']) ?>
                        </option>
                    <?php endforeach; ?>
                </select>
                <select class="form-select form-select-sm" name="status" style="width: 140px;">
                    <option value="">All Status</option>
                    <option value="active" <?= ($statusFilter ?? '') === 'active' ? 'selected' : '' ?>>Active</option>
                    <option value="inactive" <?= ($statusFilter ?? '') === 'inactive' ? 'selected' : '' ?>>Inactive</option>
                </select>
                <button class="btn btn-outline-primary" type="submit" aria-label="Search users">
                    <i class="fa-solid fa-magnifying-glass"></i>
                </button>
            </form>

            <button class="btn btn-primary" type="button" data-bs-toggle="modal" data-bs-target="#addUserModal">
                <i class="fa-solid fa-plus me-2"></i> Add User
            </button>
        </div>
    </div>

    <div class="table-responsive">
        <table class="table align-middle mb-0">
            <thead>
            <tr>
                <th style="width: 72px;">ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Role</th>
                <th>Division</th>
                <th>Sign-in</th>
                <th>Status</th>
                <th class="text-center" style="width: 92px;">Action</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($users as $user): ?>
                <?php $payload = $userPayload($user); ?>
                <tr>
                    <td><?= esc($user['id']) ?></td>
                    <td>
                        <div class="fw-semibold"><?= esc($user['name']) ?></div>
                        <div class="small text-muted-strong">
                            <?= esc(trim(($user['first_name'] ?? '') . ' ' . ($user['last_name'] ?? ''))) ?>
                        </div>
                    </td>
                    <td><?= esc($user['email']) ?></td>
                    <td><?= esc($user['role_name'] ?? 'Unassigned') ?></td>
                    <td><?= esc($user['department_name'] ?? 'No division') ?></td>
                    <td>
                        <?php if (! empty($user['sso_provider'])): ?>
                            <span class="badge badge-soft"><?= esc(ucfirst($user['sso_provider'])) ?> SSO</span>
                        <?php else: ?>
                            <span class="badge badge-soft">Password</span>
                        <?php endif; ?>
                    </td>
                    <td>
                        <span class="badge <?= $user['status'] === 'active' ? 'text-bg-success' : 'text-bg-secondary' ?>">
                            <?= esc(ucfirst($user['status'])) ?>
                        </span>
                    </td>
                    <td class="text-center">
                        <div class="d-inline-flex gap-1">
                            <button
                                class="btn btn-outline-primary icon-btn"
                                type="button"
                                data-bs-toggle="modal"
                                data-bs-target="#viewUserModal"
                                data-user='<?= esc(json_encode($payload, JSON_UNESCAPED_SLASHES), 'attr') ?>'
                            >
                                <i class="fa-regular fa-eye"></i>
                            </button>
                            <button
                                class="btn btn-outline-primary icon-btn"
                                type="button"
                                data-bs-toggle="modal"
                                data-bs-target="#editUserModal"
                                data-user='<?= esc(json_encode($payload, JSON_UNESCAPED_SLASHES), 'attr') ?>'
                            >
                                <i class="fa-regular fa-pen-to-square"></i>
                            </button>
                        </div>
                    </td>
                </tr>
            <?php endforeach; ?>
            <?php if ($users === []): ?>
                <tr><td colspan="8" class="text-center text-muted-strong py-4">No users found.</td></tr>
            <?php endif; ?>
            </tbody>
        </table>
    </div>
</section>

<div class="modal fade" id="addUserModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <div>
                    <h5 class="modal-title">Add New User</h5>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="addUserForm" action="<?= site_url('users') ?>" method="post">
                <?= csrf_field() ?>
                <input type="hidden" name="name" value="">
                <div class="modal-body modal-form-grid">
                    <div class="row g-2">
                        <div class="col-md-4">
                            <label class="form-label" for="add_first_name">First Name</label>
                            <input class="form-control" id="add_first_name" name="first_name" placeholder="Enter First Name" required>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label" for="add_last_name">Last Name</label>
                            <input class="form-control" id="add_last_name" name="last_name" placeholder="Enter Last Name" required>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label" for="add_middle_initial">Middle Initial</label>
                            <input class="form-control" id="add_middle_initial" name="middle_initial" placeholder="J">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label" for="add_email">Email Address</label>
                            <input class="form-control" id="add_email" name="email" type="email" placeholder="name@example.com" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label" for="add_department_id">Division</label>
                            <select class="form-select" id="add_department_id" name="department_id">
                                <option value="">Select Division</option>
                                <?php foreach ($departments as $department): ?>
                                    <option value="<?= esc($department['id']) ?>"><?= esc($department['name']) ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label" for="add_role_id">Role</label>
                            <select class="form-select" id="add_role_id" name="role_id" required>
                                <option value="">Select Role</option>
                                <?php foreach ($roles as $role): ?>
                                    <option value="<?= esc($role['id']) ?>"><?= esc($role['name']) ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label" for="add_status">Status</label>
                            <select class="form-select" id="add_status" name="status" required>
                                <option value="active">Active</option>
                                <option value="inactive">Inactive</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label" for="add_password">Password</label>
                            <input class="form-control" id="add_password" name="password" type="password" autocomplete="new-password" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label" for="add_password_confirmation">Confirm Password</label>
                            <input class="form-control" id="add_password_confirmation" name="password_confirmation" type="password" autocomplete="new-password" required>
                        </div>
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button class="btn btn-primary" type="submit">
                        <i class="fa-solid fa-user-plus me-2"></i> Add
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="viewUserModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <div>
                    <h5 class="modal-title">User Details</h5>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="d-flex align-items-center gap-3 mb-3">
                    <div class="brand-mark flex-shrink-0" style="width: 42px; height: 42px; background: #e9eef5; color: #526784;">
                        <i class="fa-solid fa-user"></i>
                    </div>
                    <div>
                        <div class="fw-semibold" id="view-user-name">-</div>
                        <div class="activity-meta" id="view-user-email">-</div>
                    </div>
                </div>
                <div class="detail-list">
                    <div class="key">ID</div><div class="val" id="view-user-id">-</div>
                    <div class="key">First Name</div><div class="val" id="view-user-first-name">-</div>
                    <div class="key">Last Name</div><div class="val" id="view-user-last-name">-</div>
                    <div class="key">Middle Initial</div><div class="val" id="view-user-middle-initial">-</div>
                    <div class="key">Email Address</div><div class="val" id="view-user-email-field">-</div>
                    <div class="key">Role</div><div class="val" id="view-user-role">-</div>
                    <div class="key">Division</div><div class="val" id="view-user-division">-</div>
                    <div class="key">Status</div><div class="val" id="view-user-status">-</div>
                    <div class="key">Sign-in</div><div class="val" id="view-user-signin">-</div>
                    <div class="key">Verified</div><div class="val" id="view-user-verified">-</div>
                    <div class="key">Last Login</div><div class="val" id="view-user-last-login">-</div>
                    <div class="key">Created</div><div class="val" id="view-user-created">-</div>
                    <div class="key">Updated</div><div class="val" id="view-user-updated">-</div>
                </div>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-outline-danger d-none" id="view-user-deactivate">Deactivate</button>
                <a class="btn btn-primary" href="#" id="view-user-edit">
                    <i class="fa-solid fa-pen-to-square me-2"></i> Edit User
                </a>
            </div>
        </div>
    </div>
</div>

<form id="viewDeactivateForm" method="post" class="d-none">
    <?= csrf_field() ?>
</form>

<div class="modal fade" id="editUserModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <div>
                    <h5 class="modal-title">Edit User</h5>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="editUserForm" method="post">
                <?= csrf_field() ?>
                <input type="hidden" name="name" value="">
                <div class="modal-body modal-form-grid">
                    <div class="row g-2">
                        <div class="col-md-4">
                            <label class="form-label" for="edit_first_name">First Name</label>
                            <input class="form-control" id="edit_first_name" name="first_name" required>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label" for="edit_last_name">Last Name</label>
                            <input class="form-control" id="edit_last_name" name="last_name" required>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label" for="edit_middle_initial">Middle Initial</label>
                            <input class="form-control" id="edit_middle_initial" name="middle_initial">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label" for="edit_email">Email Address</label>
                            <input class="form-control" id="edit_email" name="email" type="email" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label" for="edit_department_id">Division</label>
                            <select class="form-select" id="edit_department_id" name="department_id">
                                <option value="">Select Division</option>
                                <?php foreach ($departments as $department): ?>
                                    <option value="<?= esc($department['id']) ?>"><?= esc($department['name']) ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label" for="edit_role_id">Role</label>
                            <select class="form-select" id="edit_role_id" name="role_id" required>
                                <option value="">Select Role</option>
                                <?php foreach ($roles as $role): ?>
                                    <option value="<?= esc($role['id']) ?>"><?= esc($role['name']) ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label" for="edit_status">Status</label>
                            <select class="form-select" id="edit_status" name="status" required>
                                <option value="active">Active</option>
                                <option value="inactive">Inactive</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label" for="edit_password">New Password</label>
                            <input class="form-control" id="edit_password" name="password" type="password" autocomplete="new-password">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label" for="edit_password_confirmation">Confirm Password</label>
                            <input class="form-control" id="edit_password_confirmation" name="password_confirmation" type="password" autocomplete="new-password">
                        </div>
                    </div>
                </div>
                <div class="px-3 pb-2">
                    <button class="btn btn-link text-danger text-decoration-none p-0 d-none" type="button" id="editDeactivateButton">
                        <i class="fa-solid fa-user-slash me-1"></i> Deactivate account
                    </button>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button class="btn btn-primary" type="submit">
                        <i class="fa-solid fa-floppy-disk me-2"></i> Update
                    </button>
                </div>
            </form>
            <form id="editDeactivateForm" method="post" class="d-none">
                <?= csrf_field() ?>
            </form>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', () => {
    const joinName = (first, middle, last) => [first, middle, last].filter(Boolean).join(' ').replace(/\s+/g, ' ').trim();
    const toText = (value, fallback = '-') => (value && String(value).trim() !== '' ? String(value) : fallback);

    const bindFullName = (form) => {
        const first = form.querySelector('[name="first_name"]');
        const middle = form.querySelector('[name="middle_initial"]');
        const last = form.querySelector('[name="last_name"]');
        const full = form.querySelector('[name="name"]');

        const sync = () => {
            full.value = joinName(first.value, middle.value, last.value);
        };

        [first, middle, last].forEach((input) => input.addEventListener('input', sync));
        sync();
    };

    bindFullName(document.getElementById('addUserForm'));
    bindFullName(document.getElementById('editUserForm'));

    const addPassword = document.getElementById('add_password');
    const addPasswordConfirmation = document.getElementById('add_password_confirmation');
    const editPassword = document.getElementById('edit_password');
    const editPasswordConfirmation = document.getElementById('edit_password_confirmation');

    const validatePasswords = (password, confirmation) => {
        if ((password.value !== '' || confirmation.value !== '') && password.value !== confirmation.value) {
            confirmation.setCustomValidity('Passwords do not match.');
        } else {
            confirmation.setCustomValidity('');
        }
    };

    [addPassword, addPasswordConfirmation].forEach((input) => {
        input.addEventListener('input', () => validatePasswords(addPassword, addPasswordConfirmation));
    });
    [editPassword, editPasswordConfirmation].forEach((input) => {
        input.addEventListener('input', () => validatePasswords(editPassword, editPasswordConfirmation));
    });

    document.getElementById('addUserForm').addEventListener('submit', (event) => {
        validatePasswords(addPassword, addPasswordConfirmation);
        if (! addPasswordConfirmation.checkValidity()) {
            event.preventDefault();
            addPasswordConfirmation.reportValidity();
        }
    });

    document.getElementById('editUserForm').addEventListener('submit', (event) => {
        validatePasswords(editPassword, editPasswordConfirmation);
        if (! editPasswordConfirmation.checkValidity()) {
            event.preventDefault();
            editPasswordConfirmation.reportValidity();
        }
    });

    const formatDateTime = (value) => {
        if (! value) {
            return '-';
        }

        const date = new Date(value.replace(' ', 'T'));
        if (Number.isNaN(date.getTime())) {
            return value;
        }

        return date.toLocaleString([], {
            month: '2-digit',
            day: '2-digit',
            year: '2-digit',
            hour: '2-digit',
            minute: '2-digit',
        });
    };

    const viewModal = document.getElementById('viewUserModal');
    const viewDeactivateButton = document.getElementById('view-user-deactivate');
    const viewDeactivateForm = document.getElementById('viewDeactivateForm');
    viewModal.addEventListener('show.bs.modal', (event) => {
        const user = JSON.parse(event.relatedTarget.getAttribute('data-user'));

        document.getElementById('view-user-name').textContent = toText(user.name);
        document.getElementById('view-user-email').textContent = toText(user.email);
        document.getElementById('view-user-id').textContent = toText(user.id);
        document.getElementById('view-user-first-name').textContent = toText(user.first_name);
        document.getElementById('view-user-last-name').textContent = toText(user.last_name);
        document.getElementById('view-user-middle-initial').textContent = toText(user.middle_initial);
        document.getElementById('view-user-email-field').textContent = toText(user.email);
        document.getElementById('view-user-role').textContent = toText(user.role_name);
        document.getElementById('view-user-division').textContent = toText(user.department_name);
        document.getElementById('view-user-status').textContent = toText(user.status ? user.status.charAt(0).toUpperCase() + user.status.slice(1) : '');
        document.getElementById('view-user-signin').textContent = user.sso_provider ? `${user.sso_provider.charAt(0).toUpperCase() + user.sso_provider.slice(1)} SSO` : 'Password';
        document.getElementById('view-user-verified').textContent = user.email_verified ? 'Yes' : 'No';
        document.getElementById('view-user-last-login').textContent = formatDateTime(user.last_login_at);
        document.getElementById('view-user-created').textContent = formatDateTime(user.created_at);
        document.getElementById('view-user-updated').textContent = formatDateTime(user.updated_at);
        document.getElementById('view-user-edit').href = `<?= site_url('users') ?>/` + user.id + `/edit`;
        viewDeactivateButton.classList.toggle('d-none', user.status !== 'active');
        viewDeactivateForm.action = `<?= site_url('users') ?>/` + user.id + `/deactivate`;
    });

    viewDeactivateButton.addEventListener('click', () => {
        viewDeactivateForm.submit();
    });

    const editModal = document.getElementById('editUserModal');
    const editForm = document.getElementById('editUserForm');
    const editDeactivateButton = document.getElementById('editDeactivateButton');
    const editDeactivateForm = document.getElementById('editDeactivateForm');

    editModal.addEventListener('show.bs.modal', (event) => {
        const user = JSON.parse(event.relatedTarget.getAttribute('data-user'));

        const fullName = (user.name || '').trim();
        const parts = fullName.split(/\s+/);
        const firstName = user.first_name || parts[0] || '';
        const lastName = user.last_name || parts.slice(1).join(' ') || '';
        const middleInitial = user.middle_initial || '';

        editForm.action = `<?= site_url('users') ?>/` + user.id;
        editForm.querySelector('[name="name"]').value = fullName;
        editForm.querySelector('[name="first_name"]').value = firstName;
        editForm.querySelector('[name="last_name"]').value = lastName;
        editForm.querySelector('[name="middle_initial"]').value = middleInitial;
        editForm.querySelector('[name="email"]').value = user.email || '';
        editForm.querySelector('[name="role_id"]').value = user.role_id || '';
        editForm.querySelector('[name="department_id"]').value = user.department_id || '';
        editForm.querySelector('[name="status"]').value = user.status || 'active';
        editForm.querySelector('[name="password"]').value = '';
        editForm.querySelector('[name="password_confirmation"]').value = '';
        editDeactivateButton.classList.toggle('d-none', user.status !== 'active');

        const deactivateAction = `<?= site_url('users') ?>/` + user.id + `/deactivate`;
        editDeactivateForm.action = deactivateAction;
    });

    editDeactivateButton.addEventListener('click', () => {
        editDeactivateForm.submit();
    });
});
</script>

<?= $this->include('layout/footer') ?>
