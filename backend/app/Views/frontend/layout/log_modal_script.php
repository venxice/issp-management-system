<?php
$modalId = $modalId ?? 'viewLogModal';
$prefix = $prefix ?? 'log';
?>

<script>
document.addEventListener('DOMContentLoaded', () => {
    const modalEl = document.getElementById('<?= esc($modalId ?? 'viewLogModal') ?>');
    const prefix = '<?= esc($prefix ?? 'log') ?>';

    const toText = (v) => (v === undefined || v === null || String(v).trim() === '') ? '-' : String(v);
    const prettyData = (v) => {
        if (!v) return '-';
        try { const parsed = typeof v === 'string' ? JSON.parse(v) : v; return JSON.stringify(parsed, null, 2); } catch(e) { return String(v); }
    };

    if (! modalEl) return;

    modalEl.addEventListener('show.bs.modal', async (event) => {
        const trigger = event.relatedTarget;
        if (! trigger) return;
        const payloadJson = trigger.getAttribute('data-log') || '{}';
        let payload = {};
        try { payload = JSON.parse(payloadJson); } catch (e) { payload = {}; }

        if (! payload.new_data || payload.new_data === '-' || payload.new_data === null || payload.new_data === '') {
            const id = payload.id || (trigger.getAttribute('data-id') || '');
            if (id) {
                try {
                    const resp = await fetch(`<?= site_url('admin/audit-logs/json') ?>/${encodeURIComponent(id)}`);
                    if (resp.ok) {
                        const json = await resp.json();
                        payload = Object.assign({}, payload, json);
                    }
                } catch (e) {
                }
            }
        }

        let newDataValue = payload.new_data || payload.metadata || payload.description || '-';
        if (typeof newDataValue === 'string' && newDataValue.trim() === '-') {
            newDataValue = '-';
        }

        const set = (key, val) => {
            const el = document.getElementById(prefix + '-' + key);
            if (! el) return;
            el.textContent = toText(val);
        };

        set('user', payload.user_name || payload.user || '-');
        set('email', payload.user_email || payload.email || '-');
        set('id', payload.id || '-');
        set('email-field', payload.user_email || payload.email || '-');
        set('role', payload.role_name || payload.role || '-');
        set('position', payload.position || '-');
        set('division', payload.department_name || payload.division || '-');
        set('action', payload.action || '-');
        set('time', payload.created_at || payload.createdAt || '-');
        set('ip', payload.ip_address || payload.ip || '-');
        set('description', payload.description || '-');
        set('page-url', payload.page_url || payload.pageUrl || '-');
        set('user-agent', payload.user_agent || payload.userAgent || '-');

        const newDataEl = document.getElementById(prefix + '-new-data');
        if (newDataEl) {
            newDataEl.textContent = prettyData(newDataValue);
        }
    });
});
</script>
