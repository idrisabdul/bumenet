<main id="main" class="main">

    <div class="pagetitle">
        <h1>Data Module</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item active">Data Module</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-12">


                <div class="card">
                    <div class="card-body mb-2 mt-4">
                        <button href="#" id="editcourse_js" href="javascript:;" data-bs-toggle="modal"
                            data-bs-target="#editcourse" class="card-link btn btn-info d-flex float-end mt-2"><i
                                class="bi bi-pencil me-1"></i> Edit
                            Parent Course
                        </button>
                        <h5 class="card-title">Course</h5>

                        <!-- General Form Elements -->

                        <div class="row mb-3">
                            <label for="inputText" class="col-sm-2 col-form-label">Course Name</label>
                            <div class="col-sm-10">
                                <input type="text" name="service_name" class="form-control"
                                    value="<?= $service->service_name ?>" disabled>
                                <input type="text" name="course_id" id="course_id" class="form-control" hidden
                                    value="<?= $service->service_id ?>">
                            </div>
                        </div>
                        <div class="row mb-1">
                            <label for="inputText" class="col-sm-2 col-form-label">Duration course</label>
                            <div class="col-sm-10">
                                <input type="text" name="service_name" class="form-control"
                                    value="<?= $total_duration->total ?> Menit" disabled>
                                <input type="text" name="course_id" id="course_id" class="form-control" hidden
                                    value="<?= $service->service_id ?>">
                            </div>
                        </div>
                        <div class="row mb-3">
                        </div>
                    </div>

                    <div class="card-body mb-2">
                        <button data-bs-toggle="modal" data-bs-target="#addModal"
                            class="card-link btn btn-primary d-flex float-end"><i class="bi bi-plus me-1"></i> Add
                            Module
                        </button>
                        <h5 class="card-title">Data Module</h5>

                        <!-- Table with stripped rows -->
                        <table class="table table-sm">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>
                                        <b>Module</b> Name
                                    </th>
                                    <th>Total submodule</th>
                                    <th>Duration</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1; ?>
                                <?php foreach ($modules as $module) { ?>
                                    <tr>
                                        <td>
                                            <?= $no++ ?>
                                        </td>
                                        <td>
                                            <?= ucfirst($module->module_name) ?>
                                        </td>

                                        <td>
                                            <?php $submodule = $this->db->query("SELECT COUNT(submodule_course_id) AS total_submodule FROM submodule_course WHERE module_course_id='$module->module_course_id'")->row(); ?>
                                            <?= $submodule->total_submodule ?>
                                        </td>
                                        <td>
                                            <?= ucfirst($module->duration) ?> Menit
                                        </td>


                                        <td>
                                            <a href="<?= base_url('Admin/course/list_submodule/' . $module->module_course_id) ?>"
                                                id="edit_module" href="javascript:;" class="btn btn-xs btn-info"><i
                                                    class="bi bi-eye mr-1"></i></a>
                                            <button href="#" id="editmodule" href="javascript:;"
                                                data-id="<?php echo $module->module_course_id ?>"
                                                data-module_name="<?php echo $module->module_name ?>"
                                                data-duration="<?php echo $module->duration ?>"
                                                class="btn btn-xs btn-warning" data-bs-toggle="modal"
                                                data-bs-target="#edit"><i class="bi bi-pencil-square mr-1"></i></button>

                                            <button
                                                onclick="deleteConfirm('<?= base_url('Admin/course/delete_module/' . $module->module_course_id) ?>')"
                                                class="btn btn-xs btn-danger" type="button" href="#!"><i
                                                    class="bi bi-trash"></i></button>
                                        </td>
                                    </tr>
                                <?php } ?>

                            </tbody>
                        </table>

                    </div>

                    <div class="card-body">
                        <button data-bs-toggle="modal" data-bs-target="#addQuiz"
                            class="card-link btn btn-primary d-flex float-end"><i class="bi bi-plus me-1"></i> Add
                            Question
                        </button>
                        <h5 class="card-title">Data Quiz</h5>

                        <!-- Table with stripped rows -->
                        <?php $no = 1; ?>
                        <?php $numbering = 1; ?>
                        <?php foreach ($questions as $question) { ?>
                            <b><?= $numbering++ ?>.</b>
                            <b>Question : </b><br><span><?= $question->question ?></span>
                            <button
                                onclick="deleteConfirm('<?= base_url('Admin/course/delete_question/' . $question->question_id) ?>')"
                                class="btn btn-sm btn-outline-danger float-end mx-2" type="button" href="#!"><i
                                    class="bi bi-trash"></i></button>
                            <button href="#" id="editquestion" href="javascript:;"
                                data-id="<?php echo $question->question_id ?>"
                                data-question="<?php echo $question->question ?>"
                                class="btn btn-outline-primary btn-sm float-end" data-bs-toggle="modal"
                                data-bs-target="#edit_question"><i class="bi bi-pencil-square mr-1"></i>
                                Edit this question</button>


                            <table class="table table-sm" id="question_<?= $no++ ?>">
                                <thead>
                                    <tr>
                                        <th>
                                            <b>Answer</b>
                                        </th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1; ?>
                                    <?php $answers = $this->db->query("SELECT * FROM answer WHERE question_answer_id='$question->question_id' ORDER BY RAND()"); ?>
                                    <?php foreach ($answers->result() as $answer) { ?>
                                        <tr>
                                            <td>
                                                <?= ucfirst($answer->answer_content) ?>
                                                <?php if ($answer->correct_answer == 1) { ?>
                                                    <i class="bi bi-check-circle-fill"></i>
                                                <?php } ?>
                                            </td>


                                            <!-- <td>
                                            <?php if ($question->correct_answer == 1) { ?>
                                                <i class="bi bi-check-circle-fill"></i>
                                            <?php } ?>
                                            <?= ucfirst($question->answer_content) ?>
                                        </td> -->


                                            <td>
                                                <!-- action -->
                                                <!-- <a href="<?= base_url('Admin/course/list_submodule/' . $module->module_course_id) ?>"
                                                id="edit_module" href="javascript:;" class="btn btn-xs btn-info"><i
                                                    class="bi bi-eye mr-1"></i></a> -->
                                                <!-- <button href="#" id="editanswer" href="javascript:;"
                                                data-id="<?php echo $module->module_course_id ?>"
                                                data-module_name="<?php echo $module->module_name ?>"
                                                data-duration="<?php echo $module->duration ?>"
                                                class="btn btn-xs btn-warning" data-bs-toggle="modal"
                                                data-bs-target="#edit_answer"><i class="bi bi-pencil-square mr-1"></i> Edit Answer</button> -->
                                                <button href="#" id="editanswer" href="javascript:;"
                                                    data-id="<?php echo $answer->answer_id ?>"
                                                    data-answer="<?php echo $answer->answer_content ?>"
                                                    class="btn btn-sm btn-info" data-bs-toggle="modal"
                                                    data-bs-target="#edit_answer"><i class="bi bi-pencil-square mr-1"></i>
                                                    Edit Answer</button>
                                                <!-- <button
                                                    onclick="deleteConfirm('<?= base_url('Admin/course/delete_question/' . $question->question_id) ?>')"
                                                    class="btn btn-sm btn-danger" type="button" href="#!"><i
                                                        class="bi bi-trash"></i></button> -->
                                            </td>
                                        </tr>
                                    <?php } ?>

                                </tbody>
                            </table>
                            <br>
                        <?php } ?>
                    </div>
                    <div class="card-footer">
                    </div>
                </div>

            </div>
        </div>
    </section>

