<?php

namespace App\Models;

use CodeIgniter\Model;


class UserModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'users';
    protected $primaryKey       = 'user_id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['user_name', 'user_email', 'user_friendly_name', 'user_password', 'user_role', 'user_status', 'token', 'user_login', 'reset_token', 'reset_expires_at', 'user_created', 'user_updated', 'deleted_at'];

    // Timestamps
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'user_created';
    protected $updatedField  = 'user_updated';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = ['hashPassword'];
    protected $afterInsert    = [];
    protected $beforeUpdate   = ['hashPassword'];
    protected $afterUpdate    = [];
    protected $afterFind      = [];
    protected $afterDelete    = [];

    /**
     * Hash password before insert/update
     */
    protected function hashPassword(array $data)
    {
        if (isset($data['data']['user_password'])) {
            $data['data']['user_password'] = password_hash($data['data']['user_password'], PASSWORD_DEFAULT);
        }

        return $data;
    }

/**
 * Find user by credentials (username or email), verify password, update login timestamp
 */
public function findUserByCredentials($identifier, $password)
{
    $builder = $this->builder();
    $builder->where('user_status', 'active')
            ->groupStart()
            ->where('user_name', $identifier)
            ->orWhere('user_email', $identifier)
            ->groupEnd();

    $user = $builder->get()->getRowArray();

    if (!$user || !password_verify($password, $user['user_password'])) {
        return false;
    }

    // Update last login timestamp
    $this->update($user['user_id'], ['user_login' => date('Y-m-d H:i:s')]);

    // Return user array (exclude password for security)
    unset($user['user_password']);    
    return $user;
}
}