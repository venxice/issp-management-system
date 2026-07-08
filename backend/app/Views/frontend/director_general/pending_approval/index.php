<?= $this->extend('frontend/layout/app') ?>

<?= $this->section('content') ?>

<div class="row g-0">
    <div class="col-12">
        <section class="panel mb-0">
            <div class="panel-header d-flex justify-content-between align-items-center">
                <div>
                    <h2 class="panel-title">Projects Pending Review</h2>
                    <p class="panel-subtitle">Endorsed and resubmitted projects waiting for your action.</p>
                </div>
                <form class="d-flex flex-wrap align-items-center gap-2 toolbar-form" method="get" action="<?= site_url('director-general/pending-approval') ?>" id="searchForm">
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
            <div class="table-responsive mb-0">
                <table class="table table-ict-projects align-middle mb-0">
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
                        <?php if ($pendingProjects !== []): ?>
                            <?php foreach ($pendingProjects as $project): ?>
                                <?php $intTitle = $project['int_title'] ?? 'Untitled'; $crossTitle = $project['cross_title'] ?? ''; $intDesc = $project['int_desc'] ?? '---'; $crossDesc = $project['cross_desc'] ?? ''; $intBudget = $project['int_budget'] ?? 0; $crossBudget = $project['cross_budget'] ?? 0; ?>
                                <tr>
                                    <td>
                                        <div><span class="text-muted">Internal:</span> <?= esc($intTitle) ?></div>
                                        <?php if ($crossTitle): ?><div class="mt-1"><span class="text-muted">Cross-Agency:</span> <?= esc($crossTitle) ?></div><?php endif; ?>
                                    </td>
                                    <td>
                                        <div><span class="text-muted">Internal:</span> <?= esc($intDesc) ?></div>
                                        <?php if ($crossDesc): ?><div class="mt-1"><span class="text-muted">Cross-Agency:</span> <?= esc($crossDesc) ?></div><?php endif; ?>
                                    </td>
                                    <td>
                                        <div><span class="text-muted">Internal:</span> <?= is_numeric($intBudget) ? '₱' . number_format($intBudget, 2) : '-' ?></div>
                                        <?php if ($crossBudget && is_numeric($crossBudget)): ?><div class="mt-1"><span class="text-muted">Cross-Agency:</span> <?= '₱' . number_format($crossBudget, 2) ?></div><?php endif; ?>
                                    </td>
                                    <td>
                                        <?php
                                        $statusLabels = [
                                            'endorsed' => 'Pending',
                                            'resubmitted' => 'Resubmitted',
                                        ];
                                        $status = $project['status'] ?? 'endorsed';
                                        $label = $statusLabels[$status] ?? ucfirst($status);
                                        $colorMap = [
                                            'endorsed' => ['bg' => '#e8f0fe', 'color' => '#2a5c8a', 'border' => '#c5d9f0'],
                                            'resubmitted' => ['bg' => '#e0e7ff', 'color' => '#4338ca', 'border' => '#c7d2fe'],
                                        ];
                                        $colors = $colorMap[$status] ?? $colorMap['endorsed'];
                                        ?>
                                        <span class="badge badge-soft" style="font-size:.7rem;padding:4px 10px;background:<?= $colors['bg'] ?>;color:<?= $colors['color'] ?>;border-color:<?= $colors['border'] ?>;">
                                            <?= $label ?>
                                        </span>
                                    </td>
                                    <td class="text-muted"><?= esc($project['updated_at'] ?? $project['created_at'] ?? '-') ?></td>
                                    <td class="text-center">
                                        <div class="d-flex gap-1 justify-content-center align-items-center">
                                            <button class="btn btn-outline-primary icon-btn" type="button" title="View" data-project='<?= json_encode([
                                                'title' => $intTitle,
                                                'cross_title' => $crossTitle,
                                                'description' => $project['description'] ?? '',
                                                'cross_description' => $crossDesc,
                                                'budget' => $project['budget'] ?? '',
                                                'cross_budget' => $crossBudget,
                                                'status' => $status,
                                                'department' => $project['department_name'] ?? '',
                                                'updated' => $project['updated_at'] ?? $project['created_at'] ?? '',
                                                'created' => $project['created_at'] ?? '',
                                                'remarks' => $project['remarks'] ?? ''
                                            ]) ?>'>
                                                <i class="fa-regular fa-eye"></i>
                                            </button>
                                            <a href="<?= site_url('director-general/view-full/' . $project['id']) ?>" class="btn btn-outline-primary icon-btn" type="button" title="Open Full Submission">
                                                <i class="fa-solid fa-expand"></i>
                                            </a>
                                            <a href="<?= site_url('director-general/download/' . $project['id']) ?>" class="btn btn-outline-primary icon-btn" type="button" title="Download PDF">
                                                <i class="fa-solid fa-download"></i>
                                            </a>
                                            <button class="action-dropdown-btn" onclick="toggleActionMenu(event, this, '<?= $project['id'] ?>')">
                                                Review <i class="fa-solid fa-chevron-down" style="font-size:.65rem;margin-left:2px;"></i>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="7" class="text-center text-muted-strong py-4">No pending projects found.</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </section>
    </div>
