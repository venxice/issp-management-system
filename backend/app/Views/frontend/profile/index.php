<?= $this->extend('frontend/layout/app') ?>

<?= $this->section('content') ?>
<?php
$u = $currentUser;
$statusActive = ($u['status'] ?? 'active') === 'active';
$memberSince = ! empty($u['created_at']) ? date('M j, Y', strtotime($u['created_at'])) : '—';
$lastLogin = ! empty($u['last_login_at']) ? date('M j, Y · g:i A', strtotime($u['last_login_at'])) : '—';

$fullName = trim((string) ($u['name'] ?? ''));

$roleIcons = [
    'admin' => 'fa-user-shield',
    'director_general' => 'fa-user-tie',
    'ict_planner' => 'fa-laptop-code',
    'employee' => 'fa-user',
];
$roleIcon = $roleIcons[(string) ($u['role_slug'] ?? 'employee')] ?? 'fa-user';
?>

<style>
.profile-page {
    max-width: 100%;
    margin: 0;
}

.profile-page .panel {
    box-shadow: 0 12px 26px rgba(15, 23, 42, .05);
}

.profile-hero {
    background: linear-gradient(135deg, #4f6584 0%, #344863 100%);
    border: none;
    border-radius: 12px;
    padding: 26px 28px;
    display: flex;
    align-items: center;
    gap: 18px;
    color: #fff;
    box-shadow: 0 14px 30px rgba(52, 72, 99, .22);
}

.profile-avatar {
    width: 62px;
    height: 62px;
    border-radius: 50%;
    background: rgba(255, 255, 255, .16);
    border: 1.5px solid rgba(255, 255, 255, .35);
    display: grid;
    place-items: center;
    font-size: 1.3rem;
    font-weight: 700;
    letter-spacing: .02em;
    flex-shrink: 0;
}

.profile-name {
    font-size: 1.35rem;
    font-weight: 700;
    margin: 0;
    letter-spacing: -.01em;
}

.profile-meta {
    font-size: .8rem;
    color: rgba(255, 255, 255, .82);
    margin: 4px 0 0;
}

.profile-meta i {
    margin-right: 3px;
    font-size: .7rem;
    opacity: .9;
}

.hero-status-badge {
    margin-left: auto;
    display: inline-flex;
    align-items: center;
    gap: 7px;
    padding: 6px 13px;
    border-radius: 999px;
    font-size: .72rem;
    font-weight: 700;
    background: rgba(255, 255, 255, .16);
    border: 1px solid rgba(255, 255, 255, .3);
}

.hero-status-badge .status-dot {
    margin: 0;
}

.account-list {
    display: flex;
    flex-direction: column;
}

.account-item {
    padding: 12px 6px;
    border-radius: 8px;
    transition: background .12s ease;
}

.account-item + .account-item {
    border-top: 1px solid #eef2f6;
}

.account-item:hover {
    background: #f8fafc;
}

.account-text {
    display: flex;
    flex-direction: column;
    gap: 2px;
    min-width: 0;
}

.account-value {
    font-size: .85rem;
    font-weight: 600;
    color: var(--ink);
    word-break: break-word;
}

.account-label {
    font-size: .68rem;
    font-weight: 600;
    color: #8a94a6;
    text-transform: uppercase;
    letter-spacing: .04em;
}

.status-dot {
    width: 8px;
    height: 8px;
    border-radius: 50%;
    display: inline-block;
    margin-right: 7px;
    vertical-align: 1px;
}

.status-dot.active {
    background: #16a34a;
}

.status-dot.inactive {
    background: #f87171;
}

.form-section-title {
    font-size: .72rem;
    font-weight: 700;
    color: var(--brand-dark);
    text-transform: uppercase;
    letter-spacing: .05em;
    margin: 0 0 6px;
}

.btn-account {
    background: var(--brand);
    border: 1px solid var(--brand);
    color: #fff;
    border-radius: 8px;
    padding: .6rem 1.4rem;
    font-size: .8rem;
    font-weight: 600;
    box-shadow: 0 4px 12px rgba(79, 101, 132, .25);
    transition: background-color .15s ease, border-color .15s ease, box-shadow .15s ease;
}

.btn-account:hover,
.btn-account:focus,
.btn-account:active {
    background: var(--brand-dark);
    border-color: var(--brand-dark);
    color: #fff;
    box-shadow: 0 4px 14px rgba(52, 72, 99, .3);
}

.btn-account:disabled {
    background: #9aa9bd;
    border-color: #9aa9bd;
}

.account-note {
    margin-top: 22px;
    padding-top: 16px;
    border-top: 1px solid #eef2f6;
    font-size: .72rem;
    color: var(--muted);
    line-height: 1.5;
}

.pass-input-wrap {
    position: relative;
}

.pass-input-wrap .form-control {
    padding-right: 42px;
}

.pass-toggle {
    position: absolute;
    top: 50%;
    right: 6px;
    transform: translateY(-50%);
    background: none;
    border: none;
    color: #8a94a6;
    font-size: .85rem;
    cursor: pointer;
    padding: 4px 8px;
    border-radius: 6px;
    line-height: 1;
}

.pass-toggle:hover {
    color: var(--brand-dark);
}

.profile-page .row {
    align-items: stretch;
}

.profile-page .row > [class*='col-'] {
    display: flex;
}

.profile-page .row .panel {
    width: 100%;
    height: 100%;
    display: flex;
    flex-direction: column;
}

.profile-page .row .panel .panel-body {
    flex: 1 1 auto;
    display: flex;
    flex-direction: column;
}

.profile-page .row .panel .account-list {
    flex: 1 1 auto;
    justify-content: space-between;
}

.profile-page .account-note {
    margin-top: auto;
}
</style>

<div class="profile-page">
    <section class="profile-hero mb-4">
        <div class="profile-avatar"><i class="fa-solid <?= esc($roleIcon) ?>"></i></div>
        <div class="flex-grow-1">
            <h1 class="profile-name"><?= esc($fullName !== '' ? $fullName : 'My Account') ?></h1>
            <p class="profile-meta">
                <i class="fa-solid fa-user-tag"></i><?= esc($u['role_name'] ?? 'Member') ?>
                <?php if (!empty($u['department_name'])): ?>
                    <span style="opacity:.6;margin:0 6px;">|</span>
                    <i class="fa-solid fa-building"></i><?= esc($u['department_name']) ?>
                <?php endif; ?>
            </p>
        </div>
        <span class="hero-status-badge">
            <span class="status-dot <?= $statusActive ? 'active' : 'inactive' ?>"></span>
            <?= $statusActive ? 'Active' : 'Inactive' ?>
        </span>
    </section>

    <div class="row g-4">
        <div class="col-lg-6">
            <section class="panel">
                <div class="panel-header">
                    <div class="d-flex align-items-center gap-3">
                        <div>
                            <h2 class="panel-title">Account Details</h2>
                            <p class="panel-subtitle">Your account information in the system.</p>
                        </div>
                    </div>
                </div>
                <div class="panel-body" style="padding: 10px 20px;">
                    <div class="account-list">
                        <div class="account-item">
                            <span class="account-text"><span class="account-value"><?= esc($u['name'] ?? '—') ?></span><span class="account-label">Full Name</span></span>
                        </div>
                        <div class="account-item">
                            <span class="account-text"><span class="account-value"><?= esc($u['email'] ?? '—') ?></span><span class="account-label">Email Address</span></span>
                        </div>
                        <div class="account-item">
                            <span class="account-text"><span class="account-value"><?= esc($u['role_name'] ?? '—') ?></span><span class="account-label">Role</span></span>
                        </div>
                        <div class="account-item">
                            <span class="account-text"><span class="account-value"><?= esc($u['department_name'] ?? '—') ?></span><span class="account-label">Division</span></span>
                        </div>
                        <div class="account-item">
                            <span class="account-text"><span class="account-value"><?= esc($u['position_name'] ?? '—') ?></span><span class="account-label">Position</span></span>
                        </div>
                        <div class="account-item">
                            <span class="account-text"><span class="account-value"><span class="status-dot <?= $statusActive ? 'active' : 'inactive' ?>"></span><?= $statusActive ? 'Active' : 'Inactive' ?></span><span class="account-label">Status</span></span>
                        </div>
                        <div class="account-item">
                            <span class="account-text"><span class="account-value"><?= esc($memberSince) ?></span><span class="account-label">Member Since</span></span>
                        </div>
                        <div class="account-item">
                            <span class="account-text"><span class="account-value"><?= esc($lastLogin) ?></span><span class="account-label">Last Login</span></span>
                        </div>
                    </div>
                </div>
            </section>
        </div>

        <div class="col-lg-6">
            <section class="panel">
                <div class="panel-header">
                    <div class="d-flex align-items-center gap-3">
                        <div>
                            <h2 class="panel-title">Change Password</h2>
                            <p class="panel-subtitle">Update the password used to sign in to your account.</p>
                        </div>
                    </div>
                </div>
                <div class="panel-body" style="padding: 20px;">
                    <form action="<?= site_url('profile/update-password') ?>" method="post" id="passwordForm" novalidate>
                        <?= csrf_field() ?>
                        <div class="mb-4">
                            <label class="form-label" for="pass_current_password">Current Password</label>
                            <div class="pass-input-wrap">
                                <input type="password" class="form-control" id="pass_current_password" name="current_password" placeholder="Enter your current password" autocomplete="current-password" required>
                                <button type="button" class="pass-toggle" tabindex="-1" title="Show password" onclick="togglePasswordVisibility(this)"><i class="fa-solid fa-eye"></i></button>
                            </div>
                        </div>
                        <div class="mb-4">
                            <label class="form-label" for="pass_new_password">New Password</label>
                            <div class="pass-input-wrap">
                                <input type="password" class="form-control" id="pass_new_password" name="new_password" placeholder="Enter your new password" autocomplete="new-password" required>
                                <button type="button" class="pass-toggle" tabindex="-1" title="Show password" onclick="togglePasswordVisibility(this)"><i class="fa-solid fa-eye"></i></button>
                            </div>
                            <div class="password-requirements text-muted small mt-2" id="newPassFeedback"></div>
                        </div>
                        <div class="mb-4">
                            <label class="form-label" for="pass_new_password_confirmation">Confirm Password</label>
                            <div class="pass-input-wrap">
                                <input type="password" class="form-control" id="pass_new_password_confirmation" name="new_password_confirmation" placeholder="Re-enter your new password" autocomplete="new-password" required>
                                <button type="button" class="pass-toggle" tabindex="-1" title="Show password" onclick="togglePasswordVisibility(this)"><i class="fa-solid fa-eye"></i></button>
                            </div>
                            <div class="password-match-status small mt-2" id="confirmMsg"></div>
                        </div>
                        <p class="form-section-title mb-3">Password Requirements</p>
                        <p class="account-desc" style="font-size:.76rem;color:#6c757d;line-height:1.6;margin:0 0 20px;">Your password must contain at least 8 characters, and must also include at least one uppercase letter, one lowercase letter, one number, and one special character.</p>
                        <button class="btn btn-account" type="submit" id="passwordSaveBtn">
                            Change Password
                        </button>
                    </form>
                    <p class="account-note">Passwords are stored hashed. All password changes are recorded in the audit log.</p>
                </div>
            </section>
        </div>
    </div>
</div>
<?= $this->endSection() ?>

<?= $this->section('scripts') ?>
<script>
function togglePasswordVisibility(btn) {
    var input = btn.parentElement.querySelector('input');
    var icon = btn.querySelector('i');
    if (!input) return;
    if (input.type === 'password') {
        input.type = 'text';
        if (icon) {
            icon.classList.remove('fa-eye');
            icon.classList.add('fa-eye-slash');
        }
        btn.setAttribute('title', 'Hide password');
    } else {
        input.type = 'password';
        if (icon) {
            icon.classList.remove('fa-eye-slash');
            icon.classList.add('fa-eye');
        }
        btn.setAttribute('title', 'Show password');
    }
}

function getMissingRequirements(value) {
    var missing = [];
    if (value.length < 8) missing.push('8+ characters');
    if (!/[A-Z]/.test(value)) missing.push('uppercase letter');
    if (!/[a-z]/.test(value)) missing.push('lowercase letter');
    if (!/[0-9]/.test(value)) missing.push('number');
    if (!/[!@#$%^&*(),.?":{}|<>]/.test(value)) missing.push('special character');
    return missing;
}

function updatePasswordFeedback() {
    var nw = document.getElementById('pass_new_password');
    var cf = document.getElementById('pass_new_password_confirmation');
    if (!nw) return;

    var fb = document.getElementById('newPassFeedback');
    if (fb) {
        var missing = getMissingRequirements(nw.value);
        if (nw.value.length > 0) {
            if (missing.length > 0) {
                fb.textContent = 'Missing: ' + missing.join(', ');
                fb.style.color = '';
            } else {
                fb.textContent = '\u2713 All requirements met';
                fb.style.color = '#198754';
            }
        } else {
            fb.textContent = '';
        }
    }

    var msg = document.getElementById('confirmMsg');
    if (msg) {
        if (cf.value.length > 0) {
            if (nw.value === cf.value) {
                msg.textContent = '\u2713 Passwords match';
                msg.style.color = '#198754';
            } else {
                msg.textContent = '\u2717 Passwords do not match';
                msg.style.color = '#dc3545';
            }
        } else {
            msg.textContent = '';
        }
    }
}

document.addEventListener('DOMContentLoaded', function() {
    var nw = document.getElementById('pass_new_password');
    var cf = document.getElementById('pass_new_password_confirmation');
    if (nw) {
        nw.addEventListener('input', updatePasswordFeedback);
        cf.addEventListener('input', updatePasswordFeedback);
    }

    var passwordForm = document.getElementById('passwordForm');
    if (passwordForm) {
        passwordForm.addEventListener('submit', function(e) {
            e.preventDefault();
            var cur = document.getElementById('pass_current_password');
            var nw = document.getElementById('pass_new_password');
            var cf = document.getElementById('pass_new_password_confirmation');
            var valid = true;

            function setError(field, msg) {
                field.setCustomValidity(msg);
                field.reportValidity();
                if (valid) field.focus();
                valid = false;
            }

            if (!cur.value) { setError(cur, 'Current password is required'); return; }
            cur.setCustomValidity('');

            if (!nw.value) { setError(nw, 'New password is required'); return; }
            nw.setCustomValidity('');

            if (getMissingRequirements(nw.value).length) {
                setError(nw, 'New password does not meet all requirements.');
                return;
            }

            if (!cf.value) { setError(cf, 'Please confirm your new password'); return; }
            cf.setCustomValidity('');
            if (nw.value !== cf.value) { setError(cf, 'Passwords do not match'); return; }

            var btn = document.getElementById('passwordSaveBtn');
            btn.disabled = true;
            btn.innerHTML = 'Updating...';
            passwordForm.submit();
        });
    }
});
</script>
<?= $this->endSection() ?>
