<!-- Modal -->
<div class="modal fade " id="editModal" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false"
    aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <form action="<?= BASE_URL; ?>buku/update" method="post" enctype="multipart/form-data">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="editModalLabel">Edit Data Buku</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row g-3">
                        <div class="col-md-5">
                            <label for="judul" class="form-label">Judul</label>
                            <input type="text" required name="judul" class="form-control judul" id="judul" value="">
                            <input type="hidden" name="id" class="id" value="">
                        </div>
                        <div class="col-md-5">
                            <label for="pengarang" class="form-label">Pengarang</label>
                            <input type="text" required name="pengarang" class="form-control pengarang" id="pengarang" value="">
                        </div>
                        <div class="col-md-2">
                            <label for="jumlah" class="form-label">Jumlah Buku</label>
                            <input type="number" required name="jumlah" class="form-control jumlah" id="jumlah" value="">
                        </div>
                        <div class="col-md-5">
                            <label for="penerbit" class="form-label">Penerbit</label>
                            <input type="text" required name="penerbit" class="form-control penerbit" id="penerbit" value="">
                        </div>
                        <div class="col-md-2">
                            <label for="tahun_terbit" class="form-label">Tahun Terbit</label>
                            <input type="number" required name="tahun_terbit" min="1900" max="2099" step="1" value="" class="form-control tahun_terbit" id="tahun_terbit">
                        </div>
                        <div class="col-md-5">
                            <label for="isbn" class="form-label">ISBN</label>
                            <input type="text" required name="isbn" class="form-control isbn" id="isbn" value="">
                        </div>
                        <div class="col-md-6">
                            <label for="id_kategori" class="form-label">Kategori Buku</label>
                            <select id="id_kategori" name="id_kategori" class="form-select id_kategori">
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
                            <select id="kode_rak" name="kode_rak" class="form-select kode_rak">
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
                            <input class="form-control gambarEdit" name="gambar" type="file" id="gambar" onchange="previewImageEdit()">
                            <input type="hidden" name="gambar_lama" class="gambar_lama" value="">
                        </div>
                        <div class="col-md-5">
                            <img src="<?= BASE_URL; ?>uploads/default.svg" class="img-thumbnail previewEdit" id="preview" alt="Preview" style="height: 150px; object-fit: cover; object-position: top;">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save Changes</button>
                </div>
            </div>
        </form>
    </div>
</div>