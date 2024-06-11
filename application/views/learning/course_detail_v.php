<main id="main" class="main">

    <div class="pagetitle">
        <h1>Kelas <?= $service->service_name ?></h1>
        <nav style="--bs-breadcrumb-divider: '';">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active"><i class="bi bi-clock"></i></li>
                <li class="breadcrumb-item active">Durasi Belajar <?= $total_duration->total ?> Menit</li>
            </ol>
    </div>

    <section class="section profile">
        <div class="row">
            <div class="col-xl-9">

                <div class="card">
                    <div class="card-body pt-3">
                        <!-- Bordered Tabs -->
                        <ul class="nav nav-tabs nav-tabs-bordered">

                            <li class="nav-item">
                                <button class="nav-link active" data-bs-toggle="tab"
                                    data-bs-target="#profile-overview">Deskripsi</button>
                            </li>

                            <li class="nav-item">
                                <button class="nav-link" data-bs-toggle="tab"
                                    data-bs-target="#profile-edit">Silabus</button>
                            </li>

                            <li class="nav-item">
                                <button class="nav-link" data-bs-toggle="tab"
                                    data-bs-target="#profile-settings">Instruktur</button>
                            </li>

                            <li class="nav-item">
                                <button class="nav-link" data-bs-toggle="tab"
                                    data-bs-target="#profile-change-password">Review Kelas (coming soon)</button>
                            </li>

                        </ul>
                        <div class="tab-content pt-2">

                            <div class="tab-pane fade show active profile-overview" id="profile-overview">
                                <h5 class="card-title">Deskripsi</h5>
                                <p><?php echo nl2br($service->service_description) ?>
                                </p>

                                <h5 class="card-title">Prasyarat Kelas ini:</h5>

                                <div class="row">
                                    <div class="col-lg-9 col-md-8">Memiliki niat yang ikhlas kepada Tuhan Yang Maha
                                        Esa
                                    </div>
                                </div>
                                <h5 class="card-title fst-italic">*Kelas ini terdapat Kuis dan Ujian, Kamu akan
                                    mendapatkan Sertifikat Kelulusan setelah Menyelesaikan Ujian.</h5>
                                <h5 class="card-title fst-italic">**Diharapkan untuk mengakses kelas ini dengan
                                    menggunakan komputer atau laptop.</h5>

                            </div>

                            <div class="tab-pane fade profile-edit pt-3" id="profile-edit">
                                <h5 class="card-title">Materi yang akan Kamu pelajari pada kelas ini</h5>
                                <div class="list-group">
                                    <div class="accordion" id="accordionExample">
                                        <?php $no = 1; ?>
                                        <?php $no2 = 1; ?>
                                        <?php foreach ($module_course as $mc) { ?>
                                            <div class="accordion-item">
                                                <h2 class="accordion-header" id="headingOne">
                                                    <button class="accordion-button collapsed" type="button"
                                                        data-bs-toggle="collapse" data-bs-target="#collapseOne<?= $no++ ?>"
                                                        aria-expanded="false" aria-controls="collapseOne">
                                                        <?= $mc->module_name ?>
                                                    </button>
                                                </h2>
                                                <div id="collapseOne<?= $no2++ ?>" class="accordion-collapse collapse"
                                                    aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                                    <?php $submodule = $this->db->query("SELECT * FROM submodule_course WHERE module_course_id='$mc->module_course_id'"); ?>
                                                    <ul class="list-group list-group-flush"></ul>
                                                    <?php foreach ($submodule->result() as $sm) { ?>
                                                        <li class="list-group-item">
                                                            <a href="#">
                                                                <span><?= $sm->submodule_name ?></span>
                                                            </a>
                                                        </li>
                                                    <?php } ?>
                                                    </ul>
                                                </div>
                                            </div>
                                        <?php } ?>

                                    </div><!-- End Default Accordion Example -->
                                </div>
                            </div>

                            <div class="tab-pane fade profile-edit profile-overview pt-3" id="profile-settings">

                                <div class="row mb-3">
                                    <label for="profileImage" class="col-md-4 col-lg-3 col-form-label">Profile
                                        Image</label>
                                    <div class="col-md-8 col-lg-9">
                                        <img src="<?= base_url() ?>images/profile/<?= $service->img_profile ?>"
                                            alt="Profile">
                                        <div class="pt-2">
                                            <!-- <a href="#" class="btn btn-primary btn-sm"
                                                    title="Upload new profile image"><i class="bi bi-upload"></i></a> -->
                                        </div>
                                    </div>
                                </div>
                                <input type="text" hidden id="user_id"
                                    value="<?= $this->session->userdata('user_id') ?>">
                                <input type="text" hidden id="course_id" value="<?= $service->service_id ?>">

                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label ">Nama Instruktur</div>
                                    <div class="col-lg-9 col-md-8"><?= $service->nickname ?></div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label ">Tentang Instruktur</div>
                                    <div class="col-lg-9 col-md-8"><?= $service->about_person ?></div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">Perusahaan</div>
                                    <div class="col-lg-9 col-md-8"><?= $service->current_company ?></div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">Job</div>
                                    <div class="col-lg-9 col-md-8"><?= $service->current_job ?></div>
                                </div>

                            </div>
                        </div><!-- End Bordered Tabs -->

                    </div>
                </div>

            </div>
            <div class="col-xl-3">

                <div class="card">
                    <img src="<?= base_url() ?>images/<?= $service->img_service ?>" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Kelas <?php echo $service->service_name; ?></h5>
                        <h6 class="card-subtitle mb-2 text-muted">Kelas sudah termasuk: </h6>
                        <ul id="components-nav">
                            <li>
                                <span>Akses Semua Materi selamanya</span>
                            </li>
                            <li>
                                <span>Akses Kuis dan Ujian kelas</span>
                            </li>
                            <li>
                                <span>E-Sertifikat</span>
                            </li>

                        </ul>


                        <div class="d-grid gap-2 mt-3">
                            <a href="" class="btn btn-warning" style="pointer-events: none"
                                type="button"></i><b><?php echo $service->service_price == 0 ? 'FREE' : 'Rp. ' . number_format($service->service_price); // Sangat Baik ?></b></a>
                        </div>
                        <div class="d-grid gap-2 mt-2">
                            <?php if (!$this->session->userdata('user_id')) { ?>
                                <button href="" onclick="alertLogin('<?= base_url('auth') ?>')"
                                    class="btn btn-primary buy_now" type="button">Beli Sekarang</button>
                            <?php } else if ($user_id->user_id == 0) { ?>
                                    <button href="" class="btn btn-primary" id="add_course" type="button">Beli Sekarang</button>
                            <?php } else if ($this->session->userdata('user_id') == $user_id->user_id) { ?>
                                        <a href="<?= base_url() ?>learning/learning_course/<?= $service->service_id ?>"
                                            class="btn btn-primary" id="start_learning" type="button">Mulai
                                            Belajar</a>
                            <?php } ?>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>


</main><!-- End #main -->

<div class="modal fade" id="basicModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Daftar Sekarang</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Tingkatkan keahlian kamu dengan mempelajari kelas ini. Daftar buruan sekarang, tunggu apalagi.
            </div>
            <div class="modal-footer">
                <a href="<?= base_url('auth/registrasi') ?>" id="btn-daftar" class="btn btn-secondary">Daftar</a>
                <a id="btn-login" class="btn btn-primary" href="#">Log in</a>
            </div>
        </div>
    </div>
</div><!-- End Basic Modal-->



<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

<script type="text/javascript">
    function alertLogin(url) {
        console.log(url);
        $('#btn-login').attr('href', url);
        $('#basicModal').modal('show');
    }

    $(document).ready(function () {

        $('#add_course').click(function () {
            var user_id = $('#user_id').val();
            var course_id = $('#course_id').val();
            $.ajax({
                url: "<?php echo site_url('Learning/add_course_user'); ?>",
                method: "POST",
                data: {
                    user_id: user_id,
                    course_id: course_id,
                },
                async: true,
                dataType: 'json',
                success: function (data) {
                    alert('Berhasil ditambahkan');
                    // console.log(data);
                    window.location.reload();
                }
            });
            return false;
        });
    });

</script>