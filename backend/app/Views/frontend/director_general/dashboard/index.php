<?= $this->extend('frontend/layout/app') ?>

<?= $this->section('content') ?>
<?php
$budgetDisplay = '₱' . number_format($totalProposedBudget, 2);

$pieColors = ['#4f6180', '#7e93b6', '#b8c9e0', '#d0dcec', '#a3b8d4'];
$pieLabels = ['Approved', 'Pending', 'Rejected', 'Returned', 'Resubmitted'];
$pieValues = [$approvedCount, $pendingCount, $rejectedCount, $returnedCount, $resubmittedCount];
$pieTotal = array_sum($pieValues) ?: 1;
$pieSegments = [];
$pieGradientParts = [];
$runningDeg = 0;
foreach ($pieLabels as $i => $label) {
    $pct = ($pieValues[$i] / $pieTotal) * 100;
    $deg = ($pieValues[$i] / $pieTotal) * 360;
    $color = $pieColors[$i % count($pieColors)];
    $startDeg = $runningDeg;
    $endDeg = $runningDeg + $deg;
    $pieGradientParts[] = "{$color} {$startDeg}deg {$endDeg}deg";
    $runningDeg = $endDeg;
    $pieSegments[] = [
        'name' => $label,
        'total' => $pieValues[$i],
        'pct' => round($pct, 1),
        'color' => $color,
        'startDeg' => $startDeg,
        'endDeg' => $endDeg,
    ];
}
$pieGradient = 'conic-gradient(' . implode(', ', $pieGradientParts) . ')';

$chartSource = $submissionsByMonth ?? [];
?>
<style>
.pie-wrap {
    margin: 0 auto;
    position: relative;
    width: 180px;
    height: 180px;
    flex-shrink: 0;
}
#pieCanvas {
    width: 180px;
    height: 180px;
    display: block;
    cursor: pointer;
}
.pie-tooltip {
    position: fixed;
    z-index: 9999;
    background: #1f2a3a;
    color: #fff;
    font-size: .8rem;
    padding: 6px 12px;
    border-radius: 6px;
    white-space: nowrap;
    pointer-events: none;
    opacity: 0;
    transition: opacity .12s ease;
}
.pie-tooltip.visible {
    opacity: 1;
}
.table-ict-projects th:nth-child(1),
.table-ict-projects td:nth-child(1) { width: 22%; min-width: 160px; }
.table-ict-projects th:nth-child(2),
.table-ict-projects td:nth-child(2) { width: 14%; min-width: 110px; }
.table-ict-projects th:nth-child(3),
.table-ict-projects td:nth-child(3) { width: 14%; min-width: 110px; }
.table-ict-projects th:nth-child(4),
.table-ict-projects td:nth-child(4) { width: 12%; min-width: 90px; }
.table-ict-projects th:nth-child(5),
.table-ict-projects td:nth-child(5) { width: 14%; min-width: 120px; }
.table-ict-projects th:nth-child(6),
.table-ict-projects td:nth-child(6) { width: 10%; min-width: 80px; }
.table-ict-projects th:nth-child(7),
.table-ict-projects td:nth-child(7) { width: 14%; min-width: 160px; }
.action-dropdown-btn {
    font-size: .75rem;
    padding: 4px 10px;
    border: 1px solid var(--brand);
    color: var(--brand);
    background: white;
    border-radius: 4px;
    cursor: pointer;
    transition: all .2s;
    white-space: nowrap;
}
.action-dropdown-btn:hover {
    background: var(--brand);
    color: white;
}
.action-dropdown-menu {
    position: fixed;
    z-index: 99999;
    background: white;
    border: 1px solid #e2e8f0;
    border-radius: 8px;
    box-shadow: 0 12px 32px rgba(15,23,42,.15);
    min-width: 190px;
    padding: 6px;
    display: none;
    font-size: .82rem;
    max-height: 90vh;
    overflow-y: auto;
}
.action-dropdown-menu.show {
    display: block;
}
.action-dropdown-menu .dropdown-item {
    display: flex;
    align-items: center;
    gap: 8px;
    padding: 7px 12px;
    border-radius: 6px;
    text-decoration: none;
    color: #1f2a3a;
    cursor: pointer;
    border: none;
    background: none;
    width: 100%;
    font-size: .82rem;
    transition: background .15s;
}
.action-dropdown-menu .dropdown-item:hover {
    background: #f1f5f9;
}
.action-dropdown-menu .dropdown-divider {
    height: 1px;
    background: #e2e8f0;
    margin: 4px 8px;
}
.action-dropdown-overlay {
    position: fixed;
    inset: 0;
    z-index: 99998;
    display: none;
}
.action-dropdown-overlay.show {
    display: block;
}
</style>

