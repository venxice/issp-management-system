<?= $this->extend('frontend/layout/app') ?>

<?= $this->section('content') ?>
<style>
.project-hero {
    background: #fff;
    border: 1px solid #dde4ed;
    border-radius: 12px;
    padding: 20px 22px;
    margin-bottom: 20px;
    box-shadow: 0 8px 20px rgba(15,23,42,.04);
}
.project-hero__titles { margin-bottom: 14px; }
.project-hero__title-row { display: flex; align-items: baseline; gap: 6px; padding: 2px 0; }
.project-hero__title-label { font-size: .75rem; font-weight: 600; color: #6c757d; flex-shrink: 0; }
.project-hero__title-value { font-size: .85rem; font-weight: 600; color: var(--ink); line-height: 1.3; }
.project-hero__meta { display: flex; flex-wrap: wrap; gap: 14px 24px; }
.project-hero__meta-item { display: flex; flex-direction: column; gap: 2px; }
.project-hero__meta-label { font-size: .7rem; color: #8898aa; font-weight: 600; text-transform: uppercase; letter-spacing: .03em; }
.project-hero__meta-value { font-size: .85rem; color: var(--ink); font-weight: 500; }
.project-hero__actions { display: flex; gap: 6px; margin-top: 16px; padding-top: 14px; border-top: 1px solid #eef2f6; }
.project-hero__desc { margin-top: 12px; padding-top: 12px; border-top: 1px solid #eef2f6; }
.project-hero__desc-label { font-size: .7rem; font-weight: 600; color: #8898aa; text-transform: uppercase; letter-spacing: .03em; margin-bottom: 4px; }
.project-hero__desc-body { font-size: .85rem; color: #475569; line-height: 1.6; }
.form-section {
    background: #fff;
    border: 1px solid #dde4ed;
    border-radius: 10px;
    margin-bottom: 16px;
    overflow: hidden;
    box-shadow: 0 4px 12px rgba(15,23,42,.03);
}
.form-section__header {
    display: flex;
    align-items: center;
    gap: 10px;
    padding: 12px 16px;
    background: linear-gradient(180deg, #f8fafc 0%, #edf2f7 100%);
    border-bottom: 1px solid #d0dae6;
    cursor: pointer;
    user-select: none;
    transition: background 0.15s;
}
.form-section__header:hover {
    background: linear-gradient(180deg, #f0f4f8 0%, #e5ecf3 100%);
}
.form-section__header-icon {
    width: 28px;
    height: 28px;
    border-radius: 6px;
    background: linear-gradient(180deg, #566d8b 0%, #3f5673 100%);
    color: #fff;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: .78rem;
    flex-shrink: 0;
}
.form-section__header-title {
    font-size: .9rem;
    font-weight: 700;
    flex: 1;
}
.form-section__header-count {
    font-size: .72rem;
    color: var(--muted);
    background: #e8ecf1;
    padding: 2px 10px;
    border-radius: 10px;
    font-weight: 600;
}
.form-section__toggle {
    color: #9aa6b8;
    font-size: .8rem;
    transition: transform 0.2s;
}
.form-section__toggle.open {
    transform: rotate(180deg);
}
.form-section__body {
    padding: 14px 16px;
    display: none;
}
.form-section__body.open {
    display: block;
}
.detail-row {
    display: grid;
    grid-template-columns: 200px 1fr;
    gap: 6px 16px;
    padding: 6px 0;
    border-bottom: 1px solid #f2f5f8;
}
.detail-row:last-child {
    border-bottom: none;
}
.detail-row__key {
    font-size: .78rem;
    color: var(--muted);
    font-weight: 600;
    padding: 2px 0;
}
.detail-row__val {
    font-size: .85rem;
    color: var(--ink);
    word-break: break-word;
    padding: 2px 0;
}
.detail-row__val.empty {
    color: #c5ccd6;
    font-style: italic;
}
.sub-header {
    font-size: .78rem;
    font-weight: 700;
    color: var(--brand-dark);
    text-transform: uppercase;
    letter-spacing: .01em;
    padding: 8px 0;
    margin: 16px 0 10px;
    border-bottom: 1px solid #d0dae6;
}
.sub-header:first-of-type {
    margin-top: 0;
}
.group-header { font-size: .75rem; font-weight: 700; color: #3f5673; padding: 3px 0; margin: 14px 0 6px; border-bottom: 1px solid #dde4ed; }
.cyber-category {
    margin-bottom: 20px;
    padding-bottom: 16px;
    border-bottom: 1px solid #e8ecf1;
}
.cyber-category:last-child {
    border-bottom: none;
    margin-bottom: 0;
    padding-bottom: 0;
}
.cyber-category__header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 10px;
}
.cyber-category__title {
    font-size: .88rem;
    font-weight: 700;
    color: var(--brand-dark);
    text-transform: uppercase;
    letter-spacing: .02em;
}
.cyber-category__count {
    font-size: .75rem;
    font-weight: 600;
    color: var(--muted);
    background: #f0f2f5;
    padding: 2px 10px;
    border-radius: 10px;
}
.cyber-item {
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: 7px 10px;
    margin-bottom: 4px;
    border-radius: 6px;
    background: #f8fafc;
    gap: 10px;
}
.cyber-item__info {
    display: flex;
    align-items: center;
    gap: 10px;
    flex: 1;
}
.cyber-item__icon {
    width: 18px;
    text-align: center;
    font-size: .78rem;
    flex-shrink: 0;
}
.cyber-item__icon.checked {
    color: #2b6cb0;
}
.cyber-item__icon.unchecked {
    color: #c5ccd6;
}
.cyber-item__label {
    font-size: .82rem;
    font-weight: 500;
    color: var(--ink);
}
.cyber-item__badge {
    display: inline-block;
    padding: 1px 8px;
    border-radius: 4px;
    font-size: .68rem;
    font-weight: 600;
    white-space: nowrap;
    flex-shrink: 0;
}
.cyber-item__badge.mandatory {
    background: #566d8b;
    color: #fff;
}
.cyber-item__badge.optional {
    background: #8898aa;
    color: #fff;
}
.cyber-item__badge.notspecified {
    background: #6c757d;
    color: #fff;
}
.view-table {
    width: 100%;
    border-collapse: collapse;
    margin-bottom: 12px;
    font-size: .82rem;
}
.view-table th {
    background: #f0f4f8;
    font-weight: 700;
    color: var(--ink);
    padding: 8px 10px;
    border-bottom: 2px solid #d0dae6;
    text-align: left;
    font-size: .78rem;
    text-transform: uppercase;
    letter-spacing: .01em;
}
.view-table td {
    padding: 8px 10px;
    border-bottom: 1px solid #e8ecf1;
    vertical-align: top;
}
.view-table tr:last-child td {
    border-bottom: none;
}
.view-table .row-label {
    font-weight: 700;
    color: var(--brand-dark);
    background: #f8fafc;
    white-space: nowrap;
    width: 1%;
}
.kpi-sub-header {
    font-size: .75rem;
    font-weight: 700;
    color: var(--muted);
    text-transform: uppercase;
    letter-spacing: .02em;
    padding: 10px 0 6px;
    margin-top: 12px;
    border-bottom: 1px solid #eef2f6;
}
.kpi-project-title {
    font-size: .85rem;
    font-weight: 700;
    color: var(--brand-dark);
    margin: 10px 0 8px;
    padding: 6px 10px;
    background: #f8fafc;
    border-radius: 4px;
    border-left: 3px solid var(--brand);
}
.info-badge {
    display: inline-block;
    background: #e8ecf1;
    color: var(--muted);
    font-size: .7rem;
    font-weight: 600;
    padding: 2px 8px;
    border-radius: 4px;
}
.checklist-item {
    display: flex;
    align-items: center;
    gap: 10px;
    padding: 4px 0;
}
.checklist-item__icon {
    width: 18px;
    text-align: center;
    font-size: .8rem;
    flex-shrink: 0;
}
.checklist-item__icon.checked { color: #2b6cb0; }
.checklist-item__icon.unchecked { color: #c5ccd6; }
.checklist-item__label {
    font-size: .82rem;
    color: var(--ink);
    font-weight: 500;
}
.checklist-item__label.unchecked { color: #8898aa; }
.checklist-item__text {
    font-size: .78rem;
    color: #536783;
    font-style: italic;
    margin-left: 4px;
}
.checklist-count {
    font-weight: 400;
    color: #8898aa;
    font-size: .72rem;
    margin-left: 8px;
}
.remarks-card {
    margin-top: 20px;
    background: #f0f4f9;
    border: 1px solid #c5d9f0;
    border-radius: 10px;
    padding: 16px 20px;
}
.remarks-card__header {
    display: flex;
    align-items: center;
    gap: 8px;
    font-size: .72rem;
    font-weight: 600;
    color: #2a5c8a;
    text-transform: uppercase;
    letter-spacing: .04em;
    margin-bottom: 8px;
}
.remarks-card__header i { font-size: .82rem; }
.remarks-card__body {
    font-size: .85rem;
    color: #334155;
    line-height: 1.7;
}
</style>


<?php
$ict = $formData['ict-projects-form'] ?? [];
$intTitle = $ict['internal_project_title'] ?? $project['title'] ?? 'Untitled';
$intDesc = $ict['internal_description'] ?? $project['description'] ?? '';
$intBudget = $ict['internal_total_cost'] ?? $project['budget'] ?? 0;
?>
<?php
$statusColors = [
    'pending'     => ['bg' => '#fef3c7', 'fg' => '#92400e', 'br' => '#fde68a'],
    'endorsed'    => ['bg' => '#e8f0fe', 'fg' => '#2a5c8a', 'br' => '#c5d9f0'],
    'approved'    => ['bg' => '#dcfce7', 'fg' => '#166534', 'br' => '#bbf7d0'],
    'rejected'    => ['bg' => '#fee2e2', 'fg' => '#991b1b', 'br' => '#fecaca'],
    'returned'    => ['bg' => '#ffedd5', 'fg' => '#9a3412', 'br' => '#fed7aa'],
    'resubmitted' => ['bg' => '#e0e7ff', 'fg' => '#4338ca', 'br' => '#c7d2fe'],
];
$sc = $statusColors[$project['status']] ?? ['bg' => '#f1f5f9', 'fg' => '#475569', 'br' => '#e2e8f0'];
?>
<div class="project-hero">
    <div class="project-hero__titles">
        <div class="project-hero__title-row">
            <span class="project-hero__title-label">Project Title</span>
            <span class="project-hero__title-value"><?= esc($intTitle) ?></span>
        </div>
    </div>
    <div class="project-hero__meta">
        <div class="project-hero__meta-item">
            <span class="project-hero__meta-label">Status</span>
            <span class="project-hero__meta-value">
                <span class="badge badge-soft" style="font-size:.72rem;padding:4px 12px;background:<?= $sc['bg'] ?>;color:<?= $sc['fg'] ?>;border-color:<?= $sc['br'] ?>;">
                    <?= esc($project['status'] === 'resubmitted' ? 'Pending - Resubmitted' : ucfirst($project['status'])) ?>
                </span>
            </span>
        </div>
        <div class="project-hero__meta-item">
            <span class="project-hero__meta-label">Department</span>
            <span class="project-hero__meta-value"><?= esc($project['department_name'] ?? '-') ?></span>
        </div>
        <div class="project-hero__meta-item">
            <span class="project-hero__meta-label">Submitted by</span>
            <span class="project-hero__meta-value"><?= esc($project['created_by_name'] ?? '-') ?></span>
        </div>
        <div class="project-hero__meta-item">
            <span class="project-hero__meta-label">Budget</span>
            <span class="project-hero__meta-value">₱<?= number_format((float) $intBudget, 2) ?></span>
        </div>
        <div class="project-hero__meta-item">
            <span class="project-hero__meta-label">Submitted Date</span>
            <span class="project-hero__meta-value"><?= esc($project['submitted_at'] ?? $project['created_at'] ?? '-') ?></span>
        </div>
        <div class="project-hero__meta-item">
            <span class="project-hero__meta-label">Last Updated</span>
            <span class="project-hero__meta-value"><?= esc($project['updated_at'] ?? $project['created_at'] ?? '-') ?></span>
        </div>
    </div>
    <?php if ($intDesc): ?>
    <div class="project-hero__desc">
        <div class="project-hero__desc-label">Description</div>
        <div class="project-hero__desc-body"><?= esc($intDesc) ?></div>
    </div>
    <?php endif; ?>
    <div class="project-hero__actions">
        <a href="<?= site_url('ict-planner/download/' . $project['id']) ?>" class="btn btn-outline-primary icon-btn" type="button" title="Download">
            <i class="fa-solid fa-download"></i>
        </a>
        <?php if ($project['status'] === 'pending'): ?>
            <button class="btn btn-outline-primary icon-btn" type="button" title="Endorse to Director General" onclick="openEndorseModal('<?= $project['id'] ?>')">
                <i class="fa-solid fa-check"></i>
            </button>
        <?php else: ?>
            <button class="btn btn-outline-secondary icon-btn" type="button" title="Endorse to Director General" disabled style="opacity:0.35;cursor:not-allowed;pointer-events:none;">
                <i class="fa-solid fa-check"></i>
            </button>
        <?php endif; ?>
    </div>
    <?php if ($project['status'] === 'returned' && !empty($project['remarks'])): ?>
    <div class="remarks-card">
        <div class="remarks-card__header"><i class="fa-solid fa-rotate-left"></i> DG Remarks</div>
        <div class="remarks-card__body"><?= esc($project['remarks']) ?></div>
    </div>
    <?php endif; ?>
</div>

<?php
$sectionLabels = [
    'network-infrastructure-form'      => 'A. Network Infrastructure',
    'enterprise-architecture-form'      => 'B. Enterprise Architecture',
    'ict-human-capital-form'            => 'C. ICT Human Capital',
    'information-systems-form'          => 'D. Information Systems',
    'ict-projects-form'                 => 'E. ICT Projects',
    'performance-measurement-form'      => 'F. Performance Measurement & KPIs',
];

$sectionIcons = [
    'network-infrastructure-form'      => 'fa-network-wired',
    'enterprise-architecture-form'      => 'fa-sitemap',
    'ict-human-capital-form'            => 'fa-users',
    'information-systems-form'          => 'fa-laptop-code',
    'ict-projects-form'                 => 'fa-project-diagram',
    'performance-measurement-form'      => 'fa-chart-line',
];

$fieldLabels = [
    'network-infrastructure-form' => [
        'dept_network_diagram'      => 'Network Architecture Diagram',
        'dept_connectivity_type'    => 'Connectivity Type',
        'dept_ipv6_ready'           => 'IPV6 Ready',
        'dept_upload_speed'         => 'Upload Speed',
        'dept_download_speed'       => 'Download Speed',
        'dept_description'          => 'Description',
        'regional_network_diagram'  => 'Network Architecture Diagram',
        'regional_connectivity_type' => 'Connectivity Type',
        'regional_ipv6_ready'       => 'IPV6 Ready',
        'regional_upload_speed'     => 'Upload Speed',
        'regional_download_speed'   => 'Download Speed',
        'regional_offices_details'  => 'Branch/Regional Offices Details',
    ],
    'enterprise-architecture-form' => [
        'ea_diagram'                => 'Enterprise Architecture Diagram',
        'ea_description'            => 'Description',
    ],
    'ict-human-capital-form' => [
        'position_1'                => 'Position / Designation',
        'position_2'                => 'Position / Designation',
        'position_3'                => 'Position / Designation',
        'position_4'                => 'Position / Designation',
        'status_1'                  => 'Employment Status',
        'status_2'                  => 'Employment Status',
        'status_3'                  => 'Employment Status',
        'status_4'                  => 'Employment Status',
        'count_1'                   => 'No. of Positions',
        'count_2'                   => 'No. of Positions',
        'count_3'                   => 'No. of Positions',
        'count_4'                   => 'No. of Positions',
    ],
    'information-systems-form' => [
        'is_name_1'                 => 'System Name',
        'status_1'                  => 'Status',
        'classification_1'          => 'Classification',
        'description_1'             => 'Description / Purpose',
        'deployment_1'              => 'Deployment Approach',
        'owner_1'                   => 'System Owner',
        'dev_strategy_1'            => 'Development Strategy',
        'platform_1'                => 'Platform / Framework',
        'database_1'                => 'Database Name',
        'storage_1'                 => 'Data Storage',
        'internal_users_1'          => 'Internal Users',
        'external_users_1'          => 'External Users',
        'system_usage_1'            => 'System Usage Type',
        'online_link_1'             => 'Provide Link (if Online)',
        'frontline_1'               => 'Frontline Service',
        'non_frontline_1'           => 'Non-Frontline Service',
        'online_1'                  => 'Online',
        'on_premise_1'              => 'On-premise',
        'hybrid_1'                  => 'Hybrid',
        'interop1_main'             => 'Interoperability',
        'interop1_internal_system'  => 'Internal System Name',
        'interop1_sub'              => 'Interoperability Sub-type',
        'interop1_external_system'  => 'External System',
        'pia_1'                     => 'Privacy Impact Assessment (PIA)',
    ],
    'ict-projects-form' => [
        'internal_project_title'    => 'Internal Project Title',
        'internal_description'      => 'Description',
        'internal_objectives'       => 'Objectives',
        'internal_strategic_pip'    => 'Public Investment Program',
        'internal_strategic_ncp'    => 'National Cybersecurity Plan',
        'internal_strategic_egov'   => 'E-Government Master Plan',
        'internal_strategic_pcb'    => 'Program Convergence Budgeting',
        'internal_strategic_others' => 'Others (Specify)',
        'internal_strategic_others_text' => 'Others - Please specify',
        'internal_harmonization_1'  => 'National Prioritization',
        'internal_harmonization_2'  => 'Resource Optimization',
        'internal_harmonization_3'  => 'Interoperability Framework',
        'internal_harmonization_5'  => 'Scalability and Sustainability',
        'internal_start_date'       => 'Start Date',
        'internal_end_date'         => 'End Date',
        'internal_year1_deliverables' => 'Year 1 Deliverables',
        'internal_year2_deliverables' => 'Year 2 Deliverables',
        'internal_year3_deliverables' => 'Year 3 Deliverables',
        'internal_implementing_unit' => 'Implementing Unit',
        'internal_total_cost'       => 'Total Cost',
        'internal_funding_source'   => 'Funding Source',
    ],
];

$cybersecurityCategories = [
    'Physical Security' => [
        'perimeter_protection'  => ['label' => 'Perimeter Protection', 'badge' => 'Mandatory'],
        'access_control'        => ['label' => 'Access Control', 'badge' => 'Mandatory'],
        'surveillance_system'   => ['label' => 'Surveillance System', 'badge' => 'Mandatory'],
        'detection_system'      => ['label' => 'Detection System', 'badge' => 'Optional'],
    ],
    'Perimeter Security' => [
        'next_gen_firewall'     => ['label' => 'Next Generation Firewalls', 'badge' => 'Mandatory'],
        'ids_ips'               => ['label' => 'Intrusion Detection/Prevention Systems (IDS/IPS)', 'badge' => 'Mandatory'],
        'waf'                   => ['label' => 'Web Application Firewalls (WAFs)', 'badge' => 'Mandatory'],
        'dmz'                   => ['label' => 'Demilitarized Zone (DMZ)', 'badge' => 'Optional'],
    ],
    'Network Security' => [
        'data_encryption'       => ['label' => 'Data Encryption', 'badge' => 'Mandatory'],
        'network_segmentation'  => ['label' => 'Network Segmentation', 'badge' => 'Optional'],
    ],
    'Endpoint Security' => [
        'antivirus_antimalware' => ['label' => 'Anti-virus and Anti-malware Software', 'badge' => 'Mandatory'],
        'application_control'   => ['label' => 'Application Control', 'badge' => 'Mandatory'],
        'byod_security'         => ['label' => 'BYOD Security', 'badge' => 'Mandatory'],
        'xdr'                   => ['label' => 'Extended Detection and Response (XDR)', 'badge' => 'Optional'],
    ],
    'Data Security' => [
        'data_classification'   => ['label' => 'Data Classification', 'badge' => 'Mandatory'],
        'dlp'                   => ['label' => 'Data Loss Prevention (DLP)', 'badge' => 'Mandatory'],
        'data_backups'          => ['label' => 'Data Backups and Recovery', 'badge' => 'Mandatory'],
    ],
    'Application Security' => [
        'security_scanning'     => ['label' => 'Regular Security Scanning and Testing', 'badge' => 'Mandatory'],
    ],
    'Other Measures' => [
        'vulnerability_assessment'  => ['label' => 'Vulnerability Assessment', 'badge' => 'Not Specified'],
        'patch_management'          => ['label' => 'Patch Management', 'badge' => 'Not Specified'],
        'strong_password'           => ['label' => 'Strong Password Policies', 'badge' => 'Not Specified'],
        'mfa'                       => ['label' => 'Multi-Factor Authentication (MFA)', 'badge' => 'Not Specified'],
        'access_reviews'            => ['label' => 'Access Reviews', 'badge' => 'Not Specified'],
        'security_logs'             => ['label' => 'Security Logs', 'badge' => 'Not Specified'],
        'log_analysis'              => ['label' => 'Log Analysis', 'badge' => 'Not Specified'],
        'incident_response'         => ['label' => 'Incident Response Plan', 'badge' => 'Not Specified'],
        'siem'                      => ['label' => 'Security Information and Event Management (SIEM)', 'badge' => 'Not Specified'],
        'penetration_testing'       => ['label' => 'Penetration Testing', 'badge' => 'Not Specified'],
        'sdlc'                      => ['label' => 'Secure Software Development Life Cycle (SDLC)', 'badge' => 'Not Specified'],
    ],
];

$cyberFieldList = [];
foreach ($cybersecurityCategories as $cat) {
    foreach ($cat as $fn => $item) {
        if (is_array($item)) $cyberFieldList[] = $fn;
    }
}

$lanWanFields = [
    'dept_network_diagram','dept_connectivity_type','dept_ipv6_ready',
    'dept_upload_speed','dept_download_speed','dept_description',
    'regional_network_diagram','regional_connectivity_type','regional_ipv6_ready',
    'regional_upload_speed','regional_download_speed','regional_offices_details',
];

$internalProjectFields = [
    'internal_project_title','internal_description','internal_objectives',
    'internal_strategic_pip','internal_strategic_ncp','internal_strategic_egov',
    'internal_strategic_pcb','internal_strategic_others','internal_strategic_others_text',
    'internal_harmonization_1','internal_harmonization_2','internal_harmonization_3',
    'internal_harmonization_4','internal_harmonization_5',
    'internal_start_date','internal_end_date',
    'internal_year1_deliverables','internal_year2_deliverables','internal_year3_deliverables',
    'internal_implementing_unit','internal_total_cost','internal_funding_source',
];

function getFieldLabel($sectionKey, $fieldName, $labels) {
    if (isset($labels[$sectionKey][$fieldName])) {
        return $labels[$sectionKey][$fieldName];
    }
    return ucwords(str_replace(['_', '-'], ' ', $fieldName));
}

function getBadgeClass($badge) {
    $b = strtolower(str_replace(' ', '', $badge));
    return $b === 'notspecified' ? 'notspecified' : strtolower($badge);
}

function renderCheckValue($val) {
    $s = is_array($val) ? json_encode($val) : (string) $val;
    return trim($s);
}

function isChecked($v) {
    $s = is_array($v) ? '' : (string) $v;
    return trim($s) === '1';
}

$firstSection = true;
foreach ($sectionLabels as $key => $label):
    $fields = $formData[$key] ?? [];
    if (!is_array($fields)) $fields = [];
    $fields = array_filter($fields, fn($k) => !str_starts_with($k, 'csrf_'), ARRAY_FILTER_USE_KEY);
    $icon = $sectionIcons[$key] ?? 'fa-file';

    // Compute total/filled per section
    if ($key === 'network-infrastructure-form') {
        $lanWanDisplay = []; $cyberDisplay = [];
        foreach ($fields as $fn => $fv) {
            if (in_array($fn, $lanWanFields)) $lanWanDisplay[$fn] = $fv;
            elseif (in_array($fn, $cyberFieldList)) $cyberDisplay[$fn] = $fv;
            else $lanWanDisplay[$fn] = $fv;
        }
        $totalCount = count($lanWanDisplay) + count($cyberDisplay);
        $filledCount = 0;
        foreach ($lanWanDisplay as $fv) { if (renderCheckValue($fv) !== '') $filledCount++; }
        foreach ($cyberDisplay as $fv) { if (isChecked($fv)) $filledCount++; }
    } elseif ($key === 'ict-human-capital-form') {
        $hcFields = $fields;
        $totalCount = count($hcFields);
        $filledCount = 0;
        foreach ($hcFields as $fv) { if (renderCheckValue($fv) !== '') $filledCount++; }
    } elseif ($key === 'ict-projects-form') {
        $totalCount = count($fields);
        $filledCount = 0;
        foreach ($fields as $fv) { if (renderCheckValue($fv) !== '') $filledCount++; }
    } elseif ($key === 'performance-measurement-form') {
        $flatCount = 0; $flatFilled = 0;
        foreach ($fields as $fn => $fv) {
            if (is_array($fv)) {
                $enc = json_encode($fv);
                if ($enc !== '[]' && $enc !== '{}' && $enc !== '""') $flatFilled++;
                $flatCount++;
            } else {
                $flatCount++;
                if (trim((string) $fv) !== '') $flatFilled++;
            }
        }
        $totalCount = $flatCount;
        $filledCount = $flatFilled;
    } else {
        $totalCount = count($fields);
        $filledCount = 0;
        foreach ($fields as $fv) { if (renderCheckValue($fv) !== '') $filledCount++; }
    }
?>
<div class="form-section" data-section="<?= $key ?>">
    <div class="form-section__header" onclick="toggleSection(this)">
        <div class="form-section__header-icon"><i class="fa-solid <?= $icon ?>"></i></div>
        <span class="form-section__header-title"><?= $label ?></span>
        <span class="form-section__header-count"><?= $filledCount ?>/<?= $totalCount ?> fields</span>
        <span class="form-section__toggle <?= $firstSection ? 'open' : '' ?>"><i class="fa-solid fa-chevron-down"></i></span>
    </div>
    <div class="form-section__body <?= $firstSection ? 'open' : '' ?>">

<?php if ($totalCount === 0): ?>
        <div style="text-align:center;padding:16px;color:#c5ccd6;font-size:.85rem;font-style:italic;">
            <i class="fa-regular fa-file me-1"></i> No data provided in this section.
        </div>

<?php elseif ($key === 'network-infrastructure-form'): ?>
        <div class="sub-header"><i class="fa-solid fa-diagram-project me-1"></i> A.1 Department-wide Connectivity</div>
        <?php
        $deptFields = array_filter($lanWanDisplay, fn($k) => str_starts_with($k, 'dept_'), ARRAY_FILTER_USE_KEY);
        $regionalFields = array_filter($lanWanDisplay, fn($k) => str_starts_with($k, 'regional_'), ARRAY_FILTER_USE_KEY);
        function renderFields($fields, $sectionKey, $fieldLabels) {
            foreach ($fields as $fieldName => $fieldValue):
                $displayLabel = getFieldLabel($sectionKey, $fieldName, $fieldLabels);
                $displayValue = is_array($fieldValue) ? json_encode($fieldValue) : (string) $fieldValue;
                $isEmpty = trim($displayValue) === '' || $displayValue === '[]' || $displayValue === '""';
        ?>
        <?php if (($fieldName === 'dept_network_diagram' || $fieldName === 'regional_network_diagram') && !$isEmpty): ?>
        <div class="detail-row">
            <div class="detail-row__key"><?= esc($displayLabel) ?></div>
            <div class="detail-row__val">
                <?php if (strpos($displayValue, 'data:image/') === 0): ?>
                    <div style="max-width:100%;overflow:hidden;border-radius:8px;border:1px solid #dde4ed;display:inline-block;">
                        <img src="<?= esc($displayValue) ?>" alt="<?= esc($displayLabel) ?>" style="max-width:100%;max-height:400px;display:block;">
                    </div>
                <?php elseif (strpos($displayValue, 'data:') === 0 || strpos($displayValue, 'uploads/') === 0): ?>
                    <a href="<?= strpos($displayValue, 'uploads/') === 0 ? esc(base_url($displayValue)) : esc($displayValue) ?>" target="_blank" class="btn btn-sm btn-outline-primary">
                        <i class="fa-solid fa-file"></i> View Uploaded File
                    </a>
                <?php else: ?>
                    <?= esc($displayValue) ?>
                <?php endif; ?>
            </div>
        </div>
        <?php else: ?>
        <div class="detail-row">
            <div class="detail-row__key"><?= esc($displayLabel) ?></div>
            <div class="detail-row__val <?= $isEmpty ? 'empty' : '' ?>"><?= $isEmpty ? 'Not provided' : esc($displayValue) ?></div>
        </div>
        <?php endif; ?>
        <?php
            endforeach;
        }
        $deptConnFields = array_filter($deptFields, fn($k) => $k !== 'dept_network_diagram', ARRAY_FILTER_USE_KEY);
        ?>
        <div class="group-header">Connectivity Details</div>
        <?php renderFields($deptConnFields, $key, $fieldLabels); ?>
        <?php if (array_key_exists('dept_network_diagram', $deptFields)): ?>
        <div class="group-header">Network Diagram</div>
        <?php renderFields(['dept_network_diagram' => $deptFields['dept_network_diagram']], $key, $fieldLabels); ?>
        <?php endif; ?>
        <div class="sub-header" style="margin-top:16px;padding-top:12px;border-top:2px solid #e8ecf1;">
            <i class="fa-solid fa-sitemap me-1"></i> A.1.ii Central Office to Branches/Regional Offices
        </div>
        <?php
        $regionalConnFields = array_filter($regionalFields, fn($k) => $k !== 'regional_network_diagram', ARRAY_FILTER_USE_KEY);
        ?>
        <div class="group-header">Connectivity Details</div>
        <?php renderFields($regionalConnFields, $key, $fieldLabels); ?>
        <?php if (array_key_exists('regional_network_diagram', $regionalFields)): ?>
        <div class="group-header">Network Diagram</div>
        <?php renderFields(['regional_network_diagram' => $regionalFields['regional_network_diagram']], $key, $fieldLabels); ?>
        <?php endif; ?>

        <div class="sub-header" style="margin-top:20px;padding-top:16px;border-top:2px solid #e8ecf1;">
            <i class="fa-solid fa-shield-halved me-1"></i> A.2 Cybersecurity Control Checklist
            <span style="font-weight:400;text-transform:none;font-size:.74rem;color:var(--muted);margin-left:8px;">(MANDATORY / OPTIONAL)</span>
        </div>
        <?php foreach ($cybersecurityCategories as $catName => $catItems):
            $catChecked = 0; $catTotal = count($catItems);
            foreach ($catItems as $fn => $item) { if (isChecked($cyberDisplay[$fn] ?? '')) $catChecked++; }
        ?>
        <div class="cyber-category">
            <div class="cyber-category__header">
                <div class="cyber-category__title"><?= esc($catName) ?></div>
                <div class="cyber-category__count"><?= $catChecked ?>/<?= $catTotal ?></div>
            </div>
            <?php foreach ($catItems as $fn => $item):
                $checked = isChecked($cyberDisplay[$fn] ?? '');
            ?>
            <div class="cyber-item">
                <div class="cyber-item__info">
                    <span class="cyber-item__icon <?= $checked ? 'checked' : 'unchecked' ?>">
                        <i class="fa-solid <?= $checked ? 'fa-check-circle' : 'fa-circle' ?>"></i>
                    </span>
                    <span class="cyber-item__label"><?= esc($item['label']) ?></span>
                </div>
                <span class="cyber-item__badge <?= getBadgeClass($item['badge']) ?>"><?= esc($item['badge']) ?></span>
            </div>
            <?php endforeach; ?>
        </div>
        <?php endforeach; ?>

<?php elseif ($key === 'enterprise-architecture-form'): ?>
        <?php
        $eaDiagram = $fields['ea_diagram'] ?? null;
        $eaDesc = $fields['ea_description'] ?? null;
        ?>
        <?php if ($eaDiagram): ?>
        <div class="group-header">Diagram</div>
        <div class="detail-row">
            <div class="detail-row__key"><?= esc(getFieldLabel($key, 'ea_diagram', $fieldLabels)) ?></div>
            <div class="detail-row__val">
                <?php
                $dv = is_array($eaDiagram) ? json_encode($eaDiagram) : (string) $eaDiagram;
                $ie = trim($dv) === '';
                if (!$ie):
                    if (strpos($dv, 'data:image/') === 0): ?>
                    <a href="<?= esc($dv) ?>" target="_blank" class="btn btn-sm btn-outline-primary">
                        <i class="fa-solid fa-file"></i> View Uploaded File
                    </a>
                    <?php elseif (strpos($dv, 'data:') === 0 || strpos($dv, 'uploads/') === 0): ?>
                    <a href="<?= strpos($dv, 'uploads/') === 0 ? esc(base_url($dv)) : esc($dv) ?>" target="_blank" class="btn btn-sm btn-outline-primary">
                        <i class="fa-solid fa-file"></i> View Uploaded File
                    </a>
                    <?php else: ?>
                    <?= esc($dv) ?>
                    <?php endif;
                else: ?>
                <span class="detail-row__val empty">Not provided</span>
                <?php endif; ?>
            </div>
        </div>
        <?php endif; ?>
        <?php if ($eaDesc): ?>
        <div class="group-header">Description</div>
        <div class="detail-row">
            <div class="detail-row__key"><?= esc(getFieldLabel($key, 'ea_description', $fieldLabels)) ?></div>
            <?php
            $dv = is_array($eaDesc) ? json_encode($eaDesc) : (string) $eaDesc;
            $ie = trim($dv) === '';
            ?>
            <div class="detail-row__val <?= $ie ? 'empty' : '' ?>"><?= $ie ? 'Not provided' : nl2br(esc($dv)) ?></div>
        </div>
        <?php endif; ?>

<?php elseif ($key === 'ict-human-capital-form'): ?>
        <?php
        $hcRows = []; $grandTotal = 0;
        $hcIndices = [];
        foreach ($fields as $fn => $fv) {
            if (preg_match('/^position_(\d+)$/', $fn, $m)) $hcIndices[(int) $m[1]] = true;
        }
        $hcMax = $hcIndices ? max(array_keys($hcIndices)) : 4;
        for ($i = 1; $i <= $hcMax; $i++) {
            $pos = (string) ($fields['position_' . $i] ?? '');
            $stat = (string) ($fields['status_' . $i] ?? '');
            $cnt = (string) ($fields['count_' . $i] ?? '');
            if ($pos !== '' || $stat !== '' || $cnt !== '') {
                $cntVal = is_numeric($cnt) ? (int) $cnt : 0;
                $grandTotal += $cntVal;
                $hcRows[] = ['position' => $pos, 'status' => $stat, 'count' => $cnt, 'countVal' => $cntVal];
            }
        }
        ?>
        <div class="group-header">Staffing Table</div>
        <?php if (count($hcRows) > 0): ?>
        <table class="view-table">
            <thead>
                <tr>
                    <th style="width:40%">IT POSITION</th>
                    <th style="width:25%">EMPLOYMENT STATUS</th>
                    <th style="width:20%;text-align:center;">PHYSICAL COUNT</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($hcRows as $r): ?>
                <tr>
                    <td><?= $r['position'] !== '' ? esc($r['position']) : '<span style="color:#c5ccd6;font-style:italic;">Not provided</span>' ?></td>
                    <td><?= $r['status'] !== '' ? esc($r['status']) : '<span style="color:#c5ccd6;font-style:italic;">Not provided</span>' ?></td>
                    <td style="text-align:center;"><?= $r['count'] !== '' ? esc($r['count']) : '<span style="color:#c5ccd6;font-style:italic;">-</span>' ?></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
            <tfoot>
                <tr style="font-weight:700;background:#f4f6f9;">
                    <td colspan="2" style="text-align:right;padding:10px 14px;">Grand Total</td>
                    <td style="text-align:center;padding:10px 14px;"><?= $grandTotal ?></td>
                </tr>
            </tfoot>
        </table>
        <?php else: ?>
        <div style="text-align:center;padding:12px;color:#c5ccd6;font-size:.82rem;font-style:italic;">
            <i class="fa-regular fa-user me-1"></i> No staffing data provided.
        </div>
        <?php endif; ?>
        <?php
        $extraHC = [];
        foreach ($fields as $fn => $fv) {
            if (!str_starts_with($fn, 'position_') && !str_starts_with($fn, 'status_') && !str_starts_with($fn, 'count_')) {
                $extraHC[$fn] = $fv;
            }
        }
        if (count($extraHC) > 0): ?>
        <div class="group-header">Other Information</div>
        <?php foreach ($extraHC as $fn => $fv):
            $dl = getFieldLabel($key, $fn, $fieldLabels);
            $dv = is_array($fv) ? json_encode($fv) : (string) $fv;
            $ie = trim($dv) === '' || $dv === '[]' || $dv === '""';
        ?>
        <div class="detail-row">
            <div class="detail-row__key"><?= esc($dl) ?></div>
            <div class="detail-row__val <?= $ie ? 'empty' : '' ?>"><?= $ie ? 'Not provided' : esc($dv) ?></div>
        </div>
        <?php endforeach; ?>
        <?php endif; ?>

<?php elseif ($key === 'information-systems-form'): ?>
        <?php
        $isSections = [
            'System Details' => ['is_name_1', 'status_1', 'classification_1', 'description_1'],
            'Deployment' => ['deployment_1', 'owner_1', 'dev_strategy_1', 'platform_1', 'database_1', 'storage_1'],
            'Users' => ['internal_users_1', 'external_users_1'],
            'Service Type' => ['system_usage_1', 'frontline_1', 'non_frontline_1', 'online_1', 'on_premise_1', 'hybrid_1', 'online_link_1'],
            'Interoperability' => ['interop1_main', 'interop1_internal_system', 'interop1_sub', 'interop1_external_system'],
            'Privacy Impact Assessment' => ['pia_1'],
        ];
        $renderedIS = [];
        foreach ($isSections as $secTitle => $secFields) {
            $secHtml = '';
            $secHasData = false;
            foreach ($secFields as $sf) {
                if (!array_key_exists($sf, $fields)) continue;
                $renderedIS[] = $sf;
                $dl = getFieldLabel($key, $sf, $fieldLabels);
                $fv = $fields[$sf];
                $dv = is_array($fv) ? json_encode($fv) : (string) $fv;
                $ie = trim($dv) === '' || $dv === '[]' || $dv === '""';
                if (!$ie) $secHasData = true;
                $secHtml .= '<div class="detail-row">
                    <div class="detail-row__key">' . esc($dl) . '</div>
                    <div class="detail-row__val' . ($ie ? ' empty' : '') . '">' . ($ie ? 'Not provided' : esc($dv)) . '</div>
                </div>';
            }
            if ($secHasData) {
                echo '<div class="group-header">' . esc($secTitle) . '</div>' . $secHtml;
            }
        }
        foreach ($fields as $fn => $fv) {
            if (in_array($fn, $renderedIS)) continue;
            $dl = getFieldLabel($key, $fn, $fieldLabels);
            $dv = is_array($fv) ? json_encode($fv) : (string) $fv;
            $ie = trim($dv) === '' || $dv === '[]' || $dv === '""';
        ?>
        <div class="detail-row">
            <div class="detail-row__key"><?= esc($dl) ?></div>
            <div class="detail-row__val <?= $ie ? 'empty' : '' ?>"><?= $ie ? 'Not provided' : esc($dv) ?></div>
        </div>
        <?php } ?>

<?php elseif ($key === 'ict-projects-form'): ?>
        <?php
        $internalFields = []; $otherProj = [];
        foreach ($fields as $fn => $fv) {
            if (str_starts_with($fn, 'internal_')) $internalFields[$fn] = $fv;
            elseif (!str_starts_with($fn, 'cross_')) $otherProj[$fn] = $fv;
        }
        ?>
        <?php if (count($internalFields) > 0): ?>
        <div class="sub-header"><i class="fa-solid fa-building me-1"></i> E.1 Internal ICT Projects</div>
        <?php
        $igroups = [
            'Project Details' => ['internal_project_title','internal_description','internal_objectives'],
            'Strategic Alignment' => ['internal_strategic_pip','internal_strategic_ncp','internal_strategic_egov','internal_strategic_pcb','internal_strategic_others','internal_strategic_others_text'],
            'Harmonization Framework' => ['internal_harmonization_1','internal_harmonization_2','internal_harmonization_3','internal_harmonization_4','internal_harmonization_5'],
            'Duration' => ['internal_start_date','internal_end_date'],
            'Deliverables' => ['internal_year1_deliverables','internal_year2_deliverables','internal_year3_deliverables'],
            'Implementation Details' => ['internal_implementing_unit','internal_total_cost','internal_funding_source'],
        ];
        $checkboxGroups = ['Strategic Alignment', 'Harmonization Framework'];
        foreach ($igroups as $gTitle => $gFields):
            $isCb = in_array($gTitle, $checkboxGroups);
            $gHtml = ''; $gHasData = false; $cbChecked = 0; $cbTotal = count($gFields);
            foreach ($gFields as $gf) {
                $dl = getFieldLabel($key, $gf, $fieldLabels);
                if ($isCb) {
                    $fv = $internalFields[$gf] ?? '';
                    $checked = $fv === 'on' || $fv === '1';
                    if ($checked) $cbChecked++;
                    $gHasData = true;
                    if ($gf === 'internal_strategic_others') {
                        $ot = $internalFields['internal_strategic_others_text'] ?? '';
                        $gHtml .= '<div class="checklist-item">
                            <div class="checklist-item__icon ' . ($checked ? 'checked' : 'unchecked') . '"><i class="fa-solid ' . ($checked ? 'fa-check-circle' : 'fa-circle') . '"></i></div>
                            <div class="checklist-item__label' . ($checked ? '' : ' unchecked') . '">' . esc($dl) . '</div>
                            ' . ($checked && trim($ot) !== '' ? '<div class="checklist-item__text">(' . esc($ot) . ')</div>' : '') . '
                        </div>';
                    } else {
                        $gHtml .= '<div class="checklist-item">
                            <div class="checklist-item__icon ' . ($checked ? 'checked' : 'unchecked') . '"><i class="fa-solid ' . ($checked ? 'fa-check-circle' : 'fa-circle') . '"></i></div>
                            <div class="checklist-item__label' . ($checked ? '' : ' unchecked') . '">' . esc($dl) . '</div>
                        </div>';
                    }
                } else {
                    if (!array_key_exists($gf, $internalFields)) continue;
                    $fv = $internalFields[$gf];
                    $dv = is_array($fv) ? json_encode($fv) : (string) $fv;
                    $ie = trim($dv) === '' || $dv === '[]' || $dv === '""';
                    if (!$ie) $gHasData = true;
                    $gHtml .= '<div class="detail-row">
                        <div class="detail-row__key">' . esc($dl) . '</div>
                        <div class="detail-row__val' . ($ie ? ' empty' : '') . '">' . ($ie ? 'Not provided' : esc($dv)) . '</div>
                    </div>';
                }
            }
            if ($gHasData) {
                $gTitleHtml = $isCb ? esc($gTitle) . ' <span class="checklist-count">' . $cbChecked . '/' . $cbTotal . '</span>' : esc($gTitle);
                echo '<div class="group-header">' . $gTitleHtml . '</div>' . $gHtml;
            }
        endforeach;
        ?>
        <?php endif; ?>



        <?php if (count($otherProj) > 0): ?>
        <?php foreach ($otherProj as $fn => $fv):
            $dl = getFieldLabel($key, $fn, $fieldLabels);
            $dv = is_array($fv) ? json_encode($fv) : (string) $fv;
            $ie = trim($dv) === '' || $dv === '[]' || $dv === '""';
        ?>
        <div class="detail-row">
            <div class="detail-row__key"><?= esc($dl) ?></div>
            <div class="detail-row__val <?= $ie ? 'empty' : '' ?>"><?= $ie ? 'Not provided' : esc($dv) ?></div>
        </div>
        <?php endforeach; ?>
        <?php endif; ?>

<?php elseif ($key === 'performance-measurement-form'): ?>
        <?php
        // Support both flat keys (internal_projects[1][kpi][intermediate][indicator])
        // and nested arrays (internal_projects => [1 => [kpi => [...]]])
        $pmLevels = ['intermediate' => 'Intermediate Outcome', 'immediate' => 'Immediate Outcome', 'output' => 'Output'];
        $pmCols = ['indicator' => 'Key Performance Indicators', 'baseline' => 'Baseline Data', 'target' => 'Targets', 'method' => 'Data Collection Method', 'responsibility' => 'Responsibility'];

        // Parse flat keys into structured project data
        function parsePmFlat($fields, $prefix) {
            $projects = [];
            foreach ($fields as $fn => $fv) {
                if (preg_match('/^' . preg_quote($prefix) . '\[(\d+)\]\[kpi\]\[(\w+)\]\[(\w+)\]$/', $fn, $m)) {
                    $projects[(int)$m[1]][$m[2]][$m[3]] = $fv;
                }
            }
            return $projects;
        }

        $internalKpi = $fields['internal_projects'] ?? null;
        $crossKpi = $fields['cross_projects'] ?? null;

        // If nested structure not found, try flat keys
        if (!is_array($internalKpi)) {
            $internalKpi = parsePmFlat($fields, 'internal_projects');
            $internalKpi = empty($internalKpi) ? null : ['kpi' => reset($internalKpi)];
        }
        if (!is_array($crossKpi)) {
            $crossKpi = parsePmFlat($fields, 'cross_projects');
            $crossKpi = empty($crossKpi) ? null : ['kpi' => reset($crossKpi)];
        }

        function renderKpiTable($kpiData) {
            if (!is_array($kpiData)) return '';
            $levels = ['intermediate' => 'INTERMEDIATE OUTCOME', 'immediate' => 'IMMEDIATE OUTCOME', 'output' => 'OUTPUT'];
            $cols = ['indicator' => 'Key Performance Indicators', 'baseline' => 'Baseline Data', 'target' => 'Targets', 'method' => 'Data Collection Method', 'responsibility' => 'Responsibility'];
            $kpi = $kpiData['kpi'] ?? $kpiData;
            if (!is_array($kpi) || empty($kpi)) return '';
            $html = '<table class="view-table"><thead><tr><th>Hierarchy of Targeted Results</th>';
            foreach ($cols as $cl) $html .= '<th>' . $cl . '</th>';
            $html .= '</tr></thead><tbody>';
            $hasData = false;
            foreach ($levels as $lk => $lv) {
                $row = $kpi[$lk] ?? [];
                if (!is_array($row)) continue;
                $cells = []; $rowHasData = false;
                foreach ($cols as $ck => $cl) {
                    $v = $row[$ck] ?? '';
                    $v = trim((string) (is_array($v) ? json_encode($v) : $v));
                    if ($v !== '') $rowHasData = true;
                    $cells[] = $v;
                }
                if (!$rowHasData) continue;
                $hasData = true;
                $html .= '<tr><td class="row-label">' . $lv . '</td>';
                foreach ($cells as $cell) {
                    $html .= '<td>' . ($cell !== '' ? esc($cell) : '<span style="color:#c5ccd6;font-style:italic;">Not provided</span>') . '</td>';
                }
                $html .= '</tr>';
            }
            if (!$hasData) return '';
            $html .= '</tbody></table>';
            return $html;
        }

        $internalHtml = renderKpiTable($internalKpi);
        $crossHtml = renderKpiTable($crossKpi);
        ?>
        <?php if ($internalHtml): ?>
        <div class="sub-header"><i class="fa-solid fa-building me-1"></i> F.1 Internal ICT Projects - KPI</div>
        <?= $internalHtml ?>
        <?php endif; ?>

        <?php
        // Handle additional dynamic projects (projects[2][title], projects[2][kpi][1][hierarchy], etc.)
        $pmProjects = [];
        foreach ($fields as $fn => $fv) {
            if (preg_match('/^projects\[(\d+)\]\[(.+)\]$/', $fn, $m)) {
                $pmProjects[(int)$m[1]][$m[2]] = $fv;
            }
        }
        // Also check for nested projects array
        if (empty($pmProjects) && isset($fields['projects']) && is_array($fields['projects'])) {
            $pmProjects = $fields['projects'];
        }
        foreach ($pmProjects as $projIdx => $projData):
            $title = $projData['title'] ?? ('Project ' . $projIdx);
            $projTitle = is_string($title) ? $title : 'Project ' . $projIdx;
        ?>
        <div class="kpi-project-title"><?= esc($projTitle) ?></div>
        <?php
            // Collect KPI rows from either flat key or nested structure
            $kpiRows = [];
            if (isset($projData['kpi']) && is_array($projData['kpi'])) {
                $kpiRows = $projData['kpi'];
            } else {
                // Parse flat keys: projects[2][kpi][1][hierarchy] => projects[2][kpi][1] => { hierarchy, indicator, ... }
                $projKpi = [];
                foreach ($projData as $k => $v) {
                    if (preg_match('/^kpi\[(\d+)\]\[(\w+)\]$/', $k, $m)) {
                        $projKpi[(int)$m[1]][$m[2]] = $v;
                    }
                }
                $kpiRows = $projKpi;
            }
            if (!empty($kpiRows)):
        ?>
        <table class="view-table">
            <thead>
                <tr>
                    <th>Hierarchy of Targeted Results</th>
                    <th>Key Performance Indicators</th>
                    <th>Baseline Data</th>
                    <th>Targets</th>
                    <th>Data Collection Method</th>
                    <th>Responsibility</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($kpiRows as $kpiRow):
                    if (!is_array($kpiRow)) continue;
                    $h = (string) ($kpiRow['hierarchy'] ?? '');
                    $ind = (string) ($kpiRow['indicator'] ?? '');
                    $base = (string) ($kpiRow['baseline'] ?? '');
                    $tgt = (string) ($kpiRow['target'] ?? '');
                    $cm = (string) ($kpiRow['collection_method'] ?? '');
                    $resp = (string) ($kpiRow['responsibility'] ?? '');
                    if ($h === '' && $ind === '' && $base === '' && $tgt === '' && $cm === '' && $resp === '') continue;
                ?>
                <tr>
                    <td><?= $h !== '' ? esc($h) : '<span style="color:#c5ccd6;font-style:italic;">Not provided</span>' ?></td>
                    <td><?= $ind !== '' ? esc($ind) : '<span style="color:#c5ccd6;font-style:italic;">Not provided</span>' ?></td>
                    <td><?= $base !== '' ? esc($base) : '<span style="color:#c5ccd6;font-style:italic;">Not provided</span>' ?></td>
                    <td><?= $tgt !== '' ? esc($tgt) : '<span style="color:#c5ccd6;font-style:italic;">Not provided</span>' ?></td>
                    <td><?= $cm !== '' ? esc($cm) : '<span style="color:#c5ccd6;font-style:italic;">Not provided</span>' ?></td>
                    <td><?= $resp !== '' ? esc($resp) : '<span style="color:#c5ccd6;font-style:italic;">Not provided</span>' ?></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <?php endif; endforeach; ?>

<?php endif; ?>

    </div>
</div>
<?php $firstSection = false; endforeach; ?>

<div class="custom-modal" id="endorseModal" style="display:none;position:fixed;top:50%;left:50%;transform:translate(-50%,-50%);z-index:1060;background:#fff;border-radius:6px;box-shadow:0 18px 40px rgba(15,23,42,.18);min-width:320px;max-width:400px;overflow:hidden;">
    <div style="background:#536783;color:#fff;padding:12px 14px;font-size:.94rem;font-weight:700;"><i class="fa-solid fa-check-circle me-2" style="color:#4ade80;"></i> Endorse to Director General</div>
    <div style="padding:14px 14px;font-size:.82rem;color:#1f2a3a;"><p class="mb-0">Are you sure you want to endorse this project to the Director General for approval?</p></div>
    <div style="padding:8px 12px;border-top:1px solid #e1e6ee;display:flex;justify-content:flex-end;gap:8px;">
        <button type="button" class="btn btn-outline-secondary btn-sm" onclick="closeCustomModals()">Cancel</button>
        <form method="post" id="actionEndorseForm" action="" class="d-inline">
            <?= csrf_field() ?>
            <button type="submit" class="btn btn-primary btn-sm">Endorse</button>
        </form>
    </div>
</div>

<script>
function openEndorseModal(projectId) {
    document.getElementById('actionEndorseForm').action = '<?= site_url('ict-planner/endorse/') ?>' + projectId;
    showCustomModal('endorseModal');
}

function toggleSection(header) {
    var body = header.nextElementSibling;
    var toggle = header.querySelector('.form-section__toggle');
    if (body.classList.contains('open')) {
        body.classList.remove('open');
        toggle.classList.remove('open');
    } else {
        body.classList.add('open');
        toggle.classList.add('open');
    }
}
</script>

<?= $this->endSection() ?>
