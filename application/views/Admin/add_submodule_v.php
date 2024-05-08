<main id="main" class="main">

    <div class="pagetitle">
        <h1>Add Submodule</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item active">Add Submodule</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <form method="post" enctype="multipart/form-data"
                    action="<?= base_url('Admin/course/insert_module') ?>">
                    <div class="card">
                        <div class="card-body mb-2">
                            <h5 class="card-title">Submodule</h5>

                            <!-- General Form Elements -->

                            <div class="row mb-1">
                                <label for="inputText" class="col-sm-2 col-form-label">Course Name</label>
                                <div class="col-sm-10">
                                    <input type="text" name="service_name" class="form-control"
                                        value="<?= $service->service_name ?>" disabled>
                                    <input type="text" name="course_id" id="course_id" class="form-control" hidden
                                        value="<?= $service->service_id ?>">
                                </div>
                            </div>
                            <div class="row mb-3">
                            </div>
                        </div>

                        <div class="card-body mb-2">
                            <h5 class="card-title">Data Submodule</h5>
                            <div class="row mb-4">
                                <div class="col-sm-7">
                                    <p>Data submodule yang sudah anda dari <code>Module</code> ini.</p>
                                </div>

                            </div>
                            <table class="table table-sm">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Submodule Name</th>
                                        <th scope="col">Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1; ?>
                                    <?php foreach ($module_course as $mc) { ?>

                                        <tr>
                                            <th scope="row"><?= $no++ ?></th>
                                            <td><?= $mc->module_name ?></td>
                                            <td>
                                                <?= $mc->status == 0 ? '<span class="badge bg-warning">Draft</span>' : '<span class="badge bg-success">Publish</span>'; ?>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>

                        <div class="card-body">
                            <h5 class="card-title">Add Module</h5>
                            <label for="inputText" class="col-sm-2 col-form-label"><b>Module Name</b></label>
                            <div class="col-sm-10 mb-3">
                                <input type="text" name="module_name" class="form-control" required>
                            </div>

                            <b>
                                <p>Content</p>
                            </b>
                            <div class="quill-editor-full">
                               
                            </div>
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="card-link btn btn-primary d-flex float-end">Next
                                add submodule
                            </button>
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
        //
        $('#add_module').click(function () {
            $('#new_module').show();
        });
        $('#cancel_add_module').click(function () {
            $('#new_module').hide();
        });

        //
        var x = 0;
        $('#add_submodule').click(function () {
            x = x + 1;
            newRowAdd =
                '<div id="form_module">' +
                '<br><br><div class="row mb-3">' +
                '<div class="row mb-3">' +
                '<label for="inputText" class="col-sm-2 col-form-label"><b>SubModule Name</b></label>' +
                '<div class="col-sm-8">' +
                '<input type="text" name="submodule_name[]" class="form-control" required>' +
                '</div>' +
                '<button type="button" id="remove_module" class="col-sm-1 btn btn-danger float-end"><i class="bi bi-trash me-1"></i></button>' +
                '</div>' +
                '<div class="row mb-3">' +
                '<label for="inputPassword" class="col-sm-2 col-form-label">SubContent Module</label>' +
                '<div class="col-sm-10">' +
                '<textarea class="form-control" name="submodule_content[]" required style="height: 100px"></textarea>' +
                '</div>' +
                '</div>' +
                '</div>';
            $('#course_module').append(newRowAdd);
        });
        $("body").on("click", "#remove_module", function () {
            $(this).parents("#form_module").remove();
        });
    });

    $(document).ready(function () {
        $('#save_and_publish').click(function () {
            var id = $('#course_id').val();
            $.ajax({
                url: "<?php echo site_url('Admin/Product/save_and_publish'); ?>",
                method: "POST",
                data: {
                    id: id
                },
                async: true,
                dataType: 'json',
                success: function (data) {
                    window.location.replace("<?php echo site_url('Admin/Product/'); ?>");
                }
            });
            return false;
        });
    });




    // REFERENSI
    $(document).ready(function () {
        $('#select_user').show();
        $('#input_user').hide();
        $('[name="my_checkbox"]').change(function () {
            if ($('#checkbox_inp').is(':checked')) {
                $('#input_user').show();
                $('#id_users').prop('disabled', true);
                $('#nama_penerima').prop('disabled', false);
            } else {
                $('#input_user').hide();
                $('#nama_penerima').prop('disabled', true);
                $('#id_users').prop('disabled', false);
            }
        });

    });

    $(document).ready(function () {
        $('#select_ass_num').change(function () {
            var id = $(this).val();
            //  var string_text = $(this).text();
            // alert(id);
            var string = $("#select_ass_num option:selected").text();
            $.ajax({
                url: "<?php echo site_url('Asset/get_lastid_asset_number'); ?>",
                method: "POST",
                data: {
                    id: id
                },
                async: true,
                dataType: 'json',
                success: function (data) {
                    $("#asset_number_txt").val(string + '-' + data);
                    $("#asset_number_txtowe").val(string + '-' + data);
                    $("#numbering").val(data);
                    $("#id_asset_number").val(id);
                }
            });
            return false;
        });
    });
</script>