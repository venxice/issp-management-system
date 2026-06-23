<?= $this->extend('frontend/layout/app') ?>

<?= $this->section('content') ?>
<?php
$stats = [
    ['label' => 'Submitted ICT Projects', 'value' => $submittedProjects, 'icon' => 'fa-folder-open'],
    ['label' => 'Approved ICT Projects', 'value' => $approvedProjects, 'icon' => 'fa-check-circle'],
    ['label' => 'Need Revision', 'value' => $needRevision, 'icon' => 'fa-exclamation-circle'],
    ['label' => 'Total Budget', 'value' => '₱' . number_format($totalBudget, 2), 'icon' => 'fa-peso-sign'],
];
?>

<div class="row g-2 mb-2">
    <?php foreach ($stats as $index => $stat): ?>
        <div class="col-md-6 col-xl-3">
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
                        <th>Last Updated</th>
                        <th>Comments</th>
                        <th>Status</th>
                        <th class="text-center">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($recentRecords ?? [] as $record): ?>
                        <tr>
                            <td><?= esc($record['title'] ?? '') ?></td>
                            <td><?= esc($record['updated_at'] ?? $record['created_at'] ?? '') ?></td>
                            <td><span class="activity-meta activity-summary"><?= esc($record['description'] ?? '-') ?></span></td>
                            <td>
                                <?php
                                $status = $record['status'] ?? 'draft';
                                $statusClass = match($status) {
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
                            <td class="text-center">
                                <div class="btn-group">
                                    <button class="btn btn-outline-primary icon-btn" type="button" title="View">
                                        <i class="fa-regular fa-eye"></i>
                                    </button>
                                    <button class="btn btn-outline-secondary icon-btn" type="button" title="Edit">
                                        <i class="fa-regular fa-pen-to-square"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                    <?php if (empty($recentRecords)): ?>
                        <tr><td colspan="5" class="text-center text-muted-strong py-4">No activity yet.</td></tr>
                    <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </section>
    </div>
</div>
<?= $this->endSection() ?>
