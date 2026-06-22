<?php
$active ??= '';
?>

<a class="nav-link <?= $active === 'dashboard' ? 'active' : '' ?>" href="<?= site_url('employee/dashboard') ?>">
    <i class="fa-solid fa-chart-line"></i> Dashboard
</a>
