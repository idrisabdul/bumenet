<main id="main" class="main">

    <div class="pagetitle">
        <h1>Draft</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?= base_url("learning") ?>">Home</a></li>
                <li class="breadcrumb-item"><a href="#">Sharing</a></li>
                <li class="breadcrumb-item active">Menulis</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <form method="post" enctype="multipart/form-data" action="<?= base_url('sharing/insert_content') ?>"
                    id="identifier">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Mulai Menulis</h5>
                            <div class="row mb-3">
                                <label for="inputText" class="col-sm-2 col-form-label">Judul</label>
                                <div class="col-sm-10">
                                    <input type="text" name="title_content" class="form-control" required>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputText" class="col-sm-2 col-form-label">Atribut</label>
                                <div class="col-sm-5">
                                    <input class="form-control" type="file" id="formFile" name="img_sharing" required>
                                </div>
                                <div class="col-sm-5">
                                    <select id="inputState" class="form-select" name="sharing_categorization" required>
                                        <option disabled selected value>-- Pilih kategori --</option>
                                        <?php foreach ($product_category as $pc) { ?>
                                            <option value="<?= $pc->product_category_id ?>">
                                                <?= $pc->product_category_name ?>
                                            </option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>

                            <h5 class="card-title">Content</h5>
                            <div class="quill-editor-full" style="height: 500px">

                            </div>


                        </div>
                        <div class="card-footer">
                            <!-- <a href="#" id="btn-previous" class="card-link btn btn-outline-primary">Cancel</a> -->
                            <div id="done">

                                <button href="#" id="btn-done" type="submit"
                                    class="card-link btn btn-primary d-flex float-end">Publish
                                </button>

                                <!-- <button href="#" id="btn-done" type="submit"
                                    class="card-link btn btn-info d-flex float-end mx-2">Preview
                                </button> -->
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>

</main><!-- End #main -->

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

<script type="text/javascript">


    $(document).ready(function () {
        $("#identifier").on("submit", function () {
            var myEditor = document.querySelector('.quill-editor-full')
            var html = myEditor.children[0].innerHTML
            $(this).append("<textarea name='content' style='display:none' required>" + html + "</textarea>");
        });
    });

</script>