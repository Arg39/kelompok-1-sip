<?php
class UserModel
{    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getAllUser()
    {
        $this->db->query("SELECT * FROM anggota");
        return $this->db->resultAll();
    }
    public function getAllPetugas()
    {
        $this->db->query("SELECT * FROM petugas");
        return $this->db->resultAll();
    }

    public function getUserById($id)
    {
        $query = "SELECT * FROM anggota WHERE id = :id";
        $this->db->query($query);
        $this->db->bind(':id', $id);
        return $this->db->resultSingle();
    }
    public function getPetugasById($id)
    {
        $query = "SELECT * FROM petugas WHERE id = :id";
        $this->db->query($query);
        $this->db->bind(':id', $id);
        return $this->db->resultSingle();
    }

    public function updateUser($data)
    {
        $query = "UPDATE anggota SET nama = :nama, jenis_kelamin = :jenis_kelamin, alamat = :alamat, telp = :telp WHERE id = :id";
        $this->db->query($query);
        $this->db->bind(':id', $data['id']);
        $this->db->bind(':nama', $data['nama']);
        $this->db->bind(':jenis_kelamin', $data['jenis_kelamin']);
        $this->db->bind(':alamat', $data['alamat']);
        $this->db->bind(':telp', $data['telp']);
        $this->db->execute();
        return $this->db->rowCount();
    }
    public function updatePetugas($data)
    {
        $query = "UPDATE petugas SET username = :username, password = :password, nama = :nama, telp = :telp, alamat = :alamat WHERE id = :id";
        $this->db->query($query);
        $this->db->bind(':id', $data['id']);
        $this->db->bind(':username', $data['username']);
        $this->db->bind(':password', $data['password']);
        $this->db->bind(':nama', $data['nama']);
        $this->db->bind(':telp', $data['telp']);
        $this->db->bind(':alamat', $data['alamat']);
        $this->db->execute();
        return $this->db->rowCount();
    }
    public function deleteUser($id)
    {
        $query = "DELETE FROM anggota WHERE id = :id";
        $this->db->query($query);
        $this->db->bind(':id', $id);
        $this->db->execute();
        return $this->db->rowCount();
    }
    public function deletePetugas($id)
    {
        $query = "DELETE FROM petugas WHERE id = :id";
        $this->db->query($query);
        $this->db->bind(':id', $id);
        $this->db->execute();
        return $this->db->rowCount();
    }

    public function tambahUser($data)
    {
        $query = "INSERT INTO anggota (nama, jenis_kelamin, alamat, telp) VALUES (:nama, :jenis_kelamin, :alamat, :telp)";

        $this->db->query($query);
        $this->db->bind(':nama', $data['nama']);
        $this->db->bind(':jenis_kelamin', $data['jenis_kelamin']);
        $this->db->bind(':alamat', $data['alamat']);
        $this->db->bind(':telp', $data['telp']);

        $this->db->execute();

        return $this->db->rowCount();
    }
    public function tambahPetugas($data)
    {
        // Periksa apakah username sudah ada
        $queryCheckUsername = "SELECT * FROM petugas WHERE username = :username";
        $this->db->query($queryCheckUsername);
        $this->db->bind(':username', $data['username']);
        $this->db->execute();

        if ($this->db->rowCount() > 0) {
            return 0; 
        }

        $query = "INSERT INTO petugas (username, password, nama, telp, alamat, role) VALUES (:username, :password, :nama, :telp, :alamat, :role)";

        $this->db->query($query);
        $this->db->bind(':username', $data['username']);
        $this->db->bind(':password', $data['password']);
        $this->db->bind(':nama', $data['nama']);
        $this->db->bind(':telp', $data['telp']);
        $this->db->bind(':alamat', $data['alamat']);
        $this->db->bind(':role', $data['role']);

        $this->db->execute();

        return $this->db->rowCount();
    }

    public function searchUsers()
    {
        $keyword = $_POST['keyword'];
        $query = "SELECT * FROM anggota WHERE 
              nama LIKE :keyword OR 
              jenis_kelamin LIKE :keyword OR 
              alamat LIKE :keyword OR 
              telp LIKE :keyword";
        $this->db->query($query);
        $this->db->bind(':keyword', "%$keyword%");
        return $this->db->resultAll();
    }
    public function searchPetugas()
    {
        $keyword = $_POST['keyword'];
        $query = "SELECT * FROM petugas WHERE 
              username LIKE :keyword OR 
              nama LIKE :keyword OR 
              alamat LIKE :keyword OR 
              telp LIKE :keyword";
        $this->db->query($query);
        $this->db->bind(':keyword', "%$keyword%");
        return $this->db->resultAll();
    }
}
