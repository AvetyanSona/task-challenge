<?php

use app\libraries\Controller;
use app\models\User;
use app\models\Task;

class Users extends Controller
{
    public function login()
    {
        $this->view('users/login', true);
    }

//Admin Login

    public function loginExec()
    {
        $userModel = new User;
        $data = [
            'username' => trim($_POST['username']),
            'pass' => trim($_POST['pass']),
            'error' => '',
            'username_err' => '',
        ];

        if (empty($data['username'])) {
            $data['username_err'] = 'Username is a require field';
        }
        if (empty($data['pass'])) {
            $data['error'] = 'Please, fill the password';
        } elseif (strlen($data['pass']) < 3) {
            $data['error'] = 'Password must be at least 3 symbols';
        }
        if (empty($data['username_err']) && empty($data['error'])) {
            if ($loggedInUser = $userModel->login($data)) {
                if (createUserSession($loggedInUser)) {
                    $this->redirect('/');
                }
            } else {
                $data['error'] = 'Username or Password is not correct';
                $this->redirect('login', $data);
            }
        } else {
            $this->redirect('login', $data);
        }
    }

    public function logout()
    {
        unset($_SESSION['user_id']);
        unset($_SESSION['is_admin']);
        $this->redirect('login');
    }

}