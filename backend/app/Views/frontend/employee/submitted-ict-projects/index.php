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
                <div class="d-flex flex-wrap align-items-center gap-2">
                    <button class="btn btn-sm btn-outline-primary flex-shrink-0" type="button" id="selectAllBtn" onclick="toggleSelectAll()">
                        <i class="fa-regular fa-square me-1"></i> Select All
                    </button>
                    <form class="d-flex flex-wrap align-items-center gap-2 toolbar-form" method="get" action="<?= site_url('employee/submitted-ict-projects') ?>" id="searchForm">
                    <div class="input-group input-group-sm" style="width:200px;">
                        <input class="form-control" name="q" value="<?= esc($query ?? '') ?>" placeholder="Search Projects">
                        <button class="btn btn-outline-secondary" type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
                    </div>
                    <div class="position-relative date-range-picker-wrapper">
                        <input class="form-control form-control-sm" name="date_range" type="text" value="<?= esc($date_range ?? '') ?>" placeholder="" id="dateRangePicker" readonly>
                        <button type="button" class="date-picker-icon-btn" id="datePickerToggleBtn">
                            <i class="fa-solid fa-calendar-days"></i>
                        </button>
                    </div>
                </form>
                </div>
            </div>
            <div id="bulkBar" class="bulk-bar" style="display:none;">
                <div class="bulk-bar-inner">
                    <span class="bulk-label" id="selectedCount"></span>
                    <button class="btn btn-sm btn-primary" type="button" onclick="downloadSelected()">
                        <i class="fa-solid fa-download me-1"></i> Download Selected
                    </button>
                </div>
            </div>
            <div class="table-responsive mb-0">
                <table class="table table-ict-projects align-middle mb-0">
