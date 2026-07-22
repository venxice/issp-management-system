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

.form-control-sm, .form-select-sm {
    border: 1px solid #d0dae6;
    border-radius: 6px;
    font-size: .8rem;
    padding: 6px 10px;
    transition: all 0.2s ease;
}

.systems-table {
    width: 100%;
    border-collapse: separate;
    border-spacing: 0;
    border: 1px solid #e2e8f0;
    border-radius: 8px;
    overflow: hidden;
}

.systems-table th {
    background: linear-gradient(135deg, #f8fafc 0%, #edf2f7 100%);
    color: var(--ink);
    font-weight: 700;
    font-size: .85rem;
    padding: 12px 16px;
    border-bottom: 2px solid #d0dae6;
    text-transform: uppercase;
    letter-spacing: .02em;
}

.systems-table td {
    padding: 12px 16px;
    border-bottom: 1px solid #e8ecf1;
    vertical-align: middle;
    background: white;
}

.systems-table tr:last-child td {
    border-bottom: none;
}

.systems-table tr:hover td {
    background: #f8fafc;
}

.systems-table .form-control-sm {
    font-size: .78rem;
    padding: 6px 10px;
    border: 1px solid #d0dae6;
    border-radius: 4px;
}

.systems-table .form-control-sm:focus {
    border-color: var(--brand);
    box-shadow: 0 0 0 2px rgba(79, 101, 132, .1);
}

.systems-table .form-select-sm {
    font-size: .78rem;
    padding: 6px 10px;
    border: 1px solid #d0dae6;
    border-radius: 4px;
}

.systems-table .form-select-sm:focus {
    border-color: var(--brand);
    box-shadow: 0 0 0 2px rgba(79, 101, 132, .1);
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

.interoperability-section {
    background: #f8fafc;
    border: 1px solid #d0dae6;
    border-radius: 8px;
    padding: 16px;
    margin-bottom: 12px;
}

.interoperability-section h6 {
    font-size: .82rem;
    font-weight: 700;
    color: var(--brand-dark);
    margin-bottom: 12px;
}

.checkbox-group {
    display: flex;
    flex-wrap: wrap;
    gap: 16px;
}

.checkbox-item {
    display: flex;
    align-items: center;
    gap: 6px;
}

.checkbox-item input {
    width: 16px;
    height: 16px;
}

.checkbox-item label {
    font-size: .8rem;
    color: var(--ink);
    margin: 0;
    cursor: pointer;
}

.checkbox-item input[type="radio"] {
    accent-color: var(--brand);
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

.btn-outline-brand {
    --bs-btn-color: var(--brand);
    --bs-btn-border-color: var(--brand);
    --bs-btn-hover-color: #fff;
    --bs-btn-hover-bg: var(--brand);
    --bs-btn-hover-border-color: var(--brand);
    --bs-btn-active-color: #fff;
    --bs-btn-active-bg: var(--brand-dark);
    --bs-btn-active-border-color: var(--brand-dark);
    padding: 8px 16px;
    font-size: .85rem;
    border-radius: 6px;
}

.btn-check:checked + .btn-outline-brand {
    color: #fff;
    background-color: var(--brand);
    border-color: var(--brand);
}

.btn-check:checked + .btn-outline-brand .help-icon {
    color: #fff;
}

.btn-outline-brand .help-icon {
    font-size: .85rem;
    margin-left: 6px;
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

.summary-card {
    background: #fff;
    border: 1px solid #dde4ed;
    border-radius: 8px;
    padding: 16px;
    text-align: center;
    box-shadow: 0 2px 8px rgba(15, 23, 42, .05);
    transition: all 0.2s ease;
}

.summary-card:hover {
    box-shadow: 0 4px 12px rgba(15, 23, 42, .1);
    transform: translateY(-2px);
}

.summary-card h3 {
    margin: 0;
    font-size: 2rem;
    font-weight: 700;
    color: var(--brand);
    line-height: 1.2;
}

.summary-card p {
    margin: 6px 0 0;
    font-size: .75rem;
    color: var(--muted);
    font-weight: 500;
    text-transform: uppercase;
    letter-spacing: 0.5px;
}

.system-card{
    border:1px solid #dbe4ee;
    border-radius:12px;
    overflow:hidden;
    margin-bottom:20px;
    background:#fff;
    box-shadow:0 3px 10px rgba(0,0,0,.04);
}

.system-card-header{
    background:#f8fafc;
    border-bottom:1px solid #e2e8f0;
    padding:14px 18px;
    display:flex;
    justify-content:space-between;
    align-items:center;
}

.system-card-title{
    font-size:.9rem;
    font-weight:700;
    color:var(--brand);
}

.system-card-body{
    padding:20px;
}

.field-group{
    margin-bottom:18px;
}

.field-title{
    font-size:.82rem;
    font-weight:700;
    margin-bottom:8px;
    color:#334155;
    text-transform:uppercase;
}

.option-grid{
    display:grid;
    grid-template-columns:repeat(auto-fit,minmax(220px,1fr));
    gap:12px;
}

.info-box{
    background:#f8fafc;
    border:1px solid #e2e8f0;
    border-radius:8px;
    padding:14px;
    margin-top:10px;
}

.add-system-large{
    width:100%;
    border:2px dashed #cbd5e1;
    background:#fff;
    border-radius:12px;
    padding:16px;
    font-weight:600;
    color:var(--brand);
    transition:.2s;
}

.add-system-large:hover{
    border-color:var(--brand);
    background:#f8fafc;
}

</style>
<style>
.file-preview {
    margin-top: 8px;
    padding: 8px 12px;
    background: #f8f9fa;
    border: 1px solid #dee2e6;
    border-radius: 6px;
    display: flex;
    align-items: center;
    gap: 10px;
    font-size: .82rem;
}
.file-preview img {
    max-width: 80px;
    max-height: 60px;
    border-radius: 4px;
    object-fit: cover;
}
.file-preview .file-name {
    color: var(--ink);
    font-weight: 600;
    flex: 1;
    overflow: hidden;
    text-overflow: ellipsis;
    white-space: nowrap;
}
.file-preview .file-size {
    color: var(--muted);
    font-size: .72rem;
}
</style>

<div class="row">
    <div class="col-12">
        <div class="page-header mb-3">
            <h1 class="page-title">Information Systems</h1>
            <p class="page-subtitle">Proposed information systems to be developed, acquired, or enhanced.</p>
        </div>
    </div>
</div>

<form id="mainForm" action="<?= site_url('employee/proposed-ict-strategy/information-systems/save') ?>" method="post" enctype="multipart/form-data">
    <?= csrf_field() ?>

    <!-- Information Systems Inventory -->
    <div class="row mb-3">
        <div class="col-12">
            <div class="section-card">
                <div class="section-header">
                    <div>
                        <h5 class="section-title">D. Proposed Information Systems</h5>
                        <p class="section-subtitle">List all proposed information systems with their classifications and status</p>
                    </div>
                </div>

                <div class="section-body">
                    <div class="form-section-label">
                        <span>Proposed Information Systems</span>
                          <i class="fa-solid fa-circle-question help-icon"
                          data-tooltip=" Provide detailed information about each proposed information system, including its classification, purpose, development strategy, and interoperability requirements."></i>
                    </div>

                   <div id="systemsContainer">

                <div class="system-card">
                    <div class="system-card-header">
                        <div class="system-card-title">
                            Proposed Information System #1
                        </div>
                    </div>

<div class="system-card-body">

<div class="row">
    <div class="col-md-6">
        <label class="form-label">System Name</label>
        <input type="text"
               class="form-control"
               name="is_name_1"
               placeholder="Enter the system name">
    </div>

    <div class="col-md-3">
        <label class="form-label">Status</label>
        <select class="form-select" name="status_1" id="status_1" onchange="toggleStatusFields()">
            <option value="">Select status</option>
            <option value="development">For Development</option>
            <option value="enhancement">For Enhancement</option>
        </select>
    </div>

    <div class="col-md-3">
        <label class="form-label">Classification</label>
<select class="form-select" name="classification_1" id="classification_1" onchange="toggleClassificationFields()">            <option value="">Select classification</option>
            <option value="support">Support to Operations</option>
            <option value="admin">General Administrative Systems</option>
            <option value="operations">Operations</option>
        </select>
    </div>
</div>

<!-- <div class="mt-3">
    <label class="form-label">System Service Type</label>

#   <div class="field-group">

        <label class="checkbox-item">
            <input type="checkbox" name="frontline_1" onchange="toggleFrontlineFields()">
            Frontline Service (directly used for public/client service delivery)
        </label>

        <label class="checkbox-item">
            <input type="checkbox" name="non_frontline_1">
            Non-Frontline Service (supports internal/core operations only)
        </label>

    </div>

    <div class="form-text">
        Indicate whether the system directly serves external clients or is used internally.
    </div>
</div>

<div id="frontline_fields_1" style="display:none;" class="mt-3">

    <label class="form-label">Frontline Implementation Type</label>

    <div class="field-group">

        <label class="checkbox-item">
            <input type="checkbox" name="online_1">
            Online
        </label>

        <label class="checkbox-item">
            <input type="checkbox" name="on_premise_1">
            On-premise
        </label>

        <label class="checkbox-item">
            <input type="checkbox" name="hybrid_1">
            Hybrid
        </label>

    </div>

    <label class="form-label mt-2">Provide Link (if Online)</label>
    <input type="text"
           class="form-control"
           name="online_link_1"
           placeholder="Provide URL where the system can be accessed (if applicable)">
</div> -->

<div class="mt-3">
    <label class="form-label">Description / Purpose</label>
    <textarea class="form-control"
              name="description_1"
              rows="3"
              placeholder="Describe system objectives, scope, key features, reports generated, and target users."></textarea>
</div>

<div class="row mt-3 status-fields">
    <div class="col-md-4">
        <label class="form-label">Deployment Approach</label>
        <select class="form-select" name="deployment_1">
            <option value="">Select approach</option>
            <option value="inhouse">In-house</option>
            <option value="outsourced">Outsourced</option>
            <option value="cots">COTS (Off-the-shelf)</option>
            <option value="hybrid">Hybrid</option>
        </select>
    </div>

    <div class="col-md-4">
        <label class="form-label">System Owner</label>
        <input type="text"
               class="form-control"
               name="owner_1"
               placeholder="Specify the responsible office or unit">
    </div>

    <div class="col-md-4">
        <label class="form-label">Development Strategy</label>
        <input type="text"
               class="form-control"
               name="dev_strategy_1"
               placeholder="Describe the development approach or method">
    </div>
</div>

<div class="row mt-3 status-fields">
    <div class="col-md-4">
        <label class="form-label">Platform / Framework</label>
        <input type="text"
               class="form-control"
               name="platform_1"
               placeholder="Specify the platform or technology to be used">
    </div>

    <div class="col-md-4">
        <label class="form-label">Database Name</label>
        <input type="text"
               class="form-control"
               name="database_1"
               placeholder="Enter the database name or structure">
    </div>

    <div class="col-md-4">
        <label class="form-label">Data Storage</label>
        <input type="text"
               class="form-control"
               name="storage_1"
               placeholder="Describe where and how data will be stored">
    </div>
</div>

<div class="row mt-3">
    <div class="col-md-6">
        <label class="form-label">Internal Users</label>
        <textarea class="form-control"
                  name="internal_users_1"
                  rows="2"
                  placeholder="List internal offices or units that will use the systemn"></textarea>
    </div>

    <div class="col-md-6">
        <label class="form-label">External Users</label>
        <textarea class="form-control"
                  name="external_users_1"
                  rows="2"
                  placeholder="List external users or stakeholders who will access the system"></textarea>
    </div>
</div>

<div id="classification_extra_1" class="mt-3" style="display:none;">

    <label class="form-label">System Usage Type</label>

    <div class="field-group">

        <label class="checkbox-item">
            <input type="radio" name="system_usage_1" value="frontline" onchange="toggleFrontlineType()">
            Frontline Service (directly used for public/client service delivery)
        </label>

        <label class="checkbox-item">
            <input type="radio" name="system_usage_1" value="non_frontline" onchange="toggleFrontlineType()">
            Non-Frontline Service (internal/core support only)
        </label>

    </div>

</div>

<div id="frontline_type_1" style="display:none;" class="mt-3">

    <label class="form-label">If Frontline Service, specify deployment type:</label>

    <div class="field-group">

        <label class="checkbox-item">
            <input type="radio" name="deployment_type_1" value="online" onchange="toggleDeploymentType()">
            Online
        </label>

        <label class="checkbox-item">
            <input type="radio" name="deployment_type_1" value="on_premise" onchange="toggleDeploymentType()">
            On-premise
        </label>

        <label class="checkbox-item">
            <input type="radio" name="deployment_type_1" value="hybrid" onchange="toggleDeploymentType()">
            Hybrid
        </label>

    </div>

    <div id="online_link_field_1" style="display:none;" class="mt-2">
        <label class="form-label">Provide Link (if Online)</label>
        <input type="text"
               class="form-control"
               name="online_link_1"
               placeholder="Enter system URL (if accessible online)">
    </div>
</div>

<div class="mt-3">
    <label class="form-label mb-2">INTEROPERABILITY</label>
    <div class="d-flex flex-wrap gap-2 mb-2">
        <input type="radio" class="btn-check" name="interop1_main" id="interop1_integration" value="integration" autocomplete="off">
        <label class="btn btn-outline-brand" for="interop1_integration">Integration with another system <i class="fa-solid fa-circle-question help-icon" data-tooltip="If the system will exchange data or will be technically integrated with another system"></i></label>

        <input type="radio" class="btn-check" name="interop1_main" id="interop1_shared" value="shared" autocomplete="off">
        <label class="btn btn-outline-brand" for="interop1_shared">Deployment on a shared platform <i class="fa-solid fa-circle-question help-icon" data-tooltip="The system will be hosted on the same platform or infrastructure with other systems"></i></label>
    </div>
    <div class="ms-2 mb-2" id="interop1_sub_fields" style="display:none;">
        <hr class="my-2">
        <div class="mb-2">
            <div class="row">
                <div class="col-md-12">
                    <label class="form-label" style="font-size:.82rem;">If yes, specify the system name Internal System:</label>
                </div>
            </div>
            <div class="row align-items-start">
                <div class="col-md-6">
                    <input type="text" class="form-control" name="interop1_internal_system" placeholder="Enter internal system name">
                </div>
                <div class="col-md-6 d-flex align-items-center" style="min-height:38px;">
                    <input type="radio" class="btn-check" name="interop1_sub" id="interop1_generate" value="generate" autocomplete="off">
                    <label class="btn btn-outline-brand mb-0" for="interop1_generate" style="width:100%;">Generate data that will be utilized by other system <i class="fa-solid fa-circle-question help-icon" data-tooltip="The system will generate and produce data that will be consumed, referenced, or reused by another system"></i></label>
                </div>
            </div>
        </div>
        <div class="mb-2">
            <div class="row">
                <div class="col-md-12">
                    <label class="form-label" style="font-size:.82rem;">External System:</label>
                </div>
            </div>
            <div class="row align-items-start">
                <div class="col-md-6">
                    <input type="text" class="form-control" name="interop1_external_system" placeholder="Enter external system name">
                </div>
                <div class="col-md-6 d-flex align-items-center" style="min-height:38px;">
                    <input type="radio" class="btn-check" name="interop1_sub" id="interop1_process" value="process" autocomplete="off">
                    <label class="btn btn-outline-brand mb-0" for="interop1_process" style="width:100%;">Process data generated from other system <i class="fa-solid fa-circle-question help-icon" data-tooltip="The system will receive and process data generated from another system"></i></label>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="mt-3">
    <label class="form-label mb-2">PRIVACY IMPACT ASSESSMENT (PIA)</label>
    <div class="d-flex flex-wrap gap-2">
        <input type="radio" class="btn-check" name="pia_1" id="pia1_yes" value="yes" autocomplete="off">
        <label class="btn btn-outline-brand" for="pia1_yes">System processes personal data (PIA required)</label>

        <input type="radio" class="btn-check" name="pia_1" id="pia1_no" value="no" autocomplete="off">
        <label class="btn btn-outline-brand" for="pia1_no">Does not process personal data</label>
    </div>
</div>

</div>

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
                    <button type="button" class="action-btn action-btn-save" onclick="window.saveChanges();">
                        <i class="fa-solid fa-save"></i>
                        <span>Save Changes</span>
                    </button>
                    <button type="button" class="action-btn action-btn-clear" onclick="window.clearForm()">
                        <i class="fa-solid fa-eraser"></i>
                        <span>Clear Fields</span>
                    </button>
                </div>
                <div class="navigation-buttons">
                    <button type="button" class="nav-btn nav-btn-prev" onclick="window.navigateToPage('<?= site_url('employee/proposed-ict-strategy/ict-human-capital') ?>')">
                        <i class="fa-solid fa-arrow-left"></i>
                        <span>ICT Human Capital</span>
                    </button>
                    <button type="button" class="nav-btn nav-btn-next" onclick="window.navigateToPage('<?= site_url('employee/proposed-ict-strategy/ict-projects') ?>')">
                        <span>ICT Projects</span>
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

    document.querySelectorAll('input[name="interop1_main"]').forEach(function(radio) {
        radio.addEventListener('change', toggleInteropDetails);
    });

    window.loadSavedData();
    toggleInteropDetails();
    if (typeof updateStatusIndicators === 'function') updateStatusIndicators();
});

window.clearForm = function() {
    console.log('clearForm called');
    try {
        showConfirmModal('Are you sure you want to clear all fields? This action cannot be undone.', function() {
            const form = document.querySelector('#mainForm');
            if (form) {
                form.reset();
                // Remove all file previews
                form.querySelectorAll('.file-preview').forEach(el => el.remove());
                // Clear localStorage
                localStorage.removeItem('information-systems-form');
                if (typeof updateStatusIndicators === 'function') updateStatusIndicators();
                console.log('Form cleared');
                showAlertModal('Success', 'Form has been cleared successfully.');
            } else {
                console.error('Form not found');
                showAlertModal('Error', 'Error: Form not found');
            }
        });
    } catch (error) {
        console.error('Error in clearForm:', error);
        showAlertModal('Error', 'Error clearing form: ' + error.message);
    }
};

// Save changes to localStorage (supports file persistence)
window.saveChanges = function(showAlert = true) {
    return new Promise(function(resolve) {
        console.log('saveChanges called with showAlert:', showAlert);
        try {
            const form = document.querySelector('#mainForm');
            if (form) {
                const formData = new FormData(form);
                const formDataObj = {};
                const fileReads = [];
                
                formData.forEach((value, key) => {
                    if (value instanceof File && value.name) {
                        fileReads.push(
                            new Promise(resolve => {
                                const reader = new FileReader();
                                reader.onload = () => {
                                    const dataUrl = reader.result;
                                    const b64Idx = dataUrl.indexOf(';base64,');
                                    if (b64Idx !== -1) {
                                        const beforeBase64 = dataUrl.substring(0, b64Idx);
                                        const afterBase64 = dataUrl.substring(b64Idx);
                                        formDataObj[key] = beforeBase64 + ';name=' + encodeURIComponent(value.name) + afterBase64;
                                    } else {
                                        const parts = dataUrl.split(',');
                                        formDataObj[key] = parts[0] + ';name=' + encodeURIComponent(value.name) + ',' + parts.slice(1).join(',');
                                    }
                                    resolve();
                                };
                                reader.readAsDataURL(value);
                            })
                        );
                    } else {
                        formDataObj[key] = value;
                    }
                });
                
                if (fileReads.length > 0) {
                    Promise.all(fileReads).then(() => {
                        finalizeSave(formDataObj, showAlert);
                        resolve();
                    });
                } else {
                    finalizeSave(formDataObj, showAlert);
                    resolve();
                }
            } else {
                console.error('Form #mainForm not found');
                if (showAlert) showAlertModal('Error', 'Error: Form not found');
                resolve();
            }
        } catch (error) {
            console.error('Error in saveChanges:', error);
            if (showAlert) showAlertModal('Error', 'Error saving changes: ' + error.message);
            resolve();
        }
    });
};

function finalizeSave(formDataObj, showAlert) {
    // Merge with previous localStorage data to preserve file previews
    const prevData = JSON.parse(localStorage.getItem('information-systems-form') || '{}');
    Object.keys(prevData).forEach(key => {
        if (!(key in formDataObj)) {
            const val = prevData[key];
            if (typeof val === 'string' && (val.startsWith('data:') || val.startsWith('uploads/'))) {
                formDataObj[key] = val;
            }
        }
    });
    
    // Remove empty values from hidden elements (e.g. Others textbox when "Others" not checked)
    Object.keys(formDataObj).forEach(key => {
        if (formDataObj[key] === '') {
            const el = document.querySelector(`[name="${key}"]`);
            if (el && el.offsetParent === null) {
                delete formDataObj[key];
            }
        }
    });
    
    try {
        const jsonStr = JSON.stringify(formDataObj);
        localStorage.setItem('information-systems-form', jsonStr);
        
        const verify = localStorage.getItem('information-systems-form');
        console.log('Save verified:', verify ? 'OK (' + Object.keys(JSON.parse(verify)).length + ' keys)' : 'FAILED');
        
        if (typeof updateStatusIndicators === 'function') updateStatusIndicators();
        if (showAlert) showAlertModal('Success', 'Changes saved locally!');
    } catch (error) {
        console.error('Error saving to localStorage:', error);
        if (error.name === 'QuotaExceededError' || error.code === 22) {
            if (showAlert) showAlertModal('Error', 'Unable to save: File(s) too large. Please reduce file sizes and try again.');
        } else {
            if (showAlert) showAlertModal('Error', 'Error saving changes: ' + error.message);
        }
    }
}

// Load saved data from localStorage on page load
window.loadSavedData = function() {
    console.log('loadSavedData called');
    try {
        const savedData = localStorage.getItem('information-systems-form');
        console.log('Saved data from localStorage:', savedData ? 'exists (' + savedData.length + ' chars)' : 'empty');
        if (savedData) {
            const formDataObj = JSON.parse(savedData);
            console.log('Parsed form data keys:', Object.keys(formDataObj));
            const form = document.querySelector('#mainForm');
            console.log('Form found:', !!form);

            if (form) {
                const isNameKeys = Object.keys(formDataObj).filter(key => key.startsWith('is_name_'));
                const maxRowNumber = isNameKeys.length > 0 ?
                    Math.max(...isNameKeys.map(key => parseInt(key.split('_')[2]))) : 0;

                const table = document.getElementById('informationSystemsTable');
                if (table) {
                    const tbody = table.querySelector('tbody');
                    const currentRowCount = tbody.querySelectorAll('tr').length;
                    const rowsToAdd = maxRowNumber - currentRowCount;
                    for (let i = 0; i < rowsToAdd; i++) {
                        addSystemRow();
                    }
                }

                let restoredCount = 0;
                Object.keys(formDataObj).forEach(key => {
                    const input = form.querySelector(`[name="${key}"]`);
                    if (input) {
                        const val = formDataObj[key];
                        if (typeof val === 'string' && val.startsWith('data:')) {
                            restoreFilePreview(input, val);
                            restoredCount++;
                        } else if (typeof val === 'string' && val.startsWith('uploads/')) {
                            input.setAttribute('data-uploaded-path', val);
                            showServerFileLink(input, val);
                            restoredCount++;
                        } else if (input.type === 'checkbox') {
                            input.checked = val === '1' || val === 'on' || val === true;
                            restoredCount++;
                        } else if (input.type === 'radio') {
                            const radio = form.querySelector(`[name="${key}"][value="${val}"]`);
                            if (radio) radio.checked = true;
                            restoredCount++;
                        } else {
                            input.value = val;
                            restoredCount++;
                        }
                    }
                });
                console.log('Data loaded from localStorage, restored', restoredCount, 'fields');
            }
        }
    } catch (error) {
        console.error('Error loading saved data:', error);
    }
};

function restoreFilePreview(input, dataUrl) {
    if (!input || !dataUrl) return;
    const existing = input.parentElement.querySelector('.file-preview');
    if (existing) existing.remove();
    const preview = document.createElement('div');
    preview.className = 'file-preview';
    preview.setAttribute('data-file-input', input.name);
    preview.style.cursor = 'pointer';
    preview.title = 'Click to open file';
    preview.addEventListener('click', function(e) {
        if (e.target.closest('button')) return;
        try {
            // Parse base64 data URL to Blob for reliable download
            const commaIdx = dataUrl.indexOf(',');
            const mimeMatch = dataUrl.substring(0, commaIdx).match(/:(.*?);/);
            const mime = mimeMatch ? mimeMatch[1] : 'application/octet-stream';
            const b64Data = dataUrl.substring(commaIdx + 1);
            const byteStr = atob(b64Data);
            const ab = new ArrayBuffer(byteStr.length);
            const ia = new Uint8Array(ab);
            for (let i = 0; i < byteStr.length; i++) {
                ia[i] = byteStr.charCodeAt(i);
            }
            const blob = new Blob([ab], {type: mime});
            const url = URL.createObjectURL(blob);
            const link = document.createElement('a');
            link.href = url;
            link.download = getFileNameFromDataUrl(dataUrl) || 'file';
            document.body.appendChild(link);
            link.click();
            document.body.removeChild(link);
            URL.revokeObjectURL(url);
        } catch (dlError) {
            console.error('Download failed:', dlError);
            // Fallback: open data URL in new tab
            const win = window.open(dataUrl, '_blank');
            if (!win) {
                showAlertModal('Notice', 'Unable to open file. Try saving it first.');
            }
        }
    });
    if (dataUrl.startsWith('data:image/')) {
        const img = document.createElement('img');
        img.src = dataUrl;
        img.alt = 'Uploaded image';
        preview.appendChild(img);
    }
    const nameSpan = document.createElement('span');
    nameSpan.className = 'file-name';
    const fileSize = Math.round((dataUrl.length * 0.75) / 1024);
    nameSpan.textContent = getFileNameFromDataUrl(dataUrl) || 'Uploaded file';
    preview.appendChild(nameSpan);
    const sizeSpan = document.createElement('span');
    sizeSpan.className = 'file-size';
    sizeSpan.textContent = fileSize > 1024 ? (fileSize / 1024).toFixed(1) + ' MB' : fileSize + ' KB';
    preview.appendChild(sizeSpan);
    const removeBtn = document.createElement('button');
    removeBtn.type = 'button';
    removeBtn.className = 'btn btn-sm btn-outline-danger';
    removeBtn.innerHTML = '&times;';
    removeBtn.title = 'Remove file';
    removeBtn.addEventListener('click', function(e) {
        e.preventDefault();
        preview.remove();
        input.value = '';
        // Remove only this file from localStorage directly
        try {
            const savedData = JSON.parse(localStorage.getItem('information-systems-form') || '{}');
            delete savedData[input.name];
            localStorage.setItem('information-systems-form', JSON.stringify(savedData));
            if (typeof updateStatusIndicators === 'function') updateStatusIndicators();
            showAlertModal('Success', 'File removed.');
        } catch (error) {
            console.error('Error removing file:', error);
            showAlertModal('Error', 'Error removing file: ' + error.message);
        }
    });
    preview.appendChild(removeBtn);
    input.parentElement.appendChild(preview);
}

function getFileNameFromDataUrl(dataUrl) {
    try {
        const commaIndex = dataUrl.indexOf(',');
        const header = commaIndex >= 0 ? dataUrl.substring(0, commaIndex) : dataUrl;
        const parts = header.split(';');
        for (const part of parts) {
            const trimmed = part.trim();
            if (trimmed.startsWith('name=')) {
                return decodeURIComponent(trimmed.substring(5));
            }
        }
        return null;
    } catch(e) {
        return null;
    }
}

window.navigateToPage = function(url) {
    console.log('navigateToPage called with url:', url);
    // If in edit mode, rewrite URLs to stay in edit context
    var editId = localStorage.getItem('edit_project_id');
    if (editId) {
        url = url.replace('proposed-ict-strategy/', 'edit-ict-project/' + editId + '/');
        if (url.indexOf('employee/dashboard') !== -1) {
            url = '<?= site_url('employee/draft-ict-projects') ?>';
        }
    }
    const form = document.querySelector('#mainForm');
    if (form) {
        const formData = new FormData(form);
        const formDataObj = {};
        const fileReads = [];
        formData.forEach((value, key) => {
            if (value instanceof File && value.name) {
                var fileInput = form.querySelector('[name="' + key + '"]');
                var uploadedPath = fileInput ? fileInput.getAttribute('data-uploaded-path') : null;
                if (uploadedPath) {
                    formDataObj[key] = uploadedPath;
                } else {
                    fileReads.push(
                        new Promise(resolve => {
                            const reader = new FileReader();
                            reader.onload = () => {
                                const dataUrl = reader.result;
                                const b64Idx = dataUrl.indexOf(';base64,');
                                if (b64Idx !== -1) {
                                    const beforeBase64 = dataUrl.substring(0, b64Idx);
                                    const afterBase64 = dataUrl.substring(b64Idx);
                                    formDataObj[key] = beforeBase64 + ';name=' + encodeURIComponent(value.name) + afterBase64;
                                } else {
                                    const parts = dataUrl.split(',');
                                    formDataObj[key] = parts[0] + ';name=' + encodeURIComponent(value.name) + ',' + parts.slice(1).join(',');
                                }
                                resolve();
                            };
                            reader.readAsDataURL(value);
                        })
                    );
                }
            } else if (value instanceof File) {
                // Empty file input — skip
            } else {
                formDataObj[key] = value;
            }
        });
        const doNav = () => {
            // Merge with previous localStorage data to preserve file previews
            const prevData = JSON.parse(localStorage.getItem('information-systems-form') || '{}');
            Object.keys(prevData).forEach(key => {
                if (!(key in formDataObj)) {
                    const val = prevData[key];
                    if (typeof val === 'string' && (val.startsWith('data:') || val.startsWith('uploads/'))) {
                        formDataObj[key] = val;
                    }
                }
            });
            // Remove empty values from hidden elements
            Object.keys(formDataObj).forEach(key => {
                if (formDataObj[key] === '') {
                    const el = document.querySelector(`[name="${key}"]`);
                    if (el && el.offsetParent === null) {
                        delete formDataObj[key];
                    }
                }
            });
            const jsonStr = JSON.stringify(formDataObj);
            try {
                localStorage.setItem('information-systems-form', jsonStr);
            } catch (e) {
                console.error('localStorage save failed:', e);
            }
            if (typeof updateStatusIndicators === 'function') updateStatusIndicators();
            window.location.href = url;
        };
        if (fileReads.length > 0) {
            Promise.all(fileReads).then(doNav);
        } else {
            doNav();
        }
    } else {
        window.location.href = url;
    }
};

function updateSystemTotals() {
    const table = document.getElementById('informationSystemsTable');
    const rows = table.querySelectorAll('tbody tr:not(.total-row)');

    let development = 0;
    let enhancement = 0;

    rows.forEach(row => {
        const status = row.querySelector('.system-status')?.value;
        if(status === 'development') {
            development++;
        }
        if(status === 'enhancement') {
            enhancement++;
        }
    });

    document.getElementById('totalSystems').textContent = rows.length;
    document.getElementById('totalDevelopment').textContent = development;
    document.getElementById('totalEnhancement').textContent = enhancement;
}

function addSystemRow() {
    const table = document.getElementById('informationSystemsTable');
    const tbody = table.querySelector('tbody');
    const rowCount = tbody.querySelectorAll('tr').length + 1;

    const newRow = document.createElement('tr');
    newRow.innerHTML = `
    `

    tbody.appendChild(newRow);
    updateSystemTotals();
}

function deleteSystemRow(button) {
    const table = document.getElementById('informationSystemsTable');
    const tbody = table.querySelector('tbody');
    const rows = tbody.querySelectorAll('tr');

    if(rows.length <= 1){
        showAlertModal('Notice', 'At least one system is required.');
        return;
    }

    const row = button.closest('tr');
    row.remove();
    updateSystemTotals();
}

function toggleInteropDetails() {
    const integrationCheck = document.getElementById('interop1_integration');
    const details = document.getElementById('interop1_sub_fields');
    if (integrationCheck && details) {
        details.style.display = integrationCheck.checked ? 'block' : 'none';
    }
}

function togglePIA() {
    const checkbox = document.getElementById('pia_1');
    const fields = document.getElementById('pia_fields_1');
    fields.style.display = checkbox.checked ? 'block' : 'none';
}

function toggleStatusFields() {
    const status = document.getElementById('status_1').value;
    const fields = document.querySelectorAll('.status-fields');

    fields.forEach(el => {
        el.style.display = (status === 'development' || status === 'enhancement')
            ? 'flex'
            : 'none';
    });
}

function toggleClassificationFields() {
    const value = document.getElementById('classification_1').value;
    const extra = document.getElementById('classification_extra_1');
    if (value === 'operations') {
        extra.style.display = 'block';
    } else {
        extra.style.display = 'none';
        document.querySelectorAll('[name="system_usage_1"]').forEach(r => r.checked = false);
        document.getElementById('frontline_type_1').style.display = 'none';
        document.querySelectorAll('[name="deployment_type_1"]').forEach(r => r.checked = false);
        document.getElementById('online_link_field_1').style.display = 'none';
    }
}

function toggleFrontlineType() {
    const type = document.querySelector('[name="system_usage_1"]:checked')?.value;
    const typeSection = document.getElementById('frontline_type_1');
    if (type === 'frontline') {
        typeSection.style.display = 'block';
    } else {
        typeSection.style.display = 'none';
        document.querySelectorAll('[name="deployment_type_1"]').forEach(r => r.checked = false);
        document.getElementById('online_link_field_1').style.display = 'none';
    }
}

function toggleDeploymentType() {
    const type = document.querySelector('[name="deployment_type_1"]:checked')?.value;
    const linkField = document.getElementById('online_link_field_1');
    linkField.style.display = type === 'online' ? 'block' : 'none';
    if (type !== 'online') {
        document.querySelector('[name="online_link_1"]').value = '';
    }
}
</script>

<?= $this->endSection() ?>
