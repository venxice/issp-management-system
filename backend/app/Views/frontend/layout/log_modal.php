<?php
$modalId = $modalId ?? 'viewLogModal';
$prefix = $prefix ?? 'log';
?>

<style>
.log-modal .modal-content {
    border-radius: 14px;
    overflow: hidden;
    border: 1px solid #e9ecef;
}

.log-modal .modal-header {
    background: #536783;
    border-bottom: none;
    padding: 16px 20px;
    display: flex;
    align-items: center;
    justify-content: space-between;
}

.log-modal .modal-title {
    font-size: 1.1rem;
    font-weight: 700;
    color: #fff;
    margin: 0;
}

.log-modal .btn-close {
    filter: invert(1);
    opacity: 1;
}

.log-modal .modal-body {
    padding: 22px;
}

.log-modal .user-header {
    margin-bottom: 18px;
    padding-bottom: 14px;
    border-bottom: 1px solid #f1f3f5;
}

.log-modal .user-name {
    font-weight: 700;
    font-size: 1.25rem;
    color: #212529;
}

.log-modal .user-meta {
    font-size: .9rem;
    color: #6c757d;
    margin-top: 3px;
}

.log-modal .detail-grid {
    display: grid;
    grid-template-columns: 170px 1fr;
    gap: 12px 18px;
    margin-top: 16px;
}

.log-modal .key {
    font-size: .8rem;
    color: #6c757d;
    font-weight: 600;
}

.log-modal .val {
    font-size: .9rem;
    color: #212529;
    word-break: break-word;
}

.log-modal .section-title {
    font-size: .75rem;
    font-weight: 700;
    color: #6c757d;
    margin-top: 18px;
    margin-bottom: 8px;
    letter-spacing: .6px;
    text-transform: uppercase;
}

.log-modal .soft-box {
    background: #f8f9fa;
    border: 1px solid #e9ecef;
    border-radius: 8px;
    padding: 12px;
}

.log-modal .mono {
    font-family: ui-monospace, SFMono-Regular, Menlo, Monaco, Consolas, "Liberation Mono", monospace;
    font-size: .82rem;
}
</style>

<div class="modal fade log-modal" id="<?= esc($modalId) ?>" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title">User Activity Log</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <div class="modal-body">

                <div class="user-header">
                    <div class="user-name" id="<?= esc($prefix) ?>-user">-</div>
                    <div class="user-meta" id="<?= esc($prefix) ?>-email">-</div>
                </div>

                <div class="detail-grid">
                    <div class="key">ID</div><div class="val" id="<?= esc($prefix) ?>-id">-</div>
                    <div class="key">Email</div><div class="val" id="<?= esc($prefix) ?>-email-field">-</div>
                    <div class="key">Role</div><div class="val" id="<?= esc($prefix) ?>-role">-</div>
                    <div class="key">Position</div><div class="val" id="<?= esc($prefix) ?>-position">-</div>
                    <div class="key">Division</div><div class="val" id="<?= esc($prefix) ?>-division">-</div>
                    <div class="key">Action</div><div class="val" id="<?= esc($prefix) ?>-action">-</div>
                    <div class="key">Date/Time</div><div class="val" id="<?= esc($prefix) ?>-time">-</div>
                    <div class="key">IP Address</div><div class="val mono" id="<?= esc($prefix) ?>-ip">-</div>
                </div>

                <div class="section-title">Description</div>
                <div class="soft-box" id="<?= esc($prefix) ?>-description">-</div>

                <div class="section-title">Page URL</div>
                <div class="soft-box mono" id="<?= esc($prefix) ?>-page-url">-</div>

                <div class="section-title">User Agent</div>
                <div class="soft-box mono" id="<?= esc($prefix) ?>-user-agent">-</div>

                <div class="section-title">New Data</div>
                <div class="soft-box mono" id="<?= esc($prefix) ?>-new-data">-</div>

            </div>

         </div>
     </div>
 </div>