<div class="row g-3 mb-3 equal-chart-row">
    <div class="col-3 d-flex">
        <div class="stat-card flex-fill">
            <div><div class="label">Pending for Approval</div><div class="value"><?= $pendingApproval ?></div></div>
            <div class="stat-icon"><i class="fa-solid fa-clock"></i></div>
        </div>
    </div>
    <div class="col-3 d-flex">
        <div class="stat-card stat-card-alt flex-fill">
            <div><div class="label">Approved ICT Projects</div><div class="value"><?= $totalApprovedProjects ?></div></div>
            <div class="stat-icon"><i class="fa-solid fa-check-circle"></i></div>
        </div>
    </div>
    <div class="col-3 d-flex">
        <div class="stat-card stat-card-soft flex-fill">
            <div><div class="label">Total Proposed Budget</div><div class="value"><?= $budgetDisplay ?></div></div>
            <div class="stat-icon"><i class="fa-solid fa-peso-sign"></i></div>
        </div>
    </div>
    <div class="col-3 d-flex">
        <div class="stat-card stat-card-muted flex-fill">
            <div><div class="label">Departments with<br>Submissions</div><div class="value"><?= $totalDepartments ?></div></div>
            <div class="stat-icon"><i class="fa-solid fa-building"></i></div>
        </div>
    </div>
</div>

