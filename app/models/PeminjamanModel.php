<?php

class PeminjamanModel
{
    private $table = 'peminjaman';
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getAllPeminjaman()
    {
        $this->db->query('SELECT * FROM ' . $this->table);
        return $this->db->resultAll();
    }
    public function ubah($id)
    {
        $this->db->query("SELECT * FROM peminjaman WHERE id =:id");
        $this->db->bind('id', $id);
        return $this->db->resultAll();
    }

    public function getPeminjamanById($id)
    {
        $this->db->query('SELECT * FROM ' . $this->table . ' WHERE id=:id');
        $this->db->bind(':id', $id);
        return $this->db->resultSingle();
    }
    public function tambah($data)
    {
        $query = "INSERT INTO peminjaman (tanggal_pinjam, tanggal_kembali, anggota_id, petugas_id)
              VALUES (:tanggal_pinjam, :tanggal_kembali, :anggota_id, :petugas_id)";

        $this->db->query($query);
        $this->db->bind(':tanggal_pinjam', $data['tanggal_pinjam']);
        $this->db->bind(':tanggal_kembali', $data['tanggal_kembali']);
        $this->db->bind(':anggota_id', $data['anggota_id']);
        $this->db->bind(':petugas_id', $data['petugas_id']);

        $this->db->execute();

        $id_peminjaman = $this->db->getLastInsertedId();

        $id_buku_unik = array_unique($data['id_buku']);

        foreach ($id_buku_unik as $id_buku) {
            $query = "INSERT INTO trans_peminjaman (id_peminjaman, id_buku)
                  VALUES (:id_peminjaman, :id_buku)";
            $this->db->query($query);
            $this->db->bind(':id_peminjaman', $id_peminjaman);
            $this->db->bind(':id_buku', $id_buku);
            $this->db->execute();
        }

        return $this->db->rowCount();
    }


    public function hapusDataPeminjaman($id)
    {
        $queryDeleteTransaksi = "DELETE FROM trans_peminjaman WHERE id_peminjaman = :id";
        $this->db->query($queryDeleteTransaksi);
        $this->db->bind(':id', $id);
        $this->db->execute();

        $queryDeletePeminjaman = "DELETE FROM peminjaman WHERE id = :id";
        $this->db->query($queryDeletePeminjaman);
        $this->db->bind(':id', $id);
        $this->db->execute();

        return $this->db->rowCount();
    }


    public function prosesubah($data)
    {
        $query = "UPDATE peminjaman SET
                tanggal_pinjam = :tanggal_pinjam, 
                tanggal_kembali = :tanggal_kembali, 
                anggota_id = :anggota_id, 
                petugas_id = :petugas_id
                WHERE id = :id";

        $this->db->query($query);
        $this->db->bind('tanggal_pinjam', $data['tanggal_pinjam']);
        $this->db->bind('tanggal_kembali', $data['tanggal_kembali']);
        $this->db->bind('anggota_id', $data['anggota_id']);
        $this->db->bind('petugas_id', $data['petugas_id']);
        $this->db->bind('id', $data['id']);

        $this->db->execute();

        $queryDelete = "DELETE FROM trans_peminjaman
                     WHERE id_peminjaman = :id_peminjaman";
        $this->db->query($queryDelete);
        $this->db->bind('id_peminjaman', $data['id']);
        $this->db->execute();

        foreach ($data['id_buku'] as $id_buku) {
            $queryInsert = "INSERT INTO trans_peminjaman (id_peminjaman, id_buku) 
                        VALUES (:id_peminjaman, :id_buku)";
            $this->db->query($queryInsert);
            $this->db->bind(':id_peminjaman', $data['id']);
            $this->db->bind(':id_buku', $id_buku);
            $this->db->execute();
        }

        return $this->db->rowCount();
    }


}
