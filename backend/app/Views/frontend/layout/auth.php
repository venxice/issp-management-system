<?php
$title = $title ?? 'ISSP Management System';
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= esc($title) ?> | ISSP Management System</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
    <style>
        :root {
            --ink: #f8fafc;
            --page: #121826;
            --panel: #1b2434;
            --line: rgba(255, 255, 255, .12);
            --brand: #8da1bd;
            --brand-dark: #667d9c;
        }

        body {
            min-height: 100vh;
            margin: 0;
            color: var(--ink);
            font-family: "Segoe UI", system-ui, -apple-system, BlinkMacSystemFont, sans-serif;
            background:
                radial-gradient(circle at 20% 20%, rgba(141, 161, 189, .28), transparent 28%),
                radial-gradient(circle at 80% 0%, rgba(92, 109, 141, .2), transparent 24%),
                linear-gradient(180deg, #111827 0%, #f5f6f8 82%);
        }

        .auth-shell {
            min-height: 100vh;
            display: grid;
            place-items: center;
            padding: 36px 18px;
        }

        .auth-heading {
            color: #ffffff;
            text-align: center;
            font-size: clamp(2rem, 4vw, 3rem);
            font-weight: 800;
            margin-bottom: 34px;
        }

        .auth-heading span {
            color: var(--brand);
        }

        .auth-card {
            width: min(720px, 100%);
            min-height: 520px;
            overflow: hidden;
            background: var(--panel);
            border: 1px solid rgba(255, 255, 255, .08);
            border-radius: 14px;
            box-shadow: 0 24px 70px rgba(20, 29, 45, .34);
        }

        .auth-form-wrap {
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
            background: var(--brand);
            border-color: var(--brand);
            font-weight: 700;
        }

        .btn-login:hover {
            background: var(--brand-dark);
            border-color: var(--brand-dark);
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
            .auth-card {
                min-height: auto;
            }
        }
    </style>
    <?= $this->renderSection('styles') ?>
</head>
<body>
<main class="auth-shell">
    <?= $this->renderSection('content') ?>
</main>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<?= $this->renderSection('scripts') ?>
</body>
</html>
