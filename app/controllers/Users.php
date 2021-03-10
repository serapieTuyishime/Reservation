<?php
    class Users extends Controller{
        public function __construct(){
            $this->adminModel = $this->model('admin');
            $this->managerModel= $this->model('manager');
        }

        public function index()
        {
            redirect('pages');
        }
        public function Managerlogin()
        {
            if($_SERVER['REQUEST_METHOD'] == 'POST')
            {

                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
                $email= isset($_POST['email'])? $_POST['email']:'';

                $data =
                [
                    'email' => trim($email),
                    'password' => trim($_POST['password']),
                    'email_err' => '',
                    'password_err' => '',
                ];

                if(empty($data['email']))
                {
                    $data['email_err'] = 'Please enter email';
                }

                //Validate Password
                if(empty($data['password']))
                {
                    $data['password_err'] = 'Please enter password';
                }
                elseif(strlen($data['password']) < 6)
                {
                    $data['password_err'] = 'Password must be at least 6 characters';
                }

                //Check for user/email
                if($email= $this->managerModel->findManagerByEmail($data['email']))
                {
                    //Validated
                }
                else
                {
                    $data['email_err'] = 'No user found';
                }

                //Make sure errors are empty
                if(empty($data['email_err']) && empty($data['password_err']))
                {

                    $loggedInUser = $this->managerModel->login($data['email'], $data['password']);
                    if($loggedInUser){
                        //Create Session
                        $this->createUserSession($loggedInUser);
                        redirect('rooms');
                    }else{
                        $data['password_err'] = 'Password incorrect';
                        $this->view('managers/login', $data);
                    }
                } else {
                    //Load view with errors
                    $this->view('managers/login', $data);
                }
            }
            else
            {
                $data = [
                    'email' => '',
                    'password' => '',
                    'email_err' => '',
                    'password_err' => '',
                ];
                $this->view('managers/login', $data);
            }
        }
        public function Adminlogin(){
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
                    $data['username_err'] = 'No admin found with this username';
                }
                if(empty($data['username_err']) && empty($data['password_err']))
                {
                    $loggedInUser = $this->adminModel->login($data['username'], $data['password']);
                    if($loggedInUser)
                    {
                        $this->createUserSession($loggedInUser,'admin');
                        redirect('managers/showAll');
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
        public function AdminforgotPassword()
        {
            if ($_SERVER['REQUEST_METHOD']=='POST')
            {
                $data['telephone'] = trim($_POST["telephone"]);
                // check if the telephone matches what he used in the registration

                if (!$this->adminModel->fetchAdminByTelephone($data['telephone']))
                {
                    $data['telephone_err']='Telephone not found in the database';
                }

                if (!isset($data['telephone_err']))
                {
                    // generate a random password to form a number

                    // $randomPassword= mt_rand(1,999999);

                    $randomPassword= 123456;

                    $datadasePassword= password_hash($randomPassword, PASSWORD_DEFAULT);

                    $this->adminModel->changePassword($datadasePassword, $data['telephone']);

                    /* send password message to the telephone

                    *
                    *
                    *
                    */

                    flash('register_success', 'password changed! message not available for now', 'alert alert-danger');
                    redirect('users/Adminlogin');
                }
                else
                {
                    flash('register_success', 'Errors present', 'alert alert-warning');
                   $this->view('admins/passwordRecovery', $data);
                }
            }
            else
            {
                $data=
                [
                    'telephone'=>'',
                    'telephone_err'=>''
                ];
                $this->view('admins/passwordRecovery', $data);
            }
        }
        public function managerForgotPassword()
        {
            if ($_SERVER['REQUEST_METHOD']=='POST')
            {
                $data['telephone'] = trim($_POST["telephone"]);
                // check if the telephone matches what he used in the registration

                if (!$this->managerModel->fetchManagerByTelephone($data['telephone']))
                {
                    $data['telephone_err']='Telephone not found in the database';
                }

                if (!isset($data['telephone_err']))
                {
                    // generate a random password to form a number

                    // $randomPassword= mt_rand(1,999999);

                    $randomPassword= 123456;

                    $datadasePassword= password_hash($randomPassword, PASSWORD_DEFAULT);

                    $this->managerModel->changePassword($datadasePassword, $data['telephone']);

                    /* send password message to the telephone

                    *
                    *
                    *
                    */

                    flash('register_success', 'password changed! message not available for now', 'alert alert-danger');
                    redirect('users/Managerlogin');
                }
                else
                {
                    flash('register_success', 'Errors present', 'alert alert-warning');
                   $this->view('managers/passwordRecovery', $data);
                }
            }
            else
            {
                $data=
                [
                    'telephone'=>'',
                    'telephone_err'=>''
                ];
                $this->view('managers/passwordRecovery', $data);
            }
        }
        public function logout(){
            unset($_SESSION['user_id']);
            unset($_SESSION['user_email']);
            unset($_SESSION['user_type']);
            unset($_SESSION['user_name']);
            session_destroy();
            redirect('pages');
        }

        public function createUserSession($user, $type='manager'){
            $_SESSION['user_id'] = $user->id;
            $_SESSION['user_type']=$type;
            $_SESSION['user_email'] = $user->email;
            $_SESSION['user_name'] = $user->name;
            return ;
        }

    }
?>
