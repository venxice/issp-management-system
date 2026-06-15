<?php if ($message = session()->getFlashdata('success')): ?>
    <div class="text-success mb-2" role="status">
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
        <div class="fw-semibold mb-1">Please check the form.</div>
        <ul class="mb-0">
            <?php foreach ($errors as $error): ?>
                <li><?= esc($error) ?></li>
            <?php endforeach; ?>
        </ul>
    </div>
<?php endif; ?>
