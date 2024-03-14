<?php
class Rak extends Controller
{
    public function index() {
        $data = [
            'title' => 'Rak | Perpusku',
            'rak' => $this->model('RakModel')->getAllRak()
        ];
        return $this->view('templates/header', $data)
        . $this->view('rak/index', $data)
        . $this->view('templates/footer', $data);
    }
}
