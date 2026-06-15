<?= $this->extend('frontend/layout/auth') ?>

<?= $this->section('content') ?>
<section class="w-100">
    <h1 class="auth-heading">Welcome to <span>ICT Planner</span></h1>
    <div class="auth-card mx-auto">
    <div class="auth-intro d-none d-lg-flex">
        <div>
            <div class="eyebrow"><i class="fa-solid fa-shield-halved"></i> Secure role access</div>
            <h2>Sign in to manage ICT projects, ISSP submissions, and reports in one place.</h2>
            <p>Access a centralized platform for ICT planning, budget management, project monitoring, and report generation.</p>
        </div>

        <ul class="feature-list">
            <li><i class="fa-regular fa-circle-check"></i> ICT Project Management</li>
            <li><i class="fa-regular fa-circle-check"></i> ISSP Submission Tracking</li>
            <li><i class="fa-regular fa-circle-check"></i> Role-Based Access Control</li>
        </ul>
    </div>

        <div class="auth-form-wrap">
            <h2 class="fw-bold mb-1">Sign in</h2>
            <p class="auth-subtitle">Use your account credentials or Google SSO if your email is already registered.</p>

            <?= $this->include('frontend/layout/alerts') ?>

            <form action="<?= site_url('login') ?>" method="post" class="d-grid gap-3">
                <?= csrf_field() ?>
                <div>
                    <label class="form-label fw-semibold" for="email">Email</label>
                    <input class="form-control" id="email" name="email" type="email" value="<?= esc(old('email')) ?>" placeholder="name@company.com" autocomplete="email" required>
                </div>

                <div>
                    <label class="form-label fw-semibold" for="password">Password</label>
                    <div class="password-wrap">
                        <input class="form-control pe-5" id="password" name="password" type="password" placeholder="Enter your password" autocomplete="current-password" required>
                        <button class="password-toggle" type="button" aria-label="Show password" data-password-toggle>
                            <i class="fa-regular fa-eye"></i>
                        </button>
                    </div>
                </div>

                <button class="btn btn-primary btn-login mt-2" type="submit">
                    <i class="fa-solid fa-right-to-bracket me-2"></i> Login
                </button>
            </form>

            <div class="divider my-4">OR</div>

            <a class="btn google-btn d-flex align-items-center justify-content-center gap-3" href="<?= site_url('auth/google') ?>">
                <i class="fa-brands fa-google"></i>
                <span>Continue with Google</span>
            </a>

            <?php if (! $googleEnabled): ?>
                <p class="small text-secondary mt-3 mb-0">Google SSO needs credentials in the environment before it can accept sign-ins.</p>
            <?php endif; ?>

            <p class="small text-secondary mt-2 mb-0">
                Google sign-in only works for accounts already created by the administrator.
                If your email is not registered or your account is inactive, login will be blocked.
            </p>
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
