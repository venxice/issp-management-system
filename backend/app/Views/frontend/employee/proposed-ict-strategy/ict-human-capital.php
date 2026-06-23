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
    font-size: .85rem;
    font-weight: 600;
    color: var(--brand-dark);
    margin-bottom: 8px;
    text-transform: uppercase;
    letter-spacing: .02em;
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

.staffing-table {
    width: 100%;
    border-collapse: separate;
    border-spacing: 0;
}

.staffing-table th {
    background: linear-gradient(135deg, #f8fafc 0%, #edf2f7 100%);
    color: var(--ink);
    font-weight: 700;
    font-size: .82rem;
    padding: 10px 12px;
    border-bottom: 2px solid #d0dae6;
    text-transform: uppercase;
    letter-spacing: .01em;
}

.staffing-table td {
    padding: 10px 12px;
    border-bottom: 1px solid #e8ecf1;
    vertical-align: middle;
}

.staffing-table tr:last-child td {
    border-bottom: none;
}

.staffing-table tr:hover {
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

.staffing-table .form-control-sm[readonly] {
    background: #f8fafc;
    color: var(--muted);
}
</style>

<div class="row">
    <div class="col-12">
        <div class="page-header mb-3">
            <h1 class="page-title">C. Proposed ICT Human Capital</h1>
            <p class="page-subtitle">Agency's proposed ICT human capital to support operations and project implementations</p>
        </div>
        
        <div class="info-banner">
            <i class="fa-solid fa-info-circle"></i>
            Please provide information about your agency's proposed ICT human capital to effectively support your agency's day-to-day operations and proposed ICT project implementations.
        </div>
    </div>
</div>

<form action="<?= site_url('employee/proposed-ict-strategy/ict-human-capital/save') ?>" method="post" enctype="multipart/form-data">
    <?= csrf_field() ?>

    <!-- Current ICT Workforce -->
    <div class="row mb-3">
        <div class="col-12">
            <div class="section-card">
                <div class="section-header">
                    <h5 class="section-title">C.i Current ICT Workforce</h5>
                    <p class="section-subtitle">Existing personnel structure and distribution</p>
                </div>
                <div class="section-body">
                    <div class="form-section-label">
                        <i class="fa-solid fa-users me-2"></i>Personnel Summary
                    </div>
                    
                    <div class="row g-3">
                        <div class="col-md-4">
                            <label class="form-label"><i class="fa-solid fa-user-group me-1"></i>Total ICT Personnel</label>
                            <input type="number" class="form-control" name="total_ict_personnel" placeholder="0">
                        </div>
                        <div class="col-md-4">
                            <label class="form-label"><i class="fa-solid fa-user-tie me-1"></i>Permanent Staff</label>
                            <input type="number" class="form-control" name="permanent_staff" placeholder="0">
                        </div>
                        <div class="col-md-4">
                            <label class="form-label"><i class="fa-solid fa-user-clock me-1"></i>Contractual/Job Order</label>
                            <input type="number" class="form-control" name="contractual_staff" placeholder="0">
                        </div>
                        <div class="col-md-12">
                            <label class="form-label"><i class="fa-solid fa-align-left me-1"></i>Current ICT Workforce Description</label>
                            <textarea class="form-control" name="current_workforce_desc" rows="4" placeholder="Describe the current ICT workforce structure and distribution..."></textarea>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Proposed ICT Workforce -->
    <div class="row mb-3">
        <div class="col-12">
            <div class="section-card">
                <div class="section-header">
                    <h5 class="section-title">C.ii Proposed ICT Workforce</h5>
                    <p class="section-subtitle">Target personnel and expansion plans</p>
                </div>
                <div class="section-body">
                    <div class="form-section-label">
                        <i class="fa-solid fa-user-plus me-2"></i>Workforce Expansion
                    </div>
                    
                    <div class="row g-3">
                        <div class="col-md-4">
                            <label class="form-label"><i class="fa-solid fa-bullseye me-1"></i>Target ICT Personnel</label>
                            <input type="number" class="form-control" name="target_ict_personnel" placeholder="0">
                        </div>
                        <div class="col-md-4">
                            <label class="form-label"><i class="fa-solid fa-user-plus me-1"></i>Additional Permanent Staff</label>
                            <input type="number" class="form-control" name="additional_permanent" placeholder="0">
                        </div>
                        <div class="col-md-4">
                            <label class="form-label"><i class="fa-solid fa-user-clock me-1"></i>Additional Contractual</label>
                            <input type="number" class="form-control" name="additional_contractual" placeholder="0">
                        </div>
                        <div class="col-md-12">
                            <label class="form-label"><i class="fa-solid fa-rocket me-1"></i>Workforce Expansion Plan</label>
                            <textarea class="form-control" name="workforce_expansion" rows="4" placeholder="Describe the plan for expanding the ICT workforce..."></textarea>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Staffing by Position/Role -->
    <div class="row mb-3">
        <div class="col-12">
            <div class="section-card">
                <div class="section-header">
                    <h5 class="section-title">C.iii Staffing by Position/Role</h5>
                    <p class="section-subtitle">Detailed breakdown of personnel requirements</p>
                </div>
                <div class="section-body">
                    <div class="form-section-label">
                        <i class="fa-solid fa-table me-2"></i>Position Requirements
                    </div>
                    
                    <div class="table-responsive">
                        <table class="staffing-table">
                            <thead>
                                <tr>
                                    <th style="width: 25%;">Position/Role</th>
                                    <th style="width: 15%; text-align: center;">Current Count</th>
                                    <th style="width: 15%; text-align: center;">Proposed Count</th>
                                    <th style="width: 10%; text-align: center;">Gap</th>
                                    <th style="width: 35%;">Justification</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><input type="text" class="form-control form-control-sm" name="position_1" value="ICT Director/Head"></td>
                                    <td><input type="number" class="form-control form-control-sm" name="current_1"></td>
                                    <td><input type="number" class="form-control form-control-sm" name="proposed_1"></td>
                                    <td><input type="number" class="form-control form-control-sm" name="gap_1" readonly></td>
                                    <td><input type="text" class="form-control form-control-sm" name="justification_1"></td>
                                </tr>
                                <tr>
                                    <td><input type="text" class="form-control form-control-sm" name="position_2" value="Network Administrator"></td>
                                    <td><input type="number" class="form-control form-control-sm" name="current_2"></td>
                                    <td><input type="number" class="form-control form-control-sm" name="proposed_2"></td>
                                    <td><input type="number" class="form-control form-control-sm" name="gap_2" readonly></td>
                                    <td><input type="text" class="form-control form-control-sm" name="justification_2"></td>
                                </tr>
                                <tr>
                                    <td><input type="text" class="form-control form-control-sm" name="position_3" value="Systems Administrator"></td>
                                    <td><input type="number" class="form-control form-control-sm" name="current_3"></td>
                                    <td><input type="number" class="form-control form-control-sm" name="proposed_3"></td>
                                    <td><input type="number" class="form-control form-control-sm" name="gap_3" readonly></td>
                                    <td><input type="text" class="form-control form-control-sm" name="justification_3"></td>
                                </tr>
                                <tr>
                                    <td><input type="text" class="form-control form-control-sm" name="position_4" value="Database Administrator"></td>
                                    <td><input type="number" class="form-control form-control-sm" name="current_4"></td>
                                    <td><input type="number" class="form-control form-control-sm" name="proposed_4"></td>
                                    <td><input type="number" class="form-control form-control-sm" name="gap_4" readonly></td>
                                    <td><input type="text" class="form-control form-control-sm" name="justification_4"></td>
                                </tr>
                                <tr>
                                    <td><input type="text" class="form-control form-control-sm" name="position_5" value="Software Developer"></td>
                                    <td><input type="number" class="form-control form-control-sm" name="current_5"></td>
                                    <td><input type="number" class="form-control form-control-sm" name="proposed_5"></td>
                                    <td><input type="number" class="form-control form-control-sm" name="gap_5" readonly></td>
                                    <td><input type="text" class="form-control form-control-sm" name="justification_5"></td>
                                </tr>
                                <tr>
                                    <td><input type="text" class="form-control form-control-sm" name="position_6" value="ICT Support Staff"></td>
                                    <td><input type="number" class="form-control form-control-sm" name="current_6"></td>
                                    <td><input type="number" class="form-control form-control-sm" name="proposed_6"></td>
                                    <td><input type="number" class="form-control form-control-sm" name="gap_6" readonly></td>
                                    <td><input type="text" class="form-control form-control-sm" name="justification_6"></td>
                                </tr>
                                <tr>
                                    <td><input type="text" class="form-control form-control-sm" name="position_7" value="Cybersecurity Specialist"></td>
                                    <td><input type="number" class="form-control form-control-sm" name="current_7"></td>
                                    <td><input type="number" class="form-control form-control-sm" name="proposed_7"></td>
                                    <td><input type="number" class="form-control form-control-sm" name="gap_7" readonly></td>
                                    <td><input type="text" class="form-control form-control-sm" name="justification_7"></td>
                                </tr>
                                <tr>
                                    <td><input type="text" class="form-control form-control-sm" name="position_8" value="Data Analyst"></td>
                                    <td><input type="number" class="form-control form-control-sm" name="current_8"></td>
                                    <td><input type="number" class="form-control form-control-sm" name="proposed_8"></td>
                                    <td><input type="number" class="form-control form-control-sm" name="gap_8" readonly></td>
                                    <td><input type="text" class="form-control form-control-sm" name="justification_8"></td>
                                </tr>
                                <tr>
                                    <td><input type="text" class="form-control form-control-sm" name="position_other" placeholder="Other positions"></td>
                                    <td><input type="number" class="form-control form-control-sm" name="current_other"></td>
                                    <td><input type="number" class="form-control form-control-sm" name="proposed_other"></td>
                                    <td><input type="number" class="form-control form-control-sm" name="gap_other" readonly></td>
                                    <td><input type="text" class="form-control form-control-sm" name="justification_other"></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Training and Development -->
    <div class="row mb-3">
        <div class="col-12">
            <div class="section-card">
                <div class="section-header">
                    <h5 class="section-title">C.iv Training and Development Plan</h5>
                    <p class="section-subtitle">Capacity building and skill enhancement strategies</p>
                </div>
                <div class="section-body">
                    <div class="form-section-label">
                        <i class="fa-solid fa-graduation-cap me-2"></i>Learning & Development
                    </div>
                    
                    <div class="row g-3">
                        <div class="col-md-12">
                            <label class="form-label"><i class="fa-solid fa-clipboard-check me-1"></i>Training Needs Assessment</label>
                            <textarea class="form-control" name="training_needs" rows="4" placeholder="Identify training needs for ICT workforce..."></textarea>
                        </div>
                        <div class="col-md-12">
                            <label class="form-label"><i class="fa-solid fa-book me-1"></i>Proposed Training Programs</label>
                            <textarea class="form-control" name="training_programs" rows="4" placeholder="List proposed training programs and certifications..."></textarea>
                        </div>
                        <div class="col-md-12">
                            <label class="form-label"><i class="fa-solid fa-chart-line me-1"></i>Capacity Building Strategy</label>
                            <textarea class="form-control" name="capacity_building" rows="4" placeholder="Describe strategies for building ICT workforce capacity..."></textarea>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Recruitment and Retention -->
    <div class="row mb-3">
        <div class="col-12">
            <div class="section-card">
                <div class="section-header">
                    <h5 class="section-title">C.v Recruitment and Retention Strategy</h5>
                    <p class="section-subtitle">Talent acquisition and retention approaches</p>
                </div>
                <div class="section-body">
                    <div class="form-section-label">
                        <i class="fa-solid fa-handshake me-2"></i>Talent Management
                    </div>
                    
                    <div class="row g-3">
                        <div class="col-md-12">
                            <label class="form-label"><i class="fa-solid fa-user-plus me-1"></i>Recruitment Plan</label>
                            <textarea class="form-control" name="recruitment_plan" rows="4" placeholder="Describe strategies for recruiting qualified ICT personnel..."></textarea>
                        </div>
                        <div class="col-md-12">
                            <label class="form-label"><i class="fa-solid fa-heart me-1"></i>Retention Strategies</label>
                            <textarea class="form-control" name="retention_strategies" rows="4" placeholder="Describe strategies for retaining skilled ICT workforce..."></textarea>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Organizational Structure -->
    <div class="row mb-3">
        <div class="col-12">
            <div class="section-card">
                <div class="section-header">
                    <h5 class="section-title">C.vi Organizational Structure</h5>
                    <p class="section-subtitle">Proposed ICT organizational hierarchy and chart</p>
                </div>
                <div class="section-body">
                    <div class="form-section-label">
                        <i class="fa-solid fa-sitemap me-2"></i>Organization Design
                    </div>
                    
                    <div class="row g-3">
                        <div class="col-md-12">
                            <div class="file-upload-area">
                                <i class="fa-solid fa-cloud-arrow-up"></i>
                                <p>Upload the proposed ICT organizational structure chart</p>
                                <input type="file" class="form-control mt-2" name="org_chart" accept="image/*,.pdf">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <label class="form-label"><i class="fa-solid fa-align-left me-1"></i>Structure Description</label>
                            <textarea class="form-control" name="org_structure_desc" rows="4" placeholder="Describe the proposed ICT organizational structure..."></textarea>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Action Buttons -->
    <div class="row mb-4">
        <div class="col-12">
            <div class="action-bar">
                <div class="d-flex flex-wrap gap-2 justify-content-between align-items-center">
                    <div class="d-flex gap-2">
                        <button type="submit" class="btn btn-primary">
                            <i class="fa-solid fa-save me-2"></i>Save Progress
                        </button>
                        <a href="<?= site_url('employee/dashboard') ?>" class="btn btn-outline-secondary">
                            <i class="fa-solid fa-house me-2"></i>Dashboard
                        </a>
                    </div>
                    <div class="d-flex gap-2">
                        <a href="<?= site_url('employee/proposed-ict-strategy/enterprise-architecture') ?>" class="btn btn-outline-secondary">
                            <i class="fa-solid fa-arrow-left me-2"></i>Back: Enterprise Architecture
                        </a>
                        <a href="<?= site_url('employee/dashboard') ?>" class="btn btn-success">
                            Complete Strategy <i class="fa-solid fa-check ms-2"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>

<?= $this->endSection() ?>

<?= $this->section('scripts') ?>
<script>
// Auto-calculate gap fields
document.addEventListener('DOMContentLoaded', function() {
    const table = document.querySelector('.staffing-table');
    if (table) {
        const rows = table.querySelectorAll('tbody tr');
        rows.forEach(row => {
            const currentInput = row.querySelector('input[name^="current_"]');
            const proposedInput = row.querySelector('input[name^="proposed_"]');
            const gapInput = row.querySelector('input[name^="gap_"]');
            
            if (currentInput && proposedInput && gapInput) {
                const calculateGap = function() {
                    const current = parseInt(currentInput.value) || 0;
                    const proposed = parseInt(proposedInput.value) || 0;
                    gapInput.value = proposed - current;
                };
                
                currentInput.addEventListener('input', calculateGap);
                proposedInput.addEventListener('input', calculateGap);
            }
        });
    }
});
</script>
<?= $this->endSection() ?>
