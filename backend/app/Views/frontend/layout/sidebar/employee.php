<?php
$active ??= '';

// Check if current page is an ISSP section page
$currentPage = current_url();
$isIsspPage = strpos($currentPage, 'proposed-ict-strategy') !== false || 
              strpos($currentPage, 'resource-requirements') !== false || 
              strpos($currentPage, 'annex1') !== false || 
              strpos($currentPage, 'annex2') !== false;
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

.submit-issp-btn i {
    font-size: .9rem;
}

.save-draft-btn i {
    font-size: .9rem;
}

#isspDropdown .sidebar-section-title {
    padding-left: 12px;
}

#isspDropdownToggle .fa-chevron-down {
    transition: transform 0.3s ease;
}

#isspDropdown .nav-link {
    padding-left: 12px;
}
</style>

<!-- Main Navigation (Always Visible) -->
<a class="nav-link <?= $active === 'dashboard' ? 'active' : '' ?>" href="<?= site_url('employee/dashboard') ?>">
    <i class="fa-solid fa-chart-line"></i> Dashboard
</a>

<a class="nav-link <?= $active === 'submitted-ict-projects' ? 'active' : '' ?>" href="<?= site_url('employee/submitted-ict-projects') ?>">
    <i class="fa-solid fa-folder-open"></i> Submitted ICT Projects
</a>

<a class="nav-link <?= $active === 'draft-ict-projects' ? 'active' : '' ?>" href="<?= site_url('employee/draft-ict-projects') ?>">
    <i class="fa-solid fa-file-pen"></i> Draft ICT Projects
</a>

<a class="nav-link" href="javascript:void(0)" data-bs-toggle="collapse" data-bs-target="#isspDropdown" aria-expanded="false" aria-controls="isspDropdown" id="isspDropdownToggle">
    <i class="fa-solid fa-plus"></i> New ICT Projects
    <i class="fa-solid fa-chevron-down" style="font-size: .82rem; margin-left: auto;"></i>
</a>

<div class="collapse" id="isspDropdown">
<!-- ISSP Sections (Dropdown) -->
<div class="sidebar-section-title">Proposed ICT Strategy</div>

<a class="nav-link <?= $active === 'network-infrastructure' ? 'active' : '' ?>" href="<?= site_url('employee/proposed-ict-strategy/network-infrastructure') ?>">
    <span class="status-indicator complete"></span> Network Infrastructure
</a>

<a class="nav-link <?= $active === 'enterprise-architecture' ? 'active' : '' ?>" href="<?= site_url('employee/proposed-ict-strategy/enterprise-architecture') ?>">
    <span class="status-indicator in-progress"></span> Enterprise Architecture
</a>

<a class="nav-link <?= $active === 'ict-human-capital' ? 'active' : '' ?>" href="<?= site_url('employee/proposed-ict-strategy/ict-human-capital') ?>">
    <span class="status-indicator not-started"></span> ICT Human Capital
</a>

<a class="nav-link <?= $active === 'information-systems' ? 'active' : '' ?>" href="<?= site_url('employee/proposed-ict-strategy/information-systems') ?>">
    <span class="status-indicator not-started"></span> Information Systems
</a>

<a class="nav-link <?= $active === 'ict-projects' ? 'active' : '' ?>" href="<?= site_url('employee/proposed-ict-strategy/ict-projects') ?>">
    <span class="status-indicator not-started"></span> ICT Projects
</a>

<a class="nav-link <?= $active === 'performance-measurement' ? 'active' : '' ?>" href="<?= site_url('employee/proposed-ict-strategy/performance-measurement') ?>">
    <span class="status-indicator not-started"></span> Performance Framework
</a>

<div class="sidebar-section-title">Resource Requirements</div>

<a class="nav-link <?= $active === 'year1-requirements' ? 'active' : '' ?>" href="<?= site_url('employee/resource-requirements/year1-requirements') ?>">
    <span class="status-indicator not-started"></span> Year 1 Requirements
