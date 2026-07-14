<?php

namespace App\Controllers\DirectorGeneral;

use App\Controllers\BaseController;
use App\Models\ISspRecordModel;

class ApprovedProjectsController extends BaseController
{
    public function index()
    {
        $query = trim((string) $this->request->getGet('q'));
        $dateRange = trim((string) $this->request->getGet('date_range'));
        $statusFilter = trim((string) $this->request->getGet('status'));

        $counts = [
            'approved'  => (new ISspRecordModel())->where('status', 'approved')->countAllResults(),
            'rejected'  => (new ISspRecordModel())->where('status', 'rejected')->countAllResults(),
            'returned'  => (new ISspRecordModel())->where('status', 'returned')->countAllResults(),
        ];

        $isspModel = new ISspRecordModel();
        $isspModel->select('issp_records.*, departments.name AS department_name, users.name AS created_by_name')
            ->join('departments', 'departments.id = issp_records.department_id', 'left')
            ->join('users', 'users.id = issp_records.created_by', 'left')
            ->whereIn('issp_records.status', ['approved', 'rejected', 'returned'])
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

        if ($statusFilter !== '' && in_array($statusFilter, ['approved', 'rejected', 'returned'])) {
            $isspModel->where('issp_records.status', $statusFilter);
        }

        $decidedProjects = $isspModel->findAll();

        foreach ($decidedProjects as &$project) {
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

        return view('frontend/director_general/approved_projects/index', [
            'title' => 'Reviewed Projects',
            'active' => 'approved-projects',
            'decidedProjects' => $decidedProjects,
            'query' => $query,
            'date_range' => $dateRange,
            'statusFilter' => $statusFilter,
            'statusCounts' => $counts,
        ]);
    }
}
