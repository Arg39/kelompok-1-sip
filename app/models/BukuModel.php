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

    // getBukuById
    public function getBukuById($id)
    {
        $this->db->query('SELECT * FROM ' . $this->table . ' WHERE id=:id');
        $this->db->bind('id', $id);
        return $this->db->resultSingle();
    }

    // tambahDataBuku
    public function tambahDataBuku($data)
    {
        $query = "INSERT INTO buku VALUES (:id, :judul, :pengarang, :jumlah, :penerbit, :tahun_terbit, :isbn, :id_kategori, :kode_rak, :gambar)";
        $this->db->query($query);
        $this->db->bind('id', null);
        $this->db->bind('judul', $data['judul']);
        $this->db->bind('pengarang', $data['pengarang']);
        $this->db->bind('jumlah', $data['jumlah']);
        $this->db->bind('penerbit', $data['penerbit']);
        $this->db->bind('tahun_terbit', $data['tahun_terbit']);
        $this->db->bind('isbn', $data['isbn']);
        $this->db->bind('id_kategori', $data['id_kategori']);
        $this->db->bind('kode_rak', $data['kode_rak']);
        $this->db->bind('gambar', $data['gambar']);
        $this->db->execute();
        return $this->db->rowCount();
    }

    // Delete Data Buku
    public function deleteDataBuku($id)
    {
        $query = "DELETE FROM buku WHERE id = :id";
        $this->db->query($query);
        $this->db->bind('id', $id);
        $this->db->execute();
        return $this->db->rowCount();
    }
}
