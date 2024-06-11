<main id="main" class="main">

    <div class="pagetitle">
        <h1>Data Submodule</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item active">Data Submodule</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-12">


                <div class="card">
                    <div class="card-body mb-2">
                        <h5 class="card-title">Module</h5>

                        <!-- General Form Elements -->

                        <div class="row mb-1">
                            <label for="inputText" class="col-sm-2 col-form-label">Module Name</label>
                            <div class="col-sm-10">
                                <input type="text" name="service_name" class="form-control"
                                    value="<?= $module->module_name ?>" disabled>
                                <input type="text" name="course_id" id="course_id" class="form-control" hidden
                                    value="<?= $module->module_course_id ?>">
                            </div>
                        </div>
                        <div class="row mb-3">
                        </div>
                    </div>
                    <div class="card-body">
                        <a href="<?= base_url('mentor/mentor/create_content/' . $module->module_course_id) ?>"
                            class="card-link btn btn-primary d-flex float-end"><i class="bi bi-plus me-1"></i>Add
                            Submodule Content
                        </a>
                        <h5 class="card-title">Data Submodule</h5>

                        <!-- Table with stripped rows -->
                        <table class="table table-sm">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>
                                        <b>Submodule</b> Name
                                    </th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1; ?>
                                <?php foreach ($submodules as $submodule) { ?>
                                    <tr>
                                        <td>
                                            <?= $no++ ?>
                                        </td>
                                        <td>
                                            <?= ucfirst($submodule->submodule_name) ?>
                                        </td>

                                        <td>
                                            <!-- <a href="<?= base_url('Admin/course/create_content/' . $submodule->submodule_course_id) ?>"
                                                href="javascript:;" class="btn btn-xs btn-info"><i
                                                    class="bi bi-eye mr-1"></i></a> -->
                                            <a href="<?= base_url('mentor/mentor/edit_submodule/' . $submodule->submodule_course_id) ?>"
                                                id="edit_module" href="javascript:;" class="btn btn-sm btn-warning"><i
                                                    class="bi bi-pencil-square"></i></a>
                                            <button
                                                onclick="deleteConfirm('<?= base_url('mentor/mentor/delete_submodule/' . $submodule->submodule_course_id) ?>')"
                                                class="btn btn-sm btn-danger" type="button" href="#!"><i
                                                    class="bi bi-trash"></i></button>
                                        </td>
                                    </tr>
                                <?php } ?>

                            </tbody>
                        </table>

                    </div>
                    <div class="card-footer">
                        <a href="<?= base_url('mentor/mentor/course/' . $module->course_id) ?>" id="btn-previous"
                            class="card-link btn btn-outline-primary">Back to list module</a>
                    </div>
                </div>

            </div>
        </div>
    </section>

</main>



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
</div><!-- End Basic Modal-->

<div class="modal fade" id="fullscreenModal" tabindex="-1">
    <div class="modal-dialog modal-fullscreen">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Full Screen Modal</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Non omnis incidunt qui sed occaecati magni asperiores est mollitia. Soluta at et reprehenderit. Placeat
                autem numquam et fuga numquam. Tempora in facere consequatur sit dolor ipsum. Consequatur nemo amet
                incidunt est facilis. Dolorem neque recusandae quo sit molestias sint dignissimos.
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div><!-- End Full Screen Modal-->



<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

<script type="text/javascript">
    function deleteConfirm(url) {
        console.log(url);
        $('#btn-delete').attr('href', url);
        $('#basicModal').modal('show');
    }
</script>