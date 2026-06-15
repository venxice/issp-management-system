<?php
$isEdit = $user !== null;
$currentUser = is_array($user) ? $user : [];
$action = $isEdit ? site_url('users/' . $user['id']) : site_url('users');
?>
<?= $this->include('layout/header') ?>
<?= $this->include('layout/alerts') ?>

<div class="row g-3">
    <div class="col-xl-7">
        <section class="panel">
            <div class="panel-header">
                <h2 class="panel-title"><?= $isEdit ? 'Edit User' : 'Add New User' ?></h2>
                <p class="panel-subtitle">Assign the correct role and division before activating an account.</p>
            </div>

            <form action="<?= $action ?>" method="post" class="panel-body">
                <?= csrf_field() ?>

                <div class="row g-3">
                    <div class="col-md-4">
                        <label class="form-label fw-semibold" for="first_name">First Name</label>
                        <input class="form-control" id="first_name" name="name" value="<?= esc(old('name', $user['name'] ?? '')) ?>" placeholder="Enter first name" required>
                    </div>

                    <div class="col-md-4">
                        <label class="form-label fw-semibold" for="email">Email Address</label>
                        <input class="form-control" id="email" name="email" type="email" value="<?= esc(old('email', $user['email'] ?? '')) ?>" required>
                    </div>

                    <div class="col-md-4">
                        <label class="form-label fw-semibold" for="status">Status</label>
                        <select class="form-select" id="status" name="status" required>
                            <?php foreach (['active' => 'Active', 'inactive' => 'Inactive'] as $value => $label): ?>
                                <?php $selectedStatus = old('status', $user['status'] ?? 'active') === $value; ?>
                                <option value="<?= esc($value) ?>" <?= $selectedStatus ? 'selected' : '' ?>><?= esc($label) ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label fw-semibold" for="role_id">Role</label>
                        <select class="form-select" id="role_id" name="role_id" required>
                            <option value="">Select role</option>
                            <?php foreach ($roles as $role): ?>
                                <?php $selectedRole = (string) old('role_id', $user['role_id'] ?? '') === (string) $role['id']; ?>
                                <option value="<?= esc($role['id']) ?>" <?= $selectedRole ? 'selected' : '' ?>>
                                    <?= esc($role['name']) ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label fw-semibold" for="department_id">Division</label>
                        <select class="form-select" id="department_id" name="department_id">
                            <option value="">No division</option>
                            <?php foreach ($departments as $department): ?>
                                <?php $selectedDepartment = (string) old('department_id', $user['department_id'] ?? '') === (string) $department['id']; ?>
                                <option value="<?= esc($department['id']) ?>" <?= $selectedDepartment ? 'selected' : '' ?>>
                                    <?= esc($department['name']) ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label fw-semibold" for="password"><?= $isEdit ? 'New Password' : 'Password' ?></label>
                        <input class="form-control" id="password" name="password" type="password" autocomplete="new-password" <?= $isEdit ? '' : 'required' ?>>
                        <?php if ($isEdit): ?>
                            <div class="form-text">Leave blank to keep the current password.</div>
                        <?php endif; ?>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label fw-semibold" for="role_preview">Position</label>
                        <input class="form-control" id="role_preview" value="<?= esc($currentUser['role_name'] ?? 'Select a role') ?>" disabled>
                    </div>
                </div>

                <div class="d-flex justify-content-end gap-2 mt-4">
                    <a class="btn btn-outline-secondary" href="<?= site_url('users') ?>">Cancel</a>
                    <button class="btn btn-primary" type="submit">
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

<?= $this->include('layout/footer') ?>
