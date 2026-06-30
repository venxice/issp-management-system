<?= $this->extend('frontend/layout/app') ?>

<?= $this->section('content') ?>
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
        'position_id' => $user['position_id'] ?? '',
        'position_name' => $user['position_name'] ?? '',
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
    <div class="panel-header">
        <h2 class="panel-title">User List</h2>
        <p class="panel-subtitle">Manage user accounts.</p>
        <div class="d-flex flex-wrap align-items-center gap-2 justify-content-end ms-auto">
            <form class="d-flex flex-wrap align-items-center toolbar-form" method="get" action="<?= site_url('admin/users') ?>">
                <input class="form-control form-control-sm" name="q" value="<?= esc($query ?? '') ?>" placeholder="Search Users" style="width: 168px;">
                <select class="form-select form-select-sm" name="department" style="width: 150px;">
                    <option value="">All Division</option>
                    <?php foreach ($departments as $department): ?>
                        <option value="<?= esc($department['id']) ?>" <?= ($departmentFilter ?? '') === $department['id'] ? 'selected' : '' ?>>
                            <?= esc($department['name']) ?>
                        </option>
                    <?php endforeach; ?>
                </select>
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
                        <div><?= esc($user['name']) ?></div>
                    </td>
                    <td><?= esc($user['email']) ?></td>
                    <td><?= esc($user['role_name'] ?? 'Unassigned') ?></td>
                    <td><?= esc($user['department_name'] ?? 'No division') ?></td>
                    <td>
                        <span class="badge <?= strtolower($user['status']) === 'active' ? 'bg-success text-white' : 'bg-danger text-white' ?>">
                            <?= esc(ucfirst($user['status'])) ?>
                        </span>
                    </td>
                    <td class="text-center">
                        <div class="d-inline-flex gap-1">
                            <button class="btn btn-outline-primary icon-btn view-user-btn" type="button" data-user='<?= esc(json_encode($payload, JSON_UNESCAPED_SLASHES), 'attr') ?>'>
                                <i class="fa-regular fa-eye"></i>
                            </button>
                            <button class="btn btn-outline-primary icon-btn" type="button" data-bs-toggle="modal" data-bs-target="#editUserModal" data-user='<?= esc(json_encode($payload, JSON_UNESCAPED_SLASHES), 'attr') ?>'>
                                <i class="fa-regular fa-pen-to-square"></i>
                            </button>
                        </div>
                    </td>
                </tr>
            <?php endforeach; ?>
            <?php if ($users === []): ?>
                <tr><td colspan="7" class="text-center text-muted-strong py-4">No users found.</td></tr>
            <?php endif; ?>
            </tbody>
        </table>
    </div>

    <?php if ($pager && $total > $perPage): ?>
    <div class="d-flex justify-content-between align-items-center mt-3">
        <div class="text-muted">
            Showing <?= ($currentPage - 1) * $perPage + 1 ?> to <?= min($currentPage * $perPage, $total) ?> of <?= $total ?> entries
        </div>
        <nav>
            <ul class="pagination mb-0">
                <?php if ($currentPage > 1): ?>
                <li class="page-item">
                    <a class="page-link" href="<?= site_url('admin/users') ?>?<?= http_build_query(array_filter(['q' => $query, 'department' => $departmentFilter, 'page' => $currentPage - 1])) ?>">Previous</a>
                </li>
                <?php endif; ?>
                
                <?php 
                $totalPages = (int) ceil($total / $perPage);
                $startPage = max(1, $currentPage - 2);
                $endPage = min($totalPages, $currentPage + 2);
                
                if ($startPage > 1): ?>
                    <li class="page-item"><a class="page-link" href="<?= site_url('admin/users') ?>?<?= http_build_query(array_filter(['q' => $query, 'department' => $departmentFilter, 'page' => 1])) ?>">1</a></li>
                    <?php if ($startPage > 2): ?>
                    <li class="page-item disabled"><span class="page-link">...</span></li>
                    <?php endif; ?>
                <?php endif; ?>

                <?php for ($i = $startPage; $i <= $endPage; $i++): ?>
                    <li class="page-item <?= $i === $currentPage ? 'active' : '' ?>">
                        <a class="page-link" href="<?= site_url('admin/users') ?>?<?= http_build_query(array_filter(['q' => $query, 'department' => $departmentFilter, 'page' => $i])) ?>"><?= $i ?></a>
                    </li>
                <?php endfor; ?>

                <?php if ($endPage < $totalPages): ?>
                    <?php if ($endPage < $totalPages - 1): ?>
                    <li class="page-item disabled"><span class="page-link">...</span></li>
                    <?php endif; ?>
                    <li class="page-item"><a class="page-link" href="<?= site_url('admin/users') ?>?<?= http_build_query(array_filter(['q' => $query, 'department' => $departmentFilter, 'page' => $totalPages])) ?>"><?= $totalPages ?></a></li>
                <?php endif; ?>

                <?php if ($currentPage < $totalPages): ?>
                <li class="page-item">
                    <a class="page-link" href="<?= site_url('admin/users') ?>?<?= http_build_query(array_filter(['q' => $query, 'department' => $departmentFilter, 'page' => $currentPage + 1])) ?>">Next</a>
                </li>
                <?php endif; ?>
            </ul>
        </nav>
    </div>
    <?php endif; ?>
