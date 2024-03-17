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

    // GenerateKodeRak
    public function generateKodeRak()
    {
        $this->db->query('SELECT MAX(kode) as kode FROM ' . $this->table);
        $kode = $this->db->resultSingle();
        $noUrut = (int) substr($kode['kode'], 1, 3);
        $noUrut++;
        $char = "R";
        $kodeRak = $char . sprintf("%03s", $noUrut);
        return $kodeRak;
    }
    
    // tambahDataRak
    public function tambahDataRak($data)
    {
        $this->db->query('SELECT * FROM ' . $this->table . ' WHERE lokasi=:lokasi');
        $this->db->bind('lokasi', $data['lokasi']);
        $this->db->execute();
        if ($this->db->rowCount() > 0) {
            return 0;
        } else {
            $query = "INSERT INTO rak VALUES (:kode, :lokasi)";
            $this->db->query($query);
            $this->db->bind('kode', $data['kode']);
            $this->db->bind('lokasi', $data['lokasi']);
            $this->db->execute();
            return $this->db->rowCount();
        }
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
