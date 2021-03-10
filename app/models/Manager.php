<?php
    class Manager
    {
        private $db;
        public function __construct()
        {
            $this->db= new Database;
        }
        public function register($data)
        {
            $this->db->query('INSERT into managers (name, email, telephone, lodge, password) values (:name, :email, :telephone, :lodge, :password)');
            $this->db->bind(':name', $data['names']);
            $this->db->bind('email', $data['email']);
            $this->db->bind('telephone', $data['telephone']);
            $this->db->bind('lodge', $data['lodge']);
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

        public function login($email, $password)
        {
            $this->db->query('SELECT * from managers where email= :email');
            $this->db->bind(':email', $email);

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
        public function findManagerByEmail($email)
        {
            $this->db->query('SELECT * FROM managers where email= :email');
            $this->db->bind(':email', $email);
            $row= $this->db->single();
            if($this->db->rowCount()>0)
            {
                return $row;
            }
            else
            {
                return false;
            }
        }
        public function fetchManagerByTelephone($telephone)
        {
            $this->db->query('SELECT * FROM managers where telephone= :telephone');
            $this->db->bind(':telephone', $telephone);
            $row= $this->db->single();
            if($this->db->rowCount()>0)
            {
                return $row;
            }
            else
            {
                return false;
            }
        }
        public function getManagerById($id)
        {
            $this->db->query('SELECT * from managers where id= :id');
            $this->db->bind(':id', $id);
            $row= $this->db->single();
            return $row;
        }
        public function showAll()
        {
            $this->db->query('SELECT * from managers');
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
        public function deleteManagerById($id)
        {
            $this->db->query('DELETE from managers where id=:id');
            $this->db->bind('id', $id);
            return $this->db->execute();

        }
        public function changePassword($password, $telephone)
		{
			$this->db->query('UPDATE managers set password= :password where telephone= :telephone');
			$this->db->bind('password', $password);
			$this->db->bind('telephone', $telephone);
			return $this->db->execute();
		}
    }