</div>

<div class="action-dropdown-overlay" id="actionOverlay" onclick="closeActionMenu()"></div>
<div class="action-dropdown-menu" id="actionMenu">
    <button class="dropdown-item" type="button" onclick="openApproveModal()">
        <i class="fa-solid fa-check" style="color:#16a34a;"></i> Approve Project
    </button>
    <button class="dropdown-item" type="button" onclick="openRejectModal()">
        <i class="fa-solid fa-xmark" style="color:#dc2626;"></i> Reject Project
    </button>
    <div class="dropdown-divider"></div>
    <button class="dropdown-item" type="button" onclick="openReturnModal()">
        <i class="fa-solid fa-rotate-left" style="color:#d97706;"></i> Return to Submitter
    </button>
</div>

<div class="custom-modal" id="approveModal" style="display:none;position:fixed;top:50%;left:50%;transform:translate(-50%,-50%);z-index:1060;background:#fff;border-radius:6px;box-shadow:0 18px 40px rgba(15,23,42,.18);min-width:320px;max-width:400px;overflow:hidden;">
    <div style="background:#536783;color:#fff;padding:12px 14px;font-size:.94rem;font-weight:700;"><i class="fa-solid fa-check-circle me-2" style="color:#16a34a;"></i> Approve Project</div>
    <div style="padding:14px 14px;font-size:.82rem;color:#1f2a3a;"><p class="mb-0">This action is <strong>irreversible</strong>. Are you sure you want to approve this project?</p></div>
    <div style="padding:8px 12px;border-top:1px solid #e1e6ee;display:flex;justify-content:flex-end;gap:8px;">
        <button type="button" class="btn btn-outline-secondary btn-sm" onclick="closeCustomModals()">Cancel</button>
        <form method="post" id="actionApproveForm" action="" class="d-inline">
            <?= csrf_field() ?>
            <button type="submit" class="btn btn-primary btn-sm">Approve</button>
        </form>
    </div>
</div>

<div class="custom-modal" id="rejectModal" style="display:none;position:fixed;top:50%;left:50%;transform:translate(-50%,-50%);z-index:1060;background:#fff;border-radius:6px;box-shadow:0 18px 40px rgba(15,23,42,.18);min-width:320px;max-width:400px;overflow:hidden;">
    <div style="background:#536783;color:#fff;padding:12px 14px;font-size:.94rem;font-weight:700;"><i class="fa-solid fa-times-circle me-2" style="color:#ef4444;"></i> Reject Project</div>
    <div style="padding:14px 14px;font-size:.82rem;color:#1f2a3a;"><p class="mb-0">This action is <strong>irreversible</strong>. Are you sure you want to reject this project?</p></div>
    <div style="padding:8px 12px;border-top:1px solid #e1e6ee;display:flex;justify-content:flex-end;gap:8px;">
        <button type="button" class="btn btn-outline-secondary btn-sm" onclick="closeCustomModals()">Cancel</button>
        <form method="post" id="actionRejectForm" action="" class="d-inline">
            <?= csrf_field() ?>
            <button type="submit" class="btn btn-primary btn-sm">Reject</button>
        </form>
    </div>
