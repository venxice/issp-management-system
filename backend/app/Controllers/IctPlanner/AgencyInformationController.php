<?php

namespace App\Controllers\IctPlanner;

use App\Controllers\BaseController;
use App\Models\AgencyInformationModel;

class AgencyInformationController extends BaseController
{
    private function loadAgencyData(): array
    {
        $model = new AgencyInformationModel();
        $record = $model->getByUser((int) session()->get('user_id'));
        return $record ?? [];
    }

    private function saveSection(array $fields, string $redirectRoute, string $successMessage)
    {
        $model = new AgencyInformationModel();
        $data = [];
        foreach ($fields as $field) {
            $data[$field] = $this->request->getPost($field);
        }
        $model->upsert((int) session()->get('user_id'), $data);
        return redirect()->to($redirectRoute)->with('success', $successMessage);
    }

    public function mandateVisionMission()
    {
        return view('frontend/ict_planner/agency_information/mandate_vision_mission', [
            'title' => 'Mandate, Vision, Mission',
            'active' => 'mandate-vision-mission',
            'saved' => $this->loadAgencyData(),
        ]);
    }

    public function saveMandateVisionMission()
    {
        $fields = ['legal_basis', 'function', 'vision_statement', 'mission_statement', 'organizational_outcome'];
        return $this->saveSection($fields, 'ict-planner/agency-information/mandate-vision-mission', 'Mandate, vision, mission saved successfully.');
    }

    public function organizationalStructure()
    {
        return view('frontend/ict_planner/agency_information/organizational_structure', [
            'title' => 'Organizational Structure',
            'active' => 'organizational-structure',
            'saved' => $this->loadAgencyData(),
        ]);
    }

    public function saveOrganizationalStructure()
    {
        $fields = [
            'cio_name', 'cio_plantilla', 'cio_unit', 'cio_email', 'cio_contact',
            'focal_name', 'focal_position', 'focal_unit', 'focal_email', 'focal_contact',
            'plantilla_it', 'plantilla_non_it', 'plantilla_male', 'plantilla_female',
            'contractual_it', 'contractual_non_it', 'contractual_male', 'contractual_female',
            'outsourced_it', 'outsourced_non_it', 'outsourced_male', 'outsourced_female',
        ];
        return $this->saveSection($fields, 'ict-planner/agency-information/organizational-structure', 'Organizational structure saved successfully.');
    }

    public function stakeholderAnalysis()
{
    return view('frontend/ict_planner/agency_information/stakeholder_analysis', [
        'title'  => 'Stakeholder Analysis',
        'active' => 'stakeholder-analysis',
        'saved'  => $this->loadAgencyData(),
    ]);
}

public function saveStakeholderAnalysis()
{
    $model = new AgencyInformationModel();

    $names = $this->request->getPost('stakeholder_name') ?? [];
    $transactions = $this->request->getPost('stakeholder_transaction') ?? [];
    $complexities = $this->request->getPost('stakeholder_complexity') ?? [];

    $stakeholders = [];

    foreach ($names as $i => $name) {
        if (trim($name) !== '') {
            $stakeholders[] = [
                'name' => $name,
                'transaction' => $transactions[$i] ?? '',
                'complexity' => $complexities[$i] ?? '',
            ];
        }
    }

    $model->upsert((int) session()->get('user_id'), [
        'stakeholder_data' => json_encode($stakeholders),
    ]);

    return redirect()
        ->to(site_url('ict-planner/agency-information/stakeholder-analysis'))
        ->with('success', 'Stakeholder analysis saved successfully.');
}

