<?php

namespace App\Controllers\Employee;

use App\Controllers\BaseController;
use App\Models\UserModel;
use App\Models\ISspRecordModel;
use App\Models\AuditLogModel;
use App\Models\ResourceRequirementModel;
use App\Models\AgencyInformationModel;

class DashboardController extends BaseController
{
    public function index()
    {
        $currentUserId = (int) session()->get('user_id');
        $userModel = new UserModel();
        $isspRecordModel = new ISspRecordModel();

        $year = $this->request->getGet('year') !== null ? (int) $this->request->getGet('year') : null;
        $month = $this->request->getGet('month') !== null ? (int) $this->request->getGet('month') : null;

        $recentRecords = $isspRecordModel->getRecentRecordsByUser($currentUserId, 10, $year, $month);

        $allBuilder = $isspRecordModel->select('status, budget, form_data, created_at, updated_at')
            ->where('created_by', $currentUserId);

        if ($year !== null) {
            $allBuilder->where('YEAR(COALESCE(updated_at, created_at))', $year);
        }
        if ($month !== null) {
            $allBuilder->where('MONTH(COALESCE(updated_at, created_at))', $month);
        }

        $allUserRecords = $allBuilder->findAll();

        $isNotDraft = fn($r) => !empty($r['status']) && $r['status'] !== 'draft';
        $submittedProjects = count(array_filter($allUserRecords, $isNotDraft));
        $approvedProjects = count(array_filter($allUserRecords, fn($r) => $r['status'] === 'approved'));
        $needRevision = count(array_filter($allUserRecords, fn($r) => in_array($r['status'], ['rejected', 'returned'])));
        $totalBudget = array_reduce(
            array_filter($allUserRecords, $isNotDraft),
            function ($carry, $r) {
                $fd = !empty($r['form_data']) ? json_decode($r['form_data'], true) : [];
                $ict = $fd['ict-projects-form'] ?? [];
                $internal = (float) ($ict['internal_total_cost'] ?? $r['budget'] ?? 0);
                $cross = (float) ($ict['cross_total_cost'] ?? 0);
                return $carry + $internal + $cross;
            },
            0
        );

        $availableYears = $isspRecordModel->getAvailableYears();

        return view('frontend/employee/dashboard/index', [
            'title' => 'Employee Dashboard',
            'active' => 'dashboard',
            'currentUser' => $userModel->findWithRole($currentUserId),
            'submittedProjects' => $submittedProjects, 
            'approvedProjects' => $approvedProjects, 
            'needRevision' => $needRevision, 
            'totalBudget' => $totalBudget,
            'recentRecords' => $recentRecords,
            'selectedYear' => $year,
            'selectedMonth' => $month,
            'availableYears' => $availableYears,
        ]);
    }

    public function submittedIctProjects()
    {
        $currentUserId = (int) session()->get('user_id');
        $userModel = new UserModel();
        $isspRecordModel = new ISspRecordModel();

        $query = trim((string) $this->request->getGet('q'));
        $dateRange = trim((string) $this->request->getGet('date_range'));

        $isspRecordModel->select('issp_records.*, departments.name AS department_name')
            ->join('departments', 'departments.id = issp_records.department_id', 'left')
            ->where('issp_records.created_by', $currentUserId)
            ->where('issp_records.status IS NOT NULL')
            ->where('issp_records.status !=', '')
            ->where('issp_records.status !=', 'draft')
            ->orderBy('COALESCE(issp_records.updated_at, issp_records.created_at)', 'DESC', false)
            ->limit(100);

        if ($query !== '') {
            $isspRecordModel->like('issp_records.title', $query);
        }
        if ($dateRange !== '') {
            $dates = explode(' to ', $dateRange);
            if (count($dates) === 2) {
                $isspRecordModel->where('issp_records.created_at >=', trim($dates[0]) . ' 00:00:00')
                    ->where('issp_records.created_at <=', trim($dates[1]) . ' 23:59:59');
            }
        }

        $submittedProjects = $isspRecordModel->findAll();

        return view('frontend/employee/submitted-ict-projects/index', [
            'title' => 'Submitted ICT Projects',
            'active' => 'submitted-ict-projects',
            'currentUser' => $userModel->findWithRole($currentUserId),
            'submittedProjects' => $submittedProjects,
            'query' => $query,
            'date_range' => $dateRange,
        ]);
    }

