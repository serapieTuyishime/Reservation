<?php 
	class Lodge
	{
		private $db;
		public function __construct()
		{
			$this->db = new Database();
		}
		public function fetchAllLodges()
		{
			$this->db->query('SELECT *, (select count(*) from rooms where lodge=lodgeName) as rooms from lodges');
			$row= $this->db->resultSet();
			if ($this->db->rowCount()>0) 
			{
				return $row;
			}
			else
			{
				return array();
			}
		}
		public function fetchPopularRooms()
		{
			$this->db->query('SELECT * from rooms limit 3');
			$row= $this->db->resultSet();
			if ($this->db->rowCount()>0) 
			{
				return $row;
			}
			else
			{
				return array();
			}
		}
		public function fetchRoomsByLodge($name)
		{
			$this->db->query('SELECT * from rooms where lodge =:name ');
			$this->db->bind('name', $name);
			$row= $this->db->resultSet();
			if ($this->db->rowCount()>0) 
			{
				return $row;
			}
			else
			{
				return array();
			}
		}
		public function findLodgeByName($name)
		{
			$this->db->query('SELECT * from lodges where lodgeName= :name');
			$this->db->bind('name', $name);
			$row= $this->db->single();
			if ($this->db->rowCount()>0) 
			{
				return true;
			}
			else
			{
				return false;
			}
		}
		public function findLodgeByEmail($email)
		{
			$this->db->query('SELECT * from lodges where email= :email');
			$this->db->bind('email', $email);
			$row= $this->db->single();
			if ($this->db->rowCount()>0) 
			{
				return true;
			}
			else
			{
				return false;
			}
		}
		public function findLodgeByTelephone($telephone)
		{
			$this->db->query('SELECT * from lodges where telephone= :telephone');
			$this->db->bind('telephone', $telephone);
			$row= $this->db->single();
			if ($this->db->rowCount()>0) 
			{
				return true;
			}
			else
			{
				return false;
			}
		}
		public function register($data)
		{
			$this->db->query('INSERT into lodges (lodgeName, email, telephone, country, province, district, sector, specifications, imageName) values (:name, :email, :telephone, :country, :province, :district, :sector, :specifications, :imageName) ');
			$this->db->bind('name', $data['name']);
			$this->db->bind('email', $data['email']);
			$this->db->bind('telephone', $data['telephone']);
			$this->db->bind('country', $data['country']);
			$this->db->bind('province', $data['province']);
			$this->db->bind('district', $data['district']);
			$this->db->bind('sector', $data['sector']);
			$this->db->bind('specifications', $data['specification']);
			$this->db->bind('imageName', $data['imageName']);

			if ($this->db->execute()) 
			{
				return true;
			}
			else
			{
				return false;
			}

		}
		public function fetchFeedbacksByLodge($lodge)
		{
			$this->db->query('SELECT *, (SELECT dateVisited from guests where id= clientId limit 1) as reservationDate from reservation where lodge=:lodge and feedback !=""');
			$this->db->bind('lodge', $lodge);
			$row= $this->db->resultSet();
			if ($this->db->rowCount()>0) 
			{
				return $row;
			}
			else
			{
				return false;
			}
		}
		public function searchByLocation($data)
		{
			$this->db->query('SELECT *, (select count(*) from rooms where lodge=lodgeName) as rooms from lodges where country=:country and province=:province and district=:district and sector=:sector and cell=:cell');
			$this->db->bind('country', $data['country']);
			$this->db->bind('province', $data['province']);
			$this->db->bind('district', $data['district']);
			$this->db->bind('sector', $data['sector']);
			$this->db->bind('cell', $data['cell']);

			return  $this->db->resultSet();

		}
	}
?>