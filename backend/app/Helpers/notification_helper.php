<?php

use CodeIgniter\I18n\Time;

if (!function_exists('sendSubmissionNotification')) {
    function sendSubmissionNotification(array $project, array $employee, array $ictPlanners): void
    {
        helper('text');

        $email = \Config\Services::email();
        $baseUrl = rtrim(config('App')->baseURL, '/');
        $appName = config('Email')->fromName ?: 'ISSP Management System';
        $currentYear = date('Y');

        $employeeEmail = $employee['email'] ?? '';
        $employeeLink = $baseUrl . '/employee/submitted-ict-projects?email=' . urlencode($employeeEmail);

        $title = $project['title'] ?? 'ISSP Submission';
        $employeeName = $employee['name'] ?? $employee['email'] ?? 'An employee';
        $employeeDept = $employee['department_name'] ?? '';
        $employeePosition = $employee['position_name'] ?? '';
        $employeeInfo = trim(implode(', ', array_filter([$employeePosition, $employeeDept])));
        $submittedAt = Time::now()->format('F j, Y \a\t g:i A');
        $refNumber = 'ISSP-' . strtoupper(substr(md5($project['id'] . $submittedAt), 0, 8));
        $fromEmail = config('Email')->fromEmail;
        $fromName = config('Email')->fromName;

        $plannerSubject = "New ISSP Submission: {$title}";

        $plannerPlainTmpl = "A new ICT project has been submitted for your review.\n\n"
            . "Reference No.: {$refNumber}\n"
            . "Project Title: {$title}\n"
            . "Submitted by: {$employeeName}" . ($employeeInfo ? " ({$employeeInfo})" : '') . "\n"
            . "Date Submitted: {$submittedAt}\n\n"
            . "Review the project here: %%PROJECT_LINK%%\n"
            . "View all submissions: %%CONSOLIDATION_LINK%%\n\n"
            . "{$appName}\n{$baseUrl}";

        $plannerHtmlTmpl = <<<HTML
<!DOCTYPE html>
<html lang="en">
<head><meta charset="UTF-8"><meta name="viewport" content="width=device-width,initial-scale=1.0"></head>
<body style="margin:0;padding:0;background-color:#f4f4f4;font-family:'Segoe UI',Arial,Helvetica,sans-serif;">
<table role="presentation" cellpadding="0" cellspacing="0" style="width:100%;background-color:#f4f4f4;">
<tr><td style="padding:30px 16px;">
<table role="presentation" cellpadding="0" cellspacing="0" style="max-width:600px;margin:0 auto;">

<!-- Header -->
<tr><td style="background:#2d2d2d;padding:28px 32px;border-radius:10px 10px 0 0;text-align:center;">
<h1 style="color:#ffffff;margin:0;font-size:22px;font-weight:700;letter-spacing:0.5px;">ISSP Management System</h1>
<p style="color:#bbbbbb;margin:4px 0 0;font-size:13px;">Submission Notification</p>
</td></tr>

<!-- Body -->
<tr><td style="background:#ffffff;padding:32px;border-left:1px solid #dbdbdb;border-right:1px solid #dbdbdb;">
<p style="margin:0 0 20px;font-size:15px;color:#333;">Dear ICT Planner,</p>
<p style="margin:0 0 20px;font-size:15px;color:#444;line-height:1.6;">
A new ICT project has been submitted for your review. Please find the details below.
</p>

<!-- Info Table -->
<table cellpadding="0" cellspacing="0" style="width:100%;border-collapse:collapse;margin:0 0 24px;font-size:14px;border:1px solid #dbdbdb;border-radius:6px;overflow:hidden;">
<tr><td style="background:#f6f6f6;padding:10px 16px;font-weight:600;color:#2d2d2d;width:140px;border-bottom:1px solid #dbdbdb;">Reference No.</td><td style="padding:10px 16px;border-bottom:1px solid #dbdbdb;color:#333;font-family:monospace;">{$refNumber}</td></tr>
<tr><td style="background:#f6f6f6;padding:10px 16px;font-weight:600;color:#2d2d2d;border-bottom:1px solid #dbdbdb;">Project Title</td><td style="padding:10px 16px;border-bottom:1px solid #dbdbdb;color:#333;font-weight:600;">{$title}</td></tr>
<tr><td style="background:#f6f6f6;padding:10px 16px;font-weight:600;color:#2d2d2d;border-bottom:1px solid #dbdbdb;">Submitted by</td><td style="padding:10px 16px;border-bottom:1px solid #dbdbdb;color:#333;">{$employeeName}</td></tr>
<tr><td style="background:#f6f6f6;padding:10px 16px;font-weight:600;color:#2d2d2d;border-bottom:1px solid #dbdbdb;">Department</td><td style="padding:10px 16px;border-bottom:1px solid #dbdbdb;color:#333;">{$employeeDept}</td></tr>
<tr><td style="background:#f6f6f6;padding:10px 16px;font-weight:600;color:#2d2d2d;border-bottom:1px solid #dbdbdb;">Position</td><td style="padding:10px 16px;border-bottom:1px solid #dbdbdb;color:#333;">{$employeePosition}</td></tr>
<tr><td style="background:#f6f6f6;padding:10px 16px;font-weight:600;color:#2d2d2d;">Date Submitted</td><td style="padding:10px 16px;color:#333;">{$submittedAt}</td></tr>
</table>

<!-- CTA -->
<table role="presentation" cellpadding="0" cellspacing="0" style="width:100%;">
<tr><td style="text-align:center;padding:0 0 8px;">
<a href="%%PROJECT_LINK%%" style="display:inline-block;padding:13px 36px;background:#2d2d2d;color:#ffffff;text-decoration:none;border-radius:6px;font-size:15px;font-weight:600;letter-spacing:0.3px;">Review Project</a>
</td></tr>
<tr><td style="text-align:center;padding:0;">
<p style="margin:0;font-size:13px;color:#999;">
or <a href="%%CONSOLIDATION_LINK%%" style="color:#666;text-decoration:underline;">view in Consolidation page</a>
</p>
</td></tr>
</table>
</td></tr>

<!-- Footer -->
<tr><td style="background:#f6f6f6;padding:20px 32px;border:1px solid #dbdbdb;border-top:none;border-radius:0 0 10px 10px;text-align:center;">
<p style="margin:0 0 6px;font-size:12px;color:#999;">This is an automated notification from the ISSP Management System. Please do not reply directly to this email.</p>
<p style="margin:0;font-size:12px;color:#aaa;">&copy; {$currentYear} {$appName}. All rights reserved.</p>
</td></tr>

</table>
</td></tr>
</table>
</body>
</html>
HTML;

        $employeeSubject = "ISSP Submission Confirmed: {$title}";

        $employeePlain = "Hi {$employeeName},\n\n"
            . "Your ICT project has been submitted successfully.\n\n"
            . "Reference No.: {$refNumber}\n"
            . "Project Title: {$title}\n"
            . "Date Submitted: {$submittedAt}\n"
            . "Status: Pending Review\n\n"
            . "The ICT Planner will review your submission. You will be notified of any updates.\n\n"
            . "View your submissions: {$employeeLink}\n\n"
            . "{$appName}\n{$baseUrl}";

        $employeeHtml = <<<HTML
<!DOCTYPE html>
<html lang="en">
<head><meta charset="UTF-8"><meta name="viewport" content="width=device-width,initial-scale=1.0"></head>
<body style="margin:0;padding:0;background-color:#f4f4f4;font-family:'Segoe UI',Arial,Helvetica,sans-serif;">
<table role="presentation" cellpadding="0" cellspacing="0" style="width:100%;background-color:#f4f4f4;">
<tr><td style="padding:30px 16px;">
<table role="presentation" cellpadding="0" cellspacing="0" style="max-width:600px;margin:0 auto;">

<!-- Header -->
<tr><td style="background:#2d2d2d;padding:28px 32px;border-radius:10px 10px 0 0;text-align:center;">
<h1 style="color:#ffffff;margin:0;font-size:22px;font-weight:700;letter-spacing:0.5px;">ISSP Management System</h1>
<p style="color:#bbbbbb;margin:4px 0 0;font-size:13px;">Submission Confirmation</p>
</td></tr>

<!-- Body -->
<tr><td style="background:#ffffff;padding:32px;border-left:1px solid #dbdbdb;border-right:1px solid #dbdbdb;">
<p style="margin:0 0 20px;font-size:15px;color:#333;">Hi {$employeeName},</p>
<p style="margin:0 0 20px;font-size:15px;color:#444;line-height:1.6;">
Your ICT project has been submitted successfully and is now pending review by the ICT Planner.
</p>

<!-- Info Table -->
<table cellpadding="0" cellspacing="0" style="width:100%;border-collapse:collapse;margin:0 0 24px;font-size:14px;border:1px solid #dbdbdb;border-radius:6px;overflow:hidden;">
<tr><td style="background:#f6f6f6;padding:10px 16px;font-weight:600;color:#2d2d2d;width:140px;border-bottom:1px solid #dbdbdb;">Reference No.</td><td style="padding:10px 16px;border-bottom:1px solid #dbdbdb;color:#333;font-family:monospace;">{$refNumber}</td></tr>
<tr><td style="background:#f6f6f6;padding:10px 16px;font-weight:600;color:#2d2d2d;border-bottom:1px solid #dbdbdb;">Project Title</td><td style="padding:10px 16px;border-bottom:1px solid #dbdbdb;color:#333;font-weight:600;">{$title}</td></tr>
<tr><td style="background:#f6f6f6;padding:10px 16px;font-weight:600;color:#2d2d2d;border-bottom:1px solid #dbdbdb;">Submitted by</td><td style="padding:10px 16px;border-bottom:1px solid #dbdbdb;color:#333;">{$employeeName}</td></tr>
<tr><td style="background:#f6f6f6;padding:10px 16px;font-weight:600;color:#2d2d2d;border-bottom:1px solid #dbdbdb;">Status</td><td style="padding:10px 16px;border-bottom:1px solid #dbdbdb;"><span style="display:inline-block;padding:2px 12px;background:#e8e8e8;color:#555;border-radius:12px;font-size:12px;font-weight:600;">Pending Review</span></td></tr>
<tr><td style="background:#f6f6f6;padding:10px 16px;font-weight:600;color:#2d2d2d;">Date Submitted</td><td style="padding:10px 16px;color:#333;">{$submittedAt}</td></tr>
</table>

<!-- CTA -->
<table role="presentation" cellpadding="0" cellspacing="0" style="width:100%;">
<tr><td style="text-align:center;padding:0;">
<a href="{$employeeLink}" style="display:inline-block;padding:13px 36px;background:#2d2d2d;color:#ffffff;text-decoration:none;border-radius:6px;font-size:15px;font-weight:600;letter-spacing:0.3px;">View My Submissions</a>
</td></tr>
</table>
</td></tr>

<!-- Footer -->
<tr><td style="background:#f6f6f6;padding:20px 32px;border:1px solid #dbdbdb;border-top:none;border-radius:0 0 10px 10px;text-align:center;">
<p style="margin:0 0 6px;font-size:12px;color:#999;">This is an automated notification from the ISSP Management System. Please do not reply directly to this email.</p>
<p style="margin:0;font-size:12px;color:#aaa;">&copy; {$currentYear} {$appName}. All rights reserved.</p>
</td></tr>

</table>
</td></tr>
</table>
</body>
</html>
HTML;

        try {
            foreach ($ictPlanners as $planner) {
                $plannerEmail = $planner['email'] ?? '';
                $plannerProjectLink = $baseUrl . '/ict-planner/view-full/' . $project['id'] . '?email=' . urlencode($plannerEmail);
                $plannerConsolidationLink = $baseUrl . '/ict-planner/consolidation?email=' . urlencode($plannerEmail);

                $plannerHtmlLocal = str_replace(
                    ['%%PROJECT_LINK%%', '%%CONSOLIDATION_LINK%%'],
                    [$plannerProjectLink, $plannerConsolidationLink],
                    $plannerHtmlTmpl
                );

                $plannerPlainLocal = str_replace(
                    ['%%PROJECT_LINK%%', '%%CONSOLIDATION_LINK%%'],
                    [$plannerProjectLink, $plannerConsolidationLink],
                    $plannerPlainTmpl
                );

                $email->clear();
                $email->setFrom($fromEmail, $fromName);
                $email->setTo($plannerEmail);
                $email->setReplyTo($fromEmail, $fromName);
                $email->setSubject($plannerSubject);
                $email->setMessage($plannerHtmlLocal);
                $email->setAltMessage($plannerPlainLocal);
                $email->setMailType('html');
                $email->setHeader('X-Auto-Response-Suppress', 'OOF, AutoReply');
                $email->setHeader('X-Mailer', 'ISSP Management System');
                $email->setHeader('X-Priority', '3');
                $email->send();
            }
        } catch (\Exception $e) {
            log_message('error', 'Failed to send planner notification: ' . $e->getMessage());
        }

        try {
            $email->clear();
            $email->setFrom($fromEmail, $fromName);
            $email->setTo($employee['email']);
            $email->setReplyTo($fromEmail, $fromName);
            $email->setSubject($employeeSubject);
            $email->setMessage($employeeHtml);
            $email->setAltMessage($employeePlain);
            $email->setMailType('html');
            $email->setHeader('X-Auto-Response-Suppress', 'OOF, AutoReply');
            $email->setHeader('X-Mailer', 'ISSP Management System');
            $email->setHeader('X-Priority', '3');
            $email->send();
        } catch (\Exception $e) {
            log_message('error', 'Failed to send employee notification: ' . $e->getMessage());
        }
    }
}

