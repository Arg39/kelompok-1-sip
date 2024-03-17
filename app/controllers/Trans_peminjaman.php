<?php

class Trans_peminjaman extends Controller {
    protected $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function fromdetail($id)
    {
        $data['title'] = 'detail Data  Peminjaman';
        $data['detaildata'] = $this->model('TransPeminjamanModel')->getDetailPeminjaman($id);
        $this->view('templates/header', $data);
        $this->view('peminjaman/detail', $data);
        $this->view('templates/footer');
        $this->view('templates/navbar', $data);
    }
}