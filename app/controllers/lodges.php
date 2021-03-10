<?php

	class Lodges extends Controller
	{

		public function __construct()
		{
			$this->lodgeModel = $this->model('lodge');
			$this->managerModel= $this->model('manager');
			$this->reservationModel= $this->model('reservation');
		}
		public function index()
		{
			$data=
			[
				'name'=>'',
				'name_err'=>'',
				'telephone'=>'',
				'telephone_err'=>'',
				'email'=>'',
				'email_err'=>''
			];
			$this->view('lodges/register', $data);
		}
		public function register()
		{
			if ($_SERVER['REQUEST_METHOD']=='POST')
			{
				$_POST= filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
				$name= trim($_POST['name']);
				$telephone= trim($_POST['telephone']);
				$email= trim($_POST['email']);
				$specification= trim($_POST['specification']);
				$country= $_POST['country'];
				$province= isset($_POST['province']) ?$_POST['province']: '';
				$district= isset($_POST['district']) ?$_POST['district']: '';
				$sector= isset($_POST['sector']) ?$_POST['sector']: '';

				$imagename= $_FILES['imagefile']['name'];
				$target_dir= APPROOT. "/views/images/lodges/";
				$target_file= $target_dir. basename($_FILES['imagefile']['name']);
				$imagefiletype= strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
				$extensions_list=	array("jpg","png","gif");

				$image_base64= base64_encode(file_get_contents($_FILES['imagefile']['tmp_name']));
				$image='data:image/'.$imagefiletype.';base64,'.$image_base64;

				$data=
				[
					'name'=>$name,
					'telephone'=>$telephone,
					'specification'=>$specification,
					'email'=>$email,
					'country'=>$country,
					'province'=>$province,
					'district'=>$district,
					'sector'=>$sector,
					'imageName'=>$image,
					'image_err'=>'',
					'name_err'=>'',
					'email_err'=>'',
					'telephone_err'=>''
				];
				if ($_SESSION['user_type']!='admin')
				{
					flash('register_success', 'Please login as an Admin');
	                redirect('admins/login');
	                die();
				}
				if (!in_array($imagefiletype, $extensions_list))
				{
					$data['image_err']= 'Please input the correct file extension between "jpg","png" and "gif"';
				}
				if ($this->lodgeModel->findLodgeByName($name))
				{
					$data['name_err']= 'The lodge name is taken!';
				}
				if ($this->lodgeModel->findLodgeByTelephone($telephone))
				{
					$data['telephone_err']= 'The telephone number is taken';
				}
				if ($this->lodgeModel->findLodgeByEmail($email))
				{
					$data['email_err']= 'The email is arleady taken';
				}
				if (empty($data['name_err'])&&empty($data['telephone_err'])&&empty($data['email_err'])&&empty($data['image_err']))
				{
					if ($this->lodgeModel->register($data))
					{

						flash('register_success', 'Finished registering the lodge');
                        redirect('lodges/register');
					}
					else
					{
						lash('register_success', 'Lodge not registered !');
                        redirect('lodges/register');
					}
				}
				else
				{
					$this->view('lodges/register', $data);
				}
			}
			else
			{
				$this->index();
			}
		}
		public function showAll()
		{
			$row= $this->lodgeModel->fetchAllLodges();
			$data= $row? $row: array();
			$this->view('lodges/all_lodges', $data);
		}
		public function show()
		{
			// this is for the admin to view all registerd lodges
			$row= $this->lodgeModel->fetchAllLodges();
			$data= $row? $row: array();
			$this->view('lodges/show', $data);
		}
		public function feedbacks()
		{
			if ($_SESSION['user_type']!='manager')
			{
				header('location:'.URLROOT);
				die();
			}
			$lodge= $this->managerModel->findManagerByEmail($_SESSION['user_email']);
			$data= $this->lodgeModel->fetchFeedbacksByLodge($lodge->lodge);
			$this->view('lodges/feedbacks', $data);
		}
		public function singleLodge($name)
		{
			$row= $this->lodgeModel->fetchRoomsByLodge($name);
			$data= $row? $row: array();
			$this->view('lodges/singleLodge', $data);
		}
		public function findReservationsBydate()
		{
			if ($_SERVER['REQUEST_METHOD']=='POST')
			{
				$date1= $_POST['dateFrom'];
				$date2= $_POST['dateTo'];

				// validate $date
				if($date2 <= $date1)
				{
					flash('register_success','Invalid choice of dates','alert alert-warning');
					redirect('lodges/fetchReservationByLodge');
				}

				if ($date2 > date('Y-m-d'))
				{
					flash('register_success','Can not get reservations from future','alert alert-warning');
					redirect('lodges/fetchReservationByLodge');
				}
				$row= $this->reservationModel->fetchAllReservations($date1, $date2);
				$data['reservations']= $row;
				$data['heading']= 'All reservations from '. $date1 .' to '. $date2;

				$this->view('reservations/show', $data);
			}
			else
			{
				redirect('lodges/fetchReservationByLodge');

			}

		}
		public function fetchReservationByLodge()
		{
			$managerEmail= $_SESSION['user_email'];
			$row= $this->reservationModel->fetchReservationByLodge($managerEmail);
			$data['reservations']= $row;
			$this->view('reservations/show', $data);
		}
		public function search()
		{
			if ($_SERVER['REQUEST_METHOD']=='POST') 
			{
				$data['country']= $_POST['country'];
				$data['province']= $_POST['province'];
				$data['district']= $_POST['district'];
				$data['sector']= $_POST['sector'];
				$data['cell']= $_POST['cell'];

				$data= $this->lodgeModel->searchByLocation($data);

				$this->view('lodges/all_lodges',$data);
			}
			else
			{
				redirect('pages');
			}
		}
	}
?>
