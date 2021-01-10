<?php
    class Managers extends Controller
    {
        public function __construct()
        {
            $this->userModel = $this->model('Manager');
            $this->lodgeModel= $this->model('lodge');
        }
        
        public function index()
        {
            $data = [
                'email' => '',
                'telephone' => '',
                'password' => '',
                'email_err' => '',
                'password_err' => '',
            ];
            $this->view('managers/login', $data);
        }
        public function register()
        {
            if ($_SESSION['user_type']!='admin') 
            {
                redirect('admins/login');
                die();
            }
            if($_SERVER['REQUEST_METHOD'] == 'POST')
            {

                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
                $fName= trim($_POST['fName']);
                $lName= trim($_POST['lName']);
                $fullName= strtoupper($fName).' '.ucfirst($lName);

                $data = 
                [
                    'names' => $fullName,
                    'email' => trim($_POST['email']),
                    'telephone' => trim($_POST['telephone']),
                    'password' => trim($_POST['password']),
                    'lodge'=> trim($_POST['belongingLodge']),
                    'confirm_password' => trim($_POST['confirm_password']),
                    'name_err' => '',
                    'email_err' => '',
                    'telephone_err' => '',
                    'password_err' => '',
                    'confirm_password_err' => ''
                ];

                if(empty($data['email']))
                {
                    $data['email_err'] = 'Please enter email';
                } 
                elseif($email= $this->userModel->findManagerByEmail($data['email'])) 
                {
                    $data['email_err'] = 'Email is already taken';
                }


                if(empty($data['password']))
                {
                    $data['password_err'] = 'Please enter password';
                }
                elseif(strlen($data['password']) < 6)
                {
                    $data['password_err'] = 'Password must be at least 6 characters';
                }

                //Validate Confirm Password
                if(empty($data['confirm_password']))
                {
                    $data['confirm_password_err'] = 'Please confirm password';
                }
                elseif($data['confirm_password'] != $data['password']) {
                    $data['confirm_password_err'] = 'Passwords do not match';
                }

                //Make sure errors are empty
                if(empty($data['email_err']) && empty($data['name_err']) && empty($data['password_err']) &&empty($data['confirm_password_err']))
                {
                    //Validated
                    //Hash password
                    $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);


                    if($this->userModel->register($data))
                    {
                       flash('register_success', 'You are registered and can log in');
                       redirect('managers/login');
                    } 
                    else 
                    {
                        flash('register_success', 'something went wrong');
                       redirect('managers/login');
                    }
                } 
                else 
                {
                    $this->view('managers/register', $data);
                }
            }
            else
            {
                $all_lodges=array();
                if ($allLodges= $this->lodgeModel->fetchAllLodges()) 
                {
                    foreach ($allLodges as $key => $value) 
                    {
                        $all_lodges[]= $value->lodgeName;
                    }
                    unset($value);
                }
                $data = 
                [
                    'name' => '',
                    'email' => '',
                    'telephone' => '',
                    'password' => '',
                    'lodges'=>$all_lodges,
                    'confirm_password' => '',
                    'name_err' => '',
                    'email_err' => '',
                    'password_err' => '',
                    'confirm_password_err' => ''
                ];
                $this->view('managers/register', $data);
            }
        }
        public function showAll()

        {
            $data= $this->userModel->showAll();
            $this->view('managers/showAll', $data);
        }
        public function delete($id)
        {
            if ($this->userModel->deleteManagerById($id)) 
            {
                flash('register_success', 'Done deleting manager');
                redirect('managers/showAll');
            }
            else
            {
                flash('register_success', 'Failed deleting a manager');
                redirect('managers/showAll');
            }
        }

        public function login()
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
                if($email= $this->userModel->findManagerByEmail($data['email']))
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

                    $loggedInUser = $this->userModel->login($data['email'], $data['password']);
                    if($loggedInUser){
                        //Create Session
                        $this->createUserSession($loggedInUser);
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
        
        public function logout(){
            unset($_SESSION['user_id']);
            unset($_SESSION['user_email']);
            unset($_SESSION['user_type']);
            unset($_SESSION['user_name']);
            session_destroy();
            redirect('managers/login');
        }

        public function createUserSession($user){
            $_SESSION['user_id'] = $user->id;
            $_SESSION['user_type']='manager';
            $_SESSION['user_email'] = $user->email;
            $_SESSION['user_name'] = $user->name;
            redirect('rooms');
        }

       
    }
?>