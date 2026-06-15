<?= $this->extend('frontend/layout/app') ?>

<?= $this->section('content') ?>
<?php
$stats = [
    ['label' => 'Users', 'value' => $totalUsers, 'icon' => 'fa-users'],
    ['label' => 'Active', 'value' => $activeUsers, 'icon' => 'fa-user-check'],
    ['label' => 'Divisions', 'value' => $departments, 'icon' => 'fa-building'],
    ['label' => 'Logs', 'value' => count($recentLogs ?? []), 'icon' => 'fa-file-lines'],
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

<div class="row g-2">
    <div class="col-lg-8">
        <section class="panel">
            <div class="panel-header">
                <h2 class="panel-title">ICT Planner Workspace</h2>
                <p class="panel-subtitle">Planning and coordination view for ICT oversight.</p>
            </div>
            <div class="panel-body">
                <div class="row g-3">
                    <div class="col-md-6">
                        <div class="p-3 border rounded-3 h-100">
                            <div class="text-muted-strong small">Planning focus</div>
                            <div class="fw-semibold">Monitor organizational distribution and technical readiness.</div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="p-3 border rounded-3 h-100">
                            <div class="text-muted-strong small">Operational note</div>
                            <div class="fw-semibold">Use division trends and logs to guide ICT scheduling.</div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <div class="col-lg-4">
        <section class="panel h-100">
            <div class="panel-header">
                <h2 class="panel-title">Work Queue</h2>
                <p class="panel-subtitle">Quick planning reminders.</p>
            </div>
            <div class="panel-body">
                <ul class="list-unstyled mb-0 small">
                    <li class="mb-2"><i class="fa-solid fa-calendar-check me-2 text-primary"></i> Review division data monthly.</li>
                    <li class="mb-2"><i class="fa-solid fa-calendar-check me-2 text-primary"></i> Check recent account updates.</li>
                    <li><i class="fa-solid fa-calendar-check me-2 text-primary"></i> Coordinate planned ICT actions with administrators.</li>
                </ul>
            </div>
        </section>
    </div>
</div>
<?= $this->endSection() ?>
