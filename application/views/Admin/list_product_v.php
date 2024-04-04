<main id="main" class="main">

  <div class="pagetitle">
    <h1>Data Services</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
        <li class="breadcrumb-item active">Data Services</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->

  <section class="section">
    <div class="row">
      <div class="col-lg-12">

        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Data Services</h5>

            <!-- Table with stripped rows -->
            <table class="table datatable">
              <thead>
                <tr>
                  <th>No</th>
                  <th>
                    <b>Service</b> Name
                  </th>
                  <th>Service Categorization</th>
                  <th>Service Description</th>
                  <th>Price</th>
                  <th>Created By</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <?php $no = 1; ?>
                <?php foreach ($services as $service) { ?>
                  <tr>
                    <td><?= $no++ ?></td>
                    <td><?= ucfirst($service->service_name) ?></td>
                    <td><?= ucfirst($service->product_categories_id) ?></td>
                    <td><?= ucfirst($service->service_description) ?></td>
                    <td>Rp. <?= ucfirst($service->service_price) ?></td>
                    <td><?= ucfirst($service->service_created_by) ?></td>
                    <td>edit etc</td>
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