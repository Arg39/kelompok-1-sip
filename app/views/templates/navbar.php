<nav class="navbar navbar-expand-lg sticky-top bg-primary-subtle mb-2">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">
      <img src="<?= BASE_URL; ?>img/logo.jpg" alt="Logo" width="27"
        class="d-inline-block align-text-center rounded-circle me-2">
      <span class="fw-semibold">Perpus-Ku</span>
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
      aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav mx-auto fw-semibold">
        <li class="nav-item">
          <a class="nav-link" href="<?= BASE_URL; ?>">
            <i class="bi bi-house-door-fill me-1"></i>
            Home
          </a>
        </li>

        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            <i class="bi bi-stack me-1"></i>
            Master Data & Transaksi
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="<?= BASE_URL; ?>user"><i class="bi bi-person-circle me-2"></i>Master Anggota</a></li>
            <li><a class="dropdown-item" href="<?= BASE_URL; ?>rak"><i class="bi bi-hdd-rack-fill me-2"></i>Master Lokasi Rak</a></li>
            <li><a class="dropdown-item" href="<?= BASE_URL; ?>kategori"><i class="bi bi-journal-bookmark-fill me-2"></i>Master Kategori Buku</a></li>
            <li><a class="dropdown-item" href="<?= BASE_URL; ?>buku"><i class="bi bi-book-half me-2"></i>Master Buku</a></li>
            <li>
              <hr class="dropdown-divider">
            </li>
            <li><a class="dropdown-item" href="<?= BASE_URL; ?>peminjaman"><i class="bi bi-bookmark-heart-fill me-2"></i>Transaksi Peminjaman</a></li>
            <li><a class="dropdown-item" href="<?= BASE_URL; ?>pengembalian"><i class="bi bi-bookmark-x-fill me-2"></i>Transaksi Pengembalian</a></li>
          </ul>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="<?= BASE_URL; ?>user/petugas">
            <i class="bi bi-people-fill me-1"></i>
            Daftar Petugas
          </a>
        </li>
      </ul>
      <div class="btn-group">
        <a href="<?= BASE_URL; ?>authcontroller/logout" class="btn btn-sm btn-outline-danger fw-semibold">
          <i class="bi bi-box-arrow-in-left me-1"></i>
          Sign Out
        </a>
      </div>
    </div>
  </div>
</nav>