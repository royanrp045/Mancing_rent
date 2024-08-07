<?php
require '../functions/tambah.php';
require '../functions/upload.php';

if (isset($_POST["submit"])) {
    if( tambah($_POST) > 0 ) {
        echo "data berhasil ditambahkan";
    } else {
        echo "data gagal ditambahkan";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Produk</title>
    <link rel="stylesheet" href="../bootstrap-5.0.2-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/main.css">
    <style>
        body {
            background-color: #f8f9fa;
            color: #343a40;
        }
        .container h1 {
            color: #343a40;
            margin-bottom: 20px;
        }
        .container h2 {
            color: #f8f9fa;
        }
        .form-control:focus {
            box-shadow: none;
            border-color: #007bff;
        }
        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
        }
        .btn-primary:hover {
            background-color: #0056b3;
            border-color: #004085;
        }
        .btn-secondary {
            background-color: #6c757d;
            border-color: #6c757d;
        }
        .btn-secondary:hover {
            background-color: #5a6268;
            border-color: #545b62;
        }
        .navbar {
            margin-bottom: 30px;
        }
        /* Styling for dropdown */
        .custom-select {
            appearance: none;
            -webkit-appearance: none;
            -moz-appearance: none;
            background-color: #fff;
            border: 1px solid #ced4da;
            padding: .375rem .75rem;
            font-size: 1rem;
            line-height: 1.5;
            cursor: pointer;
        }
        .custom-select:focus {
            border-color: #007bff;
            outline: 0;
            box-shadow: 0 0 0 0.25rem rgba(0, 123, 255, 0.25);
        }
        .custom-select::after {
            content: '\25BC';
            position: absolute;
            top: 50%;
            right: 1rem;
            transform: translateY(-50%);
            pointer-events: none;
        }
    </style>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-white py-4 fixed-top">
    <div class="container">
        <a class="navbar-brand d-flex justify-content-between align-items-center order-lg-0" href="index.html">
            <span class="text-uppercase fw-lighter ms-2">Admin</span>
        </a>

        <!-- Toggler button untuk mobile -->
        <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navMenu">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Daftar menu -->
        <div class="collapse navbar-collapse order-lg-1" id="navMenu">
            <ul class="navbar-nav mx-auto text-center">
                <li class="nav-item px-3 py-2">
                    <a class="nav-link active text-uppercase text-dark" href="add.php">Tambah Produk</a>
                </li>
                <li class="nav-item px-3 py-2">
                    <a class="nav-link text-uppercase text-dark" href="del.php">Manage Produk</a>
                </li>
                <li class="nav-item px-3 py-2">
                    <a class="nav-link text-uppercase text-dark" href="pesanan.php">Pesanan</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<div class="container mt-5 pt-5">
    <h2>|</h2>
    <h1>Tambah Produk</h1>
    <form action="" method="post" enctype="multipart/form-data">
        <div class="mb-3">
            <label for="nama" class="form-label">Nama:</label>
            <input type="text" name="nama" id="nama" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="harga" class="form-label">Harga:</label>
            <input type="number" name="harga" id="harga" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="kategori" class="form-label">Kategori:</label>
            <select name="kategori" id="kategori" class="form-select custom-select" required>
                <option selected disabled>Pilih Kategori</option>
                <option value="float">Float</option>
                <option value="rods">Rods</option>
                <option value="reels">Reels</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="gambar" class="form-label">Gambar:</label>
            <input type="file" name="gambar" id="gambar" class="form-control" required>
        </div>
        <button type="submit" name="submit" class="btn btn-primary">Tambah Data</button>
        <button type="reset" class="btn btn-secondary">Reset</button>
    </form>
</div>

<script src="../bootstrap-5.0.2-dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
