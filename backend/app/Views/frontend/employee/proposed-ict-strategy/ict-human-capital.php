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
    margin-bottom: 0;
    margin-top: 0;
    text-transform: uppercase;
    letter-spacing: .01em;
    padding-bottom: 8px;
    padding-top: 8px;
    flex: 1;
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

.file-upload-area {
    border: 2px dashed #d0dae6;
    border-radius: 8px;
    padding: 24px;
    text-align: center;
    background: #fafbfc;
    transition: all 0.2s ease;
}

.file-upload-area:hover {
    border-color: var(--brand);
    background: #f8fafc;
}

.file-upload-area i {
    font-size: 1.5rem;
    color: var(--brand);
    margin-bottom: 8px;
}

.file-upload-area p {
    font-size: .8rem;
    color: var(--muted);
    margin: 0;
}

.staffing-table {
    width: 100%;
    border-collapse: separate;
    border-spacing: 0;
    border: 1px solid #e2e8f0;
    border-radius: 8px;
    overflow: hidden;
}

.staffing-table th {
    background: linear-gradient(135deg, #f8fafc 0%, #edf2f7 100%);
    color: var(--ink);
    font-weight: 700;
    font-size: .85rem;
    padding: 12px 16px;
    border-bottom: 2px solid #d0dae6;
    text-transform: uppercase;
    letter-spacing: .02em;
}

.staffing-table td {
    padding: 12px 16px;
    border-bottom: 1px solid #e8ecf1;
    vertical-align: middle;
    background: white;
}

.staffing-table tr:last-child td {
    border-bottom: none;
}

.staffing-table tr:hover td {
    background: #f8fafc;
}

.staffing-table .form-control-sm {
    font-size: .78rem;
    padding: 6px 10px;
    border: 1px solid #d0dae6;
    border-radius: 4px;
}

.staffing-table .form-control-sm:focus {
    border-color: var(--brand);
    box-shadow: 0 0 0 2px rgba(79, 101, 132, .1);
}

.staffing-table .form-control-sm[readonly] {
    background: #f8fafc;
    color: var(--muted);
}

.staffing-table .delete-btn {
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

.staffing-table .delete-btn:hover {
    background: #fee2e2;
    color: #dc2626;
    border-color: #fecaca;
}

.staffing-table .delete-btn:active {
    transform: scale(0.95);
}

.total-row {
    background: transparent !important;
    border-top: 2px solid #cbd5e1;
    font-weight: 700;
    color: var(--ink);
}

.total-row td {
    padding: 12px 16px;
    border-bottom: none !important;
    vertical-align: middle;
}

.total-row .total-label {
    text-align: left;
    color: var(--brand-dark);
    font-size: 0.78rem;
    font-weight: 600;
    text-transform: uppercase;
    letter-spacing: .01em;
    padding-left: 20px;  
}

.total-row .total-value {
    text-align: left;
    font-size: 0.78rem;
    color: var(--ink);
    font-weight: 600;
    background: transparent;  
    padding: 0px;   
    padding-left: 30px;             
    border: none;             
    border-radius: 0;        
    min-width: 60px;
}

.add-position-btn {
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

.add-position-btn:hover {
    background: var(--brand-dark);
    transform: translateY(-1px);
}

.add-position-btn:active {
    transform: translateY(0);
}

.add-position-btn i {
    font-size: 0.75rem;
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

.summary-card{
    background:#fff;
    border:1px solid #dde4ed;
    border-radius:8px;
    padding:16px;
    text-align:center;
    box-shadow:0 2px 8px rgba(15,23,42,.05);
    transition: all 0.2s ease;
}

.summary-card:hover{
    box-shadow:0 4px 12px rgba(15,23,42,.1);
    transform: translateY(-2px);
}

.summary-card h3{
    margin:0;
    font-size:2rem;
    font-weight:700;
    color:var(--brand);
    line-height: 1.2;
}

.summary-card p{
    margin:6px 0 0;
    font-size:.75rem;
    color:var(--muted);
    font-weight: 500;
    text-transform: uppercase;
    letter-spacing: 0.5px;
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
            <h1 class="page-title">ICT Human Capital</h1>
            <p class="page-subtitle">Human capital and staffing requirements</p>
        </div>
    </div>
</div>

<form id="mainForm" action="<?= site_url('employee/proposed-ict-strategy/ict-human-capital/save') ?>" method="post" enctype="multipart/form-data">
    <?= csrf_field() ?>


    <!-- Staffing by Position/Role -->
    <div class="row mb-3">
        <div class="col-12">
            <div class="section-card">
                <div class="section-header">
                    <div>
                        <h5 class="section-title">C. Proposed ICT Human Capital</h5>
                        <p class="section-subtitle">Detailed breakdown of personnel requirements</p>
                    </div>
                </div>
                <div class="section-body">
                <div class="d-flex justify-content-between align-items-center mb-4">
                <div class="form-section-label">
                    <span>Proposed ICT Human Capital</span>
                    <i class="fa-solid fa-circle-question help-icon"
                    data-tooltip="Provide detailed breakdown of personnel requirements by position/role."></i>
                </div>
                    <button type="button" class="add-position-btn" onclick="addPositionRow()">
                        <i class="fa-solid fa-plus"></i>
                        Add Position
                    </button>
                </div>

                    <div class="row g-3 mb-4">
                        <div class="col-md-3">
                            <div class="summary-card">
                                <h3 id="totalPositions">0</h3>
                                <p>Total Positions</p>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="summary-card">
                                <h3 id="totalPlantilla">0</h3>
                                <p>Plantilla</p>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="summary-card">
                                <h3 id="totalContractual">0</h3>
                                <p>Contractual</p>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="summary-card">
                                <h3 id="totalOutsourced">0</h3>
                                <p>Outsourced (JO, COS, and HTC)</p>
                            </div>
                        </div>
                    </div>

                    <div class="table-responsive">
                        <table class="staffing-table" id="humanCapitalTable">
                            <thead>
                                <tr>
                                    <th style="width:45%">Position / Designation</th>
                                    <th style="width:25%">Employment Status</th>
                                    <th style="width:20%;text-align:center;">No. of Positions</th>
                                    <th style="width:10%;text-align:center;">Action</th>
                                </tr>
                            </thead>
                            <tbody>

                                <tr>
                                    <td><input type="text" class="form-control form-control-sm" name="position_1" placeholder="Enter position/designation (e.g. Information Technology Officer III)"></td>
                                    <td>
                                        <select class="form-select form-select-sm employment-status" name="status_1">
                                            <option value="" disabled selected>Select employment status</option>
                                            <option value="PLANTILLA">Plantilla</option>
                                            <option value="CONTRACTUAL">Contractual</option>
                                            <option value="OUTSOURCED">Outsourced</option>
                                        </select>
                                    </td>
                                    <td><input type="number" class="form-control form-control-sm position-count" name="count_1" placeholder="Enter number of positions"></td>
                                    <td class="text-center">
                                        <button type="button" class="delete-btn" onclick="deleteRow(this)">
                                            <i class="fa-solid fa-trash"></i>
                                        </button>
                                    </td>
                                </tr>

                                <tr>
                                    <td><input type="text" class="form-control form-control-sm" name="position_2" placeholder="Enter position/designation (e.g. Information Technology Officer II)"></td>
                                    <td>
                                        <select class="form-select form-select-sm employment-status" name="status_1">
                                            <option value="" disabled selected>Select employment status</option>
                                            <option value="PLANTILLA">Plantilla</option>
                                            <option value="CONTRACTUAL">Contractual</option>
                                            <option value="OUTSOURCED">Outsourced</option>
                                        </select>
                                    </td>
                                    <td><input type="number" class="form-control form-control-sm position-count" name="count_2" placeholder="Enter number of positions"></td>
                                    <td class="text-center">
                                        <button type="button" class="delete-btn" onclick="deleteRow(this)">
                                            <i class="fa-solid fa-trash"></i>
                                        </button>
                                    </td>
                                </tr>

                                <tr>
                                    <td><input type="text" class="form-control form-control-sm" name="position_3" placeholder="Enter position/designation (e.g. Information Technology Officer I)"></td>
                                    <td>
                                        <select class="form-select form-select-sm employment-status" name="status_3">
                                            <option value="" disabled selected>Select employment status</option>
                                            <option value="PLANTILLA">Plantilla</option>
                                            <option value="CONTRACTUAL">Contractual</option>
                                            <option value="OUTSOURCED">Outsourced</option>
                                        </select>
                                    </td>
                                    <td><input type="number" class="form-control form-control-sm position-count" name="count_3" placeholder="Enter number of positions"></td>
                                    <td class="text-center">
                                        <button type="button" class="delete-btn" onclick="deleteRow(this)">
                                            <i class="fa-solid fa-trash"></i>
                                        </button>
                                    </td>
                                </tr>

                                <tr>
                                    <td><input type="text" class="form-control form-control-sm" name="position_4" placeholder="Enter position/designation (e.g. Job Order)"></td>
                                    <td>
                                        <select class="form-select form-select-sm employment-status" name="status_3">
                                            <option value="" disabled selected>Select employment status</option>
                                            <option value="PLANTILLA">Plantilla</option>
                                            <option value="CONTRACTUAL">Contractual</option>
                                            <option value="OUTSOURCED">Outsourced</option>
                                        </select>
                                    </td>
                                    <td><input type="number" class="form-control form-control-sm position-count" name="count_4" placeholder="Enter number of positions"></td>
                                    <td class="text-center">
                                        <button type="button" class="delete-btn" onclick="deleteRow(this)">
                                            <i class="fa-solid fa-trash"></i>
                                        </button>
                                    </td>
                                </tr>

                                <tr id="total-row" class="total-row">
                                    <td class="total-label">Total</td>
                                    <td></td>
                                    <td id="total-count" class="total-value">0</td>
                                    <td></td>
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
                    <button type="button" class="action-btn action-btn-save" onclick="window.saveChanges(); window.autoSaveDraft();">
                        <i class="fa-solid fa-save"></i>
                        <span>Save Changes</span>
                    </button>
                    <button type="button" class="action-btn action-btn-clear" onclick="window.clearForm()">
                        <i class="fa-solid fa-eraser"></i>
                        <span>Clear Fields</span>
                    </button>
                </div>
                <div class="navigation-buttons">
                    <button type="button" class="nav-btn nav-btn-prev" onclick="window.navigateToPage('<?= site_url('employee/proposed-ict-strategy/enterprise-architecture') ?>')">
                        <i class="fa-solid fa-arrow-left"></i>
                        <span>Enterprise Architecture</span>
                    </button>
                    <button type="button" class="nav-btn nav-btn-next" onclick="window.navigateToPage('<?= site_url('employee/proposed-ict-strategy/information-systems') ?>')">
                        <span>Information Systems</span>
                        <i class="fa-solid fa-arrow-right"></i>
                    </button>
                </div>
            </div>
        </div>
    </div>
</form>

<?= $this->endSection() ?>

<?= $this->section('scripts') ?>
<script>
function updateTotals() {
    let plantilla = 0;
    let contractual = 0;
    let outsourced = 0;
    let total = 0;

    document.querySelectorAll('.employment-status').forEach((statusField) => {
        const row = statusField.closest('tr');
        const countField = row.querySelector('.position-count');
        const count = parseInt(countField?.value) || 0;
        total += count;

        if(statusField.value === 'PLANTILLA'){
            plantilla += count;
        }

        if(statusField.value === 'CONTRACTUAL'){
            contractual += count;
        }

        if(statusField.value === 'OUTSOURCED'){
            outsourced += count;
        }
    });
    
    document.getElementById('totalPositions').textContent = total;
    document.getElementById('totalPlantilla').textContent = plantilla;
    document.getElementById('totalContractual').textContent = contractual;
    document.getElementById('totalOutsourced').textContent = outsourced;
    document.getElementById('total-count').textContent = total;
}
document.addEventListener('input', updateTotals);
document.addEventListener('change', updateTotals);
function addPositionRow() {
    const totalRow = document.getElementById('total-row');
    const row = document.createElement('tr');
    row.innerHTML = `
        <td>
            <input type="text" class="form-control form-control-sm">
        </td>
        <td>
            <select class="form-select form-select-sm employment-status">
                <option value="">Select</option>
                <option value="PLANTILLA">Plantilla</option>
                <option value="CONTRACTUAL">Contractual</option>
                <option value="OUTSOURCED">Outsourced</option>
            </select>
        </td>
        <td>
            <input type="number" class="form-control form-control-sm position-count">
        </td>
        <td class="text-center">
            <button type="button" class="delete-btn" onclick="deleteRow(this)">
                <i class="fa-solid fa-trash"></i>
            </button>
        </td>
    `;
    totalRow.parentNode.insertBefore(row, totalRow);
    updateTotals();
}

function deleteRow(button) {
    const row = button.closest('tr');
    const tbody = row.closest('tbody');
    const dataRows = tbody.querySelectorAll('tr:not(#total-row)');
    
    if (dataRows.length > 1) {
        row.remove();
        updateTotals();
    } else {
        showAlertModal('Notice', 'You must have at least one row in the table.');
    }
}

// Tooltip functionality
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
        });
        
        icon.addEventListener('mouseleave', function() {
            const tooltip = document.getElementById('active-tooltip');
            if (tooltip) {
                tooltip.remove();
            }
        });
    });

    // Conditional show/hide for System Usage Type
    document.querySelectorAll('input[name="system_usage_type"]').forEach(function(radio) {
        radio.addEventListener('change', function() {
            var details = document.getElementById('deploymentDetails');
            details.style.display = this.value === 'frontline' && this.checked ? 'block' : 'none';
            if (this.value !== 'frontline') {
                document.getElementById('onlineLinkField').style.display = 'none';
            }
        });
    });

    // Conditional show/hide for System Usage Type deployment details
    document.querySelectorAll('input[name="system_usage_type"]').forEach(function(radio) {
        radio.addEventListener('change', function() {
            var details = document.getElementById('deploymentDetails');
            details.style.display = this.value === 'frontline' && this.checked ? 'block' : 'none';
            if (this.value !== 'frontline') {
                document.getElementById('onlineLinkField').style.display = 'none';
            }
        });
    });

    // Conditional show/hide for Online link field
    document.querySelectorAll('input[name="deployment_type"]').forEach(function(radio) {
        radio.addEventListener('change', function() {
            var linkField = document.getElementById('onlineLinkField');
            linkField.style.display = this.value === 'online' && this.checked ? 'block' : 'none';
        });
    });

    // Conditional show/hide for Interoperability system integration example
    document.querySelectorAll('input[name="interoperability"]').forEach(function(radio) {
        radio.addEventListener('change', function() {
            var example = document.getElementById('systemIntegrationExample');
            if (this.value === 'system_integration' && this.checked) {
                example.style.display = 'block';
            } else {
                example.style.display = 'none';
            }
        });
    });

    // Load saved data on page load
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
                localStorage.removeItem('ict-human-capital-form');
                updateTotals();
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
                });
            } else {
                finalizeSave(formDataObj, showAlert);
            }
        } else {
            console.error('Form #mainForm not found');
            if (showAlert) showAlertModal('Error', 'Error: Form not found');
        }
    } catch (error) {
        console.error('Error in saveChanges:', error);
        if (showAlert) showAlertModal('Error', 'Error saving changes: ' + error.message);
    }
};

