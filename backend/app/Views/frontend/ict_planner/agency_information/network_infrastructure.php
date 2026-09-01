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
            <h1 class="page-title">Network Infrastructure</h1>
            <p class="page-subtitle">Current network infrastructure assessment.</p>
        </div>
</div>
</div>

<form id="mainForm" action="<?= site_url('ict-planner/agency-information/network-infrastructure/save') ?>" method="post" enctype="multipart/form-data">
    <?= csrf_field() ?>

    <div class="main-section-card">
        <div class="main-header">
            <h2 class="main-title">B. Existing Network Infrastructure</h2>
        </div>
        
        <div style="padding: 22px;">
            <!-- A.1 LAN/WAN Setup -->
            <div class="subsection-card">
                <div class="subsection-header">
                    <span class="subsection-number">B.1</span>
                    <span class="subsection-title">LAN/WAN Setup - Connectivity Type and Bandwidth</span>
                    <i class="fa-solid fa-circle-question help-icon" 
                       data-tooltip="Illustrate the layout or configuration of the proposed network architecture through a diagram. Specify the connectivity type and upload/download speeds per office or site and if IPV6 ready. Highlight the proposed cybersecurity components to be put in-place."></i>
                </div>
                <div class="subsection-body">
                    
                      <!-- A.1.i Department-wide Connectivity -->
                    <div class="form-section-label" style="border-bottom: none;">
                        B.1 Department-wide Connectivity
                    </div>
                    
                    <div class="row g-3 mb-4">
                        <div class="col-md-12">
                            <div class="file-upload-area">
                                <i class="fa-solid fa-cloud-arrow-up"></i>
                                <p>Upload network architecture diagram showing connectivity among attached agencies</p>
                                <div class="upload-wrapper">
                                    <input type="file"
                                           class="form-control mt-2"
                                            name="dept_network_diagram"
                                             accept="image/*,.pdf"
                                             data-upload-url="<?= site_url(
                                               session('role_slug') === 'ict_planner'
                                                ? 'ict-planner/upload-file'
                                                : 'employee/upload-file'
                                                                 ) ?>"
                                          onchange="window.uploadFileInput(this)">
                                    <span class="upload-status" style="font-size:.72rem;margin-top:4px;display:block;"></span>
                                </div>
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
                            <label class="form-label">Upload Speed</label>
                            <input type="text" class="form-control" name="dept_upload_speed" placeholder="e.g., 100 Mbps">
                        </div>
                        
                        <div class="col-md-6">
                            <label class="form-label">Download Speed</label>
                            <input type="text" class="form-control" name="dept_download_speed" placeholder="e.g., 100 Mbps">
                        </div>
                        
                        <div class="col-md-12">
                            <label class="form-label">Description</label>
                            <textarea class="form-control" name="dept_description" rows="3" placeholder="Describe the department-wide connectivity configuration..."></textarea>
                        </div>
                    </div>
                    
                    <!-- A.1.ii Central Office to Branches -->
                    <div class="form-section-label">
                        B.1.ii Central Office to Branches/Regional Offices
                    </div>
                    
                    <div class="row g-3">
                        <div class="col-md-12">
                            <div class="file-upload-area">
                                <i class="fa-solid fa-cloud-arrow-up"></i>
                                <p>Upload network architecture diagram showing connectivity to branches/regional offices</p>
                                <div class="upload-wrapper">
                                    <input type="file"
                                        class="form-control mt-2"
                                name="regional_network_diagram"
                                      accept="image/*,.pdf"
                                       data-upload-url="<?= site_url(
                                      session('role_slug') === 'ict_planner'
                                         ? 'ict-planner/upload-file'
                                            : 'employee/upload-file'
                                                             ) ?>"
                                          onchange="window.uploadFileInput(this)">
                                    <span class="upload-status" style="font-size:.72rem;margin-top:4px;display:block;"></span>
                                </div>
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
                            <label class="form-label">Upload Speed</label>
                            <input type="text" class="form-control" name="regional_upload_speed" placeholder="e.g., 100 Mbps">
                        </div>
                        
                        <div class="col-md-6">
                            <label class="form-label">Download Speed</label>
                            <input type="text" class="form-control" name="regional_download_speed" placeholder="e.g., 100 Mbps">
                        </div>
                        
                        <div class="col-md-12">
                            <label class="form-label">Branch/Regional Offices Details</label>
                            <textarea class="form-control" name="regional_offices_details" rows="4" placeholder="List branch/regional offices with their specific connectivity details..."></textarea>
                        </div>
                    </div>
                </div>
            </div>

            <!-- B.2 Cybersecurity Control Checklist -->
            <div class="subsection-card">
                <div class="subsection-header">
                    <span class="subsection-number">B.2</span>
                    <span class="subsection-title">Cybersecurity Control Checklist</span>
                    <i class="fa-solid fa-circle-question help-icon" 
                       data-tooltip="Check all security controls currently implemented by the agency."></i>
                </div>
                <div class="subsection-body">
                    
                    <div class="checklist-container">
                        
                        <!-- Physical Security -->
                        <div class="category-section">
                            <div class="category-header">
                                <div class="category-title">Physical Security</div>
                                <div class="category-stats">
                                    <span class="stat-item">0/4</span>
                                </div>
                            </div>
                        
                            <div class="control-item">
                                <div class="control-info">
                                    <input type="checkbox" class="control-checkbox" name="perimeter_protection" value="1">
                                    <span class="control-label">Perimeter Protection</span>
                                </div>
                                <span class="control-badge badge-mandatory">Mandatory</span>
                            </div>
                            
                            <div class="control-item">
                                <div class="control-info">
                                    <input type="checkbox" class="control-checkbox" name="access_control" value="1">
                                    <span class="control-label">Access Control</span>
                                </div>
                                <span class="control-badge badge-mandatory">Mandatory</span>
                            </div>
                            
                            <div class="control-item">
                                <div class="control-info">
                                    <input type="checkbox" class="control-checkbox" name="surveillance_system" value="1">
                                    <span class="control-label">Surveillance System</span>
                                </div>
                                <span class="control-badge badge-mandatory">Mandatory</span>
                            </div>
                            
                            <div class="control-item">
                                <div class="control-info">
                                    <input type="checkbox" class="control-checkbox" name="detection_system" value="1">
                                    <span class="control-label">Detection System</span>
                                </div>
                                <span class="control-badge badge-optional">Optional</span>
                            </div>
                        </div>
                        
                        <!-- Perimeter Security -->
                        <div class="category-section">
                            <div class="category-header">
                                <div class="category-title">Perimeter Security</div>
                                <div class="category-stats">
                                    <span class="stat-item">0/4</span>
                                </div>
                            </div>
                        
                            <div class="control-item">
                                <div class="control-info">
                                    <input type="checkbox" class="control-checkbox" name="next_gen_firewall" value="1">
                                    <span class="control-label">Next Generation Firewalls</span>
                                </div>
                                <span class="control-badge badge-mandatory">Mandatory</span>
                            </div>
                            
                            <div class="control-item">
                                <div class="control-info">
                                    <input type="checkbox" class="control-checkbox" name="ids_ips" value="1">
                                    <span class="control-label">Intrusion Detection/Prevention Systems (IDS/IPS)</span>
                                </div>
                                <span class="control-badge badge-mandatory">Mandatory</span>
                            </div>
                            
                            <div class="control-item">
                                <div class="control-info">
                                    <input type="checkbox" class="control-checkbox" name="waf" value="1">
                                    <span class="control-label">Web Application Firewalls (WAFs)</span>
                                </div>
                                <span class="control-badge badge-mandatory">Mandatory</span>
                            </div>
                            
                            <div class="control-item">
                                <div class="control-info">
                                    <input type="checkbox" class="control-checkbox" name="dmz" value="1">
                                    <span class="control-label">Demilitarized Zone (DMZ)</span>
                                </div>
                                <span class="control-badge badge-optional">Optional</span>
                            </div>
                        </div>
                        
                        <!-- Network Security -->
                        <div class="category-section">
                            <div class="category-header">
                                <div class="category-title">Network Security</div>
                                <div class="category-stats">
                                    <span class="stat-item">0/2</span>
                                </div>
                            </div>
                        
                            <div class="control-item">
                                <div class="control-info">
                                    <input type="checkbox" class="control-checkbox" name="data_encryption" value="1">
                                    <span class="control-label">Data Encryption</span>
                                </div>
                                <span class="control-badge badge-mandatory">Mandatory</span>
                            </div>
                            
                            <div class="control-item">
                                <div class="control-info">
                                    <input type="checkbox" class="control-checkbox" name="network_segmentation" value="1">
                                    <span class="control-label">Network Segmentation</span>
                                </div>
                                <span class="control-badge badge-optional">Optional</span>
                            </div>
                        </div>
                        
                        <!-- Endpoint Security -->
                        <div class="category-section">
                            <div class="category-header">
                                <div class="category-title">Endpoint Security</div>
                                <div class="category-stats">
                                    <span class="stat-item">0/4</span>
                                </div>
                            </div>
                        
                            <div class="control-item">
                                <div class="control-info">
                                    <input type="checkbox" class="control-checkbox" name="antivirus_antimalware" value="1">
                                    <span class="control-label">Anti-virus and Anti-malware Software</span>
                                </div>
                                <span class="control-badge badge-mandatory">Mandatory</span>
                            </div>
                            
                            <div class="control-item">
                                <div class="control-info">
                                    <input type="checkbox" class="control-checkbox" name="application_control" value="1">
                                    <span class="control-label">Application Control</span>
                                </div>
                                <span class="control-badge badge-mandatory">Mandatory</span>
                            </div>
                            
                            <div class="control-item">
                                <div class="control-info">
                                    <input type="checkbox" class="control-checkbox" name="byod_security" value="1">
                                    <span class="control-label">BYOD Security</span>
                                </div>
                                <span class="control-badge badge-mandatory">Mandatory</span>
                            </div>
                            
                            <div class="control-item">
                                <div class="control-info">
                                    <input type="checkbox" class="control-checkbox" name="xdr" value="1">
                                    <span class="control-label">Extended Detection and Response (XDR)</span>
                                </div>
                                <span class="control-badge badge-optional">Optional</span>
                            </div>
                        </div>
                        
                        <!-- Data Security -->
                        <div class="category-section">
                            <div class="category-header">
                                <div class="category-title">Data Security</div>
                                <div class="category-stats">
                                    <span class="stat-item">0/3</span>
                                </div>
                            </div>
                        
                            <div class="control-item">
                                <div class="control-info">
                                    <input type="checkbox" class="control-checkbox" name="data_classification" value="1">
                                    <span class="control-label">Data Classification</span>
                                </div>
                                <span class="control-badge badge-mandatory">Mandatory</span>
                            </div>
                            
                            <div class="control-item">
                                <div class="control-info">
                                    <input type="checkbox" class="control-checkbox" name="dlp" value="1">
                                    <span class="control-label">Data Loss Prevention (DLP)</span>
                                </div>
                                <span class="control-badge badge-mandatory">Mandatory</span>
                            </div>
                            
                            <div class="control-item">
                                <div class="control-info">
                                    <input type="checkbox" class="control-checkbox" name="data_backups" value="1">
                                    <span class="control-label">Data Backups and Recovery</span>
                                </div>
                                <span class="control-badge badge-mandatory">Mandatory</span>
                            </div>
                        </div>
                        
                        <!-- Application Security -->
                        <div class="category-section">
                            <div class="category-header">
                                <div class="category-title">Application Security</div>
                                <div class="category-stats">
                                    <span class="stat-item">0/1</span>
                                </div>
                            </div>
                        
                            <div class="control-item">
                                <div class="control-info">
                                    <input type="checkbox" class="control-checkbox" name="security_scanning" value="1">
                                    <span class="control-label">Regular Security Scanning and Testing</span>
                                </div>
                                <span class="control-badge badge-mandatory">Mandatory</span>
                            </div>
                        </div>
                        
                        <!-- Other Measures -->
                        <div class="category-section">
                            <div class="category-header">
                                <div class="category-title">Other Measures</div>
                                <div class="category-stats">
                                    <span class="stat-item">0/11</span>
                                </div>
                            </div>
                        
                            <div class="control-item">
                                <div class="control-info">
                                    <input type="checkbox" class="control-checkbox" name="vulnerability_assessment" value="1">
                                    <span class="control-label">Vulnerability Assessment</span>
                                </div>
                                <span class="control-badge badge-notspecified">Not Specified</span>
                            </div>
                            
                            <div class="control-item">
                                <div class="control-info">
                                    <input type="checkbox" class="control-checkbox" name="patch_management" value="1">
                                    <span class="control-label">Patch Management</span>
                                </div>
                                <span class="control-badge badge-notspecified">Not Specified</span>
                            </div>
                            
                            <div class="control-item">
                                <div class="control-info">
                                    <input type="checkbox" class="control-checkbox" name="strong_password" value="1">
                                    <span class="control-label">Strong Password Policies</span>
                                </div>
                                <span class="control-badge badge-notspecified">Not Specified</span>
                            </div>
                            
                            <div class="control-item">
                                <div class="control-info">
                                    <input type="checkbox" class="control-checkbox" name="mfa" value="1">
                                    <span class="control-label">Multi-Factor Authentication (MFA)</span>
                                </div>
                                <span class="control-badge badge-notspecified">Not Specified</span>
                            </div>
                            
                            <div class="control-item">
                                <div class="control-info">
                                    <input type="checkbox" class="control-checkbox" name="access_reviews" value="1">
                                    <span class="control-label">Access Reviews</span>
                                </div>
                                <span class="control-badge badge-notspecified">Not Specified</span>
                            </div>
                            
                            <div class="control-item">
                                <div class="control-info">
                                    <input type="checkbox" class="control-checkbox" name="security_logs" value="1">
                                    <span class="control-label">Security Logs</span>
                                </div>
                                <span class="control-badge badge-notspecified">Not Specified</span>
                            </div>
                            
                            <div class="control-item">
                                <div class="control-info">
                                    <input type="checkbox" class="control-checkbox" name="log_analysis" value="1">
                                    <span class="control-label">Log Analysis</span>
                                </div>
                                <span class="control-badge badge-notspecified">Not Specified</span>
                            </div>
                            
                            <div class="control-item">
                                <div class="control-info">
                                    <input type="checkbox" class="control-checkbox" name="incident_response" value="1">
                                    <span class="control-label">Incident Response Plan</span>
                                </div>
                                <span class="control-badge badge-notspecified">Not Specified</span>
                            </div>
                            
                            <div class="control-item">
                                <div class="control-info">
                                    <input type="checkbox" class="control-checkbox" name="siem" value="1">
                                    <span class="control-label">Security Information and Event Management (SIEM)</span>
                                </div>
                                <span class="control-badge badge-notspecified">Not Specified</span>
                            </div>
                            
                            <div class="control-item">
                                <div class="control-info">
                                    <input type="checkbox" class="control-checkbox" name="penetration_testing" value="1">
                                    <span class="control-label">Penetration Testing</span>
                                </div>
                                <span class="control-badge badge-notspecified">Not Specified</span>
                            </div>
                            
                            <div class="control-item">
                                <div class="control-info">
                                    <input type="checkbox" class="control-checkbox" name="sdlc" value="1">
                                    <span class="control-label">Secure Software Development Life Cycle (SDLC)</span>
                                </div>
                                <span class="control-badge badge-notspecified">Not Specified</span>
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
                    <button type="button" class="nav-btn nav-btn-next" onclick="window.navigateToPage('<?= site_url('ict-planner/agency-information/information-systems-inventory') ?>')">
                        <span>Information Systems Inventory</span>
                        <i class="fa-solid fa-arrow-right"></i>
                    </button>
                </div>
