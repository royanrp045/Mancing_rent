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
            <?php if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true): ?>
                <!-- Jika sudah login -->
                <div class="btn-group d-flex align-items-center">
                    <div class="welcome-text me-2">Welcome, <?php echo $_SESSION['username']; ?></div>
                    <form action="../functions/logout.php" method="post">
                        <button type="submit" class="btn position-relative">
                    <a class="btn text-uppercase">Logout</a>
                </button>
                    </form>
                    <button type="button" class="btn position-relative" onclick="window.location.href='cart.php'">
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
                <button type="button" class="btn position-relative" onclick="window.location.href='cart.php'">
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
                    <a class="nav-link text-uppercase text-dark" href="about.php">about</a>
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
              <p class="text-capitalize mt-3 mb-1">Pancing</p>
              <span class="fw-bold d-block">$ 45.50</span>
              <a href="#" class="btn btn-primary mt-3">Add to Cart</a>
            </div>
          </div>

          <div class="col-md-6 col-lg-4 col-xl-3 p-2">
            <div class="special-img position-relative overflow-hidden">
              <img src="../images/gulungan.png" class="w-100" />
            </div>
            <div class="text-center">
              <p class="text-capitalize mt-3 mb-1">Kolor</p>
              <span class="fw-bold d-block">$ 45.50</span>
              <a href="#" class="btn btn-primary mt-3">Add to Cart</a>
            </div>
          </div>

          <div class="col-md-6 col-lg-4 col-xl-3 p-2">
            <div class="special-img position-relative overflow-hidden">
              <img src="../images/tas.png" class="w-100" />
            </div>
            <div class="text-center">
              <p class="text-capitalize mt-3 mb-1">Tas</p>
              <span class="fw-bold d-block">$ 45.50</span>
              <a href="#" class="btn btn-primary mt-3">Add to Cart</a>
            </div>
          </div>

          <div class="col-md-6 col-lg-4 col-xl-3 p-2">
            <div class="special-img position-relative overflow-hidden">
              <img src="../images/kursi.png" class="w-100" />
            </div>
            <div class="text-center">
              <p class="text-capitalize mt-3 mb-1">Kursi</p>
              <span class="fw-bold d-block">$ 45.50</span>
              <a href="#" class="btn btn-primary mt-3">Add to Cart</a>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- end of special products -->

      <!-- blogs -->
      <section id = "offers" class = "py-5">
        <div class = "container">
            <div class = "row d-flex align-items-center justify-content-center text-center justify-content-lg-start text-lg-start">
                <div class = "offers-content">
                    <span class = "text-white">Tempat kami terjamin</span>
                    <h2 class = "mt-2 mb-4 text-white">100% Lebih Murah !!!</h2>
                    <a href = "#" class = "btn">Rent Now</a>
                </div>
            </div>
        </div>
    </section>
    <!-- end of blogs -->

    <section id = "sec-5" class = "py-5">
        <div class = "container my-4">
            <div class = "row mb-5">
                <div class = "col text-center">
                <div class="title text-center">
          <h2 class="position-relative d-inline-block">Video Promosi</h2>
        </div>
                    <p class = "lh-lg fw-light pt-2 w-75 mx-auto">Lorem ipsum dolor sit amet consectetur adipisicing elit. Architecto, alias a natus deleniti neque ad cupiditate dicta explicabo nemo vel?</p>
                </div>
            </div>

            <div class = "row">
                <video controls>
                    <source src = "../images/video.mp4" type = "video/mp4">
                </video>
            </div>
        </div>
    </section>



    <section id = "sec-3" class = "py-5 text-black">
           <div class = "container my-4">
               <div class = "row mb-5">
                   <div class = "col text-center">
                   <div class="title text-center">
                        <h2 class="position-relative d-inline-block">Pengalaman</h2>
                    </div>
                       <p class = "lh-lg fw-light pt-2 w-75 mx-auto">Lorem ipsum dolor sit amet consectetur adipisicing elit. Architecto, alias a natus deleniti neque ad cupiditate dicta explicabo nemo vel?</p>
                   </div>
               </div>
               <div class = "row">
                   <div class = "col-lg-6 text-center text-sm-start mb-4">
                       <div class = "row">
                            <div class = "col-sm-2 d-sm-flex justify-content-sm-end">
                                <span class = "d-flex align-items-center justify-content-center circle-icon bg-white text-green mx-sm-0 mx-auto mb-4">
                                    <i class = "fa fa-dot-circle fs-2"></i>
                                </span>
                            </div>
                            <div class = "col-sm-10">
                                <h4>100% Vectors</h4>
                                <p class = "lh-lg">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Asperiores voluptatum ab a inventore neque. Tempora?</p>
                            </div>
                       </div>
                   </div>

                   <div class = "col-lg-6 text-center text-sm-start mb-4">
                       <div class = "row">
                            <div class = "col-sm-2 d-sm-flex justify-content-sm-end">
                                <span class = "d-flex align-items-center justify-content-center circle-icon bg-white text-green mx-sm-0 mx-auto mb-4">
                                    <i class = "fa fa-cog fs-2"></i>
                                </span>
                            </div>
                            <div class = "col-sm-10">
                                <h4>Preference Panel</h4>
                                <p class = "lh-lg">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Asperiores voluptatum ab a inventore neque. Tempora?</p>
                            </div>
                       </div>
                   </div>

                   <div class = "col-lg-6 text-center text-sm-start mb-4">
                       <div class = "row">
                            <div class = "col-sm-2 d-sm-flex justify-content-sm-end">
                                <span class = "d-flex align-items-center justify-content-center circle-icon bg-white text-green mx-sm-0 mx-auto mb-4">
                                    <i class = "fa fa-tv fs-2"></i>
                                </span>
                            </div>
                            <div class = "col-sm-10">
                                <h4>Retina Ready</h4>
                                <p class = "lh-lg">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Asperiores voluptatum ab a inventore neque. Tempora?</p>
                            </div>
                       </div>
                   </div>

                   <div class = "col-lg-6 text-center text-sm-start mb-4">
                       <div class = "row">
                            <div class = "col-sm-2 d-sm-flex justify-content-sm-end">
                                <span class = "d-flex align-items-center justify-content-center circle-icon bg-white text-green mx-sm-0 mx-auto mb-4">
                                    <i class = "fa fa-crop fs-2"></i>
                                </span>
                            </div>
                            <div class = "col-sm-10">
                                <h4>Pixel Perfect</h4>
                                <p class = "lh-lg">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Asperiores voluptatum ab a inventore neque. Tempora?</p>
                            </div>
                       </div>
                   </div>
               </div>
           </div>
       </section>

    <!-- footer -->
    <footer class = "bg-dark py-5 mt-5">
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

    
    <script src = "bootstrap/js/bootstrap.js"></script>
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
      crossorigin="anonymous"
    ></script>
  </body>
</html>
