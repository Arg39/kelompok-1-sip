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
            // Get kode from RakModel with generateKodeRak method
            'kode' => $this->model('RakModel')->generateKodeRak(),
            'lokasi' => $_POST['lokasi']
        ];
        if ($this->model('RakModel')->tambahDataRak($data) > 0) {
            $this->flash->setFlashMessage('berhasil', 'ditambahkan', 'success');
            header('Location: ' . BASE_URL . 'rak');
            exit;
        } else {
            $this->flash->setFlashMessage('gagal', 'ditambahkan karena lokasi sudah tersedia', 'danger');
            header('Location: ' . BASE_URL . 'rak');
            exit;
        }
    }

    // Delete Data Rak Buku
    public function delete($kode) {
        if ($this->model('RakModel')->hapusDataRak($kode) > 0) {
            $this->flash->setFlashMessage('berhasil', 'dihapus', 'success');
            header('Location: ' . BASE_URL . 'rak');
            exit;
        } else {
            $this->flash->setFlashMessage('gagal', 'dihapus', 'danger');
            header('Location: ' . BASE_URL . 'rak');
            exit;
        }
    }

    // Get Data Rak Buku By Kode for Edit and return response to ajax
    public function edit() {
        echo json_encode($this->model('RakModel')->getRakByKode($_POST['kode']));
    }

    // Update Data Rak Buku
    public function update() {
        $data = [
            'kode' => $_POST['kode'],
            'lokasi' => $_POST['lokasi']
        ];
        if ($this->model('RakModel')->updateDataRak($data) > 0) {
            $this->flash->setFlashMessage('berhasil', 'diubah', 'success');
            header('Location: ' . BASE_URL . 'rak');
            exit;
        } else {
            $this->flash->setFlashMessage('gagal', 'diubah karena lokasi sudah tersedia', 'danger');
            header('Location: ' . BASE_URL . 'rak');
            exit;
        }
    }
}
