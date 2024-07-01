<style>
    pre {
        background-color: #f4f4f4;
        padding: 20px;
        border: 1px solid #ddd;
        border-radius: 5px;
        line-height: 70%;
        max-width: 900px;
        overflow-x: auto;
        /* Enable horizontal scrolling */
        white-space: pre;

    }

    code {
        font-family: Consolas, "Courier New", monospace;
        color: #d63384;
    }

    h3 {
        color: #333;
        /* Warna teks */
        font-size: 24px;
        /* Ukuran font */
        margin-top: 20px;
        /* Jarak atas */
        margin-bottom: 20px;
        /* Jarak bawah */
        font-weight: bold;
        /* Menebalkan teks */
    }

    h1 {
        color: #333;
        /* Warna teks */
        font-size: 24px;
        /* Ukuran font */
        margin-top: 20px;
        /* Jarak atas */
        margin-bottom: 20px;
        /* Jarak bawah */
        font-weight: bold;
        /* Menebalkan teks */
    }
</style>

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
                                <div id="content_submodule" class="lh-lg"><?php echo nl2br($sharing->content) ?>
                                    <!-- <p class="lh-lg">This is a long paragraph written to show how the line-height of an element is affected by our utilities. Classes are applied to the element itself or sometimes the parent element. These classes can be customized as needed with our utility API.</p> -->
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