<?php
$modalId = $modalId ?? 'viewLogModal';
$prefix = $prefix ?? 'log';
?>
<div class="modal fade" id="<?= esc($modalId) ?>" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <div>
                    <h5 class="modal-title">User Activity</h5>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="d-flex align-items-center gap-3 mb-3">
                    <div class="brand-mark flex-shrink-0" style="width: 42px; height: 42px; background: #e9eef5; color: #526784;">
                        <i class="fa-solid fa-user"></i>
                    </div>
                    <div>
                        <div class="fw-semibold" id="<?= esc($prefix) ?>-user">-</div>
                        <div class="activity-meta" id="<?= esc($prefix) ?>-email">-</div>
                    </div>
                </div>
                <div class="detail-list">
                    <div class="key">ID</div><div class="val" id="<?= esc($prefix) ?>-id">-</div>
                    <div class="key">Email Address</div><div class="val" id="<?= esc($prefix) ?>-email-field">-</div>
                    <div class="key">Contact Number</div><div class="val" id="<?= esc($prefix) ?>-contact">-</div>
                    <div class="key">Date / Time</div><div class="val" id="<?= esc($prefix) ?>-time">-</div>
                    <div class="key">Role</div><div class="val" id="<?= esc($prefix) ?>-role">-</div>
                    <div class="key">Position</div><div class="val" id="<?= esc($prefix) ?>-position">-</div>
                    <div class="key">Division</div><div class="val" id="<?= esc($prefix) ?>-division">-</div>
                    <div class="key">Activity</div><div class="val" id="<?= esc($prefix) ?>-action">-</div>
                    <div class="key">IP Address</div><div class="val" id="<?= esc($prefix) ?>-ip">-</div>
                </div>

                <div class="mt-3">
                    <div class="small text-muted-strong mb-1">Description</div>
                    <div class="small" id="<?= esc($prefix) ?>-description">-</div>
                </div>
                <div class="mt-3">
                    <div class="small text-muted-strong mb-1">Page URL</div>
                    <div class="small" id="<?= esc($prefix) ?>-page-url">-</div>
                </div>
                <div class="mt-3">
                    <div class="small text-muted-strong mb-1">User Agent</div>
                    <div class="small" id="<?= esc($prefix) ?>-user-agent">-</div>
                </div>
                <div class="mt-3">
                    <div class="small text-muted-strong mb-1">New Data</div>
                    <div class="small" id="<?= esc($prefix) ?>-new-data">-</div>
                </div>
            </div>
            <div class="modal-footer modal-footer-dark">
                <button type="button" class="btn btn-primary w-100" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
