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

.subsection-body {
    padding: 18px;
}

.form-label {
    font-size: .82rem;
    font-weight: 600;
    color: var(--ink);
    margin-bottom: 4px;
}

.form-control,
.form-select {
    border: 1px solid #d0dae6;
    border-radius: 6px;
    font-size: .82rem;
    padding: 8px 12px;
    transition: all 0.2s ease;
}

.form-control:focus,
.form-select:focus {
    border-color: var(--brand);
    box-shadow: 0 0 0 3px rgba(79, 101, 132, .1);
}


/* =========================================================
   CONCERN CARD
========================================================= */

.concern-card {
    border: 1px solid #dbe3eb;
    border-radius: 12px;
    background: #fff;
    padding: 20px;
    margin-bottom: 18px;
}

.concern-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 20px;
}

.concern-title {
    font-size: .95rem;
    font-weight: 700;
    color: var(--brand-dark);
}


/* =========================================================
   REPEATED ICT FIELD GROUP
========================================================= */

.ict-field-group {
    position: relative;
    border: 1px solid #e2e8f0;
    border-radius: 10px;
    background: #f8fafc;
    padding: 16px;
    margin-top: 16px;
}

.ict-field-group:first-child {
    margin-top: 18px;
}

.ict-field-group-delete {
    position: absolute;
    top: 10px;
    right: 10px;
    border: none;
    background: transparent;
    color: #94a3b8;
    font-size: 14px;
    cursor: pointer;
    padding: 4px 6px;
}

.ict-field-group-delete:hover {
    color: #dc2626;
}


/* =========================================================
   ADD BUTTON
========================================================= */

.add-fields-btn {
    margin-top: 0;
}


/* =========================================================
   DELETE CONCERN
========================================================= */

.delete-btn {
    border: none;
    background: none;
    color: #888;
    font-size: 18px;
    cursor: pointer;
    padding: 4px 6px;
}

.delete-btn:hover {
    color: red;
}


/* =========================================================
   EMPTY STATE
========================================================= */

.empty-state {
    text-align: center;
    padding: 35px 20px;
    color: #64748b;
    border: 1px dashed #cbd5e1;
    border-radius: 10px;
    background: #f8fafc;
}

.empty-state i {
    font-size: 28px;
    margin-bottom: 10px;
    opacity: .7;
}

.empty-state p {
    margin: 0;
    font-size: .82rem;
}

.empty-state small {
    font-size: .75rem;
}


/* =========================================================
   FOOTER
========================================================= */

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


/* =========================================================
   NAVIGATION
========================================================= */

.navigation-buttons {
    display: flex;
    gap: 8px;
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

.nav-btn-next {
    background: var(--brand);
    color: white;
    border-color: var(--brand);
}

.nav-btn-next:hover {
    background: var(--brand-dark);
    border-color: var(--brand-dark);
}


/* =========================================================
   RESPONSIVE
========================================================= */

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

    .concern-header {
        align-items: flex-start;
    }
}
</style>


<!-- =========================================================
     PAGE HEADER
========================================================= -->

<div class="row">

    <div class="col-12">

        <div class="page-header mb-3">

            <h1 class="page-title">
                Strategic Concerns
            </h1>

            <p class="page-subtitle">
                Key strategic concerns and issues facing the agency.
            </p>

        </div>

    </div>

</div>


<form
    id="mainForm"
    action="<?= site_url('ict-planner/agency-information/strategic-concerns/save') ?>"
    method="post"
>

    <?= csrf_field() ?>


    <!-- =====================================================
         MAIN CARD
    ====================================================== -->

    <div class="main-section-card">

        <div class="main-header">

            <h2 class="main-title">
                A. Strategic Concerns for ICT Use
            </h2>

        </div>


        <div style="padding: 22px;">


            <!-- =================================================
                 SUBSECTION
            ================================================== -->

            <div class="subsection-card">


                <!-- HEADER -->

                <div class="subsection-header justify-content-between">

                    <div>

                        <div class="subsection-title">
                            Strategic ICT Concerns
                        </div>

                        <small class="text-muted">
                            Add one or more strategic concerns.
                        </small>

                    </div>


                    <!-- MAIN ADD CONCERN -->

                    <button
                        type="button"
                        class="btn btn-primary"
                        onclick="addConcernRow()"
                    >

                        <i class="fa-solid fa-plus"></i>

                        Add Concern

                    </button>

                </div>


                <!-- BODY -->

                <div class="subsection-body">

                    <div id="concernsContainer">

                        <div
                            class="empty-state"
                            id="emptyState"
                        >

                            <i class="fa-solid fa-list-check d-block"></i>

                            <p>
                                No strategic concerns added yet.
                            </p>

                            <small>
                                Click "Add Concern" to begin.
                            </small>

                        </div>

                    </div>

                </div>

            </div>


            <!-- =================================================
                 FOOTER
            ================================================== -->

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
                        onclick="window.navigateToPage('<?= site_url('ict-planner/agency-information/network-infrastructure') ?>')"
                    >

                        <span>
                            Network Infrastructure
                        </span>

                        <i class="fa-solid fa-arrow-right"></i>

                    </button>

                </div>

            </div>

        </div>

    </div>

