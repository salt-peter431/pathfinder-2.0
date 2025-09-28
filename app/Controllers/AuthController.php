<?php namespace App\Controllers;

use App\Models\UserModel;

class AuthController extends BaseController{

	public function index(){
		//default method
	}

	/*
	* User Authentication - Creates user details
	* Validate user details 
	* Password stores after converted in hash password
	* Unique token generated - used for reset password functionality
	*/
	public function register(){

		helper(['form', 'text']);
		$data = [];

		if($this->request->getMethod() == 'get'){			
			$data = [
				'title_meta' => view('partials/title-meta', ['title' => 'Register'])
			];
			return view('auth/auth-register', $data);
		}

		if($this->request->getMethod() == 'post'){
			$rules = [
				'useremail' => 'required|min_length[8]|max_length[50]|valid_email|is_unique[users.email]',
				'username' => 'required|min_length[3]|max_length[50]',
				'userpassword' => 'required|min_length[4]|max_length[50]',
				'userpassword_confirm' => 'matches[userpassword]',
			];

			$errors = [
				'userpassword' => [
					'required' => 'The Password is required.'
				],
				'userpassword_confirm' => [
					'matches' => 'The Password and Confirm Password don\'t match.'
				]
			];

			if(!$this->validate($rules, $errors)){
				$data['validation'] = $this->validator;
			} else{
				// ---- store details in database
				$model = new UserModel();

				$newData = [
					'email' => $this->request->getVar('useremail'),
					'username' => $this->request->getVar('username'),
					'password' => $this->request->getVar('userpassword'),
					'token' => random_string('alnum', 16)
				];
				$newData['id'] = $model->save($newData);
				$this->setUserSession($newData);
				return redirect()->to('home');
			}
			return view('auth/auth-register', $data);
		}		
	}

	/*
	* User Authentication - Sign in process
	* Validate User credentials 
	*/
public function login(){
    helper(['form']);
    $data = [];

    if($this->request->getMethod() == 'get'){
        $data = [ 
            'title_meta' => view('partials/title-meta', ['title' => 'Log in'])
        ];
        return view('auth/auth-login', $data);
    }

    if($this->request->getMethod() == 'post'){
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

        if(!$this->validate($rules, $errors)){
            $data['validation'] = $this->validator;
            $data['title_meta'] = view('partials/title-meta', ['title' => 'Log in']);				
            return view('auth/auth-login', $data);
        } else{
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
            
            $this->setUserSession($user);				
            return redirect()->to('/');
        }
    }		
}

