<?= $this->include('layout/header') ?>
<?= $this->include('layout/alerts') ?>

<?php
$chartSource = $divisionStats ?? [];
$chartMax = 1;
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
    $chartMax = max($chartMax, (int) ($item['total'] ?? 0));
}
?>

<div class="row g-2 mb-2">
    <div class="col-md-6 col-xl-3">
        <div class="stat-card">
            <div>
                <div class="label">Total Users</div>
                <div class="value"><?= esc($totalUsers) ?></div>
            </div>
            <div class="stat-icon"><i class="fa-solid fa-users"></i></div>
        </div>
    </div>
    <div class="col-md-6 col-xl-3">
        <div class="stat-card stat-card-alt">
            <div>
                <div class="label">Active Users</div>
                <div class="value"><?= esc($activeUsers) ?></div>
            </div>
            <div class="stat-icon"><i class="fa-solid fa-user-check"></i></div>
        </div>
    </div>
    <div class="col-md-6 col-xl-3">
        <div class="stat-card stat-card-soft">
            <div>
                <div class="label">Roles</div>
                <div class="value"><?= esc($totalRoles) ?></div>
            </div>
            <div class="stat-icon"><i class="fa-solid fa-user-shield"></i></div>
        </div>
    </div>
    <div class="col-md-6 col-xl-3">
        <div class="stat-card stat-card-muted">
            <div>
                <div class="label">Departments</div>
                <div class="value"><?= esc($departments) ?></div>
            </div>
            <div class="stat-icon"><i class="fa-solid fa-building"></i></div>
        </div>
    </div>
</div>

<div class="row g-2">
    <div class="col-12">
        <section class="panel">
            <div class="panel-header d-flex align-items-center justify-content-between">
                <div>
                    <h2 class="panel-title">Users per Division</h2>
                    <p class="panel-subtitle">Distribution of user accounts across departments.</p>
                </div>
            </div>
            <div class="dashboard-chart">
                <div class="dashboard-chart__frame">
                    <div class="chart-area">
                        <?php if ($chartSource !== []): ?>
                            <?php foreach ($chartSource as $item): ?>
                                <?php
                                $value = (int) ($item['total'] ?? 0);
                                $height = max(16, (int) round(($value / $chartMax) * 118));
                                $label = (string) ($item['name'] ?? 'Unassigned');
                                ?>
                                <div class="chart-column">
                                    <div class="chart-value"><?= esc($value) ?></div>
                                    <div class="chart-bar" style="height: <?= esc($height) ?>px;"></div>
                                    <div class="chart-label"><?= esc($label) ?></div>
                                </div>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <div class="w-100 text-center text-muted-strong py-4">No division data available.</div>
                        <?php endif; ?>
                    </div>
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
            <div class="table-responsive dashboard-table">
                <table class="table align-middle mb-0">
                    <thead>
                    <tr>
                        <th style="width: 26%;">Activity</th>
                        <th style="width: 18%;">User</th>
                        <th style="width: 18%;">Role</th>
                        <th style="width: 16%;">Date/Time</th>
                        <th style="width: 64px;" class="text-center">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach (array_slice($recentLogs, 0, 6) as $log): ?>
                        <?php $payload = $logPayload($log); ?>
                        <?php $createdAt = ! empty($log['created_at']) ? strtotime($log['created_at']) : false; ?>
                        <tr>
                            <td>
                                <div class="fw-semibold"><?= esc($log['action'] ?? 'event') ?></div>
                                <div class="activity-meta activity-summary"><?= esc($log['description'] ?? '') ?></div>
                            </td>
                            <td class="text-nowrap"><?= esc($log['user_name'] ?? 'System') ?></td>
                            <td class="text-nowrap"><?= esc($log['role_name'] ?? 'Unknown') ?></td>
                            <td>
                                <?php if ($createdAt !== false): ?>
                                    <div class="fw-semibold"><?= esc(date('m-d-y', $createdAt)) ?></div>
                                    <div class="activity-meta"><?= esc(date('h:i A', $createdAt)) ?></div>
                                <?php else: ?>
                                    <span class="activity-meta"><?= esc($log['created_at'] ?? '') ?></span>
                                <?php endif; ?>
                            </td>
                            <td class="text-center">
                                <button
                                    class="btn btn-outline-primary icon-btn"
                                    type="button"
                                    data-bs-toggle="modal"
                                    data-bs-target="#dashboardLogModal"
                                    data-log='<?= esc(json_encode($payload, JSON_UNESCAPED_SLASHES), 'attr') ?>'
                                >
                                    <i class="fa-regular fa-eye"></i>
                                </button>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                    <?php if ($recentLogs === []): ?>
                        <tr>
                            <td colspan="5" class="text-center text-muted-strong py-4">No activity yet.</td>
                        </tr>
                    <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </section>
    </div>
