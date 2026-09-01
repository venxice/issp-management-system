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
}
</style>

<div class="row">
    <div class="col-12">
        <div class="page-header mb-3">
            <h1 class="page-title">Mandate, Vision, Mission, and Organizational Outcome</h1>
            <p class="page-subtitle">Agency mandate, vision, and mission statements.</p>
        </div>
    </div>
</div>

<form id="mainForm" action="<?= site_url('ict-planner/agency-information/mandate-vision-mission/save') ?>" method="post">
    <?= csrf_field() ?>

    <div class="main-section-card">
        <div class="main-header">
            <h2 class="main-title">A. Mandate, Vision, Mission, and Organizational Outcome</h2>
        </div>

        <div style="padding: 22px;">
            <!-- A.1 Mandate -->
            <div class="subsection-card">
                <div class="subsection-header">
                    <span class="subsection-number">A.1</span>
                    <span class="subsection-title">Mandate</span>
                    <i class="fa-solid fa-circle-question help-icon" data-tooltip="Describe the legal or official function and responsibilities of your agency as defined by law, executive order, or other official issuance."></i>
                </div>
                <div class="subsection-body">
                    <div class="row g-3">
                        <div class="col-md-12">
                            <div class="form-section-label">
                                <span>Legal Basis</span>
                            </div>
                            <textarea class="form-control" name="legal_basis" rows="3" placeholder="e.g., RA 10844 - Department of Information and Communications Technology Act of 2015"><?= old('legal_basis', $saved['legal_basis'] ?? '') ?></textarea>
                        </div>
                        <div class="col-md-12">
                            <div class="form-section-label">
                                <span>Function</span>
                            </div>
                            <textarea class="form-control" name="function" rows="4" placeholder="List the functions of your agency as defined by the legal basis..."><?= old('function', $saved['function'] ?? '') ?></textarea>
                        </div>
                    </div>
                </div>
            </div>

            <!-- A.2 Vision Statement -->
            <div class="subsection-card">
                <div class="subsection-header">
                    <span class="subsection-number">A.2</span>
                    <span class="subsection-title">Vision Statement</span>
                    <i class="fa-solid fa-circle-question help-icon" data-tooltip="State the organization's intended future direction or long-term desired position. This should reflect what the agency aims to achieve in the long run."></i>
                </div>
                <div class="subsection-body">
                    <div class="row g-3">
                        <div class="col-md-12">
                            <div class="form-section-label">
                                <span>Vision Statement</span>
                            </div>
                            <textarea class="form-control" name="vision_statement" rows="4" placeholder="Enter the agency's vision statement..."><?= old('vision_statement', $saved['vision_statement'] ?? '') ?></textarea>
                        </div>
                    </div>
                </div>
            </div>

            <!-- A.3 Mission Statement -->
            <div class="subsection-card">
                <div class="subsection-header">
                    <span class="subsection-number">A.3</span>
                    <span class="subsection-title">Mission Statement</span>
                    <i class="fa-solid fa-circle-question help-icon" data-tooltip="Outline the agency's core purpose and primary objectives. This should explain what the agency does, for whom, and how it delivers its mandate."></i>
                </div>
                <div class="subsection-body">
                    <div class="row g-3">
                        <div class="col-md-12">
                            <div class="form-section-label">
                                <span>Mission Statement</span>
                            </div>
                            <textarea class="form-control" name="mission_statement" rows="4" placeholder="Enter the agency's mission statement..."><?= old('mission_statement', $saved['mission_statement'] ?? '') ?></textarea>
                        </div>
                    </div>
                </div>
            </div>

            <!-- A.4 Organizational Outcome -->
            <div class="subsection-card">
                <div class="subsection-header">
                    <span class="subsection-number">A.4</span>
                    <span class="subsection-title">Organizational Outcome</span>
                    <i class="fa-solid fa-circle-question help-icon" data-tooltip="Categorize outcomes based on agency type: Organizational Outcomes (OO) for NGAs, Strategic Objectives (SO) for GOCCs, or Major Final Outputs (MFO) for LGUs. Include programs under each particular OO/SO/MFO."></i>
                </div>
                <div class="subsection-body">
                    <div class="row g-3">
                        <div class="col-md-12">
                            <div class="form-section-label">
                                <span>Organizational Outcome</span>
                            </div>
                            <textarea class="form-control" name="organizational_outcome" rows="5" placeholder="List organizational outcomes and their corresponding programs..."><?= old('organizational_outcome', $saved['organizational_outcome'] ?? '') ?></textarea>
                        </div>
                    </div>
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
                    <button type="button" class="nav-btn nav-btn-next" onclick="window.navigateToPage('<?= site_url('ict-planner/agency-information/organizational-structure') ?>')">
                        <span>Organizational Structure</span>
                        <i class="fa-solid fa-arrow-right"></i>
                    </button>
                </div>
            </div>
        </div>
    </div>
</form>

<script>
const STORAGE_KEY = 'ict_planner_mandate_vision_mission';

window.saveFormData = function() {
    const form = document.querySelector('#mainForm');
    const data = {};
    form.querySelectorAll('input[name], textarea[name], select[name]').forEach(function(el) {
        data[el.name] = el.value;
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
            if (el.name in data && data[el.name] !== null && !el.value) {
                el.value = data[el.name];
            }
        });
    } catch (e) {
        console.error('Error loading saved data:', e);
    }
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
    saveFormData();
    document.querySelector('#mainForm').submit();
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
</script>

<?= $this->endSection() ?>
