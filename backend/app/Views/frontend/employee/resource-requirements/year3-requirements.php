<?= $this->extend('frontend/layout/app') ?>
<?= $this->section('content') ?>

<style>
.section-card {
    background: #fff;
    border: 1px solid #dde4ed;
    border-radius: 10px;
    overflow: hidden;
    box-shadow: 0 12px 26px rgba(15, 23, 42, .05);
    margin-bottom: 20px;
}

.section-header {
    background: linear-gradient(180deg, #566d8b 0%, #4f6584 100%);
    color: #fff;
    padding: 15px 20px;
}

.section-title {
    margin: 0;
    font-size: 20px;
    font-weight: bold;
}

.section-subtitle {
    margin: 0;
    opacity: .9;
    font-size: 13px;
}

.section-body {
    padding: 20px;
}

.info-banner {
    background: #eef7fb;
    border-left: 4px solid #4f6584;
    padding: 12px 16px;
    border-radius: 6px;
    margin-bottom: 20px;
}

.card-body {
    background: #fff;
    padding: 0;
}

.border.rounded {
    background: #fff;
}

.list-group-item {
    background: #fff;
}

/* =========================
   NAVIGATION
========================= */

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

/* =========================
   FOOTER ACTIONS
========================= */

.footer-actions {
    display: flex;
    justify-content: space-between;
    align-items: center;
    gap: 16px;
    padding: 16px;
    background: #f8fafc;
    border-radius: 8px;
    border: 1px solid #e2e8f0;
    width: 100%;
    box-sizing: border-box;
}

.action-buttons {
    display: flex;
    align-items: center;
    gap: 8px;
}

.action-btn {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    gap: 6px;
    padding: 8px 16px;
    border-radius: 6px;
    font-weight: 500;
    font-size: 0.875rem;
    cursor: pointer;
    transition: all 0.2s ease;
    border: 1px solid transparent;
    white-space: nowrap;
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
    align-items: center;
    gap: 8px;
}

/* =========================
   MOBILE
========================= */

@media (max-width: 768px) {

    .navigation-bar {
        flex-direction: column;
        gap: 8px;
    }

    .navigation-bar .nav-btn {
        width: 100%;
        justify-content: center;
    }

    .footer-actions {
        flex-direction: column;
        align-items: stretch;
        gap: 12px;
    }

    .action-buttons {
        width: 100%;
        justify-content: center;
    }

    .action-buttons .action-btn {
        flex: 1;
        justify-content: center;
    }

    .navigation-buttons {
        width: 100%;
        justify-content: center;
    }

    .navigation-buttons .nav-btn {
        flex: 1;
        justify-content: center;
    }
}
</style>


<div class="container-fluid">

<form id="mainForm">

<div class="row mb-3">

    <div class="col-12">

        <div class="section-card">

            <div class="section-header">

                <h3 class="section-title">
                    Year 3 Resource Requirements

                    <i
                        class="fas fa-question-circle text-white"
                        data-bs-toggle="tooltip"
                        data-bs-placement="right"
                        title="Enter all ICT resource requirements for Year 3.">
                    </i>
                </h3>

            </div>

            <div class="section-body">
            </div>


<?php foreach($categories as $category): ?>

<div class="section-card">

    <div class="section-header">

        <h5 class="section-title">
            <?= esc($category) ?>
        </h5>

    </div>

    <div class="card-body">

        <?php foreach($types as $type): ?>

        <?php
        $subtotal = 0;
        ?>

        <div class="border rounded mb-4">

            <div class="d-flex justify-content-between align-items-center border-bottom p-3">

                <div>
                    <strong>
                        <?= esc($type) ?>
                    </strong>
                </div>

                <div>

                    <button
                        type="button"
                        class="btn btn-sm btn-outline-primary add-line-btn"
                        data-bs-toggle="modal"
                        data-bs-target="#addRequirementModal"
                        data-category="<?= esc($category) ?>"
                        data-type="<?= esc($type) ?>">
                        + Add Line
                    </button>

                </div>

            </div>


            <div class="list-group list-group-flush">

<?php foreach ($requirements ?? [] as $row): ?>

<?php
if (
    $row['strategic_category'] == $category &&
    $row['expenditure_type'] == $type
):

    $subtotal += $row['total_cost'];
?>

<div class="list-group-item">

    <div class="d-flex justify-content-between">

        <div>

            <h6 class="mb-1">
                <?= esc($row['item']) ?>
            </h6>

           <small class="text-muted">

    <?= esc($row['office'] ?? '') ?>

    <?php if(!empty($row['uacs_code'])): ?>

        • <?= esc($row['uacs_code']) ?>

    <?php endif; ?>

    <?php if(!empty($row['fund_source'])): ?>

        • <?= esc($row['fund_source']) ?>

    <?php endif; ?>

</small>
        </div>

        <div class="text-end">
        </div>

        <div class="text-end">

            <strong>
                ₱<?= number_format((float)$row['total_cost'], 2) ?>
            </strong>

            <br>

            <button
                class="btn btn-sm btn-outline-primary mt-2 edit-btn"
                data-id="<?= $row['id'] ?>"
                data-item="<?= esc($row['item']) ?>"
                data-office="<?= esc($row['office']) ?>"
                data-uacs="<?= esc($row['uacs_code'] ?? '') ?>"
                data-fund="<?= esc($row['fund_source']) ?>"
                data-unit="<?= $row['unit_cost'] ?>"
                data-target="<?= $row['physical_target'] ?>"
                data-total="<?= $row['total_cost'] ?>"
                data-bs-toggle="modal"
                data-bs-target="#editRequirementModal">

                <i class="fa fa-pencil-alt"></i>

            </button>


            <button
                type="button"
                class="btn btn-sm btn-outline-danger delete-btn"
                data-id="<?= esc($row['id'] ?? '') ?>"
                title="Delete">

                <i class="fa fa-trash"></i>

            </button>

        </div>

    </div>

</div>

<?php endif; ?>

<?php endforeach; ?>

</div>


<div
    class="list-group list-group-flush requirements-container"
    data-category="<?= esc($category) ?>"
    data-type="<?= esc($type) ?>">
</div>


<div class="border-top p-3">

    <div class="d-flex justify-content-between">

        <strong>Subtotal</strong>

        <strong
            class="subtotal-amount"
            data-db-subtotal="<?= (float)$subtotal ?>">

            ₱<?= number_format((float)$subtotal, 2) ?>

        </strong>

    </div>

</div>

</div>

<?php endforeach; ?>

</div>

</div>

<?php endforeach; ?>

</div>


<!-- FOOTER ACTIONS -->

<div class="row mb-4">

    <div class="col-12">

        <div class="footer-actions">

            <div class="action-buttons">

                <button
                    type="button"
                    class="action-btn action-btn-save"
                    onclick="window.saveChanges()">

                    <i class="fa-solid fa-save"></i>

                    <span>Save Changes</span>

                </button>


                <button
                    type="button"
                    class="action-btn action-btn-clear"
                    onclick="window.clearForm()">

                    <i class="fa-solid fa-eraser"></i>

                    <span>Clear Fields</span>

                </button>

            </div>


            <div class="navigation-buttons">

                <button
                    type="button"
                    class="nav-btn nav-btn-prev"
                    onclick="window.location.href='<?= site_url('employee/resource-requirements/year2-requirements/' . (int)$editId) ?>'">

                    <i class="fa-solid fa-arrow-left"></i>

                    <span>Year 2 Requirements</span>

                </button>


                <button
                    type="button"
                    class="nav-btn nav-btn-next"
                    onclick="window.navigateToPage('<?= site_url('/employee/resource-requirements/summary-of-investments/' . (int)$editId) ?>')">

                    <span>Summary of Investments</span>

                    <i class="fa-solid fa-arrow-right"></i>

                </button>

            </div>

        </div>

    </div>

</div>

</form>


<!-- =========================================================
     ADD RESOURCE REQUIREMENT
========================================================= -->

<div
    class="modal fade"
    id="addRequirementModal"
    tabindex="-1"
    aria-hidden="true">

    <div class="modal-dialog modal-xl">

        <div class="modal-content">

            <form
                id="addRequirementForm"
                action="<?= base_url('employee/resource-requirements/store') ?>"
                method="POST">

                <?= csrf_field() ?>

                <input
                    type="hidden"
                    name="issp_record_id"
                    value="<?= (int) ($editId ?? 0) ?>">

                <input
                    type="hidden"
                    name="strategic_category"
                    id="strategic_category">

                <input
                    type="hidden"
                    name="expenditure_type"
                    id="expenditure_type">

                <input
                    type="hidden"
                    name="year"
                    value="3">


                <div class="modal-header">

                    <h5 class="modal-title">
                        Add Resource Requirement
                    </h5>

                    <button
                        type="button"
                        class="btn-close"
                        data-bs-dismiss="modal">
                    </button>

                </div>


                <div class="modal-body">

                    <div class="row">

                        <!-- ITEM -->

                        <div class="col-md-12 mb-3">

                            <label class="form-label">
                                Item
                            </label>

                            <input
                                type="text"
                                id="item"
                                name="item"
                                placeholder="Describe the item or service being procured"
                                class="form-control"
                                required>

                        </div>


                        <!-- OFFICE -->

                        <div class="col-md-6 mb-3">

                            <label class="form-label">
                                Office / Unit
                            </label>

                            <select
                                name="office"
                                id="office"
                                class="form-select">

                                <option value="">
                                    Select office / unit
                                </option>

                                <option value="Central Office">
                                    Central Office
                                </option>

                                <option value="Regional Offices">
                                    Regional Offices
                                </option>

                                <option value="Central Office and Regional Offices">
                                    Central Office and Regional Offices
                                </option>

                            </select>

                        </div>


                        <!-- UACS -->

                        <div class="col-md-6 mb-3">

                            <label class="form-label">
                                UACS Code
                            </label>

                            <select
                                name="uacs_code"
                                id="uacs_code"
                                class="form-select">

                                <option value="">
                                    Select UACS code
                                </option>

                                <option value="5060403006 Communications Networks">
                                    5060403006 Communications Networks
                                </option>

                                <option value="5060405003 Information and Communication Technology Equipment">
                                    5060405003 Information and Communication Technology Equipment
                                </option>

                                <option value="5060405007 Communications Equipment">
                                    5060405007 Communications Equipment
                                </option>

                                <option value="5060405012 Printing Equipment">
                                    5060405012 Printing Equipment
                                </option>

                                <option value="5060405015 ICT Software">
                                    5060405015 ICT Software
                                </option>

                            </select>

                        </div>


                        <!-- FUND SOURCE -->

                        <div class="col-md-6 mb-3">

                            <label class="form-label">
                                Fund Source
                            </label>

                            <select
                                id="fund"
                                name="fund_source"
                                class="form-select">

                                <option value="">
                                    Select a fund source
                                </option>

                                <option value="General Appropriations Act (GAA)">
                                    General Appropriations Act (GAA)
                                </option>

                                <option value="Foreign-Assisted">
                                    Foreign-Assisted
                                </option>

                                <option value="Locally Funded">
                                    Locally Funded
                                </option>

                                <option value="Other Income Generating Sources">
                                    Other Income Generating Sources
                                </option>

                            </select>

                        </div>


                        <!-- UNIT COST -->

                        <div class="col-md-4 mb-3">

                            <label class="form-label">
                                Unit Cost
                            </label>

                            <input
                                type="number"
                                step="0.01"
                                id="unit_cost" oninput="window.computeAdd()"
                                name="unit_cost"
                                class="form-control"
                                required>

                        </div>


                        <!-- PHYSICAL TARGET -->

                        <div class="col-md-4 mb-3">

                            <label class="form-label">
                                Physical Target
                            </label>

                            <input
                                type="number"
                                min="1"
                                id="physical_target" oninput="window.computeAdd()"
                                name="physical_target"
                                class="form-control"
                                required>

                        </div>


                        <!-- TOTAL -->

                        <div class="col-md-4 mb-3">

                            <label class="form-label">
                                Line Total
                            </label>

                            <input
                                type="text"
                                id="line_total_display"
                                class="form-control bg-light fw-bold text-end"
                                value="₱0.00"
                                readonly>

                            <input
                                type="hidden"
                                id="line_total"
                                name="total_cost"
                                value="0.00">

                        </div>

                    </div>

                </div>


                <div class="modal-footer">

                    <button
                        class="btn btn-secondary"
                        data-bs-dismiss="modal"
                        type="button">

                        Cancel

                    </button>


                    <button
                        type="button"
                        id="saveRequirementBtn"
                        class="btn btn-primary"
                        onclick="saveRequirement()">

                        Save Resource Requirement

                    </button>

                </div>

            </form>

        </div>

    </div>

</div>


<!-- =========================================================
     EDIT RESOURCE REQUIREMENT
========================================================= -->

<div
    class="modal fade"
    id="editRequirementModal"
    tabindex="-1">

    <div class="modal-dialog modal-xl">

        <div class="modal-content">

            <form
                action="<?= base_url('employee/resource-requirements/update') ?>"
                method="POST">

                <?= csrf_field() ?>

                <input
                    type="hidden"
                    name="issp_record_id"
                    id="edit_issp_record_id"
                    value="<?= (int) ($editId ?? 0) ?>">

                <input
                    type="hidden"
                    name="id"
                    id="edit_id">

                <input
                    type="hidden"
                    name="year"
                    value="3">


                <div class="modal-header">

                    <h5 class="modal-title">
                        Edit Resource Requirement
                    </h5>

                    <button
                        type="button"
                        class="btn-close"
                        data-bs-dismiss="modal">
                    </button>

                </div>


                <div class="modal-body">

                    <div class="row">

                        <!-- ITEM -->

                        <div class="col-md-6 mb-3">

                            <label class="form-label">
                                Item
                            </label>

                            <input
                                type="text"
                                id="edit_item"
                                name="item"
                                placeholder="Describe the item or service being procured"
                                class="form-control"
                                required>

                        </div>


                        <!-- OFFICE -->

                        <div class="col-md-6 mb-3">

                            <label class="form-label">
                                Office / Unit
                            </label>

                            <select
                                id="edit_office"
                                name="office"
                                class="form-select">

                                <option value="">
                                    Select office / unit
                                </option>

                                <option value="Central Office">
                                    Central Office
                                </option>

                                <option value="Regional Offices">
                                    Regional Offices
                                </option>

                                <option value="Central Office and Regional Offices">
                                    Central Office and Regional Offices
                                </option>

                            </select>

                        </div>


                        <!-- UACS -->

                        <div class="col-md-6 mb-3">

                            <label class="form-label">
                                UACS Code
                            </label>

                            <select
                                id="edit_uacs_code"
                                name="uacs_code"
                                class="form-select">

                                <option value="">
                                    Select UACS code
                                </option>

                                <option value="5060403006 Communications Networks">
                                    5060403006 Communications Networks
                                </option>

                                <option value="5060405003 Information and Communication Technology Equipment">
                                    5060405003 Information and Communication Technology Equipment
                                </option>

                                <option value="5060405007 Communications Equipment">
                                    5060405007 Communications Equipment
                                </option>

                                <option value="5060405012 Printing Equipment">
                                    5060405012 Printing Equipment
                                </option>

                                <option value="5060405015 ICT Software">
                                    5060405015 ICT Software
                                </option>

                            </select>

                        </div>


                        <!-- FUND SOURCE -->

                        <div class="col-md-6 mb-3">

                            <label class="form-label">
                                Fund Source
                            </label>

                            <select
                                id="edit_fund"
                                name="fund_source"
                                class="form-select">

                                <option value="">
                                    Select a fund source
                                </option>

                                <option value="General Appropriations Act (GAA)">
                                    General Appropriations Act (GAA)
                                </option>

                                <option value="Foreign-Assisted">
                                    Foreign-Assisted
                                </option>

                                <option value="Locally Funded">
                                    Locally Funded
                                </option>

                                <option value="Other Income Generating Sources">
                                    Other Income Generating Sources
                                </option>

                            </select>

                        </div>


                        <!-- UNIT COST -->

                        <div class="col-md-4 mb-3">

                            <label class="form-label">
                                Unit Cost
                            </label>

                            <input
                                type="number"
                                step="0.01"
                                id="edit_unit"
                                name="unit_cost"
                                class="form-control"
                                required>

                        </div>


                        <!-- PHYSICAL TARGET -->

                        <div class="col-md-4 mb-3">

                            <label class="form-label">
                                Physical Target
                            </label>

                            <input
                                type="number"
                                min="1"
                                id="edit_target"
                                name="physical_target"
                                class="form-control"
                                required>

                        </div>


                        <!-- TOTAL -->

                        <div class="col-md-4 mb-3">

                            <label class="form-label">
                                Line Total
                            </label>

                            <input
                                type="text"
                                id="edit_total"
                                class="form-control bg-light fw-bold text-end"
                                value="₱0.00"
                                readonly>

                            <input
                                type="hidden"
                                id="edit_total_hidden"
                                name="total_cost"
                                value="0.00">

                        </div>

                    </div>

                </div>


                <div class="modal-footer">

                    <button
                        class="btn btn-secondary"
                        data-bs-dismiss="modal"
                        type="button">

                        Cancel

                    </button>


                    <button
                        type="button"
                        class="action-btn action-btn-save"
                        id="editSaveButton">

                        Save Changes

                    </button>

                </div>

            </form>

        </div>

    </div>

</div>


<script>
/* =========================================================
   YEAR 3 RESOURCE REQUIREMENTS
========================================================= */

const YEAR3_SAVED_KEY = 'year3-requirements-saved';

const YEAR3_REQUIREMENT_KEYS = [
    'year3-office-productivity-form',
    'year3-internal-ict-projects-form',
    'year3-cross-agency-form',
    'year3-continuing-costs-form'
];

const YEAR3_HAS_REQUIREMENTS =
    <?= !empty($requirements) ? 'true' : 'false' ?>;

console.log('YEAR 3 PHP editId:', <?= (int) ($editId ?? 0) ?>);
console.log('YEAR 3 localStorage edit_project_id:', localStorage.getItem('edit_project_id'));
console.log('YEAR 3 localStorage issp_record_id:', localStorage.getItem('issp_record_id'));

/* =========================================================
   TOOLTIP
========================================================= */

document.addEventListener('DOMContentLoaded', function () {
    const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]');

    tooltipTriggerList.forEach(function (tooltipTriggerEl) {
        if (typeof bootstrap !== 'undefined' && bootstrap.Tooltip) {
            new bootstrap.Tooltip(tooltipTriggerEl);
        }
    });
});

