<?= $this->extend('frontend/layout/app') ?>

<?= $this->section('content') ?>
<style>
.section-card {
    background: var(--panel);
    border: 1px solid #dde4ed;
    border-radius: 10px;
    box-shadow: 0 12px 26px rgba(15, 23, 42, .05);
    overflow: hidden;
    margin-bottom: 20px;
}

.section-header {
    background: linear-gradient(180deg, #566d8b 0%, var(--brand) 100%);
    color: #fff;
    padding: 14px 18px;
    border-bottom: 1px solid rgba(255,255,255,.1);
}

.section-header .section-title {
    font-size: .98rem;
    font-weight: 700;
    margin: 0;
    color: #fff;
}

.section-header .section-subtitle {
    font-size: .76rem;
    color: rgba(255,255,255,.82);
    margin: 4px 0 0;
}

.section-body {
    padding: 18px;
}

.info-banner {
    background: linear-gradient(135deg, #e8f4f8 0%, #f0f6fa 100%);
    border-left: 4px solid var(--brand);
    border-radius: 6px;
    padding: 12px 16px;
    margin-bottom: 16px;
    color: var(--ink);
    font-size: .82rem;
}

.info-banner i {
    color: var(--brand);
    margin-right: 8px;
}

.form-section-label {
    font-size: .85rem;
    font-weight: 600;
    color: var(--brand-dark);
    margin-bottom: 8px;
    text-transform: uppercase;
    letter-spacing: .02em;
}

.form-label {
    font-size: .82rem;
    font-weight: 600;
    color: var(--ink);
    margin-bottom: 4px;
}

.form-control, .form-select {
    border: 1px solid #d0dae6;
    border-radius: 6px;
    font-size: .82rem;
    padding: 8px 12px;
    transition: all 0.2s ease;
}

.form-control:focus, .form-select:focus {
    border-color: var(--brand);
    box-shadow: 0 0 0 3px rgba(79, 101, 132, .1);
}

.form-text {
    font-size: .74rem;
    color: var(--muted);
    margin-top: 4px;
}

.action-bar {
    background: var(--panel);
    border: 1px solid #dde4ed;
    border-radius: 10px;
    padding: 16px 18px;
    box-shadow: 0 12px 26px rgba(15, 23, 42, .05);
    position: sticky;
    bottom: 14px;
    z-index: 100;
}

.project-tabs {
    display: flex;
    gap: 4px;
    margin-bottom: 20px;
    border-bottom: 2px solid #d0dae6;
}

.project-tab {
    padding: 12px 20px;
    background: transparent;
    border: none;
    border-bottom: 3px solid transparent;
    font-size: .85rem;
    font-weight: 600;
    color: var(--muted);
    cursor: pointer;
    transition: all 0.2s ease;
    margin-bottom: -2px;
}

.project-tab:hover {
    color: var(--brand);
    background: rgba(79, 101, 132, .05);
}

.project-tab.active {
    color: var(--brand);
    border-bottom-color: var(--brand);
    background: rgba(79, 101, 132, .08);
}

.tab-content {
    display: none;
}

.tab-content.active {
    display: block;
}

.checkbox-group {
    display: flex;
    flex-wrap: wrap;
    gap: 12px;
}

.checkbox-item {
    display: flex;
    align-items: center;
    gap: 6px;
}

.checkbox-item input {
    width: 16px;
    height: 16px;
}

.checkbox-item label {
    font-size: .8rem;
    color: var(--ink);
    margin: 0;
    cursor: pointer;
}
</style>

<div class="row">
    <div class="col-12">
        <div class="page-header mb-3">
            <h1 class="page-title">E. ICT Projects</h1>
            <p class="page-subtitle">Internal and cross-agency ICT projects</p>
        </div>
        
        <div class="info-banner">
            <i class="fa-solid fa-info-circle"></i>
            Provide detailed information about your agency's ICT projects, including internal projects and cross-agency initiatives.
        </div>
    </div>
</div>

<form action="<?= site_url('employee/proposed-ict-strategy/ict-projects/save') ?>" method="post" enctype="multipart/form-data">
    <?= csrf_field() ?>

    <!-- Project Tabs -->
    <div class="project-tabs">
        <button type="button" class="project-tab active" data-tab="internal-projects">
            <i class="fa-solid fa-building me-2"></i>E.1 Internal ICT Projects
        </button>
        <button type="button" class="project-tab" data-tab="cross-agency-projects">
            <i class="fa-solid fa-handshake me-2"></i>E.2 Cross-Agency ICT Projects
        </button>
    </div>

    <!-- E.1 Internal ICT Projects -->
    <div id="internal-projects" class="tab-content active">
        <div class="row mb-3">
            <div class="col-12">
                <div class="section-card">
                    <div class="section-header">
                        <h5 class="section-title">E.1 Internal ICT Projects</h5>
                        <p class="section-subtitle">Projects implemented within the agency</p>
                    </div>
                    <div class="section-body">
                        <div class="form-section-label">
                            <i class="fa-solid fa-project-diagram me-2"></i>Project Details
                        </div>
                        
                        <div class="row g-3 mb-4">
                            <div class="col-md-12">
                                <label class="form-label"><i class="fa-solid fa-heading me-1"></i>Project Title</label>
                                <input type="text" class="form-control" name="internal_project_title" placeholder="Enter the project title">
                            </div>
                            
                            <div class="col-md-12">
                                <label class="form-label"><i class="fa-solid fa-align-left me-1"></i>Description</label>
                                <textarea class="form-control" name="internal_description" rows="4" placeholder="Describe the project..."></textarea>
                            </div>
                            
                            <div class="col-md-12">
                                <label class="form-label"><i class="fa-solid fa-bullseye me-1"></i>Objectives</label>
                                <textarea class="form-control" name="internal_objectives" rows="3" placeholder="List the project objectives..."></textarea>
                            </div>
                        </div>

                        <!-- Strategic Alignment -->
                        <div class="form-section-label">
                            <i class="fa-solid fa-crosshairs me-2"></i>Strategic Alignment
                        </div>
                        
                        <div class="info-banner mb-3">
                            <i class="fa-solid fa-check"></i>
                            Select all that apply
                        </div>
                        
                        <div class="checkbox-group mb-4">
                            <div class="checkbox-item">
                                <input type="checkbox" name="internal_strategic_1" id="internal_strategic_1">
                                <label for="internal_strategic_1">Digital Transformation</label>
                            </div>
                            <div class="checkbox-item">
                                <input type="checkbox" name="internal_strategic_2" id="internal_strategic_2">
                                <label for="internal_strategic_2">Service Delivery Improvement</label>
                            </div>
                            <div class="checkbox-item">
                                <input type="checkbox" name="internal_strategic_3" id="internal_strategic_3">
                                <label for="internal_strategic_3">Operational Efficiency</label>
                            </div>
                            <div class="checkbox-item">
                                <input type="checkbox" name="internal_strategic_4" id="internal_strategic_4">
                                <label for="internal_strategic_4">Cost Reduction</label>
                            </div>
                            <div class="checkbox-item">
                                <input type="checkbox" name="internal_strategic_5" id="internal_strategic_5">
                                <label for="internal_strategic_5">Citizen Engagement</label>
                            </div>
                        </div>

                        <!-- Harmonization Framework -->
                        <div class="form-section-label">
                            <i class="fa-solid fa-layer-group me-2"></i>Harmonization Framework
                        </div>
                        
                        <div class="info-banner mb-3">
                            <i class="fa-solid fa-check"></i>
                            Select all that apply
                        </div>
                        
                        <div class="checkbox-group mb-4">
                            <div class="checkbox-item">
                                <input type="checkbox" name="internal_harmonization_1" id="internal_harmonization_1">
                                <label for="internal_harmonization_1">e-Government Masterplan</label>
                            </div>
                            <div class="checkbox-item">
                                <input type="checkbox" name="internal_harmonization_2" id="internal_harmonization_2">
                                <label for="internal_harmonization_2">ICT Standards</label>
                            </div>
                            <div class="checkbox-item">
                                <input type="checkbox" name="internal_harmonization_3" id="internal_harmonization_3">
                                <label for="internal_harmonization_3">Data Privacy Compliance</label>
                            </div>
                            <div class="checkbox-item">
                                <input type="checkbox" name="internal_harmonization_4" id="internal_harmonization_4">
                                <label for="internal_harmonization_4">Security Standards</label>
                            </div>
                            <div class="checkbox-item">
                                <input type="checkbox" name="internal_harmonization_5" id="internal_harmonization_5">
                                <label for="internal_harmonization_5">Interoperability Framework</label>
                            </div>
                        </div>

                        <!-- Duration -->
                        <div class="form-section-label">
                            <i class="fa-solid fa-calendar me-2"></i>Duration
                        </div>
                        
                        <div class="row g-3 mb-4">
                            <div class="col-md-6">
                                <label class="form-label"><i class="fa-solid fa-calendar-check me-1"></i>Start Date</label>
                                <input type="date" class="form-control" name="internal_start_date">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label"><i class="fa-solid fa-calendar-times me-1"></i>End Date</label>
                                <input type="date" class="form-control" name="internal_end_date">
                            </div>
                        </div>

                        <!-- Deliverables -->
                        <div class="form-section-label">
                            <i class="fa-solid fa-tasks me-2"></i>Deliverables
                        </div>
                        
                        <div class="row g-3 mb-4">
                            <div class="col-md-4">
                                <label class="form-label"><i class="fa-solid fa-1 me-1"></i>Year 1 Deliverables</label>
                                <textarea class="form-control" name="internal_year1_deliverables" rows="3" placeholder="List Year 1 deliverables..."></textarea>
                            </div>
                            <div class="col-md-4">
                                <label class="form-label"><i class="fa-solid fa-2 me-1"></i>Year 2 Deliverables</label>
                                <textarea class="form-control" name="internal_year2_deliverables" rows="3" placeholder="List Year 2 deliverables..."></textarea>
                            </div>
                            <div class="col-md-4">
                                <label class="form-label"><i class="fa-solid fa-3 me-1"></i>Year 3 Deliverables</label>
                                <textarea class="form-control" name="internal_year3_deliverables" rows="3" placeholder="List Year 3 deliverables..."></textarea>
                            </div>
                        </div>

                        <!-- Implementation Details -->
                        <div class="form-section-label">
                            <i class="fa-solid fa-cogs me-2"></i>Implementation Details
                        </div>
                        
                        <div class="row g-3 mb-4">
                            <div class="col-md-6">
                                <label class="form-label"><i class="fa-solid fa-building-user me-1"></i>Implementing Unit</label>
                                <input type="text" class="form-control" name="internal_implementing_unit" placeholder="Enter the implementing unit">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label"><i class="fa-solid fa-coins me-1"></i>Total Cost</label>
                                <input type="text" class="form-control" name="internal_total_cost" placeholder="e.g., ₱5,000,000.00">
                            </div>
                            <div class="col-md-12">
                                <label class="form-label"><i class="fa-solid fa-wallet me-1"></i>Funding Source</label>
                                <select class="form-select" name="internal_funding_source">
                                    <option value="">Select funding source</option>
                                    <option value="national-budget">National Budget</option>
                                    <option value="agency-budget">Agency Budget</option>
                                    <option value="donor-funded">Donor-Funded</option>
                                    <option value="public-private">Public-Private Partnership</option>
                                    <option value="other">Other</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- E.2 Cross-Agency ICT Projects -->
    <div id="cross-agency-projects" class="tab-content">
        <div class="row mb-3">
            <div class="col-12">
                <div class="section-card">
                    <div class="section-header">
                        <h5 class="section-title">E.2 Cross-Agency ICT Projects</h5>
                        <p class="section-subtitle">Projects involving multiple agencies</p>
                    </div>
                    <div class="section-body">
                        <div class="form-section-label">
                            <i class="fa-solid fa-project-diagram me-2"></i>Project Details
                        </div>
                        
                        <div class="row g-3 mb-4">
                            <div class="col-md-12">
                                <label class="form-label"><i class="fa-solid fa-heading me-1"></i>Project Title</label>
                                <input type="text" class="form-control" name="cross_project_title" placeholder="Enter the project title">
                            </div>
                            
                            <div class="col-md-12">
                                <label class="form-label"><i class="fa-solid fa-align-left me-1"></i>Description</label>
                                <textarea class="form-control" name="cross_description" rows="4" placeholder="Describe the project..."></textarea>
                            </div>
                            
                            <div class="col-md-12">
                                <label class="form-label"><i class="fa-solid fa-bullseye me-1"></i>Objectives</label>
                                <textarea class="form-control" name="cross_objectives" rows="3" placeholder="List the project objectives..."></textarea>
                            </div>
                        </div>

                        <!-- Strategic Alignment -->
                        <div class="form-section-label">
                            <i class="fa-solid fa-crosshairs me-2"></i>Strategic Alignment
                        </div>
                        
                        <div class="info-banner mb-3">
                            <i class="fa-solid fa-check"></i>
                            Select all that apply
                        </div>
                        
                        <div class="checkbox-group mb-4">
                            <div class="checkbox-item">
                                <input type="checkbox" name="cross_strategic_1" id="cross_strategic_1">
                                <label for="cross_strategic_1">Digital Transformation</label>
                            </div>
                            <div class="checkbox-item">
                                <input type="checkbox" name="cross_strategic_2" id="cross_strategic_2">
                                <label for="cross_strategic_2">Service Delivery Improvement</label>
                            </div>
                            <div class="checkbox-item">
                                <input type="checkbox" name="cross_strategic_3" id="cross_strategic_3">
                                <label for="cross_strategic_3">Operational Efficiency</label>
                            </div>
                            <div class="checkbox-item">
                                <input type="checkbox" name="cross_strategic_4" id="cross_strategic_4">
                                <label for="cross_strategic_4">Cost Reduction</label>
                            </div>
                            <div class="checkbox-item">
                                <input type="checkbox" name="cross_strategic_5" id="cross_strategic_5">
                                <label for="cross_strategic_5">Citizen Engagement</label>
                            </div>
                        </div>

                        <!-- Harmonization Framework -->
                        <div class="form-section-label">
                            <i class="fa-solid fa-layer-group me-2"></i>Harmonization Framework
                        </div>
                        
                        <div class="info-banner mb-3">
                            <i class="fa-solid fa-check"></i>
                            Select all that apply
                        </div>
                        
                        <div class="checkbox-group mb-4">
                            <div class="checkbox-item">
                                <input type="checkbox" name="cross_harmonization_1" id="cross_harmonization_1">
                                <label for="cross_harmonization_1">e-Government Masterplan</label>
                            </div>
                            <div class="checkbox-item">
                                <input type="checkbox" name="cross_harmonization_2" id="cross_harmonization_2">
                                <label for="cross_harmonization_2">ICT Standards</label>
                            </div>
                            <div class="checkbox-item">
                                <input type="checkbox" name="cross_harmonization_3" id="cross_harmonization_3">
                                <label for="cross_harmonization_3">Data Privacy Compliance</label>
                            </div>
                            <div class="checkbox-item">
                                <input type="checkbox" name="cross_harmonization_4" id="cross_harmonization_4">
                                <label for="cross_harmonization_4">Security Standards</label>
                            </div>
                            <div class="checkbox-item">
                                <input type="checkbox" name="cross_harmonization_5" id="cross_harmonization_5">
                                <label for="cross_harmonization_5">Interoperability Framework</label>
                            </div>
                        </div>

                        <!-- Duration -->
                        <div class="form-section-label">
                            <i class="fa-solid fa-calendar me-2"></i>Duration
                        </div>
                        
                        <div class="row g-3 mb-4">
                            <div class="col-md-6">
                                <label class="form-label"><i class="fa-solid fa-calendar-check me-1"></i>Start Date</label>
                                <input type="date" class="form-control" name="cross_start_date">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label"><i class="fa-solid fa-calendar-times me-1"></i>End Date</label>
                                <input type="date" class="form-control" name="cross_end_date">
                            </div>
                        </div>

                        <!-- Deliverables -->
                        <div class="form-section-label">
                            <i class="fa-solid fa-tasks me-2"></i>Deliverables
                        </div>
                        
                        <div class="row g-3 mb-4">
                            <div class="col-md-4">
                                <label class="form-label"><i class="fa-solid fa-1 me-1"></i>Year 1 Deliverables</label>
                                <textarea class="form-control" name="cross_year1_deliverables" rows="3" placeholder="List Year 1 deliverables..."></textarea>
                            </div>
                            <div class="col-md-4">
                                <label class="form-label"><i class="fa-solid fa-2 me-1"></i>Year 2 Deliverables</label>
                                <textarea class="form-control" name="cross_year2_deliverables" rows="3" placeholder="List Year 2 deliverables..."></textarea>
                            </div>
                            <div class="col-md-4">
                                <label class="form-label"><i class="fa-solid fa-3 me-1"></i>Year 3 Deliverables</label>
                                <textarea class="form-control" name="cross_year3_deliverables" rows="3" placeholder="List Year 3 deliverables..."></textarea>
                            </div>
                        </div>

                        <!-- Agency Details -->
                        <div class="form-section-label">
                            <i class="fa-solid fa-building me-2"></i>Agency Details
                        </div>
                        
                        <div class="row g-3 mb-4">
                            <div class="col-md-6">
                                <label class="form-label"><i class="fa-solid fa-flag me-1"></i>Lead Agency</label>
                                <input type="text" class="form-control" name="cross_lead_agency" placeholder="Enter the lead agency">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label"><i class="fa-solid fa-building-user me-1"></i>Implementing Agency</label>
                                <input type="text" class="form-control" name="cross_implementing_agency" placeholder="Enter the implementing agency">
                            </div>
                        </div>

                        <!-- Implementation Details -->
                        <div class="form-section-label">
                            <i class="fa-solid fa-cogs me-2"></i>Implementation Details
                        </div>
                        
                        <div class="row g-3 mb-4">
                            <div class="col-md-6">
                                <label class="form-label"><i class="fa-solid fa-users me-1"></i>Implementing Unit</label>
                                <input type="text" class="form-control" name="cross_implementing_unit" placeholder="Enter the implementing unit">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label"><i class="fa-solid fa-coins me-1"></i>Total Cost</label>
                                <input type="text" class="form-control" name="cross_total_cost" placeholder="e.g., ₱5,000,000.00">
                            </div>
                            <div class="col-md-12">
                                <label class="form-label"><i class="fa-solid fa-wallet me-1"></i>Funding Source</label>
                                <select class="form-select" name="cross_funding_source">
                                    <option value="">Select funding source</option>
                                    <option value="national-budget">National Budget</option>
                                    <option value="agency-budget">Agency Budget</option>
                                    <option value="donor-funded">Donor-Funded</option>
                                    <option value="public-private">Public-Private Partnership</option>
                                    <option value="multi-agency">Multi-Agency Funded</option>
                                    <option value="other">Other</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Action Buttons -->
    <div class="row mb-4">
        <div class="col-12">
            <div class="action-bar">
                <div class="d-flex flex-wrap gap-2 justify-content-between align-items-center">
                    <div class="d-flex gap-2">
                        <button type="submit" class="btn btn-primary">
                            <i class="fa-solid fa-save me-2"></i>Save Progress
                        </button>
                        <a href="<?= site_url('employee/dashboard') ?>" class="btn btn-outline-secondary">
                            <i class="fa-solid fa-house me-2"></i>Dashboard
                        </a>
                    </div>
                    <div class="d-flex gap-2">
                        <a href="<?= site_url('employee/proposed-ict-strategy/information-systems') ?>" class="btn btn-outline-secondary">
                            <i class="fa-solid fa-arrow-left me-2"></i>Back: Information Systems
                        </a>
                        <a href="<?= site_url('employee/proposed-ict-strategy/performance-measurement') ?>" class="btn btn-success">
                            Next: Performance Framework <i class="fa-solid fa-arrow-right ms-2"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>

<script>
// Tab switching functionality
document.querySelectorAll('.project-tab').forEach(tab => {
    tab.addEventListener('click', function() {
        // Remove active class from all tabs
        document.querySelectorAll('.project-tab').forEach(t => t.classList.remove('active'));
        // Add active class to clicked tab
        this.classList.add('active');
        
        // Hide all tab contents
        document.querySelectorAll('.tab-content').forEach(content => {
            content.classList.remove('active');
        });
        
        // Show selected tab content
        const tabId = this.getAttribute('data-tab');
        document.getElementById(tabId).classList.add('active');
    });
});
</script>

<?= $this->endSection() ?>
