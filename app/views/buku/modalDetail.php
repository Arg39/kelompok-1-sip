<!-- Modal -->
<div class="modal fade " id="detailModal" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false"
    aria-labelledby="detailModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="detailModalLabel">Detail Data Buku</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row g-3">
                    <div class="col-md-3 text-center">
                        <img src="<?= BASE_URL; ?>uploads/default.svg" class="img-thumbnail gambar" id="preview" alt="Preview"
                            style="height: 150px; object-fit: cover; object-position: top;">
                    </div>
                    <div class="col-md-3">
                        <label for="judul" class="form-label">Judul</label>
                        <input readonly disabled type="text" name="judul" class="form-control judul" id="judul" value="">
                    </div>
                    <div class="col-md-3">
                        <label for="pengarang" class="form-label">Pengarang</label>
                        <input readonly disabled type="text" name="pengarang" class="form-control pengarang" id="pengarang" value="">
                    </div>
                    <div class="col-md-3">
                        <label for="jumlah" class="form-label">Jumlah Buku</label>
                        <input readonly disabled type="text" name="jumlah" class="form-control jumlah" id="jumlah" value="">
                    </div>
                    <div class="col-md-5">
                        <label for="penerbit" class="form-label">Penerbit</label>
                        <input readonly disabled type="text" name="penerbit" class="form-control penerbit" id="penerbit" value="">
                    </div>
                    <div class="col-md-2">
                        <label for="tahun_terbit" class="form-label">Tahun Terbit</label>
                        <input readonly disabled type="text" name="tahun_terbit" class="form-control tahun_terbit" id="tahun_terbit" value="">
                    </div>
                    <div class="col-md-5">
                        <label for="isbn" class="form-label">ISBN</label>
                        <input readonly disabled type="text" name="isbn" class="form-control isbn" id="isbn" value="">
                    </div>
                    <div class="col-md-6">
                        <label for="id_kategori" class="form-label">Kategori Buku</label>
                        <input readonly disabled type="text" name="id_kategori" class="form-control id_kategori" id="id_kategori" value="">
                    </div>
                    <div class="col-md-6">
                        <label for="kode_rak" class="form-label">Posisi Buku</label>
                        <input readonly disabled type="text" name="kode_rak" class="form-control kode_rak" id="kode_rak" value="">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>