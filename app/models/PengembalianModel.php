<?php

class PengembalianModel
{
    private $table = 'peminjaman';
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getAllPeminjaman()
    {
        $this->db->query('SELECT p.*, a.nama AS nama_anggota, pt.nama AS nama_petugas 
                         FROM ' . $this->table . ' p
                         JOIN anggota a ON p.anggota_id = a.id
                         JOIN petugas pt ON p.petugas_id = pt.id');
        return $this->db->resultAll();
    }
    public function insertPengembalian($id_peminjaman, $id_anggota)
    {
        $query = "INSERT INTO pengembalian (tanggal_pengembalian, peminjaman_id, anggota_id, petugas_id)
                VALUES (:tanggal_pengembalian, :peminjaman_id, :anggota_id, :petugas_id);

                DELETE FROM peminjaman WHERE id = :peminjaman_id;
                DELETE FROM trans_peminjaman WHERE peminjaman_id = :peminjaman_id;
                ";

        $this->db->query($query);
        $this->db->bind(':tanggal_pengembalian', date("Y-m-d")); // Corrected binding
        $this->db->bind(':peminjaman_id', $id_peminjaman);
        $this->db->bind(':anggota_id', $id_anggota);
        $this->db->bind(':petugas_id', $_SESSION['user']['id']);
        $this->db->execute();

        return $this->db->rowCount();
    }

}
