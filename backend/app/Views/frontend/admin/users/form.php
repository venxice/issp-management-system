<?= $this->extend('frontend/layout/app') ?>

<?= $this->section('content') ?>
<?php
$isEdit = $user !== null;
$currentUser = is_array($user) ? $user : [];
$action = $isEdit ? site_url('admin/users/' . $user['id']) : site_url('admin/users');
?>

<div class="row g-3">
    <div class="col-xl-7">
        <section class="panel">
            <div class="panel-header">
                <h2 class="panel-title"><?= $isEdit ? 'Edit User' : 'Add New User' ?></h2>
                <p class="panel-subtitle">Assign the correct role and division before activating an account.</p>
            </div>

            <form action="<?= $action ?>" method="post" class="panel-body" id="userForm" novalidate>
                <?= csrf_field() ?>
                <?= $this->include('frontend/admin/users/_fields', [
                    'prefix' => 'form',
                    'user' => $currentUser,
                    'roles' => $roles ?? [],
                    'departments' => $departments ?? [],
                    'isEdit' => $isEdit,
                    'passwordRequired' => ! $isEdit,
                    'showPasswordHelp' => $isEdit,
                ]) ?>

                <div class="d-flex justify-content-end gap-2 mt-4">
                    <a class="btn btn-outline-secondary" href="<?= site_url('admin/users') ?>">Cancel</a>
                    <button class="btn btn-primary" type="submit" id="submitBtn">
                        <i class="fa-solid fa-floppy-disk me-2"></i> <?= $isEdit ? 'Update' : 'Add' ?>
                    </button>
                </div>
            </form>
        </section>
    </div>

    <div class="col-xl-5">
        <section class="panel">
            <div class="panel-header">
                <h2 class="panel-title">User Details</h2>
                <p class="panel-subtitle">Current account information and access summary.</p>
            </div>
            <div class="panel-body">
                <div class="row g-2 small">
                    <div class="col-5 text-muted-strong">Name</div>
                    <div class="col-7 fw-semibold"><?= esc($currentUser['name'] ?? 'New user') ?></div>
                    <div class="col-5 text-muted-strong">Email</div>
                    <div class="col-7 fw-semibold"><?= esc($currentUser['email'] ?? 'Pending') ?></div>
                    <div class="col-5 text-muted-strong">Role</div>
                    <div class="col-7 fw-semibold"><?= esc($currentUser['role_name'] ?? 'Unassigned') ?></div>
                    <div class="col-5 text-muted-strong">Division</div>
                    <div class="col-7 fw-semibold"><?= esc($currentUser['department_name'] ?? 'No division') ?></div>
                    <div class="col-5 text-muted-strong">Status</div>
                    <div class="col-7 fw-semibold"><?= esc(ucfirst($currentUser['status'] ?? 'active')) ?></div>
                    <div class="col-5 text-muted-strong">Sign-in</div>
                    <div class="col-7 fw-semibold"><?= ! empty($currentUser['sso_provider']) ? esc(ucfirst($currentUser['sso_provider'])) . ' SSO' : 'Password' ?></div>
                </div>
            </div>
        </section>
    </div>
</div>
<?= $this->endSection() ?>

