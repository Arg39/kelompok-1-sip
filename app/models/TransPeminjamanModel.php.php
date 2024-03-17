<?php
class TransPeminjamanModel {
    private $table = 'trans_peminjaman';
    private $db ;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getDetailBuku($id_buku)
{
    $this->db->query('SELECT * FROM trans_peminjaman WHERE id = :id_buku');
    $this->db->bind(':id_buku', $id_buku);
    return $this->db->resultSingle();
}

public function getDetailPeminjaman($id)
{
    $this->db->query('SELECT p.id_peminjaman, t.id AS id_buku, t.judul FROM trans_peminjaman AS p INNER JOIN buku AS t ON p.id_buku = t.id WHERE p.id_peminjaman = :id');
    $this->db->bind(':id', $id);
    return $this->db->resultSingle();
}

}
?>
