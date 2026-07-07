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

<a class="nav-link <?= $active === 'network-infrastructure' ? 'active' : '' ?>" href="<?= site_url('employee/proposed-ict-strategy/network-infrastructure') ?>" data-form-key="network-infrastructure-form">
    <span class="status-indicator not-started"></span> Network Infrastructure
</a>

<a class="nav-link <?= $active === 'enterprise-architecture' ? 'active' : '' ?>" href="<?= site_url('employee/proposed-ict-strategy/enterprise-architecture') ?>" data-form-key="enterprise-architecture-form">
    <span class="status-indicator not-started"></span> Enterprise Architecture
</a>

<a class="nav-link <?= $active === 'ict-human-capital' ? 'active' : '' ?>" href="<?= site_url('employee/proposed-ict-strategy/ict-human-capital') ?>" data-form-key="ict-human-capital-form">
    <span class="status-indicator not-started"></span> ICT Human Capital
</a>

<a class="nav-link <?= $active === 'information-systems' ? 'active' : '' ?>" href="<?= site_url('employee/proposed-ict-strategy/information-systems') ?>" data-form-key="information-systems-form">
    <span class="status-indicator not-started"></span> Information Systems
</a>

<a class="nav-link <?= $active === 'ict-projects' ? 'active' : '' ?>" href="<?= site_url('employee/proposed-ict-strategy/ict-projects') ?>" data-form-key="ict-projects-form">
    <span class="status-indicator not-started"></span> ICT Projects
</a>

<a class="nav-link <?= $active === 'performance-measurement' ? 'active' : '' ?>" href="<?= site_url('employee/proposed-ict-strategy/performance-measurement') ?>" data-form-key="performance-measurement-form">
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

<a class="nav-link <?= $active === 'general-summary' ? 'active' : '' ?>" href="<?= site_url('employee/resource-requirements/summary-of-investments') ?>">
    <span class="status-indicator not-started"></span> Summary of Investments
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
function updateStatusIndicators() {
    var skipFields = {
        'network-infrastructure-form': ['dept_network_diagram','regional_network_diagram'],
        'enterprise-architecture-form': ['ea_diagram'],
        'ict-human-capital-form': [],
        'information-systems-form': [],
        'ict-projects-form': [],
        'performance-measurement-form': []
    };

    var path = window.location.pathname;
    var isFormPage = path.indexOf('/proposed-ict-strategy/') >= 0 || path.indexOf('/edit-ict-project/') >= 0;
    if (!isFormPage) return;

    document.querySelectorAll('#isspDropdown .nav-link[data-form-key]').forEach(link => {
        const storageKey = link.getAttribute('data-form-key');
        const indicator = link.querySelector('.status-indicator');
        if (!indicator || !storageKey) return;

        try {
            const data = localStorage.getItem(storageKey);
            if (data) {
                const parsed = JSON.parse(data);
                var totalReal = 0;
                var emptyReal = 0;
                var skip = skipFields[storageKey] || [];
                Object.entries(parsed).forEach(([key, v]) => {
                    if (key.startsWith('csrf_') || key === '_token') return;
                    if (skip.indexOf(key) >= 0) return;
                    if (typeof v !== 'string') return;
                    totalReal++;
                    if (v.trim() === '') emptyReal++;
                });
                var filledCount = totalReal - emptyReal;
                if (totalReal > 0 && filledCount / totalReal >= 0.8) {
                    indicator.className = 'status-indicator complete';
                } else if (filledCount > 0) {
                    indicator.className = 'status-indicator in-progress';
                } else {
                    indicator.className = 'status-indicator not-started';
                }
            } else {
                indicator.className = 'status-indicator not-started';
            }
        } catch (e) {
            indicator.className = 'status-indicator not-started';
        }
    });
}

