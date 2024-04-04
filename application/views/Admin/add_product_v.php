<main id="main" class="main">

    <div class="pagetitle">
      <h1>Add Products and Services</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item active">Add Products and Services</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">General Form Elements</h5>

              <!-- General Form Elements -->
              <form method="post" enctype="multipart/form-data" action="<?= base_url('Admin/Product/insert_service') ?>">
                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">Service Name</label>
                  <div class="col-sm-10">
                    <input type="text" name="service_name" class="form-control">
                  </div>
                </div>
                <div class="row mb-3">
                  <label class="col-sm-2 col-form-label">Service Categorization</label>
                  <div class="col-sm-10">
                    <select class="form-select" aria-label="Default select example" name="product_categories_id">
                      <option selected>-- Select --</option>
                      <option value="1">Infrastructure As Code</option>
                      <option value="2">Containerazing</option>
                      <option value="3">CI/CD</option>
                      <option value="4">Monitoring Apps</option>
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
                      <option selected>Idris Abdul Azis</option>
                      <option value="1">Ahmad Zaenuddin</option>
                      <option value="2">Asep Containerazing</option>
                      <option value="2">Joko Docker</option>
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
                    <button type="submit" name="service_save" class="btn btn-primary">Submit Form</button>
                  </div>
                </div>

              </form><!-- End General Form Elements -->

            </div>
          </div>

        </div>
      </div>
    </section>

  </main><!-- End #main -->