<?php
// Blogs controller
    class Blogs extends Controller{
        private $blogModel;
        // Load Model
        public function __construct(){
            $this->blogModel = $this->model('Blog');
        }

        public function index(){
            $blogs = $this->blogModel->getBlogs();
            
            // prepare data tetrived from database
            $data = [
                'blogs' => $blogs
            ];

            // Load view and pass data
            $this->view('blogs/index', $data);
        }

        // Add post
        public function addBlog(){
            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                // sanitise input
                $_POST = filter_input_array(htmlspecialchars(INPUT_POST));

                $data = [
                    'title' => trim($_POST('title')),
                    'body' => trim($_POST('body')),
                    'user_id' => $_SESSION['user_id'],

                    // error handling variables
                    'title_err' => '',
                    'body_err' => ''
                ];

                // Validate title
                if(empty($data['title'])){
                    $data['title'] = 'Please enter title for you blog.';
                }

                // Validate body
                if(empty($data['body'])){
                    $body['body_err'] = 'Blog body cannot be empty';
                }

                if(empty($data['title_err']) && empty($data['title_err'])){
                    if($this->blogModel->addBlog($data)){
                        flash('blog_message', 'Blog Added');
                        redirect('blogs');
                    } else {
                        die('Something went wrong, please try again.');
                    }
                } else {
                    // if there are errors
                    $this->view('blogs/add', $data);
                }


            } else {
                $data = [
                    'title' => '',
                    'body' => ''
                ];
                $this->view('blogs/add', $data);
            }
        }
    }
?>