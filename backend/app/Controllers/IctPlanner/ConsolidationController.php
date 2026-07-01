<?php

namespace App\Controllers\IctPlanner;

use App\Controllers\BaseController;
use App\Models\ISspRecordModel;

class ConsolidationController extends BaseController
{
    public function index()
    {
        $query = trim((string) $this->request->getGet('q'));
        $dateRange = trim((string) $this->request->getGet('date_range'));
        $page = (int) ($this->request->getGet('page') ?? 1);
        $perPage = 25;

        $isspModel = new ISspRecordModel();

        if ($query !== '') {
            $isspModel->groupStart()
                ->like('issp_records.title', $query)
                ->orLike('users.name', $query)
                ->orLike('departments.name', $query)
                ->groupEnd();
        }

        if ($dateRange !== '') {
            $dates = explode(' to ', $dateRange);
            if (count($dates) === 2) {
                $isspModel->where('issp_records.created_at >=', trim($dates[0]) . ' 00:00:00')
                    ->where('issp_records.created_at <=', trim($dates[1]) . ' 23:59:59');
            }
        }

        $builder = $isspModel
            ->select('issp_records.*, departments.name AS department_name, users.name AS created_by_name')
            ->join('departments', 'departments.id = issp_records.department_id', 'left')
            ->join('users', 'users.id = issp_records.created_by', 'left')
            ->where('issp_records.status !=', 'draft')
            ->orderBy('issp_records.created_at', 'DESC');

        $total = $builder->countAllResults(false);
        $projects = $builder->paginate($perPage, 'default', $page);
        $pager = $isspModel->pager;

        return view('frontend/ict_planner/consolidation/index', [
            'title' => 'Consolidation',
            'active' => 'consolidation',
            'projects' => $projects,
            'query' => $query,
            'date_range' => $dateRange,
            'pager' => $pager,
            'total' => $total,
            'perPage' => $perPage,
            'currentPage' => $page,
        ]);
    }

    public function viewFull(int $id)
    {
        $isspModel = new ISspRecordModel();

        $project = $isspModel
            ->select('issp_records.*, departments.name AS department_name, users.name AS created_by_name')
            ->join('departments', 'departments.id = issp_records.department_id', 'left')
            ->join('users', 'users.id = issp_records.created_by', 'left')
            ->where('issp_records.id', $id)
            ->first();

        if ($project === null) {
            return redirect()->to('ict-planner/consolidation')->with('error', 'Project not found.');
        }

        $formData = [];
        if (!empty($project['form_data'])) {
            $decoded = json_decode($project['form_data'], true);
            if (is_array($decoded)) {
                $formData = $decoded;
            }
        }

        return view('frontend/ict_planner/consolidation/view_full', [
            'title' => 'View Full Submission',
            'active' => 'consolidation',
            'project' => $project,
            'formData' => $formData,
        ]);
    }

    private function loadProject(int $id): ?array
    {
        $isspModel = new ISspRecordModel();

        $project = $isspModel
            ->select('issp_records.*, departments.name AS department_name, users.name AS created_by_name')
            ->join('departments', 'departments.id = issp_records.department_id', 'left')
            ->join('users', 'users.id = issp_records.created_by', 'left')
            ->where('issp_records.id', $id)
            ->first();

        return $project ?: null;
    }

    private function extractFormData(array $project): array
    {
        $formData = [];
        if (!empty($project['form_data'])) {
            $decoded = json_decode($project['form_data'], true);
            if (is_array($decoded)) {
                $formData = $decoded;
            }
        }
        return $formData;
    }

    public function download(int $id)
    {
        $project = $this->loadProject($id);

        if ($project === null) {
            return redirect()->to('ict-planner/consolidation')->with('error', 'Project not found.');
        }

        $formData = $this->extractFormData($project);

        $html = view('frontend/ict_planner/consolidation/pdf_template', [
            'project' => $project,
            'formData' => $formData,
            'batchMode' => false,
        ]);

        $dompdf = new \Dompdf\Dompdf();
        $dompdf->loadHtml(mb_convert_encoding($html, 'HTML-ENTITIES', 'UTF-8'));
        $dompdf->setPaper('A4', 'landscape');
        $dompdf->render();

        $filename = 'ISSP_' . preg_replace('/[^a-zA-Z0-9]/', '_', $project['title'] ?? 'submission') . '_' . $id . '.pdf';

        $dompdf->stream($filename, ['Attachment' => true]);
        exit;
    }

    public function batchDownload()
    {
        $projectIds = $this->request->getPost('project_ids');
        if (empty($projectIds) || !is_array($projectIds)) {
            return redirect()->to('ict-planner/consolidation')->with('error', 'No projects selected.');
        }

        $projectIds = array_map('intval', $projectIds);
        $allHtml = '';
        $count = 0;

        foreach ($projectIds as $id) {
            $project = $this->loadProject($id);
            if ($project === null) continue;

            $formData = $this->extractFormData($project);

            $html = view('frontend/ict_planner/consolidation/pdf_template', [
                'project' => $project,
                'formData' => $formData,
                'batchMode' => true,
            ]);

            $allHtml .= $html;
            $count++;
        }

        if ($count === 0) {
            return redirect()->to('ict-planner/consolidation')->with('error', 'No valid projects found.');
        }

        $headHtml = view('frontend/ict_planner/consolidation/pdf_template', [
            'project' => $project ?? [],
            'formData' => [],
            'batchMode' => true,
        ]);

        preg_match('/<style>(.*?)<\/style>/s', $headHtml, $styleMatch);
        $styles = $styleMatch[1] ?? '';

        $finalHtml = '<!DOCTYPE html><html><head><meta charset="utf-8"><style>' . $styles . '</style></head><body>';

        $finalHtml .= $allHtml;

        $finalHtml .= '</body></html>';

        $dompdf = new \Dompdf\Dompdf();
        $dompdf->loadHtml(mb_convert_encoding($finalHtml, 'HTML-ENTITIES', 'UTF-8'));
        $dompdf->setPaper('A4', 'landscape');
        $dompdf->render();

        $filename = 'ISSP_Batch_Download_' . date('Ymd_His') . '.pdf';

        $dompdf->stream($filename, ['Attachment' => true]);
        exit;
    }
}
