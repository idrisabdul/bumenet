<main id="main" class="main">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Sharing Everything</h5>

            <!-- Bordered Tabs -->
            <div class="row">
                <div class="col-lg">
                    <ul class="nav nav-tabs nav-tabs-bordered" id="borderedTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="all-tab" data-bs-toggle="tab"
                                data-bs-target="#bordered-all" type="button" role="tab" aria-controls="all"
                                aria-selected="true">Untuk Anda</button>
                        </li>
                        <?php foreach ($categories as $category) { ?>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="<?= $category->product_category_id ?>-tab" data-bs-toggle="tab"
                                    data-bs-target="#bordered-<?= $category->product_category_id ?>" type="button"
                                    role="tab" aria-controls="<?= $category->product_category_id ?>"
                                    aria-selected="true"><?= $category->product_category_name ?></button>
                            </li>
                        <?php } ?>
                    </ul>
                    <div class="tab-content pt-2" id="borderedTabContent">
                        <div class="tab-pane fade show active" id="bordered-all" role="tabpanel"
                            aria-labelledby="all-tab">
                            <div class="row g-0">
                                <?php foreach ($sharing as $share) { ?>

                                    <div class="col-md-2">
                                        <img src="images/sharing/<?= $share->img_sharing ?>"
                                            class="img-fluid rounded-start py-4 px-4" alt="...">
                                    </div>
                                    <div class="col-md-10">
                                        <div class="card-body">
                                            <a href="<?= base_url('/sharing/content/' . $share->sharing_id) ?>"
                                                class="card-link">
                                                <h5 class="card-title"><?= $share->title_content ?></h5>
                                            </a>
                                            <p class="card-text"><?php
                                            $string = strip_tags($share->content);
                                            if (strlen($string) > 150) {
                                                $stringCut = substr($string, 0, 150);
                                                $endPoint = strrpos($stringCut, ' ');

                                                //if the string doesn't contain any space then it will cut without word basis.
                                                $string = $endPoint ? substr($stringCut, 0, $endPoint) : substr($stringCut, 0);
                                                $string .= '...';
                                            }
                                            echo $string;
                                            ?></p>
                                            <div class="row  card-footer">
                                                <div class="col-md-8">
                                                    <h6><i class="bi bi-person"></i> <span><?= $share->nickname ?></span> •
                                                        <?= $share->product_category_name ?></h6>

                                                </div>
                                                <div class="col-md-4">
                                                    <a href="<?= base_url('/sharing/content/' . $share->sharing_id) ?>"
                                                        class="card-link"><span>Baca lebih lanjut</span></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                <?php } ?>
                            </div>
                        </div>


                        <?php foreach ($categories as $category) { ?>
                            <div class="tab-pane fade show" id="bordered-<?= $category->product_category_id ?>"
                                role="tabpanel" aria-labelledby="<?= $category->product_category_id ?>-tab">
                                <?php $sharing_cat = $this->db->query("SELECT * FROM sharing INNER JOIN users ON users.user_id = sharing.writer_id INNER JOIN product_category ON product_category.product_category_id  = sharing.sharing_categorization  WHERE sharing_categorization='$category->product_category_id';"); ?>
                                <?php if ($sharing_cat->num_rows() == 0) { ?>
                                    <div class="card-body pt-3">
                                        <div class="text-center mt-5 mb-2">
                                            <h6 class="card-subtitle mb-2 text-muted">Artikel tidak ditemukan, mulailah dengan
                                                dirimu sendiri dengan menulis di topik ini</h6>
                                            <a href="<?= base_url('sharing/menulis') ?>" class="card-link"><i
                                                    class="bi bi-pencil-square me-1 mx-2"></i>Mulai menulis</a>
                                        </div>
                                    </div>
                                <?php } else { ?>
                                    <?php foreach ($sharing_cat->result() as $sc) { ?>
                                        <div class="row">
                                            <div class="col-md-2">
                                                <img src="images/sharing/<?= $sc->img_sharing ?>"
                                                    class="img-fluid rounded-start py-4 px-4" alt="...">
                                            </div>
                                            <div class="col-md-10">
                                                <div class="card-body">
                                                    <a href="<?= base_url('/sharing/content/' . $sc->sharing_id) ?>"
                                                        class="card-link">
                                                        <h5 class="card-title"><?= $sc->title_content ?></h5>
                                                    </a>
                                                    <p class="card-text"><?php
                                                    $string = strip_tags($sc->content);
                                                    if (strlen($string) > 150) {
                                                        $stringCut = substr($string, 0, 150);
                                                        $endPoint = strrpos($stringCut, ' ');

                                                        //if the string doesn't contain any space then it will cut without word basis.
                                                        $string = $endPoint ? substr($stringCut, 0, $endPoint) : substr($stringCut, 0);
                                                        $string .= '...';
                                                    }
                                                    echo $string;
                                                    ?></p>
                                                    <div class="row  card-footer">
                                                        <div class="col-md-8">
                                                            <h6><i class="bi bi-person"></i> <span><?= $sc->nickname ?></span> •
                                                                <?= $sc->product_category_name ?>
                                                            </h6>

                                                        </div>
                                                        <div class="col-md-4">
                                                            <a href="<?= base_url('/sharing/content/' . $sc->sharing_id) ?>"
                                                                class="card-link"><span>Baca lebih lanjut</span></a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php } ?>
                                <?php } ?>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>

        </div>
    </div>
</main>