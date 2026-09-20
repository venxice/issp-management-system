<?php

namespace App\Controllers\Employee;

use App\Controllers\BaseController;
use App\Models\UserModel;

class ProposedIctStrategyController extends BaseController
{
    private UserModel $userModel;

    public function __construct()
    {
        $this->userModel = new UserModel();
    }

    private function getUserData()
    {
        $currentUserId = (int) session()->get('user_id');

        return $this->userModel->findWithRole($currentUserId);
    }

    public function networkInfrastructure()
    {
        return view('frontend/employee/proposed-ict-strategy/network-infrastructure', [
            'title'      => 'Proposed ICT Strategy',
            'active'     => 'network-infrastructure',
            'currentUser' => $this->getUserData(),
        ]);
    }

    public function saveNetworkInfrastructure()
    {
        $data = $this->request->getPost();

        return redirect()
            ->to('employee/proposed-ict-strategy/network-infrastructure')
            ->with('success', 'Network infrastructure saved successfully.');
    }

    public function informationSystems()
    {
        return view('frontend/employee/proposed-ict-strategy/information-systems', [
            'title'      => 'Proposed ICT Strategy',
            'active'     => 'information-systems',
            'currentUser' => $this->getUserData(),
        ]);
    }

    public function saveInformationSystems()
    {
        $data = $this->request->getPost();

        return redirect()
            ->to('employee/proposed-ict-strategy/information-systems')
            ->with('success', 'Information systems saved successfully.');
    }

    // =========================================================
    // ICT PROJECTS
    // =========================================================

    public function ictProjects()
    {
        return view('frontend/employee/proposed-ict-strategy/ict-projects', [
            'title'      => 'Proposed ICT Strategy',
            'active'     => 'ict-projects',
            'currentUser' => $this->getUserData(),
        ]);
    }

    public function saveIctProjects()
    {
        try {
            /*
             * The updated ICT Projects JavaScript sends JSON.
             * Read JSON first.
             */
            $data = $this->request->getJSON(true);

            /*
             * Fallback for regular POST requests.
             */
            if (!is_array($data)) {
                $data = $this->request->getPost();
            }

            /*
             * The frontend may send the data directly or
             * inside a "form_data" object.
             */
            if (isset($data['form_data']) && is_array($data['form_data'])) {
                $formData = $data['form_data'];
            } else {
                $formData = $data;
            }

            /*
             * Get current logged-in user.
             */
            $userId = (int) session()->get('user_id');

            if ($userId <= 0) {
                return $this->response
                    ->setStatusCode(401)
                    ->setJSON([
                        'success' => false,
                        'message' => 'User is not logged in.'
                    ]);
            }

            /*
             * Get the user's department.
             *
             * First try the actual user record.
             * If unavailable, fall back to the session.
             */
            $currentUser = $this->getUserData();

            $departmentId = (int) (
                $currentUser['department_id']
                ?? session()->get('department_id')
                ?? 0
            );

            /*
             * department_id is required by the foreign key
             * in issp_records.
             */
            if ($departmentId <= 0) {
                return $this->response
                    ->setStatusCode(400)
                    ->setJSON([
                        'success' => false,
                        'message' => 'No valid department is assigned to the current user.'
                    ]);
            }

            /*
             * ICT Project title is required.
             */
            $projectTitle = trim(
                (string) ($formData['internal_project_title'] ?? '')
            );

            if ($projectTitle === '') {
                return $this->response
                    ->setStatusCode(400)
                    ->setJSON([
                        'success' => false,
                        'message' => 'Internal Project Title is required.'
                    ]);
            }

            /*
             * Normalize Internal Total Cost.
             *
             * The normalized value remains inside form_data.
             */
            if (isset($formData['internal_total_cost'])) {
                $amount = str_replace(
                    ['₱', 'PHP', ',', ' '],
                    '',
                    (string) $formData['internal_total_cost']
                );

                $formData['internal_total_cost'] =
                    $amount !== '' ? (float) $amount : 0;
            }

            /*
             * ISSP Records model.
             */
            $model = new \App\Models\ISspRecordModel();

            /*
             * Check if an existing ISSP record is already associated
             * with this editing session.
             *
             * edit_project_id is preferred.
             * isspp_record_id is used as fallback.
             */
            $projectId = (int) session()->get('edit_project_id');

            if ($projectId <= 0) {
                $projectId = (int) session()->get('issp_record_id');
            }

            /*
             * =====================================================
             * UPDATE EXISTING RECORD
             * =====================================================
             */
            if ($projectId > 0) {

                $existing = $model
                    ->where('id', $projectId)
                    ->where('created_by', $userId)
                    ->first();

                if ($existing) {

                    /*
                     * IMPORTANT:
                     * internal_project_title and internal_total_cost
                     * are NOT separate columns in issp_records.
                     *
                     * They are stored inside form_data JSON.
                     */
                    $updateData = [
                        'department_id' => $departmentId,
                        'form_data'     => json_encode($formData),
                        'updated_at'    => date('Y-m-d H:i:s'),
                    ];

                    $model->update($projectId, $updateData);

                } else {

                    /*
                     * The ID exists in session but does not belong
                     * to the current user.
                     *
                     * Treat it as a new record.
                     */
                    $projectId = 0;
                }
            }

            /*
             * =====================================================
             * CREATE NEW RECORD
             * =====================================================
             */
            if ($projectId <= 0) {

                $insertData = [
                    'created_by'    => $userId,
                    'department_id' => $departmentId,
                    'form_data'     => json_encode($formData),
                    'status'        => 'draft',
                    'created_at'    => date('Y-m-d H:i:s'),
                    'updated_at'    => date('Y-m-d H:i:s'),
                ];

                $projectId = $model->insert($insertData, true);
            }

            /*
             * Make sure the insert/update actually returned an ID.
             */
            if (!$projectId) {
                throw new \RuntimeException(
                    'Failed to save ICT Projects record.'
                );
            }

            /*
             * =====================================================
             * SYNCHRONIZE SESSION IDS
             * =====================================================
             *
             * Resource Requirements will use this same ISSP record.
             */
            session()->set('edit_project_id', $projectId);
            session()->set('issp_record_id', $projectId);

            /*
             * Return JSON because the frontend uses fetch().
             */
            return $this->response
                ->setStatusCode(200)
                ->setJSON([
                    'success'        => true,
                    'id'             => $projectId,
                    'issp_record_id' => $projectId,
                    'message'        => 'ICT Projects saved successfully.'
                ]);

        } catch (\Throwable $e) {

            /*
             * Log the actual database/server error.
             */
            log_message(
                'error',
                'saveIctProjects error: ' . $e->getMessage()
            );

            /*
             * Return JSON instead of redirecting.
             */
            return $this->response
                ->setStatusCode(500)
                ->setJSON([
                    'success' => false,
                    'message' => 'Failed to save ICT Projects.',
                    'error'   => $e->getMessage()
                ]);
        }
    }

