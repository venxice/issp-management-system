<?= $this->extend('frontend/layout/app') ?>
<?= $this->section('content') ?>

<style>
.section-card{
    background:#fff;
    border:1px solid #dde4ed;
    border-radius:10px;
    overflow:hidden;
    box-shadow:0 12px 26px rgba(15,23,42,.05);
    margin-bottom:20px;
}

.section-header{
    background:linear-gradient(180deg,#566d8b 0%,#4f6584 100%);
    color:#fff;
    padding:15px 20px;
}

.section-title{
    margin:0;
    font-size:20px;
    font-weight:bold;
}

.section-subtitle{
    margin:0;
    opacity:.9;
    font-size:13px;
}

.section-body{
    padding:20px;
}

.info-banner{
    background:#eef7fb;
    border-left:4px solid #4f6584;
    padding:12px 16px;
    border-radius:6px;
    margin-bottom:20px;
}

.card-body{
    background:#fff;
    padding:0;
}

.border.rounded{
    background:#fff;
}

.list-group-item{
    background:#fff;
}

.navigation-bar{
    display:flex;
    justify-content:center;
    align-items:center;
    gap:8px;
}

.navigation-bar.has-both{
    justify-content:space-between;
}

.navigation-bar.align-right{
    justify-content:flex-end;
}

.nav-btn{
    display:inline-flex;
    align-items:center;
    gap:6px;
    padding:6px 12px;
    border-radius:4px;
    text-decoration:none;
    font-weight:500;
    font-size:.8rem;
    transition:all .2s ease;
    border:1px solid transparent;
    white-space:nowrap;
}

.nav-btn-prev{
    background:white;
    color:var(--brand);
    border-color:#cbd5e1;
}

.nav-btn-prev:hover{
    background:#f1f5f9;
    border-color:var(--brand);
    color:var(--brand-dark);
}

.nav-btn-next{
    background:var(--brand);
    color:white;
    border-color:var(--brand);
}

.nav-btn-next:hover{
    background:var(--brand-dark);
    border-color:var(--brand-dark);
}

.nav-btn i{
    font-size:.8rem;
}

@media(max-width:768px){
    .navigation-bar{
        flex-direction:column;
        gap:8px;
    }

    .nav-btn{
        width:100%;
        justify-content:center;
    }
}

.footer-actions{
    display:flex;
    justify-content:space-between;
    align-items:center;
    gap:16px;
    padding:16px;
    background:#f8fafc;
    border-radius:8px;
    border:1px solid #e2e8f0;
}

.action-buttons{
    display:flex;
    gap:8px;
}

.action-btn{
    display:inline-flex;
    align-items:center;
    gap:6px;
    padding:8px 16px;
    border-radius:6px;
    font-weight:500;
    font-size:.875rem;
    cursor:pointer;
    transition:all .2s ease;
    border:1px solid transparent;
}

.action-btn i{
    font-size:.875rem;
}

.action-btn-save{
    background:var(--brand);
    color:white;
    border-color:var(--brand);
}

.action-btn-save:hover{
    background:var(--brand-dark);
    border-color:var(--brand-dark);
    transform:translateY(-1px);
    box-shadow:0 2px 8px rgba(79,101,132,.2);
}

.action-btn-clear{
    background:white;
    color:#64748b;
    border-color:#cbd5e1;
}

.action-btn-clear:hover{
    background:#f1f5f9;
    border-color:#94a3b8;
    color:#475569;
    transform:translateY(-1px);
}

.navigation-buttons{
    display:flex;
    gap:8px;
}

@media(max-width:768px){
    .footer-actions{
        flex-direction:column;
        gap:12px;
    }

    .action-buttons{
        width:100%;
        justify-content:center;
    }

    .action-btn{
        flex:1;
        justify-content:center;
    }

    .navigation-buttons{
        width:100%;
        justify-content:center;
    }

    .nav-btn{
        width:100%;
        justify-content:center;
    }
}
</style>


<div class="container-fluid">

    <form id="mainForm">

        <!-- YEAR 1 HEADER -->

        <div class="row mb-3">

            <div class="col-12">

                <div class="section-card">

                    <div class="section-header">

                        <h3 class="section-title">
                            Year 1 Resource Requirements

                            <i
                                class="fas fa-question-circle text-white"
                                data-bs-toggle="tooltip"
                                data-bs-placement="right"
                                title="Enter all ICT resource requirements for Year 1.">
                            </i>
                        </h3>

                    </div>

                    <div class="section-body">
                    </div>

                </div>

            </div>

        </div>


        <!-- RESOURCE REQUIREMENTS -->

        <?php foreach (($categories ?? []) as $category): ?>

            <div class="section-card">

                <div class="section-header">

                    <h5 class="section-title">
                        <?= esc($category) ?>
                    </h5>

                </div>

                <div class="card-body">

                    <?php foreach (($types ?? []) as $type): ?>

                        <?php
                        $subtotal = 0;
                        ?>

                        <div class="border rounded mb-4">

                            <!-- TYPE HEADER -->

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


                            <!-- DATABASE REQUIREMENTS -->

                            <div class="list-group list-group-flush">

                                <?php foreach (($requirements ?? []) as $row): ?>

                                    <?php

                                    $rowCategory = trim(
                                        (string)($row['strategic_category'] ?? '')
                                    );

                                    $rowType = trim(
                                        (string)($row['expenditure_type'] ?? '')
                                    );

                                    $currentCategory = trim(
                                        (string)$category
                                    );

                                    $currentType = trim(
                                        (string)$type
                                    );

                                    if(
                                        $rowCategory === $currentCategory &&
                                        $rowType === $currentType
                                    ):

                                        $subtotal += (float)(
                                            $row['total_cost'] ?? 0
                                        );

                                    ?>

                                        <div class="list-group-item">

                                            <div class="d-flex justify-content-between align-items-center">

                                                <div>

                                                    <h6 class="mb-1">
                                                        <?= esc(
                                                            $row['item'] ?? ''
                                                        ) ?>
                                                    </h6>

                                                    <small class="text-muted">

                                                        <?= esc(
                                                            $row['office'] ?? ''
                                                        ) ?>

                                                        <?php if(
                                                            !empty(
                                                                $row['object_of_expenditure']
                                                            )
                                                        ): ?>

                                                            •
                                                            <?= esc(
                                                                $row['object_of_expenditure']
                                                            ) ?>

                                                        <?php endif; ?>


                                                        <?php if(
                                                            !empty(
                                                                $row['uacs_code']
                                                            )
                                                        ): ?>

                                                            •
                                                            <?= esc(
                                                                $row['uacs_code']
                                                            ) ?>

                                                        <?php endif; ?>


                                                        <?php if(
                                                            !empty(
                                                                $row['fund_source']
                                                            )
                                                        ): ?>

                                                            •
                                                            <?= esc(
                                                                $row['fund_source']
                                                            ) ?>

                                                        <?php endif; ?>

                                                    </small>

                                                </div>


                                                <div class="text-end">

                                                    <strong>
                                                        ₱<?= number_format(
                                                            (float)(
                                                                $row['total_cost'] ?? 0
                                                            ),
                                                            2
                                                        ) ?>
                                                    </strong>

                                                    <br>

                                                    <!-- EDIT -->
    <button
        type="button"
        class="btn btn-sm btn-outline-primary edit-btn"
        data-id="<?= esc($row['id'] ?? '') ?>"
        data-item="<?= esc($row['item'] ?? '') ?>"
        data-office="<?= esc($row['office'] ?? '') ?>"
        data-uacs="<?= esc($row['uacs_code'] ?? '') ?>"
        data-fund="<?= esc($row['fund_source'] ?? '') ?>"
        data-unit="<?= esc($row['unit_cost'] ?? '') ?>"
        data-target="<?= esc($row['physical_target'] ?? '') ?>"
        data-total="<?= esc($row['total_cost'] ?? '') ?>"
        data-bs-toggle="modal"
        data-bs-target="#editRequirementModal"
        title="Edit"
    >
        <i class="fa fa-pencil-alt"></i>
    </button>

    <!-- DELETE -->
    <button
        type="button"
        class="btn btn-sm btn-outline-danger delete-btn"
        data-id="<?= esc($row['id'] ?? '') ?>"
        title="Delete"
    >
        <i class="fa fa-trash"></i>
    </button>

</div>
                                            </div>

                                        </div>

                                    <?php endif; ?>

                                <?php endforeach; ?>

                            </div>


                            <!-- SUBTOTAL -->

                            <div class="border-top p-3">

                                <div class="d-flex justify-content-between">

                                    <strong>
                                        Subtotal
                                    </strong>

                                    <strong class="subtotal-amount">

                                        ₱<?= number_format(
                                            (float)$subtotal,
                                            2
                                        ) ?>

                                    </strong>

                                </div>

                            </div>

                        </div>

                    <?php endforeach; ?>

                </div>

            </div>

        <?php endforeach; ?>


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

                            <span>
                                Save Changes
                            </span>

                        </button>


                        <button
                            type="button"
                            class="action-btn action-btn-clear"
                            onclick="window.clearForm()">

                            <i class="fa-solid fa-eraser"></i>

                            <span>
                                Clear Fields
                            </span>

                        </button>

                    </div>


                    <div class="navigation-buttons">

                        <button
                            type="button"
                            class="nav-btn nav-btn-next"
                            onclick="window.location.href='<?= site_url('employee/resource-requirements/year2-requirements/' . (int)$editId) ?>'">

                            <span>
                                Year 2 Requirements
                            </span>

                            <i class="fa-solid fa-arrow-right"></i>

                        </button>

                    </div>

                </div>

            </div>

        </div>

    </form>


    <!-- ADD RESOURCE REQUIREMENT -->

    <div
        class="modal fade"
        id="addRequirementModal"
        tabindex="-1"
        aria-hidden="true">

        <div class="modal-dialog modal-xl">

            <div class="modal-content">

                <form
                    action="<?= base_url('employee/resource-requirements/store') ?>"
                    method="POST"
                    id="addRequirementForm">

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
                        value="1">


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


                            <div class="col-md-6 mb-3">

                                <label class="form-label">
                                    Office / Unit
                                </label>

                                <select
                                    name="office"
                                    id="office"
                                    class="form-select"
                                    required>

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


                            <div class="col-md-6 mb-3">

                                <label class="form-label">
                                    UACS Code
                                </label>

                                <select
                                    name="uacs_code"
                                    id="uacs_code"
                                    class="form-select"
                                    required>

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


                            <div class="col-md-6 mb-3">

                                <label class="form-label">
                                    Fund Source
                                </label>

                                <select
                                    id="fund"
                                    name="fund_source"
                                    class="form-select"
                                    required>

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


                            <div class="col-md-4 mb-3">

                                <label class="form-label">
                                    Unit Cost
                                </label>

                                <input
                                    type="number"
                                    step="0.01"
                                    min="0"
                                    id="unit_cost"
                                    name="unit_cost"
                                    class="form-control"
                                    required>

                            </div>


                            <div class="col-md-4 mb-3">

                                <label class="form-label">
                                    Physical Target
                                </label>

                                <input
                                    type="number"
                                    min="1"
                                    id="physical_target"
                                    name="physical_target"
                                    class="form-control"
                                    required>

                            </div>


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
                            class="btn btn-primary"
                            id="saveRequirementBtn">

                            Save Resource Requirement

                        </button>

                    </div>

                </form>

            </div>

        </div>

    </div>


    <!-- EDIT RESOURCE REQUIREMENT -->

    <div
        class="modal fade"
        id="editRequirementModal"
        tabindex="-1"
        aria-hidden="true">

        <div class="modal-dialog modal-xl">

            <div class="modal-content">

                <form
                    action="<?= base_url('employee/resource-requirements/update') ?>"
                    method="POST"
                    id="editRequirementForm">

                    <?= csrf_field() ?>

                    <input
                        type="hidden"
                        name="id"
                        id="edit_id">


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


                            <div class="col-md-6 mb-3">

                                <label class="form-label">
                                    Office / Unit
                                </label>

                                <select
                                    id="edit_office"
                                    name="office"
                                    class="form-select"
                                    required>

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


                            <div class="col-md-6 mb-3">

                                <label class="form-label">
                                    UACS Code
                                </label>

                                <select
                                    id="edit_uacs_code"
                                    name="uacs_code"
                                    class="form-select"
                                    required>

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


                            <div class="col-md-6 mb-3">

                                <label class="form-label">
                                    Fund Source
                                </label>

                                <select
                                    id="edit_fund"
                                    name="fund_source"
                                    class="form-select"
                                    required>

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


                            <div class="col-md-4 mb-3">

                                <label class="form-label">
                                    Unit Cost
                                </label>

                                <input
                                    type="number"
                                    step="0.01"
                                    min="0"
                                    id="edit_unit"
                                    name="unit_cost"
                                    class="form-control"
                                    required>

                            </div>


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
                            type="submit"
                            class="action-btn action-btn-save">

                            Save Changes

                        </button>

                    </div>

                </form>

            </div>

        </div>

    </div>

</div>


<script>
console.log("YEAR 1 editId from PHP:", <?= (int) ($editId ?? 0) ?>);

/*
|--------------------------------------------------------------------------
| YEAR 1 RESOURCE REQUIREMENTS
|--------------------------------------------------------------------------
*/

const isEditMode =
    <?= !empty($editId) ? 'true' : 'false' ?>;

const savedRequirements =
    <?= json_encode(
        $requirements ?? [],
        JSON_UNESCAPED_UNICODE |
        JSON_UNESCAPED_SLASHES
    ) ?>;


/*
|--------------------------------------------------------------------------
| DATABASE STATUS
|--------------------------------------------------------------------------
|
| This is the shared status object used by the sidebar.
|
| Year 1 = index 1
|
*/

window.resourceRequirementDbStatus =
    window.resourceRequirementDbStatus || {};


/*
|--------------------------------------------------------------------------
| SET DATABASE STATUS
|--------------------------------------------------------------------------
*/

window.setResourceRequirementDbStatus =
    function(year, hasRecords)
    {
        year = parseInt(year, 10);

        if (![1, 2, 3].includes(year)) {
            return;
        }

        window.resourceRequirementDbStatus[year] =
            Boolean(hasRecords);

        if (
            typeof window.updateResourceRequirementStatusIndicators ===
            "function"
        ) {
            window.updateResourceRequirementStatusIndicators();
        }
    };


/*
|--------------------------------------------------------------------------
| GET DATABASE STATUS
|--------------------------------------------------------------------------
*/

window.hasResourceRequirementDbStatus =
    function(year)
    {
        year = parseInt(year, 10);

        return (
            window.resourceRequirementDbStatus[year] === true
        );
    };


/*
|--------------------------------------------------------------------------
| INITIAL YEAR 1 DATABASE STATUS
|--------------------------------------------------------------------------
*/

window.setResourceRequirementDbStatus(
    1,
    <?= !empty($requirements) ? 'true' : 'false' ?>
);


console.log(
    "Year 1 Resource Requirements loaded."
);

console.log(
    "Database Requirements:",
    savedRequirements
);

console.log(
    "Year 1 DB Status:",
    window.hasResourceRequirementDbStatus(1)
);


/*
|--------------------------------------------------------------------------
| DOM READY
|--------------------------------------------------------------------------
*/

document.addEventListener(
    "DOMContentLoaded",
    function()
    {

        /*
         * Bootstrap tooltips
         */

        const tooltipTriggerList =
            document.querySelectorAll(
                '[data-bs-toggle="tooltip"]'
            );

        tooltipTriggerList.forEach(
            function(tooltipTriggerEl)
            {

                new bootstrap.Tooltip(
                    tooltipTriggerEl
                );

            }
        );


        /*
         * Sidebar status
         */

        if (
            typeof updateResourceRequirementStatusIndicators ===
            "function"
        ) {

            updateResourceRequirementStatusIndicators();

        }


        if (
            typeof updateStatusIndicators ===
            "function"
        ) {

            updateStatusIndicators();

        }

    }
);


/*
|--------------------------------------------------------------------------
| CLEAR FORM
|--------------------------------------------------------------------------
|
| IMPORTANT:
| This does NOT delete database records.
|
*/

window.clearForm = function()
{

    showConfirmModal(
        "Clear all fields?",
        function()
        {

            const mainForm =
                document.getElementById(
                    "mainForm"
                );

            if (mainForm) {
                mainForm.reset();
            }


            /*
             * Clear only local UI status.
             */

            localStorage.removeItem(
                "year1-office-productivity-form"
            );

            localStorage.removeItem(
                "year1-internal-ict-projects-form"
            );

            localStorage.removeItem(
                "year1-cross-agency-form"
            );

            localStorage.removeItem(
                "year1-continuing-costs-form"
            );

            localStorage.removeItem(
                "year1-requirements-saved"
            );


            if (
    typeof updateResourceRequirementStatusIndicators ===
    "function"
) {

    updateResourceRequirementStatusIndicators();

}

if (
    typeof updateStatusIndicators ===
    "function"
) {

    updateStatusIndicators();

}


            showAlertModal(
                "Success",
                "Form cleared. Existing saved Resource Requirements were not deleted."
            );

        }
    );

};


/*
|--------------------------------------------------------------------------
| COMPUTE ADD TOTAL
|--------------------------------------------------------------------------
*/

window.computeAdd = function()
{

    const unit =
        document.getElementById(
            "unit_cost"
        );

    const target =
        document.getElementById(
            "physical_target"
        );

    const totalDisplay =
        document.getElementById(
            "line_total_display"
        );

    const totalHidden =
        document.getElementById(
            "line_total"
        );


    if(
        !unit ||
        !target ||
        !totalDisplay ||
        !totalHidden
    ) {
        return;
    }


    const unitValue =
        parseFloat(unit.value) || 0;

    const targetValue =
        parseFloat(target.value) || 0;

    const amount =
        unitValue * targetValue;


    totalDisplay.value =
        "₱" +
        amount.toLocaleString(
            "en-PH",
            {
                minimumFractionDigits:2,
                maximumFractionDigits:2
            }
        );

    totalHidden.value =
        amount.toFixed(2);

};


/*
|--------------------------------------------------------------------------
| COMPUTE EDIT TOTAL
|--------------------------------------------------------------------------
*/

window.computeEdit = function()
{

    const unit =
        document.getElementById(
            "edit_unit"
        );

    const target =
        document.getElementById(
            "edit_target"
        );

    const display =
        document.getElementById(
            "edit_total"
        );

    const hidden =
        document.getElementById(
            "edit_total_hidden"
        );


    if(
        !unit ||
        !target ||
        !display ||
        !hidden
    ) {
        return;
    }


    const unitValue =
        parseFloat(unit.value) || 0;

    const targetValue =
        parseFloat(target.value) || 0;

    const amount =
        unitValue * targetValue;


    display.value =
        "₱" +
        amount.toLocaleString(
            "en-PH",
            {
                minimumFractionDigits:2,
                maximumFractionDigits:2
            }
        );

    hidden.value =
        amount.toFixed(2);

};


/*
|--------------------------------------------------------------------------
| ADD MODAL
|--------------------------------------------------------------------------
*/

document
    .querySelectorAll(".add-line-btn")
    .forEach(
        function(button)
        {

            button.addEventListener(
                "click",
                function()
                {

                    const category =
                        this.dataset.category || "";

                    const type =
                        this.dataset.type || "";


                    document.getElementById(
                        "strategic_category"
                    ).value = category;

                    document.getElementById(
                        "expenditure_type"
                    ).value = type;


                    /*
                     * Reset ONLY the Add modal.
                     */

                    document.getElementById(
                        "item"
                    ).value = "";

                    document.getElementById(
                        "office"
                    ).value = "";

                    document.getElementById(
                        "uacs_code"
                    ).value = "";

                    document.getElementById(
                        "fund"
                    ).value = "";

                    document.getElementById(
                        "unit_cost"
                    ).value = "";

                    document.getElementById(
                        "physical_target"
                    ).value = "";

                    document.getElementById(
                        "line_total_display"
                    ).value = "₱0.00";

                    document.getElementById(
                        "line_total"
                    ).value = "0.00";

                }
            );

        }
    );


/*
|--------------------------------------------------------------------------
| ADD TOTAL LISTENERS
|--------------------------------------------------------------------------
*/

document.addEventListener(
    "DOMContentLoaded",
    function()
    {

        const unit =
            document.getElementById(
                "unit_cost"
            );

        const target =
            document.getElementById(
                "physical_target"
            );


        if(unit) {

            unit.addEventListener(
                "input",
                window.computeAdd
            );

        }

        if(target) {

            target.addEventListener(
                "input",
                window.computeAdd
            );

        }

    }
);


/*
|--------------------------------------------------------------------------
| EDIT BUTTONS
|--------------------------------------------------------------------------
*/

document
    .querySelectorAll(".edit-btn")
    .forEach(
        function(button)
        {

            button.addEventListener(
                "click",
                function()
                {

                    document.getElementById(
                        "edit_id"
                    ).value =
                        this.dataset.id || "";


                    document.getElementById(
                        "edit_item"
                    ).value =
                        this.dataset.item || "";


                    document.getElementById(
                        "edit_office"
                    ).value =
                        this.dataset.office || "";


                    document.getElementById(
                        "edit_uacs_code"
                    ).value =
                        this.dataset.uacs || "";


                    document.getElementById(
                        "edit_fund"
                    ).value =
                        this.dataset.fund || "";


                    document.getElementById(
                        "edit_unit"
                    ).value =
                        this.dataset.unit || "";


                    document.getElementById(
                        "edit_target"
                    ).value =
                        this.dataset.target || "";


                    window.computeEdit();

                }
            );

        }
    );


/*
|--------------------------------------------------------------------------
| EDIT TOTAL LISTENERS
|--------------------------------------------------------------------------
*/

document.addEventListener(
    "DOMContentLoaded",
    function()
    {

        const unit =
            document.getElementById(
                "edit_unit"
            );

        const target =
            document.getElementById(
                "edit_target"
            );


        if(unit) {

            unit.addEventListener(
                "input",
                window.computeEdit
            );

        }

        if(target) {

            target.addEventListener(
                "input",
                window.computeEdit
            );

        }

    }
);


/*
|--------------------------------------------------------------------------
| MAIN SAVE CHANGES
|--------------------------------------------------------------------------
|
| Resource Requirement rows are already saved in DB
| through saveRequirement() and the Edit form.
|
*/

window.saveChanges = function(
    showAlert = true
)
{

    localStorage.setItem(
        "year1-requirements-saved",
        "true"
    );


   if (
    typeof updateResourceRequirementStatusIndicators ===
    "function"
) {

    updateResourceRequirementStatusIndicators();

}

if (
    typeof updateStatusIndicators ===
    "function"
) {

    updateStatusIndicators();

}


    if(
        showAlert &&
        typeof showAlertModal ===
        "function"
    ) {

        showAlertModal(
            "Success",
            "Year 1 Resource Requirements saved successfully."
        );

    }


    return Promise.resolve(true);

};


/*
|--------------------------------------------------------------------------
| SAVE RESOURCE REQUIREMENT
|--------------------------------------------------------------------------
*/

window.saveRequirement = function()
{
    const form =
        document.getElementById("addRequirementForm");

    const saveButton =
        document.getElementById("saveRequirementBtn");

    if (!form || !saveButton) {
        console.error(
            "Add Resource Requirement form not found."
        );
        return;
    }

    if (!form.checkValidity()) {
        form.reportValidity();
        return;
    }

    window.computeAdd();

    const total =
        parseFloat(
            document.getElementById("line_total").value
        ) || 0;

    if (total <= 0) {
        showAlertModal(
            "Error",
            "Please enter a valid Unit Cost and Physical Target."
        );
        return;
    }

    const formData = new FormData(form);

    formData.set(
    "issp_record_id",
    "<?= (int) ($editId ?? 0) ?>"
);

    formData.set(
        "year",
        "1"
    );

    formData.set(
        "strategic_category",
        document.getElementById(
            "strategic_category"
        ).value
    );

    formData.set(
        "expenditure_type",
        document.getElementById(
            "expenditure_type"
        ).value
    );

    console.log(
        "Saving Year 1 requirement:",
        Object.fromEntries(formData)
    );

    saveButton.disabled = true;

    saveButton.innerHTML =
        '<i class="fas fa-spinner fa-spin"></i> Saving...';

   fetch(
    form.action,
    {
        method: "POST",
        body: formData,
        headers: {
            "X-Requested-With": "XMLHttpRequest",
            "Accept": "application/json"
        }
    }
)
.then(async function(response)
{
    const responseText = await response.text();

    console.log("HTTP STATUS:", response.status);
    console.log("RAW SERVER RESPONSE:", responseText);

    let data;

    try {
        data = JSON.parse(responseText);
    } catch (error) {
        throw new Error(
            "Server did not return JSON. HTTP " +
            response.status +
            ". Check the Console for the RAW SERVER RESPONSE."
        );
    }

    if (!response.ok) {
        throw new Error(
            data.message ||
            "Server returned HTTP " +
            response.status
        );
    }

    return data;
})
    .then(function(data)
    {
        console.log(
            "Save response:",
            data
        );

        if (!data.success) {

            throw new Error(
                data.message ||
                "Unable to save Resource Requirement."
            );
        }

        /*
         * DB SAVE SUCCESS
         */

        localStorage.removeItem(
            "year1-requirements-saved"
        );

        showAlertModal(
            "Success",
            "Resource Requirement saved successfully."
        );

        /*
         * Reload page so the newly inserted
         * database row appears in the list.
         */

        setTimeout(function()
        {
            window.location.reload();

        }, 500);
    })
    .catch(function(error)
    {
        console.error(
            "Save Resource Requirement Error:",
            error
        );

        showAlertModal(
            "Error",
            error.message ||
            "Unable to save the Resource Requirement."
        );
    })
    .finally(function()
    {
        saveButton.disabled = false;

        saveButton.innerHTML =
            "Save Resource Requirement";
    });
};

/*
|--------------------------------------------------------------------------
| SAVE BUTTON EVENT
|--------------------------------------------------------------------------
*/

document.addEventListener(
    "DOMContentLoaded",
    function()
    {

        const saveButton =
            document.getElementById(
                "saveRequirementBtn"
            );


        if(saveButton) {

            saveButton.addEventListener(
                "click",
                window.saveRequirement
            );

        }

    }
);

document.addEventListener(
    "DOMContentLoaded",
    function()
    {
        document
            .querySelectorAll(".delete-btn")
            .forEach(
                function(button)
                {
                    button.addEventListener(
                        "click",
                        function()
                        {
                            const id =
                                this.dataset.id;

                            if (!id) {
                                return;
                            }

                            showConfirmModal(
                                "Delete this Resource Requirement?",
                                function()
                                {
                                    window.location.href =
                                        "<?= site_url('employee/resource-requirements/delete/') ?>" +
                                        id;
                                }
                            );
                        }
                    );
                }
            );
    }
);

</script>

<?= $this->endSection() ?>