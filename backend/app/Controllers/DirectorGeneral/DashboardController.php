<?php

namespace App\Controllers\DirectorGeneral;

use App\Controllers\BaseController;
use App\Models\UserModel;
use App\Models\AuditLogModel;

class DashboardController extends BaseController
{
    public function index()
    {
        $currentUserId = (int) session()->get('user_id');
        $userModel = new UserModel();

        (new AuditLogModel())->insert([
            'user_id' => $currentUserId,
            'action' => 'dashboard.viewed',
            'description' => 'Viewed Director General dashboard',
            'created_at' => date('Y-m-d H:i:s'),
        ]);

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
