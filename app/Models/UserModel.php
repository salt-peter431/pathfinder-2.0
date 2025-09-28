<?php

namespace App\Models;

use CodeIgniter\Model;
use CodeIgniter\HTTP\IncomingRequest;  // For IP 

class UserModel extends Model
{
    protected $table = 'users';
    protected $primaryKey = 'id';
    protected $allowedFields = ['username', 'email', 'friendly_name', 'password', 'role', 'token'];
    protected $useTimestamps = true;
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';

    protected $beforeInsert = ['hashPassword'];
    protected $beforeUpdate = ['hashPassword'];

    protected function hashPassword(array $data)
    {
        if (!isset($data['data']['password'])) {
            return $data;
        }
        $data['data']['password'] = password_hash($data['data']['password'], PASSWORD_DEFAULT);
        return $data;
    }

    /**
     * Find user by email or username and verify password
     */
    
    public function findUserByCredentials($identifier, $password)
{
    $db = \Config\Database::connect();
    $builder = $db->table('users');
    $builder->select('id, username, email, password, friendly_name, role');
    $builder->where('username', $identifier);
    $builder->orWhere('email', $identifier);
    $query = $builder->get();
    $user = $query->getRowArray();

    if (!$user || !password_verify($password, $user['password'])) {
        // Throttle logic
        $session = session();
        $ip = service('request')->getIPAddress();  // Gets real IP (handles proxies)
        $key = 'login_attempts_' . md5($ip);
        $attempts = (int)($session->get($key) ?? 0);
        $timeKey = $key . '_time';
        $lastAttempt = $session->get($timeKey);

        if ($lastAttempt && (time() - $lastAttempt) < 900) {  // 15 mins window
            $session->set($key, $attempts + 1);
            if ($attempts >= 4) {  // 5th fail locks for 15 mins
                return ['error' => 'Too many failed attempts. Try again in 15 minutes.'];
            }
        } else {
            $session->set($key, 1);
            $session->set($timeKey, time());
        }
        return false;
    }

    // Success: Reset attempts
    $session = session();
    $ip = service('request')->getIPAddress();
    $key = 'login_attempts_' . md5($ip);
    $session->remove($key);
    $session->remove($key . '_time');

    return $user;
}
}