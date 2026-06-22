<?php
$title = $title ?? 'ISSP Management System';
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Cache-Control" content="no-store, no-cache, must-revalidate, max-age=0">
    <meta http-equiv="Cache-Control" content="post-check=0, pre-check=0">
    <meta http-equiv="Pragma" content="no-cache">
    <meta http-equiv="Expires" content="Sat, 26 Jul 1997 05:00:00 GMT">
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
                radial-gradient(circle at 20% 20%, rgba(79, 101, 132, .16), transparent 26%),
                radial-gradient(circle at 80% 0%, rgba(79, 101, 132, .12), transparent 22%),
                linear-gradient(180deg, #eef2f6 0%, #f5f5f5 68%, #eef1f5 100%);
        }

        .auth-shell {
            min-height: 100vh;
            display: grid;
            place-items: center;
            padding: 34px 18px;
        }

        .auth-heading {
            color: #1f2a3a;
            text-align: center;
            font-size: clamp(1.8rem, 3vw, 2.35rem);
            font-weight: 800;
            letter-spacing: -.02em;
            margin-bottom: 22px;
        }

        .auth-heading span {
            color: var(--brand);
        }

        .auth-card {
            width: min(980px, 100%);
            min-height: 560px;
            overflow: hidden;
            background: #ffffff;
            border: 1px solid #dfe4ea;
            border-radius: 10px;
            box-shadow: 0 18px 48px rgba(31, 42, 58, .12);
            display: grid;
            grid-template-columns: 1fr 1.15fr;
        }

        .auth-intro {
            padding: clamp(34px, 5vw, 56px);
            background:
                linear-gradient(180deg, rgba(79, 101, 132, .98), rgba(52, 72, 99, .98)),
                radial-gradient(circle at top right, rgba(255, 255, 255, .12), transparent 35%);
            color: #ffffff;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            gap: 24px;
        }

        .auth-intro .eyebrow {
            display: inline-flex;
            align-self: flex-start;
            align-items: center;
            gap: 8px;
            padding: 7px 12px;
            border-radius: 999px;
            background: rgba(255, 255, 255, .12);
            font-size: .72rem;
            font-weight: 700;
            letter-spacing: .02em;
            text-transform: uppercase;
        }

        .auth-intro h2 {
            font-size: clamp(1.5rem, 3vw, 2.15rem);
            line-height: 1.1;
            font-weight: 800;
            margin: 14px 0 12px;
            letter-spacing: -.02em;
        }

        .auth-intro p {
            margin: 0;
            max-width: 32ch;
            color: rgba(255, 255, 255, .84);
            font-size: .92rem;
            line-height: 1.55;
        }

        .auth-intro .feature-list {
            display: grid;
            gap: 10px;
            margin: 0;
            padding: 0;
            list-style: none;
        }

        .auth-intro .feature-list li {
            display: flex;
            align-items: center;
            gap: 10px;
            font-size: .88rem;
            color: rgba(255, 255, 255, .9);
        }

        .auth-intro .feature-list i {
            color: #d8e2ef;
        }

        .auth-form-wrap {
            color: #1f2a3a;
            padding: clamp(32px, 5vw, 54px);
            display: flex;
            flex-direction: column;
            justify-content: center;
            background:
                linear-gradient(180deg, #ffffff 0%, #fbfcfe 100%);
        }

        .auth-form-wrap h2 {
            font-size: 1.5rem;
            line-height: 1.15;
            letter-spacing: -.02em;
        }

        .auth-subtitle {
            color: #6b7280;
            font-size: .88rem;
            margin-top: 6px;
            margin-bottom: 24px;
        }

        .form-control {
            min-height: 46px;
            border-radius: 8px;
            border-color: var(--line);
            box-shadow: none;
            font-size: .92rem;
        }

        .form-control:focus {
            border-color: var(--brand);
            box-shadow: 0 0 0 .2rem rgba(79, 101, 132, .12);
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
            color: #6b7280;
        }

        .btn-login {
            min-height: 46px;
            border-radius: 8px;
            background: var(--brand);
            border-color: var(--brand);
            font-weight: 700;
            box-shadow: 0 10px 18px rgba(79, 101, 132, .16);
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
            min-height: 46px;
            border-radius: 8px;
            color: #1f2a3a;
            border-color: #d7dce4;
            font-weight: 700;
            background: #ffffff;
        }

        .google-btn:hover {
            color: #1f2a3a;
            border-color: #c7cfdb;
            background: #f8fafc;
        }

        @media (max-width: 991.98px) {
            .auth-card {
                min-height: auto;
                grid-template-columns: 1fr;
            }

            .auth-intro {
                gap: 14px;
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
