<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title><?= $title ?></title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="<?= base_url() ?>assets/assets-admin/img/favicon.png" rel="icon">
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

<body>

  <main>
    <div class="container">

      <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">

              <div class="d-flex justify-content-center py-4">
                <a href="<?= base_url() ?>" class="logo d-flex align-items-center w-auto">
                  <img src="<?= base_url() ?>assets/img/trainers/favicon-bumenet.png" alt="">
                  <span class="d-none d-lg-block">- Learning</span>
                </a>
              </div><!-- End Logo -->

              <div class="card mb-3">

                <div class="card-body">

                  <div class="pt-4 pb-2">
                    <h5 class="card-title text-center pb-0 fs-4">Login to Your Account</h5>
                    <p class="text-center small">Welcome back...</p>
                    <?= $this->session->flashdata('message'); ?>
                  </div>

                  <form class="row g-3 needs-validation" method="post" action="<?= base_url() ?>auth/process">

                    <div class="col-12">
                      <label for="yourUsername" class="form-label">Username</label>
                      <div class="input-group has-validation">
                        <span class="input-group-text" id="inputGroupPrepend">@</span>
                        <input type="text" name="username" class="form-control" id="yourUsername" required>
                        <div class="invalid-feedback">Please enter your username.</div>
                      </div>
                    </div>

                    <div class="col-12">
                      <label for="yourPassword" class="form-label">Password</label>
                      <input type="password" name="password" class="form-control" id="yourPassword" required>
                      <div class="invalid-feedback">Please enter your password!</div>
                    </div>

                    <div class="col-12">
                      <button class="btn btn-primary w-100" type="submit">Login</button>
                    </div>


                  </form>
                  <div class="pt-3 pb-1">
                    <!-- <h5 class="card-title text-center pb-0 fs-4">Or</h5> -->
                    <p class="text-center medium">-------------------- OR --------------------</p>
                  </div>
                  <div class="col-12 mb-3">
                    <button class="btn btn-outline-success w-100" type="submit">Login with Google</button>
                  </div>
                  <div class="col-12">
                    <p class="small mb-0">Belum memiliki akun? <a href="<?= base_url() ?>auth/registrasi">Daftar
                        gratis sekarang</a></p>
                  </div>


                </div>
              </div>

              <div class="credits">
                <!-- All the links in the footer should remain intact. -->
                <!-- You can delete the links only if you purchased the pro version. -->
                <!-- Licensing information: https://bootstrapmade.com/license/ -->
                <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/ -->
                B-Learning by <a href="https://www.bumenet.com/">Bumenet</a>
              </div>

            </div>
          </div>
        </div>

      </section>

    </div>
  </main><!-- End #main -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
      class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
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

</body>

</html>