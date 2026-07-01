<?php
$active ??= '';
?>

<a class="nav-link <?= $active === 'dashboard' ? 'active' : '' ?>" href="<?= site_url('ict-planner/dashboard') ?>">
    <i class="fa-solid fa-chart-line"></i> Dashboard
</a>
<a class="nav-link <?= $active === 'consolidation' ? 'active' : '' ?>" href="<?= site_url('ict-planner/consolidation') ?>">
    <i class="fa-solid fa-layer-group"></i> Consolidation
</a>
