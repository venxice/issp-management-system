<?php
$fieldLabels = [
    'network-infrastructure-form' => [
        'dept_network_diagram'      => 'Upload network architecture diagram showing connectivity among attached agencies',
        'dept_connectivity_type'    => 'Connectivity Type',
        'dept_ipv6_ready'           => 'IPv6 Ready',
        'dept_upload_speed'         => 'Upload Speed',
        'dept_download_speed'       => 'Download Speed',
        'dept_description'          => 'Description',
        'regional_network_diagram'  => 'Upload network architecture diagram showing connectivity to branches/regional offices',
        'regional_connectivity_type' => 'Connectivity Type (Regional)',
        'regional_ipv6_ready'       => 'IPv6 Ready (Regional)',
        'regional_upload_speed'     => 'Upload Speed (Regional)',
        'regional_download_speed'   => 'Download Speed (Regional)',
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
        'internal_project_title'    => 'Project Title',
        'internal_description'      => 'Description',
        'internal_objectives'        => 'Objectives',
        'internal_strategic_pip'    => 'Public Investment Program',
        'internal_strategic_ncp'    => 'National Cybersecurity Plan',
        'internal_strategic_egov'   => 'E-Government Master Plan',
        'internal_strategic_pcb'    => 'Program Convergence Budgeting',
        'internal_strategic_others' => 'Others (Specify)',
        'internal_strategic_others_text' => 'Others - Please specify',
        'internal_harmonization_1'  => 'National Prioritization',
        'internal_harmonization_2'  => 'Resource Optimization',
        'internal_harmonization_3'  => 'Interoperability Framework',
        'internal_harmonization_4'  => 'Cross-Agency Collaboration',
        'internal_harmonization_5'  => 'Scalability and Sustainability',
        'internal_start_date'       => 'Start Date',
        'internal_end_date'         => 'End Date',
        'internal_year1_deliverables' => 'Year 1 Deliverables',
        'internal_year2_deliverables' => 'Year 2 Deliverables',
        'internal_year3_deliverables' => 'Year 3 Deliverables',
        'internal_implementing_unit' => 'Implementing Unit',
        'internal_total_cost'       => 'Total Cost',
        'internal_funding_source'   => 'Funding Source',
        'cross_project_title'       => 'Project Title',
        'cross_description'         => 'Description',
        'cross_objectives'          => 'Objectives',
        'cross_lead_agency'         => 'Lead Agency',
        'cross_implementing_agency' => 'Implementing Agency',
        'cross_strategic_pip'       => 'Public Investment Program',
        'cross_strategic_ncp'       => 'National Cybersecurity Plan',
        'cross_strategic_egov'      => 'E-Government Master Plan',
        'cross_strategic_pcb'       => 'Program Convergence Budgeting',
        'cross_strategic_others'    => 'Others (Specify)',
        'cross_strategic_others_text' => 'Others - Please specify',
        'cross_harmonization_1'     => 'National Prioritization',
        'cross_harmonization_2'     => 'Resource Optimization',
        'cross_harmonization_3'     => 'Interoperability Framework',
        'cross_harmonization_4'     => 'Cross-Agency Collaboration',
        'cross_harmonization_5'     => 'Scalability and Sustainability',
        'cross_start_date'          => 'Start Date',
        'cross_end_date'            => 'End Date',
        'cross_year1_deliverables'  => 'Year 1 Deliverables',
        'cross_year2_deliverables'  => 'Year 2 Deliverables',
        'cross_year3_deliverables'  => 'Year 3 Deliverables',
        'cross_implementing_unit'   => 'Implementing Unit',
        'cross_total_cost'          => 'Total Cost',
        'cross_funding_source'      => 'Funding Source',
    ],
];

