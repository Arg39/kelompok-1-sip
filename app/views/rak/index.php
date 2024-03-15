<div class="row">
    <div class="col-md-6">
        <h3 class="mt-4">Master Lokasi Rak</h3>
    </div>
    <div class="col-md-6">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb float-end mt-4">
                <li class="breadcrumb-item"><a href="<?= BASE_URL; ?>">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Master Lokasi Rak</li>
            </ol>
        </nav>
    </div>
</div>
<hr>
<?= $this->flash->getFlashMessage(); ?>
<div class="card shadow mt-4">
    <div class="card-header">
        <div class="row">
            <div class="col-md-6">
                <h5 class="card-title">Data Rak</h5>
            </div>
            <div class="col-md-6">
                <button type="button" data-bs-toggle="modal" data-bs-target="#tambahModal"
                    class="btn btn-sm btn-primary float-end fw-semibold"><i class="bi bi-plus-lg me-1"></i>Tambah
                    Data</button>
            </div>
            <?php include_once 'modalTambah.php' ?>
        </div>
    </div>
    <div class="card-body">
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Kode Rak</th>
                    <th>Lokasi</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1;
                foreach ($data['rak'] as $rak): ?>
                    <tr>
                        <td>
                            <?= $no++; ?>
                        </td>
                        <td>
                            <?= $rak['kode']; ?>
                        </td>
                        <td>
                            <?= $rak['lokasi']; ?>
                        </td>
                        <td>
                            <div class="btn-group">
                                <a href="<?= BASE_URL; ?>rak/edit/<?= $rak['kode']; ?>" class="btn btn-sm btn-warning">
                                    <i class="bi bi-pencil-square"></i>
                                </a>
                                <!-- Make trash button with confirm alert in js onclick -->
                                <a href="<?= BASE_URL; ?>rak/delete/<?= $rak['kode']; ?>" class="btn btn-sm btn-danger"
                                    onclick="return confirm('Apakah anda yakin ingin menghapus data ini?')">
                                    <i class="bi bi-trash"></i>
                                </a>
                            </div>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>