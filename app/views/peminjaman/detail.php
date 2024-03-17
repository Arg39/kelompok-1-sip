<form action="<?= BASE_URL ?>peminjaman/fromdetail" method="POST">
  
    <div class="container mt-3">
        <div class="row">
            <div class="col-12">
                <h3>Detail Peminjaman</h3>
                <table class="table table-bordered">
                    <tr>
                        <td>ID Peminjaman</td>
                        <td><?= $data['detaildata']['id_peminjaman']; ?></td>
                    </tr>
                    <tr>
                        <td>ID Buku</td>
                        <td><?= $data['detaildata']['id_buku']; ?></td>
                    </tr>
                    <tr>
                        <td>Judul Buku</td>
                        <td><?= $data['detaildata']['judul']; ?></td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</form>
