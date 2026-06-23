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

<div class="row">
    <div class="col-12">
        <div class="page-header mb-3">
            <h1 class="page-title">Performance Measurement & KPIs</h1>
            <p class="page-subtitle">Proposed ICT Strategy - Key Performance Indicators framework</p>
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
                <div>
                    <h6>Project 1</h6>
                </div>
                <i class="fa-solid fa-circle-question help-icon" 
                   data-tooltip="Define KPIs for this ICT project to measure progress and outcomes."></i>
                <button type="button" class="remove-project-btn" onclick="removeProject(1)">
                    Remove
                </button>
            </div>
            
            <div class="row g-3 mb-3">
                <div class="col-md-12">
                    <label class="form-label">Project Title</label>
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
                Add Another Project
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
                        Measurement Strategy
                    </div>
                    
                    <div class="row g-3">
                        <div class="col-md-12">
                            <label class="form-label">Measurement Frequency</label>
                            <select class="form-select" name="measurement_frequency">
                                <option value="">Select frequency</option>
                                <option value="monthly">Monthly</option>
                                <option value="quarterly">Quarterly</option>
                                <option value="semi-annual">Semi-Annual</option>
                                <option value="annual">Annual</option>
                            </select>
                        </div>
                        
                        <div class="col-md-12">
                            <label class="form-label">Reporting Mechanism</label>
                            <textarea class="form-control" name="reporting_mechanism" rows="3" placeholder="Describe how performance data will be reported and reviewed..."></textarea>
                        </div>
                        
                        <div class="col-md-12">
                            <label class="form-label">Review and Adjustment Process</label>
                            <textarea class="form-control" name="review_process" rows="3" placeholder="Describe the process for reviewing KPIs and making adjustments..."></textarea>
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

// Tooltip functionality
function handleTooltipEnter(e) {
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
    
    // Initialize tooltips for the new project
    initializeTooltips();
}

function removeProject(index) {
    const projectCard = document.querySelector(`[data-project-index="${index}"]`);
    if (projectCard && projectCount > 1) {
        projectCard.remove();
    } else {
        alert('At least one project must remain.');
    }
}

// Clear form function
function clearForm() {
    if (confirm('Are you sure you want to clear all fields? This action cannot be undone.')) {
        const form = document.querySelector('form');
        if (form) {
            form.reset();
            // Clear localStorage
            localStorage.removeItem('performance-measurement-form');
        }
    }
}

// Save changes to localStorage
function saveChanges(showAlert = true) {
    const form = document.querySelector('form');
    if (form) {
        const formData = new FormData(form);
        const formDataObj = {};
        
        formData.forEach((value, key) => {
            formDataObj[key] = value;
        });
        
        // Save to localStorage
        localStorage.setItem('performance-measurement-form', JSON.stringify(formDataObj));
        
        // Show success message
        if (showAlert) {
            alert('Changes saved locally! You can continue working and your data will be preserved.');
        }
    }
}

// Load saved data from localStorage on page load
window.loadSavedData = function() {
    console.log('loadSavedData called');
    const savedData = localStorage.getItem('performance-measurement-form');
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

// Initialize tooltips and load saved data on page load
document.addEventListener('DOMContentLoaded', function() {
    initializeTooltips();
    
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
            localStorage.removeItem('performance-measurement-form');
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
        localStorage.setItem('performance-measurement-form', JSON.stringify(formDataObj));
        console.log('Data saved to localStorage');
        
        // Show success message
        if (showAlert) {
            alert('Changes saved locally! You can continue working and your data will be preserved.');
        }
    }
};

// Navigate to page after saving
window.navigateToPage = function(url) {
    console.log('navigateToPage called with url:', url);
    window.saveChanges(false);
    setTimeout(() => {
        // Verify data was saved before navigating
        const savedData = localStorage.getItem('performance-measurement-form');
        console.log('Data in localStorage before navigation:', savedData ? 'exists' : 'empty');
        window.location.href = url;
    }, 500);
};
</script>

<?= $this->endSection() ?>
