<?= $this->extend('frontend/layout/app') ?>

<?= $this->section('content') ?>

<div class="row g-0">
    <div class="col-12">
        <section class="panel mb-0">
            <div class="panel-header d-flex align-items-center gap-3">
                <div>
                    <h2 class="panel-title">All Submissions</h2>
                    <p class="panel-subtitle">Consolidated list of all ISSP project submissions.</p>
                </div>
                <div class="ms-auto">
                    <button class="btn btn-sm btn-outline-primary" type="button" id="selectAllBtn" onclick="toggleSelectAll()">
                        <i class="fa-regular fa-square me-1"></i> Select All
                    </button>
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
            <form id="batchDownloadForm" method="post" action="<?= site_url('ict-planner/download-batch') ?>">
                <?= csrf_field() ?>
                <div class="table-responsive mb-0">
                    <table class="table table-ict-projects align-middle mb-0">
                        <thead>
                            <tr>
                                <th style="width:36px;"><input type="checkbox" id="checkAll" onchange="toggleAllCheckboxes(this)"></th>
                                <th>ICT Project Title</th>
                                <th>User</th>
                                <th>Department</th>
                                <th>Budget</th>
                                <th>Submitted Date</th>
                                <th>Status</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if ($projects !== []): ?>
                                <?php foreach ($projects as $project): ?>
                                    <tr>
                                        <td><input type="checkbox" name="project_ids[]" value="<?= $project['id'] ?>" class="project-checkbox" onchange="onCheckboxChange()"></td>
                                        <td class="fw-semibold"><?= esc($project['title'] ?? 'Untitled') ?></td>
                                        <td><?= esc($project['created_by_name'] ?? 'Unknown') ?></td>
                                        <td><?= esc($project['department_name'] ?? 'N/A') ?></td>
                                        <td>₱<?= number_format((float) ($project['budget'] ?? 0), 2) ?></td>
                                        <td class="text-muted"><?= esc($project['submitted_at'] ?? $project['created_at'] ?? '-') ?></td>
                                        <td>
                                            <span class="badge badge-soft" style="font-size:.7rem;padding:4px 10px;
                                                <?php if ($project['status'] === 'pending'): ?>background:#fef7e0;color:#8a6d1e;border-color:#f5e6b8;
                                                <?php elseif ($project['status'] === 'endorsed'): ?>background:#e8f0fe;color:#2a5c8a;border-color:#c5d9f0;
                                                <?php elseif ($project['status'] === 'approved'): ?>background:#e6f4ea;color:#1e6f3f;border-color:#c3e6cb;
                                                <?php elseif ($project['status'] === 'rejected'): ?>background:#fce8e8;color:#a13d3d;border-color:#f0c8c8;
                                                <?php endif; ?>">
                                                <?= esc(ucfirst($project['status'])) ?>
                                            </span>
                                        </td>
                                        <td class="text-center">
                                            <div class="d-flex gap-1 justify-content-center">
                                                <button class="btn btn-outline-primary icon-btn" type="button" title="View" data-project='<?= json_encode([
                                                    'title' => $project['title'] ?? '',
                                                    'description' => $project['description'] ?? '',
                                                    'budget' => $project['budget'] ?? '',
                                                    'status' => $project['status'] ?? '',
                                                    'department' => $project['department_name'] ?? '',
                                                    'updated' => $project['updated_at'] ?? $project['created_at'] ?? '',
                                                    'created' => $project['created_at'] ?? ''
                                                ]) ?>'>
                                                    <i class="fa-regular fa-eye"></i>
                                                </button>
                                                <a href="<?= site_url('ict-planner/view-full/' . $project['id']) ?>" class="btn btn-outline-primary icon-btn" type="button" title="Open Full Submission">
                                                    <i class="fa-solid fa-expand"></i>
                                                </a>
                                                <a href="<?= site_url('ict-planner/download/' . $project['id']) ?>" class="btn btn-outline-primary icon-btn" type="button" title="Download">
                                                    <i class="fa-solid fa-download"></i>
                                                </a>
                                                <?php if ($project['status'] === 'pending'): ?>
                                                    <form method="post" action="<?= site_url('ict-planner/endorse/' . $project['id']) ?>" class="d-inline" onsubmit="return confirm('Endorse this project to Director General for approval?')">
                                                        <?= csrf_field() ?>
                                                        <button class="btn btn-outline-primary icon-btn" type="submit" title="Endorse to Director General">
                                                            <i class="fa-solid fa-check"></i>
                                                        </button>
                                                    </form>
                                                <?php endif; ?>
                                            </div>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <tr>
                                    <td colspan="8" class="text-center text-muted-strong py-4">No submissions found.</td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </form>
        </section>
    </div>
</div>

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
    content: '✓ ';
    font-weight: 700;
}

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

function clearSelection() {
    document.querySelectorAll('.project-checkbox').forEach(function(cb) { cb.checked = false; });
    document.getElementById('checkAll').checked = false;
    updateBulkBar();
}

function downloadSelected() {
    var cbs = document.querySelectorAll('.project-checkbox:checked');
    if (cbs.length === 0) {
        showAlertModal('No Selection', 'Please select at least one project to download.');
        return;
    }
    document.getElementById('batchDownloadForm').submit();
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
});
</script>

<?= $this->endSection() ?>