</div>
        </div>
    </div>
</form>

<script>

const DATABASE_SAVED_DATA = <?= json_encode(
    !empty($saved['network_infrastructure_data'])
        ? json_decode($saved['network_infrastructure_data'], true)
        : []
) ?>;

// Cybersecurity checklist counter functionality
function updateCategoryStats() {

    const categorySections =
        document.querySelectorAll('.category-section');

    categorySections.forEach(function(section) {

        const checkboxes =
            section.querySelectorAll('.control-checkbox');

        const statItem =
            section.querySelector('.stat-item');

        if (!statItem) return;

        const checkedCount =
            section.querySelectorAll(
                '.control-checkbox:checked'
            ).length;

        const totalCount =
            checkboxes.length;

        statItem.textContent =
            `${checkedCount}/${totalCount}`;
    });
}

document.addEventListener('DOMContentLoaded', function() {

    const helpIcons = document.querySelectorAll('.help-icon');

    helpIcons.forEach(icon => {

        icon.addEventListener('mouseenter', function(e) {

            const tooltipText =
                this.getAttribute('data-tooltip');

            const tooltip =
                document.createElement('div');

            tooltip.className =
                'tooltip-content';

            tooltip.textContent =
                tooltipText;

            tooltip.id =
                'active-tooltip';

            document.body.appendChild(tooltip);

            const rect =
                this.getBoundingClientRect();

            tooltip.style.left =
                (rect.right + 8) + 'px';

            tooltip.style.top =
                rect.top + 'px';

            requestAnimationFrame(() => {

                tooltip.classList.add('visible');

                const tooltipRect =
                    tooltip.getBoundingClientRect();

                if (
                    tooltipRect.right >
                    window.innerWidth
                ) {
                    tooltip.style.left =
                        (rect.left -
                        tooltipRect.width -
                        8) + 'px';
                }

                if (
                    tooltipRect.bottom >
                    window.innerHeight
                ) {
                    tooltip.style.top =
                        (window.innerHeight -
                        tooltipRect.height -
                        10) + 'px';
                }

            });

        });

        icon.addEventListener('mouseleave', function() {

            const tooltip =
                document.getElementById(
                    'active-tooltip'
                );

            if (tooltip) {
                tooltip.remove();
            }

        });

    });


    // ==========================================
    // CHECKBOX COUNTER
    // ==========================================

    // Initial counter
    updateCategoryStats();


    // Update counter whenever a checkbox changes
    const allCheckboxes =
        document.querySelectorAll(
            '.control-checkbox'
        );

    allCheckboxes.forEach(function(checkbox) {

        checkbox.addEventListener(
            'change',
            function() {

                updateCategoryStats();

            }
        );

    });


    // ==========================================
    // LOAD SAVED DATA
    // ==========================================

    window.loadSavedData();


    // Recalculate AFTER saved checkbox states
    // have been restored
    updateCategoryStats();


    if (
        typeof updateStatusIndicators ===
        'function'
    ) {
        updateStatusIndicators();
    }


    // Retry after async rendering
    setTimeout(function() {

        window.loadSavedData();

        updateCategoryStats();

        if (
            typeof updateStatusIndicators ===
            'function'
        ) {
            updateStatusIndicators();
        }

    }, 300);

});

