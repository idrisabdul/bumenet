<main id="main" class="main">

    <div class="pagetitle">
        <h1>Hasil dari Ujian <?= $service->service_name ?></h1>
        <nav>
            <ol class="breadcrumb">
                <!-- <li class="breadcrumb-item"><a href="<?= base_url("learning") ?>">Home</a></li>
                <li class="breadcrumb-item active">Dashboard saya</li> -->
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section profile">
        <div class="row">
            <div class="col-xl">
                <div class="card">

                    <div class="card-body mb-2 mt-4">
                        <!-- <br>
                        <br> -->
                        <div class="row">
                            <div class="col-lg-6">
                                <?php if ($score >= 80) { ?>
                                    <img src="<?= base_url() ?>/assets/img/graduate.png" class="rounded mx-auto d-block"
                                        alt="...">
                                <?php } else { ?>
                                    <img src="<?= base_url() ?>/assets/img/tidaklulus.jpg" class="rounded mx-auto d-block"
                                        alt="...">
                                <?php } ?>


                                <!-- <h5 class="card-title">Organisasi yang Menerbitkan</h5>
                                <span>Bumenet Academy Indonesia</span>
                                <h5 class="card-title">ID Kredensial</h5>
                                <span>BAIBDDD280520240</span> -->
                            </div>
                            <div class="col-lg-6">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <h5 class="card-title">Nilai</h5>
                                        <div class="d-flex">
                                            <h5 style="font-size:4vw; font-weight: bold;"><?= $score ?></h5>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <h5 class="card-title">Dinyatakan</h5>
                                        <?php if ($score >= 80) { ?>
                                            <h4><span class="badge bg-success">Lulus</span></h4>
                                        <?php } else { ?>
                                            <h4><span class="badge bg-danger">Belum Lulus</span></h4>
                                        <?php } ?>
                                    </div>
                                </div>
                                <h5 class="card-title">Informasi</h5>
                                <?php if ($score >= 80) { ?>
                                    Selamat anda sudah berhasil lulus dari kelas ini dengan nilai yang sangat baik. Ini
                                    membuktikan bahwa anda sudah memahami dari setiap modul kelas ini.
                                <?php } else { ?>
                                    Untuk dinyatakan lulus dan mendapatkan sertifikat, anda harus mendapatkan setidaknya
                                    nilai 80 atau lebih. Anda hanya diberi kesempatan sebanyak 3x untuk melakukan ujian
                                    ulang.
                                <?php } ?>

                                <h5 class="card-title">Action</h5>
                                <?php if ($score >= 80) { ?>
                                    <button href="#" class="btn btn-primary" id="editquestion" href="javascript:;"><i
                                            class="bi bi-file-earmark-text mr-1"></i>
                                        Lihat Sertifikat</button>
                                <?php } else { ?>
                                    <button href="#" class="btn btn-warning" id="editquestion" href="javascript:;"><i
                                            class="bi bi-pencil mr-1"></i>
                                        Mulai Ujian lagi</button>
                                <?php } ?>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
    </section>

</main><!-- End #main -->

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>