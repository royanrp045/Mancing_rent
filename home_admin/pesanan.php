<?php
require '../functions/connect.php'; // Koneksi ke database
require '../functions/finish.php'; // 

// Mengambil data checkout dan username dari tabel user
$checkouts = query("SELECT c.*, u.username FROM checkout c JOIN user u ON c.user_id = u.id");

$grouped_checkouts = [];
foreach ($checkouts as $checkout) {
    $grouped_checkouts[$checkout['user_id']][] = $checkout;
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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">

    <style>
        body {
            background-color: #f8f9fa;
            color: #343a40;
        }
        .container h2 {
            color: #343a40;
            text-align: center;
            margin-bottom: 30px;
        }
        .table thead th {
            background-color: #0395c8;
            color: #fff;
            text-align: center;
        }
        .table td, .table th {
            text-align: center;
            vertical-align: middle;
            background-color: #ffff;
        }
        .btn-delete {
            background-color: #dc3545;
            border-color: #dc3545;
            color: #fff;
            transition: background-color 0.3s, border-color 0.3s;
        }
        .btn-delete:hover {
            background-color: #c82333;
            border-color: #bd2130;
        }
        .modal-content {
            border-radius: 10px;
        }
        .modal-header {
            background-color: #0395c8;
            color: #fff;
        }
        .modal-footer .btn-delete {
            background-color: #0395c8;
        }
        .tooltip-inner {
            background-color: #0395c8;
            color: #fff;
        }
        .tooltip-arrow::before {
            border-top-color: #0395c8;
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
                    <a class="nav-link text-uppercase text-dark" href="del.php">Manage Produk</a>
                </li>
                <li class="nav-item px-3 py-2">
                    <a class="nav-link active text-uppercase text-dark" href="pesanan.php">Pesanan</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<section class="py-5">
    <br><br>
    <div class="container">
        <h2 class="text mb-4 mt-5">Daftar Pesanan</h2>
        <div class="table-responsive">
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nama User</th>
                        <th>ID Produk</th>
                        <th>Jumlah</th>
                        <th>Total Harga</th>
                        <th>Ongkos Kirim</th>
                        <th>Alamat</th>
                        <th>Tanggal Checkout</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($grouped_checkouts as $user_id => $user_checkouts) : ?>
                        <?php 
                        $total_price = 0;
                        foreach ($user_checkouts as $checkout) {
                            $total_price = $checkout["total_price"];
                        }
                        ?>
                        <?php foreach ($user_checkouts as $index => $checkout) : ?>
                            <tr>
                                <?php if ($index == 0) : ?>
                                    <td rowspan="<?= count($user_checkouts); ?>"><?= $checkout["id"]; ?></td>
                                    <td rowspan="<?= count($user_checkouts); ?>"><?= $checkout["username"]; ?></td>
                                <?php endif; ?>
                                <?php if ($index > 0) : ?>
                                    <td style="display:none;"></td>
                                    <td style="display:none;"></td>
                                <?php endif; ?>
                                <td><?= $checkout["product_id"]; ?></td>
                                <td><?= $checkout["quantity"]; ?></td>
                                <?php if ($index == 0) : ?>
                                    <td rowspan="<?= count($user_checkouts); ?>">Rp <?= number_format($total_price, 2, ',', '.'); ?></td>
                                <?php endif; ?>
                                <?php if ($index > 0) : ?>
                                    <td style="display:none;"></td>
                                <?php endif; ?>
                                <td>Rp <?= number_format($checkout["shipping_cost"], 2, ',', '.'); ?></td>
                                <?php if ($index == 0) : ?>
                                    <td rowspan="<?= count($user_checkouts); ?>"><?= $checkout["address"]; ?></td>
                                <?php endif; ?>
                                <?php if ($index > 0) : ?>
                                    <td style="display:none;"></td>
                                <?php endif; ?>
                                <td><?= $checkout["checkout_date"]; ?></td>
                                <td><?= $checkout["status"]; ?></td>
                                <td>
                                    <button class="btn btn-delete btn-sm" data-bs-toggle="modal" data-bs-target="#deleteModal" data-id="<?= $checkout['id']; ?>" data-bs-toggle="tooltip" data-bs-placement="top" title="Finish Order">
                                        <i class="bi bi-check-circle"></i> Finish
                                    </button>
                                </td>
                            </tr>
                        <?php endforeach; ?>
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
            <form action="../functions/finish.php" method="post">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteModalLabel">Konfirmasi Finish</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Apakah anda ingin mengubah status pesanan
                    <input type="hidden" name="id" id="delete-id">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-delete">Finish</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script src="../js/jquery-3.6.0.js"></script>
<script src="../bootstrap-5.0.2-dist/js/bootstrap.bundle.min.js"></script>
<script>
    $(document).ready(function(){
        $('[data-bs-toggle="tooltip"]').tooltip();
    });

    $('#deleteModal').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget);
        var id = button.data('id');
        var modal = $(this);
        modal.find('.modal-body #delete-id').val(id);
    });
</script>
</body>
</html>