   public function strategicConcerns()
{
    $saved = $this->loadAgencyData();

    return view('frontend/ict_planner/agency_information/strategic_concerns', [
        'title'  => 'Strategic Concerns',
        'active' => 'strategic-concerns',
        'saved'  => $saved,
    ]);
}

public function savestrategicConcerns()
{
    $model = new AgencyInformationModel();

    $ooMfo = $this->request->getPost('concerns_oo_so_mfo') ?? [];
    $critical = $this->request->getPost('concerns_critical') ?? [];
    $problem = $this->request->getPost('concerns_problem') ?? [];
    $intended = $this->request->getPost('concerns_intended_use') ?? [];

    $concerns = [];

    $rowCount = max(
        count($ooMfo),
        count($critical),
        count($problem),
        count($intended)
    );

    for ($i = 0; $i < $rowCount; $i++) {

        $concerns[] = [
            'oo_so_mfo'     => $ooMfo[$i] ?? '',
            'critical'      => $critical[$i] ?? '',
            'problem'       => $problem[$i] ?? '',
            'intended_use'  => $intended[$i] ?? '',
        ];
    }

    $model->upsert((int) session()->get('user_id'), [
        'strategic_concerns_data' => json_encode($concerns),
    ]);

    return redirect()
        ->to('ict-planner/agency-information/strategic-concerns')
        ->with('success', 'Strategic concerns saved successfully.');
}

    public function networkInfrastructure()
{
    $saved = $this->loadAgencyData();

    return view('frontend/ict_planner/agency_information/network_infrastructure', [
        'title'  => 'Network Infrastructure',
        'active' => 'network-infrastructure',
        'saved'  => $saved,
    ]);
}

public function savenetworkInfrastructure()
{
    $model = new AgencyInformationModel();

    $data = $this->request->getPost();

    /*
     * Remove CSRF token from saved JSON if present.
     */
    unset($data[csrf_token()]);

    /*
     * Save uploaded file paths coming from
     * data-uploaded-path attributes.
     */
    $fileFields = [
        'dept_network_diagram',
        'regional_network_diagram',
    ];

    foreach ($fileFields as $field) {
        $uploadedPath = $this->request->getPost($field . '_uploaded_path');

        if (!empty($uploadedPath)) {
            $data[$field] = $uploadedPath;
        }
    }

    $model->upsert((int) session()->get('user_id'), [
        'network_infrastructure_data' => json_encode($data),
    ]);

    return redirect()
        ->to('ict-planner/agency-information/network-infrastructure')
        ->with('success', 'Network infrastructure saved successfully.');
}

    public function informationSystemsInventory()
{
    return view('frontend/ict_planner/agency_information/information_systems_inventory', [
        'title'  => 'Information Systems Inventory',
        'active' => 'information-systems-inventory',
        'saved'  => $this->loadAgencyData(),
    ]);
}

public function saveinformationSystemsInventory()
{
    $post = $this->request->getPost();

    $userId = (int) session()->get('user_id');

    if (!$userId) {
        return redirect()->back()->with('error', 'User session not found.');
    }

    $informationSystems = [];

    foreach ($post as $key => $value) {

        if (preg_match('/^is_name_(\d+)$/', $key, $match)) {

            $index = $match[1];

            $informationSystems[] = [
                'system_name'       => $value,
                'status'            => $post["status_$index"] ?? '',
                'classification'    => $post["classification_$index"] ?? '',
                'description'       => $post["description_$index"] ?? '',

                'deployment'        => $post["deployment_approach_$index"] ?? '',
                'owner'             => $post["owner_$index"] ?? '',
                'dev_strategy'      => $post["dev_strategy_$index"] ?? '',

                'platform'          => $post["platform_$index"] ?? '',
                'database'          => $post["database_$index"] ?? '',
                'storage'           => $post["storage_$index"] ?? '',

                'internal_users'    => $post["internal_users_$index"] ?? '',
                'external_users'    => $post["external_users_$index"] ?? '',

                'system_usage'      => $post["system_usage_$index"] ?? '',
                'deployment_type'   => $post["deployment_type_$index"] ?? '',
                'online_link'       => $post["online_link_$index"] ?? '',

                'interop_main'      => $post["interop{$index}_main"] ?? '',
                'interop_internal'  => $post["interop{$index}_internal_system"] ?? '',
                'interop_external'  => $post["interop{$index}_external_system"] ?? '',
                'interop_sub'       => $post["interop{$index}_sub"] ?? '',

                'pia'               => $post["pia_$index"] ?? '',
            ];
        }
    }

    $model = new AgencyInformationModel();

    $model->upsert($userId, [
        'information_systems_inventory_data' => json_encode(
            $informationSystems,
            JSON_UNESCAPED_UNICODE
        ),
    ]);

    return redirect()
        ->to(site_url('ict-planner/agency-information/information-systems-inventory'))
        ->with('success', 'Information Systems Inventory saved successfully.');
}

