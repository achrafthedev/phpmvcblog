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
        if (isLoggedIn()) {
            redirect('pages/index');
        }

        $data = [
            'username' => '',
            'email' => '',
            'password' => '',
            'confirmPassword' => '',
            'usernameError' => '',
            'emailError' => '',
            'passwordError' => '',
            'confirmPasswordError' => ''
        ];

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $data = [
                'username' => trim($_POST['username'] ?? ''),
                'email' => trim($_POST['email'] ?? ''),
                'password' => trim($_POST['password'] ?? ''),
                'confirmPassword' => trim($_POST['confirmPassword'] ?? ''),
                'usernameError' => '',
                'emailError' => '',
                'passwordError' => '',
                'confirmPasswordError' => ''
            ];

            $nameValidation = "/^[a-zA-Z0-9]*$/";

            if (empty($data['username'])) {
                $data['usernameError'] = 'Please enter a username.';
            } elseif (!preg_match($nameValidation, $data['username'])) {
                $data['usernameError'] = 'Name can only contain letters and numbers.';
            }

            if (empty($data['email'])) {
                $data['emailError'] = 'Please enter an email address.';
            } elseif (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
                $data['emailError'] = 'Please enter the correct format.';
            } else {
                if ($this->userModel->findUserByEmail($data['email'])) {
                    $data['emailError'] = 'Email is already taken.';
                }
            }

            if (empty($data['password'])) {
                $data['passwordError'] = 'Please enter a password.';
            } elseif (strlen($data['password']) < 6) {
                $data['passwordError'] = 'Password must be at least 6 characters.';
            }

            if (empty($data['confirmPassword'])) {
                $data['confirmPasswordError'] = 'Please confirm password.';
            } else {
                if ($data['password'] != $data['confirmPassword']) {
                    $data['confirmPasswordError'] = 'Passwords do not match.';
                }
            }

            if (empty($data['usernameError']) && empty($data['emailError']) && empty($data['passwordError']) && empty($data['confirmPasswordError'])) {
                $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);

                if ($this->userModel->register($data)) {
                    $_SESSION['register_msg'] = 'Registration successful! Please login.';
                    redirect('users/login');
                } else {
                    die('Something went wrong.');
                }
            }
        }
        $this->view('users/register', $data);
    }

    public function login()
    {
        if (isLoggedIn()) {
            redirect('pages/index');
        }

        $data = [
            'username' => '',
            'password' => '',
            'usernameError' => '',
            'passwordError' => ''
        ];

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $data = [
                'username' => trim($_POST['username'] ?? ''),
                'password' => trim($_POST['password'] ?? ''),
                'usernameError' => '',
                'passwordError' => ''
            ];

            if (empty($data['username'])) {
                $data['usernameError'] = 'Please enter username or email.';
            }

            if (empty($data['password'])) {
                $data['passwordError'] = 'Please enter password.';
            }

            if (empty($data['usernameError']) && empty($data['passwordError'])) {
                $loggedInUser = $this->userModel->login($data['username'], $data['password']);

                if ($loggedInUser) {
                    $this->createUserSession($loggedInUser);
                } else {
                    $data['passwordError'] = 'Password or username is incorrect. Please try again.';
                }
            }
        }
        $this->view('users/login', $data);
    }

    public function profile()
    {
        if (!isLoggedIn()) {
            redirect('users/login');
        }

        $user = $this->userModel->getUserById($_SESSION['user_id']);
        if (!$user) {
            die('User not found.');
        }

        $data = [
            'user' => $user
        ];

        $this->view('users/profile', $data);
    }

    public function edit()
    {
        if (!isLoggedIn()) {
            redirect('users/login');
        }

        $user = $this->userModel->getUserById($_SESSION['user_id']);
        if (!$user) {
            die('User retrieve failed.');
        }

        $data = [
            'username' => $user->username,
            'email' => $user->email,
            'password' => '',
            'confirmPassword' => '',
            'usernameError' => '',
            'passwordError' => '',
            'confirmPasswordError' => ''
        ];

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $data = [
                'id' => $_SESSION['user_id'],
                'username' => trim($_POST['username'] ?? ''),
                'email' => $user->email,
                'password' => trim($_POST['password'] ?? ''),
                'confirmPassword' => trim($_POST['confirmPassword'] ?? ''),
                'usernameError' => '',
                'passwordError' => '',
                'confirmPasswordError' => ''
            ];

            $nameValidation = "/^[a-zA-Z0-9]*$/";

            if (empty($data['username'])) {
                $data['usernameError'] = 'Please enter username.';
            } elseif (!preg_match($nameValidation, $data['username'])) {
                $data['usernameError'] = 'Name can only contain letters and numbers.';
            }

            $updatePassword = false;
            if (!empty($data['password'])) {
                $updatePassword = true;
                if (strlen($data['password']) < 6) {
                    $data['passwordError'] = 'Password must be at least 6 characters.';
                }

                if (empty($data['confirmPassword'])) {
                    $data['confirmPasswordError'] = 'Please confirm password.';
                } elseif ($data['password'] != $data['confirmPassword']) {
                    $data['confirmPasswordError'] = 'Passwords do not match.';
                }
            }

            if (empty($data['usernameError']) && empty($data['passwordError']) && empty($data['confirmPasswordError'])) {
                if ($updatePassword) {
                    $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);
                } else {
                    $data['password'] = $user->password;
                }

                if ($this->userModel->update($data)) {
                    $_SESSION['username'] = $data['username'];
                    $_SESSION['user_name'] = $data['username'];
                    $_SESSION['update_msg'] = 'Profile updated successfully!';
                    redirect('users/profile');
                } else {
                    die('Something went wrong.');
                }
            }
        }

        $this->view('users/edit', $data);
    }

    public function createUserSession($user)
    {
        $_SESSION['user_id'] = $user->id;
        $_SESSION['username'] = $user->username;
        $_SESSION['user_name'] = $user->username;
        $_SESSION['email'] = $user->email;
        $_SESSION['user_email'] = $user->email;
        redirect('pages/index');
    }

    public function logout()
    {
        unset($_SESSION['user_id']);
        unset($_SESSION['username']);
        unset($_SESSION['user_name']);
        unset($_SESSION['email']);
        unset($_SESSION['user_email']);
        session_destroy();
        redirect('users/login');
    }
}
