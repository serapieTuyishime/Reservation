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
				if ($this->adminModel->fetchAdminByTelephone($$_POST['telephone'])) 
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
	}
?>