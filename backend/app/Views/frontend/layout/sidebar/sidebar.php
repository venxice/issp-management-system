<?php
$roleSlug = (string) session()->get('role_slug');
if ($editMode ?? false) {
    $sidebarFile = 'edit-sidebar.php';
} else {
    $sidebarFile = match ($roleSlug) {
        'director_general' => 'director_general.php',
        'ict_planner' => 'ict_planner.php',
        'employee' => 'employee.php',
        default => 'admin.php',
    };
}
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
        <?php include $sidebarFile; ?>
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
