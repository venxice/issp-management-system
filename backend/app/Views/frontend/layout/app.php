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
    <meta name="csrf-token" content="<?= csrf_hash() ?>">
    <title><?= esc($title) ?> | ISSP Management System</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css?v=2" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css?v=2" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css" rel="stylesheet">
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
            width: 220px;
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
            max-height: 100vh;
            overflow: hidden;
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
            flex-shrink: 0;
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
            flex: 1;
            overflow-y: auto;
            overflow-x: hidden;
            padding: 10px 0 !important;
            scrollbar-width: thin;
        }

        .sidebar-nav::-webkit-scrollbar {
            width: 6px;
        }

        .sidebar-nav::-webkit-scrollbar-track {
            background: rgba(255, 255, 255, 0.05);
        }

        .sidebar-nav::-webkit-scrollbar-thumb {
            background: rgba(255, 255, 255, 0.2);
            border-radius: 3px;
        }

        .sidebar-nav::-webkit-scrollbar-thumb:hover {
            background: rgba(255, 255, 255, 0.3);
        }

        .app-sidebar .nav-link {
            color: rgba(255, 255, 255, .76);
            background: transparent;
            border-radius: 0;
            padding: 10px 12px 10px 12px;
            margin-bottom: 4px;
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
            flex-shrink: 0;
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
            flex-shrink: 0;
            margin-top: auto;
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
            margin-left: 220px;
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
            padding: 35px 60px 10px 60px;
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

        .badge-status {
            border: 1px solid transparent;
            font-size: .7rem;
            padding: 4px 10px;
            border-radius: 6px;
            font-weight: 600;
            line-height: 1.1;
        }
        .badge-status-draft {
            background: #e2e8f0;
            color: #475569;
        }
        .badge-status-pending {
            background: #fef3c7;
            color: #92400e;
            border-color: #fde68a;
        }
        .badge-status-approved {
            background: #dcfce7;
            color: #166534;
            border-color: #bbf7d0;
        }
        .badge-status-rejected {
            background: #fee2e2;
            color: #991b1b;
            border-color: #fecaca;
        }
        .badge-status-submitted {
            background: #e0e7ff;
            color: #4338ca;
            border-color: #c7d2fe;
        }
        .badge-status-revision {
            background: #fef9c3;
            color: #854d0e;
            border-color: #fef08a;
        }
        .badge-status-endorsed {
            background: #e8f0fe;
            color: #2a5c8a;
            border-color: #c5d9f0;
        }
        .badge-status-returned {
            background: #ffedd5;
            color: #9a3412;
            border-color: #fed7aa;
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
            max-height: 3.5em;
            overflow-y: auto;
            white-space: normal;
            word-wrap: break-word;
            font-size: inherit;
            color: inherit;
        }

        .table {
            table-layout: auto;
            width: 100%;
        }

        .table th,
        .table td {
            white-space: nowrap;
        }

        .table-responsive {
            overflow-x: auto;
            -webkit-overflow-scrolling: touch;
        }

        @media (max-width: 768px) {
            .table-responsive {
                overflow-x: scroll;
            }

            .table {
                table-layout: auto;
                width: 100%;
            }

            .table.table-users th,
            .table.table-users td,
            .table.table-logs th,
            .table.table-logs td {
                width: auto !important;
            }

            .table.table-users th:nth-child(1),
            .table.table-users td:nth-child(1),
            .table.table-logs th:nth-child(1),
            .table.table-logs td:nth-child(1) {
                width: 80px !important;
                min-width: 80px;
            }

            .table.table-users th:nth-child(7),
            .table.table-users td:nth-child(7) {
                width: 140px !important;
                min-width: 140px;
            }

            .table.table-logs th:nth-child(8),
            .table.table-logs td:nth-child(8) {
                width: 72px !important;
                min-width: 72px;
            }
        }

        .table th:not(:first-child):not(:last-child),
        .table td:not(:first-child):not(:last-child) {
            text-align: left;
        }

        /* User Management Table (7 columns) */
        .table.table-users th:nth-child(1),
        .table.table-users td:nth-child(1) {
            width: 80px;
            min-width: 80px;
        }

        .table.table-users th:nth-child(2),
        .table.table-users td:nth-child(2) {
            width: 12%;
            min-width: 100px;
        }

        .table.table-users th:nth-child(3),
        .table.table-users td:nth-child(3) {
            width: 12%;
            min-width: 120px;
        }

        .table.table-users th:nth-child(4),
        .table.table-users td:nth-child(4) {
            width: 8%;
            min-width: 80px;
        }

        .table.table-users th:nth-child(5),
        .table.table-users td:nth-child(5) {
            width: 45%;
            min-width: 380px;
        }

        .table.table-users th:nth-child(6),
        .table.table-users td:nth-child(6) {
            width: 4%;
            min-width: 55px;
        }

        .table.table-users th:nth-child(7),
        .table.table-users td:nth-child(7) {
            width: 140px;
            min-width: 140px;
        }

        /* Audit Logs / Dashboard Tables (8 columns) */
        .table.table-logs th:nth-child(1),
        .table.table-logs td:nth-child(1) {
            width: 72px;
            min-width: 72px;
        }

        .table.table-logs th:nth-child(2),
        .table.table-logs td:nth-child(2) {
            width: 14%;
            min-width: 130px;
        }

        .table.table-logs th:nth-child(3),
        .table.table-logs td:nth-child(3) {
            width: 14%;
            min-width: 120px;
        }

        .table.table-logs th:nth-child(4),
        .table.table-logs td:nth-child(4) {
            width: 12%;
            min-width: 90px;
        }

        .table.table-logs th:nth-child(5),
        .table.table-logs td:nth-child(5) {
            width: 12%;
            min-width: 100px;
        }

        .table.table-logs th:nth-child(6),
        .table.table-logs td:nth-child(6) {
            width: 20%;
            min-width: 180px;
        }

        .table.table-logs th:nth-child(7),
        .table.table-logs td:nth-child(7) {
            width: 14%;
            min-width: 120px;
        }

        .table.table-logs th:nth-child(8),
        .table.table-logs td:nth-child(8) {
            width: 72px;
            min-width: 72px;
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
                padding: 30px 50px 8px 50px;
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
                padding: 25px 40px 6px 40px;
                height: 160px;
            }

            .css-bar-chart__item {
                width: 32px;
            }
        }

        /* ==================== RESPONSIVE FORM PAGES ==================== */
        @media (max-width: 768px) {
            .page-header {
                flex-direction: column;
                align-items: flex-start;
                gap: 4px;
            }
            .page-header .page-title { font-size: 1.1rem; }
            .page-header .page-subtitle { font-size: .78rem; }
            .row.g-3 { --bs-gutter-y: .6rem; }
            .file-upload-area { padding: 16px; }
            .form-section-label { font-size: .85rem; }
            .subsection-body { padding: 12px; }
            .subsection-header { flex-wrap: wrap; gap: 6px; }
            .system-card-body { padding: 14px; }
            .project-tabs { overflow-x: auto; flex-wrap: nowrap; -webkit-overflow-scrolling: touch; }
            .project-tab { padding: 10px 14px; font-size: .8rem; white-space: nowrap; }
            .summary-card { padding: 12px; }
            .summary-card h3 { font-size: 1.5rem; }
        }

        @media (max-width: 575px) {
            .page-header .page-title { font-size: 1rem; }
            .page-header .page-subtitle { font-size: .72rem; display: none; }
            .section-card .section-body,
            .main-section-card > div,
            .subsection-card .subsection-body { padding: 12px; }
            .row.g-3 { --bs-gutter-y: .4rem; }
            .file-upload-area { padding: 12px; }
            .file-upload-area i { font-size: 1.2rem; }
            .file-upload-area p { font-size: .72rem; }
            .form-section-label { font-size: .8rem; padding-bottom: 6px; }
            .system-card-body { padding: 10px; }
            .summary-card { padding: 10px; }
            .summary-card h3 { font-size: 1.25rem; }
            .summary-card p { font-size: .68rem; }
            .category-header { flex-direction: column; align-items: flex-start; gap: 4px; }
            .control-item { flex-wrap: wrap; gap: 6px; }
            .checklist-container { padding: 12px; }
            .checkbox-group { gap: 8px; }
            .project-header { flex-direction: column; align-items: flex-start; gap: 8px; }
            .project-tab { padding: 8px 10px; font-size: .74rem; }
            .system-card-header { flex-direction: column; gap: 6px; }
            .subsection-body { padding: 10px; }
            .main-header { padding: 12px 14px; }
            .main-header .main-title { font-size: 1rem; }
            .section-header { padding: 12px 14px; flex-direction: column; align-items: flex-start; gap: 4px; }
            .section-header .section-title { font-size: .88rem; }
            .page-header { gap: 2px; }
        }
    </style>
    <?= $this->renderSection('styles') ?>
