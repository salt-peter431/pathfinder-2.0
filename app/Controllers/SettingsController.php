<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserSettingsModel;

class SettingsController extends BaseController
{
    protected $userSettingsModel;

    public function __construct()
    {
        $this->userSettingsModel = new UserSettingsModel();
    }

    public function index()
    {
        $userId = session()->get('user_id'); // Assumes Skote/session stores user_id; adjust if needed (e.g., from auth lib)
        if (!$userId) {
            return redirect()->to('/auth-login');
        }

        $data = [
            'title' => 'User Settings | Skote - Admin Dashboard',
            'settings' => $this->userSettingsModel->getUserSettings($userId)
        ];

        // Set defaults if not set
        $data['settings']['theme_mode'] ??= 'dark';
        $data['settings']['sidebar_layout'] ??= 'horizontal';
        $data['settings']['home_screen'] ??= 'dashboard';

        if ($this->request->getMethod() === 'post') {
            // Handle update
            $postData = $this->request->getPost();
            $success = true;

            // Upsert each setting
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