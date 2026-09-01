<?php

if (!function_exists('run_with_retry')) {
    /**
     * Runs a callable while suppressing transient PHP notices/warnings (e.g. flaky
     * bind-mount reads that surface as errno=35 EAGAIN) that CodeIgniter would
     * otherwise convert into fatal exceptions. Retries on genuine thrown errors.
     *
     * @param callable $fn
     * @param int      $attempts
     * @param int      $delayMs
     * @return mixed
     */
    function run_with_retry(callable $fn, int $attempts = 3, int $delayMs = 400): mixed
    {
        $lastError = null;

        for ($attempt = 1; $attempt <= $attempts; $attempt++) {
            $previousReporting = error_reporting(E_ALL & ~E_NOTICE & ~E_WARNING & ~E_DEPRECATED & ~E_STRICT);

            try {
                return $fn();
            } catch (\Throwable $e) {
                $lastError = $e;
                if ($attempt < $attempts) {
                    usleep($delayMs * 1000 * $attempt);
                }
            } finally {
                error_reporting($previousReporting);
            }
        }

        throw $lastError;
    }
}
