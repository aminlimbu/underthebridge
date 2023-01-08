<?php
    class User{
        private $db;

        public function __construct(){
            $this->db = new Database;
        }

        public function registerUser($data){
            // prepare query
            $this->db->query('INSERT INTO users(name, email, password) VALUES(:name, :email, :password)');

            // bind values to plaseholders
            $this->db->bind(':name', $data['name']);
            $this->db->bind(':email', $data['email']);
            $this->db->bind(':password', $data['password']);

            // Execute the statement; update database
            if($this->db->execute()){
                return true;
            } else {
                return false;
            }
        }

        public function login($email, $password){
            // created statement
            $this->db->query('SELECT * FROM users WHERE email = :email');

            // bind the value of email
            $this->db->bind(':email', $email);

            // get the related data, row, matching email address
            // fetchSingle functio executes and fetch data
            $row = $this->db->fetchSingle();

            // store hashed password from the row
            $hashed_password = $row->password;
            // check if the password match with password_verify function
            if(password_verify($password, $hashed_password)){
                return $row;
            } else{
                return false;
            }
        }

        // function to chedk if the user is already logged in
        public function findUserByEmail($email){
            $this->db->query('SELECT * FROM users WHERE email = :email');

            // bind values
            $this->db->bind(':email', $email);

            // fetch the row associated with the email
            $row = $this->db->fetchSingle();

            // examine if the request returns with the row
            if($this->db->rowCount() > 0){
                return true;
            } else {
                return false;
            }
        }

        // Find user by id, used in controller
        public function getUserById($id){
            $this->db->query('SELECT * FROM users WHERE id = :id');
            $this->db->bind(':id', $id);
            $row = $this->db->fetchSingle();
            return $row;
        }
    }

?>