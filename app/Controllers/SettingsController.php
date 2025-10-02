<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserSettingsModel;

class SettingsController extends BaseController
{
    protected $userSettingsModel;
protected $userModel;  // Use your existing UserModel

public function __construct()
{
    $this->userSettingsModel = new \App\Models\UserSettingsModel();
    $this->userModel = new \App\Models\UserModel();  // Load existing model
}

public function index()
{
    $userId = session()->get('id');
    if (!$userId) {
        return redirect()->to('/auth-login');
    }

    $user = $this->userModel->find($userId);  // Load user data (array)
    if (!$user) {
        return redirect()->to('/auth-login');
    }

    $data = [
        'title' => 'User Settings | Skote - Admin Dashboard',
        'user' => $user,
        'settings' => $this->userSettingsModel->getUserSettings($userId)
    ];

    // Set defaults if not set
    $data['settings']['theme_mode'] ??= 'dark';
    $data['settings']['sidebar_layout'] ??= 'horizontal';
    $data['settings']['home_screen'] ??= 'dashboard';

    if ($this->request->getMethod() === 'post') {
        $postData = $this->request->getPost();
        $success = true;

        // Handle profile updates
        $profileData = [
            'user_name' => $postData['user_name'] ?? $user['user_name'],
            'user_email' => $postData['user_email'] ?? $user['user_email'],
            'user_friendly_name' => $postData['user_friendly_name'] ?? $user['user_friendly_name'],
            'user_password' => $postData['user_password'] ?? ''
        ];

        // Password confirmation check
        $confirmPassword = $postData['confirm_password'] ?? '';
        if (!empty($profileData['user_password']) && $profileData['user_password'] !== $confirmPassword) {
            session()->setFlashdata('error', 'Passwords do not match.');
            $success = false;
        }

        // Basic validation (add more rules as needed)
        $validation = \Config\Services::validation();
        $validation->setRules([
            'user_name' => 'required|min_length[3]|max_length[50]',
            'user_email' => 'required|valid_email|max_length[100]',
            'user_friendly_name' => 'permit_empty|max_length[100]',
            'user_password' => 'permit_empty|min_length[8]'
        ]);
        if (!empty($profileData['user_password']) && !$validation->run(['user_password' => $profileData['user_password']])) {
            session()->setFlashdata('error', $validation->getError('user_password'));
            $success = false;
        }

        if ($success) {
            // Update user (model's beforeUpdate hashes password if set)
            $updateSuccess = $this->userModel->update($userId, $profileData);
            if (!$updateSuccess) {
                session()->setFlashdata('error', 'Failed to update profile.');
                $success = false;
            } else {
                // Refresh session if username/email changed
                if ($profileData['user_name'] !== $user['user_name']) {
                    session()->set('username', $profileData['user_name']);
                }
                if ($profileData['user_email'] !== $user['user_email']) {
                    session()->set('email', $profileData['user_email']);
                }
            }
        }

        // Handle settings updates (existing code)
        $settingsToUpdate = ['theme_mode', 'sidebar_layout', 'home_screen'];
        foreach ($settingsToUpdate as $key) {
            if (isset($postData[$key])) {
                $success = $this->userSettingsModel->updateOrCreateSetting($userId, $key, $postData[$key]) && $success;
            }
        }

        if ($success) {
            session()->setFlashdata('success', 'Settings updated successfully!');
        } else {
            session()->setFlashdata('error', 'Failed to update settings.');
        }

        return redirect()->to('/settings');
    }

    return view('settings/index', $data);
}
}