    // =========================================================
    // PERFORMANCE MEASUREMENT FRAMEWORK
    // =========================================================

    public function performanceMeasurement()
    {
        return view('frontend/employee/proposed-ict-strategy/performance-measurement', [
            'title'      => 'Proposed ICT Strategy',
            'active'     => 'performance-measurement',
            'currentUser' => $this->getUserData(),
        ]);
    }

    public function savePerformanceMeasurement()
    {
        $data = $this->request->getPost();

        return redirect()
            ->to('employee/proposed-ict-strategy/performance-measurement')
            ->with(
                'success',
                'Performance measurement framework saved successfully.'
            );
    }

    // =========================================================
    // ENTERPRISE ARCHITECTURE
    // =========================================================

    public function enterpriseArchitecture()
    {
        return view('frontend/employee/proposed-ict-strategy/enterprise-architecture', [
            'title'      => 'Proposed ICT Strategy',
            'active'     => 'enterprise-architecture',
            'currentUser' => $this->getUserData(),
        ]);
    }

    public function saveEnterpriseArchitecture()
    {
        $data = $this->request->getPost();

        return redirect()
            ->to('employee/proposed-ict-strategy/enterprise-architecture')
            ->with(
                'success',
                'Enterprise architecture saved successfully.'
            );
    }

    // =========================================================
    // ICT HUMAN CAPITAL
    // =========================================================

    public function ictHumanCapital()
    {
        return view('frontend/employee/proposed-ict-strategy/ict-human-capital', [
            'title'      => 'Proposed ICT Strategy',
            'active'     => 'ict-human-capital',
            'currentUser' => $this->getUserData(),
        ]);
    }

    public function saveIctHumanCapital()
    {
        $data = $this->request->getPost();

        return redirect()
            ->to('employee/proposed-ict-strategy/ict-human-capital')
            ->with(
                'success',
                'ICT human capital saved successfully.'
            );
    }
}