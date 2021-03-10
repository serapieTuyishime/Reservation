<?php 
	
	class Ad 
	{
		private $db;		
		public function __construct()
		{
			$this->db= new Database();
		}
		public function register($data)
		{
			$this->db->query('INSERT into advertisements (advertiser, link, date_in, date_out, imageName) values (:advertiser, :link, :date_in, :date_out, :imageName)');
			$this->db->bind('advertiser', $data['advertiser']);
			$this->db->bind('link', $data['link']);
			$this->db->bind('date_in', $data['date_in']);
			$this->db->bind('date_out', $data['date_out']);
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
		public function showAll()
		{
			$this->db->query('SELECT * FROM advertisements');
			return $this->db->resultSet();
		}
	}
 ?>