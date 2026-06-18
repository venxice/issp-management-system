<?= $this->extend('frontend/layout/app') ?>

<?= $this->section('content') ?>
<?php
$summaryLogs = $recentLogs ?? [];
?>

<div class="row g-2 mb-2">
    <div class="col-md-6 col-xl-3">
        <div class="stat-card">
            <div><div class="label">Total Users</div><div class="value"><?= esc($totalUsers) ?></div></div>
            <div class="stat-icon"><i class="fa-solid fa-users"></i></div>
        </div>
    </div>
    <div class="col-md-6 col-xl-3">
        <div class="stat-card stat-card-alt">
            <div><div class="label">Active Users</div><div class="value"><?= esc($activeUsers) ?></div></div>
            <div class="stat-icon"><i class="fa-solid fa-user-check"></i></div>
        </div>
    </div>
    <div class="col-md-6 col-xl-3">
        <div class="stat-card stat-card-soft">
            <div><div class="label">Divisions</div><div class="value"><?= esc($departments) ?></div></div>
            <div class="stat-icon"><i class="fa-solid fa-building"></i></div>
        </div>
    </div>
    <div class="col-md-6 col-xl-3">
        <div class="stat-card stat-card-muted">
            <div><div class="label">Activity Logs</div><div class="value"><?= esc(count($summaryLogs)) ?></div></div>
            <div class="stat-icon"><i class="fa-solid fa-file-lines"></i></div>
        </div>
    </div>
</div>

<div class="row g-2">
    <div class="col-lg-8">
        <section class="panel">
            <div class="panel-header">
                <h2 class="panel-title">Director General Overview</h2>
                <p class="panel-subtitle">A consolidated view of the ISSP workspace.</p>
            </div>
            <div class="panel-body">
                <div class="row g-3">
                    <div class="col-md-4">
                        <div class="p-3 border rounded-3 h-100">
                            <div class="text-muted-strong small">Users</div>
                            <div class="fs-4 fw-bold"><?= esc($totalUsers) ?></div>
                            <div class="small text-muted-strong">Registered across all divisions.</div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="p-3 border rounded-3 h-100">
                            <div class="text-muted-strong small">Employees</div>
                            <div class="fs-4 fw-bold"><?= esc($totalEmployees) ?></div>
                            <div class="small text-muted-strong">Accounts tagged as employee role.</div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="p-3 border rounded-3 h-100">
                            <div class="text-muted-strong small">Divisions</div>
                            <div class="fs-4 fw-bold"><?= esc($departments) ?></div>
                            <div class="small text-muted-strong">Active organizational divisions.</div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <div class="col-lg-4">
        <section class="panel h-100">
            <div class="panel-header">
                <h2 class="panel-title">Priority Items</h2>
                <p class="panel-subtitle">Suggested areas to review first.</p>
            </div>
            <div class="panel-body">
                <ul class="list-unstyled mb-0 small">
                    <li class="mb-2"><i class="fa-solid fa-circle-check me-2 text-success"></i> Check division distribution and staffing balance.</li>
                    <li class="mb-2"><i class="fa-solid fa-circle-check me-2 text-success"></i> Review recent account activity and sign-ins.</li>
                    <li><i class="fa-solid fa-circle-check me-2 text-success"></i> Validate users awaiting role or division assignment.</li>
                </ul>
            </div>
        </section>
    </div>

    <div class="col-12">
        <section class="panel">
            <div class="panel-header">
                <h2 class="panel-title">Recent Activity</h2>
                <p class="panel-subtitle">Latest records for executive review.</p>
            </div>
            <div class="table-responsive">
                <table class="table align-middle mb-0">
                    <thead>
                    <tr>
                        <th style="width: 72px;">ID</th>
                        <th>Date / Time</th>
                        <th>User</th>
                        <th>Role</th>
                        <th>Activity</th>
                        <th>Description</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach (array_slice($summaryLogs, 0, 8) as $log): ?>
                        <tr>
                            <td><?= esc($log['id']) ?></td>
                            <td><?= esc($log['created_at'] ?? '') ?></td>
                            <td><?= esc($log['user_name'] ?? 'System') ?></td>
                            <td><?= esc($log['role_name'] ?? 'Unknown') ?></td>
                            <td><span class="badge badge-soft"><?= esc($log['action'] ?? '') ?></span></td>
                            <td><?= esc($log['description'] ?? '') ?></td>
                        </tr>
                    <?php endforeach; ?>
                    <?php if ($summaryLogs === []): ?>
                        <tr><td colspan="6" class="text-center text-muted-strong py-4">No activity yet.</td></tr>
                    <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </section>
    </div>
</div>
<?= $this->endSection() ?>
