<main id="main" class="main">

  <div class="pagetitle">
    <h1>Data Courses</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
        <li class="breadcrumb-item active">Data Courses</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->

  <section class="section">
    <div class="row">
      <div class="col-lg-12">

        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Data Courses</h5>

            <!-- Table with stripped rows -->
            <table class="table datatable">
              <thead>
                <tr>
                  <th>No</th>
                  <th>
                    <b>Course</b> Name
                  </th>
                  <th>Course Categorization</th>
                  <!-- <th>Course Description</th> -->
                  <th>Price</th>
                  <th>Created By</th>
                  <th>Total Module</th>
                  <th>Status Course</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <?php $no = 1; ?>
                <?php foreach ($services as $service) { ?>
                  <tr>
                    <td>
                      <?= $no++ ?>
                    </td>
                    <td>
                      <?= ucfirst($service->service_name) ?>
                    </td>
                    <td>
                      <?= ucfirst($service->product_category_name) ?>
                    </td>
                    <!-- <td>
                      <?= ucfirst($service->service_description) ?>
                    </td> -->
                    <td>Rp.
                      <?= ucfirst($service->service_price) ?>
                    </td>
                    <td>
                      <?= ucfirst($service->nickname) ?>
                    </td>
                    <td>
                      <?php $module = $this->db->query("SELECT COUNT(module_course_id) AS total_module FROM module_course WHERE course_id='$service->service_id'")->row(); ?>
                      <?= $module->total_module ?>
                    </td>
                    <td>
                      <?php if ($service->status_course == 0) { ?>
                        <span class="badge bg-warning">Draft</span>
                      <?php } else if ($service->status_course == 1) { ?>
                          <span class="badge bg-success">Publish</span>
                      <?php } ?>
                    </td>

                    </td>
                    <td>
                      <a href="<?= base_url('Admin/course/course_publish/' . $service->service_id) ?>" id="edit_module"
                      href="javascript:;" class="btn btn-sm btn-success"><i class="bi bi-cloud-upload mr-1"></i></a>
                      <a target="_blank" href="<?= base_url('mentor/mentor/preview_course/' . $service->service_id) ?>" id="edit_module"
                      href="javascript:;" class="btn btn-sm btn-info"><i class="bi bi-eye mr-1"></i></a>
                      <a href="<?= base_url('mentor/mentor/course/' . $service->service_id) ?>" id="edit_module"
                        href="javascript:;" class="btn btn-sm btn-warning"><i class="bi bi-pencil mr-1"></i></a>
                      <button
                        onclick="deleteConfirm('<?= base_url('mentor/mentor/delete_course/' . $service->service_id) ?>')"
                        class="btn btn-sm btn-danger" type="button" href="#!"><i
                          class="bi bi-exclamation-octagon"></i></button>
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