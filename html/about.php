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
    .larger-image {
        width: 100%;
        max-width: 1000px; /* Ubah ukuran maksimal sesuai kebutuhan Anda */
        height: auto;
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
                    <a class="nav-link active text-uppercase text-dark" href="about.php">about</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
<!-- end of navbar -->

 <!-- Header -->
<header id="header" class="vh-100 carousel slide" data-bs-ride="carousel" style="padding-top: 40px;">
    <div class="container h-100 d-flex align-items-center carousel-inner">
        <div class="carousel-item active w-100">
            <div class="row w-100">
                <div class="col-lg-6 d-flex flex-column justify-content-center">
                    <h1 class="text-uppercase py-2 text-white mb-3">Mancing Rent</h1>
                    <span class="text-white"><br>Mancing rent adalah tempat persewaan alat pancing terbaik Disini tersedia alat alat yang super lengkap Dan kualitas yang pasti tidak dapat diragukan</span>
                </div>
                <div class="col-lg-6 d-flex justify-content-end">
                    <img src="../images/about.png" alt="" class="img-fluid larger-image">
                </div>
            </div>
        </div>
    </div>
</header>
<!-- End Header -->

<!-- Kepuasan -->
<section id = "sec-6" class = "py-5">
        <div class = "container my-4">
            <div class = "row mb-5">
                <div class = "col-12 text-center text-black">
                    <h3 class = "mb-4">App Statistics</h3>
                    <p class = "lh-lg fw-light pt-2 w-75 mx-auto">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Adipisci aut nemo exercitationem qui numquam aliquid natus explicabo, deserunt repudiandae sit in animi cupiditate rem quia?</p>
                </div>
            </div>
            <div class = "row text-uppercase text-center text-black">
                <div class = "col-md-6 col-lg-3 mb-5">
                    <div class = "circle-icon bg-black text-blue d-flex align-items-center justify-content-center mx-auto mb-4 fs-2 fw-bold">
                        200+
                    </div>
                    <h6>projects</h6>
                </div>

                <div class = "col-md-6 col-lg-3 mb-5">
                    <div class = "circle-icon bg-black text-blue d-flex align-items-center justify-content-center mx-auto mb-4 fs-2 fw-bold">
                        50+
                    </div>
                    <h6>happy clients</h6>
                </div>

                <div class = "col-md-6 col-lg-3 mb-5">
                    <div class = "circle-icon bg-black text-blue d-flex align-items-center justify-content-center mx-auto mb-4 fs-2 fw-bold">
                        90%
                    </div>
                    <h6>repeat </h6>
                </div>

                <div class = "col-md-6 col-lg-3 mb-5">
                    <div class = "circle-icon bg-black text-blue d-flex align-items-center justify-content-center mx-auto mb-4 fs-2 fw-bold">
                        9/10
                    </div>
                    <h6>average rating</h6>
                </div>
            </div>
        </div>
    </section>
    <!-- Kepuasan -->

    <!-- Maps -->
    <section id = "sec-5" class = "py-5">
        <div class = "container my-4">
            <div class = "row mb-5">
                <div class = "col text-center">
                <div class="title text-center">
          <h2 class="position-relative d-inline-block">Maps</h2>
        </div>
                    <p class = "lh-lg fw-light pt-2 w-75 mx-auto">Lorem ipsum dolor sit amet consectetur adipisicing elit. Architecto, alias a natus deleniti neque ad cupiditate dicta explicabo nemo vel?</p>
                </div>
            </div>

            <div class = "row">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3953.2818903270854!2d110.40647117595424!3d-7.759899576958421!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e7a599bd3bdc4ef%3A0x6f1714b0c4544586!2sUniversity%20of%20Amikom%20Yogyakarta!5e0!3m2!1sen!2sid!4v1718611135596!5m2!1sen!2sid" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
        </div>
    </section>
    <!-- End Maps -->

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



    <!-- jquery -->
    <script src="../js/jquery-3.6.0.js"></script>
    <!-- isotope js -->
    <script src="https://unpkg.com/isotope-layout@3/dist/isotope.pkgd.js"></script>
    <!-- bootstrap js -->
    <script src="bootstrap-5.0.2-dist/js/bootstrap.min.js"></script>
    <!-- custom js -->
    <script src="../js/script.js"></script>
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
      crossorigin="anonymous"
    ></script>
  </body>
</html>
