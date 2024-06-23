<main id="main" class="main">

    <div class="pagetitle">
        <h1>Learning</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?= base_url("learning") ?>">Home</a></li>
                <li class="breadcrumb-item active">Learning</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-xl-3">
                <div class="card">
                    <div class="card-body">

                        <ul class="sidebar-nav" id="sidebar-nav">
                            <h5 class="card-title">Kategori</h5>
                            <?php if (!$this->session->userdata('user_id')) { ?>

                                <li class="nav-item">
                                    <a class="nav-link collapsed" data-bs-toggle="modal"
                                        data-bs-target="#verticalycentered-2">
                                        <i class="bi bi-grid"></i>
                                        <span>Dashboard saya</span>
                                    </a>
                                </li>
                            <?php } else { ?>
                                <li class="nav-item">
                                    <a class="nav-link collapsed" href="<?= base_url("mydashboard") ?>">
                                        <i class="bi bi-grid"></i>
                                        <span>Dashboard saya</span>
                                    </a>
                                </li>
                            <?php } ?>

                            <li class="nav-item">
                                <a class="nav-link collapsed" href="<?= base_url('/sharing/menulis') ?>">
                                    <i class="bi bi-pencil-square"></i>
                                    <span>Mulai menulis</span>
                                </a>
                            </li>
                            <!-- <li class="nav-item">
                                <a class="nav-link collapsed" href="pages-error-404.html">
                                    <i class="bi bi-bar-chart"></i>
                                    <span>Sharing everything</span>
                                </a>
                            </li> -->

                            <li class="nav-item">
                                <a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse"
                                    href="#">
                                    <i class="bi bi-menu-button-wide"></i><span>Kelas</span><i
                                        class="bi bi-chevron-down ms-auto"></i>
                                </a>
                                <ul id="components-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                                    <li id='0'>

                                        <a href="<?= base_url('/learning') ?>">
                                            <i class="bi bi-circle"></i><span>Semua Kelas</span>
                                        </a>
                                    </li>
                                    <?php foreach ($categories as $categori) { ?>
                                        <li id='<?= $categori->product_category_id ?>'>
                                            <a href="#">
                                                <i
                                                    class="bi bi-circle"></i><span><?= $categori->product_category_name ?></span>
                                            </a>
                                        </li>
                                    <?php } ?>

                                </ul>
                            </li><!-- End Components Nav -->

                            <li class="nav-item">
                                <a class="nav-link collapsed" href="pages-error-404.html">
                                    <i class="bi bi-collection-play"></i>
                                    <span>Seminar IT (On Development)</span>
                                </a>
                            </li><!-- End Error 404 Page Nav -->

                            <li class="nav-item">

                                <?php if (!$this->session->userdata('user_id')) { ?>
                                    <a class="nav-link collapsed" data-bs-toggle="modal"
                                        data-bs-target="#verticalycentered">
                                        <i class="bi bi-mortarboard"></i>
                                        <span>Gabung bumenet inspiratif</span>
                                    </a>
                                <?php } else if ($user->role == 0) { ?>

                                        <a class="nav-link collapsed" data-bs-toggle="modal"
                                            data-bs-target="#verticalycentered">
                                            <i class="bi bi-mortarboard"></i>
                                            <span>Gabung Bumenet Inspiratif</span>
                                        </a>
                                <?php } ?>

                            </li><!-- End Blank Page Nav -->

                        </ul>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">

                        <h5 class="card-title">Rekomendasi Sharing</h5>
                        <?php foreach ($categories as $categori) { ?>
                            <button href="#"
                                class="btn btn-sm btn-outline-secondary my-1"><span><?= $categori->product_category_name ?></span>
                            </button>
                        <?php } ?>

                    </div>
                </div>
            </div>
            <?php if (!$this->session->userdata('user_id')) { ?>
            <?php } else { ?>
                <input type="hidden" id="role" name="role" value="<?= $user->role ?>">
            <?php } ?>
            <div class="col-xl-9">

                <div class="row align-items-top" id="courses">
                    <?php foreach ($courses as $cs) { ?>
                        <div class="col-lg-3">
                            <div class="card">
                                <div class="card-header">
                                    <img src="images/<?= $cs->img_service ?>" class="card-img-top" alt="...">
                                    <a href="<?= base_url('/learning/course_detail/' . $cs->service_id) ?>"
                                        class="card-link">
                                        <h5 class="card-title"><?= $cs->service_name ?></h5>
                                    </a>
                                    <h6 class="card-subtitle mb-2 text-muted"><?= $cs->product_category_name ?></h6>
                                </div>
                                <div class="card-body pt-3">
                                    <a href="<?= base_url('/learning/course_detail/' . $cs->service_id) ?>"
                                        class="card-link">Lihat
                                        detail</a>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </div>
                <div class="row align-items-top" id="courses_category">
                </div>
                <div class="pagetitle">
                    <h1>Sharing Everything</h1>
                    <nav>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#!">Topik yang mungkin menarik</a></li>
                        </ol>
                    </nav>
                </div><!-- End Page Title -->
                <div class="card mb-3">
                    <div class="card-body">
                        <h5 class="card-title">Sharing Everything <span>| Topik yang mungkin menarik</span><a href="<?= base_url("sharing") ?>" id="btn-done"
                            class="card-link btn btn-sm btn-outline-primary d-flex float-end">Lihat lebih banyak<i class="bi bi-arrow-right-short"></i>
                        </a></h5>
                        
                    </div>
                    <div class="row g-0">
                        <?php foreach ($sharing as $share) { ?>

                            <div class="col-md-2">
                                <img src="images/sharing/<?= $share->img_sharing ?>"
                                    class="img-fluid rounded-start py-4 px-4" alt="...">
                            </div>
                            <div class="col-md-10">
                                <div class="card-body">
                                    <a href="<?= base_url('/sharing/content/' . $share->sharing_id) ?>" class="card-link">
                                        <h5 class="card-title"><?= $share->title_content ?></h5>
                                    </a>
                                    <p class="card-text"><?php
                                    $string = strip_tags($share->content);
                                    if (strlen($string) > 150) {
                                        $stringCut = substr($string, 0, 150);
                                        $endPoint = strrpos($stringCut, ' ');

                                        //if the string doesn't contain any space then it will cut without word basis.
                                        $string = $endPoint ? substr($stringCut, 0, $endPoint) : substr($stringCut, 0);
                                        $string .= '...';
                                    }
                                    echo $string;
                                    ?></p>
                                    <div class="row  card-footer">
                                        <div class="col-md-8">
                                            <h6><i class="bi bi-person"></i> <span><?= $share->nickname ?></span> • <?= $share->product_category_name ?></h6>

                                        </div>
                                        <div class="col-md-4">
                                            <a href="<?= base_url('/sharing/content/' . $share->sharing_id) ?>"
                                                class="card-link"><span>Baca lebih lanjut</span></a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </section>

</main><!-- End #main -->

<div class="modal fade" id="verticalycentered" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="assets/img/bumenet-mengajar-2.jpg" class="d-block w-100" alt="...">
                    </div>
                    <div class="carousel-item">
                        <img src="assets/img/bumenet-mengajar-4.jpg" class="d-block w-100" alt="...">
                    </div>
                    <div class="carousel-item">
                        <img src="assets/img/bumenet-mengajar-3.jpg" class="d-block w-100" alt="...">
                    </div>
                </div>

                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls"
                    data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls"
                    data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>

            </div>
            <div class="modal-body text-center">
                <h5 class="card-title">Selamat datang di Bumenet Inspiratif</h5>
                <span> Pengetahuan dan Pengalaman anda tentu sangat luar biasa hingga sampai di posisi ini. Yuk saatnya
                    bagikan pengetahuan dan pengalaman anda kepada orang lain. Dan jadilah sosok yang inspiratif</span>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                <?php if (!$this->session->userdata('user_id')) { ?>
                    <a href="<?= base_url("auth") ?>" class="btn btn-primary">Yuk
                        Login</a>
                <?php } else { ?>
                    <a href="<?= base_url("mydashboard/bumenet_mengajar/" . $this->session->userdata("user_id")) ?>"
                        class="btn btn-primary">Yuk Gabung</a>
                <?php } ?>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="verticalycentered-2" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="assets/img/learning.jpg" class="d-block w-100" alt="...">
                    </div>
                </div>

                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls"
                    data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls"
                    data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>

            </div>
            <div class="modal-body text-center">
                <h5 class="card-title">Upgrade Your Skill</h5>
                <span> Investasi terbaik adalah Investasi dari leher sampai ke atas</span>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>

                <a href="<?= base_url("auth") ?>" class="btn btn-primary">Yuk
                    Login</a>

            </div>
        </div>
    </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

<script type="text/javascript">

    $(document).ready(function () {
        function alertLogin(url) {
            console.log(url);
            $('#btn-login').attr('href', url);
            $('#basicModal').modal('show');
        }

        function show_course() {
            $.ajax({
                type: 'ajax',
                url: '<?php echo site_url('Learning/course_category') ?>',
                async: true,
                dataType: 'json',
                success: function (data) {
                    console.log(data);
                    var html = '';
                    var i;
                    for (i = 0; i < data.length; i++) {
                        html += '<div class="col-lg-3">' +
                            '<div class="card">' +
                            '<div class="card-header">' +
                            '<img src="images/' + data[i].img_service + '" class="card-img-top" alt="...">' +
                            '<a href="<?= base_url('learning/course_detail/') ?>' + data[i].service_id + '"' +
                            'class="card-link">' +
                            '<h5 class="card-title">' + data[i].service_name + '</h5>' +
                            '</a>' +
                            '<h6 class="card-subtitle mb-2 text-muted">' + data[i].product_category_name + '</h6>' +
                            '</div>' +
                            '<div class="card-body pt-3">' +
                            '<a href="' + data[i].img_service + '"' +
                            'class="card-link">Lihat detail</a>' +
                            '</div>' +
                            '</div>' +
                            '</div>';
                    }
                    $('#courses').html(html);
                }

            });
        }

        $("#components-nav li").click(function () {
            var id = this.id;
            $.ajax({
                url: "<?php echo site_url('Learning/course_category'); ?>",
                method: "POST",
                data: {
                    id: id
                },
                async: true,
                dataType: 'json',
                success: function (data) {
                    if (!$.trim(data)) {
                        // alert("What follows is blank: " + data);
                        console.log(data);
                        $("#courses").hide();
                        var html = '';
                        var role = $('#role').val();
                        var i;
                        if (role == 2) {
                            html = '<div class="col-lg">' +
                                '<div class="card text-center">' +
                                '<div class="card-header">' +
                                '<br>' +
                                '<br>' +
                                '<h6 class="card-subtitle mb-2 text-muted">Jadilah orang pertama yang membuat kursus di kelas ini</h6>' +
                                '</div>' +
                                '<div class="card-body pt-3">' +
                                '<div class="text-center">' +
                                '<a href="<?= base_url('mentor/mentor/add_course') ?>" class="btn btn-success"><i class="ri ri-upload-2-fill me-1"></i>Buat Course</a>' +
                                '</div>' +
                                '</div>' +
                                '</div>' +
                                '</div>';
                            $('#courses_category').html(html);
                        } else {
                            html = '<div class="col-lg">' +
                                '<div class="card text-center">' +
                                '<div class="card-header">' +
                                '<br>' +
                                '<br>' +
                                '<h6 class="card-subtitle mb-2 text-muted">Tidak ada kelas</h6>' +
                                '</div>' +
                                '<div class="card-body pt-3">' +
                                '<div class="text-center">' +
                                // '<a href= class="btn btn-success"><i class="ri ri-upload-2-fill me-1"></i>Login</a>' +
                                '</div>' +
                                '</div>' +
                                '</div>' +
                                '</div>';
                            $('#courses_category').html(html);
                        }
                    }
                    else {
                        $("#courses").hide();
                        var html = '';
                        var i;
                        for (i = 0; i < data.length; i++) {
                            html += '<div class="col-lg-3">' +
                                '<div class="card">' +
                                '<div class="card-header">' +
                                '<img src="images/' + data[i].img_service + '" class="card-img-top" alt="...">' +
                                '<a href="<?= base_url('learning/course_detail/') ?>' + data[i].service_id + '"' +
                                'class="card-link">' +
                                '<h5 class="card-title">' + data[i].service_name + '</h5>' +
                                '</a>' +
                                '<h6 class="card-subtitle mb-2 text-muted">' + data[i].product_category_name + '</h6>' +
                                '</div>' +
                                '<div class="card-body pt-3">' +
                                '<a href="<?= base_url('learning/course_detail/') ?>' + data[i].service_id + '"' +
                                'class="card-link">Lihat detail</a>' +
                                '</div>' +
                                '</div>' +
                                '</div>';
                        }
                        $('#courses_category').html(html);
                    }

                }
            });
            return false;

            console.log(this.id)
        });

        //
        var x = 0;
        $('#add_submodule').click(function () {
            x = x + 1;
            newRowAdd =
                '<div id="form_module">' +
                '<br><br><div class="row mb-3">' +
                '<div class="row mb-3">' +
                '<label for="inputText" class="col-sm-2 col-form-label"><b>SubModule Name</b></label>' +
                '<div class="col-sm-8">' +
                '<input type="text" name="submodule_name[]" class="form-control" required>' +
                '</div>' +
                '<button type="button" id="remove_module" class="col-sm-1 btn btn-danger float-end"><i class="bi bi-trash me-1"></i></button>' +
                '</div>' +
                '<div class="row mb-3">' +
                '<label for="inputPassword" class="col-sm-2 col-form-label">SubContent Module</label>' +
                '<div class="col-sm-10">' +
                '<textarea class="form-control" name="submodule_content[]" required style="height: 100px"></textarea>' +
                '</div>' +
                '</div>' +
                '</div>';
            $('#course_module').append(newRowAdd);
        });
        $("body").on("click", "#remove_module", function () {
            $(this).parents("#form_module").remove();
        });
    });

    $(document).ready(function () {
        $('#save_and_publish').click(function () {
            var id = $('#course_id').val();
            $.ajax({
                url: "<?php echo site_url('Admin/Product/save_and_publish'); ?>",
                method: "POST",
                data: {
                    id: id
                },
                async: true,
                dataType: 'json',
                success: function (data) {
                    $("#courses").hide();
                    window.location.replace("<?php echo site_url('Admin/Product/'); ?>");
                }
            });
            return false;
        });
    });




    // REFERENSI
    $(document).ready(function () {
        $('#select_user').show();
        $('#input_user').hide();
        $('[name="my_checkbox"]').change(function () {
            if ($('#checkbox_inp').is(':checked')) {
                $('#input_user').show();
                $('#id_users').prop('disabled', true);
                $('#nama_penerima').prop('disabled', false);
            } else {
                $('#input_user').hide();
                $('#nama_penerima').prop('disabled', true);
                $('#id_users').prop('disabled', false);
            }
        });

    });

    $(document).ready(function () {
        $('#select_ass_num').change(function () {
            var id = $(this).val();
            //  var string_text = $(this).text();
            // alert(id);
            var string = $("#select_ass_num option:selected").text();
            $.ajax({
                url: "<?php echo site_url('Asset/get_lastid_asset_number'); ?>",
                method: "POST",
                data: {
                    id: id
                },
                async: true,
                dataType: 'json',
                success: function (data) {
                    $("#asset_number_txt").val(string + '-' + data);
                    $("#asset_number_txtowe").val(string + '-' + data);
                    $("#numbering").val(data);
                    $("#id_asset_number").val(id);
                }
            });
            return false;
        });
    });
</script>