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
    <button class="sidebar-close d-lg-none" id="sidebarClose" aria-label="Close sidebar" style="position: absolute; top: 12px; right: 12px;">
        <i class="fa-solid fa-xmark"></i>
    </button>
    <div class="brand-logo">
        <i class="fa-solid fa-diagram-project"></i>
    </div>
    <div class="brand-title">
        ICT Planner
    </div>
    <div class="brand-description">
       Information Systems <br> Strategic Plan
    </div>
</div>

    <nav class="sidebar-nav p-2 flex-grow-1">
        <a class="nav-link <?= ($active ?? '') === 'dashboard' ? 'active' : '' ?>" href="<?= site_url($dashboardPath) ?>">
            <i class="fa-solid fa-chart-line"></i> Dashboard
        </a>

        <?php if ($roleSlug === 'admin'): ?>
            <a class="nav-link <?= ($active ?? '') === 'users' ? 'active' : '' ?>" href="<?= site_url('admin/users') ?>">
                <i class="fa-solid fa-users"></i> User Management
            </a>
            <a class="nav-link <?= ($active ?? '') === 'audit' ? 'active' : '' ?>" href="<?= site_url('admin/audit-logs') ?>">
                <i class="fa-solid fa-file-lines"></i> Audit Logs
            </a>
        <?php endif; ?>
    </nav>

    <div class="sidebar-footer p-2 mt-auto">
        <form id="logoutForm" action="<?= site_url('logout') ?>" method="post">
            <?= csrf_field() ?>
            <button class="sidebar-logout w-100 text-start" type="button" id="logoutButton">
                <i class="fa-solid fa-right-from-bracket"></i> Logout
            </button>
        </form>
    </div>
</aside>
