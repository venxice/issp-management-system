<?php
$modalId = $modalId ?? 'viewUserModal';
$prefix = $prefix ?? 'view-user';
$showEdit = $showEdit ?? false;
?>

<style>
.user-detail-modal .modal-content { border-radius: 14px; overflow: hidden; border: 1px solid #e9ecef; }
.user-detail-modal .modal-header { background: #536783; border-bottom: none; padding: 16px 20px; display: flex; align-items: center; justify-content: space-between; }
.user-detail-modal .modal-title { font-size: 1.1rem; font-weight: 700; color: #fff; margin: 0; }
.user-detail-modal .btn-close { filter: invert(1); opacity: 1; }
.user-detail-modal .modal-body { padding: 22px; }
.user-detail-modal .user-header { margin-bottom: 18px; padding-bottom: 14px; border-bottom: 1px solid #f1f3f5; }
.user-detail-modal .user-name { font-weight: 700; font-size: 1.25rem; color: #212529; }
.user-detail-modal .user-meta { font-size: .9rem; color: #6c757d; margin-top: 3px; }
.user-detail-modal .detail-grid { display: grid; grid-template-columns: 170px 1fr; gap: 12px 18px; margin-top: 16px; }
.user-detail-modal .key { font-size: .8rem; color: #6c757d; font-weight: 600; }
.user-detail-modal .val { font-size: .9rem; color: #212529; word-break: break-word; }
</style>

<div class="modal fade user-detail-modal" id="<?= esc($modalId) ?>" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title">User Details</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <div class="modal-body">
                <div class="user-header">
                    <div>
                        <div class="d-flex align-items-center gap-2">
                            <div class="user-name" id="<?= esc($prefix) ?>-user">-</div>
                            <button type="button" class="btn btn-sm btn-outline-primary p-1" id="<?= esc($prefix) ?>-edit-header" aria-label="Edit user">
                                <i class="fa-solid fa-pen-to-square"></i>
                            </button>
                        </div>
                        <div class="user-meta mt-1" id="<?= esc($prefix) ?>-email">-</div>
                    </div>
                </div>

                <div class="detail-grid">
                    <div class="key">ID</div><div class="val" id="<?= esc($prefix) ?>-id">-</div>
                    <div class="key">Email</div><div class="val" id="<?= esc($prefix) ?>-email-field">-</div>
                    <div class="key">Role</div><div class="val" id="<?= esc($prefix) ?>-role">-</div>
                    <div class="key">Position</div><div class="val" id="<?= esc($prefix) ?>-position">-</div>
                    <div class="key">Division</div><div class="val" id="<?= esc($prefix) ?>-division">-</div>
                    <div class="key">Status</div><div class="val" id="<?= esc($prefix) ?>-status">-</div>
                    <div class="key">Created</div><div class="val" id="<?= esc($prefix) ?>-created">-</div>
                    <div class="key">Updated</div><div class="val" id="<?= esc($prefix) ?>-updated">-</div>

            </div>

</div>
</div>
            

            <?php if ($showEdit): ?>
            <div class="modal-footer justify-content-between">
                <button class="btn btn-primary" type="button" id="<?= esc($prefix) ?>-edit"><i class="fa-solid fa-pen-to-square me-2"></i> Edit User</button>
            </div>
            <?php endif; ?>

        </div>
    </div>
</div>