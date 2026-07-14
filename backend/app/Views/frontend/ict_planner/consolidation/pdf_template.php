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
$crossFlds = ['cross_project_title','cross_description','cross_objectives','cross_total_cost','cross_funding_source','cross_lead_agency','cross_implementing_agency','cross_start_date','cross_end_date','cross_implementing_unit','cross_year1_deliverables','cross_year2_deliverables','cross_year3_deliverables'];
$hasCross = false; foreach ($crossFlds as $f) { if (!isEmpty($proj[$f] ?? '')) { $hasCross = true; break; } }
$hasPm = false; $pmProjects = ['internal_projects' => 'INTERNAL ICT PROJECTS', 'cross_projects' => 'CROSS-AGENCY ICT PROJECTS'];
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
@page { margin: 15mm 12mm 15mm 12mm; size: A4 landscape; }
* { box-sizing: border-box; }
body { font-family: 'Palatino Linotype', 'Palatino', 'Book Antiqua', serif; font-size: 9pt; color: #000; line-height: 1.2; margin: 0; padding: 0; }

.cover-page { text-align: center; padding-top: 15mm; page-break-after: always; }
.cover-title { font-size: 20pt; font-weight: bold; text-decoration: underline; margin-bottom: 4mm; }
.cover-sub { font-size: 12pt; margin-bottom: 3mm; }
.cover-agency { font-size: 14pt; font-weight: bold; margin-bottom: 3mm; }
.cover-block { text-align: left; margin-top: 10mm; margin-bottom: 8mm; font-size: 9pt; }
.cover-block-label { font-weight: bold; margin-bottom: 1mm; }
.cover-block-sign { padding-bottom: 6mm; border-bottom: 1px solid #333; margin-bottom: 4mm; margin-left: 2mm; }
.cover-scope { text-align: left; margin-top: 2mm; font-size: 8.5pt; line-height: 1.6; margin-left: 4mm; }
.cover-scope-title { font-weight: bold; margin-bottom: 1mm; }

.toc-page { page-break-after: always; padding-top: 10mm; }
.toc-title { font-size: 16pt; font-weight: bold; text-align: center; margin-bottom: 8mm; }
.toc-part { font-weight: bold; font-size: 9.5pt; margin-top: 5mm; margin-bottom: 1mm; }
.toc-sub { font-size: 9pt; margin-bottom: 1mm; margin-left: 4mm; }
.toc-item { font-size: 8.5pt; margin-bottom: 0.8mm; margin-left: 8mm; }

.part-heading { font-size: 16pt; font-weight: bold; text-decoration: underline; margin-top: 6mm; margin-bottom: 4mm; }
.part-heading:first-of-type { page-break-before: always; }
.section-heading { font-size: 12pt; font-weight: bold; text-decoration: underline; margin-top: 5mm; margin-bottom: 3mm; }
.subsection-heading { font-size: 11pt; font-weight: bold; text-decoration: underline; margin-top: 4mm; margin-bottom: 2mm; }
.body-text { font-size: 9pt; margin-bottom: 2mm; }
.field-label { font-size: 9pt; font-weight: bold; }

table.dt { width: 100%; border-collapse: collapse; font-size: 8.5pt; margin: 2mm 0; page-break-inside: avoid; }
table.dt th { border: 1px solid #000; padding: 1.5mm 2mm; font-weight: bold; text-align: center; background: #d9d9d9; vertical-align: middle; }
table.dt td { border: 1px solid #000; padding: 1.5mm 2mm; vertical-align: top; }
table.dt td.c { text-align: center; } table.dt td.b { font-weight: bold; }
table.dt td.r { text-align: right; } table.dt td.gt { font-weight: bold; border-top: 2px solid #000; }
table.dt td.ch { font-weight: bold; }
table.dt td.nb { border: none; background: none; }
table.dt tr.group-header td { background: #d9d9d9; font-weight: bold; text-align: center; }
.empty { color: #888; font-size: 8pt; text-align: center; padding: 2mm; }
.footer { text-align: center; font-size: 7pt; color: #888; margin-top: 8mm; border-top: 1px solid #ccc; padding-top: 2mm; }
</style>
<?php if (!$batchMode): ?>
</head>
<body>
<?php endif; ?>

<!-- ==================== COVER PAGE ==================== -->
<div class="cover-page">
    <p style="font-size:9pt;color:#666;margin-bottom:12mm;">(Replace with agency's logo)</p>
    <div class="cover-title">INFORMATION SYSTEMS STRATEGIC PLAN (ISSP)</div>
    <div class="cover-sub">REGULAR ISSP &nbsp; AMENDMENT &lt; 1st/2nd/3rd &gt;</div>
    <div class="cover-sub">For the period <?= ve($startYear) ?> to <?= ve($endYear) ?></div>
    <div class="cover-agency"><?= ve($department) ?></div>
    <p style="font-size:9pt;margin-bottom:8mm;">&nbsp;</p>

    <div class="cover-block">
        <div class="cover-block-label">PREPARED BY:</div>
        <div class="cover-block-sign">Name &amp; Signature of Chief Information Officer</div>
    </div>

    <div class="cover-block">
        <div class="cover-scope-title">Scope</div>
        <div class="cover-scope">
            [ ] Department-Wide<br>
            [ ] Department - Central Office / Head Office<br>
            &nbsp;&nbsp;&nbsp;&nbsp;[ ] Central Office only<br>
            &nbsp;&nbsp;&nbsp;&nbsp;[ ] With Regional Offices / Field Offices<br>
            &nbsp;&nbsp;&nbsp;&nbsp;[ ] With Bureaus<br>
            [ ] Agency-Wide<br>
            &nbsp;&nbsp;&nbsp;&nbsp;[ ] Central Office only<br>
            &nbsp;&nbsp;&nbsp;&nbsp;[ ] With Regional Offices / Field Offices<br>
            [ ] Other Government Entity<br>
            [ ] LGU
        </div>
    </div>

    <div class="cover-block">
        <div class="cover-block-label">APPROVED BY:</div>
        <div class="cover-block-sign">Name &amp; Signature of Agency Head</div>
    </div>

    <p style="margin-top:15mm;font-size:8pt;color:#999;">
        This document was generated from the ISSP Management System on <?= ve(date('F d, Y')) ?>.
    </p>
</div>

<!-- ==================== TABLE OF CONTENTS ==================== -->
<div class="toc-page">
    <div class="toc-title">Table of Contents</div>

    <div class="toc-part">PART I. AGENCY PROFILE &amp; STRATEGIC CONTEXT</div>
    <div class="toc-sub">A. Mandate, Vision, Mission, and Organizational Outcome</div>
    <div class="toc-item">A.1. Mandate</div>
    <div class="toc-item">A.2. Vision Statement</div>
    <div class="toc-item">A.3. Mission Statement</div>
    <div class="toc-item">A.4. Organizational Outcome</div>
    <div class="toc-sub">B. Organizational Structure</div>
    <div class="toc-item">B.1. Chief Information Officer (CIO)</div>
    <div class="toc-item">B.2. Human Capital</div>
    <div class="toc-sub">C. Stakeholder Analysis</div>

    <div class="toc-part">PART II. CURRENT ICT ASSESSMENT</div>
    <div class="toc-sub">A. Strategic Concerns for ICT Use</div>
    <div class="toc-sub">B. Existing Network Infrastructure</div>
    <div class="toc-item">B1. LAN/WAN Set-up Including Connectivity Type and Bandwidth</div>
    <div class="toc-item">B2. Cybersecurity Control Checklist</div>
    <div class="toc-sub">C. Existing/Operational Information Systems (IS) Inventory</div>
    <div class="toc-sub">D. E-Government Programs (EGP) Checklist</div>

    <div class="toc-part">PART III. PROPOSED ICT STRATEGY</div>
    <div class="toc-sub">A. Proposed Network Infrastructure</div>
    <div class="toc-item">A.1. LAN/WAN Set-up Including Connectivity Type and Bandwidth</div>
    <div class="toc-item">A.2. Cybersecurity Control Checklist</div>
    <div class="toc-sub">B. Enterprise Architecture</div>
    <div class="toc-sub">C. Proposed ICT Human Capital</div>
    <div class="toc-sub">D. Proposed Information Systems</div>
    <div class="toc-sub">E. ICT Projects</div>
    <div class="toc-item">Internal ICT Projects</div>
    <div class="toc-item">Cross-Agency ICT Projects</div>
    <div class="toc-sub">F. Performance Measurement Framework</div>
    <div class="toc-item">Internal ICT Projects</div>
    <div class="toc-item">Cross-Agency ICT Projects</div>

    <div class="toc-part">PART IV. RESOURCE REQUIREMENTS</div>
    <div class="toc-sub">Detailed Resource Deployment and Cost Breakdown</div>
    <div class="toc-item">Year #1</div>
    <div class="toc-item">Year #2</div>
    <div class="toc-item">Year #3</div>
    <div class="toc-sub">Summary of Investments</div>
    <div class="toc-item">General Summary</div>
    <div class="toc-item">Fund Source</div>
    <div class="toc-item">Statement of Expenditure</div>
    <div class="toc-item">Object of Expenditure</div>
</div>

<!-- ==================== PART I ==================== -->
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
<table class="dt">
    <tr><td style="width:25%;font-weight:bold;background:#d9d9d9;">Name of CIO:</td><td><?= !isEmpty($agencyData['cio_name'] ?? '') ? v($agencyData['cio_name']) : '<span class="empty">[To be completed]</span>' ?></td></tr>
    <tr><td style="font-weight:bold;background:#d9d9d9;">Plantilla Position:</td><td><?= !isEmpty($agencyData['cio_plantilla'] ?? '') ? v($agencyData['cio_plantilla']) : '<span class="empty">[To be completed]</span>' ?></td></tr>
    <tr><td style="font-weight:bold;background:#d9d9d9;">Organizational Unit:</td><td><?= !isEmpty($agencyData['cio_unit'] ?? '') ? v($agencyData['cio_unit']) : '<span class="empty">[To be completed]</span>' ?></td></tr>
    <tr><td style="font-weight:bold;background:#d9d9d9;">E-mail Address:</td><td><?= !isEmpty($agencyData['cio_email'] ?? '') ? v($agencyData['cio_email']) : '<span class="empty">[To be completed]</span>' ?></td></tr>
    <tr><td style="font-weight:bold;background:#d9d9d9;">Contact Number/s:</td><td><?= !isEmpty($agencyData['cio_contact'] ?? '') ? v($agencyData['cio_contact']) : '<span class="empty">[To be completed]</span>' ?></td></tr>
</table>

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
<table class="dt">
    <tr><th>OO/SO/MFO</th><th>Critical Management, Operating, or Business System</th><th>Problem</th><th>Intended Use of ICT</th></tr>
    <tr><td colspan="4" class="empty">[To be completed by agency]</td></tr>
</table>

<div class="section-heading">B. EXISTING NETWORK INFRASTRUCTURE</div>
<div class="subsection-heading">B1. LAN/WAN SET-UP INCLUDING CONNECTIVITY TYPE AND BANDWIDTH</div>
<?php
$existingLanF = ['dept_connectivity_type','dept_ipv6_ready','dept_upload_speed','dept_download_speed','dept_description','dept_network_diagram'];
$existingRegF = ['regional_connectivity_type','regional_ipv6_ready','regional_upload_speed','regional_download_speed','regional_offices_details','regional_network_diagram'];
$hasExistingLan = false; $hasExistingReg = false;
foreach ($existingLanF as $f) { if (!isEmpty($ni[$f] ?? '')) { $hasExistingLan = true; break; } }
foreach ($existingRegF as $f) { if (!isEmpty($ni[$f] ?? '')) { $hasExistingReg = true; break; } }
?>
<table class="dt">
    <tr><th style="width:35%;">Item</th><th>Details</th></tr>
<?php if ($hasExistingLan): ?>
    <tr><td colspan="2" class="group-header">Department / Central Office</td></tr>
<?php foreach ($existingLanF as $f): $vl = v($ni[$f] ?? ''); if ($vl === '') continue; if (strpos($vl, 'data:') === 0 || strpos($vl, 'uploads/') === 0) $vl = '[File uploaded]'; ?>
    <tr><td class="b"><?= ve(fl('network-infrastructure-form', $f)) ?></td><td><?= $vl ?></td></tr>
<?php endforeach; ?>
<?php endif; ?>
<?php if ($hasExistingReg): ?>
    <tr><td colspan="2" class="group-header">Regional / Branch Offices</td></tr>
<?php foreach ($existingRegF as $f): $vl = v($ni[$f] ?? ''); if ($vl === '') continue; if (strpos($vl, 'data:') === 0 || strpos($vl, 'uploads/') === 0) $vl = '[File uploaded]'; ?>
    <tr><td class="b"><?= ve(fl('network-infrastructure-form', $f)) ?></td><td><?= $vl ?></td></tr>
<?php endforeach; ?>
<?php endif; ?>
<?php if (!$hasExistingLan && !$hasExistingReg): ?>
    <tr><td colspan="2" class="empty">[To be completed by agency]</td></tr>
<?php endif; ?>
</table>

<div class="subsection-heading">B2. CYBERSECURITY CONTROL CHECKLIST</div>
<table class="dt">
    <tr><th style="width:22%;"></th><th style="width:39%;">MANDATORY</th><th style="width:39%;">OPTIONAL</th></tr>
    <?php foreach ($cybersecurityCategories as $catName => $catItems): ?>
    <tr>
        <td class="ch"><?= ve($catName) ?></td>
        <td><?php foreach ($catItems as $cfn => $citem): ?><?php if ($citem['badge'] !== 'Optional'): ?><div><?= (isset($ni[$cfn]) && v($ni[$cfn]) === '1') ? '&#9745;' : '&#9744;' ?> <?= ve($citem['label']) ?></div><?php endif; ?><?php endforeach; ?></td>
        <td><?php foreach ($catItems as $cfn => $citem): ?><?php if ($citem['badge'] === 'Optional'): ?><div><?= (isset($ni[$cfn]) && v($ni[$cfn]) === '1') ? '&#9745;' : '&#9744;' ?> <?= ve($citem['label']) ?></div><?php endif; ?><?php endforeach; ?></td>
    </tr>
    <?php endforeach; ?>
</table>

<div class="section-heading">C. EXISTING/OPERATIONAL INFORMATION SYSTEMS (IS) INVENTORY</div>
<?php $isExistingGs = ['SYSTEM DETAILS' => ['is_name_1','status_1','classification_1','description_1'], 'DEPLOYMENT' => ['deployment_1','owner_1','dev_strategy_1','platform_1','database_1','storage_1'], 'USERS' => ['internal_users_1','external_users_1','system_usage_1','online_link_1'], 'SERVICE TYPE' => ['frontline_1','non_frontline_1','online_1','on_premise_1','hybrid_1'], 'INTEROPERABILITY' => ['interop1_main','interop1_internal_system','interop1_sub','interop1_external_system'], 'PRIVACY IMPACT ASSESSMENT' => ['pia_1']]; ?>
<table class="dt">
    <tr><th style="width:25%;">INFORMATION SYSTEM NAME</th><th>CLASSIFICATION</th><th>DESCRIPTION / PURPOSE</th><th>DEPLOYMENT</th><th>SYSTEM OWNER</th></tr>
    <?php if ($hasIs): ?>
    <tr><td><?= v($is['is_name_1'] ?? '') ?></td><td><?= v($is['classification_1'] ?? '') ?></td><td><?= v($is['description_1'] ?? '') ?></td><td><?= v($is['deployment_1'] ?? '') ?></td><td><?= v($is['owner_1'] ?? '') ?></td></tr>
    <?php else: ?>
    <tr><td colspan="5" class="empty">[To be completed by agency]</td></tr>
    <?php endif; ?>
</table>

<div class="section-heading">D. E-GOVERNMENT PROGRAMS (EGP) CHECKLIST</div>
<table class="dt">
    <tr><th style="width:25%;">EGP Program</th><th>Status</th><th>Details</th></tr>
    <tr><td colspan="3" class="empty">[To be completed by agency]</td></tr>
</table>

<!-- ==================== PART III ==================== -->
<div class="part-heading">PART III. PROPOSED ICT STRATEGY</div>

<div class="section-heading">A. PROPOSED NETWORK INFRASTRUCTURE</div>
<div class="subsection-heading">A.1. LAN/WAN SET-UP INCLUDING CONNECTIVITY TYPE AND BANDWIDTH</div>
<table class="dt">
    <tr><th style="width:35%;">Item</th><th>Details</th></tr>
    <?php $lanF = ['dept_network_diagram','dept_connectivity_type','dept_ipv6_ready','dept_upload_speed','dept_download_speed','dept_description'];
    $regF = ['regional_network_diagram','regional_connectivity_type','regional_ipv6_ready','regional_upload_speed','regional_download_speed','regional_offices_details'];
    $hasLan = false; $hasReg = false; foreach ($lanF as $f) { if (!isEmpty($ni[$f] ?? '')) { $hasLan = true; break; } } foreach ($regF as $f) { if (!isEmpty($ni[$f] ?? '')) { $hasReg = true; break; } } ?>
    <?php if ($hasLan): ?><tr><td colspan="2" class="group-header">Department / Central Office</td></tr><?php foreach ($lanF as $f): $vl = v($ni[$f] ?? ''); if ($vl === '') continue; if (strpos($vl, 'data:') === 0 || strpos($vl, 'uploads/') === 0) $vl = '[File uploaded]'; ?><tr><td class="b"><?= ve(fl('network-infrastructure-form', $f)) ?></td><td><?= $vl ?></td></tr><?php endforeach; ?><?php endif; ?>
    <?php if ($hasReg): ?><tr><td colspan="2" class="group-header">Regional / Branch Offices</td></tr><?php foreach ($regF as $f): $vl = v($ni[$f] ?? ''); if ($vl === '') continue; if (strpos($vl, 'data:') === 0 || strpos($vl, 'uploads/') === 0) $vl = '[File uploaded]'; ?><tr><td class="b"><?= ve(fl('network-infrastructure-form', $f)) ?></td><td><?= $vl ?></td></tr><?php endforeach; ?><?php endif; ?>
    <?php if (!$hasLan && !$hasReg): ?><tr><td colspan="2" class="empty">No data provided.</td></tr><?php endif; ?>
</table>

<div class="subsection-heading">A.2. CYBERSECURITY CONTROL CHECKLIST</div>
<table class="dt">
    <tr><th style="width:22%;"></th><th style="width:39%;">MANDATORY</th><th style="width:39%;">OPTIONAL</th></tr>
    <?php foreach ($cybersecurityCategories as $catName => $catItems): ?>
    <tr>
        <td class="ch"><?= ve($catName) ?></td>
        <td><?php foreach ($catItems as $cfn => $citem): ?><?php if ($citem['badge'] !== 'Optional'): ?><div><?= (isset($ni[$cfn]) && v($ni[$cfn]) === '1') ? '&#9745;' : '&#9744;' ?> <?= ve($citem['label']) ?></div><?php endif; ?><?php endforeach; ?></td>
        <td><?php foreach ($catItems as $cfn => $citem): ?><?php if ($citem['badge'] === 'Optional'): ?><div><?= (isset($ni[$cfn]) && v($ni[$cfn]) === '1') ? '&#9745;' : '&#9744;' ?> <?= ve($citem['label']) ?></div><?php endif; ?><?php endforeach; ?></td>
    </tr>
    <?php endforeach; ?>
</table>

<div class="section-heading">B. ENTERPRISE ARCHITECTURE</div>
<table class="dt">
    <tr><th style="width:35%;">Item</th><th>Details</th></tr>
    <?php if ($hasEa): $eaD = v($ea['ea_diagram'] ?? ''); if ($eaD !== '' && strpos($eaD, 'data:') === 0) $eaD = '[Diagram uploaded]'; if ($eaD !== ''): ?><tr><td class="b">Enterprise Architecture Diagram</td><td><?= $eaD ?></td></tr><?php endif; $eaDesc = v($ea['ea_description'] ?? ''); if ($eaDesc !== ''): ?><tr><td class="b">Description</td><td><?= nl2br($eaDesc) ?></td></tr><?php endif; ?>
    <?php else: ?><tr><td colspan="2" class="empty">No data provided.</td></tr><?php endif; ?>
</table>

<div class="section-heading">C. PROPOSED ICT HUMAN CAPITAL</div>
<?php $hcRows = []; $hcGT = 0; for ($i = 1; $i <= 4; $i++) { $pos = v($hc['position_'.$i] ?? ''); $stat = v($hc['status_'.$i] ?? ''); $cnt = v($hc['count_'.$i] ?? ''); if ($pos !== '' || $stat !== '' || $cnt !== '') { $cn = is_numeric($cnt) ? (int)$cnt : 0; $hcGT += $cn; $hcRows[] = ['position' => $pos, 'status' => $stat, 'count' => $cnt]; } } ?>
<table class="dt">
    <tr><th style="width:40%;">IT POSITION</th><th style="width:35%;">EMPLOYMENT STATUS</th><th style="width:15%;">PHYSICAL COUNT</th></tr>
    <?php if (!empty($hcRows)): foreach ($hcRows as $r): ?><tr><td><?= $r['position'] !== '' ? $r['position'] : '<span class="empty">-</span>' ?></td><td><?= $r['status'] !== '' ? $r['status'] : '<span class="empty">-</span>' ?></td><td class="c"><?= $r['count'] !== '' ? $r['count'] : '-' ?></td></tr><?php endforeach; ?>
    <?php else: for ($i = 0; $i < 4; $i++): ?><tr><td class="empty">-</td><td class="empty">-</td><td class="c empty">-</td></tr><?php endfor; endif; ?>
    <tr><td class="gt" colspan="2" style="text-align:right;">Grand Total</td><td class="c gt"><?= $hcGT ?></td></tr>
</table>

<div class="section-heading">D. PROPOSED INFORMATION SYSTEMS</div>
<?php $isGs = ['SYSTEM DETAILS' => ['is_name_1','status_1','classification_1','description_1'], 'DEPLOYMENT' => ['deployment_1','owner_1','dev_strategy_1','platform_1','database_1','storage_1'], 'USERS' => ['internal_users_1','external_users_1','system_usage_1','online_link_1'], 'SERVICE TYPE' => ['frontline_1','non_frontline_1','online_1','on_premise_1','hybrid_1'], 'INTEROPERABILITY' => ['interop1_main','interop1_internal_system','interop1_sub','interop1_external_system'], 'PRIVACY IMPACT ASSESSMENT' => ['pia_1']]; ?>
<table class="dt">
    <tr><th style="width:35%;">Item</th><th>Details</th></tr>
    <?php if ($hasIs): foreach ($isGs as $gN => $gFs): $gH = false; foreach ($gFs as $f) { if (!isEmpty($is[$f] ?? '')) { $gH = true; break; } } if (!$gH) continue; ?>
    <tr><td colspan="2" class="group-header"><?= ve($gN) ?></td></tr>
    <?php foreach ($gFs as $f): $vl = v($is[$f] ?? ''); if ($vl === '') continue; ?><tr><td class="b"><?= ve(fl('information-systems-form', $f)) ?></td><td><?= $vl ?></td></tr><?php endforeach; ?>
    <?php endforeach; else: ?><tr><td colspan="2" class="empty">No data provided.</td></tr><?php endif; ?>
</table>

<div class="section-heading">E. ICT PROJECTS</div>
<div class="subsection-heading">INTERNAL ICT PROJECTS</div>
<?php $intSg = ['PROJECT DETAILS' => ['internal_project_title','internal_description','internal_objectives'], 'STRATEGIC ALIGNMENT' => ['internal_strategic_pip','internal_strategic_ncp','internal_strategic_egov','internal_strategic_pcb','internal_strategic_others','internal_strategic_others_text'], 'HARMONIZATION' => ['internal_harmonization_1','internal_harmonization_2','internal_harmonization_3','internal_harmonization_4','internal_harmonization_5'], 'DURATION' => ['internal_start_date','internal_end_date'], 'DELIVERABLES' => ['internal_year1_deliverables','internal_year2_deliverables','internal_year3_deliverables'], 'IMPLEMENTATION' => ['internal_implementing_unit','internal_total_cost','internal_funding_source']]; ?>
<?php $crossSg = ['PROJECT DETAILS' => ['cross_project_title','cross_description','cross_objectives','cross_lead_agency','cross_implementing_agency'], 'STRATEGIC ALIGNMENT' => ['cross_strategic_pip','cross_strategic_ncp','cross_strategic_egov','cross_strategic_pcb','cross_strategic_others','cross_strategic_others_text'], 'HARMONIZATION' => ['cross_harmonization_1','cross_harmonization_2','cross_harmonization_3','cross_harmonization_4','cross_harmonization_5'], 'DURATION' => ['cross_start_date','cross_end_date'], 'DELIVERABLES' => ['cross_year1_deliverables','cross_year2_deliverables','cross_year3_deliverables'], 'IMPLEMENTATION' => ['cross_implementing_unit','cross_total_cost','cross_funding_source']]; ?>
<?php if ($hasInt): ?><table class="dt"><tr><th style="width:35%;">Item</th><th>Details</th></tr>
<?php foreach ($intSg as $sgN => $sgFs): $sH = false; foreach ($sgFs as $f) { if (!isEmpty($proj[$f] ?? '')) { $sH = true; break; } } if (!$sH) continue; ?>
<tr><td colspan="2" class="group-header"><?= ve($sgN) ?></td></tr>
<?php foreach ($sgFs as $f): $vl = v($proj[$f] ?? ''); if ($vl === '') continue; ?><tr><td class="b"><?= ve(fl('ict-projects-form', $f)) ?></td><td><?= $vl ?></td></tr><?php endforeach; endforeach; ?>
</table><?php else: ?><table class="dt"><tr><td class="empty">No internal ICT project data provided.</td></tr></table><?php endif; ?>

<div class="subsection-heading">CROSS-AGENCY ICT PROJECTS</div>
<?php if ($hasCross): ?><table class="dt"><tr><th style="width:35%;">Item</th><th>Details</th></tr>
<?php foreach ($crossSg as $sgN => $sgFs): $sH = false; foreach ($sgFs as $f) { if (!isEmpty($proj[$f] ?? '')) { $sH = true; break; } } if (!$sH) continue; ?>
<tr><td colspan="2" class="group-header"><?= ve($sgN) ?></td></tr>
<?php foreach ($sgFs as $f): $vl = v($proj[$f] ?? ''); if ($vl === '') continue; ?><tr><td class="b"><?= ve(fl('ict-projects-form', $f)) ?></td><td><?= $vl ?></td></tr><?php endforeach; endforeach; ?>
</table><?php else: ?><table class="dt"><tr><td class="empty">No cross-agency ICT project data provided.</td></tr></table><?php endif; ?>

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

<div class="footer">Generated from the ISSP Management System &mdash; <?= ve(date('F d, Y \a\t h:i A')) ?></div>

<?php if (!$batchMode): ?>
</body>
</html>
<?php endif; ?>
