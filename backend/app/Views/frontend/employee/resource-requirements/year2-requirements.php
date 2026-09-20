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

    <!-- =====================================================
         PAGE HEADER
    ====================================================== -->

    <div class="row mb-3">

        <div class="col-12">

            <div class="section-card">

                <div class="section-header">

                    <h3 class="section-title">

                        Year 2 Resource Requirements

                        <i
                            class="fas fa-question-circle text-white"
                            data-bs-toggle="tooltip"
                            data-bs-placement="right"
                            title="Enter all ICT resource requirements for Year 2.">
                        </i>

                    </h3>

                </div>

            </div>

        </div>

    </div>


    <!-- =====================================================
         RESOURCE REQUIREMENTS
    ====================================================== -->

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
                                    data-type="<?= esc($type) ?>"
                                >
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

                                if (
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


                                                    <?php if (
                                                        !empty(
                                                            $row['object_of_expenditure'] ?? ''
                                                        )
                                                    ): ?>

                                                        •
                                                        <?= esc(
                                                            $row['object_of_expenditure']
                                                        ) ?>

                                                    <?php endif; ?>


                                                    <?php if (
                                                        !empty(
                                                            $row['uacs_code'] ?? ''
                                                        )
                                                    ): ?>

                                                        •
                                                        <?= esc(
                                                            $row['uacs_code']
                                                        ) ?>

                                                    <?php endif; ?>


                                                    <?php if (
                                                        !empty(
                                                            $row['fund_source'] ?? ''
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
                                                    class="btn btn-sm btn-outline-primary mt-2 edit-btn"

                                                    data-id="<?= esc(
                                                        $row['id'] ?? ''
                                                    ) ?>"

                                                    data-item="<?= esc(
                                                        $row['item'] ?? ''
                                                    ) ?>"

                                                    data-office="<?= esc(
                                                        $row['office'] ?? ''
                                                    ) ?>"

                                                    data-uacs="<?= esc(
                                                        $row['uacs_code'] ?? ''
                                                    ) ?>"

                                                    data-fund="<?= esc(
                                                        $row['fund_source'] ?? ''
                                                    ) ?>"

                                                    data-unit="<?= esc(
                                                        $row['unit_cost'] ?? 0
                                                    ) ?>"

                                                    data-target="<?= esc(
                                                        $row['physical_target'] ?? 0
                                                    ) ?>"

                                                    data-total="<?= esc(
                                                        $row['total_cost'] ?? 0
                                                    ) ?>"

                                                    data-category="<?= esc(
                                                        $row['strategic_category'] ?? ''
                                                    ) ?>"

                                                    data-type="<?= esc(
                                                        $row['expenditure_type'] ?? ''
                                                    ) ?>"

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
                                                    data-id="<?= esc(
                                                        $row['id'] ?? ''
                                                    ) ?>"
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


                        <!-- REQUIREMENTS CONTAINER -->

                        <div
                            class="list-group list-group-flush requirements-container"
                            data-category="<?= esc($category) ?>"
                            data-type="<?= esc($type) ?>"
                        >
                        </div>


                        <!-- SUBTOTAL -->

                        <div class="border-top p-3">

                            <div class="d-flex justify-content-between">

                                <strong>
                                    Subtotal
                                </strong>


                                <strong
                                    class="subtotal-amount"
                                    data-db-subtotal="<?= (float)$subtotal ?>"
                                >

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


    <!-- =====================================================
         FOOTER ACTIONS
    ====================================================== -->

    <div class="row mb-4">

        <div class="col-12">

            <div class="footer-actions">

                <div class="action-buttons">

                    <button
                        type="button"
                        class="action-btn action-btn-save"
                        onclick="window.saveChanges()"
                    >

                        <i class="fa-solid fa-save"></i>

                        <span>
                            Save Changes
                        </span>

                    </button>


                    <button
                        type="button"
                        class="action-btn action-btn-clear"
                        onclick="window.clearForm()"
                    >

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
                        onclick="window.location.href='<?= site_url('employee/resource-requirements/year3-requirements/' . (int)($editId ?? 0)) ?>'"
                    >

                        <span>
                            Year 3 Requirements
                        </span>

                        <i class="fa-solid fa-arrow-right"></i>

                    </button>

                </div>

            </div>

        </div>

    </div>

