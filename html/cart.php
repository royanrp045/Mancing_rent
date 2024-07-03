<?php
session_start();

// Koneksi ke database
$conn = mysqli_connect("localhost", "root", "", "mancing_rent");

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Fungsi untuk mengambil item dari keranjang belanja
function fetch_cart_items($user_id, $conn) {
    $query = "SELECT cart.quantity, product.nama, product.harga, product.gambar 
              FROM cart 
              INNER JOIN product ON cart.product_id = product.id 
              WHERE cart.user_id = '$user_id'";
    
    $result = mysqli_query($conn, $query);

    if (!$result) {
        die("Query failed: " . mysqli_error($conn));
    }

    $cart_items = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $cart_items[] = $row;
    }

    return $cart_items;
}

// Fungsi untuk mengonversi harga ke format mata uang rupiah
function format_rupiah($harga) {
    return "Rp " . number_format($harga, 0, ',', '.');
}

// Mendapatkan user_id dari session
if (!isset($_SESSION['user_id'])) {
    die("User not logged in.");
}

$user_id = $_SESSION['user_id'];

// Mengambil data keranjang belanja pengguna
$cart_items = fetch_cart_items($user_id, $conn);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mancing Rent - Cart</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="../bootstrap-5.0.2-dist/css/bootstrap.min.css" />
    <link rel="stylesheet" href="../css/about.css" />
    <style>
        .cart-item img {
            max-height: 100px;
            width: 100px;
            object-fit: contain;
        }
        .btn-cart {
            background-color: #fff;
            border-color: #0395c8;
        }
        .btn-cart:hover {
            background-color: #0395c8;
        }
        .shopping-cart-icon {
            background-color: #0395c8;
        }
        .summary {
            background-color: #0395c8;
            border-radius: 20px;
        }
    </style>
</head>
<body>
<!-- navbar -->
<nav class="navbar navbar-expand-lg navbar-light bg-white py-4 fixed-top">
    <div class="container">
        <a class="navbar-brand d-flex justify-content-between align-items-center order-lg-0" href="index.html">
            <span class="text-uppercase fw-lighter ms-2">Mancing Rent</span>
        </a>
        <div class="order-lg-2 nav-btns">
            <?php if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true): ?>
                <div class="btn-group d-flex align-items-center">
                    <div class="welcome-text me-2">Welcome, <?= $_SESSION['username']; ?></div>
                    <form action="../functions/logout.php" method="post">
                        <button type="submit" class="btn position-relative">
                            <a class="btn text-uppercase">Logout</a>
                        </button>
                    </form>
                    <button type="button" class="btn position-relative" onclick="window.location.href='cart.php'">
                        <i class="fa fa-shopping-cart"></i>
                        <span class="position-absolute top-0 start-100 translate-middle badge bg-primary"><?= count($cart_items); ?></span>
                    </button>
                    <button type="button" class="btn position-relative">
                        <i class="fa fa-search"></i>
                    </button>
                </div>
            <?php else: ?>
                <button type="button" class="btn position-relative">
                    <a href="login.php" class="btn text-uppercase">Login</a>
                </button>
                <button type="button" class="btn position-relative" onclick="window.location.href='cart.php'">
                    <i href="cart.php" class="fa fa-shopping-cart"></i>
                    <span class="position-absolute top-0 start-100 translate-middle badge bg-primary"><?= count($cart_items); ?></span>
                </button>
                <button type="button" class="btn position-relative">
                    <i class="fa fa-search"></i>
                </button>
            <?php endif; ?>
        </div>
        <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navMenu">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse order-lg-1" id="navMenu">
            <ul class="navbar-nav mx-auto text-center">
                <li class="nav-item px-3 py-2">
                    <a class="nav-link text-uppercase text-dark" href="index.php">home</a>
                </li>
                <li class="nav-item px-3 py-2">
                    <a class="nav-link text-uppercase text-dark" href="product.php">product</a>
                </li>
                <li class="nav-item px-3 py-2">
                    <a class="nav-link text-uppercase text-dark" href="about.php">about</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
<!-- end of navbar -->

<!-- Cart Section -->
<h2>|<br>|<br>.</h2>
<div class="container mt-5">
    <div class="row">
        <div class="col-lg-8 mb-4">
            <h2>Rent Cart</h2>
            <?php foreach ($cart_items as $item): ?>
                <div class="cart-item d-flex justify-content-between align-items-center py-2">
                    <img src="<?php echo htmlspecialchars($item['gambar']); ?>" alt="Product Image" class="img-fluid" width="100"/>
                    <span><?php echo htmlspecialchars($item['nama']); ?></span>
                    <div class="quantity">
                        <button class="btn-cart btn-outline-secondary btn-sm" onclick="decreaseQuantity(this)">-</button>
                        <span class="mx-2"><?php echo htmlspecialchars($item['quantity']); ?></span>
                        <button class="btn-cart btn-outline-secondary btn-sm" onclick="increaseQuantity(this)">+</button>
                    </div>
                    <span><?php echo format_rupiah($item['harga']); ?></span>
                    <button class="btn btn-sm" onclick="removeItem(this)">x</button>
                </div>
            <?php endforeach; ?>
        </div>
        <div class="col-lg-4">
            <div class="summary p-4">
                <h4>Summary</h4>
                <p>Items: <span id="item-count"><?= count($cart_items); ?></span></p>
                <p>
                    Shipping:
                    <select class="form-select" id="shipping-cost">
                        <option value="0">Ambil Ditempat - Rp 0</option>
                        <option value="5000">Cod - Rp 5.000</option>
                    </select>
                </p>
                <form action="../functions/checkout.php" method="post">
                <p>
                    Alamat <input type="text" class="form-control" name="address" placeholder="Enter your address"/>
                </p>
                <p>Total Price: <span id="total-price"></span></p>
                    <input type="hidden" name="total_price" id="hidden-total-price" value="">
                    <input type="hidden" name="shipping_cost" id="hidden-shipping-cost" value="">
                    <button type="submit" class="btn btn-dark w-100">CHECKOUT</button>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- End Cart Section -->

