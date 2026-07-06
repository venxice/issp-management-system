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

<div class="row g-3 mb-3 equal-chart-row">
    <div class="col-xl-6 d-flex">
        <section class="panel flex-fill d-flex flex-column">
            <div class="panel-header" style="border-bottom: none;">
                <h2 class="panel-title">ICT Submissions per Month</h2>
                <p class="panel-subtitle">Monthly distribution of submitted ICT projects.</p>
            </div>
            <div class="dashboard-chart flex-fill">
                <div class="dashboard-chart__frame h-100">
                    <?php if ($chartSource !== []): ?>
                        <?php
                        $maxValue = max(array_column($chartSource, 'total'));
                        $chartHeight = 200;
                        $topPadding = 20;
                        $bottomPadding = 30;
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
                    <?php else: ?>
                        <div class="w-100 text-center text-muted-strong py-4">No division data available.</div>
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
                            <th>Internal / Cross-Agency Project Title</th>
                            <th>User</th>
                            <th>Department</th>
                            <th>Budget</th>
                            <th>Submitted Date</th>
                            <th>Status</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if ($recentProjects !== []): ?>
                            <?php foreach ($recentProjects as $project): ?>
                                <?php $fd = !empty($project['form_data']) ? json_decode($project['form_data'], true) : []; $ict = $fd['ict-projects-form'] ?? []; $intTitle = $ict['internal_project_title'] ?? $project['title'] ?? 'Untitled'; $crossTitle = $ict['cross_project_title'] ?? ''; ?>
                                <tr>
                                    <td>
                                        <div><span class="text-muted">Internal:</span> <?= esc($intTitle) ?></div>
                                        <?php if ($crossTitle): ?><div class="mt-1"><span class="text-muted">Cross-Agency:</span> <?= esc($crossTitle) ?></div><?php endif; ?>
                                    </td>
                                    <td><?= esc($project['created_by_name'] ?? 'Unknown') ?></td>
                                    <td><?= esc($project['department_name'] ?? 'N/A') ?></td>
                                    <td>₱<?= number_format((float) ($project['budget'] ?? 0), 2) ?></td>
                                    <td class="text-muted"><?= esc($project['submitted_at'] ?? $project['created_at'] ?? '-') ?></td>
                                    <td>
                                <span class="badge badge-soft" style="font-size:.7rem;padding:4px 10px;
                                    <?php if ($project['status'] === 'pending'): ?>background:#fef3c7;color:#92400e;border-color:#fde68a;
                                    <?php elseif ($project['status'] === 'endorsed'): ?>background:#e8f0fe;color:#2a5c8a;border-color:#c5d9f0;
                                    <?php elseif ($project['status'] === 'approved'): ?>background:#dcfce7;color:#166534;border-color:#bbf7d0;
                                    <?php elseif ($project['status'] === 'rejected'): ?>background:#fee2e2;color:#991b1b;border-color:#fecaca;
                                    <?php elseif ($project['status'] === 'returned'): ?>background:#ffedd5;color:#9a3412;border-color:#fed7aa;
                                    <?php endif; ?>">
                                    <?= esc(ucfirst($project['status'])) ?>
                                        </span>
                                    </td>
                                    <td class="text-center">
                                        <div class="d-flex gap-1 justify-content-center">
                                            <button class="btn btn-outline-primary icon-btn" type="button" title="View" data-project='<?= json_encode([
                                                'title' => $project['title'] ?? '',
                                                'description' => $project['description'] ?? '',
                                                'budget' => $project['budget'] ?? '',
                                                'status' => $project['status'] ?? '',
                                                'department' => $project['department_name'] ?? '',
                                                'updated' => $project['updated_at'] ?? $project['created_at'] ?? '',
                                                'created' => $project['created_at'] ?? ''
                                            ]) ?>'>
                                                <i class="fa-regular fa-eye"></i>
                                            </button>
                                            <a href="<?= site_url('ict-planner/view-full/' . $project['id']) ?>" class="btn btn-outline-primary icon-btn" type="button" title="Open Full Submission">
                                                <i class="fa-solid fa-expand"></i>
                                            </a>
                                            <a href="<?= site_url('ict-planner/download/' . $project['id']) ?>" class="btn btn-outline-primary icon-btn" type="button" title="Download">
                                                <i class="fa-solid fa-download"></i>
                                            </a>
                                            <?php if ($project['status'] === 'pending'): ?>
                                                <form method="post" action="<?= site_url('ict-planner/endorse/' . $project['id']) ?>" class="d-inline" onsubmit="return confirm('Endorse this project to Director General for approval?')">
                                                    <?= csrf_field() ?>
                                                    <button class="btn btn-outline-primary icon-btn" type="submit" title="Endorse to Director General">
                                                        <i class="fa-solid fa-check"></i>
                                                    </button>
                                                </form>
                                            <?php elseif ($project['status'] === 'endorsed'): ?>
                                                <button class="btn btn-outline-secondary icon-btn" type="button" title="Already endorsed" disabled style="opacity:0.35;cursor:not-allowed;pointer-events:none;">
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
                    <div class="key">Internal Title</div><div class="val" id="viewProjectTitle">-</div>
                    <div class="key">Cross-Agency Title</div><div class="val" id="viewProjectCrossTitle">-</div>
                    <div class="key">Description</div><div class="val" id="viewProjectDescription">-</div>
                    <div class="key">Budget</div><div class="val" id="viewProjectBudget">-</div>
                    <div class="key">Status</div><div class="val" id="viewProjectStatus">-</div>
                    <div class="key">Department</div><div class="val" id="viewProjectDepartment">-</div>
                    <div class="key">Last Updated</div><div class="val" id="viewProjectUpdated">-</div>
                    <div class="key">Created</div><div class="val" id="viewProjectCreated">-</div>
                </div>
            </div>
        </div>
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