</form>


<script>

/* =========================================================
   DATABASE SAVED DATA
========================================================= */

const DATABASE_SAVED_DATA = <?= json_encode(
    !empty($saved['strategic_concerns_data'])
        ? json_decode($saved['strategic_concerns_data'], true)
        : [],
    JSON_UNESCAPED_UNICODE |
    JSON_UNESCAPED_SLASHES
) ?>;


/* =========================================================
   COUNTER
========================================================= */

let concernCount = 0;


/* =========================================================
   ADD MAIN CONCERN
========================================================= */

window.addConcernRow = function(savedConcern = null) {

    const container =
        document.getElementById("concernsContainer");

    if (!container) {
        console.error("concernsContainer not found.");
        return;
    }


    /* Remove empty state */

    const emptyState =
        document.getElementById("emptyState");

    if (emptyState) {
        emptyState.remove();
    }


    /* Current concern index */

    const concernIndex =
        concernCount;

    concernCount++;


    /* Create card */

    const card =
        document.createElement("div");

    card.className =
        "concern-card";

    card.dataset.concernIndex =
        concernIndex;


    card.innerHTML = `

        <div class="concern-header">

            <div class="concern-title">
                Concern #${concernCount}
            </div>


            <div class="d-flex gap-2">

                <button
                    type="button"
                    class="btn btn-sm btn-outline-primary add-fields-btn"
                    title="Add ICT Concern Fields"
                    onclick="addConcernField(this)"
                >

                    <i class="fa-solid fa-plus"></i>

                </button>


                <button
                    type="button"
                    class="delete-btn"
                    title="Delete Concern"
                    onclick="deleteConcernRow(this)"
                >

                    <i class="fa-solid fa-trash"></i>

                </button>

            </div>

        </div>


        <div class="row g-3">


            <!-- OO/SO/MFO -->

            <div class="col-md-6">

                <label class="form-label">
                    OO/SO/MFO
                </label>

                <input
                    type="text"
                    class="form-control"
                    name="concerns[${concernIndex}][oo_so_mfo]"
                    placeholder="List each OO/SO/MFO which can be enhanced or facilitated by the adoption of ICT."
                >

            </div>


            <!-- FIRST CRITICAL FIELD -->

            <div class="col-md-6 first-critical-field d-none">

                <label class="form-label">
                    Critical Management, Operating, or Business System
                </label>

                <input
                    type="text"
                    class="form-control"
                    name="concerns[${concernIndex}][ict_concerns][0][critical]"
                    placeholder="Describe the actual business operations/activities performed by the organization in relation to Col. 1"
                >

            </div>


            <!-- FIRST PROBLEM FIELD -->

            <div class="col-md-6 first-problem-field d-none">

                <label class="form-label">
                    Problem
                </label>

                <input
                    type="text"
                    class="form-control"
                    name="concerns[${concernIndex}][ict_concerns][0][problem]"
                    placeholder="Refers to the obstacles that hinder or cause delay in the performance of the business operations/activities identified in Col. 2"
                >

            </div>


            <!-- FIRST INTENDED USE FIELD -->

            <div class="col-md-6 first-intended-field d-none">

                <label class="form-label">
                    Intended Use of ICT
                </label>

                <input
                    type="text"
                    class="form-control"
                    name="concerns[${concernIndex}][ict_concerns][0][intended_use]"
                    placeholder="Indicate the intended ICT solution to address the problems cited in Col. 3"
                >

            </div>

        </div>


        <div class="ict-fields-container"></div>

    `;


    container.appendChild(card);


    /* =====================================================
       RESTORE SAVED DATA
    ====================================================== */

    if (savedConcern) {

        const ooInput =
            card.querySelector(
                'input[name*="[oo_so_mfo]"]'
            );

        if (ooInput) {

            ooInput.value =
                savedConcern.oo_so_mfo ?? "";

        }


        /*
         * CURRENT FORMAT
         */

        if (
            Array.isArray(
                savedConcern.ict_concerns
            )
        ) {

            savedConcern.ict_concerns.forEach(
                function(group, index) {

                    if (index === 0) {

                        showFirstICTFields(
                            card,
                            group
                        );

                    } else {

                        addConcernField(
                            card.querySelector(
                                ".add-fields-btn"
                            ),
                            group
                        );

                    }

                }
            );

        }


        /*
         * OLD FLAT FORMAT
         *
         * Keep this only for compatibility
         * with previously saved records.
         */

        else if (
            savedConcern.critical !== undefined ||
            savedConcern.problem !== undefined ||
            savedConcern.intended_use !== undefined
        ) {

            showFirstICTFields(
                card,
                {
                    critical:
                        savedConcern.critical ?? "",

                    problem:
                        savedConcern.problem ?? "",

                    intended_use:
                        savedConcern.intended_use ?? ""
                }
            );

        }

    }

};


