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

        public function getCategoryId($id) {
            $this->db->query('SELECT * FROM ' . $this->table . ' WHERE id=:id');
            $this->db->bind('id', $id);
            return $this->db->resultSingle();
        }

        public function generateId() {
            do {
                $id = substr(str_shuffle("0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, 5);
                $existingId = $this->getCategoryId($id);
            } while ($existingId);
        
            return $id;
        }

        public function buatKategori($data) {
            $id = $this->generateId();
            $query = "INSERT INTO kategori VALUES
            (:id, :nama_kategori)";
            $this->db->query($query);
            $this->db->bind('id', $id);
            $this->db->bind('nama_kategori', $data['nama_kategori']);
            $this->db->execute();
            return $this->db->rowCount();
        }

        public function hapusKategori($id) {
        $query = "DELETE FROM kategori WHERE id = :id";
        
        $this->db->query($query);
        $this->db->bind('id', $id);

        $this->db->execute();

        return $this->db->rowCount();
        }


        public function ubahKategori($data) {
            $query = "UPDATE kategori SET
                    nama_kategori = :nama_kategori
                    WHERE id = :id";
            
            $this->db->query($query);
            $this->db->bind('id', $data['id']);
            $this->db->bind('nama_kategori', $data['nama_kategori']);
            
            $this->db->execute();
        
            return $this->db->rowCount();
        }

        public function cariKategori() {
            $keyword = $_POST['keyword'];
            $query = "SELECT * FROM kategori WHERE nama_kategori LIKE :keyword";
            $this->db->query($query);
            $this->db->bind('keyword', "%$keyword%");
            return $this->db->resultAll();
        }

    }