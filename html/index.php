<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Bootstrap demo</title>
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
    <link rel="stylesheet" href="../css/main.css" />
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
                    <a class="nav-link active text-uppercase text-dark" href="index.php">home</a>
                </li>
                <li class="nav-item px-3 py-2">
                    <a class="nav-link text-uppercase text-dark" href="product.php">product</a>
                </li>
                <li class="nav-item px-3 py-2">
                    <a class="nav-link text-uppercase text-dark" href="#special">about</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
<!-- end of navbar -->

    <!-- header -->
    <header
      id="header"
      class="vh-100 carousel slide"
      data-bs-ride="carousel"
      style="padding-top: 104px"
    >
      <div class="container h-100 d-flex align-items-center carousel-inner">
        <div class="text-center carousel-item active">
          <h2 class="text-capitalize text-black">Rental Pancing Terbaik</h2>
          <h1 class="text-uppercase py-2 fw-bold text-black">Mancing Rent</h1>
          <a href="product.php" class="btn mt-3 text-uppercase">rent now</a>
        </div>
        <div class="text-center carousel-item">
          <h2 class="text-capitalize text-black">Terjamin</h2>
          <h1 class="text-uppercase py-2 fw-bold text-black">
            Harga Bersahabat
          </h1>
          <a href="product.php" class="btn mt-3 text-uppercase">rent now</a>
        </div>
      </div>

      <button
        class="carousel-control-prev"
        type="button"
        data-bs-target="#header"
        data-bs-slide="prev"
      >
        <span class="carousel-control-prev-icon"></span>
      </button>
      <button
        class="carousel-control-next"
        type="button"
        data-bs-target="#header"
        data-bs-slide="next"
      >
        <span class="carousel-control-next-icon"></span>
      </button>
    </header>
    <!-- end of header -->

    <!-- special products -->
    <section id="special" class="py-5">
      <div class="container">
        <div class="title text-center py-5">
          <h2 class="position-relative d-inline-block">Special Selection</h2>
        </div>

        <div class="special-list row g-0">
          <div class="col-md-6 col-lg-4 col-xl-3 p-2">
            <div class="special-img position-relative overflow-hidden">
              <img src="../images/image 8.png" class="w-100" />
            </div>
            <div class="text-center">
              <p class="text-capitalize mt-3 mb-1">gray shirt</p>
              <span class="fw-bold d-block">$ 45.50</span>
              <a href="#" class="btn btn-primary mt-3">Add to Cart</a>
            </div>
          </div>

          <div class="col-md-6 col-lg-4 col-xl-3 p-2">
            <div class="special-img position-relative overflow-hidden">
              <img src="../images/gulungan.png" class="w-100" />
            </div>
            <div class="text-center">
              <p class="text-capitalize mt-3 mb-1">gray shirt</p>
              <span class="fw-bold d-block">$ 45.50</span>
              <a href="#" class="btn btn-primary mt-3">Add to Cart</a>
            </div>
          </div>

          <div class="col-md-6 col-lg-4 col-xl-3 p-2">
            <div class="special-img position-relative overflow-hidden">
              <img src="../images/tas.png" class="w-100" />
            </div>
            <div class="text-center">
              <p class="text-capitalize mt-3 mb-1">gray shirt</p>
              <span class="fw-bold d-block">$ 45.50</span>
              <a href="#" class="btn btn-primary mt-3">Add to Cart</a>
            </div>
          </div>

          <div class="col-md-6 col-lg-4 col-xl-3 p-2">
            <div class="special-img position-relative overflow-hidden">
              <img src="../images/kursi.png" class="w-100" />
            </div>
            <div class="text-center">
              <p class="text-capitalize mt-3 mb-1">gray shirt</p>
              <span class="fw-bold d-block">$ 45.50</span>
              <a href="#" class="btn btn-primary mt-3">Add to Cart</a>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- end of special products -->

    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
      crossorigin="anonymous"
    ></script>
  </body>
</html>
