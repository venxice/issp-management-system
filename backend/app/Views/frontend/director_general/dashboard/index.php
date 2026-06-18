<?= $this->extend('frontend/layout/app') ?>

<?= $this->section('content') ?>
<?php
$stats = [
    ['label' => 'Pending for Approval', 'value' => $pendingApproval, 'icon' => 'fa-clock'],
    ['label' => 'Approved ICT Projects', 'value' => $totalApprovedProjects, 'icon' => 'fa-check-circle'],
    ['label' => 'Total Proposed Budget', 'value' => '₱' . number_format($totalProposedBudget, 2), 'icon' => 'fa-peso-sign'],
    ['label' => 'Total Departments', 'value' => $totalDepartments, 'icon' => 'fa-building'],
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
<?= $this->endSection() ?>
