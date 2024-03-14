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
    
    // tambahDataRak
    public function tambahDataRak($data)
    {
        $query = "INSERT INTO rak VALUES ('', :nama_rak)";
        $this->db->query($query);
        $this->db->bind('nama_rak', $data['nama_rak']);
        $this->db->execute();
        return $this->db->rowCount();
    }

    // hapusDataRak
    public function hapusDataRak($id)
    {
        $query = "DELETE FROM rak WHERE id=:id";
        $this->db->query($query);
        $this->db->bind('id', $id);
        $this->db->execute();
        return $this->db->rowCount();
    }
}
