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

.form-control-sm, .form-select-sm {
    border: 1px solid #d0dae6;
    border-radius: 6px;
    font-size: .8rem;
    padding: 6px 10px;
    transition: all 0.2s ease;
}

.systems-table {
    width: 100%;
    border-collapse: separate;
    border-spacing: 0;
    border: 1px solid #e2e8f0;
    border-radius: 8px;
    overflow: hidden;
}

.systems-table th {
    background: linear-gradient(135deg, #f8fafc 0%, #edf2f7 100%);
    color: var(--ink);
    font-weight: 700;
    font-size: .85rem;
    padding: 12px 16px;
    border-bottom: 2px solid #d0dae6;
    text-transform: uppercase;
    letter-spacing: .02em;
}

.systems-table td {
    padding: 12px 16px;
    border-bottom: 1px solid #e8ecf1;
    vertical-align: middle;
    background: white;
}

.systems-table tr:last-child td {
    border-bottom: none;
}

.systems-table tr:hover td {
    background: #f8fafc;
}

.systems-table .form-control-sm {
    font-size: .78rem;
    padding: 6px 10px;
    border: 1px solid #d0dae6;
    border-radius: 4px;
}

.systems-table .form-control-sm:focus {
    border-color: var(--brand);
    box-shadow: 0 0 0 2px rgba(79, 101, 132, .1);
}

.systems-table .form-select-sm {
    font-size: .78rem;
    padding: 6px 10px;
    border: 1px solid #d0dae6;
    border-radius: 4px;
}

.systems-table .form-select-sm:focus {
    border-color: var(--brand);
    box-shadow: 0 0 0 2px rgba(79, 101, 132, .1);
}

.systems-table .delete-btn {
    background: transparent;
    color: #64748b;
    border: 1px solid #cbd5e1;
    border-radius: 6px;
    padding: 6px 10px;
    cursor: pointer;
    transition: all 0.2s ease;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    width: 32px;
    height: 32px;
}

.systems-table .delete-btn:hover {
    background: #fee2e2;
    color: #dc2626;
    border-color: #fecaca;
}

.systems-table .delete-btn:active {
    transform: scale(0.95);
}

.add-system-btn {
    background: var(--brand);
    color: white;
    border: none;
    border-radius: 4px;
    padding: 6px 12px;
    font-weight: 600;
    font-size: 0.75rem;
    cursor: pointer;
    transition: all 0.2s ease;
    display: inline-flex;
    align-items: center;
    gap: 4px;
    white-space: nowrap;
}

.add-system-btn:hover {
    background: var(--brand-dark);
    transform: translateY(-1px);
}

.add-system-btn:active {
    transform: translateY(0);
}

.add-system-btn i {
    font-size: 0.75rem;
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

.interoperability-section {
    background: #f8fafc;
    border: 1px solid #d0dae6;
    border-radius: 8px;
    padding: 16px;
    margin-bottom: 12px;
}

.interoperability-section h6 {
    font-size: .82rem;
    font-weight: 700;
    color: var(--brand-dark);
    margin-bottom: 12px;
}

.checkbox-group {
    display: flex;
    flex-wrap: wrap;
    gap: 16px;
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

.summary-card {
    background: #fff;
    border: 1px solid #dde4ed;
    border-radius: 8px;
    padding: 16px;
    text-align: center;
    box-shadow: 0 2px 8px rgba(15, 23, 42, .05);
    transition: all 0.2s ease;
}

.summary-card:hover {
    box-shadow: 0 4px 12px rgba(15, 23, 42, .1);
    transform: translateY(-2px);
}

.summary-card h3 {
    margin: 0;
    font-size: 2rem;
    font-weight: 700;
    color: var(--brand);
    line-height: 1.2;
}

.summary-card p {
    margin: 6px 0 0;
    font-size: .75rem;
    color: var(--muted);
    font-weight: 500;
    text-transform: uppercase;
    letter-spacing: 0.5px;
}
</style>

<div class="row">
    <div class="col-12">
        <div class="page-header mb-3">
            <h1 class="page-title">Information Systems</h1>
            <p class="page-subtitle">Proposed information systems to be developed, acquired, or enhanced.</p>
        </div>
        
        <div class="info-banner">
            <i class="fa-solid fa-info-circle"></i>
            Provide detailed information about each proposed information system, including its classification, purpose, development strategy, and interoperability requirements.
        </div>
    </div>
</div>

<form action="<?= site_url('employee/proposed-ict-strategy/information-systems/save') ?>" method="post" enctype="multipart/form-data">
    <?= csrf_field() ?>

    <!-- Information Systems Inventory -->
    <div class="row mb-3">
        <div class="col-12">
            <div class="section-card">
                <div class="section-header">
                    <div>
                        <h5 class="section-title">D. PROPOSED INFORMATION SYSTEMS</h5>
                        <p class="section-subtitle">List all proposed information systems with their classifications and status</p>
                    </div>
                    <i class="fa-solid fa-circle-question help-icon"
                       data-tooltip="List all proposed information systems with their classifications and status."></i>
                </div>

                <div class="section-body">
                    <div class="form-section-label">
                        Proposed Information Systems
                    </div>

                    <div class="row g-3 mb-4">
                        <div class="col-md-4">
                            <div class="summary-card">
                                <h3 id="totalSystems">0</h3>
                                <p>Proposed Systems</p>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="summary-card">
                                <h3 id="totalDevelopment">0</h3>
                                <p>For Development</p>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="summary-card">
                                <h3 id="totalEnhancement">0</h3>
                                <p>For Enhancement</p>
                            </div>
                        </div>
                    </div>

                    <div class="info-banner mb-3">
                        <i class="fa-solid fa-lightbulb"></i>
                        <strong>Tip:</strong> Define your proposed systems here first, then go to Part III-E to create ICT projects that implement them. Each project can link back to one or more systems.
                    </div>

                    <div class="table-responsive">
                        <table class="systems-table" id="informationSystemsTable">
                            <thead>
                                <tr>
                                    <th style="width:25%">System Name</th>
                                    <th style="width:15%">Status</th>
                                    <th style="width:15%">Classification</th>
                                    <th style="width:15%">Frontline Service</th>
                                    <th style="width:15%">Deployment</th>
                                    <th style="width:10%;text-align:center;">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><input type="text" class="form-control form-control-sm" name="is_name_1" placeholder="Unified Queue Monitoring Platform"></td>
                                    <td>
                                        <select class="form-select form-select-sm system-status" name="status_1">
                                            <option value="">Select</option>
                                            <option value="development">For Development</option>
                                            <option value="enhancement">For Enhancement</option>
                                        </select>
                                    </td>
                                    <td>
                                        <select class="form-select form-select-sm" name="classification_1">
                                            <option value="">Select</option>
                                            <option value="support_to_operations">Support to Operations</option>
                                            <option value="operations">Operations</option>
                                            <option value="general_administrative">General Administrative Systems</option>
                                        </select>
                                    </td>
                                    <td>
                                        <select class="form-select form-select-sm" name="frontline_service_1">
                                            <option value="">Select</option>
                                            <option value="yes">Yes</option>
                                            <option value="no">No</option>
                                        </select>
                                    </td>
                                    <td>
                                        <select class="form-select form-select-sm" name="deployment_1">
                                            <option value="">Select</option>
                                            <option value="online">Online</option>
                                            <option value="on_premise">On-Premise</option>
                                            <option value="hybrid">Hybrid</option>
                                        </select>
                                    </td>
                                    <td class="text-center">
                                        <button type="button" class="delete-btn" onclick="deleteSystemRow(this)">
                                            <i class="fa-solid fa-trash"></i>
                                        </button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
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
                    <button type="button" class="nav-btn nav-btn-prev" onclick="window.navigateToPage('<?= site_url('employee/proposed-ict-strategy/ict-human-capital') ?>')">
                        <i class="fa-solid fa-arrow-left"></i>
                        <span>ICT Human Capital</span>
                    </button>
                    <button type="button" class="nav-btn nav-btn-next" onclick="window.navigateToPage('<?= site_url('employee/proposed-ict-strategy/ict-projects') ?>')">
                        <span>ICT Projects</span>
                        <i class="fa-solid fa-arrow-right"></i>
                    </button>
                </div>
            </div>
        </div>
    </div>
</form>

<script>
document.addEventListener('DOMContentLoaded', function() {
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

    // Auto-save on input change
    const allInputs = document.querySelectorAll('input, textarea, select');
    allInputs.forEach(input => {
        input.addEventListener('change', function() {
            window.saveChanges(false);
        });
    });

    // Load saved data on page load
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
            localStorage.removeItem('information-systems-form');
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
        localStorage.setItem('information-systems-form', JSON.stringify(formDataObj));
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
    const savedData = localStorage.getItem('information-systems-form');
    if (savedData) {
        const formDataObj = JSON.parse(savedData);
        const form = document.querySelector('form');

        if (form) {
            // First, determine how many rows we need based on saved data
            const isNameKeys = Object.keys(formDataObj).filter(key => key.startsWith('is_name_'));
            const maxRowNumber = isNameKeys.length > 0 ?
                Math.max(...isNameKeys.map(key => parseInt(key.split('_')[2]))) : 0;

            // Add additional rows if needed (subtract 1 since we start with 1 row)
            const table = document.getElementById('informationSystemsTable');
            const tbody = table.querySelector('tbody');
            const currentRowCount = tbody.querySelectorAll('tr').length;

            const rowsToAdd = maxRowNumber - currentRowCount;
            for (let i = 0; i < rowsToAdd; i++) {
                addSystemRow();
            }

            // Now load the data
            Object.keys(formDataObj).forEach(key => {
                const input = form.querySelector(`[name="${key}"]`);
                if (input) {
                    if (input.type === 'checkbox') {
                        input.checked = formDataObj[key] === '1' || formDataObj[key] === true;
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
        const savedData = localStorage.getItem('information-systems-form');
        console.log('Data in localStorage before navigation:', savedData ? 'exists' : 'empty');
        window.location.href = url;
    }, 500);
};

function updateSystemTotals() {
    const table = document.getElementById('informationSystemsTable');
    const rows = table.querySelectorAll('tbody tr:not(.total-row)');

    let development = 0;
    let enhancement = 0;

    rows.forEach(row => {
        const status = row.querySelector('.system-status')?.value;
        if(status === 'development') {
            development++;
        }
        if(status === 'enhancement') {
            enhancement++;
        }
    });

    document.getElementById('totalSystems').textContent = rows.length;
    document.getElementById('totalDevelopment').textContent = development;
    document.getElementById('totalEnhancement').textContent = enhancement;
}

function addSystemRow() {
    const table = document.getElementById('informationSystemsTable');
    const tbody = table.querySelector('tbody');
    const rowCount = tbody.querySelectorAll('tr').length + 1;

    const newRow = document.createElement('tr');
    newRow.innerHTML = `
        <td><input type="text" class="form-control form-control-sm" name="is_name_${rowCount}" placeholder="System Name"></td>
        <td>
            <select class="form-select form-select-sm system-status" name="status_${rowCount}">
                <option value="">Select</option>
                <option value="development">For Development</option>
                <option value="enhancement">For Enhancement</option>
            </select>
        </td>
        <td>
            <select class="form-select form-select-sm" name="classification_${rowCount}">
                <option value="">Select</option>
                <option value="support_to_operations">Support to Operations</option>
                <option value="operations">Operations</option>
                <option value="general_administrative">General Administrative Systems</option>
            </select>
        </td>
        <td>
            <select class="form-select form-select-sm" name="frontline_service_${rowCount}">
                <option value="">Select</option>
                <option value="yes">Yes</option>
                <option value="no">No</option>
            </select>
        </td>
        <td>
            <select class="form-select form-select-sm" name="deployment_${rowCount}">
                <option value="">Select</option>
                <option value="online">Online</option>
                <option value="on_premise">On-Premise</option>
                <option value="hybrid">Hybrid</option>
            </select>
        </td>
        <td class="text-center">
            <button type="button" class="delete-btn" onclick="deleteSystemRow(this)">
                <i class="fa-solid fa-trash"></i>
            </button>
        </td>
    `;

    tbody.appendChild(newRow);
    updateSystemTotals();
}

function deleteSystemRow(button) {
    const table = document.getElementById('informationSystemsTable');
    const tbody = table.querySelector('tbody');
    const rows = tbody.querySelectorAll('tr');

    if(rows.length <= 1){
        alert('At least one system is required.');
        return;
    }

    const row = button.closest('tr');
    row.remove();
    updateSystemTotals();
}

document.addEventListener('change', updateSystemTotals);
document.addEventListener('DOMContentLoaded', updateSystemTotals);
</script>

<?= $this->endSection() ?>