if (!function_exists('sendEndorsementNotification')) {
    function sendEndorsementNotification(array $project, array $ictPlanner, array $directorGeneral): void
    {
        helper('text');

        $email = \Config\Services::email();
        $baseUrl = rtrim(config('App')->baseURL, '/');
        $appName = config('Email')->fromName ?: 'ISSP Management System';
        $currentYear = date('Y');
        $fromEmail = config('Email')->fromEmail;
        $fromName = config('Email')->fromName;

        $title = $project['title'] ?? 'ISSP Submission';
        $dgEmail = $directorGeneral['email'] ?? '';
        $dgLink = $baseUrl . '/director-general/dashboard?email=' . urlencode($dgEmail);
        $submittedAt = date('F j, Y \a\t g:i A');
        $refNumber = 'ISSP-' . strtoupper(substr(md5($project['id'] . $submittedAt), 0, 8));
        $plannerName = $ictPlanner['name'] ?? 'ICT Planner';

        $subject = "Project Endorsed for Approval: {$title}";

        $htmlBody = <<<HTML
<!DOCTYPE html>
<html lang="en">
<head><meta charset="UTF-8"><meta name="viewport" content="width=device-width,initial-scale=1.0"></head>
<body style="margin:0;padding:0;background-color:#f4f4f4;font-family:'Segoe UI',Arial,Helvetica,sans-serif;">
<table role="presentation" cellpadding="0" cellspacing="0" style="width:100%;background-color:#f4f4f4;">
<tr><td style="padding:30px 16px;">
<table role="presentation" cellpadding="0" cellspacing="0" style="max-width:600px;margin:0 auto;">

<!-- Header -->
<tr><td style="background:#2d2d2d;padding:28px 32px;border-radius:10px 10px 0 0;text-align:center;">
<h1 style="color:#ffffff;margin:0;font-size:22px;font-weight:700;letter-spacing:0.5px;">ISSP Management System</h1>
<p style="color:#bbbbbb;margin:4px 0 0;font-size:13px;">Endorsement Notification</p>
</td></tr>

<!-- Body -->
<tr><td style="background:#ffffff;padding:32px;border-left:1px solid #dbdbdb;border-right:1px solid #dbdbdb;">
<p style="margin:0 0 20px;font-size:15px;color:#333;">Dear Director General,</p>
<p style="margin:0 0 20px;font-size:15px;color:#444;line-height:1.6;">
A project has been endorsed by <strong>{$plannerName}</strong> and is now awaiting your approval. Please find the details below.
</p>

<!-- Info Table -->
<table cellpadding="0" cellspacing="0" style="width:100%;border-collapse:collapse;margin:0 0 24px;font-size:14px;border:1px solid #dbdbdb;border-radius:6px;overflow:hidden;">
<tr><td style="background:#f6f6f6;padding:10px 16px;font-weight:600;color:#2d2d2d;width:140px;border-bottom:1px solid #dbdbdb;">Reference No.</td><td style="padding:10px 16px;border-bottom:1px solid #dbdbdb;color:#333;font-family:monospace;">{$refNumber}</td></tr>
<tr><td style="background:#f6f6f6;padding:10px 16px;font-weight:600;color:#2d2d2d;border-bottom:1px solid #dbdbdb;">Project Title</td><td style="padding:10px 16px;border-bottom:1px solid #dbdbdb;color:#333;font-weight:600;">{$title}</td></tr>
<tr><td style="background:#f6f6f6;padding:10px 16px;font-weight:600;color:#2d2d2d;border-bottom:1px solid #dbdbdb;">Endorsed by</td><td style="padding:10px 16px;border-bottom:1px solid #dbdbdb;color:#333;">{$plannerName}</td></tr>
<tr><td style="background:#f6f6f6;padding:10px 16px;font-weight:600;color:#2d2d2d;">Date Endorsed</td><td style="padding:10px 16px;color:#333;">{$submittedAt}</td></tr>
</table>

<!-- CTA -->
<table role="presentation" cellpadding="0" cellspacing="0" style="width:100%;">
<tr><td style="text-align:center;padding:0 0 8px;">
<a href="{$dgLink}" style="display:inline-block;padding:13px 36px;background:#2d2d2d;color:#ffffff;text-decoration:none;border-radius:6px;font-size:15px;font-weight:600;letter-spacing:0.3px;">Review Project</a>
</td></tr>
</table>
</td></tr>

<!-- Footer -->
<tr><td style="background:#f6f6f6;padding:20px 32px;border:1px solid #dbdbdb;border-top:none;border-radius:0 0 10px 10px;text-align:center;">
<p style="margin:0 0 6px;font-size:12px;color:#999;">This is an automated notification from the ISSP Management System. Please do not reply directly to this email.</p>
<p style="margin:0;font-size:12px;color:#aaa;">&copy; {$currentYear} {$appName}. All rights reserved.</p>
</td></tr>

</table>
</td></tr>
</table>
</body>
</html>
HTML;

        $plainBody = "Dear Director General,\n\n"
            . "A project has been endorsed by {$plannerName} and is now awaiting your approval.\n\n"
            . "Reference No.: {$refNumber}\n"
            . "Project Title: {$title}\n"
            . "Endorsed by: {$plannerName}\n"
            . "Date Endorsed: {$submittedAt}\n\n"
            . "Review the project here: {$dgLink}\n\n"
            . "{$appName}\n{$baseUrl}";

        try {
            $email->clear();
            $email->setFrom($fromEmail, $fromName);
            $email->setTo($dgEmail);
            $email->setReplyTo($fromEmail, $fromName);
            $email->setSubject($subject);
            $email->setMessage($htmlBody);
            $email->setAltMessage($plainBody);
            $email->setMailType('html');
            $email->setHeader('X-Auto-Response-Suppress', 'OOF, AutoReply');
            $email->setHeader('X-Mailer', 'ISSP Management System');
            $email->setHeader('X-Priority', '3');
            $email->send();
        } catch (\Exception $e) {
            log_message('error', 'Failed to send endorsement notification to DG: ' . $e->getMessage());
        }
    }
}

