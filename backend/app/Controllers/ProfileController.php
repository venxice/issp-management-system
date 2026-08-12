<?php

namespace App\Controllers;

use App\Models\AuditLogModel;
use App\Models\UserModel;

class ProfileController extends BaseController
{
    public function index()
    {
        $userId = (int) session()->get('user_id');
        $user = (new UserModel())->findWithRole($userId);

        if ($user === null) {
            return redirect()->to(site_url('logout'))->with('error', 'Account not found. Please sign in again.');
        }

        return view('frontend/profile/index', [
            'title' => 'My Account',
            'active' => 'profile',
            'currentUser' => $user,
        ]);
    }

    public function updatePassword()
    {
        $userId = (int) session()->get('user_id');
        $userModel = new UserModel();
        $user = $userModel->find($userId);

        if ($user === null) {
            return redirect()->to(site_url('logout'))->with('error', 'Account not found. Please sign in again.');
        }

        $rules = [
            'current_password' => 'required',
            'new_password' => 'required|min_length[8]',
            'new_password_confirmation' => 'required|matches[new_password]',
        ];

        if (! $this->validate($rules)) {
            return redirect()->back()->with('errors', $this->validator->getErrors());
        }

        // Verify the current password before allowing any change.
        if (empty($user['password']) || ! password_verify((string) $this->request->getPost('current_password'), $user['password'])) {
            return redirect()->back()->with('error', 'Current password is incorrect.');
        }

        $newPassword = (string) $this->request->getPost('new_password');

        // Same complexity rules used for admin-created accounts.
        if (! preg_match('/[A-Z]/', $newPassword)) {
            return redirect()->back()->with('error', 'New password must contain at least one uppercase letter.');
        }
        if (! preg_match('/[a-z]/', $newPassword)) {
            return redirect()->back()->with('error', 'New password must contain at least one lowercase letter.');
        }
        if (! preg_match('/[0-9]/', $newPassword)) {
            return redirect()->back()->with('error', 'New password must contain at least one number.');
        }
        if (! preg_match('/[!@#$%^&*(),.?":{}|<>]/', $newPassword)) {
            return redirect()->back()->with('error', 'New password must contain at least one special character.');
        }

        $userModel->update($userId, [
            'password' => password_hash($newPassword, PASSWORD_DEFAULT),
        ]);

        // Regenerate the session so any previously stolen session is invalidated.
        session()->regenerate(true);

        (new AuditLogModel())->insert([
            'user_id' => $userId,
            'action' => 'profile.password_changed',
            'description' => 'Changed account password.',
            // Explicit safe value: never store password data or the raw POST body in the audit log.
            'new_data' => json_encode(['password_updated' => true]),
            'created_at' => date('Y-m-d H:i:s'),
        ]);

        return redirect()->back()->with('success', 'Password updated successfully. Please use your new password next time.');
    }
}
