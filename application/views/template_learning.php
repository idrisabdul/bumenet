<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Learning - Bumenet</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="<?= base_url() ?>assets/assets-admin/img/favicon-bumenet.png" rel="icon">
  <link href="<?= base_url() ?>assets/assets-admin/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link
    href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
    rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="<?= base_url() ?>assets/assets-admin/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="<?= base_url() ?>assets/assets-admin/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="<?= base_url() ?>assets/assets-admin/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="<?= base_url() ?>assets/assets-admin/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="<?= base_url() ?>assets/assets-admin/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="<?= base_url() ?>assets/assets-admin/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="<?= base_url() ?>assets/assets-admin/vendor/simple-datatables/style.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="<?= base_url() ?>assets/assets-admin/css/style.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: NiceAdmin
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Updated: Mar 17 2024 with Bootstrap v5.3.3
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body class="toggle-sidebar">

  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
      <a href="" class="logo d-flex align-items-center">
        <img src="<?= base_url() ?>assets/img/logo.png" alt="">
        <span class="d-none d-lg-block">B-Learning</span>
      </a>
      <!-- <i class="bi bi-list toggle-sidebar-btn"></i> -->
    </div><!-- End Logo -->

   

    <nav class="header-nav ms-auto">
      <ul class="d-flex align-items-center">

        <li class="nav-item dropdown pe-3">

          <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
            <img src="<?= base_url() ?>/assets/img/profile-img.jpg" alt="Profile" class="rounded-circle">
            <span class="d-none d-md-block dropdown-toggle ps-2">K. Anderson</span>
          </a><!-- End Profile Iamge Icon -->

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
            <li class="dropdown-header">
              <h6>Kevin Anderson</h6>
              <span>Web Designer</span>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="users-profile.html">
                <i class="bi bi-person"></i>
                <span>My Profile</span>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="users-profile.html">
                <i class="bi bi-gear"></i>
                <span>Account Settings</span>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="pages-faq.html">
                <i class="bi bi-question-circle"></i>
                <span>Need Help?</span>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="#">
                <i class="bi bi-box-arrow-right"></i>
                <span>Sign Out</span>
              </a>
            </li>

          </ul><!-- End Profile Dropdown Items -->
        </li><!-- End Profile Nav -->

      </ul>
    </nav><!-- End Icons Navigation -->

  </header><!-- End Header -->

  <!-- Vendor JS Files -->
  <!-- jQuery UI 1.11.4 -->
  <!-- <script src="<?= base_url() ?>assets/assets-admin/vendor/jquery-ui/jquery-ui.min.js"></script> -->

  <script src="<?= base_url() ?>assets/assets-admin/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="<?= base_url() ?>assets/assets-admin/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="<?= base_url() ?>assets/assets-admin/vendor/chart.js/chart.umd.js"></script>
  <script src="<?= base_url() ?>assets/assets-admin/vendor/echarts/echarts.min.js"></script>
  <script src="<?= base_url() ?>assets/assets-admin/vendor/quill/quill.min.js"></script>
  <script src="<?= base_url() ?>assets/assets-admin/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="<?= base_url() ?>assets/assets-admin/vendor/tinymce/tinymce.min.js"></script>
  <script src="<?= base_url() ?>assets/assets-admin/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="<?= base_url() ?>assets/assets-admin/js/main.js"></script>

  <!-- CONTENTS -->
  <?= $contents ?>
  <!-- END CONTENTS -->

  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">
    <div class="copyright">
      &copy; Copyright <strong><span>NiceAdmin</span></strong>. All Rights Reserved
    </div>
    <div class="credits">
      <!-- All the links in the footer should remain intact. -->
      <!-- You can delete the links only if you purchased the pro version. -->
      <!-- Licensing information: https://bootstrapmade.com/license/ -->
      <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/ -->
      Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
      class="bi bi-arrow-up-short"></i></a>


  </script>

</body>

</html>