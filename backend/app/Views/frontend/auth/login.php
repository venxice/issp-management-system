<?= $this->extend('frontend/layout/auth') ?>

<?= $this->section('content') ?>
<section class="w-100">
    <h1 class="auth-heading">Welcome to <span>ICT Planner</span></h1>
    <div class="auth-card mx-auto">
        <div class="auth-form-wrap">
            <h2 class="fw-bold mb-4">Login Your Account</h2>
            <?= $this->include('frontend/layout/alerts') ?>

            <form action="<?= site_url('login') ?>" method="post" class="d-grid gap-3">
                <?= csrf_field() ?>
                <div>
                    <label class="form-label" for="email">Email:</label>
                    <input class="form-control" id="email" name="email" type="email" value="<?= esc(old('email')) ?>" placeholder="Enter Email" autocomplete="email" required>
                </div>

                <div>
                    <label class="form-label" for="password">Password:</label>
                    <div class="password-wrap">
                        <input class="form-control pe-5" id="password" name="password" type="password" placeholder="Enter Password" autocomplete="current-password" required>
                        <button class="password-toggle" type="button" aria-label="Show password" data-password-toggle>
                            <i class="fa-regular fa-eye"></i>
                        </button>
                    </div>
                </div>

                <button class="btn btn-primary btn-login mt-3" type="submit">
                    <i class="fa-solid fa-right-to-bracket me-2"></i> Login
                </button>
            </form>

            <div class="divider my-4">OR</div>

            <a class="btn google-btn d-flex align-items-center justify-content-center gap-3" href="<?= site_url('auth/google') ?>">
                <i class="fa-brands fa-google"></i>
                <span>Continue with Google</span>
            </a>

            <?php if (! $googleEnabled): ?>
                <p class="small text-white-50 mt-3 mb-0">Google SSO needs credentials in the environment before it can accept sign-ins.</p>
            <?php endif; ?>
        </div>
    </div>
</section>
<?= $this->endSection() ?>

<?= $this->section('scripts') ?>
<script>
document.addEventListener('DOMContentLoaded', () => {
    const toggle = document.querySelector('[data-password-toggle]');
    if (! toggle) {
        return;
    }

    toggle.addEventListener('click', function () {
        const input = document.getElementById('password');
        const icon = this.querySelector('i');
        const showing = input.type === 'text';

        input.type = showing ? 'password' : 'text';
        icon.className = showing ? 'fa-regular fa-eye' : 'fa-regular fa-eye-slash';
        this.setAttribute('aria-label', showing ? 'Show password' : 'Hide password');
    });
});
</script>
<?= $this->endSection() ?>
