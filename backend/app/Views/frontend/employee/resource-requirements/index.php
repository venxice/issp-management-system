<?= $this->extend('frontend/layout/app') ?>

<?= $this->section('content') ?>
<?php
    <h2>Resource Requirements</h2>

    <div class="row">
       <div class="col-md-4">
            <a href="<?= base_url('employee/resource-requirements/year1') ?>">
            Year 1
        </a>
    </div>

    <div class="col-md-4">
        <a href="<?= base_url('employee/resource-requirements/year2') ?>">
            Year 2
        </a>
    </div>

    <div class="col-md-4">
        <a href="<?= base_url('employee/resource-requirements/year3') ?>">
            Year 3
        </a>
    </div>
</div>
<?php endforeach; ?>
</div>
<?= $this->endSection() ?>