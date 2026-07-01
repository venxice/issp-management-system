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
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 10px;
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
    font-size: .9rem;
    font-weight: 700;
    color: var(--brand-dark);
    margin-bottom: 12px;
    margin-top: 20px;
    text-transform: uppercase;
    letter-spacing: .01em;
    border-bottom: 2px solid #e8ecf1;
    padding-bottom: 8px;
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

.navigation-bar {
    display: flex;
    justify-content: center;
    align-items: center;
    gap: 8px;
}

.navigation-bar.has-both {
    justify-content: space-between;
}

.navigation-bar.align-right {
    justify-content: flex-end;
}

.nav-btn {
    display: inline-flex;
    align-items: center;
    gap: 6px;
    padding: 6px 12px;
    border-radius: 4px;
    text-decoration: none;
    font-weight: 500;
    font-size: 0.8rem;
    transition: all 0.2s ease;
    border: 1px solid transparent;
    white-space: nowrap;
}

.nav-btn-prev {
    background: white;
    color: var(--brand);
    border-color: #cbd5e1;
}

.nav-btn-prev:hover {
    background: #f1f5f9;
    border-color: var(--brand);
    color: var(--brand-dark);
}

.nav-btn-next {
    background: var(--brand);
    color: white;
    border-color: var(--brand);
}

.nav-btn-next:hover {
    background: var(--brand-dark);
    border-color: var(--brand-dark);
}

.nav-btn i {
    font-size: 0.8rem;
}

@media (max-width: 768px) {
    .navigation-bar {
        flex-direction: column;
        gap: 8px;
    }

    .nav-btn {
        width: 100%;
        justify-content: center;
    }
}

.footer-actions {
    display: flex;
    justify-content: space-between;
    align-items: center;
    gap: 16px;
    padding: 16px;
    background: #f8fafc;
    border-radius: 8px;
    border: 1px solid #e2e8f0;
}

.action-buttons {
    display: flex;
    gap: 8px;
}

.action-btn {
    display: inline-flex;
    align-items: center;
    gap: 6px;
    padding: 8px 16px;
    border-radius: 6px;
    font-weight: 500;
    font-size: 0.875rem;
    cursor: pointer;
    transition: all 0.2s ease;
    border: 1px solid transparent;
}

.action-btn i {
    font-size: 0.875rem;
}

.action-btn-save {
    background: var(--brand);
    color: white;
    border-color: var(--brand);
}

.action-btn-save:hover {
    background: var(--brand-dark);
    border-color: var(--brand-dark);
    transform: translateY(-1px);
    box-shadow: 0 2px 8px rgba(79, 101, 132, 0.2);
}

.action-btn-clear {
    background: white;
    color: #64748b;
    border-color: #cbd5e1;
}

.action-btn-clear:hover {
    background: #f1f5f9;
    border-color: #94a3b8;
    color: #475569;
    transform: translateY(-1px);
}

.navigation-buttons {
    display: flex;
    gap: 8px;
}