<?= $this->section('scripts') ?>
<script>
document.addEventListener('DOMContentLoaded', function() {
    const form = document.getElementById('userForm');
    const isEdit = <?= $isEdit ? 'true' : 'false' ?>;

    if (!form) return;

    // Auto-sort dropdown options when dropdown is clicked
    const dropdowns = form.querySelectorAll('select.form-select');
    dropdowns.forEach(dropdown => {
        dropdown.addEventListener('click', function() {
            const options = Array.from(this.options);
            if (options.length <= 1) return; // Skip if only placeholder or empty

            // Check if already sorted
            let isSorted = true;
            for (let i = 1; i < options.length; i++) {
                if (options[i].text.toLowerCase() < options[i - 1].text.toLowerCase()) {
                    isSorted = false;
                    break;
                }
            }

            if (!isSorted) {
                // Sort options alphabetically (keep first option if it's a placeholder)
                const firstOption = options[0];
                const otherOptions = options.slice(1);

                otherOptions.sort((a, b) => a.text.toLowerCase().localeCompare(b.text.toLowerCase()));

                // Clear and re-add options
                while (this.options.length > 0) {
                    this.remove(0);
                }

                this.add(firstOption);
                otherOptions.forEach(option => this.add(option));

                // Preserve selected value
                if (this.value) {
                    this.value = this.dataset.selectedValue || this.value;
                }
            }
        });

        // Store selected value before sorting
        dropdown.addEventListener('mousedown', function() {
            this.dataset.selectedValue = this.value;
        });
    });

    form.addEventListener('submit', function(e) {
        e.preventDefault();
        e.stopPropagation();

        const firstName = document.getElementById('form_first_name');
        const lastName = document.getElementById('form_last_name');
        const email = document.getElementById('form_email');
        const roleId = document.getElementById('form_role_id');
        const positionId = document.getElementById('form_position_id');
        const departmentId = document.getElementById('form_department_id');
        const status = document.getElementById('form_status');
        const password = document.getElementById('form_password');
        const confirmPassword = document.getElementById('form_password_confirmation');

        let isValid = true;

        if (!firstName || !firstName.value || firstName.value.trim() === '') {
            firstName.setCustomValidity('First name is required');
            firstName.reportValidity();
            firstName.focus();
            isValid = false;
        } else {
            firstName.setCustomValidity('');
        }

        if (!lastName || !lastName.value || lastName.value.trim() === '') {
            lastName.setCustomValidity('Last name is required');
            lastName.reportValidity();
            if (isValid) lastName.focus();
            isValid = false;
        } else {
            lastName.setCustomValidity('');
        }

        if (!email || !email.value || email.value.trim() === '') {
            email.setCustomValidity('Email is required');
            email.reportValidity();
            if (isValid) email.focus();
            isValid = false;
        } else {
            email.setCustomValidity('');
        }

        if (!roleId || !roleId.value) {
            roleId.setCustomValidity('Role is required');
            roleId.reportValidity();
            if (isValid) roleId.focus();
            isValid = false;
        } else {
            roleId.setCustomValidity('');
        }

        if (!positionId || !positionId.value) {
            positionId.setCustomValidity('Position is required');
            positionId.reportValidity();
            if (isValid) positionId.focus();
            isValid = false;
        } else {
            positionId.setCustomValidity('');
        }

        if (!departmentId || !departmentId.value) {
            departmentId.setCustomValidity('Division is required');
            departmentId.reportValidity();
            if (isValid) departmentId.focus();
            isValid = false;
        } else {
            departmentId.setCustomValidity('');
        }

        if (!status || !status.value) {
            status.setCustomValidity('Status is required');
            status.reportValidity();
            if (isValid) status.focus();
            isValid = false;
        } else {
            status.setCustomValidity('');
        }

        if (!isEdit) {
            if (!password || !password.value || password.value.trim() === '') {
                password.setCustomValidity('Password is required');
                password.reportValidity();
                if (isValid) password.focus();
                isValid = false;
            } else {
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
                    password.setCustomValidity('Password must contain: ' + requirements.join(', '));
                    password.reportValidity();
                    if (isValid) password.focus();
                    isValid = false;
                } else {
                    password.setCustomValidity('');
                }
            }

            if (!confirmPassword || !confirmPassword.value || confirmPassword.value.trim() === '') {
                confirmPassword.setCustomValidity('Please confirm your password');
                confirmPassword.reportValidity();
                if (isValid) confirmPassword.focus();
                isValid = false;
            } else if (password.value !== confirmPassword.value) {
                confirmPassword.setCustomValidity('Passwords do not match');
                confirmPassword.reportValidity();
                if (isValid) confirmPassword.focus();
                isValid = false;
            } else {
                confirmPassword.setCustomValidity('');
            }
        } else {
            if (password && password.value && password.value.trim() !== '') {
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
                    password.setCustomValidity('Password must contain: ' + requirements.join(', '));
                    password.reportValidity();
                    if (isValid) password.focus();
                    isValid = false;
                } else {
                    password.setCustomValidity('');
                }

                if (!confirmPassword || !confirmPassword.value || confirmPassword.value.trim() === '') {
                    confirmPassword.setCustomValidity('Please confirm your password');
                    confirmPassword.reportValidity();
                    if (isValid) confirmPassword.focus();
                    isValid = false;
                } else if (password.value !== confirmPassword.value) {
                    confirmPassword.setCustomValidity('Passwords do not match');
                    confirmPassword.reportValidity();
                    if (isValid) confirmPassword.focus();
                    isValid = false;
                } else {
                    confirmPassword.setCustomValidity('');
                }
            }
        }

        if (isValid) {
            form.submit();
        }
    });

    const fields = ['form_first_name', 'form_last_name', 'form_email', 'form_role_id', 'form_position_id', 'form_department_id', 'form_status', 'form_password', 'form_password_confirmation'];
    fields.forEach(fieldId => {
        const field = document.getElementById(fieldId);
        if (field) {
            field.addEventListener('input', function() {
                this.setCustomValidity('');
            });
            field.addEventListener('change', function() {
                this.setCustomValidity('');
            });
        }
    });

    const passwordInput = document.getElementById('form_password');
    if (passwordInput) {
        passwordInput.addEventListener('input', function() {
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

    const confirmPasswordInput = document.getElementById('form_password_confirmation');
    if (confirmPasswordInput) {
        confirmPasswordInput.addEventListener('input', function() {
            const confirmPassword = this.value;
            const password = document.getElementById('form_password').value;

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
});
</script>
<?= $this->endSection() ?>
