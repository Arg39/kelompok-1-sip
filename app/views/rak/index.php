<h3>Master Lokasi Rak</h3>
<div class="card">
    <div class="card-header">
        <div class="row">
            <div class="col-md-6 d-flex align-items-center">
                <h5 class="card-title">Data Rak</h5>
            </div>
            <div class="col-md-6">
                <a href="<?= BASE_URL; ?>rak/tambah" class="btn btn-sm btn-primary float-end fw-semibold"><i
                        class="bi bi-plus-lg me-1"></i>Tambah Data</a>
            </div>
        </div>
    </div>
    <div class="card-body">
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Rak</th>
                    <th>Lokasi</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <!-- Dummy Data -->
                <tr>
                    <td>1</td>
                    <td>Rak 1</td>
                    <td>Lantai 1</td>
                    <td>
                        <div class="btn-group">
                            <a href="<?= BASE_URL; ?>rak/edit/1" class="btn btn-sm btn-warning"><i
                                    class="bi bi-pencil-square"></i></a>
                            <a href="<?= BASE_URL; ?>rak/hapus/1" class="btn btn-sm btn-danger"><i
                                    class="bi bi-trash"></i></a>
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>