document.addEventListener('DOMContentLoaded', function() {
    (function() {
        var segs = <?= $pieCanvasData ?>;
        var canvas = document.getElementById('pieCanvas');
        var tooltip = document.getElementById('pieTooltip');
        if (!canvas || !tooltip || !segs.length) return;
        var ctx = canvas.getContext('2d');
        var W = 180, H = 180, cx = 90, cy = 90, outerR = 81, innerR = 49.5;
        var hoveredIndex = -1;

        function draw(index) {
            ctx.clearRect(0, 0, W, H);
            var startAngle = -Math.PI / 2;
            segs.forEach(function(s, i) {
                var sliceRad = (s.end - s.start) * Math.PI / 180;
                var endAngle = startAngle + sliceRad;
                ctx.beginPath();
                ctx.arc(cx, cy, outerR, startAngle, endAngle);
                ctx.arc(cx, cy, innerR, endAngle, startAngle, true);
                ctx.closePath();
                ctx.fillStyle = s.color;
                ctx.fill();
                startAngle = endAngle;
            });
            ctx.beginPath();
            ctx.arc(cx, cy, innerR, 0, Math.PI * 2);
            ctx.fillStyle = '#fff';
            ctx.fill();
            if (index >= 0) {
                var s = segs[index];
                var sa = -Math.PI / 2;
                for (var j = 0; j < index; j++)
                    sa += (segs[j].end - segs[j].start) * Math.PI / 180;
                var ea = sa + (s.end - s.start) * Math.PI / 180;
                ctx.beginPath();
                ctx.arc(cx, cy, outerR, sa, ea);
                ctx.arc(cx, cy, innerR, ea, sa, true);
                ctx.closePath();
                ctx.fillStyle = 'rgba(255,255,255,0.15)';
                ctx.fill();
            }
        }

        draw(-1);

        canvas.addEventListener('mousemove', function(e) {
            var rect = canvas.getBoundingClientRect();
            var x = e.clientX - rect.left;
            var y = e.clientY - rect.top;
            var dx = x - cx, dy = y - cy;
            var dist = Math.sqrt(dx * dx + dy * dy);
            if (dist < innerR || dist > outerR) {
                if (hoveredIndex !== -1) { hoveredIndex = -1; draw(-1); tooltip.classList.remove('visible'); }
                return;
            }
            var deg = (Math.atan2(dy, dx) * 180 / Math.PI + 90 + 360) % 360;
            var found = -1;
            for (var i = 0; i < segs.length; i++) {
                if (deg >= segs[i].start && deg < segs[i].end) { found = i; break; }
            }
            if (found !== hoveredIndex) {
                hoveredIndex = found;
                draw(hoveredIndex);
                if (found >= 0) {
                    var s = segs[found];
                    tooltip.textContent = s.name + ' \u2014 ' + s.total + ' (' + s.pct + '%)';
                    tooltip.style.left = (e.clientX + 12) + 'px';
                    tooltip.style.top = (e.clientY - 8) + 'px';
                    tooltip.classList.add('visible');
                } else {
                    tooltip.classList.remove('visible');
                }
            } else if (found >= 0) {
                tooltip.style.left = (e.clientX + 12) + 'px';
                tooltip.style.top = (e.clientY - 8) + 'px';
            }
        });

        canvas.addEventListener('mouseleave', function() {
            if (hoveredIndex !== -1) { hoveredIndex = -1; draw(-1); }
            tooltip.classList.remove('visible');
        });
    })();

    document.querySelectorAll('button[title="View"]').forEach(function(btn) {
        btn.addEventListener('click', function() {
            try {
                var project = JSON.parse(this.getAttribute('data-project'));
                document.getElementById('viewProjectTitle').textContent = project.title || '-';
                document.getElementById('viewProjectCrossTitle').textContent = project.cross_title || '-';
                document.getElementById('viewProjectDescription').textContent = project.description || '-';
                document.getElementById('viewProjectBudget').textContent = project.budget ? '₱' + parseFloat(project.budget).toLocaleString('en-US', {minimumFractionDigits: 2, maximumFractionDigits: 2}) : '-';
                document.getElementById('viewProjectStatus').textContent = project.status ? project.status.charAt(0).toUpperCase() + project.status.slice(1) : '-';
                document.getElementById('viewProjectDepartment').textContent = project.department || '-';
                document.getElementById('viewProjectUpdated').textContent = project.updated || '-';
                document.getElementById('viewProjectCreated').textContent = project.created || '-';
                showViewProjectModal();
            } catch(e) {
                showAlertModal('Error', 'Error loading project details.');
            }
        });
    });
});
</script>

<?= $this->endSection() ?>