/* =========================================================
   ADD REQUIREMENT
========================================================= */

const unit = document.getElementById('unit_cost');
const target = document.getElementById('physical_target');
const totalDisplay = document.getElementById('line_total_display');
const totalHidden = document.getElementById('line_total');

function computeAdd() {
    if (!unit || !target || !totalDisplay || !totalHidden) {
        return;
    }

    const unitValue = parseFloat(unit.value) || 0;
    const targetValue = parseFloat(target.value) || 0;
    const amount = unitValue * targetValue;

    totalDisplay.value = '₱' + amount.toLocaleString('en-PH', {
        minimumFractionDigits: 2,
        maximumFractionDigits: 2
    });

    totalHidden.value = amount.toFixed(2);
}

if (unit && target) {
    unit.addEventListener('input', computeAdd);
    target.addEventListener('input', computeAdd);
}

/* =========================================================
   RESET ADD MODAL
========================================================= */

const addModal = document.getElementById('addRequirementModal');

if (addModal) {
    addModal.addEventListener('hidden.bs.modal', function () {
        const form = addModal.querySelector('form');

        if (form) {
            form.reset();
        }

        if (totalDisplay) {
            totalDisplay.value = '₱0.00';
        }

        if (totalHidden) {
            totalHidden.value = '0.00';
        }

        const category = document.getElementById('strategic_category');
        const type = document.getElementById('expenditure_type');

        if (category) {
            category.value = '';
        }

        if (type) {
            type.value = '';
        }
    });
}

