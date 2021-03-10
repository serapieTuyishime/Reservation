<?php 
	/**
	 * advertisements class
	 */
	class Ads extends Controller
	{
		
		public function __construct()
		{
			$this->adModel= $this->model('ad');			
		}
		public function index()
		{
			$data= 
			[
				'imageName'=>'',
				'image_err'=>'',
				'date_out'=>'',
				'date_err'=>''
			];
			$this->view('advertisement/register', $data);
		}
		public function register()
		{
			if ($_SERVER['REQUEST_METHOD']=='POST') 
			{
				$_POST= filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
				$advertiser= trim($_POST['advertiser']);
				$ad_link= htmlspecialchars($_POST['ad_link']);
				$dateIn= $_POST['date_in'];
				$dateOut= $_POST['date_out'];
				
				$imagename= $_FILES['imagefile']['name'];
				$target_dir= APPROOT. "/views/images/ads/";
				$target_file= $target_dir. basename($_FILES['imagefile']['name']);
				$imagefiletype= strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
				$extensions_list=	array("jpg","png","gif");

				$image_base64= base64_encode(file_get_contents($_FILES['imagefile']['tmp_name'])); 
				$image='data:image/'.$imagefiletype.';base64,'.$image_base64;

				$data=
				[
					'image_err'=>'',
					'date_err'=>'',
					'advertiser'=>$advertiser,
					'link'=>$ad_link,
					'date_in'=>$dateIn,
					'date_out'=>$dateOut,
					'imageName'=>$image
				];
				if ($dateIn>= $dateOut) 
				{
					$data['date_err']= "The last date must be greater and not equal to first date";
				}
				if (!in_array($imagefiletype, $extensions_list)) 
				{
					$data['image_err']= 'Please input the correct file extension between "jpg","png" and "gif"';
				}
				if (empty($data['image_err'])&&empty($data['date_err'])) 
				{
					if ($this->adModel->register($data)) 
					{
						flash('register_success', 'Done registering advertisement');
                       	redirect('ads');
					}
				}
				else
				{
					$this->view('advertisement/register', $data);
				}


			}
			else
			{
				$this->index();
			}
		}
		public function show()
		{
			$data= $this->adModel->showAll();
			$this->view('advertisement/show', $data);
		}
	}
?>