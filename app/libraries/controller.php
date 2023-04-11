<?php
    /*
        Base controller
        loads models and vies
    */
    class Controller{
        // load model
        public function model($model){
            // require model file
            require_once '../app/models/' . $model . '.php';
            // Instantiate model
            return new $model();
        }
        // load view
        public function view($view, $data){
            // check for view file
            $view_file = '../app/views/' . $view . '.php';
            if(file_exists($view_file)){
                require_once($view_file);
            } else {
                die('View does not exist!');
            }
        }
    }
?>