<main id="main" class="main">

    <div class="pagetitle">
        <h1><?= $sharing->title_content ?></h1>
        <nav style="--bs-breadcrumb-divider: '•';">
            <ol class="breadcrumb">
                <!-- <li class="breadcrumb-item"><a href="<?= base_url("learning") ?>">Home</a></li> -->
                <li class="breadcrumb-item"><i class="bi bi-person"></i> Ditulis oleh </li>
                <li class="breadcrumb-item active"><?= $sharing->nickname ?></li>
            </ol>
        </nav>
        
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-xl">

                <div class="card mb-3">
                    <div class="row">

                        <div class="col-md-2"></div>
                        <div class="col">
                            <img src="<?= base_url() ?>images/sharing/<?= $sharing->img_sharing ?>"
                                class="img-fluid rounded-start py-4 px-4" alt="...">
                            <div class="card-body" id="submodule_content">
                                <h5 class="card-title mt-2" id="judul_submodule"><?= $sharing->title_content ?>
                                </h5>
                                <div id="content_submodule"><?php echo nl2br($sharing->content) ?>
                                </div>
                            </div>
                            <div class="card-footer" style="display: none;">
                                <div class="row">
                                    <input id="submodule_course_id" hidden value="">
                                    <input id="module_course_id" hidden value="">
                                    <div class="col-md-6">
                                        <a href="#" id="btn-previous"
                                            class="card-link btn btn-outline-primary">Kembali</a>
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
                        <div class="col-md-2"></div>
                    </div>
                </div>
            </div>
        </div>
    </section>

</main><!-- End #main -->