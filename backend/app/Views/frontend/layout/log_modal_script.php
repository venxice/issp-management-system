<?php
$modalId = $modalId ?? 'viewLogModal';
$prefix = $prefix ?? 'log';
?>

<script>
document.addEventListener('DOMContentLoaded', () => {
    const modal = document.getElementById(<?= json_encode($modalId) ?>);
    if (!modal) return;

    const prefix = <?= json_encode($prefix) ?>;

    const setText = (id, value) => {
        const el = document.getElementById(id);
        if (el) el.textContent = value ?? '-';
    };

    modal.addEventListener('show.bs.modal', (event) => {
        const trigger = event.relatedTarget;
        if (!trigger) return;

        let log = {};
        try {
            log = JSON.parse(trigger.getAttribute('data-log') || '{}');
        } catch (e) {
            console.error('Invalid log JSON');
            return;
        }

        setText(`${prefix}-id`, log.id);
        setText(`${prefix}-user`, log.user_name || 'System');
        setText(`${prefix}-email`, log.user_email);
        setText(`${prefix}-email-field`, log.user_email);
        setText(`${prefix}-contact`, log.contact_number);
        setText(`${prefix}-role`, log.role_name);
        setText(`${prefix}-position`, log.position);
        setText(`${prefix}-division`, log.department_name);
        setText(`${prefix}-time`, log.created_at);
        setText(`${prefix}-action`, log.action);
        setText(`${prefix}-description`, log.description);
        setText(`${prefix}-ip`, log.ip_address);
        setText(`${prefix}-page-url`, log.page_url);
        setText(`${prefix}-user-agent`, log.user_agent);
        setText(`${prefix}-new-data`, log.new_data);
    });
});

</script>