/* =========================================================
   ADD LINE BUTTON
========================================================= */

document.querySelectorAll('.add-line-btn').forEach(function (btn) {
    btn.addEventListener('click', function () {
        const category = document.getElementById('strategic_category');
        const type = document.getElementById('expenditure_type');

        if (category) {
            category.value = this.dataset.category || '';
        }

        if (type) {
            type.value = this.dataset.type || '';
        }

        console.log('YEAR 3 Add Line:', {
            category: this.dataset.category,
            type: this.dataset.type
        });
    });
});

/* =========================================================
   EDIT REQUIREMENT
========================================================= */

const editUnit = document.getElementById('edit_unit');
const editTarget = document.getElementById('edit_target');
const editDisplay = document.getElementById('edit_total');
const editHidden = document.getElementById('edit_total_hidden');

function computeEdit() {
    if (!editUnit || !editTarget || !editDisplay || !editHidden) {
        return;
    }

    const unitValue = parseFloat(editUnit.value) || 0;
    const targetValue = parseFloat(editTarget.value) || 0;
    const amount = unitValue * targetValue;

    editDisplay.value = '₱' + amount.toLocaleString('en-PH', {
        minimumFractionDigits: 2,
        maximumFractionDigits: 2
    });

    editHidden.value = amount.toFixed(2);
}

