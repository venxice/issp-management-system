<?php

namespace App\Controllers\IctPlanner;

use Dompdf\Dompdf;
use App\Controllers\BaseController;
use App\Models\ISspRecordModel;
use App\Models\ResourceRequirementModel;
use App\Models\AgencyInformationModel;

class ConsolidationController extends BaseController
{
    public function index()
    {
        $query = trim((string) $this->request->getGet('q'));
        $dateRange = trim((string) $this->request->getGet('date_range'));
        $statusFilter = trim((string) $this->request->getGet('status'));
        $page = (int) ($this->request->getGet('page') ?? 1);
        $perPage = 25;

        $isspModel = new ISspRecordModel();

        $statusCounts = [
            'pending'     => (new ISspRecordModel())->where('status', 'pending')->countAllResults(),
            'endorsed'    => (new ISspRecordModel())->where('status', 'endorsed')->countAllResults(),
            'approved'    => (new ISspRecordModel())->where('status', 'approved')->countAllResults(),
            'rejected'    => (new ISspRecordModel())->where('status', 'rejected')->countAllResults(),
            'returned'    => (new ISspRecordModel())->where('status', 'returned')->countAllResults(),
            'resubmitted' => (new ISspRecordModel())->where('status', 'resubmitted')->countAllResults(),
        ];

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
                $isspModel
                    ->where(
                        'issp_records.created_at >=',
                        trim($dates[0]) . ' 00:00:00'
                    )
                    ->where(
                        'issp_records.created_at <=',
                        trim($dates[1]) . ' 23:59:59'
                    );
            }
        }

        $builder = $isspModel
            ->select(
                'issp_records.*, 
                 departments.name AS department_name, 
                 users.name AS created_by_name'
            )
            ->join(
                'departments',
                'departments.id = issp_records.department_id',
                'left'
            )
            ->join(
                'users',
                'users.id = issp_records.created_by',
                'left'
            )
            ->notDraftFilter()
            ->orderBy(
                'COALESCE(issp_records.updated_at, issp_records.created_at)',
                'DESC',
                false
            );

        if (
            $statusFilter !== '' &&
            in_array(
                $statusFilter,
                [
                    'pending',
                    'endorsed',
                    'approved',
                    'rejected',
                    'returned',
                    'resubmitted'
                ],
                true
            )
        ) {
            $builder->where(
                'issp_records.status',
                $statusFilter
            );
        }

        $total = $builder->countAllResults(false);

        $projects = $builder->paginate(
            $perPage,
            'default',
            $page
        );

        $pager = $isspModel->pager;

        return view(
            'frontend/ict_planner/consolidation/index',
            [
                'title' => 'Consolidation',
                'active' => 'consolidation',
                'projects' => $projects,
                'query' => $query,
                'date_range' => $dateRange,
                'statusFilter' => $statusFilter,
                'pager' => $pager,
                'total' => $total,
                'perPage' => $perPage,
                'currentPage' => $page,
                'statusCounts' => $statusCounts,
            ]
        );
    }


    /**
     * VIEW FULL SUBMISSION
     */
    public function viewFull(int $id)
    {
        $project = $this->loadProject($id);

        if ($project === null) {
            return redirect()
                ->to('ict-planner/consolidation')
                ->with('error', 'Project not found.');
        }

        $formData = $this->extractFormData($project);

        return view(
            'frontend/ict_planner/consolidation/view_full',
            [
                'title' => 'View Full Submission',
                'active' => 'consolidation',
                'project' => $project,
                'formData' => $formData,
            ]
        );
    }


    /**
     * LOAD PROJECT
     */
    private function loadProject(int $id): ?array
    {
        $isspModel = new ISspRecordModel();

        $project = $isspModel
            ->select(
                'issp_records.*, 
                 departments.name AS department_name, 
                 users.name AS created_by_name'
            )
            ->join(
                'departments',
                'departments.id = issp_records.department_id',
                'left'
            )
            ->join(
                'users',
                'users.id = issp_records.created_by',
                'left'
            )
            ->where(
                'issp_records.id',
                $id
            )
            ->first();

        return $project ?: null;
    }


    /**
     * EXTRACT FORM DATA
     */
    private function extractFormData(array $project): array
    {
        $formData = [];

        if (!empty($project['form_data'])) {

            $decoded = json_decode(
                $project['form_data'],
                true
            );

            if (is_array($decoded)) {
                $formData = $decoded;
            }
        }

        return $formData;
    }


    /**
     * LOAD RESOURCE REQUIREMENTS
     */
    private function loadResourceData(): array
    {
        $resourceModel = new ResourceRequirementModel();

        return [
            'year1' => $resourceModel->getByYear(1),

            'year2' => $resourceModel->getByYear(2),

            'year3' => $resourceModel->getByYear(3),

            'generalSummary' =>
                $resourceModel->getGeneralSummary(),

            'fundSource' =>
                $resourceModel->getFundSourceSummary(),

            'statementOfExpenditure' =>
                $resourceModel->getStatementOfExpenditureSummary(),

            'objectOfExpenditure' =>
                $resourceModel->getObjectOfExpenditureSummary(),
        ];
    }


    /**
     * LOAD AGENCY INFORMATION
     */
    private function loadAgencyData(): array
    {
        $model = new AgencyInformationModel();

        $record = $model
            ->orderBy('id', 'DESC')
            ->first();

        return $record ?? [];
    }


    /**
     * DOWNLOAD SINGLE PROJECT
     */