$cybersecurityCategories = [
    'PHYSICAL SECURITY' => [
        'perimeter_protection'  => ['label' => 'Perimeter Protection', 'badge' => 'Mandatory'],
        'access_control'        => ['label' => 'Access Control', 'badge' => 'Mandatory'],
        'surveillance_system'   => ['label' => 'Surveillance System', 'badge' => 'Mandatory'],
        'detection_system'      => ['label' => 'Detection System', 'badge' => 'Optional'],
    ],
    'PERIMETER SECURITY' => [
        'next_gen_firewall'     => ['label' => 'Next Generation Firewalls', 'badge' => 'Mandatory'],
        'ids_ips'               => ['label' => 'Intrusion Detection/Prevention Systems (IDS/IPS)', 'badge' => 'Mandatory'],
        'waf'                   => ['label' => 'Web Application Firewalls (WAFs)', 'badge' => 'Mandatory'],
        'dmz'                   => ['label' => 'Demilitarized Zone (DMZ)', 'badge' => 'Optional'],
    ],
    'NETWORK SECURITY' => [
        'data_encryption'       => ['label' => 'Data Encryption', 'badge' => 'Mandatory'],
        'network_segmentation'  => ['label' => 'Network Segmentation', 'badge' => 'Optional'],
    ],
    'ENDPOINT SECURITY' => [
        'antivirus_antimalware' => ['label' => 'Anti-virus and Anti-malware Software', 'badge' => 'Mandatory'],
        'application_control'   => ['label' => 'Application Control', 'badge' => 'Mandatory'],
        'byod_security'         => ['label' => 'BYOD Security', 'badge' => 'Mandatory'],
        'xdr'                   => ['label' => 'Extended Detection and Response (XDR)', 'badge' => 'Optional'],
    ],
    'DATA SECURITY' => [
        'data_classification'   => ['label' => 'Data Classification', 'badge' => 'Mandatory'],
        'dlp'                   => ['label' => 'Data Loss Prevention (DLP)', 'badge' => 'Mandatory'],
        'data_backups'          => ['label' => 'Data Backups and Recovery', 'badge' => 'Mandatory'],
    ],
    'APPLICATION SECURITY' => [
        'security_scanning'     => ['label' => 'Regular Security Scanning and Testing', 'badge' => 'Mandatory'],
    ],
    'OTHER MEASURES' => [
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

$internalFields = [
    'internal_project_title','internal_description','internal_objectives',
    'internal_strategic_pip','internal_strategic_ncp','internal_strategic_egov',
    'internal_strategic_pcb','internal_strategic_others','internal_strategic_others_text',
    'internal_harmonization_1','internal_harmonization_2','internal_harmonization_3',
    'internal_harmonization_4','internal_harmonization_5',
    'internal_start_date','internal_end_date',
    'internal_year1_deliverables','internal_year2_deliverables','internal_year3_deliverables',
    'internal_implementing_unit','internal_total_cost','internal_funding_source',
];

$crossFields = [
    'cross_project_title','cross_description','cross_objectives',
    'cross_lead_agency','cross_implementing_agency',
    'cross_strategic_pip','cross_strategic_ncp','cross_strategic_egov',
    'cross_strategic_pcb','cross_strategic_others','cross_strategic_others_text',
    'cross_harmonization_1','cross_harmonization_2','cross_harmonization_3',
    'cross_harmonization_4','cross_harmonization_5',
    'cross_start_date','cross_end_date',
    'cross_year1_deliverables','cross_year2_deliverables','cross_year3_deliverables',
    'cross_implementing_unit','cross_total_cost','cross_funding_source',
];

function fl($sectionKey, $fieldName) {
    global $fieldLabels;
    return $fieldLabels[$sectionKey][$fieldName] ?? ucwords(str_replace(['_', '-'], ' ', $fieldName));
}

function val($v) {
    if ($v === null || $v === false) return '';
    if (is_array($v)) {
        $enc = json_encode($v);
        return ($enc === '[]' || $enc === '{}') ? '' : $v;
    }
    return trim((string) $v);
}

function v($v) {
    $s = is_array($v) ? json_encode($v) : (string) $v;
    return htmlspecialchars(trim($s));
}

$title = $project['title'] ?? 'Untitled ISSP Submission';
$department = $project['department_name'] ?? 'N/A';
$submittedBy = $project['created_by_name'] ?? 'Unknown';
$status = $project['status'] ?? 'draft';
$submittedAt = $project['submitted_at'] ?? $project['created_at'] ?? '';
$startYear = date('Y', strtotime($submittedAt)) ?: date('Y');
$endYear = $startYear + 3;

// Extract all form data
$formData = $formData ?? [];
$ni = $formData['network-infrastructure-form'] ?? [];
$ea = $formData['enterprise-architecture-form'] ?? [];
$hc = $formData['ict-human-capital-form'] ?? [];
$is = $formData['information-systems-form'] ?? [];
$proj = $formData['ict-projects-form'] ?? [];
$pm = $formData['performance-measurement-form'] ?? [];
$batchMode = $batchMode ?? false;
if (!$batchMode):
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<style>
@page {
    margin: 20mm 15mm 15mm 20mm;
    size: A4 landscape;
}
body {
    font-family: 'Palatino Linotype', 'Palatino', 'Times New Roman', serif;
    font-size: 11pt;
    color: #000000;
    line-height: 1.2;
    margin: 0;
    padding: 0;
}
.header-text {
    font-family: 'Palatino Linotype', 'Palatino', 'Times New Roman', serif;
    font-size: 14pt;
    font-weight: bold;
}
.sec {
    font-family: 'Palatino Linotype', 'Palatino', 'Times New Roman', serif;
    font-size: 14pt;
    font-weight: bold;
    text-decoration: underline;
    margin-top: 6mm;
    margin-bottom: 3mm;
}
.subsec {
    font-family: 'Palatino Linotype', 'Palatino', 'Times New Roman', serif;
    font-size: 11pt;
    font-weight: bold;
    text-decoration: underline;
    margin-top: 4mm;
    margin-bottom: 2mm;
}
.subsec2 {
    font-family: 'Palatino Linotype', 'Palatino', 'Times New Roman', serif;
    font-size: 13pt;
    font-weight: bold;
    text-decoration: underline;
    margin-top: 4mm;
    margin-bottom: 2mm;
}
.subsec-center {
    font-family: 'Palatino Linotype', 'Palatino', 'Times New Roman', serif;
    font-size: 11pt;
    font-weight: bold;
    text-decoration: underline;
    text-align: center;
    margin-top: 3mm;
    margin-bottom: 2mm;
}
table {
    width: 100%;
    border-collapse: collapse;
    font-size: 10pt;
    margin: 2mm 0;
}
table td, table th {
    border: 1px solid #000;
    padding: 1.5mm 2mm;
    vertical-align: top;
    text-align: left;
}
table th {
    font-weight: bold;
    text-align: center;
}
table td.center {
    text-align: center;
}
table td.bold {
    font-weight: bold;
}
table td.grand-total {
    font-weight: bold;
    border-top: 2px solid #000;
}
table td.cat-header {
    font-weight: bold;
}
.cover-page {
    text-align: center;
    padding-top: 25mm;
}
.cover-title {
    font-size: 18pt;
    font-weight: bold;
    margin-bottom: 3mm;
}
.cover-period {
    font-size: 11pt;
    margin-bottom: 10mm;
}
.cover-agency {
    font-size: 14pt;
    font-weight: bold;
    margin-bottom: 2mm;
}
.cover-table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 10mm;
    font-size: 10pt;
}
.cover-table td {
    border: 1px solid #000;
    padding: 3mm 4mm;
    vertical-align: top;
}
.checkbox-group {
    font-size: 9.5pt;
    line-height: 1.4;
}
.empty-field {
    color: #999;
    font-style: italic;
}
.detail-row {
    margin: 1mm 0;
    font-size: 10pt;
}
.detail-row strong {
    font-weight: bold;
}
</style>
<?php if (!$batchMode): ?>
</head>
<body>
<?php endif; ?>

<!-- HEADER (fixed position) -->
<div style="position:fixed;top:5mm;left:20mm;right:15mm;text-align:left;border-bottom:1px solid #000;padding-bottom:1.5mm;z-index:1000;background:#fff;">
    <span class="header-text">INFORMATION SYSTEMS STRATEGIC PLAN <?= htmlspecialchars($startYear) ?> - <?= htmlspecialchars($endYear) ?></span>
</div>

<!-- COVER PAGE -->
<div class="cover-page" style="page-break-after:always;">
    <p style="font-size:10pt;color:#666;margin-bottom:15mm;">(Replace with agency's logo)</p>
    <div class="cover-title">INFORMATION SYSTEMS STRATEGIC PLAN (ISSP)</div>
    <p style="font-size:12pt;margin-bottom:1mm;">REGULAR ISSP</p>
    <div class="cover-period">For the period <?= htmlspecialchars($startYear) ?> to <?= htmlspecialchars($endYear) ?></div>
    <div class="cover-agency"><?= htmlspecialchars($department) ?></div>
    <p style="font-size:10pt;margin-bottom:15mm;">&nbsp;</p>

    <table class="cover-table">
        <tr>
            <td style="width:30%;font-weight:bold;">PREPARED BY:</td>
            <td style="width:30%;">Name &amp; Signature of Chief Information Officer</td>
            <td style="width:40%;">
                <strong>Scope</strong><br>
                <span class="checkbox-group">
                [ ] Department-Wide<br>
                [ ] Department - Central Office / Head Office<br>
                &nbsp;&nbsp;&nbsp;[ ] Central Office only<br>
                &nbsp;&nbsp;&nbsp;[ ] With Regional Offices / Field Offices<br>
                &nbsp;&nbsp;&nbsp;[ ] With Bureaus<br>
                [ ] Agency-Wide<br>
                &nbsp;&nbsp;&nbsp;[ ] Central Office only<br>
                &nbsp;&nbsp;&nbsp;[ ] With Regional Offices / Field Offices<br>
                [ ] Other Government Entity<br>
                [ ] LGU
                </span>
            </td>
        </tr>
        <tr>
            <td style="font-weight:bold;">APPROVED BY:</td>
            <td>Name &amp; Signature of Agency Head</td>
            <td></td>
        </tr>
    </table>

    <p style="margin-top:10mm;font-size:9pt;color:#999;font-style:italic;">
        This document was generated from the ISSP Management System on <?= htmlspecialchars(date('F d, Y')) ?>.
    </p>
</div>

<!-- ==================== PART III: PROPOSED ICT STRATEGY ==================== -->
<div class="sec">PART III. PROPOSED ICT STRATEGY</div>

<!-- A. PROPOSED NETWORK INFRASTRUCTURE -->
<div class="sec">A. PROPOSED NETWORK INFRASTRUCTURE</div>

<div class="subsec">A.1. LAN/WAN SET-UP INCLUDING CONNECTIVITY TYPE AND BANDWIDTH</div>

<table>
    <tr>
        <th style="width:35%;">Item</th>
        <th>Details</th>
    </tr>
    <?php
    $lanFields = ['dept_network_diagram','dept_connectivity_type','dept_ipv6_ready','dept_upload_speed','dept_download_speed','dept_description'];
    $regFields = ['regional_network_diagram','regional_connectivity_type','regional_ipv6_ready','regional_upload_speed','regional_download_speed','regional_offices_details'];
    $hasLanData = false; $hasRegData = false;
    foreach ($lanFields as $f) { if (v($ni[$f] ?? '') !== '') { $hasLanData = true; break; } }
    foreach ($regFields as $f) { if (v($ni[$f] ?? '') !== '') { $hasRegData = true; break; } }
    ?>
    <?php if ($hasLanData): ?>
    <tr><td colspan="2" style="font-weight:bold;text-align:center;">Department / Central Office</td></tr>
        <?php foreach ($lanFields as $f):
            $v = v($ni[$f] ?? '');
            if ($v === '') continue;
            if (strpos($v, 'data:') === 0 || strpos($v, 'uploads/') === 0) { $v = '[File uploaded]'; }
        ?>
        <tr><td style="font-weight:bold;"><?= htmlspecialchars(fl('network-infrastructure-form', $f)) ?></td><td><?= $v ?></td></tr>
        <?php endforeach; ?>
    <?php endif; ?>
    <?php if ($hasRegData): ?>
    <tr><td colspan="2" style="font-weight:bold;text-align:center;">Regional / Branch Offices</td></tr>
        <?php foreach ($regFields as $f):
            $v = v($ni[$f] ?? '');
            if ($v === '') continue;
            if (strpos($v, 'data:') === 0 || strpos($v, 'uploads/') === 0) { $v = '[File uploaded]'; }
        ?>
        <tr><td style="font-weight:bold;"><?= htmlspecialchars(fl('network-infrastructure-form', $f)) ?></td><td><?= $v ?></td></tr>
        <?php endforeach; ?>
    <?php endif; ?>
    <?php if (!$hasLanData && !$hasRegData): ?>
    <tr><td colspan="2" class="empty-field" style="text-align:center;">No data provided.</td></tr>
    <?php endif; ?>
</table>

<div class="subsec">A.2. CYBERSECURITY CONTROL CHECKLIST</div>
<table>
    <tr>
        <th style="width:28%;"></th>
        <th style="width:36%;">MANDATORY</th>
        <th style="width:36%;">OPTIONAL</th>
    </tr>
    <?php foreach ($cybersecurityCategories as $catName => $catItems):
        $mandatoryItems = []; $optionalItems = [];
        foreach ($catItems as $cfn => $citem) {
            $isChecked = isset($ni[$cfn]) && v($ni[$cfn]) === '1' ? '☑' : '☐';
            if ($citem['badge'] === 'Mandatory' || $citem['badge'] === 'Not Specified') {
                $mandatoryItems[] = ['label' => $citem['label'], 'checked' => $isChecked];
            } else {
                $optionalItems[] = ['label' => $citem['label'], 'checked' => $isChecked];
            }
        }
    ?>
    <tr>
        <td class="cat-header"><?= htmlspecialchars($catName) ?></td>
        <td>
            <?php foreach ($mandatoryItems as $it): ?>
                <div><?= $it['checked'] ?> <?= htmlspecialchars($it['label']) ?></div>
            <?php endforeach; ?>
        </td>
        <td>
            <?php foreach ($optionalItems as $it): ?>
                <div><?= $it['checked'] ?> <?= htmlspecialchars($it['label']) ?></div>
            <?php endforeach; ?>
        </td>
    </tr>
    <?php endforeach; ?>
</table>

<!-- B. ENTERPRISE ARCHITECTURE -->
<div class="sec">B. ENTERPRISE ARCHITECTURE</div>

<table>
    <tr><th style="width:35%;">Item</th><th>Details</th></tr>
    <?php
    $eaFields = ['ea_diagram', 'ea_description'];
    $hasEa = false;
    foreach ($eaFields as $f) { if (v($ea[$f] ?? '') !== '') { $hasEa = true; break; } }
    if ($hasEa):
        $eaDesc = v($ea['ea_description'] ?? '');
        $eaDiag = v($ea['ea_diagram'] ?? '');
        if ($eaDiag !== '' && strpos($eaDiag, 'data:') === 0) $eaDiag = '[Diagram uploaded]';
        if ($eaDiag !== ''):
    ?>
    <tr><td style="font-weight:bold;">Enterprise Architecture Diagram</td><td><?= $eaDiag ?></td></tr>
        <?php endif; if ($eaDesc !== ''): ?>
    <tr><td style="font-weight:bold;">Description</td><td><?= nl2br($eaDesc) ?></td></tr>
        <?php endif; ?>
    <?php else: ?>
    <tr><td colspan="2" class="empty-field" style="text-align:center;">No data provided.</td></tr>
    <?php endif; ?>
</table>

<!-- C. PROPOSED ICT HUMAN CAPITAL -->
<div class="sec">C. PROPOSED ICT HUMAN CAPITAL</div>

<?php
$hcRows = []; $hcGrandTotal = 0;
for ($i = 1; $i <= 4; $i++) {
    $pos = v($hc['position_' . $i] ?? '');
    $stat = v($hc['status_' . $i] ?? '');
    $cnt = v($hc['count_' . $i] ?? '');
    if ($pos !== '' || $stat !== '' || $cnt !== '') {
        $cntNum = is_numeric($cnt) ? (int) $cnt : 0;
        $hcGrandTotal += $cntNum;
        $hcRows[] = ['position' => $pos, 'status' => $stat, 'count' => $cnt, 'cntNum' => $cntNum];
    }
}
?>
<table>
    <tr>
        <th style="width:38%;">IT POSITION</th>
        <th style="width:30%;">EMPLOYMENT STATUS</th>
        <th style="width:16%;">PHYSICAL COUNT</th>
    </tr>
    <?php if (!empty($hcRows)): ?>
        <?php foreach ($hcRows as $r): ?>
        <tr>
            <td><?= $r['position'] !== '' ? $r['position'] : '<span class="empty-field">Not provided</span>' ?></td>
            <td><?= $r['status'] !== '' ? $r['status'] : '<span class="empty-field">Not provided</span>' ?></td>
            <td class="center"><?= $r['count'] !== '' ? $r['count'] : '-' ?></td>
        </tr>
        <?php endforeach; ?>
    <?php else: ?>
        <?php for ($i = 0; $i < 4; $i++): ?>
        <tr><td class="empty-field">[Position / Designation]</td><td class="empty-field">[Employment Status]</td><td class="center empty-field">[Count]</td></tr>
        <?php endfor; ?>
    <?php endif; ?>
    <tr>
        <td colspan="2" style="text-align:right;font-weight:bold;border-top:2px solid #000;">Grand Total</td>
        <td class="center" style="font-weight:bold;border-top:2px solid #000;"><?= $hcGrandTotal ?></td>
    </tr>
</table>

<!-- D. PROPOSED INFORMATION SYSTEMS -->
<div class="sec">D. PROPOSED INFORMATION SYSTEMS</div>

<?php
$isGroups = [
    'SYSTEM DETAILS' => ['is_name_1', 'status_1', 'classification_1', 'description_1'],
    'DEPLOYMENT' => ['deployment_1', 'owner_1', 'dev_strategy_1', 'platform_1', 'database_1', 'storage_1'],
    'USERS' => ['internal_users_1', 'external_users_1', 'system_usage_1', 'online_link_1'],
    'SERVICE TYPE' => ['frontline_1', 'non_frontline_1', 'online_1', 'on_premise_1', 'hybrid_1'],
    'INTEROPERABILITY' => ['interop1_main', 'interop1_internal_system', 'interop1_sub', 'interop1_external_system'],
    'PRIVACY IMPACT ASSESSMENT' => ['pia_1'],
];
$hasIs = false;
foreach ($isGroups as $gfList) { foreach ($gfList as $f) { if (v($is[$f] ?? '') !== '') { $hasIs = true; break 2; } } }
?>

<table>
    <tr><th style="width:35%;">Item</th><th>Details</th></tr>
    <?php if ($hasIs): ?>
        <?php foreach ($isGroups as $gName => $gfList):
            $gHas = false;
            foreach ($gfList as $f) { if (v($is[$f] ?? '') !== '') { $gHas = true; break; } }
            if (!$gHas) continue;
        ?>
        <tr><td colspan="2" style="font-weight:bold;text-align:center;"><?= htmlspecialchars($gName) ?></td></tr>
            <?php foreach ($gfList as $f):
                $v = v($is[$f] ?? '');
                if ($v === '') continue;
            ?>
            <tr><td style="font-weight:bold;"><?= htmlspecialchars(fl('information-systems-form', $f)) ?></td><td><?= $v ?></td></tr>
            <?php endforeach; ?>
        <?php endforeach; ?>
    <?php else: ?>
    <tr><td colspan="2" class="empty-field" style="text-align:center;">No data provided.</td></tr>
    <?php endif; ?>
</table>

<!-- E. ICT PROJECTS -->
<div class="sec">E. ICT PROJECTS</div>

<?php
$intSubGroups = [
    'PROJECT DETAILS' => ['internal_project_title','internal_description','internal_objectives'],
    'STRATEGIC ALIGNMENT' => ['internal_strategic_pip','internal_strategic_ncp','internal_strategic_egov','internal_strategic_pcb','internal_strategic_others','internal_strategic_others_text'],
    'HARMONIZATION' => ['internal_harmonization_1','internal_harmonization_2','internal_harmonization_3','internal_harmonization_4','internal_harmonization_5'],
    'DURATION' => ['internal_start_date','internal_end_date'],
    'DELIVERABLES' => ['internal_year1_deliverables','internal_year2_deliverables','internal_year3_deliverables'],
    'IMPLEMENTATION' => ['internal_implementing_unit','internal_total_cost','internal_funding_source'],
];
$crossSubGroups = [
    'PROJECT DETAILS' => ['cross_project_title','cross_description','cross_objectives','cross_lead_agency','cross_implementing_agency'],
    'STRATEGIC ALIGNMENT' => ['cross_strategic_pip','cross_strategic_ncp','cross_strategic_egov','cross_strategic_pcb','cross_strategic_others','cross_strategic_others_text'],
    'HARMONIZATION' => ['cross_harmonization_1','cross_harmonization_2','cross_harmonization_3','cross_harmonization_4','cross_harmonization_5'],
    'DURATION' => ['cross_start_date','cross_end_date'],
    'DELIVERABLES' => ['cross_year1_deliverables','cross_year2_deliverables','cross_year3_deliverables'],
    'IMPLEMENTATION' => ['cross_implementing_unit','cross_total_cost','cross_funding_source'],
];

$hasInt = false; $hasCross = false;
foreach ($internalFields as $f) { if (v($proj[$f] ?? '') !== '') { $hasInt = true; break; } }
foreach ($crossFields as $f) { if (v($proj[$f] ?? '') !== '') { $hasCross = true; break; } }
?>

<div class="subsec2">INTERNAL ICT PROJECTS</div>
<?php if ($hasInt): ?>
<table>
    <tr><th style="width:35%;">Item</th><th>Details</th></tr>
    <?php foreach ($intSubGroups as $sgName => $sgFields):
        $sgHas = false;
        foreach ($sgFields as $f) { if (v($proj[$f] ?? '') !== '') { $sgHas = true; break; } }
        if (!$sgHas) continue;
    ?>
    <tr><td colspan="2" style="font-weight:bold;text-align:center;"><?= htmlspecialchars($sgName) ?></td></tr>
        <?php foreach ($sgFields as $f):
            $v = v($proj[$f] ?? '');
            if ($v === '') continue;
        ?>
        <tr><td style="font-weight:bold;"><?= htmlspecialchars(fl('ict-projects-form', $f)) ?></td><td><?= $v ?></td></tr>
        <?php endforeach; ?>
    <?php endforeach; ?>
</table>
<?php else: ?>
<table><tr><td class="empty-field" style="text-align:center;">No internal ICT project data provided.</td></tr></table>
<?php endif; ?>

<div class="subsec2">CROSS-AGENCY ICT PROJECTS</div>
<?php if ($hasCross): ?>
<table>
    <tr><th style="width:35%;">Item</th><th>Details</th></tr>
    <?php foreach ($crossSubGroups as $sgName => $sgFields):
        $sgHas = false;
        foreach ($sgFields as $f) { if (v($proj[$f] ?? '') !== '') { $sgHas = true; break; } }
        if (!$sgHas) continue;
    ?>
    <tr><td colspan="2" style="font-weight:bold;text-align:center;"><?= htmlspecialchars($sgName) ?></td></tr>
        <?php foreach ($sgFields as $f):
            $v = v($proj[$f] ?? '');
            if ($v === '') continue;
        ?>
        <tr><td style="font-weight:bold;"><?= htmlspecialchars(fl('ict-projects-form', $f)) ?></td><td><?= $v ?></td></tr>
        <?php endforeach; ?>
    <?php endforeach; ?>
</table>
<?php else: ?>
<table><tr><td class="empty-field" style="text-align:center;">No cross-agency ICT project data provided.</td></tr></table>
<?php endif; ?>

<!-- F. PERFORMANCE MEASUREMENT FRAMEWORK -->
<div class="sec">F. PERFORMANCE MEASUREMENT FRAMEWORK</div>

<?php
$pmProjects = ['internal_projects' => 'INTERNAL ICT PROJECTS', 'cross_projects' => 'CROSS-AGENCY ICT PROJECTS'];
$levels = ['intermediate' => 'INTERMEDIATE OUTCOME', 'immediate' => 'IMMEDIATE OUTCOME', 'output' => 'OUTPUT'];
$cols = ['indicator' => 'Key Performance Indicators', 'baseline' => 'Baseline Data', 'target' => 'Targets', 'method' => 'Data Collection Methods', 'responsibility' => 'Responsibility'];
$hasPm = false;

foreach ($pmProjects as $pk => $pl):
    $kpData = $pm[$pk] ?? null;
    $kpi = is_array($kpData) ? ($kpData['kpi'] ?? $kpData) : [];
    $hasKpi = false;
    if (is_array($kpi)) {
        foreach ($levels as $lk => $lv) {
            $row = $kpi[$lk] ?? [];
            if (!is_array($row)) continue;
            foreach ($cols as $ck => $cl) {
                $cv = v($row[$ck] ?? '');
                if ($cv !== '') { $hasKpi = true; $hasPm = true; break 2; }
            }
        }
    }
?>

<div class="subsec2"><?= htmlspecialchars($pl) ?></div>
<?php if ($hasKpi): ?>
<div class="subsec-center">KEY PERFORMANCE INDICATORS (KPIs)</div>
<table>
    <tr>
        <th style="width:16%;">Hierarchy of Targeted Results</th>
        <?php foreach ($cols as $cl): ?>
        <th><?= htmlspecialchars($cl) ?></th>
        <?php endforeach; ?>
    </tr>
    <?php foreach ($levels as $lk => $lv):
        $row = $kpi[$lk] ?? [];
        if (!is_array($row)) continue;
        $cells = []; $rowHas = false;
        foreach ($cols as $ck => $cl) {
            $cv = v($row[$ck] ?? '');
            if ($cv !== '') $rowHas = true;
            $cells[] = $cv;
        }
        if (!$rowHas) continue;
    ?>
    <tr>
        <td style="font-weight:bold;"><?= htmlspecialchars($lv) ?></td>
        <?php foreach ($cells as $cell): ?>
        <td><?= $cell !== '' ? $cell : '<span class="empty-field">-</span>' ?></td>
        <?php endforeach; ?>
    </tr>
    <?php endforeach; ?>
</table>
<?php else: ?>
<table><tr><td class="empty-field" style="text-align:center;">No KPI data provided for <?= htmlspecialchars($pl) ?>.</td></tr></table>
<?php endif; ?>
<?php endforeach; ?>

<?php if (!$hasPm): ?>
<p style="margin-top:2mm;">&nbsp;</p>
<?php endif; ?>

<div style="text-align:center;font-size:8pt;color:#999;margin-top:15mm;border-top:1px solid #ccc;padding-top:2mm;">
    Generated from the ISSP Management System &mdash; <?= htmlspecialchars(date('F d, Y \a\t h:i A')) ?>
</div>

<?php if (!$batchMode): ?>
</body>
</html>
<?php endif; ?>