</section>

<div class="modal fade" id="addUserModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <div><h5 class="modal-title">Add New User</h5></div>
            </div>
            <form id="addUserForm" action="<?= site_url('admin/users') ?>" method="post">
                <?= csrf_field() ?>
                <div class="modal-body modal-form-grid">
                    <?= $this->include('frontend/admin/users/_fields', [
                        'prefix' => 'add',
                        'user' => [],
                        'roles' => $roles,
                        'departments' => $departments,
                        'positions' => $positions ?? [],
                        'isEdit' => false,
                        'passwordRequired' => true,
                        'showPasswordHelp' => false,
                    ]) ?>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button class="btn btn-primary" type="submit"><i class="fa-solid fa-user-plus me-2"></i> Add</button>
                </div>
            </form>
        </div>
    </div>
</div>

<?= $this->include('frontend/layout/user_detail_modal', ['modalId' => 'viewUserModal', 'prefix' => 'view-user', 'showEdit' => true]) ?>

<form id="viewDeactivateForm" method="post" class="d-none"><?= csrf_field() ?></form>

<div class="modal fade" id="editUserModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <div><h5 class="modal-title">Edit User</h5></div>
            </div>
            <form id="editUserForm" method="post" novalidate>
                <?= csrf_field() ?>
                <div class="modal-body modal-form-grid">
                    <?= $this->include('frontend/admin/users/_fields', [
                        'prefix' => 'edit',
                        'user' => [],
                        'roles' => $roles,
                        'departments' => $departments,
                        'positions' => $positions ?? [],
                        'isEdit' => true,
                        'passwordRequired' => false,
                        'showPasswordHelp' => true,
                    ]) ?>
                </div>

                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button class="btn btn-primary" type="submit"><i class="fa-solid fa-floppy-disk me-2"></i> Update</button>
                </div>
            </form>
            <form id="editDeactivateForm" method="post" class="d-none"><?= csrf_field() ?></form>
            <form id="editReactivateForm" method="post" class="d-none"><?= csrf_field() ?></form>
        </div>
    </div>
</div>
<?= $this->endSection() ?>

