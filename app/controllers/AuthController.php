<?php
class AuthController extends Controller
{
    public function register()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $nama = $_POST['nama'];
            $username = $_POST['username'];
            $password = $_POST['password'];
            $telp = $_POST['telp'];
            $alamat = $_POST['alamat'];

            // Periksa apakah sudah ada super admin terdaftar sebelumnya
        $isSuperAdminExists = $this->model('AuthModel')->isSuperAdminExists();

        // Tetapkan peran (role) pengguna sebagai super admin jika belum ada super admin terdaftar
        $role = $isSuperAdminExists ? 'user' : 'super_admin';

            if ($this->model('AuthModel')->isUsernameRegistered($username)) {
                $this->flash->setFlashMessage('Gagal', 'Username sudah terdaftar.', 'danger');
                header("Location: " . BASE_URL . "register/index");
                exit;
            }

            if ($this->model('AuthModel')->registerUser($nama, $username, $password, $telp, $alamat, $role)) {
                $this->flash->setFlashMessage('Berhasil', 'Registrasi berhasil.', 'success');
                header("Location: " . BASE_URL . "register/index");
                exit;
            } else {
                $this->flash->setFlashMessage('Gagal', 'Registrasi gagal. Silakan coba lagi.', 'danger');
                header("Location: " . BASE_URL . "register/index");
                exit;
            }
        }
    }

    public function login()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $username = $_POST['username'];
            $password = $_POST['password'];

            $user = $this->model('AuthModel')->getUserByUsername($username);

            if ($user) {
                if ($password === $user['password']) {                     // Login berhasil, redirect ke halaman lain atau set session user
                    session_start();
                    $_SESSION['user'] = $user;
                    header("Location: " . BASE_URL . "home/index");
                    exit;
                } else {
                    // Password salah, tampilkan pesan error
                    $this->flash->setFlashMessage('Gagal', 'Password salah. Silakan coba lagi.', 'danger');
                    header("Location: " . BASE_URL . "login/index");
                    exit;
                }
            } else {
                // User tidak ditemukan, tampilkan pesan error
                $this->flash->setFlashMessage('Gagal', 'User tidak ditemukan. Silakan coba lagi.', 'danger');
                header("Location: " . BASE_URL . "login/index");
                exit;
            }
        }
    }

    public function logout()
    {
        session_start();
        session_unset();
        session_destroy();

        header("Location: " . BASE_URL . "login/index");
        exit;
    }
}
