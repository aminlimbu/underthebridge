<?php
 class Users extends Controller{
    private $userModel;

    public function __construct(){
        $this->userModel = $this->model('User');
    }

    public function registerUser(){
        // Proceed if the method is POST
        if($_SERVER['REQUEST_METHOD'] == 'POST'){

            // Sanitise input values
            $_POST = filter_input_array(htmlspecialchars(INPUT_POST));

            // created array; include input values
            $data = [
                'name' => trim($_POST['name']),
                'email' => trim($_POST['email']),
                'password' => trim($_POST['password']),
                'confirm_password' => trim($_POST['confirm_password']),
                // varaibles for error handling
                'name_err' => '',
                'email_err' => '',
                'password_err' => '',
                'confirm_password_err' => ''
            ];

            // Validate email
            if(empty('email')){
                $data['email_err'] = 'Pleaee enter your email address.';
            } else {
                if($this->userModel->findUserByEmail($data['email'])){
                    $data['email_err'] = 'You have already registered before';
                }
            }

            // Validate Name
            if(empty('email')){
                $data['name_err'] = 'Please enter your name';
            }

            // Validate Password
            if(empty('password')){
                $data['password_err'] = 'Please enter passwrod';
            } elseif(strlen($data['password']) < 6){
                $data['password_err'] = 'Password must be at least 6 character long.';
            }

            // Validate Confirm Password
            if(empty($data['confirm_password'])){
                $data['confirm_password_err'] = 'Please confirm your password.';
            } else{
                if($data['password'] != $data['confirm_password']){
                    $data['confirm_password'] = 'Your confirm password does not match.';
                }
            }

            // Validation Finish

            // Check if error fields are empty before proceeding
            if(empty($data['email_err'] && empty($data['name_err']) && empty($data['password_err']) && empty($data['confirm_password_err']))){
                $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);
                if($this->userModel->register($data)){
                    flash('register_success', 'You are registered successfulle.');
                    redirect('users/login');
                } else {
                    die('Something went wrong, please try agina');
                }
            } else {
                // Load with with errors and user input data
                $this->view('users/register', $data);
            }
        } else{
            // if the method is not post
            // reset data array
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

            // Load new register page
            $this->view('/users/register', $data);
        }
    }
 }
?>