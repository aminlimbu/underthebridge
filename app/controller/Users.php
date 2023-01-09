<?php
class Users extends Controller
{
    private $userModel;
    public function __construct()
    {
        $this->userModel = $this->model('User');
    }
    public function register()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $_POST = filter_input_array(htmlspecialchars(INPUT_POST));
            $data = [
                'name' => trim($_POST['name']),
                'lname' => trim($_POST['lname']),
                'email' => trim($_POST['email']),
                'password' => trim($_POST['password']),
                'confirm_password' => trim($_POST['confirm_password']),
                'name_err' => '',
                'email_err' => '',
                'password_err' => '',
                'confirm_password_err' => ''
            ];
            
            // Check if the fields is empty or already registered
            if (empty('email')) {
                $data['email_err'] = 'Pleaee enter your email address.';
            } else {
                if ($this->userModel->findUserByEmail($data['email'])) {
                    $data['email_err'] = 'You have already registered before';
                }
            }
            
            if (empty('name')) {
                $data['name_err'] = 'Please enter your name';
            }
            
            if (empty('password')) {
                $data['password_err'] = 'Please enter passwrod';
            } elseif (strlen($data['password']) < 6) {
                $data['password_err'] = 'Password must be at least 6 character long.';
            }
            
            if (empty($data['confirm_password'])) {
                $data['confirm_password_err'] = 'Please confirm your password.';
            } else {
                if ($data['password'] != $data['confirm_password']) {
                    $data['confirm_password'] = 'Your confirm password does not match.';
                }
            }
            // form validation end
            
            // register user
            if (empty($data['email_err'] && empty($data['name_err']) && empty($data['password_err']) && empty($data['confirm_password_err']))) {
                $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);
                if ($this->userModel->registerUser($data)) {
                    flash('register_success', 'You are registered successfulle.');
                    redirect('users/login');
                } else {
                    die('Something went wrong, please try agina');
                }
            } else {
                // if error exist redirect with pre-filled data
                $this->view('users/register', $data);
            }
        } else {
            // if the method is not post, reset data and redirect to register page
            $data = [
                'name' => '',
                'lname' => '',
                'email' => '',
                'password' => '',
                'confirm_password' => '',
                'name_err' => '',
                'email_err' => '',
                'password_err' => '',
                'confirm_password_err' => ''
            ];
            $this->view('users/register', $data);
        }
    }

    public function login()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            
            // Sanitise input data
            $_POST = filter_input_array(htmlspecialchars(INPUT_POST));
            
            // Store input data in an array
            $data = [
                'email' => trim($_POST['email']),
                'password' => trim($_POST['password']),
                'email_err' => '',
                'password_err' => '',
            ];
            
            // Form validation
            if (empty($data['email'])) {
                $data['email_err'] = 'Please enter your email address.';
            }
            if (empty($data['password'])) {
                $data['password_err'] = 'Please enter your password.';
            }

            if ($this->userModel->findUserByEmail($data['email'])) {
                // user exist in the database
            } else {
                $data['email_err'] = 'No user found with the email address: ' . $data['email'];
            }

            // If no errors, login user
            if (empty($data['email_err']) && empty($data['password_err'])) {
                // login returns row from database
                $loggedInUser = $this->userModel->login($data['email'], $data['password']);
                if ($loggedInUser) {
                    $this->createUserSession($loggedInUser);
                } else {
                    $data['password_err'] = 'Password incorrect.';
                    $this->view('users/login', $data);
                }
            } else {
                // If error load view with data
                $this->view('users/login', $data);
            }
        } else {
            // if the method is not post, load view with reset data
            $data = [
                'email' => '',
                'password' => '',
                'email_err' => '',
                'password_err' => ''
            ];
            $this->view('users/login', $data);
        }
    }
    
    // Updaates session file, used for login duration
    public function createUserSession($user)
    {
        $_SESSION['user_id'] = $user->id;
        $_SESSION['user_email'] = $user->email;
        $_SESSION['user_name'] = $user->first_name;
        redirect('blogs');
    }
    
    // unset session files
    public function logout()
    {
        unset($_SESSION['user_id']);
        unset($_SESSION['user_email']);
        unset($_SESSION['user_name']);
        redirect('users/login');
    }
}
