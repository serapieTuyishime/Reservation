<?php 
	/**
	 * the reservations class
	 */
	class Reservations extends Controller
	{		
		public function __construct()
		{
			$this->reservationModel= $this->model('reservation');
		}
		public function index($date='')
		{
			if ($_SESSION['user_type']!='admin') 
			{
				header('location:'.URLROOT);
				die();
			}
			$r_date= empty($date)? date('Y-m-d'): $date;
			$data= $this->reservationModel->fetchAllReservations($r_date);
			$this->view('reservations/show', $data);
		}
		public function findReservationsBydate()
		{
			if ($_SERVER['REQUEST_METHOD']=='POST') 
			{
				$date= $_POST['dateFrom'];
				$this->index($date);
			}
			else
			{
				$this->index();

			}
		}
		public function fetchReservationByLodge($lodge='body')
		{
			if (!isset($_SESSION['user_email'])) 
			{
				header('location:'. URLROOT);
				die();
			}
			$data= $this->reservationModel->fetchReservationByLodge();
			$this->view('reservations/show', $data);
		}
		public function changeReservation()
		{
			$data=
			[
				'reservation_id'=>'',
				'date_in'=>'',
				'room'=>'',
				'reservation_date'=>'',
				'date_out'=>'',
				'l_date_in'=>'',
				'code_err'=>''
			];
			$this->view('reservations/revert', $data);
		}
		public function revert($reservation_idd='')
		{
			if ($_SERVER['REQUEST_METHOD']=='POST') 
			{
				$reservation_id= trim($_POST['reservation_id']);

			}
			elseif (!empty($reservation_idd)) 
			{
				$reservation_id= $reservation_idd;
			}
			else
			{
				$this->changeReservation();
				die();
			}

			if ($details= $this->reservationModel->fetchDetailsByReservationId($reservation_id)) 
			{
				$row= $details[0];
				$nextDateIn='';
				if (isset($details[1])) 
				{
					$datee= $details[1];
					$nextDateIn= date('Y-m-d', strtotime("$datee - 1 day"));
				}
				$data=
				[
					'reservation_id'=>$row->id,
					'reservation_id_db'=>$row->id,
					'date_in'=>$row->dateIn,
					'room'=>$row->room,
					'reservation_date'=>$row->reservationDate,
					'date_out'=>$row->dateOut,
					'l_date_in'=>(isset($details[1]))? $nextDateIn: '',
					'code_err'=>''
				];
				$this->view('reservations/revert', $data);
			}
			else
			{
				$data=
				[
					'reservation_id'=>'',
					'date_in'=>'',
					'reservation_date'=>'',
					'date_out'=>'',
					'l_date_in'=>'',
					'room'=>'',
					'code_err'=>'Reservation code not found'
				];
				$this->view('Reservations/revert', $data);
			}
		}
		public function saveNewReservations()
		{
			if ($_SERVER['REQUEST_METHOD']=='POST') 
			{
				$newDateOut= $_POST['date_out'];
				$date_in= $_POST['date_in'];
				$reservation_id_hidden= empty($_POST['reservation_id_hidden'])? '':$_POST['reservation_id_hidden'];
				$reservation_id= $_POST['reservation_id'];
				if (empty($reservation_id_hidden)) 
				{
					$this->revert($reservation_id);
					die();
				}
				if ($reservation_id_hidden!=$reservation_id) 
				{
					$this->revert($reservation_id);
					die();
				}
				$data=
				[
					'date_out'=> $newDateOut,
					'reservation_id'=>$reservation_id,
					'date_in'=>$_POST['date_in'],
					'date_err'=>'',
					'room'=>'',
					'reservation_date'=>''

				];
				if ($date_in >= $newDateOut) 
				{
					$data['date_err']= "You must at least stay one day with us";
				}
				if (empty($data['date_err'])) 
				{
					if($this->reservationModel->updateReservations($data))
					{
						flash('register_success', 'Done changing the reservations');
                    	$this->changeReservation();
					}
					else
					{
						flash('register_success', 'Something is wrong');
                    	$this->changeReservation();
					}
				}
				else
				{
					$this->view('reservations/revert', $data);
				}

			}
			else
			{
				$this->changeReservation();
			}
		}
		public function postFeedback()
		{
			if ($_SERVER['REQUEST_METHOD']=='POST') 
			{
				$reservation_id= $_POST['reservation_id'];
				$feedback= $_POST['feedback'];
				$data=
				[
					'code_err'=>'',
					'reservation_id'=>$reservation_id,
					'feedback'=>$feedback
				];

				if (!$this->reservationModel->fetchDetailsByReservationId($reservation_id)) 
				{
					$data['code_err']='Reservation id not found';
				}
				if (empty($data['code_err'])) 
				{
					if ($this->reservationModel->addFeedback($data)) 
					{
						flash('register_success', 'Done adding comment thanks for your feeedback');
						redirect('reservations/postFeedback');                    	
					}
					else
					{
						flash('register_success', 'Encountered a problem');
						redirect('reservations/postFeedback');
					}
				}
				else
				{
					$this->view('reservations/addFeedback', $data);
				}
			}
			else
			{
				$data=
				[
					'code_err'=>'',
					'reservation_id'=>'',
					'feedback'=>''
				];
				$this->view('reservations/addFeedback', $data);
			}
		}
	}
?>