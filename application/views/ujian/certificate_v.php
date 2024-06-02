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

                        <h5 class="card-title">Unduh E-Sertifikat</h5>
                        <a href="<?= base_url() ?>mydashboard/get_certificate/<?= $service->service_id ?>" class="btn btn-primary" id="editquestion" href="javascript:;"><i
                                class="bi bi-download mr-1"></i>
                            Unduh Sertifikat</a>

                        <br>
                        <br>
                        <table class="table table-sm">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Tanggal Ujian</th>
                                    <th>Nilai</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1; ?>
                                <?php foreach ($results as $result) { ?>
                                    <tr>
                                        <td>
                                            <?= $no++ ?>
                                        </td>
                                        <td>
                                            <?= $result->date_exam ?>
                                        </td>
                                        <td>
                                            <?= $result->score ?>
                                        </td>
                                        <td>
                                            <?php if ($result->status == 1) { ?>
                                                <span class="badge bg-success">Lulus</span>
                                            <?php } else if ($result->status == 0) { ?>
                                                    <span class="badge bg-danger">Tidak Lulus</span>
                                            <?php } ?>
                                        </td>
                                    </tr>
                                <?php } ?>

                            </tbody>
                        </table>
                        <div class="row">
                            <div class="col-lg-6">
                                <h5 class="card-title">Nama Sertifikat</h5>
                                <span><?= $service->service_name ?></span>
                                <h5 class="card-title">Organisasi yang Menerbitkan</h5>
                                <span>Bumenet Academy Indonesia</span>
                                <h5 class="card-title">ID Kredensial</h5>
                                <span><?= $certificate->credential_id; ?></span>
                            </div>
                            <div class="col-lg-6">
                                <h5 class="card-title">Tanggal Terbit</h5>
                                <span><?= $certificate->created_date ?></span>
                                <h5 class="card-title">Tanggal Kadaluarsa</h5>
                                <span>-</span>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
    </section>

</main><!-- End #main -->

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>