</a>

<a class="nav-link <?= $active === 'year2-requirements' ? 'active' : '' ?>" href="<?= site_url('employee/resource-requirements/year2-requirements') ?>">
    <span class="status-indicator not-started"></span> Year 2 Requirements
</a>

<a class="nav-link <?= $active === 'year3-requirements' ? 'active' : '' ?>" href="<?= site_url('employee/resource-requirements/year3-requirements') ?>">
    <span class="status-indicator not-started"></span> Year 3 Requirements
</a>

<a class="nav-link <?= $active === 'general-summary' ? 'active' : '' ?>" href="<?= site_url('employee/resource-requirements/general-summary') ?>">
    <span class="status-indicator not-started"></span> General Summary
</a>

<a class="nav-link <?= $active === 'fund-source' ? 'active' : '' ?>" href="<?= site_url('employee/resource-requirements/fund-source') ?>">
    <span class="status-indicator not-started"></span> Fund Source
</a>

<a class="nav-link <?= $active === 'statement-expenditure' ? 'active' : '' ?>" href="<?= site_url('employee/resource-requirements/statement-expenditure') ?>">
    <span class="status-indicator not-started"></span> Statement of Expenditure
</a>

<a class="nav-link <?= $active === 'object-expenditure' ? 'active' : '' ?>" href="<?= site_url('employee/resource-requirements/object-expenditure') ?>">
    <span class="status-indicator not-started"></span> Object of Expenditure
</a>

<div class="sidebar-section-title">Annex 1: ICT Asset Inventory</div>

<a class="nav-link <?= $active === 'ict-equipment-inventory' ? 'active' : '' ?>" href="<?= site_url('employee/annex1/ict-equipment-inventory') ?>">
    <span class="status-indicator not-started"></span> ICT Equipment Inventory
</a>

<a class="nav-link <?= $active === 'ict-software-inventory' ? 'active' : '' ?>" href="<?= site_url('employee/annex1/ict-software-inventory') ?>">
    <span class="status-indicator not-started"></span> ICT Software Inventory
</a>

<div class="sidebar-section-title">Annex 2: DRBCP</div>

<a class="nav-link <?= $active === 'dr-governance' ? 'active' : '' ?>" href="<?= site_url('employee/annex2/dr-governance') ?>">
    <span class="status-indicator not-started"></span> Plan Governance
</a>

<a class="nav-link <?= $active === 'ict-component-inventory' ? 'active' : '' ?>" href="<?= site_url('employee/annex2/ict-component-inventory') ?>">
    <span class="status-indicator not-started"></span> ICT Component Inventory
</a>

<a class="nav-link <?= $active === 'recovery-strategies' ? 'active' : '' ?>" href="<?= site_url('employee/annex2/recovery-strategies') ?>">
    <span class="status-indicator not-started"></span> Recovery Strategies
</a>

<a class="nav-link <?= $active === 'operational-procedures' ? 'active' : '' ?>" href="<?= site_url('employee/annex2/operational-procedures') ?>">
    <span class="status-indicator not-started"></span> Operational Procedures
</a>

<a class="nav-link <?= $active === 'compliance-kpis' ? 'active' : '' ?>" href="<?= site_url('employee/annex2/compliance-kpis') ?>">
    <span class="status-indicator not-started"></span> Compliance & KPIs
</a>

<div class="sidebar-footer-submit mt-3">
    <button type="button" class="save-draft-btn mb-2" id="saveDraftBtn" onclick="saveDraft()">
        <i class="fa-solid fa-floppy-disk me-2"></i>Save as Draft
    </button>
    <button type="button" class="submit-issp-btn" id="submitIsspBtn" onclick="submitISSP()">
        <i class="fa-solid fa-paper-plane me-2"></i>Submit Project
    </button>
</div>