/* =========================================================
   SHOW FIRST ICT FIELD SET
========================================================= */

function showFirstICTFields(
    card,
    savedGroup = null
) {

    const firstCritical =
        card.querySelector(
            ".first-critical-field"
        );

    const firstProblem =
        card.querySelector(
            ".first-problem-field"
        );

    const firstIntended =
        card.querySelector(
            ".first-intended-field"
        );


    if (firstCritical) {

        firstCritical.classList.remove(
            "d-none"
        );

    }


    if (firstProblem) {

        firstProblem.classList.remove(
            "d-none"
        );

    }


    if (firstIntended) {

        firstIntended.classList.remove(
            "d-none"
        );

    }


    if (!savedGroup) {
        return;
    }


    const criticalInput =
        firstCritical
            ? firstCritical.querySelector("input")
            : null;

    const problemInput =
        firstProblem
            ? firstProblem.querySelector("input")
            : null;

    const intendedInput =
        firstIntended
            ? firstIntended.querySelector("input")
            : null;


    if (criticalInput) {

        criticalInput.value =
            savedGroup.critical ?? "";

    }


    if (problemInput) {

        problemInput.value =
            savedGroup.problem ?? "";

    }


    if (intendedInput) {

        intendedInput.value =
            savedGroup.intended_use ?? "";

    }

}


/* =========================================================
   ADD ANOTHER SET OF 3 FIELDS
========================================================= */

window.addConcernField = function(
    button,
    savedGroup = null
) {

    const card =
        button.closest(".concern-card");

    if (!card) {
        return;
    }


    /* =====================================================
       FIRST CLICK
       Show first fields
    ====================================================== */

    const firstCritical =
        card.querySelector(
            ".first-critical-field"
        );

    const firstProblem =
        card.querySelector(
            ".first-problem-field"
        );

    const firstIntended =
        card.querySelector(
            ".first-intended-field"
        );


    const firstFieldsAlreadyVisible =
        firstCritical &&
        !firstCritical.classList.contains(
            "d-none"
        );


    if (!firstFieldsAlreadyVisible) {

        showFirstICTFields(
            card,
            savedGroup
        );

        return;

    }


    /* =====================================================
       ADDITIONAL FIELD SET
    ====================================================== */

    const container =
        card.querySelector(
            ".ict-fields-container"
        );

    if (!container) {
        return;
    }


    const groupIndex =
        container.querySelectorAll(
            ".ict-field-group"
        ).length + 1;


    const concernIndex =
        card.dataset.concernIndex;


    const group =
        document.createElement("div");

    group.className =
        "ict-field-group";

    group.dataset.groupIndex =
        groupIndex;


    group.innerHTML = `

        <button
            type="button"
            class="ict-field-group-delete"
            title="Remove these fields"
            onclick="deleteConcernField(this)"
        >

            <i class="fa-solid fa-trash"></i>

        </button>


        <div class="row g-3">


            <div class="col-md-6">

                <label class="form-label">
                    Critical Management, Operating, or Business System
                </label>

                <input
                    type="text"
                    class="form-control"
                    name="concerns[${concernIndex}][ict_concerns][${groupIndex}][critical]"
                    placeholder="Describe the actual business operations/activities performed by the organization in relation to Col. 1"
                >

            </div>


            <div class="col-md-6">

                <label class="form-label">
                    Problem
                </label>

                <input
                    type="text"
                    class="form-control"
                    name="concerns[${concernIndex}][ict_concerns][${groupIndex}][problem]"
                    placeholder="Refers to the obstacles that hinder or cause delay in the performance of the business operations/activities identified in Col. 2"
                >

            </div>


            <div class="col-md-6">

                <label class="form-label">
                    Intended Use of ICT
                </label>

                <input
                    type="text"
                    class="form-control"
                    name="concerns[${concernIndex}][ict_concerns][${groupIndex}][intended_use]"
                    placeholder="Indicate the intended ICT solution to address the problems cited in Col. 3"
                >

            </div>

        </div>

    `;


    container.appendChild(group);


    /* =====================================================
       RESTORE SAVED VALUES
    ====================================================== */

    if (savedGroup) {

        const criticalInput =
            group.querySelector(
                '[name$="[critical]"]'
            );

        const problemInput =
            group.querySelector(
                '[name$="[problem]"]'
            );

        const intendedInput =
            group.querySelector(
                '[name$="[intended_use]"]'
            );


        if (criticalInput) {

            criticalInput.value =
                savedGroup.critical ?? "";

        }


        if (problemInput) {

            problemInput.value =
                savedGroup.problem ?? "";

        }


        if (intendedInput) {

            intendedInput.value =
                savedGroup.intended_use ?? "";

        }

    }

};