<thead>
                    <tr>
                        <th style="width:36px;"><input type="checkbox" id="checkAll" onchange="toggleAllCheckboxes(this)"></th>
                        <th>Project Title</th>
                        <th>Description</th>
                        <th>Budget</th>
                        <th>Status</th>
                        <th>Last Updated</th>
                        <th class="text-center">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($submittedProjects ?? [] as $project): ?>
                        <?php $fd = !empty($project['form_data']) ? json_decode($project['form_data'], true) : []; $ict = $fd['ict-projects-form'] ?? []; $intTitle = $ict['internal_project_title'] ?? $project['title'] ?? '---'; $intDesc = $ict['internal_description'] ?? $project['description'] ?? '---'; $intBudget = $ict['internal_total_cost'] ?? $project['budget'] ?? 0; $s = !empty($project['status']) ? $project['status'] : 'draft'; $canEdit = $s === 'draft' || $s === 'returned'; $isDraft = $s === 'draft'; $isReturned = $s === 'returned'; ?>
                        <tr>
                            <td><input type="checkbox" name="project_ids[]" value="<?= $project['id'] ?>" class="project-checkbox" data-url="<?= site_url('employee/download/' . $project['id']) ?>" onchange="onCheckboxChange()"></td>
                            <td>
                                <div><?= esc($intTitle) ?></div>
                            </td>
                            <td>
                                <div><?= esc($intDesc) ?></div>
                            </td>
                            <td>
                                <div><?= is_numeric($intBudget) ? '₱' . number_format($intBudget, 2) : '-' ?></div>
                            </td>
                            <td>
                                <span class="badge badge-status badge-status-<?= $s ?>"><?= esc($s === 'resubmitted' ? 'Pending - Resubmitted' : ucfirst($s)) ?></span>
                            </td>
                            <td><?= esc($project['updated_at'] ?? $project['created_at'] ?? '') ?></td>
                            <td class="text-center">
                                <div class="d-inline-flex gap-1">
                                    <button class="btn btn-outline-primary icon-btn" type="button" title="View" data-project='<?= json_encode([
                                        'title' => $intTitle,
                                        'description' => $intDesc,
                                        'budget' => $project['budget'] ?? '',
                                        'status' => $s,
                                        'department' => $project['department_name'] ?? '',
                                        'updated' => $project['updated_at'] ?? $project['created_at'] ?? '',
                                        'created' => $project['created_at'] ?? '',
                                        'remarks' => $project['remarks'] ?? ''
                                    ]) ?>'>
                                        <i class="fa-regular fa-eye"></i>
                                    </button>
                                    <a href="<?= site_url('employee/view-full-ict-document/' . $project['id']) ?>" class="btn btn-outline-primary icon-btn" type="button" title="View Full ICT Document">
                                        <i class="fa-solid fa-expand"></i>
                                    </a>
                                    <button class="btn btn-outline-secondary icon-btn edit-btn" type="button" title="Edit" data-record-id="<?= $project['id'] ?>" <?= !$canEdit ? 'disabled' : '' ?>>
                                        <i class="fa-regular fa-pen-to-square"></i>
                                    </button>
                                    <?php if ($isReturned): ?>
                                    <button class="btn btn-outline-primary icon-btn" type="button" title="Resubmit" data-record-id="<?= $project['id'] ?>" data-action="resubmit">
                                        <i class="fa-regular fa-paper-plane"></i>
                                    </button>
                                    <?php elseif ($isDraft): ?>
                                    <button class="btn btn-outline-primary icon-btn" type="button" title="Submit" data-record-id="<?= $project['id'] ?>" data-action="submit">
                                        <i class="fa-regular fa-paper-plane"></i>
                                    </button>
                                    <?php else: ?>
                                    <button class="btn btn-outline-secondary icon-btn" type="button" title="Submit" disabled>
                                        <i class="fa-regular fa-paper-plane"></i>
                                    </button>
                                    <?php endif; ?>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                    <?php if (empty($submittedProjects)): ?>
                        <tr><td colspan="7" class="text-center text-muted-strong py-4">No submitted ICT projects yet.</td></tr>
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
.remarks-in-modal { margin-top: 18px; }
.remarks-in-modal__card {
    background: #f0f4f9;
    border: 1px solid #c5d9f0;
    border-radius: 8px;
    padding: 14px 16px;
}
.remarks-in-modal__label { display: flex; align-items: center; gap: 8px; font-size: .7rem; font-weight: 600; color: #2a5c8a; text-transform: uppercase; letter-spacing: .04em; margin-bottom: 6px; }
.remarks-in-modal__body { font-size: .85rem; color: #334155; line-height: 1.7; }
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
                    <div class="key">Project Title</div><div class="val" id="viewProjectTitle">-</div>
                    <div class="key">Description</div><div class="val" id="viewProjectDescription">-</div>
                    <div class="key">Budget</div><div class="val" id="viewProjectBudget">-</div>
                    <div class="key">Status</div><div class="val" id="viewProjectStatus">-</div>
                    <div class="key">Department</div><div class="val" id="viewProjectDepartment">-</div>
                    <div class="key">Last Updated</div><div class="val" id="viewProjectUpdated">-</div>
                    <div class="key">Created</div><div class="val" id="viewProjectCreated">-</div>
                </div>
                <div class="remarks-in-modal" id="viewProjectRemarksWrap" style="display:none;">
                    <div class="remarks-in-modal__card">
                        <div class="remarks-in-modal__label"><i class="fa-solid fa-rotate-left"></i> DG Remarks</div>
                        <div class="remarks-in-modal__body" id="viewProjectRemarks">-</div>
                    </div>
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
.bulk-bar {
    background: #edf2f7;
    border-bottom: 1px solid #d9e0ea;
    padding: 6px 14px;
    transition: opacity .15s ease;
}
.bulk-bar-inner {
    display: flex;
    align-items: center;
    gap: 8px;
}
.bulk-label {
    font-size: .8rem;
    font-weight: 600;
    color: #344863;
}
.bulk-label::before {
    content: '\2713 ';
    font-weight: 700;
}
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
try {
    var dateRangeInput = document.getElementById('dateRangePicker');
    var datePickerToggleBtn = document.getElementById('datePickerToggleBtn');

    if (dateRangeInput && typeof flatpickr === 'function') {
        const form = document.getElementById('searchForm');
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
} catch(e) {}
</script>
<script>
document.addEventListener('DOMContentLoaded', function() {
    document.querySelectorAll('button[title="View"]').forEach(function(btn) {
        btn.addEventListener('click', function() {
            try {
                var project = JSON.parse(this.getAttribute('data-project'));
                document.getElementById('viewProjectTitle').textContent = project.title || '-';
                document.getElementById('viewProjectDescription').textContent = project.description || '-';
                document.getElementById('viewProjectBudget').textContent = project.budget ? '₱' + parseFloat(project.budget).toLocaleString('en-US', {minimumFractionDigits: 2, maximumFractionDigits: 2}) : '-';
                document.getElementById('viewProjectStatus').textContent = project.status ? (project.status === 'resubmitted' ? 'Pending - Resubmitted' : project.status.charAt(0).toUpperCase() + project.status.slice(1)) : '-';
                document.getElementById('viewProjectDepartment').textContent = project.department || '-';
                document.getElementById('viewProjectUpdated').textContent = project.updated || '-';
                document.getElementById('viewProjectCreated').textContent = project.created || '-';
                var remarks = project.remarks || '';
                var remarksWrap = document.getElementById('viewProjectRemarksWrap');
                if (remarks) {
                    document.getElementById('viewProjectRemarks').textContent = remarks;
                    remarksWrap.style.display = '';
                } else {
                    remarksWrap.style.display = 'none';
                }
                showViewProjectModal();
            } catch(e) {
                showAlertModal('Error', 'Error loading project details.');
            }
        });
    });

    document.querySelectorAll('button[data-action="resubmit"]').forEach(function(btn) {
        btn.addEventListener('click', function() {
            var id = this.getAttribute('data-record-id');
            showConfirmModal('Are you sure you want to resubmit this returned project?', function() {
                var form = document.createElement('form');
                form.method = 'POST';
                form.action = '<?= site_url('employee/resubmit-project') ?>/' + id;
                var csrf = document.querySelector('meta[name="csrf-token"]')?.getAttribute('content');
                if (csrf) {
                    var input = document.createElement('input');
                    input.type = 'hidden';
                    input.name = 'csrf_test_name';
                    input.value = csrf;
                    form.appendChild(input);
                }
                document.body.appendChild(form);
                form.submit();
            });
        });
    });

    document.querySelectorAll('.edit-btn').forEach(function(btn) {
        btn.addEventListener('click', function() {
            var id = this.getAttribute('data-record-id');
            var currentProjectId = localStorage.getItem('edit_project_id');
            if (currentProjectId === id) {
                window.location.href = '<?= site_url('employee/edit-ict-project') ?>/' + id + '/network-infrastructure';
                return;
            }
            fetch('<?= site_url('employee/load-form-data') ?>/' + id)
                .then(function(r) { return r.json(); })
                .then(function(data) {
                    if (data.success && data.form_data) {
                        var newProjBackup = {};
                        var formKeys = ['network-infrastructure-form','enterprise-architecture-form','ict-human-capital-form','information-systems-form','ict-projects-form','performance-measurement-form'];
                        formKeys.forEach(function(k) {
                            newProjBackup[k] = localStorage.getItem(k) || '';
                        });
                        localStorage.clear();
                        localStorage.setItem('new-project-backup', JSON.stringify(newProjBackup));
                        Object.keys(data.form_data).forEach(function(key) {
                            localStorage.setItem(key, JSON.stringify(data.form_data[key]));
                        });
                        localStorage.setItem('edit_project_id', id);
                        window.location.href = '<?= site_url('employee/edit-ict-project') ?>/' + id + '/network-infrastructure';
                    } else {
                        showAlertModal('Error', 'Error loading form data.');
                    }
                });
        });
    });
});
</script>
<script>
function toggleAllCheckboxes(master) {
    var cbs = document.querySelectorAll('.project-checkbox');
    cbs.forEach(function(cb) { cb.checked = master.checked; });
    updateBulkBar();
}
function updateBulkBar() {
    var cbs = document.querySelectorAll('.project-checkbox:checked');
    var count = cbs.length;
    var bar = document.getElementById('bulkBar');
    if (count > 0) {
        document.getElementById('selectedCount').textContent = count + (count === 1 ? ' project selected' : ' projects selected');
        bar.style.display = 'block';
    } else {
        bar.style.display = 'none';
    }
}
function onCheckboxChange() {
    updateBulkBar();
    var allChecked = document.querySelectorAll('.project-checkbox:checked').length === document.querySelectorAll('.project-checkbox').length;
    document.getElementById('checkAll').checked = allChecked;
}
function toggleSelectAll() {
    var master = document.getElementById('checkAll');
    master.checked = !master.checked;
    toggleAllCheckboxes(master);
}
function downloadSelected() {
    var cbs = document.querySelectorAll('.project-checkbox:checked');
    if (cbs.length === 0) {
        showAlertModal('No Selection', 'Please select at least one project to download.');
        return;
    }
    cbs.forEach(function(cb, i) {
        var url = cb.getAttribute('data-url');
        if (url) {
            setTimeout(function() {
                var f = document.createElement('iframe');
                f.style.display = 'none';
                f.src = url;
                document.body.appendChild(f);
            }, i * 500);
        }
    });
}
</script>
<?= $this->endSection() ?>