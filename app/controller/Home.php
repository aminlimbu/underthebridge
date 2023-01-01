<?php
// Home page controller
class Home extends Controller{
    // Construct method
    public function __construct(){

    }
    // Additional methods
    public function index(){
        // properties
        $data = [
            'title' => 'Welcome to Under The Bridge',
            'description' => 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Ex modi atque repudiandae beatae. Quas cupiditate aliquid corrupti eum officia consectetur voluptas cum perspiciatis, porro quaerat soluta esse placeat maxime quisquam.',
        ];
        // view
        $this->view('Home/index', $data);
    }
}
?>