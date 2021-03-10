<?php
	class Room
	{
		private $db;
		public function __construct()
		{
			$this->db= new Database();
		}
		public function register($data)
		{
			$this->db->query('INSERT into rooms (name, category, lodge, price, specifications, comments, imageName) values (:name, :category, (SELECT lodge from managers where email= :managerEmail), :price, :specification, :comments, :imageName)');
			$this->db->bind('name',$data['name']);
			$this->db->bind('category',$data['category']);
			$this->db->bind('managerEmail',$_SESSION['user_email']);
			$this->db->bind('price',$data['price']);
			$this->db->bind('specification',$data['specification']);
			$this->db->bind('comments',$data['comments']);
			$this->db->bind('imageName',$data['imageName']);

			if ($this->db->execute())
			{
				return true;
			}
			else
			{
				return false;
			}
		}
		public function fetchRoomByName($name)
		{
			$this->db->query('SELECT * from rooms where name=:name');
			$this->db->bind('name', $name);
			$row= $this->db->single();
			if ($this->db->rowCount()>0)
			{
				return $row;
			}
			else
			{
				return false;
			}
		}
		public function fetchRoomDetailsByName($name)
		{
			$this->db->query('SELECT *, (SELECT count(*) from reservation where room= :name and closed="true") as reservations, (SELECT feedback from reservation where room=:name order by dateOut desc limit 1) as pastComments, (SELECT dateOut from reservation where room=:name order by dateOut desc limit 1) as dateOut  from rooms where name=:name');
			$this->db->bind('name', $name);
			$row= $this->db->single();
			if ($this->db->rowCount()>0)
			{
				return $row;
			}
			else
			{
				return array();
			}
		}
		public function fetchReservationsByRoom($name)
		{
			$this->db->query('SELECT *,(SELECT dateOut from reservation where room=:name order by dateOut desc limit 1) as dateOut from rooms where name=:name');
			$this->db->bind(':name', $name);
			$row= $this->db->single();
			if ($this->db->rowCount()>0)
			{
				return $row;
			}
			else
			{
				return array();
			}
		}
		public function reserve($data)
		{
			$guestId= $this->registerGuest($data);
			$this->db->query('INSERT into reservation (room, lodge, guestName, price, dateIn, dateOut, clientId, status) values (:room, (SELECT lodge from rooms where name= :room limit 1), :clientName, :amount, :date_in, :date_out, (SELECT last_insert_id() from guests limit 1), :status)');
			$this->db->bind(':room', $data['roomName']);
			$this->db->bind(':clientName', $data['clientName']);
			$this->db->bind(':amount', $data['amount']);
			$this->db->bind(':date_in', $data['date_in']);
			$this->db->bind(':date_out', $data['date_out']);
			$this->db->bind(':status', "pending");

			if ($this->db->execute())
			{
				$reservation_id= $this->fetchReservationNumber();
				return $reservation_id;
			}
			else
			{
				return false;
			}
		}
		private function fetchReservationNumber()
		{
			$this->db->query('SELECT last_insert_id() as reservation_id from reservation limit 1');
			$row= $this->db->single();
			return $row->reservation_id;
		}
		private function registerGuest($data)
		{
			$this->db->query('INSERT into guests (name, telephone, email, location, dateVisited) values(:name, :telephone, :email, :location, :dateVisited)');
			$this->db->bind('name', $data['clientName']);
			$this->db->bind('telephone', $data['telephone']);
			$this->db->bind('email', $data['email']);
			$this->db->bind('location', $data['location']);
			$this->db->bind('dateVisited', date('Y-m-d'));

			if ($this->db->execute())
			{
				return true;
			}
			else
			{
				return false;
			}
		}
		public function fetchAllRooms()
		{
			$this->db->query('SELECT * from rooms where rooms.lodge= (SELECT managers.lodge from managers where email=:email limit 1  )');
			$this->db->bind('email', $_SESSION['user_email']);
			return $this->db->resultSet();
		}
	}
?>
