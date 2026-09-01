<?php
$active ??= '';
$agencyPages = ['mandate-vision-mission', 'organizational-structure', 'stakeholder-analysis', 'strategic-concerns', 'network-infrastructure', 'information-systems-inventory', 'e-government-programs'];
$isAgencyPage = in_array($active, $agencyPages);
?>
<style>
.sidebar-section-title {
    font-size: 0.7rem;
    color: rgba(255, 255, 255, 0.5);
    text-transform: uppercase;
    letter-spacing: 0.05em;
    padding: 16px 12px 8px;
    margin: 0;
    font-weight: 600;
}
#agencyInfoDropdownToggle .fa-chevron-down {
    transition: transform 0.3s ease;
}
#agencyInfoDropdown .nav-link {
    padding-left: 12px;
}
</style>

<a class="nav-link <?= $active === 'dashboard' ? 'active' : '' ?>" href="<?= site_url('ict-planner/dashboard') ?>">
    <i class="fa-solid fa-chart-line"></i> Dashboard
</a>
<a class="nav-link <?= $active === 'consolidation' ? 'active' : '' ?>" href="<?= site_url('ict-planner/consolidation') ?>">
    <i class="fa-solid fa-layer-group"></i> Consolidation
</a>

<a class="nav-link <?= $isAgencyPage ? 'active' : '' ?>" href="javascript:void(0)" data-bs-toggle="collapse" data-bs-target="#agencyInfoDropdown" aria-expanded="<?= $isAgencyPage ? 'true' : 'false' ?>" aria-controls="agencyInfoDropdown" id="agencyInfoDropdownToggle">
    <i class="fa-solid fa-building"></i> Agency Information
    <i class="fa-solid fa-chevron-down" style="font-size: .82rem; margin-left: auto;"></i>
</a>

<div class="collapse <?= $isAgencyPage ? 'show' : '' ?>" id="agencyInfoDropdown">
    <div class="sidebar-section-title">Agency Profile</div>

    <a class="nav-link <?= $active === 'mandate-vision-mission' ? 'active' : '' ?>" href="<?= site_url('ict-planner/agency-information/mandate-vision-mission') ?>">
        Mandate, Vision, Mission
    </a>
    <a class="nav-link <?= $active === 'organizational-structure' ? 'active' : '' ?>" href="<?= site_url('ict-planner/agency-information/organizational-structure') ?>">
        Organizational Structure
    </a>
    <a class="nav-link <?= $active === 'stakeholder-analysis' ? 'active' : '' ?>" href="<?= site_url('ict-planner/agency-information/stakeholder-analysis') ?>">
        Stakeholder Analysis
    </a>

    <div class="sidebar-section-title">Current ICT Assessment</div>

    <a class="nav-link <?= $active === 'strategic-concerns' ? 'active' : '' ?>" href="<?= site_url('ict-planner/agency-information/strategic-concerns') ?>">
        Strategic Concerns
    </a>
    <a class="nav-link <?= $active === 'network-infrastructure' ? 'active' : '' ?>" href="<?= site_url('ict-planner/agency-information/network-infrastructure') ?>">
        Network Infrastructure
    </a>
    <a class="nav-link <?= $active === 'information-systems-inventory' ? 'active' : '' ?>" href="<?= site_url('ict-planner/agency-information/information-systems-inventory') ?>">
        Information Systems Inventory
    </a>
    <a class="nav-link <?= $active === 'e-government-programs' ? 'active' : '' ?>" href="<?= site_url('ict-planner/agency-information/e-government-programs') ?>">
        E-Government Programs
    </a>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    var toggle = document.getElementById('agencyInfoDropdownToggle');
    var dropdown = document.getElementById('agencyInfoDropdown');
    if (toggle && dropdown) {
        toggle.addEventListener('click', function(e) {
            e.preventDefault();
        });
        dropdown.addEventListener('show.bs.collapse', function() {
            var chevron = toggle.querySelector('.fa-chevron-down');
            if (chevron) chevron.style.transform = 'rotate(180deg)';
            toggle.setAttribute('aria-expanded', 'true');
        });
        dropdown.addEventListener('hide.bs.collapse', function() {
            var chevron = toggle.querySelector('.fa-chevron-down');
            if (chevron) chevron.style.transform = 'rotate(0deg)';
            toggle.setAttribute('aria-expanded', 'false');
        });
    }
});
</script>
