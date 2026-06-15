<?= $this->include('layout/header') ?>
<?= $this->include('layout/alerts') ?>

<?php
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
?>

<section class="panel">
    <div class="panel-header d-flex flex-wrap gap-3 align-items-center justify-content-between">
        <div>
            <h2 class="panel-title">Audit Logs</h2>
            <p class="panel-subtitle">Review user activity and system changes.</p>
        </div>
        <form class="d-flex align-items-center toolbar-form" method="get" action="<?= site_url('audit-logs') ?>">
            <input class="form-control form-control-sm" name="q" value="<?= esc($query ?? '') ?>" placeholder="Search Activity" style="width: 220px;">
            <button class="btn btn-outline-primary" type="submit">
                <i class="fa-solid fa-magnifying-glass"></i>
            </button>
        </form>
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
            <?php foreach ($logs as $log): ?>
                <?php $payload = $logPayload($log); ?>
                <tr>
                    <td><?= esc($log['id']) ?></td>
                    <td><?= esc($log['created_at'] ?? '') ?></td>
                    <td><?= esc($log['user_name'] ?? 'System') ?></td>
                    <td><?= esc($log['role_name'] ?? 'Unknown') ?></td>
                    <td><span class="badge badge-soft"><?= esc($log['action'] ?? '') ?></span></td>
                    <td><span class="activity-meta activity-summary"><?= esc($log['description'] ?? '') ?></span></td>
                    <td class="text-center">
                        <button
                            class="btn btn-outline-primary icon-btn"
                            type="button"
                            data-bs-toggle="modal"
                            data-bs-target="#viewLogModal"
                            data-log='<?= esc(json_encode($payload, JSON_UNESCAPED_SLASHES), 'attr') ?>'
                        >
                            <i class="fa-regular fa-eye"></i>
                        </button>
                    </td>
                </tr>
            <?php endforeach; ?>
            <?php if ($logs === []): ?>
                <tr><td colspan="7" class="text-center text-muted-strong py-4">No log entries found.</td></tr>
            <?php endif; ?>
            </tbody>
        </table>
    </div>
</section>

<div class="modal fade" id="viewLogModal" tabindex="-1" aria-hidden="true">
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
                        <div class="fw-semibold" id="log-user">-</div>
                        <div class="activity-meta" id="log-email">-</div>
                    </div>
                </div>
                <div class="detail-list">
                    <div class="key">ID</div><div class="val" id="log-id">-</div>
                    <div class="key">Email Address</div><div class="val" id="log-email-field">-</div>
                    <div class="key">Contact Number</div><div class="val" id="log-contact">-</div>
                    <div class="key">Date / Time</div><div class="val" id="log-time">-</div>
                    <div class="key">Role</div><div class="val" id="log-role">-</div>
                    <div class="key">Position</div><div class="val" id="log-position">-</div>
                    <div class="key">Division</div><div class="val" id="log-division">-</div>
                    <div class="key">Activity</div><div class="val" id="log-action">-</div>
                    <div class="key">IP Address</div><div class="val" id="log-ip">-</div>
                </div>

                <div class="mt-3">
                    <div class="small text-muted-strong mb-1">Description</div>
                    <div class="small" id="log-description">-</div>
                </div>
                <div class="mt-3">
                    <div class="small text-muted-strong mb-1">Page URL</div>
                    <div class="small" id="log-page-url">-</div>
                </div>
                <div class="mt-3">
                    <div class="small text-muted-strong mb-1">User Agent</div>
                    <div class="small" id="log-user-agent">-</div>
                </div>
                <div class="mt-3">
                    <div class="small text-muted-strong mb-1">New Data</div>
                    <div class="small" id="log-new-data">-</div>
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
    const modal = document.getElementById('viewLogModal');

    modal.addEventListener('show.bs.modal', (event) => {
        const log = JSON.parse(event.relatedTarget.getAttribute('data-log'));

        document.getElementById('log-id').textContent = log.id || '-';
        document.getElementById('log-user').textContent = log.user_name || 'System';
        document.getElementById('log-email').textContent = log.user_email || '-';
        document.getElementById('log-email-field').textContent = log.user_email || '-';
        document.getElementById('log-contact').textContent = log.contact_number || '-';
        document.getElementById('log-role').textContent = log.role_name || 'Unknown';
        document.getElementById('log-position').textContent = log.position || '-';
        document.getElementById('log-division').textContent = log.department_name || '-';
        document.getElementById('log-time').textContent = log.created_at || '-';
        document.getElementById('log-action').textContent = log.action || '-';
        document.getElementById('log-description').textContent = log.description || '-';
        document.getElementById('log-ip').textContent = log.ip_address || '-';
        document.getElementById('log-page-url').textContent = log.page_url || '-';
        document.getElementById('log-user-agent').textContent = log.user_agent || '-';
        document.getElementById('log-new-data').textContent = log.new_data || '-';
    });
});
</script>

<?= $this->include('layout/footer') ?>
