<main id="main" class="main">

    <div class="pagetitle">
        <h1>Kelas <?= $service->service_name ?></h1>
        <nav style="--bs-breadcrumb-divider: '';">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active"><i class="bi bi-clock"></i></li>
                <li class="breadcrumb-item active">1 Jam 51 Menit Belajar</li>
            </ol>
    </div><!-- End Page Title -->

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
                                    <!-- <div class="col-lg-3 col-md-8">Kevin Anderson</div> -->
                                </div>
                                <h5 class="card-title fst-italic">*Kelas ini terdapat Kuis dan Ujian, Kamu akan
                                    mendapatkan Sertifikat Kelulusan setelah Menyelesaikan Ujian.</h5>
                                <h5 class="card-title fst-italic">**Diharapkan untuk mengakses kelas ini dengan
                                    menggunakan komputer atau laptop.</h5>

                            </div>

                            <div class="tab-pane fade profile-edit pt-3" id="profile-edit">
                                <h5 class="card-title">Materi yang akan Kamu pelajari pada kelas ini</h5>
                                <!-- List group with Advanced Contents -->
                                <div class="list-group">
                                    <?php foreach ($module_course as $mc) { ?>
                                        <a href="#" class="list-group-item list-group-item-action">
                                            <div class="d-flex w-100 justify-content-between">
                                                <h5 class="mb-1"><?= $mc->module_name ?></h5>
                                                <small class="text-muted"><?= $mc->duration ?> Menit</small>
                                            </div>
                                        </a>
                                    <?php } ?>
                                </div><!-- End List group Advanced Content -->
                            </div>

                            <div class="tab-pane fade profile-overview pt-3" id="profile-settings">

                                <div class="row mb-3">
                                    <label for="profileImage" class="col-md-4 col-lg-3 col-form-label label ">Profile
                                        Image</label>
                                    <div class="col-md-8 col-lg-9">
                                        <img src="<?= base_url() ?>assets/img/profile-img.jpg" alt="Profile">
                                    </div>
                                </div>

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

                            <!-- <div class="tab-pane fade pt-3" id="profile-change-password">
                                <form>

                                    <div class="row mb-3">
                                        <label for="currentPassword" class="col-md-4 col-lg-3 col-form-label">Current
                                            Password</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="password" type="password" class="form-control"
                                                id="currentPassword">
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="newPassword" class="col-md-4 col-lg-3 col-form-label">New
                                            Password</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="newpassword" type="password" class="form-control"
                                                id="newPassword">
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="renewPassword" class="col-md-4 col-lg-3 col-form-label">Re-enter New
                                            Password</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="renewpassword" type="password" class="form-control"
                                                id="renewPassword">
                                        </div>
                                    </div>

                                    <div class="text-center">
                                        <button type="submit" class="btn btn-primary">Change Password</button>
                                    </div>
                                </form>

                            </div> -->

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

                        <!-- <a href="#" class="btn btn-primary">Beli Sekarang</a> -->
                        <div class="d-grid gap-2 mt-3">
                            <a href="" class="btn btn-warning" style="pointer-events: none"
                                type="button"></i><b><?php echo $service->service_price == 0 ? 'FREE' : 'Rp. ' . $service->service_price; // Sangat Baik ?></b></a>
                        </div>
                        <div class="d-grid gap-2 mt-2">
                            <a href="" class="btn btn-primary" type="button">Beli Sekarang</a>
                        </div>
                    </div>
                </div><!-- End Card with an image on top -->

            </div>


        </div>
    </section>

</main><!-- End #main -->