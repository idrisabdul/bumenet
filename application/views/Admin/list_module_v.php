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
                    <div class="card-body mb-2">
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
                    <div class="card-body">
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
                                                id="edit_module" href="javascript:;" class="btn btn-xs btn-warning"><i
                                                    class="bi bi-pencil-square mr-1"></i></a>
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
                    <div class="card-footer">


                    </div>
                </div>

            </div>
        </div>
    </section>

</main>

<!-- ADD ITEM MODAL -->
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



<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

<script type="text/javascript">
    function deleteConfirm(url) {
        console.log(url);
        $('#btn-delete').attr('href', url);
        $('#basicModal').modal('show');
    }
</script>