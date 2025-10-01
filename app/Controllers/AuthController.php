<?php

namespace App\Controllers;

use App\Models\UserModel;

class AuthController extends BaseController
{

	public function index()
	{
		//default method
	}

	/*
	* User Authentication - Creates user details
	* Validate user details 
	* Password stores after converted in hash password
	* Unique token generated - used for reset password functionality
	*/
	public function register()
	{

		helper(['form', 'text']);
		$data = [];

		if ($this->request->getMethod() == 'get') {
			$data = [
				'title_meta' => view('partials/title-meta', ['title' => 'Register'])
			];
			return view('auth/auth-register', $data);
		}

		if ($this->request->getMethod() == 'post') {
			$rules = [
				'useremail' => 'required|min_length[8]|max_length[50]|valid_email|is_unique[users.user_email]',
				'username' => 'required|min_length[3]|max_length[50]|is_unique[users.user_name]',
				'userpassword' => 'required|min_length[8]|max_length[50]',
				'userpassword_confirm' => 'matches[userpassword]',
				'user_friendly_name' => 'required|min_length[2]|max_length[50]',
			];

			$errors = [
				'userpassword' => [
					'required' => 'The Password is required.'
				],
				'userpassword_confirm' => [
					'matches' => 'The Password and Confirm Password don\'t match.'
				]
			];

			$data['title_meta'] = view('partials/title-meta', ['title' => 'Register']);  // Add this: Ensure title is always set for re-render

			if (!$this->validate($rules, $errors)) {
				$data['validation'] = $this->validator;
			} else {
				// ---- store details in database
				$model = new UserModel();

				$userData = [
					'user_name' => $this->request->getVar('username'),
					'user_email' => $this->request->getVar('useremail'),
					'user_friendly_name' => $this->request->getVar('user_friendly_name'),
					'user_password' => $this->request->getVar('userpassword'),  // Hashes via model callback
					'user_role' => 'user',  // Default for new users
					'user_status' => 'active',  // Default active
					'token' => random_string('alnum', 16)
				];
				$id = $model->insert($userData);  // Use insert() for clarity; returns ID
				if ($id) {
					// Remap for session compatibility (TODO: Refactor app-wide later)
					$sessionData = [
						'id' => $id,
						'username' => $userData['user_name'],
						'email' => $userData['user_email']
					];
					$this->setUserSession($sessionData);
					return redirect()->to('home');
				} else {
					// Handle insert fail (e.g., DB error)
					session()->setFlashdata('error', 'Registration failed. Please try again.');
				}
			}
			// Always return the view on POST (with errors, repopulated fields, or flashdata)
			return view('auth/auth-register', $data);
		}
	}
	/*
	* User Authentication - Sign in process
	* Validate User credentials 
	*/
	public function login()
	{
		helper(['form']);
		$data = [];

		if ($this->request->getMethod() == 'get') {
			$data = [
				'title_meta' => view('partials/title-meta', ['title' => 'Log in'])
			];
			return view('auth/auth-login', $data);
		}

		if ($this->request->getMethod() == 'post') {
			$rules = [
				'username' => 'required|min_length[3]|max_length[50]|valid_email',
				'userpassword' => 'required|min_length[8]'
			];

			$errors = [
				'username' => [
					'required' => 'Username or email is required.',
					'min_length' => 'Must be at least 3 characters.',
					'max_length' => 'Cannot exceed 50 characters.',
					'valid_email' => 'Please enter a valid email address.'
				],
				'userpassword' => [
					'required' => 'Password is required.',
					'min_length' => 'Password must be at least 8 characters.'
				]
			];

			if (!$this->validate($rules, $errors)) {
				$data['validation'] = $this->validator;
				$data['title_meta'] = view('partials/title-meta', ['title' => 'Log in']);
				return view('auth/auth-login', $data);
			} else {
				$model = new \App\Models\UserModel();
				$identifier = $this->request->getPost('username');
				$password = $this->request->getPost('userpassword');
				$user = $model->findUserByCredentials($identifier, $password);

				if (is_array($user) && isset($user['error'])) {
					session()->setFlashdata('error', $user['error']);
					return redirect()->to('/auth-login');
				}

				if (!$user) {
					session()->setFlashdata('error', 'Username or Password don\'t match.');
					return redirect()->to('/auth-login');
				}
				// Remap prefixed keys for session compatibility (TODO: Refactor app-wide later)
				$sessionData = [
					'id' => $user['user_id'],
					'username' => $user['user_name'],
					'email' => $user['user_email'],
					'friendly_name' => $user['user_friendly_name'],

					// Add more as needed, e.g., 'friendly_name' => $user['user_friendly_name']
				];
				$this->setUserSession($sessionData);
				return redirect()->to('/');
			}
		}
	}

