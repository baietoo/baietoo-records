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
                ORDER BY post.date_created'
            );
            $results = $this->db->resultSet();
            return $results;
        }
    }
?>