<?= $this->extend('frontend/layout/app') ?>

<?= $this->section('content') ?>
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
        'page_url' => $log['page_url'] ?? '-',
        'user_agent' => $log['user_agent'] ?? '-',
        'ip_address' => $log['ip_address'] ?? '-',
        'contact_number' => $log['contact_number'] ?? '-',
        'position' => $log['position'] ?? '',
        'new_data' => $log['new_data'] ?? '-',
    ];
};
?>

<section class="panel">
    <div class="panel-header d-flex flex-wrap gap-3 align-items-center justify-content-between">
        <div>
            <h2 class="panel-title">Audit Logs</h2>
            <p class="panel-subtitle">Review user activity and system changes.</p>
        </div>
        <form class="d-flex align-items-center toolbar-form audit-toolbar" method="get" action="<?= site_url('admin/audit-logs') ?>">
            <input class="form-control form-control-sm" name="q" value="<?= esc($query ?? '') ?>" placeholder="Search Activity">
            <input class="form-control form-control-sm" name="date" type="date" value="<?= esc($date ?? '') ?>">
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
                    <td><span class="badge badge-soft"><?= esc(str_replace('.', ' ', $log['action'] ?? '')) ?></span></td>
                    <td><span class="activity-meta activity-summary"><?= esc($log['description'] ?? '') ?></span></td>
                    <td class="text-center">
                        <button class="btn btn-outline-primary icon-btn" type="button" data-bs-toggle="modal" data-bs-target="#viewLogModal" data-log='<?= esc(json_encode($payload, JSON_UNESCAPED_SLASHES), 'attr') ?>'>
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

<?= $this->include('frontend/layout/log_modal', ['modalId' => 'viewLogModal', 'prefix' => 'log']) ?>
<?= $this->endSection() ?>

<?= $this->section('scripts') ?>
<?= $this->include('frontend/layout/log_modal_script', ['modalId' => 'viewLogModal', 'prefix' => 'log']) ?>
<script>
document.addEventListener('DOMContentLoaded', () => {
    const form = document.querySelector('form[action="<?= site_url('admin/audit-logs') ?>"]');
    const dateInput = form ? form.querySelector('input[name="date"]') : null;

    if (dateInput) {
        dateInput.addEventListener('change', () => form.submit());
    }
});
</script>
<?= $this->endSection() ?>
