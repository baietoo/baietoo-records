<?php
    class Artists extends Controller{
        public function __construct(){
            $this->artistModel = $this->model('Artist');
        }

        public function register(){
            // Check for POST
            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                // process form
                // sanitize POST data
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

                $data = [
                    'name' => trim($_POST['name']),
                    'email' => trim($_POST['email']),
                    'password' => trim($_POST['password']),
                    'confirm_password' => trim($_POST['confirm_password']),
                    'name_err' => '',
                    'email_err' => '',
                    'password_err' => '',
                    'confirm_password_err' => ''
                ];

                // validate email
                $email = $data['email'];
                if(empty($email)){
                    $data['email_err'] = 'Please enter email';
                } else {
                    // Check if email already registered
                    if ($this->artistModel->findArtistByEmail($email)){
                        $data['email_err'] = 'Email already taken, try another one?';
                    };
                }

                // validate name
                if(empty($data['name'])){
                    $data['name_err'] = 'Please enter name';
                }

                // validate password
                $password = $data['password']; 
                if(empty($password)){
                    $data['password_err'] = 'Please enter password';
                } elseif(strlen($data['password']) < 4){
                    $data['password_err'] = 'Password must be at least 4 characters';
                }

                // validate confirm password
                if(empty($data['confirm_password'])){
                    $data['confirm_password_err'] = 'Please confirm password';
                } else {
                    if($data['password'] != $data['confirm_password']){
                        $data['confirm_password_err'] = 'Passwords do not match';
                    }
                }

                // Make sure errors are empty
                if(empty($data['name_err']) 
                    && empty($data['email_err'])
                    && empty($data['password_err'])
                    && empty($data['confirm_password_err'])){
                    // validated

                    // Hash password
                    $data['password'] = password_hash($password, PASSWORD_DEFAULT);

                    // Register Artist
                    if($this->userModel->register($data)){
                        
                    } else {
                        die('Something went wrong');
                    };


                } else {
                    // load view with errors
                    $this->view('artists/register', $data);
                }

            } else {
                // Init data
                $data = [
                    'name' => '',
                    'email' => '',
                    'password' => '',
                    'confirm_password' => '',
                    'name_err' => '',
                    'email_err' => '',
                    'password_err' => '',
                    'confirm_password_err' => ''
                ];

                // Load view
                $this->view('artists/register', $data);
            }
        }

        public function login(){
            // Check for POST
            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                // process form
                // sanitize POST data
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

                $data = [
                    'email' => trim($_POST['email']),
                    'password' => trim($_POST['password']),
                    'email_err' => '',
                    'password_err' => '',
                ];

                // validate email
                if(empty($data['email'])){
                    $data['email_err'] = 'Please enter email';
                }

                // validate password
                if(empty($data['password'])){
                    $data['password_err'] = 'Please enter password';
                }

                // Make sure errors are empty
               // Make sure errors are empty
               if(empty($data['email_err'])
               && empty($data['password_err'])){
                   // validated
                   die('SUCCESS');
           } else {
               // load view with errors
               $this->view('artists/login', $data);
           }

            } else {
                // Init data
                $data = [
                    'email' => '',
                    'password' => '',
                    'email_err' => '',
                    'password_err' => '',
                ];

                // Load view
                $this->view('artists/login', $data);
            }
        }

    }