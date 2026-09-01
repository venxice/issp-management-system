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
        'vulnerability_assessment' => ['label' => 'Vulnerability Assessment', 'badge' => 'Not Specified', 'field' => 'vulnerability_assessment'],
        'patch_management' => ['label' => 'Patch Management', 'badge' => 'Not Specified', 'field' => 'patch_management'],
        'strong_password' => ['label' => 'Strong Password Policies', 'badge' => 'Not Specified', 'field' => 'strong_password'],
        'mfa' => ['label' => 'Multi-Factor Authentication (MFA)', 'badge' => 'Not Specified', 'field' => 'mfa'],
        'access_reviews' => ['label' => 'Access Reviews', 'badge' => 'Not Specified', 'field' => 'access_reviews'],
        'security_logs' => ['label' => 'Security Logs', 'badge' => 'Not Specified', 'field' => 'security_logs'],
        'log_analysis' => ['label' => 'Log Analysis', 'badge' => 'Not Specified', 'field' => 'log_analysis'],
        'incident_response' => ['label' => 'Incident Response Plan', 'badge' => 'Not Specified', 'field' => 'incident_response'],
        'siem' => ['label' => 'Security Information and Event Management (SIEM)', 'badge' => 'Not Specified', 'field' => 'siem'],
        'penetration_testing' => ['label' => 'Penetration Testing', 'badge' => 'Not Specified', 'field' => 'penetration_testing'],
        'sdlc' => ['label' => 'Secure Software Development Life Cycle (SDLC)', 'badge' => 'Not Specified', 'field' => 'sdlc'],
    ],
];

$cyberFieldList = [];
foreach ($cybersecurityCategories as $cat) { foreach ($cat as $fn => $item) { if (is_array($item)) $cyberFieldList[] = $fn; } }

if (!function_exists('scanMarker')) { function scanMarker($name) { return '<!-- marker: ' . htmlspecialchars($name) . ' -->'; } }
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
$pageNumbers = $pageNumbers ?? [];