if (editUnit && editTarget) {
    editUnit.addEventListener('input', computeEdit);
    editTarget.addEventListener('input', computeEdit);
}

/* =========================================================
   EDIT BUTTON
========================================================= */

document.querySelectorAll('.edit-btn').forEach(function (btn) {
    btn.addEventListener('click', function () {
        const editId = document.getElementById('edit_id');
        const editItem = document.getElementById('edit_item');
        const editOffice = document.getElementById('edit_office');
        const editFund = document.getElementById('edit_fund');
        const editUacs = document.getElementById('edit_uacs_code');

        if (editId) {
            editId.value = this.dataset.id || '';
        }

        if (editItem) {
            editItem.value = this.dataset.item || '';
        }

        if (editOffice) {
            editOffice.value = this.dataset.office || '';
        }

        if (editFund) {
            editFund.value = this.dataset.fund || '';
        }

        if (editUacs) {
            editUacs.value = this.dataset.uacs || '';
        }

        if (editUnit) {
            editUnit.value = this.dataset.unit || '';
        }

        if (editTarget) {
            editTarget.value = this.dataset.target || '';
        }

        computeEdit();

        console.log('YEAR 3 editing requirement:', this.dataset.id);
    });
});

/* =========================================================
   MARK YEAR 3 AS UNSAVED
========================================================= */

