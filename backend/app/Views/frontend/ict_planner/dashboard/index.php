<?= $this->extend('frontend/layout/app') ?>

<?= $this->section('content') ?>
<?php
$stats = [
    ['label' => 'Submitted ICT Projects', 'value' => $submittedProjects, 'icon' => 'fa-folder-open'],
    ['label' => 'Total Consolidates', 'value' => $totalConsolidates, 'icon' => 'fa-layer-group'],
    ['label' => 'Pending Consolidation', 'value' => $pendingConsolidation, 'icon' => 'fa-clock'],
    ['label' => 'Total Proposed Budget', 'value' => '₱' . number_format($totalProposedBudget, 2), 'icon' => 'fa-peso-sign'],
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