</head>
<body>
<div class="app-layout">
    <?= $this->include('frontend/layout/sidebar/sidebar') ?>
    <div class="sidebar-overlay" id="sidebarOverlay"></div>

    <!-- Custom Alert & Confirm Modals -->
    <div class="custom-modal-overlay" id="customModalOverlay" style="display:none;position:fixed;inset:0;z-index:1050;background:rgba(0,0,0,.45);"></div>
    <div class="custom-modal" id="confirmModal" style="display:none;position:fixed;top:50%;left:50%;transform:translate(-50%,-50%);z-index:1060;background:#fff;border-radius:6px;box-shadow:0 18px 40px rgba(15,23,42,.18);min-width:320px;max-width:400px;overflow:hidden;">
        <div style="background:#536783;color:#fff;padding:12px 14px;font-size:.94rem;font-weight:700;"><i class="fa-solid fa-triangle-exclamation me-2"></i><span id="confirmModalTitle">Confirm</span></div>
        <div style="padding:14px 14px;font-size:.82rem;color:#1f2a3a;"><p class="mb-0" id="confirmMessage">Are you sure?</p></div>
        <div style="padding:8px 12px;border-top:1px solid #e1e6ee;display:flex;justify-content:flex-end;gap:8px;">
            <button type="button" class="btn btn-outline-secondary btn-sm" onclick="closeCustomModals()">Cancel</button>
            <button type="button" class="btn btn-primary btn-sm" id="confirmModalButton">Confirm</button>
        </div>
    </div>
    <div class="custom-modal" id="alertModal" style="display:none;position:fixed;top:50%;left:50%;transform:translate(-50%,-50%);z-index:1060;background:#fff;border-radius:6px;box-shadow:0 18px 40px rgba(15,23,42,.18);min-width:320px;max-width:400px;overflow:hidden;">
        <div style="background:#536783;color:#fff;padding:12px 14px;font-size:.94rem;font-weight:700;" id="alertModalHeader"><span id="alertModalLabel">Notice</span></div>
        <div style="padding:14px 14px;font-size:.82rem;color:#1f2a3a;"><p class="mb-0" id="alertMessage">Message</p></div>
        <div style="padding:8px 12px;border-top:1px solid #e1e6ee;display:flex;justify-content:flex-end;gap:8px;">
            <button type="button" class="btn btn-primary btn-sm" onclick="closeCustomModals()">OK</button>
        </div>
    </div>
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

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
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

        const icon = menuToggle.querySelector('i');
        icon.classList.remove('fa-xmark');
        icon.classList.add('fa-bars');
    }

    if (menuToggle && sidebar && sidebarOverlay) {
        menuToggle.addEventListener('click', toggleSidebar);
        sidebarOverlay.addEventListener('click', closeSidebar);

        const sidebarClose = document.getElementById('sidebarClose');
        if (sidebarClose) {
            sidebarClose.addEventListener('click', closeSidebar);
        }
    }

    const navLinks = document.querySelectorAll('.sidebar-nav .nav-link');
    navLinks.forEach(link => {
        link.addEventListener('click', function() {
            if (window.innerWidth <= 991) {
                closeSidebar();
            }
        });
    });

    window.addEventListener('resize', function() {
        if (window.innerWidth > 991) {
            closeSidebar();
        }
    });

    const activeLinks = document.querySelectorAll('.sidebar-nav .nav-link.active');
    activeLinks.forEach(activeLink => {
        let parentCollapse = activeLink.closest('.collapse');
        while (parentCollapse) {
            parentCollapse.classList.add('show');
            const toggleButton = document.querySelector(`[data-bs-target="#${parentCollapse.id}"]`);
            if (toggleButton) {
                toggleButton.setAttribute('aria-expanded', 'true');
            }
            parentCollapse = parentCollapse.parentElement.closest('.collapse');
        }
    });

    // Logout - use custom modal
    const logoutButton = document.getElementById('logoutButton');
    const logoutForm = document.getElementById('logoutForm');
    if (logoutButton && logoutForm) {
        logoutButton.addEventListener('click', function(e) {
            e.preventDefault();
            showConfirmModal('Are you sure you want to log out?', function() {
                localStorage.clear();
                logoutForm.submit();
            });
        });
    }
});
</script>

