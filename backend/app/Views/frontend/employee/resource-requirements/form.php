<?= $this->extend('frontend/layout/app') ?>

<?= $this->section('content') ?>

<div class="card">
    <div class="card-header">
        <h3><?= isset($requirement) ? 'Edit' : 'Add' ?> Resource Requirement</h3>
    </div>

    <div class="card-body">
        <form method="post" action="<?= $action ?>">

            <div class="mb-3">
                <label>Year</label>
                <select name="year" class="form-control">
                    <option value="1">Year 1</option>
                    <option value="2">Year 2</option>
                    <option value="3">Year 3</option>
                </select>
            </div>

            <div class="mb-3">
                <label>Strategic Category</label>
                <select name="strategic_category" class="form-control">
                    <option>Office Productivity</option>
                    <option>Internal ICT Projects</option>
                    <option>Cross-Agency ICT Projects</option>
                    <option>Continuing Costs</option>
                </select>
            </div>

            <div class="mb-3">
                <label>Item</label>
                <input type="text"
                       name="item"
                       class="form-control"
                       value="<?= $requirement['item'] ?? '' ?>">
            </div>

            <div class="mb-3">
                <label>Office Location</label>
                <input type="text"
                       name="office_location"
                       class="form-control"
                       value="<?= $requirement['office_location'] ?? '' ?>">
            </div>

            <div class="mb-3">
                <label>Fund Source</label>
                <select name="fund_source" class="form-control">
                    <option>GAA</option>
                    <option>Foreign-Assisted</option>
                    <option>Locally Funded</option>
                    <option>Other Income</option>
                </select>
            </div>

            <div class="mb-3">
                <label>Unit Cost</label>
                <input type="number"
                       step="0.01"
                       name="unit_cost"
                       class="form-control"
                       value="<?= $requirement['unit_cost'] ?? '' ?>">
            </div>

            <div class="mb-3">
                <label>Physical Target</label>
                <input type="number"
                       name="physical_target"
                       class="form-control"
                       value="<?= $requirement['physical_target'] ?? '' ?>">
            </div>

            <div class="mb-3">
                <label>Expenditure Type</label>
                <select name="expenditure_type" class="form-control">
                    <option>CO</option>
                    <option>MOOE</option>
                </select>
            </div>

            <div class="mb-3">
                <label>Object of Expenditure</label>
                <input type="text"
                       name="object_of_expenditure"
                       class="form-control"
                       value="<?= $requirement['object_of_expenditure'] ?? '' ?>">
            </div>

            <button type="submit" class="btn btn-primary">
                Save
            </button>

        </form>
    </div>
</div>

<?= $this->endSection() ?>