<div class="row g-3 mb-3 equal-chart-row">
    <div class="col-xl-6 d-flex">
        <section class="panel flex-fill d-flex flex-column">
            <div class="panel-header" style="border-bottom: none;">
                <h2 class="panel-title">ISSP Submissions per Month</h2>
                <p class="panel-subtitle">Monthly distribution of submitted ICT projects.</p>
            </div>
            <div class="dashboard-chart flex-fill">
                <div class="dashboard-chart__frame h-100">
                    <?php if ($chartSource !== []): ?>
                        <?php
                        $maxValue = max(array_column($chartSource, 'total'));
                        $chartHeight = 200;
                        $topPadding = 35;
                        $bottomPadding = 15;
                        $availableHeight = $chartHeight - $topPadding - $bottomPadding;
                        ?>
                        <div class="css-bar-chart">
                            <div class="css-bar-chart__background">
                                <?php for ($ref = 1; $ref <= $maxValue; $ref++): ?>
                                    <?php $bottomPosition = (($ref / $maxValue) * ($availableHeight / $chartHeight) * 100) + (($bottomPadding / $chartHeight) * 100); ?>
                                    <div class="css-bar-chart__reference-line" style="bottom: <?= $bottomPosition ?>%;">
                                        <span class="css-bar-chart__reference-label"><?= $ref ?></span>
                                    </div>
                                <?php endfor; ?>
                            </div>
                            <?php foreach ($chartSource as $index => $item):
                                $value = (int) ($item['total'] ?? 0);
                                $percentage = $maxValue > 0 ? ($value / $maxValue) * 100 : 0;
                                $color = $index % 2 === 0 ? 'rgba(79, 97, 128, 0.92)' : 'rgba(96, 114, 145, 0.92)';
                            ?>
                                <div class="css-bar-chart__item">
                                    <div class="css-bar-chart__bar" style="height: <?= esc($percentage) ?>%; background: <?= esc($color) ?>;" data-month="<?= esc($item['month'] ?? '') ?>" data-count="<?= esc($value) ?>">
                                        <div class="css-bar-chart__tooltip">
                                            <div class="css-bar-chart__tooltip-division"><?= esc($item['month'] ?? '') ?></div>
                                            <div class="css-bar-chart__tooltip-count"><?= esc($value) ?> submissions</div>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    <?php else: ?>
                        <div class="w-100 text-center text-muted-strong py-4">No submission data available.</div>
                    <?php endif; ?>
                </div>
            </div>
        </section>
    </div>

    <div class="col-xl-6 d-flex">
        <section class="panel flex-fill d-flex flex-column">
            <div class="panel-header" style="border-bottom: none;">
                <h2 class="panel-title">Project Status Overview</h2>
                <p class="panel-subtitle">Breakdown of approved, pending, and rejected projects.</p>
            </div>
            <div class="dashboard-chart flex-fill">
                <div class="dashboard-chart__frame h-100">
                    <?php if ($pieTotal > 0): ?>
                        <div class="d-flex justify-content-center" style="min-height: 180px; padding-top: 20px;">
                            <div class="pie-wrap">
                                <canvas id="pieCanvas" width="180" height="180"></canvas>
                                <div id="pieTooltip" class="pie-tooltip"></div>
                            </div>
                        </div>
                        <div class="d-flex justify-content-center gap-4 mt-3">
                            <?php foreach ($pieSegments as $seg): ?>
                                <div class="d-flex align-items-center gap-1">
                                    <span style="display:inline-block;width:10px;height:10px;border-radius:50%;background:<?= $seg['color'] ?>;"></span>
                                    <span style="font-size:.78rem;color:#475569;"><?= $seg['name'] ?> (<?= $seg['total'] ?>)</span>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    <?php else: ?>
                        <div class="w-100 text-center text-muted-strong py-4">No project data available.</div>
                    <?php endif; ?>
                </div>
            </div>
        </section>
    </div>
</div>

