<?php

namespace App\Controllers;

use App\Models\AuditLogModel;
use App\Models\UserModel;
use Config\Services;
use Throwable;

class AuthController extends BaseController
{
    public function loginForm()
    {

        if (session()->get('is_logged_in')) {
            $intended = session()->get('intended_url');
            if ($intended) {
                session()->remove('intended_url');
                return redirect()->to($intended);
            }
            return redirect()->to(site_url($this->dashboardPathForRole((string) session()->get('role_slug'))));
        }

        $intended = $this->request->getGet('redirect') ?: session()->get('intended_url');
        if ($intended) {
            session()->set('intended_url', $intended);
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
            return redirect()->back()->withInput()->with('error', 'Invalid email or password');
        }

        $this->startUserSession($user, 'password');

        $intended = $this->request->getPost('redirect') ?: session()->get('intended_url');
        if ($intended) {
            session()->remove('intended_url');
            return redirect()->to($intended);
        }

        return redirect()->to(site_url($this->dashboardPathForRole((string) ($user['role_slug'] ?? 'employee'))));
    }


    public function logout()
    {
        if (session()->get('is_logged_in')) {
            $this->writeLog((int) session()->get('user_id'), 'logout', 'User signed out.');
        }

        session()->destroy();

        if (isset($_COOKIE)) {
            foreach ($_COOKIE as $key => $value) {
                if (strpos($key, 'ci_session') !== false) {
                    setcookie($key, '', time() - 3600, '/');
                }
            }
        }

        $response = redirect()->to(site_url('login'))->with('success', 'Successfully signed out');
        $response->setHeader('Cache-Control', 'no-store, no-cache, must-revalidate, max-age=0');
        $response->setHeader('Cache-Control', 'post-check=0, pre-check=0', false);
        $response->setHeader('Pragma', 'no-cache');
        $response->setHeader('Expires', 'Sat, 26 Jul 1997 05:00:00 GMT');

        return $response;
    }

    public function googleRedirect()
    {

 //dd(
        //env('SSO_GOOGLE_CLIENT_ID'),
        //env('SSO_GOOGLE_CLIENT_SECRET')
    //);

        if (! $this->googleSsoConfigured()) {
            return redirect()->to(site_url('login'))->with('error', 'Google SSO is not configured yet');
        }

        $state = bin2hex(random_bytes(32));
        session()->set('google_oauth_state', $state);

        $redirect = $this->request->getGet('redirect');
        if ($redirect) {
            session()->set('intended_url', $redirect);
        }

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
            return redirect()->to(site_url('login'))->with('error', 'Google sign-in was cancelled');
        }

        $state = (string) $this->request->getGet('state');
        $expectedState = (string) session()->get('google_oauth_state');
        session()->remove('google_oauth_state');

        if ($state === '' || $expectedState === '' || ! hash_equals($expectedState, $state)) {
            return redirect()->to(site_url('login'))->with('error', 'Google sign-in session expired');
        }

        $code = (string) $this->request->getGet('code');

        if ($code === '') {
            return redirect()->to(site_url('login'))->with('error', 'Google authorization failed');
        }

        try {
            $profile = $this->fetchGoogleProfile($code);
        } catch (Throwable $exception) {
            log_message('error', 'Google SSO failed: {message}', ['message' => $exception->getMessage()]);

            return redirect()->to(site_url('login'))->with('error', 'Google sign-in failed');
        }

        if (! $this->googleProfileAllowed($profile)) {
            return redirect()->to(site_url('login'))->with('error', 'Your Google account is not allowed');
        }

        $user = $this->findGoogleUser($profile);

        if ($user === null) {
            return redirect()->to(site_url('login'))->with('error', 'No account found for this Google email');
        }

        if ($user['status'] !== 'active') {
            return redirect()->to(site_url('login'))->with('error', 'Your account is inactive');
        }

        if (! $this->googleEmailVerified($profile)) {
            return redirect()->to(site_url('login'))->with('error', 'Google email is not verified');
        }

        if (! $this->googleRoleAllowed((string) ($user['role_slug'] ?? ''))) {
            return redirect()->to(site_url('login'))->with('error', 'Your role is not allowed for Google sign-in');
        }

        $this->startUserSession($user, 'google');

        $intended = session()->get('intended_url');
        if ($intended) {
            session()->remove('intended_url');
            return redirect()->to($intended);
        }

        return redirect()->to(site_url($this->dashboardPathForRole((string) ($user['role_slug'] ?? 'employee'))));
    }

private function googleSsoConfigured(): bool
{
    return env('SSO_GOOGLE_CLIENT_ID')
        && env('SSO_GOOGLE_CLIENT_SECRET');
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

    private function googleEmailVerified(array $profile): bool
    {
        return filter_var($profile['email_verified'] ?? false, FILTER_VALIDATE_BOOL);
    }

  private function findGoogleUser(array $profile): ?array
{
    $userModel = new UserModel();

    $email = strtolower(trim((string) $profile['email']));

    $user = $userModel->findByEmailWithRole($email);

    return $user;
}

    private function googleRoleAllowed(string $roleSlug): bool
    {
        $allowedRoles = $this->googleAllowedRoles();

        if ($allowedRoles === []) {
            return true;
        }

        return in_array($roleSlug, $allowedRoles, true);
    }

    private function googleAllowedRoles(): array
    {
        $configured = strtolower((string) env('SSO_GOOGLE_ALLOWED_ROLES'));

        if ($configured === '') {
            return ['admin', 'director_general', 'ict_planner', 'employee'];
        }

        $roles = array_filter(array_map(
            static fn (string $role): string => trim($role),
            preg_split('/\s*,\s*/', $configured) ?: []
        ));

        return array_values(array_unique($roles));
    }

    private function startUserSession(array $user, string $provider): void
    {
        session()->regenerate(true);
        session()->set([
            'is_logged_in'  => true,
            'user_id'       => (int) $user['id'],
            'name' => trim(
    ($user['first_name'] ?? '') .
    (!empty($user['middle_initial']) ? ' ' . $user['middle_initial'] . '.' : '') .
    ' ' .
    ($user['last_name'] ?? '')
),
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

    private function writeLog(?int $userId, string $action, string $description, array $extra = []): void
    {
        $request = \Config\Services::request();
        $insert = array_merge([
            'user_id'     => $userId,
            'action'      => $action,
            'description' => $description,
            'created_at'  => date('Y-m-d H:i:s'),
            'page_url'    => (string) $request->getURI(),
            'user_agent'  => (string) $request->getUserAgent(),
            'ip_address'  => (string) $request->getIPAddress(),
        ], $extra);

        (new \App\Models\AuditLogModel())->insert($insert);
    }

    private function dashboardPathForRole(string $roleSlug): string
    {
        return match ($roleSlug) {
            'admin' => 'admin/dashboard',
            'director_general' => 'director-general/dashboard',
            'ict_planner' => 'ict-planner/dashboard',
            'employee' => 'employee/dashboard',
            default => 'employee/dashboard',
        };
    }
}