$ni = $formData['network-infrastructure-form'] ?? [];
$ea = $formData['enterprise-architecture-form'] ?? [];
$hc = $formData['ict-human-capital-form'] ?? [];
$is = $formData['information-systems-form'] ?? [];
$proj = $formData['ict-projects-form'] ?? [];
$pm = $formData['performance-measurement-form'] ?? [];
$rY1 = $formData['year1-requirements-form'] ?? [];
$rY2 = $formData['year2-requirements-form'] ?? [];
$rY3 = $formData['year3-requirements-form'] ?? [];
$summaryData = $formData['summary-of-investments-form'] ?? [];
$batchMode = $batchMode ?? false;
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
.toc-row { font-size: 11pt; margin-bottom: 1mm; display: flex; align-items: baseline; width: 100%; }
.toc-row-part { font-weight: bold; margin-top: 5mm; }
.toc-label-toc { flex: 1; padding-right: 2mm; white-space: nowrap; }
.toc-row-sub .toc-label-toc { padding-left: 4mm; }
.toc-row-item .toc-label-toc { padding-left: 8mm; }
.toc-dots { flex: 1; border-bottom: 1px dotted #999; margin: 0 1mm; min-width: 5mm; }
.toc-page-num { display: inline-block; min-width: 10mm; text-align: right; font-weight: bold; }

.part-heading { font-size: 16pt; font-weight: bold; margin-top: 6mm; margin-bottom: 4mm; page-break-before: always; }
.section-heading { font-size: 14pt; font-weight: bold; margin-top: 5mm; margin-bottom: 3mm; page-break-after: avoid; }
.subsection-heading { font-size: 12pt; font-weight: bold; margin-top: 4mm; margin-bottom: 2mm; margin-left: 8mm; page-break-after: avoid; }
.body-text { font-size: 11pt; margin-bottom: 2mm; margin-left: 16mm; }
.field-label { font-size: 11pt; font-weight: bold; }

table.dt { width: 100%; border-collapse: collapse; font-size: 11pt; margin: 2mm 0; }
table.dt th { border: 1px solid #000; padding: 1.5mm 2mm; font-weight: bold; text-align: center; background: #d9d9d9; vertical-align: middle; white-space: nowrap; }
table.dt td { border: 1px solid #000; padding: 1.5mm 2mm; vertical-align: top; word-wrap: break-word; overflow-wrap: break-word; }
table.dt td.c { text-align: center; } table.dt td.b { font-weight: bold; } table.dt-d td:first-child { text-transform: uppercase; }
table.dt td.r { text-align: right; } table.dt td.gt { font-weight: bold; border-top: 2px solid #000; }
table.dt td.gt:first-child { background: #d9d9d9; }
table.dt td.ch { font-weight: bold; }
table.dt td.nb { border: none; background: none; }
table.dt.kpi { table-layout: fixed; }
table.dt.kpi th { white-space: normal; font-size: 10pt; }
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
        <span class="cover-type-label"><span class="cover-type-check">[<?= v($issp_type ?? '') === 'regular' ? '/' : ' ' ?>]</span> REGULAR ISSP</span>
        <span class="cover-type-label"><span class="cover-type-check">[<?= v($issp_type ?? '') === 'amendment' ? '/' : ' ' ?>]</span> AMENDMENT <small>&lt; 1st / 2nd / 3rd &gt;</small></span>
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

    <div class="toc-row toc-row-sub" style="font-weight:bold;"><span class="toc-label-toc">Definition of Terms</span><span class="toc-dots"></span><span class="toc-page-num"><?= $pageNumbers['definition_of_terms'] ?? '' ?></span></div>

    <div class="toc-row toc-row-part"><span class="toc-label-toc">PART I. AGENCY PROFILE &amp; STRATEGIC CONTEXT</span><span class="toc-dots"></span><span class="toc-page-num"><?= $pageNumbers['part1'] ?? '' ?></span></div>
    <div class="toc-row toc-row-sub"><span class="toc-label-toc">A. Mandate, Vision, Mission, and Organizational Outcome</span><span class="toc-dots"></span><span class="toc-page-num"><?= $pageNumbers['part1_a'] ?? '' ?></span></div>
    <div class="toc-row toc-row-item"><span class="toc-label-toc">A.1. Mandate</span><span class="toc-dots"></span><span class="toc-page-num"><?= $pageNumbers['part1_a1'] ?? '' ?></span></div>
    <div class="toc-row toc-row-item"><span class="toc-label-toc">A.2. Vision Statement</span><span class="toc-dots"></span><span class="toc-page-num"><?= $pageNumbers['part1_a2'] ?? '' ?></span></div>
    <div class="toc-row toc-row-item"><span class="toc-label-toc">A.3. Mission Statement</span><span class="toc-dots"></span><span class="toc-page-num"><?= $pageNumbers['part1_a3'] ?? '' ?></span></div>
    <div class="toc-row toc-row-item"><span class="toc-label-toc">A.4. Organizational Outcome</span><span class="toc-dots"></span><span class="toc-page-num"><?= $pageNumbers['part1_a4'] ?? '' ?></span></div>
    <div class="toc-row toc-row-sub"><span class="toc-label-toc">B. Organizational Structure</span><span class="toc-dots"></span><span class="toc-page-num"><?= $pageNumbers['part1_b'] ?? '' ?></span></div>
    <div class="toc-row toc-row-item"><span class="toc-label-toc">B.1. Chief Information Officer (CIO)</span><span class="toc-dots"></span><span class="toc-page-num"><?= $pageNumbers['part1_b1'] ?? '' ?></span></div>
    <div class="toc-row toc-row-item"><span class="toc-label-toc">B.2. Human Capital</span><span class="toc-dots"></span><span class="toc-page-num"><?= $pageNumbers['part1_b2'] ?? '' ?></span></div>
    <div class="toc-row toc-row-sub"><span class="toc-label-toc">C. Stakeholder Analysis</span><span class="toc-dots"></span><span class="toc-page-num"><?= $pageNumbers['part1_c'] ?? '' ?></span></div>

    <div class="toc-row toc-row-part"><span class="toc-label-toc">PART II. CURRENT ICT ASSESSMENT</span><span class="toc-dots"></span><span class="toc-page-num"><?= $pageNumbers['part2'] ?? '' ?></span></div>
    <div class="toc-row toc-row-sub"><span class="toc-label-toc">A. Strategic Concerns for ICT Use</span><span class="toc-dots"></span><span class="toc-page-num"><?= $pageNumbers['part2_a'] ?? '' ?></span></div>
    <div class="toc-row toc-row-sub"><span class="toc-label-toc">B. Existing Network Infrastructure</span><span class="toc-dots"></span><span class="toc-page-num"><?= $pageNumbers['part2_b'] ?? '' ?></span></div>
    <div class="toc-row toc-row-item"><span class="toc-label-toc">B1. LAN/WAN Set-up Including Connectivity Type and Bandwidth</span><span class="toc-dots"></span><span class="toc-page-num"><?= $pageNumbers['part2_b1'] ?? '' ?></span></div>
    <div class="toc-row toc-row-item"><span class="toc-label-toc">B2. Cybersecurity Control Checklist</span><span class="toc-dots"></span><span class="toc-page-num"><?= $pageNumbers['part2_b2'] ?? '' ?></span></div>
    <div class="toc-row toc-row-sub"><span class="toc-label-toc">C. Existing/Operational Information Systems (IS) Inventory</span><span class="toc-dots"></span><span class="toc-page-num"><?= $pageNumbers['part2_c'] ?? '' ?></span></div>
    <div class="toc-row toc-row-sub"><span class="toc-label-toc">D. E-Government Programs (EGP) Checklist</span><span class="toc-dots"></span><span class="toc-page-num"><?= $pageNumbers['part2_d'] ?? '' ?></span></div>

    <div class="toc-row toc-row-part"><span class="toc-label-toc">PART III. PROPOSED ICT STRATEGY</span><span class="toc-dots"></span><span class="toc-page-num"><?= $pageNumbers['part3'] ?? '' ?></span></div>
    <div class="toc-row toc-row-sub"><span class="toc-label-toc">A. Proposed Network Infrastructure</span><span class="toc-dots"></span><span class="toc-page-num"><?= $pageNumbers['part3_a'] ?? '' ?></span></div>
    <div class="toc-row toc-row-item"><span class="toc-label-toc">A.1. LAN/WAN Set-up Including Connectivity Type and Bandwidth</span><span class="toc-dots"></span><span class="toc-page-num"><?= $pageNumbers['part3_a1'] ?? '' ?></span></div>
    <div class="toc-row toc-row-item"><span class="toc-label-toc">A.2. Cybersecurity Control Checklist</span><span class="toc-dots"></span><span class="toc-page-num"><?= $pageNumbers['part3_a2'] ?? '' ?></span></div>
    <div class="toc-row toc-row-sub"><span class="toc-label-toc">B. Enterprise Architecture</span><span class="toc-dots"></span><span class="toc-page-num"><?= $pageNumbers['part3_b'] ?? '' ?></span></div>
    <div class="toc-row toc-row-sub"><span class="toc-label-toc">C. Proposed ICT Human Capital</span><span class="toc-dots"></span><span class="toc-page-num"><?= $pageNumbers['part3_c'] ?? '' ?></span></div>
    <div class="toc-row toc-row-sub"><span class="toc-label-toc">D. Proposed Information Systems</span><span class="toc-dots"></span><span class="toc-page-num"><?= $pageNumbers['part3_d'] ?? '' ?></span></div>
    <div class="toc-row toc-row-sub"><span class="toc-label-toc">E. ICT Projects</span><span class="toc-dots"></span><span class="toc-page-num"><?= $pageNumbers['part3_e'] ?? '' ?></span></div>
    <div class="toc-row toc-row-sub"><span class="toc-label-toc">F. Performance Measurement Framework</span><span class="toc-dots"></span><span class="toc-page-num"><?= $pageNumbers['part3_f'] ?? '' ?></span></div>

    <div class="toc-row toc-row-part"><span class="toc-label-toc">PART IV. RESOURCE REQUIREMENTS</span><span class="toc-dots"></span><span class="toc-page-num"><?= $pageNumbers['part4'] ?? '' ?></span></div>
    <div class="toc-row toc-row-sub"><span class="toc-label-toc">A. Detailed Resource Deployment and Cost Breakdown</span><span class="toc-dots"></span><span class="toc-page-num"><?= $pageNumbers['part4_a'] ?? '' ?></span></div>
    <div class="toc-row toc-row-item"><span class="toc-label-toc">A.1. Year #1</span><span class="toc-dots"></span><span class="toc-page-num"><?= $pageNumbers['part4_a1'] ?? '' ?></span></div>
    <div class="toc-row toc-row-item"><span class="toc-label-toc">A.2. Year #2</span><span class="toc-dots"></span><span class="toc-page-num"><?= $pageNumbers['part4_a2'] ?? '' ?></span></div>
    <div class="toc-row toc-row-item"><span class="toc-label-toc">A.3. Year #3</span><span class="toc-dots"></span><span class="toc-page-num"><?= $pageNumbers['part4_a3'] ?? '' ?></span></div>
    <div class="toc-row toc-row-sub"><span class="toc-label-toc">B. Summary of Investments</span><span class="toc-dots"></span><span class="toc-page-num"><?= $pageNumbers['part4_b'] ?? '' ?></span></div>
    <div class="toc-row toc-row-item"><span class="toc-label-toc">B.1. General Summary</span><span class="toc-dots"></span><span class="toc-page-num"><?= $pageNumbers['part4_b1'] ?? '' ?></span></div>
    <div class="toc-row toc-row-item"><span class="toc-label-toc">B.2. Fund Source</span><span class="toc-dots"></span><span class="toc-page-num"><?= $pageNumbers['part4_b2'] ?? '' ?></span></div>
    <div class="toc-row toc-row-item"><span class="toc-label-toc">B.3. Statement of Expenditure</span><span class="toc-dots"></span><span class="toc-page-num"><?= $pageNumbers['part4_b3'] ?? '' ?></span></div>
    <div class="toc-row toc-row-item"><span class="toc-label-toc">B.4. Object of Expenditure</span><span class="toc-dots"></span><span class="toc-page-num"><?= $pageNumbers['part4_b4'] ?? '' ?></span></div>
</div>

<!-- ==================== DEFINITION OF TERMS ==================== -->
<?= scanMarker('definition_of_terms') ?>
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
<?= scanMarker('part1') ?>
<div class="part-heading">PART I. AGENCY PROFILE &amp; STRATEGIC CONTEXT</div>
<?= scanMarker('part1_a') ?>
<div class="section-heading">A. MANDATE, VISION, MISSION, AND ORGANIZATIONAL OUTCOME</div>
<?= scanMarker('part1_a1') ?>
<div class="subsection-heading">A.1. MANDATE</div>
<div class="body-text"><span class="field-label">Legal Basis:</span> <?= !isEmpty($agencyData['legal_basis'] ?? '') ? nl2br(v($agencyData['legal_basis'])) : '<span class="empty">[To be completed by agency]</span>' ?></div>
<div class="body-text"><span class="field-label">Function:</span> <?= !isEmpty($agencyData['function'] ?? '') ? nl2br(v($agencyData['function'])) : '<span class="empty">[To be completed by agency]</span>' ?></div>
<?= scanMarker('part1_a2') ?>
<div class="subsection-heading">A.2. VISION STATEMENT</div>
<div class="body-text"><?= !isEmpty($agencyData['vision_statement'] ?? '') ? nl2br(v($agencyData['vision_statement'])) : '<span class="empty">[To be completed by agency]</span>' ?></div>
<?= scanMarker('part1_a3') ?>
<div class="subsection-heading">A.3. MISSION STATEMENT</div>
<div class="body-text"><?= !isEmpty($agencyData['mission_statement'] ?? '') ? nl2br(v($agencyData['mission_statement'])) : '<span class="empty">[To be completed by agency]</span>' ?></div>
<?= scanMarker('part1_a4') ?>
<div class="subsection-heading">A.4. ORGANIZATIONAL OUTCOME</div>
<div class="body-text"><?= !isEmpty($agencyData['organizational_outcome'] ?? '') ? nl2br(v($agencyData['organizational_outcome'])) : '<span class="empty">[To be completed by agency]</span>' ?></div>

<?= scanMarker('part1_b') ?>
<div class="section-heading">B. ORGANIZATIONAL STRUCTURE</div>
<?= scanMarker('part1_b1') ?>
<div class="subsection-heading">B.1. CHIEF INFORMATION OFFICER (CIO)</div>
<div class="body-text"><span class="field-label">Name of CIO:</span> <?= !isEmpty($agencyData['cio_name'] ?? '') ? v($agencyData['cio_name']) : '<span class="empty">[To be completed]</span>' ?></div>
<div class="body-text"><span class="field-label">Plantilla Position:</span> <?= !isEmpty($agencyData['cio_plantilla'] ?? '') ? v($agencyData['cio_plantilla']) : '<span class="empty">[To be completed]</span>' ?></div>
<div class="body-text"><span class="field-label">Organizational Unit:</span> <?= !isEmpty($agencyData['cio_unit'] ?? '') ? v($agencyData['cio_unit']) : '<span class="empty">[To be completed]</span>' ?></div>
<div class="body-text"><span class="field-label">E-mail Address:</span> <?= !isEmpty($agencyData['cio_email'] ?? '') ? v($agencyData['cio_email']) : '<span class="empty">[To be completed]</span>' ?></div>
<div class="body-text"><span class="field-label">Contact Number/s:</span> <?= !isEmpty($agencyData['cio_contact'] ?? '') ? v($agencyData['cio_contact']) : '<span class="empty">[To be completed]</span>' ?></div>

<?= scanMarker('part1_b2') ?>
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
    <thead>
        <tr>
            <th>Employment Type</th>
            <th>IT Personnel</th>
            <th>Non-IT Personnel</th>
            <th>Male</th>
            <th>Female</th>
            <th>Total</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>Plantilla</td>
            <td class="c"><?= $hcPlantilla['it'] ?></td>
            <td class="c"><?= $hcPlantilla['non_it'] ?></td>
            <td class="c"><?= $hcPlantilla['male'] ?></td>
            <td class="c"><?= $hcPlantilla['female'] ?></td>
            <td class="c b"><?= array_sum($hcPlantilla) ?></td>
        </tr>
        <tr>
            <td>Contractual / COS</td>
            <td class="c"><?= $hcContractual['it'] ?></td>
            <td class="c"><?= $hcContractual['non_it'] ?></td>
            <td class="c"><?= $hcContractual['male'] ?></td>
            <td class="c"><?= $hcContractual['female'] ?></td>
            <td class="c b"><?= array_sum($hcContractual) ?></td>
        </tr>
        <tr>
            <td>Outsourced</td>
            <td class="c"><?= $hcOutsourced['it'] ?></td>
            <td class="c"><?= $hcOutsourced['non_it'] ?></td>
            <td class="c"><?= $hcOutsourced['male'] ?></td>
            <td class="c"><?= $hcOutsourced['female'] ?></td>
            <td class="c b"><?= array_sum($hcOutsourced) ?></td>
        </tr>
        <tr>
            <td class="gt">TOTAL</td>
            <td class="gt c"><?= $hcGrandIt ?></td>
            <td class="gt c"><?= $hcGrandNonIt ?></td>
            <td class="gt c"><?= $hcGrandMale ?></td>
            <td class="gt c"><?= $hcGrandFemale ?></td>
            <td class="gt c"><?= $hcGrandIt + $hcGrandNonIt + $hcGrandMale + $hcGrandFemale ?></td>
        </tr>
    </tbody>
</table>

<?= scanMarker('part1_c') ?>
<div class="subsection-heading">C. STAKEHOLDER ANALYSIS</div>
<div class="body-text"><?= !isEmpty($agencyData['stakeholder_analysis'] ?? '') ? nl2br(v($agencyData['stakeholder_analysis'])) : '<span class="empty">[To be completed]</span>' ?></div>

<!-- ==================== PART II ==================== -->
<?= scanMarker('part2') ?>
<div class="part-heading">PART II. CURRENT ICT ASSESSMENT</div>
<?= scanMarker('part2_a') ?>
<div class="section-heading">A. STRATEGIC CONCERNS FOR ICT USE</div>
<div class="body-text"><?= !isEmpty($agencyData['strategic_concerns'] ?? '') ? nl2br(v($agencyData['strategic_concerns'])) : '<span class="empty">[To be completed]</span>' ?></div>

<?= scanMarker('part2_b') ?>
<div class="section-heading">B. EXISTING NETWORK INFRASTRUCTURE</div>
<?= scanMarker('part2_b1') ?>
<div class="subsection-heading">B1. LAN/WAN SET-UP INCLUDING CONNECTIVITY TYPE AND BANDWIDTH</div>
<div class="body-text"><?= !isEmpty($ni['dept_description'] ?? '') ? nl2br(v($ni['dept_description'])) : '<span class="empty">[No current setup details provided]</span>' ?></div>

<?= scanMarker('part2_b2') ?>
<div class="subsection-heading">B2. CYBERSECURITY CONTROL CHECKLIST</div>
<div class="body-text">Evaluation of current cybersecurity controls and posture.</div>

<?= scanMarker('part2_c') ?>
<div class="section-heading">C. EXISTING/OPERATIONAL INFORMATION SYSTEMS (IS) INVENTORY</div>
<div class="body-text"><?= !isEmpty($is['is_name_1'] ?? '') ? v($is['is_name_1']) : '<span class="empty">[No current systems listed]</span>' ?></div>

<?= scanMarker('part2_d') ?>
<div class="section-heading">D. E-GOVERNMENT PROGRAMS (EGP) CHECKLIST</div>
<div class="body-text">Alignment with national e-government initiatives.</div>

<!-- ==================== PART III ==================== -->
<?= scanMarker('part3') ?>
<div class="part-heading">PART III. PROPOSED ICT STRATEGY</div>
<?= scanMarker('part3_a') ?>
<div class="section-heading">A. PROPOSED NETWORK INFRASTRUCTURE</div>
<?= scanMarker('part3_a1') ?>
<div class="subsection-heading">A.1. LAN/WAN SET-UP INCLUDING CONNECTIVITY TYPE AND BANDWIDTH</div>
<div class="body-text">Upload Speed: <?= v($ni['dept_upload_speed'] ?? 'N/A') ?> | Download Speed: <?= v($ni['dept_download_speed'] ?? 'N/A') ?></div>

<?= scanMarker('part3_a2') ?>
<div class="subsection-heading">A.2. CYBERSECURITY CONTROL CHECKLIST</div>
<div class="body-text">Proposed upgrades for perimeter, endpoint, and data security.</div>

<?= scanMarker('part3_b') ?>
<div class="section-heading">B. ENTERPRISE ARCHITECTURE</div>
<div class="body-text"><?= !isEmpty($ea['ea_description'] ?? '') ? nl2br(v($ea['ea_description'])) : '<span class="empty">[No description provided]</span>' ?></div>

<?= scanMarker('part3_c') ?>
<div class="section-heading">C. PROPOSED ICT HUMAN CAPITAL</div>
<div class="body-text">Planned positions and capacity development programs.</div>

<?= scanMarker('part3_d') ?>
<div class="section-heading">D. PROPOSED INFORMATION SYSTEMS</div>
<div class="body-text">Target systems to be developed or upgraded.</div>

<?= scanMarker('part3_e') ?>
<div class="section-heading">E. ICT PROJECTS</div>
<div class="body-text">Title: <?= v($proj['internal_project_title'] ?? 'N/A') ?></div>

<?= scanMarker('part3_f') ?>
<div class="section-heading">F. PERFORMANCE MEASUREMENT FRAMEWORK</div>
<div class="body-text">Key Performance Indicators (KPIs) and operational metrics.</div>

<!-- ==================== PART IV ==================== -->
<?= scanMarker('part4') ?>
<div class="part-heading">PART IV. RESOURCE REQUIREMENTS</div>
<?= scanMarker('part4_a') ?>
<div class="section-heading">A. DETAILED RESOURCE DEPLOYMENT AND COST BREAKDOWN</div>
<?= scanMarker('part4_a1') ?>
<div class="subsection-heading">A.1. YEAR #1</div>
<div class="body-text">Requirements for Year 1 (<?= ve($startYear) ?>).</div>
<?= scanMarker('part4_a2') ?>
<div class="subsection-heading">A.2. YEAR #2</div>
<div class="body-text">Requirements for Year 2 (<?= ve((int)$startYear + 1) ?>).</div>
<?= scanMarker('part4_a3') ?>
<div class="subsection-heading">A.3. YEAR #3</div>
<div class="body-text">Requirements for Year 3 (<?= ve((int)$startYear + 2) ?>).</div>

<?= scanMarker('part4_b') ?>
<div class="section-heading">B. SUMMARY OF INVESTMENTS</div>
<?= scanMarker('part4_b1') ?>
<div class="subsection-heading">B.1. GENERAL SUMMARY</div>
<?= scanMarker('part4_b2') ?>
<div class="subsection-heading">B.2. FUND SOURCE</div>
<?= scanMarker('part4_b3') ?>
<div class="subsection-heading">B.3. STATEMENT OF EXPENDITURE</div>
<?= scanMarker('part4_b4') ?>
<div class="subsection-heading">B.4. OBJECT OF EXPENDITURE</div>

<div class="footer">
    Generated automatically on <?= date('Y-m-d H:i:s') ?> | Information Systems Strategic Plan (ISSP)
</div>

<?php if (!$batchMode): ?>
</body>
</html>
<?php endif; ?>