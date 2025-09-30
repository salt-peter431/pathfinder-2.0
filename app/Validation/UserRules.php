<?php

namespace App\Validation;

use App\Models\UserModel;

class UserRules
{
    /**
 * Validate user credentials (by user_name or user_email, active only)
 */
public function validateUser(string $str, string $params, array $data)
{
    $model = new UserModel();
    $identifier = $data['username']; // Form field for username/email input

    $user = $model->findUserByCredentials($identifier, $data['password']);

    return $user !== false; // True if valid, false otherwise
}

    /**
 * Error message for validateUser
 */
public function validateUser_label(string $str, string $params, array $data): string
{
    return 'Username or Password don\'t match.';
}

    /**
     * Validate email format (for register/recover)
     */
    public function validateEmail(string $str, string $fields, array $data)
    {
        return filter_var($str, FILTER_VALIDATE_EMAIL) !== false;
    }
}