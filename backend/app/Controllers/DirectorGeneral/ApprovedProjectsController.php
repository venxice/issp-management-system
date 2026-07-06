<?php

namespace App\Controllers\DirectorGeneral;

use App\Controllers\BaseController;

class ApprovedProjectsController extends BaseController
{
    public function index()
    {
        return view('frontend/director_general/approved_projects/index', [
            'title' => 'Approved Projects',
            'active' => 'approved-projects',
        ]);
    }
}