</main>

<!-- ADD ITEM MODAL MODULE -->
<div class="modal fade" id="addModal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="title" id="defaultModalLabel">Add Module</h4>
            </div>
            <form action="<?= base_url('Admin/course/insert_module') ?>" method="POST">
                <div class="modal-body">
                    <div class="row clearfix mb-3">
                        <div class="col-sm-12">
                            <label for="">Module Name</label>
                            <div class="form-group">
                                <input type="text" name="course_id" class="form-control" hidden
                                    value="<?= $service->service_id ?>" required />
                                <input type="text" name="module_name" class="form-control" placeholder="" required />
                            </div>
                        </div>
                    </div>
                    <div class="row clearfix mb-3">
                        <div class="col-sm-12">
                            <label for="">Duration</label>
                            <div class="form-group">
                                <input type="number" name="duration" class="form-control"
                                    placeholder="Dalam hitungan menit" required />
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- ADD ITEM MODAL QUIZ -->
<div class="modal fade" id="addQuiz" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="title" id="defaultModalLabel">Add Question</h4>
            </div>
            <form action="<?= base_url('Admin/course/insert_quiz') ?>" method="POST">
                <div class="modal-body">
                    <div class="row clearfix mb-3">
                        <div class="col-sm-12">
                            <label for="">Question</label>
                            <div class="form-group">
                                <textarea name="question" class="form-control" id=""></textarea>
                                <input type="text" name="course_id" class="form-control" hidden
                                    value="<?= $service->service_id ?>" required />
                                <!-- <input type="text" name="module_name" class="form-control" placeholder="" required /> -->
                            </div>
                        </div>
                    </div>
                    <div class="row clearfix mb-3">
                        <div class="col-sm-12">
                            <label for="">Correct Answer</label>
                            <div class="form-group">
                                <input type="text" name="answer_content_correct" class="form-control" placeholder=""
                                    required />
                            </div>
                        </div>
                    </div>
                    <div class="row clearfix mb-3">
                        <div class="col-sm-12">
                            <label for="">Wrong Answer</label>
                            <div class="form-group">
                                <input type="text" name="answer_content[]" class="form-control" placeholder=""
                                    required />
                            </div>
                        </div>
                    </div>
                    <div class="row clearfix mb-3">
                        <div class="col-sm-12">
                            <label for="">Wrong Answer</label>
                            <div class="form-group">
                                <input type="text" name="answer_content[]" class="form-control" placeholder=""
                                    required />
                            </div>
                        </div>
                    </div>
                    <div class="row clearfix mb-3">
                        <div class="col-sm-12">
                            <label for="">Wrong Answer</label>
                            <div class="form-group">
                                <input type="text" name="answer_content[]" class="form-control" placeholder=""
                                    required />
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- EDIT ITEM MODAL QUIZ -->
<div class="modal fade" id="edit_question" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="title" id="defaultModalLabel">Edit Question</h4>
            </div>
            <form action="<?= base_url('Admin/course/update_question') ?>" method="POST">
                <div class="modal-body">
                    <div class="row clearfix mb-3">
                        <div class="col-sm-12">
                            <label for="">Question</label>
                            <div class="form-group">
                                <input type="text" name="question_id" id="question_id_edit" class="form-control" hidden
                                    value="" required />
                                <textarea name="question" id="question_edit" class="form-control"></textarea>
                                <input type="text" name="course_id" class="form-control" hidden
                                    value="<?= $service->service_id ?>" required />
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- EDIT ITEM MODAL MODULE -->
<div class="modal fade" id="edit" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="title" id="defaultModalLabel">Edit Module</h4>
            </div>
            <form action="<?= base_url('Admin/course/update_module') ?>" method="POST">
                <div class="modal-body">
                    <div class="row clearfix mb-3">
                        <div class="col-sm-12">
                            <label for="">Module Name</label>
                            <div class="form-group">
                                <input type="text" name="course_id" class="form-control" hidden
                                    value="<?= $service->service_id ?>" id="course_id" required />
                                <input type="text" name="module_course_id" class="form-control" hidden value="" id="id"
                                    required />
                                <input type="text" name="module_name" id="module_name" class="form-control"
                                    placeholder="" required />
                            </div>
                        </div>
                    </div>
                    <div class="row clearfix mb-3">
                        <div class="col-sm-12">
                            <label for="">Duration</label>
                            <div class="form-group">
                                <input type="number" name="duration" id="duration" class="form-control"
                                    placeholder="Dalam hitungan menit" required />
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- EDIT ITEM MODAL PARENT COURSE -->
<div class="modal fade" id="editcourse" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="title" id="defaultModalLabel">Edit Course</h4>
            </div>
            <form action="<?= base_url('Admin/course/update_course') ?>" method="POST" id="identifier">
                <div class="modal-body">
                    <div class="row clearfix mb-3">
                        <div class="col-sm-12">
                            <label for="">Course Title</label>
                            <div class="form-group">
                                <input type="text" name="course_id" class="form-control" hidden
                                    value="<?= $service->service_id ?>" id="course_id" required />
                                <input type="text" name="service_name" id="service_name" class="form-control"
                                    placeholder="" value="<?= $service->service_name ?>" required />
                            </div>
                        </div>
                    </div>
                    <div class="row clearfix mb-3">
                        <div class="col-sm-12">
                            <label for="inputNumber" class="col-sm-2 col-form-label">File Upload</label>
                            <div class="form-group">
                                <!-- <?php echo form_open_multipart('upload/do_upload'); ?> -->
                                <!-- <input type="file" class="form-control" name="picture"> -->
                                <input class="form-control" type="file" id="formFile" name="picture">
                            </div>
                        </div>
                    </div>
                    <div class="row clearfix mb-3">
                        <div class="col-sm-6">
                            <label for="">Price</label>
                            <div class="form-group">
                                <input type="text" name="service_price" id="service_price"
                                    value="<?= $service->service_price ?>" class="form-control" value="" id="id"
                                    required />
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <label for="">Discount</label>
                            <div class="form-group">
                                <input type="text" name="discount" id="discount" value="<?= $service->discount ?>"
                                    class="form-control" value="" id="id" required />
                            </div>
                        </div>
                    </div>
                    <div class="row clearfix mb-3">
                        <div class="col-sm-12">
                            <label for="">Description</label>
                            <div class="form-group">
                                <div class="quill-editor-full" style="height: 150px">
                                    <?= $service->service_description ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- EDIT ITEM MODAL ANSWER -->
