<?php

namespace App\Controllers\DirectorGeneral;

use App\Controllers\BaseController;
use App\Models\ISspRecordModel;

class PendingApprovalController extends BaseController
{
    public function index()
    {
        $isspModel = new ISspRecordModel();

        $query = trim((string) $this->request->getGet('q'));
        $dateRange = trim((string) $this->request->getGet('date_range'));

        $isspModel->select('issp_records.*, departments.name AS department_name, users.name AS created_by_name')
            ->join('departments', 'departments.id = issp_records.department_id', 'left')
            ->join('users', 'users.id = issp_records.created_by', 'left')
            ->whereIn('issp_records.status', ['endorsed'])
            ->orderBy('COALESCE(issp_records.updated_at, issp_records.created_at)', 'DESC', false);

        if ($query !== '') {
            $isspModel->like('issp_records.title', $query);
        }
        if ($dateRange !== '') {
            $dates = explode(' to ', $dateRange);
            if (count($dates) === 2) {
                $isspModel->where('issp_records.created_at >=', trim($dates[0]) . ' 00:00:00')
                    ->where('issp_records.created_at <=', trim($dates[1]) . ' 23:59:59');
            }
        }

        $pendingProjects = $isspModel->findAll();

        foreach ($pendingProjects as &$project) {
            $formData = [];
            if (!empty($project['form_data'])) {
                $decoded = json_decode($project['form_data'], true);
                if (is_array($decoded)) {
                    $formData = $decoded;
                }
            }
            $ict = $formData['ict-projects-form'] ?? [];
            $project['int_title'] = $ict['internal_project_title'] ?? $project['title'] ?? 'Untitled';
            $project['cross_title'] = $ict['cross_project_title'] ?? '';
            $project['int_desc'] = $ict['internal_description'] ?? $project['description'] ?? '---';
            $project['cross_desc'] = $ict['cross_description'] ?? '';
            $project['int_budget'] = $ict['internal_total_cost'] ?? $project['budget'] ?? 0;
            $project['cross_budget'] = $ict['cross_total_cost'] ?? 0;
        }
        unset($project);

        return view('frontend/director_general/pending_approval/index', [
            'title' => 'Pending Approval',
            'active' => 'pending-approval',
            'pendingProjects' => $pendingProjects,
            'query' => $query,
            'date_range' => $dateRange,
        ]);
    }
}