if (!function_exists('sendEndorsementToEmployeeNotification')) {
    function sendEndorsementToEmployeeNotification(array $project, array $ictPlanner, array $employee): void
    {
        helper('text');

        $email = \Config\Services::email();
        $baseUrl = rtrim(config('App')->baseURL, '/');
        $appName = config('Email')->fromName ?: 'ISSP Management System';
        $currentYear = date('Y');
        $fromEmail = config('Email')->fromEmail;
        $fromName = config('Email')->fromName;

        $title = $project['title'] ?? 'ISSP Submission';
        $submittedAt = date('F j, Y \a\t g:i A');
        $refNumber = 'ISSP-' . strtoupper(substr(md5($project['id'] . $submittedAt), 0, 8));
        $plannerName = $ictPlanner['name'] ?? 'ICT Planner';
        $employeeEmail = $employee['email'] ?? '';
        $employeeLink = $baseUrl . '/employee/submitted-ict-projects?email=' . urlencode($employeeEmail);

        $subject = "Project Endorsed to Director General: {$title}";

        $htmlBody = <<<HTML
<!DOCTYPE html>
<html lang="en">
<head><meta charset="UTF-8"><meta name="viewport" content="width=device-width,initial-scale=1.0"></head>
<body style="margin:0;padding:0;background-color:#f4f4f4;font-family:'Segoe UI',Arial,Helvetica,sans-serif;">
<table role="presentation" cellpadding="0" cellspacing="0" style="width:100%;background-color:#f4f4f4;">
<tr><td style="padding:30px 16px;">
<table role="presentation" cellpadding="0" cellspacing="0" style="max-width:600px;margin:0 auto;">

<!-- Header -->
<tr><td style="background:#2d2d2d;padding:28px 32px;border-radius:10px 10px 0 0;text-align:center;">
<h1 style="color:#ffffff;margin:0;font-size:22px;font-weight:700;letter-spacing:0.5px;">ISSP Management System</h1>
<p style="color:#bbbbbb;margin:4px 0 0;font-size:13px;">Endorsement Notification</p>
</td></tr>

<!-- Body -->
<tr><td style="background:#ffffff;padding:32px;border-left:1px solid #dbdbdb;border-right:1px solid #dbdbdb;">
<p style="margin:0 0 20px;font-size:15px;color:#333;">Dear {$employee['name']},</p>
<p style="margin:0 0 20px;font-size:15px;color:#444;line-height:1.6;">
Your project has been endorsed by <strong>{$plannerName}</strong> and is now pending review by the Director General.
</p>

<!-- Info Table -->
<table cellpadding="0" cellspacing="0" style="width:100%;border-collapse:collapse;margin:0 0 24px;font-size:14px;border:1px solid #dbdbdb;border-radius:6px;overflow:hidden;">
<tr><td style="background:#f6f6f6;padding:10px 16px;font-weight:600;color:#2d2d2d;width:140px;border-bottom:1px solid #dbdbdb;">Reference No.</td><td style="padding:10px 16px;border-bottom:1px solid #dbdbdb;color:#333;font-family:monospace;">{$refNumber}</td></tr>
<tr><td style="background:#f6f6f6;padding:10px 16px;font-weight:600;color:#2d2d2d;border-bottom:1px solid #dbdbdb;">Project Title</td><td style="padding:10px 16px;border-bottom:1px solid #dbdbdb;color:#333;font-weight:600;">{$title}</td></tr>
<tr><td style="background:#f6f6f6;padding:10px 16px;font-weight:600;color:#2d2d2d;border-bottom:1px solid #dbdbdb;">Endorsed by</td><td style="padding:10px 16px;border-bottom:1px solid #dbdbdb;color:#333;">{$plannerName}</td></tr>
<tr><td style="background:#f6f6f6;padding:10px 16px;font-weight:600;color:#2d2d2d;">Date Endorsed</td><td style="padding:10px 16px;color:#333;">{$submittedAt}</td></tr>
</table>

<!-- CTA -->
<table role="presentation" cellpadding="0" cellspacing="0" style="width:100%;">
<tr><td style="text-align:center;padding:0;">
<a href="{$employeeLink}" style="display:inline-block;padding:13px 36px;background:#2d2d2d;color:#ffffff;text-decoration:none;border-radius:6px;font-size:15px;font-weight:600;letter-spacing:0.3px;">View My Submissions</a>
</td></tr>
</table>
</td></tr>

<!-- Footer -->
<tr><td style="background:#f6f6f6;padding:20px 32px;border:1px solid #dbdbdb;border-top:none;border-radius:0 0 10px 10px;text-align:center;">
<p style="margin:0 0 6px;font-size:12px;color:#999;">This is an automated notification from the ISSP Management System. Please do not reply directly to this email.</p>
<p style="margin:0;font-size:12px;color:#aaa;">&copy; {$currentYear} {$appName}. All rights reserved.</p>
</td></tr>

</table>
</td></tr>
</table>
</body>
</html>
HTML;

        $plainBody = "Dear {$employee['name']},\n\n"
            . "Your project has been endorsed by {$plannerName} and is now pending review by the Director General.\n\n"
            . "Reference No.: {$refNumber}\n"
            . "Project Title: {$title}\n"
            . "Endorsed by: {$plannerName}\n"
            . "Date Endorsed: {$submittedAt}\n\n"
            . "View your submissions: {$employeeLink}\n\n"
            . "{$appName}\n{$baseUrl}";

        try {
            $email->clear();
            $email->setFrom($fromEmail, $fromName);
            $email->setTo($employeeEmail);
            $email->setReplyTo($fromEmail, $fromName);
            $email->setSubject($subject);
            $email->setMessage($htmlBody);
            $email->setAltMessage($plainBody);
            $email->setMailType('html');
            $email->setHeader('X-Auto-Response-Suppress', 'OOF, AutoReply');
            $email->setHeader('X-Mailer', 'ISSP Management System');
            $email->setHeader('X-Priority', '3');
            $email->send();
        } catch (\Exception $e) {
            log_message('error', 'Failed to send endorsement notification to employee: ' . $e->getMessage());
        }
    }
}

