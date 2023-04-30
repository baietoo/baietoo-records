<?php
    class Artist {
        private $db;
        public function __construct(){
            $this-> db = new Database;
        }

        public function register($data){
            $this->db->query(
                "INSERT INTO Artist
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
        
    }
?>