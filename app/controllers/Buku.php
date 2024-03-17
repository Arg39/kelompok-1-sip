<?php
class Buku extends Controller
{
    public function index() {
        $data = [
            'title' => 'Buku | Perpusku',
            'buku' => $this->model('BukuModel')->getAllBuku()
        ];
        return $this->view('templates/header', $data)
        . $this->view('buku/index', $data)
        . $this->view('templates/footer', $data);
    }
}
