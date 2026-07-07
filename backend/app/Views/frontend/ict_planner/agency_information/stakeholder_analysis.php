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

.staffing-table {
    width: 100%;
    border-collapse: separate;
    border-spacing: 0;
    border: 1px solid #e2e8f0;
    border-radius: 8px;
    overflow: hidden;
}

.staffing-table th {
    background: linear-gradient(135deg, #f8fafc 0%, #edf2f7 100%);
    color: var(--ink);
    font-weight: 700;
    font-size: .85rem;
    padding: 12px 16px;
    border-bottom: 2px solid #d0dae6;
    text-transform: uppercase;
    letter-spacing: .02em;
}

.staffing-table td {
    padding: 12px 16px;
    border-bottom: 1px solid #e8ecf1;
    vertical-align: middle;
    background: white;
}

.staffing-table tr:last-child td {
    border-bottom: none;
}

.staffing-table tr:hover td {
    background: #f8fafc;
}

.staffing-table .form-control-sm {
    font-size: .78rem;
    padding: 6px 10px;
    border: 1px solid #d0dae6;
    border-radius: 4px;
}

.staffing-table .form-control-sm:focus {
    border-color: var(--brand);
    box-shadow: 0 0 0 2px rgba(79, 101, 132, .1);
}

.staffing-table .delete-btn {
    background: transparent;
    color: #64748b;
    border: 1px solid #cbd5e1;
    border-radius: 6px;
    padding: 6px 10px;
    cursor: pointer;
    transition: all 0.2s ease;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    width: 32px;
    height: 32px;
}

.staffing-table .delete-btn:hover {
    background: #fee2e2;
    color: #dc2626;
    border-color: #fecaca;
}

.staffing-table .delete-btn:active {
    transform: scale(0.95);
}

.add-position-btn {
    background: var(--brand);
    color: white;
    border: none;
    border-radius: 4px;
    padding: 6px 12px;
    font-weight: 600;
    font-size: 0.75rem;
    cursor: pointer;
    transition: all 0.2s ease;
    display: inline-flex;
    align-items: center;
    gap: 4px;
    white-space: nowrap;
}

.add-position-btn:hover {
    background: var(--brand-dark);
    transform: translateY(-1px);
}

.add-position-btn:active {
    transform: translateY(0);
}

.add-position-btn i {
    font-size: 0.75rem;
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
            <h1 class="page-title">Stakeholder Analysis</h1>
            <p class="page-subtitle">Identify stakeholder groups affected by your ICT programs and categorize transaction complexity.</p>
        </div>
    </div>
</div>

<form id="mainForm" action="<?= site_url('ict-planner/agency-information/stakeholder-analysis/save') ?>" method="post">
    <?= csrf_field() ?>

    <div class="main-section-card">
        <div class="main-header">
            <h2 class="main-title">Stakeholder Analysis</h2>
        </div>

        <div style="padding: 22px;">

            <!-- Stakeholder Table -->
            <div class="subsection-card">
                <div class="subsection-header">
                    <span class="subsection-title">Stakeholders Transaction Complexity</span>
                    <i class="fa-solid fa-circle-question help-icon" data-tooltip="Identify stakeholder groups affected by your ICT programs and categorize the complexity of their transactions as Simple, Complex, or Highly Technical. Include citizens, other government agencies, LGUs, private sector partners, NGOs, and others who benefit from or contribute to your ICT programs."></i>
                </div>
                <div class="subsection-body">
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <div class="form-section-label" style="margin:0;border:none;padding:0;">
                        </div>
                        <button type="button" class="add-position-btn" onclick="addStakeholderRow()">
                            <i class="fa-solid fa-plus"></i>
                            Add Stakeholder
                        </button>
                    </div>
                    <div class="table-responsive">
                        <table class="staffing-table" id="stakeholderTable">
                            <thead>
                                <tr>
                                    <th style="width:35%;">Stakeholders</th>
                                    <th style="width:30%;">Transaction Processed</th>
                                    <th style="width:25%;">Complexity</th>
                                    <th style="width:10%;text-align:center;">Action</th>
                                </tr>
                            </thead>
                            <tbody id="stakeholderTableBody">
                                <?php
                                $stakeholders = [];
                                if (!empty($saved['stakeholder_data'])) {
                                    $decoded = json_decode($saved['stakeholder_data'], true);
                                    if (is_array($decoded)) {
                                        $stakeholders = $decoded;
                                    }
                                }
                                if (!empty($stakeholders)):
                                    foreach ($stakeholders as $s): ?>
                                    <tr>
                                        <td><input type="text" class="form-control form-control-sm" name="stakeholder_name[]" value="<?= esc($s['name'] ?? '') ?>" placeholder="Enter stakeholder name"></td>
                                        <td><input type="text" class="form-control form-control-sm" name="stakeholder_transaction[]" value="<?= esc($s['transaction'] ?? '') ?>" placeholder="Enter transaction processed"></td>
                                        <td>
                                            <select class="form-select form-select-sm" name="stakeholder_complexity[]" style="font-size:.78rem;padding:6px 10px;border:1px solid #d0dae6;border-radius:4px;width:100%;">
                                                <option value="Simple" <?= ($s['complexity'] ?? '') === 'Simple' ? 'selected' : '' ?>>Simple</option>
                                                <option value="Complex" <?= ($s['complexity'] ?? '') === 'Complex' ? 'selected' : '' ?>>Complex</option>
                                                <option value="Highly Technical" <?= ($s['complexity'] ?? '') === 'Highly Technical' ? 'selected' : '' ?>>Highly Technical</option>
                                            </select>
                                        </td>
                                        <td class="text-center">
                                            <button type="button" class="delete-btn" onclick="deleteStakeholderRow(this)">
                                                <i class="fa-solid fa-trash"></i>
                                            </button>
                                        </td>
                                    </tr>
                                    <?php endforeach;
                                endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

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
                    <button type="button" class="nav-btn nav-btn-prev" onclick="window.navigateToPage('<?= site_url('ict-planner/agency-information/organizational-structure') ?>')">
                        <i class="fa-solid fa-arrow-left"></i>
                        <span>Organizational Structure</span>
                    </button>
                    <button type="button" class="nav-btn nav-btn-next" onclick="window.navigateToPage('<?= site_url('ict-planner/agency-information/strategic-concerns') ?>')">
                        <span>Strategic Concerns</span>
                        <i class="fa-solid fa-arrow-right"></i>
                    </button>
                </div>
            </div>
        </div>
    </div>
</form>

<script>
const STORAGE_KEY = 'ict_planner_stakeholder_analysis';
let rowCounter = 0;

window.addStakeholderRow = function(data) {
    const tbody = document.getElementById('stakeholderTableBody');
    const rowId = rowCounter++;
    const tr = document.createElement('tr');
    tr.dataset.rowId = rowId;
    tr.innerHTML = `
        <td><input type="text" class="form-control form-control-sm" name="stakeholder_name[]" value="${escapeHtml(data?.name || '')}" placeholder="Enter stakeholder name"></td>
        <td><input type="text" class="form-control form-control-sm" name="stakeholder_transaction[]" value="${escapeHtml(data?.transaction || '')}" placeholder="Enter transaction processed"></td>
        <td>
            <select class="form-select form-select-sm" name="stakeholder_complexity[]" style="font-size:.78rem;padding:6px 10px;border:1px solid #d0dae6;border-radius:4px;width:100%;">
                <option value="Simple" ${data?.complexity === 'Simple' ? 'selected' : ''}>Simple</option>
                <option value="Complex" ${data?.complexity === 'Complex' ? 'selected' : ''}>Complex</option>
                <option value="Highly Technical" ${data?.complexity === 'Highly Technical' ? 'selected' : ''}>Highly Technical</option>
            </select>
        </td>
        <td class="text-center">
            <button type="button" class="delete-btn" onclick="deleteStakeholderRow(this)">
                <i class="fa-solid fa-trash"></i>
            </button>
        </td>
    `;
    tbody.appendChild(tr);
};

window.deleteStakeholderRow = function(btn) {
    const tr = btn.closest('tr');
    if (tr && document.querySelectorAll('#stakeholderTableBody tr').length > 1) {
        tr.remove();
    } else {
        if (typeof showAlertModal === 'function') {
            showAlertModal('Notice', 'You must have at least one stakeholder row.');
        }
    }
};

function escapeHtml(str) {
    if (!str) return '';
    return str.replace(/&/g, '&amp;').replace(/</g, '&lt;').replace(/>/g, '&gt;').replace(/"/g, '&quot;');
}

window.saveFormData = function() {
    const data = { rows: [] };
    document.querySelectorAll('#stakeholderTableBody tr').forEach(function(tr) {
        const name = tr.querySelector('[name="stakeholder_name[]"]')?.value || '';
        const transaction = tr.querySelector('[name="stakeholder_transaction[]"]')?.value || '';
        const complexity = tr.querySelector('[name="stakeholder_complexity[]"]')?.value || 'Simple';
        data.rows.push({ name: name, transaction: transaction, complexity: complexity });
    });
    localStorage.setItem(STORAGE_KEY, JSON.stringify(data));
    return data;
};

window.loadSavedData = function() {
    const tbody = document.getElementById('stakeholderTableBody');
    if (tbody.children.length === 0) {
        addStakeholderRow();
        return;
    }
    // Check localStorage for rows that DB doesn't have yet
    const saved = localStorage.getItem(STORAGE_KEY);
    if (saved) {
        try {
            const data = JSON.parse(saved);
            if (data.rows && data.rows.length > 0 && tbody.children.length === 0) {
                tbody.innerHTML = '';
                data.rows.forEach(function(row) {
                    addStakeholderRow(row);
                });
            }
        } catch (e) {
            console.error('Error loading saved data:', e);
        }
    }
};

window.clearForm = function() {
    if (typeof showConfirmModal === 'function') {
        showConfirmModal('Are you sure you want to clear all fields? This action cannot be undone.', function() {
            const tbody = document.getElementById('stakeholderTableBody');
            tbody.innerHTML = '';
            addStakeholderRow();
            localStorage.removeItem(STORAGE_KEY);
        });
    } else {
        if (confirm('Are you sure you want to clear all fields? This action cannot be undone.')) {
            const tbody = document.getElementById('stakeholderTableBody');
            tbody.innerHTML = '';
            addStakeholderRow();
            localStorage.removeItem(STORAGE_KEY);
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
    helpIcons.forEach(function(icon) {
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

            requestAnimationFrame(function() {
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
