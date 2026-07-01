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
.submit-issp-btn i, .save-draft-btn i {
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

<a class="edit-back-link" href="<?= site_url('employee/draft-ict-projects') ?>" id="backToDraftsLink">
    <i class="fa-solid fa-arrow-left"></i> Back to Drafts
</a>

<div class="sidebar-section-title">Proposed ICT Strategy</div>

<a class="nav-link <?= $active === 'network-infrastructure' ? 'active' : '' ?>" href="<?= site_url('employee/edit-ict-project/'.$editId.'/network-infrastructure') ?>" data-form-key="network-infrastructure-form">
    <span class="status-indicator not-started"></span> Network Infrastructure
</a>

<a class="nav-link <?= $active === 'enterprise-architecture' ? 'active' : '' ?>" href="<?= site_url('employee/edit-ict-project/'.$editId.'/enterprise-architecture') ?>" data-form-key="enterprise-architecture-form">
    <span class="status-indicator not-started"></span> Enterprise Architecture
</a>

<a class="nav-link <?= $active === 'ict-human-capital' ? 'active' : '' ?>" href="<?= site_url('employee/edit-ict-project/'.$editId.'/ict-human-capital') ?>" data-form-key="ict-human-capital-form">
    <span class="status-indicator not-started"></span> ICT Human Capital
</a>

<a class="nav-link <?= $active === 'information-systems' ? 'active' : '' ?>" href="<?= site_url('employee/edit-ict-project/'.$editId.'/information-systems') ?>" data-form-key="information-systems-form">
    <span class="status-indicator not-started"></span> Information Systems
</a>

<a class="nav-link <?= $active === 'ict-projects' ? 'active' : '' ?>" href="<?= site_url('employee/edit-ict-project/'.$editId.'/ict-projects') ?>" data-form-key="ict-projects-form">
    <span class="status-indicator not-started"></span> ICT Projects
</a>

<a class="nav-link <?= $active === 'performance-measurement' ? 'active' : '' ?>" href="<?= site_url('employee/edit-ict-project/'.$editId.'/performance-measurement') ?>" data-form-key="performance-measurement-form">
    <span class="status-indicator not-started"></span> Performance Framework
</a>

<div class="sidebar-section-title">Resource Requirements</div>

<a class="nav-link <?= $active === 'year1-requirements' ? 'active' : '' ?>" href="<?= site_url('employee/edit-ict-project/'.$editId.'/year1-requirements') ?>">
    <span class="status-indicator not-started"></span> Year 1 Requirements
</a>

<a class="nav-link <?= $active === 'year2-requirements' ? 'active' : '' ?>" href="<?= site_url('employee/edit-ict-project/'.$editId.'/year2-requirements') ?>">
    <span class="status-indicator not-started"></span> Year 2 Requirements
</a>

<a class="nav-link <?= $active === 'year3-requirements' ? 'active' : '' ?>" href="<?= site_url('employee/edit-ict-project/'.$editId.'/year3-requirements') ?>">
    <span class="status-indicator not-started"></span> Year 3 Requirements
</a>

<a class="nav-link <?= $active === 'general-summary' ? 'active' : '' ?>" href="<?= site_url('employee/edit-ict-project/'.$editId.'/general-summary') ?>">
    <span class="status-indicator not-started"></span> General Summary
</a>

<a class="nav-link <?= $active === 'fund-source' ? 'active' : '' ?>" href="<?= site_url('employee/edit-ict-project/'.$editId.'/fund-source') ?>">
    <span class="status-indicator not-started"></span> Fund Source
</a>

<a class="nav-link <?= $active === 'statement-expenditure' ? 'active' : '' ?>" href="<?= site_url('employee/edit-ict-project/'.$editId.'/statement-expenditure') ?>">
    <span class="status-indicator not-started"></span> Statement of Expenditure
</a>

<a class="nav-link <?= $active === 'object-expenditure' ? 'active' : '' ?>" href="<?= site_url('employee/edit-ict-project/'.$editId.'/object-expenditure') ?>">
    <span class="status-indicator not-started"></span> Object of Expenditure
</a>
 
<div class="sidebar-footer-submit mt-3">
    <button type="button" class="submit-issp-btn" id="submitIsspBtn" onclick="submitEditProject()">
        <i class="fa-solid fa-paper-plane me-2"></i>Submit Project
    </button>
</div>

<script>
function collectFormData() {
    var keys = [
        'network-infrastructure-form',
        'enterprise-architecture-form',
        'ict-human-capital-form',
        'information-systems-form',
        'ict-projects-form',
        'performance-measurement-form'
    ];
    var data = {};
    keys.forEach(function(key) {
        try {
            var saved = localStorage.getItem(key);
            if (saved) {
                data[key] = JSON.parse(saved);
            }
        } catch(e) {
            console.warn('Failed to parse localStorage key:', key, e);
        }
    });
    return data;
}

function saveEditDraft() {
    // Save current form to localStorage first
    if (typeof window.saveChanges === 'function') {
        window.saveChanges(false);
    }

    var btn = document.getElementById('editSaveBtn');
    if (btn) {
        btn.disabled = true;
        btn.innerHTML = '<i class="fa-solid fa-spinner fa-spin me-2"></i>Saving...';
    }

    var csrfToken = document.querySelector('meta[name="csrf-token"]')?.getAttribute('content');
    var editId = <?= json_encode($editId) ?>;

    fetch('<?= site_url('employee/save-draft') ?>', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-Requested-With': 'XMLHttpRequest'
        },
        body: JSON.stringify({
            csrf_test_name: csrfToken,
            form_data: collectFormData(),
            id: editId
        })
    })
    .then(function(r) { return r.json(); })
    .then(function(data) {
        if (data.success) {
            showAlertModal('Success', 'Draft saved successfully!');
        } else {
            showAlertModal('Error', 'Error saving: ' + (data.message || 'Please try again.'));
        }
        if (btn) {
            btn.disabled = false;
            btn.innerHTML = '<i class="fa-solid fa-floppy-disk me-2"></i>Save Changes';
        }
    })
    .catch(function() {
        showAlertModal('Error', 'Error saving. Please try again.');
        if (btn) {
            btn.disabled = false;
            btn.innerHTML = '<i class="fa-solid fa-floppy-disk me-2"></i>Save Changes';
        }
    });
}

