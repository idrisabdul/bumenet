<main id="main" class="main">

  <div class="pagetitle">
    <h1>Add Service</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
        <li class="breadcrumb-item active">Add Service</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->

  <section class="section">
    <div class="row">
      <div class="col-lg-12">

        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Add Service</h5>

            <!-- General Form Elements -->
            <form method="post" enctype="multipart/form-data" action="<?= base_url('Admin/Product/insert_service') ?>">
              <div class="row mb-3">
                <label for="inputText" class="col-sm-2 col-form-label">Service Name</label>
                <div class="col-sm-10">
                  <input type="text" name="service_name" class="form-control">
                </div>
              </div>
              <div class="row mb-3">
                <label class="col-sm-2 col-form-label">Service Category</label>
                <div class="col-sm-10">
                  <select class="form-select" aria-label="Default select example" name="product_categories_id">
                    <option disabled selected value>-- Pilih --</option>
                    <?php foreach ($product_category as $pc) { ?>
                      <option value="<?= $pc->product_category_id ?>">
                        <?= $pc->product_category_name ?>
                      </option>
                    <?php } ?>
                  </select>
                </div>
              </div>
              <div class="row mb-3">
                <label for="inputPassword" class="col-sm-2 col-form-label">Description</label>
                <div class="col-sm-10">
                  <textarea class="form-control" name="service_description" style="height: 100px"></textarea>
                </div>
              </div>
              <div class="row mb-3">
                <label for="inputNumber" class="col-sm-2 col-form-label">Price</label>
                <div class="col-sm-10">
                  <input type="number" name="service_price" class="form-control">
                </div>
              </div>
              <div class="row mb-3">
                <label class="col-sm-2 col-form-label">Service Performed By</label>
                <div class="col-sm-10">
                  <select class="form-select" aria-label="Default select example" name="service_created_by">
                    <option disabled selected value>-- Pilih --</option>
                    <?php foreach ($users as $user) { ?>
                      <option value="<?= $user->user_id ?>">
                        <?= $user->nickname ?>
                      </option>
                    <?php } ?>
                  </select>
                </div>
              </div>
              <div class="row mb-3">
                <label for="inputNumber" class="col-sm-2 col-form-label">File Upload</label>
                <div class="col-sm-10">
                  <!-- <?php echo form_open_multipart('upload/do_upload'); ?> -->
                  <!-- <input type="file" class="form-control" name="picture"> -->
                  <input class="form-control" type="file" id="formFile" name="picture">
                </div>
              </div>


              <div class="row mb-3">
                <div class="col-sm-10">
                  <button type="submit" name="service_save" class="btn btn-primary">Submit</button>
                </div>
              </div>

            </form><!-- End General Form Elements -->

          </div>
        </div>

      </div>
    </div>
  </section>

</main><!-- End #main -->