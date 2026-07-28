<?= $this->extend('frontend/layout/app') ?>

<?= $this->section('content') ?>
<?php
$budgetDisplay = '₱' . number_format($totalProposedBudget, 2);

$pieColors = ['#4f6180', '#607291', '#7e93b6', '#9aafce', '#b8c9e0', '#d0dcec', '#a0b8d4', '#889fc4'];
$chartSource = $submissionsByMonth ?? [];
$divisionData = $divisionData ?? [];
$recentProjects = $recentProjects ?? [];

$divisionTotal = array_sum(array_column($divisionData, 'total')) ?: 1;
$pieSegments = [];
$pieGradientParts = [];
$runningDeg = 0;
foreach ($divisionData as $i => $div) {
    $pct = ($div['total'] / $divisionTotal) * 100;
    $deg = ($div['total'] / $divisionTotal) * 360;
    $color = $pieColors[$i % count($pieColors)];
    $startDeg = $runningDeg;
    $endDeg = $runningDeg + $deg;
    $pieGradientParts[] = "{$color} {$startDeg}deg {$endDeg}deg";
    $runningDeg = $endDeg;
    $pieSegments[] = [
        'name' => $div['name'] ?? 'Unknown',
        'total' => $div['total'],
        'budget' => $div['budget'],
        'pct' => round($pct, 1),
        'color' => $color,
        'startDeg' => $startDeg,
        'endDeg' => $endDeg,
    ];
}
$pieGradient = 'conic-gradient(' . implode(', ', $pieGradientParts) . ')';

$pieCanvasData = json_encode(array_map(function ($seg) {
    return [
        'name'    => $seg['name'],
        'total'   => $seg['total'],
        'pct'     => $seg['pct'],
        'color'   => $seg['color'],
        'start'   => $seg['startDeg'],
        'end'     => $seg['endDeg'],
    ];
}, $pieSegments));
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
</style>

