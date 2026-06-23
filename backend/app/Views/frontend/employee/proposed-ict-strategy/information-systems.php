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
</style>

<div class="row">
    <div class="col-12">
        <div class="page-header mb-3">
            <h1 class="page-title">D. Proposed Information Systems</h1>
            <p class="page-subtitle">Inventory and classification of proposed information systems</p>
        </div>
        
        <div class="info-banner">
            <i class="fa-solid fa-info-circle"></i>
            Provide detailed information about each proposed information system, including its classification, purpose, development strategy, and interoperability requirements.
        </div>
    </div>
</div>

<form action="<?= site_url('employee/proposed-ict-strategy/information-systems/save') ?>" method="post" enctype="multipart/form-data">
    <?= csrf_field() ?>

    <!-- Information Systems Inventory -->
    <div class="row mb-3">
        <div class="col-12">
            <div class="section-card">
                <div class="section-header">
                    <h5 class="section-title">D.i Information Systems Inventory</h5>
                    <p class="section-subtitle">List all proposed information systems</p>
                </div>
                <div class="section-body">
                    <div class="form-section-label">
                        <i class="fa-solid fa-list me-2"></i>System Details
                    </div>
                    
                    <div class="row g-3 mb-4">
                        <div class="col-md-12">
                            <label class="form-label"><i class="fa-solid fa-server me-1"></i>IS Name</label>
                            <input type="text" class="form-control" name="is_name" placeholder="Enter the name of the information system">
                        </div>
                        
                        <div class="col-md-6">
                            <label class="form-label"><i class="fa-solid fa-tags me-1"></i>Classification</label>
                            <select class="form-select" name="classification">
                                <option value="">Select classification</option>
                                <option value="mission-critical">Mission Critical</option>
                                <option value="mission-essential">Mission Essential</option>
                                <option value="mission-support">Mission Support</option>
                                <option value="administrative">Administrative</option>
                            </select>
                        </div>
                        
                        <div class="col-md-6">
                            <label class="form-label"><i class="fa-solid fa-spinner me-1"></i>Status</label>
                            <select class="form-select" name="status">
                                <option value="">Select status</option>
                                <option value="proposed">Proposed</option>
                                <option value="in-development">In Development</option>
                                <option value="operational">Operational</option>
                                <option value="under-maintenance">Under Maintenance</option>
                                <option value="to-be-retired">To be Retired</option>
                            </select>
                        </div>
                        
                        <div class="col-md-12">
                            <label class="form-label"><i class="fa-solid fa-align-left me-1"></i>Description & Purpose</label>
                            <textarea class="form-control" name="description" rows="4" placeholder="Describe the information system and its purpose..."></textarea>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Development Strategy -->
    <div class="row mb-3">
        <div class="col-12">
            <div class="section-card">
                <div class="section-header">
                    <h5 class="section-title">D.ii Development Strategy</h5>
                    <p class="section-subtitle">Approach for system development</p>
                </div>
                <div class="section-body">
                    <div class="form-section-label">
                        <i class="fa-solid fa-code me-2"></i>Development Approach
                    </div>
                    
                    <div class="row g-3 mb-4">
                        <div class="col-md-6">
                            <label class="form-label"><i class="fa-solid fa-lightbulb me-1"></i>Development Strategy</label>
                            <select class="form-select" name="development_strategy">
                                <option value="">Select strategy</option>
                                <option value="in-house">In-House Development</option>
                                <option value="outsourced">Outsourced Development</option>
                                <option value="off-the-shelf">Off-the-Shelf (COTS)</option>
                                <option value="open-source">Open Source</option>
                                <option value="hybrid">Hybrid Approach</option>
                            </select>
                        </div>
                        
                        <div class="col-md-6">
                            <label class="form-label"><i class="fa-solid fa-laptop-code me-1"></i>Development Platform</label>
                            <select class="form-select" name="development_platform">
                                <option value="">Select platform</option>
                                <option value="web">Web-based</option>
                                <option value="mobile">Mobile Application</option>
                                <option value="desktop">Desktop Application</option>
                                <option value="cloud">Cloud-based</option>
                                <option value="hybrid-platform">Hybrid Platform</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Data Management -->
    <div class="row mb-3">
        <div class="col-12">
            <div class="section-card">
                <div class="section-header">
                    <h5 class="section-title">D.iii Data Management</h5>
                    <p class="section-subtitle">Database and storage information</p>
                </div>
                <div class="section-body">
                    <div class="form-section-label">
                        <i class="fa-solid fa-database me-2"></i>Data Storage
                    </div>
                    
                    <div class="row g-3 mb-4">
                        <div class="col-md-6">
                            <label class="form-label"><i class="fa-solid fa-database me-1"></i>Database Name</label>
                            <input type="text" class="form-control" name="database_name" placeholder="Enter database name">
                        </div>
                        
                        <div class="col-md-6">
                            <label class="form-label"><i class="fa-solid fa-hdd me-1"></i>Data Storage</label>
                            <select class="form-select" name="data_storage">
                                <option value="">Select storage type</option>
                                <option value="on-premise">On-Premise Server</option>
                                <option value="cloud">Cloud Storage</option>
                                <option value="hybrid-storage">Hybrid Storage</option>
                                <option value="data-center">Data Center</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- User Information -->
    <div class="row mb-3">
        <div class="col-12">
            <div class="section-card">
                <div class="section-header">
                    <h5 class="section-title">D.iv User Information</h5>
                    <p class="section-subtitle">Internal and external user details</p>
                </div>
                <div class="section-body">
                    <div class="form-section-label">
                        <i class="fa-solid fa-users me-2"></i>User Classification
                    </div>
                    
                    <div class="row g-3 mb-4">
                        <div class="col-md-6">
                            <label class="form-label"><i class="fa-solid fa-building-user me-1"></i>Internal Users</label>
                            <textarea class="form-control" name="internal_users" rows="3" placeholder="Describe internal user groups and roles..."></textarea>
                        </div>
                        
                        <div class="col-md-6">
                            <label class="form-label"><i class="fa-solid fa-globe me-1"></i>External Users</label>
                            <textarea class="form-control" name="external_users" rows="3" placeholder="Describe external user groups (citizens, partners, etc.)..."></textarea>
                        </div>
                        
                        <div class="col-md-12">
                            <label class="form-label"><i class="fa-solid fa-user-tie me-1"></i>Owner</label>
                            <input type="text" class="form-control" name="owner" placeholder="Enter the name of the system owner">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Interoperability -->
    <div class="row mb-3">
        <div class="col-12">
            <div class="section-card">
                <div class="section-header">
                    <h5 class="section-title">D.v Interoperability</h5>
                    <p class="section-subtitle">System integration and data exchange capabilities</p>
                </div>
                <div class="section-body">
                    <div class="form-section-label">
                        <i class="fa-solid fa-project-diagram me-2"></i>Integration Requirements
                    </div>
                    
                    <!-- Government-wide Systems -->
                    <div class="interoperability-section">
                        <h6><i class="fa-solid fa-landmark me-2"></i>Government-wide Systems</h6>
                        <div class="checkbox-group">
                            <div class="checkbox-item">
                                <input type="checkbox" name="gov_payroll" id="gov_payroll">
                                <label for="gov_payroll">Government Payroll System (GPIS)</label>
                            </div>
                            <div class="checkbox-item">
                                <input type="checkbox" name="gov_hr" id="gov_hr">
                                <label for="gov_hr">Government Human Resource Information System (GHRIS)</label>
                            </div>
                            <div class="checkbox-item">
                                <input type="checkbox" name="gov_budget" id="gov_budget">
                                <label for="gov_budget">Budget System</label>
                            </div>
                            <div class="checkbox-item">
                                <input type="checkbox" name="gov_procurement" id="gov_procurement">
                                <label for="gov_procurement">PhilGEPS</label>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Cross-Agency Systems -->
                    <div class="interoperability-section">
                        <h6><i class="fa-solid fa-sitemap me-2"></i>Cross-Agency Systems</h6>
                        <div class="checkbox-group">
                            <div class="checkbox-item">
                                <input type="checkbox" name="cross_oms" id="cross_oms">
                                <label for="cross_oms">Other Agency Systems</label>
                            </div>
                            <div class="checkbox-item">
                                <input type="checkbox" name="cross_lgu" id="cross_lgu">
                                <label for="cross_lgu">Local Government Unit Systems</label>
                            </div>
                            <div class="checkbox-item">
                                <input type="checkbox" name="cross_foreign" id="cross_foreign">
                                <label for="cross_foreign">Foreign Systems</label>
                            </div>
                        </div>
                        <div class="mt-3">
                            <label class="form-label">Specify Other Systems</label>
                            <textarea class="form-control" name="other_systems" rows="2" placeholder="List any other systems this will integrate with..."></textarea>
                        </div>
                    </div>
                    
                    <!-- Data Exchange -->
                    <div class="interoperability-section">
                        <h6><i class="fa-solid fa-exchange-alt me-2"></i>Data Exchange Mechanisms</h6>
                        <div class="checkbox-group">
                            <div class="checkbox-item">
                                <input type="checkbox" name="api" id="api">
                                <label for="api">API Integration</label>
                            </div>
                            <div class="checkbox-item">
                                <input type="checkbox" name="web_services" id="web_services">
                                <label for="web_services">Web Services</label>
                            </div>
                            <div class="checkbox-item">
                                <input type="checkbox" name="file_exchange" id="file_exchange">
                                <label for="file_exchange">File Exchange</label>
                            </div>
                            <div class="checkbox-item">
                                <input type="checkbox" name="database_link" id="database_link">
                                <label for="database_link">Direct Database Link</label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Privacy Impact Assessment -->
    <div class="row mb-3">
        <div class="col-12">
            <div class="section-card">
                <div class="section-header">
                    <h5 class="section-title">D.vi Privacy Impact Assessment</h5>
                    <p class="section-subtitle">Data privacy and security considerations</p>
                </div>
                <div class="section-body">
                    <div class="form-section-label">
                        <i class="fa-solid fa-shield-halved me-2"></i>Privacy Assessment
                    </div>
                    
                    <div class="row g-3">
                        <div class="col-md-12">
                            <div class="info-banner">
                                <i class="fa-solid fa-exclamation-triangle"></i>
                                Complete this section to ensure compliance with the Data Privacy Act of 2012.
                            </div>
                        </div>
                        
                        <div class="col-md-12">
                            <label class="form-label"><i class="fa-solid fa-user-shield me-1"></i>Personal Data Collected</label>
                            <textarea class="form-control" name="personal_data" rows="3" placeholder="List types of personal data to be collected..."></textarea>
                        </div>
                        
                        <div class="col-md-6">
                            <label class="form-label"><i class="fa-solid fa-check-circle me-1"></i>Data Consent Mechanism</label>
                            <select class="form-select" name="consent_mechanism">
                                <option value="">Select mechanism</option>
                                <option value="explicit">Explicit Consent</option>
                                <option value="implicit">Implicit Consent</option>
                                <option value="opt-out">Opt-out</option>
                                <option value="legitimate-interest">Legitimate Interest</option>
                            </select>
                        </div>
                        
                        <div class="col-md-6">
                            <label class="form-label"><i class="fa-solid fa-user-lock me-1"></i>Data Retention Period</label>
                            <input type="text" class="form-control" name="retention_period" placeholder="e.g., 5 years, until purpose is fulfilled">
                        </div>
                        
                        <div class="col-md-12">
                            <label class="form-label"><i class="fa-solid fa-file-contract me-1"></i>Data Sharing Agreements</label>
                            <textarea class="form-control" name="data_sharing" rows="3" placeholder="Describe any data sharing arrangements with third parties..."></textarea>
                        </div>
                        
                        <div class="col-md-12">
                            <label class="form-label"><i class="fa-solid fa-clipboard-check me-1"></i>Risk Assessment</label>
                            <textarea class="form-control" name="risk_assessment" rows="4" placeholder="Assess potential privacy risks and mitigation measures..."></textarea>
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
                        <a href="<?= site_url('employee/proposed-ict-strategy/ict-human-capital') ?>" class="btn btn-outline-secondary">
                            <i class="fa-solid fa-arrow-left me-2"></i>Back: ICT Human Capital
                        </a>
                        <a href="<?= site_url('employee/proposed-ict-strategy/ict-projects') ?>" class="btn btn-success">
                            Next: ICT Projects <i class="fa-solid fa-arrow-right ms-2"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>

<?= $this->endSection() ?>
