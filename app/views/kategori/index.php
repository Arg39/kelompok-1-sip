<h3 class="mt-5">Kategori</h3>

<div class="row">
    <div class="col">
        <a class="btn btn-outline-primary tombolTambahKategori" data-bs-toggle="modal" data-bs-target="#kategoriModal"><i class="bi bi-plus-lg me-1"></i>Tambah Kategori</a>

        <!-- Modal -->
        <div class="modal fade" id="kategoriModal" tabindex="-1" aria-labelledby="kategoriModalLabel" aria-hidden="true" role="dialog">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="kategoriModalLabel">Tambah Kategori</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="<?= BASE_URL; ?>kategori/tambah" method="post">
                            <input type="hidden" id="id" name="id">
                            <div class="mb-3">
                                <label for="nama_kategori" class="form-label">Nama Kategori</label>
                                <input type="text" class="form-control" id="nama_kategori" name="nama_kategori" required>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-outline-danger" data-bs-dismiss="modal">Batal</button>
                                <button type="submit" class="btn btn-success">Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <div class="col">
        <form action="<?= BASE_URL; ?>kategori/cari" method="post" class="d-flex justify-content-end">
            <input type="text" class="form-control me-2" placeholder="Cari kategori..." name="keyword" id="keyword" autocomplete="off">
            <button class="btn btn-primary" type="submit">Cari</button>
        </form>
    </div>
</div>

<div class="row mt-4">
<?= $this->flash->getFlashMessage(); ?>
    <?php foreach ($data['kategori'] as $kategori) : ?>
        <div class="col-md-4 mb-3">
            <div class="card h-100 shadow-sm">
                <div class="card-body m-2">
                    <h5 class="card-title"><a href="#" class="link-body-emphasis link-underline-opacity-0 icon-link icon-link-hover"><?= $kategori['nama_kategori']; ?><i class="bi bi-box-arrow-in-right"></i></a></h5>
                    <h6 class="card-subtitle mb-2 text-muted">ID: <?= $kategori['id']; ?></h6>
                    <div class="d-flex justify-content-end">
                        <a href="<?= BASE_URL; ?>kategori/ubah/<?= $kategori['id']; ?>" class="btn btn-warning me-2 btn-sm tombolUbahKategori" data-bs-toggle="modal" data-bs-target="#kategoriModal" data-id="<?= $kategori['id']; ?>">
                            <i class="bi bi-pencil"></i> Ubah
                        </a>
                        <a href="<?= BASE_URL; ?>kategori/hapus/<?= $kategori['id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus data?');">
                            <i class="bi bi-trash"></i> Hapus
                        </a>
                    </div>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
</div>