<!-- Footer -->
<footer class="bg-dark py-5 mt-5 fixed-bottom">
    <div class="container">
        <div class="row text-white g-4">
            <div class="col-md-6 col-lg-3">
                <a class="text-uppercase text-decoration-none brand text-white" href="#header">Mancing Rent</a>
                <p class="text-white text-muted mt-3">Mancing rent adalah tempat persewaan alat alat pancing terlengkap termurah terbest pokoknya, harga dijamin lebih murah dari yang lain.</p>
            </div>
            <div class="col-md-6 col-lg-3">
                <h5 class="fw-light">Links</h5>
                <ul class="list-unstyled">
                    <li class="my-3">
                        <a href="#header" class="text-white text-decoration-none text-muted">
                            <i class="fas fa-chevron-right me-1"></i> Home
                        </a>
                    </li>
                    <li class="my-3">
                        <a href="product.php" class="text-white text-decoration-none text-muted">
                            <i class="fas fa-chevron-right me-1"></i> Product
                        </a>
                    </li>
                    <li class="my-3">
                        <a href="about.php" class="text-white text-decoration-none text-muted">
                            <i class="fas fa-chevron-right me-1"></i> About
                        </a>
                    </li>
                </ul>
            </div>
            <div class="col-md-6 col-lg-3">
                <h5 class="fw-light mb-3">Contact Us</h5>
                <div class="d-flex justify-content-start align-items-start my-2 text-muted">
                    <span class="me-3">
                        <i class="fas fa-map-marked-alt"></i>
                    </span>
                    <span class="fw-light">
                        Yogyakarta, Indonesia
                    </span>
                </div>
                <div class="d-flex justify-content-start align-items-start my-2 text-muted">
                    <span class="me-3">
                        <i class="fas fa-envelope"></i>
                    </span>
                    <span class="fw-light">
                        royanpalingganteng@gmail.com
                    </span>
                </div>
                <div class="d-flex justify-content-start align-items-start my-2 text-muted">
                    <span class="me-3">
                        <i class="fas fa-phone-alt"></i>
                    </span>
                    <span class="fw-light">
                        +62 987 6321 4578
                    </span>
                </div>
            </div>
            <div class="col-md-6 col-lg-3">
                <h5 class="fw-light mb-3">Follow Us</h5>
                <div>
                    <ul class="list-unstyled d-flex">
                        <li>
                            <a href="#" class="text-white text-decoration-none text-muted fs-4 me-4">
                                <i class="fab fa-facebook-f"></i>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="text-white text-decoration-none text-muted fs-4 me-4">
                                <i class="fab fa-twitter"></i>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="text-white text-decoration-none text-muted fs-4 me-4">
                                <i class="fab fa-instagram"></i>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- End Footer -->

<!-- jQuery -->
<script src="../js/jquery-3.6.0.js"></script>
<!-- Bootstrap JS -->
<script src="../bootstrap-5.0.2-dist/js/bootstrap.bundle.min.js"></script>
<!-- Custom JS (if any) -->
<script src="../js/cart.js"></script>
<script>
    function updateTotalPrice() {
        let itemsCount = <?= count($cart_items); ?>;
        let totalPrice = 0;

        // Hitung total harga berdasarkan jumlah dan harga setiap item
        <?php foreach ($cart_items as $item): ?>
            totalPrice += <?= $item['quantity']; ?> * <?= $item['harga']; ?>;
        <?php endforeach; ?>

        // Dapatkan biaya pengiriman yang dipilih
        let shippingCost = parseInt(document.getElementById('shipping-cost').value);

        // Perbarui elemen total harga di HTML dengan format mata uang rupiah
        document.getElementById('total-price').innerText = "Rp " + (totalPrice + shippingCost).toLocaleString();

        // Perbarui hidden inputs
        document.getElementById('hidden-total-price').value = totalPrice;
        document.getElementById('hidden-shipping-cost').value = shippingCost;
    }

    // Panggil fungsi ini awalnya untuk mengatur total harga
    updateTotalPrice();

    // Tambahkan event listener untuk memperbarui total harga saat pilihan pengiriman berubah
    document.getElementById('shipping-cost').addEventListener('change', function() {
        updateTotalPrice();
    });
</script>
</body>
</html>

<?php
// Tutup koneksi setelah selesai digunakan
mysqli_close($conn);
?>
