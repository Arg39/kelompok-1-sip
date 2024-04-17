<?php

class Pengembalian extends Controller {
    protected $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function index()
    {
        if (!isset($_SESSION['user'])) {
            header("Location: " . BASE_URL . "login");
            exit();
        }
        $data = [
            'title' => 'Data Peminjaman',
            'pinjam' => $this->model('PeminjamanModel')->getAllPeminjaman(),
        ];
        $this->view('templates/header', $data);
        $this->view('pengembalian/index', $data);
        $this->view('templates/footer');
    }

    public function kembalikan($id_peminjaman,$id_anggota)
    {
        if( $this->model('PengembalianModel')->insertPengembalian($id_peminjaman, $id_anggota) > 0 ){
            Flasher::setFlash('berhasil', 'ditambahkan', 'success');
            header('Location: ' . BASE_URL . 'pengembalian');
            exit;
        }
    }
}