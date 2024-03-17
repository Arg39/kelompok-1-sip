<?php

class Peminjaman extends Controller {
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
        $this->view('peminjaman/index', $data);
        $this->view('templates/footer');
    }

    public function tambah()
    {
        if( $this->model('PeminjamanModel')->tambah($_POST) > 0 ){
            Flasher::setFlash('berhasil', 'ditambahkan', 'success');
            header('Location: ' . BASE_URL . 'peminjaman');
            exit;
    }
    }

    public function fromtambah()
    {
        $data = [
            'title' => 'Tambah Data Peminjaman',
            'anggota' => $this->model('UserModel')->getAllUser(),
            'petugas' => $this->model('UserModel')->getAllPetugas(),
            'buku' => $this->model('BukuModel')->getAllBuku(),
        ];
       
        $this->view('templates/header', $data);
        $this->view('peminjaman/tambah_data', $data);
        $this->view('templates/footer');
    }

    public function fromubah($id)
    {
        $data = [
            'title' => 'Ubah Data Peminjaman',
            'ubahdata' => $this->model('PeminjamanModel')->ubah($id),
            'anggota' => $this->model('UserModel')->getAllUser(),
            'petugas' => $this->model('UserModel')->getAllPetugas(),
            'buku' => $this->model('BukuModel')->getAllBuku(),
            'bukuDipinjam' => $this->model('TransPeminjamanModel')->getBukuDipinjam($id),
        ];

        $this->view('templates/header', $data);
        $this->view('peminjaman/ubah_data', $data);
        $this->view('templates/footer');
    }
    
    public function prosesubah()
    {
        if( $this->model('PeminjamanModel')->prosesubah($_POST) > 0 ){
            Flasher::setFlash('berhasil', 'ditambahkan', 'success');
            header('Location: ' . BASE_URL . 'peminjaman');
            exit;
    }
    }

    public function hapus($id)
    {
        if( $this->model('PeminjamanModel')->hapusDataPeminjaman($id) > 0 ){
            Flasher::setFlash('berhasil', 'dihapus', 'success');
            header('Location: ' . BASE_URL . 'peminjaman');
            exit;
        }
    }

    public function fromdetail($id)
    {
        $data['title'] = 'Detail Peminjaman';
        $data['detaildata'] = $this->model('TransPeminjamanModel')->getDetailPeminjaman($id);
    
        $this->view('templates/header', $data);
        $this->view('peminjaman/detail', $data);
        $this->view('templates/footer');
    }
}

