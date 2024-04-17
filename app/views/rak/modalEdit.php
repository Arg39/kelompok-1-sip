<!-- Modal -->
<div class="modal fade " id="editModal" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false"
    aria-labelledby="editModallabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <form action="<?= BASE_URL; ?>rak/update" method="post">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="editModallabel">Edit Data Rak</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="form-group mb-3">
                        <label for="kode">Kode Rak</label>
                        <input type="text" class="form-control kode" id="kode" value="" readonly disabled>
                        <input type="hidden" class="kode" name="kode" value="">
                    </div>
                    <div class="form-group">
                        <label for="lokasi">Lokasi</label>
                        <input type="text" class="form-control lokasi" required id="lokasi" name="lokasi" value="">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Simpan Data</button>
                </div>
            </div>
        </form>
    </div>
</div>