@media (max-width: 768px) {
    .footer-actions {
        flex-direction: column;
        gap: 12px;
    }

    .action-buttons {
        width: 100%;
        justify-content: center;
    }

    .action-btn {
        flex: 1;
        justify-content: center;
    }

    .navigation-buttons {
        width: 100%;
        justify-content: center;
    }

    .nav-btn {
        width: 100%;
        justify-content: center;
    }
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

.help-icon {
    position: relative;
    cursor: pointer;
    color: var(--brand);
    margin-left: 8px;
    font-size: 1rem;
    transition: color 0.2s ease;
}

.help-icon:hover {
    color: var(--brand-dark);
}

.tooltip-content {
    position: fixed;
    background: #1e293b;
    color: #fff;
    padding: 8px 12px;
    border-radius: 6px;
    font-size: .75rem;
    font-weight: 400;
    max-width: 300px;
    white-space: normal;
    width: max-content;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    opacity: 0;
    visibility: hidden;
    transition: all 0.2s ease;
    z-index: 9999;
    pointer-events: none;
}

.tooltip-content.visible {
    opacity: 1;
    visibility: visible;
}
</style>

<div class="row">
    <div class="col-12">
        <div class="page-header mb-3">
            <h1 class="page-title">E. ICT Projects Portfolio</h1>
            <p class="page-subtitle">Proposed ICT Strategy - Internal and cross-agency ICT projects</p>
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
            E.1 Internal ICT Projects
        </button>
        <button type="button" class="project-tab" data-tab="cross-agency-projects">
            E.2 Cross-Agency ICT Projects
        </button>
    </div>

    <!-- E.1 Internal ICT Projects -->
    <div id="internal-projects" class="tab-content active">
        <div class="row mb-3">
            <div class="col-12">
                <div class="section-card">
                    <div class="section-header">
                        <div>
                            <h5 class="section-title">E.1 Internal ICT Projects</h5>
                            <p class="section-subtitle">Projects implemented within the agency</p>
                        </div>
                        <i class="fa-solid fa-circle-question help-icon" 
                           data-tooltip="List ICT projects implemented within your agency."></i>
                    </div>
                    <div class="section-body">
                        <div class="form-section-label">
                            Project Details
                        </div>
                        
                        <div class="row g-3 mb-4">
                            <div class="col-md-12">
                                <label class="form-label">Project Title</label>
                                <input type="text" class="form-control" name="internal_project_title" placeholder="Enter the project title">
                            </div>
                            
                            <div class="col-md-12">
                                <label class="form-label">Description</label>
                                <textarea class="form-control" name="internal_description" rows="4" placeholder="Describe the project..."></textarea>
                            </div>
                            
                            <div class="col-md-12">
                                <label class="form-label">Objectives</label>
                                <textarea class="form-control" name="internal_objectives" rows="3" placeholder="List the project objectives..."></textarea>
                            </div>
                        </div>

                        <!-- Strategic Alignment -->
                        <div class="form-section-label">
                            Strategic Alignment
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
                            Harmonization Framework
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
                            Duration
                        </div>
                        
                        <div class="row g-3 mb-4">
                            <div class="col-md-6">
                                <label class="form-label">Start Date</label>
                                <input type="date" class="form-control" name="internal_start_date">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">End Date</label>
                                <input type="date" class="form-control" name="internal_end_date">
                            </div>
                        </div>

                        <!-- Deliverables -->
                        <div class="form-section-label">
                            Deliverables
                        </div>
                        
                        <div class="row g-3 mb-4">
                            <div class="col-md-4">
                                <label class="form-label">Year 1 Deliverables</label>
                                <textarea class="form-control" name="internal_year1_deliverables" rows="3" placeholder="List Year 1 deliverables..."></textarea>
                            </div>
                            <div class="col-md-4">
                                <label class="form-label">Year 2 Deliverables</label>
                                <textarea class="form-control" name="internal_year2_deliverables" rows="3" placeholder="List Year 2 deliverables..."></textarea>
                            </div>
                            <div class="col-md-4">
                                <label class="form-label">Year 3 Deliverables</label>
                                <textarea class="form-control" name="internal_year3_deliverables" rows="3" placeholder="List Year 3 deliverables..."></textarea>
                            </div>
                        </div>

                        <!-- Implementation Details -->
                        <div class="form-section-label">
                            Implementation Details
                        </div>
                        
                        <div class="row g-3 mb-4">
                            <div class="col-md-6">
                                <label class="form-label">Implementing Unit</label>
                                <input type="text" class="form-control" name="internal_implementing_unit" placeholder="Enter the implementing unit">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Total Cost</label>
                                <input type="text" class="form-control" name="internal_total_cost" placeholder="e.g., ₱5,000,000.00">
                            </div>
                            <div class="col-md-12">
                                <label class="form-label">Funding Source</label>
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
                        <div>
                            <h5 class="section-title">E.2 Cross-Agency ICT Projects</h5>
                            <p class="section-subtitle">Projects involving multiple agencies</p>
                        </div>
                        <i class="fa-solid fa-circle-question help-icon" 
                           data-tooltip="List ICT projects involving collaboration with other agencies."></i>
                    </div>
                    <div class="section-body">
                        <div class="form-section-label">
                            Project Details
                        </div>
                        
                        <div class="row g-3 mb-4">
                            <div class="col-md-12">
                                <label class="form-label">Project Title</label>
                                <input type="text" class="form-control" name="cross_project_title" placeholder="Enter the project title">
                            </div>
                            
                            <div class="col-md-12">
                                <label class="form-label">Description</label>
                                <textarea class="form-control" name="cross_description" rows="4" placeholder="Describe the project..."></textarea>
                            </div>
                            
                            <div class="col-md-12">
                                <label class="form-label">Objectives</label>
                                <textarea class="form-control" name="cross_objectives" rows="3" placeholder="List the project objectives..."></textarea>
                            </div>
                        </div>

                        <!-- Strategic Alignment -->
                        <div class="form-section-label">
                            Strategic Alignment
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
                            Harmonization Framework
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
                            Duration
                        </div>
                        
                        <div class="row g-3 mb-4">
                            <div class="col-md-6">
                                <label class="form-label">Start Date</label>
                                <input type="date" class="form-control" name="cross_start_date">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">End Date</label>
                                <input type="date" class="form-control" name="cross_end_date">
                            </div>
                        </div>

                        <!-- Deliverables -->
                        <div class="form-section-label">
                            Deliverables
                        </div>
                        
                        <div class="row g-3 mb-4">
                            <div class="col-md-4">
                                <label class="form-label">Year 1 Deliverables</label>
                                <textarea class="form-control" name="cross_year1_deliverables" rows="3" placeholder="List Year 1 deliverables..."></textarea>
                            </div>
                            <div class="col-md-4">
                                <label class="form-label">Year 2 Deliverables</label>
                                <textarea class="form-control" name="cross_year2_deliverables" rows="3" placeholder="List Year 2 deliverables..."></textarea>
                            </div>
                            <div class="col-md-4">
                                <label class="form-label">Year 3 Deliverables</label>
                                <textarea class="form-control" name="cross_year3_deliverables" rows="3" placeholder="List Year 3 deliverables..."></textarea>
                            </div>
                        </div>

                        <!-- Agency Details -->
                        <div class="form-section-label">
                            Agency Details
                        </div>
                        
                        <div class="row g-3 mb-4">
                            <div class="col-md-6">
                                <label class="form-label">Lead Agency</label>
                                <input type="text" class="form-control" name="cross_lead_agency" placeholder="Enter the lead agency">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Implementing Agency</label>
                                <input type="text" class="form-control" name="cross_implementing_agency" placeholder="Enter the implementing agency">
                            </div>
                        </div>

                        <!-- Implementation Details -->
                        <div class="form-section-label">
                            Implementation Details
                        </div>
                        
                        <div class="row g-3 mb-4">
                            <div class="col-md-6">
                                <label class="form-label">Implementing Unit</label>
                                <input type="text" class="form-control" name="cross_implementing_unit" placeholder="Enter the implementing unit">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Total Cost</label>
                                <input type="text" class="form-control" name="cross_total_cost" placeholder="e.g., ₱5,000,000.00">
                            </div>
                            <div class="col-md-12">
                                <label class="form-label">Funding Source</label>
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

    <!-- Footer Actions -->
    <div class="row mb-4">
        <div class="col-12">
            <div class="footer-actions">
                <div class="action-buttons">
                    <button type="button" class="action-btn action-btn-save" onclick="window.saveChanges()">
                        <i class="fa-solid fa-save"></i>
                        <span>Save Changes</span>
                    </button>
                    <button type="button" class="action-btn action-btn-clear" onclick="window.clearForm()">
                        <i class="fa-solid fa-eraser"></i>
                        <span>Clear Fields</span>
                    </button>
                </div>
                <div class="navigation-buttons">
                    <button type="button" class="nav-btn nav-btn-prev" onclick="window.navigateToPage('<?= site_url('employee/proposed-ict-strategy/information-systems') ?>')">
                        <i class="fa-solid fa-arrow-left"></i>
                        <span>Information Systems</span>
                    </button>
                    <button type="button" class="nav-btn nav-btn-next" onclick="window.navigateToPage('<?= site_url('employee/proposed-ict-strategy/performance-measurement') ?>')">
                        <span>Performance Framework</span>
                        <i class="fa-solid fa-arrow-right"></i>
                    </button>
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

// Tooltip functionality
const helpIcons = document.querySelectorAll('.help-icon');

helpIcons.forEach(icon => {
    icon.addEventListener('mouseenter', function(e) {
        const tooltipText = this.getAttribute('data-tooltip');
        const tooltip = document.createElement('div');
        tooltip.className = 'tooltip-content';
        tooltip.textContent = tooltipText;
        tooltip.id = 'active-tooltip';
        document.body.appendChild(tooltip);
        
        const rect = this.getBoundingClientRect();
        
        // Position to the right of the icon
        tooltip.style.left = (rect.right + 8) + 'px';
        tooltip.style.top = rect.top + 'px';
        
        // Make it visible after positioning
        requestAnimationFrame(() => {
            tooltip.classList.add('visible');
            // Adjust position if it goes off screen
            const tooltipRect = tooltip.getBoundingClientRect();
            if (tooltipRect.right > window.innerWidth) {
                // Position to the left instead
                tooltip.style.left = (rect.left - tooltipRect.width - 8) + 'px';
            }
            if (tooltipRect.bottom > window.innerHeight) {
                tooltip.style.top = (window.innerHeight - tooltipRect.height - 10) + 'px';
            }
        });
    });
    
    icon.addEventListener('mouseleave', function() {
        const tooltip = document.getElementById('active-tooltip');
        if (tooltip) {
            tooltip.remove();
        }
    });
});

// Load saved data on page load
document.addEventListener('DOMContentLoaded', function() {
    // Auto-save on input change
    const allInputs = document.querySelectorAll('input, textarea, select');
    allInputs.forEach(input => {
        input.addEventListener('change', function() {
            window.saveChanges(false);
        });
    });

    window.loadSavedData();
});

// Clear form function
window.clearForm = function() {
    console.log('clearForm called');
    if (confirm('Are you sure you want to clear all fields? This action cannot be undone.')) {
        const form = document.querySelector('form');
        if (form) {
            form.reset();
            // Clear localStorage
            localStorage.removeItem('ict-projects-form');
            console.log('Form cleared');
        }
    }
};

// Save changes to localStorage
window.saveChanges = function(showAlert = true) {
    console.log('saveChanges called with showAlert:', showAlert);
    const form = document.querySelector('form');
    if (form) {
        const formData = new FormData(form);
        const formDataObj = {};
        
        formData.forEach((value, key) => {
            formDataObj[key] = value;
        });
        
        // Save to localStorage
        localStorage.setItem('ict-projects-form', JSON.stringify(formDataObj));
        console.log('Data saved to localStorage');
        
        // Show success message
        if (showAlert) {
            alert('Changes saved locally! You can continue working and your data will be preserved.');
        }
    }
};

// Load saved data from localStorage on page load
window.loadSavedData = function() {
    console.log('loadSavedData called');
    const savedData = localStorage.getItem('ict-projects-form');
    if (savedData) {
        const formDataObj = JSON.parse(savedData);
        const form = document.querySelector('form');
        
        if (form) {
            Object.keys(formDataObj).forEach(key => {
                const input = form.querySelector(`[name="${key}"]`);
                if (input) {
                    if (input.type === 'checkbox') {
                        input.checked = formDataObj[key] === '1';
                    } else if (input.type === 'radio') {
                        const radio = form.querySelector(`[name="${key}"][value="${formDataObj[key]}"]`);
                        if (radio) radio.checked = true;
                    } else {
                        input.value = formDataObj[key];
                    }
                }
            });
            console.log('Data loaded from localStorage');
        }
    }
};

// Navigate to page after saving
window.navigateToPage = function(url) {
    console.log('navigateToPage called with url:', url);
    window.saveChanges(false);
    setTimeout(() => {
        // Verify data was saved before navigating
        const savedData = localStorage.getItem('ict-projects-form');
        console.log('Data in localStorage before navigation:', savedData ? 'exists' : 'empty');
        window.location.href = url;
    }, 500);
};
</script>

<?= $this->endSection() ?>
