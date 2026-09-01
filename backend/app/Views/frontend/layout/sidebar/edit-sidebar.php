<?php
$active ??= '';
$editId ??= 0;
$currentPage = current_url();
$isIsspPage = strpos($currentPage, 'edit-ict-project') !== false;
?>

<style>
.status-indicator {
    width: 16px;
    height: 16px;
    border-radius: 50%;
    margin-right: 8px;
    flex-shrink: 0;
    transition: all 0.2s ease;
    display: flex;
    align-items: center;
    justify-content: center;
}

.status-indicator::before {
    content: '';
    width: 8px;
    height: 8px;
    border-radius: 50%;
    display: block;
}

.status-indicator.not-started::before {
    background: rgba(255, 255, 255, 0.3);
}

.status-indicator.in-progress::before {
    background: #fbbf24;
    box-shadow: 0 0 8px rgba(251, 191, 36, 0.5);
}

.status-indicator.complete::before {
    background: #4ade80;
    box-shadow: 0 0 8px rgba(74, 222, 128, 0.5);
}

.sidebar-section-title {
    font-size: 0.7rem;
    color: rgba(255, 255, 255, 0.5);
    text-transform: uppercase;
    letter-spacing: 0.05em;
    padding: 16px 12px 8px;
    margin: 0;
    font-weight: 600;
}

.sidebar-footer-submit {
    padding: 0 12px 12px;
}

