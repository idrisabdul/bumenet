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

                        <img src="<?= base_url() ?>images/profile/<?= $user->img_profile ?>" alt="Profile"
                            class="rounded-circle">
                        <h2>Hai, <?= ucfirst($this->session->userdata('nickname')) ?></h2>
                        <h3><?= ucfirst($this->session->userdata('role_name')) ?></h3>
                        <?php if ($user->role == 4) { ?>
                            <div class="alert alert-info fade show" role="alert">
                                <i class="bi bi-info-circle me-1"></i>
                                Pengajuan anda sedang direview oleh tim kami. Mohon ditunggu.
                            </div>
                        <?php } ?>
                        <div class="social-links mt-2">
                            <a href="#" class="twitter"><i class="ri ri-star-fill"> 10 Poin</i></a>
                            <a href="#" class="facebook"><i class="ri ri-award-fill"> 20 XP</i></a>
                        </div>
                    </div>
                    <div class="card-body">
                        <ul class="sidebar-nav" id="sidebar-nav">
                            <li class="nav-item">
                                <a class="nav-link collapsed" href="<?= base_url("mydashboard/myaccount") ?>">
                                    <i class="bi bi-person"></i>
                                    <span>Akun saya</span>
                                </a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link collapsed" href="<?= base_url("mydashboard") ?>">
                                    <i class="bi bi-bar-chart"></i>
                                    <span>Progres belajar</span>
                                </a>
                            </li>

                            <li class="nav-item" id="my_writing">
                                <a class="nav-link collapsed" href="#">
                                    <i class="bi bi-pencil-square"></i>
                                    <span>Tulisan saya</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>

            </div>
            <div class="col-xl-9">
                <div id="my_learning">
                    <?php if (!$mycourses) { ?>
                        <img src="<?= base_url() ?>/assets/img/empty-removebg-preview.png" class="rounded mx-auto d-block"
                            alt="...">
                        <!-- <h5 class="card-title text-center">Yuk Ambil kelas sekar</h5> -->

                    <?php } ?>
                    <?php foreach ($mycourses as $mc) { ?>
                        <div class="card mb-3">
                            <div class="row g-0">
                                <div class="col-md-4">
                                    <img src="images/<?= $mc->img_service ?>" class="img-fluid rounded-start" alt="...">
                                </div>
                                <div class="col-md-8">
                                    <div class="card-body">
                                        <h5 class="card-title"><?= $mc->service_name ?></h5>

                                        <p class="card-text">
                                            <?php
                                            $string = strip_tags($mc->service_description);
                                            if (strlen($string) > 150) {
                                                $stringCut = substr($string, 0, 150);
                                                $endPoint = strrpos($stringCut, ' ');

                                                //if the string doesn't contain any space then it will cut without word basis.
                                                $string = $endPoint ? substr($stringCut, 0, $endPoint) : substr($stringCut, 0);
                                                $string .= '...';
                                            }
                                            echo $string;
                                            ?>
                                        </p>
                                    </div>
                                    <div class="card-footer">
                                        <div class="row">
                                            <div class="col-md-7">
                                                <span>Progres belajar</span>
                                                <?php
                                                $progress_done = $this->db->query("SELECT COUNT(learning_progress_id) AS total_progress FROM learning_progress WHERE learning_course_id='$mc->service_id' && user_id='$mc->user_id' && status_progress='1';")->row();
                                                $all_progress = $this->db->query("SELECT COUNT(learning_progress_id) AS total_progress FROM learning_progress WHERE learning_course_id='$mc->service_id' && user_id='$mc->user_id';")->row();
                                                // echo $progress_done->total_progress;
                                                // echo $progress_done->total_progress;
                                                $progress = round($progress_done->total_progress / $all_progress->total_progress * 100, 2);
                                                ?>
                                                <div class="progress mt-2">
                                                <div class="progress-bar" role="progressbar" style="width: <?= $progress ?>%"
                                                    aria-valuenow="<?= $progress ?>" aria-valuemin="0" aria-valuemax="100"><?= $progress ?>%
                                                </div>
                                            </div>
                                            </div>
                                            <div class="col-md-5 mt-4">
                                                <?php if ($progress < 100) { ?>
                                                    <a href="<?= base_url() ?>learning/learning_course/<?= $mc->service_id ?>"
                                                        class="card-link">Lanjut
                                                        belajar</a>
                                                <?php } else { ?>
                                                    <a href="<?= base_url() ?>learning/learning_course/<?= $mc->service_id ?>"
                                                        class="card-link">Review ulang</a>
                                                    &nbsp;&nbsp;
                                                    <!-- <a href="<?= base_url() ?>mydashboard/get_certificate/<?= $mc->service_id ?>"
                                                    class="card-link">Unduh Sertifikat</a> -->
                                                    <?php
                                                    $check_certificate = $this->db->query("SELECT credential_id FROM certificates WHERE course_id='$mc->service_id' && user_learn_id='$mc->user_id';")->row();
                                                    ?>
                                                    <?php if ($check_certificate) { ?>
                                                        <a href="<?= base_url() ?>learning/certificates/<?= $mc->service_id ?>"
                                                            class="card-link">Lihat Sertifikat</a>
                                                    <?php } else { ?>
                                                        <a href="<?= base_url() ?>learning/exam/<?= $mc->service_id ?>"
                                                            class="card-link">Kerjakan Ujian</a>
                                                    <?php } ?>
                                                <?php } ?>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </div>
                <!-- <div id="list_writing"></div> -->
                <div id="my-write">
                    <div class="col-12">
                        <div class="card recent-sales overflow-auto">
                            <div class="card-body">
                                <h5 class="card-title">Tulisan saya <span>| daftar tulisan yang sudah go publish</span>
                                </h5>

                                <table class="table table-sm">
                                    <thead>
                                        <tr>
                                            <!-- <th scope="col">#</th> -->
                                            <th scope="col">Judul</th>
                                            <th scope="col">Tanggal Publis</th>
                                            <th scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody id="list_writing">
                                        <!-- <div id="list_writing"></div> -->
                                        <!-- <tr>
                                            <td>X</td>
                                            <td>X</td>
                                            <td>X</td>
                                         </tr> -->

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
    </section>

</main><!-- End #main -->

<!-- DELETE ITEM MODAL MODULE -->
<div class="modal fade" id="basicModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Anda Yakin?</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Data yang dihapus tidak akan bisa dikembalikan.
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                <a id="btn-delete" class="btn btn-danger" href="#">Hapus</a>
            </div>
        </div>
    </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

<script type="text/javascript">
    function deleteConfirm(url) {
        console.log(url);
        $('#btn-delete').attr('href', url);
        $('#basicModal').modal('show');
    }

    $(document).ready(function () {
        $("#my-write").hide();

        $("#my_writing").click(function () {
            var id = this.id;
            $("#my-write").show();
            $.ajax({
                url: "<?php echo site_url('Sharing/tulisan_saya'); ?>",
                method: "POST",
                async: true,
                dataType: 'json',
                success: function (data) {
                    $("#my_learning").hide();
                    var html = '';
                    var i;
                    for (i = 0; i < data.length; i++) {
                        html +=
                            '<tr>' +
                            // '<td>'+i+'</td>' +
                            '<td>' + data[i].title_content + '</td>' +
                            '<td>' + data[i].date + '</td>' +
                            '<td style="text-align:right;">' +
                            '<a href="<?= base_url('sharing/edit/') ?>' + data[i].sharing_id + '" class="btn btn-info btn-sm item_edit">Edit</a>' + ' ' +
                            '<button type="button" href="#!" onclick="deleteConfirm(`<?= base_url('sharing/delete/') ?>' + data[i].sharing_id + '`)" class="btn btn-danger btn-sm item_delete"> Delete</button> ' +
                        '</td>' +
                            '</tr>';
                    }
                    $('#list_writing').html(html);
                    // console.log(data);
                }
            });
        });

    });


</script>