<div class="modal fade" id="edit_answer" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="title" id="defaultModalLabel">Edit Answer</h4>
            </div>
            <form action="<?= base_url('Admin/course/update_answer') ?>" method="POST">
                <div class="modal-body">
                    <div class="row clearfix mb-3">
                        <div class="col-sm-12">
                            <label for="">Answer</label>
                            <div class="form-group">
                                <input type="text" name="answer_id" id="answer_id_edit" class="form-control" hidden
                                    value="" required />
                                <input type="text" name="answer_content" id="answer_content_edit" class="form-control"
                                    value="" required />
                                <input type="text" name="course_id" class="form-control" hidden
                                    value="<?= $service->service_id ?>" required />
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>

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
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

<script type="text/javascript">
    function deleteConfirm(url) {
        console.log(url);
        $('#btn-delete').attr('href', url);
        $('#basicModal').modal('show');
    }

    $(document).ready(function () {
        $(document).on('click', '#editmodule', function () {

            var id = $(this).data('id');
            var module_name = $(this).data('module_name');
            var duration = $(this).data('duration');
            var course_id = $(this).data('course_id');

            $('#id').val(id);
            $('#module_name').val(module_name);
            $('#duration').val(duration);
        });
    });


    $(document).ready(function () {
        $(document).on('click', '#editquestion', function () {

            var id = $(this).data('id');
            var question = $(this).data('question');

            $('#question_id_edit').val(id);
            $('#question_edit').val(question);
        });
    });


    $(document).ready(function () {
        $(document).on('click', '#editanswer', function () {

            var id = $(this).data('id');
            var answer = $(this).data('answer');

            $('#answer_id_edit').val(id);
            $('#answer_content_edit').val(answer);
        });
    });


    $(document).ready(function () {
        $("#identifier").on("submit", function () {
            var myEditor = document.querySelector('.quill-editor-full')
            var html = myEditor.children[0].innerHTML
            $(this).append("<textarea name='service_description' style='display:none'>" + html + "</textarea>");
        });
    });
</script>