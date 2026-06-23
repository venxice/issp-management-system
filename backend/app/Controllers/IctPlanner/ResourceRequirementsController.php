<?php

namespace App\Controllers\IctPlanner;

use App\Controllers\BaseController;
use App\Models\UserModel;

class ResourceRequirementsController extends BaseController
{
    protected $resourceModel;

    public function _construct()
    {
        $this->resourceModel = new ResourceRequirementModel();
    }

     private function getUserData()
    {
        $currentUserId = (int) session()->get('user_id');
        return $this->userModel->findWithRole($currentUserId);
    }

    public function index()
    {
            return view('ict_planner/resource_requirements/index', [
                'title' => 'Resource Requirements',
                'active' => 'resource-requirements',
            ]);
    }

    // YEAR 1 TABLE (A.1)
    public function year1()
    {
        $data['requirements'] = $this->resourceModel
        ->where('year', 1)
        ->findAll();

        $data['year'] = 1;
        $data['title'] = 'A.1 Year 1 Resource Requirements'

        return view('ict_planner/resource_requirements/year', $data);
    }

    // YEAR 2 TABLE (A.2)
    public function year2()
    {
        $data['requirements'] = $this->resourceModel
        ->where('year', 2)
        ->findAll();

        $data['year'] = 2;
        $data['title'] = 'A.2 Year 2 Resource Requirements'

        return view('ict_planner/resource_requirements/year', $data);
    }

 // YEAR 3 TABLE (A.3)
    public function year3()
    {
        $data['requirements'] = $this->resourceModel
        ->where('year', 3)
        ->findAll();

        $data['year'] = 3;
        $data['title'] = 'A.3 Year 3 Resource Requirements'

        return view('ict_planner/resource_requirements/year', $data);
    }

    // SUMMARY OF INVESTMENTS
    public function summary()
    {
       $model = $this->resourceModel;

       return view('/ict_planner/resource_requirements/summary', [
        'office_productivity' => $model->where('strategic_category', 'Office Productivity')->findAll(),
        'internal_projects' => $model->where('strategic_category', 'Internal ICT Projects')->findAll(),
        'cross_agency' => $model->where('strategic_category', 'Cross Agency ICT Projects')->findAll()
        'continuing_costs' => $model->where('strategic_category', 'Continuing Costs')->findAll(),
        
       ])

    }

    // Save
    public functon store()
    {
        $qty = $this->request->getPost('quantity')
        $unitCost = $this->request->getPost('unit_cost')

        $this->resourceModel->save([
            'year' => $this->request->getPost('year'),
            'item_name' => $this->request->getPost('item_name'),
            'strategic_category' => $this->request->getPost('strategic_category'),
            'office_location' => $this->request->getPost('office_location'),
            'fund_source' => $this->request->getPost('fund_source'),
            'expenditure_type' => $this->request->getPost('expenditure_type'),
            'uacs_code' => $this->request->getPost('uacs_code'),
            'object_of_expenditure' => $this->request->getPost('object_of_expenditure'),
            'physical_target' => $this->request->getPost('physical target'),
            'quantity' => $qty,
            'unit_cost' => $unitCost,
            'total_cost' => $qty * $unitCost,
            'description' => $this->request->getPost('description'),
            'created_by' => session()->get('user_id'),
            'status' => 'Draft'
        ])
        
        return redirect()->back()->with('success', 'Saved successfully.');
    }
     
    // Delete
    public function delete($id)
    {
       $this->resourceModel->delete($id);
       
       return redirect()->back()->with('success', 'Deleted successfully,');

    }


    public function submitForApproval($id)
    {
        $this->resourceModel->update($id, [
           'status' => 'Pending Approval'

        ]);

            return redirect()->back()->with('success', 'Submitted for approval.');
    }

    
    }
}