/* =========================================================
   DELETE ONE ICT FIELD GROUP
========================================================= */

window.deleteConcernField = function(button) {

    const group =
        button.closest(".ict-field-group");

    if (!group) {
        return;
    }


    group.remove();


    renumberFieldGroups();

};


/* =========================================================
   RENUMBER ICT FIELD GROUPS
========================================================= */

function renumberFieldGroups() {

    document
        .querySelectorAll(".concern-card")
        .forEach(function(card) {

            const concernIndex =
                card.dataset.concernIndex;


            /* FIRST ICT GROUP */

            const firstCritical =
                card.querySelector(
                    ".first-critical-field input"
                );

            const firstProblem =
                card.querySelector(
                    ".first-problem-field input"
                );

            const firstIntended =
                card.querySelector(
                    ".first-intended-field input"
                );


            if (firstCritical) {

                firstCritical.name =
                    `concerns[${concernIndex}][ict_concerns][0][critical]`;

            }


            if (firstProblem) {

                firstProblem.name =
                    `concerns[${concernIndex}][ict_concerns][0][problem]`;

            }


            if (firstIntended) {

                firstIntended.name =
                    `concerns[${concernIndex}][ict_concerns][0][intended_use]`;

            }


            /* ADDITIONAL ICT GROUPS */

            const groups =
                card.querySelectorAll(
                    ".ict-field-group"
                );


            groups.forEach(
                function(group, index) {

                    const groupIndex =
                        index + 1;


                    group.dataset.groupIndex =
                        groupIndex;


                    const criticalInput =
                        group.querySelector(
                            '[name*="[critical]"]'
                        );

                    const problemInput =
                        group.querySelector(
                            '[name*="[problem]"]'
                        );

                    const intendedInput =
                        group.querySelector(
                            '[name*="[intended_use]"]'
                        );


                    if (criticalInput) {

                        criticalInput.name =
                            `concerns[${concernIndex}][ict_concerns][${groupIndex}][critical]`;

                    }


                    if (problemInput) {

                        problemInput.name =
                            `concerns[${concernIndex}][ict_concerns][${groupIndex}][problem]`;

                    }


                    if (intendedInput) {

                        intendedInput.name =
                            `concerns[${concernIndex}][ict_concerns][${groupIndex}][intended_use]`;

                    }

                }
            );

        });

}


/* =========================================================
   DELETE MAIN CONCERN
========================================================= */

window.deleteConcernRow = function(button) {

    const card =
        button.closest(".concern-card");

    if (!card) {
        return;
    }


    card.remove();


    renumberMainConcerns();


    showEmptyStateIfNeeded();

};


/* =========================================================
   RENUMBER MAIN CONCERNS
========================================================= */