</div>

<div class="custom-modal" id="returnModal" style="display:none;position:fixed;top:50%;left:50%;transform:translate(-50%,-50%);z-index:1060;background:#fff;border-radius:6px;box-shadow:0 18px 40px rgba(15,23,42,.18);min-width:360px;max-width:460px;overflow:hidden;">
    <div style="background:#536783;color:#fff;padding:12px 14px;font-size:.94rem;font-weight:700;"><i class="fa-solid fa-rotate-left me-2"></i> Return Project</div>
    <form method="post" id="actionReturnForm" action="" onsubmit="return validateReturnForm()">
        <?= csrf_field() ?>
        <div style="padding:14px 14px;font-size:.82rem;color:#1f2a3a;">
            <p class="mb-2">Provide remarks on why this project is being returned. The submitter will see these remarks.</p>
            <textarea name="remarks" id="returnRemarks" class="form-control form-control-sm" rows="4" placeholder="Enter your remarks here..." style="resize:vertical;"></textarea>
            <div id="returnRemarksError" style="color:#dc2626;font-size:.8rem;margin-top:6px;display:none;">Please enter remarks before returning.</div>
        </div>
        <div style="padding:8px 12px;border-top:1px solid #e1e6ee;display:flex;justify-content:flex-end;gap:8px;">
            <button type="button" class="btn btn-outline-secondary btn-sm" onclick="closeCustomModals()">Cancel</button>
            <button type="submit" class="btn btn-primary btn-sm">Return to Submitter</button>
        </div>
    </form>
</div>

<div class="custom-modal" id="viewProjectModal" style="display:none;position:fixed;top:0;left:0;width:100%;height:100%;z-index:1060;align-items:center;justify-content:center;">
    <div class="modal-dialog modal-dialog-scrollable modal-lg" style="width:100%;max-width:700px;margin:0;">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><i class="fa-regular fa-eye me-2"></i> Project Overview</h5>
                <button type="button" class="btn-close" onclick="closeViewProjectModal()"></button>
            </div>
            <div class="modal-body">
                <div class="detail-grid">
                    <div class="key">Internal Title</div>
                    <div class="val" id="viewProjectTitle">-</div>
                    <div class="cross-row" id="viewCrossRow">
                        <div class="key">Cross-Agency Title</div>
                        <div class="val" id="viewProjectCrossTitle">-</div>
                    </div>
                    <div class="key">Internal Description</div>
                    <div class="val" id="viewProjectDescription">-</div>
                    <div class="cross-row" id="viewCrossDescRow">
                        <div class="key">Cross-Agency Description</div>
                        <div class="val" id="viewProjectCrossDescription">-</div>
                    </div>
                    <div class="key">Internal Budget</div>
                    <div class="val" id="viewProjectBudget">-</div>
                    <div class="cross-row" id="viewCrossBudgetRow">
                        <div class="key">Cross-Agency Budget</div>
                        <div class="val" id="viewProjectCrossBudget">-</div>
                    </div>
                    <div class="key">Status</div>
                    <div class="val" id="viewProjectStatus">-</div>
                    <div class="key">Department</div>
                    <div class="val" id="viewProjectDepartment">-</div>
                    <div class="key">Last Updated</div>
                    <div class="val" id="viewProjectUpdated">-</div>
                    <div class="key">Created</div>
                    <div class="val" id="viewProjectCreated">-</div>
                </div>
                <div class="remarks-in-modal" id="viewProjectRemarksWrap" style="display:none;">
                    <div class="remarks-in-modal__card">
                        <div class="remarks-in-modal__label"><i class="fa-solid fa-rotate-left"></i> Remarks</div>
                        <div class="remarks-in-modal__body" id="viewProjectRemarks">-</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
