<?php
class User extends Controller
{
    public function index()
    {
        if (!isset($_SESSION['user'])) {
            header("Location: " . BASE_URL . "login");
            exit();
        }
        $data['title'] = "Data User";
        $data['users'] = $this->model("UserModel")->getAllUser();
        $this->view('templates/header', $data);
        $this->view('user/index', $data);
        $this->view('templates/footer');
    }
    public function petugas()
    {
        if (!isset($_SESSION['user'])) {
            header("Location: " . BASE_URL . "login");
            exit();
        }
        $data['title'] = "Data Petugas";
        $data['petugas'] = $this->model("UserModel")->getAllPetugas();
        $this->view('templates/header', $data);
        $this->view('petugas/index', $data);
        $this->view('templates/footer');
    }
    public function edit($id)
    {
        $data["title"] = "Edit Data Anggota";

        $data['user'] = $this->model('UserModel')->getUserById($id);
        $this->view("templates/header", $data);
        $this->view("user/edit", $data);
        $this->view("templates/footer");
    }
    public function editpetugas($id)
    {
        $data["title"] = "Edit Data Petugas";

        $data['petugas'] = $this->model('UserModel')->getPetugasById($id);
        $this->view("templates/header", $data);
        $this->view("petugas/edit", $data);
        $this->view("templates/footer");
    }
    public function tambah()
    {
        $data["title"] = "Tambah Data Anggota";
        $this->view("templates/header", $data);
        $this->view("user/tambah", $data);
        $this->view("templates/footer");
    }
    public function tambahptgs()
    {
        $data["title"] = "Tambah Data Petugas";
        $this->view("templates/header", $data);
        $this->view("petugas/tambah", $data);
        $this->view("templates/footer");
    }

    public function ubah()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $dataPost = [
                'id' => $_POST['id'],
                'nama' => $_POST['nama'],
                'jenis_kelamin' => $_POST['jenis_kelamin'],
                'alamat' => $_POST['alamat'],
                'telp' => $_POST['telp']
            ];

            if ($this->model('UserModel')->updateUser($dataPost) > 0) {
                // Jika perubahan berhasil, set pesan flash berhasil
                $this->flash->setFlashMessage('berhasil', 'diedit', 'success');
            } else {
                // Jika perubahan gagal, set pesan flash gagal
                $this->flash->setFlashMessage('gagal', 'diedit', 'danger');
            }

            header('Location: ' . BASE_URL . 'user/index');
            exit;
        }
    }
    public function ubahpetugas()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $dataPost = [
                'id' => $_POST['id'],
                'nama' => $_POST['nama'],
                'username' => $_POST['username'],
                'alamat' => $_POST['alamat'],
                'telp' => $_POST['telp'],
                'password' => $_POST['password']
            ];

            if ($this->model('UserModel')->updatePetugas($dataPost) > 0) {
                // Jika perubahan berhasil, set pesan flash berhasil
                $this->flash->setFlashMessage('berhasil', 'diedit', 'success');
            } else {
                // Jika perubahan gagal, set pesan flash gagal
                $this->flash->setFlashMessage('gagal', 'diedit', 'danger');
            }

            header('Location: ' . BASE_URL . 'user/petugas');
            exit;
        }
    }

    public function delete($id)
    {
        if ($this->model('UserModel')->deleteUser($id) > 0) {
            // Jika perubahan berhasil, set pesan flash berhasil
            $this->flash->setFlashMessage('berhasil', 'dihapus', 'success');
        } else {
            // Jika perubahan gagal, set pesan flash gagal
            $this->flash->setFlashMessage('gagal', 'dihapus', 'danger');
        }

        header('Location: ' . BASE_URL . 'user/index');
        exit;
    }
    public function deletepetugas($id)
    {
        if ($this->model('UserModel')->deletePetugas($id) > 0) {
            // Jika perubahan berhasil, set pesan flash berhasil
            $this->flash->setFlashMessage('berhasil', 'dihapus', 'success');
        } else {
            // Jika perubahan gagal, set pesan flash gagal
            $this->flash->setFlashMessage('gagal', 'dihapus', 'danger');
        }

        header('Location: ' . BASE_URL . 'user/petugas');
        exit;
    }

    public function tambahdata()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $dataPost = [
                'nama' => $_POST['nama'],
                'jenis_kelamin' => $_POST['jenis_kelamin'],
                'alamat' => $_POST['alamat'],
                'telp' => $_POST['telp']
            ];

            if ($this->model('UserModel')->tambahUser($dataPost) > 0) {
                $this->flash->setFlashMessage('berhasil', 'ditambahkan', 'success');
            } else {
                $this->flash->setFlashMessage('gagal', 'ditambahkan', 'danger');
            }
            header('Location: ' . BASE_URL . 'user/index');
            exit;
        }
    }
    public function tambahpetugas()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $dataPost = [
                'nama' => $_POST['nama'],
                'username' => $_POST['username'],
                'alamat' => $_POST['alamat'],
                'telp' => $_POST['telp'],
                'password' => $_POST['password'],
                'role' => 'user'
            ];

            $result = $this->model('UserModel')->tambahPetugas($dataPost);

            if ($result === 0) {
                // Username sudah terdaftar
                $this->flash->setFlashMessage('gagal', 'Username sudah terdaftar', 'danger');
            } elseif ($result > 0) {
                // Data petugas berhasil ditambahkan
                $this->flash->setFlashMessage('berhasil', 'ditambahkan', 'success');
            } else {
                // Gagal menambahkan data petugas
                $this->flash->setFlashMessage('gagal', 'ditambahkan', 'danger');
            }
            header('Location: ' . BASE_URL . 'user/petugas');
            exit;
        }
    }

    public function search()
    {
        $data['title'] = "Data User";
        // Panggil model untuk melakukan pencarian berdasarkan keyword
        $data['users'] = $this->model("UserModel")->searchUsers();

        // Kirim data hasil pencarian ke view
        $this->view('templates/header', $data);
        $this->view('user/index', $data);
        $this->view('templates/footer');
    }
    public function searchpetugas()
    {
        $data['title'] = "Data Petugas";
        // Panggil model untuk melakukan pencarian berdasarkan keyword
        $data['petugas'] = $this->model("UserModel")->searchPetugas();

        // Kirim data hasil pencarian ke view
        $this->view('templates/header', $data);
        $this->view('petugas/index', $data);
        $this->view('templates/footer');
    }
}
