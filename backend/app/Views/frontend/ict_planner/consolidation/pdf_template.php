<?php
$fieldLabels = [
    'network-infrastructure-form' => [
        'dept_network_diagram' => 'Upload network architecture diagram showing connectivity among attached agencies',
        'dept_connectivity_type' => 'Connectivity Type', 'dept_ipv6_ready' => 'IPv6 Ready',
        'dept_upload_speed' => 'Upload Speed', 'dept_download_speed' => 'Download Speed', 'dept_description' => 'Description',
        'regional_network_diagram' => 'Upload network architecture diagram showing connectivity to branches/regional offices',
        'regional_connectivity_type' => 'Connectivity Type (Regional)', 'regional_ipv6_ready' => 'IPv6 Ready (Regional)',
        'regional_upload_speed' => 'Upload Speed (Regional)', 'regional_download_speed' => 'Download Speed (Regional)',
        'regional_offices_details' => 'Branch/Regional Offices Details',
    ],
    'enterprise-architecture-form' => ['ea_diagram' => 'Enterprise Architecture Diagram', 'ea_description' => 'Description'],
    'ict-human-capital-form' => [
        'position_1' => 'Position / Designation', 'position_2' => 'Position / Designation', 'position_3' => 'Position / Designation', 'position_4' => 'Position / Designation',
        'status_1' => 'Employment Status', 'status_2' => 'Employment Status', 'status_3' => 'Employment Status', 'status_4' => 'Employment Status',
        'count_1' => 'No. of Positions', 'count_2' => 'No. of Positions', 'count_3' => 'No. of Positions', 'count_4' => 'No. of Positions',
    ],
    'information-systems-form' => [
        'is_name_1' => 'System Name', 'status_1' => 'Status', 'classification_1' => 'Classification',
        'description_1' => 'Description / Purpose', 'deployment_1' => 'Deployment Approach',
        'owner_1' => 'System Owner', 'dev_strategy_1' => 'Development Strategy',
        'platform_1' => 'Platform / Framework', 'database_1' => 'Database Name',
        'storage_1' => 'Data Storage', 'internal_users_1' => 'Internal Users',
        'external_users_1' => 'External Users', 'system_usage_1' => 'System Usage Type',
        'online_link_1' => 'Provide Link (if Online)',
        'frontline_1' => 'Frontline Service', 'non_frontline_1' => 'Non-Frontline Service',
        'online_1' => 'Online', 'on_premise_1' => 'On-premise', 'hybrid_1' => 'Hybrid',
        'interop1_main' => 'Interoperability', 'interop1_internal_system' => 'Internal System Name',
        'interop1_sub' => 'Interoperability Sub-type', 'interop1_external_system' => 'External System',
        'pia_1' => 'Privacy Impact Assessment (PIA)',
    ],
    'ict-projects-form' => [
        'internal_project_title' => 'Internal Project Title', 'internal_description' => 'Description', 'internal_objectives' => 'Objectives',
        'internal_strategic_pip' => 'Public Investment Program', 'internal_strategic_ncp' => 'National Cybersecurity Plan',
        'internal_strategic_egov' => 'E-Government Master Plan', 'internal_strategic_pcb' => 'Program Convergence Budgeting',
        'internal_strategic_others' => 'Others (Specify)', 'internal_strategic_others_text' => 'Others - Please specify',
        'internal_harmonization_1' => 'National Prioritization', 'internal_harmonization_2' => 'Resource Optimization',
        'internal_harmonization_3' => 'Interoperability Framework', 'internal_harmonization_4' => 'Cross-Agency Collaboration',
        'internal_harmonization_5' => 'Scalability and Sustainability',
        'internal_start_date' => 'Start Date', 'internal_end_date' => 'End Date',
        'internal_year1_deliverables' => 'Year 1 Deliverables', 'internal_year2_deliverables' => 'Year 2 Deliverables',
        'internal_year3_deliverables' => 'Year 3 Deliverables', 'internal_implementing_unit' => 'Implementing Unit',
        'internal_total_cost' => 'Total Cost', 'internal_funding_source' => 'Funding Source',
        'cross_project_title' => 'Cross-Agency Project Title', 'cross_description' => 'Description', 'cross_objectives' => 'Objectives',
        'cross_lead_agency' => 'Lead Agency', 'cross_implementing_agency' => 'Implementing Agency',
        'cross_strategic_pip' => 'Public Investment Program', 'cross_strategic_ncp' => 'National Cybersecurity Plan',
        'cross_strategic_egov' => 'E-Government Master Plan', 'cross_strategic_pcb' => 'Program Convergence Budgeting',
        'cross_strategic_others' => 'Others (Specify)', 'cross_strategic_others_text' => 'Others - Please specify',
        'cross_harmonization_1' => 'National Prioritization', 'cross_harmonization_2' => 'Resource Optimization',
        'cross_harmonization_3' => 'Interoperability Framework', 'cross_harmonization_4' => 'Cross-Agency Collaboration',
        'cross_harmonization_5' => 'Scalability and Sustainability',
        'cross_start_date' => 'Start Date', 'cross_end_date' => 'End Date',
        'cross_year1_deliverables' => 'Year 1 Deliverables', 'cross_year2_deliverables' => 'Year 2 Deliverables',
        'cross_year3_deliverables' => 'Year 3 Deliverables', 'cross_implementing_unit' => 'Implementing Unit',
        'cross_total_cost' => 'Total Cost', 'cross_funding_source' => 'Funding Source',
    ],
];

$cybersecurityCategories = [
    'PHYSICAL SECURITY' => [
        'perimeter_protection' => ['label' => 'Perimeter Protection', 'badge' => 'Mandatory'],
        'access_control' => ['label' => 'Access Control', 'badge' => 'Mandatory'],
        'surveillance_system' => ['label' => 'Surveillance System', 'badge' => 'Mandatory'],
        'detection_system' => ['label' => 'Detection System', 'badge' => 'Optional'],
    ],
    'PERIMETER SECURITY' => [
        'next_gen_firewall' => ['label' => 'Next Generation Firewalls', 'badge' => 'Mandatory'],
        'ids_ips' => ['label' => 'Intrusion Detection/Prevention Systems (IDS/IPS)', 'badge' => 'Mandatory'],
        'waf' => ['label' => 'Web Application Firewalls (WAFs)', 'badge' => 'Mandatory'],
        'dmz' => ['label' => 'Demilitarized Zone (DMZ)', 'badge' => 'Optional'],
    ],
    'NETWORK SECURITY' => [
        'data_encryption' => ['label' => 'Data Encryption', 'badge' => 'Mandatory'],
        'network_segmentation' => ['label' => 'Network Segmentation', 'badge' => 'Optional'],
    ],
    'ENDPOINT SECURITY' => [
        'antivirus_antimalware' => ['label' => 'Anti-virus and Anti-malware Software', 'badge' => 'Mandatory'],
        'application_control' => ['label' => 'Application Control', 'badge' => 'Mandatory'],
        'byod_security' => ['label' => 'BYOD Security', 'badge' => 'Mandatory'],
        'xdr' => ['label' => 'Extended Detection and Response (XDR)', 'badge' => 'Optional'],
    ],
    'DATA SECURITY' => [
        'data_classification' => ['label' => 'Data Classification', 'badge' => 'Mandatory'],
        'dlp' => ['label' => 'Data Loss Prevention (DLP)', 'badge' => 'Mandatory'],
        'data_backups' => ['label' => 'Data Backups and Recovery', 'badge' => 'Mandatory'],
    ],
    'APPLICATION SECURITY' => [
        'security_scanning' => ['label' => 'Regular Security Scanning and Testing', 'badge' => 'Mandatory'],
    ],
    'OTHER MEASURES' => [
        'vulnerability_assessment' => ['label' => 'Vulnerability Assessment', 'badge' => 'Not Specified'],
        'patch_management' => ['label' => 'Patch Management', 'badge' => 'Not Specified'],
        'strong_password' => ['label' => 'Strong Password Policies', 'badge' => 'Not Specified'],
        'mfa' => ['label' => 'Multi-Factor Authentication (MFA)', 'badge' => 'Not Specified'],
        'access_reviews' => ['label' => 'Access Reviews', 'badge' => 'Not Specified'],
        'security_logs' => ['label' => 'Security Logs', 'badge' => 'Not Specified'],
        'log_analysis' => ['label' => 'Log Analysis', 'badge' => 'Not Specified'],
        'incident_response' => ['label' => 'Incident Response Plan', 'badge' => 'Not Specified'],
        'siem' => ['label' => 'Security Information and Event Management (SIEM)', 'badge' => 'Not Specified'],
        'penetration_testing' => ['label' => 'Penetration Testing', 'badge' => 'Not Specified'],
        'sdlc' => ['label' => 'Secure Software Development Life Cycle (SDLC)', 'badge' => 'Not Specified'],
    ],
];

