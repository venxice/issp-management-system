<?php

namespace App\Controllers\Employee;

use App\Controllers\BaseController;
use App\Models\ResourceRequirementModel;

class ResourceRequirementsController extends BaseController
{
    protected $model;

    protected $categories = [
        'A. Office Productivity',
        'B. Internal ICT Projects',
        'C. Cross Agency ICT Projects',
        'D. Continuing Costs',
    ];

    protected $types = [
        'Capital Outlay (CO)',
        'Maintenance and Other Operating Expenses (MOOE)',
    ];

    public function __construct()
    {
        $this->model = new ResourceRequirementModel();
    }


    /*
    |--------------------------------------------------------------------------
    | GET CURRENT ISSP PROJECT ID
    |--------------------------------------------------------------------------
    */

    private function getCurrentProjectId(): ?int
    {
        /*
         * Primary key used by Resource Requirements.
         */
        $id = session()->get('edit_project_id');

        /*
         * Fallback to the existing ISSP project session.
         */
        if (!$id) {
            $id = session()->get('issp_record_id');
        }

        if (!$id) {
            return null;
        }

        $id = (int) $id;

        if ($id <= 0) {
            return null;
        }

        /*
         * Keep both session keys synchronized.
         */
        session()->set('edit_project_id', $id);
        session()->set('issp_record_id', $id);

        return $id;
    }


    /*
    |--------------------------------------------------------------------------
    | YEAR 1
    |--------------------------------------------------------------------------
    */

    public function year1Requirements(?int $projectId = null)
    {
        if ($projectId !== null && $projectId > 0) {
            session()->set('edit_project_id', $projectId);
            session()->set('issp_record_id', $projectId);
        }

        $isspRecordId = $this->getCurrentProjectId();

        $requirements = $this->model->getByYear(
            1,
            $isspRecordId
        );

        return view(
            'frontend/employee/resource-requirements/year1-requirements',
            [
                'title'        => 'Year 1 Resource Requirements',
                'requirements' => $requirements,
                'categories'   => $this->categories,
                'types'        => $this->types,
                'editId'       => $isspRecordId,
            ]
        );
    }


    /*
    |--------------------------------------------------------------------------
    | YEAR 2
    |--------------------------------------------------------------------------
    */

    public function year2Requirements(?int $projectId = null)
    {
        if ($projectId !== null && $projectId > 0) {
            session()->set('edit_project_id', $projectId);
            session()->set('issp_record_id', $projectId);
        }

        $isspRecordId = $this->getCurrentProjectId();

        $requirements = $this->model->getByYear(
            2,
            $isspRecordId
        );

        return view(
            'frontend/employee/resource-requirements/year2-requirements',
            [
                'title'        => 'Year 2 Resource Requirements',
                'requirements' => $requirements,
                'categories'   => $this->categories,
                'types'        => $this->types,
                'editId'       => $isspRecordId,
            ]
        );
    }


    /*
    |--------------------------------------------------------------------------
    | YEAR 3
    |--------------------------------------------------------------------------
    */

    public function year3Requirements(?int $projectId = null)
    {
        if ($projectId !== null && $projectId > 0) {
            session()->set('edit_project_id', $projectId);
            session()->set('issp_record_id', $projectId);
        }

        $isspRecordId = $this->getCurrentProjectId();

        $requirements = $this->model->getByYear(
            3,
            $isspRecordId
        );

        return view(
            'frontend/employee/resource-requirements/year3-requirements',
            [
                'title'        => 'Year 3 Resource Requirements',
                'requirements' => $requirements,
                'categories'   => $this->categories,
                'types'        => $this->types,
                'editId'       => $isspRecordId,
            ]
        );
    }


    /*
    |--------------------------------------------------------------------------
    | SUMMARY OF INVESTMENTS
    |--------------------------------------------------------------------------
    */

