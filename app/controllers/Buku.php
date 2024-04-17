<?php
class Buku extends Controller
{
    public function index()
    {
        if (!isset($_SESSION['user'])) {
            header("Location: " . BASE_URL . "login");
            exit();
        }
        $data = [
            'title' => 'Buku | Perpusku',
            'buku' => $this->model('BukuModel')->getAllBuku(),
            'kategori' => $this->model('KategoriModel')->getCategory(),
            'rak' => $this->model('RakModel')->getAllRak()
        ];
        return $this->view('templates/header', $data)
            . $this->view('buku/index', $data)
            . $this->view('templates/footer', $data);
    }

    // Tambah Data Buku
    public function tambah()
    {
        $gambar = $_FILES['gambar']['name'];
        $gambar_tmp = $_FILES['gambar']['tmp_name'];
        $basepath = 'uploads/';

        // Check if the uploaded file is an image
        $image_info = getimagesize($gambar_tmp);
        if (!$image_info) {
            $this->flash->setFlashMessage('gagal', 'ditambahkan, file yang diupload bukan gambar', 'danger');
            header('Location: ' . BASE_URL . 'buku');
            exit;
        }

        // Random the image name
        $gambar = uniqid() . '-' . $gambar;

        // Move the uploaded image to a desired location
        move_uploaded_file($gambar_tmp, $basepath . $gambar);

        $data = [
            'judul' => $_POST['judul'],
            'pengarang' => $_POST['pengarang'],
            'jumlah' => $_POST['jumlah'],
            'penerbit' => $_POST['penerbit'],
            'tahun_terbit' => $_POST['tahun_terbit'],
            'isbn' => $_POST['isbn'],
            'id_kategori' => $_POST['id_kategori'],
            'kode_rak' => $_POST['kode_rak'],
            'gambar' => $gambar
        ];

        if ($this->model('BukuModel')->tambahDataBuku($data) > 0) {
            $this->flash->setFlashMessage('berhasil', 'ditambahkan', 'success');
            header('Location: ' . BASE_URL . 'buku');
            exit;
        } else {
            $this->flash->setFlashMessage('gagal', 'ditambahkan', 'danger');
            header('Location: ' . BASE_URL . 'buku');
            exit;
        }
    }

    // Delete Data Buku and remove the image from the uploads folder
    public function delete($id)
    {
        $buku = $this->model('BukuModel')->getBukuById($id);
        $gambar = $buku['gambar'];
        $basepath = 'uploads/';

        if ($this->model('BukuModel')->deleteDataBuku($id) > 0) {
            unlink($basepath . $gambar);
            $this->flash->setFlashMessage('berhasil', 'dihapus', 'success');
            header('Location: ' . BASE_URL . 'buku');
            exit;
        } else {
            $this->flash->setFlashMessage('gagal', 'dihapus', 'danger');
            header('Location: ' . BASE_URL . 'buku');
            exit;
        }
    }

    // Detail Data Buku
    public function detail()
    {
        echo json_encode($this->model('BukuModel')->getBukuByIdJoin($_POST['id']));
    }

    // Edit Data Buku
    public function edit()
    {
        echo json_encode($this->model('BukuModel')->getBukuByIdJoin($_POST['id']));
    }

    // Update Data Buku
    public function update()
    {
        // Check if the image changed
        if ($_FILES['gambar']['error'] === 4) {
            $gambar = $_POST['gambar_lama'];
        } else {
            $gambar = $_FILES['gambar']['name'];
            $gambar_tmp = $_FILES['gambar']['tmp_name'];
            $basepath = 'uploads/';

            // Check if the uploaded file is an image
            $image_info = getimagesize($gambar_tmp);
            if (!$image_info) {
                $this->flash->setFlashMessage('gagal', 'diupdate, file yang diupload bukan gambar', 'danger');
                header('Location: ' . BASE_URL . 'buku');
                exit;
            }

            // Random the image name
            $gambar = uniqid() . '-' . $gambar;

            // Move the uploaded image to a desired location
            move_uploaded_file($gambar_tmp, $basepath . $gambar);

            // Remove the old image
            unlink($basepath . $_POST['gambar_lama']);
        }
        $data = [
            'id' => $_POST['id'],
            'judul' => $_POST['judul'],
            'pengarang' => $_POST['pengarang'],
            'jumlah' => $_POST['jumlah'],
            'penerbit' => $_POST['penerbit'],
            'tahun_terbit' => $_POST['tahun_terbit'],
            'isbn' => $_POST['isbn'],
            'id_kategori' => $_POST['id_kategori'],
            'kode_rak' => $_POST['kode_rak'],
            'gambar' => $gambar
        ];

        if ($this->model('BukuModel')->updateDataBuku($data) > 0) {
            $this->flash->setFlashMessage('berhasil', 'diupdate', 'success');
            header('Location: ' . BASE_URL . 'buku');
            exit;
        } else {
            $this->flash->setFlashMessage('gagal', 'diupdate', 'danger');
            header('Location: ' . BASE_URL . 'buku');
            exit;
        }
    }

    // Search Data Buku return json
    public function search()
    {
        echo json_encode($this->model('BukuModel')->searchBuku($_POST['keyword']));
    }
}