<?= $this->extend('frontend/layout/app') ?>

<?= $this->section('content') ?>
<div class="row g-2 mb-2">
    <div class="col-md-4">
        <div class="stat-card">
            <div><div class="label">Your Division</div><div class="value"><?= esc($currentUser['department_name'] ?? 'Unassigned') ?></div></div>
            <div class="stat-icon"><i class="fa-solid fa-building"></i></div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="stat-card stat-card-alt">
            <div><div class="label">Role</div><div class="value"><?= esc($currentUser['role_name'] ?? 'Employee') ?></div></div>
            <div class="stat-icon"><i class="fa-solid fa-id-badge"></i></div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="stat-card stat-card-soft">
            <div><div class="label">Sign-in</div><div class="value"><?= ! empty($currentUser['sso_provider']) ? esc(ucfirst($currentUser['sso_provider'])) . ' SSO' : 'Password' ?></div></div>
            <div class="stat-icon"><i class="fa-solid fa-right-to-bracket"></i></div>
        </div>
    </div>
</div>

<div class="row g-2">
    <div class="col-lg-7">
        <section class="panel">
            <div class="panel-header">
                <h2 class="panel-title">Welcome</h2>
                <p class="panel-subtitle">This dashboard is organized for employee use.</p>
            </div>
            <div class="panel-body">
                <div class="p-3 border rounded-3">
                    <div class="fw-semibold mb-1"><?= esc($currentUser['name'] ?? 'Employee') ?></div>
                    <div class="small text-muted-strong mb-3"><?= esc($currentUser['email'] ?? '') ?></div>
                    <div class="small">Use this area for your daily work, submission tracking, and account overview.</div>
                </div>
            </div>
        </section>
    </div>

    <div class="col-lg-5">
        <section class="panel h-100">
            <div class="panel-header">
                <h2 class="panel-title">Your Recent Activity</h2>
                <p class="panel-subtitle">Latest actions on your account.</p>
            </div>
            <div class="table-responsive">
                <table class="table align-middle mb-0">
                    <thead>
                    <tr>
                        <th>Date</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach (array_slice($myLogs ?? [], 0, 6) as $log): ?>
                        <tr>
                            <td><?= esc($log['created_at'] ?? '') ?></td>
                            <td><?= esc($log['description'] ?? $log['action'] ?? '') ?></td>
                        </tr>
                    <?php endforeach; ?>
                    <?php if (($myLogs ?? []) === []): ?>
                        <tr><td colspan="2" class="text-center text-muted-strong py-4">No personal activity yet.</td></tr>
                    <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </section>
    </div>
</div>
<?= $this->endSection() ?>
