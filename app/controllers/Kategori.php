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
            header('Location:' . BASE_URL . 'kategori');
            exit;
        }
    }
}
