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
        'position' => $log['position_name'] ?? '',
        'new_data' => $log['new_data'] ?? '-',
    ];
};
?>

<section class="panel">
    <div class="panel-header">
        <h2 class="panel-title">User Activity</h2>
        <p class="panel-subtitle">Review user activity and system changes.</p>
        <form class="d-flex align-items-center toolbar-form audit-toolbar" method="get" action="<?= site_url('admin/audit-logs') ?>">
            <input class="form-control form-control-sm" name="q" value="<?= esc($query ?? '') ?>" placeholder="Search Activity">
            <div class="position-relative date-range-picker-wrapper">
                <input class="form-control form-control-sm" name="date_range" type="text" value="<?= esc($date_range ?? '') ?>" placeholder="" id="dateRangePicker" readonly>
                <button type="button" class="date-picker-icon-btn" id="datePickerToggleBtn">
                    <i class="fa-solid fa-calendar-days"></i>
                </button>
            </div>
        </form>
    </div>

    <div class="table-responsive">
        <table class="table table-logs align-middle mb-0">
            <thead>
            <tr>
                <th>ID</th>
                <th>Date / Time</th>
                <th>User</th>
                <th>Role</th>
                <th>Activity</th>
                <th>Description</th>
                <th>IP Address</th>
                <th class="text-center">Action</th>
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
                    <td><span class="activity-meta"><?= esc($log['ip_address'] ?? '-') ?></span></td>
                    <td class="text-center">
                        <button class="btn btn-outline-primary icon-btn" type="button" data-bs-toggle="modal" data-bs-target="#viewLogModal" data-log='<?= esc(json_encode($payload, JSON_UNESCAPED_SLASHES), 'attr') ?>'>
                            <i class="fa-regular fa-eye"></i>
                        </button>
                    </td>
                </tr>
            <?php endforeach; ?>
            <?php if ($logs === []): ?>
                <tr><td colspan="8" class="text-center text-muted-strong py-4">No log entries found.</td></tr>
            <?php endif; ?>
            </tbody>
        </table>
    </div>

    <?php if ($pager && $total > $perPage): ?>
    <div class="d-flex justify-content-between align-items-center mt-3">
        <div class="text-muted">
            Showing <?= ($currentPage - 1) * $perPage + 1 ?> to <?= min($currentPage * $perPage, $total) ?> of <?= $total ?> entries
        </div>
        <nav>
            <ul class="pagination mb-0">
                <?php if ($currentPage > 1): ?>
                <li class="page-item">
                    <a class="page-link" href="<?= site_url('admin/audit-logs') ?>?<?= http_build_query(array_filter(['q' => $query, 'date_range' => $date_range, 'page' => $currentPage - 1])) ?>">Previous</a>
                </li>
                <?php endif; ?>

                <?php
                $totalPages = (int) ceil($total / $perPage);
                $startPage = max(1, $currentPage - 2);
                $endPage = min($totalPages, $currentPage + 2);

                if ($startPage > 1): ?>
                    <li class="page-item"><a class="page-link" href="<?= site_url('admin/audit-logs') ?>?<?= http_build_query(array_filter(['q' => $query, 'date_range' => $date_range, 'page' => 1])) ?>">1</a></li>
                    <?php if ($startPage > 2): ?>
                    <li class="page-item disabled"><span class="page-link">...</span></li>
                    <?php endif; ?>
                <?php endif; ?>

                <?php for ($i = $startPage; $i <= $endPage; $i++): ?>
                    <li class="page-item <?= $i === $currentPage ? 'active' : '' ?>">
                        <a class="page-link" href="<?= site_url('admin/audit-logs') ?>?<?= http_build_query(array_filter(['q' => $query, 'date_range' => $date_range, 'page' => $i])) ?>"><?= $i ?></a>
                    </li>
                <?php endfor; ?>

                <?php if ($endPage < $totalPages): ?>
                    <?php if ($endPage < $totalPages - 1): ?>
                    <li class="page-item disabled"><span class="page-link">...</span></li>
                    <?php endif; ?>
                    <li class="page-item"><a class="page-link" href="<?= site_url('admin/audit-logs') ?>?<?= http_build_query(array_filter(['q' => $query, 'date_range' => $date_range, 'page' => $totalPages])) ?>"><?= $totalPages ?></a></li>
                <?php endif; ?>

                <?php if ($currentPage < $totalPages): ?>
                <li class="page-item">
                    <a class="page-link" href="<?= site_url('admin/audit-logs') ?>?<?= http_build_query(array_filter(['q' => $query, 'date_range' => $date_range, 'page' => $currentPage + 1])) ?>">Next</a>
                </li>
                <?php endif; ?>
            </ul>
        </nav>
    </div>
    <?php endif; ?>