</div>


<!-- =========================================================
     ADD RESOURCE REQUIREMENT MODAL
========================================================= -->

<div
    class="modal fade"
    id="addRequirementModal"
    tabindex="-1"
    aria-hidden="true"
>

    <div class="modal-dialog modal-xl">

        <div class="modal-content">

            <form
                action="<?= base_url('employee/resource-requirements/store') ?>"
                method="POST"
                id="addRequirementForm"
            >

                <?= csrf_field() ?>


                <!--
                    IMPORTANT:
                    This value is overwritten by JavaScript
                    with the active ISSP project ID.
                -->

                <input
                    type="hidden"
                    name="issp_record_id"
                    id="add_issp_record_id"
                    value="<?= (int)($editId ?? 0) ?>"
                >


                <input
                    type="hidden"
                    name="strategic_category"
                    id="strategic_category"
                >


                <input
                    type="hidden"
                    name="expenditure_type"
                    id="expenditure_type"
                >


                <input
                    type="hidden"
                    name="year"
                    value="2"
                >


                <div class="modal-header">

                    <h5 class="modal-title">
                        Add Resource Requirement
                    </h5>


                    <button
                        type="button"
                        class="btn-close"
                        data-bs-dismiss="modal"
                    ></button>

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
                                name="item"
                                id="item"
                                class="form-control"
                                placeholder="Describe the item or service being procured"
                                required
                            >

                        </div>


                        <!-- OFFICE -->

                        <div class="col-md-6 mb-3">

                            <label class="form-label">
                                Office / Unit
                            </label>

                            <select
                                name="office"
                                id="office"
                                class="form-select"
                                required
                            >

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
                                class="form-select"
                                required
                            >

                                <option value="">
                                    Select UACS code
                                </option>

                                <option value="5060403006 Communications Networks">
                                    5060403006 - Communications Networks
                                </option>

                                <option value="5060405003 Information and Communication Technology Equipment">
                                    5060405003 - Information and Communication Technology Equipment
                                </option>

                                <option value="5060405007 Communications Equipment">
                                    5060405007 - Communications Equipment
                                </option>

                                <option value="5060405012 Printing Equipment">
                                    5060405012 - Printing Equipment
                                </option>

                                <option value="5060405015 ICT Software">
                                    5060405015 - ICT Software
                                </option>

                            </select>

                        </div>


                        <!-- FUND SOURCE -->

                        <div class="col-md-6 mb-3">

                            <label class="form-label">
                                Fund Source
                            </label>

                            <select
                                name="fund_source"
                                id="fund_source"
                                class="form-select"
                                required
                            >

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
                                min="0"
                                id="unit_cost"
                                name="unit_cost"
                                class="form-control"
                                required
                            >

                        </div>


                        <!-- PHYSICAL TARGET -->

                        <div class="col-md-4 mb-3">

                            <label class="form-label">
                                Physical Target
                            </label>

                            <input
                                type="number"
                                min="0"
                                id="physical_target"
                                name="physical_target"
                                class="form-control"
                                required
                            >

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
                                readonly
                            >


                            <input
                                type="hidden"
                                id="line_total"
                                name="total_cost"
                                value="0.00"
                            >

                        </div>

                    </div>

                </div>


                <div class="modal-footer">

                    <button
                        type="button"
                        class="btn btn-secondary"
                        data-bs-dismiss="modal"
                    >
                        Cancel
                    </button>


                    <button
                        type="submit"
                        class="btn btn-primary"
                        id="saveRequirementBtn"
                    >
                        Save Resource Requirement
                    </button>

                </div>

            </form>

        </div>

    </div>

</div>


<!-- =========================================================
     EDIT RESOURCE REQUIREMENT MODAL
========================================================= -->

<div
    class="modal fade"
    id="editRequirementModal"
    tabindex="-1"
    aria-hidden="true"
