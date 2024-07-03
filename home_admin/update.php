<?php
require '../functions/connect.php';
require '../functions/upload.php';

$id = $_GET['id'];
$product = query("SELECT * FROM product WHERE id = $id")[0];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = $_POST['nama'];
    $harga = $_POST['harga'];
    $kategori = $_POST['kategori'];
    $gambarLama = $_POST['gambarLama'];

    // Check if a new image is uploaded
    if ($_FILES['gambar']['error'] === 4) {
        $gambar = $gambarLama;
    } else {
        $gambar = upload();
        if ($gambar) {
            // Delete old image if upload is successful
            if (file_exists("../images/$gambarLama")) {
                unlink("../images/$gambarLama");
            }
        } else {
            // Handle upload error
            echo "Upload gambar gagal.";
            return false;
        }
    }

    $query = "UPDATE product SET 
              nama = '$nama', 
              harga = '$harga', 
              kategori = '$kategori', 
              gambar = '$gambar' 
              WHERE id = $id";

    if (mysqli_query($conn, $query)) {
        header("Location: del.php");
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Produk</title>
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
        .img {
            max-height: 100px;
            width: 100px;
            object-fit: contain;
        }
        .img-preview {
            max-width: 200px;
            max-height: 200px;
            width: auto;
            height: auto;
            object-fit: contain;
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

<div class="container mt-5 pt-5">
    <h2>|</h2>
    <h1>Update Produk</h1>
    <form action="" method="post" enctype="multipart/form-data">
        <div class="mb-3">
            <label for="nama" class="form-label">Nama:</label>
            <input type="text" name="nama" id="nama" class="form-control" value="<?= htmlspecialchars($product['nama']); ?>" required>
        </div>
        <div class="mb-3">
            <label for="harga" class="form-label">Harga:</label>
            <input type="number" name="harga" id="harga" class="form-control" value="<?= htmlspecialchars($product['harga']); ?>" required>
        </div>
        <div class="mb-3">
            <label for="kategori" class="form-label">Kategori:</label>
            <input type="text" name="kategori" id="kategori" class="form-control" value="<?= htmlspecialchars($product['kategori']); ?>" required>
        </div>
        <div class="mb-3">
            <label for="gambar" class="form-label">Gambar:</label>
            <input type="file" name="gambar" id="gambar" class="form-control" onchange="previewImage(event)">
            <input type="hidden" name="gambarLama" value="<?= htmlspecialchars($product['gambar']); ?>">
            <img id="preview" src="../images/<?= $product['gambar']; ?>" class="img-preview">
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
        <a href="del.php" class="btn btn-secondary">Batal</a>
    </form>
</div>

<script src="../bootstrap-5.0.2-dist/js/bootstrap.bundle.min.js"></script>
<script>
function previewImage(event) {
    var reader = new FileReader();
    reader.onload = function(){
        var output = document.getElementById('preview');
        output.src = reader.result;
    }
    reader.readAsDataURL(event.target.files[0]);
}
</script>
</body>
</html>