<script>
// Custom modal helpers - no Bootstrap Modal dependency
document.addEventListener('DOMContentLoaded', function() {
    document.getElementById('customModalOverlay').addEventListener('click', closeCustomModals);
});

function showCustomModal(id) {
    document.getElementById(id).style.display = 'block';
    document.getElementById('customModalOverlay').style.display = 'block';
    document.body.style.overflow = 'hidden';
}

function closeCustomModals() {
    document.querySelectorAll('.custom-modal').forEach(el => el.style.display = 'none');
    document.getElementById('customModalOverlay').style.display = 'none';
    document.body.style.overflow = '';
}

window.showConfirmModal = function(message, callback) {
    document.getElementById('confirmMessage').textContent = message;
    const confirmBtn = document.getElementById('confirmModalButton');
    confirmBtn._callback = callback;
    confirmBtn.onclick = function() {
        closeCustomModals();
        if (typeof confirmBtn._callback === 'function') {
            const cb = confirmBtn._callback;
            confirmBtn._callback = null;
            cb();
        }
    };
    showCustomModal('confirmModal');
};

window.showAlertModal = function(title, message) {
    document.getElementById('alertModalLabel').textContent = title;
    document.getElementById('alertMessage').textContent = message;
    showCustomModal('alertModal');
};