.save-draft-btn {
    width: 100%;
    padding: 8px 12px;
    background: linear-gradient(135deg, #6b7280 0%, #4b5563 100%);
    color: #fff;
    border: none;
    border-radius: 6px;
    font-size: .75rem;
    font-weight: 700;
    cursor: pointer;
    transition: all 0.3s ease;
    box-shadow: 0 4px 12px rgba(107, 114, 128, 0.3);
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 3px;
    text-transform: uppercase;
    letter-spacing: 0.05em;
}

.save-draft-btn:hover {
    background: linear-gradient(135deg, #4b5563 0%, #374151 100%);
    box-shadow: 0 6px 16px rgba(107, 114, 128, 0.4);
    transform: translateY(-1px);
}

.save-draft-btn:active {
    transform: translateY(0);
    box-shadow: 0 2px 8px rgba(107, 114, 128, 0.3);
}

.save-draft-btn:disabled {
    background: #9ca3af;
    cursor: not-allowed;
    box-shadow: none;
    transform: none;
}

.submit-issp-btn {
    width: 100%;
    padding: 8px 12px;
    background: linear-gradient(135deg, #4f6584 0%, #344863 100%);
    color: #fff;
    border: none;
    border-radius: 6px;
    font-size: .75rem;
    font-weight: 700;
    cursor: pointer;
    transition: all 0.3s ease;
    box-shadow: 0 4px 12px rgba(79, 101, 132, 0.3);
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 3px;
    text-transform: uppercase;
    letter-spacing: 0.05em;
}

.submit-issp-btn:hover {
    background: linear-gradient(135deg, #344863 0%, #24334d 100%);
    box-shadow: 0 6px 16px rgba(79, 101, 132, 0.4);
    transform: translateY(-1px);
}

.submit-issp-btn:active {
    transform: translateY(0);
    box-shadow: 0 2px 8px rgba(79, 101, 132, 0.3);
}

.submit-issp-btn:disabled {
    background: #9ca3af;
    cursor: not-allowed;
    box-shadow: none;
    transform: none;
}

.submit-issp-btn i,
.save-draft-btn i {
    font-size: .9rem;
}

.edit-back-link {
    color: rgba(255, 255, 255, .76);
    background: transparent;
    border-radius: 0;
    padding: 10px 12px;
    margin-bottom: 4px;
    font-size: .82rem;
    font-weight: 600;
    display: flex;
    align-items: center;
    gap: 8px;
    text-decoration: none;
    transition: background-color .14s ease, color .14s ease;
}

.edit-back-link:hover {
    color: #fff;
    background: rgba(255, 255, 255, .08);
}
</style>


<!-- =========================================================
     BACK TO DRAFTS
     ========================================================= -->

<a
    class="edit-back-link"
    href="<?= site_url('employee/draft-ict-projects') ?>"
    id="backToDraftsLink"
>
    <i class="fa-solid fa-arrow-left"></i>
    Back to Drafts
</a>


<!-- =========================================================
     PROPOSED ICT STRATEGY
     ========================================================= -->

<div class="sidebar-section-title">
    Proposed ICT Strategy
</div>


<a
    class="nav-link <?= $active === 'network-infrastructure' ? 'active' : '' ?>"
    href="<?= site_url('employee/edit-ict-project/' . $editId . '/network-infrastructure') ?>"
    data-form-key="network-infrastructure-form"
>
    <span class="status-indicator not-started"></span>
    Network Infrastructure
</a>


<a
    class="nav-link <?= $active === 'enterprise-architecture' ? 'active' : '' ?>"
    href="<?= site_url('employee/edit-ict-project/' . $editId . '/enterprise-architecture') ?>"
    data-form-key="enterprise-architecture-form"
>
    <span class="status-indicator not-started"></span>
    Enterprise Architecture
</a>


<a
    class="nav-link <?= $active === 'ict-human-capital' ? 'active' : '' ?>"
    href="<?= site_url('employee/edit-ict-project/' . $editId . '/ict-human-capital') ?>"
    data-form-key="ict-human-capital-form"
>
    <span class="status-indicator not-started"></span>
    ICT Human Capital
</a>


<a
    class="nav-link <?= $active === 'information-systems' ? 'active' : '' ?>"
    href="<?= site_url('employee/edit-ict-project/' . $editId . '/information-systems') ?>"
    data-form-key="information-systems-form"
>
    <span class="status-indicator not-started"></span>
    Information Systems
</a>


<a
    class="nav-link <?= $active === 'ict-projects' ? 'active' : '' ?>"
    href="<?= site_url('employee/edit-ict-project/' . $editId . '/ict-projects') ?>"
    data-form-key="ict-projects-form"
>
    <span class="status-indicator not-started"></span>
    ICT Projects
</a>


<a
    class="nav-link <?= $active === 'performance-measurement' ? 'active' : '' ?>"
    href="<?= site_url('employee/edit-ict-project/' . $editId . '/performance-measurement') ?>"
    data-form-key="performance-measurement-form"
>
    <span class="status-indicator not-started"></span>
    Performance Framework
</a>


<!-- =========================================================
     RESOURCE REQUIREMENTS
     ========================================================= -->

<div class="sidebar-section-title">
    Resource Requirements
</div>


<a
    id="year1RequirementsLink"
    class="nav-link <?= $active === 'year1-requirements' ? 'active' : '' ?>"
    href="<?= site_url('employee/edit-ict-project/' . $editId . '/year1-requirements') ?>"
>
    <span class="status-indicator not-started"></span>
    Year 1 Requirements
</a>


<a
    id="year2RequirementsLink"
    class="nav-link <?= $active === 'year2-requirements' ? 'active' : '' ?>"
    href="<?= site_url('employee/edit-ict-project/' . $editId . '/year2-requirements') ?>"
>
    <span class="status-indicator not-started"></span>
    Year 2 Requirements
</a>


<a
    id="year3RequirementsLink"
    class="nav-link <?= $active === 'year3-requirements' ? 'active' : '' ?>"
    href="<?= site_url('employee/edit-ict-project/' . $editId . '/year3-requirements') ?>"
>
    <span class="status-indicator not-started"></span>
    Year 3 Requirements
</a>


<a
    class="nav-link <?= $active === 'summary-of-investments' ? 'active' : '' ?>"
    href="<?= site_url('employee/edit-ict-project/' . $editId . '/summary-of-investments') ?>"
>
    <span class="status-indicator not-started"></span>
    Summary of Investments
</a>


<!-- =========================================================
     SUBMIT
     ========================================================= -->

<div class="sidebar-footer-submit mt-3">

    <button
        type="button"
        class="submit-issp-btn"
        id="submitIsspBtn"
        onclick="submitEditProject()"
    >
        <i class="fa-solid fa-paper-plane me-2"></i>
        Submit Project
    </button>

</div>


<script>

/* =========================================================
   EDIT MODE
   ========================================================= */

const isEditMode =
    <?= !empty($editId) && $editId > 0 ? 'true' : 'false' ?>;

console.log('EDIT MODE:', isEditMode);
console.log('EDIT ID:', <?= json_encode($editId) ?>);


/* =========================================================
   COLLECT FORM DATA
   ========================================================= */

function collectFormData() {

    const keys = [

        'network-infrastructure-form',

        'enterprise-architecture-form',

        'ict-human-capital-form',

        'information-systems-form',

        'ict-projects-form',

        'performance-measurement-form',


        'year1-office-productivity-form',
        'year1-internal-ict-projects-form',
        'year1-cross-agency-form',
        'year1-continuing-costs-form',

        'year2-office-productivity-form',
        'year2-internal-ict-projects-form',
        'year2-cross-agency-form',
        'year2-continuing-costs-form',

        'year3-office-productivity-form',
        'year3-internal-ict-projects-form',
        'year3-cross-agency-form',
        'year3-continuing-costs-form',

        'summary-of-investments-form'

    ];

    const data = {};

    keys.forEach(function(key) {

        try {

            const saved =
                localStorage.getItem(key);

            if (saved) {

                data[key] =
                    JSON.parse(saved);

            }

        } catch (e) {

            console.error(
                'Error parsing ' + key + ':',
                e
            );

        }

    });

    console.log(
        'COLLECTED FORM DATA:',
        data
    );

    return data;
}


/* =========================================================
   SAVE EDIT DRAFT
   ========================================================= */

function saveEditDraft() {

    if (
        typeof window.saveChanges ===
        'function'
    ) {

        window.saveChanges(false);

    }


    const btn =
        document.getElementById('editSaveBtn');


    if (btn) {

        btn.disabled = true;

        btn.innerHTML =
            '<i class="fa-solid fa-spinner fa-spin me-2"></i>Saving...';

    }


    const csrfToken =
        document
            .querySelector('meta[name="csrf-token"]')
            ?.getAttribute('content');


    const editId =
        <?= json_encode($editId) ?>;


    const formData =
        collectFormData();


    console.log(
        'FORM DATA:',
        JSON.stringify(formData, null, 2)
    );


    fetch(
        '<?= site_url('employee/save-draft') ?>',
        {

            method: 'POST',

            headers: {

                'Content-Type':
                    'application/json',

                'X-Requested-With':
                    'XMLHttpRequest',

                'X-CSRF-TOKEN':
                    csrfToken

            },

            body: JSON.stringify({

                csrf_test_name:
                    csrfToken,

                form_data:
                    formData,

                id:
                    editId

            })

        }
    )

    .then(function(response) {

        if (!response.ok) {

            throw new Error(
                'Server returned ' +
                response.status
            );

        }

        return response.json();

    })

    .then(function(data) {

        if (data.success) {

            showAlertModal(
                'Success',
                'Draft saved successfully!'
            );

        } else {

            showAlertModal(
                'Error',
                'Error saving: ' +
                (
                    data.message ||
                    'Please try again.'
                )
            );

        }


        if (btn) {

            btn.disabled = false;

            btn.innerHTML =
                '<i class="fa-solid fa-floppy-disk me-2"></i>Save Changes';

        }

    })

    .catch(function(error) {

        console.error(
            'Save draft error:',
            error
        );


        showAlertModal(
            'Error',
            'Error saving. Please try again.'
        );


        if (btn) {

            btn.disabled = false;

            btn.innerHTML =
                '<i class="fa-solid fa-floppy-disk me-2"></i>Save Changes';

        }

    });

}


/* =========================================================
   VALIDATE ALL FORMS
   ========================================================= */

function areAllFormsComplete() {

    const sections = {

        /* ---------------------------------------------
           PROPOSED ICT STRATEGY
           --------------------------------------------- */

        'network-infrastructure-form': {

            label: 'Network Infrastructure',

            skip: [
                'dept_network_diagram',
                'regional_network_diagram'
            ]

        },


        'enterprise-architecture-form': {

            label: 'Enterprise Architecture',

            skip: [
                'ea_diagram'
            ]

        },


        'ict-human-capital-form': {

            label: 'ICT Human Capital',

            skip: []

        },


        'information-systems-form': {

            label: 'Information Systems',

            skip: [
                'interop1_internal_system',
                'interop1_external_system',
                'online_link_1',
                'system_usage_1',
                'interop1_sub',
                'owner_1',
                'dev_strategy_1',
                'platform_1',
                'database_1',
                'storage_1'
            ]

        },


        'ict-projects-form': {

            label: 'ICT Projects',

            skip: [
                'internal_strategic_others_text',
                'cross_strategic_others_text'
            ]

        },


        'performance-measurement-form': {

            label: 'Performance Measurement',

            skip: [

                'cross_projects[1][kpi][intermediate][indicator]',
                'cross_projects[1][kpi][intermediate][baseline]',
                'cross_projects[1][kpi][intermediate][target]',
                'cross_projects[1][kpi][intermediate][method]',
                'cross_projects[1][kpi][intermediate][responsibility]',

                'cross_projects[1][kpi][immediate][indicator]',
                'cross_projects[1][kpi][immediate][baseline]',
                'cross_projects[1][kpi][immediate][target]',
                'cross_projects[1][kpi][immediate][method]',
                'cross_projects[1][kpi][immediate][responsibility]',

                'cross_projects[1][kpi][output][indicator]',
                'cross_projects[1][kpi][output][baseline]',
                'cross_projects[1][kpi][output][target]',
                'cross_projects[1][kpi][output][method]',
                'cross_projects[1][kpi][output][responsibility]'

            ]

        },


        /* ---------------------------------------------
           YEAR 1
           --------------------------------------------- */

        'year1-office-productivity-form': {

            label: 'Year 1 - Office Productivity',

            skip: []

        },

        'year1-internal-ict-projects-form': {

            label: 'Year 1 - Internal ICT Projects',

            skip: []

        },

        'year1-cross-agency-form': {

            label: 'Year 1 - Cross Agency ICT Projects',

            skip: []

        },

        'year1-continuing-costs-form': {

            label: 'Year 1 - Continuing Costs',

            skip: []

        },


        /* ---------------------------------------------
           YEAR 2
           --------------------------------------------- */

        'year2-office-productivity-form': {

            label: 'Year 2 - Office Productivity',

            skip: []

        },

        'year2-internal-ict-projects-form': {

            label: 'Year 2 - Internal ICT Projects',

            skip: []

        },

        'year2-cross-agency-form': {

            label: 'Year 2 - Cross Agency ICT Projects',

            skip: []

        },

        'year2-continuing-costs-form': {

            label: 'Year 2 - Continuing Costs',

            skip: []

        },


        /* ---------------------------------------------
           YEAR 3
           --------------------------------------------- */

        'year3-office-productivity-form': {

            label: 'Year 3 - Office Productivity',

            skip: []

        },

        'year3-internal-ict-projects-form': {

            label: 'Year 3 - Internal ICT Projects',

            skip: []

        },

        'year3-cross-agency-form': {

            label: 'Year 3 - Cross Agency ICT Projects',

            skip: []

        },

        'year3-continuing-costs-form': {

            label: 'Year 3 - Continuing Costs',

            skip: []

        },


        /* ---------------------------------------------
           SUMMARY
           --------------------------------------------- */

        'summary-of-investments-form': {

            label: 'Summary of Investments',

            skip: []

        }

    };


    /* =====================================================
       ICT PROJECT TITLE
       ===================================================== */

    try {

        const ictProjects =
            JSON.parse(
                localStorage.getItem(
                    'ict-projects-form'
                )
            );


        if (
            !ictProjects ||
            !ictProjects.internal_project_title ||
            typeof ictProjects.internal_project_title !== 'string' ||
            ictProjects.internal_project_title.trim() === ''
        ) {

            return {

                valid: false,

                message:
                    'ICT Project Title is required in the ICT Projects section.'

            };

        }

    } catch (e) {

        return {

            valid: false,

            message:
                'ICT Projects section is empty. Please fill in required fields.'

        };

    }


    /* =====================================================
       CHECK EVERY SECTION
       ===================================================== */

    for (const key in sections) {

        const section =
            sections[key];


        try {

            const raw =
                localStorage.getItem(key);


            const data =
                raw
                    ? JSON.parse(raw)
                    : null;


            /*
             * Resource Requirements use ARRAY data.
             * Do not treat an empty array as a normal form.
             */

            if (
                key.indexOf('-office-productivity-form') >= 0 ||
                key.indexOf('-internal-ict-projects-form') >= 0 ||
                key.indexOf('-cross-agency-form') >= 0 ||
                key.indexOf('-continuing-costs-form') >= 0
            ) {

                /*
                 * Resource requirements are handled separately.
                 * Empty sections are allowed here because not
                 * every category/year necessarily has a row.
                 */

                continue;

            }


            /* ---------------------------------------------
               SECTION DOES NOT EXIST
               --------------------------------------------- */

            if (!data) {

                return {

                    valid: false,

                    message:
                        section.label +
                        ' section is empty. Please fill in required fields.'

                };

            }


            /* ---------------------------------------------
               ICT HUMAN CAPITAL
               --------------------------------------------- */

            if (
                key ===
                'ict-human-capital-form'
            ) {

                let hasAnyRow = false;


                for (
                    let r = 1;
                    r <= 20;
                    r++
                ) {

                    const pos =
                        data[
                            'position_' + r
                        ];


                    if (
                        typeof pos === 'string' &&
                        pos.trim() !== ''
                    ) {

                        hasAnyRow = true;


                        const stat =
                            data[
                                'status_' + r
                            ];


                        const cnt =
                            data[
                                'count_' + r
                            ];


                        if (

                            typeof stat !== 'string' ||
                            stat.trim() === '' ||

                            (
                                typeof cnt !== 'string' &&
                                typeof cnt !== 'number'
                            ) ||

                            String(cnt).trim() === ''

                        ) {

                            return {

                                valid: false,

                                message:
                                    section.label +
                                    ' — Row ' +
                                    r +
                                    ' has incomplete fields. Please fill in all fields for each row.'

                            };

                        }

                    }

                }


                if (!hasAnyRow) {

                    return {

                        valid: false,

                        message:
                            section.label +
                            ' section has empty fields. Please fill in at least one position.'

                    };

                }


                continue;

            }


            /* ---------------------------------------------
               NORMAL FIELD VALIDATION
               --------------------------------------------- */

            for (const field in data) {

                /*
                 * Ignore CSRF fields
                 */

                if (
                    field.startsWith('csrf_') ||
                    field === '_token'
                ) {

                    continue;

                }


                /*
                 * Ignore optional fields
                 */

                if (
                    section.skip.indexOf(field) >= 0
                ) {

                    continue;

                }


                /*
                 * Empty strings are invalid
                 */

                if (
                    typeof data[field] === 'string' &&
                    data[field].trim() === ''
                ) {

                    return {

                        valid: false,

                        message:
                            section.label +
                            ' section has empty fields. Please fill in all fields before submitting.'

                    };

                }

            }

        } catch (e) {

            console.error(
                'Validation error for ' + key + ':',
                e
            );


            return {

                valid: false,

                message:
                    section.label +
                    ' section has invalid data. Please check and save again.'

            };

        }

    }


    return {

        valid: true

    };

}


/* =========================================================
   SUBMIT EDIT PROJECT
   ========================================================= */

function submitEditProject() {

    const check =
        areAllFormsComplete();


    if (!check.valid) {

        showAlertModal(
            'Incomplete Form',
            check.message
        );

        return;

    }


    showConfirmModal(
        'Are you sure you want to submit this project for review?',
        function() {

            const btn =
                document.getElementById(
                    'submitIsspBtn'
                );


            if (btn) {

                btn.disabled = true;

                btn.innerHTML =
                    '<i class="fa-solid fa-spinner fa-spin me-2"></i>Submitting...';

            }


            const csrfToken =
                document
                    .querySelector(
                        'meta[name="csrf-token"]'
                    )
                    ?.getAttribute(
                        'content'
                    );


            const editId =
                <?= json_encode($editId) ?>;


            fetch(
                '<?= site_url('employee/save-draft') ?>',
                {

                    method: 'POST',

                    headers: {

                        'Content-Type':
                            'application/json',

                        'X-Requested-With':
                            'XMLHttpRequest',

                        'X-CSRF-TOKEN':
                            csrfToken

                    },

                    body:
                        JSON.stringify({

                            csrf_test_name:
                                csrfToken,

                            form_data:
                                collectFormData(),

                            id:
                                editId

                        })

                }
            )

            .then(function(response) {

                if (!response.ok) {

                    throw new Error(
                        'Server returned ' +
                        response.status
                    );

                }

                return response.json();

            })

            .then(function(data) {

                if (data.success) {

                    const form =
                        document.createElement(
                            'form'
                        );


                    form.method =
                        'POST';


                    form.action =
                        '<?= site_url('employee/submit-issp') ?>/' +
                        editId;


                    const input =
                        document.createElement(
                            'input'
                        );


                    input.type =
                        'hidden';


                    input.name =
                        'csrf_test_name';


                    input.value =
                        csrfToken;


                    form.appendChild(
                        input
                    );


                    document.body.appendChild(
                        form
                    );


                    form.submit();

                } else {

                    showAlertModal(
                        'Error',
                        'Failed to save. ' +
                        (
                            data.message ||
                            'Please try again.'
                        )
                    );


                    if (btn) {

                        btn.disabled = false;

                        btn.innerHTML =
                            '<i class="fa-solid fa-paper-plane me-2"></i>Submit Project';

                    }

                }

            })

            .catch(function(error) {

                console.error(
                    'Submit error:',
                    error
                );


                showAlertModal(
                    'Error',
                    'Error saving. Please try again.'
                );


                if (btn) {

                    btn.disabled = false;

                    btn.innerHTML =
                        '<i class="fa-solid fa-paper-plane me-2"></i>Submit Project';

                }

            });

        }
    );

}


/* =========================================================
   UPDATE STATUS INDICATORS
   ========================================================= */

function updateStatusIndicators() {

    document
        .querySelectorAll(
            '.app-sidebar .nav-link[data-form-key]'
        )
        .forEach(function(link) {

            const storageKey =
                link.getAttribute(
                    'data-form-key'
                );


            const indicator =
                link.querySelector(
                    '.status-indicator'
                );


            if (
                !indicator ||
                !storageKey
            ) {

                return;

            }


            try {

                const data =
                    localStorage.getItem(
                        storageKey
                    );


                if (!data) {

                    indicator.className =
                        'status-indicator not-started';

                    return;

                }


                const parsed =
                    JSON.parse(data);


                const skip =
                    getSkipFields(storageKey);


                let totalReal = 0;

                let emptyReal = 0;


                Object.entries(parsed)
                    .forEach(function(entry) {

                        const key =
                            entry[0];

                        const value =
                            entry[1];


                        if (
                            key.startsWith('csrf_') ||
                            key === '_token'
                        ) {

                            return;

                        }


                        if (
                            skip.indexOf(key) >= 0
                        ) {

                            return;

                        }


                        if (
                            typeof value !== 'string'
                        ) {

                            return;

                        }


                        totalReal++;


                        if (
                            value.trim() === ''
                        ) {

                            emptyReal++;

                        }

                    });


                const filledCount =
                    totalReal -
                    emptyReal;


                if (
                    totalReal > 0 &&
                    filledCount / totalReal >= 0.8
                ) {

                    indicator.className =
                        'status-indicator complete';

                }

                else if (
                    filledCount > 0
                ) {

                    indicator.className =
                        'status-indicator in-progress';

                }

                else {

                    indicator.className =
                        'status-indicator not-started';

                }

            }
            catch (e) {

                console.error(
                    'Status indicator error:',
                    e
                );


                indicator.className =
                    'status-indicator not-started';

            }

        });


    /* =====================================================
       RESOURCE REQUIREMENTS
       ===================================================== */

    updateResourceRequirementStatusSidebar(
        1,
        'year1RequirementsLink'
    );


    updateResourceRequirementStatusSidebar(
        2,
        'year2RequirementsLink'
    );


    updateResourceRequirementStatusSidebar(
        3,
        'year3RequirementsLink'
    );

}


/* =========================================================
   GET OPTIONAL / SKIPPED FIELDS
   ========================================================= */

function getSkipFields(storageKey) {

    const skips = {

        'network-infrastructure-form': [

            'dept_network_diagram',
            'regional_network_diagram'

        ],


        'enterprise-architecture-form': [

            'ea_diagram'

        ],


        'ict-human-capital-form': [],


        'information-systems-form': [

            'interop1_internal_system',
            'interop1_external_system',
            'online_link_1',
            'system_usage_1',
            'interop1_sub',
            'owner_1',
            'dev_strategy_1',
            'platform_1',
            'database_1',
            'storage_1'

        ],


        'ict-projects-form': [

            'internal_strategic_others_text',
            'cross_strategic_others_text'

        ],


        'performance-measurement-form': [

            'cross_projects[1][kpi][intermediate][indicator]',
            'cross_projects[1][kpi][intermediate][baseline]',
            'cross_projects[1][kpi][intermediate][target]',
            'cross_projects[1][kpi][intermediate][method]',
            'cross_projects[1][kpi][intermediate][responsibility]',

            'cross_projects[1][kpi][immediate][indicator]',
            'cross_projects[1][kpi][immediate][baseline]',
            'cross_projects[1][kpi][immediate][target]',
            'cross_projects[1][kpi][immediate][method]',
            'cross_projects[1][kpi][immediate][responsibility]',

            'cross_projects[1][kpi][output][indicator]',
            'cross_projects[1][kpi][output][baseline]',
            'cross_projects[1][kpi][output][target]',
            'cross_projects[1][kpi][output][method]',
            'cross_projects[1][kpi][output][responsibility]'

        ]

    };


    return skips[storageKey] || [];

}


/* =========================================================
   RESOURCE REQUIREMENT STATUS
   ========================================================= */

function updateResourceRequirementStatusSidebar(
    year,
    linkId
) {

    const link =
        document.getElementById(
            linkId
        );


    if (!link) {

        return;

    }


    const indicator =
        link.querySelector(
            '.status-indicator'
        );


    if (!indicator) {

        return;

    }


    const keys = [

        'year' +
        year +
        '-office-productivity-form',

        'year' +
        year +
        '-internal-ict-projects-form',

        'year' +
        year +
        '-cross-agency-form',

        'year' +
        year +
        '-continuing-costs-form'

    ];


    let hasData = false;


    keys.forEach(function(key) {

        const value =
            localStorage.getItem(
                key
            );


        if (!value) {

            return;

        }


        try {

            const rows =
                JSON.parse(value);


            if (
                Array.isArray(rows) &&
                rows.length > 0
            ) {

                hasData = true;

            }

        }
        catch (e) {

            console.error(
                'Resource requirement parse error:',
                key,
                e
            );

        }

    });


    const saved =
        localStorage.getItem(
            'year' +
            year +
            '-requirements-saved'
        );


    if (
        saved === 'true' &&
        hasData
    ) {

        indicator.className =
            'status-indicator complete';

    }

    else if (hasData) {

        indicator.className =
            'status-indicator in-progress';

    }

    else {

        indicator.className =
            'status-indicator not-started';

    }

}


/* =========================================================
   PAGE LOAD
   ========================================================= */

document.addEventListener(
    'DOMContentLoaded',
    function() {

        updateStatusIndicators();


        /* =================================================
           SIDEBAR NAVIGATION
           ================================================= */

        document
            .querySelectorAll(
                'a.nav-link[href]'
            )
            .forEach(function(link) {

                link.addEventListener(
                    'click',
                    function(e) {

                        e.preventDefault();


                        const href =
                            link.href;


                        /*
                         * Save current form to localStorage.
                         * Do not mark it completed.
                         */

                        if (
                            typeof window.saveChanges ===
                            'function'
                        ) {

                            window.saveChanges(false);

                        }


                        setTimeout(
                            function() {

                                window.location.href =
                                    href;

                            },
                            100
                        );

                    }
                );

            });


        /* =================================================
           BACK TO DRAFTS
           ================================================= */

        const backLink =
            document.getElementById(
                'backToDraftsLink'
            );


        if (backLink) {

            backLink.addEventListener(
                'click',
                function(e) {

                    e.preventDefault();


                    /*
                     * Save current form to localStorage
                     */

                    if (
                        typeof window.saveChanges ===
                        'function'
                    ) {

                        window.saveChanges(false);

                    }


                    const csrfToken =
                        document
                            .querySelector(
                                'meta[name="csrf-token"]'
                            )
                            ?.getAttribute(
                                'content'
                            );


                    const editId =
                        <?= json_encode($editId) ?>;


                    /*
                     * Save everything to DB first
                     */

                    fetch(
                        '<?= site_url('employee/save-draft') ?>',
                        {

                            method: 'POST',

                            headers: {

                                'Content-Type':
                                    'application/json',

                                'X-Requested-With':
                                    'XMLHttpRequest',

                                'X-CSRF-TOKEN':
                                    csrfToken

                            },

                            body:
                                JSON.stringify({

                                    csrf_test_name:
                                        csrfToken,

                                    form_data:
                                        collectFormData(),

                                    id:
                                        editId

                                })

                        }
                    )

                    .then(function(response) {

                        return response.ok
                            ? response.json()
                            : Promise.reject(
                                new Error(
                                    'Save failed: ' +
                                    response.status
                                )
                            );

                    })

                    .catch(function(error) {

                        console.error(
                            'Back to drafts save error:',
                            error
                        );

                    })

                    .finally(function() {

                        /*
                         * Clear all edit-project
                         * localStorage keys.
                         */

                        const formKeys = [

                            'network-infrastructure-form',

                            'enterprise-architecture-form',

                            'ict-human-capital-form',

                            'information-systems-form',

                            'ict-projects-form',

                            'performance-measurement-form',


                            'year1-office-productivity-form',
                            'year1-internal-ict-projects-form',
                            'year1-cross-agency-form',
                            'year1-continuing-costs-form',

                            'year2-office-productivity-form',
                            'year2-internal-ict-projects-form',
                            'year2-cross-agency-form',
                            'year2-continuing-costs-form',

                            'year3-office-productivity-form',
                            'year3-internal-ict-projects-form',
                            'year3-cross-agency-form',
                            'year3-continuing-costs-form',

                            'summary-of-investments-form',

                            'year1-requirements-saved',
                            'year2-requirements-saved',
                            'year3-requirements-saved'

                        ];


                        formKeys.forEach(
                            function(key) {

                                localStorage.removeItem(
                                    key
                                );

                            }
                        );


                        /*
                         * Restore new-project-backup
                         * if available.
                         */

                        const backup =
                            localStorage.getItem(
                                'new-project-backup'
                            );


                        if (backup) {

                            try {

                                const parsed =
                                    JSON.parse(
                                        backup
                                    );


                                Object.keys(parsed)
                                    .forEach(
                                        function(key) {

                                            if (
                                                parsed[key]
                                            ) {

                                                localStorage.setItem(
                                                    key,
                                                    parsed[key]
                                                );

                                            }

                                        }
                                    );


                            }
                            catch (e) {

                                console.error(
                                    'Backup restore error:',
                                    e
                                );

                            }


                            localStorage.removeItem(
                                'new-project-backup'
                            );

                        }


                        localStorage.removeItem(
                            'edit_project_id'
                        );


                        window.location.href =
                            backLink.href;

                    });

                }
            );

    }
});

</script>