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
    overflow: hidden;
}

.subsection-header {
    background: linear-gradient(135deg, #f8fafc 0%, #edf2f7 100%);
    padding: 14px 18px;
    border-bottom: 1px solid #d0dae6;
}

.subsection-header .subsection-title {
    font-size: .92rem;
    font-weight: 700;
    margin: 0;
    color: var(--brand-dark);
}

.subsection-header .subsection-number {
    display: inline-block;
    background: var(--brand);
    color: #fff;
    padding: 2px 8px;
    border-radius: 4px;
    font-size: .74rem;
    font-weight: 700;
    margin-right: 8px;
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
    font-size: .85rem;
    font-weight: 600;
    color: var(--brand-dark);
    margin-bottom: 10px;
    text-transform: uppercase;
    letter-spacing: .02em;
    padding-bottom: 8px;
    border-bottom: 2px solid #e8ecf1;
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

.security-table {
    width: 100%;
    border-collapse: separate;
    border-spacing: 0;
}

.security-table th {
    background: linear-gradient(135deg, #f8fafc 0%, #edf2f7 100%);
    color: var(--ink);
    font-weight: 700;
    font-size: .8rem;
    padding: 10px 12px;
    border-bottom: 2px solid #d0dae6;
    text-transform: uppercase;
    letter-spacing: .01em;
}

.security-table td {
    padding: 12px;
    border-bottom: 1px solid #e8ecf1;
    vertical-align: top;
}

.security-table tr:last-child td {
    border-bottom: none;
}

.security-table tr:hover {
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
</style>

<div class="row">
    <div class="col-12">
        <div class="page-header mb-3">
            <h1 class="page-title">A. Proposed Network Infrastructure</h1>
            <p class="page-subtitle">Network infrastructure including cybersecurity components</p>
        </div>
        
        <div class="info-banner">
            <i class="fa-solid fa-network-wired"></i>
            Complete this section to illustrate your agency's proposed network infrastructure including cybersecurity components.
        </div>
    </div>
</div>

<form action="<?= site_url('employee/proposed-ict-strategy/network-infrastructure/save') ?>" method="post" enctype="multipart/form-data">
    <?= csrf_field() ?>

    <div class="main-section-card">
        <div class="main-header">
            <h2 class="main-title">A. Proposed Network Infrastructure</h2>
            <p class="main-subtitle">Illustrate your agency's proposed network infrastructure including Cybersecurity components</p>
        </div>
        
        <div style="padding: 22px;">
            <!-- A.1 LAN/WAN Setup -->
            <div class="subsection-card">
                <div class="subsection-header">
                    <span class="subsection-number">A.1</span>
                    <span class="subsection-title">LAN/WAN Setup - Connectivity Type and Bandwidth</span>
                </div>
                <div class="subsection-body">
                    <div class="info-banner">
                        <i class="fa-solid fa-info-circle"></i>
                        Illustrate the layout or configuration of the proposed network architecture through a diagram. Specify the connectivity type and upload/download speeds per office or site and if IPV6 ready. Highlight the proposed cybersecurity components to be put in-place.
                    </div>
                    
                    <!-- A.1.i Department-wide Connectivity -->
                    <div class="form-section-label">
                        <i class="fa-solid fa-diagram-project me-2"></i>A.1.i Department-wide Connectivity
                    </div>
                    
                    <div class="row g-3 mb-4">
                        <div class="col-md-12">
                            <div class="file-upload-area">
                                <i class="fa-solid fa-cloud-arrow-up"></i>
                                <p>Upload network architecture diagram showing connectivity among attached agencies</p>
                                <input type="file" class="form-control mt-2" name="dept_network_diagram" accept="image/*,.pdf">
                            </div>
                        </div>
                        
                        <div class="col-md-6">
                            <label class="form-label">Connectivity Type</label>
                            <select class="form-select" name="dept_connectivity_type">
                                <option value="">Select connectivity type</option>
                                <option value="fiber">Fiber Optic</option>
                                <option value="dsl">DSL</option>
                                <option value="broadband">Broadband</option>
                                <option value="wireless">Wireless</option>
                                <option value="satellite">Satellite</option>
                                <option value="leased-line">Leased Line</option>
                                <option value="mpls">MPLS</option>
                            </select>
                        </div>
                        
                        <div class="col-md-6">
                            <label class="form-label">IPV6 Ready</label>
                            <select class="form-select" name="dept_ipv6_ready">
                                <option value="">Select status</option>
                                <option value="yes">Yes</option>
                                <option value="no">No</option>
                                <option value="planned">Planned</option>
                            </select>
                        </div>
                        
                        <div class="col-md-6">
                            <label class="form-label"><i class="fa-solid fa-upload me-1"></i>Upload Speed</label>
                            <input type="text" class="form-control" name="dept_upload_speed" placeholder="e.g., 100 Mbps">
                        </div>
                        
                        <div class="col-md-6">
                            <label class="form-label"><i class="fa-solid fa-download me-1"></i>Download Speed</label>
                            <input type="text" class="form-control" name="dept_download_speed" placeholder="e.g., 100 Mbps">
                        </div>
                        
                        <div class="col-md-12">
                            <label class="form-label"><i class="fa-solid fa-align-left me-1"></i>Description</label>
                            <textarea class="form-control" name="dept_description" rows="3" placeholder="Describe the department-wide connectivity configuration..."></textarea>
                        </div>
                    </div>
                    
                    <!-- A.1.ii Central Office to Branches -->
                    <div class="form-section-label">
                        <i class="fa-solid fa-sitemap me-2"></i>A.1.ii Central Office to Branches/Regional Offices
                    </div>
                    
                    <div class="row g-3">
                        <div class="col-md-12">
                            <div class="file-upload-area">
                                <i class="fa-solid fa-cloud-arrow-up"></i>
                                <p>Upload network architecture diagram showing connectivity to branches/regional offices</p>
                                <input type="file" class="form-control mt-2" name="regional_network_diagram" accept="image/*,.pdf">
                            </div>
                        </div>
                        
                        <div class="col-md-6">
                            <label class="form-label">Connectivity Type</label>
                            <select class="form-select" name="regional_connectivity_type">
                                <option value="">Select connectivity type</option>
                                <option value="fiber">Fiber Optic</option>
                                <option value="dsl">DSL</option>
                                <option value="broadband">Broadband</option>
                                <option value="wireless">Wireless</option>
                                <option value="satellite">Satellite</option>
                                <option value="leased-line">Leased Line</option>
                                <option value="mpls">MPLS</option>
                                <option value="vpn">VPN</option>
                            </select>
                        </div>
                        
                        <div class="col-md-6">
                            <label class="form-label">IPV6 Ready</label>
                            <select class="form-select" name="regional_ipv6_ready">
                                <option value="">Select status</option>
                                <option value="yes">Yes</option>
                                <option value="no">No</option>
                                <option value="planned">Planned</option>
                            </select>
                        </div>
                        
                        <div class="col-md-6">
                            <label class="form-label"><i class="fa-solid fa-upload me-1"></i>Upload Speed</label>
                            <input type="text" class="form-control" name="regional_upload_speed" placeholder="e.g., 100 Mbps">
                        </div>
                        
                        <div class="col-md-6">
                            <label class="form-label"><i class="fa-solid fa-download me-1"></i>Download Speed</label>
                            <input type="text" class="form-control" name="regional_download_speed" placeholder="e.g., 100 Mbps">
                        </div>
                        
                        <div class="col-md-12">
                            <label class="form-label"><i class="fa-solid fa-building me-1"></i>Branch/Regional Offices Details</label>
                            <textarea class="form-control" name="regional_offices_details" rows="4" placeholder="List branch/regional offices with their specific connectivity details..."></textarea>
                        </div>
                    </div>
                </div>
            </div>

            <!-- A.2 Cybersecurity Control Checklist -->
            <div class="subsection-card">
                <div class="subsection-header">
                    <span class="subsection-number">A.2</span>
                    <span class="subsection-title">Cybersecurity Control Checklist</span>
                </div>
                <div class="subsection-body">
                    <div class="info-banner">
                        <i class="fa-solid fa-shield-halved"></i>
                        Identifying compliance to mandatory and optional items like firewalls and anti-malware.
                    </div>
                    
                    <!-- Physical Security -->
                    <div class="security-section">
                        <div class="security-section-header">
                            <h6><i class="fa-solid fa-building-shield me-2"></i>PHYSICAL SECURITY</h6>
                        </div>
                        <div class="table-responsive">
                            <table class="security-table">
                                <thead>
                                    <tr>
                                        <th style="width: 50%;">Security Control</th>
                                        <th style="width: 15%; text-align: center;">Mandatory</th>
                                        <th style="width: 35%;">Implementation Details</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                            <div class="control-name">Perimeter Protection</div>
                                            <div class="control-description">Security control implemented at the outer boundary of an office/facility to prevent, deter, detect, and delay unauthorized access.</div>
                                        </td>
                                        <td class="text-center">
                                            <div class="checkbox-wrapper">
                                                <input type="checkbox" class="form-check-input" name="perimeter_protection" value="1">
                                                <span class="mandatory-badge">Required</span>
                                            </div>
                                        </td>
                                        <td>
                                            <textarea class="form-control form-control-sm" name="perimeter_protection_details" rows="2" placeholder="Describe implementation..."></textarea>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="control-name">Access Control</div>
                                            <div class="control-description">Security control that regulates who or what is permitted to access specific physical locations.</div>
                                        </td>
                                        <td class="text-center">
                                            <div class="checkbox-wrapper">
                                                <input type="checkbox" class="form-check-input" name="access_control" value="1">
                                                <span class="mandatory-badge">Required</span>
                                            </div>
                                        </td>
                                        <td>
                                            <textarea class="form-control form-control-sm" name="access_control_details" rows="2" placeholder="Describe implementation..."></textarea>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="control-name">Surveillance System</div>
                                            <div class="control-description">Integrated video monitoring technologies designed to continuously observe, record, and store activities.</div>
                                        </td>
                                        <td class="text-center">
                                            <div class="checkbox-wrapper">
                                                <input type="checkbox" class="form-check-input" name="surveillance_system" value="1">
                                                <span class="mandatory-badge">Required</span>
                                            </div>
                                        </td>
                                        <td>
                                            <textarea class="form-control form-control-sm" name="surveillance_system_details" rows="2" placeholder="Describe implementation..."></textarea>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="control-name">Detection System</div>
                                            <div class="control-description">Security control designed to identify and alert personnel to unauthorized access attempts.</div>
                                        </td>
                                        <td class="text-center">
                                            <span class="optional-badge">Optional</span>
                                        </td>
                                        <td>
                                            <textarea class="form-control form-control-sm" name="detection_system_details" rows="2" placeholder="Describe implementation..."></textarea>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
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
                        <a href="<?= site_url('employee/proposed-ict-strategy/enterprise-architecture') ?>" class="btn btn-success">
                            Next: Enterprise Architecture <i class="fa-solid fa-arrow-right ms-2"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>

<?= $this->endSection() ?>