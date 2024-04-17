<div class="container">
    <div class="row">
        <div class="col-lg-12 mt-2" style="min-height: 480px;">
            <div class="card">
                <?php
                $this->flash->getFlashMessage();
                ?>
                <div class="card-header">
                    Data User
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            <a href="<?= BASE_URL; ?>user/tambah" class="btn btn-primary">Tambah data</a>
                        </div>
                        <div class="col">
                            <form class="form-inline float-end d-flex align-items-center" method="POST" action="<?= BASE_URL; ?>user/search">
                                <input type="text" class="form-control" style="max-width: 300px;" name="keyword" id="keyword" placeholder="Cari data user">
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
                                        <th>Jenis Kelamin</th>
                                        <th>Alamat</th>
                                        <th>Telp</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 0;
                                    foreach ($data['users'] as $user) :
                                        $no++;
                                    ?>
                                        <tr>
                                            <td><?php echo $no; ?></td>
                                            <td><?php echo $user['nama']; ?></td>
                                            <td><?php echo $user['jenis_kelamin']; ?></td>
                                            <td><?php echo $user['alamat']; ?></td>
                                            <td><?php echo $user['telp']; ?></td>
                                            <td>
                                                <a href="<?= BASE_URL; ?>user/edit/<?= $user['id'];?>" class="badge bg-primary ms-2"><i class="bi bi-pencil-square"></i></a>
                                                <a href="<?= BASE_URL; ?>user/delete/<?= $user['id']; ?>" class="badge bg-danger ms-2" onclick="return confirm('yakin?');"><i class="bi bi-trash"></i></a>
                                            </td>
                                            <!-- Add additional columns as needed -->
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