  public function eGovernmentPrograms()
{
    $record = $this->loadAgencyData();

    $saved = [];

    if (!empty($record['e_government_programs_data'])) {
        $decoded = json_decode($record['e_government_programs_data'], true);

        if (is_array($decoded)) {
            $saved = $decoded;
        }
    }

    $data = [
        'title'  => 'E-Government Programs',
        'active' => 'e-government-programs',

        'programs' => [
            [
                'id' => 1,
                'title' => 'Government Digital Payment System (eGovPay)',
                'description' => 'Government payment gateway for online and over-the-counter payments.',
            ],
            [
                'id' => 2,
                'title' => 'Government Public Key Infrastructure (PNPKI)',
                'description' => 'Digital certificate infrastructure.',
            ],
            [
                'id' => 3,
                'title' => 'Human Capital Management Information System',
                'description' => 'Centralized HRIS.',
            ]
        ],

        'saved' => $saved,
    ];

    return view(
        'frontend/ict_planner/agency_information/e_government_programs',
        $data
    );
}


public function saveeGovernmentPrograms()
{
    $userId = (int) session()->get('user_id');

    if (!$userId) {
        return redirect()
            ->to('login')
            ->with('error', 'User session not found.');
    }

    $programs = [1, 2, 3];

    $savedData = [];

    foreach ($programs as $programId) {

        $savedData['program_' . $programId] =
            $this->request->getPost('program_' . $programId) ?? '';

        $savedData['program_' . $programId . '_equivalent_system'] =
            $this->request->getPost(
                'program_' . $programId . '_equivalent_system'
            ) !== null;

        $savedData['program_' . $programId . '_manual_processing'] =
            $this->request->getPost(
                'program_' . $programId . '_manual_processing'
            ) !== null;

        $savedData['program_' . $programId . '_proposed_development'] =
            $this->request->getPost(
                'program_' . $programId . '_proposed_development'
            ) !== null;
    }

    $model = new \App\Models\AgencyInformationModel();

    // Hanapin ang existing agency_information record
    // ng currently logged-in user.
    $record = $model
        ->where('created_by', $userId)
        ->first();

    $data = [
        'e_government_programs_data' => json_encode(
            $savedData,
            JSON_UNESCAPED_UNICODE
        )
    ];

    if ($record) {

        // Existing record → UPDATE
        $model->update(
            $record['id'],
            $data
        );

    } else {

        // Walang existing record → CREATE
        $data['created_by'] = $userId;

        $model->insert($data);
    }

    return redirect()
        ->to('ict-planner/agency-information/e-government-programs')
        ->with(
            'success',
            'E-Government programs saved successfully.'
        );
}

public function uploadFile()
{
    $file = $this->request->getFile('file');

    if (!$file || !$file->isValid()) {
        return $this->response->setJSON([
            'success' => false,
            'message' => 'Invalid file.'
        ]);
    }

    $newName = $file->getRandomName();

    $file->move(FCPATH . 'uploads', $newName);

    return $this->response->setJSON([
        'success' => true,
        'path'    => 'uploads/' . $newName,
        'name'    => $file->getClientName()
    ]);
}
}