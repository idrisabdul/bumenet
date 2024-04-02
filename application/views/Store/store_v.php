<main id="main" data-aos="fade-in">

    <!-- ======= Breadcrumbs ======= -->
    <div class="breadcrumbs">
        <div class="container">
            <h2>Bumenet</h2>
            <p>Menyediakan berbagai kebutuhan IT baik berupa Software dan Hardware</p>
        </div>
    </div><!-- End Breadcrumbs -->

    <!-- ======= Courses Section ======= -->
    <section id="courses" class="courses">
        <div class="container" data-aos="fade-up">

            <div class="row" data-aos="zoom-in" data-aos-delay="100">

                <?php foreach ($products as $product) { ?>


                    <div class="col-lg-3 col-md-6 d-flex align-items-stretch">
                        <div class="course-item">
                            <img src="images/<?= $product->picture ?>" class="img-fluid" alt="...">
                            <div class="course-content">
                                <div class="d-flex justify-content-between align-items-center mb-3">
                                    <?php if ($product->product_status == 1) { ?>
                                        <h4> Segera </h4>
                                    <?php } else if ($product->product_status == 2) { ?>
                                        <h4> Tersedia </h4>
                                    <?php } else { ?>
                                        <h4> Terjual </h4>
                                    <?php } ?>
                                    <p class="price">Rp. <?= number_format($product->price) ?></p>
                                </div>

                                <h3><a href="<?= base_url('Store/detail/'. $product->product_id) ?>"><?= $product->product_name ?></a></h3>
                                <div class="trainer d-flex justify-content-between align-items-center">
                                    <div class="trainer-profile d-flex align-items-center">
                                        <span>Stok </span>
                                    </div>
                                    <div class="trainer-rank d-flex align-items-center">
                                        <i class="bx bx-box"></i>&nbsp;<?= $product->stock ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> <!-- End Course Item-->
                <?php  } ?>


            </div>

        </div>
    </section><!-- End Courses Section -->

</main><!-- End #main -->