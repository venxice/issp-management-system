<?php if ($message = session()->getFlashdata('success')): ?>
    <div class="alert alert-success border-0 shadow-sm d-flex align-items-center gap-2" role="status" style="border-radius:8px;margin-bottom:12px;background:#dcfce7;color:#166534;" id="flashAlert">
        <i class="fa-solid fa-check-circle"></i>
        <span><?= esc($message) ?></span>
    </div>
<?php endif; ?>

<?php if ($message = session()->getFlashdata('error')): ?>
    <div class="alert alert-danger border-0 shadow-sm d-flex align-items-center gap-2" role="alert" style="border-radius:8px;margin-bottom:12px;background:#fee2e2;color:#991b1b;" id="flashAlert">
        <i class="fa-solid fa-exclamation-circle"></i>
        <span><?= esc($message) ?></span>
    </div>
<?php endif; ?>

<?php if ($errors = session()->getFlashdata('errors')): ?>
    <div class="alert alert-danger border-0 shadow-sm d-flex align-items-center gap-2" role="alert" style="border-radius:8px;margin-bottom:12px;background:#fee2e2;color:#991b1b;" id="flashAlert">
        <i class="fa-solid fa-exclamation-circle"></i>
        <div>
            <?php foreach ($errors as $error): ?>
                <div><?= esc($error) ?></div>
            <?php endforeach; ?>
        </div>
    </div>
<?php endif; ?>

<script>
document.addEventListener('DOMContentLoaded', function() {
    var flash = document.getElementById('flashAlert');
    if (flash) {
        setTimeout(function() {
            flash.style.transition = 'opacity 0.4s ease';
            flash.style.opacity = '0';
            setTimeout(function() { flash.remove(); }, 400);
        }, 4000);
    }
});
</script>
