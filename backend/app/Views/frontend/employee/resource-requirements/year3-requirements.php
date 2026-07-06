

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
</style>

<div class="container-fluid">

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

<?php foreach ($requirements as $row): ?>

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

                <?= esc($row['office']) ?>

                <?php if(!empty($row['object_of_expenditure'])): ?>

                    • <?= esc($row['object_of_expenditure']) ?>

                <?php endif; ?>

            </small>

        </div>

        <div class="text-end">

            <strong>

                ₱<?= number_format($row['total_cost'], 2) ?>

            </strong>

            <br>

<button
    class="btn btn-sm btn-outline-primary mt-2 edit-btn"
    data-id="<?= $row['id'] ?>"
    data-item="<?= esc($row['item']) ?>"
    data-office="<?= esc($row['office']) ?>"
    data-fund="<?= esc($row['fund_source']) ?>"
    data-unit="<?= $row['unit_cost'] ?>"
    data-target="<?= $row['physical_target'] ?>"
    data-total="<?= $row['total_cost'] ?>"
    data-bs-toggle="modal"
    data-bs-target="#editRequirementModal"
    title="Edit">

    <i class="fa fa-pencil-alt"></i>

</button>
        </div>

    </div>

</div>

<?php endif; ?>

<?php endforeach; ?>

</div>

<div class="border-top p-3">

    <div class="d-flex justify-content-between">

        <strong>Subtotal</strong>

        <strong>

            ₱<?= number_format($subtotal, 2) ?>

        </strong>

    </div>

</div>

</div>

<?php endforeach; ?>

</div>

</div>

<?php endforeach; ?>

</div>

<!-- ===========================
     ADD RESOURCE REQUIREMENT
============================ -->

<div class="modal fade"
     id="addRequirementModal"
     tabindex="-1"
     aria-hidden="true">

    <div class="modal-dialog modal-xl">

        <div class="modal-content">

            <form
                action="<?= base_url('employee/resource-requirements/store') ?>"
                method="POST">

                <?= csrf_field() ?>
                 
                <input type="hidden" name="strategic_category" id="strategic_category">
                <input type="hidden" name="expenditure_type" id="expenditure_type">

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
                                class="form-select">

                                <option value="">Select office / unit</option>

                                <option value="Central Office">Central Office</option>

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
                                             class="form-select">
                                  
                                 <option value="">Select UACS code</option>

                                <option value="5060403006  Communications Networks">5060403006  Communications Networks </option>

                                <option value="5060405003  Information and Communication Technology Equipment">
                                    5060405003  Information and Communication Technology Equipment
                                </option>

                                <option value="5060405007  Communications Equipment">
                                    5060405007  Communications Equipment
                                </option>

                                <option value="5060405012  Printing Equipment">
                                   5060405012  Printing Equipment
                                </option>

                                <option value="5060405015  ICT Software">
                                    5060405015  ICT Software
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
                                class="form-select">

                              <option value="">Select a fund source</option>

                                <option value="General Appropriations Act (GAA)">General Approproations Act (GAA)</option>

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
                                id="unit_cost"
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
                                id="physical_target"
                                name="physical_target"
                                class="form-control"
                                required>

                        </div>

                        <!-- TOTAL -->

                        <div class="mb-3">
                            <input
                               type="text"
                                 id="line_total_display"
                                  name="total_cost"
                                   class="form-control bg-light fw-bold text-end"
                                   value="₱0.00"
                                   placeholder="Line Total"
                                   style="background:#e9ecef;"
                                   readonly>

                                    <input type="hidden"
                                      id="line_total"
                                        name="total_cost">

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
                        class="btn btn-primary"
                        type="submit">

                        Save Resource Requirement

                    </button>

                </div>

            </form>

        </div>

    </div>

</div>

