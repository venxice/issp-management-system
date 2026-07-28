<?= $this->extend('frontend/layout/app') ?>

<?= $this->section('content') ?>
<?php $stats = [
    ['label' => 'Submitted ICT Projects', 'value' => $submittedProjects, 'icon' => 'fa-folder-open'],
    ['label' => 'Approved ICT Projects', 'value' => $approvedProjects, 'icon' => 'fa-check-circle'],
    ['label' => 'Need Revision', 'value' => $needRevision, 'icon' => 'fa-exclamation-circle'],
    ['label' => 'Total Proposed Budget', 'value' => '₱' . number_format($totalBudget, 2), 'icon' => 'fa-peso-sign'],
];
?>

<style>
.dash-filter-row {
    display: flex;
    justify-content: flex-end;
    align-items: center;
    margin-bottom: 14px;
    gap: 8px;
    flex-wrap: wrap;
}
.cdd { position: relative; display: inline-flex; align-items: center; gap: 5px; }
.cdd-trigger {
    display: inline-flex;
    align-items: center;
    gap: 6px;
    background: #fff;
    border: 1px solid #dde4ed;
    border-radius: 8px;
    padding: 6px 11px;
    font-size: .74rem;
    font-weight: 600;
    color: var(--ink);
    cursor: pointer;
    transition: all .15s ease;
    box-shadow: 0 1px 3px rgba(15,23,42,.04);
    user-select: none;
    white-space: nowrap;
}
.cdd-trigger:hover { border-color: #c7d0dc; }
.cdd-trigger.open { border-color: var(--brand); box-shadow: 0 0 0 2px rgba(79,101,132,.12); }
.cdd-trigger .cdd-icon { font-size: .7rem; color: var(--muted); }
.cdd-trigger .cdd-label { font-size: .68rem; color: var(--muted); text-transform: uppercase; letter-spacing: .04em; font-weight: 700; }
.cdd-trigger .cdd-value { color: var(--ink); }
.cdd-trigger .cdd-arrow { font-size: .55rem; color: var(--muted); margin-left: 2px; transition: transform .15s ease; }
.cdd-trigger.open .cdd-arrow { transform: rotate(180deg); }
.cdd-trigger.has-value { border-color: var(--brand); background: #f6f8fb; }
.cdd-trigger.has-value .cdd-icon { color: var(--brand); }
.cdd-panel {
    display: none;
    position: absolute;
    top: calc(100% + 4px);
    left: 0;
    min-width: 130px;
    background: #fff;
    border: 1px solid #dde4ed;
    border-radius: 10px;
    box-shadow: 0 12px 32px rgba(15,23,42,.12);
    z-index: 999;
    padding: 5px;
    max-height: 220px;
    overflow-y: auto;
    scrollbar-width: thin;
}
.cdd-panel::-webkit-scrollbar { width: 5px; }
.cdd-panel::-webkit-scrollbar-thumb { background: #d1d5db; border-radius: 3px; }
.cdd-panel.show { display: block; }
.cdd-option {
    display: flex;
    align-items: center;
    gap: 6px;
    padding: 7px 10px;
    font-size: .74rem;
    font-weight: 500;
    color: var(--ink);
    border-radius: 6px;
    cursor: pointer;
    transition: background .1s ease;
    border: none;
    background: none;
    width: 100%;
    text-align: left;
}
.cdd-option:hover { background: #f1f5f9; }
.cdd-option.selected { background: #edf2f7; color: var(--brand-dark); font-weight: 700; }
.cdd-option .check-icon { font-size: .6rem; color: var(--brand); opacity: 0; width: 12px; }
.cdd-option.selected .check-icon { opacity: 1; }
.filter-reset-btn {
    display: none;
    align-items: center;
    gap: 4px;
    background: none;
    border: 1px solid transparent;
    border-radius: 6px;
    padding: 6px 9px;
    font-size: .7rem;
    font-weight: 600;
    color: var(--muted);
    cursor: pointer;
    transition: all .15s ease;
}
.filter-reset-btn:hover { color: #b33f3f; background: #fef2f2; border-color: #fecaca; }
.filter-reset-btn i { font-size: .6rem; }
.dash-filter-row.has-filters .filter-reset-btn { display: inline-flex; }
</style>

<div class="row g-2 mb-2">
    <?php foreach ($stats as $index => $stat): ?>
        <div class="col-3">
            <div class="stat-card <?= $index === 1 ? 'stat-card-alt' : ($index === 2 ? 'stat-card-soft' : ($index === 3 ? 'stat-card-muted' : '')) ?>">
                <div><div class="label"><?= esc($stat['label']) ?></div><div class="value"><?= esc($stat['value']) ?></div></div>
                <div class="stat-icon"><i class="fa-solid <?= esc($stat['icon']) ?>"></i></div>
            </div>
        </div>
    <?php endforeach; ?>
</div>

<div class="dash-filter-row <?= ($selectedYear !== null || $selectedMonth !== null) ? 'has-filters' : '' ?>" id="dashFilterBar">
    <span style="font-size:.68rem;font-weight:700;color:var(--muted);text-transform:uppercase;letter-spacing:.04em;margin-right:2px;"><i class="fa-solid fa-filter" style="font-size:.6rem;margin-right:3px;"></i>Filter</span>
    <div class="cdd" id="cddYear">
        <button type="button" class="cdd-trigger <?= $selectedYear !== null ? 'has-value' : '' ?>" id="cddYearBtn" onclick="toggleCdd('cddYear')">
            <i class="fa-regular fa-calendar cdd-icon"></i>
            <span class="cdd-label">Year</span>
            <span class="cdd-value" id="cddYearLabel"><?= $selectedYear !== null ? (int)$selectedYear : 'All' ?></span>
            <i class="fa-solid fa-chevron-down cdd-arrow"></i>
        </button>
        <div class="cdd-panel" id="cddYearPanel">
            <button type="button" class="cdd-option <?= $selectedYear === null ? 'selected' : '' ?>" data-value="" onclick="selectCdd('cddYear', '', 'All')">
                <i class="fa-solid fa-check check-icon"></i> All Years
            </button>
            <?php
            $currentYear = (int) date('Y');
            $yearsToShow = [];
            foreach ($availableYears as $ay) { $yearsToShow[] = (int) $ay['year']; }
            if (!empty($yearsToShow) && !in_array($currentYear, $yearsToShow)) { $yearsToShow[] = $currentYear; }
            rsort($yearsToShow);
            foreach ($yearsToShow as $y): ?>
                <button type="button" class="cdd-option <?= ($selectedYear !== null && (int)$selectedYear === $y) ? 'selected' : '' ?>" data-value="<?= $y ?>" onclick="selectCdd('cddYear', '<?= $y ?>', '<?= $y ?>')">
                    <i class="fa-solid fa-check check-icon"></i> <?= $y ?>
                </button>
            <?php endforeach; ?>
        </div>
    </div>
    <div class="cdd" id="cddMonth">
        <button type="button" class="cdd-trigger <?= $selectedMonth !== null ? 'has-value' : '' ?>" id="cddMonthBtn" onclick="toggleCdd('cddMonth')">
            <i class="fa-regular fa-clock cdd-icon"></i>
            <span class="cdd-label">Month</span>
            <span class="cdd-value" id="cddMonthLabel"><?= $selectedMonth !== null ? ['','Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sep','Oct','Nov','Dec'][(int)$selectedMonth] : 'All' ?></span>
            <i class="fa-solid fa-chevron-down cdd-arrow"></i>
        </button>
        <div class="cdd-panel" id="cddMonthPanel">
            <button type="button" class="cdd-option <?= $selectedMonth === null ? 'selected' : '' ?>" data-value="" onclick="selectCdd('cddMonth', '', 'All')">
                <i class="fa-solid fa-check check-icon"></i> All Months
            </button>
            <?php
            $monthLabels = [1=>'January',2=>'February',3=>'March',4=>'April',5=>'May',6=>'June',7=>'July',8=>'August',9=>'September',10=>'October',11=>'November',12=>'December'];
            foreach ($monthLabels as $num => $fullName): ?>
                <button type="button" class="cdd-option <?= ($selectedMonth !== null && (int)$selectedMonth === $num) ? 'selected' : '' ?>" data-value="<?= $num ?>" onclick="selectCdd('cddMonth', '<?= $num ?>', '<?= $fullName ?>')">
                    <i class="fa-solid fa-check check-icon"></i> <?= $fullName ?>
                </button>
            <?php endforeach; ?>
        </div>
    </div>
    <button type="button" class="filter-reset-btn" onclick="window.location.search=''">
        <i class="fa-solid fa-xmark"></i> Clear
    </button>
</div>
<script>
function toggleCdd(id) {
    var panel = document.getElementById(id + 'Panel');
    var btn = document.getElementById(id + 'Btn');
    var isOpen = panel.classList.contains('show');
    document.querySelectorAll('.cdd-panel').forEach(function(p) { p.classList.remove('show'); });
    document.querySelectorAll('.cdd-trigger').forEach(function(b) { b.classList.remove('open'); });
    if (!isOpen) { panel.classList.add('show'); btn.classList.add('open'); }
}
function selectCdd(id, value, label) {
    var hidden = document.getElementById(id + 'Hidden');
    var lbl = document.getElementById(id + 'Label');
    var btn = document.getElementById(id + 'Btn');
    var panel = document.getElementById(id + 'Panel');
    hidden.value = value;
    lbl.textContent = label;
    btn.classList.toggle('has-value', value !== '');
    panel.querySelectorAll('.cdd-option').forEach(function(o) { o.classList.toggle('selected', o.dataset.value === value); });
    panel.classList.remove('show');
    btn.classList.remove('open');
    applyDashboardFilter();
}
function applyDashboardFilter() {
    var year = document.getElementById('cddYearHidden').value;
    var month = document.getElementById('cddMonthHidden').value;
    var params = new URLSearchParams(window.location.search);
    if (year) { params.set('year', year); } else { params.delete('year'); }
    if (month) { params.set('month', month); } else { params.delete('month'); }
    window.location.search = params.toString();
}
document.addEventListener('click', function(e) {
    if (!e.target.closest('.cdd')) {
        document.querySelectorAll('.cdd-panel').forEach(function(p) { p.classList.remove('show'); });
        document.querySelectorAll('.cdd-trigger').forEach(function(b) { b.classList.remove('open'); });
    }
});
</script>
<input type="hidden" id="cddYearHidden" value="<?= $selectedYear ?? '' ?>">
<input type="hidden" id="cddMonthHidden" value="<?= $selectedMonth ?? '' ?>">

<div class="row g-0">
    <div class="col-12">
        <section class="panel mb-0" style="margin-bottom: -8px;">
            <div class="panel-header">
                <h2 class="panel-title">Recent Activity</h2>
                <p class="panel-subtitle">Your latest ICT project submissions and updates.</p>
            </div>
            <div class="table-responsive mb-0">
                <table class="table table-logs align-middle mb-0">
                    <thead>
                    <tr>
                        <th>Project Title</th>
                        <th>Description</th>
                        <th>Budget</th>
                        <th>Status</th>
                        <th>Last Updated</th>
                        <th class="text-center">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($recentRecords ?? [] as $record): ?>
                        <?php $fd = !empty($record['form_data']) ? json_decode($record['form_data'], true) : []; $ict = $fd['ict-projects-form'] ?? []; $intTitle = $ict['internal_project_title'] ?? $record['title'] ?? '---'; $intDesc = $ict['internal_description'] ?? $record['description'] ?? '---'; $intBudget = $ict['internal_total_cost'] ?? $record['budget'] ?? 0; $s = !empty($record['status']) ? $record['status'] : 'draft'; $canEdit = $s === 'draft' || $s === 'returned'; $isDraft = $s === 'draft'; $isReturned = $s === 'returned'; ?>
                        <tr>
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
                            <td><?= esc($record['updated_at'] ?? $record['created_at'] ?? '') ?></td>
                            <td class="text-center">
                                <div class="d-inline-flex gap-1">
                                    <button class="btn btn-outline-primary icon-btn" type="button" title="View" data-project='<?= json_encode([
                                        'title' => $intTitle ?? $record['title'] ?? '',
                                        'description' => $intDesc ?? $record['description'] ?? '',
                                        'budget' => $record['budget'] ?? '',
                                        'status' => $s,
                                        'department' => $record['department_name'] ?? '',
                                        'updated' => $record['updated_at'] ?? $record['created_at'] ?? '',
                                        'created' => $record['created_at'] ?? '',
                                        'remarks' => $record['remarks'] ?? ''
                                    ]) ?>'>
                                        <i class="fa-regular fa-eye"></i>
                                    </button>
                                    <a href="<?= site_url('employee/view-full-ict-document/' . $record['id']) ?>" class="btn btn-outline-primary icon-btn" type="button" title="View Full ICT Document">
                                        <i class="fa-solid fa-expand"></i>
                                    </a>
                                    <button class="btn btn-outline-secondary icon-btn edit-btn" type="button" title="Edit" data-record-id="<?= $record['id'] ?>" <?= !$canEdit ? 'disabled' : '' ?>>
                                        <i class="fa-regular fa-pen-to-square"></i>
                                    </button>
                                    <?php if ($isDraft): ?>
                                    <button class="btn btn-outline-primary icon-btn" type="button" title="Submit" data-record-id="<?= $record['id'] ?>" data-action="submit">
                                        <i class="fa-regular fa-paper-plane"></i>
                                    </button>
                                    <?php elseif ($isReturned): ?>
                                    <button class="btn btn-outline-primary icon-btn" type="button" title="Resubmit" data-record-id="<?= $record['id'] ?>" data-action="resubmit">
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
                    <?php if (empty($recentRecords)): ?>
                        <tr><td colspan="6" class="text-center text-muted-strong py-4">No activity yet.</td></tr>
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
.remarks-in-modal__divider { height: 1px; background: #eef2f6; margin-bottom: 14px; }
.remarks-in-modal__label { display: flex; align-items: center; gap: 6px; font-size: .7rem; font-weight: 700; color: #536783; text-transform: uppercase; letter-spacing: .04em; margin-bottom: 8px; }
.remarks-in-modal__body { background: #f8fafc; border: 1px solid #eef2f6; border-radius: 8px; padding: 14px 16px; font-size: .88rem; color: #1e293b; line-height: 1.7; }
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
                    <div class="remarks-in-modal__divider"></div>
                    <div class="remarks-in-modal__label"><i class="fa-solid fa-rotate-left"></i> DG Remarks</div>
                    <div class="remarks-in-modal__body" id="viewProjectRemarks">-</div>
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

    document.querySelectorAll('button[data-record-id]:not([disabled])').forEach(function(btn) {
        btn.addEventListener('click', function() {
            var id = this.getAttribute('data-record-id');
            var action = this.getAttribute('data-action');

            if (action === 'submit') {
                showConfirmModal('Are you sure you want to submit this draft for review?', function() {
                    var form = document.createElement('form');
                    form.method = 'POST';
                    form.action = '<?= site_url('employee/submit-issp') ?>/' + id;
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
                return;
            }

            if (action === 'resubmit') {
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
                return;
            }

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

<?= $this->endSection() ?>
