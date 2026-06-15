<?php
$title = $title ?? 'ISSP Management System';
$active = $active ?? '';
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
            --ink: #1f2a3a;
            --page: #f5f5f5;
            --panel: #ffffff;
            --line: #d7dce4;
            --nav: #1e2740;
            --muted: #6b7280;
            --brand: #4f6584;
            --brand-dark: #344863;
        }

        body {
            background: var(--page);
            color: var(--ink);
            font-family: "Segoe UI", system-ui, -apple-system, BlinkMacSystemFont, sans-serif;
            font-size: 13px;
            letter-spacing: 0;
        }

        button,
        input,
        select,
        textarea {
            font: inherit;
            letter-spacing: 0;
        }

        .app-layout {
            display: flex;
            min-height: 100vh;
        }

        .app-sidebar {
            width: 164px;
            background: var(--nav);
            color: #fff;
            display: flex;
            flex-direction: column;
            flex-shrink: 0;
            position: fixed;
            inset: 0 auto 0 0;
            z-index: 30;
            box-shadow: 1px 0 0 rgba(15, 23, 42, .08);
        }

        .brand {
            padding: 18px 12px 16px;
            border-bottom: 1px solid rgba(255, 255, 255, .08);
        }

        .brand-mark {
            width: 34px;
            height: 34px;
            border-radius: 999px;
            display: grid;
            place-items: center;
            background: #fff;
            color: var(--nav);
            font-size: .92rem;
            flex-shrink: 0;
        }

        .brand-text {
            min-width: 0;
        }

        .brand-text .title {
            font-size: .9rem;
            line-height: 1.1;
            font-weight: 700;
        }

        .brand-text .sub {
            font-size: .7rem;
            color: rgba(255, 255, 255, .58);
        }

        .sidebar-nav {
            min-height: 0;
            overflow: visible;
            padding: 8px 0 !important;
            scrollbar-width: thin;
        }

        .app-sidebar .nav-link {
            color: rgba(255, 255, 255, .72);
            background: transparent;
            border-radius: 0;
            padding: 7px 10px;
            margin-bottom: 4px;
            font-size: .78rem;
            line-height: 1.15;
            font-weight: 600;
            display: flex;
            align-items: center;
            gap: 8px;
            position: relative;
            transition: background-color .14s ease, color .14s ease;
        }

        .app-sidebar .nav-link i {
            width: 14px;
            text-align: center;
            font-size: .78rem;
            color: inherit;
        }

        .app-sidebar .nav-link:hover,
        .app-sidebar .nav-link.active {
            color: #273142;
            background: var(--page);
            box-shadow: inset 0 0 0 1px rgba(15, 23, 42, .05);
            width: 100%;
            z-index: 35;
        }

        .app-sidebar .nav-link:hover::before,
        .app-sidebar .nav-link.active::before,
        .app-sidebar .nav-link:hover::after,
        .app-sidebar .nav-link.active::after {
            content: "";
            position: absolute;
            right: 0;
            width: 12px;
            height: 12px;
            pointer-events: none;
        }

        .app-sidebar .nav-link:hover::before,
        .app-sidebar .nav-link.active::before {
            top: -12px;
            border-bottom-right-radius: 12px;
            box-shadow: 4px 4px 0 4px var(--page);
        }

        .app-sidebar .nav-link:hover::after,
        .app-sidebar .nav-link.active::after {
            bottom: -12px;
            border-top-right-radius: 12px;
            box-shadow: 4px -4px 0 4px var(--page);
        }

        .sidebar-footer {
            padding: 8px 0 !important;
        }

        .sidebar-footer form {
            margin: 0;
        }

        .sidebar-logout {
            border-radius: 0;
            color: rgba(255, 255, 255, .72) !important;
            background: transparent;
            border: 0;
            display: flex;
            align-items: center;
            gap: 8px;
            padding: 7px 10px !important;
            margin: 0;
            font-size: .78rem;
            line-height: 1.15;
            font-weight: 600;
            transition: background-color .14s ease, color .14s ease;
        }

        .sidebar-logout i {
            width: 14px;
            text-align: center;
            font-size: .78rem;
            color: inherit;
            margin-right: 0 !important;
        }

        .sidebar-logout:hover {
            color: #fff !important;
            background: rgba(255, 255, 255, .08);
        }

        .app-main {
            min-width: 0;
            flex: 1;
            margin-left: 164px;
        }

        .topbar {
            min-height: 54px;
            background: var(--brand);
            color: #fff;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 18px;
            position: sticky;
            top: 0;
            z-index: 25;
            box-shadow: 0 1px 0 rgba(15, 23, 42, .08);
        }

        .user-chip {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .page-title {
            font-size: 1.08rem;
            font-weight: 700;
            line-height: 1.1;
        }

        .user-chip .meta {
            font-size: .72rem;
            line-height: 1.05;
            text-align: right;
        }

        .user-chip .meta .name {
            font-weight: 600;
        }

        .user-chip .meta .role {
            color: rgba(255, 255, 255, .76);
        }

        .content-wrap {
            padding: 10px 12px 12px;
        }

        .panel {
            background: var(--panel);
            border: 1px solid #dfe4ea;
            border-radius: 6px;
            box-shadow: 0 2px 0 rgba(15, 23, 42, .03);
            overflow: hidden;
        }

        .panel-header {
            padding: 10px 12px;
            border-bottom: 1px solid var(--line);
            background: #ffffff;
        }

        .panel-title {
            font-size: .94rem;
            line-height: 1.2;
            font-weight: 700;
            margin: 0;
        }

        .panel-subtitle {
            margin: 3px 0 0;
            font-size: .74rem;
            color: var(--muted);
        }

        .panel-body {
            padding: 10px 12px 12px;
        }

        .stat-card {
            min-height: 64px;
            padding: 9px 11px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 10px;
            border-radius: 6px;
            box-shadow: 0 2px 0 rgba(15, 23, 42, .03);
            color: #fff;
            background: linear-gradient(180deg, #4f6180 0%, #44556f 100%);
            border: 1px solid #3f5069;
        }

        .stat-card.stat-card-alt {
            background: linear-gradient(180deg, #556c8b 0%, #495c78 100%);
        }

        .stat-card.stat-card-soft {
            background: linear-gradient(180deg, #62758f 0%, #586b84 100%);
        }

        .stat-card.stat-card-muted {
            background: linear-gradient(180deg, #5b6a80 0%, #506074 100%);
        }

        .stat-card .label {
            font-size: .7rem;
            color: rgba(255, 255, 255, .78);
            margin-bottom: 4px;
            line-height: 1.1;
        }

        .stat-card .value {
            font-size: 1.28rem;
            line-height: 1;
            font-weight: 700;
            letter-spacing: 0;
        }

        .stat-icon {
            width: 24px;
            height: 24px;
            border-radius: 50%;
            display: grid;
            place-items: center;
            flex-shrink: 0;
            background: rgba(255, 255, 255, .92);
            color: #4e627f;
            font-size: .82rem;
            box-shadow: inset 0 0 0 1px rgba(255, 255, 255, .2);
        }

        .dashboard-chart {
            padding: 8px 10px 10px;
        }

        .dashboard-chart__frame {
            border: 1px solid #e2e6ec;
            border-radius: 6px;
            padding: 8px 10px 8px;
            background: #fff;
            box-shadow: inset 0 1px 0 rgba(15, 23, 42, .02);
        }

        .division-chart-wrap {
            width: 100%;
            display: flex;
            justify-content: center;
        }

        .dashboard-chart__scroll {
            width: 100%;
            overflow-x: auto;
            overflow-y: hidden;
            padding-bottom: 4px;
            display: flex;
            justify-content: center;
        }

        .division-chart-canvas-wrap {
            position: relative;
            width: 100%;
            min-width: 100%;
            height: 240px;
        }

        .toolbar-form {
            gap: 8px;
        }

        .toolbar-form .form-control,
        .toolbar-form .form-select {
            height: 27px;
            min-height: 27px;
            padding-top: 0;
            padding-bottom: 0;
            font-size: .72rem;
        }

        .toolbar-form .btn {
            height: 27px;
            padding: 0 11px;
            font-size: .72rem;
            line-height: 1;
        }

        .icon-btn {
            width: 27px;
            height: 27px;
            padding: 0;
            display: inline-grid;
            place-items: center;
            border-radius: 5px;
        }

        .icon-btn .fa-solid,
        .icon-btn .fa-regular {
            font-size: .8rem;
        }

        .btn-primary {
            --bs-btn-bg: var(--brand-dark);
            --bs-btn-border-color: var(--brand-dark);
            --bs-btn-hover-bg: #24334d;
            --bs-btn-hover-border-color: #24334d;
        }

        .btn-outline-primary {
            --bs-btn-color: var(--brand-dark);
            --bs-btn-border-color: #c7cfdb;
            --bs-btn-hover-bg: #edf2f7;
            --bs-btn-hover-border-color: #b6c2d5;
            --bs-btn-hover-color: var(--brand-dark);
        }

        .btn-outline-danger {
            --bs-btn-color: #b33f3f;
            --bs-btn-border-color: #d3a7a7;
            --bs-btn-hover-bg: #f7eaea;
            --bs-btn-hover-border-color: #c98c8c;
            --bs-btn-hover-color: #9f2e2e;
        }

        .badge-soft {
            background: #edf2f7;
            color: var(--brand-dark);
            border: 1px solid #d8e0ea;
        }

        .modal-content {
            border: 1px solid #dfe4ea;
            border-radius: 6px;
            overflow: hidden;
            box-shadow: 0 18px 40px rgba(15, 23, 42, .18);
        }

        .modal-header {
            background: #536783;
            color: #fff;
            padding: 12px 14px;
            border-bottom: 0;
            margin: -1px -1px 0;
            width: calc(100% + 2px);
        }

        .modal-header .modal-title {
            font-size: .94rem;
            font-weight: 700;
            line-height: 1.15;
        }

        .modal-header .btn-close {
            filter: invert(1) grayscale(100%);
            opacity: .85;
        }

        .modal-body {
            padding: 12px;
        }

        .modal-footer {
            padding: 8px 12px;
            border-top: 1px solid #e1e6ee;
            margin: 0 -1px -1px;
            width: calc(100% + 2px);
        }

        .modal-footer.modal-footer-dark {
            background: #536783;
            border-top: 0;
            padding: 0;
        }

        .modal-footer.modal-footer-dark .btn {
            border-radius: 0;
            background: transparent;
            border: 0;
            color: #fff;
            width: 100%;
            min-height: 32px;
            padding: 8px 12px;
        }

        .detail-list {
            display: grid;
            grid-template-columns: 1fr 1.35fr;
            gap: 6px 10px;
            font-size: .72rem;
            align-items: start;
        }

        .detail-list .key {
            color: var(--muted);
            line-height: 1.15;
        }

        .detail-list .val {
            font-weight: 600;
            color: var(--ink);
            word-break: break-word;
            line-height: 1.15;
        }

        .modal-form-grid .form-label {
            font-size: .7rem;
            margin-bottom: .25rem;
            color: var(--muted);
        }

        .modal-form-grid .form-control,
        .modal-form-grid .form-select {
            font-size: .74rem;
            border-radius: 4px;
        }

        .modal-form-grid .form-text {
            font-size: .66rem;
        }

        .activity-meta {
            font-size: .7rem;
            color: var(--muted);
            line-height: 1.15;
        }

        .activity-summary {
            display: block;
            max-width: 100%;
            white-space: normal;
            overflow: hidden;
            text-overflow: ellipsis;
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
        }

        .table {
            margin-bottom: 0;
            font-size: .74rem;
        }

        .table > :not(caption) > * > * {
            padding: 8px 10px;
            vertical-align: middle;
            line-height: 1.18;
        }

        .table thead th {
            background: var(--brand);
            color: #fff;
            font-weight: 600;
            border-color: var(--brand);
            font-size: .72rem;
            line-height: 1.15;
        }

        .table tbody tr td {
            border-color: #e8ebf0;
        }

        .btn {
            border-radius: 4px;
            font-size: .74rem;
            font-weight: 600;
            line-height: 1.15;
            letter-spacing: 0;
        }

        .badge {
            border-radius: 4px;
            font-size: .68rem;
            font-weight: 600;
            line-height: 1.1;
        }

        .form-control,
        .form-select {
            border-color: #cfd6e1;
            border-radius: 4px;
            font-size: .74rem;
        }

        .form-label {
            font-size: .72rem;
            font-weight: 600;
            margin-bottom: .28rem;
            color: var(--ink);
        }

        .form-text,
        .small {
            font-size: .7rem;
            line-height: 1.2;
        }

        .form-control:focus,
        .form-select:focus {
            border-color: var(--brand);
            box-shadow: 0 0 0 .15rem rgba(79, 101, 132, .18);
        }

        .text-muted-strong {
            color: var(--muted);
        }

        @media (max-width: 991px) {
            .app-layout {
                display: block;
            }

            .app-sidebar {
                width: 100%;
                position: static;
                inset: auto;
            }

            .app-main {
                margin-left: 0;
            }

            .content-wrap {
                padding: 12px;
            }

            .topbar {
                position: sticky;
            }
        }
    </style>
    <?= $this->renderSection('styles') ?>
</head>
<body>
<div class="app-layout">
    <?= $this->include('frontend/layout/sidebar') ?>
    <main class="app-main">
        <header class="topbar">
            <div class="title-wrap">
                <div class="page-title"><?= esc($title) ?></div>
            </div>
            <div class="user-chip">
                <div class="meta d-none d-sm-block">
                    <div class="name"><?= esc(session()->get('name')) ?></div>
                    <div class="role"><?= esc(session()->get('role_name')) ?></div>
                </div>
            </div>
        </header>
        <div class="content-wrap">
            <?= $this->renderSection('content') ?>
        </div>
    </main>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<?= $this->renderSection('scripts') ?>
</body>
</html>
