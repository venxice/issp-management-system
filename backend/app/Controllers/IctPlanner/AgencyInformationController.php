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
            'title' => 'Stakeholder Analysis',
            'active' => 'stakeholder-analysis',
            'saved' => $this->loadAgencyData(),
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
        return redirect()->to('ict-planner/agency-information/stakeholder-analysis')->with('success', 'Stakeholder analysis saved successfully.');
    }

    public function strategicConcerns()
    {
        return view('frontend/ict_planner/agency_information/strategic_concerns', [
            'title' => 'Strategic Concerns',
            'active' => 'strategic-concerns',
        ]);
    }

    public function networkInfrastructure()
    {
        return view('frontend/ict_planner/agency_information/network_infrastructure', [
            'title' => 'Network Infrastructure',
            'active' => 'network-infrastructure',
        ]);
    }

    public function informationSystemsInventory()
    {
        return view('frontend/ict_planner/agency_information/information_systems_inventory', [
            'title' => 'Information Systems Inventory',
            'active' => 'information-systems-inventory',
        ]);
    }

    public function eGovernmentPrograms()
    {
        return view('frontend/ict_planner/agency_information/e_government_programs', [
            'title' => 'E-Government Programs',
            'active' => 'e-government-programs',
        ]);
    }
}
