<?php
    class Post {
        private $db;
        
        public function __construct(){
            $this->db = new Database;
        }

        public function getPosts(){
            $this->db->query(
                'SELECT *,
                post.id as postId,
                artist.id as artistId,
                post.date_created as p_date_created,
                artist.date_created as a_date_created
                FROM post
                INNER JOIN artist
                ON post.artist_id = artist.id
                ORDER BY post.date_created DESC'
            );
            $results = $this->db->resultSet();
            return $results;
        }

        public function addPost($data){
            $this->db->query(
                "INSERT INTO Post
                (artist_id, title, body)
                VALUES(:artist_id, :title, :body)"
            );
            // bind values
            $this->db->bind(':artist_id', $data['artist_id']);
            $this->db->bind(':title', $data['title']);
            $this->db->bind(':body', $data['body']);
        
            // Execute
            if ($this->db->execute()) {
                return true;
            }
            return false;
        }
    }
?>