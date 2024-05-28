<main id="main" class="main">

    <div class="pagetitle">
        <h1>Ujian <?= $service->service_name ?></h1>
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
                    <form method="post" enctype="multipart/form-data" action="<?= base_url("learning/result") ?>">
                        <div class="card-body" id="submodule_content">
                            <?php $numbering = 1; ?>
                            <?php foreach ($questions as $question) { ?>
                                <h5 class="card-title mt-2" id="judul_submodule">Soal <?= $numbering++ ?></h5>
                                <div id="content_submodule"><span><?= $question->question ?></span>
                                    <input type="hidden" name="questionIds[]" value="<?= $question->question_id ?>">
                                    <input type="hidden" name="course_id" value="<?= $question->course_id ?>">
                                </div>
                                <fieldset class="row mt-3">
                                    <div class="col-sm-10">
                                        <?php $answers = $this->db->query("SELECT * FROM answer WHERE question_answer_id='$question->question_id' ORDER BY RAND()"); ?>
                                        <?php foreach ($answers->result() as $answer) { ?>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" required
                                                    name="question_<?= $answer->question_answer_id ?>"
                                                    id="gridRadios1<?= $answer->answer_id ?>" value="<?= $answer->answer_id ?>">
                                                <label class="form-check-label"
                                                    for="gridRadios1<?= $answer->answer_id ?>">
                                                    <?= $answer->answer_content ?>
                                                </label>
                                            </div>
                                        <?php } ?>
                                    </div>
                                </fieldset>
                            <?php } ?>
                        </div>
                        <div class="card-footer">
                            <div class="row">

                                <div id="next">
                                    <button id="btn-next" type="submit"
                                        class="card-link btn btn-primary d-flex float-end justify-content-center">Submit
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
    </section>

</main><!-- End #main -->

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>