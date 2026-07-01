
<?= $this->extend('frontend/layout/app') ?>
<?= $this->section('content') ?>

<style>

.section-card{
    background:#fff;
    border:1px solid #dde4ed;
    border-radius:10px;
    box-shadow:0 10px 20px rgba(0,0,0,.05);
    margin-bottom:20px;
}

.section-header{
    background:#4f6584;
    color:#fff;
    padding:15px 20px;
}

.section-title{
    margin:0;
    font-size:20px;
    font-weight:bold;
}

.section-body{
    padding:20px;
}

</style>

<div class="container-fluid">

<div class="section-card">

<div class="section-header">

<h3 class="section-title">
Summary of Investments
</h3>

</div>

<div class="section-body">

<p class="text-muted">
Consolidated 3-year budget view across all ICT expenditure categories.
</p>

<div class="alert alert-success">

<i class="fa fa-check-circle"></i>

All totals are consistent across B.1, B.2, and B.3.

</div>

</div>

</div>

<div class="section-card">

    <div class="section-header">
        <h5 class="mb-0">
            B.1 General Summary
        </h5>
    </div>

    <div class="section-body">

        <table class="table table-bordered">

            <thead class="table-light">

                <tr>

                    <th>Category</th>
                    <th class="text-end">Year 1</th>
                    <th class="text-end">Year 2</th>
                    <th class="text-end">Year 3</th>
                    <th class="text-end">Total</th>

                </tr>

            </thead>

            <tbody>

            <?php
            $year1 = $year2 = $year3 = $grand = 0;
            ?>

            <?php foreach($generalSummary as $row): ?>

            <?php
            $year1 += $row['year1'];
            $year2 += $row['year2'];
            $year3 += $row['year3'];
            $grand += $row['total'];
            ?>

            <tr>

                <td><?= esc($row['strategic_category']) ?></td>

                <td class="text-end">₱<?= number_format($row['year1'],2) ?></td>

                <td class="text-end">₱<?= number_format($row['year2'],2) ?></td>

                <td class="text-end">₱<?= number_format($row['year3'],2) ?></td>

                <td class="text-end">₱<?= number_format($row['total'],2) ?></td>

            </tr>

            <?php endforeach; ?>

            </tbody>

            <tfoot>

            <tr class="table-secondary fw-bold">

                <td>Grand Total</td>

                <td class="text-end">₱<?= number_format($year1,2) ?></td>

                <td class="text-end">₱<?= number_format($year2,2) ?></td>

                <td class="text-end">₱<?= number_format($year3,2) ?></td>

                <td class="text-end">₱<?= number_format($grand,2) ?></td>

            </tr>

            </tfoot>

        </table>

    </div>

</div>

<div class="section-card">

    <div class="section-header">
        <h5 class="mb-0">B.2 Fund Source</h5>
    </div>

    <div class="section-body">

        <table class="table table-bordered">

            <thead class="table-light">
                <tr>
                    <th>Fund Source</th>
                    <th class="text-end">Year 1</th>
                    <th class="text-end">Year 2</th>
                    <th class="text-end">Year 3</th>
                    <th class="text-end">Total</th>
                </tr>
            </thead>

            <tbody>

<?php
$year1 = $year2 = $year3 = $grand = 0;
?>

<?php foreach($fundSourceSummary as $row): ?>

<?php
$year1 += $row['year1'];
$year2 += $row['year2'];
$year3 += $row['year3'];
$grand += $row['total'];
?>

<tr>

<td><?= esc($row['fund_source']) ?></td>

<td class="text-end">₱<?= number_format($row['year1'],2) ?></td>

<td class="text-end">₱<?= number_format($row['year2'],2) ?></td>

<td class="text-end">₱<?= number_format($row['year3'],2) ?></td>

<td class="text-end">₱<?= number_format($row['total'],2) ?></td>

</tr>

<?php endforeach; ?>

</tbody>

<tfoot>

<tr class="table-secondary fw-bold">

<td>Grand Total</td>

<td class="text-end">₱<?= number_format($year1,2) ?></td>

<td class="text-end">₱<?= number_format($year2,2) ?></td>

