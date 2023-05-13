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
        // var_dump($_FILES);
        // var_dump(PUBLIC_ROOT);
        // var_dump(PUBLIC_ROOT . '/songs/' . $_FILES['song_filename']['name'] );
        // var_dump($_POST);
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            $data = [
                'title' => trim($_POST['title']),
                'body' => trim($_POST['body']),
                'song_filename' => trim($_FILES['song_filename']['name']),
                'artist_id' => trim($_SESSION['artist_id']),
                'title_err' => '',
                'body_err' => ''
            ];
            var_dump($data['song_filename']);
            // validate title
            if(strlen($data['title']) === 0){
                $data['title_err'] = 'Please enter title';
            }
            // validate body
            if(strlen($data['body']) === 0){
                $data['body_err'] = 'Please enter description';
            }
            // validate filename
            var_dump($data['song_filename']);
            if(strlen($data['song_filename']) === 0){
                $data['song_filename_err'] = 'Please enter a song file';
            }
            // make sure no errors
            // if(empty($data['body_err']) && empty($data['title_err'])){
                
                if(strlen($data['body_err']) === 0 && strlen($data['title_err']) === 0 && strlen($data['song_filename_err']) === 0){
                    copy($_FILES['song_filename']['tmp_name'], PUBLIC_ROOT . '/songs/' . $_FILES['song_filename']['name'] );
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
        # TODO: edit song file
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

    public function delete($id){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $post = $this->postModel->getPostById($id);
            // check post owner
            if($post->artist_id != $_SESSION['artist_id']){
                redirect('posts');
            }

            if($this->postModel->deletePost($id, $post->song_filename)){
                flash('post_message', 'Post Removed');
                redirect('posts');
            } else {
                die('Something went wrong');
            }
        } else {
            redirect('posts');
        }
    }

}
?>