// Clear form function
window.clearForm = function() {
    console.log('clearForm called');
    try {
        showConfirmModal('Are you sure you want to clear all fields? This action cannot be undone.', function() {
            const form = document.querySelector('#mainForm');
            if (form) {
                // Explicitly clear all fields instead of form.reset() to avoid reset-checked checkboxes
                form.querySelectorAll('input:not([type="hidden"]):not([type="file"]), textarea, select').forEach(function(el) {
                    if (el.type === 'checkbox' || el.type === 'radio') {
                        el.checked = false;
                    } else {
                        el.value = '';
                    }
                });
                // Remove all file previews
                form.querySelectorAll('.file-preview').forEach(el => el.remove());
                // Reset checkbox counters
                    updateCategoryStats();
                    // Clear localStorage
                    localStorage.removeItem('network-infrastructure-form');
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

// Load saved data from localStorage on page load
window.loadSavedData = function() {

    console.log('loadSavedData called');

    try {

        const formDataObj = DATABASE_SAVED_DATA || {};

        console.log(
            'Database saved data:',
            Object.keys(formDataObj)
        );

        const form = document.querySelector('#mainForm');

        if (!form) {
            console.error('Form #mainForm not found');
            return;
        }

        let restoredCount = 0;

        Object.keys(formDataObj).forEach(function(key) {

            const input = form.querySelector(`[name="${key}"]`);

            /*
             * Ignore fields that do not exist in the current form.
             */
            if (!input) {
                return;
            }

            const val = formDataObj[key];

            /*
             * Uploaded file path
             */
            if (
                typeof val === 'string' &&
                val.startsWith('uploads/')
            ) {

                input.setAttribute(
                    'data-uploaded-path',
                    val
                );

                if (input.type === 'file') {

                    const status =
                        input.parentElement.querySelector(
                            '.upload-status'
                        );

                    if (status) {

                        status.textContent = '✔ Uploaded';

                        status.className =
                            'upload-status text-success';

                        status.style.display = 'block';
                    }

                    /*
                     * Remove previous preview.
                     */
                    const oldPreview =
                        input.parentElement.querySelector(
                            '.saved-file-preview'
                        );

                    if (oldPreview) {
                        oldPreview.remove();
                    }

                    /*
                     * Create saved file preview.
                     */
                    const preview =
                        document.createElement('div');

                    preview.className =
                        'saved-file-preview';

                    preview.style.marginTop = '8px';
                    preview.style.padding = '10px';
                    preview.style.border =
                        '1px solid #dee2e6';
                    preview.style.borderRadius = '6px';
                    preview.style.background = '#f8f9fa';

                    const fileName =
                        val.split('/').pop();

                    const extension =
                        fileName
                            .split('.')
                            .pop()
                            .toLowerCase();

                    const imageExtensions = [
                        'jpg',
                        'jpeg',
                        'png',
                        'gif',
                        'webp'
                    ];

                    if (
                        imageExtensions.includes(extension)
                    ) {

                        const img =
                            document.createElement('img');

                        img.src =
                            '<?= base_url() ?>/' + val;

                        img.style.maxWidth = '180px';
                        img.style.maxHeight = '120px';
                        img.style.display = 'block';
                        img.style.objectFit = 'contain';
                        img.style.marginBottom = '6px';

                        preview.appendChild(img);
                    }

                    const fileText =
                        document.createElement('div');

                    fileText.innerHTML =
                        '<strong>Uploaded file:</strong> ' +
                        fileName;

                    preview.appendChild(fileText);

                    input.parentElement.appendChild(
                        preview
                    );
                }

                restoredCount++;

                return;
            }

            /*
             * Checkbox
             */
            if (input.type === 'checkbox') {

                input.checked =
                    val === '1' ||
                    val === 1 ||
                    val === true ||
                    val === 'on' ||
                    val === 'true';

                restoredCount++;

                return;
            }

            /*
             * Radio button
             */
            if (input.type === 'radio') {

                const radio =
                    form.querySelector(
                        `[name="${key}"][value="${val}"]`
                    );

                if (radio) {
                    radio.checked = true;
                }

                restoredCount++;

                return;
            }

            /*
             * Text, textarea, select, number, etc.
             */
            input.value = val ?? '';

            restoredCount++;
        });

        updateCategoryStats();

        console.log(
            'Database data loaded. Restored',
            restoredCount,
            'fields.'
        );

    } catch (error) {

        console.error(
            'Error loading database saved data:',
            error
        );

    }
};

window.saveChanges = function(showAlert = true) {

    return new Promise(function(resolve) {

        const form =
            document.querySelector('#mainForm');

        if (!form) {

            console.error('Form #mainForm not found');

            if (showAlert) {
                showAlertModal(
                    'Error',
                    'Form not found.'
                );
            }

            resolve();
            return;
        }

        /*
         * Add uploaded file paths as hidden inputs
         * so PHP can save them into the database.
         */
        const fileFields = [
            'dept_network_diagram',
            'regional_network_diagram'
        ];

        fileFields.forEach(function(fieldName) {

            const fileInput =
                form.querySelector(
                    `[name="${fieldName}"]`
                );

            if (!fileInput) {
                return;
            }

            const uploadedPath =
                fileInput.getAttribute(
                    'data-uploaded-path'
                );

            if (!uploadedPath) {
                return;
            }

            /*
             * Remove previous hidden input.
             */
            const oldHidden =
                form.querySelector(
                    `[name="${fieldName}_uploaded_path"]`
                );

            if (oldHidden) {
                oldHidden.remove();
            }

            /*
             * Create hidden input.
             */
            const hidden =
                document.createElement('input');

            hidden.type = 'hidden';

            hidden.name =
                fieldName + '_uploaded_path';

            hidden.value =
                uploadedPath;

            form.appendChild(hidden);
        });


        /*
         * Submit directly to PHP controller.
         */
        form.submit();

        resolve();

    });
};

function finalizeSave(formDataObj, showAlert) {
    // Merge with previous localStorage data to preserve file previews
    const prevData = JSON.parse(localStorage.getItem('network-infrastructure-form') || '{}');
    Object.keys(prevData).forEach(key => {
        const val = prevData[key];
        if (typeof val === 'string' && (val.startsWith('data:') || val.startsWith('uploads/'))) {
            if (!(key in formDataObj) || formDataObj[key] === '') {
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
        localStorage.setItem('network-infrastructure-form', jsonStr);
        
        const verify = localStorage.getItem('network-infrastructure-form');
        console.log('Save verified:', verify ? 'OK (' + Object.keys(JSON.parse(verify)).length + ' keys)' : 'FAILED');
        
        if (typeof updateStatusIndicators === 'function') updateStatusIndicators();
        if (showAlert) showAlertModal('Success', 'Changes saved successfully!');
    } catch (error) {
        console.error('Error saving to localStorage:', error);
        if (error.name === 'QuotaExceededError' || error.code === 22) {
            if (showAlert) showAlertModal('Error', 'Unable to save: File(s) too large. Please reduce file sizes and try again.');
        } else {
            if (showAlert) showAlertModal('Error', 'Error saving changes: ' + error.message);
        }
    }
}

// Navigate to page after saving
window.navigateToPage = function(url) {
    console.log('navigateToPage called with url:', url);
    // If in edit mode, rewrite URLs to stay in edit context
    var editId = localStorage.getItem('edit_project_id');
    if (editId) {
        url = url.replace('ict-planner/', 'edit-ict-project/' + editId + '/');
        if (url.indexOf('ict-planner/dashboard') !== -1) {
            url = '<?= site_url('ict-planner/agency-information') ?>';
        }
    }
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
        const doNav = () => {
            // Merge with previous localStorage data to preserve file previews
            const prevData = JSON.parse(localStorage.getItem('network-infrastructure-form') || '{}');
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
            localStorage.setItem('network-infrastructure-form', jsonStr);
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

window.uploadFileInput = function(input) {

    const file = input.files[0];

    if (!file) return;

    const status =
        input.parentElement.querySelector('.upload-status');

    status.textContent = "Uploading...";

    const formData = new FormData();

    formData.append('file', file);

    formData.append(
        '<?= csrf_token() ?>',
        '<?= csrf_hash() ?>'
    );

    fetch(input.dataset.uploadUrl, {
        method: 'POST',
        body: formData
    })
    .then(response => response.json())
    .then(data => {

        if (data.success) {

            input.setAttribute(
                'data-uploaded-path',
                data.path
            );

            status.textContent = "✔ Uploaded";

        } else {

            status.textContent = data.message;

        }

    })
    .catch(error => {

        console.error(error);

        status.textContent = "Upload failed.";

    });

};   

</script>

<?= $this->endSection() ?>