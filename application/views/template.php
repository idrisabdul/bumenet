<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Bumenet</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="<?= base_url() ?>/assets/img/Logo_Bumenet.png" rel="Logo_Bumenet">
  <link href="<?= base_url() ?>/assets/img/Logo_Bumenet.png" rel="Logo_Bumenet">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="<?= base_url() ?>/assets/vendor/animate.css/animate.min.css" rel="stylesheet">
  <link href="<?= base_url() ?>/assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="<?= base_url() ?>/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="<?= base_url() ?>/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="<?= base_url() ?>/assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="<?= base_url() ?>/assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="<?= base_url() ?>/assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="<?= base_url() ?>/assets/css/style.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: Mentor - v4.7.0
  * Template URL: https://bootstrapmade.com/mentor-free-education-bootstrap-theme/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top">
    <div class="container d-flex align-items-center">

      <h1 class="logo me-auto"><a href="index.html">Bumenet</a></h1>
      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <a href="index.html" class="logo me-auto"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

      <nav id="navbar" class="navbar order-last order-lg-0">
        <ul>
          <li><a class="active" href="index.html">Home</a></li>
          <!-- <li><a href="https://asset.bumenet.com">B-Asset</a></li> -->
          <li><a href="about.html">Tentang Kami</a></li>
          <li class="dropdown"><a href="#"><span>Produk & Layanan</span> <i class="bi bi-chevron-down"></i></a>
            <ul>
              <!-- <li class="dropdown"><a href="#"><span>Hosting dan Domain</span> <i class="bi bi-chevron-right"></i></a>
                <ul>
                  <li><a href="#">Domain</a></li>
                  <li><a href="#">Hosting</a></li>
                  <li><a href="#">Website Instan</a></li>
                </ul>
              </li>
              <li><a href="<?= base_url("Store") ?>">Hardware dan Software</a></li>
              <li><a href="#">Web Development</a></li> -->
              <li><a href="<?= base_url("Product") ?>">B-Asset</a></li>
              <li><a href="#">SysAdministrator</a></li>
              <li><a href="<?= base_url("Devops") ?>">DevOps</a></li>
              <li><a href="#">Courses</a></li>
            </ul>
          </li>
          <li class="dropdown"><a href="#"><span>Courses</span> <i class="bi bi-chevron-down"></i></a>
            <ul>
              <li><a href="#">Networking</a></li>
              <li class="dropdown"><a href="#"><span>Micro Office</span> <i class="bi bi-chevron-right"></i></a>
                <ul>
                  <li><a href="#">Ms Word</a></li>
                  <li><a href="#">Ms Excel</a></li>
                  <li><a href="#">Ms PowerPoint</a></li>
                </ul>
              </li>
              <li><a href="#">Web Programming</a></li>
              <li><a href="#">Cyber Security</a></li>
            </ul>
          </li>
          <li><a href="contact.html">Hubungi Kami</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

      <a href="https://asset.bumenet.com" class="get-started-btn">Try the Demo B-Asset</a>

    </div>
  </header><!-- End Header -->

  <!-- CONTENTS -->
  <?= $contents ?>
  <!-- END CONTENTS -->
  <!-- ======= Footer ======= -->
  <footer id="footer">

    <div class="footer-top">
      <div class="container">
        <div class="row">

          <div class="col-lg-3 col-md-6 footer-contact">
            <h3>Bumenet</h3>
            <p>
              <!-- A108 Adam Street <br>
              New York, NY 535022<br>
              United States <br><br> -->
              <strong>Phone:</strong> +62 896 4323 2281<br>
              <strong>Email:</strong> idrisaziz52@gmail.com<br>
            </p>
          </div>

          <div class="col-lg-2 col-md-6 footer-links">
            <h4>Useful Links</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Home</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">About us</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Services</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Terms of service</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Privacy policy</a></li>
            </ul>
          </div>

          <div class="col-lg-3 col-md-6 footer-links">
            <h4>Our Services</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="#">B-Asset</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">SysAdministrator</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">DevOps</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Courses</a></li>
            </ul>
          </div>

          <div class="col-lg-4 col-md-6 footer-newsletter">
            <h4>Join Our Newsletter</h4>
            <p>Tamen quem nulla quae legam multos aute sint culpa legam noster magna</p>
            <form action="" method="post">
              <input type="email" name="email"><input type="submit" value="Subscribe">
            </form>
          </div>

        </div>
      </div>
    </div>

    <div class="container d-md-flex py-4">

      <div class="me-md-auto text-center text-md-start">
        <div class="copyright">
          &copy; Copyright <strong><span>Bumenet</span></strong>. All Rights Reserved
        </div>
        <div class="credits">
          <!-- All the links in the footer should remain intact. -->
          <!-- You can delete the links only if you purchased the pro version. -->
          <!-- Licensing information: https://bootstrapmade.com/license/ -->
          <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/mentor-free-education-bootstrap-theme/ -->
          Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
        </div>
      </div>
      <div class="social-links text-center text-md-right pt-3 pt-md-0">
        <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
        <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
        <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
        <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
        <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
      </div>
    </div>
  </footer><!-- End Footer -->

  <div id="preloader"></div>
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="<?= base_url() ?>/assets/vendor/purecounter/purecounter.js"></script>
  <script src="<?= base_url() ?>/assets/vendor/aos/aos.js"></script>
  <script src="<?= base_url() ?>/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="<?= base_url() ?>/assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="<?= base_url() ?>/assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="<?= base_url() ?>/assets/js/main.js"></script>

</body>

</html>