function renumberMainConcerns() {

    const cards =
        document.querySelectorAll(
            ".concern-card"
        );


    cards.forEach(
        function(card, concernIndex) {

            card.dataset.concernIndex =
                concernIndex;


            const title =
                card.querySelector(
                    ".concern-title"
                );


            if (title) {

                title.textContent =
                    `Concern #${concernIndex + 1}`;

            }


            /* OO/SO/MFO */

            const ooInput =
                card.querySelector(
                    'input[name*="[oo_so_mfo]"]'
                );


            if (ooInput) {

                ooInput.name =
                    `concerns[${concernIndex}][oo_so_mfo]`;

            }


            /* FIRST ICT GROUP */

            const firstCritical =
                card.querySelector(
                    ".first-critical-field input"
                );

            const firstProblem =
                card.querySelector(
                    ".first-problem-field input"
                );

            const firstIntended =
                card.querySelector(
                    ".first-intended-field input"
                );


            if (firstCritical) {

                firstCritical.name =
                    `concerns[${concernIndex}][ict_concerns][0][critical]`;

            }


            if (firstProblem) {

                firstProblem.name =
                    `concerns[${concernIndex}][ict_concerns][0][problem]`;

            }


            if (firstIntended) {

                firstIntended.name =
                    `concerns[${concernIndex}][ict_concerns][0][intended_use]`;

            }


            /* ADDITIONAL ICT GROUPS */

            const groups =
                card.querySelectorAll(
                    ".ict-field-group"
                );


            groups.forEach(
                function(group, groupIndex) {

                    const actualGroupIndex =
                        groupIndex + 1;


                    group.dataset.groupIndex =
                        actualGroupIndex;


                    const criticalInput =
                        group.querySelector(
                            '[name*="[critical]"]'
                        );

                    const problemInput =
                        group.querySelector(
                            '[name*="[problem]"]'
                        );

                    const intendedInput =
                        group.querySelector(
                            '[name*="[intended_use]"]'
                        );


                    if (criticalInput) {

                        criticalInput.name =
                            `concerns[${concernIndex}][ict_concerns][${actualGroupIndex}][critical]`;

                    }


                    if (problemInput) {

                        problemInput.name =
                            `concerns[${concernIndex}][ict_concerns][${actualGroupIndex}][problem]`;

                    }


                    if (intendedInput) {

                        intendedInput.name =
                            `concerns[${concernIndex}][ict_concerns][${actualGroupIndex}][intended_use]`;

                    }

                }
            );

        }
    );


    concernCount =
        cards.length;

}


/* =========================================================
   EMPTY STATE
========================================================= */

function showEmptyStateIfNeeded() {

    const container =
        document.getElementById(
            "concernsContainer"
        );


    if (!container) {
        return;
    }


    const cards =
        container.querySelectorAll(
            ".concern-card"
        );


    if (cards.length === 0) {

        container.innerHTML = `

            <div
                class="empty-state"
                id="emptyState"
            >

                <i class="fa-solid fa-list-check d-block"></i>

                <p>
                    No strategic concerns added yet.
                </p>

                <small>
                    Click "Add Concern" to begin.
                </small>

            </div>

        `;

    }

}


/* =========================================================
   LOAD SAVED DATA
========================================================= */

window.loadSavedData = function() {

    const data =
        Array.isArray(DATABASE_SAVED_DATA)
            ? DATABASE_SAVED_DATA
            : [];


    const container =
        document.getElementById(
            "concernsContainer"
        );


    if (!container) {
        return;
    }


    container.innerHTML = "";

    concernCount = 0;


    if (data.length === 0) {

        showEmptyStateIfNeeded();

        return;

    }


    data.forEach(
        function(row) {

            if (!row) {
                return;
            }


            /*
             * Do not modify the saved row.
             *
             * Even if some fields are empty,
             * preserve the concern itself.
             */

            addConcernRow(row);

        }
    );


    showEmptyStateIfNeeded();

};


/* =========================================================
   SAVE FORM DATA TO LOCAL STORAGE
========================================================= */

