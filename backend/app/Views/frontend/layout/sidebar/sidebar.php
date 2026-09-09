<?php

$roleSlug = (string) session()->get('role_slug');

/*
|--------------------------------------------------------------------------
| Determine Sidebar File
|--------------------------------------------------------------------------
*/
if ($editMode ?? false) {
    $sidebarFile = 'edit-sidebar.php';
} else {
    $sidebarFile = match ($roleSlug) {
        'director_general' => 'director_general.php',
        'ict_planner'      => 'ict_planner.php',
        'employee'         => 'employee.php',
        default            => 'admin.php',
    };
}

/*
|--------------------------------------------------------------------------
| RESOURCE REQUIREMENTS STATUS
|--------------------------------------------------------------------------
| Only check DB records when editing a specific ISSP project.
| Existing records are NOT deleted.
|--------------------------------------------------------------------------
*/

$resourceRequirementStatus = [
    1 => false,
    2 => false,
    3 => false,
];

if (($editMode ?? false) === true) {

    $editProjectId = (int) session()->get('edit_project_id');

    if ($editProjectId > 0) {

        $resourceModel = new \App\Models\ResourceRequirementModel();

        $resourceRequirementStatus =
            $resourceModel->getYearStatus($editProjectId);
    }
}

?>

<aside class="app-sidebar">

    <!-- =========================================================
         BRAND
         ========================================================= -->
    <div class="brand">

        <button
            class="sidebar-close d-lg-none"
            id="sidebarClose"
            type="button"
            aria-label="Close sidebar"
            style="position:absolute;top:12px;right:12px;"
        >
            <i class="fa-solid fa-xmark"></i>
        </button>

        <div class="brand-logo">
            <i class="fa-solid fa-diagram-project"></i>
        </div>

        <div class="brand-title">
            ICT Planner
        </div>

        <div class="brand-description">
            Information Systems <br>
            Strategic Plan
        </div>

    </div>


    <!-- =========================================================
         SIDEBAR NAVIGATION
         ========================================================= -->
    <nav class="sidebar-nav p-2 flex-grow-1">

        <?php include $sidebarFile; ?>

    </nav>


    <!-- =========================================================
         LOGOUT
         ========================================================= -->
    <div class="sidebar-footer p-2 mt-auto">

        <form
            id="logoutForm"
            action="<?= site_url('logout') ?>"
            method="post"
        >

            <?= csrf_field() ?>

            <button
                type="button"
                id="logoutButton"
                class="sidebar-logout w-100 text-start"
            >
                <i class="fa-solid fa-right-from-bracket"></i>
                <span>Logout</span>
            </button>

        </form>

    </div>

</aside>
