<?= $this->extend('frontend/layout/app') ?>

<?= $this->section('content') ?>
<?php $stats = [
    ['label' => 'Submitted ICT Projects', 'value' => $submittedProjects, 'icon' => 'fa-folder-open'],
    ['label' => 'Approved ICT Projects', 'value' => $approvedProjects, 'icon' => 'fa-check-circle'],
    ['label' => 'Need Revision', 'value' => $needRevision, 'icon' => 'fa-exclamation-circle'],
    ['label' => 'Total Budget', 'value' => '₱' . number_format($totalBudget, 2), 'icon' => 'fa-peso-sign'],
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
                        <th>ICT Project Title</th>
                        <th>Description</th>
                        <th>Budget</th>
                        <th>Status</th>
                        <th>Last Updated</th>
                        <th class="text-center">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($recentRecords ?? [] as $record): ?>
                        <tr>
                            <td><?= esc($record['title'] ?: '---') ?></td>
                            <td><span class="activity-meta activity-summary"><?= esc($record['description'] ?: '---') ?></span></td>
                            <td><?= esc($record['budget'] ? '₱' . number_format($record['budget'], 2) : '-') ?></td>
                            <td>
                                <?php $status = !empty($record['status']) ? $record['status'] : 'draft'; ?>
                                <span class="badge badge-status badge-status-<?= $status ?>"><?= esc(ucfirst($status)) ?></span>
                            </td>
                            <td><?= esc($record['updated_at'] ?? $record['created_at'] ?? '') ?></td>
                            <td class="text-center">
                                <div class="d-inline-flex gap-1">
                                    <button class="btn btn-outline-primary icon-btn" type="button" title="View" data-project='<?= json_encode([
                                        'title' => $record['title'] ?? '',
                                        'description' => $record['description'] ?? '',
                                        'budget' => $record['budget'] ?? '',
                                        'status' => $record['status'] ?? '',
                                        'department' => $record['department_name'] ?? '',
                                        'updated' => $record['updated_at'] ?? $record['created_at'] ?? '',
                                        'created' => $record['created_at'] ?? ''
                                    ]) ?>'>
                                        <i class="fa-regular fa-eye"></i>
                                    </button>
                                    <button class="btn btn-outline-secondary icon-btn" type="button" title="Edit" data-record-id="<?= $record['id'] ?>" data-status="<?= $record['status'] ?? '' ?>" <?= ($record['status'] ?? '') !== 'draft' ? 'disabled' : '' ?>>
                                        <i class="fa-regular fa-pen-to-square"></i>
                                    </button>
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
                    <div class="key">Title</div><div class="val" id="viewProjectTitle">-</div>
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

document.addEventListener('DOMContentLoaded', function() {
    document.querySelectorAll('button[title="View"]').forEach(function(btn) {
        btn.addEventListener('click', function() {
            try {
                var project = JSON.parse(this.getAttribute('data-project'));
                document.getElementById('viewProjectTitle').textContent = project.title || '-';
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

    document.querySelectorAll('button[data-record-id]:not([disabled])').forEach(function(btn) {
        btn.addEventListener('click', function() {
            var id = this.getAttribute('data-record-id');
            fetch('<?= site_url('employee/load-form-data') ?>/' + id)
                .then(function(r) { return r.json(); })
                .then(function(data) {
                    if (data.success && data.form_data) {
                        Object.keys(data.form_data).forEach(function(key) {
                            localStorage.setItem(key, JSON.stringify(data.form_data[key]));
                        });
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