// Prevent stale form data from BFCache on back/forward navigation
window.addEventListener('pageshow', function(e) {
    if (e.persisted) {
        document.querySelectorAll('#mainForm input, #mainForm textarea, #mainForm select').forEach(function(el) {
            if (el.type !== 'hidden' && el.type !== 'file') {
                el.value = '';
            }
        });
        if (typeof loadSavedData === 'function') {
            loadSavedData();
        }
        if (typeof updateStatusIndicators === 'function') {
            updateStatusIndicators();
        }
    }
});
</script>

<?= $this->renderSection('scripts') ?>

<script>
// Auto-save current section to DB (called by Save Changes button)
window.autoSaveDraft = function() {
    var editId = localStorage.getItem('edit_project_id');
    var csrfToken = document.querySelector('meta[name="csrf-token"]')?.getAttribute('content');
    if (!csrfToken) return;

    var keys = ['network-infrastructure-form','enterprise-architecture-form','ict-human-capital-form','information-systems-form','ict-projects-form','performance-measurement-form'];
    var data = {};
    keys.forEach(function(key) {
        try {
            var saved = localStorage.getItem(key);
            if (saved) data[key] = JSON.parse(saved);
            else data[key] = {};
        } catch(e) {
            data[key] = {};
        }
    });

    var projectTitle = data['ict-projects-form'] && data['ict-projects-form'].internal_project_title;
    if (!projectTitle || !projectTitle.trim()) {
        if (typeof showAlertModal === 'function') {
            showAlertModal('Validation Error', 'Project title is required. Please go to the ICT Projects section and enter a title before saving.');
        }
        return;
    }

    fetch('<?= site_url('employee/save-draft') ?>', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-Requested-With': 'XMLHttpRequest'
        },
        body: JSON.stringify({
            csrf_test_name: csrfToken,
            form_data: data,
            id: editId || null
        })
    })
    .then(function(r) { return r.json(); })
    .then(function(result) {
        if (result.success && result.id && !editId) {
            localStorage.setItem('edit_project_id', result.id);
        }
    })
    .catch(function(err) {
        console.error('Auto-save to DB failed:', err);
    });
};

