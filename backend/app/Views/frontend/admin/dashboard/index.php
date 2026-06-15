<?= $this->extend('frontend/layout/app') ?>

<?= $this->section('content') ?>
<?php
$chartSource = $divisionStats ?? [];
$chartLabels = [];
$chartValues = [];
$chartColors = [];
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
        'page_url' => '-',
        'user_agent' => '-',
        'ip_address' => '-',
        'contact_number' => '-',
        'position' => $log['role_name'] ?? '',
        'new_data' => '-',
    ];
};

foreach ($chartSource as $item) {
    $chartLabels[] = (string) ($item['name'] ?? 'Unassigned');
    $chartValues[] = (int) ($item['total'] ?? 0);
}

$chartColors = array_map(static function (int $index): string {
    return $index % 2 === 0 ? 'rgba(79, 97, 128, 0.92)' : 'rgba(96, 114, 145, 0.92)';
}, array_keys($chartValues));

$chartCanvasWidth = max(560, count($chartSource) * 92);
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
            <div><div class="label">Employees</div><div class="value"><?= esc($totalEmployees) ?></div></div>
            <div class="stat-icon"><i class="fa-solid fa-users"></i></div>
        </div>
    </div>
    <div class="col-md-6 col-xl-3">
        <div class="stat-card stat-card-muted">
            <div><div class="label">Technical Staff</div><div class="value"><?= esc($technicalStaff) ?></div></div>
            <div class="stat-icon"><i class="fa-solid fa-user-gear"></i></div>
        </div>
    </div>
</div>

<div class="row g-2">
    <div class="col-12">
        <section class="panel">
            <div class="panel-header d-flex align-items-center justify-content-between">
                <div>
                    <h2 class="panel-title">Users per Division</h2>
                    <p class="panel-subtitle">Distribution of user accounts across divisions.</p>
                </div>
            </div>
            <div class="dashboard-chart">
                <div class="dashboard-chart__frame">
                    <?php if ($chartSource !== []): ?>
                        <div class="dashboard-chart__scroll">
                            <div class="division-chart-wrap">
                                <div class="division-chart-canvas-wrap" style="width: <?= esc($chartCanvasWidth) ?>px;">
                                    <canvas id="divisionChart" height="220"></canvas>
                                </div>
                            </div>
                        </div>
                    <?php else: ?>
                        <div class="w-100 text-center text-muted-strong py-4">No division data available.</div>
                    <?php endif; ?>
                </div>
            </div>
        </section>
    </div>

    <div class="col-12">
        <section class="panel">
            <div class="panel-header d-flex align-items-center justify-content-between">
                <div>
                    <h2 class="panel-title">Recent Activity</h2>
                    <p class="panel-subtitle">Latest security and administration events.</p>
                </div>
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
                            <td><span class="badge badge-soft"><?= esc($log['action'] ?? '') ?></span></td>
                            <td><span class="activity-meta activity-summary"><?= esc($log['description'] ?? '') ?></span></td>
                            <td class="text-center">
                                <button class="btn btn-outline-primary icon-btn" type="button" data-bs-toggle="modal" data-bs-target="#dashboardLogModal" data-log='<?= esc(json_encode($payload, JSON_UNESCAPED_SLASHES), 'attr') ?>'>
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

<?= $this->include('frontend/layout/log_modal', ['modalId' => 'dashboardLogModal', 'prefix' => 'dash-log']) ?>
<?= $this->endSection() ?>

<?= $this->section('scripts') ?>
<script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.3/dist/chart.umd.min.js"></script>
<?= $this->include('frontend/layout/log_modal_script', ['modalId' => 'dashboardLogModal', 'prefix' => 'dash-log']) ?>
<script>
document.addEventListener('DOMContentLoaded', () => {
    const canvas = document.getElementById('divisionChart');
    if (! canvas || ! window.Chart) {
        return;
    }

    const labels = <?= json_encode($chartLabels, JSON_UNESCAPED_SLASHES) ?>;
    const values = <?= json_encode($chartValues, JSON_UNESCAPED_SLASHES) ?>;
    const colors = <?= json_encode($chartColors, JSON_UNESCAPED_SLASHES) ?>;

    new Chart(canvas, {
        type: 'bar',
        data: { labels, datasets: [{ label: 'Users', data: values, backgroundColor: colors, borderColor: colors, borderWidth: 1, borderRadius: 4, barThickness: 22, maxBarThickness: 28, categoryPercentage: 0.58, barPercentage: 0.72 }] },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            animation: false,
            plugins: { legend: { display: false }, tooltip: { callbacks: { label: (context) => ` Users: ${context.parsed.y}`, title: (items) => items[0] ? `Division: ${items[0].label}` : '' } } },
            scales: {
                x: { grid: { display: false }, ticks: { color: '#6b7280', maxRotation: 15, minRotation: 0, autoSkip: false, padding: 8 }, offset: true },
                y: { beginAtZero: true, ticks: { precision: 0, color: '#6b7280', padding: 8, stepSize: 1 }, grid: { color: 'rgba(15, 23, 42, .07)' }, max: Math.max(...values, 0) + 1 },
            },
            layout: { padding: { top: 6, right: 8, bottom: 10, left: 8 } },
        },
    });
});
</script>
<?= $this->endSection() ?>
