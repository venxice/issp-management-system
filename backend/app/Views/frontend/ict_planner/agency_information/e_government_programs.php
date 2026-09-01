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

.section-card {
    background: var(--panel);
    border: 1px solid #dde4ed;
    border-radius: 10px;
    box-shadow: 0 12px 26px rgba(15, 23, 42, .05);
    overflow: hidden;
    margin-bottom: 20px;
}

.section-header {
    background: linear-gradient(180deg, #566d8b 0%, var(--brand) 100%);
    color: #fff;
    padding: 14px 18px;
    border-bottom: 1px solid rgba(255,255,255,.1);
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 10px;
}

.section-header .section-title {
    font-size: .98rem;
    font-weight: 700;
    margin: 0;
    color: #fff;
}

.section-header .section-subtitle {
    font-size: .76rem;
    color: rgba(255,255,255,.82);
    margin: 4px 0 0;
}

.section-body {
    padding: 18px;
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

.subsection-body {
    padding: 18px;
}

.info-banner {
    background: linear-gradient(135deg, #e8f4f8 0%, #f0f6fa 100%);
    border-left: 4px solid var(--brand);
    border-radius: 6px;
    padding: 12px 16px;
    margin-bottom: 16px;
    color: var(--ink);
    font-size: .82rem;
}

.info-banner i {
    color: var(--brand);
    margin-right: 8px;
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

@media (max-width: 768px) {
    .navigation-bar {
        flex-direction: column;
        gap: 8px;
    }
    
    .nav-btn {
        width: 100%;
        justify-content: center;
    }
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
    gap: 8px;
}

.section-card{
    background:#fff;
    border:1px solid #e5e7eb;
    border-radius:12px;
    margin-bottom:20px;
    box-shadow:0 2px 8px rgba(0,0,0,.04);
}

.section-body{
    padding:24px;
}

.section-card h5{
    color:#1f2937;
    font-size:18px;
    font-weight:700;
}

.section-card p{
    color:#6b7280;
}

.btn-group .btn{
    min-width:70px;
}

.no-options{
    margin-top:20px;
    background:#f8fafc;
    border-radius:8px;
    padding:15px;
}

.form-check{
    margin-bottom:8px;
}

.badge{
    font-size:13px;
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
        width: 100%;
        justify-content: center;
    }
}

.file-upload-area {
    border: 2px dashed #d0dae6;
    border-radius: 8px;
    padding: 24px;
    text-align: center;
    background: #fafbfc;
    transition: all 0.2s ease;
}

.file-upload-area:hover {
    border-color: var(--brand);
    background: #f8fafc;
}

.file-upload-area i {
    font-size: 1.5rem;
    color: var(--brand);
    margin-bottom: 8px;
}

.file-upload-area p {
    font-size: .8rem;
    color: var(--muted);
    margin: 0;
}

.security-section {
    margin-bottom: 24px;
}

.security-section-header {
    background: linear-gradient(180deg, #566d8b 0%, var(--brand) 100%);
    color: #fff;
    padding: 12px 16px;
    border-radius: 8px;
    margin-bottom: 16px;
}

.security-section-header h6 {
    margin: 0;
    font-weight: 700;
    font-size: .88rem;
}

.cybersecurity-table {
    width: 100%;
    border-collapse: separate;
    border-spacing: 0;
}

.cybersecurity-table th {
    background: linear-gradient(135deg, #f8fafc 0%, #edf2f7 100%);
    color: var(--ink);
    font-weight: 700;
    font-size: .8rem;
    padding: 10px 12px;
    border-bottom: 2px solid #d0dae6;
    text-transform: uppercase;
    letter-spacing: .01em;
}

.cybersecurity-table td {
    padding: 12px;
    border-bottom: 1px solid #e8ecf1;
    vertical-align: top;
}

.cybersecurity-table tr:last-child td {
    border-bottom: none;
}

.cybersecurity-table tr:hover {
    background: #f8fafc;
}

.control-name {
    font-weight: 600;
    color: var(--ink);
    font-size: .85rem;
    margin-bottom: 4px;
}

.control-description {
    font-size: .76rem;
    color: var(--muted);
    line-height: 1.4;
}

.form-control-sm {
    font-size: .78rem;
    padding: 6px 10px;
    border: 1px solid #d0dae6;
    border-radius: 4px;
    resize: vertical;
    min-height: 60px;
}

.checkbox-wrapper {
    display: flex;
    flex-direction: column;
    align-items: center;
    gap: 4px;
}

.mandatory-label {
    font-size: .7rem;
    color: var(--muted);
    font-weight: 600;
}

.mandatory-badge {
    background: #dc3545;
    color: #fff;
    padding: 2px 8px;
    border-radius: 4px;
    font-size: .7rem;
    font-weight: 600;
}

.optional-badge {
    background: #6c757d;
    color: #fff;
    padding: 2px 8px;
    border-radius: 4px;
    font-size: .7rem;
    font-weight: 600;
}

.checklist-container {
    background: #fff;
    border: 1px solid #e8ecf1;
    border-radius: 8px;
    padding: 20px;
    margin-bottom: 16px;
}

.category-section {
    margin-bottom: 24px;
    padding-bottom: 20px;
    border-bottom: 1px solid #e8ecf1;
}

.category-section:last-child {
    border-bottom: none;
    margin-bottom: 0;
    padding-bottom: 0;
}

.category-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 16px;
}

.category-title {
    font-size: 1rem;
    font-weight: 700;
    color: var(--brand-dark);
    text-transform: uppercase;
    letter-spacing: .02em;
}

.category-stats {
    display: flex;
    gap: 12px;
    font-size: .85rem;
    font-weight: 600;
}

.stat-item {
    padding: 4px 12px;
    border-radius: 20px;
    background: #f8fafc;
    color: var(--muted);
}

.stat-item.completed {
    background: #dcfce7;
    color: #166534;
}

.stat-item.mandatory-completed {
    background: #dbeafe;
    color: #1e40af;
}

.control-item {
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: 10px 12px;
    margin-bottom: 8px;
    border-radius: 6px;
    background: #f8fafc;
    transition: all 0.2s ease;
}

.control-item:hover {
    background: #f1f5f9;
}

.control-info {
    display: flex;
    align-items: center;
    gap: 12px;
    flex: 1;
}

.control-checkbox {
    width: 18px;
    height: 18px;
    cursor: pointer;
    accent-color: var(--brand);
}

.control-label {
    font-size: .85rem;
    font-weight: 500;
    color: var(--ink);
    line-height: 1.4;
}

.control-badge {
    display: inline-block;
    padding: 2px 8px;
    border-radius: 4px;
    font-size: .7rem;
    font-weight: 600;
    white-space: nowrap;
}

.badge-mandatory {
    background: #566d8b;
    color: #fff;
}

.badge-optional {
    background: #8898aa;
    color: #fff;
}

.badge-notspecified {
    background: #6c757d;
    color: #fff;
}
</style>

<form id="mainForm">
      <?= csrf_field() ?>

<div class="row">
    <div class="col-12">
        <div class="page-header mb-3">
            <h1 class="page-title">E-Government Programs</h1>
            <p class="page-subtitle">E-Government programs and initiatives.</p>
        </div>
    </div>
</div>

<div class="container-fluid">

    <!-- Header -->
    <div class="section-card mb-4">

        <div class="section-header">
            <h3 class="section-title">D. E-Government Programs</h3>

        </div>

        <div class="section-body">

    </div>


    <?php foreach($programs as $program): ?>

    <div class="section-card mb-3">

        <div class="section-body">

            <div class="d-flex justify-content-between">

                <div>

                    <h6 class="fw-bold mb-1">
                        <?= esc($program['title']) ?>
                    </h6>

                    <small class="text-muted">
                        <?= esc($program['description']) ?>
                    </small>

                </div>

                <div>

                   <span
    id="statusBadge<?= $program['id'] ?>"
    class="badge bg-secondary">
    -
</span>
            

                </div>

            </div>

            <hr>

            <label class="form-label">
                Is your agency utilizing this program?
            </label>

            <div class="btn-group">

          <input
    class="btn-check program-radio"
    type="radio"
    name="program_<?= $program['id'] ?>"
    id="yes<?= $program['id'] ?>"
    value="Yes"
    data-program-id="<?= $program['id'] ?>"
    <?= (($saved['program_' . $program['id']] ?? '') === 'Yes') ? 'checked' : '' ?>
    onchange="updateProgramStatus(<?= $program['id'] ?>)">

                <label
                    class="btn btn-outline-success btn-sm"
                    for="yes<?= $program['id'] ?>">
                    Yes
                </label>


              <input
    class="btn-check program-radio"
    type="radio"
    name="program_<?= $program['id'] ?>"
    id="no<?= $program['id'] ?>"
    value="No"
    data-program-id="<?= $program['id'] ?>"
    <?= (($saved['program_' . $program['id']] ?? '') === 'No') ? 'checked' : '' ?>
    onchange="updateProgramStatus(<?= $program['id'] ?>)">

                <label
                    class="btn btn-outline-danger btn-sm"
                    for="no<?= $program['id'] ?>">
                    No
                </label>

            </div>

            <div class="mt-3">

                <label class="form-label">
                    If No, indicate:
                </label>

                <div class="form-check">
                    <input
    class="form-check-input"
    type="checkbox"
    name="program_<?= $program['id'] ?>_equivalent_system"
    <?= !empty($saved['program_' . $program['id'] . '_equivalent_system']) ? 'checked' : '' ?>>

                    <label class="form-check-label">
                        Using equivalent system
                    </label>
                </div>

                <div class="form-check">
                   <input
    class="form-check-input"
    type="checkbox"
    name="program_<?= $program['id'] ?>_manual_processing"
    <?= !empty($saved['program_' . $program['id'] . '_manual_processing']) ? 'checked' : '' ?>>

                    <label class="form-check-label">
                        Manual Processing
                    </label>
                </div>

                <div class="form-check">
                    <input
    class="form-check-input"
    type="checkbox"
    name="program_<?= $program['id'] ?>_proposed_development"
    <?= !empty($saved['program_' . $program['id'] . '_proposed_development']) ? 'checked' : '' ?>>

                    <label class="form-check-label">
                        Proposed Development
                    </label>
                </div>

            </div>

        </div>

    </div>

    <?php endforeach; ?>

<!-- Footer Actions -->
            <div class="footer-actions" style="margin-top:20px;">
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
                    <button type="button" class="nav-btn nav-btn-prev" onclick="window.navigateToPage('<?= site_url('ict-planner/agency-information/information-systems-inventory') ?>')">
                        <i class="fa-solid fa-arrow-left"></i>
                        <span>Information Systems Inventory</span>
                    </button>
                </div>
            </div>
        </div>
    </div>
</form>

<script>
const STORAGE_KEY = 'e-government-programs-form';

window.saveFormData = function() {

    const form = document.querySelector('#mainForm');
    const data = {};

    form.querySelectorAll('input[name], textarea[name], select[name]').forEach(function(el) {

        if (el.type === 'radio') {

            if (el.checked) {
                data[el.name] = el.value;
            }

        } else if (el.type === 'checkbox') {

            data[el.name] = el.checked;

        } else {

            data[el.name] = el.value;

        }

    });

    localStorage.setItem(STORAGE_KEY, JSON.stringify(data));

    return data;
};

window.loadSavedData = function() {

    const saved = localStorage.getItem(STORAGE_KEY);

    if (!saved) return;

    try {

        const data = JSON.parse(saved);

        const form = document.querySelector('#mainForm');

        form.querySelectorAll('input[name], textarea[name], select[name]').forEach(function(el) {

            if (!(el.name in data)) return;

            if (el.type === 'radio') {

                el.checked = (el.value === data[el.name]);

            } else if (el.type === 'checkbox') {

                el.checked = data[el.name];

            } else {

                el.value = data[el.name];

            }

        });

        
        document.querySelectorAll('[id^="statusBadge"]').forEach(function(badge) {

            const id = badge.id.replace('statusBadge', '');

            updateProgramStatus(id);

        });

    } catch (e) {

        console.error(e);

    }

};

window.clearForm = function() {

    const clearAction = function() {

        const form = document.querySelector('#mainForm');

        if (!form) {
            showAlertModal('Error', 'Form not found.');
            return;
        }

        form.querySelectorAll('input:not([type="hidden"]):not([type="file"]), textarea, select')
        .forEach(function(el){

            if (el.type === 'checkbox' || el.type === 'radio') {
                el.checked = false;
            } else {
                el.value = '';
            }

        });

        // Remove previews
        form.querySelectorAll('.file-preview').forEach(el => el.remove());

        // Reset all of the badges
        document.querySelectorAll('[id^="statusBadge"]').forEach(function(badge){

            const id = badge.id.replace('statusBadge','');

            updateProgramStatus(id);

        });

        document.querySelectorAll('[id^="statusBadge"]').forEach(function(badge) {

    const id = badge.id.replace('statusBadge', '');

    updateProgramStatus(id);

});

        localStorage.removeItem(STORAGE_KEY);

        if (typeof updateStatusIndicators === 'function') {
            updateStatusIndicators();
        }

        showAlertModal('Success', 'Form has been cleared successfully.');
    };

    if (typeof showConfirmModal === 'function') {

        showConfirmModal(
            'Are you sure you want to clear all fields? This action cannot be undone.',
            clearAction
        );

    } else {

        if (confirm('Are you sure you want to clear all fields? This action cannot be undone.')) {
            clearAction();
        }

    }

};

window.saveChanges = function() {

    const form = document.querySelector('#mainForm');

    if (!form) {
        showAlertModal('Error', 'Form not found.');
        return;
    }

    form.action = "<?= site_url('ict-planner/agency-information/e-government-programs/save') ?>";
    form.method = "POST";

    form.submit();
};

window.navigateToPage = function(url) {
    window.location.href = url;
};

function updateProgramStatus(id) {

    const yes = document.getElementById('yes' + id);
    const no = document.getElementById('no' + id);
    const badge = document.getElementById('statusBadge' + id);

    if (!yes || !no || !badge) {
        console.warn('Program elements not found:', id);
        return;
    }

    if (yes.checked) {

        badge.textContent = 'Utilizing';
        badge.className = 'badge bg-success';

    } else if (no.checked) {

        badge.textContent = 'Not Utilizing';
        badge.className = 'badge bg-danger';

    } else {

        badge.textContent = '-';
        badge.className = 'badge bg-secondary';

    }
}

document.addEventListener('DOMContentLoaded', function() {

    document.querySelectorAll('[id^="statusBadge"]').forEach(function(badge) {

        const id = badge.id.replace('statusBadge', '');

        updateProgramStatus(id);

    });

    document.querySelectorAll('.program-radio').forEach(function(radio) {

    radio.addEventListener('change', function() {

        const programId = this.dataset.programId;

        updateProgramStatus(programId);
        saveFormData();

    });

});

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

            const tooltip =
                document.getElementById('active-tooltip');

            if (tooltip) {
                tooltip.remove();
            }

        });

    });

});
</script>

<?= $this->endSection() ?>   