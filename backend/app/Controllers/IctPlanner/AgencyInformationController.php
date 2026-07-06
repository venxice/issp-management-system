<?php

namespace App\Controllers\IctPlanner;

use App\Controllers\BaseController;

class AgencyInformationController extends BaseController
{
    public function mandateVisionMission()
    {
        return view('frontend/ict_planner/agency_information/mandate_vision_mission', [
            'title' => 'Mandate, Vision, Mission',
            'active' => 'mandate-vision-mission',
        ]);
    }

    public function saveMandateVisionMission()
    {
        $data = $this->request->getPost();

        return redirect()->to('ict-planner/agency-information/mandate-vision-mission')->with('success', 'Mandate, vision, mission saved successfully.');
    }

    public function organizationalStructure()
    {
        return view('frontend/ict_planner/agency_information/organizational_structure', [
            'title' => 'Organizational Structure',
            'active' => 'organizational-structure',
        ]);
    }

    public function saveOrganizationalStructure()
    {
        $data = $this->request->getPost();

        return redirect()->to('ict-planner/agency-information/organizational-structure')->with('success', 'Organizational structure saved successfully.');
    }

    public function stakeholderAnalysis()
    {
        return view('frontend/ict_planner/agency_information/stakeholder_analysis', [
            'title' => 'Stakeholder Analysis',
            'active' => 'stakeholder-analysis',
        ]);
    }

    public function saveStakeholderAnalysis()
    {
        $data = $this->request->getPost();

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
