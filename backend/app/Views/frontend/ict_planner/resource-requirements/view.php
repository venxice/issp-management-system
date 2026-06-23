<?= $this->extend('frontend/layout/app') ?>

<?= $this->section('content') ?>

<div class="card">
    <div class="card-header">
        <h3>Resource Requirement Details</h3>
    </div>

    <div class="card-body">

        <table class="table table-bordered">
            <tr>
                <th>Year</th>
                <td><?= esc($requirement['year']) ?></td>
            </tr>

            <tr>
                <th>Strategic Category</th>
                <td><?= esc($requirement['strategic_category']) ?></td>
            </tr>

            <tr>
                <th>Item</th>
                <td><?= esc($requirement['item']) ?></td>
            </tr>

            <tr>
                <th>Office Location</th>
                <td><?= esc($requirement['office_location']) ?></td>
            </tr>

            <tr>
                <th>Fund Source</th>
                <td><?= esc($requirement['fund_source']) ?></td>
            </tr>

            <tr>
                <th>Unit Cost</th>
                <td>₱<?= number_format($requirement['unit_cost'], 2) ?></td>
            </tr>

            <tr>
                <th>Physical Target</th>
                <td><?= esc($requirement['physical_target']) ?></td>
            </tr>

            <tr>
                <th>Total Cost</th>
                <td>
                    ₱<?= number_format(
                        $requirement['unit_cost'] *
                        $requirement['physical_target'],
                        2
                    ) ?>
                </td>
            </tr>

            <tr>
                <th>Expenditure Type</th>
                <td><?= esc($requirement['expenditure_type']) ?></td>
            </tr>

            <tr>
                <th>Object of Expenditure</th>
                <td><?= esc($requirement['object_of_expenditure']) ?></td>
            </tr>
        </table>

        <a href="<?= site_url('ict-planner/resource-requirements') ?>"
           class="btn btn-secondary">
            Back
        </a>

    </div>
</div>

<?= $this->endSection() ?>