<?php
require '../functions/connect.php';
require '../functions/hapus.php';
$products = query("SELECT * FROM product");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];

    if (hapus($id) > 0) {
        header("Location: del.php");
    } else {
        echo "Error: Unable to delete the product.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Page</title>
    <link rel="stylesheet" href="../bootstrap-5.0.2-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/main.css"> <!-- Pastikan main.css untuk gaya tambahan -->

    <!-- CSS khusus untuk tabel -->
    <style>
        body {
            background-color: #f8f9fa; /* Warna latar belakang */
            color: #343a40; /* Warna teks */
        }
        .container h2 {
            color: #f8f9fa;
        }
        .table th, .table td {
            vertical-align: middle;
        }
        .table img {
            max-width: 50px;
            max-height: 50px;
            border-radius: 50%;
        }
        .btn-update {
            margin-right: -100px; /* Jarak antara tombol delete dan update */
        }
        .btn-delete {
            background-color: #dc3545; /* Warna tombol hapus */
            border-color: #dc3545;
            color: #fff; /* Warna teks tombol */
        }
        .btn-delete:hover {
            background-color: #c82333; /* Warna tombol hapus saat hover */
            border-color: #bd2130;
        }
        .btn-update {
            background-color: #007bff; /* Warna tombol update */
            border-color: #007bff;
            color: #fff; /* Warna teks tombol */
        }
        .btn-update:hover {
            background-color: #0056b3; /* Warna tombol update saat hover */
            border-color: #0056b3;
        }
    </style>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-white py-4 fixed-top">
    <div class="container">
        <a class="navbar-brand d-flex justify-content-between align-items-center order-lg-0" href="index.html">
            <span class="text-uppercase fw-lighter ms-2">Admin</span>
        </a>

        <!-- Tombol-tombol -->
        <div class="order-lg-2 nav-btns">
            <?php
            session_start();
            ?>
            <?php if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true): ?>
                <!-- Jika sudah login -->
                <div class="btn-group d-flex align-items-center">
                    <div class="welcome-text me-2">Welcome, <?php echo $_SESSION['username']; ?></div>
                    <form action="../functions/logout.php" method="post">
                        <button type="submit" class="btn position-relative">
                    <a class="btn text-uppercase">Logout</a>
                </button>
                    </form>
                </div>
            <?php else: ?>
                <button type="button" class="btn position-relative">
                    <a href="login.php" class="btn text-uppercase">Login</a>
                </button>
            <?php endif; ?>
        </div>

        <!-- Toggler button untuk mobile -->
        <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navMenu">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Daftar menu -->
        <div class="collapse navbar-collapse order-lg-1" id="navMenu">
            <ul class="navbar-nav mx-auto text-center">
                <li class="nav-item px-3 py-2">
                    <a class="nav-link text-uppercase text-dark" href="add.php">Tambah Produk</a>
                </li>
                <li class="nav-item px-3 py-2">
                    <a class="nav-link active text-uppercase text-dark" href="del.php">Manage Produk</a>
                </li>
                <li class="nav-item px-3 py-2">
                    <a class="nav-link text-uppercase text-dark" href="#">Pesanan</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<section class="py-5">
    <div class="container">
        <h2 class="text mb-4 mt-5">|</h2>
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nama</th>
                        <th>Harga</th>
                        <th>Kategori</th>
                        <th>Gambar</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($products as $product) : ?>
                        <tr>
                            <td><?= $product["id"]; ?></td>
                            <td><?= $product["nama"]; ?></td>
                            <td>Rp <?= number_format($product["harga"], 0, ',', '.'); ?></td> <!-- Format harga -->
                            <td><?= $product["kategori"]; ?></td>
                            <td><img src="../images/<?= $product["gambar"]; ?>" alt="<?= $product["nama"]; ?>" class="img-fluid"></td>
                            <td>
                                <form action="delproduct.php" method="post" style="display: inline;">
                                    <input type="hidden" name="id" value="<?= $product["id"]; ?>">
                                    <button type="submit" class="btn btn-delete btn-sm" onclick="return confirm('Are you sure?')">
                                        <i class="bi bi-trash"></i> Delete
                                    </button>
                                </form>
                                <a href="update.php?id=<?= $product["id"]; ?>" class="btn btn-update btn-sm">
                                    <i class="bi bi-pencil"></i> Update
                                </a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</section>

<script src="../js/jquery-3.6.0.js"></script>
<script src="../bootstrap-5.0.2-dist/js/bootstrap.bundle.min.js"></script>
<!-- Load Bootstrap Icons dari CDN -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.js"></script>
</body>
</html>


