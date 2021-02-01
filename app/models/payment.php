<?php
   class Payment {
      private $db;

      public function __construct(){
         $this->db = new Database;
      }
      //Register User
      public function register($data){
         $this->db->query('INSERT INTO users (name, email, password) VALUES (:name, :email, :password)');
         //Bind values
         $this->db->bind(':name', $data['name']);
         $this->db->bind(':email', $data['email']);
         $this->db->bind(':password', $data['password']);
         //Execute
         if($this->db->execute()){
            return true;
         }else{
            return false;
         }
      }
      //Login user
      public function fetchClientByEmail($email)
      {
         $this->db->query('SELECT * FROM clientcash WHERE clientEmail = :email');
         $this->db->bind(':email', $email);

         return $this->db->single();         
      }
      public function reduceClientCash($data)
      {
         $this->db->query('UPDATE clientcash set amount= (amount - :cash) where clientEmail =:email');
         $this->db->bind(':cash', $data['amount']);
         $this->db->bind(':email', $data['email']);
         $this->db->execute();
         return; 
      }

      //Find user by email
      public function findUserByEmail($email){
         $this->db->query('SELECT * FROM users WHERE email = :email');
         //Bind value
         $this->db->bind(':email', $email);
         //Execute
         $row = $this->db->single();
         //Check row
         if($this->db->rowCount() > 0){
            return true;
         }else{
            return false;
         }
      }

      public function getUserById($id){
         $this->db->query('SELECT * FROM users WHERE id = :id');
         //Bind value
         $this->db->bind(':id', $id);
         //Execute
         $row = $this->db->single();
         return $row;
      }
   }