<?php
$active ??= '';
?>

<a class="nav-link <?= $active === 'dashboard' ? 'active' : '' ?>" href="<?= site_url('director-general/dashboard') ?>">
    <i class="fa-solid fa-chart-line"></i> Dashboard
</a>
<a class="nav-link <?= $active === 'pending-approval' ? 'active' : '' ?>" href="<?= site_url('director-general/pending-approval') ?>">
    <i class="fa-solid fa-clock"></i> Pending Approval
</a>
<a class="nav-link <?= $active === 'approved-projects' ? 'active' : '' ?>" href="<?= site_url('director-general/approved-projects') ?>">
    <i class="fa-solid fa-check-circle"></i> Approved Projects
</a>
