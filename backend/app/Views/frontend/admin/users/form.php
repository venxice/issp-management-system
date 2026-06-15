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

            <form action="<?= $action ?>" method="post" class="panel-body">
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
<?= $this->endSection() ?>