function markYear3AsUnsaved() {
    localStorage.removeItem(YEAR3_SAVED_KEY);

    if (typeof updateStatusIndicators === 'function') {
        updateStatusIndicators();
    }
}

/* =========================================================
   GET ACTIVE PROJECT ID
========================================================= */

function getYear3ProjectId() {
    const localEditProjectId = parseInt(
        localStorage.getItem('edit_project_id') || '0',
        10
    );

    if (localEditProjectId > 0) {
        console.log('YEAR 3 using localStorage edit_project_id:', localEditProjectId);
        return localEditProjectId;
    }

    const localIsspRecordId = parseInt(
        localStorage.getItem('issp_record_id') || '0',
        10
    );

    if (localIsspRecordId > 0) {
        console.log('YEAR 3 using localStorage issp_record_id:', localIsspRecordId);
        return localIsspRecordId;
    }

    const phpEditId = parseInt(
        '<?= (int) ($editId ?? 0) ?>',
        10
    );

    if (phpEditId > 0) {
        console.log('YEAR 3 using PHP editId:', phpEditId);
        return phpEditId;
    }

    console.error('YEAR 3: No active ISSP project ID found.');
    return 0;
}

/* =========================================================
   SAVE RESOURCE REQUIREMENT
========================================================= */

window.saveRequirement = function () {
    const form = document.getElementById('addRequirementForm');

    if (!form) {
        console.error('YEAR 3 add requirement form not found.');
        return;
    }

    const projectId = getYear3ProjectId();

    if (projectId <= 0) {
        showAlertModal(
            'Error',
            'No active ISSP project selected. Please save the ICT Projects first.'
        );
        return;
    }

    const total = parseFloat(
        document.getElementById('line_total')?.value || 0
    );

    if (total <= 0) {
        showAlertModal(
            'Error',
            'Please enter a valid Unit Cost and Physical Target.'
        );
        return;
    }

    markYear3AsUnsaved();

    const formData = new FormData(form);

    formData.set('issp_record_id', String(projectId));
    formData.set('year', '3');

    const category = document.getElementById('strategic_category')?.value || '';
    const type = document.getElementById('expenditure_type')?.value || '';

    formData.set('strategic_category', category);
    formData.set('expenditure_type', type);

    console.log('YEAR 3 saving requirement:', {
        projectId: projectId,
        year: 3,
        category: category,
        type: type,
        total: total
    });

    const saveButton = document.getElementById('saveRequirementBtn');

    if (saveButton) {
        saveButton.disabled = true;
        saveButton.dataset.originalText = saveButton.innerHTML;
        saveButton.innerHTML = '<i class="fa fa-spinner fa-spin"></i> Saving...';
    }

    fetch(form.action, {
        method: 'POST',
        body: formData,
        headers: {
            'X-Requested-With': 'XMLHttpRequest',
            'Accept': 'application/json'
        }
    })
    .then(function (response) {
        console.log('YEAR 3 save HTTP status:', response.status);

        return response.text().then(function (text) {
            let data;

            try {
                data = JSON.parse(text);
            } catch (error) {
                console.error('YEAR 3 invalid JSON response:', text);
                throw new Error('Server returned an invalid response.');
            }

            if (!response.ok) {
                throw new Error(
                    data.message || 'Failed to save Year 3 requirement.'
                );
            }

            return data;
        });
    })
    .then(function (data) {
        console.log('YEAR 3 save response:', data);

        if (!data.success) {
            throw new Error(
                data.message || 'Failed to save Year 3 requirement.'
            );
        }

        const returnedProjectId = parseInt(
            data.issp_record_id || data.id || projectId,
            10
        );

        if (returnedProjectId > 0) {
            localStorage.setItem(
                'edit_project_id',
                String(returnedProjectId)
            );

            localStorage.setItem(
                'issp_record_id',
                String(returnedProjectId)
            );

            console.log(
                'YEAR 3 synchronized project ID:',
                returnedProjectId
            );
        }

        localStorage.removeItem(YEAR3_SAVED_KEY);

        if (typeof updateStatusIndicators === 'function') {
            updateStatusIndicators();
        }

        showAlertModal(
            'Success',
            'Year 3 Resource Requirement saved successfully.'
        );

        const modalElement = document.getElementById('addRequirementModal');

        if (modalElement && typeof bootstrap !== 'undefined') {
            const modal = bootstrap.Modal.getInstance(modalElement);

            if (modal) {
                modal.hide();
            }
        }

        setTimeout(function () {
            window.location.reload();
        }, 500);
    })
    .catch(function (error) {
        console.error('YEAR 3 save error:', error);

        showAlertModal(
            'Error',
            error.message || 'Unable to save the Resource Requirement.'
        );
    })
    .finally(function () {
        if (saveButton) {
            saveButton.disabled = false;
            saveButton.innerHTML =
                saveButton.dataset.originalText ||
                'Save Resource Requirement';
        }
    });
};

