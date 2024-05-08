<main id="main" class="main">

  <div class="pagetitle">
    <h1>Add Course</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
        <li class="breadcrumb-item active">Add Course</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->

  <section class="section">
    <div class="row">
      <div class="col-lg-12">
        <form method="post" enctype="multipart/form-data" action="<?= base_url('Admin/Product/insert_service') ?> "
          id="identifier">
          <div class="card">
            <div class="card-body mb-5">
              <h5 class="card-title">Add Course</h5>

              <!-- General Form Elements -->

              <div class="row mb-3">
                <label for="inputText" class="col-sm-2 col-form-label">Course Name</label>
                <div class="col-sm-10">
                  <input type="text" name="service_name" class="form-control" required>
                </div>
              </div>
              <div class="row mb-3">
                <label class="col-sm-2 col-form-label">Course Category</label>
                <div class="col-sm-10">
                  <select class="form-select" aria-label="Default select example" name="product_categories_id" required>
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
                  <div class="quill-editor-full" id="desc">
                  </div>
                </div>
              </div>
              <div class="row mb-3 pt-5">
                <label for="inputNumber" class="col-sm-2 col-form-label">Price</label>
                <div class="col-sm-5">
                  <input type="number" name="service_price" class="form-control" required>
                </div>
                <div class="col-sm-5">
                  <input type="number" name="discount" class="form-control" placeholder="Discount" required>
                </div>
              </div>
              <div class="row mb-3">
                <label class="col-sm-2 col-form-label">Course Created By</label>
                <div class="col-sm-10">
                  <select class="form-select" aria-label="Default select example" name="service_created_by" required>
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
                  <input class="form-control" type="file" id="formFile" name="picture" required>
                </div>
              </div>


              <div class="row mb-3">
                <div class="col-sm-10">
                  <!-- <button type="submit" name="service_save" class="btn btn-primary">Submit</button> -->
                </div>
              </div>



            </div>
            <div class="card-body">
              <div class="row mb-3">
                <div class="col-sm-10">
                  <h5 class="card-title">Module</h5>
                </div>
                <div class="col-sm-2">
                  <button type="button" id="add_submodule" class="btn btn-outline-primary"><i
                      class="bi bi-plus me-1"></i>
                    Add SubModule</button>
                </div>
              </div>
              <div class="row mb-3">
                <label for="inputText" class="col-sm-2 col-form-label"><b>Module Name</b></label>
                <div class="col-sm-10">
                  <input type="text" name="module_name" class="form-control" required>
                </div>
              </div>
              <div class="row mb-5">
                <label for="inputText" class="col-sm-2 col-form-label">Duration</label>
                <div class="col-sm-10">
                  <input type="text" name="duration" class="form-control" placeholder="dalam hitungan menit" required>
                </div>
              </div>
              <div class="row mb-3">
                <label for="inputText" class="col-sm-2 col-form-label"><b>SubModule Name</b></label>
                <div class="col-sm-10">
                  <input type="text" name="submodule_name[]" class="form-control">
                </div>
              </div>
              <div class="row mb-5">
                <label for="inputPassword" class="col-sm-2 col-form-label">SubContent Module</label>
                <div class="col-sm-10">
                  <!-- <textarea class="form-control" name="submodule_content[]" style="height: 100px"></textarea> -->
                  <div class="quill-editor-default" id="submodule_content">
                  </div>
                </div>
              </div>
              <div id="course_module">
              </div>



              <div class="row mb-3">
                <div class="col-sm-10">
                  <button type="submit" name="service_save_draft" id="service_save_draft" class="btn btn-info">Save And
                    Add Module Again</button>
                  <!-- <button type="submit" name="service_save_publish" class="btn btn-primary">Save And Publish</button> -->
                </div>
              </div>

              <!-- </form> -->

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
    $("#identifier").on("submit", function () {
      var myEditor = document.querySelector('.quill-editor-full')
      var html = myEditor.children[0].innerHTML
      $(this).append("<textarea name='service_description' style='display:none'>" + html + "</textarea>");


      var submoduleContent = document.querySelector('#submodule_content')
      var submodule_content = submoduleContent.children[0].innerHTML
      $(this).append("<textarea name='submodule_content[]' style='display:none'>" + submodule_content + "</textarea>");
    });
  });

  $(document).ready(function () {
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
        '<textarea class="form-control" name="submodule_content[]" style="height: 100px" required></textarea>' +
        '</div>' +
        '</div>' +
        '</div>';
      $('#course_module').append(newRowAdd);

    });
    $("body").on("click", "#remove_module", function () {
      $(this).parents("#form_module").remove();
    })

    $('#service_save_draft').click(function () {

    });
  });

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
<script>
  $(function () {
    bsCustomFileInput.init();
  });
  $("#checkbox_inp").prop("checked", false);




  function check_Radio_Checkb(rdb_new) {
    if (!rdb_new.is(':checked')) {
      alert('no');
    } else {
      alert('yes');
    }
  }
</script>