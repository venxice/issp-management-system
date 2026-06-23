<?php

namespace App\Controllers\Employee;

use App\Controllers\BaseController;
use App\Models\UserModel;
use App\Models\ISspRecordModel;

class DashboardController extends BaseController
{
    public function index()
    {
        $currentUserId = (int) session()->get('user_id');
        $userModel = new UserModel();
        $isspRecordModel = new ISspRecordModel();

        $recentRecords = $isspRecordModel->getRecentRecordsByUser($currentUserId, 10);

        $submittedProjects = count(array_filter($recentRecords, fn($r) => in_array($r['status'] ?? '', ['pending', 'approved', 'rejected'])));
        $approvedProjects = count(array_filter($recentRecords, fn($r) => ($r['status'] ?? '') === 'approved'));
        $needRevision = count(array_filter($recentRecords, fn($r) => ($r['status'] ?? '') === 'rejected'));
        $totalBudget = array_sum(array_column($recentRecords, 'budget'));

        return view('frontend/employee/dashboard/index', [
            'title' => 'Employee Dashboard',
            'active' => 'dashboard',
            'currentUser' => $userModel->findWithRole($currentUserId),
            'submittedProjects' => $submittedProjects, 
            'approvedProjects' => $approvedProjects, 
            'needRevision' => $needRevision, 
            'totalBudget' => $totalBudget,
            'recentRecords' => $recentRecords,
        ]);
    }

    public function submittedIctProjects()
    {
        $currentUserId = (int) session()->get('user_id');
        $userModel = new UserModel();
        $isspRecordModel = new ISspRecordModel();

        $submittedProjects = $isspRecordModel->getRecentRecordsByUser($currentUserId, 100);

        return view('frontend/employee/submitted-ict-projects/index', [
            'title' => 'Submitted ICT Projects',
            'active' => 'submitted-ict-projects',
            'currentUser' => $userModel->findWithRole($currentUserId),
            'submittedProjects' => $submittedProjects,
        ]);
    }

    public function draftIctProjects()
    {
        $currentUserId = (int) session()->get('user_id');
        $userModel = new UserModel();
        $isspRecordModel = new ISspRecordModel();

        $allProjects = $isspRecordModel->getRecentRecordsByUser($currentUserId, 100);
        $draftProjects = array_filter($allProjects, fn($r) => ($r['status'] ?? '') === 'draft');

        return view('frontend/employee/draft-ict-projects/index', [
            'title' => 'Draft ICT Projects',
            'active' => 'draft-ict-projects',
            'currentUser' => $userModel->findWithRole($currentUserId),
            'draftProjects' => $draftProjects,
        ]);
    }

    public function submitISSP()
    {
        $this->response->setContentType('application/json');

        try {
            $currentUserId = (int) session()->get('user_id');

            $postedToken = $this->request->getPost('csrf_token');
            $sessionToken = csrf_hash();

            if ($postedToken !== $sessionToken) {
                return $this->response->setJSON([
                    'success' => false,
                    'message' => 'Invalid security token. Please refresh the page and try again.'
                ]);
            }

            $isspRecordModel = new ISspRecordModel();

            return $this->response->setJSON([
                'success' => true,
                'message' => 'ISSP submitted successfully for review.'
            ]);

        } catch (\Exception $e) {
            return $this->response->setJSON([
                'success' => false,
                'message' => 'Error submitting ISSP: ' . $e->getMessage()
            ]);
        }
    }

    public function saveDraft()
    {
        $this->response->setContentType('application/json');

        try {
            $currentUserId = (int) session()->get('user_id');

            $postedToken = $this->request->getPost('csrf_token');
            $sessionToken = csrf_hash();

            if ($postedToken !== $sessionToken) {
                return $this->response->setJSON([
                    'success' => false,
                    'message' => 'Invalid security token. Please refresh the page and try again.'
                ]);
            }

            $isspRecordModel = new ISspRecordModel();

            return $this->response->setJSON([
                'success' => true,
                'message' => 'Draft saved successfully.'
            ]);

        } catch (\Exception $e) {
            return $this->response->setJSON([
                'success' => false,
                'message' => 'Error saving draft: ' . $e->getMessage()
            ]);
        }
    }
}
