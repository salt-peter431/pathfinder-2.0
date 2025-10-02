<?php

namespace App\Models;

use CodeIgniter\Model;

class UserSettingsModel extends Model
{
    protected $table = 'user_settings';
    protected $primaryKey = 'id';

    protected $useTimestamps = true;
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';

    protected $allowedFields = [
        'user_id',
        'setting_key',
        'setting_value'
    ];

    protected $validationRules = [
        'user_id' => 'required|is_natural_no_zero',
        'setting_key' => 'required|min_length[1]|max_length[50]',
        'setting_value' => 'permit_empty|min_length[1]|max_length[65535]'
    ];

    protected $validationMessages = [
        'user_id' => [
            'required' => 'User ID is required.',
            'is_natural_no_zero' => 'User ID must be a valid positive integer.',
        ],
        'setting_key' => [
            'required' => 'Setting key is required.',
            'min_length' => 'Setting key must be at least 1 character.',
            'max_length' => 'Setting key cannot exceed 50 characters.',
        ],
        'setting_value' => [
            'min_length' => 'Setting value must be at least 1 character if provided.',
            'max_length' => 'Setting value cannot exceed 65535 characters.',
        ],
    ];

    /**
     * Get all settings for a specific user as an associative array (key => value).
     *
     * @param int $userId
     * @return array
     */
    public function getUserSettings(int $userId): array
    {
        $builder = $this->builder();
        $builder->select('setting_key, setting_value')
               ->where('user_id', $userId);

        $query = $builder->get();
        $settings = [];

        foreach ($query->getResultArray() as $row) {
            $settings[$row['setting_key']] = $row['setting_value'];
        }

        return $settings;
    }

    /**
     * Update or create a single setting for a user.
     * Uses INSERT ... ON DUPLICATE KEY UPDATE for efficiency.
     *
     * @param int $userId
     * @param string $key
     * @param string $value
     * @return bool Success
     */
    public function updateOrCreateSetting(int $userId, string $key, string $value): bool
    {
        $data = [
            'user_id' => $userId,
            'setting_key' => $key,
            'setting_value' => $value
        ];

        if (!$this->validate($data)) {
            return false;
        }

        $db = \Config\Database::connect();
        $sql = "INSERT INTO {$this->table} (user_id, setting_key, setting_value) 
                VALUES (?, ?, ?) 
                ON DUPLICATE KEY UPDATE setting_value = VALUES(setting_value), updated_at = CURRENT_TIMESTAMP";

        $result = $db->query($sql, [$userId, $key, $value]);
        return $result !== false;
    }
}