<td class="text-end">₱<?= number_format($year3,2) ?></td>

<td class="text-end">₱<?= number_format($grand,2) ?></td>

</tr>

</tfoot>

</table>

</div>

</div>

<div class="section-card">

<div class="section-header">
<h5 class="mb-0">B.3 Statement of Expenditure</h5>
</div>

<div class="section-body">

<table class="table table-bordered">

<thead class="table-light">
<tr>
<th>Statement of Expenditure</th>
<th class="text-end">Year 1</th>
<th class="text-end">Year 2</th>
<th class="text-end">Year 3</th>
<th class="text-end">Total</th>
</tr>
</thead>

<tbody>

<?php
$year1 = $year2 = $year3 = $grand = 0;
?>

<?php foreach($statementOfExpenditureSummary as $row): ?>

<?php
$year1 += $row['year1'];
$year2 += $row['year2'];
$year3 += $row['year3'];
$grand += $row['total'];
?>

<tr>

<td><?= esc($row['expenditure_type']) ?></td>

<td class="text-end">₱<?= number_format($row['year1'],2) ?></td>

<td class="text-end">₱<?= number_format($row['year2'],2) ?></td>

<td class="text-end">₱<?= number_format($row['year3'],2) ?></td>

<td class="text-end">₱<?= number_format($row['total'],2) ?></td>

</tr>

<?php endforeach; ?>

</tbody>

<tfoot>

<tr class="table-secondary fw-bold">

<td>Grand Total</td>

<td class="text-end">₱<?= number_format($year1,2) ?></td>

<td class="text-end">₱<?= number_format($year2,2) ?></td>

<td class="text-end">₱<?= number_format($year3,2) ?></td>

<td class="text-end">₱<?= number_format($grand,2) ?></td>

</tfoot>

</table>

</div>

</div>

<div class="section-card">

    <div class="section-header">

        <h5 class="mb-0">
            B.4 Object of Expenditure
        </h5>

    </div>

    <div class="section-body">

        <table class="table table-bordered">

            <thead class="table-light">

                <tr>

                    <th>UACS Code</th>
                    <th>Description</th>
                    <th class="text-end">Year 1</th>
                    <th class="text-end">Year 2</th>
                    <th class="text-end">Year 3</th>
                    <th class="text-end">Total</th>

                </tr>

            </thead>

            <tbody>

            <?php
            $year1 = $year2 = $year3 = $grand = 0;
            ?>

            <?php foreach($objectOfExpenditureSummary as $row): ?>

            <?php
            $year1 += $row['year1'];
            $year2 += $row['year2'];
            $year3 += $row['year3'];
            $grand += $row['total'];
            ?>

            <tr>

                <td><?= esc($row['uacs_code']) ?></td>

                <td><?= esc($row['object_of_expenditure']) ?></td>

                <td class="text-end">
                    ₱<?= number_format($row['year1'], 2) ?>
                </td>

                <td class="text-end">
                    ₱<?= number_format($row['year2'], 2) ?>
                </td>

                <td class="text-end">
                    ₱<?= number_format($row['year3'], 2) ?>
                </td>

                <td class="text-end">
                    ₱<?= number_format($row['total'], 2) ?>
                </td>

            </tr>

            <?php endforeach; ?>

            <?php if(empty($objectOfExpenditureSummary)): ?>

            <tr>

                <td colspan="6" class="text-center text-muted">

                    No records found.

                </td>

            </tr>

            <?php endif; ?>

            </tbody>

            <tfoot>

                <tr class="table-secondary fw-bold">

                    <td colspan="2">

                        Grand Total

                    </td>

                    <td class="text-end">

                        ₱<?= number_format($year1, 2) ?>

                    </td>

                    <td class="text-end">

                        ₱<?= number_format($year2, 2) ?>

                    </td>

                    <td class="text-end">

                        ₱<?= number_format($year3, 2) ?>

                    </td>

                    <td class="text-end">

                        ₱<?= number_format($grand, 2) ?>

                    </td>

                </tr>

            </tfoot>

        </table>

    </div>

</div>

<?= $this->endSection() ?>