<nav class="navbar navbar-expand-lg sticky-top bg-primary-subtle">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">
      <img src="<?= BASE_URL; ?>img/logo.jpg" alt="Logo" width="27"
        class="d-inline-block align-text-center rounded-circle me-2">
      <span class="fw-bold">Perpus-Ku</span>
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
      aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav mx-auto">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="<?= BASE_URL; ?>">Home</a>
        </li>

        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Master Data & Transaksi
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="#">Master Kategori</a></li>
            <li><a class="dropdown-item" href="#">Master Buku</a></li>
            <li>
              <hr class="dropdown-divider">
            </li>
            <li><a class="dropdown-item" href="#">Transaksi Peminjaman</a></li>
            <li><a class="dropdown-item" href="#">Transaksi Pengembalian</a></li>
          </ul>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="#">Manage Users</a>
        </li>
      </ul>
      <form class="d-flex" role="search">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form>

    </div>
  </div>
</nav>