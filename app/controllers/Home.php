<?php
class Home extends Controller
{
    public function index() {
        if (!isset($_SESSION['user'])) {
            header("Location: " . BASE_URL . "login");
            exit();
        }
        $data = [
            'title' => 'Home | Perpusku',
        ];

        return $this->view('templates/header', $data)
        . $this->view('home/index', $data)
        . $this->view('templates/footer', $data);
    }
}
