<?php
    class Admins extends Controller{
        public function __construct(){
            $this->adminModel = $this->model('Admin');
        }
        public function index(){
            $data = ['title' => 'Welcome Admin'];
            $this->view('admins/index', $data);
        }

        public function deleteEmail($id){
            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                if($this->adminModel->deleteEmail($id)){
                    flash('email_message', 'Email removed');
                    redirect('admins');
                }else{
                    die('Something went wrong');
                }
            }else{
                redirect('admins');
            }
        }

        public function replyEmail($id){
            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                $data = [
                    'id' => $id,
                    'body' => trim($_POST['body']),
                    'email' => trim($_POST['email']),
                    'body_err' => '',
                    'email_err' => ''
                ];
                if(empty($data['body'])){
                    $data['body_err'] = 'Please enter body';
                }
                if(empty($data['email'])){
                    $data['email_err'] = 'Please enter email';
                }
                if(empty($data['body_err']) && empty($data['email_err'])){
                    if($this->adminModel->replyEmail($data)){
                        flash('email_message', 'Email sent');
                        redirect('admins');
                    }else{
                        die('Something went wrong');
                    }
                }else{
                    $this->view('admins/replyEmail', $data);
                }
            }else{
                $data = [
                    'id' => $id,
                    'body' => '',
                    'email' => '',
                    'body_err' => '',
                    'email_err' => ''
                ];
                $this->view('admins/replyEmail', $data);
            }
        }
    }
?>