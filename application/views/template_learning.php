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
      <a href="<?= base_url("learning") ?>" class="logo d-flex align-items-center">
        <img src="<?= base_url() ?>assets/img/logo.png" alt="">
        <span class="d-none d-lg-block">- Learning</span>
      </a>
      <!-- <i class="bi bi-list toggle-sidebar-btn"></i> -->
    </div><!-- End Logo -->


    <div class="search-bar">
      <form class="search-form d-flex align-items-center" method="POST" action="#">
        <input type="text" name="query" placeholder="Temukan kelas yang anda cari" title="Enter search keyword">
        <button type="submit" title="Search"><i class="bi bi-search"></i></button>
      </form>
    </div><!-- End Search Bar -->

    <nav class="header-nav ms-auto">
      <ul class="d-flex align-items-center">

        <li class="nav-item d-block d-lg-none">
          <a class="nav-link nav-icon search-bar-toggle " href="#">
            <i class="bi bi-search"></i>
          </a>
        </li><!-- End Search Icon-->



        <?php if (!$this->session->userdata('username')) { ?>
          <!-- <a href="<?= base_url() ?>auth" class="btn btn-primary mr-3" type="button">Log In</a> -->
          <a class="btn btn-outline-primary mt-1 mb-1" href="<?= base_url() ?>auth">
            <!-- <font color="blue">Log in</font> -->
            Log in
          </a>
          <button class="btn bg-white mt-1 mb-1 pr-2"><a href="<?= base_url() ?>auth/registrasi">
              Daftar sekarang
            </a></button>
        <?php } else { ?>
          <li class="nav-item dropdown pe-3">
            <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
              <img src="<?= base_url() ?>/assets/img/profile-img.jpg" alt="Profile" class="rounded-circle">
              <span
                class="d-none d-md-block dropdown-toggle ps-2"><?php echo ucfirst($this->session->userdata('username')) ?></span>
            </a><!-- End Profile Iamge Icon -->

            <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
              <li class="dropdown-header">
                <h6><?= $this->session->userdata('nickname') ?></h6>
                <span><?= $this->session->userdata('role_name') ?></span>
              </li>
              <li>
                <hr class="dropdown-divider">
              </li>
              <?php if ($this->session->userdata('role') == 1) { ?>
                <li>
                  <a class="dropdown-item d-flex align-items-center" href="<?= base_url("Admin/admin") ?>">
                    <i class="bi bi-grid"></i>
                    <span>Admin Area</span>
                  </a>
                </li>
                <li>
                  <hr class="dropdown-divider">
                </li>
                <li>
                  <a class="dropdown-item d-flex align-items-center" href="<?= base_url("Mentor/mentor") ?>">
                    <i class="bi bi-mortarboard"></i>
                    <span>Mentor Area</span>
                  </a>
                </li>
                <li>
                  <hr class="dropdown-divider">
                </li>
              <?php } else if ($this->session->userdata('role') == 2) { ?>
                  <li>
                    <a class="dropdown-item d-flex align-items-center" href="<?= base_url("Mentor/mentor") ?>">
                      <i class="bi bi-mortarboard"></i>
                      <span>Mentor Area</span>
                    </a>
                  </li>
                  <li>
                    <hr class="dropdown-divider">
                  </li>
              <?php } ?>

              <li>
                <a class="dropdown-item d-flex align-items-center" href="<?= base_url("mydashboard/myaccount") ?>">
                  <i class="bi bi-person"></i>
                  <span>Profile Saya</span>
                </a>
              </li>
              <li>
                <hr class="dropdown-divider">
              </li>

              <li>
                <a class="dropdown-item d-flex align-items-center" href="<?= base_url() ?>mydashboard">
                  <i class="bi bi-gear"></i>
                  <span>Kelas Saya</span>
                </a>
              </li>
              <li>
                <hr class="dropdown-divider">
              </li>

              <li>
                <a class="dropdown-item d-flex align-items-center" href="pages-faq.html">
                  <i class="bi bi-question-circle"></i>
                  <span>Ganti Password</span>
                </a>
              </li>
              <li>
                <hr class="dropdown-divider">
              </li>

              <li>
                <a class="dropdown-item d-flex align-items-center" href="<?= base_url() ?>auth/logout">
                  <i class="bi bi-box-arrow-right"></i>
                  <span>Keluar</span>
                </a>
              </li>

            </ul><!-- End Profile Dropdown Items -->
          </li><!-- End Profile Nav -->
        <?php } ?>


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
      &copy; Copyright <strong><span>Bumenet</span></strong>. All Rights Reserved
    </div>
    <div class="credits">
      <!-- All the links in the footer should remain intact. -->
      <!-- You can delete the links only if you purchased the pro version. -->
      <!-- Licensing information: https://bootstrapmade.com/license/ -->
      <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/ -->
      Powered by <a href="https://www.bumenet.com/">Bumenet</a>
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
      class="bi bi-arrow-up-short"></i></a>


  </script>

</body>

</html>