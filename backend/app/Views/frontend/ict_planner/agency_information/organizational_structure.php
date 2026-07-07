<?= $this->extend('frontend/layout/app') ?>

<?= $this->section('content') ?>
<style>
.main-section-card {
    background: var(--panel);
    border: 1px solid #dde4ed;
    border-radius: 12px;
    box-shadow: 0 12px 26px rgba(15, 23, 42, .05);
    overflow: hidden;
    margin-bottom: 24px;
}

.main-header {
    background: linear-gradient(180deg, #566d8b 0%, var(--brand) 100%);
    color: #fff;
    padding: 18px 22px;
    border-bottom: 1px solid rgba(255,255,255,.1);
}

.main-header .main-title {
    font-size: 1.15rem;
    font-weight: 700;
    margin: 0;
    color: #fff;
}

.main-header .main-subtitle {
    font-size: .8rem;
    color: rgba(255,255,255,.85);
    margin: 6px 0 0;
}

.subsection-card {
    background: #fff;
    border: 1px solid #e8ecf1;
    border-radius: 10px;
    margin-bottom: 20px;
}

.subsection-header {
    background: linear-gradient(135deg, #f8fafc 0%, #edf2f7 100%);
    padding: 14px 18px;
    border-bottom: 1px solid #d0dae6;
    display: flex;
    align-items: center;
    gap: 10px;
}

.subsection-header .subsection-title {
    font-size: .92rem;
    font-weight: 700;
    margin: 0;
    color: var(--brand-dark);
}

.subsection-header .subsection-number {
    background: var(--brand);
    color: #fff;
    padding: 2px 8px;
    border-radius: 4px;
    font-size: .74rem;
    flex-shrink: 0;
    font-weight: 700;
}

.subsection-body {
    padding: 18px;
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
    display: flex;
    align-items: center;
    gap: 6px;
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
    border-color: #d0dae6;
}

.action-btn-clear:hover {
    background: #fee2e2;
    color: #dc2626;
    border-color: #fecaca;
}

.navigation-buttons {
    display: flex;
    gap: 8px;
}

.table-container {
    overflow-x: auto;
}

.table-custom {
    width: 100%;
    border-collapse: collapse;
    font-size: .82rem;
}

.table-custom th,
.table-custom td {
    border: 1px solid #d0dae6;
    padding: 10px 12px;
    text-align: center;
    vertical-align: middle;
}

.table-custom thead th {
    background: linear-gradient(135deg, #f8fafc 0%, #edf2f7 100%);
    color: var(--brand-dark);
    font-weight: 700;
    font-size: .78rem;
    text-transform: uppercase;
    letter-spacing: .02em;
}

.table-custom tbody td {
    color: #1f2a3a;
}

.table-custom tbody td:first-child {
    text-align: left;
    font-weight: 600;
}

.table-custom tbody tr:last-child td {
    font-weight: 700;
    background: #f8fafc;
}

.table-custom .count-input {
    width: 100px;
    border: 1px solid #d0dae6;
    border-radius: 4px;
    padding: 6px 8px;
    font-size: .82rem;
    text-align: center;
}

.table-custom .count-input:focus {
    border-color: var(--brand);
    box-shadow: 0 0 0 3px rgba(79, 101, 132, .1);
    outline: none;
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
        flex: 1;
        justify-content: center;
    }
}
</style>

<div class="row">
    <div class="col-12">
        <div class="page-header mb-3">
            <h1 class="page-title"> Organizational Structure</h1>
            <p class="page-subtitle">Agency organizational structure and human capital information.</p>
        </div>
    </div>
</div>

<form id="mainForm" action="<?= site_url('ict-planner/agency-information/organizational-structure/save') ?>" method="post">
    <?= csrf_field() ?>

    <div class="main-section-card">
        <div class="main-header">
            <h2 class="main-title">B. Organizational Structure</h2>
        </div>

        <div style="padding: 22px;">
            <!-- B.1 CIO -->
            <div class="subsection-card">
                <div class="subsection-header">
                    <span class="subsection-number">B.1</span>
                    <span class="subsection-title">Chief Information Officer (CIO)</span>
                </div>
                <div class="subsection-body">
                    <div class="row g-3">
                        <div class="col-md-6">
                            <div class="form-label">Name of CIO</div>
                            <input type="text" class="form-control" name="cio_name" placeholder="Enter name of CIO" value="<?= old('cio_name', $saved['cio_name'] ?? '') ?>">
                        </div>
                        <div class="col-md-6">
                            <div class="form-label">Plantilla Position</div>
                            <input type="text" class="form-control" name="cio_plantilla" placeholder="Enter plantilla position" value="<?= old('cio_plantilla', $saved['cio_plantilla'] ?? '') ?>">
                        </div>
                        <div class="col-md-6">
                            <div class="form-label">Organizational Unit</div>
                            <input type="text" class="form-control" name="cio_unit" placeholder="Enter organizational unit" value="<?= old('cio_unit', $saved['cio_unit'] ?? '') ?>">
                        </div>
                        <div class="col-md-6">
                            <div class="form-label">E-mail Address</div>
                            <input type="email" class="form-control" name="cio_email" placeholder="Enter e-mail address" value="<?= old('cio_email', $saved['cio_email'] ?? '') ?>">
                        </div>
                        <div class="col-md-6">
                            <div class="form-label">Contact Number/s</div>
                            <input type="text" class="form-control" name="cio_contact" placeholder="Enter contact number/s" value="<?= old('cio_contact', $saved['cio_contact'] ?? '') ?>">
                        </div>
                    </div>
                </div>
            </div>

            <!-- ISSP Focal -->
            <div class="subsection-card">
                <div class="subsection-header">
                    <span class="subsection-number">B.1</span>
                    <span class="subsection-title">ISSP Focal Person</span>
                </div>
                <div class="subsection-body">
                    <div class="row g-3">
                        <div class="col-md-6">
                            <div class="form-label">Name of ISSP Focal</div>
                            <input type="text" class="form-control" name="focal_name" placeholder="Enter name of ISSP focal" value="<?= old('focal_name', $saved['focal_name'] ?? '') ?>">
                        </div>
                        <div class="col-md-6">
                            <div class="form-label">Position</div>
                            <input type="text" class="form-control" name="focal_position" placeholder="Enter position" value="<?= old('focal_position', $saved['focal_position'] ?? '') ?>">
                        </div>
                        <div class="col-md-6">
                            <div class="form-label">Organizational Unit</div>
                            <input type="text" class="form-control" name="focal_unit" placeholder="Enter organizational unit" value="<?= old('focal_unit', $saved['focal_unit'] ?? '') ?>">
                        </div>
                        <div class="col-md-6">
                            <div class="form-label">E-mail Address</div>
                            <input type="email" class="form-control" name="focal_email" placeholder="Enter e-mail address" value="<?= old('focal_email', $saved['focal_email'] ?? '') ?>">
                        </div>
                        <div class="col-md-6">
                            <div class="form-label">Contact Number/s</div>
                            <input type="text" class="form-control" name="focal_contact" placeholder="Enter contact number/s" value="<?= old('focal_contact', $saved['focal_contact'] ?? '') ?>">
                        </div>
                    </div>
                </div>
            </div>

            <!-- B.2 Human Capital -->
            <div class="subsection-card">
                <div class="subsection-header">
                    <span class="subsection-number">B.2</span>
                    <span class="subsection-title">Human Capital</span>
                </div>
                <div class="subsection-body">
                    <div class="table-container">
                        <table class="table-custom">
                            <thead>
                                <tr>
                                    <th rowspan="2" style="min-width:200px;">Employment Status</th>
                                    <th colspan="2">Positions</th>
                                    <th colspan="2">Sex</th>
                                </tr>
                                <tr>
                                    <th>IT Positions</th>
                                    <th>Non-IT Positions</th>
                                    <th>Male</th>
                                    <th>Female</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Plantilla</td>
                                    <td><input type="number" class="count-input" name="plantilla_it" min="0" placeholder="0" value="<?= old('plantilla_it', $saved['plantilla_it'] ?? 0) ?>" oninput="calculateGrandTotals()"></td>
                                    <td><input type="number" class="count-input" name="plantilla_non_it" min="0" placeholder="0" value="<?= old('plantilla_non_it', $saved['plantilla_non_it'] ?? 0) ?>" oninput="calculateGrandTotals()"></td>
                                    <td><input type="number" class="count-input" name="plantilla_male" min="0" placeholder="0" value="<?= old('plantilla_male', $saved['plantilla_male'] ?? 0) ?>" oninput="calculateGrandTotals()"></td>
                                    <td><input type="number" class="count-input" name="plantilla_female" min="0" placeholder="0" value="<?= old('plantilla_female', $saved['plantilla_female'] ?? 0) ?>" oninput="calculateGrandTotals()"></td>
                                </tr>
                                <tr>
                                    <td>Contractual</td>
                                    <td><input type="number" class="count-input" name="contractual_it" min="0" placeholder="0" value="<?= old('contractual_it', $saved['contractual_it'] ?? 0) ?>" oninput="calculateGrandTotals()"></td>
                                    <td><input type="number" class="count-input" name="contractual_non_it" min="0" placeholder="0" value="<?= old('contractual_non_it', $saved['contractual_non_it'] ?? 0) ?>" oninput="calculateGrandTotals()"></td>
                                    <td><input type="number" class="count-input" name="contractual_male" min="0" placeholder="0" value="<?= old('contractual_male', $saved['contractual_male'] ?? 0) ?>" oninput="calculateGrandTotals()"></td>
                                    <td><input type="number" class="count-input" name="contractual_female" min="0" placeholder="0" value="<?= old('contractual_female', $saved['contractual_female'] ?? 0) ?>" oninput="calculateGrandTotals()"></td>
                                </tr>
                                <tr>
                                    <td>Outsourced (JO, COS, and HTC)</td>
                                    <td><input type="number" class="count-input" name="outsourced_it" min="0" placeholder="0" value="<?= old('outsourced_it', $saved['outsourced_it'] ?? 0) ?>" oninput="calculateGrandTotals()"></td>
                                    <td><input type="number" class="count-input" name="outsourced_non_it" min="0" placeholder="0" value="<?= old('outsourced_non_it', $saved['outsourced_non_it'] ?? 0) ?>" oninput="calculateGrandTotals()"></td>
                                    <td><input type="number" class="count-input" name="outsourced_male" min="0" placeholder="0" value="<?= old('outsourced_male', $saved['outsourced_male'] ?? 0) ?>" oninput="calculateGrandTotals()"></td>
                                    <td><input type="number" class="count-input" name="outsourced_female" min="0" placeholder="0" value="<?= old('outsourced_female', $saved['outsourced_female'] ?? 0) ?>" oninput="calculateGrandTotals()"></td>
                                </tr>
                                <tr>
                                    <td>Grand Total</td>
                                    <td id="total_it">0</td>
                                    <td id="total_non_it">0</td>
                                    <td id="total_male">0</td>
                                    <td id="total_female">0</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <!-- Footer Actions -->
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
                    <button type="button" class="nav-btn nav-btn-prev" onclick="window.navigateToPage('<?= site_url('ict-planner/agency-information/mandate-vision-mission') ?>')">
                        <i class="fa-solid fa-arrow-left"></i>
                        <span>Mandate, Vision, Mission</span>
                    </button>
                    <button type="button" class="nav-btn nav-btn-next" onclick="window.navigateToPage('<?= site_url('ict-planner/agency-information/stakeholder-analysis') ?>')">
                        <span>Stakeholder Analysis</span>
                        <i class="fa-solid fa-arrow-right"></i>
                    </button>
                </div>
            </div>
        </div>
    </div>
</form>

<script>
const STORAGE_KEY = 'ict_planner_organizational_structure';

window.calculateGrandTotals = function() {
    const fields = [
        { it: 'plantilla_it', nonIt: 'plantilla_non_it', male: 'plantilla_male', female: 'plantilla_female' },
        { it: 'contractual_it', nonIt: 'contractual_non_it', male: 'contractual_male', female: 'contractual_female' },
        { it: 'outsourced_it', nonIt: 'outsourced_non_it', male: 'outsourced_male', female: 'outsourced_female' }
    ];

    let totalIt = 0, totalNonIt = 0, totalMale = 0, totalFemale = 0;

    fields.forEach(function(f) {
        const itVal = parseInt(document.querySelector('[name="' + f.it + '"]')?.value) || 0;
        const nonItVal = parseInt(document.querySelector('[name="' + f.nonIt + '"]')?.value) || 0;
        const maleVal = parseInt(document.querySelector('[name="' + f.male + '"]')?.value) || 0;
        const femaleVal = parseInt(document.querySelector('[name="' + f.female + '"]')?.value) || 0;

        totalIt += itVal;
        totalNonIt += nonItVal;
        totalMale += maleVal;
        totalFemale += femaleVal;
    });

    document.getElementById('total_it').textContent = totalIt;
    document.getElementById('total_non_it').textContent = totalNonIt;
    document.getElementById('total_male').textContent = totalMale;
    document.getElementById('total_female').textContent = totalFemale;
};

window.saveFormData = function() {
    const form = document.querySelector('#mainForm');
    const data = {};
    form.querySelectorAll('input[name], textarea[name], select[name]').forEach(function(el) {
        data[el.name] = el.value;
    });
    localStorage.setItem(STORAGE_KEY, JSON.stringify(data));
    return data;
};

window.loadSavedData = function() {
    const saved = localStorage.getItem(STORAGE_KEY);
    if (saved) {
        try {
            const data = JSON.parse(saved);
            const form = document.querySelector('#mainForm');
            form.querySelectorAll('input[name], textarea[name], select[name]').forEach(function(el) {
                if (el.name in data && data[el.name] !== null && !el.value) {
                    el.value = data[el.name];
                }
            });
        } catch (e) {
            console.error('Error loading saved data:', e);
        }
    }
    calculateGrandTotals();
};

window.clearForm = function() {
    if (typeof showConfirmModal === 'function') {
        showConfirmModal('Are you sure you want to clear all fields? This action cannot be undone.', function() {
            const form = document.querySelector('#mainForm');
            if (form) {
                form.querySelectorAll('input:not([type="hidden"]):not([type="file"]), textarea, select').forEach(function(el) {
                    if (el.type === 'checkbox' || el.type === 'radio') {
                        el.checked = false;
                    } else {
                        el.value = '';
                    }
                });
                localStorage.removeItem(STORAGE_KEY);
                calculateGrandTotals();
            }
        });
    } else {
        if (confirm('Are you sure you want to clear all fields? This action cannot be undone.')) {
            const form = document.querySelector('#mainForm');
            if (form) {
                form.querySelectorAll('input:not([type="hidden"]):not([type="file"]), textarea, select').forEach(function(el) {
                    if (el.type === 'checkbox' || el.type === 'radio') {
                        el.checked = false;
                    } else {
                        el.value = '';
                    }
                });
                localStorage.removeItem(STORAGE_KEY);
                calculateGrandTotals();
            }
        }
    }
};

window.saveChanges = function() {
    saveFormData();
    document.querySelector('#mainForm').submit();
};

window.navigateToPage = function(url) {
    window.location.href = url;
};

document.addEventListener('DOMContentLoaded', function() {
    loadSavedData();
});
</script>

<?= $this->endSection() ?>
