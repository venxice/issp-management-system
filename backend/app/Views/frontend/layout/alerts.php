<?php if ($message = session()->getFlashdata('success')): ?>
    <div class="alert alert-success border-0 shadow-sm" role="status">
        <?= esc($message) ?>
    </div>
<?php endif; ?>

<?php if ($message = session()->getFlashdata('error')): ?>
    <div class="alert alert-danger border-0 shadow-sm" role="alert">
        <?= esc($message) ?>
    </div>
<?php endif; ?>

<?php if ($errors = session()->getFlashdata('errors')): ?>
    <div class="alert alert-danger border-0 shadow-sm" role="alert">
        <?php foreach ($errors as $error): ?>
            <div class="mb-1"><?= esc($error) ?></div>
        <?php endforeach; ?>
    </div>
<?php endif; ?>
