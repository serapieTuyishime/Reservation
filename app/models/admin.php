<?php 
	class Admin
	{
		private $db;
		public function __construct()
		{
			$this->db= new Database();
		}
		public function register($data)
		{
			$this->db->query('INSERT into admins (username, telephone, password) values(:username, :telephone, :password)');
			$this->db->bind('username', $data['username']);
			$this->db->bind('telephone', $data['telephone']);
			$this->db->bind('password', $data['password']);
			if ($this->db->execute()) 
			{
				return true;
			}
			else
			{
				return false;
			}
		}
		public function login($username, $password)
        {
            $this->db->query('SELECT * from admins where username= :username');
            $this->db->bind(':username', $username);

            $row= $this->db->single();
            $hashed_password= $row->password;
            if(password_verify($password, $hashed_password))
            {
                return $row;
            }
            else
            {
            return false;
            }
		}
		public function fetchAdminByUsername($username)
		{
			$this->db->query('SELECT * from admins where username= :name');
			$this->db->bind('name', $username);
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
		public function fetchAdminByTelephone($telephone)
		{
			$this->db->query('SELECT * from admins where telephone= :name');
			$this->db->bind('name', $telephone);
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

	}
?>