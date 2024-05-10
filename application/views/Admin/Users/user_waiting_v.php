<main id="main" class="main">

    <div class="pagetitle">
        <h1>Data User</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?= base_url("Admin/admin") ?>">Home</a></li>
                <li class="breadcrumb-item active">Data User</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Data User</h5>

                        <!-- Table with stripped rows -->
                        <table class="table datatable">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>
                                        <b>Nickname</b>
                                    </th>
                                    <th>Username</th>
                                    <!-- <th>Course Description</th> -->
                                    <th>Role</th>
                                    <th>Email</th>
                                    <th>Phone Number</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1; ?>
                                <?php foreach ($users as $user) { ?>
                                    <tr>
                                        <td>
                                            <?= $no++ ?>
                                        </td>
                                        <td>
                                            <?= ucfirst($user->nickname) ?>
                                        </td>
                                        <td>
                                            <?= ucfirst($user->username) ?>
                                        </td>
                                        <td>
                                            <?php if ($user->role == 0) { ?>
                                                <span class="badge bg-warning"><?= ucfirst($user->role_name) ?></span>
                                            <?php } else if ($user->role == 1) { ?>
                                                    <span class="badge bg-info"><?= ucfirst($user->role_name) ?></span>
                                            <?php } else if ($user->role == 2) { ?>
                                                        <span class="badge bg-primary"><?= ucfirst($user->role_name) ?></span>
                                            <?php } else if ($user->role == 4) { ?>
                                                            <span class="badge bg-success"><?= ucfirst($user->role_name) ?></span>
                                            <?php } ?>
                                        </td>
                                        <td>
                                            <?= $user->email ?>
                                        </td>
                                        <td>
                                            <?= $user->phone_number ?>
                                        </td>
                                        <td>
                                            <?php if ($user->status_user == 0) { ?>
                                                <span class="badge bg-success">active</span>
                                            <?php } else { ?>
                                                <span class="badge bg-danger">block</span>
                                            <?php } ?>
                                        </td>
                                        <td>
                                            <a target="_blank"
                                                href="<?= base_url('Admin/user_management/user_approved/' . $user->user_id) ?>"
                                                id="edit_module" href="javascript:;" class="btn btn-xs btn-success"><i
                                                    class="bi bi-check2-circle mr-1"></i></a>
                                            <a href="<?= base_url('Admin/course/course_publish/' . $user->user_id) ?>"
                                                id="edit_module" href="javascript:;" class="btn btn-xs btn-danger"><i
                                                    class="bi bi-exclamation-triangle mr-1"></i></a>
                                            <!-- <a href="<?= base_url('Admin/course/list_module/' . $service->service_id) ?>"
                                                id="edit_module" href="javascript:;" class="btn btn-xs btn-warning"><i
                                                    class="bi bi-pencil mr-1"></i></a>
                                            <button
                                                onclick="deleteConfirm('<?= base_url('Admin/Product/delete_service/' . $service->service_id) ?>')"
                                                class="btn btn-xs btn-danger" type="button" href="#!"><i
                                                    class="bi bi-exclamation-octagon"></i></button> -->
                                        </td>
                                    </tr>
                                <?php } ?>

                            </tbody>
                        </table>

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

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

<script type="text/javascript">
    function deleteConfirm(url) {
        console.log(url);
        $('#btn-delete').attr('href', url);
        $('#basicModal').modal('show');
    }
</script>