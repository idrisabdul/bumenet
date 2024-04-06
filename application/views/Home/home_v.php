<!-- ======= Hero Section ======= -->

<section id="hero" class="d-flex justify-content-center align-items-center">

  <div class="container position-relative" data-aos="zoom-in" data-aos-delay="100">

    <h1>Kembangkan Potensimu dan<br>Bangun Karirmu Sebagai IT Professional</h1>

    <h2>Bumenet Academy membantu anda menjadi percaya diri dengan potensimu</h2>

    <a href="courses.html" class="btn-get-started">Mulai Belajar</a>

  </div>

</section><!-- End Hero -->



<main id="main">



  <!-- ======= About Section ======= -->

  <section id="about" class="about">

    <div class="container" data-aos="fade-up">



      <div class="row">

        <div class="col-lg-6 order-1 order-lg-2" data-aos="fade-left" data-aos-delay="100">

          <img src="assets/img/about.jpg" class="img-fluid" alt="">

        </div>

        <div class="col-lg-6 pt-4 pt-lg-0 order-2 order-lg-1 content">

          <h3>Bumenet Academy merupakan Akademisi IT yang mempunyai visi dalam kemajuan SDM yang berperan penting dalam
            pengembangan digitalisasi di Indonesia</h3>

          <p class="fst-italic">

            Mengapa memilih kami

          </p>

          <ul>

            <li><i class="bi bi-check-circle"></i> Instruktur yang handal dan berpengalaman</li>
            <li><i class="bi bi-check-circle"></i> Kelas Berbahasa Indonesia</li>
            <li><i class="bi bi-check-circle"></i> Dengan harga terbaik bahkan gratis</li>
            <li><i class="bi bi-check-circle"></i> Sertifikat Kompetensi</li>
            <li><i class="bi bi-check-circle"></i> Dapat Belajar Dimanapun dan Kapanpun</li>

          </ul>





        </div>

      </div>



    </div>

  </section><!-- End About Section -->



  <!-- ======= Why Us Section ======= -->

  <section id="why-us" class="why-us">

    <div class="container" data-aos="fade-up">



      <div class="row">

        <div class="col-lg-4 d-flex align-items-stretch">

          <div class="content">

            <h3>Mengapa memilih kami?</h3>

            <p>Bumenet Academy membantu anda dalam mengembangkan potensi dan
              membangun karir anda sebagai IT Professional, sehingga menjadikan anda lebih percaya diri dengan potensi
              anda miliki.</p>

            <div class="text-center">

              <a href="about.html" class="more-btn">Belajar Sekarang<i class="bx bx-chevron-right"></i></a>

            </div>

          </div>

        </div>

        <div class="col-lg-8 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="100">

          <div class="icon-boxes d-flex flex-column justify-content-center">

            <div class="row">

              <div class="col-xl-4 d-flex align-items-stretch">

                <div class="icon-box mt-4 mt-xl-0">

                  <!-- <i class="bx ri-file-list-3-line"></i> -->
                  <i class="bx bi-mortarboard"></i>

                  <h4>Instruktur yang Berpengalaman</h4>

                  <p>Kami memiliki mentor atau pengajar yang sudah berpengalaman dan ahli di bidangnya untuk Anda.</p>

                </div>

              </div>

              <div class="col-xl-4 d-flex align-items-stretch">

                <div class="icon-box mt-4 mt-xl-0">

                  <!-- <i class="bx bx-cube-alt"></i> -->
                  <i class="bx ri-calendar-todo-line"></i>

                  <h4>Dapat Belajar Dimanapun dan Kapanpun</h4>

                  <p>Bumenet Academy dapat diakses di mana saja sehingga Anda dapat belajar secara efektif di mana pun.
                  </p>

                </div>

              </div>

              <div class="col-xl-4 d-flex align-items-stretch">

                <div class="icon-box mt-4 mt-xl-0">

                  <i class="bx bx-receipt"></i>

                  <h4>Sertifikat Kompetensi</h4>

                  <p>Sertifikat ini tersedia di Belajar Online dengan menyelesaikan semua modul, kuis dan Ujian </p>

                </div>

              </div>

            </div>

          </div><!-- End .content-->

        </div>

      </div>



    </div>

  </section><!-- End Why Us Section -->



  <!-- ======= Features Section ======= -->

  <section id="features" class="features">

    <div class="container" data-aos="fade-up">



      <div class="row" data-aos="zoom-in" data-aos-delay="100">

        <div class="col-lg-3 col-md-4">

          <div class="icon-box">

            <i class="ri-store-line" style="color: #ffbb2c;"></i>

            <h3><a href="">Modul dan Materi</a></h3>

          </div>

        </div>

        <div class="col-lg-3 col-md-4 mt-4 mt-md-0">

          <div class="icon-box">

            <i class="ri-bar-chart-box-line" style="color: #5578ff;"></i>

            <h3><a href="">Forum Diskusi</a></h3>

          </div>

        </div>

        <div class="col-lg-3 col-md-4 mt-4 mt-md-0">

          <div class="icon-box">

            <i class="ri-calendar-todo-line" style="color: #e80368;"></i>

            <h3><a href="">Ujian dan Sertifikasi</a></h3>

          </div>

        </div>

        <div class="col-lg-3 col-md-4 mt-4 mt-lg-0">

          <div class="icon-box">

            <i class="ri-paint-brush-line" style="color: #e361ff;"></i>

            <h3><a href="">Testimoni</a></h3>

          </div>

        </div>





      </div>



    </div>

  </section><!-- End Features Section -->



  <!-- ======= Popular Courses Section ======= -->

  <section id="popular-courses" class="courses">

    <div class="container" data-aos="fade-up">



      <div class="section-title">

        <h2>Kelas</h2>

        <p>Kelas Tersedia</p>

      </div>



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
                    <!-- <?php if ($service->service_price == 0)  ?> -->
                    <?php echo $service->service_price == 0 ? 'FREE' : 'Rp. '.$service->service_price; // Sangat Baik ?>
                  </p>
                </div>

                <h3><a href="<?= base_url('/product/course_detail/' . $service->service_id) ?>">
                    <?= ucfirst($service->service_name) ?>
                  </a></h3>
                <p>
                  <?= ucfirst($service->service_description) ?>
                </p>
                <div class="trainer d-flex justify-content-between align-items-center">
                  <div class="trainer-profile d-flex align-items-center">
                    <img src="assets/img/trainers/trainer-1.jpg" class="img-fluid" alt="">
                    <span>
                      <?= ucfirst($service->nickname) ?>
                    </span>
                  </div>
                  <!-- <a href="#" class="read-more"><span>Read More</span><i class="bi bi-arrow-right"></i></a> -->
                  <a href="<?= base_url('/learning') ?>" class="more-btn">Learn More
                    <i class="bx bx-chevron-right"></i></a>
                </div>
              </div>
            </div>
          </div> <!-- End Course Item-->

        <?php } ?>

      </div>



    </div>

  </section><!-- End Popular Courses Section -->





  <section id="why-us" class="why-us">

    <div class="container" data-aos="fade-up">
      <div class="section-title">

        <h2>Ulasan</h2>

        <p>Apa Kata Mereka</p>

      </div>



      <div class="row">

        <!-- <div class="col-lg-4 d-flex align-items-stretch">

      <div class="content">

        <h3>Mengapa memilih kami?</h3>

        <p>Bumenet Academy membantu anda dalam mengembangkan potensi dan
          membangun karir anda sebagai IT Professional, sehingga menjadikan anda lebih percaya diri dengan potensi
          anda miliki.</p>

        <div class="text-center">

          <a href="about.html" class="more-btn">Belajar Sekarang<i class="bx bx-chevron-right"></i></a>

        </div>

      </div>

    </div> -->

        <div class="col-lg d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="100">

          <div class="icon-boxes d-flex flex-column justify-content-center">

            <div class="row">


              <div class="col-xl-4 mb-3 d-flex align-items-stretch">

                <div class="icon-box mt-4 mt-xl-0">

                  <!-- <i class="bx ri-file-list-3-line"></i> -->
                  <!-- <i class="bx bi-person"></i> -->
                  <!-- <img src="assets/img/trainers/trainer-1.jpg" class="img-fluid" alt=""> -->

                  <h4>Ridwal Zakir Mudun</h4>
                  <h6>Mahasiswa</h6>
                  <p>"Bumenet tentunya banyak sekali menberikan pengalaman, mulai dari perjalanan, ilmu dan juga relasi. dari Bumenet Academy saya belajar banyak hal yang pastinya akan berguna di masa depan."</p>

                </div>

              </div>
              <div class="col-xl-4 mb-3 d-flex align-items-stretch">

                <div class="icon-box mt-4 mt-xl-0">

                  <!-- <i class="bx ri-file-list-3-line"></i> -->
                  <!-- <i class="bx bi-person"></i>  -->
                  <!-- <img src="assets/img/trainers/trainer-1.jpg" class="img-fluid" alt=""> -->

                  <h4>Muhammad Khadafi</h4>
                  <h6>Mahasiswa</h6>
                  <p>"Materi training update terhadap kebutuhan industri terkini, cocok untuk persiapan sebelum masuk ke industri IT"</p>

                </div>

              </div>
              <div class="col-xl-4 mb-3 d-flex align-items-stretch">

                <div class="icon-box mt-4 mt-xl-0">

                  <!-- <i class="bx ri-file-list-3-line"></i> -->
                  <!-- <i class="bx bi-person"></i> -->
                  <!-- <img src="assets/img/trainers/trainer-1.jpg" class="img-fluid" alt=""> -->

                  <h4>Annisa Cahyani Anggita</h4>
                  <h6>Internship</h6>
                  <p>"Overall materi yang disampaikan mencukupi kebutuhan dan penyampaian materi oleh trainer cukup jelas"</p>

                </div>

              </div>
              <div class="col-xl-4 mb-3 d-flex align-items-stretch">

                <div class="icon-box mt-4 mt-xl-0">

                  <!-- <i class="bx ri-file-list-3-line"></i> -->
                  <!-- <i class="bx bi-person"></i> -->
                  <!-- <img src="assets/img/trainers/trainer-1.jpg" class="img-fluid" alt=""> -->

                  <h4>Idris Abdul Azis</h4>
                  <h6>Karyawan</h6>
                  <p>"Bumenet dengan metode belajar online yang mudah sehingga membantu saya meningkatkan karir saya terutama dibidang IT"</p>

                </div>

              </div>


            

            </div>

          </div><!-- End .content-->

        </div>

      </div>



    </div>

  </section><!-- End Why Us Section -->




</main><!-- End #main -->