	/*
	* User Authentication - create session for logged in user
	*/
	private function setUserSession($user)
	{
		$data = [
			'id' => $user['id'],
			'email' => $user['email'],
			'username' => $user['username'],
			'isLoggedIn' => true,
		];
		session()->set($data);
		return true;
	}

	/*
 * User Authentication - Recover password 
 * Validate and check existing email in local DB
 * Generate reset token, update DB, send email with reset link
 */
	public function recoverpw()
	{
		helper(['form']);
		$data = [];

		if ($this->request->getMethod() == 'get') {
			$data = [
				'title_meta' => view('partials/title-meta', ['title' => 'Recover Password'])
			];
			return view('auth/auth-recoverpw', $data);
		}

		if ($this->request->getMethod() == 'post') {
			$rules = [
				'useremail' => 'required|min_length[4]|max_length[100]|valid_email',  // Updated max_length to match DB; removed custom rule for now—add if needed below
			];

			$errors = [
				'useremail' => [
					'required' => 'Email is required.',
					'valid_email' => 'Please enter a valid email.',
				]
			];

			if (!$this->validate($rules, $errors)) {
				$data['validation'] = $this->validator;
			} else {
				// Find user by user_email (fixed field name)
				$model = new UserModel();
				$user = $model->where('user_email', $this->request->getVar('useremail'))->first();  // Changed from 'email' to 'user_email'

				if (!$user || $user['user_status'] !== 'active') {
					// User not found/inactive: Show generic success to avoid leaking info
					$data['result'] = 'success';
				} else {
					// Generate secure reset token (32 bytes, hex) and hash it for DB
					$token = bin2hex(random_bytes(32));
					$hashedToken = password_hash($token, PASSWORD_DEFAULT);

					// Set expiry: 1 hour from now
					$expiresAt = date('Y-m-d H:i:s', time() + 3600);

					// DEBUG: Log vars to see if we reach here and what data looks like
					//log_message('debug', 'DEBUG: Updating user_id=' . $user['user_id'] . ', token=' . substr($hashedToken, 0, 10) . '...');
					//$updateData = [ 'reset_token' => $hashedToken, 'reset_expires_at' => $expiresAt ];
					//log_message('debug', 'DEBUG: Update data=' . print_r($updateData, true));

					// Update DB with new fields
					$model->update($user['user_id'], [
						'reset_token' => $hashedToken,
						'reset_expires_at' => $expiresAt,
					]);

					// Build reset URL (we'll create the reset page next)
					$resetUrl = base_url('auth-updatepw') . '?token=' . $token . '&email=' . urlencode($user['user_email']);

					// Send email using our SMTP config
					$email = service('email');
					$email->setFrom('service@prideprinting.ink', 'Pathfinder App');
					$email->setTo($user['user_email']);
					$email->setSubject('Pathfinder Password Reset Request');
					$email->setMessage("Hi {$user['user_friendly_name']},\n\nYou requested a password reset. Click here to set a new one: {$resetUrl}\n\nThis link expires in 1 hour. If you didn't request this, ignore it.\n\nBest,\nPride Printing Team");
					$email->setMailType('text');

					if ($email->send()) {
						$data['result'] = 'success';
					} else {
						// Email failed: Log for debug, show error state (add <div class="alert alert-danger"> in view if $result == 'error')
						log_message('error', 'Password reset email failed for ' . $user['user_email'] . ': ' . $email->printDebugger(['headers']));
						$data['result'] = 'error';
					}
				}
			}
			$data['title_meta'] = view('partials/title-meta', ['title' => 'Recover Password']);
			return view('auth/auth-recoverpw', $data);
		}
	}