>

    <div class="modal-dialog modal-xl">

        <div class="modal-content">

            <form
                action="<?= base_url('employee/resource-requirements/update') ?>"
                method="POST"
                id="editRequirementForm"
            >

                <?= csrf_field() ?>


                <input
                    type="hidden"
                    name="issp_record_id"
                    id="edit_issp_record_id"
                    value="<?= (int)($editId ?? 0) ?>"
                >


                <input
                    type="hidden"
                    name="id"
                    id="edit_id"
                >


                <input
                    type="hidden"
                    name="year"
                    value="2"
                >


                <input
                    type="hidden"
                    name="strategic_category"
                    id="edit_strategic_category"
                >


                <input
                    type="hidden"
                    name="expenditure_type"
                    id="edit_expenditure_type"
                >


                <div class="modal-header">

                    <h5 class="modal-title">
                        Edit Resource Requirement
                    </h5>


                    <button
                        type="button"
                        class="btn-close"
                        data-bs-dismiss="modal"
                    ></button>

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
                                name="item"
                                id="edit_item"
                                class="form-control"
                                placeholder="Describe the item or service being procured"
                                required
                            >

                        </div>


                        <!-- OFFICE -->

                        <div class="col-md-6 mb-3">

                            <label class="form-label">
                                Office / Unit
                            </label>

                            <select
                                name="office"
                                id="edit_office"
                                class="form-select"
                                required
                            >

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
                                id="edit_uacs"
                                class="form-select"
                                required
                            >

                                <option value="">
                                    Select UACS code
                                </option>

                                <option value="5060403006 Communications Networks">
                                    5060403006 - Communications Networks
                                </option>

                                <option value="5060405003 Information and Communication Technology Equipment">
                                    5060405003 - Information and Communication Technology Equipment
                                </option>

                                <option value="5060405007 Communications Equipment">
                                    5060405007 - Communications Equipment
                                </option>

                                <option value="5060405012 Printing Equipment">
                                    5060405012 - Printing Equipment
                                </option>

                                <option value="5060405015 ICT Software">
                                    5060405015 - ICT Software
                                </option>

                            </select>

                        </div>


                        <!-- FUND SOURCE -->

                        <div class="col-md-6 mb-3">

                            <label class="form-label">
                                Fund Source
                            </label>

                            <select
                                name="fund_source"
                                id="edit_fund"
                                class="form-select"
                                required
                            >

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
                                min="0"
                                id="edit_unit"
                                name="unit_cost"
                                class="form-control"
                                required
                            >

                        </div>


                        <!-- PHYSICAL TARGET -->

                        <div class="col-md-4 mb-3">

                            <label class="form-label">
                                Physical Target
                            </label>

                            <input
                                type="number"
                                min="0"
                                id="edit_target"
                                name="physical_target"
                                class="form-control"
                                required
                            >

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
                                readonly
                            >


                            <input
                                type="hidden"
                                id="edit_total_hidden"
                                name="total_cost"
                                value="0.00"
                            >

                        </div>

                    </div>

                </div>


                <div class="modal-footer">

                    <button
                        type="button"
                        class="btn btn-secondary"
                        data-bs-dismiss="modal"
                    >
                        Cancel
                    </button>


                    <button
                        type="submit"
                        class="btn btn-primary"
                    >
                        Save Changes
                    </button>

                </div>

            </form>

        </div>

    </div>

</div>


<script>

/* =========================================================
   YEAR 2 DEBUG / PROJECT ID
========================================================= */

const phpProjectId =
    "<?= (int)($editId ?? 0) ?>";

const savedRequirements =
    <?= json_encode(
        $requirements ?? [],
        JSON_UNESCAPED_UNICODE |
        JSON_UNESCAPED_SLASHES
    ) ?>;


console.log(
    "YEAR 2 editId from PHP:",
    phpProjectId
);

console.log(
    "Year 2 Database Requirements:",
    savedRequirements
);


/* =========================================================
   GET ACTIVE ISSP PROJECT ID
========================================================= */

function getYear2ProjectId()
{
    const localStorageProjectId =
        localStorage.getItem(
            "edit_project_id"
        );


    const localStorageIsspRecordId =
        localStorage.getItem(
            "issp_record_id"
        );


    let projectId = "";


    if (
        parseInt(
            localStorageProjectId,
            10
        ) > 0
    ) {

        projectId =
            localStorageProjectId;

    } else if (
        parseInt(
            localStorageIsspRecordId,
            10
        ) > 0
    ) {

        projectId =
            localStorageIsspRecordId;

    } else if (
        parseInt(
            phpProjectId,
            10
        ) > 0
    ) {

        projectId =
            phpProjectId;

    }


    console.log(
        "YEAR 2 project ID sources:",
        {
            localStorage_edit_project_id:
                localStorageProjectId,

            localStorage_issp_record_id:
                localStorageIsspRecordId,

            php_editId:
                phpProjectId,

            finalProjectId:
                projectId
        }
    );


    return projectId;
}


