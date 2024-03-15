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

    // Tambah Data Rak Buku
    public function tambah() {
        $data = [
            'kode' => $_POST['kode'],
            'lokasi' => $_POST['lokasi']
        ];
        if ($this->model('RakModel')->tambahDataRak($data) > 0) {
            $this->flash->setFlashMessage('berhasil', 'ditambahkan', 'success');
            header('Location: ' . BASE_URL . 'rak');
            exit;
        } else {
            $this->flash->setFlashMessage('gagal', 'ditambahkan', 'danger');
            header('Location: ' . BASE_URL . 'rak');
            exit;
        }
    }
}
