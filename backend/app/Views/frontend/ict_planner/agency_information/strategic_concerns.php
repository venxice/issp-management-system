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

.concern-card{

    border:1px solid #dbe3eb;

    border-radius:12px;

    background:#fff;

    padding:20px;

    margin-bottom:18px;

}

.concern-header{

    display:flex;

    justify-content:space-between;

    align-items:center;

    margin-bottom:20px;

}

.delete-btn{

    border:none;

    background:none;

    color:#888;

    font-size:18px;

}

.delete-btn:hover{

    color:red;

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
            <h1 class="page-title"> Strategic Concerns</h1>
            <p class="page-subtitle">Key strategic concerns and issues facing the agency.</p>
        </div>
    </div>
</div>

<form id="mainForm" action="<?= site_url('ict-planner/agency-information/strategic-concerns/save') ?>" method="post">
    <?= csrf_field() ?>

    <div class="main-section-card">
        <div class="main-header">
            <h2 class="main-title">A. Strategic Concerns for ICT Use</h2>
        </div>

        <div style="padding: 22px;">
    
          <div class="subsection-card">

    <div class="subsection-header justify-content-between">

        <div>
            <div class="subsection-title">
                Strategic ICT Concerns
            </div>

            <small class="text-muted">
                Add one or more strategic concerns.
            </small>
        </div>

        <button
            type="button"
            class="btn btn-primary"
            onclick="addConcernRow()">

            <i class="fa-solid fa-plus"></i>
            Add Concern

        </button>

    </div>

    <div class="subsection-body">

        <div id="concernsContainer"></div>

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
                    <button type="button" class="nav-btn nav-btn-next" onclick="window.navigateToPage('<?= site_url('ict-planner/agency-information/network-infrastructure') ?>')">
                        <span>Network Infrastructure</span>
                        <i class="fa-solid fa-arrow-right"></i>
                    </button>
                </div>
            </div>
        </div>
    </div>
</form>


<script>

const DATABASE_SAVED_DATA = <?= json_encode(
    !empty($saved['strategic_concerns_data'])
        ? json_decode($saved['strategic_concerns_data'], true)
        : []
) ?>;

let concernCount = 0;

window.addConcernRow = function() {

    concernCount++;

    const container = document.getElementById("concernsContainer");

    if (!container) {
        console.error("concernsContainer not found.");
        return;
    }

    container.insertAdjacentHTML("beforeend", `

        <div class="concern-card">

            <div class="concern-header">

                <strong>Concern #${concernCount}</strong>

                <div class="d-flex gap-2">

                    <button
                        type="button"
                        class="btn btn-sm btn-outline-primary"
                        onclick="addConcernField(this)">
                        <i class="fa-solid fa-plus"></i>
                    </button>

                    <button
                        type="button"
                        class="delete-btn"
                        onclick="deleteConcernRow(this)">
                        <i class="fa-solid fa-trash"></i>
                    </button>

                </div>

            </div>

            <div class="row g-3">

                <div class="col-md-6">

                    <label class="form-label">
                        OO/SO/MFO
                    </label>

                    <input
                        type="text"
                        class="form-control"
                        name="concerns_oo_so_mfo[]"
                        placeholder="List each OO/SO/MFO which can be enhanced or facilitated by the adoption of ICT.">

                </div>

                <div class="col-md-6 critical-field d-none">

                    <label class="form-label">
                        Critical Management, Operating, or Business System
                    </label>

                    <input
                        type="text"
                        class="form-control"
                        name="concerns_critical[]"
                        placeholder="Describe the actual business operations/activities performed by the organization in relation to Col. 1">

                </div>

                <div class="col-md-6 problem-field d-none">

                    <label class="form-label">
                        Problem
                    </label>

                    <input
                        type="text"
                        class="form-control"
                        name="concerns_problem[]"
                        placeholder="Refers to the obstacles that hinder or cause delay in the performance of the business operations/activities identified in Col. 2">

                </div>

                <div class="col-md-6 intended-field d-none">

                    <label class="form-label">
                        Intended Use of ICT
                    </label>

                    <input
                        type="text"
                        class="form-control"
                        name="concerns_intended_use[]"
                        placeholder="Indicate the intended ICT solution to address the problems citied in Col.3">

                </div>

            </div>

        </div>

    `);
};

window.saveFormData = function() {
    const form = document.querySelector('#mainForm');
    const data = {};

    form.querySelectorAll('input[name], textarea[name], select[name]').forEach(function(el) {
        const name = el.name;

        if (name.endsWith('[]')) {
            if (!data[name]) {
                data[name] = [];
            }

            data[name].push(el.value);
        } else {
            data[name] = el.value;
        }
    });

    localStorage.setItem(STORAGE_KEY, JSON.stringify(data));

    console.log('Strategic Concerns saved:', data);

    return data;
};

window.loadSavedData = function() {

    const data = DATABASE_SAVED_DATA || [];

    const container = document.getElementById('concernsContainer');

    if (!container) {
        return;
    }

    // Clear existing rows
    container.innerHTML = '';
    concernCount = 0;

    if (!Array.isArray(data) || data.length === 0) {
        return;
    }

    data.forEach(function(row) {

        addConcernRow();

        const card = container.lastElementChild;

        if (!card) {
            return;
        }

        const ooInput = card.querySelector(
            '[name="concerns_oo_so_mfo[]"]'
        );

        const criticalInput = card.querySelector(
            '[name="concerns_critical[]"]'
        );

        const problemInput = card.querySelector(
            '[name="concerns_problem[]"]'
        );

        const intendedInput = card.querySelector(
            '[name="concerns_intended_use[]"]'
        );

        if (ooInput) {
            ooInput.value = row.oo_so_mfo || '';
        }

        if (criticalInput) {
            criticalInput.value = row.critical || '';
        }

        if (problemInput) {
            problemInput.value = row.problem || '';
        }

        if (intendedInput) {
            intendedInput.value = row.intended_use || '';
        }

        /*
         * Show additional fields if there is saved data.
         */
        if (
            row.critical ||
            row.problem ||
            row.intended_use
        ) {

            const criticalField = card.querySelector('.critical-field');
            const problemField = card.querySelector('.problem-field');
            const intendedField = card.querySelector('.intended-field');
            const addButton = card.querySelector('.btn-outline-primary');

            if (criticalField) {
                criticalField.classList.remove('d-none');
            }

            if (problemField) {
                problemField.classList.remove('d-none');
            }

            if (intendedField) {
                intendedField.classList.remove('d-none');
            }

            if (addButton) {
                addButton.style.display = 'none';
            }
        }
    });
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
            }
        }
    }
};

window.saveChanges = function() {

    const form = document.getElementById('mainForm');

    if (!form) {
        return;
    }

    form.submit();
};

window.navigateToPage = function(url) {
    window.location.href = url;
};

document.addEventListener('DOMContentLoaded', function() {
    loadSavedData();

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
});


function addConcernField(button){

    const card = button.closest(".concern-card");

    card.querySelector(".critical-field").classList.remove("d-none");
    card.querySelector(".problem-field").classList.remove("d-none");
    card.querySelector(".intended-field").classList.remove("d-none");

    // Hide the + button after 
    button.style.display = "none";
}

function deleteConcernRow(button){

    button.closest(".concern-card").remove();

};

</script>

<?= $this->endSection() ?>