/* =========================================================
   COMPUTE ADD TOTAL
========================================================= */

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


function computeAdd()
{
    if (
        !unit ||
        !target ||
        !totalDisplay ||
        !totalHidden
    ) {
        return;
    }


    const unitValue =
        parseFloat(
            unit.value
        ) || 0;


    const targetValue =
        parseFloat(
            target.value
        ) || 0;


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
}


if (unit) {

    unit.addEventListener(
        "input",
        computeAdd
    );

}


if (target) {

    target.addEventListener(
        "input",
        computeAdd
    );

}


/* =========================================================
   RESET ADD MODAL
========================================================= */

const addModal =
    document.getElementById(
        "addRequirementModal"
    );


if (addModal) {

    addModal.addEventListener(
        "hidden.bs.modal",
        function()
        {

            const form =
                document.getElementById(
                    "addRequirementForm"
                );


            if (form) {

                form.reset();

            }


            const projectId =
                getYear2ProjectId();


            if (
                projectId &&
                parseInt(projectId,10) > 0
            ) {

                document.getElementById(
                    "add_issp_record_id"
                ).value =
                    projectId;

            }


            if (totalDisplay) {

                totalDisplay.value =
                    "₱0.00";

            }


            if (totalHidden) {

                totalHidden.value =
                    "0.00";

            }

        }
    );

}


/* =========================================================
   ADD LINE BUTTON
========================================================= */

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
                        document.getElementById(
                            "strategic_category"
                        );


                    const type =
                        document.getElementById(
                            "expenditure_type"
                        );


                    if (category) {

                        category.value =
                            this.dataset.category || "";

                    }


                    if (type) {

                        type.value =
                            this.dataset.type || "";

                    }


                    const projectId =
                        getYear2ProjectId();


                    if (
                        projectId &&
                        parseInt(projectId,10) > 0
                    ) {

                        document.getElementById(
                            "add_issp_record_id"
                        ).value =
                            projectId;

                    }

                }
            );

        }
    );


/* =========================================================
   ADD REQUIREMENT
========================================================= */

const addRequirementForm =
    document.getElementById(
        "addRequirementForm"
    );


