<main id="main" class="main">

    <div class="pagetitle">
        <h1>Add Content</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item active">Add Content</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <form method="post" enctype="multipart/form-data"
                    action="<?= base_url('Admin/course/insert_content') ?>" id="identifier">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Add Course</h5>
                            <div class="row mb-3">
                                <label for="inputText" class="col-sm-2 col-form-label">Course Name</label>
                                <div class="col-sm-10">
                                    <input type="text" name="module_course_id" class="form-control"
                                        value="<?= $module->module_course_id ?>" hidden required>
                                    <input type="text" name="submodule_name" class="form-control" required>
                                </div>
                            </div>

                            <h5 class="card-title">Content</h5>
                            <div class="quill-editor-full" style="height: 500px">
                                
                            </div>


                        </div>
                        <div class="card-footer">
                            <!-- <a href="#" id="btn-previous" class="card-link btn btn-outline-primary">Cancel</a> -->
                            <div id="done">
                                <button href="#" id="btn-done" type="submit"
                                    class="card-link btn btn-primary d-flex float-end">Save
                                </button>
                            </div>
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
            $(this).append("<textarea name='submodule_content' style='display:none'>" + html + "</textarea>");
        });
    });

</script>