</section>

<?= $this->include('frontend/layout/log_modal', ['modalId' => 'viewLogModal', 'prefix' => 'log']) ?>
<?= $this->endSection() ?>

<?= $this->section('scripts') ?>
<?= $this->include('frontend/layout/log_modal_script', ['modalId' => 'viewLogModal', 'prefix' => 'log']) ?>
<style>
.date-range-picker-wrapper {
    width: 42px;
    flex-shrink: 0;
}

.date-range-picker-wrapper input {
    position: absolute;
    opacity: 0;
    pointer-events: none;
}

.date-picker-icon-btn {
    background: #4f6584;
    border: none;
    color: #fff;
    width: 38px;
    height: 28px;
    border-radius: 6px;
    cursor: pointer;
    display: grid;
    place-items: center;
    transition: background-color 0.2s ease;
}

.date-picker-icon-btn:hover {
    background: #344863;
}

.date-picker-icon-btn i {
    font-size: 0.8rem;
}

.flatpickr-calendar {
    font-family: "Segoe UI", system-ui, -apple-system, BlinkMacSystemFont, sans-serif;
    border: 1px solid #d9e0ea;
    border-radius: 10px;
    box-shadow: 0 12px 26px rgba(15, 23, 42, .1);
}

.flatpickr-day.selected,
.flatpickr-day.startRange,
.flatpickr-day.endRange,
.flatpickr-day.selected.inRange,
.flatpickr-day.startRange.inRange,
.flatpickr-day.endRange.inRange,
.flatpickr-day.selected:focus,
.flatpickr-day.startRange:focus,
.flatpickr-day.endRange:focus,
.flatpickr-day.selected:hover,
.flatpickr-day.startRange:hover,
.flatpickr-day.endRange:hover,
.flatpickr-day.selected.prevMonthDay,
.flatpickr-day.startRange.prevMonthDay,
.flatpickr-day.endRange.prevMonthDay,
.flatpickr-day.selected.nextMonthDay,
.flatpickr-day.startRange.nextMonthDay,
.flatpickr-day.endRange.nextMonthDay {
    background: #4f6584;
    border-color: #4f6584;
}

.flatpickr-day.inRange,
.flatpickr-day.prevMonthDay.inRange,
.flatpickr-day.nextMonthDay.inRange,
.flatpickr-day.today.inRange,
.flatpickr-day.prevMonthDay.today.inRange,
.flatpickr-day.nextMonthDay.today.inRange,
.flatpickr-day:hover,
.flatpickr-day.prevMonthDay:hover,
.flatpickr-day.nextMonthDay:hover,
.flatpickr-day:focus,
.flatpickr-day.prevMonthDay:focus,
.flatpickr-day.nextMonthDay:focus {
    background: rgba(79, 101, 132, 0.15);
    border-color: rgba(79, 101, 132, 0.15);
}

.flatpickr-months .flatpickr-month,
.flatpickr-current-month .flatpickr-monthDropdown-months,
.flatpickr-current-month input.cur-year {
    font-family: "Segoe UI", system-ui, -apple-system, BlinkMacSystemFont, sans-serif;
    font-weight: 600;
}

.flatpickr-weekday {
    font-weight: 600;
}

.flatpickr-day.today {
    border-color: #4f6584;
}
</style>
<script>
document.addEventListener('DOMContentLoaded', () => {
    const form = document.querySelector('form[action="<?= site_url('admin/audit-logs') ?>"]');
    const dateRangeInput = document.getElementById('dateRangePicker');
    const datePickerToggleBtn = document.getElementById('datePickerToggleBtn');

    if (dateRangeInput) {
        const fp = flatpickr(dateRangeInput, {
            mode: 'range',
            dateFormat: 'Y-m-d',
            position: 'auto',
            static: false,
            // Target the icon button wrapper so the calendar appears right under it
            positionElement: datePickerToggleBtn, 
            onChange: function(selectedDates, dateStr, instance) {
                // Automatically submit the filter form once both Start and End dates are selected
                if (selectedDates.length === 2) {
                    form.submit();
                }
            }
        });

        // Toggle button logic: Opens if closed, closes if clicked again while open
        if (datePickerToggleBtn && fp) {
            datePickerToggleBtn.addEventListener('click', function(e) {
                e.preventDefault();
                e.stopPropagation();
                
                if (fp.isOpen) {
                    fp.close();
                } else {
                    fp.open();
                }
            });
        }
    }
});
</script>
<?= $this->endSection() ?>
