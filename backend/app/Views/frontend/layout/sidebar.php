<?php
$roleSlug = (string) session()->get('role_slug');
$dashboardPath = match ($roleSlug) {
    'director_general' => 'director-general/dashboard',
    'ict_planner' => 'ict-planner/dashboard',
    'employee' => 'employee/dashboard',
    default => 'admin/dashboard',
};
?>
<aside class="app-sidebar">
    <div class="brand">
        <div class="brand-text">
            <div class="title">ICT Management System</div>
            <br>
        </div>
    </div>

    <nav class="sidebar-nav p-2 flex-grow-1">
        <a class="nav-link <?= ($active ?? '') === 'dashboard' ? 'active' : '' ?>" href="<?= site_url($dashboardPath) ?>">
            <i class="fa-solid fa-chart-line"></i> Dashboard
        </a>

        <?php if ($roleSlug === 'admin'): ?>
            <a class="nav-link <?= ($active ?? '') === 'users' ? 'active' : '' ?>" href="<?= site_url('admin/users') ?>">
                <i class="fa-solid fa-users"></i> Users
            </a>
            <a class="nav-link <?= ($active ?? '') === 'audit' ? 'active' : '' ?>" href="<?= site_url('admin/audit-logs') ?>">
                <i class="fa-solid fa-file-lines"></i> Audit Logs
            </a>
        <?php endif; ?>
    </nav>

    <div class="sidebar-footer p-2 mt-auto">
        <form action="<?= site_url('logout') ?>" method="post">
            <?= csrf_field() ?>
            <button class="sidebar-logout w-100 text-start" type="submit">
                <i class="fa-solid fa-right-from-bracket"></i> Logout
            </button>
        </form>
    </div>
</aside>
