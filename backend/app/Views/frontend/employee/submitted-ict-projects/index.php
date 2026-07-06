<?= $this->extend('frontend/layout/app') ?>

<?= $this->section('content') ?>

<div class="row g-0">
    <div class="col-12">
        <section class="panel mb-0">
            <div class="panel-header d-flex justify-content-between align-items-center">
                <div>
                    <h2 class="panel-title">Submitted ICT Projects</h2>
                    <p class="panel-subtitle">View and manage your submitted ICT projects.</p>
                </div>
                <form class="d-flex flex-wrap align-items-center gap-2 toolbar-form" method="get" action="<?= site_url('employee/submitted-ict-projects') ?>">
                    <input class="form-control form-control-sm" name="q" value="<?= esc($query ?? '') ?>" placeholder="Search Projects" style="width: 168px;">
                    <div class="position-relative date-range-picker-wrapper">
                        <input class="form-control form-control-sm" name="date_range" type="text" value="<?= esc($date_range ?? '') ?>" placeholder="" id="dateRangePicker" readonly>
                        <button type="button" class="date-picker-icon-btn" id="datePickerToggleBtn">
                            <i class="fa-solid fa-calendar-days"></i>
                        </button>
                    </div>
                </form>
            </div>
            <div class="table-responsive mb-0">
                <table class="table table-logs align-middle mb-0">
<thead>
                    <tr>
                        <th>Internal / Cross-Agency Project Title</th>
                        <th>Description</th>
                        <th>Budget</th>
                        <th>Status</th>
                        <th>Last Updated</th>
                        <th class="text-center">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($submittedProjects ?? [] as $project): ?>
                        <?php $fd = !empty($project['form_data']) ? json_decode($project['form_data'], true) : []; $ict = $fd['ict-projects-form'] ?? []; $intTitle = $ict['internal_project_title'] ?? $project['title'] ?? '---'; $crossTitle = $ict['cross_project_title'] ?? ''; ?>
                        <tr>
                            <td>
                                <div><span class="text-muted">Internal:</span> <?= esc($intTitle) ?></div>
                                <?php if ($crossTitle): ?><div class="mt-1"><span class="text-muted">Cross-Agency:</span> <?= esc($crossTitle) ?></div><?php endif; ?>
                            </td>
                            <td><span class="activity-meta activity-summary"><?= esc($project['description'] ?: '---') ?></span></td>
                            <td><?= esc($project['budget'] ? '₱' . number_format($project['budget'], 2) : '-') ?></td>
                            <td>
                                <?php $status = !empty($project['status']) ? $project['status'] : 'draft'; ?>
                                <span class="badge badge-status badge-status-<?= $status ?>"><?= esc(ucfirst($status)) ?></span>
                            </td>
                            <td><?= esc($project['updated_at'] ?? $project['created_at'] ?? '') ?></td>
                            <td class="text-center">
                                <div class="d-inline-flex gap-1">
                                    <button class="btn btn-outline-primary icon-btn" type="button" title="View" data-project='<?= json_encode([
                                        'title' => $intTitle,
                                        'cross_title' => $crossTitle,
                                        'description' => $project['description'] ?? '',
                                        'budget' => $project['budget'] ?? '',
                                        'status' => $project['status'] ?? '',
                                        'department' => $project['department_name'] ?? '',
                                        'updated' => $project['updated_at'] ?? $project['created_at'] ?? '',
                                        'created' => $project['created_at'] ?? ''
                                    ]) ?>'>
                                        <i class="fa-regular fa-eye"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                    <?php if (empty($submittedProjects)): ?>
                        <tr><td colspan="6" class="text-center text-muted-strong py-4">No submitted ICT projects yet.</td></tr>
                    <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </section>
    </div>
</div>

