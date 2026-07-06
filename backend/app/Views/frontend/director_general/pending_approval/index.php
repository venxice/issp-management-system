<?= $this->extend('frontend/layout/app') ?>

<?= $this->section('content') ?>
<div class="row">
    <div class="col-12">
        <div class="page-header mb-3">
            <h1 class="page-title">Pending Approval</h1>
            <p class="page-subtitle">ICT projects pending your review and approval.</p>
        </div>
    </div>
</div>

<div class="panel">
    <div class="panel-body">
        <p class="text-muted mb-0">No pending projects for approval.</p>
    </div>
</div>
<?= $this->endSection() ?>
