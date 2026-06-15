<?php

namespace App\Controllers;

class DashboardController extends BaseController
{
    public function index()
    {
        $roleSlug = (string) session()->get('role_slug');
        $pathMap = [
            'admin' => 'admin/dashboard',
            'director_general' => 'director-general/dashboard',
            'employee' => 'employee/dashboard',
            'ict_planner' => 'ict-planner/dashboard',
        ];

        return redirect()->to(site_url($pathMap[$roleSlug] ?? 'employee/dashboard'));
    }
}
