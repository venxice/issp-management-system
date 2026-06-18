<?php
$prefix = trim((string) ($prefix ?? ''));
$isEdit = (bool) ($isEdit ?? false);
$passwordRequired = (bool) ($passwordRequired ?? ! $isEdit);
$showPasswordHelp = (bool) ($showPasswordHelp ?? $isEdit);
$user = $user ?? [];
$roles = $roles ?? [];
$departments = $departments ?? [];
$positions = $positions ?? [];

$fieldId = static function (string $field) use ($prefix): string {
    return $prefix !== '' ? $prefix . '_' . $field : $field;
};
?>
<div class="row g-2">
    <div class="col-md-4">
        <label class="form-label fw-semibold" for="<?= esc($fieldId('first_name')) ?>">First Name</label>
        <input class="form-control" id="<?= esc($fieldId('first_name')) ?>" name="first_name" value="<?= esc(old('first_name', $user['first_name'] ?? '')) ?>" placeholder="Given name (e.g., Juan)" required>
    </div>
    <div class="col-md-4">
        <label class="form-label fw-semibold" for="<?= esc($fieldId('last_name')) ?>">Last Name</label>
        <input class="form-control" id="<?= esc($fieldId('last_name')) ?>" name="last_name" value="<?= esc(old('last_name', $user['last_name'] ?? '')) ?>" placeholder="Family name (e.g., Dela Cruz)" required>
    </div>
    <div class="col-md-4">
        <label class="form-label fw-semibold" for="<?= esc($fieldId('middle_initial')) ?>">Middle Initial</label>
        <input class="form-control" id="<?= esc($fieldId('middle_initial')) ?>" name="middle_initial" value="<?= esc(old('middle_initial', $user['middle_initial'] ?? '')) ?>" placeholder="Optional (e.g., M)">
    </div>

    <div class="col-md-6">
        <label class="form-label fw-semibold" for="<?= esc($fieldId('email')) ?>">Email Address</label>
        <input class="form-control" id="<?= esc($fieldId('email')) ?>" name="email" type="email" value="<?= esc(old('email', $user['email'] ?? '')) ?>" placeholder="user@example.gov.ph" required>
    </div>
    <div class="col-md-6">
        <label class="form-label fw-semibold" for="<?= esc($fieldId('status')) ?>">Status</label>
        <select class="form-select" id="<?= esc($fieldId('status')) ?>" name="status" required>
            <?php foreach (['active' => 'Active', 'inactive' => 'Inactive'] as $value => $label): ?>
                <?php $selectedStatus = old('status', $user['status'] ?? 'active') === $value; ?>
                <option value="<?= esc($value) ?>" <?= $selectedStatus ? 'selected' : '' ?>><?= esc($label) ?></option>
            <?php endforeach; ?>
        </select>
    </div>

    <div class="col-md-6">
        <label class="form-label fw-semibold" for="<?= esc($fieldId('role_id')) ?>">Role</label>
        <select class="form-select" id="<?= esc($fieldId('role_id')) ?>" name="role_id" required>
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
        <label class="form-label fw-semibold" for="<?= esc($fieldId('position_id')) ?>">Position</label>
        <select class="form-select" id="<?= esc($fieldId('position_id')) ?>" name="position_id" required>
            <option value="">Select position</option>
            <?php foreach ($positions ?? [] as $position): ?>
                <?php $selectedPosition = (string) old('position_id', $user['position_id'] ?? '') === (string) $position['id']; ?>
                <option value="<?= esc($position['id']) ?>" <?= $selectedPosition ? 'selected' : '' ?>>
                    <?= esc($position['name']) ?>
                </option>
            <?php endforeach; ?>
        </select>
    </div>

    <div class="col-md-12">
        <label class="form-label fw-semibold" for="<?= esc($fieldId('department_id')) ?>">Division</label>
        <select class="form-select" id="<?= esc($fieldId('department_id')) ?>" name="department_id" required>
            <option value="">Select division</option>
            <?php foreach ($departments as $department): ?>
                <?php $selectedDepartment = (string) old('department_id', $user['department_id'] ?? '') === (string) $department['id']; ?>
                <option value="<?= esc($department['id']) ?>" <?= $selectedDepartment ? 'selected' : '' ?>>
                    <?= esc($department['name']) ?>
                </option>
            <?php endforeach; ?>
        </select>
    </div>

    <?php if ($isEdit): ?>
    <div class="col-12">
        <hr>
        <small class="text-muted">Password editing is optional - you can update other fields without changing the password</small>
        <hr>
    </div>
    <?php endif; ?>

    <div class="col-md-6">
        <label class="form-label fw-semibold" for="<?= esc($fieldId('password')) ?>">
            <?= $isEdit ? 'New Password <span class="text-muted fw-normal">(Optional)</span>' : 'Password' ?>
        </label>

        <input class="form-control"
            id="<?= esc($fieldId('password')) ?>"
            name="password"
            type="password"
            autocomplete="new-password"
            placeholder="<?= $isEdit ? 'Leave blank to keep current password' : 'At least 8 characters' ?>"
            <?= $passwordRequired ? 'required' : '' ?>>

        <?php if ($isEdit): ?>
        <div class="form-text text-info">
            <i class="fa-solid fa-info-circle me-1"></i> Only edit password if you want to change it
        </div>
        <?php else: ?>
        <div class="form-text">
            Password editing is optional - you can update other fields without changing the password
        </div>
        <?php endif; ?>
    </div>

    <div class="col-md-6">
        <label class="form-label fw-semibold" for="<?= esc($fieldId('password_confirmation')) ?>">
            <?= $isEdit ? 'Confirm New Password' : 'Confirm Password' ?>
        </label>

        <input class="form-control"
            id="<?= esc($fieldId('password_confirmation')) ?>"
            name="password_confirmation"
            type="password"
            autocomplete="new-password"
            placeholder="<?= $isEdit ? 'Leave blank to keep current password' : 'Confirm password' ?>"
            <?= $passwordRequired ? 'required' : '' ?>>
    </div>
</div>