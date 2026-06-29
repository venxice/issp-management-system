<?php

namespace App\Controllers\Employee;

use App\Controllers\BaseController;
use App\Models\UserModel;
use App\Models\ISspRecordModel;
use App\Models\AuditLogModel;

class DashboardController extends BaseController
{
    public function index()
    {
        $currentUserId = (int) session()->get('user_id');
        $userModel = new UserModel();
        $isspRecordModel = new ISspRecordModel();

        $recentRecords = $isspRecordModel->getRecentRecordsByUser($currentUserId, 10);

        $submittedProjects = count(array_filter($recentRecords, fn($r) => in_array($r['status'] ?? '', ['pending', 'approved', 'rejected'])));
        $approvedProjects = count(array_filter($recentRecords, fn($r) => ($r['status'] ?? '') === 'approved'));
        $needRevision = count(array_filter($recentRecords, fn($r) => ($r['status'] ?? '') === 'rejected'));
        $totalBudget = array_sum(array_column($recentRecords, 'budget'));

        return view('frontend/employee/dashboard/index', [
            'title' => 'Employee Dashboard',
            'active' => 'dashboard',
            'currentUser' => $userModel->findWithRole($currentUserId),
            'submittedProjects' => $submittedProjects, 
            'approvedProjects' => $approvedProjects, 
            'needRevision' => $needRevision, 
            'totalBudget' => $totalBudget,
            'recentRecords' => $recentRecords,
        ]);
    }

    public function submittedIctProjects()
    {
        $currentUserId = (int) session()->get('user_id');
        $userModel = new UserModel();
        $isspRecordModel = new ISspRecordModel();

        $allRecords = $isspRecordModel->getRecentRecordsByUser($currentUserId, 100);
        $submittedProjects = array_filter($allRecords, fn($r) => ($r['status'] ?? '') !== 'draft');

        return view('frontend/employee/submitted-ict-projects/index', [
            'title' => 'Submitted ICT Projects',
            'active' => 'submitted-ict-projects',
            'currentUser' => $userModel->findWithRole($currentUserId),
            'submittedProjects' => $submittedProjects,
        ]);
    }

    public function draftIctProjects()
    {
        $currentUserId = (int) session()->get('user_id');
        $userModel = new UserModel();
        $isspRecordModel = new ISspRecordModel();

        $allProjects = $isspRecordModel->getRecentRecordsByUser($currentUserId, 100);
        $draftProjects = array_filter($allProjects, fn($r) => ($r['status'] ?? '') === 'draft');

        return view('frontend/employee/draft-ict-projects/index', [
            'title' => 'Draft ICT Projects',
            'active' => 'draft-ict-projects',
            'currentUser' => $userModel->findWithRole($currentUserId),
            'draftProjects' => $draftProjects,
        ]);
    }

    public function submitISSP()
    {
        $this->response->setContentType('application/json');

        try {
            $this->ensureFormDataColumn();

            $isspRecordModel = new ISspRecordModel();
            $json = $this->request->getJSON(true);

            $id = $json['id'] ?? null;
            if (!$id) {
                // Create a new submission record
                $currentUserId = (int) session()->get('user_id');
                $formData = $json['form_data'] ?? [];
                if (!$this->isFormComplete($formData)) {
                    return $this->response->setJSON([
                        'success' => false,
                        'message' => 'Please complete all required fields before submitting.'
                    ]);
                }
                $id = $isspRecordModel->insert([
                    'title' => $formData['ict-projects-form']['internal_project_title'] ?? 'ISSP Submission',
                    'description' => $formData['ict-projects-form']['internal_description'] ?? '',
                    'budget' => $formData['ict-projects-form']['internal_total_cost'] ?? 0,
                    'department_id' => session()->get('department_id'),
                    'status' => 'pending',
                    'created_by' => $currentUserId,
                    'form_data' => json_encode($formData),
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ]);
            } else {
                // Update existing record
                $formData = $json['form_data'] ?? [];
                if (empty($formData)) {
                    // Form data not sent in request — load from DB (draft table submit)
                    $record = $isspRecordModel->find($id);
                    if ($record && !empty($record['form_data'])) {
                        $formData = json_decode($record['form_data'], true) ?? [];
                    }
                }
                if (!$this->isFormComplete($formData)) {
                    return $this->response->setJSON([
                        'success' => false,
                        'message' => 'Please complete all required fields before submitting.'
                    ]);
                }
                $updateData = ['status' => 'pending', 'updated_at' => date('Y-m-d H:i:s')];
                if (!empty($formData)) {
                    $updateData['form_data'] = json_encode($formData);
                    $updateData['title'] = $formData['ict-projects-form']['internal_project_title'] ?? $updateData['title'] ?? 'ISSP Submission';
                    $updateData['description'] = $formData['ict-projects-form']['internal_description'] ?? '';
                    $updateData['budget'] = $formData['ict-projects-form']['internal_total_cost'] ?? 0;
                }
                $isspRecordModel->update($id, $updateData);
            }

            $this->writeLog('issp.submitted', 'Submitted ISSP #' . $id, $json['form_data']['ict-projects-form']['internal_project_title'] ?? '');

            return $this->response->setJSON([
                'success' => true,
                'id' => $id,
                'message' => 'ISSP submitted successfully for review.'
            ]);

        } catch (\Exception $e) {
            return $this->response->setJSON([
                'success' => false,
                'message' => $e->getMessage()
            ]);
        }
    }

    private function isFormComplete(array $formData): bool
    {
        $requiredKeys = [
            'network-infrastructure-form',
            'enterprise-architecture-form',
            'ict-human-capital-form',
            'information-systems-form',
            'ict-projects-form',
            'performance-measurement-form'
        ];

        // Project title is required
        $title = $formData['ict-projects-form']['internal_project_title'] ?? '';
        if (trim($title) === '') {
            return false;
        }

        // Each section must have at least one non-empty field
        foreach ($requiredKeys as $key) {
            if (empty($formData[$key]) || !is_array($formData[$key])) {
                return false;
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
                return false;
            }
        }

        return true;
    }

    private function writeLog(string $action, string $description, string $title = ''): void
    {
        $cleanData = [];
        $json = $this->request->getJSON(true);
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

            if ($id) {
                // Update existing draft
                $isspRecordModel->update($id, [
                    'title' => $formData['ict-projects-form']['internal_project_title'] ?? ($json['title'] ?? 'ISSP Draft'),
                    'description' => $formData['ict-projects-form']['internal_description'] ?? '',
                    'budget' => $formData['ict-projects-form']['internal_total_cost'] ?? 0,
                    'form_data' => json_encode($formData),
                    'status' => 'draft',
                    'updated_at' => date('Y-m-d H:i:s'),
                ]);
            } else {
                // Create new draft
                $id = $isspRecordModel->insert([
                    'title' => $formData['ict-projects-form']['internal_project_title'] ?? 'ISSP Draft',
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

    private function ensureFormDataColumn(): void
    {
        $db = \Config\Database::connect();
        if (!$db->fieldExists('form_data', 'issp_records')) {
            $db->query("ALTER TABLE issp_records ADD COLUMN form_data LONGTEXT NULL AFTER `status`");
        }
        if (!$db->fieldExists('updated_at', 'issp_records')) {
            $db->query("ALTER TABLE issp_records ADD COLUMN updated_at DATETIME NULL AFTER `created_at`");
        }
    }
}
