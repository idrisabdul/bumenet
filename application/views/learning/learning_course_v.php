<main id="main" class="main">

    <section class="section">
        <div class="row">
            <div class="col-xl-3">
                <div class="card">
                    <div class="card-body">
                        <ul class="sidebar-nav" id="sidebar-nav">
                            <h5 class="card-title">Daftar Modul</h5>
                            <?php $no = 1; ?>
                            <?php $no2 = 1; ?>
                            <?php foreach ($module_course as $mc) { ?>
                                <li class="nav-item">
                                    <a class="nav-link collapsed" data-bs-target="#components-nav<?= $no++ ?>"
                                        data-bs-toggle="collapse" href="#">
                                        <?php if ($mc->status_progress == 1) { ?>
                                            <i class="bi bi-check-circle-fill"></i><span>
                                                <?= $mc->module_name ?></span>
                                            <i class="bi bi-chevron-down ms-auto"></i>
                                        <?php } else { ?>
                                            <i class="bi bi-circle-fill"></i><span>
                                                <?= $mc->module_name ?></span>
                                            <i class="bi bi-chevron-down ms-auto"></i>
                                        <?php } ?>
                                    </a>
                                    <ul id="components-nav<?= $no2++ ?>" class="nav-content collapse "
                                        data-bs-parent="#sidebar-nav">
                                        <?php $submodule = $this->db->query("SELECT * FROM submodule_course WHERE module_course_id='$mc->module_course_id'"); ?>
                                        <?php foreach ($submodule->result() as $sm) { ?>
                                            <li id='<?= $sm->submodule_course_id ?>'>
                                                <a href="#">
                                                    <i class="bi bi-circle-fill"></i><span><?= $sm->submodule_name ?></span>
                                                </a>
                                            </li>
                                        <?php } ?>
                                    </ul>
                                </li>
                            <?php } ?>
                        </ul>
                        <ul class="sidebar-nav" id="list_module">
                            <input id="count" hidden value="<?= count((array) $module_course) ?>">
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-xl-9">

                <div class="card mb-3">
                    <div class="card-body" id="submodule_content">
                        <h5 class="card-title mt-2" id="judul_submodule">Overview <?= $service->service_name ?></h5>
                        <div id="content_submodule"><?php echo nl2br($service->service_description) ?>
                        </div>
                    </div>
                    <div class="card-footer" style="display: none;">
                        <div class="row">
                            <input id="submodule_course_id" hidden value="">
                            <input id="module_course_id" hidden value="">
                            <div class="col-md-6">
                                <a href="#" id="btn-previous" class="card-link btn btn-outline-primary">Kembali</a>
                            </div>
                            <div class="col-md-2">
                                <!-- <button id="btn-done"
                                    class="card-link btn btn-outline-success d-flex align-items-center justify-content-center">Tandai
                                    sudah dipelajari
                                </button> -->
                            </div>
                            <div class="col-md-4">
                                <div id="next">
                                    <a href="#" id="btn-next"
                                        class="card-link btn btn-primary d-flex align-items-center justify-content-center">Lanjut
                                    </a>
                                </div>
                                <div id="done" style="display: none;">
                                    <a href="#" id="btn-done"
                                        class="card-link btn btn-success d-flex align-items-center justify-content-center ">Tandai
                                        sudah mempelajari modul ini
                                    </a>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
    </section>

</main>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

<script type="text/javascript">


    $(document).ready(function () {
        var count = $("#count").val();
        for (let i = 1; i <= count; i++) {
            $("#components-nav" + i + " li").click(function () {
                var id = this.id;
                $.ajax({
                    url: "<?php echo site_url('Learning/submodule_js'); ?>",
                    method: "POST",
                    data: {
                        id: id
                    },
                    async: true,
                    dataType: 'json',
                    success: function (data) {
                        $(".card-footer").removeAttr("style");
                        $("#btn-next").html("Lanjut");
                        console.log(data);
                        function nl2br(str, is_xhtml) {
                            var breakTag = (is_xhtml || typeof is_xhtml === 'undefined') ? '</br>' : '<br>';
                            return (str + '').replace(/([^>\r\n]?)(\r\n|\n\r|\r|\n)/g, '$1' + breakTag + '$2');
                        }
                        $("#module_course_id").val(data.module_course_id);
                        $("#submodule_course_id").val(data.submodule_course_id);
                        $("#judul_submodule").text(data.submodule_name);
                        $("#content_submodule").html(nl2br(data.submodule_content));
                    }
                });
                return false;
            });
        }

        $("#btn-next").click(function () {
            var module_id = $("#module_course_id").val();
            var submodule_id = $("#submodule_course_id").val();
            $.ajax({
                url: "<?php echo site_url('Learning/next_submodule_js'); ?>",
                method: "POST",
                data: {
                    module_id: module_id,
                    submodule_id: submodule_id,
                },
                async: true,
                dataType: 'json',
                success: function (data) {
                    if (!$.trim(data)) {
                        $("#next").hide();
                        $("#done").removeAttr("style");
                    } else {
                        console.log(data);
                        function nl2br(str, is_xhtml) {
                            var breakTag = (is_xhtml || typeof is_xhtml === 'undefined') ? '</br>' : '<br>';
                            return (str + '').replace(/([^>\r\n]?)(\r\n|\n\r|\r|\n)/g, '$1' + breakTag + '$2');
                        }
                        $("#module_course_id").val(data.module_course_id);
                        $("#submodule_course_id").val(data.submodule_course_id);
                        $("#submodule_course_id").val(data.submodule_course_id);
                        $("#judul_submodule").text(data.submodule_name);
                        $("#content_submodule").html(nl2br(data.submodule_content));
                    }
                }
            });
            return false;
        });


        $("#btn-previous").click(function () {
            var module_id = $("#module_course_id").val();
            var submodule_id = $("#submodule_course_id").val();
            $.ajax({
                url: "<?php echo site_url('Learning/previous_submodule_js'); ?>",
                method: "POST",
                data: {
                    module_id: module_id,
                    submodule_id: submodule_id,
                },
                async: true,
                dataType: 'json',
                success: function (data) {
                    $("#next").show();
                    $("#done").css("display", "none");
                    $("#btn-next").html("Lanjut");
                    console.log(data);
                    function nl2br(str, is_xhtml) {
                        var breakTag = (is_xhtml || typeof is_xhtml === 'undefined') ? '</br>' : '<br>';
                        return (str + '').replace(/([^>\r\n]?)(\r\n|\n\r|\r|\n)/g, '$1' + breakTag + '$2');
                    }
                    $("#module_course_id").val(data.module_course_id);
                    $("#submodule_course_id").val(data.submodule_course_id);
                    $("#submodule_course_id").val(data.submodule_course_id);
                    $("#judul_submodule").text(data.submodule_name);
                    $("#content_submodule").html(nl2br(data.submodule_content));
                }
            });
            return false;
        });


        $('#btn-done').click(function () {
            var module_id = $("#module_course_id").val();
            var submodule_id = $("#submodule_course_id").val();
            $.ajax({
                url: "<?php echo site_url('Learning/done_submodule_js'); ?>",
                method: "POST",
                data: {
                    module_id: module_id,
                },
                async: true,
                dataType: 'json',
                success: function (data) {
                    window.location.reload();
                }
            });
            return false;
        });
    });
</script>