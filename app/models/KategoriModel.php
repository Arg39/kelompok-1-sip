<?php
    class KategoriModel {
        private $table = 'kategori';
        private $db;

        public function __construct() {
            $this->db = new Database;
        }

        public function getCategory() {
            $this->db->query("SELECT * FROM " . $this->table);
            return $this->db->resultAll();
        }

        public function generateId() {
            $id = substr(str_shuffle("0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, 5);
            return $id;
        }        

        public function buatKategori($data) {
            $query = "INSERT INTO kategori VALUES
            (:id, :nama_kategori)";
            $this->db->query($query);
            $id = $this->generateId();
            $this->db->bind('id', $id);
            $this->db->bind('nama_kategori', $data['nama_kategori']);
            $this->db->execute();
            return $this->db->rowCount();
        }
    }
?>