    public function summaryOfInvestments(?int $projectId = null)
    {
        if ($projectId !== null && $projectId > 0) {
            session()->set('edit_project_id', $projectId);
            session()->set('issp_record_id', $projectId);
        }

        $isspRecordId = $this->getCurrentProjectId();

        $generalSummary = [];
        $fundSourceSummary = [];
        $statementOfExpenditureSummary = [];
        $objectOfExpenditureSummary = [];

        if ($isspRecordId !== null) {

            $generalSummary =
                $this->model->getGeneralSummary(
                    $isspRecordId
                );

            $fundSourceSummary =
                $this->model->getFundSourceSummary(
                    $isspRecordId
                );

            $statementOfExpenditureSummary =
                $this->model->getStatementOfExpenditureSummary(
                    $isspRecordId
                );

            $objectOfExpenditureSummary =
                $this->model->getObjectOfExpenditureSummary(
                    $isspRecordId
                );
        }

        return view(
            'frontend/employee/resource-requirements/summary-of-investments',
            [
                'title' =>
                    'Summary of Investments',

                'active' =>
                    'summary-of-investments',

                'generalSummary' =>
                    $generalSummary,

                'fundSourceSummary' =>
                    $fundSourceSummary,

                'statementOfExpenditureSummary' =>
                    $statementOfExpenditureSummary,

                'objectOfExpenditureSummary' =>
                    $objectOfExpenditureSummary,

                'editId' =>
                    $isspRecordId,
            ]
        );
    }


    /*
    |--------------------------------------------------------------------------
    | STORE
    |--------------------------------------------------------------------------
    */

    public function store()
    {
        /*
         * Get active project from session.
         */
        $isspRecordId = $this->getCurrentProjectId();

        /*
         * Fallback to POST project ID.
         */
        if ($isspRecordId === null) {

            $postedProjectId =
                (int) $this->request->getPost(
                    'issp_record_id'
                );

            if ($postedProjectId > 0) {

                $isspRecordId = $postedProjectId;

                session()->set(
                    'edit_project_id',
                    $isspRecordId
                );

                session()->set(
                    'issp_record_id',
                    $isspRecordId
                );
            }
        }

        /*
         * No project = cannot save.
         */
        if ($isspRecordId === null) {

            return $this->response
                ->setStatusCode(400)
                ->setJSON([
                    'success' => false,
                    'message' =>
                        'No active ISSP project selected.'
                ]);
        }

        /*
         * Current user.
         */
        $userId =
            (int) session()->get('user_id');

        if ($userId <= 0) {

            return $this->response
                ->setStatusCode(401)
                ->setJSON([
                    'success' => false,
                    'message' =>
                        'User session not found.'
                ]);
        }

        /*
         * Resource requirement year.
         */
        $year =
            (int) (
                $this->request->getPost('year')
                ?? 1
            );

        if (!in_array($year, [1, 2, 3], true)) {

            return $this->response
                ->setStatusCode(400)
                ->setJSON([
                    'success' => false,
                    'message' =>
                        'Invalid resource requirement year.'
                ]);
        }

        /*
         * Resource requirement data.
         */
        $data = [
            'issp_record_id' =>
                $isspRecordId,

            'year' =>
                $year,

            'strategic_category' =>
                $this->request->getPost(
                    'strategic_category'
                ),

            'item' =>
                $this->request->getPost(
                    'item'
                ),

            'office' =>
                $this->request->getPost(
                    'office'
                ),

            'fund_source' =>
                $this->request->getPost(
                    'fund_source'
                ),

            'unit_cost' =>
                $this->request->getPost(
                    'unit_cost'
                ) ?? 0,

            'physical_target' =>
                $this->request->getPost(
                    'physical_target'
                ) ?? 0,

            'total_cost' =>
                $this->request->getPost(
                    'total_cost'
                ) ?? 0,

            'expenditure_type' =>
                $this->request->getPost(
                    'expenditure_type'
                ),

            'object_of_expenditure' =>
                $this->request->getPost(
                    'object_of_expenditure'
                ),

            'uacs_code' =>
                $this->request->getPost(
                    'uacs_code'
                ),

            'remarks' =>
                $this->request->getPost(
                    'remarks'
                ),

            'created_by' =>
                $userId,
        ];

        log_message(
            'debug',
            'RESOURCE REQUIREMENT SAVE: ' .
            json_encode($data)
        );

        $insertedId =
            $this->model->insert(
                $data,
                true
            );

        if ($insertedId === false) {

            return $this->response
                ->setStatusCode(500)
                ->setJSON([
                    'success' => false,
                    'message' =>
                        'Failed to save Resource Requirement.',
                    'errors' =>
                        $this->model->errors()
                ]);
        }

        return $this->response
            ->setJSON([
                'success' => true,
                'message' =>
                    'Resource Requirement added successfully.',
                'id' =>
                    $insertedId,
                'issp_record_id' =>
                    $isspRecordId,
            ]);
    }


