<?php

namespace App\Controllers\Employee;

use App\Controllers\BaseController;
use App\Models\UserModel;

class DashboardController extends BaseController
{
    public function index()
    {
        $currentUserId = (int) session()->get('user_id');
        $userModel = new UserModel();

        return view('frontend/employee/dashboard/index', [
            'title' => 'Employee Dashboard',
            'active' => 'dashboard',
            'currentUser' => $userModel->findWithRole($currentUserId),
            'submittedProjects' => 0, 
            'approvedProjects' => 0, 
            'needRevision' => 0, 
            'totalBudget' => 0, 
        ]);
    }
}
