<?php
class Posts extends Controller
{
    public function __construct()
    {
        if (!isLoggedIn()) {
            redirect('artists/login');
        }
        $this->postModel = $this->model('Post');
        $this->artistModel = $this->model('Artist');
    }
    public function index()
    {
        $posts = $this->postModel->getPosts();
        $data = [
            'posts' => $posts
        ];
        $this->view('posts/index', $data);
    }

    public function add()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            $data = [
                'title' => trim($_POST['title']),
                'body' => trim($_POST['body']),
                'artist_id' => trim($_SESSION['artist_id']),
                'title_err' => '',
                'body_err' => ''
            ];

            // validate title
            if(strlen($data['title']) === 0){
                $data['title_err'] = 'Please enter title';
            }
            // validate bodt
            if(strlen($data['body']) === 0){
                $data['body_err'] = 'Please enter description';
            }

            // make sure no errors
            // if(empty($data['body_err']) && empty($data['title_err'])){

            if(strlen($data['body_err']) === 0 && strlen($data['title_err']) === 0){
                // Validated
                if($this->postModel->addPost($data)){
                    flash('post_message', 'Post Added');
                    redirect('posts');
                } else {
                    die('Something went wrong');
                }
            } else {
                $this->view('posts/add', $data);
            }


        } else {

            $data = [
                'title' => '',
                'body' => ''
            ];

            $this->view('posts/add', $data);
        }
    }
    public function show($id){
        // TODO: why does $id store an array?
        $post = $this->postModel->getPostById($id);
        $artist = $this->artistModel->getArtistById($post->artist_id);
        $data = [
            'post' => $post,
            'artist' => $artist
        ];
        $this->view('posts/show', $data);
    }

    public function edit($id)
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            $data = [
                'title' => trim($_POST['title']),
                'body' => trim($_POST['body']),
                # TODO: why id passed as array
                'id' => $id[0],
                'artist_id' => trim($_SESSION['artist_id']),
                'title_err' => '',
                'body_err' => ''
            ];

            // validate title
            if(strlen($data['title']) === 0){
                $data['title_err'] = 'Please enter title';
            }
            // validate bodt
            if(strlen($data['body']) === 0){
                $data['body_err'] = 'Please enter description';
            }

            // make sure no errors
            // if(empty($data['body_err']) && empty($data['title_err'])){

            if(strlen($data['body_err']) === 0 && strlen($data['title_err']) === 0){
                // Validated
                if($this->postModel->updatePost($data)){
                    flash('post_message', 'Post Updated');
                    redirect('posts');
                } else {
                    die('Something went wrong');
                }
            } else {
                $this->view('posts/edit', $data);
            }


        } else {
            $post = $this->postModel->getPostById($id);
            // check post owner
            if($post->artist_id != $_SESSION['artist_id']){
                redirect('posts');
            }

            $data = [
                # TODO: why id passed as array?
                'id' => $id[0],
                'title' => $post->title,
                'body' => $post->body
            ];

            $this->view('posts/edit', $data);
        }
    }

}
?>