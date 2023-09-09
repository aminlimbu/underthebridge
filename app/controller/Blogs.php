<?php
// Blogs controller
    class Blogs extends Controller{
        private $blogModel;
        // Load Model
        public function __construct(){
            $this->blogModel = $this->model('Blog');
        }
        // index method, sets model and views
        public function index(){
            $blogs = $this->blogModel->getBlogs();
            
            // prepare data retrived from database
            $data = [
                'blogs' => $blogs
            ];

            // Load view and pass data
            $this->view('blogs/index', $data);
        }

        // Add post method
        public function addBlog(){
            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                // sanitise input received from POST method
                $_POST = filter_input_array(htmlspecialchars(INPUT_POST));
                
                // created associated array from data received from POST method
                $data = [
                    'user_id' => $_SESSION['user_id'],
                    'title' => trim($_POST['title']),
                    'body' => trim($_POST['body']),

                    // error handling variables
                    'title_err' => '',
                    'body_err' => ''
                ];

                // Validate title
                if(empty($data['title'])){
                    $data['title'] = 'Please enter title for your blog.';
                }

                // Validate body (content)
                if(empty($data['body'])){
                    $data['body_err'] = 'Blog body cannot be empty';
                }
                
                // populate database with new contents
                if(empty($data['body_err']) && empty($data['title_err'])){
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
