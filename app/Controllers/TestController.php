<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class TestController extends BaseController
{
    public function settings()
    {
        $model = new \App\Models\UserSettingsModel();
        $userId = 4; // From your SQL dump

        // Insert a test setting
        $model->updateOrCreateSetting($userId, 'theme_mode', 'dark');

        // Get and dump
        $settings = $model->getUserSettings($userId);
        var_dump($settings);
    }
}