<?php
class Login extends Controller
{
    public function index()
    {
        // Check if user is already logged in
        if (isset ($_SESSION['user'])) {
            header('Location: ' . BASE_URL . 'home');
            exit;
        } else {
            $data['title'] = 'Login | Perpusku';
            $this->view('login/index', $data);
        }
    }
}