<?= $this->section('scripts') ?>
<script>
document.addEventListener('DOMContentLoaded', () => {
    const form = document.querySelector('form[action="<?= site_url('admin/users') ?>"]');
    if (form) {
        form.addEventListener('change', (e) => {
            if (e.target.matches('select')) {
                form.submit();
            }
        });
        form.addEventListener('submit', (e) => {
        });
    }

    const toText = (value, fallback = '-') => (value && String(value).trim() !== '' ? String(value) : fallback);

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

    document.addEventListener('click', (e) => {
        const btn = e.target.closest('button.view-user-btn');
        if (! btn) return;
        const payload = btn.getAttribute('data-user') || btn.dataset.user || '{}';
        let user = {};
        try { user = JSON.parse(payload); } catch (err) { user = {}; }

        let modalEl = document.getElementById('viewUserModal') || document.querySelector('.log-modal');
        if (! modalEl) {
            console.error('viewUserModal element not found');
            return;
        }

        const focused = document.activeElement;
        if (focused && focused !== document.body) try { focused.blur(); } catch (e) { /* ignore */ }

        if (typeof bootstrap !== 'undefined' && bootstrap.Modal) {
            document.querySelectorAll('.modal.show').forEach((m) => {
                try {
                    const inst = bootstrap.Modal.getInstance(m);
                    if (inst) inst.hide();
                } catch (err) {
                }
            });
        }

        const set = (key, val) => { const el = document.getElementById('view-user-' + key); if (! el) return; el.textContent = (val === undefined || val === null || String(val).trim() === '') ? '-' : String(val); };

        set('user', user.name || '-');
        set('email', user.email || '-');
        set('email-field', user.email || '-');
        set('id', user.id || '-');
        set('role', user.role_name || '-');
        set('position', user.position_name || '-');
        set('division', user.department_name || '-');
        set('status', user.status || '-');
        set('created', user.created_at ? formatDateTime(user.created_at) : '-');
        set('updated', user.updated_at ? formatDateTime(user.updated_at) : '-');

        if (typeof bootstrap === 'undefined' || ! bootstrap.Modal) {
            console.error('Bootstrap Modal not available');
            return;
        }
        const instance = bootstrap.Modal.getOrCreateInstance(modalEl);
        instance.show();
        try {
            const closeBtn = modalEl.querySelector('.btn-close');
            if (closeBtn) closeBtn.focus();
        } catch (e) {}
    });

    const editModal = document.getElementById('editUserModal');
    const editForm = document.getElementById('editUserForm');
    const editDeactivateButton = document.getElementById('editDeactivateButton');
    const editDeactivateForm = document.getElementById('editDeactivateForm');
    const editReactivateButton = document.getElementById('editReactivateButton');
    const editReactivateForm = document.getElementById('editReactivateForm');

    editModal.addEventListener('show.bs.modal', (event) => {
        let user = null;
        try {
            if (event.relatedTarget && typeof event.relatedTarget.getAttribute === 'function') {
                const attr = event.relatedTarget.getAttribute('data-user');
                if (attr) user = JSON.parse(attr);
            }
        } catch (e) {
            user = null;
        }

        if (! user) {
            try {
                const data = (document.getElementById('editUserModal') && document.getElementById('editUserModal').dataset.user) || document.getElementById('editUserModal').getAttribute('data-user') || '{}';
                user = JSON.parse(data);
            } catch (e) {
                user = null;
            }
        }

        if (! user) return;

        const fullName = (user.name || '').trim();
        const parts = fullName.split(/\s+/);
        const firstName = user.first_name || parts[0] || '';
        const lastName = user.last_name || parts.slice(1).join(' ') || '';
        const middleInitial = user.middle_initial || '';

        editForm.action = `<?= site_url('admin/users') ?>/` + user.id;
        editForm.querySelector('[name="first_name"]').value = firstName;
        editForm.querySelector('[name="last_name"]').value = lastName;
        editForm.querySelector('[name="middle_initial"]').value = middleInitial;
        editForm.querySelector('[name="email"]').value = user.email || '';
        editForm.querySelector('[name="role_id"]').value = user.role_id || '';
        editForm.querySelector('[name="department_id"]').value = user.department_id || '';
        const posField = editForm.querySelector('[name="position_id"]');
        if (posField) {
            try { posField.value = user.position_id || ''; } catch (e) { /* ignore */ }
        }
        editForm.querySelector('[name="status"]').value = user.status || 'active';
        editForm.querySelector('[name="password"]').value = '';
        editForm.querySelector('[name="password_confirmation"]').value = '';
        editDeactivateButton.classList.toggle('d-none', user.status !== 'active');
        editReactivateButton.classList.toggle('d-none', user.status === 'active');

        editDeactivateForm.action = `<?= site_url('admin/users') ?>/` + user.id + `/deactivate`;
        editReactivateForm.action = `<?= site_url('admin/users') ?>/` + user.id + `/reactivate`;
    });

    editDeactivateButton.addEventListener('click', () => {
        editDeactivateForm.submit();
    });

    editReactivateButton.addEventListener('click', () => {
        editReactivateForm.submit();
    });

    const addForm = document.getElementById('addUserForm');
    const editFormElement = document.getElementById('editUserForm');

    console.log('Forms found:', {
        addForm: !!addForm,
        editFormElement: !!editFormElement
    });

    let pendingSubmitForm = null;
    const confirmModalEl = document.getElementById('confirmSubmitModal');
    const confirmModal = confirmModalEl ? new bootstrap.Modal(confirmModalEl) : null;
    const confirmMessageEl = document.getElementById('confirmSubmitMessage');
    const confirmButton = document.getElementById('confirmSubmitButton');

    const openConfirm = (form, message) => {
        pendingSubmitForm = form;
        if (confirmMessageEl) confirmMessageEl.textContent = message || 'Are you sure?';
        if (confirmModal) confirmModal.show();
    };

    if (confirmButton) {
        confirmButton.addEventListener('click', () => {
            if (! pendingSubmitForm) return;
            pendingSubmitForm.submit();
            pendingSubmitForm = null;
            if (confirmModal) confirmModal.hide();
        });
    }

    // Reset add form when modal is shown and hidden
    const addUserModal = document.getElementById('addUserModal');
    if (addUserModal) {
        addUserModal.addEventListener('show.bs.modal', () => {
            if (addForm) {
                addForm.reset();
                // Clear any password feedback
                addForm.querySelectorAll('.password-requirements, .password-match-status').forEach(el => el.remove());
            }
        });
        addUserModal.addEventListener('hidden.bs.modal', () => {
            if (addForm) {
                addForm.reset();
                // Clear any password feedback
                addForm.querySelectorAll('.password-requirements, .password-match-status').forEach(el => el.remove());
            }
        });
    }

    if (addForm) {
        addForm.addEventListener('submit', (e) => {
            console.log('Add User Form submitted');
            e.preventDefault();

            // Custom validation for add form - scoped to this form only
            const firstName = addForm.querySelector('[name="first_name"]');
            const lastName = addForm.querySelector('[name="last_name"]');
            const email = addForm.querySelector('[name="email"]');
            const roleId = addForm.querySelector('[name="role_id"]');
            const positionId = addForm.querySelector('[name="position_id"]');
            const departmentId = addForm.querySelector('[name="department_id"]');
            const status = addForm.querySelector('[name="status"]');
            const password = addForm.querySelector('[name="password"]');
            const confirmPassword = addForm.querySelector('[name="password_confirmation"]');

            console.log('Add form elements found:', {
                firstName: !!firstName,
                lastName: !!lastName,
                email: !!email,
                roleId: !!roleId,
                positionId: !!positionId,
                departmentId: !!departmentId,
                status: !!status,
                password: !!password,
                confirmPassword: !!confirmPassword
            });

            let isValid = true;
            let firstInvalidField = null;

            // Validate required fields
            if (!firstName || !firstName.value || firstName.value.trim() === '') {
                isValid = false;
                firstInvalidField = firstInvalidField || firstName;
            }
            if (!lastName || !lastName.value || lastName.value.trim() === '') {
                isValid = false;
                firstInvalidField = firstInvalidField || lastName;
            }
            if (!email || !email.value || email.value.trim() === '') {
                isValid = false;
                firstInvalidField = firstInvalidField || email;
            }
            if (!roleId || !roleId.value) {
                isValid = false;
                firstInvalidField = firstInvalidField || roleId;
            }
            if (!departmentId || !departmentId.value) {
                isValid = false;
                firstInvalidField = firstInvalidField || departmentId;
            }
            if (!status || !status.value) {
                isValid = false;
                firstInvalidField = firstInvalidField || status;
            }

            // Password is required for new users
            if (!password || !password.value || password.value.trim() === '') {
                alert('Password is required');
                if (password) password.focus();
                return;
            }

            // Check password requirements
            const requirements = [];
            if (password.value.length < 8) {
                requirements.push('8+ characters');
            }
            if (!/[A-Z]/.test(password.value)) {
                requirements.push('uppercase letter');
            }
            if (!/[a-z]/.test(password.value)) {
                requirements.push('lowercase letter');
            }
            if (!/[0-9]/.test(password.value)) {
                requirements.push('number');
            }
            if (!/[!@#$%^&*(),.?":{}|<>]/.test(password.value)) {
                requirements.push('special character');
            }

            if (requirements.length > 0) {
                showValidationModal('Password must contain: ' + requirements.join(', '));
                if (password) password.focus();
                return;
            }

            // Password confirmation is required
            if (!confirmPassword || !confirmPassword.value || confirmPassword.value.trim() === '') {
                alert('Please confirm your password');
                if (confirmPassword) confirmPassword.focus();
                return;
            }

            // Check if passwords match
            console.log('Password match check:', password.value, '===', confirmPassword.value, '=', password.value === confirmPassword.value);
            if (password.value !== confirmPassword.value) {
                alert('Passwords do not match');
                if (confirmPassword) confirmPassword.focus();
                return;
            }

            if (!isValid) {
                alert('Please fill in all required fields');
                if (firstInvalidField) firstInvalidField.focus();
                return;
            }

            openConfirm(addForm, 'Are you sure you want to add this user?');
        });

        // Real-time password feedback for add form
        const addPasswordInput = addForm.querySelector('[name="password"]');
        if (addPasswordInput) {
            addPasswordInput.addEventListener('input', function() {
                const password = this.value;
                const requirements = [];

                if (password.length > 0 && password.length < 8) {
                    requirements.push('8+ characters');
                }
                if (password.length > 0 && !/[A-Z]/.test(password)) {
                    requirements.push('uppercase');
                }
                if (password.length > 0 && !/[a-z]/.test(password)) {
                    requirements.push('lowercase');
                }
                if (password.length > 0 && !/[0-9]/.test(password)) {
                    requirements.push('number');
                }
                if (password.length > 0 && !/[!@#$%^&*(),.?":{}|<>]/.test(password)) {
                    requirements.push('special character');
                }

                const existingHelp = this.parentNode.querySelector('.password-requirements');
                if (existingHelp) {
                    existingHelp.remove();
                }

                if (requirements.length > 0) {
                    const helpDiv = document.createElement('div');
                    helpDiv.className = 'password-requirements text-muted small';
                    helpDiv.style.marginTop = '4px';
                    helpDiv.textContent = 'Missing: ' + requirements.join(', ');
                    this.parentNode.appendChild(helpDiv);
                }
            });
        }

        const addConfirmPasswordInput = addForm.querySelector('[name="password_confirmation"]');
        if (addConfirmPasswordInput) {
            addConfirmPasswordInput.addEventListener('input', function() {
                const confirmPassword = this.value;
                const password = addForm.querySelector('[name="password"]').value;

                const existingHelp = this.parentNode.querySelector('.password-match-status');
                if (existingHelp) {
                    existingHelp.remove();
                }

                if (confirmPassword.length > 0) {
                    const helpDiv = document.createElement('div');
                    helpDiv.className = 'password-match-status small';
                    helpDiv.style.marginTop = '4px';

                    if (password === confirmPassword) {
                        helpDiv.textContent = '✓ Passwords match';
                        helpDiv.style.color = '#198754';
                    } else {
                        helpDiv.textContent = '✗ Passwords do not match';
                        helpDiv.style.color = '#dc3545';
                    }

                    this.parentNode.appendChild(helpDiv);
                }
            });
        }
    }

    // Reset edit form when modal is shown and hidden to prevent content mixing
    const editUserModal = document.getElementById('editUserModal');
    if (editUserModal) {
        editUserModal.addEventListener('show.bs.modal', () => {
            if (editFormElement) {
                // Clear any password feedback
                editFormElement.querySelectorAll('.password-requirements, .password-match-status').forEach(el => el.remove());
            }
        });
        editUserModal.addEventListener('hidden.bs.modal', () => {
            if (editFormElement) {
                editFormElement.reset();
                // Clear any password feedback
                editFormElement.querySelectorAll('.password-requirements, .password-match-status').forEach(el => el.remove());
            }
        });
    }

    if (editFormElement) {
        editFormElement.addEventListener('submit', (e) => {
            console.log('Edit User Form submitted');
            e.preventDefault();

            // Custom validation for edit form
            const firstName = editFormElement.querySelector('[name="first_name"]');
            const lastName = editFormElement.querySelector('[name="last_name"]');
            const email = editFormElement.querySelector('[name="email"]');
            const roleId = editFormElement.querySelector('[name="role_id"]');
            const positionId = editFormElement.querySelector('[name="position_id"]');
            const departmentId = editFormElement.querySelector('[name="department_id"]');
            const status = editFormElement.querySelector('[name="status"]');
            const password = editFormElement.querySelector('[name="password"]');
            const confirmPassword = editFormElement.querySelector('[name="password_confirmation"]');

            console.log('Edit form elements found:', {
                firstName: !!firstName,
                lastName: !!lastName,
                email: !!email,
                roleId: !!roleId,
                positionId: !!positionId,
                departmentId: !!departmentId,
                status: !!status,
                password: !!password,
                confirmPassword: !!confirmPassword
            });

            let isValid = true;
            let firstInvalidField = null;

            // Validate required fields
            if (!firstName || !firstName.value || firstName.value.trim() === '') {
                isValid = false;
                firstInvalidField = firstInvalidField || firstName;
            }
            if (!lastName || !lastName.value || lastName.value.trim() === '') {
                isValid = false;
                firstInvalidField = firstInvalidField || lastName;
            }
            if (!email || !email.value || email.value.trim() === '') {
                isValid = false;
                firstInvalidField = firstInvalidField || email;
            }
            if (!roleId || !roleId.value) {
                isValid = false;
                firstInvalidField = firstInvalidField || roleId;
            }
            if (!departmentId || !departmentId.value) {
                isValid = false;
                firstInvalidField = firstInvalidField || departmentId;
            }
            if (!status || !status.value) {
                isValid = false;
                firstInvalidField = firstInvalidField || status;
            }

            // Password is optional - only validate if provided
            if (password && password.value && password.value.trim() !== '') {
                // Check password requirements
                const requirements = [];
                if (password.value.length < 8) {
                    requirements.push('8+ characters');
                }
                if (!/[A-Z]/.test(password.value)) {
                    requirements.push('uppercase letter');
                }
                if (!/[a-z]/.test(password.value)) {
                    requirements.push('lowercase letter');
                }
                if (!/[0-9]/.test(password.value)) {
                    requirements.push('number');
                }
                if (!/[!@#$%^&*(),.?":{}|<>]/.test(password.value)) {
                    requirements.push('special character');
                }

                if (requirements.length > 0) {
                    showValidationModal('Password must contain: ' + requirements.join(', '));
                    if (firstInvalidField) firstInvalidField.focus();
                    return;
                }

                // If password is provided, confirmation is required
                if (!confirmPassword || !confirmPassword.value || confirmPassword.value.trim() === '') {
                    alert('Please confirm your password');
                    if (confirmPassword) confirmPassword.focus();
                    return;
                }

                console.log('Edit password match check:', password.value, '===', confirmPassword.value, '=', password.value === confirmPassword.value);
                if (password.value !== confirmPassword.value) {
                    alert('Passwords do not match');
                    if (confirmPassword) confirmPassword.focus();
                    return;
                }
            }

            if (!isValid) {
                alert('Please fill in all required fields');
                if (firstInvalidField) firstInvalidField.focus();
                return;
            }

            openConfirm(editFormElement, 'Are you sure you want to update this user?');
        });

        // Real-time password feedback for edit form
        const editPasswordInput = editFormElement.querySelector('[name="password"]');
        if (editPasswordInput) {
            editPasswordInput.addEventListener('input', function() {
                const password = this.value;
                const requirements = [];

                if (password.length > 0 && password.length < 8) {
                    requirements.push('8+ characters');
                }
                if (password.length > 0 && !/[A-Z]/.test(password)) {
                    requirements.push('uppercase');
                }
                if (password.length > 0 && !/[a-z]/.test(password)) {
                    requirements.push('lowercase');
                }
                if (password.length > 0 && !/[0-9]/.test(password)) {
                    requirements.push('number');
                }
                if (password.length > 0 && !/[!@#$%^&*(),.?":{}|<>]/.test(password)) {
                    requirements.push('special character');
                }

                const existingHelp = this.parentNode.querySelector('.password-requirements');
                if (existingHelp) {
                    existingHelp.remove();
                }

                if (requirements.length > 0) {
                    const helpDiv = document.createElement('div');
                    helpDiv.className = 'password-requirements text-muted small';
                    helpDiv.style.marginTop = '4px';
                    helpDiv.textContent = 'Missing: ' + requirements.join(', ');
                    this.parentNode.appendChild(helpDiv);
                }
            });
        }

        const editConfirmPasswordInput = editFormElement.querySelector('[name="password_confirmation"]');
        if (editConfirmPasswordInput) {
            editConfirmPasswordInput.addEventListener('input', function() {
                const confirmPassword = this.value;
                const password = editFormElement.querySelector('[name="password"]').value;

                const existingHelp = this.parentNode.querySelector('.password-match-status');
                if (existingHelp) {
                    existingHelp.remove();
                }

                if (confirmPassword.length > 0) {
                    const helpDiv = document.createElement('div');
                    helpDiv.className = 'password-match-status small';
                    helpDiv.style.marginTop = '4px';

                    if (password === confirmPassword) {
                        helpDiv.textContent = '✓ Passwords match';
                        helpDiv.style.color = '#198754';
                    } else {
                        helpDiv.textContent = '✗ Passwords do not match';
                        helpDiv.style.color = '#dc3545';
                    }

                    this.parentNode.appendChild(helpDiv);
                }
            });
        }

        // Validation modal function
        function showValidationModal(message) {
            const validationModal = new bootstrap.Modal(document.getElementById('validationModal'));
            document.getElementById('validationMessage').textContent = message;
            validationModal.show();
        }
    }
});
</script>
<div class="modal fade" id="validationModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-sm modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Validation Error</h5>
      </div>
      <div class="modal-body">
        <p id="validationMessage">Please correct the following errors:</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-bs-dismiss="modal">OK</button>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="confirmSubmitModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-sm modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Confirm</h5>
      </div>
      <div class="modal-body">
        <p id="confirmSubmitMessage">Are you sure?</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancel</button>
        <button type="button" class="btn btn-primary" id="confirmSubmitButton">Confirm</button>
      </div>
    </div>
  </div>
</div>
<?= $this->endSection() ?>
