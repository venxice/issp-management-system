<?php

namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;

class AuthFilter implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        if (! session()->get('is_logged_in')) {
            session()->set('intended_url', (string) $request->getUri());
            return redirect()->to(site_url('login'))->with('error', 'Please sign in to continue.');
        }

        // If the URL has ?email= param, validate it matches the logged-in user
        $email = $request->getGet('email');
        if ($email && strtolower($email) !== strtolower((string) session()->get('email'))) {
            $message = 'This link was sent to ' . $email . '. Please sign in with that account to continue.';
            session()->remove(['is_logged_in', 'user_id', 'name', 'email', 'role_id', 'role_name', 'role_slug', 'department_id', 'department', 'login_provider', 'login_at']);
            return redirect()->to(site_url('login?redirect=' . urlencode((string) $request->getUri())))->with('error', $message);
        }

        return null;
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        $response->setHeader('Cache-Control', 'no-store, no-cache, must-revalidate, max-age=0');
        $response->setHeader('Cache-Control', 'post-check=0, pre-check=0', false);
        $response->setHeader('Pragma', 'no-cache');
        $response->setHeader('Expires', 'Sat, 26 Jul 1997 05:00:00 GMT');

        return $response;
    }
}
