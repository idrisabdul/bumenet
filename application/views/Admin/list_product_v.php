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
                  <th>Course Description</th>
                  <th>Price</th>
                  <th>Created By</th>
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
                    <td>
                      <?= ucfirst($service->service_description) ?>
                    </td>
                    <td>Rp.
                      <?= ucfirst($service->service_price) ?>
                    </td>
                    <td>
                      <?= ucfirst($service->nickname) ?>
                    </td>

                    </td>
                    <td>
                      <button
                        onclick="deleteConfirm('<?= base_url('Admin/Product/delete_service/' . $service->service_id) ?>')"
                        class="btn btn-xs btn-danger" type="button" href="#!"><i class="bi bi-exclamation-octagon"></i></button>
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