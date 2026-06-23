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
</style>

<div class="row">
    <div class="col-12">
        <div class="page-header mb-3">
            <h1 class="page-title">F. Performance Measurement Framework</h1>
            <p class="page-subtitle">Key Performance Indicators for ICT projects</p>
        </div>
        
        <div class="info-banner">
            <i class="fa-solid fa-info-circle"></i>
            Define Key Performance Indicators (KPIs) for each ICT project to measure progress, outcomes, and impact.
        </div>
    </div>
</div>

<form action="<?= site_url('employee/proposed-ict-strategy/performance-measurement/save') ?>" method="post">
    <?= csrf_field() ?>

    <!-- Project KPIs Container -->
    <div id="kpi-container">
        <!-- Project 1 -->
        <div class="project-card" data-project-index="1">
            <div class="project-header">
                <h6><i class="fa-solid fa-rocket me-2"></i>Project 1</h6>
                <button type="button" class="remove-project-btn" onclick="removeProject(1)">
                    <i class="fa-solid fa-trash me-1"></i>Remove
                </button>
            </div>
            
            <div class="row g-3 mb-3">
                <div class="col-md-12">
                    <label class="form-label"><i class="fa-solid fa-heading me-1"></i>Project Title</label>
                    <input type="text" class="form-control" name="projects[1][title]" placeholder="Enter project title">
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
                                <input type="text" class="form-control-sm" name="projects[1][kpi][1][hierarchy]" placeholder="e.g., Output">
                            </td>
                            <td>
                                <input type="text" class="form-control-sm" name="projects[1][kpi][1][indicator]" placeholder="e.g., Number of systems deployed">
                            </td>
                            <td>
                                <input type="text" class="form-control-sm" name="projects[1][kpi][1][baseline]" placeholder="e.g., 0">
                            </td>
                            <td>
                                <input type="text" class="form-control-sm" name="projects[1][kpi][1][target]" placeholder="e.g., 5 systems">
                            </td>
                            <td>
                                <input type="text" class="form-control-sm" name="projects[1][kpi][1][collection_method]" placeholder="e.g., System logs">
                            </td>
                            <td>
                                <input type="text" class="form-control-sm" name="projects[1][kpi][1][responsibility]" placeholder="e.g., IT Director">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <input type="text" class="form-control-sm" name="projects[1][kpi][2][hierarchy]" placeholder="e.g., Outcome">
                            </td>
                            <td>
                                <input type="text" class="form-control-sm" name="projects[1][kpi][2][indicator]" placeholder="e.g., Service delivery time reduced">
                            </td>
                            <td>
                                <input type="text" class="form-control-sm" name="projects[1][kpi][2][baseline]" placeholder="e.g., 5 days">
                            </td>
                            <td>
                                <input type="text" class="form-control-sm" name="projects[1][kpi][2][target]" placeholder="e.g., 2 days">
                            </td>
                            <td>
                                <input type="text" class="form-control-sm" name="projects[1][kpi][2][collection_method]" placeholder="e.g., Survey">
                            </td>
                            <td>
                                <input type="text" class="form-control-sm" name="projects[1][kpi][2][responsibility]" placeholder="e.g., QA Unit">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <input type="text" class="form-control-sm" name="projects[1][kpi][3][hierarchy]" placeholder="e.g., Impact">
                            </td>
                            <td>
                                <input type="text" class="form-control-sm" name="projects[1][kpi][3][indicator]" placeholder="e.g., Citizen satisfaction rate">
                            </td>
                            <td>
                                <input type="text" class="form-control-sm" name="projects[1][kpi][3][baseline]" placeholder="e.g., 60%">
                            </td>
                            <td>
                                <input type="text" class="form-control-sm" name="projects[1][kpi][3][target]" placeholder="e.g., 85%">
                            </td>
                            <td>
                                <input type="text" class="form-control-sm" name="projects[1][kpi][3][collection_method]" placeholder="e.g., Annual survey">
                            </td>
                            <td>
                                <input type="text" class="form-control-sm" name="projects[1][kpi][3][responsibility]" placeholder="e.g., Planning Office">
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Add Project Button -->
    <div class="row mb-3">
        <div class="col-12">
            <button type="button" class="btn btn-outline-primary" onclick="addProject()">
                <i class="fa-solid fa-plus me-2"></i>Add Another Project
            </button>
        </div>
    </div>

    <!-- Framework Overview -->
    <div class="row mb-3">
        <div class="col-12">
            <div class="section-card">
                <div class="section-header">
                    <h5 class="section-title">F.i Framework Overview</h5>
                    <p class="section-subtitle">General performance measurement approach</p>
                </div>
                <div class="section-body">
                    <div class="form-section-label">
                        <i class="fa-solid fa-chart-pie me-2"></i>Measurement Strategy
                    </div>
                    
                    <div class="row g-3">
                        <div class="col-md-12">
                            <label class="form-label"><i class="fa-solid fa-align-left me-1"></i>Measurement Frequency</label>
                            <select class="form-select" name="measurement_frequency">
                                <option value="">Select frequency</option>
                                <option value="monthly">Monthly</option>
                                <option value="quarterly">Quarterly</option>
                                <option value="semi-annual">Semi-Annual</option>
                                <option value="annual">Annual</option>
                            </select>
                        </div>
                        
                        <div class="col-md-12">
                            <label class="form-label"><i class="fa-solid fa-file-alt me-1"></i>Reporting Mechanism</label>
                            <textarea class="form-control" name="reporting_mechanism" rows="3" placeholder="Describe how performance data will be reported and reviewed..."></textarea>
                        </div>
                        
                        <div class="col-md-12">
                            <label class="form-label"><i class="fa-solid fa-tools me-1"></i>Review and Adjustment Process</label>
                            <textarea class="form-control" name="review_process" rows="3" placeholder="Describe the process for reviewing KPIs and making adjustments..."></textarea>
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
                        <a href="<?= site_url('employee/proposed-ict-strategy/ict-projects') ?>" class="btn btn-outline-secondary">
                            <i class="fa-solid fa-arrow-left me-2"></i>Back: ICT Projects
                        </a>
                        <a href="<?= site_url('employee/dashboard') ?>" class="btn btn-success">
                            <i class="fa-solid fa-check me-2"></i>Complete Strategy
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>

<script>
let projectCount = 1;

function addProject() {
    projectCount++;
    const container = document.getElementById('kpi-container');
    
    const projectCard = document.createElement('div');
    projectCard.className = 'project-card';
    projectCard.setAttribute('data-project-index', projectCount);
    
    projectCard.innerHTML = `
        <div class="project-header">
            <h6><i class="fa-solid fa-rocket me-2"></i>Project ${projectCount}</h6>
            <button type="button" class="remove-project-btn" onclick="removeProject(${projectCount})">
                <i class="fa-solid fa-trash me-1"></i>Remove
            </button>
        </div>
        
        <div class="row g-3 mb-3">
            <div class="col-md-12">
                <label class="form-label"><i class="fa-solid fa-heading me-1"></i>Project Title</label>
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
}

function removeProject(index) {
    const projectCard = document.querySelector(`[data-project-index="${index}"]`);
    if (projectCard && projectCount > 1) {
        projectCard.remove();
    } else {
        alert('At least one project must remain.');
    }
}
</script>

<?= $this->endSection() ?>
