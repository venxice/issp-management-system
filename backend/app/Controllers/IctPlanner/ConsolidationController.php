<?php

namespace App\Controllers\IctPlanner;

use Dompdf\Dompdf;
use App\Controllers\BaseController;
use App\Models\ISspRecordModel;

class ConsolidationController extends BaseController
{
    public function index()
    {
        $isspModel = new ISspRecordModel();

        $projects = $isspModel
            ->select('issp_records.*, departments.name AS department_name, users.name AS created_by_name')
            ->join('departments', 'departments.id = issp_records.department_id', 'left')
            ->join('users', 'users.id = issp_records.created_by', 'left')
            ->where('issp_records.status !=', 'draft')
            ->orderBy('issp_records.created_at', 'DESC')
            ->findAll();

        $stats = [
            'total' => count($projects),
            'pending' => count(array_filter($projects, fn($p) => $p['status'] === 'pending')),
            'endorsed' => count(array_filter($projects, fn($p) => $p['status'] === 'endorsed')),
            'approved' => count(array_filter($projects, fn($p) => $p['status'] === 'approved')),
        ];

        return view('frontend/ict_planner/consolidation/index', [
            'title' => 'Consolidation',
            'active' => 'consolidation',
            'projects' => $projects,
            'stats' => $stats,
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

<<<<<<< Updated upstream
        $dompdf = new \Dompdf\Dompdf();
        $dompdf->loadHtml(mb_convert_encoding($html, 'HTML-ENTITIES', 'UTF-8'));
        $dompdf->setPaper('A4', 'landscape');
        $dompdf->render();
=======
        $pageNumbers = $this->extractPageNumbers($viewData);

        $html = view('frontend/ict_planner/consolidation/pdf_template', array_merge($viewData, [
            'scanMode' => false,
            'pageNumbers' => $pageNumbers,
        ]));

$dompdf = new \Dompdf\Dompdf();

      $dompdf = new \Dompdf\Dompdf();
>>>>>>> Stashed changes

    $dompdf->loadHtml(
        mb_convert_encoding($html, 'HTML-ENTITIES', 'UTF-8')
    );

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

<<<<<<< Updated upstream
            $allHtml .= $html;
            $count++;
=======
            $pageNumbers = $this->extractPageNumbers($viewData);

            $html = view('frontend/ict_planner/consolidation/pdf_template', array_merge($viewData, [
                'scanMode' => false,
                'pageNumbers' => $pageNumbers,
            ]));

            $dompdf = new \Dompdf\Dompdf();

            $dompdf->loadHtml(
                mb_convert_encoding($html, 'HTML-ENTITIES', 'UTF-8')
            );

            $dompdf->setPaper('A4', 'landscape');
            $dompdf->render();

            $safeTitle = preg_replace('/[^a-zA-Z0-9]/', '_', $project['title'] ?? 'submission');
            $filename = 'ISSP_' . $safeTitle . '_' . $id . '.pdf';
            $files[$filename] = $dompdf->output();
>>>>>>> Stashed changes
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
