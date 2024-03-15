<?php
class BukuModel
{
    private $table = 'buku';
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    // getAllBuku with join table kategori & rak
    public function getAllBuku()
    {
        $this->db->query('SELECT buku.*, kategori.nama_kategori as kategori, rak.lokasi as lokasi FROM ' . $this->table . ' INNER JOIN kategori ON buku.id_kategori = kategori.id INNER JOIN rak ON buku.kode_rak = rak.kode');
        return $this->db->resultAll();
    }
}