function areAllFormsComplete() {
    var sections = {
        'network-infrastructure-form': { label: 'Network Infrastructure', skip: ['dept_network_diagram','regional_network_diagram'] },
        'enterprise-architecture-form': { label: 'Enterprise Architecture', skip: ['ea_diagram'] },
        'ict-human-capital-form': { label: 'ICT Human Capital', skip: [] },
        'information-systems-form': { label: 'Information Systems', skip: [] },
        'ict-projects-form': { label: 'ICT Projects', skip: [] },
        'performance-measurement-form': { label: 'Performance Measurement', skip: [] }
    };

    try {
        var ictProjects = JSON.parse(localStorage.getItem('ict-projects-form'));
        if (!ictProjects || !ictProjects.internal_project_title || ictProjects.internal_project_title.trim() === '') {
            return { valid: false, message: 'ICT Project Title is required in the ICT Projects section.' };
        }
    } catch(e) {
        return { valid: false, message: 'ICT Projects section is empty. Please fill in required fields.' };
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

function submitEditProject() {
    var check = areAllFormsComplete();
    if (!check.valid) {
        showAlertModal('Incomplete Form', check.message);
        return;
    }

    showConfirmModal('Are you sure you want to submit this project for review?', function() {
        // Save current form data to localStorage first so collectFormData() has it
        if (typeof window.saveChanges === 'function') {
            window.saveChanges(false);
        }

        var btn = document.getElementById('submitIsspBtn');
        btn.disabled = true;
        btn.innerHTML = '<i class="fa-solid fa-spinner fa-spin me-2"></i>Submitting...';

        var csrfToken = document.querySelector('meta[name="csrf-token"]')?.getAttribute('content');
        var editId = <?= json_encode($editId) ?>;

        fetch('<?= site_url('employee/submit-issp') ?>', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-Requested-With': 'XMLHttpRequest'
            },
            body: JSON.stringify({
                csrf_test_name: csrfToken,
                form_data: collectFormData(),
                id: editId
            })
        })
        .then(function(r) { return r.json(); })
        .then(function(data) {
            if (data.success) {
                showAlertModal('Success', 'Project submitted successfully!');
                window.location.href = '<?= site_url('employee/submitted-ict-projects') ?>';
            } else {
                showAlertModal('Error', 'Error submitting: ' + (data.message || 'Please try again.'));
                btn.disabled = false;
                btn.innerHTML = '<i class="fa-solid fa-paper-plane me-2"></i>Submit';
            }
        })
        .catch(function() {
            showAlertModal('Error', 'Error submitting. Please try again.');
            btn.disabled = false;
            btn.innerHTML = '<i class="fa-solid fa-paper-plane me-2"></i>Submit';
        });
    });
}

