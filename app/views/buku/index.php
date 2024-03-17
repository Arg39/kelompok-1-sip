<div class="row">
    <div class="col-md-6">
        <h3 class="mt-4">Master Buku</h3>
    </div>
    <div class="col-md-6">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb float-end mt-4">
                <li class="breadcrumb-item"><a href="<?= BASE_URL; ?>">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Master Buku</li>
            </ol>
        </nav>
    </div>
</div>
<hr>
<?= $this->flash->getFlashMessage(); ?>
<div class="card shadow mt-4">
    <!-- Card Header -->
    <div class="card-header">
        <div class="row">
            <div class="col-md-6 text-center text-md-start">
                <h5 class="card-title">Data Buku</h5>
            </div>
            <div class="col-md-6 d-flex flex-column flex-md-row justify-content-md-end justify-content-center gap-3">
                <form class="d-flex flex-column flex-lg-row justify-content-center gap-2" role="search">
                    <input class="form-control-sm me-0" type="search" placeholder="Search Buku"
                        aria-label="Search Buku">
                    <button class="btn btn-sm btn-success fw-semibold" type="submit"><i
                            class="bi bi-search me-1"></i>Search</button>
                </form>
                <button type="button" data-bs-toggle="modal" data-bs-target="#tambahModal"
                    class="btn btn-sm btn-primary fw-semibold"><i class="bi bi-plus-lg me-1"></i>Tambah
                    Buku</button>
            </div>
        </div>
    </div>

    <!-- Card Body -->
    <div class="card-body">
        <div class="row row-cols-1 row-cols-md-4 g-4">
            <?php foreach ($data['buku'] as $buku): ?>
                <div class="col">
                    <div class="card h-100">
                        <img src="<?= BASE_URL; ?>img/<?= $buku['gambar']; ?>" class="card-img-top" alt="..."
                            style="height: 194px; object-fit: cover; object-position: top;">
                        <div class="card-body">
                            <h6 class="card-title"><?= $buku['judul']; ?></h6>
                            <p class="card-text fs-6">Stok Buku : <?= $buku['jumlah']; ?></p>
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="btn-group">
                                    <!-- detail button -->
                                    <a href="<?= BASE_URL; ?>buku/detail/<?= $buku['id']; ?>" class="btn btn-sm btn-primary">
                                        <i class="bi bi-eye"></i>
                                    </a>
                                    <a href="javascript:void(0)" class="btn btn-sm btn-warning edit_buku"
                                        data-id="<?= $buku['id']; ?>" data-bs-toggle="modal"
                                        data-bs-target="#editModal">
                                        <i class="bi bi-pencil-square"></i>
                                    </a>
                                    <a href="<?= BASE_URL; ?>buku/delete/<?= $buku['id']; ?>"
                                        class="btn btn-sm btn-danger"
                                        onclick="return confirm('Apakah anda yakin ingin menghapus data ini?')">
                                        <i class="bi bi-trash"></i>
                                    </a>
                                </div>
                                <small class="text-muted ms-lg-1 ">Kode Buku : <span class="fw-semibold"><?= $buku['id']; ?></span>
                                </small>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>