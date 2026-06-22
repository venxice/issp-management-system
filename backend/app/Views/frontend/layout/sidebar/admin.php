<?php
$active ??= '';
?>

<a class="nav-link <?= $active === 'dashboard' ? 'active' : '' ?>" href="<?= site_url('admin/dashboard') ?>">
    <i class="fa-solid fa-chart-line"></i> Dashboard
</a>
<a class="nav-link <?= $active === 'users' ? 'active' : '' ?>" href="<?= site_url('admin/users') ?>">
    <i class="fa-solid fa-users"></i> User Management
</a>
<a class="nav-link <?= $active === 'audit' ? 'active' : '' ?>" href="<?= site_url('admin/audit-logs') ?>">
    <i class="fa-solid fa-file-lines"></i> Audit Logs
</a>
