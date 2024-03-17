<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?= $data['title']; ?>
    </title>
    <link rel="stylesheet" href="<?= BASE_URL; ?>css/bootstrap.min.css">
    <link rel="shortcut icon" href="<?= BASE_URL; ?>img/logo.jpg" type="image/x-icon">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');
        @import url('https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css');
        * {
            font-family: 'Poppins', sans-serif;
        }
    </style>

</head>

<body>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-5">
            <div class="card border-0 shadow-lg my-5">
                <?php
                $this->flash->getFlashMessage();
                ?>
                <div class="card-header">
                    <h3 class="card-title text-center">Halaman Register</h3>
                </div>
                <div class="card-body">
                    <form action="<?= BASE_URL; ?>AuthController/register" method="post">
                        <div class="mb-2">
                            <label for="nama-input" class="form-label">Nama <span class="text-danger">*</span></label>
                            <input type="text" id="nama-input" class="form-control" name="nama" required />
                        </div>
                        <div class="mb-2">
                            <label for="username-input" class="form-label">Username <span class="text-danger">*</span></label>
                            <input type="text" id="username-input" class="form-control" name="username" required />
                        </div>
                        <div class="mb-2">
                            <label for="password-input" class="form-label">Password <span class="text-danger">*</span></label>
                            <input type="password" id="password-input" class="form-control" name="password" required />
                        </div>
                        <div class="mb-2">
                            <label for="telp-input" class="form-label">Telp <span class="text-danger">*</span></label>
                            <input type="text" id="telp-input" class="form-control" name="telp" required />
                        </div>
                        <div class="mb-2">
                            <label for="alamat-input" class="form-label">Alamat <span class="text-danger">*</span></label>
                            <input type="text" id="alamat-input" class="form-control" name="alamat" required />
                        </div>
                        <button type="submit" class="btn btn-primary btn-block mb-2">Sign Up</button>
                        <div class="text-center">
                            <p>Sudah punya akun?<a href="<?= BASE_URL; ?>login" class="btn btn-link btn-block d-inline-block">Login</a></p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<footer>
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center">
                <p>&copy; 2021 Perpusku</p>
            </div>
        </div>
    </div>
</footer>
<script src="<?= BASE_URL; ?>js/jquery-3.7.1.min.js"></script>
<script src="<?= BASE_URL; ?>js/popper.min.js"></script>
<script src="<?= BASE_URL; ?>js/bootstrap.min.js"></script>

</body>

</html>