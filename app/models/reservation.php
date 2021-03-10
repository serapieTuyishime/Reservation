<?php
	class Reservation
	{
		private $db;
		public function __construct()
		{
			$this->db= new Database();
		}
		public function fetchAllReservationsOld($dates)
		{
			$this->db->query('SELECT *, (SELECT min(dateOut) from reservation where dateOut>=:today) as minDateOut from reservation where dateOut> :today ');
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
		public function fetchAllReservations($date1, $date2)
		{
			$this->db->query('SELECT *, min(dateOut) as minDateOut, max(dateOut)  as maxDateOut from reservation where dateOut >= :date1 and dateOut <= :date2 ');
			$this->db->bind('date1', $date1);
			$this->db->bind('date2', $date2);
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
		public function confirmReservation($data)
		{
			$this->db->query('UPDATE reservation set status= :status WHERE id=:id');
			$this->db->bind('status', "confirmed");
			$this->db->bind('id', $data['reservationId']);
			$this->db->execute();
			return;
		}
		public function fetchDetailsByReservationId($id)
		{
			$this->db->query('SELECT *, (SELECT dateVisited from guests where id=clientId) as reservationDate from reservation where id=:id');
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
		public function fetchReservationByLodge($email)
		{
			$this->db->query('SELECT * from reservation where lodge= (SELECT lodge from managers where email=:managerEmail)');
			$this->db->bind(':managerEmail', $email);
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
		public function deleteReservation($id)
		{
			$this->db->query('UPDATE reservation set closed= true where id=:id');
			$this->db->bind('id', $id);
			return $this->db->execute();
		}
	}
?>