$cyberFieldList = [];
foreach ($cybersecurityCategories as $cat) { foreach ($cat as $fn => $item) { if (is_array($item)) $cyberFieldList[] = $fn; } }

if (!function_exists('fl')) { function fl($s, $f) { global $fieldLabels; return $fieldLabels[$s][$f] ?? ucwords(str_replace(['_', '-'], ' ', $f)); } }
if (!function_exists('v')) { function v($v) { if ($v === null || $v === false) return ''; if (is_array($v)) { $e = json_encode($v); return ($e === '[]' || $e === '{}') ? '' : htmlspecialchars(implode(', ', $v)); } return htmlspecialchars(trim((string) $v)); } }
if (!function_exists('ve')) { function ve($v) { $s = is_array($v) ? json_encode($v) : (string) $v; return htmlspecialchars(trim($s)); } }
if (!function_exists('isEmpty')) { function isEmpty($v) { if ($v === null || $v === false || $v === '') return true; if (is_array($v)) return empty($v); return trim((string) $v) === ''; } }

$title = $project['title'] ?? 'Untitled ISSP Submission';
$department = $project['department_name'] ?? 'N/A';
$submittedBy = $project['created_by_name'] ?? 'Unknown';
$status = $project['status'] ?? 'draft';
$submittedAt = $project['submitted_at'] ?? $project['created_at'] ?? '';
$startYear = date('Y', strtotime($submittedAt)) ?: date('Y');
$endYear = (int)$startYear + 3;

$formData = $formData ?? [];
$resourceData = $resourceData ?? [];
$agencyData = $agencyData ?? [];
$ni = $formData['network-infrastructure-form'] ?? [];
$ea = $formData['enterprise-architecture-form'] ?? [];
$hc = $formData['ict-human-capital-form'] ?? [];
$is = $formData['information-systems-form'] ?? [];
$proj = $formData['ict-projects-form'] ?? [];
$pm = $formData['performance-measurement-form'] ?? [];
$batchMode = $batchMode ?? false;
$rY1 = $resourceData['year1'] ?? []; $rY2 = $resourceData['year2'] ?? []; $rY3 = $resourceData['year3'] ?? [];
$rGen = $resourceData['generalSummary'] ?? []; $rFund = $resourceData['fundSource'] ?? [];
$rSOE = $resourceData['statementOfExpenditure'] ?? []; $rOOE = $resourceData['objectOfExpenditure'] ?? [];

