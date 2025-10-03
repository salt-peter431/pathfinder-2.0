<?php
namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserSettingsModel;

class SettingsController extends BaseController
{
    protected $userSettingsModel;
    protected $userModel; // Use your existing UserModel

    public function __construct()
    {
        $this->userSettingsModel = new \App\Models\UserSettingsModel();
        $this->userModel         = new \App\Models\UserModel(); // Load existing model
    }

    public function index()
    {
        $userId = session()->get('id');
        if (! $userId) {
            return redirect()->to('/auth-login');
        }

        $user = $this->userModel->find($userId); // Load user data (array)
        if (! $user) {
            return redirect()->to('/auth-login');
        }

        $data = [
            'title'    => 'Settings', // Simplified for <h4> (original full title can be in view if needed)
            'user'     => $user,
            'settings' => $this->userSettingsModel->getUserSettings($userId),
        ];

        // Set defaults if not set
        $data['settings']['theme_mode'] ??= 'dark';
        $data['settings']['sidebar_layout'] ??= 'horizontal';
        $data['settings']['home_screen'] ??= 'dashboard';

                                           // NEW: Build breadcrumbs here (after data load, before POST handling)
        $currentRoute        = 'settings'; // Hardcoded for this page; detect dynamically if needed (e.g., $this->request->uri->getSegment(1))
        $breadcrumbs         = $this->getHomeBreadcrumb($currentRoute);
        $breadcrumbs[]       = ['name' => 'Settings', 'url' => null]; // Active last item
        $data['breadcrumbs'] = $breadcrumbs;                          // Add to $data for passing to view

        // NEW: Merge global data (e.g., theme_mode from BaseController) into local $data
        $data = array_merge($this->data, $data);

        if ($this->request->getMethod() === 'post') {
            $postData = $this->request->getPost();
            $success  = true;

            // Handle profile updates
            $profileData = [
                'user_name'          => $postData['user_name'] ?? $user['user_name'],
                'user_email'         => $postData['user_email'] ?? $user['user_email'],
                'user_friendly_name' => $postData['user_friendly_name'] ?? $user['user_friendly_name'],
            ];

            // Only add password if provided (and validated later)
            $newPassword = $postData['user_password'] ?? '';
            if (! empty($newPassword)) {
                $profileData['user_password'] = $newPassword; // Plain text; model will hash it
            }

            // Password confirmation check (only if changing)
            $confirmPassword = $postData['confirm_password'] ?? '';
            if (! empty($newPassword) && $newPassword !== $confirmPassword) {
                session()->setFlashdata('error', 'Passwords do not match.');
                $success = false;
            }

            // Basic validation (add more rules as needed)
            $validation = \Config\Services::validation();
            $validation->setRules([
                'user_name'          => 'required|min_length[3]|max_length[50]',
                'user_email'         => 'required|valid_email|max_length[100]',
                'user_friendly_name' => 'permit_empty|max_length[100]',
                'user_password'      => 'permit_empty|min_length[8]', // permit_empty allows skipping
            ]);
            if (! $validation->run($postData)) { // Validate full post data for consistency
                session()->setFlashdata('error', $validation->listErrors());
                $success = false;
            }

            if ($success) {
                // Update user (model's beforeUpdate hashes password only if present)
                $updateSuccess = $this->userModel->update($userId, $profileData);
                if (! $updateSuccess) {
                    session()->setFlashdata('error', 'Failed to update profile.');
                    $success = false;
                } else {
                    // Refresh session if username/email changed
                    if (isset($profileData['user_name']) && $profileData['user_name'] !== $user['user_name']) {
                        session()->set('username', $profileData['user_name']);
                    }
                    if (isset($profileData['user_email']) && $profileData['user_email'] !== $user['user_email']) {
                        session()->set('email', $profileData['user_email']);
                    }
                }
            }

            // Handle settings updates (existing code remains unchanged)
            $settingsToUpdate = ['theme_mode', 'sidebar_layout', 'home_screen'];
            foreach ($settingsToUpdate as $key) {
                if (isset($postData[$key])) {
                    $success = $this->userSettingsModel->updateOrCreateSetting($userId, $key, $postData[$key]) && $success;
                }
            }

            if ($success) {
                session()->setFlashdata('success', 'Settings updated successfully!');

                // NEW: Sync updated settings to session for global use (e.g., on other pages like customers)
                if (isset($postData['theme_mode'])) {
                    session()->set('theme_mode', $postData['theme_mode']);
                }
                if (isset($postData['sidebar_layout'])) {
                    session()->set('sidebar_layout', $postData['sidebar_layout']);
                }
                if (isset($postData['home_screen'])) {
                    session()->set('home_screen', $postData['home_screen']);
                }
            } else {
                session()->setFlashdata('error', 'Failed to update settings.');
            }

            return redirect()->to('/settings');
        }

        // NEW: Merge happens before POST handling, so it's available for GET too
        return view('settings/index', $data);
    }
}
