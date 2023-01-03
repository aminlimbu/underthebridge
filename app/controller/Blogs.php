<?php
// Blogs controller
    class Blogs extends Controller{

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
    }
?>