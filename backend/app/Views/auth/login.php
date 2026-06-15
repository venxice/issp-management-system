<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login | ISSP Management System</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
    <style>
        :root {
            --navy: #1d293d;
            --muted-blue: #8da1bd;
            --line: #d8dee8;
            --page: #f5f6f8;
        }

        body {
            min-height: 100vh;
            background:
                radial-gradient(circle at 50% 30%, rgba(141, 161, 189, .36), transparent 32%),
                linear-gradient(180deg, #222c40 0%, #f5f6f8 82%);
            font-family: Inter, system-ui, -apple-system, BlinkMacSystemFont, "Segoe UI", sans-serif;
        }

        .login-shell {
            min-height: 100vh;
            display: grid;
            place-items: center;
            padding: 36px 18px;
        }

        .login-heading {
            color: #ffffff;
            text-align: center;
            font-size: clamp(2rem, 4vw, 3rem);
            font-weight: 800;
            margin-bottom: 34px;
        }

        .login-heading span {
            color: var(--muted-blue);
        }

        .login-card {
            width: min(720px, 100%);
            min-height: 520px;
            overflow: hidden;
            background: var(--navy);
            border-radius: 12px;
            box-shadow: 0 24px 70px rgba(20, 29, 45, .34);
        }

        .login-form-wrap {
            color: #ffffff;
            padding: clamp(36px, 6vw, 64px);
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .form-control {
            min-height: 54px;
            border-radius: 8px;
            border-color: var(--line);
        }

        .password-wrap {
            position: relative;
        }

        .password-toggle {
            position: absolute;
            right: 14px;
            top: 50%;
            transform: translateY(-50%);
            border: 0;
            background: transparent;
            color: #111827;
        }

        .btn-login {
            min-height: 54px;
            border-radius: 8px;
            background: var(--muted-blue);
            border-color: var(--muted-blue);
            font-weight: 700;
        }

        .btn-login:hover {
            background: #7890ae;
            border-color: #7890ae;
        }

        .divider {
            display: grid;
            grid-template-columns: 1fr auto 1fr;
            align-items: center;
            gap: 14px;
            color: #d0d5dd;
            font-size: .78rem;
        }

        .divider::before,
        .divider::after {
            content: "";
            height: 1px;
            background: rgba(255, 255, 255, .42);
        }

        .google-btn {
            min-height: 50px;
            border-radius: 999px;
            color: #ffffff;
            border-color: rgba(255, 255, 255, .55);
            font-weight: 700;
        }

        .google-btn:hover {
            color: #ffffff;
            border-color: #ffffff;
            background: rgba(255, 255, 255, .08);
        }

        @media (max-width: 860px) {
            .login-card {
                min-height: auto;
            }
        }
    </style>
</head>
<body>
<main class="login-shell">
    <section class="w-100">
        <h1 class="login-heading">Welcome to <span>ICT Planner</span></h1>
        <div class="login-card mx-auto">
            <div class="login-form-wrap">
                <h2 class="fw-bold mb-4">Login Your Account</h2>
                <?= $this->include('layout/alerts') ?>

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
</main>

<script>
    document.querySelector('[data-password-toggle]').addEventListener('click', function () {
        const input = document.getElementById('password');
        const icon = this.querySelector('i');
        const showing = input.type === 'text';

        input.type = showing ? 'password' : 'text';
        icon.className = showing ? 'fa-regular fa-eye' : 'fa-regular fa-eye-slash';
        this.setAttribute('aria-label', showing ? 'Show password' : 'Hide password');
    });
</script>
</body>
</html>
