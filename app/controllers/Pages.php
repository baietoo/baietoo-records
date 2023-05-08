<?php
class Pages extends Controller
{
    public function __construct()
    {
    }
    public function index()
    {
        if (isLoggedIn()) {
            redirect('posts');
        }
        $data = [
            'title' => 'Baietoo Records',
            'description' => 'Cea mai faimoasa casa de discuri de la adresa https://baietoo-records.herokuapp.com/pages/about'
        ];

        $this->view('pages/index', $data);
    }
    public function about()
    {
        $data = [
            'title' => 'About Us',
            'description' => 'Fa din muzica un stil de viata'
        ];
        $this->view('pages/about', $data);
    }

    public function contact(){

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            $data = [
                'title' => trim($_POST['email']),
                'body' => trim($_POST['body']),
                // 'artist_id' => trim($_SESSION['artist_id']),
                'title_err' => '',
                'body_err' => ''
            ];

            // validate email
            if (strlen($data['title']) === 0) {
                $data['title_err'] = 'Please enter email';
            }
            // validate bodt
            if (strlen($data['body']) === 0) {
                $data['body_err'] = 'Please enter body';
            }

            // make sure no errors
            // if(empty($data['body_err']) && empty($data['title_err'])){

            if (strlen($data['body_err']) === 0 && strlen($data['title_err']) === 0) {
                // Validated
                if ($this->postModel->addPost($data)) {
                    flash('post_message', 'mail sent');
                    redirect('posts');
                } else {
                    die('Something went wrong');
                }
            } else {
                $this->view('pages/contact', $data);
            }
        } else {
            $data = [
                'title' => '',
                'body' => ''
            ];
            $this->view('pages/contact', $data);
        }
    }
}

?>