</div>

<div class="modal fade" id="dashboardLogModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <div>
                    <h5 class="modal-title">User Activity</h5>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="d-flex align-items-center gap-3 mb-3">
                    <div class="brand-mark flex-shrink-0" style="width: 42px; height: 42px; background: #e9eef5; color: #526784;">
                        <i class="fa-solid fa-user"></i>
                    </div>
                    <div>
                        <div class="fw-semibold" id="dash-log-user">-</div>
                        <div class="activity-meta" id="dash-log-email">-</div>
                    </div>
                </div>
                <div class="detail-list">
                    <div class="key">ID</div><div class="val" id="dash-log-id">-</div>
                    <div class="key">Email Address</div><div class="val" id="dash-log-email-field">-</div>
                    <div class="key">Contact Number</div><div class="val" id="dash-log-contact">-</div>
                    <div class="key">Date / Time</div><div class="val" id="dash-log-time">-</div>
                    <div class="key">Role</div><div class="val" id="dash-log-role">-</div>
                    <div class="key">Position</div><div class="val" id="dash-log-position">-</div>
                    <div class="key">Division</div><div class="val" id="dash-log-division">-</div>
                    <div class="key">Activity</div><div class="val" id="dash-log-action">-</div>
                    <div class="key">IP Address</div><div class="val" id="dash-log-ip">-</div>
                </div>

                <div class="mt-3">
                    <div class="small text-muted-strong mb-1">Description</div>
                    <div class="small" id="dash-log-description">-</div>
                </div>
                <div class="mt-3">
                    <div class="small text-muted-strong mb-1">Page URL</div>
                    <div class="small" id="dash-log-page-url">-</div>
                </div>
                <div class="mt-3">
                    <div class="small text-muted-strong mb-1">User Agent</div>
                    <div class="small" id="dash-log-user-agent">-</div>
                </div>
                <div class="mt-3">
                    <div class="small text-muted-strong mb-1">New Data</div>
                    <div class="small" id="dash-log-new-data">-</div>
                </div>
            </div>
            <div class="modal-footer modal-footer-dark">
                <button type="button" class="btn btn-primary w-100" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', () => {
    const modal = document.getElementById('dashboardLogModal');

    modal.addEventListener('show.bs.modal', (event) => {
        const log = JSON.parse(event.relatedTarget.getAttribute('data-log'));

        document.getElementById('dash-log-id').textContent = log.id || '-';
        document.getElementById('dash-log-user').textContent = log.user_name || 'System';
        document.getElementById('dash-log-email').textContent = log.user_email || '-';
        document.getElementById('dash-log-email-field').textContent = log.user_email || '-';
        document.getElementById('dash-log-contact').textContent = log.contact_number || '-';
        document.getElementById('dash-log-role').textContent = log.role_name || 'Unknown';
        document.getElementById('dash-log-position').textContent = log.position || '-';
        document.getElementById('dash-log-division').textContent = log.department_name || '-';
        document.getElementById('dash-log-time').textContent = log.created_at || '-';
        document.getElementById('dash-log-action').textContent = log.action || '-';
        document.getElementById('dash-log-description').textContent = log.description || '-';
        document.getElementById('dash-log-ip').textContent = log.ip_address || '-';
        document.getElementById('dash-log-page-url').textContent = log.page_url || '-';
        document.getElementById('dash-log-user-agent').textContent = log.user_agent || '-';
        document.getElementById('dash-log-new-data').textContent = log.new_data || '-';
    });
});
</script>

<?= $this->include('layout/footer') ?>