/* =========================================================
   EDIT FORM
========================================================= */

const editForm = document.querySelector('#editRequirementModal form');

if (editForm) {
    editForm.addEventListener('submit', function () {
        const projectId = getYear3ProjectId();
        const projectField = document.getElementById('edit_issp_record_id');

        if (projectField && projectId > 0) {
            projectField.value = String(projectId);
        }

        const yearField = editForm.querySelector('input[name="year"]');

        if (yearField) {
            yearField.value = '3';
        }

        markYear3AsUnsaved();
    });
}

/* =========================================================
   EDIT SAVE BUTTON
========================================================= */

const editSaveButton = document.getElementById('editSaveButton');

if (editSaveButton) {
    editSaveButton.addEventListener('click', function () {
        if (!editForm) {
            return;
        }

        const projectId = getYear3ProjectId();
        const projectField = document.getElementById('edit_issp_record_id');

        if (projectField && projectId > 0) {
            projectField.value = String(projectId);
        }

        const yearField = editForm.querySelector('input[name="year"]');

        if (yearField) {
            yearField.value = '3';
        }

        markYear3AsUnsaved();

        console.log('YEAR 3 editing saved requirement:', {
            projectId: projectId,
            requirementId: document.getElementById('edit_id')?.value
        });

        editForm.submit();
    });
}

