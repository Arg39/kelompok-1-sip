<!-- Modal -->
<div class="modal fade " id="tambahModal" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false"
    aria-labelledby="tambahModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <form action="<?= BASE_URL; ?>buku/tambah" method="post" enctype="multipart/form-data">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="tambahModalLabel">Tambah Data Buku</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row g-3">
                        <div class="col-md-5">
                            <label for="judul" class="form-label">Judul</label>
                            <input type="text" name="judul" class="form-control" id="judul">
                        </div>
                        <div class="col-md-5">
                            <label for="pengarang" class="form-label">Pengarang</label>
                            <input type="text" name="pengarang" class="form-control" id="pengarang">
                        </div>
                        <div class="col-md-2">
                            <label for="jumlah" class="form-label">Jumlah Buku</label>
                            <input type="number" name="jumlah" class="form-control" id="jumlah">
                        </div>
                        <div class="col-md-5">
                            <label for="penerbit" class="form-label">Penerbit</label>
                            <input type="text" name="penerbit" class="form-control" id="penerbit">
                        </div>
                        <div class="col-md-2">
                            <label for="tahun_terbit" class="form-label">Tahun Terbit</label>
                            <input type="number" name="tahun_terbit" min="1900" max="2099" step="1" value="2016"
                                class="form-control" id="tahun_terbit">
                        </div>
                        <div class="col-md-5">
                            <label for="isbn" class="form-label">ISBN</label>
                            <input type="text" name="isbn" class="form-control" id="isbn">
                        </div>
                        <div class="col-md-6">
                            <label for="id_kategori" class="form-label">Kategori Buku</label>
                            <select id="id_kategori" name="id_kategori" class="form-select">
                                <option selected>Choose...</option>
                                <?php foreach ($data['kategori'] as $kategori): ?>
                                    <option value="<?= $kategori['id']; ?>">
                                        <?= $kategori['nama_kategori']; ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label for="kode_rak" class="form-label">Posisi Buku</label>
                            <select id="kode_rak" name="kode_rak" class="form-select">
                                <option selected>Choose...</option>
                                <?php foreach ($data['rak'] as $rak): ?>
                                    <option value="<?= $rak['kode']; ?>">
                                        <?= $rak['lokasi']; ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="col-md-7">
                            <label for="gambar" class="form-label">Cover Buku</label>
                            <input class="form-control" name="gambar" type="file" id="gambar" onchange="previewImage()">
                        </div>
                        <div class="col-md-5">
                            <img src="<?= BASE_URL; ?>uploads/default.svg" class="img-thumbnail" id="preview" alt="Preview" style="height: 150px; object-fit: cover; object-position: top;">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Tambah Data</button>
                </div>
            </div>
        </form>
    </div>
</div>