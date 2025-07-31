<?php

class LoginController extends Controller
{
    public function index()
    {
        $this->view('login/index'); // view login
    }

    public function auth()
    {
        $username = $_POST['username'];
        $password = $_POST['password'];

        $userModel = $this->model('UserModel');
        $user = $userModel->findUser($username, $password);

        if ($user) {
            $_SESSION['user'] = $user['username'];
            header('Location: ' . BASE_URL . '/dashboard');
            exit;
        } else {
            $_SESSION['error'] = 'Username atau password salah!';
            header('Location: ' . BASE_URL . '/login');
            exit;
        }
    }

    public function logout()
    {
        session_destroy();
        header('Location: ' . BASE_URL . '/login');
        exit;
    }
}
