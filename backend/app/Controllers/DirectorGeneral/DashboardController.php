<?php

namespace App\Controllers\DirectorGeneral;

use App\Controllers\BaseController;
use App\Models\UserModel;

class DashboardController extends BaseController
{
    public function index()
    {
        $currentUserId = (int) session()->get('user_id');
        $userModel = new UserModel();

        return view('frontend/director_general/dashboard/index', [
            'title' => 'Director General Dashboard',
            'active' => 'dashboard',
            'currentUser' => $userModel->findWithRole($currentUserId),
            'pendingApproval' => 0, 
            'totalApprovedProjects' => 0, 
            'totalProposedBudget' => 0, 
            'totalDepartments' => (new \App\Models\DepartmentModel())->countAllResults(),
        ]);
    }
}
