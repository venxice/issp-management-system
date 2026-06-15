<?php

namespace App\Controllers;

use App\Models\AuditLogModel;
use App\Models\RoleModel;
use App\Models\UserModel;
use Config\Services;
use Throwable;

class AuthController extends BaseController
{
    public function loginForm()
    {
        if (session()->get('is_logged_in')) {
            return redirect()->to(site_url($this->dashboardPathForRole((string) session()->get('role_slug'))));
        }

        return view('frontend/auth/login', [
            'title' => 'Login',
            'googleEnabled' => $this->googleSsoConfigured(),
        ]);
    }

    public function login()
    {
        $rules = [
            'email'    => 'required|valid_email',
            'password' => 'required',
        ];

        if (! $this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $user = (new UserModel())->findByEmailWithRole($this->request->getPost('email'));

        if (
            $user === null
            || $user['status'] !== 'active'
            || empty($user['password'])
            || ! password_verify((string) $this->request->getPost('password'), $user['password'])
        ) {
            return redirect()->back()->withInput()->with('error', 'Invalid email or password.');
        }

        $this->startUserSession($user, 'password');

        return redirect()->to(site_url($this->dashboardPathForRole((string) ($user['role_slug'] ?? 'employee'))));
    }

    public function logout()
    {
        if (session()->get('is_logged_in')) {
            $this->writeLog((int) session()->get('user_id'), 'logout', 'User signed out.');
        }

        session()->destroy();

        return redirect()->to(site_url('login'))->with('success', 'You have been signed out.');
    }

    public function googleRedirect()
    {
        if (! $this->googleSsoConfigured()) {
            return redirect()->to(site_url('login'))->with('error', 'Google SSO is not configured yet.');
        }

        $state = bin2hex(random_bytes(32));
        session()->set('google_oauth_state', $state);

        $query = http_build_query([
            'client_id'     => env('SSO_GOOGLE_CLIENT_ID'),
            'redirect_uri'  => $this->googleRedirectUri(),
            'response_type' => 'code',
            'scope'         => 'openid email profile',
            'state'         => $state,
            'prompt'        => 'select_account',
        ]);

        return redirect()->to('https://accounts.google.com/o/oauth2/v2/auth?' . $query);
    }

    public function googleCallback()
    {
        if ($this->request->getGet('error')) {
            return redirect()->to(site_url('login'))->with('error', 'Google sign-in was cancelled.');
        }

        $state = (string) $this->request->getGet('state');
        $expectedState = (string) session()->get('google_oauth_state');
        session()->remove('google_oauth_state');

        if ($state === '' || $expectedState === '' || ! hash_equals($expectedState, $state)) {
            return redirect()->to(site_url('login'))->with('error', 'The Google sign-in session expired. Please try again.');
        }

        $code = (string) $this->request->getGet('code');

        if ($code === '') {
            return redirect()->to(site_url('login'))->with('error', 'Google did not return an authorization code.');
        }

        try {
            $profile = $this->fetchGoogleProfile($code);
        } catch (Throwable $exception) {
            log_message('error', 'Google SSO failed: {message}', ['message' => $exception->getMessage()]);

            return redirect()->to(site_url('login'))->with('error', 'Google sign-in failed. Please try again.');
        }

        if (! $this->googleProfileAllowed($profile)) {
            return redirect()->to(site_url('login'))->with('error', 'This Google account is not allowed to sign in.');
        }

        $user = $this->findOrCreateGoogleUser($profile);

        if ($user === null || $user['status'] !== 'active') {
            return redirect()->to(site_url('login'))->with('error', 'Your account is inactive. Please contact the administrator.');
        }

        $this->startUserSession($user, 'google');

        return redirect()->to(site_url($this->dashboardPathForRole((string) ($user['role_slug'] ?? 'employee'))))->with('success', 'Signed in with Google.');
    }

    private function googleSsoConfigured(): bool
    {
        return (bool) env('SSO_GOOGLE_CLIENT_ID') && (bool) env('SSO_GOOGLE_CLIENT_SECRET');
    }

    private function googleRedirectUri(): string
    {
        return env('SSO_GOOGLE_REDIRECT_URI') ?: site_url('auth/google/callback');
    }

    private function fetchGoogleProfile(string $code): array
    {
        $http = Services::curlrequest([
            'timeout' => 15,
        ]);

        $tokenResponse = $http->post('https://oauth2.googleapis.com/token', [
            'form_params' => [
                'client_id'     => env('SSO_GOOGLE_CLIENT_ID'),
                'client_secret' => env('SSO_GOOGLE_CLIENT_SECRET'),
                'code'          => $code,
                'grant_type'    => 'authorization_code',
                'redirect_uri'  => $this->googleRedirectUri(),
            ],
        ]);

        $token = json_decode($tokenResponse->getBody(), true);

        if (! is_array($token) || empty($token['access_token'])) {
            throw new \RuntimeException('Google token response did not include an access token.');
        }

        $profileResponse = $http->get('https://openidconnect.googleapis.com/v1/userinfo', [
            'headers' => [
                'Authorization' => 'Bearer ' . $token['access_token'],
            ],
        ]);

        $profile = json_decode($profileResponse->getBody(), true);

        if (! is_array($profile) || empty($profile['email'])) {
            throw new \RuntimeException('Google profile response did not include an email address.');
        }

        return $profile;
    }

    private function googleProfileAllowed(array $profile): bool
    {
        $allowedDomain = strtolower((string) env('SSO_GOOGLE_HOSTED_DOMAIN'));

        if ($allowedDomain === '') {
            return true;
        }

        $email = strtolower((string) $profile['email']);
        $emailDomain = substr(strrchr($email, '@') ?: '', 1);
        $profileDomain = strtolower((string) ($profile['hd'] ?? $emailDomain));

        return $profileDomain === $allowedDomain;
    }

    private function findOrCreateGoogleUser(array $profile): ?array
    {
        $userModel = new UserModel();
        $email = strtolower(trim((string) $profile['email']));
        $user = $userModel->findByEmailWithRole($email);
        $now = date('Y-m-d H:i:s');

        $payload = [
            'name'           => $profile['name'] ?? $email,
            'email'          => $email,
            'sso_provider'   => 'google',
            'sso_subject'    => $profile['sub'] ?? null,
            'email_verified' => ! empty($profile['email_verified']) ? 1 : 0,
            'last_login_at'  => $now,
        ];
        $payload += $this->nameColumns($payload['name']);

        if ($user === null) {
            $role = (new RoleModel())->where('slug', 'employee')->first();

            if ($role === null) {
                return null;
            }

            $payload['role_id'] = $role['id'];
            $payload['status'] = 'active';
            $userModel->insert($payload);

            return $userModel->findByEmailWithRole($email);
        }

        $userModel->update($user['id'], $payload);

        return $userModel->findByEmailWithRole($email);
    }

    private function startUserSession(array $user, string $provider): void
    {
        session()->regenerate(true);
        session()->set([
            'is_logged_in'  => true,
            'user_id'       => (int) $user['id'],
            'name'          => $user['name'],
            'email'         => $user['email'],
            'role_id'       => (int) $user['role_id'],
            'role_name'     => $user['role_name'] ?? 'User',
            'role_slug'     => $user['role_slug'] ?? 'employee',
            'department_id' => $user['department_id'] ?? null,
            'department'    => $user['department_name'] ?? null,
            'login_provider'=> $provider,
            'login_at'      => date('Y-m-d H:i:s'),
        ]);

        (new UserModel())->update($user['id'], [
            'last_login_at' => date('Y-m-d H:i:s'),
        ]);

        $this->writeLog((int) $user['id'], 'login', 'User signed in using ' . $provider . '.');
    }

    private function writeLog(?int $userId, string $action, string $description): void
    {
        (new AuditLogModel())->insert([
            'user_id'     => $userId,
            'action'      => $action,
            'description' => $description,
            'created_at'  => date('Y-m-d H:i:s'),
        ]);
    }

    private function nameColumns(string $name): array
    {
        $parts = preg_split('/\s+/', trim($name)) ?: [];

        if (count($parts) <= 1) {
            return [
                'first_name'     => $name,
                'last_name'      => 'User',
                'middle_initial' => null,
            ];
        }

        $lastName = array_pop($parts);

        return [
            'first_name'     => implode(' ', $parts),
            'last_name'      => $lastName,
            'middle_initial' => null,
        ];
    }

    private function dashboardPathForRole(string $roleSlug): string
    {
        return match ($roleSlug) {
            'admin' => 'admin/dashboard',
            'director_general' => 'director-general/dashboard',
            'ict_planner' => 'ict-planner/dashboard',
            'employee' => 'employee/dashboard',
            default => 'dashboard',
        };
    }
}