    /*
    |--------------------------------------------------------------------------
    | UPDATE
    |--------------------------------------------------------------------------
    */

    public function update()
    {
        $isspRecordId =
            $this->getCurrentProjectId();

        if ($isspRecordId === null) {

            return redirect()
                ->back()
                ->with(
                    'error',
                    'No active ISSP project selected.'
                );
        }

        $id =
            (int) $this->request->getPost('id');

        if ($id <= 0) {

            return redirect()
                ->back()
                ->with(
                    'error',
                    'Invalid resource requirement ID.'
                );
        }

        /*
         * Only find records belonging
         * to the active project.
         */
        $requirement =
            $this->model
                ->where('id', $id)
                ->where(
                    'issp_record_id',
                    $isspRecordId
                )
                ->first();

        if (!$requirement) {

            return redirect()
                ->back()
                ->with(
                    'error',
                    'Resource Requirement not found.'
                );
        }

        $this->model->update(
            $id,
            [
                'strategic_category' =>
                    $this->request->getPost(
                        'strategic_category'
                    ),

                'item' =>
                    $this->request->getPost(
                        'item'
                    ),

                'office' =>
                    $this->request->getPost(
                        'office'
                    ),

                'uacs_code' =>
                    $this->request->getPost(
                        'uacs_code'
                    ),

                'fund_source' =>
                    $this->request->getPost(
                        'fund_source'
                    ),

                'unit_cost' =>
                    $this->request->getPost(
                        'unit_cost'
                    ),

                'physical_target' =>
                    $this->request->getPost(
                        'physical_target'
                    ),

                'total_cost' =>
                    $this->request->getPost(
                        'total_cost'
                    ),

                'object_of_expenditure' =>
                    $this->request->getPost(
                        'object_of_expenditure'
                    ),

                'expenditure_type' =>
                    $this->request->getPost(
                        'expenditure_type'
                    ),

                'remarks' =>
                    $this->request->getPost(
                        'remarks'
                    ),
            ]
        );

        return redirect()
            ->back()
            ->with(
                'success',
                'Resource Requirement updated successfully.'
            );
    }


    /*
    |--------------------------------------------------------------------------
    | DELETE
    |--------------------------------------------------------------------------
    */

    public function delete($id)
    {
        $isspRecordId =
            $this->getCurrentProjectId();

        if ($isspRecordId === null) {

            return redirect()
                ->back()
                ->with(
                    'error',
                    'No active ISSP project selected.'
                );
        }

        $id = (int) $id;

        if ($id <= 0) {

            return redirect()
                ->back()
                ->with(
                    'error',
                    'Invalid resource requirement ID.'
                );
        }

        /*
         * Only delete the selected row
         * if it belongs to the active project.
         */
        $requirement =
            $this->model
                ->where('id', $id)
                ->where(
                    'issp_record_id',
                    $isspRecordId
                )
                ->first();

        if (!$requirement) {

            return redirect()
                ->back()
                ->with(
                    'error',
                    'Resource Requirement not found.'
                );
        }

        $this->model->delete($id);

        return redirect()
            ->back()
            ->with(
                'success',
                'Resource Requirement deleted successfully.'
            );
    }
}