.table-ict-projects th:nth-child(1),
.table-ict-projects td:nth-child(1) { width: 22%; min-width: 160px; }
.table-ict-projects th:nth-child(2),
.table-ict-projects td:nth-child(2) { width: 14%; min-width: 110px; }
.table-ict-projects th:nth-child(3),
.table-ict-projects td:nth-child(3) { width: 14%; min-width: 110px; }
.table-ict-projects th:nth-child(4),
.table-ict-projects td:nth-child(4) { width: 12%; min-width: 90px; }
.table-ict-projects th:nth-child(5),
.table-ict-projects td:nth-child(5) { width: 14%; min-width: 120px; }
.table-ict-projects th:nth-child(6),
.table-ict-projects td:nth-child(6) { width: 10%; min-width: 80px; }
.table-ict-projects th:nth-child(7),
.table-ict-projects td:nth-child(7) { width: 14%; min-width: 160px; }
.action-dropdown-btn {
    background: #536783;
    color: #fff;
    border: none;
    border-radius: 6px;
    padding: 5px 10px;
    font-size: .78rem;
    font-weight: 600;
    cursor: pointer;
    display: inline-flex;
    align-items: center;
    gap: 4px;
    transition: background-color .15s ease;
    white-space: nowrap;
}
.action-dropdown-btn:hover { background: #3f5673; }
.action-dropdown-menu {
    display: none;
    position: fixed;
    z-index: 1070;
    background: #fff;
    border: 1px solid #d9e0ea;
    border-radius: 8px;
    box-shadow: 0 8px 20px rgba(15,23,42,0.12);
    padding: 4px;
    min-width: 180px;
    opacity: 0;
    transition: opacity .12s ease;
}
.action-dropdown-menu.show {
    display: block;
    opacity: 1;
}
.action-dropdown-menu .dropdown-item {
    display: flex;
    align-items: center;
    gap: 8px;
    width: 100%;
    padding: 7px 10px;
    font-size: .8rem;
    font-weight: 500;
    color: #1f2a3a;
    background: none;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    text-align: left;
    transition: background .1s ease;
}
.action-dropdown-menu .dropdown-item:hover { background: #f0f4f9; }
.action-dropdown-menu .dropdown-divider {
    height: 1px;
    background: #e1e6ee;
    margin: 4px 6px;
}
.action-dropdown-overlay {
    display: none;
    position: fixed;
    inset: 0;
    z-index: 1065;
    background: transparent;
}
.action-dropdown-overlay.show { display: block; }
.modal-content { border-radius: 14px; overflow: hidden; border: 1px solid #e9ecef; background: #fff; }
.modal-header { background: #536783; border-bottom: none; padding: 16px 20px; display: flex; align-items: center; justify-content: space-between; }
.modal-title { font-size: 1.1rem; font-weight: 700; color: #fff; margin: 0; }
.modal-header .btn-close { filter: invert(1); opacity: 1; }
.modal-body { padding: 22px; }
.detail-grid { display: grid; grid-template-columns: 170px 1fr; gap: 12px 18px; }
.key { font-size: .8rem; color: #6c757d; font-weight: 600; }
.val { font-size: .9rem; color: #212529; word-break: break-word; }
.cross-row { display: contents; }
.remarks-in-modal { margin-top: 18px; }
.remarks-in-modal__card {
    background: #f0f4f9;
    border: 1px solid #c5d9f0;
    border-radius: 8px;
    padding: 14px 16px;
}
.remarks-in-modal__label { display: flex; align-items: center; gap: 8px; font-size: .7rem; font-weight: 600; color: #2a5c8a; text-transform: uppercase; letter-spacing: .04em; margin-bottom: 6px; }
.remarks-in-modal__body { font-size: .85rem; color: #334155; line-height: 1.7; }
.toolbar-form { gap: 8px; flex-shrink: 0; white-space: nowrap; }
.date-range-picker-wrapper { width: 42px; flex-shrink: 0; }
.date-range-picker-wrapper input { position: absolute; opacity: 0; pointer-events: none; }
.date-picker-icon-btn { background: #4f6584; border: none; color: #fff; width: 38px; height: 28px; border-radius: 6px; cursor: pointer; display: grid; place-items: center; transition: background-color 0.2s ease; }
.date-picker-icon-btn:hover { background: #344863; }
.date-picker-icon-btn i { font-size: 0.8rem; }
.flatpickr-calendar { font-family: "Segoe UI", system-ui, -apple-system, BlinkMacSystemFont, sans-serif; border: 1px solid #d9e0ea; border-radius: 10px; box-shadow: 0 12px 26px rgba(15, 23, 42, .1); }
.flatpickr-day.selected, .flatpickr-day.startRange, .flatpickr-day.endRange, .flatpickr-day.selected.inRange, .flatpickr-day.startRange.inRange, .flatpickr-day.endRange.inRange, .flatpickr-day.selected:focus, .flatpickr-day.startRange:focus, .flatpickr-day.endRange:focus, .flatpickr-day.selected:hover, .flatpickr-day.startRange:hover, .flatpickr-day.endRange:hover, .flatpickr-day.selected.prevMonthDay, .flatpickr-day.startRange.prevMonthDay, .flatpickr-day.endRange.prevMonthDay, .flatpickr-day.selected.nextMonthDay, .flatpickr-day.startRange.nextMonthDay, .flatpickr-day.endRange.nextMonthDay { background: #4f6584; border-color: #4f6584; }
.flatpickr-day.inRange, .flatpickr-day.prevMonthDay.inRange, .flatpickr-day.nextMonthDay.inRange, .flatpickr-day.today.inRange, .flatpickr-day.prevMonthDay.today.inRange, .flatpickr-day.nextMonthDay.today.inRange, .flatpickr-day:hover, .flatpickr-day.prevMonthDay:hover, .flatpickr-day.nextMonthDay:hover, .flatpickr-day:focus, .flatpickr-day.prevMonthDay:focus, .flatpickr-day.nextMonthDay:focus { background: rgba(79, 101, 132, 0.15); border-color: rgba(79, 101, 132, 0.15); }
.flatpickr-months .flatpickr-month, .flatpickr-current-month .flatpickr-monthDropdown-months, .flatpickr-current-month input.cur-year { font-family: "Segoe UI", system-ui, -apple-system, BlinkMacSystemFont, sans-serif; font-weight: 600; }
.flatpickr-weekday { font-weight: 600; }
.flatpickr-day.today { border-color: #4f6584; }
</style>

<script>
function toggleActionMenu(event, btn, projectId) {
    event.stopPropagation();
    var menu = document.getElementById('actionMenu');
    var overlay = document.getElementById('actionOverlay');
    var isOpen = menu.classList.contains('show');

    closeActionMenu();

    if (!isOpen) {
        var rect = btn.getBoundingClientRect();
        var menuWidth = Math.min(220, window.innerWidth - 16);
        var left = Math.min(rect.left, window.innerWidth - menuWidth - 8);

        menu.style.display = 'block';
        var menuH = menu.offsetHeight;
        menu.style.display = '';

        var spaceBelow = window.innerHeight - rect.bottom;
        var spaceAbove = rect.top;

        if (spaceAbove >= menuH + 8) {
            var top = rect.top - menuH - 4;
        } else if (spaceBelow >= menuH + 8) {
            var top = rect.bottom + 4;
        } else {
            var top = 8;
        }

        menu.style.left = Math.max(8, left) + 'px';
        menu.style.top = Math.max(8, top) + 'px';
        menu.style.width = menuWidth + 'px';

        menu.dataset.projectId = projectId;

        menu.classList.add('show');
        overlay.classList.add('show');
    }
}

function closeActionMenu() {
    document.getElementById('actionMenu').classList.remove('show');
    document.getElementById('actionOverlay').classList.remove('show');
}

function getPendingProjectId() {
    var menu = document.getElementById('actionMenu');
    return menu.dataset.projectId;
}

function openApproveModal() {
    closeActionMenu();
    var pid = getPendingProjectId();
    document.getElementById('actionApproveForm').action = '<?= site_url('director-general/approve/') ?>' + pid;
    showCustomModal('approveModal');
}

function openRejectModal() {
    closeActionMenu();
    var pid = getPendingProjectId();
    document.getElementById('actionRejectForm').action = '<?= site_url('director-general/reject/') ?>' + pid;
    showCustomModal('rejectModal');
}

function openReturnModal() {
    closeActionMenu();
    var pid = getPendingProjectId();
    document.getElementById('actionReturnForm').action = '<?= site_url('director-general/return/') ?>' + pid;
    document.getElementById('returnRemarks').value = '';
    document.getElementById('returnRemarksError').style.display = 'none';
    showCustomModal('returnModal');
}

function validateReturnForm() {
    var remarks = document.getElementById('returnRemarks').value.trim();
    if (!remarks) {
        document.getElementById('returnRemarksError').style.display = 'block';
        return false;
    }
    return true;
}

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

document.addEventListener('click', function(e) {
    if (!e.target.closest('#actionMenu') && !e.target.closest('.action-dropdown-btn')) {
        closeActionMenu();
    }
});

document.addEventListener('DOMContentLoaded', function() {
    document.querySelectorAll('button[title="View"]').forEach(function(btn) {
        btn.addEventListener('click', function() {
            try {
                var project = JSON.parse(this.getAttribute('data-project'));
                document.getElementById('viewProjectTitle').textContent = project.title || '-';
                var crossRow = document.getElementById('viewCrossRow');
                var crossTitleEl = document.getElementById('viewProjectCrossTitle');
                if (project.cross_title) {
                    crossTitleEl.textContent = project.cross_title;
                    crossRow.style.display = '';
                } else {
                    crossRow.style.display = 'none';
                }
                document.getElementById('viewProjectDescription').textContent = project.description || '-';
                var crossDescRow = document.getElementById('viewCrossDescRow');
                var crossDescEl = document.getElementById('viewProjectCrossDescription');
                if (project.cross_description) {
                    crossDescEl.textContent = project.cross_description;
                    crossDescRow.style.display = '';
                } else {
                    crossDescRow.style.display = 'none';
                }
                document.getElementById('viewProjectBudget').textContent = project.budget ? '₱' + parseFloat(project.budget).toLocaleString('en-US', {minimumFractionDigits: 2, maximumFractionDigits: 2}) : '-';
                var crossBudgetRow = document.getElementById('viewCrossBudgetRow');
                var crossBudgetEl = document.getElementById('viewProjectCrossBudget');
                if (project.cross_budget && parseFloat(project.cross_budget) > 0) {
                    crossBudgetEl.textContent = '₱' + parseFloat(project.cross_budget).toLocaleString('en-US', {minimumFractionDigits: 2, maximumFractionDigits: 2});
                    crossBudgetRow.style.display = '';
                } else {
                    crossBudgetRow.style.display = 'none';
                }
                var statusMap = {'endorsed':'Pending','returned':'Returned','approved':'Approved','rejected':'Rejected','resubmitted':'Resubmitted'};
                document.getElementById('viewProjectStatus').textContent = statusMap[project.status] || project.status || '-';
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
                if (typeof showAlertModal === 'function') {
                    showAlertModal('Error', 'Error loading project details.');
                }
            }
        });
    });

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