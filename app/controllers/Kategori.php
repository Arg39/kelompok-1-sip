<?php
class Kategori extends Controller
{
    public function index() {
        $data = [
            'title' => 'Kategori',
            'kategori' => $this->model('KategoriModel')->getCategory()
        ];

        return $this->view('templates/header', $data)
             . $this->view('kategori/index', $data)
             . $this->view('templates/footer', $data);
    }

    public function tambah() {
        if ($this->model('KategoriModel')->buatKategori($_POST) > 0) {
            $this->flash->setFlashMessage('berhasil', 'ditambahkan', 'success');
            header('Location:' . BASE_URL . 'kategori');
            exit;
        } else {
            $this->flash->setFlashMessage('gagal', 'ditambahkan', 'danger');
            header('Location:' . BASE_URL . 'kategori');
            exit;
        }
    }

    public function hapus($id)
    {
        if( $this->model('kategoriModel')->hapusKategori($id) > 0 ) {
            $this->flash->setFlashMessage('berhasil', 'dihapus', 'success');
            header('Location: ' . BASE_URL . 'kategori');
            exit;
        } else {
            $this->flash->setFlashMessage('gagal', 'dihapus', 'danger');
            header('Location: ' . BASE_URL . 'kategori');
            exit;
        }
    }

    public function getubah() {
        echo json_encode($this->model('kategoriModel')->getCategoryId($_POST['id']));
    }

    public function ubah() {
        if( $this->model('kategoriModel')->ubahKategori($_POST) > 0 ) {
            $this->flash->setFlashMessage('berhasil', 'diubah', 'success');
            header('Location: ' . BASE_URL . 'kategori');
            exit;
        } else {
            $this->flash->setFlashMessage('gagal', 'diubah', 'danger');
            header('Location: ' . BASE_URL . 'kategori');
            exit;
        } 
    }

    public function cari() {
        $data = [
            'title' => 'Kategori',
            'kategori' => $this->model('KategoriModel')->cariKategori()
        ];
        return $this->view('templates/header', $data)
             . $this->view('kategori/index', $data)
             . $this->view('templates/footer', $data);
    }

}