<div class="row mt-3 g-0">
    <div class="col-12">
        <section class="panel mb-0">
            <div class="panel-header">
                <h2 class="panel-title">Recent Pending ICT Projects</h2>
                <p class="panel-subtitle">Endorsed ICT projects awaiting your approval or rejection.</p>
            </div>
            <div class="table-responsive mb-0">
                <table class="table table-ict-projects align-middle mb-0">
                    <thead>
                        <tr>
                            <th>Internal / Cross-Agency Project Title</th>
                            <th>Description</th>
                            <th>Budget</th>
                            <th>Status</th>
                            <th>Last Updated</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if ($recentProjects !== []): ?>
                            <?php foreach ($recentProjects as $project): ?>
                                <?php $fd = !empty($project['form_data']) ? json_decode($project['form_data'], true) : []; $ict = $fd['ict-projects-form'] ?? []; $intTitle = $ict['internal_project_title'] ?? $project['title'] ?? 'Untitled'; $crossTitle = $ict['cross_project_title'] ?? ''; $intDesc = $ict['internal_description'] ?? $project['description'] ?? '---'; $crossDesc = $ict['cross_description'] ?? ''; $intBudget = $ict['internal_total_cost'] ?? $project['budget'] ?? 0; $crossBudget = $ict['cross_total_cost'] ?? 0; ?>
                                <tr>
                                    <td>
                                        <div><span class="text-muted">Internal:</span> <?= esc($intTitle) ?></div>
                                        <?php if ($crossTitle): ?><div class="mt-1"><span class="text-muted">Cross-Agency:</span> <?= esc($crossTitle) ?></div><?php endif; ?>
                                    </td>
                                    <td>
                                        <div><span class="text-muted">Internal:</span> <?= esc($intDesc) ?></div>
                                        <?php if ($crossDesc): ?><div class="mt-1"><span class="text-muted">Cross-Agency:</span> <?= esc($crossDesc) ?></div><?php endif; ?>
                                    </td>
                                    <td>
                                        <div><span class="text-muted">Internal:</span> <?= is_numeric($intBudget) ? '₱' . number_format($intBudget, 2) : '-' ?></div>
                                        <?php if ($crossBudget && is_numeric($crossBudget)): ?><div class="mt-1"><span class="text-muted">Cross-Agency:</span> <?= '₱' . number_format($crossBudget, 2) ?></div><?php endif; ?>
                                    </td>
                                    <td>
                                        <?php
                                        $statusLabels = [
                                            'endorsed' => 'Pending',
                                            'returned' => 'Returned',
                                            'approved' => 'Approved',
                                            'rejected' => 'Rejected',
                                            'resubmitted' => 'Resubmitted',
                                        ];
                                        $status = $project['status'] ?? 'endorsed';
                                        $label = $statusLabels[$status] ?? ucfirst($status);
                                        $colorMap = [
                                            'endorsed' => ['bg' => '#e8f0fe', 'color' => '#2a5c8a', 'border' => '#c5d9f0'],
                                            'returned' => ['bg' => '#ffedd5', 'color' => '#9a3412', 'border' => '#fed7aa'],
                                            'approved' => ['bg' => '#dcfce7', 'color' => '#166534', 'border' => '#bbf7d0'],
                                            'rejected' => ['bg' => '#fee2e2', 'color' => '#991b1b', 'border' => '#fecaca'],
                                            'resubmitted' => ['bg' => '#e0e7ff', 'color' => '#3730a3', 'border' => '#c7d2fe'],
                                        ];
                                        $colors = $colorMap[$status] ?? $colorMap['endorsed'];
                                        ?>
                                        <span class="badge badge-soft" style="font-size:.7rem;padding:4px 10px;background:<?= $colors['bg'] ?>;color:<?= $colors['color'] ?>;border-color:<?= $colors['border'] ?>;">
                                            <?= $label ?>
                                        </span>
                                    </td>
                                    <td class="text-muted"><?= esc($project['updated_at'] ?? $project['created_at'] ?? '-') ?></td>
                                    <td class="text-center">
                                        <div class="d-flex gap-1 justify-content-center align-items-center">
                                            <button class="btn btn-outline-primary icon-btn" type="button" title="View" data-project='<?= json_encode([
                                                'title' => $project['int_title'] ?? $project['title'] ?? '',
                                                'cross_title' => $project['cross_title'] ?? '',
                                                'description' => $project['description'] ?? '',
                                                'budget' => $project['budget'] ?? '',
                                                'status' => $label,
                                                'department' => $project['department_name'] ?? '',
                                                'updated' => $project['updated_at'] ?? $project['created_at'] ?? '',
                                                'created' => $project['created_at'] ?? '',
                                                'remarks' => $project['remarks'] ?? ''
                                            ]) ?>'>
                                                <i class="fa-regular fa-eye"></i>
                                            </button>
                                            <a href="<?= site_url('director-general/view-full/' . $project['id']) ?>" class="btn btn-outline-primary icon-btn" type="button" title="Open Full Submission">
                                                <i class="fa-solid fa-expand"></i>
                                            </a>
                                            <a href="<?= site_url('director-general/download/' . $project['id']) ?>" class="btn btn-outline-primary icon-btn" type="button" title="Download PDF">
                                                <i class="fa-solid fa-download"></i>
                                            </a>
                                            <?php if (in_array($project['status'], ['endorsed', 'resubmitted', 'returned'])): ?>
                                            <button class="action-dropdown-btn" onclick="toggleActionMenu(event, this, '<?= $project['id'] ?>')">
                                                Review <i class="fa-solid fa-chevron-down" style="font-size:.65rem;margin-left:2px;"></i>
                                            </button>
                                            <?php else: ?>
                                            <button class="action-dropdown-btn" disabled style="opacity:0.35;cursor:not-allowed;pointer-events:none;">
                                                Review <i class="fa-solid fa-chevron-down" style="font-size:.65rem;margin-left:2px;"></i>
                                            </button>
                                            <?php endif; ?>
                                        </div>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="7" class="text-center text-muted-strong py-4">No pending projects found.</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </section>
    </div>