document.addEventListener('DOMContentLoaded', function() {
    updateStatusIndicators();
    const dropdownToggle = document.getElementById('isspDropdownToggle');
    const dropdown = document.getElementById('isspDropdown');

    if (dropdownToggle && dropdown) {
        dropdownToggle.addEventListener('click', function(e) {
            e.preventDefault();
        });

        dropdown.querySelectorAll('a.nav-link[href]').forEach(function(link) {
            link.addEventListener('click', function(e) {
                e.preventDefault();
                var path = window.location.pathname;
                var onFormPage = path.indexOf('proposed-ict-strategy') !== -1 ||
                                 path.indexOf('resource-requirements') !== -1 ||
                                 path.indexOf('edit-ict-project') !== -1;
                if (onFormPage) {
                    if (typeof window.saveChanges === 'function') {
                        window.saveChanges(false);
                    }
                    setTimeout(function() {
                        window.location.href = link.href;
                    }, 100);
                } else {
                    if (localStorage.getItem('edit_project_id')) {
                        // Clear all form keys first to prevent stale draft data
                        var formKeys = ['network-infrastructure-form','enterprise-architecture-form','ict-human-capital-form','information-systems-form','ict-projects-form','performance-measurement-form'];
                        formKeys.forEach(function(k) {
                            localStorage.removeItem(k);
                        });
                        var backup = localStorage.getItem('new-project-backup');
                        if (backup) {
                            // Active edit — restore original new project data
                            try {
                                var parsed = JSON.parse(backup);
                                Object.keys(parsed).forEach(function(k) {
                                    if (parsed[k]) localStorage.setItem(k, parsed[k]);
                                });
                            } catch(e) {}
                            localStorage.removeItem('new-project-backup');
                        }
                        localStorage.removeItem('edit_project_id');
                    }
                    window.location.href = link.href;
                }
            });
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

// Collect form data from all 6 localStorage keys
function collectFormData() {
    const keys = [
        'network-infrastructure-form',
        'enterprise-architecture-form',
        'ict-human-capital-form',
        'information-systems-form',
        'ict-projects-form',
        'performance-measurement-form'
    ];
    const data = {};
    keys.forEach(function(key) {
        try {
            const saved = localStorage.getItem(key);
            if (saved) {
                data[key] = JSON.parse(saved);
            }
        } catch(e) {
            console.warn('Failed to parse localStorage key:', key, e);
        }
    });
    return data;
}

function saveDraft() {
    const saveDraftBtn = document.getElementById('saveDraftBtn');
    
    var formData = collectFormData();
    var projectTitle = formData['ict-projects-form'] && formData['ict-projects-form'].internal_project_title;
    if (!projectTitle || !projectTitle.trim()) {
        showAlertModal('Validation Error', 'Project title is required. Please go to the ICT Projects section and enter a title before saving.');
        return;
    }

    saveDraftBtn.disabled = true;
    saveDraftBtn.innerHTML = '<i class="fa-solid fa-spinner fa-spin me-2"></i>Saving...';

    const csrfToken = document.querySelector('meta[name="csrf-token"]')?.getAttribute('content') || 
                     document.querySelector('input[name="csrf_test_name"]')?.value;

    var editId = localStorage.getItem('edit_project_id');
    fetch('<?= site_url('employee/save-draft') ?>', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-Requested-With': 'XMLHttpRequest'
        },
        body: JSON.stringify({
            csrf_test_name: csrfToken,
            form_data: formData,
            id: editId || null
        })
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            localStorage.clear();
            showAlertModal('Success', 'Draft saved successfully!');
            window.location.href = '<?= site_url('employee/draft-ict-projects') ?>';
        } else {
            showAlertModal('Error', 'Error saving draft: ' + (data.message || 'Please try again.'));
            saveDraftBtn.disabled = false;
            saveDraftBtn.innerHTML = '<i class="fa-solid fa-floppy-disk me-2"></i>Save as Draft';
        }
    })
    .catch(error => {
        console.error('Error:', error);
        showAlertModal('Error', 'Error saving draft. Please try again.');
        saveDraftBtn.disabled = false;
        saveDraftBtn.innerHTML = '<i class="fa-solid fa-floppy-disk me-2"></i>Save as Draft';
    });
}

function areAllFormsComplete() {
    var sections = {
        'network-infrastructure-form': { label: 'Network Infrastructure', skip: [] },
        'enterprise-architecture-form': { label: 'Enterprise Architecture', skip: [] },
        'ict-human-capital-form': { label: 'ICT Human Capital', skip: [] },
        'information-systems-form': { label: 'Information Systems', skip: ['interop1_internal_system','interop1_external_system','online_link_1','system_usage_1','interop1_sub','owner_1','dev_strategy_1','platform_1','database_1','storage_1'] },
        'ict-projects-form': { label: 'ICT Projects', skip: ['internal_strategic_others_text','cross_strategic_others_text'] },
        'performance-measurement-form': { label: 'Performance Measurement', skip: ['cross_projects[1][kpi][intermediate][indicator]','cross_projects[1][kpi][intermediate][baseline]','cross_projects[1][kpi][intermediate][target]','cross_projects[1][kpi][intermediate][method]','cross_projects[1][kpi][intermediate][responsibility]','cross_projects[1][kpi][immediate][indicator]','cross_projects[1][kpi][immediate][baseline]','cross_projects[1][kpi][immediate][target]','cross_projects[1][kpi][immediate][method]','cross_projects[1][kpi][immediate][responsibility]','cross_projects[1][kpi][output][indicator]','cross_projects[1][kpi][output][baseline]','cross_projects[1][kpi][output][target]','cross_projects[1][kpi][output][method]','cross_projects[1][kpi][output][responsibility]'] }
    };

    // Special check: ict-projects must have a title
    try {
        var ictProjects = JSON.parse(localStorage.getItem('ict-projects-form'));
        if (!ictProjects || !ictProjects.internal_project_title || ictProjects.internal_project_title.trim() === '') {
            return { valid: false, message: 'ICT Project Title is required in the ICT Projects section.' };
        }
    } catch(e) {
        return { valid: false, message: 'ICT Projects section is empty. Please fill in required fields.' };
    }

    // Required file uploads
    var requiredFiles = {
        'network-infrastructure-form': ['dept_network_diagram', 'regional_network_diagram'],
        'enterprise-architecture-form': ['ea_diagram']
    };
    for (var sectionKey in requiredFiles) {
        try {
            var sectionData = JSON.parse(localStorage.getItem(sectionKey)) || {};
            var fileFields = requiredFiles[sectionKey];
            for (var i = 0; i < fileFields.length; i++) {
                var f = fileFields[i];
                var val = sectionData[f];
                if (!val || typeof val !== 'string' || val.trim() === '') {
                    return { valid: false, message: sections[sectionKey].label + ' requires a file upload. Please upload the required diagram(s).' };
                }
            }
        } catch(e) {}
    }

    for (var key in sections) {
        var section = sections[key];
        try {
            var data = JSON.parse(localStorage.getItem(key));
            if (!data) {
                return { valid: false, message: section.label + ' section is empty. Please fill in required fields.' };
            }
            for (var field in data) {
                if (field.startsWith('csrf_') || field === '_token') continue;
                if (section.skip.indexOf(field) >= 0) continue;
                // Checkboxes/radios that are unchecked are not in FormData, skip them
                // Only check text-like values
                if (typeof data[field] === 'string' && data[field].trim() === '') {
                    return { valid: false, message: section.label + ' section has empty fields. Please fill in all fields before submitting.' };
                }
            }
        } catch(e) {
            return { valid: false, message: section.label + ' section has invalid data. Please check and save again.' };
        }
    }

    return { valid: true };
}

function submitISSP() {
    var check = areAllFormsComplete();
    if (!check.valid) {
        showAlertModal('Incomplete Form', check.message);
        return;
    }

    // Show confirmation modal
    showConfirmModal('Are you sure you want to submit your ISSP for review? This action cannot be undone.', function() {
        const submitBtn = document.getElementById('submitIsspBtn');
        submitBtn.disabled = true;
        submitBtn.innerHTML = '<i class="fa-solid fa-spinner fa-spin me-2"></i>Submitting...';

        const csrfToken = document.querySelector('meta[name="csrf-token"]')?.getAttribute('content') || 
                         document.querySelector('input[name="csrf_test_name"]')?.value;

        var editId = localStorage.getItem('edit_project_id');
        fetch('<?= site_url('employee/submit-issp') ?>', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-Requested-With': 'XMLHttpRequest'
            },
            body: JSON.stringify({
                csrf_test_name: csrfToken,
                form_data: collectFormData(),
                id: editId || null
            })
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                localStorage.clear();
                showAlertModal('Success', 'ISSP submitted successfully!');
                window.location.href = '<?= site_url('employee/submitted-ict-projects') ?>';
            } else {
                showAlertModal('Error', 'Error submitting ISSP: ' + (data.message || 'Please try again.'));
                submitBtn.disabled = false;
                submitBtn.innerHTML = '<i class="fa-solid fa-paper-plane me-2"></i>Submit Project';
            }
        })
        .catch(error => {
            console.error('Error:', error);
            showAlertModal('Error', 'Error submitting ISSP. Please try again.');
            submitBtn.disabled = false;
            submitBtn.innerHTML = '<i class="fa-solid fa-paper-plane me-2"></i>Submit Project';
        });
    });
}
</script>