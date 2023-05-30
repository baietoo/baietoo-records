<?php
    class Admins extends Controller{
        public function __construct(){
            $this->adminModel = $this->model('Admin');
        }
        public function index(){
            $data = ['title' => 'Welcome Admin'];
            $this->view('admins/index', $data);
        }
    }
?>