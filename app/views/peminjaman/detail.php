<div class="container mt-3">
    <div class="row">
        <div class="col-12">
            <h3>Detail Peminjaman</h3>
            <table class="table table-bordered">
                <tr class="text-center">
                    <th width="45%">
                        Detail Peminjaman
                    </th>
                    <th>
                        Data
                    </th>
                </tr>
                <tr>
                    <td>ID Peminjaman</td>
                    <td>
                        <?= $data['detaildata']['id_peminjaman']; ?>
                    </td>
                </tr>
                <tr>
                    <td>Nama Peminjam</td>
                    <td>
                        <?= $data['detaildata']['nama']; ?>
                    </td>
                </tr>
                <tr>
                    <td>Tanggal Pinjam</td>
                    <td>
                        <?= $data['detaildata']['tanggal_pinjam']; ?>
                    </td>
                </tr>
                <tr>
                    <td>Tanggal Kembali</td>
                    <td>
                        <?= $data['detaildata']['tanggal_kembali']; ?>
                    </td>
                </tr>
                <tr>
                    <td>Judul Buku Yang Dipinjam</td>
                    <td>
                        <ul>
                            <?php foreach ($data['bukuDiPinjam'] as $buku): ?>
                                <li>
                                    <?= $buku['judul']; ?> --- ID Buku :
                                    <?= $buku['id']; ?>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    </td>
                </tr>
                <tr>
                    <td>Gambar Buku</td>
                    <td>
                        <div class="d-flex flex-row gap-1">
                            <?php foreach ($data['bukuDiPinjam'] as $buku): ?>
                                <div class="card h-100" style="width: 100px;">
                                    <img src="<?= BASE_URL; ?>uploads/<?= $buku['gambar']; ?>"
                                        class="card-img-top" alt="...">
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </td>
                </tr>
            </table>
            <!-- Back button -->
            <a href="<?= BASE_URL; ?>peminjaman" class="btn btn-primary">Kembali</a>
        </div>
    </div>
</div>