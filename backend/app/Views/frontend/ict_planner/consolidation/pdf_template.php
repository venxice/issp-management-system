<?php
/**
 * ISSP CONSOLIDATION PDF TEMPLATE
 *
 * Data sources:
 * - $project
 * - $formData
 * - $resourceData
 * - $agencyData
 *
 * Resource Requirements MUST come from $resourceData/database.
 */

$fieldLabels = [
    'network-infrastructure-form' => [
        'dept_network_diagram' => 'Upload network architecture diagram showing connectivity among attached agencies',
        'dept_connectivity_type' => 'Connectivity Type',
        'dept_ipv6_ready' => 'IPv6 Ready',
        'dept_upload_speed' => 'Upload Speed',
        'dept_download_speed' => 'Download Speed',
        'dept_description' => 'Description',
        'regional_network_diagram' => 'Upload network architecture diagram showing connectivity to branches/regional offices',
        'regional_connectivity_type' => 'Connectivity Type (Regional)',
        'regional_ipv6_ready' => 'IPv6 Ready (Regional)',
        'regional_upload_speed' => 'Upload Speed (Regional)',
        'regional_download_speed' => 'Download Speed (Regional)',
        'regional_offices_details' => 'Branch/Regional Offices Details',
    ],

    'enterprise-architecture-form' => [
        'ea_diagram' => 'Enterprise Architecture Diagram',
        'ea_description' => 'Description',
    ],

    'ict-human-capital-form' => [
        'position_1' => 'Position / Designation',
        'position_2' => 'Position / Designation',
        'position_3' => 'Position / Designation',
        'position_4' => 'Position / Designation',
        'status_1' => 'Employment Status',
        'status_2' => 'Employment Status',
        'status_3' => 'Employment Status',
        'status_4' => 'Employment Status',
        'count_1' => 'No. of Positions',
        'count_2' => 'No. of Positions',
        'count_3' => 'No. of Positions',
        'count_4' => 'No. of Positions',
    ],

    'information-systems-form' => [
        'is_name_1' => 'System Name',
        'status_1' => 'Status',
        'classification_1' => 'Classification',
        'description_1' => 'Description / Purpose',
        'deployment_1' => 'Deployment Approach',
        'owner_1' => 'System Owner',
        'dev_strategy_1' => 'Development Strategy',
        'platform_1' => 'Platform / Framework',
        'database_1' => 'Database Name',
        'storage_1' => 'Data Storage',
        'internal_users_1' => 'Internal Users',
        'external_users_1' => 'External Users',
        'system_usage_1' => 'System Usage Type',
        'online_link_1' => 'Provide Link (if Online)',
        'frontline_1' => 'Frontline Service',
        'non_frontline_1' => 'Non-Frontline Service',
        'online_1' => 'Online',
        'on_premise_1' => 'On-premise',
        'hybrid_1' => 'Hybrid',
        'interop1_main' => 'Interoperability',
        'interop1_internal_system' => 'Internal System Name',
        'interop1_sub' => 'Interoperability Sub-type',
        'interop1_external_system' => 'External System',
        'pia_1' => 'Privacy Impact Assessment (PIA)',
    ],

    'ict-projects-form' => [
        'internal_project_title' => 'Internal Project Title',
        'internal_description' => 'Description',
        'internal_objectives' => 'Objectives',
        'internal_strategic_pip' => 'Public Investment Program',
        'internal_strategic_ncp' => 'National Cybersecurity Plan',
        'internal_strategic_egov' => 'E-Government Master Plan',
        'internal_strategic_pcb' => 'Program Convergence Budgeting',
        'internal_strategic_others' => 'Others (Specify)',
        'internal_strategic_others_text' => 'Others - Please specify',
        'internal_harmonization_1' => 'National Prioritization',
        'internal_harmonization_2' => 'Resource Optimization',
        'internal_harmonization_3' => 'Interoperability Framework',
        'internal_harmonization_4' => 'Cross-Agency Collaboration',
        'internal_harmonization_5' => 'Scalability and Sustainability',
        'internal_start_date' => 'Start Date',
        'internal_end_date' => 'End Date',
        'internal_year1_deliverables' => 'Year 1 Deliverables',
        'internal_year2_deliverables' => 'Year 2 Deliverables',
        'internal_year3_deliverables' => 'Year 3 Deliverables',
        'internal_implementing_unit' => 'Implementing Unit',
        'internal_total_cost' => 'Total Cost',
        'internal_funding_source' => 'Funding Source',

        'cross_project_title' => 'Cross-Agency Project Title',
        'cross_description' => 'Description',
        'cross_objectives' => 'Objectives',
        'cross_lead_agency' => 'Lead Agency',
        'cross_implementing_agency' => 'Implementing Agency',
        'cross_strategic_pip' => 'Public Investment Program',
        'cross_strategic_ncp' => 'National Cybersecurity Plan',
        'cross_strategic_egov' => 'E-Government Master Plan',
        'cross_strategic_pcb' => 'Program Convergence Budgeting',
        'cross_strategic_others' => 'Others (Specify)',
        'cross_strategic_others_text' => 'Others - Please specify',
        'cross_harmonization_1' => 'National Prioritization',
        'cross_harmonization_2' => 'Resource Optimization',
        'cross_harmonization_3' => 'Interoperability Framework',
        'cross_harmonization_4' => 'Cross-Agency Collaboration',
        'cross_harmonization_5' => 'Scalability and Sustainability',
        'cross_start_date' => 'Start Date',
        'cross_end_date' => 'End Date',
        'cross_year1_deliverables' => 'Year 1 Deliverables',
        'cross_year2_deliverables' => 'Year 2 Deliverables',
        'cross_year3_deliverables' => 'Year 3 Deliverables',
        'cross_implementing_unit' => 'Implementing Unit',
        'cross_total_cost' => 'Total Cost',
        'cross_funding_source' => 'Funding Source',
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

/* =========================================================
 * HELPERS
 * ========================================================= */

if (!function_exists('scanMarker')) {
    function scanMarker($name)
    {
        return '<!-- marker: ' . htmlspecialchars((string)$name, ENT_QUOTES, 'UTF-8') . ' -->';
    }
}

if (!function_exists('fl')) {
    function fl($section, $field)
    {
        global $fieldLabels;

        return $fieldLabels[$section][$field]
            ?? ucwords(str_replace(['_', '-'], ' ', (string)$field));
    }
}

if (!function_exists('v')) {
    function v($value)
    {
        if ($value === null || $value === false) {
            return '';
        }

        if (is_array($value)) {
            if (empty($value)) {
                return '';
            }

            $parts = [];

            foreach ($value as $key => $item) {
                if (is_array($item)) {
                    $parts[] = json_encode(
                        $item,
                        JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES
                    );
                } else {
                    $parts[] = trim((string)$item);
                }
            }

            return htmlspecialchars(
                implode(', ', array_filter($parts, static function ($x) {
                    return $x !== '';
                })),
                ENT_QUOTES,
                'UTF-8'
            );
        }

        return htmlspecialchars(
            trim((string)$value),
            ENT_QUOTES,
            'UTF-8'
        );
    }
}

if (!function_exists('ve')) {
    function ve($value)
    {
        if (is_array($value)) {
            $value = json_encode(
                $value,
                JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES
            );
        }

        return htmlspecialchars(
            trim((string)$value),
            ENT_QUOTES,
            'UTF-8'
        );
    }
}

if (!function_exists('isEmpty')) {
    function isEmpty($value)
    {
        if ($value === null || $value === false || $value === '') {
            return true;
        }

        if (is_array($value)) {
            return empty($value);
        }

        return trim((string)$value) === '';
    }
}

if (!function_exists('displayValue')) {
    function displayValue($value)
    {
        if (is_array($value)) {
            return v($value);
        }

        return v($value);
    }
}

if (!function_exists('decodeJsonArray')) {
    function decodeJsonArray($value)
    {
        if (is_array($value)) {
            return $value;
        }

        if (!is_string($value) || trim($value) === '') {
            return [];
        }

        $decoded = json_decode($value, true);

        return (
            json_last_error() === JSON_ERROR_NONE &&
            is_array($decoded)
        ) ? $decoded : [];
    }
}

if (!function_exists('renderSimpleField')) {
    function renderSimpleField($label, $value)
    {
        if (isEmpty($value)) {
            return;
        }

        echo '<div class="body-text">';
        echo '<span class="field-label">' . v($label) . ':</span> ';
        echo nl2br(displayValue($value));
        echo '</div>';
    }
}

if (!function_exists('renderFieldTable')) {
    function renderFieldTable($sectionName, $data, $skip = [])
    {
        if (!is_array($data) || empty($data)) {
            echo '<div class="body-text"><span class="empty">[No data provided]</span></div>';
            return;
        }

        $rows = [];

        foreach ($data as $key => $value) {
            if (in_array($key, $skip, true)) {
                continue;
            }

            if (isEmpty($value)) {
                continue;
            }

            $rows[] = [
                'label' => fl($sectionName, $key),
                'value' => $value,
            ];
        }

        if (empty($rows)) {
            echo '<div class="body-text"><span class="empty">[No data provided]</span></div>';
            return;
        }

        echo '<table class="dt field-table">';
        echo '<thead><tr><th style="width:32%;">Field</th><th>Details</th></tr></thead>';
        echo '<tbody>';

        foreach ($rows as $row) {
            echo '<tr>';
            echo '<td class="b">' . v($row['label']) . '</td>';
            echo '<td>' . nl2br(displayValue($row['value'])) . '</td>';
            echo '</tr>';
        }

        echo '</tbody>';
        echo '</table>';
    }
}

if (!function_exists('renderNetworkTable')) {
    function renderNetworkTable($data)
    {
        $hasData = false;

        foreach ($data as $value) {
            if (!isEmpty($value)) {
                $hasData = true;
                break;
            }
        }

        if (!$hasData) {
            echo '<div class="body-text"><span class="empty">[No network infrastructure data provided]</span></div>';
            return;
        }

        echo '<table class="dt">';
        echo '<thead>';
        echo '<tr>';
        echo '<th style="width:34%;">Network Information</th>';
        echo '<th>Current / Proposed Details</th>';
        echo '</tr>';
        echo '</thead>';
        echo '<tbody>';

        $fields = [
            'dept_connectivity_type' => 'Department / Central Office Connectivity Type',
            'dept_ipv6_ready' => 'Department / Central Office IPv6 Ready',
            'dept_upload_speed' => 'Department / Central Office Upload Speed',
            'dept_download_speed' => 'Department / Central Office Download Speed',
            'dept_description' => 'Department / Central Office Description',
            'regional_connectivity_type' => 'Regional Connectivity Type',
            'regional_ipv6_ready' => 'Regional IPv6 Ready',
            'regional_upload_speed' => 'Regional Upload Speed',
            'regional_download_speed' => 'Regional Download Speed',
            'regional_offices_details' => 'Branch / Regional Offices Details',
        ];

        foreach ($fields as $key => $label) {
            if (isEmpty($data[$key] ?? '')) {
                continue;
            }

            echo '<tr>';
            echo '<td class="b">' . v($label) . '</td>';
            echo '<td>' . nl2br(v($data[$key])) . '</td>';
            echo '</tr>';
        }

        echo '</tbody>';
        echo '</table>';

        foreach ([
            'dept_network_diagram' => 'Department / Central Office Network Diagram',
            'regional_network_diagram' => 'Regional / Branch Network Diagram',
        ] as $key => $label) {
            if (!isEmpty($data[$key] ?? '')) {
                echo '<div class="body-text">';
                echo '<span class="field-label">' . v($label) . ':</span> ';
                echo v($data[$key]);
                echo '</div>';
            }
        }
    }
}

if (!function_exists('renderCybersecurityTable')) {
    function renderCybersecurityTable($data, $cybersecurityCategories)
    {
        $data = is_array($data) ? $data : [];

        echo '<table class="dt cyber-table">';
        echo '<thead>';
        echo '<tr>';
        echo '<th style="width:25%;">Category</th>';
        echo '<th style="width:45%;">Security Control</th>';
        echo '<th style="width:15%;">Requirement</th>';
        echo '<th style="width:15%;">Status / Response</th>';
        echo '</tr>';
        echo '</thead>';
        echo '<tbody>';

        $hasRows = false;


        foreach ($cybersecurityCategories as $category => $controls) {
            foreach ($controls as $field => $definition) {
                $value = $data[$field] ?? '';

                if (is_array($value)) {
                    $value = implode(', ', $value);
                }

                if (isEmpty($value)) {
                    $value = 'Not indicated';
                }

                $hasRows = true;

                echo '<tr>';
                echo '<td class="b">' . v($category) . '</td>';
                echo '<td>' . v($definition['label'] ?? $field) . '</td>';
                echo '<td class="c">' . v($definition['badge'] ?? '') . '</td>';
                echo '<td class="c">' . v($value) . '</td>';
                echo '</tr>';
            }
        }

        echo '</tbody>';
        echo '</table>';

        if (!$hasRows) {
            echo '<div class="body-text"><span class="empty">[No cybersecurity checklist data]</span></div>';
        }
    }
}

if (!function_exists('renderInformationSystems')) {
    function renderInformationSystems($data)
    {
        if (!is_array($data) || empty($data)) {
            echo '<div class="body-text"><span class="empty">[No information systems listed]</span></div>';
            return;
        }

        $systems = [];

        /*
         * Normal dynamic structure:
         * is_name_1, status_1, ...
         * is_name_2, status_2, ...
         */
        foreach ($data as $key => $value) {
            if (preg_match('/_(\d+)$/', (string)$key, $matches)) {
                $index = (int)$matches[1];

                if (!isset($systems[$index])) {
                    $systems[$index] = [];
                }

                $systems[$index][$key] = $value;
            }
        }

        ksort($systems);

        /*
         * Fallback if the submitted structure is already an array
         * of systems.
         */
        if (empty($systems)) {
            $possibleLists = [
                $data['systems'] ?? null,
                $data['information_systems'] ?? null,
                $data['items'] ?? null,
            ];

            foreach ($possibleLists as $list) {
                if (is_array($list) && !empty($list)) {
                    $systems = $list;
                    break;
                }
            }
        }

        if (empty($systems)) {
            echo '<div class="body-text"><span class="empty">[No information systems listed]</span></div>';
            return;
        }

        foreach ($systems as $index => $system) {
            if (!is_array($system)) {
                continue;
            }

            echo '<div class="subsection-heading">';
            echo 'Information System #' . v($index);
            echo '</div>';

            $clean = [];

            foreach ($system as $key => $value) {
                $cleanKey = preg_replace('/_\d+$/', '', (string)$key);

                if (isEmpty($value)) {
                    continue;
                }

                $clean[$cleanKey] = $value;
            }

            if (empty($clean)) {
                echo '<div class="body-text"><span class="empty">[No details provided]</span></div>';
                continue;
            }

            echo '<table class="dt">';
            echo '<thead><tr>';
            echo '<th style="width:32%;">Field</th>';
            echo '<th>Details</th>';
            echo '</tr></thead>';
            echo '<tbody>';

            foreach ($clean as $key => $value) {
                echo '<tr>';
                echo '<td class="b">' . v(fl('information-systems-form', $key)) . '</td>';
                echo '<td>' . nl2br(displayValue($value)) . '</td>';
                echo '</tr>';
            }

            echo '</tbody>';
            echo '</table>';
        }
    }
}

if (!function_exists('renderHumanCapital')) {
    function renderHumanCapital($data)
    {
        if (!is_array($data) || empty($data)) {
            echo '<div class="body-text"><span class="empty">[No ICT human capital data provided]</span></div>';
            return;
        }

        $rows = [];

        foreach ($data as $key => $value) {
            if (!preg_match('/_(\d+)$/', (string)$key, $matches)) {
                continue;
            }

            $index = (int)$matches[1];

            if (!isset($rows[$index])) {
                $rows[$index] = [];
            }

            $rows[$index][$key] = $value;
        }

        ksort($rows);

        if (empty($rows)) {
            renderFieldTable('ict-human-capital-form', $data);
            return;
        }

        echo '<table class="dt">';
        echo '<thead><tr>';
        echo '<th>Position / Designation</th>';
        echo '<th>Employment Status</th>';
        echo '<th>No. of Positions</th>';
        echo '</tr></thead>';
        echo '<tbody>';

        foreach ($rows as $row) {
            $position = '';
            $status = '';
            $count = '';

            foreach ($row as $key => $value) {
                if (strpos($key, 'position_') === 0) {
                    $position = $value;
                } elseif (strpos($key, 'status_') === 0) {
                    $status = $value;
                } elseif (strpos($key, 'count_') === 0) {
                    $count = $value;
                }
            }

            if (
                isEmpty($position) &&
                isEmpty($status) &&
                isEmpty($count)
            ) {
                continue;
            }

            echo '<tr>';
            echo '<td>' . v($position) . '</td>';
            echo '<td>' . v($status) . '</td>';
            echo '<td class="c">' . v($count) . '</td>';
            echo '</tr>';
        }

        echo '</tbody>';
        echo '</table>';
    }
}

if (!function_exists('renderProjects')) {
    function renderProjects($data)
    {
        if (!is_array($data) || empty($data)) {
            echo '<div class="body-text"><span class="empty">[No ICT project data provided]</span></div>';
            return;
        }

        $projectGroups = [
            'INTERNAL ICT PROJECT' => [],
            'CROSS-AGENCY ICT PROJECT' => [],
        ];

        foreach ($data as $key => $value) {
            if (is_array($value)) {
                if (
                    strpos((string)$key, 'internal') === 0 ||
                    strpos((string)$key, 'project') !== false
                ) {
                    $projectGroups['INTERNAL ICT PROJECT'][$key] = $value;
                }

                if (strpos((string)$key, 'cross') === 0) {
                    $projectGroups['CROSS-AGENCY ICT PROJECT'][$key] = $value;
                }
            }
        }

        echo '<table class="dt">';
        echo '<thead><tr>';
        echo '<th style="width:32%;">Field</th>';
        echo '<th>Details</th>';
        echo '</tr></thead>';
        echo '<tbody>';

        foreach ($data as $key => $value) {
            if (isEmpty($value)) {
                continue;
            }

            if (is_array($value)) {
                foreach ($value as $subKey => $subValue) {
                    if (isEmpty($subValue)) {
                        continue;
                    }

                    echo '<tr>';
                    echo '<td class="b">' . v(fl('ict-projects-form', $subKey)) . '</td>';
                    echo '<td>' . nl2br(displayValue($subValue)) . '</td>';
                    echo '</tr>';
                }

                continue;
            }

            echo '<tr>';
            echo '<td class="b">' . v(fl('ict-projects-form', $key)) . '</td>';
            echo '<td>' . nl2br(v($value)) . '</td>';
            echo '</tr>';
        }

        echo '</tbody>';
        echo '</table>';
    }
}

if (!function_exists('renderResourceTable')) {
    function renderResourceTable($rows, $yearLabel)
    {
        echo '<div class="subsection-heading">' . v($yearLabel) . '</div>';

        if (empty($rows)) {
            echo '<div class="body-text">';
            echo '<span class="empty">No resource requirements recorded.</span>';
            echo '</div>';
            return;
        }

        $yearTotal = 0;

        foreach ($rows as $row) {
            $yearTotal += (float)($row['total_cost'] ?? 0);
        }

        echo '<table class="dt resource-table">';
        echo '<thead>';
        echo '<tr>';
        echo '<th>Strategic Category</th>';
        echo '<th>Expenditure Type</th>';
        echo '<th>Item</th>';
        echo '<th>Office</th>';
        echo '<th>Fund Source</th>';
        echo '<th>Unit Cost</th>';
        echo '<th>Physical Target</th>';
        echo '<th>Total Cost</th>';
        echo '<th>UACS Code</th>';
        echo '<th>Object of Expenditure</th>';
        echo '</tr>';
        echo '</thead>';
        echo '<tbody>';

        foreach ($rows as $row) {
            echo '<tr>';

            echo '<td>' . v($row['strategic_category'] ?? '') . '</td>';
            echo '<td>' . v($row['expenditure_type'] ?? '') . '</td>';
            echo '<td>' . v($row['item'] ?? '') . '</td>';
            echo '<td>' . v($row['office'] ?? '') . '</td>';
            echo '<td>' . v($row['fund_source'] ?? '') . '</td>';

            echo '<td class="r">';
            echo '₱' . number_format((float)($row['unit_cost'] ?? 0), 2);
            echo '</td>';

            echo '<td class="c">';
            echo v($row['physical_target'] ?? '');
            echo '</td>';

            echo '<td class="r">';
            echo '₱' . number_format((float)($row['total_cost'] ?? 0), 2);
            echo '</td>';

            echo '<td>' . v($row['uacs_code'] ?? '') . '</td>';
            echo '<td>' . v($row['object_of_expenditure'] ?? '') . '</td>';

            echo '</tr>';

            if (!isEmpty($row['remarks'] ?? '')) {
                echo '<tr>';
                echo '<td colspan="10">';
                echo '<strong>Remarks:</strong> ' . nl2br(v($row['remarks']));
                echo '</td>';
                echo '</tr>';
            }
        }

        echo '<tr>';
        echo '<td colspan="7" class="gt"><strong>TOTAL ' . v(strtoupper($yearLabel)) . '</strong></td>';
        echo '<td class="gt r"><strong>₱' . number_format($yearTotal, 2) . '</strong></td>';
        echo '<td colspan="2" class="gt"></td>';
        echo '</tr>';

        echo '</tbody>';
        echo '</table>';
    }
}

if (!function_exists('renderSummaryTable')) {
    function renderSummaryTable($rows, $title, $firstLabel)
    {
        echo '<div class="subsection-heading">' . v($title) . '</div>';

        if (empty($rows)) {
            echo '<div class="body-text">';
            echo '<span class="empty">No summary data available.</span>';
            echo '</div>';
            return;
        }

        echo '<table class="dt">';
        echo '<thead>';
        echo '<tr>';
        echo '<th>' . v($firstLabel) . '</th>';
        echo '<th>Year 1</th>';
        echo '<th>Year 2</th>';
        echo '<th>Year 3</th>';
        echo '<th>Total</th>';
        echo '</tr>';
        echo '</thead>';
        echo '<tbody>';

        $grand1 = 0;
        $grand2 = 0;
        $grand3 = 0;
        $grandTotal = 0;

        foreach ($rows as $row) {
            $y1 = (float)($row['year1'] ?? 0);
            $y2 = (float)($row['year2'] ?? 0);
            $y3 = (float)($row['year3'] ?? 0);
            $total = (float)($row['total'] ?? ($y1 + $y2 + $y3));

            $grand1 += $y1;
            $grand2 += $y2;
            $grand3 += $y3;
            $grandTotal += $total;

            $label = $row[$firstLabel] ?? null;

            if ($label === null) {
                if ($firstLabel === 'fund_source') {
                    $label = $row['fund_source'] ?? '';
                } elseif ($firstLabel === 'expenditure_type') {
                    $label = $row['expenditure_type'] ?? '';
                } elseif ($firstLabel === 'uacs_code') {
                    $label = ($row['uacs_code'] ?? '') .
                        (!empty($row['object_of_expenditure'])
                            ? ' - ' . $row['object_of_expenditure']
                            : '');
                } else {
                    $label = $row['strategic_category'] ?? '';
                }
            }

            echo '<tr>';
            echo '<td>' . v($label) . '</td>';
            echo '<td class="r">₱' . number_format($y1, 2) . '</td>';
            echo '<td class="r">₱' . number_format($y2, 2) . '</td>';
            echo '<td class="r">₱' . number_format($y3, 2) . '</td>';
            echo '<td class="r">₱' . number_format($total, 2) . '</td>';
            echo '</tr>';
        }

        echo '<tr>';
        echo '<td class="gt"><strong>GRAND TOTAL</strong></td>';
        echo '<td class="gt r"><strong>₱' . number_format($grand1, 2) . '</strong></td>';
        echo '<td class="gt r"><strong>₱' . number_format($grand2, 2) . '</strong></td>';
        echo '<td class="gt r"><strong>₱' . number_format($grand3, 2) . '</strong></td>';
        echo '<td class="gt r"><strong>₱' . number_format($grandTotal, 2) . '</strong></td>';
        echo '</tr>';

        echo '</tbody>';
        echo '</table>';
    }
}

/* =========================================================
 * MAIN DATA
 * ========================================================= */

$title = $project['title'] ?? 'Untitled ISSP Submission';
$department = $project['department_name'] ?? 'N/A';
$submittedBy = $project['created_by_name'] ?? 'Unknown';
$status = $project['status'] ?? 'draft';
$submittedAt = $project['submitted_at']
    ?? $project['created_at']
    ?? '';

$timestamp = strtotime($submittedAt);

$startYear = $timestamp
    ? date('Y', $timestamp)
    : date('Y');

$endYear = (int)$startYear + 3;

$formData = is_array($formData ?? null)
    ? $formData
    : [];

$resourceData = is_array($resourceData ?? null)
    ? $resourceData
    : [];

$agencyData = is_array($agencyData ?? null)
    ? $agencyData
    : [];

$pageNumbers = is_array($pageNumbers ?? null)
    ? $pageNumbers
    : [];

$batchMode = $batchMode ?? false;

/*
 * Form sections
 */
$ni   = $formData['network-infrastructure-form'] ?? [];
$ea   = $formData['enterprise-architecture-form'] ?? [];
$hc   = $formData['ict-human-capital-form'] ?? [];
$is   = $formData['information-systems-form'] ?? [];
$proj = $formData['ict-projects-form'] ?? [];
$pm   = $formData['performance-measurement-form'] ?? [];

/*
 * Resource Requirements — DB ONLY
 */
$rY1 = $resourceData['year1'] ?? [];
$rY2 = $resourceData['year2'] ?? [];
$rY3 = $resourceData['year3'] ?? [];

$rGen  = $resourceData['generalSummary'] ?? [];
$rFund = $resourceData['fundSource'] ?? [];
$rSOE  = $resourceData['statementOfExpenditure'] ?? [];
$rOOE  = $resourceData['objectOfExpenditure'] ?? [];

$summaryData = $formData['summary-of-investments-form'] ?? [];

/*
 * Cybersecurity data can exist in network form
 * or in other saved sections.
 */
$cyberCurrent = [];

if (isset($ni['cybersecurity']) && is_array($ni['cybersecurity'])) {
    $cyberCurrent = $ni['cybersecurity'];
}

if (isset($formData['cybersecurity-form']) && is_array($formData['cybersecurity-form'])) {
    $cyberCurrent = array_merge(
        $cyberCurrent,
        $formData['cybersecurity-form']
    );
}

$cyberProposed = [];

if (isset($ni['proposed_cybersecurity']) && is_array($ni['proposed_cybersecurity'])) {
    $cyberProposed = $ni['proposed_cybersecurity'];
}

if (isset($formData['proposed-cybersecurity-form']) && is_array($formData['proposed-cybersecurity-form'])) {
    $cyberProposed = array_merge(
        $cyberProposed,
        $formData['proposed-cybersecurity-form']
    );
}

/*
 * E-Government Programs
 */
$egovPrograms = [];

if (!empty($agencyData['e_government_programs_data'])) {
    $decodedEgov = json_decode(
        $agencyData['e_government_programs_data'],
        true
    );

    if (is_array($decodedEgov)) {
        $programTitles = [
            1 => 'Government Digital Payment System (eGovPay)',
            2 => 'Government Public Key Infrastructure (PNPKI)',
            3 => 'Human Capital Management Information System',
        ];

        $programDescriptions = [
            1 => 'Government payment gateway for online and over-the-counter payments.',
            2 => 'Digital certificate infrastructure.',
            3 => 'Centralized HRIS.',
        ];

        foreach ($programTitles as $programId => $programTitle) {

            $egovPrograms[] = [
                'program' => $programTitle,
                'description' => $programDescriptions[$programId],

                'status' =>
                    $decodedEgov['program_' . $programId] ?? '',

                'equivalent_system' =>
                    !empty(
                        $decodedEgov[
                            'program_' . $programId . '_equivalent_system'
                        ] ?? false
                    ),

                'manual_processing' =>
                    !empty(
                        $decodedEgov[
                            'program_' . $programId . '_manual_processing'
                        ] ?? false
                    ),

                'proposed_development' =>
                    !empty(
                        $decodedEgov[
                            'program_' . $programId . '_proposed_development'
                        ] ?? false
                    ),
            ];
        }
    }
}

if (
    empty($egovPrograms) &&
    isset($formData['e-government-programs-form'])
) {
    $egovPrograms = is_array($formData['e-government-programs-form'])
        ? $formData['e-government-programs-form']
        : decodeJsonArray(
            $formData['e-government-programs-form']
        );
}

/*
 * Strategic Concerns
 */
$strategicConcerns = [];

if (!empty($agencyData['strategic_concerns_data'])) {
    $strategicConcerns = decodeJsonArray(
        $agencyData['strategic_concerns_data']
    );
}

if (empty($strategicConcerns) && isset($formData['strategic-concerns-form'])) {
    $strategicConcerns = is_array($formData['strategic-concerns-form'])
        ? $formData['strategic-concerns-form']
        : decodeJsonArray($formData['strategic-concerns-form']);
}
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">

<style>

@page {
    margin: 18mm 18mm 18mm 18mm;
    size: A4 landscape;
}

* {
    box-sizing: border-box;
}

body {
    font-family: "Palatino Linotype", "Palatino", "Book Antiqua", serif;
    font-size: 10pt;
    color: #000;
    line-height: 1.4;
    margin: 0;
    padding: 0;
}

.cover-page {
    text-align: center;
    padding-top: 10mm;
    page-break-after: always;
}

.cover-title {
    font-size: 22pt;
    font-weight: bold;
    margin-bottom: 4mm;
}

.cover-type {
    font-size: 11pt;
    margin-bottom: 3mm;
}

.cover-sub {
    font-size: 11pt;
    margin-bottom: 3mm;
}

.cover-agency {
    font-size: 12pt;
    font-weight: bold;
    margin-bottom: 10mm;
}

.cover-two-col {
    display: table;
    width: 100%;
    margin-top: 5mm;
}

.cover-two-col-left,
.cover-two-col-right {
    display: table-cell;
    width: 50%;
    vertical-align: top;
    text-align: left;
}

.cover-two-col-left {
    padding-left: 15mm;
}

.cover-two-col-right {
    padding-left: 20mm;
}

.cover-block {
    margin-bottom: 10mm;
}

.cover-block-label {
    font-weight: bold;
    margin-bottom: 4mm;
}

.cover-block-sign {
    width: 70%;
    border-top: 1px solid #333;
    padding-top: 2mm;
    text-align: center;
}

.toc-page {
    page-break-after: always;
}

.toc-title {
    font-size: 18pt;
    font-weight: bold;
    margin-bottom: 7mm;
}

.toc-row {
    display: table;
    width: 100%;
    margin-bottom: 1.5mm;
}

.toc-label-toc,
.toc-dots,
.toc-page-num {
    display: table-cell;
    vertical-align: bottom;
}

.toc-label-toc {
    width: auto;
}

.toc-dots {
    width: 35%;
    border-bottom: 1px dotted #999;
}

.toc-page-num {
    width: 10mm;
    text-align: right;
}

.toc-row-part {
    font-weight: bold;
    margin-top: 4mm;
}

.toc-row-sub .toc-label-toc {
    padding-left: 4mm;
}

.toc-row-item .toc-label-toc {
    padding-left: 8mm;
}

.part-heading {
    font-size: 17pt;
    font-weight: bold;
    margin-top: 5mm;
    margin-bottom: 5mm;
    page-break-before: always;
}

.section-heading {
    font-size: 14pt;
    font-weight: bold;
    margin-top: 5mm;
    margin-bottom: 3mm;
    page-break-after: avoid;
}

.subsection-heading {
    font-size: 11.5pt;
    font-weight: bold;
    margin-top: 4mm;
    margin-bottom: 2mm;
    page-break-after: avoid;
}

.body-text {
    font-size: 10pt;
    margin-bottom: 2mm;
}

.field-label {
    font-weight: bold;
}

.empty {
    color: #777;
    font-style: italic;
}

table.dt {
    width: 100%;
    border-collapse: collapse;
    font-size: 9pt;
    margin: 2mm 0 4mm 0;
    page-break-inside: auto;
}

table.dt th {
    border: 1px solid #000;
    padding: 2mm;
    background: #d9d9d9;
    font-weight: bold;
    text-align: center;
    vertical-align: middle;
}

table.dt td {
    border: 1px solid #000;
    padding: 1.7mm;
    vertical-align: top;
    word-wrap: break-word;
    overflow-wrap: break-word;
}

table.dt tr {
    page-break-inside: avoid;
}

table.dt td.c {
    text-align: center;
}

table.dt td.r {
    text-align: right;
}

table.dt td.b {
    font-weight: bold;
}

table.dt td.gt {
    font-weight: bold;
    border-top: 2px solid #000;
}

.resource-table {
    font-size: 7.5pt !important;
}

.resource-table th,
.resource-table td {
    padding: 1.2mm !important;
}

.cyber-table {
    font-size: 8.5pt !important;
}

.field-table {
    font-size: 9pt;
}

.footer {
    text-align: center;
    font-size: 8pt;
    color: #777;
    margin-top: 6mm;
    border-top: 1px solid #ccc;
    padding-top: 2mm;
}

.page-break {
    page-break-before: always;
}

.no-break {
    page-break-inside: avoid;
}

</style>

<?php if (!$batchMode): ?>
</head>
<body>
<?php endif; ?>


<!-- =========================================================
     COVER PAGE
========================================================= -->

<div class="cover-page">

    <div style="font-size:11pt;color:#666;margin-bottom:12mm;">
        (Replace with agency's logo)
    </div>

    <div class="cover-title">
        INFORMATION SYSTEMS STRATEGIC PLAN (ISSP)
    </div>

    <div class="cover-type">
        <span>
            [<?= v($issp_type ?? '') === 'regular' ? '/' : ' ' ?>]
            REGULAR ISSP
        </span>

        &nbsp;&nbsp;&nbsp;

        <span>
            [<?= v($issp_type ?? '') === 'amendment' ? '/' : ' ' ?>]
            AMENDMENT
        </span>
    </div>

    <div class="cover-sub">
        For the period <?= ve($startYear) ?> to <?= ve($endYear) ?>
    </div>

    <div class="cover-agency">
        <?= !isEmpty($department) ? v($department) : 'Philippine Information Agency' ?>
    </div>

    <div class="cover-two-col">

        <div class="cover-two-col-left">

            <div class="cover-block">
                <div class="cover-block-label">
                    PREPARED BY:
                </div>

                <div class="cover-block-sign">
                    <?= !isEmpty($submittedBy)
                        ? v($submittedBy)
                        : 'Name & Signature of Chief Information Officer' ?>
                </div>
            </div>

            <div class="cover-block">
                <div class="cover-block-label">
                    APPROVED BY:
                </div>

                <div class="cover-block-sign">
                    Name &amp; Signature of Agency Head
                </div>
            </div>

        </div>

        <div class="cover-two-col-right">

            <div style="font-weight:bold;margin-bottom:2mm;">
                Scope
            </div>

            <div>
                [ ] Department-Wide<br>
                &nbsp;&nbsp;&nbsp;&nbsp;[ ] Central Office only<br>
                &nbsp;&nbsp;&nbsp;&nbsp;[ ] With Regional / Field Offices<br>
                &nbsp;&nbsp;&nbsp;&nbsp;[ ] With Bureaus<br>
                [ ] Agency-Wide<br>
                &nbsp;&nbsp;&nbsp;&nbsp;[ ] Central Office only<br>
                &nbsp;&nbsp;&nbsp;&nbsp;[ ] With Regional / Field Offices<br>
                &nbsp;&nbsp;&nbsp;&nbsp;[ ] Other Government Entity<br>
                [ ] LGU
            </div>

        </div>

    </div>

</div>


<!-- =========================================================
     TABLE OF CONTENTS
========================================================= -->

<div class="toc-page">

    <div class="toc-title">
        Table of Contents
    </div>

    <div class="toc-row">
        <span class="toc-label-toc">Definition of Terms</span>
        <span class="toc-dots"></span>
        <span class="toc-page-num"><?= $pageNumbers['definition_of_terms'] ?? '' ?></span>
    </div>

    <div class="toc-row toc-row-part">
        <span class="toc-label-toc">PART I. AGENCY PROFILE &amp; STRATEGIC CONTEXT</span>
        <span class="toc-dots"></span>
        <span class="toc-page-num"><?= $pageNumbers['part1'] ?? '' ?></span>
    </div>

    <div class="toc-row toc-row-sub">
        <span class="toc-label-toc">A. Mandate, Vision, Mission, and Organizational Outcome</span>
        <span class="toc-dots"></span>
        <span class="toc-page-num"><?= $pageNumbers['part1_a'] ?? '' ?></span>
    </div>

    <div class="toc-row toc-row-item">
        <span class="toc-label-toc">A.1. Mandate</span>
        <span class="toc-dots"></span>
        <span class="toc-page-num"><?= $pageNumbers['part1_a1'] ?? '' ?></span>
    </div>

    <div class="toc-row toc-row-item">
        <span class="toc-label-toc">A.2. Vision Statement</span>
        <span class="toc-dots"></span>
        <span class="toc-page-num"><?= $pageNumbers['part1_a2'] ?? '' ?></span>
    </div>

    <div class="toc-row toc-row-item">
        <span class="toc-label-toc">A.3. Mission Statement</span>
        <span class="toc-dots"></span>
        <span class="toc-page-num"><?= $pageNumbers['part1_a3'] ?? '' ?></span>
    </div>

    <div class="toc-row toc-row-item">
        <span class="toc-label-toc">A.4. Organizational Outcome</span>
        <span class="toc-dots"></span>
        <span class="toc-page-num"><?= $pageNumbers['part1_a4'] ?? '' ?></span>
    </div>

    <div class="toc-row toc-row-sub">
        <span class="toc-label-toc">B. Organizational Structure</span>
        <span class="toc-dots"></span>
        <span class="toc-page-num"><?= $pageNumbers['part1_b'] ?? '' ?></span>
    </div>

    <div class="toc-row toc-row-item">
        <span class="toc-label-toc">B.1. Chief Information Officer (CIO)</span>
        <span class="toc-dots"></span>
        <span class="toc-page-num"><?= $pageNumbers['part1_b1'] ?? '' ?></span>
    </div>

    <div class="toc-row toc-row-item">
        <span class="toc-label-toc">B.2. Human Capital</span>
        <span class="toc-dots"></span>
        <span class="toc-page-num"><?= $pageNumbers['part1_b2'] ?? '' ?></span>
    </div>

    <div class="toc-row toc-row-sub">
        <span class="toc-label-toc">C. Stakeholder Analysis</span>
        <span class="toc-dots"></span>
        <span class="toc-page-num"><?= $pageNumbers['part1_c'] ?? '' ?></span>
    </div>


    <div class="toc-row toc-row-part">
        <span class="toc-label-toc">PART II. CURRENT ICT ASSESSMENT</span>
        <span class="toc-dots"></span>
        <span class="toc-page-num"><?= $pageNumbers['part2'] ?? '' ?></span>
    </div>

    <div class="toc-row toc-row-sub">
        <span class="toc-label-toc">A. Strategic Concerns for ICT Use</span>
        <span class="toc-dots"></span>
        <span class="toc-page-num"><?= $pageNumbers['part2_a'] ?? '' ?></span>
    </div>

    <div class="toc-row toc-row-sub">
        <span class="toc-label-toc">B. Existing Network Infrastructure</span>
        <span class="toc-dots"></span>
        <span class="toc-page-num"><?= $pageNumbers['part2_b'] ?? '' ?></span>
    </div>

    <div class="toc-row toc-row-item">
        <span class="toc-label-toc">B1. LAN/WAN Set-up Including Connectivity Type and Bandwidth</span>
        <span class="toc-dots"></span>
        <span class="toc-page-num"><?= $pageNumbers['part2_b1'] ?? '' ?></span>
    </div>

    <div class="toc-row toc-row-item">
        <span class="toc-label-toc">B2. Cybersecurity Control Checklist</span>
        <span class="toc-dots"></span>
        <span class="toc-page-num"><?= $pageNumbers['part2_b2'] ?? '' ?></span>
    </div>

    <div class="toc-row toc-row-sub">
        <span class="toc-label-toc">C. Existing/Operational Information Systems Inventory</span>
        <span class="toc-dots"></span>
        <span class="toc-page-num"><?= $pageNumbers['part2_c'] ?? '' ?></span>
    </div>

    <div class="toc-row toc-row-sub">
        <span class="toc-label-toc">D. E-Government Programs Checklist</span>
        <span class="toc-dots"></span>
        <span class="toc-page-num"><?= $pageNumbers['part2_d'] ?? '' ?></span>
    </div>


    <div class="toc-row toc-row-part">
        <span class="toc-label-toc">PART III. PROPOSED ICT STRATEGY</span>
        <span class="toc-dots"></span>
        <span class="toc-page-num"><?= $pageNumbers['part3'] ?? '' ?></span>
    </div>

    <div class="toc-row toc-row-sub">
        <span class="toc-label-toc">A. Proposed Network Infrastructure</span>
        <span class="toc-dots"></span>
        <span class="toc-page-num"><?= $pageNumbers['part3_a'] ?? '' ?></span>
    </div>

    <div class="toc-row toc-row-item">
        <span class="toc-label-toc">A.1. LAN/WAN Set-up Including Connectivity Type and Bandwidth</span>
        <span class="toc-dots"></span>
        <span class="toc-page-num"><?= $pageNumbers['part3_a1'] ?? '' ?></span>
    </div>

    <div class="toc-row toc-row-item">
        <span class="toc-label-toc">A.2. Cybersecurity Control Checklist</span>
        <span class="toc-dots"></span>
        <span class="toc-page-num"><?= $pageNumbers['part3_a2'] ?? '' ?></span>
    </div>

    <div class="toc-row toc-row-sub">
        <span class="toc-label-toc">B. Enterprise Architecture</span>
        <span class="toc-dots"></span>
        <span class="toc-page-num"><?= $pageNumbers['part3_b'] ?? '' ?></span>
    </div>

    <div class="toc-row toc-row-sub">
        <span class="toc-label-toc">C. Proposed ICT Human Capital</span>
        <span class="toc-dots"></span>
        <span class="toc-page-num"><?= $pageNumbers['part3_c'] ?? '' ?></span>
    </div>

    <div class="toc-row toc-row-sub">
        <span class="toc-label-toc">D. Proposed Information Systems</span>
        <span class="toc-dots"></span>
        <span class="toc-page-num"><?= $pageNumbers['part3_d'] ?? '' ?></span>
    </div>

    <div class="toc-row toc-row-sub">
        <span class="toc-label-toc">E. ICT Projects</span>
        <span class="toc-dots"></span>
        <span class="toc-page-num"><?= $pageNumbers['part3_e'] ?? '' ?></span>
    </div>

    <div class="toc-row toc-row-sub">
        <span class="toc-label-toc">F. Performance Measurement Framework</span>
        <span class="toc-dots"></span>
        <span class="toc-page-num"><?= $pageNumbers['part3_f'] ?? '' ?></span>
    </div>


    <div class="toc-row toc-row-part">
        <span class="toc-label-toc">PART IV. RESOURCE REQUIREMENTS</span>
        <span class="toc-dots"></span>
        <span class="toc-page-num"><?= $pageNumbers['part4'] ?? '' ?></span>
    </div>

    <div class="toc-row toc-row-sub">
        <span class="toc-label-toc">A. Detailed Resource Deployment and Cost Breakdown</span>
        <span class="toc-dots"></span>
        <span class="toc-page-num"><?= $pageNumbers['part4_a'] ?? '' ?></span>
    </div>

    <div class="toc-row toc-row-item">
        <span class="toc-label-toc">A.1. Year #1</span>
        <span class="toc-dots"></span>
        <span class="toc-page-num"><?= $pageNumbers['part4_a1'] ?? '' ?></span>
    </div>

    <div class="toc-row toc-row-item">
        <span class="toc-label-toc">A.2. Year #2</span>
        <span class="toc-dots"></span>
        <span class="toc-page-num"><?= $pageNumbers['part4_a2'] ?? '' ?></span>
    </div>

    <div class="toc-row toc-row-item">
        <span class="toc-label-toc">A.3. Year #3</span>
        <span class="toc-dots"></span>
        <span class="toc-page-num"><?= $pageNumbers['part4_a3'] ?? '' ?></span>
    </div>

    <div class="toc-row toc-row-sub">
        <span class="toc-label-toc">B. Summary of Investments</span>
        <span class="toc-dots"></span>
        <span class="toc-page-num"><?= $pageNumbers['part4_b'] ?? '' ?></span>
    </div>

    <div class="toc-row toc-row-item">
        <span class="toc-label-toc">B.1. General Summary</span>
        <span class="toc-dots"></span>
        <span class="toc-page-num"><?= $pageNumbers['part4_b1'] ?? '' ?></span>
    </div>

    <div class="toc-row toc-row-item">
        <span class="toc-label-toc">B.2. Fund Source</span>
        <span class="toc-dots"></span>
        <span class="toc-page-num"><?= $pageNumbers['part4_b2'] ?? '' ?></span>
    </div>

    <div class="toc-row toc-row-item">
        <span class="toc-label-toc">B.3. Statement of Expenditure</span>
        <span class="toc-dots"></span>
        <span class="toc-page-num"><?= $pageNumbers['part4_b3'] ?? '' ?></span>
    </div>

    <div class="toc-row toc-row-item">
        <span class="toc-label-toc">B.4. Object of Expenditure</span>
        <span class="toc-dots"></span>
        <span class="toc-page-num"><?= $pageNumbers['part4_b4'] ?? '' ?></span>
    </div>

</div>


<!-- =========================================================
     DEFINITION OF TERMS
========================================================= -->

<?= scanMarker('definition_of_terms') ?>

<div style="font-size:20pt;font-weight:bold;margin-bottom:6mm;">
    DEFINITION OF TERMS
</div>

<table class="dt">

    <thead>
        <tr>
            <th style="width:35%;">Terms</th>
            <th>Definition</th>
        </tr>
    </thead>

    <tbody>

        <tr>
            <td class="b">Agency</td>
            <td>
                Refers to any bureau, office, commission, authority,
                or instrumentality of the national government,
                including government-owned or controlled corporations
                authorized by law to undertake ICT-related projects.
            </td>
        </tr>

        <tr>
            <td class="b">Business Process</td>
            <td>
                A collection of business transactions and/or internal
                activities that support the objectives of an organization.
            </td>
        </tr>

        <tr>
            <td class="b">Chief Information Officer</td>
            <td>
                A senior officer responsible for the development,
                planning, implementation, and management of the agency's
                ICT systems and Information Systems Strategic Plan.
            </td>
        </tr>

    </tbody>

</table>


<!-- =========================================================
     PART I
========================================================= -->

<?= scanMarker('part1') ?>

<div class="part-heading">
    PART I. AGENCY PROFILE &amp; STRATEGIC CONTEXT
</div>


<?= scanMarker('part1_a') ?>

<div class="section-heading">
    A. MANDATE, VISION, MISSION, AND ORGANIZATIONAL OUTCOME
</div>


<?= scanMarker('part1_a1') ?>

<div class="subsection-heading">
    A.1. MANDATE
</div>

<?= renderSimpleField('Legal Basis', $agencyData['legal_basis'] ?? '') ?>
<?= renderSimpleField('Function', $agencyData['function'] ?? '') ?>


<?= scanMarker('part1_a2') ?>

<div class="subsection-heading">
    A.2. VISION STATEMENT
</div>

<div class="body-text">
    <?= !isEmpty($agencyData['vision_statement'] ?? '')
        ? nl2br(v($agencyData['vision_statement']))
        : '<span class="empty">[To be completed by agency]</span>' ?>
</div>


<?= scanMarker('part1_a3') ?>

<div class="subsection-heading">
    A.3. MISSION STATEMENT
</div>

<div class="body-text">
    <?= !isEmpty($agencyData['mission_statement'] ?? '')
        ? nl2br(v($agencyData['mission_statement']))
        : '<span class="empty">[To be completed by agency]</span>' ?>
</div>


<?= scanMarker('part1_a4') ?>

<div class="subsection-heading">
    A.4. ORGANIZATIONAL OUTCOME
</div>

<div class="body-text">
    <?= !isEmpty($agencyData['organizational_outcome'] ?? '')
        ? nl2br(v($agencyData['organizational_outcome']))
        : '<span class="empty">[To be completed by agency]</span>' ?>
</div>


<?= scanMarker('part1_b') ?>

<div class="section-heading">
    B. ORGANIZATIONAL STRUCTURE
</div>


<?= scanMarker('part1_b1') ?>

<div class="subsection-heading">
    B.1. CHIEF INFORMATION OFFICER (CIO)
</div>

<?= renderSimpleField('Name of CIO', $agencyData['cio_name'] ?? '') ?>
<?= renderSimpleField('Plantilla Position', $agencyData['cio_plantilla'] ?? '') ?>
<?= renderSimpleField('Organizational Unit', $agencyData['cio_unit'] ?? '') ?>
<?= renderSimpleField('E-mail Address', $agencyData['cio_email'] ?? '') ?>
<?= renderSimpleField('Contact Number/s', $agencyData['cio_contact'] ?? '') ?>


<?= scanMarker('part1_b2') ?>

<div class="subsection-heading">
    B.2. HUMAN CAPITAL
</div>

<?php
$hcPlantilla = [
    'it' => (int)($agencyData['plantilla_it'] ?? 0),
    'non_it' => (int)($agencyData['plantilla_non_it'] ?? 0),
    'male' => (int)($agencyData['plantilla_male'] ?? 0),
    'female' => (int)($agencyData['plantilla_female'] ?? 0),
];

$hcContractual = [
    'it' => (int)($agencyData['contractual_it'] ?? 0),
    'non_it' => (int)($agencyData['contractual_non_it'] ?? 0),
    'male' => (int)($agencyData['contractual_male'] ?? 0),
    'female' => (int)($agencyData['contractual_female'] ?? 0),
];

$hcOutsourced = [
    'it' => (int)($agencyData['outsourced_it'] ?? 0),
    'non_it' => (int)($agencyData['outsourced_non_it'] ?? 0),
    'male' => (int)($agencyData['outsourced_male'] ?? 0),
    'female' => (int)($agencyData['outsourced_female'] ?? 0),
];

$hcGrandIt =
    $hcPlantilla['it'] +
    $hcContractual['it'] +
    $hcOutsourced['it'];

$hcGrandNonIt =
    $hcPlantilla['non_it'] +
    $hcContractual['non_it'] +
    $hcOutsourced['non_it'];

$hcGrandMale =
    $hcPlantilla['male'] +
    $hcContractual['male'] +
    $hcOutsourced['male'];

$hcGrandFemale =
    $hcPlantilla['female'] +
    $hcContractual['female'] +
    $hcOutsourced['female'];
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
            <td class="gt c">
                <?= $hcGrandIt + $hcGrandNonIt ?>
            </td>
        </tr>

    </tbody>

</table>


<?= scanMarker('part1_c') ?>

<div class="section-heading">
    C. STAKEHOLDER ANALYSIS
</div>

<div class="body-text">
    <?= !isEmpty($agencyData['stakeholder_analysis'] ?? '')
        ? nl2br(v($agencyData['stakeholder_analysis']))
        : '<span class="empty">[To be completed]</span>' ?>
</div>


<!-- =========================================================
     PART II
========================================================= -->

<?= scanMarker('part2') ?>

<div class="part-heading">
    PART II. CURRENT ICT ASSESSMENT
</div>


<!-- PART II-A -->

<?= scanMarker('part2_a') ?>

<div class="section-heading">
    A. STRATEGIC CONCERNS FOR ICT USE
</div>

<?php if (!empty($strategicConcerns)): ?>

<table class="dt">

    <thead>
        <tr>
            <th style="width:20%;">OO / SO / MFO</th>
            <th style="width:35%;">Critical Management, Operating, or Business System</th>
            <th style="width:25%;">Problem</th>
            <th style="width:20%;">Intended Use of ICT</th>
        </tr>
    </thead>

    <tbody>

    <?php foreach ($strategicConcerns as $concern): ?>

        <?php
        $ooSoMfo = $concern['oo_so_mfo'] ?? '';

        $ictConcerns = (
            isset($concern['ict_concerns']) &&
            is_array($concern['ict_concerns'])
        )
            ? $concern['ict_concerns']
            : [];
        ?>

        <?php if (!empty($ictConcerns)): ?>

            <?php foreach ($ictConcerns as $index => $ict): ?>

                <tr>

                    <?php if ($index === 0): ?>

                        <td rowspan="<?= count($ictConcerns) ?>">
                            <?= !isEmpty($ooSoMfo)
                                ? nl2br(v($ooSoMfo))
                                : '—' ?>
                        </td>

                    <?php endif; ?>

                    <td>
                        <?= !isEmpty($ict['critical'] ?? '')
                            ? nl2br(v($ict['critical']))
                            : '—' ?>
                    </td>

                    <td>
                        <?= !isEmpty($ict['problem'] ?? '')
                            ? nl2br(v($ict['problem']))
                            : '—' ?>
                    </td>

                    <td>
                        <?= !isEmpty($ict['intended_use'] ?? '')
                            ? nl2br(v($ict['intended_use']))
                            : '—' ?>
                    </td>

                </tr>

            <?php endforeach; ?>

        <?php else: ?>

            <tr>
                <td><?= !isEmpty($ooSoMfo) ? nl2br(v($ooSoMfo)) : '—' ?></td>
                <td>—</td>
                <td>—</td>
                <td>—</td>
            </tr>

        <?php endif; ?>

    <?php endforeach; ?>

    </tbody>

</table>

<?php else: ?>

<div class="body-text">
    <span class="empty">[To be completed]</span>
</div>

<?php endif; ?>


<!-- PART II-B -->

<?= scanMarker('part2_b') ?>

<div class="section-heading">
    B. EXISTING NETWORK INFRASTRUCTURE
</div>


<?= scanMarker('part2_b1') ?>

<div class="subsection-heading">
    B1. LAN/WAN SET-UP INCLUDING CONNECTIVITY TYPE AND BANDWIDTH
</div>

<?php renderNetworkTable($ni); ?>


<?= scanMarker('part2_b2') ?>

<div class="subsection-heading">
    B2. CYBERSECURITY CONTROL CHECKLIST
</div>

<?php renderCybersecurityTable($cyberCurrent, $cybersecurityCategories); ?>


<!-- PART II-C -->

<?= scanMarker('part2_c') ?>

<div class="section-heading">
    C. EXISTING/OPERATIONAL INFORMATION SYSTEMS (IS) INVENTORY
</div>

<?php renderInformationSystems($is); ?>


<!-- PART II-D -->

<?= scanMarker('part2_d') ?>

<div class="section-heading">
    D. E-GOVERNMENT PROGRAMS (EGP) CHECKLIST
</div>

<?php if (!empty($egovPrograms)): ?>

<table class="dt">
    <thead>
        <tr>
            <th style="width:32%;">Program</th>
            <th style="width:15%;">Status</th>
            <th style="width:53%;">If No, indicate</th>
        </tr>
    </thead>

    <tbody>

    <?php foreach ($egovPrograms as $program): ?>

        <?php
        $programName = $program['program'] ?? '';
        $programStatus = $program['status'] ?? '';

        $ifNoItems = [];

        if (!empty($program['equivalent_system'])) {
            $ifNoItems[] = 'Using equivalent system';
        }

        if (!empty($program['manual_processing'])) {
            $ifNoItems[] = 'Manual Processing';
        }

        if (!empty($program['proposed_development'])) {
            $ifNoItems[] = 'Proposed Development';
        }
        ?>

        <tr>
            <td class="b">
                <?= v($programName) ?>
            </td>

            <td class="c">
                <?= v($programStatus) ?>
            </td>

            <td>
                <?php if ($programStatus === 'No'): ?>

                    <?php if (!empty($ifNoItems)): ?>

                        <?php foreach ($ifNoItems as $item): ?>
                            <div>☑ <?= v($item) ?></div>
                        <?php endforeach; ?>

                    <?php else: ?>

                        <span class="empty">—</span>

                    <?php endif; ?>

                <?php else: ?>

                    <span class="empty">—</span>

                <?php endif; ?>
            </td>
        </tr>

    <?php endforeach; ?>

    </tbody>
</table>

<?php else: ?>

<div class="body-text">
    <span class="empty">
        [No E-Government Programs data provided]
    </span>
</div>

<?php endif; ?>




<!-- =========================================================
     PART III
========================================================= -->

<?= scanMarker('part3') ?>

<div class="part-heading">
    PART III. PROPOSED ICT STRATEGY
</div>


<!-- PART III-A -->

<?= scanMarker('part3_a') ?>

<div class="section-heading">
    A. PROPOSED NETWORK INFRASTRUCTURE
</div>


<?= scanMarker('part3_a1') ?>

<div class="subsection-heading">
    A.1. LAN/WAN SET-UP INCLUDING CONNECTIVITY TYPE AND BANDWIDTH
</div>

<?php renderNetworkTable($ni); ?>


<?= scanMarker('part3_a2') ?>

<div class="subsection-heading">
    A.2. CYBERSECURITY CONTROL CHECKLIST
</div>

<?php renderCybersecurityTable($cyberProposed, $cybersecurityCategories); ?>


<!-- PART III-B -->

<?= scanMarker('part3_b') ?>

<div class="section-heading">
    B. ENTERPRISE ARCHITECTURE
</div>

<?php
$eaSkip = [];
if (!isEmpty($ea['ea_diagram'] ?? '')) {
    renderSimpleField(
        'Enterprise Architecture Diagram',
        $ea['ea_diagram']
    );
}

if (!isEmpty($ea['ea_description'] ?? '')) {
    renderSimpleField(
        'Description',
        $ea['ea_description']
    );
}

if (empty($ea)) {
    echo '<div class="body-text"><span class="empty">[No enterprise architecture data provided]</span></div>';
}
?>


<!-- PART III-C -->

<?= scanMarker('part3_c') ?>

<div class="section-heading">
    C. PROPOSED ICT HUMAN CAPITAL
</div>

<?php renderHumanCapital($hc); ?>


<!-- PART III-D -->

<?= scanMarker('part3_d') ?>

<div class="section-heading">
    D. PROPOSED INFORMATION SYSTEMS
</div>

<?php renderInformationSystems($is); ?>


<!-- PART III-E -->

<?= scanMarker('part3_e') ?>

<div class="section-heading">
    E. ICT PROJECTS
</div>

<?php renderProjects($proj); ?>


<!-- PART III-F -->

<?= scanMarker('part3_f') ?>

<div class="section-heading">
    F. PERFORMANCE MEASUREMENT FRAMEWORK
</div>

<?php
if (!empty($pm)) {
    renderFieldTable(
        'performance-measurement-form',
        $pm
    );
} else {
    echo '<div class="body-text">';
    echo '<span class="empty">[No performance measurement data provided]</span>';
    echo '</div>';
}
?>


<!-- =========================================================
     PART IV
========================================================= -->

<?= scanMarker('part4') ?>

<div class="part-heading">
    PART IV. RESOURCE REQUIREMENTS
</div>


<?= scanMarker('part4_a') ?>

<div class="section-heading">
    A. DETAILED RESOURCE DEPLOYMENT AND COST BREAKDOWN
</div>


<!-- YEAR 1 -->

<?= scanMarker('part4_a1') ?>

<?php renderResourceTable($rY1, 'A.1. YEAR #1'); ?>


<!-- YEAR 2 -->

<?= scanMarker('part4_a2') ?>

<?php renderResourceTable($rY2, 'A.2. YEAR #2'); ?>


<!-- YEAR 3 -->

<?= scanMarker('part4_a3') ?>

<?php renderResourceTable($rY3, 'A.3. YEAR #3'); ?>


<!-- =========================================================
     SUMMARY OF INVESTMENTS
========================================================= -->

<?= scanMarker('part4_b') ?>

<div class="section-heading">
    B. SUMMARY OF INVESTMENTS
</div>


<!-- GENERAL SUMMARY -->

<?= scanMarker('part4_b1') ?>

<?php
renderSummaryTable(
    $rGen,
    'B.1. GENERAL SUMMARY',
    'strategic_category'
);
?>


<!-- FUND SOURCE -->

<?= scanMarker('part4_b2') ?>

<?php
renderSummaryTable(
    $rFund,
    'B.2. FUND SOURCE',
    'fund_source'
);
?>


<!-- STATEMENT OF EXPENDITURE -->

<?= scanMarker('part4_b3') ?>

<?php
renderSummaryTable(
    $rSOE,
    'B.3. STATEMENT OF EXPENDITURE',
    'expenditure_type'
);
?>


<!-- OBJECT OF EXPENDITURE -->

<?= scanMarker('part4_b4') ?>

<?php
renderSummaryTable(
    $rOOE,
    'B.4. OBJECT OF EXPENDITURE',
    'uacs_code'
);
?>


<!-- =========================================================
     FINAL FOOTER
========================================================= -->

<div class="footer">
    Generated automatically on <?= date('Y-m-d H:i:s') ?>
    |
    Information Systems Strategic Plan (ISSP)
    |
    <?= v($title) ?>
</div>


<?php if (!$batchMode): ?>

</body>
</html>

<?php endif; ?>