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

.kpi-table {
    width: 100%;
    border-collapse: separate;
    border-spacing: 0;
}

.kpi-table th {
    background: linear-gradient(135deg, #f8fafc 0%, #edf2f7 100%);
    color: var(--ink);
    font-weight: 700;
    font-size: .8rem;
    padding: 10px 12px;
    border-bottom: 2px solid #d0dae6;
    text-transform: uppercase;
    letter-spacing: .01em;
}

.kpi-table td {
    padding: 10px 12px;
    border-bottom: 1px solid #e8ecf1;
    vertical-align: top;
}

.kpi-table tr:last-child td {
    border-bottom: none;
}

.kpi-table tr:hover {
    background: #f8fafc;
}

.kpi-table .form-control-sm {
    font-size: .78rem;
    padding: 6px 10px;
    border: 1px solid #d0dae6;
    border-radius: 4px;
    width: 100%;
}

.kpi-table .form-control-sm:focus {
    border-color: var(--brand);
    box-shadow: 0 0 0 2px rgba(79, 101, 132, .1);
}

.kpi-table .form-control {
    font-size: .78rem;
    padding: 6px 10px;
    border: 1px solid #d0dae6;
    border-radius: 4px;
    width: 100%;
    resize: vertical;
    min-height: 60px;
}

.kpi-table .form-control:focus {
    border-color: var(--brand);
    box-shadow: 0 0 0 2px rgba(79, 101, 132, .1);
}

.project-card {
    background: #f8fafc;
    border: 1px solid #d0dae6;
    border-radius: 8px;
    padding: 16px;
    margin-bottom: 20px;
}

.project-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 16px;
    padding-bottom: 12px;
    border-bottom: 2px solid #e8ecf1;
    gap: 10px;
}

.project-header h6 {
    font-size: .9rem;
    font-weight: 700;
    color: var(--brand-dark);
    margin: 0;
}

.remove-project-btn {
    background: #dc3545;
    color: #fff;
    border: none;
    border-radius: 4px;
    padding: 6px 12px;
    font-size: .75rem;
    font-weight: 600;
    cursor: pointer;
    transition: all 0.2s ease;
}