/* =========================================================
   CLEAR FIELDS
========================================================= */

window.clearForm = function () {
    showConfirmModal(
        'Clear all Year 3 Resource Requirements?',
        function () {
            YEAR3_REQUIREMENT_KEYS.forEach(function (key) {
                localStorage.removeItem(key);
            });

            localStorage.removeItem(YEAR3_SAVED_KEY);

            if (typeof updateStatusIndicators === 'function') {
                updateStatusIndicators();
            }

            showAlertModal(
                'Success',
                'Year 3 Resource Requirement fields cleared.'
            );
        }
    );
};

/* =========================================================
   SAVE CHANGES
========================================================= */

window.saveChanges = function (showAlert = true)
{
    if (!YEAR3_HAS_REQUIREMENTS) {

        localStorage.removeItem(YEAR3_SAVED_KEY);

        if (typeof updateStatusIndicators === 'function') {
            updateStatusIndicators();
        }

        if (
            showAlert &&
            typeof showAlertModal === 'function'
        ) {
            showAlertModal(
                'Warning',
                'Please enter at least one Year 3 Resource Requirement before saving.'
            );
        }

        return Promise.resolve(false);
    }

    /*
     * Actual Year 3 Resource Requirements
     * are already saved in the database.
     *
     * Save Changes only marks this section
     * as complete.
     */
    localStorage.setItem(
        YEAR3_SAVED_KEY,
        'true'
    );

    if (typeof updateStatusIndicators === 'function') {
        updateStatusIndicators();
    }

    if (
        showAlert &&
        typeof showAlertModal === 'function'
    ) {
        showAlertModal(
            'Success',
            'Changes saved successfully.'
        );
    }

    return Promise.resolve(true);
};

/* =========================================================
   INITIAL STATUS
========================================================= */

document.addEventListener('DOMContentLoaded', function () {

    /*
     * If this project has no Year 3 requirements,
     * remove any stale saved flag from localStorage.
     */
    if (!YEAR3_HAS_REQUIREMENTS) {
        localStorage.removeItem(YEAR3_SAVED_KEY);
    }

    if (typeof updateStatusIndicators === 'function') {
        updateStatusIndicators();
    }
});

/* =========================================================
   DELETE
========================================================= */

document.addEventListener('DOMContentLoaded', function () {
    document.querySelectorAll('.delete-btn').forEach(function (button) {
        button.addEventListener('click', function () {
            const id = this.dataset.id;

            if (!id) {
                return;
            }

            showConfirmModal(
                'Delete this Resource Requirement?',
                function () {
                    window.location.href =
                        "<?= site_url('employee/resource-requirements/delete/') ?>" +
                        id;
                }
            );
        });
    });
});
</script>

<?= $this->endSection() ?>