<div class="modal fade" id="editRequirementModal" tabindex="-1">

    <div class="modal-dialog modal-xl">

        <div class="modal-content">

            <form
                action="<?= base_url('employee/resource-requirements/update') ?>"
                method="POST">

                <?= csrf_field() ?>

                <input type="hidden" name="id" id="edit_id">

                <div class="modal-header">

                    <h5>Edit Resource Requirement</h5>

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
                                class="form-select">

                                <option value="">Select office / unit</option>

                                <option value="Central Office">Central Office</option>

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
                                             class="form-select">
                                  
                                 <option value="">Select UACS code</option>

                                <option value="5060403006  Communications Networks">5060403006  Communications Networks </option>

                                <option value="5060405003  Information and Communication Technology Equipment">
                                    5060405003  Information and Communication Technology Equipment
                                </option>

                                <option value="5060405007  Communications Equipment">
                                    5060405007  Communications Equipment
                                </option>

                                <option value="5060405012  Printing Equipment">
                                   5060405012  Printing Equipment
                                </option>

                                <option value="5060405015  ICT Software">
                                    5060405015  ICT Software
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
                                class="form-select">

                              <option value="">Select a fund source</option>

                                <option value="General Appropriations Act (GAA)">General Approproations Act (GAA)</option>

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
                                    id="edit_target"
                                   name="physical_target"
                                     class="form-control">

                        </div>

                        <!-- TOTAL -->

                        <div class="mb-3">
                              <input
                               type="text"
                                 id="edit_total"
                                  name="total_cost"
                                   class="form-control bg-light fw-bold text-end"
                                   value="₱0.00"
                                   placeholder="Line Total"
                                   style="background:#e9ecef;"
                                   readonly>

                                   <input type="hidden"
                                      id="edit_total_hidden"
                                        name="total_cost">

                    </div>

                </div>

                <div class="modal-footer">

                    <button
                        class="btn btn-secondary"
                        data-bs-dismiss="modal">

                        Cancel

                    </button>

                    <button
                        class="btn btn-primary"
                        type="submit">

                        Save Changes

                    </button>

                </div>

            </form>

        </div>

    </div>

</div>

<script>
// ---------- ADD ----------
const unit = document.getElementById("unit_cost");
const target = document.getElementById("physical_target");

const totalDisplay = document.getElementById("line_total_display");
const totalHidden = document.getElementById("line_total");

function computeAdd(){

    const amount =
        (parseFloat(unit.value) || 0) *
        (parseFloat(target.value) || 0);

    totalDisplay.value = "₱" + amount.toLocaleString("en-PH",{
        minimumFractionDigits:2,
        maximumFractionDigits:2
    });

    totalHidden.value = amount.toFixed(2);
}

if(unit && target){
    unit.addEventListener("input", computeAdd);
    target.addEventListener("input", computeAdd);
}


// ---------- EDIT ----------
const editUnit = document.getElementById("edit_unit");
const editTarget = document.getElementById("edit_target");

const editDisplay = document.getElementById("edit_total");
const editHidden = document.getElementById("edit_total_hidden");

function computeEdit(){

    const amount =
        (parseFloat(editUnit.value) || 0) *
        (parseFloat(editTarget.value) || 0);

    editDisplay.value = "₱" + amount.toLocaleString("en-PH",{
        minimumFractionDigits:2,
        maximumFractionDigits:2
    });

    editHidden.value = amount.toFixed(2);
}

if(editUnit && editTarget){
    editUnit.addEventListener("input", computeEdit);
    editTarget.addEventListener("input", computeEdit);
}


// ---------- ADD BUTTON ----------
document.querySelectorAll(".add-line-btn").forEach(function(btn){

    btn.addEventListener("click",function(){

        document.getElementById("strategic_category").value =
            this.dataset.category;

        document.getElementById("expenditure_type").value =
            this.dataset.type;

    });

});


// ---------- EDIT BUTTON ----------
document.querySelectorAll(".edit-btn").forEach(function(btn){

    btn.addEventListener("click",function(){

        document.getElementById("edit_id").value = this.dataset.id;
        document.getElementById("edit_item").value = this.dataset.item;
        document.getElementById("edit_office").value = this.dataset.office;
        document.getElementById("edit_fund").value = this.dataset.fund;

        editUnit.value = this.dataset.unit;
        editTarget.value = this.dataset.target;

        computeEdit();

    });

});
</script>
<?= $this->endSection() ?>