</div>

<div class="action-dropdown-overlay" id="actionOverlay" onclick="closeActionMenu()"></div>
<div class="action-dropdown-menu" id="actionMenu">
    <button class="dropdown-item" type="button" onclick="openApproveModal()">
        <i class="fa-solid fa-check" style="color:#16a34a;"></i> Approve Project
    </button>
    <button class="dropdown-item" type="button" onclick="openRejectModal()">
        <i class="fa-solid fa-xmark" style="color:#dc2626;"></i> Reject Project
    </button>
    <div class="dropdown-divider"></div>
    <button class="dropdown-item" type="button" onclick="openReturnModal()">
        <i class="fa-solid fa-rotate-left" style="color:#d97706;"></i> Return to Submitter
    </button>
</div>

<div class="custom-modal" id="approveModal" style="display:none;position:fixed;top:50%;left:50%;transform:translate(-50%,-50%);z-index:1060;background:#fff;border-radius:6px;box-shadow:0 18px 40px rgba(15,23,42,.18);min-width:320px;max-width:400px;overflow:hidden;">
    <div style="background:#536783;color:#fff;padding:12px 14px;font-size:.94rem;font-weight:700;"><i class="fa-solid fa-check-circle me-2" style="color:#16a34a;"></i> Approve Project</div>
    <div style="padding:14px 14px;font-size:.82rem;color:#1f2a3a;"><p class="mb-0">This action is <strong>irreversible</strong>. Are you sure you want to approve this project?</p></div>
    <div style="padding:8px 12px;border-top:1px solid #e1e6ee;display:flex;justify-content:flex-end;gap:8px;">
        <button type="button" class="btn btn-outline-secondary btn-sm" onclick="closeCustomModals()">Cancel</button>
        <form method="post" id="actionApproveForm" action="" class="d-inline">
            <?= csrf_field() ?>
            <button type="submit" class="btn btn-primary btn-sm">Approve</button>
        </form>
    </div>
</div>

<div class="custom-modal" id="rejectModal" style="display:none;position:fixed;top:50%;left:50%;transform:translate(-50%,-50%);z-index:1060;background:#fff;border-radius:6px;box-shadow:0 18px 40px rgba(15,23,42,.18);min-width:320px;max-width:400px;overflow:hidden;">
    <div style="background:#536783;color:#fff;padding:12px 14px;font-size:.94rem;font-weight:700;"><i class="fa-solid fa-times-circle me-2" style="color:#ef4444;"></i> Reject Project</div>
    <div style="padding:14px 14px;font-size:.82rem;color:#1f2a3a;"><p class="mb-0">This action is <strong>irreversible</strong>. Are you sure you want to reject this project?</p></div>
    <div style="padding:8px 12px;border-top:1px solid #e1e6ee;display:flex;justify-content:flex-end;gap:8px;">
        <button type="button" class="btn btn-outline-secondary btn-sm" onclick="closeCustomModals()">Cancel</button>
        <form method="post" id="actionRejectForm" action="" class="d-inline">
            <?= csrf_field() ?>
            <button type="submit" class="btn btn-primary btn-sm">Reject</button>
        </form>
    </div>
</div>