// File upload helper — uploads file to server, stores path on the input
window.uploadFileInput = function(input) {
    var file = input.files[0];
    if (!file) return;

    var formData = new FormData();
    formData.append('file', file);

    var csrfToken = document.querySelector('meta[name="csrf-token"]')?.getAttribute('content');
    if (csrfToken) formData.append('csrf_test_name', csrfToken);

    var wrapper = input.closest('.upload-wrapper') || input.parentElement;
    var statusEl = wrapper.querySelector('.upload-status');

    if (statusEl) {
        statusEl.textContent = 'Uploading...';
        statusEl.className = 'upload-status text-info';
    }

    fetch('<?= site_url('employee/upload-file') ?>', {
        method: 'POST',
        body: formData,
        headers: { 'X-Requested-With': 'XMLHttpRequest' }
    })
    .then(function(r) { return r.json(); })
    .then(function(result) {
        if (result.success) {
            input.setAttribute('data-uploaded-path', result.path);
            input.setAttribute('data-uploaded-name', result.name);
            if (statusEl) {
                statusEl.textContent = result.name + ' (uploaded)';
                statusEl.className = 'upload-status text-success';
            }
        } else if (statusEl) {
            statusEl.textContent = 'Upload failed';
            statusEl.className = 'upload-status text-danger';
        }
    })
    .catch(function() {
        if (statusEl) {
            statusEl.textContent = 'Upload error';
            statusEl.className = 'upload-status text-danger';
        }
    });
};

// Show a download link for server-uploaded files
window.showServerFileLink = function(input, filePath) {
    if (!input || !filePath) return;
    var existing = input.parentElement.querySelector('.file-preview');
    if (existing) existing.remove();
    var preview = document.createElement('div');
    preview.className = 'file-preview';
    preview.setAttribute('data-file-input', input.name);
    var link = document.createElement('a');
    link.href = '<?= base_url() ?>/' + filePath;
    link.download = filePath.split('/').pop();
    link.textContent = 'Download: ' + (input.getAttribute('data-uploaded-name') || filePath.split('/').pop());
    link.style.display = 'block';
    link.style.padding = '4px 0';
    preview.appendChild(link);
    input.parentElement.appendChild(preview);
};

// Clean up stale edit data when loading a new project page
(function() {
    var path = window.location.pathname;
    if (path.indexOf('/proposed-ict-strategy/') >= 0 && path.indexOf('/edit-ict-project/') < 0) {
        var editId = localStorage.getItem('edit_project_id');
        if (editId) {
            var formKeys = ['network-infrastructure-form','enterprise-architecture-form','ict-human-capital-form','information-systems-form','ict-projects-form','performance-measurement-form'];
            formKeys.forEach(function(k) { localStorage.removeItem(k); });
            var backup = localStorage.getItem('new-project-backup');
            if (backup) {
                try {
                    var parsed = JSON.parse(backup);
                    Object.keys(parsed).forEach(function(k) {
                        if (parsed[k]) localStorage.setItem(k, parsed[k]);
                    });
                } catch(e) {}
                localStorage.removeItem('new-project-backup');
            }
            localStorage.removeItem('edit_project_id');
        }
    }
})();
</script>
</body>
</html>
