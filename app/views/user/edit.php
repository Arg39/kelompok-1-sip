<div class="container">
    <div class="row">
        <div class="col-lg-12 mt-2" style="min-height: 480px;">
            <div class="card">
                <div class="card-header">
                    Edit Data User
                </div>
                <div class="card-body">
                    <form action="<?= BASE_URL; ?>user/ubah/<?= $data['user']['id']; ?>" method="POST">
                        <input type="hidden" name="id" value="<?= $data['user']['id']; ?>">
                        <div class="mb-3">
                            <label for="nama">Nama : </label>
                            <input type="text" class="form-control" id="nama" name="nama" value="<?= $data['user']['nama']; ?>">
                        </div>
                        <div class="mb-3">
                            <label for="jenis_kelamin">Jenis Kelamin :</label>
                            <select class="form-control" id="jenis_kelamin" name="jenis_kelamin">
                                <option value="Laki - Laki" <?= ($data['user']['jenis_kelamin'] == 'Laki - Laki') ? 'selected' : ''; ?>>Laki - Laki</option>
                                <option value="Perempuan" <?= ($data['user']['jenis_kelamin'] == 'Perempuan') ? 'selected' : ''; ?>>Perempuan</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="alamat">Alamat : </label>
                            <input type="text" class="form-control" id="alamat" name="alamat" value="<?= $data['user']['alamat']; ?>">
                        </div>
                        <div class="mb-3">
                            <label for="telp">Telp : </label>
                            <input type="text" class="form-control" id="telp" name="telp" value="<?= $data['user']['telp']; ?>">
                        </div>
                        <button type="submit" class="btn btn-primary">Ubah Data</button>
                        <a href="<?= BASE_URL; ?>user/index" class="btn btn-secondary">Kembali</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>