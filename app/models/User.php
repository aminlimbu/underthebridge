<?php
    class User{
        private $db;
        public function __construct(){
            // instantiate new database
            $this->db = new Database;
        }
        
        // registerUser Method
        public function registerUser($data){
            // prepare query to insert data
            $this->db->query('INSERT INTO users(first_name, last_name, email, password) VALUES(:name, :lname, :email, :password)');
            
            // bind values
            $this->db->bind(':name', $data['name']);
            $this->db->bind(':lname', $data['lname']);
            $this->db->bind(':email', $data['email']);
            $this->db->bind(':password', $data['password']);
            
            // populate database with new register data
            if($this->db->execute()){
                return true;
            } else {
                return false;
            }
        }
        
        // Login Method
        public function login($email, $password){
            // prepare query
            $this->db->query('SELECT * FROM users WHERE email = :email');
            
            // bind value
            $this->db->bind(':email', $email);
            
            // get the row associated with the email address
            $row = $this->db->fetchSingle();
            
            // verify password
            $hashed_password = $row->password;
            if(password_verify($password, $hashed_password)){
                return $row;
            } else{
                return false;
            }
        }
        
        // FindUserByEmail Method
        public function findUserByEmail($email){
            // prepare query
            $this->db->query('SELECT * FROM users WHERE email = :email');
            
            // bind email address
            $this->db->bind(':email', $email);
            
            // Get the associated row from matched email
            $row = $this->db->fetchSingle();
            
            // Return boolean value, if the email exists in database
            if($this->db->rowCount() > 0){
                return true;
            } else {
                return false;
            }
        }
        
        //getUserById Method
        public function getUserById($id){
            // prepare query
            $this->db->query('SELECT * FROM users WHERE id = :id');
            
            // bind id value to prepared query
            $this->db->bind(':id', $id);
            
            // retrive associate row from database are return
            $row = $this->db->fetchSingle();
            return $row;
        }
    }
?>