.remove-project-btn:hover {
    background: #c82333;
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
<style>
.file-preview {
    margin-top: 8px;
    padding: 8px 12px;
    background: #f8f9fa;
    border: 1px solid #dee2e6;
    border-radius: 6px;
    display: flex;
    align-items: center;
    gap: 10px;
    font-size: .82rem;
}
.file-preview img {
    max-width: 80px;
    max-height: 60px;
    border-radius: 4px;
    object-fit: cover;
}
.file-preview .file-name {
    color: var(--ink);
    font-weight: 600;
    flex: 1;
    overflow: hidden;
    text-overflow: ellipsis;
    white-space: nowrap;
}
.file-preview .file-size {
    color: var(--muted);
    font-size: .72rem;
}
</style>

<div class="row">
    <div class="col-12">
        <div class="page-header mb-3">
            <h1 class="page-title">Performance Measurement & KPIs</h1>
            <p class="page-subtitle">Key Performance Indicators framework</p>
        </div>
    </div>
</div>

<form id="mainForm" action="<?= site_url('employee/proposed-ict-strategy/performance-measurement/save') ?>" method="post">
    <?= csrf_field() ?>

<div class="project-tabs">
    <button type="button" class="project-tab active" data-tab="internal-kpi">F.1 Internal ICT Projects</button>
    <button type="button" class="project-tab" data-tab="cross-agency-kpi">F.2 Cross-Agency ICT Projects</button>
</div>

<div id="internal-kpi" class="tab-content active">
    <div class="section-card">
        <div class="section-header">
            <div>
                <div class="d-flex align-items-center">
                    <h5 class="section-title mb-0">F. Performance Measurement Framework</h5>
                    <i class="fa-solid fa-circle-question help-icon" data-tooltip="Define KPIs for internal ICT projects to measure progress and outcomes."></i>
                </div>
                <p class="section-subtitle">Establish Key Performance Indicators (KPIs) for each internal ICT project.</p>
            </div>        </div>
        <div class="section-body">
            <div class="form-section-label">
                <span>Key Performance Indicators
                  <i class="fa-solid fa-circle-question help-icon"
              data-tooltip="Define Key Performance Indicators for each internal ICT project to measure progress and outcomes."></i>
            </div>
            <div class="table-responsive">
                <table class="kpi-table">
        <thead>
            <tr>
                <th>Hierarchy of Targeted Results</th>
                <th>Key Performance Indicators</th>
                <th>Baseline Data</th>
                <th>Targets</th>
                <th>Data Collection Methods</th>
                <th>Responsibility</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td><b>INTERMEDIATE OUTCOME</b></td>
                <td><textarea class="form-control" rows="3" name="internal_projects[1][kpi][intermediate][indicator]" placeholder="Percentage (%), No. of Units, or Ratios"></textarea></td>
                <td><textarea class="form-control" rows="3" name="internal_projects[1][kpi][intermediate][baseline]" placeholder="Current Percentage (%), No. of Units, or Ratios"></textarea></td>
                <td><textarea class="form-control" rows="3" name="internal_projects[1][kpi][intermediate][target]" placeholder="Additional Percentage (%), No. of Units, or Ratios"></textarea></td>
                <td><textarea class="form-control" rows="3" name="internal_projects[1][kpi][intermediate][method]" placeholder="Reports, Modules, etc."></textarea></td>
                <td><textarea class="form-control" rows="3" name="internal_projects[1][kpi][intermediate][responsibility]" placeholder="Department or Agency, Bureau, Service, or Office"></textarea></td>
            </tr>
            <tr>
                <td><b>IMMEDIATE OUTCOME</b></td>
                <td><textarea class="form-control" rows="3" name="internal_projects[1][kpi][immediate][indicator]" placeholder="Percentage (%), No. of Units, or Ratios"></textarea></td>
                <td><textarea class="form-control" rows="3" name="internal_projects[1][kpi][immediate][baseline]" placeholder="Current Percentage (%), No. of Units, or Ratios"></textarea></td>
                <td><textarea class="form-control" rows="3" name="internal_projects[1][kpi][immediate][target]" placeholder="Additional Percentage (%), No. of Units, or Ratios"></textarea></td>
                <td><textarea class="form-control" rows="3" name="internal_projects[1][kpi][immediate][method]" placeholder="Reports, Modules, etc."></textarea></td>
                <td><textarea class="form-control" rows="3" name="internal_projects[1][kpi][immediate][responsibility]" placeholder="Department or Agency, Bureau, Service, or Office"></textarea></td>
            </tr>
            <tr>
                <td><b>OUTPUT</b></td>
                <td><textarea class="form-control" rows="3" name="internal_projects[1][kpi][output][indicator]" placeholder="Percentage (%), No. of Units, or Ratios"></textarea></td>
                <td><textarea class="form-control" rows="3" name="internal_projects[1][kpi][output][baseline]" placeholder="Current Percentage (%), No. of Units, or Ratios"></textarea></td>
                <td><textarea class="form-control" rows="3" name="internal_projects[1][kpi][output][target]" placeholder="Additional Percentage (%), No. of Units, or Ratios"></textarea></td>
                <td><textarea class="form-control" rows="3" name="internal_projects[1][kpi][output][method]" placeholder="Reports, Modules, etc."></textarea></td>
                <td><textarea class="form-control" rows="3" name="internal_projects[1][kpi][output][responsibility]" placeholder="Department or Agency, Bureau, Service, or Office"></textarea></td>
            </tr>
        </tbody>
    </table>
</div>
        </div>
    </div>
</div>

<div id="cross-agency-kpi" class="tab-content">
    <div class="section-card">
        <div class="section-header">
            <div>
                <div class="d-flex align-items-center">
                    <h5 class="section-title mb-0"> Performance Measurement Framework</h5>
                    <i class="fa-solid fa-circle-question help-icon" data-tooltip="Define KPIs for cross-agency ICT projects to measure progress and outcomes."></i>
                </div>
                <p class="section-subtitle">Establish Key Performance Indicators (KPIs) for each cross-agency ICT project.</p>
            </div>
            <i class="fa-solid fa-circle-question help-icon" data-tooltip="Define KPIs for cross-agency ICT projects to measure progress and outcomes."></i>
        </div>
        <div class="section-body">
            <div class="form-section-label">
                <span>F. Key Performance Indicators
                  <i class="fa-solid fa-circle-question help-icon"
              data-tooltip="Define Key Performance Indicators for each cross-agency ICT project to measure progress and outcomes."></i>
            </div>
            <div class="table-responsive">
                <table class="kpi-table">
                    <thead>
                        <tr>
                            <th>Hierarchy of Targeted Results</th>
                            <th>Key Performance Indicators</th>
                            <th>Baseline Data</th>
                            <th>Targets</th>
                            <th>Data Collection Methods</th>
                            <th>Responsibility</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><b>INTERMEDIATE OUTCOME</b></td>
                            <td><textarea class="form-control" rows="3" name="cross_projects[1][kpi][intermediate][indicator]" placeholder="Percentage (%), No. of Units, or Ratios"></textarea></td>
                            <td><textarea class="form-control" rows="3" name="cross_projects[1][kpi][intermediate][baseline]" placeholder="Current Percentage (%), No. of Units, or Ratios"></textarea></td>
                            <td><textarea class="form-control" rows="3" name="cross_projects[1][kpi][intermediate][target]" placeholder="Additional Percentage (%), No. of Units, or Ratios"></textarea></td>
                            <td><textarea class="form-control" rows="3" name="cross_projects[1][kpi][intermediate][method]" placeholder="Reports, Modules, etc."></textarea></td>
                            <td><textarea class="form-control" rows="3" name="cross_projects[1][kpi][intermediate][responsibility]" placeholder="Department or Agency, Bureau, Service, or Office"></textarea></td>
                        </tr>
                        <tr>
                            <td><b>IMMEDIATE OUTCOME</b></td>
                            <td><textarea class="form-control" rows="3" name="cross_projects[1][kpi][immediate][indicator]" placeholder="Percentage (%), No. of Units, or Ratios"></textarea></td>
                            <td><textarea class="form-control" rows="3" name="cross_projects[1][kpi][immediate][baseline]" placeholder="Current Percentage (%), No. of Units, or Ratios"></textarea></td>
                            <td><textarea class="form-control" rows="3" name="cross_projects[1][kpi][immediate][target]" placeholder="Additional Percentage (%), No. of Units, or Ratios"></textarea></td>
                            <td><textarea class="form-control" rows="3" name="cross_projects[1][kpi][immediate][method]" placeholder="Reports, Modules, etc."></textarea></td>
                            <td><textarea class="form-control" rows="3" name="cross_projects[1][kpi][immediate][responsibility]" placeholder="Department or Agency, Bureau, Service, or Office"></textarea></td>
                        </tr>
                        <tr>
                            <td><b>OUTPUT</b></td>
                            <td><textarea class="form-control" rows="3" name="cross_projects[1][kpi][output][indicator]" placeholder="Percentage (%), No. of Units, or Ratios"></textarea></td>
                            <td><textarea class="form-control" rows="3" name="cross_projects[1][kpi][output][baseline]" placeholder="Current Percentage (%), No. of Units, or Ratios"></textarea></td>
                            <td><textarea class="form-control" rows="3" name="cross_projects[1][kpi][output][target]" placeholder="Additional Percentage (%), No. of Units, or Ratios"></textarea></td>
                            <td><textarea class="form-control" rows="3" name="cross_projects[1][kpi][output][method]" placeholder="Reports, Modules, etc."></textarea></td>
                            <td><textarea class="form-control" rows="3" name="cross_projects[1][kpi][output][responsibility]" placeholder="Department or Agency, Bureau, Service, or Office"></textarea></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

    <!-- Footer Actions -->
    <div class="row mb-4">
        <div class="col-12">
            <div class="footer-actions">
                <div class="action-buttons">
                    <button type="button" class="action-btn action-btn-save" onclick="window.saveChanges().then(function() { window.autoSaveDraft(); });">
                        <i class="fa-solid fa-save"></i>
                        <span>Save Changes</span>
                    </button>
                    <button type="button" class="action-btn action-btn-clear" onclick="window.clearForm()">
                        <i class="fa-solid fa-eraser"></i>
                        <span>Clear Fields</span>
                    </button>
                </div>
                <div class="navigation-buttons">
                    <button type="button" class="nav-btn nav-btn-prev" onclick="window.navigateToPage('<?= site_url('employee/proposed-ict-strategy/ict-projects') ?>')">
                        <i class="fa-solid fa-arrow-left"></i>
                        <span>ICT Projects</span>
                    </button>
                    <button type="button" class="nav-btn nav-btn-next" onclick="window.navigateToPage('<?= site_url('employee/dashboard') ?>')">
                        <span>Complete Strategy</span>
                        <i class="fa-solid fa-arrow-right"></i>
                    </button>
                </div>
            </div>
        </div>
    </div>
</form>

<script>
let projectCount = 1;

function handleTooltipEnter(e) {
    const tooltipText = this.getAttribute('data-tooltip');
    const tooltip = document.createElement('div');
    tooltip.className = 'tooltip-content';
    tooltip.textContent = tooltipText;
    tooltip.id = 'active-tooltip';
    document.body.appendChild(tooltip);
    
    const rect = this.getBoundingClientRect();
    
    tooltip.style.left = (rect.right + 8) + 'px';
    tooltip.style.top = rect.top + 'px';
    
    requestAnimationFrame(() => {
        tooltip.classList.add('visible');
        const tooltipRect = tooltip.getBoundingClientRect();
        if (tooltipRect.right > window.innerWidth) {
            tooltip.style.left = (rect.left - tooltipRect.width - 8) + 'px';
        }
        if (tooltipRect.bottom > window.innerHeight) {
            tooltip.style.top = (window.innerHeight - tooltipRect.height - 10) + 'px';
        }
    });
}

function handleTooltipLeave(e) {
    const tooltip = document.getElementById('active-tooltip');
    if (tooltip) {
        tooltip.remove();
    }
}

function initializeTooltips() {
    const helpIcons = document.querySelectorAll('.help-icon');
    
    helpIcons.forEach(icon => {
        icon.addEventListener('mouseenter', handleTooltipEnter);
        icon.addEventListener('mouseleave', handleTooltipLeave);
    });
}

function addProject() {
    projectCount++;
    const container = document.getElementById('kpi-container');
    
    const projectCard = document.createElement('div');
    projectCard.className = 'project-card';
    projectCard.setAttribute('data-project-index', projectCount);
    
    projectCard.innerHTML = `
        <div class="project-header">
            <div>
                <h6>Project ${projectCount}</h6>
            </div>
            <i class="fa-solid fa-circle-question help-icon" 
               data-tooltip="Define KPIs for this ICT project to measure progress and outcomes."></i>
            <button type="button" class="remove-project-btn" onclick="removeProject(${projectCount})">
                Remove
            </button>
        </div>
        
        <div class="row g-3 mb-3">
            <div class="col-md-12">
                <label class="form-label">Project Title</label>
                <input type="text" class="form-control" name="projects[${projectCount}][title]" placeholder="Enter project title">
            </div>
        </div>
        
        <div class="table-responsive">
            <table class="kpi-table">
                <thead>
                    <tr>
                        <th style="width: 18%;">Hierarchy of Targeted Results</th>
                        <th style="width: 18%;">Key Performance Indicators</th>
                        <th style="width: 14%;">Baseline Data</th>
                        <th style="width: 14%;">Targets</th>
                        <th style="width: 18%;">Data Collection Method</th>
                        <th style="width: 18%;">Responsibility to Collect Data</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>
                            <input type="text" class="form-control-sm" name="projects[${projectCount}][kpi][1][hierarchy]" placeholder="e.g., Output">
                        </td>
                        <td>
                            <input type="text" class="form-control-sm" name="projects[${projectCount}][kpi][1][indicator]" placeholder="e.g., Number of systems deployed">
                        </td>
                        <td>
                            <input type="text" class="form-control-sm" name="projects[${projectCount}][kpi][1][baseline]" placeholder="e.g., 0">
                        </td>
                        <td>
                            <input type="text" class="form-control-sm" name="projects[${projectCount}][kpi][1][target]" placeholder="e.g., 5 systems">
                        </td>
                        <td>
                            <input type="text" class="form-control-sm" name="projects[${projectCount}][kpi][1][collection_method]" placeholder="e.g., System logs">
                        </td>
                        <td>
                            <input type="text" class="form-control-sm" name="projects[${projectCount}][kpi][1][responsibility]" placeholder="e.g., IT Director">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <input type="text" class="form-control-sm" name="projects[${projectCount}][kpi][2][hierarchy]" placeholder="e.g., Outcome">
                        </td>
                        <td>
                            <input type="text" class="form-control-sm" name="projects[${projectCount}][kpi][2][indicator]" placeholder="e.g., Service delivery time reduced">
                        </td>
                        <td>
                            <input type="text" class="form-control-sm" name="projects[${projectCount}][kpi][2][baseline]" placeholder="e.g., 5 days">
                        </td>
                        <td>
                            <input type="text" class="form-control-sm" name="projects[${projectCount}][kpi][2][target]" placeholder="e.g., 2 days">
                        </td>
                        <td>
                            <input type="text" class="form-control-sm" name="projects[${projectCount}][kpi][2][collection_method]" placeholder="e.g., Survey">
                        </td>
                        <td>
                            <input type="text" class="form-control-sm" name="projects[${projectCount}][kpi][2][responsibility]" placeholder="e.g., QA Unit">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <input type="text" class="form-control-sm" name="projects[${projectCount}][kpi][3][hierarchy]" placeholder="e.g., Impact">
                        </td>
                        <td>
                            <input type="text" class="form-control-sm" name="projects[${projectCount}][kpi][3][indicator]" placeholder="e.g., Citizen satisfaction rate">
                        </td>
                        <td>
                            <input type="text" class="form-control-sm" name="projects[${projectCount}][kpi][3][baseline]" placeholder="e.g., 60%">
                        </td>
                        <td>
                            <input type="text" class="form-control-sm" name="projects[${projectCount}][kpi][3][target]" placeholder="e.g., 85%">
                        </td>
                        <td>
                            <input type="text" class="form-control-sm" name="projects[${projectCount}][kpi][3][collection_method]" placeholder="e.g., Annual survey">
                        </td>
                        <td>
                            <input type="text" class="form-control-sm" name="projects[${projectCount}][kpi][3][responsibility]" placeholder="e.g., Planning Office">
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    `;
    
    container.appendChild(projectCard);
    
    initializeTooltips();
}

function removeProject(index) {
    const projectCard = document.querySelector(`[data-project-index="${index}"]`);
    if (projectCard && projectCount > 1) {
        projectCard.remove();
    } else {
        showAlertModal('Notice', 'At least one project must remain.');
    }
}

// Load saved data from localStorage on page load
window.loadSavedData = function() {
    console.log('loadSavedData called');
    try {
        const savedData = localStorage.getItem('performance-measurement-form');
        console.log('Saved data from localStorage:', savedData ? 'exists (' + savedData.length + ' chars)' : 'empty');
        if (savedData) {
            const formDataObj = JSON.parse(savedData);
            console.log('Parsed form data keys:', Object.keys(formDataObj));
            const form = document.querySelector('#mainForm');
            console.log('Form found:', !!form);
            
            if (form) {
                let restoredCount = 0;
                Object.keys(formDataObj).forEach(key => {
                    const input = form.querySelector(`[name="${key}"]`);
                    if (input) {
                        const val = formDataObj[key];
                        if (typeof val === 'string' && val.startsWith('data:')) {
                            restoreFilePreview(input, val);
                            restoredCount++;
                        } else if (typeof val === 'string' && val.startsWith('uploads/')) {
                            input.setAttribute('data-uploaded-path', val);
                            showServerFileLink(input, val);
                            restoredCount++;
                        } else if (input.type === 'checkbox') {
                            input.checked = val === '1' || val === 'on';
                            restoredCount++;
                        } else if (input.type === 'radio') {
                            const radio = form.querySelector(`[name="${key}"][value="${val}"]`);
                            if (radio) radio.checked = true;
                            restoredCount++;
                        } else if (input.type === 'file') {
                            // File inputs cannot be set programmatically; skip
                            restoredCount++;
                        } else {
                            input.value = val;
                            restoredCount++;
                        }
                    }
                });
                
                console.log('Data loaded from localStorage, restored', restoredCount, 'fields');

            }
        }
    } catch (error) {
        console.error('Error loading saved data:', error);

    }
};

document.querySelectorAll('.project-tab').forEach(tab => {
    tab.addEventListener('click', function() {
        document.querySelectorAll('.project-tab').forEach(t => t.classList.remove('active'));
        this.classList.add('active');
        document.querySelectorAll('.tab-content').forEach(content => {
            content.classList.remove('active');
        });
        document.getElementById(this.getAttribute('data-tab')).classList.add('active');
    });
});

document.addEventListener('DOMContentLoaded', function() {
    initializeTooltips();
    
    window.loadSavedData();
    if (typeof updateStatusIndicators === 'function') updateStatusIndicators();
    // Retry loading after a short delay in case of async rendering
    setTimeout(function() {
        window.loadSavedData();
        if (typeof updateStatusIndicators === 'function') updateStatusIndicators();
    }, 300);
});

window.clearForm = function() {
    console.log('clearForm called');
    try {
        showConfirmModal('Are you sure you want to clear all fields? This action cannot be undone.', function() {
            const form = document.querySelector('#mainForm');
            if (form) {
                // Explicitly clear all fields instead of form.reset() to avoid reset-checked checkboxes
                form.querySelectorAll('input:not([type="hidden"]):not([type="file"]), textarea, select').forEach(function(el) {
                    if (el.type === 'checkbox' || el.type === 'radio') {
                        el.checked = false;
                    } else {
                        el.value = '';
                    }
                });
                // Remove all file previews
                form.querySelectorAll('.file-preview').forEach(el => el.remove());
                // Clear localStorage
                localStorage.removeItem('performance-measurement-form');
                if (typeof updateStatusIndicators === 'function') updateStatusIndicators();
                console.log('Form cleared');
                showAlertModal('Success', 'Form has been cleared successfully.');
            } else {
                console.error('Form not found');
                showAlertModal('Error', 'Error: Form not found');
            }
        });
    } catch (error) {
        console.error('Error in clearForm:', error);
        showAlertModal('Error', 'Error clearing form: ' + error.message);
    }
};

// Save changes to localStorage (supports file persistence)
window.saveChanges = function(showAlert = true) {
    return new Promise(function(resolve) {
        console.log('saveChanges called with showAlert:', showAlert);
        try {
            const form = document.querySelector('#mainForm');
            if (form) {
                const formData = new FormData(form);
                const formDataObj = {};
                const fileReads = [];
                
                formData.forEach((value, key) => {
                    if (value instanceof File && value.name) {
                        fileReads.push(
                            new Promise(resolve => {
                                const reader = new FileReader();
                                reader.onload = () => {
                                    const dataUrl = reader.result;
                                    const b64Idx = dataUrl.indexOf(';base64,');
                                    if (b64Idx !== -1) {
                                        const beforeBase64 = dataUrl.substring(0, b64Idx);
                                        const afterBase64 = dataUrl.substring(b64Idx);
                                        formDataObj[key] = beforeBase64 + ';name=' + encodeURIComponent(value.name) + afterBase64;
                                    } else {
                                        const parts = dataUrl.split(',');
                                        formDataObj[key] = parts[0] + ';name=' + encodeURIComponent(value.name) + ',' + parts.slice(1).join(',');
                                    }
                                    resolve();
                                };
                                reader.readAsDataURL(value);
                            })
                        );
                    } else if (value instanceof File) {
                        // Empty file input — skip (would serialize to {})
                    } else {
                        formDataObj[key] = value;
                    }
                });
                
                if (fileReads.length > 0) {
                    Promise.all(fileReads).then(() => {
                        finalizeSave(formDataObj, showAlert);
                        resolve();
                    });
                } else {
                    finalizeSave(formDataObj, showAlert);
                    resolve();
                }
            } else {
                console.error('Form #mainForm not found');
                if (showAlert) showAlertModal('Error', 'Error: Form not found');
                resolve();
            }
        } catch (error) {
            console.error('Error in saveChanges:', error);
            if (showAlert) showAlertModal('Error', 'Error saving changes: ' + error.message);
            resolve();
        }
    });
};

function finalizeSave(formDataObj, showAlert) {
    // Merge with previous localStorage data to preserve file previews
    const prevData = JSON.parse(localStorage.getItem('performance-measurement-form') || '{}');
    Object.keys(prevData).forEach(key => {
        const val = prevData[key];
        if (typeof val === 'string' && (val.startsWith('data:') || val.startsWith('uploads/'))) {
            if (!(key in formDataObj) || formDataObj[key] === '') {
                formDataObj[key] = val;
            }
        }
    });
    
    // Remove empty values from hidden elements (e.g. Others textbox when "Others" not checked)
    Object.keys(formDataObj).forEach(key => {
        if (formDataObj[key] === '') {
            const el = document.querySelector(`[name="${key}"]`);
            if (el && el.offsetParent === null) {
                delete formDataObj[key];
            }
        }
    });
    
    try {
        const jsonStr = JSON.stringify(formDataObj);
        localStorage.setItem('performance-measurement-form', jsonStr);
        
        const verify = localStorage.getItem('performance-measurement-form');
        console.log('Save verified:', verify ? 'OK (' + Object.keys(JSON.parse(verify)).length + ' keys)' : 'FAILED');
        
        if (typeof updateStatusIndicators === 'function') updateStatusIndicators();
        if (showAlert) showAlertModal('Success', 'Changes saved locally!');
    } catch (error) {
        console.error('Error saving to localStorage:', error);
        if (error.name === 'QuotaExceededError' || error.code === 22) {
            if (showAlert) showAlertModal('Error', 'Unable to save: File(s) too large. Please reduce file sizes and try again.');
        } else {
            if (showAlert) showAlertModal('Error', 'Error saving changes: ' + error.message);
        }
    }
}

function restoreFilePreview(input, dataUrl) {
    if (!input || !dataUrl) return;
    const existing = input.parentElement.querySelector('.file-preview');
    if (existing) existing.remove();
    const preview = document.createElement('div');
    preview.className = 'file-preview';
    preview.setAttribute('data-file-input', input.name);
    preview.style.cursor = 'pointer';
    preview.title = 'Click to open file';
    preview.addEventListener('click', function(e) {
        if (e.target.closest('button')) return;
        try {
            // Parse base64 data URL to Blob for reliable download
            const commaIdx = dataUrl.indexOf(',');
            const mimeMatch = dataUrl.substring(0, commaIdx).match(/:(.*?);/);
            const mime = mimeMatch ? mimeMatch[1] : 'application/octet-stream';
            const b64Data = dataUrl.substring(commaIdx + 1);
            const byteStr = atob(b64Data);
            const ab = new ArrayBuffer(byteStr.length);
            const ia = new Uint8Array(ab);
            for (let i = 0; i < byteStr.length; i++) {
                ia[i] = byteStr.charCodeAt(i);
            }
            const blob = new Blob([ab], {type: mime});
            const url = URL.createObjectURL(blob);
            const link = document.createElement('a');
            link.href = url;
            link.download = getFileNameFromDataUrl(dataUrl) || 'file';
            document.body.appendChild(link);
            link.click();
            document.body.removeChild(link);
            URL.revokeObjectURL(url);
        } catch (dlError) {
            console.error('Download failed:', dlError);
            // Fallback: open data URL in new tab
            const win = window.open(dataUrl, '_blank');
            if (!win) {
                showAlertModal('Notice', 'Unable to open file. Try saving it first.');
            }
        }
    });
    if (dataUrl.startsWith('data:image/')) {
        const img = document.createElement('img');
        img.src = dataUrl;
        img.alt = 'Uploaded image';
        preview.appendChild(img);
    }
    const nameSpan = document.createElement('span');
    nameSpan.className = 'file-name';
    const fileSize = Math.round((dataUrl.length * 0.75) / 1024);
    nameSpan.textContent = getFileNameFromDataUrl(dataUrl) || 'Uploaded file';
    preview.appendChild(nameSpan);
    const sizeSpan = document.createElement('span');
    sizeSpan.className = 'file-size';
    sizeSpan.textContent = fileSize > 1024 ? (fileSize / 1024).toFixed(1) + ' MB' : fileSize + ' KB';
    preview.appendChild(sizeSpan);
    const removeBtn = document.createElement('button');
    removeBtn.type = 'button';
    removeBtn.className = 'btn btn-sm btn-outline-danger';
    removeBtn.innerHTML = '&times;';
    removeBtn.title = 'Remove file';
    removeBtn.addEventListener('click', function(e) {
        e.preventDefault();
        preview.remove();
        input.value = '';
        // Remove only this file from localStorage directly
        try {
            const savedData = JSON.parse(localStorage.getItem('performance-measurement-form') || '{}');
            delete savedData[input.name];
            localStorage.setItem('performance-measurement-form', JSON.stringify(savedData));
            if (typeof updateStatusIndicators === 'function') updateStatusIndicators();
            showAlertModal('Success', 'File removed.');
        } catch (error) {
            console.error('Error removing file:', error);
            showAlertModal('Error', 'Error removing file: ' + error.message);
        }
    });
    preview.appendChild(removeBtn);
    input.parentElement.appendChild(preview);
}

function getFileNameFromDataUrl(dataUrl) {
    try {
        const commaIndex = dataUrl.indexOf(',');
        const header = commaIndex >= 0 ? dataUrl.substring(0, commaIndex) : dataUrl;
        const parts = header.split(';');
        for (const part of parts) {
            const trimmed = part.trim();
            if (trimmed.startsWith('name=')) {
                return decodeURIComponent(trimmed.substring(5));
            }
        }
        return null;
    } catch(e) {
        return null;
    }
}

window.navigateToPage = function(url) {
    console.log('navigateToPage called with url:', url);
    // If in edit mode, rewrite URLs to stay in edit context
    var editId = localStorage.getItem('edit_project_id');
    if (editId) {
        url = url.replace('proposed-ict-strategy/', 'edit-ict-project/' + editId + '/');
        if (url.indexOf('employee/dashboard') !== -1) {
            url = '<?= site_url('employee/draft-ict-projects') ?>';
        }
    }
    const form = document.querySelector('#mainForm');
    if (form) {
        const formData = new FormData(form);
        const formDataObj = {};
        const fileReads = [];
        formData.forEach((value, key) => {
            if (value instanceof File && value.name) {
                fileReads.push(
                    new Promise(resolve => {
                        const reader = new FileReader();
                        reader.onload = () => {
                            const dataUrl = reader.result;
                            const b64Idx = dataUrl.indexOf(';base64,');
                            if (b64Idx !== -1) {
                                const beforeBase64 = dataUrl.substring(0, b64Idx);
                                const afterBase64 = dataUrl.substring(b64Idx);
                                formDataObj[key] = beforeBase64 + ';name=' + encodeURIComponent(value.name) + afterBase64;
                            } else {
                                const parts = dataUrl.split(',');
                                formDataObj[key] = parts[0] + ';name=' + encodeURIComponent(value.name) + ',' + parts.slice(1).join(',');
                            }
                            resolve();
                        };
                        reader.readAsDataURL(value);
                    })
                );
            } else {
                formDataObj[key] = value;
            }
        });
        const doNav = () => {
            // Merge with previous localStorage data to preserve file previews
            const prevData = JSON.parse(localStorage.getItem('performance-measurement-form') || '{}');
            Object.keys(prevData).forEach(key => {
                if (!(key in formDataObj)) {
                    const val = prevData[key];
                    if (typeof val === 'string' && (val.startsWith('data:') || val.startsWith('uploads/'))) {
                        formDataObj[key] = val;
                    }
                }
            });
            // Remove empty values from hidden elements
            Object.keys(formDataObj).forEach(key => {
                if (formDataObj[key] === '') {
                    const el = document.querySelector(`[name="${key}"]`);
                    if (el && el.offsetParent === null) {
                        delete formDataObj[key];
                    }
                }
            });
            const jsonStr = JSON.stringify(formDataObj);
            localStorage.setItem('performance-measurement-form', jsonStr);
            if (typeof updateStatusIndicators === 'function') updateStatusIndicators();
            window.location.href = url;
        };
        if (fileReads.length > 0) {
            Promise.all(fileReads).then(doNav);
        } else {
            doNav();
        }
    } else {
        window.location.href = url;
    }
};
</script>

<?= $this->endSection() ?>