function updateStatusIndicators() {
    document.querySelectorAll('.app-sidebar .nav-link[data-form-key]').forEach(function(link) {
        var storageKey = link.getAttribute('data-form-key');
        var indicator = link.querySelector('.status-indicator');
        if (!indicator || !storageKey) return;

        try {
            var data = localStorage.getItem(storageKey);
            if (data) {
                var parsed = JSON.parse(data);
                var skip = ['dept_network_diagram','regional_network_diagram','ea_diagram'];
                if (storageKey === 'network-infrastructure-form') skip = ['dept_network_diagram','regional_network_diagram'];
                else if (storageKey === 'enterprise-architecture-form') skip = ['ea_diagram'];
                else skip = [];
                var totalReal = 0;
                var emptyReal = 0;
                Object.entries(parsed).forEach(function(entry) {
                    var key = entry[0], v = entry[1];
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

    document.querySelectorAll('a.nav-link[href]').forEach(function(link) {
        link.addEventListener('click', function(e) {
            e.preventDefault();
            if (typeof window.saveChanges === 'function') {
                window.saveChanges(false);
            }
            setTimeout(function() {
                window.location.href = link.href;
            }, 100);
        });
    });

    var backLink = document.getElementById('backToDraftsLink');
    if (backLink) {
        backLink.addEventListener('click', function(e) {
            e.preventDefault();
            // Save to localStorage first
            if (typeof window.saveChanges === 'function') {
                window.saveChanges(false);
            }
            // Then save to DB so data persists even if localStorage is cleared later
            var csrfToken = document.querySelector('meta[name="csrf-token"]')?.getAttribute('content');
            var editId = <?= json_encode($editId) ?>;
            fetch('<?= site_url('employee/save-draft') ?>', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-Requested-With': 'XMLHttpRequest'
                },
                body: JSON.stringify({
                    csrf_test_name: csrfToken,
                    form_data: collectFormData(),
                    id: editId
                })
            })
            .then(function(r) { return r.json(); })
            .catch(function() {})
            .finally(function() {
                // Clear all form keys first to prevent stale draft data
                var formKeys = ['network-infrastructure-form','enterprise-architecture-form','ict-human-capital-form','information-systems-form','ict-projects-form','performance-measurement-form'];
                formKeys.forEach(function(k) {
                    localStorage.removeItem(k);
                });
                // Restore new project backup if it exists
                var backup = localStorage.getItem('new-project-backup');
                if (backup) {
                    try {
                        var parsed = JSON.parse(backup);
                        Object.keys(parsed).forEach(function(k) {
                            if (parsed[k]) localStorage.setItem(k, parsed[k]);
                        });
                    } catch(e) {}
                    localStorage.removeItem('new-project-backup');
                }
                localStorage.removeItem('edit_project_id');
                window.location.href = backLink.href;
            });
        });
    }
});
</script>
