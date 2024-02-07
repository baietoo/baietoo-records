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
                "INSERT INTO post
                (artist_id, title, body, song_filename)
                VALUES(:artist_id, :title, :body, :song_filename)"
            );
            // bind values
            $this->db->bind(':artist_id', $data['artist_id']);
            $this->db->bind(':title', $data['title']);
            $this->db->bind(':body', $data['body']);
            $this->db->bind(':song_filename', $data['song_filename']);
        
            // Execute
            if ($this->db->execute()) {
                return true;
            }
            return false;
        }

        public function updatePost($data){
            $this->db->query(
                "UPDATE post
                SET
                    title = :title,
                    body = :body,
                    song_filename = :song_filename
                WHERE
                    id = :id"
            );
            // bind values
            $this->db->bind(':id', $data['id']);
            $this->db->bind(':title', $data['title']);
            $this->db->bind(':body', $data['body']);
            $this->db->bind(':song_filename', $data['song_filename']);
        
            // Execute
            if ($this->db->execute()) {
                return true;
            }
            return false;
        }
        public function getPostById($id){
            # TODO: why passed as array?
            $id = $id[0];
            $this->db->query('SELECT * FROM post WHERE id = :id');
            $this->db->bind(':id', $id);

            $row = $this->db->single();
            return $row;
        }

        public function deletePost($id){
            # TODO: why passed as array?
            $id = $id[0];
            $this->db->query(
                "DELETE FROM post
                WHERE
                    id = :id"
            );
            // bind values
            $this->db->bind(':id', $id);
        
            // Execute
            if ($this->db->execute()) {
                return true;
            }
            return false;
        }
    }
?>