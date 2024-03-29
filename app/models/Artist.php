<?php
    class Artist {
        private $db;
        public function __construct(){
            $this-> db = new Database;
        }

        public function register($data){
            $this->db->query(
                "INSERT INTO artist
                (name, email, password)
                VALUES(:name, :email, :password)"
            );
            // bind values
            $this->db->bind(':name', $data['name']);
            $this->db->bind(':email', $data['email']);
            $this->db->bind(':password', $data['password']);
        
            // Execute
            if ($this->db->execute()) {
                return true;
            }
            return false;
        }

        // Find artist by email
        public function findArtistByEmail($email){
            $this->db->query('SELECT * FROM artist WHERE email = :email');
            // bind values
            $this->db->bind(':email', $email);

            $row = $this->db->single();

            // check row
            if($this->db->rowCount() > 0){
                return true;
            }
            return false;
        }

        public function login($email, $password){
            $this->db->query('SELECT * FROM artist WHERE email = :email');
            $this->db->bind(':email', $email);
            $row = $this->db->single();

            $hashed_password = $row->password;
            if(password_verify($password, $hashed_password)){
                return $row;
            }
            return false;
        }

        public function getArtistById($id){
            $this->db->query('SELECT * FROM artist WHERE id = :id');
            // bind values
            $this->db->bind(':id', $id);

            $row = $this->db->single();

            return $row;
        }
        
    }
?>