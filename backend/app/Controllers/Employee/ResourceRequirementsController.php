<?php

namespace App\Controllers\Employee;

use App\Controllers\BaseController;
use App\Models\ResourceRequirementModel;

class ResourceRequirementsController extends BaseController
{
    protected $model;

    public function __construct()
    {
        $this->model = new ResourceRequirementModel();
    }

    public function year1Requirements()
    {
        $categories = [
            'A. Office Productivity',
            'B. Internal ICT Projects',
            'C. Cross Agency ICT Projects',
            'D. Continuing Costs'
        ];

        $types = [
            'Capital Outlay (CO)',
            'Maintenance and Other Operating Expenses (MOOE)'
        ];

        $requirements = $this->model->findAll(); // TEMP: later optimize/group

        return view('frontend/employee/resource-requirements/year1-requirements', [
            'title' => 'Resource Requirements',
            'active' => 'year1-requirements',
            'categories' => $categories,
            'types' => $types,
            'requirements' => $requirements,
        ]);
    }

    public function year2Requirements()
    {
        $categories = [
            'A. Office Productivity',
            'B. Internal ICT Projects',
            'C. Cross Agency ICT Projects',
            'D. Continuing Costs'
        ];

        $types = [
            'Capital Outlay (CO)',
            'Maintenance and Other Operating Expenses (MOOE)'
        ];

        $requirements = $this->model->findAll(); // TEMP: later optimize/group

        return view('frontend/employee/resource-requirements/year2-requirements', [
            'title' => 'Resource Requirements',
            'active' => 'year2-requirements',
            'categories' => $categories,
            'types' => $types,
            'requirements' => $requirements,
        ]);
    }

     public function year3Requirements()
    {
        $categories = [
            'A. Office Productivity',
            'B. Internal ICT Projects',
            'C. Cross Agency ICT Projects',
            'D. Continuing Costs'
        ];

        $types = [
            'Capital Outlay (CO)',
            'Maintenance and Other Operating Expenses (MOOE)'
        ];

        $requirements = $this->model->findAll(); // TEMP: later optimize/group

        return view('frontend/employee/resource-requirements/year3-requirements', [
            'title' =>  'Resource Requirements',
            'active' => 'year3-requirements',
            'categories' => $categories,
            'types' => $types,
            'requirements' => $requirements
        ]);
    }

 public function summaryOfInvestments()
{
   $categories = [
        'Office Productivity',
        'Internal ICT Projects',
        'Cross Agency ICT Projects',
        'Continuing Costs'
    ];

    $fundSource = [
    'General Appropriations Act (GAA)',
    'Foreign-Assisted',
    'Locally Funded',
    'Other Income Generating Sources'
];

    $statementOfExpenditure = [
        'Capital Outlay (CO)',
        'Maintenance and Other Operating Expenses (M00E)'
    ];

    $data = [
        'title' => 'Resource Requirements',
         'active' => 'summary-of-investments',

        'categories' => $categories,
        'fundSource' => $fundSource,
        'statementOfExpenditure' => $statementOfExpenditure,

        'generalSummary'      => $this->model->getgeneralSummary(),
        'fundSourceSummary'   => $this->model->getfundSourceSummary(),
        'statementOfExpenditureSummary'  => $this->model->getstatementOfExpenditureSummary(),
        'objectOfExpenditureSummary' => $this->model->getobjectOfExpenditureSummary()
    ];

    return view('frontend/employee/resource-requirements/summary-of-investments', $data);
}


        public function store()
        {

        dd($this->request->getPost());

        $this->model->save([
        'year'                  => 1,
        'strategic_category'    => $this->request->getPost('strategic_category'),
        'item'                  => $this->request->getPost('item'),
        'office'       => $this->request->getPost('office'),
        'uacs_code'           => $this->request->getPost('uacs_code'),
        'fund_source'             => $this->request->getPost('fund_source'),
        'unit_cost'       => $this->request->getPost('unit_cost'),
        'physical_target'            => $this->request->getPost('physical_target'),
        'total_cost'      => $this->request->getPost('total_cost'),
        'object_of_expenditure' => $this->request->getPost('object_of_expenditure'),
        'expenditure_type'             => $this->request->getPost('expenditure_type'),
        'remarks'               => $this->request->getPost('remarks'),
        'created_by'            => session()->get('user_id') ?? 1
    ]);

    return redirect()->back()->with('success', 'Resource Requirement added successfully.');
}

public function update()
{
    $id = $this->request->getPost('id');

    $this->model->update($id, [

        'strategic_category'    => $this->request->getPost('strategic_category'),
        'item'                  => $this->request->getPost('item'),
        'office'       => $this->request->getPost('office'),
        'fund_source'           => $this->request->getPost('fund_source'),
        'unit_cost'             => $this->request->getPost('unit_cost'),
        'physical_target'       => $this->request->getPost('physical_target'),
        'total_cost'            => $this->request->getPost('total_cost'),
        'object_of_expenditure' => $this->request->getPost('object_of_expenditure'),
        'expenditure_type'             => $this->request->getPost('expenditure_type'),
        'remarks'               => $this->request->getPost('remarks')

    ]);

    return redirect()->back()->with('success', 'Resource Requirement updated successfully.');
}

public function delete($id)
{
    $this->model->delete($id);

    return redirect()->back()->with('success', 'Resource Requirement deleted successfully.');
}
}