<?= $this->extend('frontend/layout/app') ?>

<?= $this->section('content') ?>
<style>
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

.page-header {
    display: flex;
    align-items: center;
    gap: 12px;
}

.page-header .help-icon {
    font-size: 1.2rem;
    margin-top: 8px;
}

.action-bar {
    background: var(--panel);
    border: 1px solid #dde4ed;
    border-radius: 10px;
    padding: 16px 18px;
    box-shadow: 0 12px 26px rgba(15, 23, 42, .05);
    position: sticky;
    bottom: 14px;
    z-index: 100;
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

.help-icon {
    position: relative;
    cursor: pointer;
    color: var(--brand);
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
</style>

<div class="row">
    <div class="col-12">
        <div class="page-header mb-3">
            <div>
                <h1 class="page-title">Enterprise Architecture Design</h1>
                <p class="page-subtitle">Enterprise architecture structure and operation</p>
            </div>
        </div>
    </div>
</div>

<form action="<?= site_url('employee/proposed-ict-strategy/enterprise-architecture/save') ?>" method="post" enctype="multipart/form-data">
    <?= csrf_field() ?>

    <!-- Enterprise Architecture Diagram -->
    <div class="row mb-3">
        <div class="col-12">
            <div class="section-card">
                <div class="section-header">
                    <div>
                        <h5 class="section-title">B. Enterprise Architecture Diagram</h5>
                        <p class="section-subtitle">Visual representation of the proposed architecture</p>
                    </div>
                </div>
                <div class="section-body">
            <div class="form-section-label">
                <span>Architecture Visualization</span>
                <i class="fa-solid fa-circle-question help-icon"
                data-tooltip="Upload a visual representation of your agency's proposed enterprise architecture showing structure and operation."></i>
            </div>   
                    <div class="row g-3">
                        <div class="col-md-12">
                            <div class="file-upload-area">
                                <i class="fa-solid fa-cloud-arrow-up"></i>
                                <p>Upload enterprise architecture diagram showing structure and operation</p>
                                <input type="file" class="form-control mt-2" name="ea_diagram" accept="image/*,.pdf">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <label class="form-label">Description</label>
                            <textarea class="form-control" name="ea_description" rows="4" placeholder="Describe the enterprise architecture structure and operation..."></textarea>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer Actions -->
    <div class="row mb-4">
        <div class="col-12">
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
                    <button type="button" class="nav-btn nav-btn-prev" onclick="window.navigateToPage('<?= site_url('employee/proposed-ict-strategy/network-infrastructure') ?>')">
                        <i class="fa-solid fa-arrow-left"></i>
                        <span>Network Infrastructure</span>
                    </button>
                    <button type="button" class="nav-btn nav-btn-next" onclick="window.navigateToPage('<?= site_url('employee/proposed-ict-strategy/ict-human-capital') ?>')">
                        <span>ICT Human Capital</span>
                        <i class="fa-solid fa-arrow-right"></i>
                    </button>
                </div>
            </div>
        </div>
    </div>
</form>

<script>
document.addEventListener('DOMContentLoaded', function() {
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
            
            // Position to the right of the icon
            tooltip.style.left = (rect.right + 8) + 'px';
            tooltip.style.top = rect.top + 'px';
            
            // Make it visible after positioning
            requestAnimationFrame(() => {
                tooltip.classList.add('visible');
                // Adjust position if it goes off screen
                const tooltipRect = tooltip.getBoundingClientRect();
                if (tooltipRect.right > window.innerWidth) {
                    // Position to the left instead
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

    // Auto-save on input change
    const allInputs = document.querySelectorAll('input, textarea, select');
    allInputs.forEach(input => {
        input.addEventListener('change', function() {
            window.saveChanges(false);
        });
    });

    // Load saved data on page load
    window.loadSavedData();
});

// Clear form function
window.clearForm = function() {
    console.log('clearForm called');
    if (confirm('Are you sure you want to clear all fields? This action cannot be undone.')) {
        const form = document.querySelector('form');
        if (form) {
            form.reset();
            // Clear localStorage
            localStorage.removeItem('enterprise-architecture-form');
            console.log('Form cleared');
        }
    }
};

// Save changes to localStorage
window.saveChanges = function(showAlert = true) {
    console.log('saveChanges called with showAlert:', showAlert);
    const form = document.querySelector('form');
    if (form) {
        const formData = new FormData(form);
        const formDataObj = {};
        
        formData.forEach((value, key) => {
            formDataObj[key] = value;
        });
        
        // Save to localStorage
        localStorage.setItem('enterprise-architecture-form', JSON.stringify(formDataObj));
        console.log('Data saved to localStorage');
        
        // Show success message
        if (showAlert) {
            alert('Changes saved locally! You can continue working and your data will be preserved.');
        }
    }
};

// Load saved data from localStorage on page load
window.loadSavedData = function() {
    console.log('loadSavedData called');
    const savedData = localStorage.getItem('enterprise-architecture-form');
    if (savedData) {
        const formDataObj = JSON.parse(savedData);
        const form = document.querySelector('form');
        
        if (form) {
            Object.keys(formDataObj).forEach(key => {
                const input = form.querySelector(`[name="${key}"]`);
                if (input) {
                    if (input.type === 'checkbox') {
                        input.checked = formDataObj[key] === '1';
                    } else if (input.type === 'radio') {
                        const radio = form.querySelector(`[name="${key}"][value="${formDataObj[key]}"]`);
                        if (radio) radio.checked = true;
                    } else {
                        input.value = formDataObj[key];
                    }
                }
            });
            console.log('Data loaded from localStorage');
        }
    }
};

// Navigate to page after saving
window.navigateToPage = function(url) {
    console.log('navigateToPage called with url:', url);
    window.saveChanges(false);
    setTimeout(() => {
        // Verify data was saved before navigating
        const savedData = localStorage.getItem('enterprise-architecture-form');
        console.log('Data in localStorage before navigation:', savedData ? 'exists' : 'empty');
        window.location.href = url;
    }, 500);
};
</script>

<?= $this->endSection() ?>