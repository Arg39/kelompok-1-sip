<form action="<?= BASE_URL ?>peminjaman/tambah" method="POST">
    <h3>Tambah Data Peminjaman</h3>
    <div class="row">
        <div class="col-6">
            <div class="form-group">
                <label for="tanggal_pinjam">Tanggal Pinjam:</label>
                <input type="date" class="form-control" id="tanggal_pinjam" name="tanggal_pinjam">
            </div>
            <div class="form-group">
                <label for="tanggal_kembali">Tanggal Kembali:</label>
                <input type="date" class="form-control" id="tanggal_kembali" name="tanggal_kembali">
            </div>
            <div class="form-group">
                <label for="anggota_id">Nama Anggota:</label>
                <select class="form-control" id="angota_id" name="anggota_id">
                    <?php foreach ($data['anggota'] as $anggota): ?>
                        <option value="<?= $anggota['id']; ?>">
                            <?= $anggota['id'] . ' - ' . $anggota['nama']; ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="form-group">
                <label for="petugas_id">Nama Petugas:</label>
                <input type="text" class="form-control" id="petugas_id" value="<?= $_SESSION['user']['nama']; ?>"
                    disabled readonly>
                <input type="hidden" name="petugas_id" value="<?= $_SESSION['user']['id']; ?>">
            </div>
            <div class="form-group">
                <label for="id_buku">Pilih Buku:</label>
                <select class="form-select" id="multiple-select-custom-field" name="id_buku[]" data-placeholder="Pilih Buku" multiple>
                    <?php foreach ($data['buku'] as $buku): ?>
                        <option value="<?= $buku['id']; ?>">
                            <?= $buku['id'] . ' - ' . $buku['judul']; ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>

            <br>
            <button type="submit" class="btn btn-primary ml-3">Tambah Data</button>
        </div>
    </div>
</form>