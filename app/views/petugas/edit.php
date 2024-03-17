<div class="container">
    <div class="row">
        <div class="col-lg-12 mt-2" style="min-height: 480px;">
            <div class="card">
                <div class="card-header">
                    Edit Data Petugas
                </div>
                <div class="card-body">
                    <form action="<?= BASE_URL; ?>user/ubahpetugas/<?= $data['petugas']['id']; ?>" method="POST">
                        <input type="hidden" name="id" value="<?= $data['petugas']['id']; ?>">
                        <input type="hidden" name="username" value="<?= $data['petugas']['username']; ?>">
                        <div class="mb-3">
                            <label for="nama">Nama : </label>
                            <input type="text" class="form-control" id="nama" name="nama" value="<?= $data['petugas']['nama']; ?>">
                        </div>
                        <div class="mb-3">
                            <label for="username">Username : </label>
                            <input type="text" class="form-control" id="username" name="username" value="<?= $data['petugas']['username']; ?>" disabled>
                        </div>
                        <div class="mb-3">
                            <label for="alamat">Alamat : </label>
                            <input type="text" class="form-control" id="alamat" name="alamat" value="<?= $data['petugas']['alamat']; ?>">
                        </div>
                        <div class="mb-3">
                            <label for="telp">Telp : </label>
                            <input type="text" class="form-control" id="telp" name="telp" value="<?= $data['petugas']['telp']; ?>">
                        </div>
                        <div class="mb-3">
                            <label for="password">Password Baru : </label>
                            <input type="password" class="form-control" id="password" name="password" value="<?= $data['petugas']['password']; ?>">
                        </div>
                        <button type="submit" class="btn btn-primary">Ubah Data</button>
                        <a href="<?= BASE_URL; ?>user/petugas" class="btn btn-secondary">Kembali</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>