<div class="custom-modal" id="returnModal" style="display:none;position:fixed;top:50%;left:50%;transform:translate(-50%,-50%);z-index:1060;background:#fff;border-radius:6px;box-shadow:0 18px 40px rgba(15,23,42,.18);min-width:360px;max-width:460px;overflow:hidden;">
    <div style="background:#536783;color:#fff;padding:12px 14px;font-size:.94rem;font-weight:700;"><i class="fa-solid fa-rotate-left me-2"></i> Return Project</div>
    <form method="post" id="actionReturnForm" action="" onsubmit="return validateReturnForm()">
        <?= csrf_field() ?>
        <div style="padding:14px 14px;font-size:.82rem;color:#1f2a3a;">
            <p class="mb-2">Provide remarks on why this project is being returned. The submitter will see these remarks.</p>
            <textarea name="remarks" id="returnRemarks" class="form-control form-control-sm" rows="4" placeholder="Enter your remarks here..." style="resize:vertical;"></textarea>
            <div id="returnRemarksError" style="color:#dc2626;font-size:.8rem;margin-top:6px;display:none;">Please enter remarks before returning.</div>
        </div>
        <div style="padding:8px 12px;border-top:1px solid #e1e6ee;display:flex;justify-content:flex-end;gap:8px;">
            <button type="button" class="btn btn-outline-secondary btn-sm" onclick="closeCustomModals()">Cancel</button>
            <button type="submit" class="btn btn-primary btn-sm">Return to Submitter</button>
        </div>
    </form>
</div>

