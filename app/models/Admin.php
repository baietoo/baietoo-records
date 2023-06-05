<?php
    class Admin {
        private $db;
        
        public function __construct(){
            $this->db = new Database;
        }

        public function deleteEmail($id){
            $this->db->query('DELETE FROM emails WHERE id = :id');
            $this->db->bind(':id', $id);
            if($this->db->execute()){
                return true;
            }else{
                return false;
            }
        }

        public function replyEmail($data){
            $this->db->query('INSERT INTO emails (body, email) VALUES (:body, :email)');
            $this->db->bind(':body', $data['body']);
            $this->db->bind(':email', $data['email']);
            if($this->db->execute()){
                return true;
            }else{
                return false;
            }
        }
    }
?>