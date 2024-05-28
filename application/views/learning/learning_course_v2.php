<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Dashboard - Bumenet Admin</title>
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

</head>

<body>

    <!-- ======= Header ======= -->
    <header id="header" class="header fixed-top d-flex align-items-center">

        <div class="d-flex align-items-center justify-content-between">
            <a href="<?= base_url("learning") ?>" class="logo d-flex align-items-center">
                <img src="<?= base_url() ?>assets/img/logo.png" alt="">
                <span class="d-none d-lg-block">- Learning</span>
            </a>
            <i class="bi bi-list toggle-sidebar-btn"></i>
        </div>

        <div class="search-bar">
            <form class="search-form d-flex align-items-center" method="POST" action="#">
                <input type="text" name="query" placeholder="Search" title="Enter search keyword">
                <button type="submit" title="Search"><i class="bi bi-search"></i></button>
            </form>
        </div>

        <nav class="header-nav ms-auto">
            <ul class="d-flex align-items-center">

                <li class="nav-item d-block d-lg-none">
                    <a class="nav-link nav-icon search-bar-toggle " href="#">
                        <i class="bi bi-search"></i>
                    </a>
                </li>

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
                                <a class="dropdown-item d-flex align-items-center"
                                    href="<?= base_url("mydashboard/myaccount") ?>">
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

    <!-- ======= Sidebar ======= -->
    <aside id="sidebar" class="sidebar">

        <ul class="sidebar-nav" id="sidebar-nav">
            <h5 class="card-title">Daftar Modul</h5>
            <?php $no = 1; ?>
            <?php $no2 = 1; ?>
            <?php foreach ($module_course as $mc) { ?>
                <li class="nav-item">
                    <a class="nav-link collapsed" data-bs-target="#components-nav<?= $no++ ?>" data-bs-toggle="collapse"
                        href="#">
                        <?php if ($mc->status_progress == 1) { ?>
                            <i class="bi bi-check-circle-fill"></i><span>
                                <?= $mc->module_name ?></span>
                            <i class="bi bi-chevron-down ms-auto"></i>
                        <?php } else { ?>
                            <i class="bi bi-circle"></i><span>
                                <?= $mc->module_name ?></span>
                            <i class="bi bi-chevron-down ms-auto"></i>
                        <?php } ?>
                    </a>
                    <ul id="components-nav<?= $no2++ ?>" class="nav-content collapse" data-bs-parent="#sidebar-nav">
                        <?php $submodule = $this->db->query("SELECT * FROM submodule_course WHERE module_course_id='$mc->module_course_id'"); ?>
                        <?php foreach ($submodule->result() as $sm) { ?>
                            <li id='<?= $sm->submodule_course_id ?>'>
                                <a href="#">
                                    <i class="bi bi-circle-fill"></i><span><?= $sm->submodule_name ?></span>
                                </a>
                            </li>
                        <?php } ?>
                    </ul>
                </li>
            <?php } ?>
            <li class="nav-item">
                <a class="nav-link collapsed" href="<?= base_url('learning/exam/' . $service->service_id) ?>">
                    <i class="bi bi-lock-fill"></i>
                    <span>Ujian</span>
                </a>
            </li>
        </ul>
        <ul class="sidebar-nav" id="list_module">
            <input id="count" hidden value="<?= count((array) $module_course) ?>">
        </ul>

    </aside>


    <main id="main" class="main">

        <section class="section">
            <div class="row">
                <div class="col-xl">

                    <div class="card mb-3">
                        <div class="card-body" id="submodule_content">
                            <h5 class="card-title mt-2" id="judul_submodule">Overview <?= $service->service_name ?></h5>
                            <div id="content_submodule"><?php echo nl2br($service->service_description) ?>
                            </div>
                        </div>
                        <div class="card-footer" style="display: none;">
                            <div class="row">
                                <input id="submodule_course_id" hidden value="">
                                <input id="module_course_id" hidden value="">
                                <div class="col-md-6">
                                    <a href="#" id="btn-previous" class="card-link btn btn-outline-primary">Kembali</a>
                                </div>
                                <div class="col-md-2">

                                </div>
                                <div class="col-md-4">
                                    <div id="next">
                                        <a href="#" id="btn-next"
                                            class="card-link btn btn-primary d-flex align-items-center justify-content-center">Lanjut
                                        </a>
                                    </div>
                                    <div id="done" style="display: none;">
                                        <a href="#" id="btn-done"
                                            class="card-link btn btn-success d-flex align-items-center justify-content-center ">Tandai
                                            sudah mempelajari modul ini
                                        </a>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </main>

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

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

    <script type="text/javascript">


        $(document).ready(function () {
            var count = $("#count").val();
            for (let i = 1; i <= count; i++) {
                $("#components-nav" + i + " li").click(function () {
                    var id = this.id;
                    $.ajax({
                        url: "<?php echo site_url('Learning/submodule_js'); ?>",
                        method: "POST",
                        data: {
                            id: id
                        },
                        async: true,
                        dataType: 'json',
                        success: function (data) {
                            $(".card-footer").removeAttr("style");
                            $("#next").removeAttr("style");
                            $("#done").hide();
                            console.log(data);
                            function nl2br(str, is_xhtml) {
                                var breakTag = (is_xhtml || typeof is_xhtml === 'undefined') ? '</br>' : '<br>';
                                return (str + '').replace(/([^>\r\n]?)(\r\n|\n\r|\r|\n)/g, '$1' + breakTag + '$2');
                            }
                            $("#module_course_id").val(data.module_course_id);
                            $("#submodule_course_id").val(data.submodule_course_id);
                            $("#judul_submodule").text(data.submodule_name);
                            $("#content_submodule").html(nl2br(data.submodule_content));
                        }
                    });
                    return false;
                });
            }

            $("#btn-next").click(function () {
                var module_id = $("#module_course_id").val();
                var submodule_id = $("#submodule_course_id").val();
                $.ajax({
                    url: "<?php echo site_url('Learning/next_submodule_js'); ?>",
                    method: "POST",
                    data: {
                        module_id: module_id,
                        submodule_id: submodule_id,
                    },
                    async: true,
                    dataType: 'json',
                    success: function (data) {
                        if (!$.trim(data)) {
                            $("#next").hide();
                            $("#done").removeAttr("style");
                        } else {
                            console.log(data);
                            function nl2br(str, is_xhtml) {
                                var breakTag = (is_xhtml || typeof is_xhtml === 'undefined') ? '</br>' : '<br>';
                                return (str + '').replace(/([^>\r\n]?)(\r\n|\n\r|\r|\n)/g, '$1' + breakTag + '$2');
                            }
                            $("#module_course_id").val(data.module_course_id);
                            $("#submodule_course_id").val(data.submodule_course_id);
                            $("#submodule_course_id").val(data.submodule_course_id);
                            $("#judul_submodule").text(data.submodule_name);
                            $("#content_submodule").html(nl2br(data.submodule_content));
                        }
                    }
                });
                return false;
            });


            $("#btn-previous").click(function () {
                var module_id = $("#module_course_id").val();
                var submodule_id = $("#submodule_course_id").val();
                $.ajax({
                    url: "<?php echo site_url('Learning/previous_submodule_js'); ?>",
                    method: "POST",
                    data: {
                        module_id: module_id,
                        submodule_id: submodule_id,
                    },
                    async: true,
                    dataType: 'json',
                    success: function (data) {
                        $("#next").show();
                        $("#done").css("display", "none");
                        $("#btn-next").html("Lanjut");
                        console.log(data);
                        function nl2br(str, is_xhtml) {
                            var breakTag = (is_xhtml || typeof is_xhtml === 'undefined') ? '</br>' : '<br>';
                            return (str + '').replace(/([^>\r\n]?)(\r\n|\n\r|\r|\n)/g, '$1' + breakTag + '$2');
                        }
                        $("#module_course_id").val(data.module_course_id);
                        $("#submodule_course_id").val(data.submodule_course_id);
                        $("#submodule_course_id").val(data.submodule_course_id);
                        $("#judul_submodule").text(data.submodule_name);
                        $("#content_submodule").html(nl2br(data.submodule_content));
                    }
                });
                return false;
            });


            $('#btn-done').click(function () {
                var module_id = $("#module_course_id").val();
                var submodule_id = $("#submodule_course_id").val();
                $.ajax({
                    url: "<?php echo site_url('Learning/done_submodule_js'); ?>",
                    method: "POST",
                    data: {
                        module_id: module_id,
                    },
                    async: true,
                    dataType: 'json',
                    success: function (data) {
                        window.location.reload();
                    }
                });
                return false;
            });
        });
    </script>

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>


    <script src="<?= base_url() ?>assets/assets-admin/vendor/jquery-ui/jquery-ui.min.js"></script>

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