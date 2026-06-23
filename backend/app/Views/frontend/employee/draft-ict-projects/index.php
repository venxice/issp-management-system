<?= $this->extend('frontend/layout/app') ?>

<?= $this->section('content') ?>

<div class="row g-0">
    <div class="col-12">
        <section class="panel mb-0">
            <div class="panel-header d-flex justify-content-between align-items-center">
                <div>
                    <h2 class="panel-title">Draft ICT Projects</h2>
                    <p class="panel-subtitle">View and manage your draft ICT projects.</p>
                </div>
                <button class="btn btn-primary px-4 py-2 shadow-sm" type="button" data-bs-toggle="modal" data-bs-target="#addIctProjectModal" style="background: linear-gradient(135deg, #6b7280 0%, #4b5563 100%); border: none; font-weight: 500; letter-spacing: 0.5px;">
                    <i class="fa-solid fa-plus me-2"></i>New Draft Project
                </button>
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
                    <?php foreach ($draftProjects ?? [] as $project): ?>
                        <tr>
                            <td><?= esc($project['title'] ?? '') ?></td>
                            <td><span class="activity-meta activity-summary"><?= esc($project['description'] ?? '-') ?></span></td>
                            <td><?= esc($project['budget'] ? '₱' . number_format($project['budget'], 2) : '-') ?></td>
                            <td>
                                <?php
                                $status = $project['status'] ?? 'draft';
                                $statusClass = match($status) {
                                    'draft' => 'badge-secondary',
                                    'approved' => 'badge-success',
                                    'pending' => 'badge-primary',
                                    'rejected' => 'badge-danger',
                                    'submitted' => 'badge-primary',
                                    'revision' => 'badge-warning',
                                    default => 'badge-soft',
                                };
                                ?>
                                <span class="badge <?= $statusClass ?>"><?= esc(ucfirst($status)) ?></span>
                            </td>
                            <td><?= esc($project['updated_at'] ?? $project['created_at'] ?? '') ?></td>
                            <td class="text-center">
                                <div class="btn-group">
                                    <button class="btn btn-outline-primary icon-btn" type="button" title="View">
                                        <i class="fa-regular fa-eye"></i>
                                    </button>
                                    <button class="btn btn-outline-secondary icon-btn" type="button" title="Edit">
                                        <i class="fa-regular fa-pen-to-square"></i>
                                    </button>
                                    <button class="btn btn-outline-success icon-btn" type="button" title="Submit">
                                        <i class="fa-regular fa-paper-plane"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                    <?php if (empty($draftProjects)): ?>
                        <tr><td colspan="6" class="text-center text-muted-strong py-4">No draft ICT projects yet.</td></tr>
                    <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </section>
    </div>
</div>

<div class="modal fade" id="addIctProjectModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add New Draft Project</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="addIctProjectForm">
                    <div class="row g-3">
                        <div class="col-md-12">
                            <label for="projectTitle" class="form-label">Project Title</label>
                            <input type="text" class="form-control" id="projectTitle" name="title" required>
                        </div>
                        <div class="col-md-12">
                            <label for="projectDescription" class="form-label">Description</label>
                            <textarea class="form-control" id="projectDescription" name="description" rows="3" required></textarea>
                        </div>
                        <div class="col-md-6">
                            <label for="projectBudget" class="form-label">Budget (₱)</label>
                            <input type="number" class="form-control" id="projectBudget" name="budget" step="0.01" required>
                        </div>
                        <div class="col-md-6">
                            <label for="projectStatus" class="form-label">Status</label>
                            <select class="form-select" id="projectStatus" name="status" required>
                                <option value="draft" selected>Draft</option>
                                <option value="submitted">Submitted</option>
                                <option value="pending">Pending</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label for="projectStartDate" class="form-label">Start Date</label>
                            <input type="date" class="form-control" id="projectStartDate" name="start_date">
                        </div>
                        <div class="col-md-6">
                            <label for="projectEndDate" class="form-label">End Date</label>
                            <input type="date" class="form-control" id="projectEndDate" name="end_date">
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary" onclick="saveDraftProject()">Save Draft</button>
            </div>
        </div>
    </div>
</div>

<script>
function saveDraftProject() {
    const form = document.getElementById('addIctProjectForm');
    const formData = new FormData(form);
    
    const title = formData.get('title');
    const description = formData.get('description');
    const budget = formData.get('budget');
    
    if (!title || !description || !budget) {
        alert('Please fill in all required fields.');
        return;
    }
    
    alert('Draft project saved successfully!');
    
    const modal = bootstrap.Modal.getInstance(document.getElementById('addIctProjectModal'));
    modal.hide();
    
    form.reset();
}
</script>

<?= $this->endSection() ?>