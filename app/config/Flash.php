<?php
class Flash
{
    public function setFlashMessage($status, $pesan, $tipe)
    {
        $_SESSION['flash'] = [
            'status' => $status,
            'pesan' => $pesan,
            'tipe' => $tipe
        ];
    }

    public function getFlashMessage()
    {
        if (isset($_SESSION['flash'])) {
            echo '<div class="alert alert-' . $_SESSION['flash']['tipe'] . ' alert-dismissible fade show" role="alert">
            Data <strong>' . $_SESSION['flash']['status'] . '</strong> ' . $_SESSION['flash']['pesan'] . '
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>';
            unset($_SESSION['flash']);
        }
    }
}
