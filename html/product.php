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
                    <a class="nav-link text-uppercase text-dark" href="index.php">home</a>
                </li>
                <li class="nav-item px-3 py-2">
                    <a class="nav-link active text-uppercase text-dark" href="product.php">product</a>
                </li>
                <li class="nav-item px-3 py-2">
                    <a class="nav-link text-uppercase text-dark" href="#special">about</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
<!-- end of navbar -->

    <!-- collection -->
    <section id="collection" class="py-5">
      <div class="container">
        <div class="title text-center">
          <h2 class="position-relative d-inline-block">New Collection</h2>
        </div>

        <div class="row g-0">
          <div
            class="d-flex flex-wrap justify-content-center mt-5 filter-button-group"
          >
            <button
              type="button"
              class="btn m-2 text-dark active-filter-btn"
              data-filter="*"
            >
              All
            </button>
            <button type="button" class="btn m-2 text-dark" data-filter=".best">
              Rods
            </button>
            <button
              type="button"
              class="btn m-2 text-dark"
              data-filter=".reels"
            >
              Reels
            </button>
            <button
              type="button"
              class="btn m-2 text-dark"
              data-filter=".float"
            >
              Float
            </button>
          </div>

          <div class="collection-list mt-4 row gx-0 gy-3">
            <div class="col-md-6 col-lg-4 col-xl-3 p-2 best">
              <div class="border">
                <div class="collection-img position-relative">
                  <div class="img-col position-relative overflow-hidden">
                    <img src="../images/F Rods/R1.png" class="w-100" />
                  </div>
                </div>
                <div class="text-center">
                  <p class="text-capitalize my-1">gray shirt</p>
                  <span class="fw-bold d-block">$ 45.50</span>
                  <a href="#" class="btn btn-primary mt-3 mb-4">Add to Cart</a>
                </div>
              </div>
            </div>

            <div class="col-md-6 col-lg-4 col-xl-3 p-2 best">
              <div class="border">
                <div class="collection-img position-relative">
                  <div class="img-col position-relative overflow-hidden">
                    <img src="../images/F Rods/R5.png" class="w-100" />
                  </div>
                </div>
                <div class="text-center">
                  <p class="text-capitalize my-1">gray shirt</p>
                  <span class="fw-bold d-block">$ 45.50</span>
                  <a href="#" class="btn btn-primary mt-3 mb-4">Add to Cart</a>
                </div>
              </div>
            </div>

            <div class="col-md-6 col-lg-4 col-xl-3 p-2 best">
              <div class="border">
                <div class="collection-img position-relative">
                  <div class="img-col position-relative overflow-hidden">
                    <img src="../images/F Rods/R4.png" class="w-100" />
                  </div>
                </div>
                <div class="text-center">
                  <p class="text-capitalize my-1">gray shirt</p>
                  <span class="fw-bold d-block">$ 45.50</span>
                  <a href="#" class="btn btn-primary mt-3 mb-4">Add to Cart</a>
                </div>
              </div>
            </div>

            <div class="col-md-6 col-lg-4 col-xl-3 p-2 reels">
              <div class="border">
                <div class="collection-img position-relative">
                  <div class="img-col position-relative overflow-hidden">
                    <img src="../images/F Reels/RE3.png" class="w-100" />
                  </div>
                </div>
                <div class="text-center">
                  <p class="text-capitalize my-1">gray shirt</p>
                  <span class="fw-bold d-block">$ 45.50</span>
                  <a href="#" class="btn btn-primary mt-3 mb-4">Add to Cart</a>
                </div>
              </div>
            </div>

            <div class="col-md-6 col-lg-4 col-xl-3 p-2 reels">
              <div class="border">
                <div class="collection-img position-relative">
                  <div class="img-col position-relative overflow-hidden">
                    <img src="../images/F Reels/RE7.png" class="w-100" />
                  </div>
                </div>
                <div class="text-center">
                  <p class="text-capitalize my-1">gray shirt</p>
                  <span class="fw-bold d-block">$ 45.50</span>
                  <a href="#" class="btn btn-primary mt-3 mb-4">Add to Cart</a>
                </div>
              </div>
            </div>

            <div class="col-md-6 col-lg-4 col-xl-3 p-2 reels">
              <div class="border">
                <div class="collection-img position-relative">
                  <div class="img-col position-relative overflow-hidden">
                    <img src="../images/F Reels/RE9.png" class="w-100" />
                  </div>
                </div>
                <div class="text-center">
                  <p class="text-capitalize my-1">gray shirt</p>
                  <span class="fw-bold d-block">$ 45.50</span>
                  <a href="#" class="btn btn-primary mt-3 mb-4">Add to Cart</a>
                </div>
              </div>
            </div>

            <div class="col-md-6 col-lg-4 col-xl-3 p-2 float">
              <div class="border">
                <div class="collection-img position-relative">
                  <div class="img-col position-relative overflow-hidden">
                    <img src="../images/F Float/F1.png" class="w-100" />
                  </div>
                </div>
                <div class="text-center">
                  <p class="text-capitalize my-1">gray shirt</p>
                  <span class="fw-bold d-block">$ 45.50</span>
                  <a href="#" class="btn btn-primary mt-3 mb-4">Add to Cart</a>
                </div>
              </div>
            </div>

            <div class="col-md-6 col-lg-4 col-xl-3 p-2 float">
              <div class="border">
                <div class="collection-img position-relative">
                  <div class="img-col position-relative overflow-hidden">
                    <img src="../images/F Float/F4.png" class="w-100" />
                  </div>
                </div>
                <div class="text-center">
                  <p class="text-capitalize my-1">gray shirt</p>
                  <span class="fw-bold d-block">$ 45.50</span>
                  <a href="#" class="btn btn-primary mt-3 mb-4">Add to Cart</a>
                </div>
              </div>
            </div>

            <div class="col-md-6 col-lg-4 col-xl-3 p-2 float">
              <div class="border">
                <div class="collection-img position-relative">
                  <div class="img-col position-relative overflow-hidden">
                    <img src="../images/F Float/F7.png" class="w-100" />
                  </div>
                </div>
                <div class="text-center">
                  <p class="text-capitalize my-1">gray shirt</p>
                  <span class="fw-bold d-block">$ 45.50</span>
                  <a href="#" class="btn btn-primary mt-3 mb-4">Add to Cart</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- end of collection -->

    <!-- jquery -->
    <script src="../js/jquery-3.6.0.js"></script>
    <!-- isotope js -->
    <script src="https://unpkg.com/isotope-layout@3/dist/isotope.pkgd.js"></script>
    <!-- bootstrap js -->
    <script src="bootstrap-5.0.2-dist/js/bootstrap.min.js"></script>
    <!-- custom js -->
    <script src="../js/script.js"></script>
  </body>
</html>
