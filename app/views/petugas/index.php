<div class="container">
    <div class="row">
        <div class="col-lg-12 mt-2" style="min-height: 480px;">
            <div class="card">
                <?php
                $this->flash->getFlashMessage();
                ?>
                <div class="card-header">
                    Data Petugas
                </div>
                <div class="card-body">
                    <div class="row">
                        <?php if ($_SESSION['user']['role'] === 'super_admin') : ?>
                            <div class="col">
                                <a href="<?= BASE_URL; ?>user/tambahptgs" class="btn btn-primary">Tambah data</a>
                            </div>
                        <?php endif; ?>
                        <div class="col">
                            <form class="form-inline float-end d-flex align-items-center" method="POST" action="<?= BASE_URL; ?>user/searchpetugas">
                                <input type="text" class="form-control" style="max-width: 300px;" name="keyword" id="keyword" placeholder="Cari data petugas">
                                <input type="submit" class="btn btn-primary" name="cari" id="tombolCari" value="Cari">
                            </form>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col">
                            <table class="table table-bordered table-striped">
                                <thead style="background-color: brown;">
                                    <tr>
                                        <th>No</th>
                                        <th>Nama</th>
                                        <th>Username</th>
                                        <th>Alamat</th>
                                        <th>Telp</th>
                                        <?php if ($_SESSION['user']['role'] === 'super_admin') : ?>
                                            <th>Password</th>
                                        <?php endif; ?>
                                        <?php if ($_SESSION['user']['role'] === 'super_admin') : ?>
                                            <th>Aksi</th>
                                        <?php endif; ?>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 0;
                                    foreach ($data['petugas'] as $petugas) :
                                        $no++;
                                    ?>
                                        <tr>
                                            <td><?php echo $no; ?></td>
                                            <td><?php echo $petugas['nama']; ?></td>
                                            <td><?php echo $petugas['username']; ?></td>
                                            <td><?php echo $petugas['alamat']; ?></td>
                                            <td><?php echo $petugas['telp']; ?></td>
                                            <?php if ($_SESSION['user']['role'] === 'super_admin') : ?>
                                                <td><?= $petugas['password']; ?></td>
                                            <?php endif; ?>
                                            <?php if ($_SESSION['user']['role'] === 'super_admin') : ?>
                                                <td>
                                                    <a href="<?= BASE_URL; ?>user/editpetugas/<?= $petugas['id']; ?>" class="badge bg-primary ms-2"><i class="bi bi-pencil-square"></i></a>
                                                    <a href="<?= BASE_URL; ?>user/deletepetugas/<?= $petugas['id']; ?>" class="badge bg-danger ms-2" onclick="return confirm('yakin?');"><i class="bi bi-trash"></i></a>
                                                </td>
                                            <?php endif; ?>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>