<style>
.modal-content { border-radius: 14px; overflow: hidden; border: 1px solid #e9ecef; background: #fff; }
.modal-header { background: #536783; border-bottom: none; padding: 16px 20px; display: flex; align-items: center; justify-content: space-between; }
.modal-title { font-size: 1.1rem; font-weight: 700; color: #fff; margin: 0; }
.modal-header .btn-close { filter: invert(1); opacity: 1; }
.modal-body { padding: 22px; }
.detail-grid { display: grid; grid-template-columns: 170px 1fr; gap: 12px 18px; }
.key { font-size: .8rem; color: #6c757d; font-weight: 600; }
.val { font-size: .9rem; color: #212529; word-break: break-word; }
</style>

<div class="custom-modal" id="viewProjectModal" style="display:none;position:fixed;top:0;left:0;width:100%;height:100%;z-index:1060;align-items:center;justify-content:center;">
    <div class="modal-dialog modal-dialog-scrollable modal-lg" style="width:100%;max-width:700px;margin:0;">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Project Overview</h5>
                <button type="button" class="btn-close" onclick="closeViewProjectModal()"></button>
            </div>
            <div class="modal-body">
                <div class="detail-grid">
                    <div class="key">Internal Title</div><div class="val" id="viewProjectTitle">-</div>
                    <div class="key">Cross-Agency Title</div><div class="val" id="viewProjectCrossTitle">-</div>
                    <div class="key">Description</div><div class="val" id="viewProjectDescription">-</div>
                    <div class="key">Budget</div><div class="val" id="viewProjectBudget">-</div>
                    <div class="key">Status</div><div class="val" id="viewProjectStatus">-</div>
                    <div class="key">Department</div><div class="val" id="viewProjectDepartment">-</div>
                    <div class="key">Last Updated</div><div class="val" id="viewProjectUpdated">-</div>
                    <div class="key">Created</div><div class="val" id="viewProjectCreated">-</div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
function showViewProjectModal() {
    document.getElementById('viewProjectModal').style.display = 'flex';
    document.getElementById('customModalOverlay').style.display = 'block';
    document.body.style.overflow = 'hidden';
    document.getElementById('customModalOverlay').onclick = closeViewProjectModal;
}
function closeViewProjectModal() {
    document.getElementById('viewProjectModal').style.display = 'none';
    document.getElementById('customModalOverlay').style.display = 'none';
    document.body.style.overflow = '';
    document.getElementById('customModalOverlay').onclick = closeCustomModals;
}
</script>

<?= $this->endSection() ?>

<?= $this->section('scripts') ?>
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
    const form = document.querySelector('form[action="<?= site_url('employee/submitted-ict-projects') ?>"]');
    const dateRangeInput = document.getElementById('dateRangePicker');
    const datePickerToggleBtn = document.getElementById('datePickerToggleBtn');

    if (dateRangeInput) {
        const fp = flatpickr(dateRangeInput, {
            mode: 'range',
            dateFormat: 'Y-m-d',
            position: 'auto',
            static: false,
            appendTo: document.body,
            onOpen: function(selectedDates, dateStr, instance) {
                const calendar = instance.calendarContainer;
                const mainContent = document.querySelector('.app-main') || document.querySelector('.content-wrap') || document.body;
                const mainRect = mainContent.getBoundingClientRect();
                const topbar = document.querySelector('.topbar') || document.querySelector('header');
                const topbarHeight = topbar ? topbar.offsetHeight : 0;
                const calendarWidth = calendar.offsetWidth;
                const centerX = mainRect.left + (mainRect.width / 2) - (calendarWidth / 2);
                const calendarHeight = calendar.offsetHeight;
                const topPosition = topbarHeight + 20;
                calendar.style.position = 'fixed';
                calendar.style.left = centerX + 'px';
                calendar.style.top = topPosition + 'px';
                calendar.style.zIndex = '9999';
            },
            onChange: function(selectedDates, dateStr, instance) {
                if (selectedDates.length === 2) {
                    form.submit();
                }
            }
        });

        if (datePickerToggleBtn && fp) {
            datePickerToggleBtn.addEventListener('click', function(e) {
                e.preventDefault();
                e.stopPropagation();
                fp.open();
            });
        }
    }

    document.querySelectorAll('button[title="View"]').forEach(function(btn) {
        btn.addEventListener('click', function() {
            try {
                var project = JSON.parse(this.getAttribute('data-project'));
                document.getElementById('viewProjectTitle').textContent = project.title || '-';
                document.getElementById('viewProjectCrossTitle').textContent = project.cross_title || '-';
                document.getElementById('viewProjectDescription').textContent = project.description || '-';
                document.getElementById('viewProjectBudget').textContent = project.budget ? '₱' + parseFloat(project.budget).toLocaleString('en-US', {minimumFractionDigits: 2, maximumFractionDigits: 2}) : '-';
                document.getElementById('viewProjectStatus').textContent = project.status ? project.status.charAt(0).toUpperCase() + project.status.slice(1) : '-';
                document.getElementById('viewProjectDepartment').textContent = project.department || '-';
                document.getElementById('viewProjectUpdated').textContent = project.updated || '-';
                document.getElementById('viewProjectCreated').textContent = project.created || '-';
                showViewProjectModal();
            } catch(e) {
                showAlertModal('Error', 'Error loading project details.');
            }
        });
    });
});
</script>
<?= $this->endSection() ?>