<?= $this->extend('frontend/layout/app') ?>

<?= $this->section('content') ?>
<?php
$chartSource = $divisionStats ?? [];
$logPayload = static function (array $log): array {
    return [
        'id' => $log['id'] ?? '',
        'action' => $log['action'] ?? '',
        'description' => $log['description'] ?? '',
        'created_at' => $log['created_at'] ?? '',
        'user_name' => $log['user_name'] ?? '',
        'role_name' => $log['role_name'] ?? '',
        'user_email' => $log['user_email'] ?? '',
        'department_name' => $log['department_name'] ?? '',
        'page_url' => $log['page_url'] ?? '-',
        'user_agent' => $log['user_agent'] ?? '-',
        'ip_address' => $log['ip_address'] ?? '-',
        'contact_number' => $log['contact_number'] ?? '-',
        'position' => $log['position'] ?? '',
        'new_data' => $log['new_data'] ?? '-',
    ];
};
?>

<div class="row g-3 mb-3">
    <div class="col-6 col-md-4 col-lg-3 col-xl-3">
        <div class="stat-card">
            <div><div class="label">Total Users</div><div class="value"><?= esc($totalUsers) ?></div></div>
            <div class="stat-icon"><i class="fa-solid fa-users"></i></div>
        </div>
    </div>
    <div class="col-6 col-md-4 col-lg-3 col-xl-3">
        <div class="stat-card stat-card-alt">
            <div><div class="label">Active Users</div><div class="value"><?= esc($activeUsers) ?></div></div>
            <div class="stat-icon"><i class="fa-solid fa-user-check"></i></div>
        </div>
    </div>
    <div class="col-6 col-md-4 col-lg-3 col-xl-3">
        <div class="stat-card stat-card-soft">
            <div><div class="label">Employees</div><div class="value"><?= esc($totalEmployees) ?></div></div>
            <div class="stat-icon"><i class="fa-solid fa-users"></i></div>
        </div>
    </div>
    <div class="col-6 col-md-4 col-lg-3 col-xl-3">
        <div class="stat-card stat-card-muted">
            <div><div class="label">Technical Staff</div><div class="value"><?= esc($technicalStaff) ?></div></div>
            <div class="stat-icon"><i class="fa-solid fa-user-gear"></i></div>
        </div>
    </div>
</div>

<div class="row g-0">
    <div class="col-12">
        <section class="panel">
            <div class="panel-header" style="border-bottom: none;">
                <h2 class="panel-title">Users per Division</h2>
                <p class="panel-subtitle">Distribution of user accounts across divisions.</p>
            </div>
            <div class="dashboard-chart">
                <div class="dashboard-chart__frame">
                    <?php if ($chartSource !== []): ?>
                        <?php 
                        $maxValue = max(array_column($chartSource, 'total'));
                        $referenceLines = range(1, $maxValue);
                        $chartHeight = 200;
                        $topPadding = 20;
                        $bottomPadding = 30;
                        $availableHeight = $chartHeight - $topPadding - $bottomPadding;
                        ?>
                        <div class="css-bar-chart">
                            <div class="css-bar-chart__background">
                                <?php foreach ($referenceLines as $ref): ?>
                                    <?php 
                                    $bottomPosition = (($ref / $maxValue) * ($availableHeight / $chartHeight) * 100) + (($bottomPadding / $chartHeight) * 100);
                                    ?>
                                    <div class="css-bar-chart__reference-line" style="bottom: <?= $bottomPosition ?>%;">
                                        <span class="css-bar-chart__reference-label"><?= $ref ?></span>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                            <?php foreach ($chartSource as $index => $item):
                                $value = (int) ($item['total'] ?? 0);
                                $percentage = $maxValue > 0 ? ($value / $maxValue) * 100 : 0;
                                $color = $index % 2 === 0 ? 'rgba(79, 97, 128, 0.92)' : 'rgba(96, 114, 145, 0.92)';
                            ?>
                                <div class="css-bar-chart__item">
                                    <div class="css-bar-chart__bar" style="height: <?= esc($percentage) ?>%; background: <?= esc($color) ?>;" data-division="<?= esc($item['name'] ?? 'Unassigned') ?>" data-count="<?= esc($value) ?>">
                                        <div class="css-bar-chart__tooltip">
                                            <div class="css-bar-chart__tooltip-division"><?= esc($item['name'] ?? 'Unassigned') ?></div>
                                            <div class="css-bar-chart__tooltip-count"><?= esc($value) ?> users</div>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    <?php else: ?>
                        <div class="w-100 text-center text-muted-strong py-4">No division data available.</div>
                    <?php endif; ?>
                </div>
            </div>
        </section>
    </div>

    <div class="col-12">
        <section class="panel mb-0" style="margin-bottom: -8px;">
            <div class="panel-header">
                <h2 class="panel-title">Recent Activity</h2>
                <p class="panel-subtitle">Latest user activity and system changes.</p>
            </div>
            <div class="table-responsive mb-0">
                <table class="table align-middle mb-0">
                    <thead>
                    <tr>
                        <th style="width: 72px;">ID</th>
                        <th>Date / Time</th>
                        <th>User</th>
                        <th>Role</th>
                        <th>Activity</th>
                        <th>Description</th>
                        <th class="text-center" style="width: 72px;">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach (array_slice($recentLogs, 0, 10) as $log): ?>
                        <?php $payload = $logPayload($log); ?>
                        <tr>
                            <td><?= esc($log['id']) ?></td>
                            <td><?= esc($log['created_at'] ?? '') ?></td>
                            <td><?= esc($log['user_name'] ?? 'System') ?></td>
                            <td><?= esc($log['role_name'] ?? 'Unknown') ?></td>
                            <td><span class="badge badge-soft"><?= esc(str_replace('.', ' ', $log['action'] ?? '')) ?></span></td>
                            <td><span class="activity-meta activity-summary"><?= esc($log['description'] ?? '') ?></span></td>
                            <td class="text-center">
                                <button class="btn btn-outline-primary icon-btn" type="button" data-bs-toggle="modal" data-bs-target="#viewLogModal" data-log='<?= esc(json_encode($payload, JSON_UNESCAPED_SLASHES), "attr") ?>'>
                                    <i class="fa-regular fa-eye"></i>
                                </button>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                    <?php if ($recentLogs === []): ?>
                        <tr><td colspan="7" class="text-center text-muted-strong py-4">No activity yet.</td></tr>
                    <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </section>
    </div>
</div>

<?= $this->include('frontend/layout/log_modal', ['modalId' => 'viewLogModal', 'prefix' => 'log']) ?>
<?= $this->endSection() ?>

<?= $this->section('scripts') ?>
<?= $this->include('frontend/layout/log_modal_script', ['modalId' => 'viewLogModal', 'prefix' => 'log']) ?>

<?= $this->endSection() ?>
