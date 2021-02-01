<?php 

class Rooms extends Controller
{
	
	public function __construct()
	{
		$this->roomModel= $this->model('room');
		$this->reservationModel= $this->model('reservation');
	}
	public function index()
	{
		$data=
		[
			'name'=>'',
			'price'=>'',
			'specification'=>'',
			'category'=>'',
			'comments'=>'',
			'name_err'=>'',
			'image_err'=>'',
			'imageName'=>''
		];
		$this->view('rooms/register', $data);
	}
	public function showAll()
	{
		$data= $this->roomModel->fetchAllRooms();
		$this->view('rooms/show', $data);
	}
	public function register()
	{
		if ($_SERVER['REQUEST_METHOD']=='POST') 
		{
			$_POST= filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
			$name= trim($_POST['name']);
			$category= $_POST['category'];
			$price= floatval(trim($_POST['price']));
			$specification= htmlspecialchars(trim($_POST['specification']));
			$comments= trim($_POST['comments']);

			$imagename= $_FILES['imagefile']['name'];
			$target_dir= APPROOT. "/views/images/rooms/";
			$target_file= $target_dir. basename($_FILES['imagefile']['name']);
			$imagefiletype= strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
			$extensions_list=	array("jpg","png","gif");
			
			$image_base64= base64_encode(file_get_contents($_FILES['imagefile']['tmp_name'])); 
			$image='data:image/'.$imagefiletype.';base64,'.$image_base64;

			$data=
			[
				'name'=>$name,
				'price'=>$price,
				'category'=>$category,
				'specification'=>$specification,
				'comments'=>$comments,
				'imageName'=>$image,
				'name_err'=>'',
				'image_err'=>''
			];
			if ($_SESSION['user_type']!='manager') 
			{
				flash('register_success', 'Please login as a manager');
                redirect('managers/login');
                die();
			}
			if (!in_array($imagefiletype, $extensions_list)) 
			{
				$data['image_err']= 'Please input the correct file extension between "jpg","png" and "gif"';
			}
			if ($this->roomModel->fetchRoomByName($name)) 
			{
				$data['name_err']= 'Room name taken';
			}
			if (empty($data['name_err'])&&empty($data['image_err'])) 
			{
				if ($this->roomModel->register($data)) 
				{
					flash('register_success', 'Done registering rooms');
                    redirect('rooms');
				}
				else
				{
					flash('register_success', 'something is wrong with registering room');
                    redirect('rooms/register');
				}
			}
			else
			{
				$this->view('rooms/register', $data);
			}
		}
		else
		{
			$this->index();
		}
	}
	public function singleRoom($name)
	{
		$data= $this->roomModel->fetchRoomDetailsByName($name);
		$this->view('rooms/oneRoom', $data);
	}
	public function prepareReservation($name)
	{
		$roomData= $this->roomModel->fetchReservationsByRoom($name);
		$data=
		[
			'roomName'=>$roomData->name,
			'l_date_out'=>empty($roomData->dateOut)? date('Y-m-d'): $roomData->dateOut,
			'date_out'=>'',
			'price'=>$roomData->price,
			'lodge'=>$roomData->lodge,
			'date_err'=>''
		];
		$this->view('rooms/reservation', $data);
	}
	public function reservation()
	{
		if ($_SERVER['REQUEST_METHOD']=='POST') 
		{
			$_POST= filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
			$room= isset($_POST['room'])? $_POST['room']:'';
			$date_in= $_POST['date_in'];
			$date_out= $_POST['date_out'];
			$price= $_POST['price'];
			$fName= $_POST['fName'];
			$lName= $_POST['lName'];
			$telephone= $_POST['telephone'];
			$email= isset($_POST['email'])? $_POST['email']:'';
			$country= $_POST['country'];
			$province= $_POST['province'];
			$district= $_POST['district'];
			$sector= $_POST['sector'];
			$gender= $_POST['gender'];
			$password= $_POST['paymentpassword'];

			$clientName= strtoupper($lName).' '.ucfirst($fName);
			$location= $country.'-'.$province.'-'.$district.'-'.$sector;

			$date1=new DateTime($date_in);
            $date2=new DateTime($date_out);
            $interval= $date1->diff($date2);
            $diff= $interval->format('%a');

            $amount= floatval($price)* intval($diff);

            if (empty($room)) 
            {
            	flash('register_success', "A problem arose while reserving please browse again", "alert alert-danger");
            	echo "<script>window.history.back();</script>";
            	die();
            }

            //validate email

            
            $roomDetails= $this->roomModel->fetchRoomByName($room);
            $charge= $amount * RESERVATIONFEE; //get the commission

			$data=
			[
				'roomName'=>$room,
				'date_in'=>$date_in,
				'date_out'=>$date_out,
				'amount'=>$amount,
				'charge'=>$charge,
				'lodge'=>$roomDetails->lodge,
				'clientName'=>$clientName,
				'telephone'=>$telephone,
				'email'=>$email,
				'location'=>$location,
				'gender'=>$gender,
				'date_err'=>'',
				'date1_err'=>'',
				'email_err'=>''
			];
			// validate dates

			if ($date_in < date('Y-m-d')) 
			{
				$data['date1_err']= "The date is incorrect";
			}

			// set a timeline so that you cant reserve a room n time years or months from now

			if ($date_out > date('Y-m-d', strtotime("+".LIMITTIME)) ) 
			{
				$data['date_err']= "We do not operate more than a period of ". LIMITTIME;
			}

			if ($date_in>= $date_out) 
			{
				$data['date_err']= "You must at least stay one day with us";
			}

			// validate email
			if (!preg_match("/([\w\-]+\@[\w\-]+\.[\w\-]+)/", $email)) 
            {
            	$data['email_err']= "Invalid email address";
            }

			// initiate payment method
			if (empty($_POST['paymentpassword'])) 
			{
				flash('register_success', "The pasword must not be empty", "alert alert-danger");
                redirect('rooms/reservation');

			}


			if (empty($data['date_err'])&&empty($data['date1_err'])&&empty($data['email_err'])) 
			{

				if($reservation_code= $this->roomModel->reserve($data))
				{
					$this->reservationModel->chargeCommission($data);


					flash('register_success', 'Reservation posted and your reservation code is: '. $reservation_code. 'But you will need to pay '. $data['charge']. "To activate it");
					header('location: '. URLROOT. '/reservations/payment/'.$reservation_code);
					die();
				}
				else
				{
					flash('register_success', 'Something is wrong');
                    redirect('rooms/reservation');
				}

			}
			else
			{
				$this->view('rooms/reservation',$data);
			}
		}
		else
		{
			$data=
			[
				'roomName'=>'',
				'price'=>'',
				'date_out'=>'',
				'l_date_out'=>date('Y-m-d'),
				'date_err'=>''
			];
			$this->view('rooms/reservation', $data);
		}
	}
}

?>