public function download($id)
{
    $project = $this->loadProject((int) $id);

    if ($project === null) {
        throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(
            'Project not found.'
        );
    }

    $formData = $this->extractFormData($project);
    $resourceData = $this->loadResourceData();
    $agencyData = $this->loadAgencyData();

    $viewData = [
        'project'      => $project,
        'formData'     => $formData,
        'resourceData' => $resourceData,
        'agencyData'   => $agencyData,
        'batchMode'    => false,
    ];

    $html = view(
        'frontend/ict_planner/consolidation/pdf_template',
        $viewData
    );

    $dompdf = new Dompdf();

    $dompdf->loadHtml($html);

    $dompdf->setPaper('A4', 'portrait');

    $dompdf->render();

    $filename = 'ISSP_Project_' . $id . '.pdf';

    $dompdf->stream($filename, [
        'Attachment' => true
    ]);

    exit;
}
    /**
     * DOWNLOAD SELECTED PROJECTS
     *
     * This generates one PDF per selected project
     * and places them inside a ZIP file.
     */
    public function batchDownload()
    {
        $projectIds =
            $this->request->getPost('project_ids');


        if (
            empty($projectIds) ||
            !is_array($projectIds)
        ) {
            return redirect()
                ->to('ict-planner/consolidation')
                ->with(
                    'error',
                    'No projects selected.'
                );
        }


        /*
         * Make sure IDs are integers
         */
        $projectIds = array_map(
            'intval',
            $projectIds
        );


        $files = [];


        $resourceData =
            $this->loadResourceData();


        $agencyData =
            $this->loadAgencyData();


        foreach ($projectIds as $id) {

            if ($id <= 0) {
                continue;
            }


            $project =
                $this->loadProject($id);


            if ($project === null) {
                continue;
            }


            $formData =
                $this->extractFormData(
                    $project
                );


            $viewData = [
                'project' => $project,

                'formData' => $formData,

                'resourceData' => $resourceData,

                'agencyData' => $agencyData,

                'batchMode' => true,
            ];


            /*
             * Generate HTML
             */
            $html = view(
                'frontend/ict_planner/consolidation_pdf',
                $viewData
            );


            /*
             * Generate PDF
             */
            $dompdf = new Dompdf();

            $dompdf->loadHtml($html);

            $dompdf->setPaper(
                'A4',
                'portrait'
            );

            $dompdf->render();


            /*
             * Get PDF binary
             */
            $pdfData =
                $dompdf->output();


            /*
             * File name
             */
            $projectTitle =
                trim(
                    (string) (
                        $project['title']
                        ?? 'Project'
                    )
                );


            /*
             * Remove invalid filename characters
             */
            $safeTitle =
                preg_replace(
                    '/[^A-Za-z0-9_\- ]/',
                    '',
                    $projectTitle
                );


            $safeTitle =
                trim(
                    preg_replace(
                        '/\s+/',
                        '_',
                        $safeTitle
                    )
                );


            if ($safeTitle === '') {
                $safeTitle = 'Project_' . $id;
            }


            $filename =
                $safeTitle .
                '_' .
                $id .
                '.pdf';


            $files[$filename] =
                $pdfData;
        }


        /*
         * No valid files
         */
        if (count($files) === 0) {

            return redirect()
                ->to('ict-planner/consolidation')
                ->with(
                    'error',
                    'No valid projects found.'
                );
        }


        /*
         * Only one project selected
         *
         * Download directly as PDF.
         */
        if (count($files) === 1) {

            $filename =
                array_key_first($files);

            $pdfData =
                $files[$filename];


            return $this->response
                ->download(
                    $filename,
                    $pdfData
                );
        }


        /*
         * Multiple projects
         *
         * Create ZIP.
         */
        $zipData =
            $this->buildZip($files);


        $zipName =
            'ISSP_Selected_Projects_' .
            date('Ymd_His') .
            '.zip';


        return $this->response
            ->download(
                $zipName,
                $zipData
            );
    }


    /**
     * BUILD ZIP FILE
     */
    private function buildZip(array $files): string
    {
        $centralDir = '';

        $localFiles = '';

        $offset = 0;


        foreach (
            $files as $name => $data
        ) {

            $nameLen =
                strlen($name);

            $dataLen =
                strlen($data);

            $crc =
                crc32($data);


            /*
             * Local file header
             */
            $localHeader =
                pack(
                    'VvvvvvVVVv',
                    0x04034b50,
                    20,
                    0,
                    0,
                    0,
                    0,
                    $crc,
                    $dataLen,
                    $dataLen,
                    $nameLen
                ) .
                $name;


            $localFiles .=
                $localHeader .
                $data;


            /*
             * Central directory
             */
            $centralDir .=
                pack(
                    'VvvvvvvVVVVvvvvvVV',
                    0x02014b50,
                    20,
                    20,
                    0,
                    0,
                    0,
                    0,
                    $crc,
                    $dataLen,
                    $dataLen,
                    $nameLen,
                    0,
                    0,
                    0,
                    0,
                    0,
                    $offset
                ) .
                $name;


            $offset +=
                strlen($localHeader) +
                $dataLen;
        }


        /*
         * End of central directory
         */
        $centralDirOffset =
            $offset;


        $centralDirSize =
            strlen($centralDir);


        $count =
            count($files);


        $eocd =
            pack(
                'VvvvvVV',
                0x06054b50,
                0,
                0,
                $count,
                $count,
                $centralDirSize,
                $centralDirOffset,
                0
            );


        return
            $localFiles .
            $centralDir .
            $eocd;
    }
}