	/*
	* User Authentication - create session for logged in user
	*/
	private function setUserSession($user){
		$data= [
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
	* Validate and check exist email in local DB
	* Send email on valid address with reset password link (unique per user)
	*/
	public function recoverpw(){
		helper(['form']);
		$data = [];

		if($this->request->getMethod() == 'get'){
			$data = [
				'title_meta' => view('partials/title-meta', ['title' => 'Recover Password'])
			];
			return view('auth/auth-recoverpw', $data);
		}

		if($this->request->getMethod() == 'post'){
			$rules = [
				'useremail' => 'required|min_length[4]|max_length[50]|valid_email|validateEmail[useremail]',
			];

			$errors = [
				'useremail' => [
					'validateEmail' => 'User email address doesn\'t exist.',
				]
			];

			if(!$this->validate($rules, $errors)){
				$data['validation'] = $this->validator;
			} else{
				//send email for reset password request
				$model = new UserModel();
				$user = $model->where('email', $this->request->getVar('useremail'))->first();
				$token = $user['token'];
				$link = base_url()."/auth-updatepw?$token";	//create link for update password

				$data['result'] = $this->sendEmail($user['email'], $link);
			}
			$data['title_meta'] = view('partials/title-meta', ['title' => 'Recover Password']);				
			// print_r($data);
			return view('auth/auth-recoverpw', $data);
		}
	}

	/*
	* User Authentication - Update password
	* Check if user token is valid or not
	* Only valid email and token user, password will be updated
	*/
	public function updatepw(){
		helper(['form', 'text']);
		$data = [];

		if($this->request->getMethod() == 'get'){
			$data = [
				'title_meta' => view('partials/title-meta', ['title' => 'Reset Password'])
			];

			//check if user has valid token
			$params = $this->request->getVar();
			$token = key($params);
			
			$model = new UserModel();
			$user = $model->where('token',$token)->first();
			if(!$user){
				$data['result'] = 'invalid';
			} else{
				$data['useremail'] = $user['email'];
			}
			return view('auth/auth-updatepw', $data);
		}

		if($this->request->getMethod() == 'post'){
			$rules = [
				'userpassword' => 'required|min_length[4]|max_length[50]',
				'userpassword_confirm' => 'matches[userpassword]',
			];

			$errors = [
				'userpassword' => [
					'required' => 'The Password is required.'
				],
				'userpassword_confirm' => [
					'matches' => 'The Password and Confirm Password don\'t match.'
				]
			];

			if(!$this->validate($rules, $errors)){				
				$data['validation'] = $this->validator;
				$data['title_meta'] = view('partials/title-meta', ['title' => 'Reset Password']);				
				$data['useremail'] =  $this->request->getVar('useremail');				
			} else{
				//send email 
				$model = new UserModel();
				$updateData = [
					'password' => $this->request->getVar('userpassword'),
					'token' => random_string('alnum', 16)
				];
				$model->where('email', $this->request->getVar('useremail'))
						->set($updateData)
						->update();

				$data['result'] = 'success';
				$data['title_meta'] = view('partials/title-meta', ['title' => 'Reset Password']);
				$data['useremail'] =  $this->request->getVar('useremail');
			}
			return view('auth/auth-updatepw', $data);
		}
	}
	

	/*
	* Send Email
	* Recover password - send email 
	* Update Gmail Creds - in fun and app\Config\Email.php file
	*/
	public function sendEmail($email, $link){
		$email = \Config\Services::email();

		$email->setFrom('kishu0825@gmail.com', 'Krishna');
		$email->setTo('shahkrishna0825@gmail.com');

		$email->setSubject('Email Test');

		$html = '<div style="border-style:solid;font-family:Poppins,sans-serif;border-width:thin;border-color:#dadce0;border-radius:8px;padding:40px;max-width: 500px;" align="center">';
		$html .= '<div style="background-color:rgba(85,110,230,.25); padding:20px"><img src="https://themesbrand.com/skote/layouts/vertical/assets/images/logo-dark.png" width="" height="24" aria-hidden="true" alt="Skote"></div>';
		$html .= '<div style="border-bottom:thin solid #dadce0;color:rgba(0,0,0,0.87);line-height:32px;padding-bottom:24px;text-align:center;word-break:break-word"><div style="text-align:center;padding-bottom:16px;line-height:0"></div>';
		$html .= '<div style="color:#556ee6;"><h2>Reset Password</h2>Re-Password with Skote.</div>';
		$html .= '<div style="font-family:Roboto-Regular,Helvetica,Arial,sans-serif;font-size:14px;color:rgba(0,0,0,0.87);line-height:20px;padding-top:20px;text-align:left">You are receiving this e-mail because you requested a password reset for your Skote account. <br/><br/>Please tap the button bellow to reset a new password.';
		$html .= '<div style="padding-top:32px;text-align:center"><a href="'.$link.'" style="line-height:16px;color:#ffffff;font-weight:400;text-decoration:none;font-size:14px;display:inline-block;padding:10px 24px;background-color:#556ee6;border-radius:5px;min-width:90px" target="_blank">Reset</a></div></div>';
		
		$email->setMessage($html);
		$response = '';
		try{
			if($email->send()){
				$response = 'success';
			} else{
				// $data = 'error';
				$response = $email->printDebugger(['headers']);
			}
		}catch(\Exception $ex){
			$response = $ex->getMessage();
		}
		return $response;		
	}

	/*
	* User Authentication - Remove session on sign out process
	*/
	public function logout(){
		session()->destroy();	//unet current user session 

		helper(['form']);
		$data = [
			'title_meta' => view('partials/title-meta', ['title' => 'Login'])
		];
		return view('auth/auth-login', $data);
	}
	//--------------------------------------------------------------------

}
