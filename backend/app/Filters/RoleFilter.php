<?php

namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;

class RoleFilter implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        if (! session()->get('is_logged_in')) {
            return redirect()->to(site_url('login'))->with('error', 'Please sign in to continue.');
        }

        if ($arguments === null || $arguments === []) {
            return null;
        }

        if (! in_array(session()->get('role_slug'), $arguments, true)) {
            return redirect()->to(site_url('dashboard'))->with('error', 'Your account does not have permission to open that page.');
        }

        return null;
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        return null;
    }
}
