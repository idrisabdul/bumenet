<main id="main" class="main">

  <div class="pagetitle">
    <h1>Dashboard Mentor</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="<?= base_url('mentor') ?>">Home</a></li>
        <li class="breadcrumb-item active">Dashboard Mentor</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->

  <section class="section dashboard">
    <div class="row">

      <!-- Left side columns -->
      <div class="col-lg-7">
        <div class="row">

          <!-- Sales Card -->
          <div class="col-xxl-4 col-md-6">
            <div class="card info-card sales-card">

              <div class="card-body">
                <h5 class="card-title">Kursus <span>| Jumlah Rilis</span></h5>

                <div class="d-flex align-items-center">
                  <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                    <i class="bi bi-book-fill"></i>
                  </div>
                  <div class="ps-3">
                    <h6><?= $total_course ?></h6>
                    <!-- <span class="text-success small pt-1 fw-bold">12%</span> <span class="text-muted small pt-2 ps-1">increase</span> -->

                  </div>
                </div>
              </div>

            </div>
          </div><!-- End Sales Card -->

          <!-- Revenue Card -->
          <div class="col-xxl-4 col-md-6">
            <div class="card info-card revenue-card">

              <div class="card-body">
                <h5 class="card-title">Kursus <span>| Draft</span></h5>

                <div class="d-flex align-items-center">
                  <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                    <i class="bi bi-book-half"></i>
                  </div>
                  <div class="ps-3">
                    <h6><?= $total_course_draft ?></h6>
                    <!-- <span class="text-danger small pt-1 fw-bold">8%</span> <span class="text-muted small pt-2 ps-1">increase</span> -->

                  </div>
                </div>
              </div>

            </div>
          </div><!-- End Revenue Card -->

          <!-- Customers Card -->
          <div class="col-xxl-4 col-xl-12">

            <div class="card info-card customers-card">

              <div class="card-body">
                <h5 class="card-title">Pengikut | <span>on development</span> </h5>

                <div class="d-flex align-items-center">
                  <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                    <i class="bi bi-people"></i>
                  </div>
                  <div class="ps-3">
                    <h6>0</h6>
                    <!-- <span class="text-success small pt-1 fw-bold">12%</span> <span class="text-muted small pt-2 ps-1">decrease</span> -->

                  </div>
                </div>

              </div>
            </div>

          </div><!-- End Customers Card -->




          <!-- Recent Sales -->
          <div class="col-12">
            <div class="card recent-sales overflow-auto">

              <div class="card-body">
                <h5 class="card-title">Daftar Kursus <span>| Kelas yang dibuat</span></h5>

                <table class="table table-borderless datatable">
                  <thead>
                    <tr>
                      <th scope="col">No</th>
                      <th scope="col">Nama Kelas</th>
                      <th scope="col">Jumlah student</th>
                      <th scope="col">Status</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $no = 1; ?>
                    <?php foreach ($services as $service) { ?>
                      <tr>
                        <th scope="row"><a href="#"><?= $no++ ?></a></th>
                        <td><a href="<?= base_url('mentor/mentor/course/'. $service->service_id) ?>" class="text-primary"><?= ucfirst($service->service_name) ?></a></td>
                        <?php $total_student = $this->db->query("SELECT course_id FROM course_user WHERE course_id='$service->service_id';")->num_rows(); ?>
                        <td><?= $total_student ?></td>
                        <?php if ($service->status_course == 1) { ?>
                          <td><span class="badge bg-success">release</span></td>
                        <?php } else { ?>
                          <td><span class="badge bg-warning">draft</span></td>
                        <?php } ?>
                      </tr>
                    <?php } ?>
                  </tbody>
                </table>

              </div>

            </div>
          </div><!-- End Recent Sales -->
        </div>
      </div><!-- End Left side columns -->

      <!-- Right side columns -->
      <div class="col-lg-5">

        <!-- Reports -->
        <div class="card">

          <div class="filter">
            <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
            <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
              <li class="dropdown-header text-start">
                <h6>Filter</h6>
              </li>

              <li><a class="dropdown-item" href="#">Today</a></li>
              <li><a class="dropdown-item" href="#">This Month</a></li>
              <li><a class="dropdown-item" href="#">This Year</a></li>
            </ul>
          </div>

          <div class="card-body">
            <h5 class="card-title">Reports <span>| Statistik pengikut anda</span></h5>

            <!-- Line Chart -->
            <div id="reportsChart"></div>

            <script>
              document.addEventListener("DOMContentLoaded", () => {
                new ApexCharts(document.querySelector("#reportsChart"), {
                  series: [{
                    name: 'Revenue',
                    data: [11, 32, 45, 32, 34, 52, 41]
                  }],
                  chart: {
                    height: 350,
                    type: 'area',
                    toolbar: {
                      show: false
                    },
                  },
                  markers: {
                    size: 4
                  },
                  colors: ['#2eca6a'],
                  fill: {
                    type: "gradient",
                    gradient: {
                      shadeIntensity: 1,
                      opacityFrom: 0.3,
                      opacityTo: 0.4,
                      stops: [0, 90, 100]
                    }
                  },
                  dataLabels: {
                    enabled: false
                  },
                  stroke: {
                    curve: 'smooth',
                    width: 2
                  },
                  xaxis: {
                    type: 'datetime',
                    categories: ["2018-09-19T00:00:00.000Z", "2018-09-19T01:30:00.000Z", "2018-09-19T02:30:00.000Z", "2018-09-19T03:30:00.000Z", "2018-09-19T04:30:00.000Z", "2018-09-19T05:30:00.000Z", "2018-09-19T06:30:00.000Z"]
                  },
                  tooltip: {
                    x: {
                      format: 'dd/MM/yy HH:mm'
                    },
                  }
                }).render();
              });
            </script>
            <!-- End Line Chart -->

          </div>

        </div><!-- End Reports -->



      </div><!-- End Right side columns -->

    </div>
  </section>

</main><!-- End #main -->