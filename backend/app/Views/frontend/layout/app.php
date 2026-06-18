<?php
$title = $title ?? 'ISSP Management System';
$active = $active ?? '';
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css?v=2" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css?v=2" rel="stylesheet">
    <style>
        :root {
            --ink: #1f2a3a;
            --page: #eef2f6;
            --panel: #ffffff;
            --line: #d9e0ea;
            --nav: #1b2434;
            --muted: #6b7280;
            --brand: #4f6584;
            --brand-dark: #344863;
        }

        body {
            min-height: 100vh;
            background:
                radial-gradient(circle at top left, rgba(79, 101, 132, .08), transparent 24%),
                radial-gradient(circle at top right, rgba(79, 101, 132, .06), transparent 20%),
                var(--page);
            color: var(--ink);
            font-family: "Segoe UI", system-ui, -apple-system, BlinkMacSystemFont, sans-serif;
            font-size: 13.5px;
            line-height: 1.45;
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
            width: 182px;
            background: linear-gradient(180deg, #202a3e 0%, var(--nav) 100%);
            color: #fff;
            display: flex;
            flex-direction: column;
            flex-shrink: 0;
            position: fixed;
            inset: 0 auto 0 0;
            z-index: 30;
            box-shadow: 1px 0 0 rgba(15, 23, 42, .08);
            transition: transform 0.3s ease-in-out;
        }

        .app-sidebar.sidebar-closed {
            transform: translateX(-100%);
        }

        .sidebar-overlay {
            display: none;
            position: fixed;
            inset: 0;
            background: rgba(0, 0, 0, 0.5);
            z-index: 29;
            opacity: 0;
            transition: opacity 0.3s ease-in-out;
        }

        .sidebar-overlay.active {
            display: block;
            opacity: 1;
        }

        body.sidebar-open {
            overflow: hidden;
        }

        .menu-toggle {
            display: none;
            background: none;
            border: none;
            color: #fff;
            font-size: 1.25rem;
            cursor: pointer;
            padding: 8px;
            border-radius: 6px;
            transition: background-color 0.2s ease;
        }

        .menu-toggle:hover {
            background: rgba(255, 255, 255, 0.1);
        }

        .sidebar-close {
            background: none;
            border: none;
            color: rgba(255, 255, 255, 0.8);
            font-size: 1.25rem;
            cursor: pointer;
            padding: 8px;
            border-radius: 6px;
            transition: background-color 0.2s ease;
            width: 36px;
            height: 36px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .sidebar-close:hover {
            background: rgba(255, 255, 255, 0.1);
            color: #fff;
        }

        .brand {
            padding: 18px 12px;
            text-align: center;
            border-bottom: 1px solid rgba(255,255,255,.08);
            margin-bottom: 8px;
            position: relative;
        }

        .brand-logo {
            width: 48px;
            height: 48px;
            margin: 0 auto 10px;
            border-radius: 12px;
            background: rgba(255,255,255,.10);
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .brand-logo i {
            font-size: 20px;
            color: #fff;
        }

        .brand-subtitle {
            font-size: 9px;
            text-transform: uppercase;
            letter-spacing: .8px;
            color: rgba(255,255,255,.65);
            margin-bottom: 2px;
            line-height: 1.3;
        }

        .brand-title {
            font-size: 18px;
            font-weight: 700;
            color: #fff;
            line-height: 1.2;
        }

        .brand-description {
            margin-top: 4px;
            font-size: 10px;
            color: rgba(255,255,255,.75);
        }

        .sidebar-nav {
            min-height: 0;
            overflow: visible;
            padding: 10px 0 !important;
            scrollbar-width: thin;
        }

        .app-sidebar .nav-link {
            color: rgba(255, 255, 255, .76);
            background: transparent;
            border-radius: 10px;
            padding: 10px 12px;
            margin-bottom: 6px;
            font-size: .82rem;
            line-height: 1.15;
            font-weight: 600;
            display: flex;
            align-items: center;
            gap: 8px;
            position: relative;
            transition: background-color .14s ease, color .14s ease, box-shadow .14s ease;
        }

        .app-sidebar .nav-link i {
            width: 16px;
            text-align: center;
            font-size: .82rem;
            color: inherit;
        }

        .app-sidebar .nav-link:hover,
        .app-sidebar .nav-link.active {
            color: #1f2a3a;
            background: rgba(255, 255, 255, .92);
            box-shadow: inset 3px 0 0 #8ea1bc, 0 10px 22px rgba(15, 23, 42, .12);
            width: 100%;
            z-index: 35;
            transform: none;
        }

        .sidebar-footer {
            padding: 10px 0 !important;
        }

        .sidebar-footer form {
            margin: 0;
        }

        .sidebar-logout {
            border-radius: 10px;
            color: rgba(255, 255, 255, .72) !important;
            background: transparent;
            border: 0;
            display: flex;
            align-items: center;
            gap: 8px;
            padding: 10px 12px !important;
            margin: 0;
            font-size: .82rem;
            line-height: 1.15;
            font-weight: 600;
            transition: background-color .14s ease, color .14s ease, box-shadow .14s ease;
        }

        .sidebar-logout i {
            width: 16px;
            text-align: center;
            font-size: .82rem;
            color: inherit;
            margin-right: 0 !important;
        }

        .sidebar-logout:hover {
            color: #fff !important;
            background: rgba(255, 255, 255, .08);
            box-shadow: inset 3px 0 0 rgba(255, 255, 255, .22);
        }

        .app-main {
            min-width: 0;
            flex: 1;
            margin-left: 182px;
        }

        .topbar {
            min-height: 58px;
            background: linear-gradient(180deg, #566d8b 0%, var(--brand) 100%);
            color: #fff;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 20px;
            position: sticky;
            top: 0;
            z-index: 25;
            box-shadow: 0 1px 0 rgba(15, 23, 42, .08), 0 8px 24px rgba(15, 23, 42, .08);
        }

        .title-wrap {
            flex: 1;
        }

        .user-chip {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .page-title {
            font-size: 1.02rem;
            font-weight: 700;
            line-height: 1.1;
            letter-spacing: -.01em;
        }

        .user-chip .meta {
            font-size: .74rem;
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
            padding: 14px;
        }

        .panel {
            background: var(--panel);
            border: 1px solid #dde4ed;
            border-radius: 10px;
            box-shadow: 0 12px 26px rgba(15, 23, 42, .05);
            overflow: hidden;
        }

        .panel-header {
            padding: 12px 14px;
            border-bottom: 1px solid var(--line);
            background: #ffffff;
        }

        .panel-title {
            font-size: .98rem;
            line-height: 1.2;
            font-weight: 700;
            margin: 0;
            letter-spacing: -.01em;
        }

        .panel-subtitle {
            margin: 4px 0 0;
            font-size: .76rem;
            color: var(--muted);
        }

        .panel-body {
            padding: 14px;
        }

        .stat-card {
            min-height: 88px;
            padding: 16px 18px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 14px;
            border-radius: 12px;
            box-shadow: 0 10px 22px rgba(15, 23, 42, .08);
            color: #fff;
            background: linear-gradient(180deg, #526783 0%, #44566f 100%);
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
            font-size: .8rem;
            color: rgba(255, 255, 255, .82);
            margin-bottom: 6px;
            line-height: 1.15;
            text-transform: uppercase;
            letter-spacing: .04em;
        }

        .stat-card .value {
            font-size: 1.52rem;
            line-height: 1.05;
            font-weight: 700;
            letter-spacing: 0;
        }

        .stat-icon {
            width: 38px;
            height: 38px;
            border-radius: 50%;
            display: grid;
            place-items: center;
            flex-shrink: 0;
            background: rgba(255, 255, 255, .92);
            color: #4e627f;
            font-size: 1rem;
            box-shadow: inset 0 0 0 1px rgba(255, 255, 255, .2);
        }

        .dashboard-chart {
            padding: 10px;
        }

        .dashboard-chart__frame {
            border: 1px solid #e2e6ec;
            border-radius: 10px;
            padding: 10px 12px 20px;
            background: #fff;
            box-shadow: inset 0 1px 0 rgba(15, 23, 42, .02), 0 8px 18px rgba(15, 23, 42, .04);
            overflow: visible;
        }

        .css-bar-chart {
            display: flex;
            align-items: flex-end;
            justify-content: center;
            gap: 12px;
            height: 200px;
            padding: 20px 60px 30px 60px;
            width: 100%;
            overflow-x: auto;
            overflow-y: visible;
            position: relative;
        }

        .css-bar-chart__background {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            pointer-events: none;
            z-index: 0;
        }

        .css-bar-chart__reference-line {
            position: absolute;
            left: 0;
            right: 0;
            border-top: 1px dashed rgba(15, 23, 42, 0.2);
            pointer-events: none;
        }

        .css-bar-chart__reference-label {
            position: absolute;
            right: 4px;
            transform: translateY(-50%);
            font-size: 10px;
            color: rgba(15, 23, 42, 0.5);
            background: #fff;
            padding: 2px 4px;
            border-radius: 2px;
            white-space: nowrap;
            line-height: 1;
        }

        .css-bar-chart__item {
            flex: 0 0 auto;
            width: 48px;
            height: 100%;
            display: flex;
            align-items: flex-end;
            justify-content: center;
            position: relative;
            z-index: 1;
        }

        .css-bar-chart__item:hover {
            z-index: 100;
        }

        .css-bar-chart__bar {
            width: 100%;
            border-radius: 6px 6px 0 0;
            transition: height 0.3s ease;
            cursor: pointer;
            position: relative;
        }

        .css-bar-chart__bar:hover {
            opacity: 0.8;
        }

        .css-bar-chart__tooltip {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background: rgba(15, 23, 42, 0.95);
            color: #fff;
            padding: 8px 12px;
            border-radius: 6px;
            font-size: 12px;
            white-space: nowrap;
            opacity: 0;
            visibility: hidden;
            transition: opacity 0.2s ease, visibility 0.2s ease;
            pointer-events: none;
            z-index: 99999;
            min-width: 100px;
            text-align: center;
            box-shadow: 0 4px 12px rgba(15, 23, 42, 0.15);
        }



        .css-bar-chart__bar:hover .css-bar-chart__tooltip {
            opacity: 1;
            visibility: visible;
        }

        .css-bar-chart__tooltip-division {
            font-weight: 600;
            margin-bottom: 2px;
            font-size: 13px;
        }

        .css-bar-chart__tooltip-count {
            color: rgba(255, 255, 255, 0.8);
            font-size: 11px;
        }

        .toolbar-form {
            gap: 8px;
            flex-wrap: wrap;
        }

        .toolbar-form input,
        .toolbar-form select {
            flex-shrink: 0;
        }

        .toolbar-form .form-control,
        .toolbar-form .form-select {
            max-width: 180px;
            height: 28px;
            min-height: 28px;
            padding-top: 0;
            padding-bottom: 0;
            font-size: .72rem;
        }

        .pagination {
            margin: 0;
            gap: 4px;
        }

        .pagination .page-link {
            border: 1px solid #d9e0ea;
            color: #1b2434;
            background: #fff;
            font-size: .75rem;
            padding: 6px 10px;
            border-radius: 6px;
            transition: all 0.2s ease;
            line-height: 1.2;
        }

        .pagination .page-link:hover {
            background: #eef2f6;
            border-color: #1b2434;
            color: #1b2434;
        }

        .pagination .page-item.active .page-link {
            background: #1b2434;
            border-color: #1b2434;
            color: #fff;
        }

        .pagination .page-item.disabled .page-link {
            background: #f8f9fa;
            border-color: #e9ecef;
            color: #6c757d;
        }

        .d-flex.justify-content-between.align-items-center.mt-3 {
            margin-top: 12px !important;
            padding: 8px 20px;
            max-width: 100%;
        }

        .d-flex.justify-content-between.align-items-center.mt-3 > .text-muted {
            flex-shrink: 0;
            padding-right: 8px;
        }

        .d-flex.justify-content-between.align-items-center.mt-3 > nav {
            flex-shrink: 0;
            padding-left: 8px;
        }

        .toolbar-form .btn {
            height: 28px;
            padding: 0 10px;
            font-size: .72rem;
            line-height: 1;
        }

        .audit-toolbar {
            flex-wrap: nowrap;
            justify-content: flex-end;
        }

        .audit-toolbar .form-control {
            width: 182px;
        }

        .audit-toolbar .form-control[type="date"] {
            width: 148px;
        }

        .icon-btn {
            width: 29px;
            height: 29px;
            padding: 0;
            display: inline-grid;
            place-items: center;
            border-radius: 6px;
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
            border-radius: 6px;
            font-size: .76rem;
            font-weight: 600;
            line-height: 1.15;
            letter-spacing: 0;
        }

        .badge {
            border-radius: 6px;
            font-size: .7rem;
            font-weight: 600;
            line-height: 1.1;
        }

        .form-control,
        .form-select {
            border-color: #cfd6e1;
            border-radius: 6px;
            font-size: .76rem;
        }

        .form-label {
            font-size: .74rem;
            font-weight: 600;
            margin-bottom: .32rem;
            color: var(--ink);
        }

        .form-text,
        .small {
            font-size: .72rem;
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
            .app-sidebar {
                transform: translateX(-100%);
                width: 280px;
            }

            .app-sidebar.sidebar-open {
                transform: translateX(0);
            }

            .app-main {
                margin-left: 0;
            }

            .menu-toggle {
                display: block;
            }

            .content-wrap {
                padding: 12px;
            }

            .topbar {
                position: sticky;
            }

            .brand {
                padding: 20px 12px;
            }

            .sidebar-nav {
                padding: 16px;
            }

            .app-sidebar .nav-link {
                padding: 12px 16px;
                font-size: .9rem;
            }

            .stat-card {
                min-height: 80px;
                padding: 14px 16px;
                gap: 12px;
            }

            .stat-card .label {
                font-size: .75rem;
                margin-bottom: 4px;
            }

            .stat-card .value {
                font-size: 1.4rem;
            }

            .stat-icon {
                width: 34px;
                height: 34px;
                font-size: .95rem;
            }

            .toolbar-form .form-control,
            .toolbar-form .form-select {
                max-width: 150px;
            }

            .pagination .page-link {
                padding: 5px 8px;
                font-size: .7rem;
            }

            .d-flex.justify-content-between.align-items-center.mt-3 {
                margin-top: 8px !important;
                padding: 8px 14px;
            }

            .d-flex.justify-content-between.align-items-center.mt-3 > .text-muted {
                padding-right: 6px;
            }

            .d-flex.justify-content-between.align-items-center.mt-3 > nav {
                padding-left: 6px;
            }

            .css-bar-chart {
                gap: 8px;
                padding: 20px 50px 25px 50px;
                height: 180px;
            }

            .css-bar-chart__item {
                width: 40px;
            }
        }

        @media (max-width: 575px) {
            .stat-card {
                min-height: 72px;
                padding: 12px 14px;
                gap: 10px;
            }

            .stat-card .label {
                font-size: .7rem;
                margin-bottom: 4px;
            }

            .stat-card .value {
                font-size: 1.25rem;
            }

            .stat-icon {
                width: 30px;
                height: 30px;
                font-size: .85rem;
            }

            .toolbar-form {
                gap: 6px;
            }

            .toolbar-form .form-control,
            .toolbar-form .form-select {
                max-width: 120px;
                font-size: .68rem;
            }

            .panel-header {
                flex-direction: column;
                align-items: flex-start;
            }

            .panel-header .toolbar-form {
                width: 100%;
                margin-top: 8px;
            }

            .pagination {
                gap: 2px;
            }

            .pagination .page-link {
                padding: 4px 6px;
                font-size: .65rem;
            }

            .d-flex.justify-content-between.align-items-center.mt-3 {
                flex-direction: column;
                gap: 8px;
                align-items: flex-start;
                margin-top: 6px !important;
                padding: 8px 8px;
            }

            .d-flex.justify-content-between.align-items-center.mt-3 > .text-muted {
                padding-right: 0;
            }

            .d-flex.justify-content-between.align-items-center.mt-3 > nav {
                padding-left: 0;
                width: 100%;
            }

            .d-flex.justify-content-between.align-items-center.mt-3 .pagination {
                justify-content: center;
            }

            .css-bar-chart {
                gap: 6px;
                padding: 20px 40px 20px 40px;
                height: 160px;
            }

            .css-bar-chart__item {
                width: 32px;
            }
        }
    </style>
    <?= $this->renderSection('styles') ?>
</head>
<body>
<div class="app-layout">
    <?= $this->include('frontend/layout/sidebar') ?>
    <div class="sidebar-overlay" id="sidebarOverlay"></div>
    <main class="app-main">
        <header class="topbar">
            <div class="d-flex align-items-center gap-3">
                <button class="menu-toggle" id="menuToggle" aria-label="Toggle menu">
                    <i class="fa-solid fa-bars"></i>
                </button>
                <div class="title-wrap">
                    <div class="page-title"><?= esc($title) ?></div>
                </div>
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

<!-- Logout Confirmation Modal -->
<div class="modal fade" id="logoutConfirmModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-sm modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><i class="fa-solid fa-right-from-bracket me-2"></i>Confirm Logout</h5>
            </div>
            <div class="modal-body">
                <p class="mb-0">Are you sure you want to log out?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary" id="confirmLogoutButton">Logout</button>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Sidebar Toggle Functionality
    const menuToggle = document.getElementById('menuToggle');
    const sidebar = document.querySelector('.app-sidebar');
    const sidebarOverlay = document.getElementById('sidebarOverlay');

    function toggleSidebar() {
        sidebar.classList.toggle('sidebar-open');
        sidebarOverlay.classList.toggle('active');
        document.body.classList.toggle('sidebar-open');

        // Update menu icon
        const icon = menuToggle.querySelector('i');
        if (sidebar.classList.contains('sidebar-open')) {
            icon.classList.remove('fa-bars');
            icon.classList.add('fa-xmark');
        } else {
            icon.classList.remove('fa-xmark');
            icon.classList.add('fa-bars');
        }
    }

    function closeSidebar() {
        sidebar.classList.remove('sidebar-open');
        sidebarOverlay.classList.remove('active');
        document.body.classList.remove('sidebar-open');

        // Reset menu icon
        const icon = menuToggle.querySelector('i');
        icon.classList.remove('fa-xmark');
        icon.classList.add('fa-bars');
    }

    if (menuToggle && sidebar && sidebarOverlay) {
        menuToggle.addEventListener('click', toggleSidebar);
        sidebarOverlay.addEventListener('click', closeSidebar);

        // Add close button functionality
        const sidebarClose = document.getElementById('sidebarClose');
        if (sidebarClose) {
            sidebarClose.addEventListener('click', closeSidebar);
        }
    }

    // Close sidebar when clicking on nav links (mobile)
    const navLinks = document.querySelectorAll('.sidebar-nav .nav-link');
    navLinks.forEach(link => {
        link.addEventListener('click', function() {
            if (window.innerWidth <= 991) {
                closeSidebar();
            }
        });
    });

    // Handle window resize
    window.addEventListener('resize', function() {
        if (window.innerWidth > 991) {
            closeSidebar();
        }
    });

    // Logout Confirmation Modal
    const logoutButton = document.getElementById('logoutButton');
    const logoutForm = document.getElementById('logoutForm');
    const logoutConfirmModal = document.getElementById('logoutConfirmModal');
    const confirmLogoutButton = document.getElementById('confirmLogoutButton');

    if (logoutButton && logoutForm && logoutConfirmModal && confirmLogoutButton) {
        let logoutModalInstance;

        logoutButton.addEventListener('click', function(e) {
            e.preventDefault();
            logoutModalInstance = new bootstrap.Modal(logoutConfirmModal);
            logoutModalInstance.show();
        });

        confirmLogoutButton.addEventListener('click', function() {
            if (logoutModalInstance) {
                logoutModalInstance.hide();
            }
            logoutForm.submit();
        });
    }
});
</script>
<?= $this->renderSection('scripts') ?>
</body>
</html>
