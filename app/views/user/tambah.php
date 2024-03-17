<div class="container">
    <div class="row">
        <div class="col-lg-12 mt-2" style="min-height: 480px;">
            <div class="card">
                <div class="card-header">
                    Tambah Data User
                </div>
                <div class="card-body">
                    <form action="<?= BASE_URL; ?>user/tambahdata" method="POST">
                        <div class="mb-3">
                            <label for="nama">Nama : </label>
                            <input type="text" class="form-control" id="nama" name="nama" required>
                        </div>
                        <div class="mb-3">
                            <label for="jenis_kelamin">Jenis Kelamin</label>
                            <select class="form-control" id="jenis_kelamin" name="jenis_kelamin" required>
                                <option value="Laki - Laki">Laki - Laki</option>
                                <option value="Perempuan">Perempuan</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="alamat">Alamat : </label>
                            <input type="text" class="form-control" id="alamat" name="alamat" required>
                        </div>
                        <div class="mb-3">
                            <label for="telp">Telp : </label>
                            <input type="text" class="form-control" id="telp" name="telp" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Tambah Data</button>
                        <a href="<?= BASE_URL; ?>user/index" class="btn btn-secondary">Kembali</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>