<main id="main" class="main">

    <div class="pagetitle">
        <h1>Dashboard Saya</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?= base_url("learning") ?>">Home</a></li>
                <li class="breadcrumb-item active">Dashboard saya</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section profile">
        <div class="row">
            <div class="col-xl-3">
                <div class="card">
                    <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">

                        <img src="assets/img/profile-img.jpg" alt="Profile" class="rounded-circle">
                        <h2><?= ucfirst($this->session->userdata('nickname')) ?></h2>
                        <h3><?= ucfirst($this->session->userdata('role_name')) ?></h3>
                        <div class="social-links mt-2">
                            <a href="#" class="twitter"><i class="ri ri-star-fill"> 10 Poin</i></a>
                            <a href="#" class="facebook"><i class="ri ri-award-fill"> 20 XP</i></a>
                        </div>
                    </div>
                    <div class="card-body">
                        <ul class="sidebar-nav" id="sidebar-nav">
                        <li class="nav-item">
                                <a class="nav-link collapsed" href="pages-blank.html">
                                    <i class="bi bi-person"></i>
                                    <span>Akun Saya</span>
                                </a>
                            </li><!-- End Blank Page Nav -->

                            <li class="nav-item">
                                <a class="nav-link collapsed" href="pages-error-404.html">
                                    <i class="bi bi-grid"></i>
                                    <span>Kelas yang Lulus</span>
                                </a>
                            </li><!-- End Error 404 Page Nav -->


                            <li class="nav-item">
                                <a class="nav-link collapsed" href="pages-error-404.html">
                                    <i class="bi bi-bar-chart"></i>
                                    <span>Progres Belajar</span>
                                </a>
                            </li><!-- End Error 404 Page Nav -->


                            <li class="nav-item">
                                <a class="nav-link collapsed" href="pages-blank.html">
                                    <i class="bi bi-mortarboard"></i>
                                    <span>Gabung     Bumenet Mengajar</span>
                                </a>
                            </li><!-- End Blank Page Nav -->

                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-xl-9">
                <?php foreach ($mycourses as $mc) { ?>
                    <div class="card mb-3">
                        <div class="row g-0">
                            <div class="col-md-4">
                                <img src="images/<?= $mc->img_service ?>" class="img-fluid rounded-start" alt="...">
                            </div>
                            <div class="col-md-8">
                                <div class="card-body">
                                    <h5 class="card-title"><?= $mc->service_name ?></h5>
                                    <p class="card-text">This is a wider card with supporting text below as a natural
                                        lead-in to additional content. This content is a little bit longer.</p>
                                </div>
                                <div class="card-footer">
                                    <div class="row">
                                        <div class="col-md-9">
                                            <span>Progres belajar</span>
                                            <div class="progress mt-2">
                                                <div class="progress-bar" role="progressbar" style="width: 90%"
                                                    aria-valuenow="90" aria-valuemin="0" aria-valuemax="100">90%</div>
                                            </div>
                                        </div>
                                        <div class="col-md-3 mt-4">
                                            <a href="<?= base_url() ?>learning/learning_course/<?= $mc->service_id ?>"
                                                class="card-link">Lanjut
                                                belajar</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>

            </div>
    </section>

</main><!-- End #main -->

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

<script type="text/javascript">

    $(document).ready(function () {
        // show_course();

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
                    // console.log(data.length);
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
                    // console.log(data);
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