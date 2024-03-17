<?php
class TransPeminjamanModel
{
    private $table = 'trans_peminjaman';
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getDetailBuku($id_buku)
    {
        $this->db->query('SELECT * FROM' . $this->table . 'WHERE id = :id_buku');
        $this->db->bind(':id_buku', $id_buku);
        return $this->db->resultSingle();
    }

    public function getDetailPeminjaman($id_peminjaman)
    {
        $this->db->query('SELECT trans_peminjaman.*, peminjaman.*, buku.*, anggota.* FROM ' . $this->table . ' INNER JOIN buku ON trans_peminjaman.id_buku = buku.id INNER JOIN peminjaman ON trans_peminjaman.id_peminjaman = peminjaman.id INNER JOIN anggota ON peminjaman.anggota_id = anggota.id WHERE trans_peminjaman.id_peminjaman = :id_peminjaman');
        $this->db->bind(':id_peminjaman', $id_peminjaman);
        return $this->db->resultSingle();
    }

    public function getBukuDipinjam($id_peminjaman)
    {
        $this->db->query('SELECT trans_peminjaman.*, peminjaman.*, buku.* FROM ' . $this->table . ' INNER JOIN buku ON trans_peminjaman.id_buku = buku.id INNER JOIN peminjaman ON trans_peminjaman.id_peminjaman = peminjaman.id WHERE trans_peminjaman.id_peminjaman = :id_peminjaman');
        $this->db->bind(':id_peminjaman', $id_peminjaman);
        return $this->db->resultAll();
    }
}