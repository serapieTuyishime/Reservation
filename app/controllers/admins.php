<?php 
	
	class Admins extends Controller
	{
		
		public function __construct()
		{
			$this->adminModel= $this->model('admin');
		}
		public function index()
		{
			$data=
			[
				'name'=>'',
				'username'=>'',
				'username_err'=>'',
				'password'=>'',
				'password_err'=>'',
				'telephone'=>'',
				'telephone_err'=>''
			];
			$this->view('admins/register', $data);
		}
		public function register()
		{
			if ($_SERVER['REQUEST_METHOD']=='POST') 
			{
				$_POST= filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
				$username= trim($_POST['username']);
				$password= trim($_POST['password']);

				$data=
				[
					'username'=>$username,
					'password'=> password_hash($password, PASSWORD_DEFAULT),
					'username_err'=>'',
					'password_err'=>'',
					'telephone'=>trim($_POST['telephone']),
					'telephone_err'=>''
				];

				if ($this->adminModel->fetchAdminByUsername($username)) 
				{
					$data['username_err']='This username is taken';
				}
				if ($this->adminModel->fetchAdminByTelephone($username)) 
				{
					$data['telephone_err']='This Telephone is taken';
				}
				if (empty($data['username_err'])&& empty($data['telephone_err'])) 
				{
					if ($this->adminModel->register($data)) 
					{
						flash('register_success', 'You are registered now you can log in');
                        redirect('admins/login');
					}
				}
			}
            else
            {
                $this->index();
            }
		}
		public function login(){
            if($_SERVER['REQUEST_METHOD'] == 'POST')
            {

                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

                $data = [
                    'username' => trim($_POST['username']),
                    'password' => trim($_POST['password']),
                    'username_err' => '',
                    'password_err' => '',
                ];


                if(strlen($data['password']) < 6)
                {
                    $data['password_err'] = 'Password must be at least 6 characters';
                }

                if(!$this->adminModel->fetchAdminByUsername($data['username']))
                {
                    $data['username_err'] = 'No admin found';
                }
                if(empty($data['username_err']) && empty($data['password_err']))
                {
                    $loggedInUser = $this->adminModel->login($data['username'], $data['password']);
                    if($loggedInUser)
                    {
                        $this->createUserSession($loggedInUser);
                    }
                    else
                    {
                        $data['password_err'] = 'Password incorrect';
                        $this->view('admins/login', $data);
                    }
                } 
                else 
                {
                    $this->view('admins/login', $data);
                }
            }
            else
            {
                $data = [
                    'username' => '',
                    'password' => '',
                    'username_err' => '',
                    'password_err' => '',
                ];
                $this->view('admins/login', $data);
            }
        }
        
        public function logout(){
            unset($_SESSION['user_id']);
            unset($_SESSION['user_type']);
            unset($_SESSION['user_email']);
            unset($_SESSION['user_name']);
            session_destroy();
            redirect('admins/login');
        }

        public function createUserSession($user){
            $_SESSION['user_id'] = $user->id;
            $_SESSION['user_type'] = 'admin';
            $_SESSION['user_email'] = '';
            $_SESSION['user_name'] = $user->name;
            redirect('lodges/register');
        }
	}
?>