	/*
	* User Authentication - Update password
	* Check if user token is valid or not
	* Only valid email and token user, password will be updated
	*/
	/*
 * User Authentication - Update password 
 * Validate token/email, allow new password set, clear token on success
 */
	/*
 * User Authentication - Update password 
 * Validate token/email, allow new password set, clear token on success
 */
	/*
 * User Authentication - Update password 
 * Validate token/email, allow new password set, clear token on success
 */
	public function updatepw()
	{
		helper(['form']);
		$data = [];

		// Temp DEBUG: Echo to confirm method is hit
		//echo '<div class="alert alert-info">DEBUG: updatepw() method hit! Token: ' . ($this->request->getGet('token') ?? 'missing') . '</div>';  // Remove after test

		if ($this->request->getMethod() == 'get') {
			$token = $this->request->getGet('token');
			$useremail = $this->request->getGet('email');

			if (empty($token) || empty($useremail)) {
				return redirect()->to('auth-recoverpw')->with('error', 'Invalid reset link.');
			}

			$model = new \App\Models\UserModel();
			$user = $model->where('user_email', $useremail)->first();

			if (!$user || $user['user_status'] !== 'active') {
				return redirect()->to('auth-recoverpw')->with('error', 'User not found.');
			}

			if (empty($user['reset_token']) || !password_verify($token, $user['reset_token'])) {
				return redirect()->to('auth-recoverpw')->with('error', 'Invalid token.');
			}

			if (strtotime($user['reset_expires_at']) < time()) {
				$model->update($user['user_id'], ['reset_token' => null, 'reset_expires_at' => null]);
				return redirect()->to('auth-recoverpw')->with('error', 'Reset link expired.');
			}

			// Valid: Pass to view
			$data['useremail'] = $useremail;
			$data['token'] = $token;  // Already added for hidden field
			$data['title_meta'] = view('partials/title-meta', ['title' => 'Update Password']);
			return view('auth/auth-updatepw', $data);
		}

		// POST: Process new password
		if ($this->request->getMethod() == 'post') {
			$token = $this->request->getPost('token') ?? $this->request->getGet('token');  // Grab from hidden input or GET
			$useremail = $this->request->getPost('useremail') ?? $this->request->getGet('email');
			$newPassword = $this->request->getPost('userpassword');
			$confirmPassword = $this->request->getPost('userpassword_confirm');

			// Validate
			$rules = [
				'userpassword' => 'required|min_length[8]|max_length[255]',
				'userpassword_confirm' => 'required|matches[userpassword]',
			];
			$errors = [
				'userpassword' => [
					'required' => 'New password is required.',
					'min_length' => 'Password must be at least 8 characters.',
				],
				'userpassword_confirm' => [
					'required' => 'Please confirm your password.',
					'matches' => 'Passwords do not match.',
				],
			];

			if (!$this->validate($rules, $errors)) {
				// Validation failed: Re-display form with errors (re-validate token too)
				$data['validation'] = $this->validator;
				$data['useremail'] = $useremail;
				$data['token'] = $token;
				$data['title_meta'] = view('partials/title-meta', ['title' => 'Update Password']);
				return view('auth/auth-updatepw', $data);
			}

			// Re-find user and re-validate token (for security on POST)
			$model = new \App\Models\UserModel();
			$user = $model->where('user_email', $useremail)->first();

			if (!$user || empty($user['reset_token']) || !password_verify($token, $user['reset_token']) || strtotime($user['reset_expires_at']) < time()) {
				return redirect()->to('auth-recoverpw')->with('error', 'Invalid or expired reset link.');
			}

			// Hash and update password (pass PLAIN password; let model callback hash it)
			$model->update($user['user_id'], [
				'user_password' => $newPassword,  // PLAIN TEXT HERE
				'reset_token' => null,
				'reset_expires_at' => null,
			]);

			// Success: Redirect to login with message
			return redirect()->to('auth-login')->with('success', 'Password updated successfully! Please log in with your new password.');
		}
	}


