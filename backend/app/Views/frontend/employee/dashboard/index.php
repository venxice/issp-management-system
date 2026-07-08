<?= $this->extend('frontend/layout/app') ?>

<?= $this->section('content') ?>
<?php $stats = [
    ['label' => 'Submitted ICT Projects', 'value' => $submittedProjects, 'icon' => 'fa-folder-open'],
    ['label' => 'Approved ICT Projects', 'value' => $approvedProjects, 'icon' => 'fa-check-circle'],
    ['label' => 'Need Revision', 'value' => $needRevision, 'icon' => 'fa-exclamation-circle'],
    ['label' => 'Total Proposed Budget', 'value' => '₱' . number_format($totalBudget, 2), 'icon' => 'fa-peso-sign'],
];
?>

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
                        <th>Internal / Cross-Agency Project Title</th>
                        <th>Description</th>
                        <th>Budget</th>
                        <th>Status</th>
                        <th>Last Updated</th>
                        <th class="text-center">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($recentRecords ?? [] as $record): ?>
                        <?php $fd = !empty($record['form_data']) ? json_decode($record['form_data'], true) : []; $ict = $fd['ict-projects-form'] ?? []; $intTitle = $ict['internal_project_title'] ?? $record['title'] ?? '---'; $crossTitle = $ict['cross_project_title'] ?? ''; $intDesc = $ict['internal_description'] ?? $record['description'] ?? '---'; $crossDesc = $ict['cross_description'] ?? ''; $intBudget = $ict['internal_total_cost'] ?? $record['budget'] ?? 0; $crossBudget = $ict['cross_total_cost'] ?? 0; $s = !empty($record['status']) ? $record['status'] : 'draft'; $canEdit = $s === 'draft' || $s === 'returned'; $isDraft = $s === 'draft'; $isReturned = $s === 'returned'; ?>
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
                                <span class="badge badge-status badge-status-<?= $s ?>"><?= esc(ucfirst($s)) ?></span>
                            </td>
                            <td><?= esc($record['updated_at'] ?? $record['created_at'] ?? '') ?></td>
                            <td class="text-center">
                                <div class="d-inline-flex gap-1">
                                    <button class="btn btn-outline-primary icon-btn" type="button" title="View" data-project='<?= json_encode([
                                        'title' => $intTitle ?? $record['title'] ?? '',
                                        'cross_title' => $crossTitle ?? '',
                                        'description' => $intDesc ?? $record['description'] ?? '',
                                        'cross_description' => $crossDesc ?? '',
                                        'budget' => $record['budget'] ?? '',
                                        'cross_budget' => $crossBudget ?? '',
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
.cross-row { display: contents; }
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
                    <div class="key">Internal Title</div><div class="val" id="viewProjectTitle">-</div>
                    <div class="cross-row" id="viewCrossRow"><div class="key">Cross-Agency Title</div><div class="val" id="viewProjectCrossTitle">-</div></div>
                    <div class="key">Internal Description</div><div class="val" id="viewProjectDescription">-</div>
                    <div class="cross-row" id="viewCrossDescRow"><div class="key">Cross-Agency Description</div><div class="val" id="viewProjectCrossDescription">-</div></div>
                    <div class="key">Internal Budget</div><div class="val" id="viewProjectBudget">-</div>
                    <div class="cross-row" id="viewCrossBudgetRow"><div class="key">Cross-Agency Budget</div><div class="val" id="viewProjectCrossBudget">-</div></div>
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
                document.getElementById('viewProjectStatus').textContent = project.status ? project.status.charAt(0).toUpperCase() + project.status.slice(1) : '-';
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
                    var csrfToken = document.querySelector('meta[name="csrf-token"]')?.getAttribute('content');
                    fetch('<?= site_url('employee/submit-issp') ?>', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-Requested-With': 'XMLHttpRequest'
                        },
                        body: JSON.stringify({
                            csrf_test_name: csrfToken,
                            id: id
                        })
                    })
                    .then(function(r) { return r.json(); })
                    .then(function(data) {
                        if (data.success) {
                            location.reload();
                        } else {
                            showAlertModal('Error', data.message || 'Please try again.');
                        }
                    });
                });
                return;
            }

            if (action === 'resubmit') {
                showConfirmModal('Are you sure you want to resubmit this returned project?', function() {
                    var csrfToken = document.querySelector('meta[name="csrf-token"]')?.getAttribute('content');
                    fetch('<?= site_url('employee/resubmit-project') ?>/' + id, {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-Requested-With': 'XMLHttpRequest'
                        },
                        body: JSON.stringify({
                            csrf_test_name: csrfToken
                        })
                    })
                    .then(function(r) { return r.json(); })
                    .then(function(data) {
                        if (data.success) {
                            location.reload();
                        } else {
                            showAlertModal('Error', data.message || 'Please try again.');
                        }
                    });
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