$hasNi = false; foreach ($ni as $k => $vv) { if (!in_array($k, $cyberFieldList) && !isEmpty($vv)) { $hasNi = true; break; } }
$hasEa = false; foreach ($ea as $vv) { if (!isEmpty($vv)) { $hasEa = true; break; } }
$hasHc = false; for ($i = 1; $i <= 4; $i++) { if (!isEmpty($hc['position_'.$i] ?? '') || !isEmpty($hc['status_'.$i] ?? '') || !isEmpty($hc['count_'.$i] ?? '')) { $hasHc = true; break; } }
$hasIs = false; foreach ($is as $vv) { if (!isEmpty($vv)) { $hasIs = true; break; } }
$intFlds = ['internal_project_title','internal_description','internal_objectives','internal_total_cost','internal_funding_source','internal_start_date','internal_end_date','internal_implementing_unit','internal_year1_deliverables','internal_year2_deliverables','internal_year3_deliverables'];
$hasInt = false; foreach ($intFlds as $f) { if (!isEmpty($proj[$f] ?? '')) { $hasInt = true; break; } }
$hasPm = false; $pmProjects = ['internal_projects' => 'INTERNAL ICT PROJECTS'];
$levels = ['intermediate' => 'INTERMEDIATE OUTCOME', 'immediate' => 'IMMEDIATE OUTCOME', 'output' => 'OUTPUT'];
$cols = ['indicator' => 'Key Performance Indicators', 'baseline' => 'Baseline Data', 'target' => 'Targets', 'method' => 'Data Collection Methods', 'responsibility' => 'Responsibility'];
foreach ($pmProjects as $pk => $pl): $kpData = $pm[$pk] ?? null; $kpi = is_array($kpData) ? ($kpData['kpi'] ?? $kpData) : [];
if (is_array($kpi)) { foreach ($levels as $lk => $lv) { $row = $kpi[$lk] ?? []; if (!is_array($row)) continue; foreach ($cols as $ck => $cl) { if (!isEmpty($row[$ck] ?? '')) { $hasPm = true; break 3; } } } } endforeach;
$hasRes = !empty($rY1) || !empty($rY2) || !empty($rY3);
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<style>
@page { margin: 25.4mm; size: A4 landscape; }
* { box-sizing: border-box; }
body { font-family: 'Palatino Linotype', 'Palatino', 'Book Antiqua', serif; font-size: 11pt; color: #000; line-height: 1.5; margin: 0; padding: 0; }

.cover-page { text-align: center; padding-top: 10mm; page-break-after: always; }
.cover-title { font-size: 22pt; font-weight: bold; margin-bottom: 3mm; }
.cover-type { font-size: 11pt; margin-bottom: 2mm; display: flex; align-items: center; justify-content: center; gap: 6mm; }
.cover-type-label { display: inline-flex; align-items: center; gap: 2mm; }
.cover-type-check { font-size: 11pt; }
.cover-sub { font-size: 11pt; margin-bottom: 2mm; }
.cover-agency { font-size: 11pt; font-weight: bold; margin-bottom: 10mm; }
.cover-agency-sub { font-size: 11pt; margin-bottom: 4mm; }
.cover-two-col { display: table; width: 100%; margin-top: 5mm; }
.cover-two-col-left { display: table-cell; width: 50%; vertical-align: top; padding-right: 8mm; text-align: left; padding-left: 15mm; }
.cover-two-col-right { display: table-cell; width: 50%; vertical-align: top; text-align: left; padding-left: 20mm; }
.cover-block { margin-bottom: 8mm; font-size: 11pt; }
.cover-block-label { font-weight: bold; margin-bottom: 1mm; }
.cover-block-sign { display: block; width: 70%; margin-left: 15mm; margin-top: 5mm; border-top: 1px solid #333; padding-top: 2mm; text-align: left; font-size: 10pt; white-space: nowrap; }
.cover-scope { margin-top: 2mm; font-size: 11pt; line-height: 1.5; margin-left: 4mm; }
.cover-scope-title { font-weight: bold; margin-bottom: 1mm; }

.toc-page { page-break-after: always; padding-top: 10mm; }
.toc-title { font-size: 18pt; font-weight: bold; text-align: left; margin-bottom: 8mm; }
.toc-part { font-weight: bold; font-size: 11pt; margin-top: 5mm; margin-bottom: 1mm; }
.toc-sub { font-size: 11pt; margin-bottom: 1mm; margin-left: 4mm; }
.toc-item { font-size: 11pt; margin-bottom: 0.8mm; margin-left: 8mm; }
.toc-row { font-size: 11pt; margin-bottom: 1mm; display: table; width: 100%; }
.toc-row-part { font-weight: bold; margin-top: 5mm; }
.toc-label-toc { display: table-cell; padding-left: 0; }
.toc-row-sub .toc-label-toc { padding-left: 4mm; }
.toc-row-item .toc-label-toc { padding-left: 8mm; }
.toc-page-num { display: table-cell; text-align: right; width: 20px; }

.part-heading { font-size: 16pt; font-weight: bold;  margin-top: 6mm; margin-bottom: 4mm; }
.part-heading:first-of-type { page-break-before: always; }
.section-heading { font-size: 14pt; font-weight: bold;  margin-top: 5mm; margin-bottom: 3mm; }
.subsection-heading { font-size: 12pt; font-weight: bold;  margin-top: 4mm; margin-bottom: 2mm; margin-left: 8mm; }
.body-text { font-size: 11pt; margin-bottom: 2mm; margin-left: 16mm; }
.field-label { font-size: 11pt; font-weight: bold; }

table.dt { width: 100%; border-collapse: collapse; font-size: 11pt; margin: 2mm 0; page-break-inside: avoid; }
table.dt th { border: 1px solid #000; padding: 1.5mm 2mm; font-weight: bold; text-align: center; background: #d9d9d9; vertical-align: middle; }
table.dt td { border: 1px solid #000; padding: 1.5mm 2mm; vertical-align: top; }
table.dt td.c { text-align: center; } table.dt td.b { font-weight: bold; } table.dt-d td:first-child { text-transform: uppercase; }
table.dt td.r { text-align: right; } table.dt td.gt { font-weight: bold; border-top: 2px solid #000; }
table.dt td.gt:first-child { background: #d9d9d9; }
table.dt td.ch { font-weight: bold; }
table.dt td.nb { border: none; background: none; }
table.dt tr.group-header td { background: #d9d9d9; font-weight: bold; text-align: center; }
.empty { color: #888; font-size: 11pt; text-align: center; padding: 2mm; }
.footer { text-align: center; font-size: 9pt; color: #888; margin-top: 8mm; border-top: 1px solid #ccc; padding-top: 2mm; }
</style>
<?php if (!$batchMode): ?>
</head>
<body>
<?php endif; ?>

<!-- ==================== COVER PAGE ==================== -->
<div class="cover-page">
    <p style="font-size:11pt;color:#666;margin-bottom:12mm;">(Replace with agency's logo)</p>
    <div class="cover-title">INFORMATION SYSTEMS STRATEGIC PLAN (ISSP)</div>
    <div class="cover-type">
        <span class="cover-type-label"><span class="cover-type-check">[<?= v($issp_type ?? '') === 'regular' ? 'X' : ' ' ?>]</span> REGULAR ISSP</span>
        <span class="cover-type-label"><span class="cover-type-check">[<?= v($issp_type ?? '') === 'amendment' ? 'X' : ' ' ?>]</span> AMENDMENT <small>&lt; 1st / 2nd / 3rd &gt;</small></span>
    </div>
    <div class="cover-sub">For the period <?= ve($startYear) ?> to <?= ve($endYear) ?></div>
    <div class="cover-agency">Philippine Information Agency</div>

    <div class="cover-two-col">
        <div class="cover-two-col-left">
            <div class="cover-block">
                <div class="cover-block-label">PREPARED BY:</div>
                <div class="cover-block-sign">Name &amp; Signature of Chief Information Officer</div>
            </div>
            <div style="height:8mm;"></div>
            <div class="cover-block">
                <div class="cover-block-label">APPROVED BY:</div>
                <div class="cover-block-sign">Name &amp; Signature of Agency Head</div>
            </div>
        </div>
        <div class="cover-two-col-right">
            <div class="cover-scope-title">Scope</div>
            <div class="cover-scope">
                <table style="border-collapse:collapse;margin:0;padding:0;font-size:11pt;line-height:1.5;">
                    <tr><td style="padding:0;white-space:nowrap;vertical-align:top;">[ ] Department-Wide</td><td></td></tr>
                    <tr><td style="padding:0;white-space:nowrap;vertical-align:top;">[ ] Department - Central Office / Head Office</td><td></td></tr>
                    <tr><td style="padding:0;white-space:nowrap;vertical-align:top;">&nbsp;&nbsp;&nbsp;&nbsp;[ ] Central Office only</td><td></td></tr>
                    <tr><td style="padding:0;white-space:nowrap;vertical-align:top;">&nbsp;&nbsp;&nbsp;&nbsp;[ ] With Regional Offices / Field Offices</td><td></td></tr>
                    <tr><td style="padding:0;white-space:nowrap;vertical-align:top;">&nbsp;&nbsp;&nbsp;&nbsp;[ ] With Bureaus</td><td></td></tr>
                    <tr><td style="padding:0;white-space:nowrap;vertical-align:top;">[ ] Agency-Wide</td><td></td></tr>
                    <tr><td style="padding:0;white-space:nowrap;vertical-align:top;">&nbsp;&nbsp;&nbsp;&nbsp;[ ] Central Office only</td><td></td></tr>
                    <tr><td style="padding:0;white-space:nowrap;vertical-align:top;">&nbsp;&nbsp;&nbsp;&nbsp;[ ] With Regional Offices / Field Offices</td><td></td></tr>
                    <tr><td style="padding:0;white-space:nowrap;vertical-align:top;">&nbsp;&nbsp;&nbsp;&nbsp;[ ] Other Government Entity</td><td></td></tr>
                    <tr><td style="padding:0;white-space:nowrap;vertical-align:top;">[ ] LGU</td><td></td></tr>
                </table>
            </div>
        </div>
    </div>

</div>

<!-- ==================== TABLE OF CONTENTS ==================== -->
<div class="toc-page">
    <div class="toc-title">Table of Contents</div>

    <div class="toc-row toc-row-sub" style="font-weight:bold;"><span class="toc-label-toc">Definition of Terms</span><span class="toc-page-num">4</span></div>

    <div class="toc-row toc-row-part"><span class="toc-label-toc">PART I. AGENCY PROFILE &amp; STRATEGIC CONTEXT</span><span class="toc-page-num">5</span></div>
    <div class="toc-row toc-row-sub"><span class="toc-label-toc">A. Mandate, Vision, Mission, and Organizational Outcome</span><span class="toc-page-num">3</span></div>
    <div class="toc-row toc-row-item"><span class="toc-label-toc">A.1. Mandate</span><span class="toc-page-num">3</span></div>
    <div class="toc-row toc-row-item"><span class="toc-label-toc">A.2. Vision Statement</span><span class="toc-page-num">3</span></div>
    <div class="toc-row toc-row-item"><span class="toc-label-toc">A.3. Mission Statement</span><span class="toc-page-num">3</span></div>
    <div class="toc-row toc-row-item"><span class="toc-label-toc">A.4. Organizational Outcome</span><span class="toc-page-num">3</span></div>
    <div class="toc-row toc-row-sub"><span class="toc-label-toc">B. Organizational Structure</span><span class="toc-page-num">4</span></div>
    <div class="toc-row toc-row-item"><span class="toc-label-toc">B.1. Chief Information Officer (CIO)</span><span class="toc-page-num">4</span></div>
    <div class="toc-row toc-row-item"><span class="toc-label-toc">B.2. Human Capital</span><span class="toc-page-num">4</span></div>
    <div class="toc-row toc-row-sub"><span class="toc-label-toc">C. Stakeholder Analysis</span><span class="toc-page-num">5</span></div>

    <div class="toc-row toc-row-part"><span class="toc-label-toc">PART II. CURRENT ICT ASSESSMENT</span><span class="toc-page-num">6</span></div>
    <div class="toc-row toc-row-sub"><span class="toc-label-toc">A. Strategic Concerns for ICT Use</span><span class="toc-page-num">6</span></div>
    <div class="toc-row toc-row-sub"><span class="toc-label-toc">B. Existing Network Infrastructure</span><span class="toc-page-num">6</span></div>
    <div class="toc-row toc-row-item"><span class="toc-label-toc">B1. LAN/WAN Set-up Including Connectivity Type and Bandwidth</span><span class="toc-page-num">6</span></div>
    <div class="toc-row toc-row-item"><span class="toc-label-toc">B2. Cybersecurity Control Checklist</span><span class="toc-page-num">7</span></div>
    <div class="toc-row toc-row-sub"><span class="toc-label-toc">C. Existing/Operational Information Systems (IS) Inventory</span><span class="toc-page-num">8</span></div>
    <div class="toc-row toc-row-sub"><span class="toc-label-toc">D. E-Government Programs (EGP) Checklist</span><span class="toc-page-num">9</span></div>

    <div class="toc-row toc-row-part"><span class="toc-label-toc">PART III. PROPOSED ICT STRATEGY</span><span class="toc-page-num">10</span></div>
    <div class="toc-row toc-row-sub"><span class="toc-label-toc">A. Proposed Network Infrastructure</span><span class="toc-page-num">10</span></div>
    <div class="toc-row toc-row-item"><span class="toc-label-toc">A.1. LAN/WAN Set-up Including Connectivity Type and Bandwidth</span><span class="toc-page-num">10</span></div>
    <div class="toc-row toc-row-item"><span class="toc-label-toc">A.2. Cybersecurity Control Checklist</span><span class="toc-page-num">11</span></div>
    <div class="toc-row toc-row-sub"><span class="toc-label-toc">B. Enterprise Architecture</span><span class="toc-page-num">12</span></div>
    <div class="toc-row toc-row-sub"><span class="toc-label-toc">C. Proposed ICT Human Capital</span><span class="toc-page-num">13</span></div>
    <div class="toc-row toc-row-sub"><span class="toc-label-toc">D. Proposed Information Systems</span><span class="toc-page-num">14</span></div>
    <div class="toc-row toc-row-sub"><span class="toc-label-toc">E. ICT Projects</span><span class="toc-page-num">16</span></div>
    <div class="toc-row toc-row-sub"><span class="toc-label-toc">F. Performance Measurement Framework</span><span class="toc-page-num">18</span></div>

    <div class="toc-row toc-row-part"><span class="toc-label-toc">PART IV. RESOURCE REQUIREMENTS</span><span class="toc-page-num">23</span></div>
    <div class="toc-row toc-row-sub"><span class="toc-label-toc">A. Detailed Resource Deployment and Cost Breakdown</span><span class="toc-page-num">23</span></div>
    <div class="toc-row toc-row-item"><span class="toc-label-toc">A.1. Year #1</span><span class="toc-page-num">23</span></div>
    <div class="toc-row toc-row-item"><span class="toc-label-toc">A.2. Year #2</span><span class="toc-page-num">27</span></div>
    <div class="toc-row toc-row-item"><span class="toc-label-toc">A.3. Year #3</span><span class="toc-page-num">31</span></div>
    <div class="toc-row toc-row-sub"><span class="toc-label-toc">B. Summary of Investments</span><span class="toc-page-num">35</span></div>
    <div class="toc-row toc-row-item"><span class="toc-label-toc">B.1. General Summary</span><span class="toc-page-num">35</span></div>
    <div class="toc-row toc-row-item"><span class="toc-label-toc">B.2. Fund Source</span><span class="toc-page-num">35</span></div>
    <div class="toc-row toc-row-item"><span class="toc-label-toc">B.3. Statement of Expenditure</span><span class="toc-page-num">35</span></div>
    <div class="toc-row toc-row-item"><span class="toc-label-toc">B.4. Object of Expenditure</span><span class="toc-page-num">36</span></div>
</div>

<!-- ==================== DEFINITION OF TERMS ==================== -->
<div style="font-size: 20pt; font-weight: bold; margin-bottom: 6mm;">DEFINITION OF TERMS</div>
<table style="width: 100%; border-collapse: collapse; font-size: 11pt; line-height: 1.5;">
    <thead>
        <tr>
            <th style="width: 50%; border: 1px solid #000; padding: 4px 6px; text-align: left; font-weight: bold;">Terms</th>
            <th style="width: 50%; border: 1px solid #000; padding: 4px 6px; text-align: left; font-weight: bold;">Definition</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td style="border: 1px solid #000; padding: 4px 6px; vertical-align: top;">Agency</td>
            <td style="border: 1px solid #000; padding: 4px 6px; vertical-align: top;">Refers to any bureau, office, commission, authority, or instrumentality of the national government, including government-owned or–controlled corporations (GOCC), authorized by law or by their respective charters to contract for or undertake information and communications technology networks and databases, infrastructure or development projects.</td>
        </tr>
        <tr>
            <td style="border: 1px solid #000; padding: 4px 6px; vertical-align: top;">Business Process</td>
            <td style="border: 1px solid #000; padding: 4px 6px; vertical-align: top;">A collection of business transactions between business partners and/or internal activities within one business. These transactions and/or activities together support the objective of the business process.</td>
        </tr>
        <tr>
            <td style="border: 1px solid #000; padding: 4px 6px; vertical-align: top;">Chief Information Officer</td>
            <td style="border: 1px solid #000; padding: 4px 6px; vertical-align: top;">Refers to a senior officer responsible for the development, planning, and implementation of the government entity's information systems strategic plan (ISSP) or ICT plan, and management of the agency's ICT systems, platforms, and applications.</td>
        </tr>
    </tbody>
</table>

<!-- ==================== PART I ==================== -->
<div style="page-break-before: always;"></div>
<div class="part-heading">PART I. AGENCY PROFILE &amp; STRATEGIC CONTEXT</div>
<div class="section-heading">A. MANDATE, VISION, MISSION, AND ORGANIZATIONAL OUTCOME</div>
<div class="subsection-heading">A.1. MANDATE</div>
<div class="body-text"><span class="field-label">Legal Basis:</span> <?= !isEmpty($agencyData['legal_basis'] ?? '') ? nl2br(v($agencyData['legal_basis'])) : '<span class="empty">[To be completed by agency]</span>' ?></div>
<div class="body-text"><span class="field-label">Function:</span> <?= !isEmpty($agencyData['function'] ?? '') ? nl2br(v($agencyData['function'])) : '<span class="empty">[To be completed by agency]</span>' ?></div>
<div class="subsection-heading">A.2. VISION STATEMENT</div>
<div class="body-text"><?= !isEmpty($agencyData['vision_statement'] ?? '') ? nl2br(v($agencyData['vision_statement'])) : '<span class="empty">[To be completed by agency]</span>' ?></div>
<div class="subsection-heading">A.3. MISSION STATEMENT</div>
<div class="body-text"><?= !isEmpty($agencyData['mission_statement'] ?? '') ? nl2br(v($agencyData['mission_statement'])) : '<span class="empty">[To be completed by agency]</span>' ?></div>
<div class="subsection-heading">A.4. ORGANIZATIONAL OUTCOME</div>
<div class="body-text"><?= !isEmpty($agencyData['organizational_outcome'] ?? '') ? nl2br(v($agencyData['organizational_outcome'])) : '<span class="empty">[To be completed by agency]</span>' ?></div>

<div class="section-heading">B. ORGANIZATIONAL STRUCTURE</div>
<div class="subsection-heading">B.1. CHIEF INFORMATION OFFICER (CIO)</div>
<div class="body-text"><span class="field-label">Name of CIO:</span> <?= !isEmpty($agencyData['cio_name'] ?? '') ? v($agencyData['cio_name']) : '<span class="empty">[To be completed]</span>' ?></div>
<div class="body-text"><span class="field-label">Plantilla Position:</span> <?= !isEmpty($agencyData['cio_plantilla'] ?? '') ? v($agencyData['cio_plantilla']) : '<span class="empty">[To be completed]</span>' ?></div>
<div class="body-text"><span class="field-label">Organizational Unit:</span> <?= !isEmpty($agencyData['cio_unit'] ?? '') ? v($agencyData['cio_unit']) : '<span class="empty">[To be completed]</span>' ?></div>
<div class="body-text"><span class="field-label">E-mail Address:</span> <?= !isEmpty($agencyData['cio_email'] ?? '') ? v($agencyData['cio_email']) : '<span class="empty">[To be completed]</span>' ?></div>
<div class="body-text"><span class="field-label">Contact Number/s:</span> <?= !isEmpty($agencyData['cio_contact'] ?? '') ? v($agencyData['cio_contact']) : '<span class="empty">[To be completed]</span>' ?></div>

<div class="subsection-heading">B.2. HUMAN CAPITAL</div>
<?php
$hcPlantilla = ['it' => (int)($agencyData['plantilla_it'] ?? 0), 'non_it' => (int)($agencyData['plantilla_non_it'] ?? 0), 'male' => (int)($agencyData['plantilla_male'] ?? 0), 'female' => (int)($agencyData['plantilla_female'] ?? 0)];
$hcContractual = ['it' => (int)($agencyData['contractual_it'] ?? 0), 'non_it' => (int)($agencyData['contractual_non_it'] ?? 0), 'male' => (int)($agencyData['contractual_male'] ?? 0), 'female' => (int)($agencyData['contractual_female'] ?? 0)];
$hcOutsourced = ['it' => (int)($agencyData['outsourced_it'] ?? 0), 'non_it' => (int)($agencyData['outsourced_non_it'] ?? 0), 'male' => (int)($agencyData['outsourced_male'] ?? 0), 'female' => (int)($agencyData['outsourced_female'] ?? 0)];
$hcGrandIt = $hcPlantilla['it'] + $hcContractual['it'] + $hcOutsourced['it'];
$hcGrandNonIt = $hcPlantilla['non_it'] + $hcContractual['non_it'] + $hcOutsourced['non_it'];
$hcGrandMale = $hcPlantilla['male'] + $hcContractual['male'] + $hcOutsourced['male'];
$hcGrandFemale = $hcPlantilla['female'] + $hcContractual['female'] + $hcOutsourced['female'];
?>
<table class="dt">
    <tr><th style="width:25%;">EMPLOYMENT STATUS</th><th>IT POSITIONS</th><th>NON-IT POSITIONS</th><th>SEX (MALE)</th><th>SEX (FEMALE)</th></tr>
    <tr><td class="b">Plantilla</td><td class="c"><?= $hcPlantilla['it'] ?: '-' ?></td><td class="c"><?= $hcPlantilla['non_it'] ?: '-' ?></td><td class="c"><?= $hcPlantilla['male'] ?: '-' ?></td><td class="c"><?= $hcPlantilla['female'] ?: '-' ?></td></tr>
    <tr><td class="b">Contractual</td><td class="c"><?= $hcContractual['it'] ?: '-' ?></td><td class="c"><?= $hcContractual['non_it'] ?: '-' ?></td><td class="c"><?= $hcContractual['male'] ?: '-' ?></td><td class="c"><?= $hcContractual['female'] ?: '-' ?></td></tr>
    <tr><td class="b">Outsourced (JO, COS, HTC)</td><td class="c"><?= $hcOutsourced['it'] ?: '-' ?></td><td class="c"><?= $hcOutsourced['non_it'] ?: '-' ?></td><td class="c"><?= $hcOutsourced['male'] ?: '-' ?></td><td class="c"><?= $hcOutsourced['female'] ?: '-' ?></td></tr>
    <tr><td class="gt">Grand Total</td><td class="c gt"><?= $hcGrandIt ?: '-' ?></td><td class="c gt"><?= $hcGrandNonIt ?: '-' ?></td><td class="c gt"><?= $hcGrandMale ?: '-' ?></td><td class="c gt"><?= $hcGrandFemale ?: '-' ?></td></tr>
</table>

<div class="section-heading">C. STAKEHOLDER ANALYSIS</div>
<?php
$stakeholders = [];
if (!empty($agencyData['stakeholder_data'])) {
    $decoded = json_decode($agencyData['stakeholder_data'], true);
    if (is_array($decoded)) $stakeholders = $decoded;
}
?>
<table class="dt">
    <tr><th style="width:25%;">Stakeholders</th><th>Transaction Processed</th><th style="width:20%;">Complexity</th></tr>
    <?php if (!empty($stakeholders)): ?>
    <?php foreach ($stakeholders as $s): ?>
    <tr><td><?= ve($s['name'] ?? '') ?></td><td><?= ve($s['transaction'] ?? '') ?></td><td class="c"><?= ve($s['complexity'] ?? '') ?></td></tr>
    <?php endforeach; ?>
    <?php else: ?>
    <tr><td colspan="3" class="empty">[To be completed by agency]</td></tr>
    <?php endif; ?>
</table>

<!-- ==================== PART II ==================== -->
<div class="part-heading">PART II. CURRENT ICT ASSESSMENT</div>
<div class="section-heading">A. STRATEGIC CONCERNS FOR ICT USE</div>
<div class="section-heading">B. EXISTING NETWORK INFRASTRUCTURE</div>
<div class="subsection-heading">B1. LAN/WAN SET-UP INCLUDING CONNECTIVITY TYPE AND BANDWIDTH</div>
<div class="subsection-heading">B2. CYBERSECURITY CONTROL CHECKLIST</div>
<div class="section-heading">C. EXISTING/OPERATIONAL INFORMATION SYSTEMS (IS) INVENTORY</div>
<div class="section-heading">D. E-GOVERNMENT PROGRAMS (EGP) CHECKLIST</div>

<!-- ==================== PART III ==================== -->
<div class="part-heading">PART III. PROPOSED ICT STRATEGY</div>

<div class="section-heading">A. PROPOSED NETWORK INFRASTRUCTURE</div>
<div class="subsection-heading">A.1. LAN/WAN SET-UP INCLUDING CONNECTIVITY TYPE AND BANDWIDTH</div>

<div class="subsection-heading">A.2. CYBERSECURITY CONTROL CHECKLIST</div>
<table class="dt">
    <tr><th style="width:22%;"></th><th style="width:39%;">MANDATORY</th><th style="width:39%;">OPTIONAL</th></tr>
    <?php foreach ($cybersecurityCategories as $catName => $catItems): ?>
    <?php if ($catName === 'OTHER MEASURES'): ?>
    <tr>
        <td class="ch" style="border-right:none;"><?= ve($catName) ?></td>
        <td style="border-right:none;"><?php $items = array_values($catItems); $half = ceil(count($items) / 2); foreach (array_slice($items, 0, $half) as $citem): ?><?php $checked = (isset($ni[$citem['label']]) && v($ni[$citem['label']]) === '1'); ?><div>[<?= $checked ? 'X' : ' ' ?>] <?= ve($citem['label']) ?></div><?php endforeach; ?></td>
        <td style="border-left:none;"><?php foreach (array_slice($items, $half) as $citem): ?><?php $checked = (isset($ni[$citem['label']]) && v($ni[$citem['label']]) === '1'); ?><div>[<?= $checked ? 'X' : ' ' ?>] <?= ve($citem['label']) ?></div><?php endforeach; ?></td>
    </tr>
    <?php else: ?>
    <tr>
        <td class="ch"><?= ve($catName) ?></td>
        <td><?php foreach ($catItems as $cfn => $citem): ?><?php if ($citem['badge'] !== 'Optional'): ?><?php $checked = (isset($ni[$cfn]) && v($ni[$cfn]) === '1'); ?><div>[<?= $checked ? 'X' : ' ' ?>] <?= ve($citem['label']) ?></div><?php endif; ?><?php endforeach; ?></td>
        <td><?php foreach ($catItems as $cfn => $citem): ?><?php if ($citem['badge'] === 'Optional'): ?><?php $checked = (isset($ni[$cfn]) && v($ni[$cfn]) === '1'); ?><div>[<?= $checked ? 'X' : ' ' ?>] <?= ve($citem['label']) ?></div><?php endif; ?><?php endforeach; ?></td>
    </tr>
    <?php endif; ?>
    <?php endforeach; ?>
</table>

<div class="section-heading">B. ENTERPRISE ARCHITECTURE</div>
<?php if ($hasEa): ?>
    <?php $eaD = v($ea['ea_diagram'] ?? ''); if ($eaD !== ''): ?>
        <?php if (preg_match('/^data:image\/(png|jpe?g|gif);/', $eaD)): ?>
            <?php $eaD = preg_replace('/^data:(image\/[a-z0-9+\-.]+);.*;base64,/', 'data:$1;base64,', $eaD); ?>
            <div style="text-align:center;margin:4mm 0;"><img src="<?= $eaD ?>" style="max-width:100%;max-height:150mm;"></div>
        <?php elseif (preg_match('/^data:application\/pdf;/', $eaD)): ?>
            <div class="body-text"><em>[Enterprise Architecture Diagram - PDF uploaded]</em></div>
        <?php elseif (strpos($eaD, 'uploads/') === 0): ?>
            <div style="text-align:center;margin:4mm 0;"><img src="<?= base_url($eaD) ?>" style="max-width:100%;max-height:150mm;"></div>
        <?php else: ?>
            <div class="body-text"><?= $eaD ?></div>
        <?php endif; ?>
    <?php endif; ?>
    <?php $eaDesc = v($ea['ea_description'] ?? ''); if ($eaDesc !== ''): ?>
        <div class="body-text"><?= nl2br($eaDesc) ?></div>
    <?php endif; ?>
<?php else: ?>
    <div class="body-text empty">No data provided.</div>
<?php endif; ?>

<div class="section-heading">C. PROPOSED ICT HUMAN CAPITAL</div>
<?php $hcRows = []; $hcGT = 0; for ($i = 1; $i <= 4; $i++) { $pos = v($hc['position_'.$i] ?? ''); $stat = v($hc['status_'.$i] ?? ''); $cnt = v($hc['count_'.$i] ?? ''); if ($pos !== '' || $stat !== '' || $cnt !== '') { $cn = is_numeric($cnt) ? (int)$cnt : 0; $hcGT += $cn; $hcRows[] = ['position' => $pos, 'status' => $stat, 'count' => $cnt]; } } ?>
<table class="dt">
    <tr><th style="width:40%;">IT POSITION</th><th style="width:35%;">EMPLOYMENT STATUS</th><th style="width:15%;">PHYSICAL COUNT</th></tr>
    <?php if (!empty($hcRows)): foreach ($hcRows as $r): ?><tr><td><?= $r['position'] !== '' ? $r['position'] : '<span class="empty">-</span>' ?></td><td><?= $r['status'] !== '' ? $r['status'] : '<span class="empty">-</span>' ?></td><td class="c"><?= $r['count'] !== '' ? $r['count'] : '-' ?></td></tr><?php endforeach; ?>
    <?php else: for ($i = 0; $i < 4; $i++): ?><tr><td class="empty">-</td><td class="empty">-</td><td class="c empty">-</td></tr><?php endfor; endif; ?>
    <tr><td class="gt" colspan="2" style="text-align:left;">Grand Total</td><td class="c gt"><?= $hcGT ?></td></tr>
</table>

<div class="section-heading">D. PROPOSED INFORMATION SYSTEMS</div>
<table class="dt dt-d">
    <?php if ($hasIs): ?>
    <tr><td class="b" style="background:#e0e0e0;">Information System Name</td><td><?= v($is['is_name_1'] ?? '') ?></td></tr>
    <tr><td class="b" style="background:#e0e0e0;">Classification</td><td><?= v($is['classification_1'] ?? '') ?></td></tr>
    <tr><td class="b" style="background:#e0e0e0;">Service Type</td><td>
        [<?= (isset($is['frontline_1']) && v($is['frontline_1']) === '1') ? 'X' : ' ' ?>] Frontline Service (directly used for public/client service delivery)<br>
        [<?= (isset($is['non_frontline_1']) && v($is['non_frontline_1']) === '1') ? 'X' : ' ' ?>] Non-Frontline Service (supports core mandate but not directly used by clients/public)<br><br>
        Identify if:<br>
        [<?= (isset($is['online_1']) && v($is['online_1']) === '1') ? 'X' : ' ' ?>] Online<br>
        [<?= (isset($is['on_premise_1']) && v($is['on_premise_1']) === '1') ? 'X' : ' ' ?>] On-premise<br>
        [<?= (isset($is['hybrid_1']) && v($is['hybrid_1']) === '1') ? 'X' : ' ' ?>] Hybrid
    </td></tr>
    <tr><td class="b" style="background:#e0e0e0;">Description &amp; Purpose</td><td><?= v($is['description_1'] ?? '') ?></td></tr>
    <tr><td class="b" style="background:#e0e0e0;">Status</td><td><?= v($is['status_1'] ?? '') ?></td></tr>
    <tr><td class="b" style="background:#e0e0e0;">Development Strategy</td><td><?= v($is['dev_strategy_1'] ?? '') ?></td></tr>
    <tr><td class="b" style="background:#e0e0e0;">Development Platform</td><td><?= v($is['platform_1'] ?? '') ?></td></tr>
    <tr><td class="b" style="background:#e0e0e0;">Database Name</td><td><?= v($is['database_1'] ?? '') ?></td></tr>
    <tr><td class="b" style="background:#e0e0e0;">Data Storage</td><td><?= v($is['storage_1'] ?? '') ?></td></tr>
    <tr><td class="b" style="background:#e0e0e0;">Internal Users</td><td><?= v($is['internal_users_1'] ?? '') ?></td></tr>
    <tr><td class="b" style="background:#e0e0e0;">External Users</td><td><?= v($is['external_users_1'] ?? '') ?></td></tr>
    <tr><td class="b" style="background:#e0e0e0;">Owner</td><td><?= v($is['owner_1'] ?? '') ?></td></tr>
    <tr><td class="b" style="background:#e0e0e0;font-weight:bold;">INTEROPERABILITY</td><td>
        [<?= (isset($is['interop1_main']) && v($is['interop1_main']) === '1') ? 'X' : ' ' ?>] Integration with another system (If the system will exchange data or will be technically integrated with another system)<br>
        If yes, specify the system name &nbsp; Internal System: <?= v($is['interop1_internal_system'] ?? '') ?> &nbsp; External System: <?= v($is['interop1_external_system'] ?? '') ?><br><br>
        [<?= (isset($is['interop1_sub']) && v($is['interop1_sub']) === 'integration') ? 'X' : ' ' ?>] Generate data that will be utilized by other system<br>
        [<?= (isset($is['interop1_sub']) && v($is['interop1_sub']) === 'receive') ? 'X' : ' ' ?>] Process data generated from other system<br>
        [<?= (isset($is['interop1_sub']) && v($is['interop1_sub']) === 'shared') ? 'X' : ' ' ?>] Deployment on a shared platform
    </td></tr>
    <tr><td class="b" style="background:#e0e0e0;font-weight:bold;">PRIVACY IMPACT ASSESSMENT</td><td>
        Will the system process personal information? (Will the system collect, store, or process names, addresses, photos, or any info that can identify an individual?)<br>
        [<?= (isset($is['pia_1']) && v($is['pia_1']) === '1') ? 'X' : ' ' ?>] Yes &nbsp; [<?= (isset($is['pia_1']) && v($is['pia_1']) === '0') ? 'X' : ' ' ?>] No
    </td></tr>
    <?php else: ?>
    <tr><td colspan="2" class="empty">No data provided.</td></tr>
    <?php endif; ?>
</table>

<div class="section-heading">E. ICT PROJECTS</div>
<div class="subsection-heading">INTERNAL ICT PROJECTS</div>
<table class="dt dt-d">
    <?php if ($hasInt): ?>
    <tr><td class="b" style="background:#e0e0e0;">Project Title</td><td><?= v($proj['internal_project_title'] ?? '') ?></td></tr>
    <tr><td class="b" style="background:#e0e0e0;">Description</td><td><?= v($proj['internal_description'] ?? '') ?></td></tr>
    <tr><td class="b" style="background:#e0e0e0;">Objectives</td><td><?= v($proj['internal_objectives'] ?? '') ?></td></tr>
    <tr><td class="b" style="background:#e0e0e0;">Strategic Alignment</td><td>
        [<?= (isset($proj['internal_strategic_pip']) && v($proj['internal_strategic_pip']) === '1') ? 'X' : ' ' ?>] Public Investment Program<br>
        [<?= (isset($proj['internal_strategic_ncp']) && v($proj['internal_strategic_ncp']) === '1') ? 'X' : ' ' ?>] National Cybersecurity Plan<br>
        [<?= (isset($proj['internal_strategic_egov']) && v($proj['internal_strategic_egov']) === '1') ? 'X' : ' ' ?>] E-Government Master Plan<br>
        [<?= (isset($proj['internal_strategic_pcb']) && v($proj['internal_strategic_pcb']) === '1') ? 'X' : ' ' ?>] Program Convergence Budgeting<br>
        [<?= (isset($proj['internal_strategic_others']) && v($proj['internal_strategic_others']) === '1') ? 'X' : ' ' ?>] Others (Specify): <?= v($proj['internal_strategic_others_text'] ?? '') ?>
    </td></tr>
    <tr><td class="b" style="background:#e0e0e0;">Harmonization Framework</td><td>
        [<?= (isset($proj['internal_harmonization_1']) && v($proj['internal_harmonization_1']) === '1') ? 'X' : ' ' ?>] National Prioritization<br>
        [<?= (isset($proj['internal_harmonization_2']) && v($proj['internal_harmonization_2']) === '1') ? 'X' : ' ' ?>] Resource Optimization<br>
        [<?= (isset($proj['internal_harmonization_3']) && v($proj['internal_harmonization_3']) === '1') ? 'X' : ' ' ?>] Interoperability Framework<br>
        [<?= (isset($proj['internal_harmonization_4']) && v($proj['internal_harmonization_4']) === '1') ? 'X' : ' ' ?>] Cross-Agency Collaboration<br>
        [<?= (isset($proj['internal_harmonization_5']) && v($proj['internal_harmonization_5']) === '1') ? 'X' : ' ' ?>] Scalability and Sustainability
    </td></tr>
    <tr><td class="b" style="background:#e0e0e0;">Duration</td><td>
        Start: <?= v($proj['internal_start_date'] ?? '') ?> &nbsp; End: <?= v($proj['internal_end_date'] ?? '') ?>
    </td></tr>
    <tr><td class="b" style="background:#e0e0e0;">Year 1 Deliverables/Milestone</td><td><?= v($proj['internal_year1_deliverables'] ?? '') ?></td></tr>
    <tr><td class="b" style="background:#e0e0e0;">Year 2 Deliverables/Milestone</td><td><?= v($proj['internal_year2_deliverables'] ?? '') ?></td></tr>
    <tr><td class="b" style="background:#e0e0e0;">Year 3 Deliverables/Milestone</td><td><?= v($proj['internal_year3_deliverables'] ?? '') ?></td></tr>
    <tr><td class="b" style="background:#e0e0e0;">Implementing Unit</td><td><?= v($proj['internal_implementing_unit'] ?? '') ?></td></tr>
    <tr><td class="b" style="background:#e0e0e0;">Total Project Cost</td><td><?= v($proj['internal_total_cost'] ?? '') ?></td></tr>
    <tr><td class="b" style="background:#e0e0e0;">Funding Source</td><td><?= v($proj['internal_funding_source'] ?? '') ?></td></tr>
    <?php else: ?>
    <tr><td colspan="2" class="empty">No internal ICT project data provided.</td></tr>
    <?php endif; ?>
</table>

<div class="section-heading">F. PERFORMANCE MEASUREMENT FRAMEWORK</div>
<?php foreach ($pmProjects as $pk => $pl): $kpD = $pm[$pk] ?? null; $kpi = is_array($kpD) ? ($kpD['kpi'] ?? $kpD) : []; $hKpi = false;
if (is_array($kpi)) { foreach ($levels as $lk => $lv) { $row = $kpi[$lk] ?? []; if (!is_array($row)) continue; foreach ($cols as $ck => $cl) { if (!isEmpty($row[$ck] ?? '')) { $hKpi = true; break 2; } } } } ?>
<div class="subsection-heading"><?= ve($pl) ?></div>
<?php if ($hKpi): ?>
<table class="dt"><tr><th style="width:16%;">Hierarchy of Targeted Results</th><?php foreach ($cols as $cl): ?><th><?= ve($cl) ?></th><?php endforeach; ?></tr>
<?php foreach ($levels as $lk => $lv): $row = $kpi[$lk] ?? []; if (!is_array($row)) continue; $rH = false; foreach ($cols as $ck => $cl) { if (!isEmpty($row[$ck] ?? '')) { $rH = true; break; } } if (!$rH) continue; ?>
<tr><td class="b"><?= ve($lv) ?></td><?php foreach ($cols as $ck => $cl): $cv = v($row[$ck] ?? ''); ?><td><?= $cv !== '' ? $cv : '<span class="empty">-</span>' ?></td><?php endforeach; ?></tr>
<?php endforeach; ?></table>
<?php else: ?><table class="dt"><tr><td class="empty">No KPI data provided for <?= ve($pl) ?>.</td></tr></table><?php endif; endforeach; ?>

<!-- ==================== PART IV ==================== -->
<div class="part-heading">PART IV. RESOURCE REQUIREMENTS</div>
<div class="section-heading">DETAILED RESOURCE DEPLOYMENT AND COST BREAKDOWN</div>

<?php $yD = [1 => $rY1, 2 => $rY2, 3 => $rY3]; $yL = [1 => 'YEAR #1', 2 => 'Year #2', 3 => 'Year #3']; foreach ($yD as $yr => $items): ?>
<div class="subsection-heading"><?= ve($yL[$yr]) ?></div>
<table class="dt">
    <tr><th style="width:5%;">ITEM</th><th style="width:14%;">ITEM DESCRIPTION</th><th style="width:10%;">OFFICE LOCATION</th><th style="width:10%;">FUND SOURCE</th><th style="width:10%;">UNIT COST</th><th style="width:10%;">PHYSICAL TARGET</th><th style="width:12%;">TOTAL COST</th></tr>
    <?php if (!empty($items)): $cats = []; foreach ($items as $it) { $c = $it['strategic_category'] ?? 'Uncategorized'; $cats[$c][] = $it; } $yrT = 0; foreach ($cats as $cN => $cI): $cT = 0; ?>
    <tr><td colspan="7" class="group-header"><?= ve($cN) ?></td></tr>
    <?php foreach ($cI as $it): $tc = (float)($it['total_cost'] ?? 0); $yrT += $tc; $cT += $tc; ?>
    <tr><td></td><td><?= ve($it['item'] ?? '') ?></td><td><?= ve($it['office_location'] ?? '') ?></td><td><?= ve($it['fund_source'] ?? '') ?></td><td class="r"><?= number_format((float)($it['unit_cost'] ?? 0), 2) ?></td><td class="c"><?= ve($it['physical_target'] ?? '') ?></td><td class="r"><?= number_format($tc, 2) ?></td></tr>
    <?php endforeach; endforeach; ?>
    <tr><td colspan="6" class="gt" style="text-align:right;">GRAND TOTAL</td><td class="r gt"><?= number_format($yrT, 2) ?></td></tr>
    <?php else: ?><tr><td colspan="7" class="empty">No resource requirements data for this year.</td></tr><?php endif; ?>
</table>
<?php endforeach; ?>

<div class="section-heading" style="page-break-before:always;">SUMMARY OF INVESTMENTS</div>

<div class="subsection-heading">GENERAL SUMMARY</div>
<table class="dt">
    <tr><th style="width:30%;">CATEGORY</th><th>YEAR #1</th><th>YEAR #2</th><th>YEAR #3</th><th>TOTAL</th></tr>
    <?php if (!empty($rGen)): $gT = 0; foreach ($rGen as $row): $gt = (float)($row['total'] ?? 0); $gT += $gt; ?>
    <tr><td class="b"><?= ve($row['strategic_category'] ?? '') ?></td><td class="r"><?= number_format((float)($row['year1'] ?? 0), 2) ?></td><td class="r"><?= number_format((float)($row['year2'] ?? 0), 2) ?></td><td class="r"><?= number_format((float)($row['year3'] ?? 0), 2) ?></td><td class="r"><?= number_format($gt, 2) ?></td></tr>
    <?php endforeach; ?><tr><td class="gt">GRAND TOTAL</td><td class="r gt"></td><td class="r gt"></td><td class="r gt"></td><td class="r gt"><?= number_format($gT, 2) ?></td></tr>
    <?php else: ?><tr><td colspan="5" class="empty">No summary data available.</td></tr><?php endif; ?>
</table>

<div class="subsection-heading">FUND SOURCE</div>
<table class="dt">
    <tr><th style="width:30%;">FUND SOURCE</th><th>YEAR #1</th><th>YEAR #2</th><th>YEAR #3</th><th>TOTAL</th></tr>
    <?php if (!empty($rFund)): foreach ($rFund as $row): ?>
    <tr><td class="b"><?= ve($row['fund_source'] ?? '') ?></td><td class="r"><?= number_format((float)($row['year1'] ?? 0), 2) ?></td><td class="r"><?= number_format((float)($row['year2'] ?? 0), 2) ?></td><td class="r"><?= number_format((float)($row['year3'] ?? 0), 2) ?></td><td class="r"><?= number_format((float)($row['total'] ?? 0), 2) ?></td></tr>
    <?php endforeach; else: ?><tr><td colspan="5" class="empty">No fund source data available.</td></tr><?php endif; ?>
</table>

<div class="subsection-heading">STATEMENT OF EXPENDITURE</div>
<table class="dt">
    <tr><th style="width:30%;">EXPENDITURE CLASS</th><th>YEAR #1</th><th>YEAR #2</th><th>YEAR #3</th><th>TOTAL</th></tr>
    <?php if (!empty($rSOE)): foreach ($rSOE as $row): ?>
    <tr><td class="b"><?= ve($row['expenditure_type'] ?? '') ?></td><td class="r"><?= number_format((float)($row['year1'] ?? 0), 2) ?></td><td class="r"><?= number_format((float)($row['year2'] ?? 0), 2) ?></td><td class="r"><?= number_format((float)($row['year3'] ?? 0), 2) ?></td><td class="r"><?= number_format((float)($row['total'] ?? 0), 2) ?></td></tr>
    <?php endforeach; else: ?><tr><td colspan="5" class="empty">No expenditure data available.</td></tr><?php endif; ?>
</table>

<div class="subsection-heading">OBJECT OF EXPENDITURE</div>
<table class="dt">
    <tr><th style="width:15%;">OBJECT CODE</th><th style="width:25%;">DESCRIPTION</th><th>YEAR #1</th><th>YEAR #2</th><th>YEAR #3</th><th>TOTAL</th></tr>
    <?php if (!empty($rOOE)): foreach ($rOOE as $row): ?>
    <tr><td><?= ve($row['uacs_code'] ?? '') ?></td><td class="b"><?= ve($row['object_of_expenditure'] ?? '') ?></td><td class="r"><?= number_format((float)($row['year1'] ?? 0), 2) ?></td><td class="r"><?= number_format((float)($row['year2'] ?? 0), 2) ?></td><td class="r"><?= number_format((float)($row['year3'] ?? 0), 2) ?></td><td class="r"><?= number_format((float)($row['total'] ?? 0), 2) ?></td></tr>
    <?php endforeach; else: ?><tr><td colspan="6" class="empty">No object of expenditure data available.</td></tr><?php endif; ?>
</table>


<?php if (!$batchMode): ?>
</body>
</html>
<?php endif; ?>