	/*
	* Send Email
	* Recover password - send email 
	* Update Gmail Creds - in fun and app\Config\Email.php file
	*/
	public function sendEmail($email, $link)
	{
		$email = \Config\Services::email();

		$email->setFrom('kishu0825@gmail.com', 'Krishna');
		$email->setTo('shahkrishna0825@gmail.com');

		$email->setSubject('Email Test');

		$html = '<div style="border-style:solid;font-family:Poppins,sans-serif;border-width:thin;border-color:#dadce0;border-radius:8px;padding:40px;max-width: 500px;" align="center">';
		$html .= '<div style="background-color:rgba(85,110,230,.25); padding:20px"><img src="https://themesbrand.com/skote/layouts/vertical/assets/images/logo-dark.png" width="" height="24" aria-hidden="true" alt="Skote"></div>';
		$html .= '<div style="border-bottom:thin solid #dadce0;color:rgba(0,0,0,0.87);line-height:32px;padding-bottom:24px;text-align:center;word-break:break-word"><div style="text-align:center;padding-bottom:16px;line-height:0"></div>';
		$html .= '<div style="color:#556ee6;"><h2>Reset Password</h2>Re-Password with Skote.</div>';
		$html .= '<div style="font-family:Roboto-Regular,Helvetica,Arial,sans-serif;font-size:14px;color:rgba(0,0,0,0.87);line-height:20px;padding-top:20px;text-align:left">You are receiving this e-mail because you requested a password reset for your Skote account. <br/><br/>Please tap the button bellow to reset a new password.';
		$html .= '<div style="padding-top:32px;text-align:center"><a href="' . $link . '" style="line-height:16px;color:#ffffff;font-weight:400;text-decoration:none;font-size:14px;display:inline-block;padding:10px 24px;background-color:#556ee6;border-radius:5px;min-width:90px" target="_blank">Reset</a></div></div>';

		$email->setMessage($html);
		$response = '';
		try {
			if ($email->send()) {
				$response = 'success';
			} else {
				// $data = 'error';
				$response = $email->printDebugger(['headers']);
			}
		} catch (\Exception $ex) {
			$response = $ex->getMessage();
		}
		return $response;
	}

	/*
	* User Authentication - Remove session on sign out process
	*/
	public function logout()
	{
		session()->destroy();	//unet current user session 

		helper(['form']);
		$data = [
			'title_meta' => view('partials/title-meta', ['title' => 'Login'])
		];
		return view('auth/auth-login', $data);
	}
	//--------------------------------------------------------------------
public function profile()
{
    helper(['form']);
    $data = [];

    if ($this->request->getMethod() == 'get') {
        // Get current user from session (assuming you set 'id', 'username', 'email' on login)
        $userId = session()->get('id');
        if (!$userId) {
            return redirect()->to('auth-login')->with('error', 'Please log in first.');
        }

        $model = new \App\Models\UserModel();
        $user = $model->find($userId);  // Fetches full user array

        if (!$user) {
            return redirect()->to('auth-login')->with('error', 'User not found.');
        }

        // Pass to view (exclude sensitive fields like password)
        $data = [
            'useremail' => $user['user_email'],
            'user_friendly_name' => $user['user_friendly_name'],
            'title_meta' => view('partials/title-meta', ['title' => 'Profile'])
        ];

        return view('auth/auth-profile', $data);
    }

    // POST handling comes in Step 2
}
}