<style>
.dash-filter-row {
    display: flex;
    justify-content: flex-end;
    align-items: center;
    margin-bottom: 14px;
    gap: 8px;
    flex-wrap: wrap;
}
.cdd { position: relative; display: inline-flex; align-items: center; gap: 5px; }
.cdd-trigger {
    display: inline-flex;
    align-items: center;
    gap: 6px;
    background: #fff;
    border: 1px solid #dde4ed;
    border-radius: 8px;
    padding: 6px 11px;
    font-size: .74rem;
    font-weight: 600;
    color: var(--ink);
    cursor: pointer;
    transition: all .15s ease;
    box-shadow: 0 1px 3px rgba(15,23,42,.04);
    user-select: none;
    white-space: nowrap;
}
.cdd-trigger:hover { border-color: #c7d0dc; }
.cdd-trigger.open { border-color: var(--brand); box-shadow: 0 0 0 2px rgba(79,101,132,.12); }
.cdd-trigger .cdd-icon { font-size: .7rem; color: var(--muted); }
.cdd-trigger .cdd-label { font-size: .68rem; color: var(--muted); text-transform: uppercase; letter-spacing: .04em; font-weight: 700; }
.cdd-trigger .cdd-value { color: var(--ink); }
.cdd-trigger .cdd-arrow { font-size: .55rem; color: var(--muted); margin-left: 2px; transition: transform .15s ease; }
.cdd-trigger.open .cdd-arrow { transform: rotate(180deg); }
.cdd-trigger.has-value { border-color: var(--brand); background: #f6f8fb; }
.cdd-trigger.has-value .cdd-icon { color: var(--brand); }
.cdd-panel {
    display: none;
    position: absolute;
    top: calc(100% + 4px);
    left: 0;
    min-width: 130px;
    background: #fff;
    border: 1px solid #dde4ed;
    border-radius: 10px;
    box-shadow: 0 12px 32px rgba(15,23,42,.12);
    z-index: 999;
    padding: 5px;
    max-height: 220px;
    overflow-y: auto;
    scrollbar-width: thin;
}
.cdd-panel::-webkit-scrollbar { width: 5px; }
.cdd-panel::-webkit-scrollbar-thumb { background: #d1d5db; border-radius: 3px; }
.cdd-panel.show { display: block; }
.cdd-option {
    display: flex;
    align-items: center;
    gap: 6px;
    padding: 7px 10px;
    font-size: .74rem;
    font-weight: 500;
    color: var(--ink);
    border-radius: 6px;
    cursor: pointer;
    transition: background .1s ease;
    border: none;
    background: none;
    width: 100%;
    text-align: left;
}
.cdd-option:hover { background: #f1f5f9; }
.cdd-option.selected { background: #edf2f7; color: var(--brand-dark); font-weight: 700; }
.cdd-option .check-icon { font-size: .6rem; color: var(--brand); opacity: 0; width: 12px; }
.cdd-option.selected .check-icon { opacity: 1; }
.filter-reset-btn {
    display: none;
    align-items: center;
    gap: 4px;
    background: none;
    border: 1px solid transparent;
    border-radius: 6px;
    padding: 6px 9px;
    font-size: .7rem;
    font-weight: 600;
    color: var(--muted);
    cursor: pointer;
    transition: all .15s ease;
}
.filter-reset-btn:hover { color: #b33f3f; background: #fef2f2; border-color: #fecaca; }
.filter-reset-btn i { font-size: .6rem; }
.dash-filter-row.has-filters .filter-reset-btn { display: inline-flex; }
</style>

<script>
function toggleCdd(id) {
    var panel = document.getElementById(id + 'Panel');
    var btn = document.getElementById(id + 'Btn');
    var isOpen = panel.classList.contains('show');
    document.querySelectorAll('.cdd-panel').forEach(function(p) { p.classList.remove('show'); });
    document.querySelectorAll('.cdd-trigger').forEach(function(b) { b.classList.remove('open'); });
    if (!isOpen) { panel.classList.add('show'); btn.classList.add('open'); }
}
function selectCdd(id, value, label) {
    var hidden = document.getElementById(id + 'Hidden');
    var lbl = document.getElementById(id + 'Label');
    var btn = document.getElementById(id + 'Btn');
    var panel = document.getElementById(id + 'Panel');
    hidden.value = value;
    lbl.textContent = label;
    btn.classList.toggle('has-value', value !== '');
    panel.querySelectorAll('.cdd-option').forEach(function(o) { o.classList.toggle('selected', o.dataset.value === value); });
    panel.classList.remove('show');
    btn.classList.remove('open');
    applyDashboardFilter();
}
function applyDashboardFilter() {
    var year = document.getElementById('cddYearHidden').value;
    var month = document.getElementById('cddMonthHidden').value;
    var params = new URLSearchParams(window.location.search);
    if (year) { params.set('year', year); } else { params.delete('year'); }
    if (month) { params.set('month', month); } else { params.delete('month'); }
    window.location.search = params.toString();
}
document.addEventListener('click', function(e) {
    if (!e.target.closest('.cdd')) {
        document.querySelectorAll('.cdd-panel').forEach(function(p) { p.classList.remove('show'); });
        document.querySelectorAll('.cdd-trigger').forEach(function(b) { b.classList.remove('open'); });
    }
});
</script>
<input type="hidden" id="cddYearHidden" value="<?= $selectedYear ?? '' ?>">
<input type="hidden" id="cddMonthHidden" value="<?= $selectedMonth ?? '' ?>">

<div class="row g-3 mb-3">
    <div class="col-3">
        <div class="stat-card">
            <div><div class="label">Total Submissions</div><div class="value"><?= $submittedProjects ?></div></div>
            <div class="stat-icon"><i class="fa-solid fa-folder-open"></i></div>
        </div>
    </div>
    <div class="col-3">
        <div class="stat-card stat-card-alt">
            <div><div class="label">Pending Submissions</div><div class="value"><?= $pendingConsolidation ?></div></div>
            <div class="stat-icon"><i class="fa-solid fa-clock"></i></div>
        </div>
    </div>
    <div class="col-3">
        <div class="stat-card stat-card-soft">
            <div><div class="label">Endorsed to DG</div><div class="value"><?= $endorsedCount ?></div></div>
            <div class="stat-icon"><i class="fa-solid fa-check"></i></div>
        </div>
    </div>
    <div class="col-3">
        <div class="stat-card stat-card-muted">
            <div><div class="label">Total Proposed Budget</div><div class="value"><?= $budgetDisplay ?></div></div>
            <div class="stat-icon"><i class="fa-solid fa-peso-sign"></i></div>
        </div>
    </div>
</div>

<div class="dash-filter-row <?= ($selectedYear !== null || $selectedMonth !== null) ? 'has-filters' : '' ?>" id="dashFilterBar">
    <span style="font-size:.68rem;font-weight:700;color:var(--muted);text-transform:uppercase;letter-spacing:.04em;margin-right:2px;"><i class="fa-solid fa-filter" style="font-size:.6rem;margin-right:3px;"></i>Filter</span>
    <div class="cdd" id="cddYear">
        <button type="button" class="cdd-trigger <?= $selectedYear !== null ? 'has-value' : '' ?>" id="cddYearBtn" onclick="toggleCdd('cddYear')">
            <i class="fa-regular fa-calendar cdd-icon"></i>
            <span class="cdd-label">Year</span>
            <span class="cdd-value" id="cddYearLabel"><?= $selectedYear !== null ? (int)$selectedYear : 'All' ?></span>
            <i class="fa-solid fa-chevron-down cdd-arrow"></i>
        </button>
        <div class="cdd-panel" id="cddYearPanel">
            <button type="button" class="cdd-option <?= $selectedYear === null ? 'selected' : '' ?>" data-value="" onclick="selectCdd('cddYear', '', 'All')">
                <i class="fa-solid fa-check check-icon"></i> All Years
            </button>
            <?php
            $currentYear = (int) date('Y');
            $yearsToShow = [];
            foreach ($availableYears as $ay) { $yearsToShow[] = (int) $ay['year']; }
            if (!empty($yearsToShow) && !in_array($currentYear, $yearsToShow)) { $yearsToShow[] = $currentYear; }
            rsort($yearsToShow);
            foreach ($yearsToShow as $y): ?>
                <button type="button" class="cdd-option <?= ($selectedYear !== null && (int)$selectedYear === $y) ? 'selected' : '' ?>" data-value="<?= $y ?>" onclick="selectCdd('cddYear', '<?= $y ?>', '<?= $y ?>')">
                    <i class="fa-solid fa-check check-icon"></i> <?= $y ?>
                </button>
            <?php endforeach; ?>
        </div>
    </div>
    <div class="cdd" id="cddMonth">
        <button type="button" class="cdd-trigger <?= $selectedMonth !== null ? 'has-value' : '' ?>" id="cddMonthBtn" onclick="toggleCdd('cddMonth')">
            <i class="fa-regular fa-clock cdd-icon"></i>
            <span class="cdd-label">Month</span>
            <span class="cdd-value" id="cddMonthLabel"><?= $selectedMonth !== null ? ['','Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sep','Oct','Nov','Dec'][(int)$selectedMonth] : 'All' ?></span>
            <i class="fa-solid fa-chevron-down cdd-arrow"></i>
        </button>
        <div class="cdd-panel" id="cddMonthPanel">
            <button type="button" class="cdd-option <?= $selectedMonth === null ? 'selected' : '' ?>" data-value="" onclick="selectCdd('cddMonth', '', 'All')">
                <i class="fa-solid fa-check check-icon"></i> All Months
            </button>
            <?php
            $monthLabels = [1=>'January',2=>'February',3=>'March',4=>'April',5=>'May',6=>'June',7=>'July',8=>'August',9=>'September',10=>'October',11=>'November',12=>'December'];
            foreach ($monthLabels as $num => $fullName): ?>
                <button type="button" class="cdd-option <?= ($selectedMonth !== null && (int)$selectedMonth === $num) ? 'selected' : '' ?>" data-value="<?= $num ?>" onclick="selectCdd('cddMonth', '<?= $num ?>', '<?= $fullName ?>')">
                    <i class="fa-solid fa-check check-icon"></i> <?= $fullName ?>
                </button>
            <?php endforeach; ?>
        </div>
    </div>
    <button type="button" class="filter-reset-btn" onclick="window.location.search=''">
        <i class="fa-solid fa-xmark"></i> Clear
    </button>
</div>

<div class="row g-3 mb-3 equal-chart-row">
    <div class="col-xl-6 d-flex">
        <section class="panel flex-fill d-flex flex-column">
            <div class="panel-header" style="border-bottom: none;">
                <h2 class="panel-title">Submissions by Status</h2>
                <p class="panel-subtitle">Overview of project statuses for the selected period.</p>
            </div>
            <div class="dashboard-chart flex-fill">
                <div class="dashboard-chart__frame h-100">
                    <?php
                    $piePalette = ['#4f6180', '#607291', '#7e93b6', '#9aafce', '#b8c9e0', '#d0dcec'];
                    $statusData = [
                        ['label' => 'Pending', 'value' => (int) ($pendingCount ?? 0), 'color' => $piePalette[0]],
                        ['label' => 'Resubmitted', 'value' => (int) ($resubmittedCount ?? 0), 'color' => $piePalette[1]],
                        ['label' => 'Endorsed', 'value' => (int) ($endorsedCountOnly ?? 0), 'color' => $piePalette[2]],
                        ['label' => 'Approved', 'value' => (int) ($approvedCount ?? 0), 'color' => $piePalette[3]],
                        ['label' => 'Rejected', 'value' => (int) ($rejectedCount ?? 0), 'color' => $piePalette[4]],
                        ['label' => 'Returned', 'value' => (int) ($returnedCount ?? 0), 'color' => $piePalette[5]],
                    ];
                    $statusMax = max(array_column($statusData, 'value'));
                    ?>
                    <?php if ($statusMax > 0): ?>
                        <?php
                        $chartHeight = 200;
                        $topPadding = 20;
                        $bottomPadding = 30;
                        $availableHeight = $chartHeight - $topPadding - $bottomPadding;
                        ?>
                        <div class="css-bar-chart" style="gap:14px;">
                            <div class="css-bar-chart__background">
                                <?php for ($ref = 1; $ref <= $statusMax; $ref++): ?>
                                    <?php $bottomPosition = (($ref / $statusMax) * ($availableHeight / $chartHeight) * 100) + (($bottomPadding / $chartHeight) * 100); ?>
                                    <div class="css-bar-chart__reference-line" style="bottom: <?= $bottomPosition ?>%;">
                                        <span class="css-bar-chart__reference-label"><?= $ref ?></span>
                                    </div>
                                <?php endfor; ?>
                            </div>
                            <?php foreach ($statusData as $item):
                                $value = $item['value'];
                                $percentage = $statusMax > 0 ? ($value / $statusMax) * 100 : 0;
                            ?>
                                <div class="css-bar-chart__item">
                                    <div class="css-bar-chart__bar" style="height: <?= esc($percentage) ?>%; background: <?= esc($item['color']) ?>;">
                                        <div class="css-bar-chart__tooltip">
                                            <div class="css-bar-chart__tooltip-division"><?= esc($item['label']) ?></div>
                                            <div class="css-bar-chart__tooltip-count"><?= $value ?> project<?= $value !== 1 ? 's' : '' ?></div>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                        <div style="display:flex; justify-content:center; gap:14px; flex-wrap:wrap; padding-bottom:4px;">
                            <?php foreach ($statusData as $item): ?>
                                <div style="display:flex; align-items:center; gap:4px;">
                                    <span style="display:inline-block;width:8px;height:8px;border-radius:2px;background:<?= $item['color'] ?>;"></span>
                                    <span style="font-size:.68rem;color:#475569;"><?= esc($item['label']) ?></span>
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
                <h2 class="panel-title">ICT Projects per Division</h2>
                <p class="panel-subtitle">Distribution of projects across divisions.</p>
            </div>
            <div class="dashboard-chart flex-fill">
                <div class="dashboard-chart__frame h-100">
                    <?php if ($pieSegments !== []): ?>
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

    <div class="row mt-3 g-0">
        <div class="col-12">
            <section class="panel mb-0">
                <div class="panel-header">
                    <h2 class="panel-title">Recent ICT Projects</h2>
                    <p class="panel-subtitle">Latest submitted ICT project proposals across all divisions.</p>
                </div>
            <div class="table-responsive mb-0">
                <table class="table table-ict-projects align-middle mb-0">
                    <thead>
                        <tr>
                            <th>Project Title</th>
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
                                <?php $fd = !empty($project['form_data']) ? json_decode($project['form_data'], true) : []; $ict = $fd['ict-projects-form'] ?? []; $intTitle = $ict['internal_project_title'] ?? $project['title'] ?? 'Untitled'; $intDesc = $ict['internal_description'] ?? $project['description'] ?? '---'; $intBudget = $ict['internal_total_cost'] ?? $project['budget'] ?? 0; ?>
                                <tr>
                                    <td>
                                        <div><?= esc($intTitle) ?></div>
                                    </td>
                                    <td>
                                        <div><?= esc($intDesc) ?></div>
                                    </td>
                                    <td>
                                        <div><?= is_numeric($intBudget) ? '₱' . number_format($intBudget, 2) : '-' ?></div>
                                    </td>
                                    <td>
                                <span class="badge badge-soft" style="font-size:.7rem;padding:4px 10px;
                                    <?php if ($project['status'] === 'pending'): ?>background:#fef3c7;color:#92400e;border-color:#fde68a;
                                    <?php elseif ($project['status'] === 'endorsed'): ?>background:#e8f0fe;color:#2a5c8a;border-color:#c5d9f0;
                                    <?php elseif ($project['status'] === 'approved'): ?>background:#dcfce7;color:#166534;border-color:#bbf7d0;
                                    <?php elseif ($project['status'] === 'rejected'): ?>background:#fee2e2;color:#991b1b;border-color:#fecaca;
                                    <?php elseif ($project['status'] === 'returned'): ?>background:#ffedd5;color:#9a3412;border-color:#fed7aa;
                                    <?php elseif ($project['status'] === 'resubmitted'): ?>background:#e0e7ff;color:#4338ca;border-color:#c7d2fe;
                                    <?php endif; ?>">
                                    <?= esc($project['status'] === 'resubmitted' ? 'Pending - Resubmitted' : ucfirst($project['status'])) ?>
                                        </span>
                                    </td>
                                    <td class="text-muted"><?= esc($project['updated_at'] ?? $project['created_at'] ?? '-') ?></td>
                                    <td class="text-center">
                                        <div class="d-flex gap-1 justify-content-center">
                                             <button class="btn btn-outline-primary icon-btn" type="button" title="View" data-project='<?= json_encode([
                                                 'title' => $intTitle ?? '',
                                                 'description' => $intDesc ?? '',
                                                 'budget' => $intBudget ?? '',
                                                 'status' => $project['status'] ?? '',
                                                 'department' => $project['department_name'] ?? '',
                                                 'updated' => $project['updated_at'] ?? $project['created_at'] ?? '',
                                                 'created' => $project['created_at'] ?? '',
                                                 'remarks' => $project['remarks'] ?? ''
                                             ]) ?>'>
                                                <i class="fa-regular fa-eye"></i>
                                            </button>
                                            <a href="<?= site_url('ict-planner/view-full/' . $project['id']) ?>" class="btn btn-outline-primary icon-btn" type="button" title="Open Full Submission">
                                                <i class="fa-solid fa-expand"></i>
                                            </a>
                                            <a href="<?= site_url('ict-planner/download/' . $project['id']) ?>" class="btn btn-outline-primary icon-btn" type="button" title="Download">
                                                <i class="fa-solid fa-download"></i>
                                            </a>
                                            <?php if (in_array($project['status'], ['pending', 'resubmitted'])): ?>
                                                <button class="btn btn-outline-primary icon-btn" type="button" title="Endorse to Director General" onclick="openEndorseModal('<?= $project['id'] ?>')">
                                                    <i class="fa-solid fa-check"></i>
                                                </button>
                                            <?php else: ?>
                                                <button class="btn btn-outline-secondary icon-btn" type="button" title="Endorse to Director General" disabled style="opacity:0.35;cursor:not-allowed;pointer-events:none;">
                                                    <i class="fa-solid fa-check"></i>
                                                </button>
                                            <?php endif; ?>
                                        </div>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="7" class="text-center text-muted-strong py-4">No recent projects found.</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </section>
    </div>
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
.remarks-in-modal { margin-top: 18px; }
.remarks-in-modal__divider { height: 1px; background: #eef2f6; margin-bottom: 14px; }
.remarks-in-modal__label { display: flex; align-items: center; gap: 6px; font-size: .7rem; font-weight: 700; color: #536783; text-transform: uppercase; letter-spacing: .04em; margin-bottom: 8px; }
.remarks-in-modal__body { background: #f8fafc; border: 1px solid #eef2f6; border-radius: 8px; padding: 14px 16px; font-size: .88rem; color: #1e293b; line-height: 1.7; }
</style>

<div class="custom-modal" id="viewProjectModal" style="display:none;position:fixed;top:0;left:0;width:100%;height:100%;z-index:1060;align-items:center;justify-content:center;">
    <div class="modal-dialog modal-dialog-scrollable modal-lg" style="width:100%;max-width:700px;margin:0;">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Project Overview</h5>
                <button type="button" class="btn-close" onclick="closeViewProjectModal()"></button>
            </div>
            <div class="modal-body">
                <div class="detail-grid">
                    <div class="key">Project Title</div><div class="val" id="viewProjectTitle">-</div>
                    <div class="key">Description</div><div class="val" id="viewProjectDescription">-</div>
                    <div class="key">Budget</div><div class="val" id="viewProjectBudget">-</div>
                    <div class="key">Status</div><div class="val" id="viewProjectStatus">-</div>
                    <div class="key">Department</div><div class="val" id="viewProjectDepartment">-</div>
                    <div class="key">Last Updated</div><div class="val" id="viewProjectUpdated">-</div>
                    <div class="key">Created</div><div class="val" id="viewProjectCreated">-</div>
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

<div class="custom-modal" id="endorseModal" style="display:none;position:fixed;top:50%;left:50%;transform:translate(-50%,-50%);z-index:1060;background:#fff;border-radius:6px;box-shadow:0 18px 40px rgba(15,23,42,.18);min-width:320px;max-width:400px;overflow:hidden;">
    <div style="background:#536783;color:#fff;padding:12px 14px;font-size:.94rem;font-weight:700;margin:0 -14px 12px -14px;"><i class="fa-solid fa-check-circle me-2" style="color:#4ade80;"></i> Endorse to Director General</div>
    <div style="padding:14px 14px;font-size:.82rem;color:#1f2a3a;"><p class="mb-0">Are you sure you want to endorse this project to the Director General for approval?</p></div>
    <div style="padding:8px 12px;border-top:1px solid #e1e6ee;display:flex;justify-content:flex-end;gap:8px;">
        <button type="button" class="btn btn-outline-secondary btn-sm" onclick="closeCustomModals()">Cancel</button>
        <form method="post" id="actionEndorseForm" action="" class="d-inline">
            <?= csrf_field() ?>
            <button type="submit" class="btn btn-primary btn-sm">Endorse</button>
        </form>
    </div>
</div>

<script>
function showViewProjectModal() {
    document.getElementById('viewProjectModal').style.display = 'flex';
    document.getElementById('customModalOverlay').style.display = 'block';
    document.getElementById('customModalOverlay').onclick = closeViewProjectModal;
}
function closeViewProjectModal() {
    document.getElementById('viewProjectModal').style.display = 'none';
    document.getElementById('customModalOverlay').style.display = 'none';
    document.getElementById('customModalOverlay').onclick = closeCustomModals;
}

function openEndorseModal(projectId) {
    document.getElementById('actionEndorseForm').action = '<?= site_url('ict-planner/endorse/') ?>' + projectId;
    showCustomModal('endorseModal');
}

document.addEventListener('DOMContentLoaded', function() {
    <?php if ($pieSegments !== []): ?>
    const canvas = document.getElementById('pieCanvas');
    const tooltip = document.getElementById('pieTooltip');
    if (canvas && tooltip) {
        const ctx = canvas.getContext('2d');
        const w = canvas.width, h = canvas.height;
        const cx = w / 2, cy = h / 2, r = 80;

        const segments = <?= $pieCanvasData ?>;

        function drawPie() {
            ctx.clearRect(0, 0, w, h);
            segments.forEach(function(seg) {
                const startRad = (seg.start - 90) * Math.PI / 180;
                const endRad = (seg.end - 90) * Math.PI / 180;
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
                if (deg >= segments[i].start && deg < segments[i].end) return segments[i];
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
    }
    <?php endif; ?>

    document.querySelectorAll('button[title="View"]').forEach(function(btn) {
        btn.addEventListener('click', function() {
            try {
                var project = JSON.parse(this.getAttribute('data-project'));
                document.getElementById('viewProjectTitle').textContent = project.title || '-';
                document.getElementById('viewProjectDescription').textContent = project.description || '-';
                document.getElementById('viewProjectBudget').textContent = project.budget ? '₱' + parseFloat(project.budget).toLocaleString('en-US', {minimumFractionDigits: 2, maximumFractionDigits: 2}) : '-';
                document.getElementById('viewProjectStatus').textContent = project.status ? project.status.charAt(0).toUpperCase() + project.status.slice(1) : '-';
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
                showAlertModal('Error', 'Error loading project details.');
            }
        });
    });
});
</script>

<?= $this->endSection() ?>
