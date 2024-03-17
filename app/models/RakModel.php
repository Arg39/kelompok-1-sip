<?php
class RakModel
{
    private $table = 'rak';
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    // getAllRak
    public function getAllRak()
    {
        $this->db->query('SELECT * FROM ' . $this->table);
        return $this->db->resultAll();
    }

    // getRakByKode
    public function getRakByKode($kode)
    {
        $this->db->query('SELECT * FROM ' . $this->table . ' WHERE kode=:kode');
        $this->db->bind('kode', $kode);
        return $this->db->resultSingle();
    }
    
    // tambahDataRak
    public function tambahDataRak($data)
    {
        $query = "INSERT INTO rak VALUES (:kode, :lokasi)";
        $this->db->query($query);
        $this->db->bind('kode', $data['kode']);
        $this->db->bind('lokasi', $data['lokasi']);
        $this->db->execute();
        return $this->db->rowCount();
    }

    // updateDataRak
    public function updateDataRak($data)
    {
        $query = "UPDATE rak SET lokasi=:lokasi WHERE kode=:kode";
        $this->db->query($query);
        $this->db->bind('kode', $data['kode']);
        $this->db->bind('lokasi', $data['lokasi']);
        $this->db->execute();
        return $this->db->rowCount();
    }

    // hapusDataRak
    public function hapusDataRak($kode)
    {
        $query = "DELETE FROM rak WHERE kode=:kode";
        $this->db->query($query);
        $this->db->bind('kode', $kode);
        $this->db->execute();
        return $this->db->rowCount();
    }
}
