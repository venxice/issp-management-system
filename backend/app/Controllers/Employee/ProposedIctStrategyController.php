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
            'title' => 'Proposed ICT Strategy',
            'active' => 'network-infrastructure',
            'currentUser' => $this->getUserData(),
        ]);
    }

    public function saveNetworkInfrastructure()
    {
        $data = $this->request->getPost();


        return redirect()->to('employee/proposed-ict-strategy/network-infrastructure')->with('success', 'Network infrastructure saved successfully.');
    }

    public function informationSystems()
    {
        return view('frontend/employee/proposed-ict-strategy/information-systems', [
            'title' => 'Proposed ICT Strategy',
            'active' => 'information-systems',
            'currentUser' => $this->getUserData(),
        ]);
    }

    public function saveInformationSystems()
    {
        $data = $this->request->getPost();

        return redirect()->to('employee/proposed-ict-strategy/information-systems')->with('success', 'Information systems saved successfully.');
    }

    // ICT Projects
    public function ictProjects()
    {
        return view('frontend/employee/proposed-ict-strategy/ict-projects', [
            'title' => 'Proposed ICT Strategy',
            'active' => 'ict-projects',
            'currentUser' => $this->getUserData(),
        ]);
    }

    public function saveIctProjects()
    {
        $data = $this->request->getPost();


        return redirect()->to('employee/proposed-ict-strategy/ict-projects')->with('success', 'ICT projects saved successfully.');
    }

    // Performance Measurement Framework
    public function performanceMeasurement()
    {
        return view('frontend/employee/proposed-ict-strategy/performance-measurement', [
            'title' => 'Proposed ICT Strategy',
            'active' => 'performance-measurement',
            'currentUser' => $this->getUserData(),
        ]);
    }

    public function savePerformanceMeasurement()
    {
        $data = $this->request->getPost();

        return redirect()->to('employee/proposed-ict-strategy/performance-measurement')->with('success', 'Performance measurement framework saved successfully.');
    }

    // Enterprise Architecture
    public function enterpriseArchitecture()
    {
        return view('frontend/employee/proposed-ict-strategy/enterprise-architecture', [
            'title' => 'Proposed ICT Strategy',
            'active' => 'enterprise-architecture',
            'currentUser' => $this->getUserData(),
        ]);
    }

    public function saveEnterpriseArchitecture()
    {
        $data = $this->request->getPost();

        return redirect()->to('employee/proposed-ict-strategy/enterprise-architecture')->with('success', 'Enterprise architecture saved successfully.');
    }

    // ICT Human Capital
    public function ictHumanCapital()
    {
        return view('frontend/employee/proposed-ict-strategy/ict-human-capital', [
            'title' => 'Proposed ICT Strategy',
            'active' => 'ict-human-capital',
            'currentUser' => $this->getUserData(),
        ]);
    }

    public function saveIctHumanCapital()
    {
        $data = $this->request->getPost();

        return redirect()->to('employee/proposed-ict-strategy/ict-human-capital')->with('success', 'ICT human capital saved successfully.');
    }
}
