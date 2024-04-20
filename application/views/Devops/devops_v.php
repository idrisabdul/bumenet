<main id="main" data-aos="fade-in">

  <!-- ======= Breadcrumbs ======= -->
  <div class="breadcrumbs">
    <div class="container">
      <h2>Mulai Belajar sekarang</h2>
      <!-- <p>Est dolorum ut non facere possimus quibusdam eligendi voluptatem. Quia id aut similique quia voluptas sit
        quaerat debitis. Rerum omnis ipsam aperiam consequatur laboriosam nemo harum praesentium. </p> -->
    </div>
  </div><!-- End Breadcrumbs -->


  <!-- ======= Courses Section ======= -->
  <section id="courses" class="courses">
    <div class="container" data-aos="fade-up">

      <div class="row" data-aos="zoom-in" data-aos-delay="100">
        <?php $no = 1; ?>
        <?php foreach ($services as $service) { ?>

          <div class="col-lg-4 mb-3 col-md-6 d-flex align-items-stretch">
            <div class="course-item">
              <!-- <img src="assets/img/course-1.jpg" class="img-fluid" alt="..."> -->
              <img src="images/<?= $service->img_service ?>" class="img-fluid" alt="...">
              <div class="course-content">
                <div class="d-flex justify-content-between align-items-center mb-3">
                  <h4>
                    <?= ucfirst($service->product_category_name) ?>
                  </h4>
                  <p class="price">
                    <!-- <?= ucfirst($service->service_price) ?> -->
                    <?php echo $service->service_price == 0 ? 'FREE' : 'Rp. '.number_format($service->service_price); // Sangat Baik ?>
                  </p>
                </div>

                <h3><a href="<?= base_url('/learning/course_detail/' . $service->service_id) ?>">
                    <?= ucfirst($service->service_name) ?>
                  </a></h3>
                <p>
                  <!-- <?= ucfirst($service->service_description) ?> -->
                </p>
                <div class="trainer d-flex justify-content-between align-items-center">
                  <div class="trainer-profile d-flex align-items-center">
                    <img src="assets/img/trainers/trainer-1.jpg" class="img-fluid" alt="">
                    <span>
                      <?= ucfirst($service->nickname) ?>
                    </span>
                  </div>
                  <!-- <a href="#" class="read-more"><span>Read More</span><i class="bi bi-arrow-right"></i></a> -->
                  <a href="<?= base_url('/learning/course_detail/' . $service->service_id) ?>" class="more-btn">Learn More <i class="bx bx-chevron-right"></i></a>
                </div>
              </div>
            </div>
          </div> <!-- End Course Item-->

        <?php } ?>


      </div>

    </div>
  </section><!-- End Courses Section -->

</main><!-- End #main -->