</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const dropdownToggle = document.getElementById('isspDropdownToggle');
    const dropdown = document.getElementById('isspDropdown');

    if (dropdownToggle && dropdown) {
        dropdownToggle.addEventListener('click', function(e) {
            e.preventDefault();
        });

        dropdown.addEventListener('show.bs.collapse', function() {
            const chevron = dropdownToggle.querySelector('.fa-chevron-down');
            if (chevron) {
                chevron.style.transform = 'rotate(180deg)';
            }
            dropdownToggle.setAttribute('aria-expanded', 'true');
        });

        dropdown.addEventListener('hide.bs.collapse', function() {
            const chevron = dropdownToggle.querySelector('.fa-chevron-down');
            if (chevron) {
                chevron.style.transform = 'rotate(0deg)';
            }
            dropdownToggle.setAttribute('aria-expanded', 'false');
        });

        if (<?= $isIsspPage ? 'true' : 'false' ?>) {
            dropdown.classList.add('show');
            const chevron = dropdownToggle.querySelector('.fa-chevron-down');
            if (chevron) {
                chevron.style.transform = 'rotate(180deg)';
            }
            dropdownToggle.setAttribute('aria-expanded', 'true');
        }
    }
});

function saveDraft() {
    const saveDraftBtn = document.getElementById('saveDraftBtn');
    saveDraftBtn.disabled = true;
    saveDraftBtn.innerHTML = '<i class="fa-solid fa-spinner fa-spin me-2"></i>Saving...';

    const csrfToken = document.querySelector('meta[name="csrf-token"]')?.getAttribute('content') || 
                     document.querySelector('input[name="csrf_token"]')?.value;

    fetch('<?= site_url('employee/save-draft') ?>', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-Requested-With': 'XMLHttpRequest'
        },
        body: JSON.stringify({
            csrf_token: csrfToken
        })
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            alert('Draft saved successfully!');
            window.location.href = '<?= site_url('employee/draft-ict-projects') ?>';
        } else {
            alert('Error saving draft: ' + (data.message || 'Please try again.'));
            saveDraftBtn.disabled = false;
            saveDraftBtn.innerHTML = '<i class="fa-solid fa-floppy-disk me-2"></i>Save as Draft';
        }
    })
    .catch(error => {
        console.error('Error:', error);
        alert('Error saving draft. Please try again.');
        saveDraftBtn.disabled = false;
        saveDraftBtn.innerHTML = '<i class="fa-solid fa-floppy-disk me-2"></i>Save as Draft';
    });
}

function submitISSP() {
    // Show confirmation modal
    if (confirm('Are you sure you want to submit your ISSP for review? This action cannot be undone.')) {
        const submitBtn = document.getElementById('submitIsspBtn');
        submitBtn.disabled = true;
        submitBtn.innerHTML = '<i class="fa-solid fa-spinner fa-spin me-2"></i>Submitting...';

        const csrfToken = document.querySelector('meta[name="csrf-token"]')?.getAttribute('content') || 
                         document.querySelector('input[name="csrf_token"]')?.value;

        fetch('<?= site_url('employee/submit-issp') ?>', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-Requested-With': 'XMLHttpRequest'
            },
            body: JSON.stringify({
                csrf_token: csrfToken
            })
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                // Show success message
                alert('ISSP submitted successfully!');
                window.location.href = '<?= site_url('employee/dashboard') ?>';
            } else {
                alert('Error submitting ISSP: ' + (data.message || 'Please try again.'));
                submitBtn.disabled = false;
                submitBtn.innerHTML = '<i class="fa-solid fa-paper-plane me-2"></i>Submit Project';
            }
        })
        .catch(error => {
            console.error('Error:', error);
            alert('Error submitting ISSP. Please try again.');
            submitBtn.disabled = false;
            submitBtn.innerHTML = '<i class="fa-solid fa-paper-plane me-2"></i>Submit Project';
        });
    }
}
</script>
