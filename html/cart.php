<?php
session_start();
require '../functions/connect.php';
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Mancing Rent</title>
    <!-- fontawesome cdn -->
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"
      integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    />
    <!-- bootstrap css -->
    <link
      rel="stylesheet"
      href="../bootstrap-5.0.2-dist/css/bootstrap.min.css"
    />
    <!-- custom css -->
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
                    <button type="button" class="btn position-relative">
                        <i class="fa fa-shopping-cart"></i>
                        <span class="position-absolute top-0 start-100 translate-middle badge bg-primary">5</span>
                    </button>
                    <button type="button" class="btn position-relative">
                        <i class="fa fa-search"></i>
                    </button>
                </div>
            <?php else: ?>
                <button type="button" class="btn position-relative">
                    <a href="login.php" class="btn text-uppercase">Login</a>
                </button>
                <button type="button" class="btn position-relative">
                    <i class="fa fa-shopping-cart"></i>
                    <span class="position-absolute top-0 start-100 translate-middle badge bg-primary">5</span>
                </button>
                <button type="button" class="btn position-relative">
                    <i class="fa fa-search"></i>
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

<!-- Cart -->
<h2>|<br>|<br>.</h2>
<div class="container mt-5">
      <div class="row">
        <div class="col-lg-8 mb-4">
          <h2>Rent Cart</h2>
          <div class="cart-item d-flex justify-content-between align-items-center py-2">
            <img src="../images/F Reels/RE7.png" alt="T-shirt" class="img-fluid" width="100"/>
            <span>Reels</span>
            <div class="quantity">
              <button class="btn-cart btn-outline-secondary btn-sm" onclick="decreaseQuantity(this)">
                -
              </button>
              <span class="mx-2">1</span>
              <button class="btn-cart btn-outline-secondary btn-sm" onclick="increaseQuantity(this)">
                +
              </button>
            </div>
            <span>50000</span>
            <button class="btn btn-sm" onclick="removeItem(this)">x</button>
          </div>
          <div class="cart-item d-flex justify-content-between align-items-center py-2">
            <img src="../images/F Float/F5.png" alt="T-shirt" class="img-fluid" width="100"/>
            <span>Float</span>
            <div class="quantity">
              <button class="btn-cart btn-outline-secondary btn-sm" onclick="decreaseQuantity(this)">
                -
              </button>
              <span class="mx-2">1</span>
              <button class="btn-cart btn-outline-secondary btn-sm" onclick="increaseQuantity(this)">
                +
              </button>
            </div>
            <span>50000</span>
            <button class="btn btn-sm" onclick="removeItem(this)">x</button>
          </div>
        </div>
        <div class="col-lg-4">
          <div class="summary p-4">
            <h4>Summary</h4>
            <p>Items: <span id="item-count">3</span></p>
            <p>
              Shipping:
              <select class="form-select" id="shipping-cost">
                <option value="0">Ambil Ditempat - 0</option>
                <option value="5000">Cod - 5000</option>
              </select>
            </p>
            <p>
              Alamat <input type="text" class="form-control" placeholder="Enter your address"/>
            </p>
            <p>Total Price: <span id="total-price">92000</span></p>
            <button class="btn btn-dark w-100">CHECKOUT</button>
          </div>
        </div>
      </div>
    </div>
<!-- End cart -->


     <!-- footer -->
     <footer class = "bg-dark py-5 mt-5 fixed-bottom">
        <div class = "container">
            <div class = "row text-white g-4">
                <div class = "col-md-6 col-lg-3">
                    <a class = "text-uppercase text-decoration-none brand text-white" href = "#header">Mancing Rent</a>
                    <p class = "text-white text-muted mt-3">Mancing rent adalah tempat persewaan alat alat pancing terlengkap termurah terbest pokoknya, harga dijamin lebih murah dari yang lain.</p>
                </div>

                <div class = "col-md-6 col-lg-3">
                    <h5 class = "fw-light">Links</h5>
                    <ul class = "list-unstyled">
                        <li class = "my-3">
                            <a href = "#header" class = "text-white text-decoration-none text-muted">
                                <i class = "fas fa-chevron-right me-1"></i> Home
                            </a>
                        </li>
                        <li class = "my-3">
                            <a href = "product.php" class = "text-white text-decoration-none text-muted">
                                <i class = "fas fa-chevron-right me-1"></i> Product
                            </a>
                        </li>
                        <li class = "my-3">
                            <a href = "about.php" class = "text-white text-decoration-none text-muted">
                                <i class = "fas fa-chevron-right me-1"></i> About
                            </a>
                        </li>
                    </ul>
                </div>

                <div class = "col-md-6 col-lg-3">
                    <h5 class = "fw-light mb-3">Contact Us</h5>
                    <div class = "d-flex justify-content-start align-items-start my-2 text-muted">
                        <span class = "me-3">
                            <i class = "fas fa-map-marked-alt"></i>
                        </span>
                        <span class = "fw-light">
                            Yogyakarta, Indonesia
                        </span>
                    </div>
                    <div class = "d-flex justify-content-start align-items-start my-2 text-muted">
                        <span class = "me-3">
                            <i class = "fas fa-envelope"></i>
                        </span>
                        <span class = "fw-light">
                            royanpalingganteng@gmail.com
                        </span>
                    </div>
                    <div class = "d-flex justify-content-start align-items-start my-2 text-muted">
                        <span class = "me-3">
                            <i class = "fas fa-phone-alt"></i>
                        </span>
                        <span class = "fw-light">
                            +62 987 6321 4578
                        </span>
                    </div>
                </div>

                <div class = "col-md-6 col-lg-3">
                    <h5 class = "fw-light mb-3">Follow Us</h5>
                    <div>
                        <ul class = "list-unstyled d-flex">
                            <li>
                                <a href = "#" class = "text-white text-decoration-none text-muted fs-4 me-4">
                                    <i class = "fab fa-facebook-f"></i>
                                </a>
                            </li>
                            <li>
                                <a href = "#" class = "text-white text-decoration-none text-muted fs-4 me-4">
                                    <i class = "fab fa-twitter"></i>
                                </a>
                            </li>
                            <li>
                                <a href = "#" class = "text-white text-decoration-none text-muted fs-4 me-4">
                                    <i class = "fab fa-instagram"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- end of footer -->



    <!-- jquery -->
    <script src="../js/jquery-3.6.0.js"></script>
    <!-- isotope js -->
    <script src="https://unpkg.com/isotope-layout@3/dist/isotope.pkgd.js"></script>
    <!-- bootstrap js -->
    <script src="bootstrap-5.0.2-dist/js/bootstrap.min.js"></script>
    <!-- custom js -->
    <script src="../js/cart.js"></script>
    
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
      crossorigin="anonymous"
    ></script>
  </body>
</html>