if (addRequirementForm) {

    addRequirementForm.addEventListener(
        "submit",
        function(event)
        {

            event.preventDefault();


            const projectId =
                getYear2ProjectId();


            if (
                !projectId ||
                parseInt(projectId,10) <= 0
            ) {

                showAlertModal(
                    "Error",
                    "No active ISSP project selected. Please save the ICT Projects first."
                );

                return;

            }


            const form =
                this;


            if (!form.checkValidity()) {

                form.reportValidity();

                return;

            }


            computeAdd();


            const total =
                parseFloat(
                    document.getElementById(
                        "line_total"
                    ).value
                ) || 0;


            if (total <= 0) {

                showAlertModal(
                    "Error",
                    "Please enter a valid Unit Cost and Physical Target."
                );

                return;

            }


            /*
             * Always use the active project ID.
             */

            document.getElementById(
                "add_issp_record_id"
            ).value =
                projectId;


            const formData =
                new FormData(form);


            formData.set(
                "issp_record_id",
                String(projectId)
            );


            formData.set(
                "year",
                "2"
            );


            console.log(
                "Saving Year 2 Resource Requirement:",
                Object.fromEntries(formData)
            );


            const saveButton =
                document.getElementById(
                    "saveRequirementBtn"
                );


            if (saveButton) {

                saveButton.disabled = true;

                saveButton.innerHTML =
                    '<i class="fas fa-spinner fa-spin"></i> Saving...';

            }


            fetch(
                form.action,
                {
                    method:"POST",

                    body:formData,

                    headers:{
                        "X-Requested-With":
                            "XMLHttpRequest",

                        "Accept":
                            "application/json"
                    }
                }
            )

            .then(
                async function(response)
                {

                    const responseText =
                        await response.text();


                    console.log(
                        "YEAR 2 HTTP STATUS:",
                        response.status
                    );


                    console.log(
                        "YEAR 2 RAW SERVER RESPONSE:",
                        responseText
                    );


                    let data;


                    try {

                        data =
                            JSON.parse(
                                responseText
                            );

                    } catch(error) {

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

                }
            )

            .then(
                function(data)
                {

                    console.log(
                        "YEAR 2 Save response:",
                        data
                    );


                    if (!data.success) {

                        throw new Error(
                            data.message ||
                            "Unable to save Resource Requirement."
                        );

                    }


                    const returnedProjectId =
                        data.issp_record_id ||
                        data.id ||
                        projectId;


                    if (
                        returnedProjectId &&
                        parseInt(
                            returnedProjectId,
                            10
                        ) > 0
                    ) {

                        localStorage.setItem(
                            "edit_project_id",
                            String(returnedProjectId)
                        );


                        localStorage.setItem(
                            "issp_record_id",
                            String(returnedProjectId)
                        );

                    }


                    /*
                  


                    if (
                        typeof updateStatusIndicators ===
                        "function"
                    ) {

                        updateStatusIndicators();

                    }


                    showAlertModal(
                        "Success",
                        "Year 2 Resource Requirement saved successfully."
                    );


                    /*
                     * Reload so the DB row appears immediately.
                     */

                    setTimeout(
                        function()
                        {

                            window.location.reload();

                        },
                        500
                    );

                }
            )

            .catch(
                function(error)
                {

                    console.error(
                        "YEAR 2 Save Resource Requirement Error:",
                        error
                    );


                    showAlertModal(
                        "Error",
                        error.message ||
                        "Unable to save the Resource Requirement."
                    );

                }
            )

            .finally(
                function()
                {

                    if (saveButton) {

                        saveButton.disabled = false;

                        saveButton.innerHTML =
                            "Save Resource Requirement";

                    }

                }
            );

        }
    );

}


/* =========================================================
   COMPUTE EDIT TOTAL
========================================================= */

const editUnit =
    document.getElementById(
        "edit_unit"
    );

const editTarget =
    document.getElementById(
        "edit_target"
    );

const editDisplay =
    document.getElementById(
        "edit_total"
    );

const editHidden =
    document.getElementById(
        "edit_total_hidden"
    );


function computeEdit()
{
    if (
        !editUnit ||
        !editTarget ||
        !editDisplay ||
        !editHidden
    ) {
        return;
    }


    const unitValue =
        parseFloat(
            editUnit.value
        ) || 0;


    const targetValue =
        parseFloat(
            editTarget.value
        ) || 0;


    const amount =
        unitValue * targetValue;


    editDisplay.value =
        "₱" +
        amount.toLocaleString(
            "en-PH",
            {
                minimumFractionDigits:2,
                maximumFractionDigits:2
            }
        );


    editHidden.value =
        amount.toFixed(2);
}


if (editUnit) {

    editUnit.addEventListener(
        "input",
        computeEdit
    );

}


if (editTarget) {

    editTarget.addEventListener(
        "input",
        computeEdit
    );

}


/* =========================================================
   EDIT BUTTONS
========================================================= */

document
    .querySelectorAll(".edit-btn")
    .forEach(
        function(button)
        {

            button.addEventListener(
                "click",
                function()
                {

                    const editId =
                        document.getElementById(
                            "edit_id"
                        );


                    const editItem =
                        document.getElementById(
                            "edit_item"
                        );


                    const editOffice =
                        document.getElementById(
                            "edit_office"
                        );


                    const editUacs =
                        document.getElementById(
                            "edit_uacs"
                        );


                    const editFund =
                        document.getElementById(
                            "edit_fund"
                        );


                    const editCategory =
                        document.getElementById(
                            "edit_strategic_category"
                        );


                    const editType =
                        document.getElementById(
                            "edit_expenditure_type"
                        );


                    if (editId) {

                        editId.value =
                            this.dataset.id || "";

                    }


                    if (editItem) {

                        editItem.value =
                            this.dataset.item || "";

                    }


                    if (editOffice) {

                        editOffice.value =
                            this.dataset.office || "";

                    }


                    if (editUacs) {

                        editUacs.value =
                            this.dataset.uacs || "";

                    }


                    if (editFund) {

                        editFund.value =
                            this.dataset.fund || "";

                    }


                    if (editCategory) {

                        editCategory.value =
                            this.dataset.category || "";

                    }


                    if (editType) {

                        editType.value =
                            this.dataset.type || "";

                    }


                    if (editUnit) {

                        editUnit.value =
                            this.dataset.unit || "";

                    }


                    if (editTarget) {

                        editTarget.value =
                            this.dataset.target || "";

                    }


                    const projectId =
                        getYear2ProjectId();


                    if (
                        projectId &&
                        parseInt(projectId,10) > 0
                    ) {

                        document.getElementById(
                            "edit_issp_record_id"
                        ).value =
                            projectId;

                    }


                    computeEdit();

                }
            );

        }
    );


/* =========================================================
   EDIT FORM PROJECT ID
========================================================= */

const editRequirementForm =
    document.getElementById(
        "editRequirementForm"
    );


if (editRequirementForm) {

    editRequirementForm.addEventListener(
        "submit",
        function(event)
        {

            const projectId =
                getYear2ProjectId();


            if (
                projectId &&
                parseInt(projectId,10) > 0
            ) {

                document.getElementById(
                    "edit_issp_record_id"
                ).value =
                    projectId;

            }

        }
    );

}


/* =========================================================
   SAVE CHANGES
========================================================= */
window.saveChanges = function(showAlert = true)
{
    const hasRequirements =
        Array.isArray(savedRequirements) &&
        savedRequirements.length > 0;

    if (!hasRequirements) {

        localStorage.removeItem(
            "year2-requirements-saved"
        );

        if (
            typeof updateStatusIndicators === "function"
        ) {
            updateStatusIndicators();
        }

        if (
            showAlert &&
            typeof showAlertModal === "function"
        ) {
            showAlertModal(
                "Warning",
                "Please enter at least one Year 2 Resource Requirement before saving."
            );
        }

        return Promise.resolve(false);
    }

    /*
     * Actual Year 2 requirements are already
     * saved in the database.
     *
     * Save Changes only marks the section
     * as complete.
     */
    if (showAlert === true) {
    localStorage.setItem(
        "year2-requirements-saved",
        "true"
    );
}

    if (
        typeof updateStatusIndicators === "function"
    ) {
        updateStatusIndicators();
    }

    if (
        showAlert &&
        typeof showAlertModal === "function"
    ) {
        showAlertModal(
            "Success",
            "Changes saved successfully."
        );
    }

    return Promise.resolve(true);
};
/* =========================================================
   CLEAR FIELDS
========================================================= */

window.clearForm =
    function()
    {

        showConfirmModal(
            "Clear all Year 2 Resource Requirements?",
            function()
            {

                /*
                 * IMPORTANT:
                 *
                 * Do NOT delete database records.
                 */

                localStorage.removeItem(
                    "year2-office-productivity-form"
                );


                localStorage.removeItem(
                    "year2-internal-ict-projects-form"
                );


                localStorage.removeItem(
                    "year2-cross-agency-form"
                );


                localStorage.removeItem(
                    "year2-continuing-costs-form"
                );


                localStorage.removeItem(
                    "year2-requirements-saved"
                );


               if (
    typeof window.updateStatusIndicators ===
    "function"
) {
    window.updateStatusIndicators();
}


                showAlertModal(
                    "Success",
                    "Year 2 Resource Requirements cleared. Existing saved Resource Requirements were not deleted."
                );

            }
        );

    };


/* =========================================================
   TOOLTIP + INITIAL STATUS
========================================================= */

document.addEventListener(
    "DOMContentLoaded",
    function()
    {

        const tooltipTriggerList =
            document.querySelectorAll(
                '[data-bs-toggle="tooltip"]'
            );


        tooltipTriggerList.forEach(
            function(tooltipTriggerEl)
            {

                if (
                    typeof bootstrap !== "undefined" &&
                    bootstrap.Tooltip
                ) {

                    new bootstrap.Tooltip(
                        tooltipTriggerEl
                    );

                }

            }
        );


        if (
            typeof updateStatusIndicators ===
            "function"
        ) {

            updateStatusIndicators();

        }

    }
);


/* =========================================================
   DELETE BUTTONS
========================================================= */

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