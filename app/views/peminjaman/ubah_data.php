<form action="<?=BASE_URL?>Peminjaman/prosesubah" method="POST">
<h3>Ubah Data Peminjaman</h3>
<?php foreach ($data['ubahdata'] as $ubah): ?>
    <input type="hidden" value="<?= $ubah['id']?>" name="id">
    <div class="row">
        <div class="col-6">
            <div class="form-group">
                <label for="tanggal_pinjam">Tanggal Pinjam:</label>
                <input type="date" class="form-control" value="<?= $ubah['tanggal_pinjam']?>" name="tanggal_pinjam">
            </div>
            <div class="form-group">
                <label for="tanggal_kembali">Tanggal Kembali:</label>
                <input type="date" class="form-control" value="<?= $ubah['tanggal_kembali']?>" name="tanggal_kembali">
            </div>
            <div class="form-group">
                <label for="anggota_id">Id Anggota:</label>
                <input type="text" class="form-control" value="<?= $ubah['anggota_id']?>" name="anggota_id">
            </div>
            <div class="form-group">
                <label for="petugas_id">Id Petugas:</label>
                <input type="text" class="form-control" value="<?= $ubah['petugas_id']?>" name="petugas_id">
            </div>
            <div class="form-group">
                <label for="id_buku">Pilih Buku:</label>
                <select class="form-control" id="id_buku" name="id_buku[]" multiple>
                    <?php
                    $query = $this->db->query("SELECT id, judul FROM buku");
                    $result = $this->db->resultAll($query);

                    foreach ($result as $data) {
                        echo "<option value='".$data['id']."'>".$data['judul']."</option>";
                    }
                    ?>
                </select>
            </div>
        </div>
    </div>
    <?php endforeach; ?>
    <br>
    <button type="submit" class="btn btn-primary ml-3">Ubah Data</button>
</form>
