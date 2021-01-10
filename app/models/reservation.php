<?php 
	class Reservation 
	{
		private $db;
		public function __construct()
		{
			$this->db= new Database();
		}
		public function fetchAllReservations($dates)
		{
			$this->db->query('SELECT *, (SELECT min(dateOut) from reservation where dateOut>=:today) as minDateOut from reservation where dateOut> :today');
			$this->db->bind('today', $dates);
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
		public function chargeCommission($data)
		{
			$this->db->query('UPDATE lodges set commission= (commission+ :commission ) where lodgeName=:name');
			$this->db->bind('commission', $data['charge']);
			$this->db->bind('name', $data['lodge']);
			return $this->db->execute();
	
		}
		public function fetchDetailsByReservationId($id)
		{
			$this->db->query('SELECT id, room, dateIn, dateOut, (SELECT dateVisited from guests where id=clientId) as reservationDate from reservation where id=:id');
			$this->db->bind('id', $id);
			$row= $this->db->single();
			if ($this->db->rowCount()>0) 
			{
				$lastDateOut= $this->fetchLastReservation($row->room, $id, $row->dateIn);
				
				$details= array($row, $lastDateOut);
				return $details;
			}
			else
			{
				return false;
			}
		}
		private function fetchLastReservation($room, $res_id, $mydate)
		{
			$this->db->query('SELECT dateIn from reservation where room=:room and id !=:myId and dateIn >:mydate order by dateIn asc limit 1 ');
			$this->db->bind('room', $room);
			$this->db->bind('myId', $res_id);
			$this->db->bind('mydate', $mydate);

			$row= $this->db->single();
			if ($this->db->rowCount()>0) 
			{
				return $row->dateIn;
			}
			else
			{
				return false;
			}
		}
		public function updateReservations($data)
		{
			$this->db->query('UPDATE reservation set dateOut=:dateOut where id=:res_id');
			$this->db->bind('dateOut', $data['date_out']);
			$this->db->bind('res_id', $data['reservation_id']);

			return $this->db->execute();

		}
		public function fetchReservationByLodge()
		{
			$this->db->query('SELECT * from reservation where lodge= (SELECT lodge from managers where email=:managerEmail)');
			$this->db->bind('managerEmail', $_SESSION['user_email']);
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
		public function addFeedback($data)
		{
			$this->db->query('UPDATE reservation set feedback=:feedback where id=:id');
			$this->db->bind('feedback', $data['feedback']);
			$this->db->bind('id', $data['reservation_id']);
			return $this->db->execute();
		}
	}
?>