<style>
.modal-content { border-radius: 14px; overflow: hidden; border: 1px solid #e9ecef; background: #fff; }
.modal-header { background: #536783; border-bottom: none; padding: 16px 20px; display: flex; align-items: center; justify-content: space-between; }
.modal-title { font-size: 1.1rem; font-weight: 700; color: #fff; margin: 0; }
.modal-header .btn-close { filter: invert(1); opacity: 1; }
.modal-body { padding: 22px; }
.detail-grid { display: grid; grid-template-columns: 170px 1fr; gap: 12px 18px; }
.key { font-size: .8rem; color: #6c757d; font-weight: 600; }
.val { font-size: .9rem; color: #212529; word-break: break-word; }
.cross-row { display: contents; }
.remarks-in-modal { margin-top: 18px; }
.remarks-in-modal__divider { height: 1px; background: #eef2f6; margin-bottom: 14px; }
.remarks-in-modal__divider { height: 1px; background: #eef2f6; margin-bottom: 14px; }
.remarks-in-modal__label { display: flex; align-items: center; gap: 6px; font-size: .7rem; font-weight: 700; color: #536783; text-transform: uppercase; letter-spacing: .04em; margin-bottom: 8px; }
.remarks-in-modal__body { background: #f8fafc; border: 1px solid #eef2f6; border-radius: 8px; padding: 14px 16px; font-size: .88rem; color: #1e293b; line-height: 1.7; }
</style>

<div class="custom-modal" id="viewProjectModal" style="display:none;position:fixed;top:0;left:0;width:100%;height:100%;z-index:1060;align-items:center;justify-content:center;">
    <div class="modal-dialog modal-dialog-scrollable modal-lg" style="width:100%;max-width:700px;margin:0;">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><i class="fa-regular fa-eye me-2"></i> Project Overview</h5>
                <button type="button" class="btn-close" onclick="closeViewProjectModal()"></button>
            </div>
            <div class="modal-body">
                <div class="detail-grid">
                    <div class="key">Internal Title</div>
                    <div class="val" id="viewProjectTitle">-</div>

                    <div class="cross-row" id="viewCrossRow">
                        <div class="key">Cross-Agency Title</div>
                        <div class="val" id="viewProjectCrossTitle">-</div>
                    </div>

                    <div class="key">Description</div>
                    <div class="val" id="viewProjectDescription">-</div>

                    <div class="key">Budget</div>
                    <div class="val" id="viewProjectBudget">-</div>

                    <div class="key">Status</div>
                    <div class="val" id="viewProjectStatus">-</div>

                    <div class="key">Department</div>
                    <div class="val" id="viewProjectDepartment">-</div>

                    <div class="key">Last Updated</div>
                    <div class="val" id="viewProjectUpdated">-</div>

                    <div class="key">Created</div>
                    <div class="val" id="viewProjectCreated">-</div>
                </div>
                <div class="remarks-in-modal" id="viewProjectRemarksWrap" style="display:none;">
                    <div class="remarks-in-modal__divider"></div>
                    <div class="remarks-in-modal__label"><i class="fa-solid fa-rotate-left"></i> DG Remarks</div>
                    <div class="remarks-in-modal__body" id="viewProjectRemarks">-</div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
function toggleActionMenu(event, btn, projectId) {
    event.stopPropagation();
    var menu = document.getElementById('actionMenu');
    var overlay = document.getElementById('actionOverlay');
    var isOpen = menu.classList.contains('show');

    closeActionMenu();

    if (!isOpen) {
        var rect = btn.getBoundingClientRect();
        var menuWidth = Math.min(220, window.innerWidth - 16);
        var left = Math.min(rect.left, window.innerWidth - menuWidth - 8);

        menu.style.display = 'block';
        var menuH = menu.offsetHeight;
        menu.style.display = '';

        var spaceBelow = window.innerHeight - rect.bottom;
        var spaceAbove = rect.top;

        if (spaceAbove >= menuH + 8) {
            var top = rect.top - menuH - 4;
        } else if (spaceBelow >= menuH + 8) {
            var top = rect.bottom + 4;
        } else {
            var top = 8;
        }

        menu.style.left = Math.max(8, left) + 'px';
        menu.style.top = Math.max(8, top) + 'px';
        menu.style.width = menuWidth + 'px';

        menu.dataset.projectId = projectId;

        menu.classList.add('show');
        overlay.classList.add('show');
    }
}

function closeActionMenu() {
    document.getElementById('actionMenu').classList.remove('show');
    document.getElementById('actionOverlay').classList.remove('show');
}

function showViewProjectModal() {
    document.getElementById('viewProjectModal').style.display = 'flex';
    document.getElementById('customModalOverlay').style.display = 'block';
    document.body.style.overflow = 'hidden';
    document.getElementById('customModalOverlay').onclick = closeViewProjectModal;
}
function closeViewProjectModal() {
    document.getElementById('viewProjectModal').style.display = 'none';
    document.getElementById('customModalOverlay').style.display = 'none';
    document.body.style.overflow = '';
    document.getElementById('customModalOverlay').onclick = closeCustomModals;
}

var pendingProjectId = null;

function getPendingProjectId() {
    var menu = document.getElementById('actionMenu');
    return menu.dataset.projectId;
}

function openApproveModal() {
    closeActionMenu();
    var pid = getPendingProjectId();
    document.getElementById('actionApproveForm').action = '<?= site_url('director-general/approve/') ?>' + pid;
    showCustomModal('approveModal');
}

function openRejectModal() {
    closeActionMenu();
    var pid = getPendingProjectId();
    document.getElementById('actionRejectForm').action = '<?= site_url('director-general/reject/') ?>' + pid;
    showCustomModal('rejectModal');
}

function openReturnModal() {
    closeActionMenu();
    var pid = getPendingProjectId();
    document.getElementById('actionReturnForm').action = '<?= site_url('director-general/return/') ?>' + pid;
    document.getElementById('returnRemarks').value = '';
    document.getElementById('returnRemarksError').style.display = 'none';
    showCustomModal('returnModal');
}
function closeReturnModal() {
    closeCustomModals();
}
function validateReturnForm() {
    var remarks = document.getElementById('returnRemarks').value.trim();
    if (!remarks) {
        document.getElementById('returnRemarksError').style.display = 'block';
        return false;
    }
    return true;
}

document.addEventListener('click', function(e) {
    if (!e.target.closest('#actionMenu') && !e.target.closest('.action-dropdown-btn')) {
        closeActionMenu();
    }
});

<?php if ($pieTotal > 0): ?>
document.addEventListener('DOMContentLoaded', function() {
    const canvas = document.getElementById('pieCanvas');
    const tooltip = document.getElementById('pieTooltip');
    if (!canvas || !tooltip) return;
    const ctx = canvas.getContext('2d');
    const w = canvas.width, h = canvas.height;
    const cx = w / 2, cy = h / 2, r = 80;

    const segments = <?= json_encode($pieSegments) ?>;

    function drawPie() {
        ctx.clearRect(0, 0, w, h);
        segments.forEach(function(seg) {
            const startRad = (seg.startDeg - 90) * Math.PI / 180;
            const endRad = (seg.endDeg - 90) * Math.PI / 180;
            ctx.beginPath();
            ctx.moveTo(cx, cy);
            ctx.arc(cx, cy, r, startRad, endRad);
            ctx.closePath();
            ctx.fillStyle = seg.color;
            ctx.fill();
            ctx.strokeStyle = '#fff';
            ctx.lineWidth = 2;
            ctx.stroke();
        });
    }
    drawPie();

    function getMouseSegment(e) {
        const rect = canvas.getBoundingClientRect();
        const scaleX = w / rect.width;
        const scaleY = h / rect.height;
        const mx = (e.clientX - rect.left) * scaleX;
        const my = (e.clientY - rect.top) * scaleY;
        const dx = mx - cx, dy = my - cy;
        const dist = Math.sqrt(dx * dx + dy * dy);
        if (dist > r) return null;
        let deg = Math.atan2(dy, dx) * 180 / Math.PI + 90;
        if (deg < 0) deg += 360;
        for (let i = 0; i < segments.length; i++) {
            if (deg >= segments[i].startDeg && deg < segments[i].endDeg) return segments[i];
        }
        return null;
    }

    canvas.addEventListener('mousemove', function(e) {
        const seg = getMouseSegment(e);
        if (seg) {
            tooltip.textContent = seg.name + ': ' + seg.total + ' (' + seg.pct + '%)';
            tooltip.style.left = (e.clientX + 12) + 'px';
            tooltip.style.top = (e.clientY + 12) + 'px';
            tooltip.classList.add('visible');
            canvas.style.cursor = 'pointer';
        } else {
            tooltip.classList.remove('visible');
            canvas.style.cursor = 'default';
        }
    });
    canvas.addEventListener('mouseleave', function() {
        tooltip.classList.remove('visible');
    });

    document.querySelectorAll('button[title="View"]').forEach(function(btn) {
        btn.addEventListener('click', function() {
            try {
                var project = JSON.parse(this.getAttribute('data-project'));
                document.getElementById('viewProjectTitle').textContent = project.title || '-';
                var crossRow = document.getElementById('viewCrossRow');
                var crossTitleEl = document.getElementById('viewProjectCrossTitle');
                if (project.cross_title) {
                    crossTitleEl.textContent = project.cross_title;
                    crossRow.style.display = '';
                } else {
                    crossRow.style.display = 'none';
                }
                document.getElementById('viewProjectDescription').textContent = project.description || '-';
                document.getElementById('viewProjectDescription').textContent = project.description || '-';
                document.getElementById('viewProjectBudget').textContent = project.budget ? '₱' + parseFloat(project.budget).toLocaleString('en-US', {minimumFractionDigits: 2, maximumFractionDigits: 2}) : '-';
                var statusMap = {'endorsed':'Pending','returned':'Returned','approved':'Approved','rejected':'Rejected'};
                document.getElementById('viewProjectStatus').textContent = statusMap[project.status] || project.status || '-';
                document.getElementById('viewProjectDepartment').textContent = project.department || '-';
                document.getElementById('viewProjectUpdated').textContent = project.updated || '-';
                document.getElementById('viewProjectCreated').textContent = project.created || '-';
                var remarks = project.remarks || '';
                var remarksWrap = document.getElementById('viewProjectRemarksWrap');
                if (remarks) {
                    document.getElementById('viewProjectRemarks').textContent = remarks;
                    remarksWrap.style.display = '';
                } else {
                    remarksWrap.style.display = 'none';
                }
                showViewProjectModal();
            } catch(e) {
                if (typeof showAlertModal === 'function') {
                    showAlertModal('Error', 'Error loading project details.');
                }
            }
        });
    });
});
<?php endif; ?>
</script>
<?= $this->endSection() ?>
