<?php

namespace App\Controllers\DirectorGeneral;

use App\Controllers\BaseController;

class PendingApprovalController extends BaseController
{
    public function index()
    {
        return view('frontend/director_general/pending_approval/index', [
            'title' => 'Pending Approval',
            'active' => 'pending-approval',
        ]);
    }
}