if (!function_exists('sendDGDecisionNotification')) {
    function sendDGDecisionNotification(array $project, string $action, ?string $remarks = null): void
    {
        helper('text');

        $email = \Config\Services::email();
        $baseUrl = rtrim(config('App')->baseURL, '/');
        $appName = config('Email')->fromName ?: 'ISSP Management System';
        $currentYear = date('Y');
        $fromEmail = config('Email')->fromEmail;
        $fromName = config('Email')->fromName;

        $title = $project['title'] ?? 'ISSP Submission';

        $userModel = new \App\Models\UserModel();
        $employee = $userModel->findWithRole((int) $project['created_by']);
        if ($employee === null || empty($employee['email'])) {
            log_message('error', 'Cannot send DG decision email: employee not found for project #' . $project['id']);
            return;
        }

        $employeeEmail = $employee['email'];
        $employeeLink = $baseUrl . '/employee/submitted-ict-projects?email=' . urlencode($employeeEmail);
        $submittedAt = date('F j, Y \a\t g:i A');
        $refNumber = 'ISSP-' . strtoupper(substr(md5($project['id'] . $submittedAt), 0, 8));

        $actionLabel = ucfirst($action);
        $subject = "Project {$actionLabel}: {$title}";

        $remarksHtml = '';
        $remarksPlain = '';
        if (!empty($remarks)) {
            $escapedRemarks = htmlspecialchars($remarks, ENT_QUOTES, 'UTF-8');
            $remarksHtml = <<<HTML
<tr><td style="background:#f6f6f6;padding:10px 16px;font-weight:600;color:#2d2d2d;border-bottom:1px solid #dbdbdb;">Remarks</td>
<td style="padding:10px 16px;border-bottom:1px solid #dbdbdb;color:#333;">{$escapedRemarks}</td></tr>
HTML;
            $remarksPlain = "\nRemarks: {$remarks}";
        }

        $htmlBody = <<<HTML
<!DOCTYPE html>
<html lang="en">
<head><meta charset="UTF-8"><meta name="viewport" content="width=device-width,initial-scale=1.0"></head>
<body style="margin:0;padding:0;background-color:#f4f4f4;font-family:'Segoe UI',Arial,Helvetica,sans-serif;">
<table role="presentation" cellpadding="0" cellspacing="0" style="width:100%;background-color:#f4f4f4;">
<tr><td style="padding:30px 16px;">
<table role="presentation" cellpadding="0" cellspacing="0" style="max-width:600px;margin:0 auto;">

<!-- Header -->
<tr><td style="background:#2d2d2d;padding:28px 32px;border-radius:10px 10px 0 0;text-align:center;">
<h1 style="color:#ffffff;margin:0;font-size:22px;font-weight:700;letter-spacing:0.5px;">ISSP Management System</h1>
<p style="color:#bbbbbb;margin:4px 0 0;font-size:13px;">Project {$actionLabel}</p>
</td></tr>

<!-- Body -->
<tr><td style="background:#ffffff;padding:32px;border-left:1px solid #dbdbdb;border-right:1px solid #dbdbdb;">
<p style="margin:0 0 20px;font-size:15px;color:#333;">Dear {$employee['name']},</p>
<p style="margin:0 0 20px;font-size:15px;color:#444;line-height:1.6;">
Your project has been <strong>{$actionLabel}</strong> by the Director General.
</p>

<!-- Info Table -->
<table cellpadding="0" cellspacing="0" style="width:100%;border-collapse:collapse;margin:0 0 24px;font-size:14px;border:1px solid #dbdbdb;border-radius:6px;overflow:hidden;">
<tr><td style="background:#f6f6f6;padding:10px 16px;font-weight:600;color:#2d2d2d;width:140px;border-bottom:1px solid #dbdbdb;">Reference No.</td><td style="padding:10px 16px;border-bottom:1px solid #dbdbdb;color:#333;font-family:monospace;">{$refNumber}</td></tr>
<tr><td style="background:#f6f6f6;padding:10px 16px;font-weight:600;color:#2d2d2d;border-bottom:1px solid #dbdbdb;">Project Title</td><td style="padding:10px 16px;border-bottom:1px solid #dbdbdb;color:#333;font-weight:600;">{$title}</td></tr>
<tr><td style="background:#f6f6f6;padding:10px 16px;font-weight:600;color:#2d2d2d;border-bottom:1px solid #dbdbdb;">Status</td><td style="padding:10px 16px;border-bottom:1px solid #dbdbdb;color:#333;">{$actionLabel}</td></tr>
{$remarksHtml}
<tr><td style="background:#f6f6f6;padding:10px 16px;font-weight:600;color:#2d2d2d;">Date Updated</td><td style="padding:10px 16px;color:#333;">{$submittedAt}</td></tr>
</table>

<!-- CTA -->
<table role="presentation" cellpadding="0" cellspacing="0" style="width:100%;">
<tr><td style="text-align:center;padding:0;">
<a href="{$employeeLink}" style="display:inline-block;padding:13px 36px;background:#2d2d2d;color:#ffffff;text-decoration:none;border-radius:6px;font-size:15px;font-weight:600;letter-spacing:0.3px;">View My Submissions</a>
</td></tr>
</table>
</td></tr>

<!-- Footer -->
<tr><td style="background:#f6f6f6;padding:20px 32px;border:1px solid #dbdbdb;border-top:none;border-radius:0 0 10px 10px;text-align:center;">
<p style="margin:0 0 6px;font-size:12px;color:#999;">This is an automated notification from the ISSP Management System. Please do not reply directly to this email.</p>
<p style="margin:0;font-size:12px;color:#aaa;">&copy; {$currentYear} {$appName}. All rights reserved.</p>
</td></tr>

</table>
</td></tr>
</table>
</body>
</html>
HTML;

        $plainBody = "Dear {$employee['name']},\n\n"
            . "Your project has been {$actionLabel} by the Director General.\n\n"
            . "Reference No.: {$refNumber}\n"
            . "Project Title: {$title}\n"
            . "Status: {$actionLabel}{$remarksPlain}\n"
            . "Date Updated: {$submittedAt}\n\n"
            . "View your submissions: {$employeeLink}\n\n"
            . "{$appName}\n{$baseUrl}";

        try {
            $email->clear();
            $email->setFrom($fromEmail, $fromName);
            $email->setTo($employeeEmail);
            $email->setReplyTo($fromEmail, $fromName);
            $email->setSubject($subject);
            $email->setMessage($htmlBody);
            $email->setAltMessage($plainBody);
            $email->setMailType('html');
            $email->setHeader('X-Auto-Response-Suppress', 'OOF, AutoReply');
            $email->setHeader('X-Mailer', 'ISSP Management System');
            $email->setHeader('X-Priority', '3');
            $email->send();
        } catch (\Exception $e) {
            log_message('error', 'Failed to send ' . $action . ' notification to employee: ' . $e->getMessage());
        }
    }
}
