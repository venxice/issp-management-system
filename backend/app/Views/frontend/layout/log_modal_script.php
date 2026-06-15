<?php
$modalId = $modalId ?? 'viewLogModal';
$prefix = $prefix ?? 'log';
?>
<script>
document.addEventListener('DOMContentLoaded', () => {
    const modal = document.getElementById(<?= json_encode($modalId, JSON_UNESCAPED_SLASHES) ?>);

    if (! modal) {
        return;
    }

    const setText = (id, value) => {
        const element = document.getElementById(id);
        if (element) {
            element.textContent = value;
        }
    };

    modal.addEventListener('show.bs.modal', (event) => {
        const trigger = event.relatedTarget;
        if (! trigger) {
            return;
        }

        const log = JSON.parse(trigger.getAttribute('data-log'));
        const base = <?= json_encode($prefix, JSON_UNESCAPED_SLASHES) ?>;

        setText(`${base}-id`, log.id || '-');
        setText(`${base}-user`, log.user_name || 'System');
        setText(`${base}-email`, log.user_email || '-');
        setText(`${base}-email-field`, log.user_email || '-');
        setText(`${base}-contact`, log.contact_number || '-');
        setText(`${base}-role`, log.role_name || 'Unknown');
        setText(`${base}-position`, log.position || '-');
        setText(`${base}-division`, log.department_name || '-');
        setText(`${base}-time`, log.created_at || '-');
        setText(`${base}-action`, log.action || '-');
        setText(`${base}-description`, log.description || '-');
        setText(`${base}-ip`, log.ip_address || '-');
        setText(`${base}-page-url`, log.page_url || '-');
        setText(`${base}-user-agent`, log.user_agent || '-');
        setText(`${base}-new-data`, log.new_data || '-');
    });
});
</script>