    public function viewFullIctDocument(int $id)
    {
        $currentUserId = (int) session()->get('user_id');
        $isspModel = new ISspRecordModel();
        $userModel = new UserModel();

        $project = $isspModel
            ->select('issp_records.*, departments.name AS department_name, users.name AS created_by_name')
            ->join('departments', 'departments.id = issp_records.department_id', 'left')
            ->join('users', 'users.id = issp_records.created_by', 'left')
            ->where('issp_records.id', $id)
            ->where('issp_records.created_by', $currentUserId)
            ->first();

        if ($project === null) {
            return redirect()->to('employee/submitted-ict-projects')->with('error', 'Project not found.');
        }

        $formData = [];
        if (!empty($project['form_data'])) {
            $decoded = json_decode($project['form_data'], true);
            if (is_array($decoded)) {
                $formData = $decoded;
            }
        }

        return view('frontend/employee/submitted-ict-projects/view_full', [
            'title' => 'View Full ICT Document',
            'active' => 'submitted-ict-projects',
            'currentUser' => $userModel->findWithRole($currentUserId),
            'project' => $project,
            'formData' => $formData,
        ]);
    }

    public function resubmitProject(int $id)
    {
        try {
            $currentUserId = (int) session()->get('user_id');
            $isspRecordModel = new ISspRecordModel();
            $record = $isspRecordModel->find($id);

            if (!$record || (int) $record['created_by'] !== $currentUserId) {
                return redirect()->back()->with('error', 'Project not found.');
            }

            if ($record['status'] !== 'returned') {
                return redirect()->back()->with('error', 'Only returned projects can be resubmitted.');
            }

            $formData = !empty($record['form_data']) ? (json_decode($record['form_data'], true) ?? []) : [];

            $completion = $this->isFormComplete($formData);
            if (!$completion['success']) {
                return redirect()->back()->with('error', $completion['message']);
            }

            $updateData = [
                'status' => 'resubmitted',
                'updated_at' => date('Y-m-d H:i:s'),
            ];
            if (!empty($formData)) {
                $updateData['form_data'] = json_encode($formData);
                $updateData['title'] = $formData['ict-projects-form']['internal_project_title'] ?? $record['title'];
                $updateData['description'] = $formData['ict-projects-form']['internal_description'] ?? '';
                $updateData['budget'] = $formData['ict-projects-form']['internal_total_cost'] ?? 0;
            }

            $isspRecordModel->update($id, $updateData);

            $this->writeLog('issp.resubmitted', 'Resubmitted ISSP #' . $id, $formData['ict-projects-form']['internal_project_title'] ?? '');

            helper('notification');
            $userModel = new UserModel();
            $employee = $userModel->findWithRole($currentUserId);
            $project = [
                'id' => $id,
                'title' => $formData['ict-projects-form']['internal_project_title'] ?? 'ISSP Submission',
            ];
            $ictPlanners = $userModel->getUsersByRole('ict_planner');
            if (!empty($ictPlanners)) {
                sendSubmissionNotification($project, $employee, $ictPlanners);
            }

            return redirect()->to('employee/dashboard')->with('success', 'Project resubmitted successfully for review.');

        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function draftIctProjects()
    {
        $currentUserId = (int) session()->get('user_id');
        $userModel = new UserModel();
        $isspRecordModel = new ISspRecordModel();

        $query = trim((string) $this->request->getGet('q'));
        $dateRange = trim((string) $this->request->getGet('date_range'));

        $isspRecordModel->select('issp_records.*, departments.name AS department_name')
            ->join('departments', 'departments.id = issp_records.department_id', 'left')
            ->where('issp_records.created_by', $currentUserId)
            ->groupStart()
                ->where('issp_records.status IS NULL')
                ->orWhere('issp_records.status', '')
                ->orWhere('issp_records.status', 'draft')
            ->groupEnd()
            ->orderBy('COALESCE(issp_records.updated_at, issp_records.created_at)', 'DESC', false)
            ->limit(100);

        if ($query !== '') {
            $isspRecordModel->like('issp_records.title', $query);
        }
        if ($dateRange !== '') {
            $dates = explode(' to ', $dateRange);
            if (count($dates) === 2) {
                $isspRecordModel->where('issp_records.created_at >=', trim($dates[0]) . ' 00:00:00')
                    ->where('issp_records.created_at <=', trim($dates[1]) . ' 23:59:59');
            }
        }

        $draftProjects = $isspRecordModel->findAll();

        return view('frontend/employee/draft-ict-projects/index', [
            'title' => 'Draft ICT Projects',
            'active' => 'draft-ict-projects',
            'currentUser' => $userModel->findWithRole($currentUserId),
            'draftProjects' => $draftProjects,
            'query' => $query,
            'date_range' => $dateRange,
        ]);
    }

    public function submitISSP($id = null)
    {
        try {
            $this->ensureFormDataColumn();

            $isspRecordModel = new ISspRecordModel();
            $currentUserId = (int) session()->get('user_id');
            $id = $id ?? $this->request->getPost('id');

            if (!$id) {
                return redirect()->back()->with('error', 'No project ID provided.');
            }

            $record = $isspRecordModel->find($id);
            $formData = !empty($record['form_data']) ? (json_decode($record['form_data'], true) ?? []) : [];

            $completion = $this->isFormComplete($formData);
            if (!$completion['success']) {
                return redirect()->back()->with('error', $completion['message']);
            }

                $newStatus = ($record && $record['status'] === 'returned') ? 'resubmitted' : 'pending';
            $updateData = ['status' => $newStatus, 'updated_at' => date('Y-m-d H:i:s')];
            if (!empty($formData)) {
                $updateData['form_data'] = json_encode($formData);
                $updateData['title'] = $formData['ict-projects-form']['internal_project_title'] ?? $updateData['title'] ?? 'ISSP Submission';
                $updateData['description'] = $formData['ict-projects-form']['internal_description'] ?? '';
                $updateData['budget'] = $formData['ict-projects-form']['internal_total_cost'] ?? 0;
            }
            $isspRecordModel->update($id, $updateData);

            $this->writeLog('issp.submitted', 'Submitted ISSP #' . $id, $formData['ict-projects-form']['internal_project_title'] ?? '');

            try {
                $userModel = new UserModel();
                $employee = $userModel->findWithRole($currentUserId);
                $project = [
                    'id' => $id,
                    'title' => $formData['ict-projects-form']['internal_project_title'] ?? 'ISSP Submission',
                ];
                $notifyRole = 'ict_planner';
                $recipients = $userModel->getUsersByRole($notifyRole);
                if (!empty($recipients)) {
                    sendSubmissionNotification($project, $employee, $recipients);
                }
            } catch (\Exception $e) {
                log_message('error', 'Failed to send submission notification: ' . $e->getMessage());
            }

            return redirect()->to('employee/dashboard')->with('success', 'Project submitted successfully for review.')->with('clear_form_data', '1');

        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    private function isFormComplete(array $formData): array
    {
        $sectionLabels = [
            'network-infrastructure-form'     => 'Network Infrastructure (Section A)',
            'enterprise-architecture-form'    => 'Enterprise Architecture (Section B)',
            'ict-human-capital-form'          => 'ICT Human Capital (Section C)',
            'information-systems-form'        => 'Information Systems (Section D)',
            'ict-projects-form'               => 'ICT Projects (Section E)',
            'performance-measurement-form'    => 'Performance Measurement & KPIs (Section F)',
        ];

        $title = $formData['ict-projects-form']['internal_project_title'] ?? '';
        if (trim($title) === '') {
            return ['success' => false, 'message' => 'Project Title in ICT Projects (Section E) is required.'];
        }

        foreach ($sectionLabels as $key => $label) {
            if (empty($formData[$key]) || !is_array($formData[$key])) {
                return ['success' => false, 'message' => "$label is incomplete."];
            }
            if ($key === 'ict-human-capital-form') {
                $hasAnyRow = false;
                for ($r = 1; $r <= 20; $r++) {
                    $pos = $formData[$key]["position_$r"] ?? '';
                    if (is_string($pos) && trim($pos) !== '') {
                        $hasAnyRow = true;
                        $stat = $formData[$key]["status_$r"] ?? '';
                        $cnt = $formData[$key]["count_$r"] ?? '';
                        if (trim($stat) === '' || trim($cnt) === '') {
                            return ['success' => false, 'message' => "$label — Row $r has incomplete fields."];
                        }
                    }
                }
                if (!$hasAnyRow) {
                    return ['success' => false, 'message' => "$label requires at least one position."];
                }
                continue;
            }
            $hasValue = false;
            foreach ($formData[$key] as $field => $value) {
                if (str_starts_with((string) $field, 'csrf_') || $field === '_token') {
                    continue;
                }
                if (is_string($value) && trim($value) !== '') {
                    $hasValue = true;
                    break;
                }
            }
            if (!$hasValue) {
                return ['success' => false, 'message' => "$label - at least one field is required."];
            }
        }

        $requiredFiles = [
            'network-infrastructure-form' => ['dept_network_diagram' => 'Department Network Diagram', 'regional_network_diagram' => 'Regional Network Diagram'],
            'enterprise-architecture-form' => ['ea_diagram' => 'Enterprise Architecture Diagram'],
        ];
        foreach ($requiredFiles as $section => $fields) {
            $label = $sectionLabels[$section];
            foreach ($fields as $field => $fieldLabel) {
                $val = $formData[$section][$field] ?? '';
                if (!is_string($val) || trim($val) === '') {
                    return ['success' => false, 'message' => "$fieldLabel in $label is required."];
                }
                if (!str_starts_with($val, 'data:') && !str_starts_with($val, 'uploads/')) {
                    return ['success' => false, 'message' => "$fieldLabel in $label has an invalid file."];
                }
            }
        }

        return ['success' => true, 'message' => ''];
    }

    private function writeLog(string $action, string $description, string $title = ''): void
    {
        $cleanData = [];
        try {
            $json = $this->request->getJSON(true);
        } catch (\Exception $e) {
            $json = null;
        }
        if ($json && isset($json['form_data']) && is_array($json['form_data'])) {
            foreach ($json['form_data'] as $section => $fields) {
                if (is_array($fields)) {
                    $cleaned = $fields;
                    unset($cleaned['csrf_test_name'], $cleaned['_token']);
                    $count = count(array_filter($cleaned, fn($v) => is_string($v) && $v !== ''));
                    if ($count > 0) {
                        $cleanData[$section] = $count . ' field(s)';
                    }
                }
            }
        }
        if ($title) {
            $cleanData['title'] = $title;
        }

        (new AuditLogModel())->insert([
            'user_id' => (int) session()->get('user_id'),
            'action' => $action,
            'description' => $description,
            'new_data' => !empty($cleanData) ? json_encode($cleanData) : '',
            'created_at' => date('Y-m-d H:i:s'),
        ]);
    }

    public function saveDraft()
    {
        $this->response->setContentType('application/json');

        try {
            $this->ensureFormDataColumn();

            $currentUserId = (int) session()->get('user_id');
            $isspRecordModel = new ISspRecordModel();
            $json = $this->request->getJSON(true);

            $formData = $json['form_data'] ?? [];
            $id = $json['id'] ?? null;

            $title = $formData['ict-projects-form']['internal_project_title'] ?? ($json['title'] ?? '');
            if (empty(trim($title))) {
                return $this->response->setJSON([
                    'success' => false,
                    'message' => 'Project title is required.'
                ]);
            }

            if ($id) {
                // Update existing record — preserve status if not a draft
                $existing = $isspRecordModel->find($id);
                $newStatus = 'draft';
                if ($existing && !empty($existing['status']) && $existing['status'] !== 'draft') {
                    $newStatus = $existing['status'];
                }
                $isspRecordModel->update($id, [
                    'title' => $title,
                    'description' => $formData['ict-projects-form']['internal_description'] ?? '',
                    'budget' => $formData['ict-projects-form']['internal_total_cost'] ?? 0,
                    'form_data' => json_encode($formData),
                    'status' => $newStatus,
                    'updated_at' => date('Y-m-d H:i:s'),
                ]);
            } else {
                // Create new draft
                $id = $isspRecordModel->insert([
                    'title' => $title,
                    'description' => $formData['ict-projects-form']['internal_description'] ?? '',
                    'budget' => $formData['ict-projects-form']['internal_total_cost'] ?? 0,
                    'department_id' => session()->get('department_id'),
                    'status' => 'draft',
                    'created_by' => $currentUserId,
                    'form_data' => json_encode($formData),
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ]);
            }

            $action = $id ? 'issp.draft_updated' : 'issp.draft_created';
            $this->writeLog($action, ($id ? 'Updated' : 'Created') . ' ISSP draft #' . $id, $formData['ict-projects-form']['internal_project_title'] ?? '');

            return $this->response->setJSON([
                'success' => true,
                'id' => $id,
                'message' => 'Draft saved successfully.'
            ]);

        } catch (\Exception $e) {
            return $this->response->setJSON([
                'success' => false,
                'message' => 'Error saving draft: ' . $e->getMessage()
            ]);
        }
    }

    public function editIctProject($id, $section)
    {
        $userModel = new UserModel();
        $currentUser = $userModel->findWithRole((int) session()->get('user_id'));

        $viewMap = [
            'network-infrastructure'   => 'frontend/employee/proposed-ict-strategy/network-infrastructure',
            'enterprise-architecture'  => 'frontend/employee/proposed-ict-strategy/enterprise-architecture',
            'ict-human-capital'        => 'frontend/employee/proposed-ict-strategy/ict-human-capital',
            'information-systems'      => 'frontend/employee/proposed-ict-strategy/information-systems',
            'ict-projects'             => 'frontend/employee/proposed-ict-strategy/ict-projects',
            'performance-measurement'  => 'frontend/employee/proposed-ict-strategy/performance-measurement',
        ];

        if (!isset($viewMap[$section])) {
            return redirect()->to(site_url('employee/edit-ict-project/' . $id . '/network-infrastructure'));
        }

        return view($viewMap[$section], [
            'title'     => 'Edit ICT Project',
            'active'    => $section,
            'currentUser' => $currentUser,
            'editMode'  => true,
            'editId'    => (int) $id,
        ]);
    }

    public function loadFormData($id)
    {
        $this->response->setContentType('application/json');

        try {
            $isspRecordModel = new ISspRecordModel();
            $record = $isspRecordModel->find($id);

            if (!$record) {
                return $this->response->setJSON([
                    'success' => false,
                    'message' => 'Record not found.'
                ]);
            }

            $formData = [];
            if (!empty($record['form_data'])) {
                $formData = json_decode($record['form_data'], true) ?? [];
            }

            return $this->response->setJSON([
                'success' => true,
                'form_data' => $formData
            ]);

        } catch (\Exception $e) {
            return $this->response->setJSON([
                'success' => false,
                'message' => $e->getMessage()
            ]);
        }
    }

    public function uploadFile()
    {
        $this->response->setContentType('application/json');

        try {
            $file = $this->request->getFile('file');
            if (!$file || !$file->isValid()) {
                return $this->response->setJSON([
                    'success' => false,
                    'message' => 'No valid file uploaded.'
                ]);
            }

            $uploadPath = FCPATH . 'uploads';
            if (!is_dir($uploadPath)) {
                mkdir($uploadPath, 0755, true);
            }

            $newName = $file->getRandomName();
            $file->move($uploadPath, $newName);

            return $this->response->setJSON([
                'success' => true,
                'path' => 'uploads/' . $newName,
                'name' => $file->getClientName(),
                'size' => $file->getSize(),
            ]);
        } catch (\Exception $e) {
            return $this->response->setJSON([
                'success' => false,
                'message' => $e->getMessage()
            ]);
        }
    }

    public function download(int $id)
    {
        $currentUserId = (int) session()->get('user_id');
        $isspModel = new ISspRecordModel();

        $project = $isspModel
            ->select('issp_records.*, departments.name AS department_name, users.name AS created_by_name')
            ->join('departments', 'departments.id = issp_records.department_id', 'left')
            ->join('users', 'users.id = issp_records.created_by', 'left')
            ->where('issp_records.id', $id)
            ->where('issp_records.created_by', $currentUserId)
            ->first();

        if ($project === null) {
            return redirect()->back()->with('error', 'Project not found.');
        }

        $formData = [];
        if (!empty($project['form_data'])) {
            $decoded = json_decode($project['form_data'], true);
            if (is_array($decoded)) {
                $formData = $decoded;
            }
        }

        $resourceModel = new ResourceRequirementModel();
        $resourceData = [
            'year1' => $resourceModel->getByYear(1),
            'year2' => $resourceModel->getByYear(2),
            'year3' => $resourceModel->getByYear(3),
            'generalSummary' => $resourceModel->getGeneralSummary(),
            'fundSource' => $resourceModel->getFundSourceSummary(),
            'statementOfExpenditure' => $resourceModel->getStatementOfExpenditureSummary(),
            'objectOfExpenditure' => $resourceModel->getObjectOfExpenditureSummary(),
        ];

        $agencyModel = new AgencyInformationModel();
        $agencyData = $agencyModel->orderBy('id', 'DESC')->first() ?? [];

        $viewData = [
            'project' => $project,
            'formData' => $formData,
            'resourceData' => $resourceData,
            'agencyData' => $agencyData,
            'batchMode' => false,
        ];

        $pageNumbers = $this->extractPageNumbers($viewData);

        $html = view('frontend/ict_planner/consolidation/pdf_template', array_merge($viewData, [
            'scanMode' => false,
            'pageNumbers' => $pageNumbers,
        ]));

        $dompdf = new \Dompdf\Dompdf();
        $dompdf->loadHtml(mb_convert_encoding($html, 'HTML-ENTITIES', 'UTF-8'));
        $dompdf->setPaper('A4', 'landscape');
        $dompdf->render();

        $filename = 'ISSP_' . preg_replace('/[^a-zA-Z0-9]/', '_', $project['title'] ?? 'submission') . '_' . $id . '.pdf';

        $dompdf->stream($filename, ['Attachment' => true]);
        exit;
    }

    private function extractPageNumbers(array $viewData): array
    {
        return [];
    }

    private function ensureFormDataColumn(): void
    {
        $db = \Config\Database::connect();
        if (!$db->fieldExists('form_data', 'issp_records')) {
            $db->query("ALTER TABLE issp_records ADD COLUMN form_data LONGTEXT NULL AFTER `status`");
        }
        if (!$db->fieldExists('updated_at', 'issp_records')) {
            $db->query("ALTER TABLE issp_records ADD COLUMN updated_at DATETIME NULL AFTER `created_at`");
        }
        if (!$db->fieldExists('remarks', 'issp_records')) {
            $db->query("ALTER TABLE issp_records ADD COLUMN remarks TEXT NULL AFTER `status`");
        }
        // Ensure ENUM includes returned and resubmitted
        $db->query("ALTER TABLE issp_records MODIFY COLUMN status ENUM('draft','pending','endorsed','approved','rejected','revision','returned','resubmitted') DEFAULT 'draft'");
        // Performance indexes
        $this->ensureIndex($db, 'issp_records', 'idx_status', 'status');
        $this->ensureIndex($db, 'issp_records', 'idx_created_by', 'created_by');
        $this->ensureIndex($db, 'issp_records', 'idx_created_at', 'created_at');
        $this->ensureIndex($db, 'issp_records', 'idx_status_created_by', 'status, created_by');
        $this->ensureIndex($db, 'logs', 'idx_user_id', 'user_id');
        $this->ensureIndex($db, 'logs', 'idx_action', 'action');
        $this->ensureIndex($db, 'logs', 'idx_created_at', 'created_at');
        $this->ensureIndex($db, 'ci_sessions', 'idx_timestamp', 'timestamp');
        // Session cleanup — remove expired sessions
        $db->query("DELETE FROM ci_sessions WHERE timestamp < UNIX_TIMESTAMP(DATE_SUB(NOW(), INTERVAL 24 HOUR))");
    }

    private function ensureIndex($db, string $table, string $indexName, string $columns): void
    {
        $result = $db->query("SHOW INDEX FROM `{$table}` WHERE Key_name = '{$indexName}'");
        if ($result->getNumRows() === 0) {
            $db->query("ALTER TABLE `{$table}` ADD INDEX `{$indexName}` ({$columns})");
        }
    }
}
