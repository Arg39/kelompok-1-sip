<?php
class AuthModel {
    private $db;

    public function __construct() {
        $this->db = new Database();
    }

    public function registerUser($nama, $username, $password, $telp, $alamat, $role) {
        if ($this->isUsernameRegistered($username)) {
            return false; // username sudah terdaftar, registrasi gagal
        }
        $query = "INSERT INTO petugas (username, password, nama, telp, alamat, role) VALUES (:username, :password, :nama, :telp, :alamat, :role)";
        $this->db->query($query);
        $this->db->bind(':nama', $nama);
        $this->db->bind(':username', $username);
        $this->db->bind(':password', $password);
        $this->db->bind(':telp', $telp);
        $this->db->bind(':alamat', $alamat);
        $this->db->bind(':role', $role);

        $this->db->execute();

        return $this->db->rowCount();    
    }
    public function isSuperAdminExists() {
        $query = "SELECT * FROM petugas WHERE role = 'super_admin'";
        $this->db->query($query);
        $this->db->execute();

        return $this->db->rowCount() > 0;
    }

    public function getUserByUsername($username) {
        $query = "SELECT * FROM petugas WHERE username = :username";
        $this->db->query($query);
        $this->db->bind(':username', $username);
        return $this->db->resultSingle();
    }
    public function isUsernameRegistered($username) {
        $query = "SELECT * FROM petugas WHERE username = :username";
        $this->db->query($query);
        $this->db->bind(':username', $username);
        $this->db->execute();

        return $this->db->rowCount() > 0;
    }
}
?>