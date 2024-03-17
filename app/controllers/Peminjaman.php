<?php

class Peminjaman extends Controller {
    protected $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function index()
    {
        $data['title'] = 'Daftar Peminjaman';
        $data['pinjam'] = $this->model('Peminjaman_model')->getAllPeminjaman();
        $this->view('templates/header', $data);
        $this->view('peminjaman/index', $data);
        $this->view('templates/footer');
        $this->view('templates/navbar', $data);
    }

    public function tambah()
    {
        if( $this->model('Peminjaman_model')->tambah($_POST) > 0 ){
            Flasher::setFlash('berhasil', 'ditambahkan', 'success');
            header('Location: ' . BASE_URL . '/peminjaman');
            exit;
    }
    }

    public function fromtambah()
    {
        $data['title'] = 'Tambah Data  Peminjaman';
       
        $this->view('templates/header', $data);
        $this->view('peminjaman/tambah_data', $data);
        $this->view('templates/footer');
        $this->view('templates/navbar', $data);
    }

    public function fromubah($id)
    {
        $data['title'] = 'Ubah Data  Peminjaman';
        $data['ubahdata'] = $this->model('Peminjaman_model')->ubah($id);
        $this->view('templates/header', $data);
        $this->view('peminjaman/ubah_data', $data);
        $this->view('templates/footer');
        $this->view('templates/navbar', $data);
    }
    
    public function prosesubah()
    {
        if( $this->model('Peminjaman_model')->prosesubah($_POST) > 0 ){
            Flasher::setFlash('berhasil', 'ditambahkan', 'success');
            header('Location: ' . BASE_URL . '/Peminjaman');
            exit;
    }
    }

    public function hapus($id)
    {
        if( $this->model('Peminjaman_model')->hapusDataPeminjaman($id) > 0 ){
            Flasher::setFlash('berhasil', 'dihapus', 'success');
            header('Location: ' . BASE_URL . '/peminjaman');
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

