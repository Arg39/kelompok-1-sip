<style>
    .my-table thead td {
        vertical-align: middle;
    }
</style>

<div class="container mt-3">
    <div class="row">
        <div class="col-12">

            <h3>Daftar Peminjaman</h3>

        </div>
    </div>


    <div class="row ">
        <div class="col-12">

            <table class="table data-table my-table table table-bordered">
                <thead>
                    <tr>
                        <td rowspan="2" width="5%"> No</td>
                        <td rowspan="2">Tanggal Pinjam</td>
                        <td rowspan="2">Tanggal Kembali</td>
                        <td rowspan="2">Nama Peminjam</td>
                        <td rowspan="2">aksi</td>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    foreach ($data['pinjam'] as $row):
                        ?>
                        <tr>
                            <td>
                                <?= $no++; ?>
                            </td>
                            <td>
                                <?= $row['tanggal_pinjam']; ?>
                            </td>
                            <td>
                                <?= $row['tanggal_kembali']; ?>
                            </td>
                            <td>
                                <?= $row['nama_anggota']; ?>
                            </td>
                            <td>
                                <a class="btn btn-primary" href="<?= BASE_URL; ?>pengembalian/kembalikan/<?= $row['id']; ?>/<?= $row['anggota_id']; ?>" 
                                role="button">Kembalikan buku</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>