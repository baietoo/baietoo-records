<?php
    /*
        PDO Database class
        connect to database
        create prepared statements
        bind values
        return rows and results
    */

    class Database {
        private $host = DB_HOST;
        private $user = DB_USER;
        private $pass = DB_PASS;
        private $db_name = DB_NAME;
        
        private $db_handler;
        private $stmnt;
        private $error;

        public function __construct(){
            // set DSN(data source name)
            $dsn = 'mysql:host=' . $this->host . ';dbname=' . $this->db_name;
            $options = array(
                PDO::ATTR_PERSISTENT => true,
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
            );

            // Create PDO instance
            try {
                $this->db_handler = new PDO($dsn, $this->user, $this->pass, $options);
            } catch (PDOException $e) {
                $this->error = $e->getMessage();
                echo $this->error;
            }
        }
        // Prepare statement with query
        public function query($sql){
            $this->stmnt = $this->db_handler->prepare($sql);
        }
        // Bind values
        public function bind($param, $value, $type = null){
            if(is_null($type)){
                switch(true){
                    case is_int($value):
                        $type = PDO::PARAM_INT;
                        break;
                    case is_bool($value):
                        $type = PDO::PARAM_INT;
                        break;
                    case is_null($value):
                        $type = PDO::PARAM_INT;
                        break;
                    default:
                        $type = PDO::PARAM_STR;                        
                }
            }
            $this->stmnt->bindValue($param, $value, $type);
        }

        // Execute the prepared statement
        public function execute(){
            return $this->stmnt->execute();
        }

        // Get result set as array of objects
        public function resultSet(){
            $this->execute();
            return $this->stmnt->fetchAll(PDO::FETCH_OBJ);
        }
        
        // Get single record as object
        public function single()
        {
            $this->execute();
            return $this->stmnt->fetch(PDO::FETCH_OBJ);
        }

        // Get row count
        public function rowCount(){
            return $this->stmnt->rowCount();
        }
    }
?>