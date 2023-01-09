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
            if (empty('email')) {
                $data['email_err'] = 'Pleaee enter your email address.';
            } else {
                if ($this->userModel->findUserByEmail($data['email'])) {
                    $data['email_err'] = 'You have already registered before';
                }
            }
            if (empty('email')) {
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
            if (empty($data['email_err'] && empty($data['name_err']) && empty($data['password_err']) && empty($data['confirm_password_err']))) {
                $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);
                if ($this->userModel->registerUser($data)) {
                    flash('register_success', 'You are registered successfulle.');
                    redirect('users/login');
                } else {
                    die('Something went wrong, please try agina');
                }
            } else {
                $this->view('users/register', $data);
            }
        } else {
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
            $_POST = filter_input_array(htmlspecialchars(INPUT_POST));
            $data = [
                'email' => trim($_POST['email']),
                'password' => trim($_POST['password']),
                'email_err' => '',
                'password_err' => '',
            ];
            if (empty($data['email'])) {
                $data['email_err'] = 'Please enter your email address.';
            }
            if (empty($data['password'])) {
                $data['password_err'] = 'Please enter your password.';
            }

            if ($this->userModel->findUserByEmail($data['email'])) {
                // 
            } else {
                $data['email_err'] = 'No user found with the email address: ' . $data['email'];
            }

            // If no errors
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
                // If error reload with data
                $this->view('users/login', $data);
            }
        } else {
            $data = [
                'email' => '',
                'password' => '',
                'email_err' => '',
                'password_err' => ''
            ];
            $this->view('users/login', $data);
        }
    }
    public function createUserSession($user)
    {
        $_SESSION['user_id'] = $user->id;
        $_SESSION['user_email'] = $user->email;
        $_SESSION['user_name'] = $user->first_name;
        redirect('blogs');
    }
    public function logout()
    {
        unset($_SESSION['user_id']);
        unset($_SESSION['user_email']);
        unset($_SESSION['user_name']);
        redirect('users/login');
    }
}