function finalizeSave(formDataObj, showAlert) {
    // Merge with previous localStorage data to preserve file previews
    const prevData = JSON.parse(localStorage.getItem('ict-human-capital-form') || '{}');
    Object.keys(prevData).forEach(key => {
        const val = prevData[key];
        if (typeof val === 'string' && (val.startsWith('data:') || val.startsWith('uploads/'))) {
            if (!(key in formDataObj) || formDataObj[key] === '') {
                formDataObj[key] = val;
            }
        }
    });
    
    try {
        const jsonStr = JSON.stringify(formDataObj);
        localStorage.setItem('ict-human-capital-form', jsonStr);
        
        const verify = localStorage.getItem('ict-human-capital-form');
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

// Load saved data from localStorage on page load
window.loadSavedData = function() {
    console.log('loadSavedData called');
    try {
        const savedData = localStorage.getItem('ict-human-capital-form');
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
                            input.checked = val === '1';
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
                
                updateTotals();
                console.log('Data loaded from localStorage, restored', restoredCount, 'fields');


                // Update conditional visibility after restoring data
                var frontlineRadio = document.querySelector('input[name="system_usage_type"][value="frontline"]');
                var deployDetails = document.getElementById('deploymentDetails');
                if (deployDetails && frontlineRadio) {
                    deployDetails.style.display = frontlineRadio.checked ? 'block' : 'none';
                }
                var onlineRadio = document.querySelector('input[name="deployment_type"][value="online"]');
                var onlineLinkField = document.getElementById('onlineLinkField');
                if (onlineLinkField && onlineRadio) {
                    onlineLinkField.style.display = onlineRadio.checked ? 'block' : 'none';
                }
                var integrationDetails = document.getElementById('integrationDetails');
                var interopIntegration = document.querySelector('input[name="interoperability"][value="integration"]');
                if (integrationDetails && interopIntegration) {
                    integrationDetails.style.display = interopIntegration.checked ? 'block' : 'none';
                }
                var sysIntExample = document.getElementById('systemIntegrationExample');
                var sysIntRadio = document.querySelector('input[name="interoperability"][value="system_integration"]');
                if (sysIntExample && sysIntRadio) {
                    sysIntExample.style.display = sysIntRadio.checked ? 'block' : 'none';
                }
            }
        }
    } catch (error) {
        console.error('Error loading saved data:', error);

    }
};

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
            const savedData = JSON.parse(localStorage.getItem('ict-human-capital-form') || '{}');
            delete savedData[input.name];
            localStorage.setItem('ict-human-capital-form', JSON.stringify(savedData));
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

// Navigate to page after saving
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
            const prevData = JSON.parse(localStorage.getItem('ict-human-capital-form') || '{}');
            Object.keys(prevData).forEach(key => {
                if (!(key in formDataObj)) {
                    const val = prevData[key];
                    if (typeof val === 'string' && (val.startsWith('data:') || val.startsWith('uploads/'))) {
                        formDataObj[key] = val;
                    }
                }
            });
            const jsonStr = JSON.stringify(formDataObj);
            localStorage.setItem('ict-human-capital-form', jsonStr);
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
