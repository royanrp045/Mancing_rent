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
    <link rel="stylesheet" href="../css/main.css">

    <style>
        body {
            background-color: #f8f9fa;
            color: #343a40;
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
            margin-right: -100px;
        }
        .btn-delete {
            background-color: #dc3545;
            border-color: #dc3545;
            color: #fff;
        }
        .btn-delete:hover {
            background-color: #c82333;
            border-color: #bd2130;
        }
        .btn-update {
            background-color: #007bff;
            border-color: #007bff;
            color: #fff;
        }
        .btn-update:hover {
            background-color: #0056b3;
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

        <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navMenu">
            <span class="navbar-toggler-icon"></span>
        </button>

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
                            <td>Rp <?= number_format($product["harga"], 0, ',', '.'); ?></td>
                            <td><?= $product["kategori"]; ?></td>
                            <td><img src="../images/<?= $product["gambar"]; ?>" alt="<?= $product["nama"]; ?>" class="img-fluid"></td>
                            <td>
                                <button class="btn btn-delete btn-sm" data-bs-toggle="modal" data-bs-target="#deleteModal" data-id="<?= $product['id']; ?>">
                                    <i class="bi bi-trash"></i> Delete
                                </button>
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

<!-- Delete Confirmation Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="" method="post">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteModalLabel">Confirm Delete</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Are you sure you want to delete this product?
                    <input type="hidden" name="id" id="delete-id">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-delete">Delete</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script src="../js/jquery-3.6.0.js"></script>
<script src="../bootstrap-5.0.2-dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.js"></script>
<script>
    $('#deleteModal').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget);
        var id = button.data('id');
        var modal = $(this);
        modal.find('.modal-body #delete-id').val(id);
    });
</script>
</body>
</html>