window.saveFormData = function() {

    const form =
        document.querySelector(
            "#mainForm"
        );


    if (!form) {
        return {};
    }


    const formData =
        new FormData(form);


    const data = {};


    formData.forEach(
        function(value, key) {

            if (
                key === "<?= csrf_token() ?>"
            ) {

                return;

            }


            if (
                Object.prototype.hasOwnProperty.call(
                    data,
                    key
                )
            ) {

                if (
                    !Array.isArray(data[key])
                ) {

                    data[key] = [
                        data[key]
                    ];

                }


                data[key].push(value);

            }

            else {

                data[key] = value;

            }

        }
    );


    if (
        typeof STORAGE_KEY !== "undefined"
    ) {

        localStorage.setItem(
            STORAGE_KEY,
            JSON.stringify(data)
        );

    }


    console.log(
        "Strategic Concerns saved:",
        data
    );


    return data;

};


/* =========================================================
   CLEAR FORM
========================================================= */

window.clearForm = function() {

    const clearAction = function() {

        const form =
            document.querySelector(
                "#mainForm"
            );


        if (!form) {
            return;
        }


        form.querySelectorAll(
            'input:not([type="hidden"]):not([type="file"]), textarea, select'
        ).forEach(
            function(el) {

                if (
                    el.type === "checkbox" ||
                    el.type === "radio"
                ) {

                    el.checked = false;

                }

                else {

                    el.value = "";

                }

            }
        );


        const container =
            document.getElementById(
                "concernsContainer"
            );


        if (container) {

            container.innerHTML = `

                <div
                    class="empty-state"
                    id="emptyState"
                >

                    <i class="fa-solid fa-list-check d-block"></i>

                    <p>
                        No strategic concerns added yet.
                    </p>

                    <small>
                        Click "Add Concern" to begin.
                    </small>

                </div>

            `;

        }


        concernCount = 0;


        if (
            typeof STORAGE_KEY !== "undefined"
        ) {

            localStorage.removeItem(
                STORAGE_KEY
            );

        }

    };


    if (
        typeof showConfirmModal === "function"
    ) {

        showConfirmModal(
            "Are you sure you want to clear all fields? This action cannot be undone.",
            clearAction
        );

    }

    else {

        if (
            confirm(
                "Are you sure you want to clear all fields? This action cannot be undone."
            )
        ) {

            clearAction();

        }

    }

};


/* =========================================================
   SAVE CHANGES
========================================================= */

window.saveChanges = function() {
    const form = document.getElementById("mainForm");

    if (!form) {
        return;
    }

    // Save exactly what is currently in the form.
    // Do not delete anything automatically.
    form.submit();
};

/* =========================================================
   NAVIGATION
========================================================= */

window.navigateToPage = function(url) {

    window.location.href = url;

};


/* =========================================================
   DOM READY
========================================================= */

document.addEventListener(
    "DOMContentLoaded",
    function() {

        loadSavedData();


        /* =============================================
           TOOLTIP SUPPORT
        ============================================== */

        const helpIcons =
            document.querySelectorAll(
                ".help-icon"
            );


        helpIcons.forEach(
            function(icon) {

                icon.addEventListener(
                    "mouseenter",
                    function() {

                        const tooltipText =
                            this.getAttribute(
                                "data-tooltip"
                            );


                        if (!tooltipText) {
                            return;
                        }


                        const tooltip =
                            document.createElement(
                                "div"
                            );


                        tooltip.className =
                            "tooltip-content";


                        tooltip.textContent =
                            tooltipText;


                        tooltip.id =
                            "active-tooltip";


                        document.body.appendChild(
                            tooltip
                        );


                        const rect =
                            this.getBoundingClientRect();


                        tooltip.style.left =
                            (rect.right + 8) + "px";


                        tooltip.style.top =
                            rect.top + "px";


                        requestAnimationFrame(
                            function() {

                                tooltip.classList.add(
                                    "visible"
                                );


                                const tooltipRect =
                                    tooltip.getBoundingClientRect();


                                if (
                                    tooltipRect.right >
                                    window.innerWidth
                                ) {

                                    tooltip.style.left =
                                        (
                                            rect.left -
                                            tooltipRect.width -
                                            8
                                        ) + "px";

                                }


                                if (
                                    tooltipRect.bottom >
                                    window.innerHeight
                                ) {

                                    tooltip.style.top =
                                        (
                                            window.innerHeight -
                                            tooltipRect.height -
                                            10
                                        ) + "px";

                                }

                            }
                        );

                    }
                );


                icon.addEventListener(
                    "mouseleave",
                    function() {

                        const tooltip =
                            document.getElementById(
                                "active-tooltip"
                            );


                        if (tooltip) {

                            tooltip.remove();

                        }

                    }
                );

            }
        );

    }
);

</script>


<?= $this->endSection() ?>