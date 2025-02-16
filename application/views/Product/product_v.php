<main id="main" class="main">

	<div class="pagetitle">
		<h1>Infra Application</h1>
		<nav style="--bs-breadcrumb-divider: '';">
			<ol class="breadcrumb">
				<li class="breadcrumb-item active"><i class="bi bi-clock"></i></li>
				<li class="breadcrumb-item active">End-to-end IT Services Solution to Optimize Your Business </li>
			</ol>
	</div>

	<section class="section profile">
		<div class="row">
			<div class="col-xl-9">

				<div class="card">
					<div class="card-body pt-3">
						<!-- Bordered Tabs -->
						<ul class="nav nav-tabs nav-tabs-bordered">

							<li class="nav-item">
								<button class="nav-link active" data-bs-toggle="tab"
									data-bs-target="#profile-overview">Implementation CI/CD Pipeline</button>
							</li>

							<li class="nav-item">
								<button class="nav-link" data-bs-toggle="tab"
									data-bs-target="#profile-settings">Implementation Tools Application</button>
							</li>

							<li class="nav-item">
								<button class="nav-link" data-bs-toggle="tab"
									data-bs-target="#profile-change-password">Vulnerability Assessment</button>
							</li>

						</ul>
						<div class="tab-content pt-2">

							<div class="tab-pane fade show active profile-overview" id="profile-overview">
								<!-- <h5 class="card-title">Deskripsi</h5> -->
								<p><?php echo nl2br($service->service_description) ?>
								</p>

								<h5 class="card-title">Otomatisasi CI/CD dengan Jenkins: Percepat & Amankan Deploy
									Aplikasi Anda</h5>

								<div class="row">
									<div class="col-lg-9 col-md-8">Kami menghadirkan CI/CD Pipeline berbasis Jenkins
										yang siap meningkatkan kecepatan dan stabilitas pengembangan aplikasi Anda.
										Dengan solusi ini, Anda bisa mengotomatisasi build, testing, dan deployment
										tanpa hambatan, memastikan kode berkualitas tinggi dengan efisiensi maksimal.
									</div>
								</div>

								<h5 class="card-title"> Keunggulan Layanan CI/CD Jenkins Kami:</h5>
								<div class="row">
									<div class="col-lg-9 col-md-8">
										✅ Build & Test Otomatis <br> Setiap perubahan kode diuji secara real-time untuk
										mencegah bug masuk ke produksi. <br><br>
										✅ Deployment Cepat & Aman <br> Otomatisasi deployment ke berbagai environment
										(staging, production) dengan rollback jika diperlukan. <br><br>
										✅ Integrasi dengan Docker & Kubernetes <br> Memastikan aplikasi berjalan stabil
										di
										container & cloud-native environment.
									</div>
								</div>

								<h5 class="card-title">With captions</h5>

								<!-- Slides with captions -->
								<div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
									<div class="carousel-indicators">
										<button type="button" data-bs-target="#carouselExampleCaptions"
											data-bs-slide-to="0" class="active" aria-current="true"
											aria-label="Slide 1"></button>
										<button type="button" data-bs-target="#carouselExampleCaptions"
											data-bs-slide-to="1" aria-label="Slide 2"></button>
										<button type="button" data-bs-target="#carouselExampleCaptions"
											data-bs-slide-to="2" aria-label="Slide 3"></button>
									</div>
									<div class="carousel-inner">
										<div class="carousel-item active">
											<img src="<?= base_url() ?>images/slides-1.png" class="d-block w-100"
												alt="...">
											<div class="carousel-caption d-none d-md-block">
												<h5>First slide label</h5>
												<p>Some representative placeholder content for the first slide.</p>
											</div>
										</div>
										<div class="carousel-item">
											<img src="<?= base_url() ?>images/slides-2.jpg" class="d-block w-100"
												alt="...">
											<div class="carousel-caption d-none d-md-block">
												<h5>Second slide label</h5>
												<p>Some representative placeholder content for the second slide.</p>
											</div>
										</div>
										<div class="carousel-item">
											<img src="<?= base_url() ?>images/slides-3.jpg" class="d-block w-100"
												alt="...">
											<div class="carousel-caption d-none d-md-block">
												<h5>Third slide label</h5>
												<p>Some representative placeholder content for the third slide.</p>
											</div>
										</div>
									</div>

									<button class="carousel-control-prev" type="button"
										data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
										<span class="carousel-control-prev-icon" aria-hidden="true"></span>
										<span class="visually-hidden">Previous</span>
									</button>
									<button class="carousel-control-next" type="button"
										data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
										<span class="carousel-control-next-icon" aria-hidden="true"></span>
										<span class="visually-hidden">Next</span>
									</button>

								</div><!-- End Slides with captions -->

							</div>

							<div class="tab-pane fade profile-edit profile-overview pt-3" id="profile-settings">

								<h5 class="card-title">Solusi Profesional untuk Instalasi dan Konfigurasi Teknologi Anda
								</h5>
								<div class="row">
									<div class="col-lg-9 col-md-8">Di era digital yang berkembang pesat, memiliki sistem
										yang handal dan efisien adalah kunci keberhasilan bisnis. Kami menawarkan
										layanan Implementation Tools Application, yaitu solusi profesional dan
										menyeluruh untuk instalasi serta konfigurasi berbagai tools teknologi penting
										seperti database, containerization, orchestration, dan infrastruktur berbasis
										cloud.
									</div>
								</div>

								<h5 class="card-title"> Keunggulan Layanan Implementation Tools Application Kami:</h5>
								<div class="row">
									<div class="col-lg-9 col-md-8">
										✅ Deployment Docker & Containerization (Docker, Podman, Kubernetes, dan
										Rancher.) <br> Modernisasi aplikasi Anda dengan teknologi container yang
										memungkinkan efisiensi, portabilitas, dan skalabilitas tinggi. <br><br>
										✅ Instalasi Database (MySQL, PostgreSQL, MongoDB, dll.)<br> Kami memastikan
										database Anda terpasang dengan benar,
										dikonfigurasi optimal, serta siap digunakan untuk performa maksimal, bahkan kami
										juga support instalasi HA agar aplikasi berjalan lebih optimal. <br><br>
										✅ Instalasi Tools DevOps <br> Tingkatkan efisiensi pengembangan dan deployment
										aplikasi Anda dengan layanan Instalasi Tools DevOps dari kami! Kami menyediakan
										solusi profesional untuk instalasi, konfigurasi, dan optimasi berbagai tools
										DevOps, termasuk GitLab, Jenkins, MinIO, Docker, Kubernetes, Ansible,
										Prometheus, dan banyak lagi. <br>
									</div>
								</div>

								<h5 class="card-title">With captions</h5>

								<!-- Slides with captions -->
								<div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
									<div class="carousel-indicators">
										<button type="button" data-bs-target="#carouselExampleCaptions"
											data-bs-slide-to="0" class="active" aria-current="true"
											aria-label="Slide 1"></button>
										<button type="button" data-bs-target="#carouselExampleCaptions"
											data-bs-slide-to="1" aria-label="Slide 2"></button>
										<button type="button" data-bs-target="#carouselExampleCaptions"
											data-bs-slide-to="2" aria-label="Slide 3"></button>
									</div>
									<div class="carousel-inner">
										<div class="carousel-item active">
											<img src="<?= base_url() ?>images/slides-1.png" class="d-block w-100"
												alt="...">
											<div class="carousel-caption d-none d-md-block">
												<h5>First slide label</h5>
												<p>Some representative placeholder content for the first slide.</p>
											</div>
										</div>
										<div class="carousel-item">
											<img src="<?= base_url() ?>images/slides-2.jpg" class="d-block w-100"
												alt="...">
											<div class="carousel-caption d-none d-md-block">
												<h5>Second slide label</h5>
												<p>Some representative placeholder content for the second slide.</p>
											</div>
										</div>
										<div class="carousel-item">
											<img src="<?= base_url() ?>images/slides-3.jpg" class="d-block w-100"
												alt="...">
											<div class="carousel-caption d-none d-md-block">
												<h5>Third slide label</h5>
												<p>Some representative placeholder content for the third slide.</p>
											</div>
										</div>
									</div>

									<button class="carousel-control-prev" type="button"
										data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
										<span class="carousel-control-prev-icon" aria-hidden="true"></span>
										<span class="visually-hidden">Previous</span>
									</button>
									<button class="carousel-control-next" type="button"
										data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
										<span class="carousel-control-next-icon" aria-hidden="true"></span>
										<span class="visually-hidden">Next</span>
									</button>

								</div><!-- End Slides with captions -->

							</div>
						</div><!-- End Bordered Tabs -->

					</div>
					<hr class="my-4">

					<div class="card-body">
						<h5 class="card-title mx-auto text-center">Pertanyaan yang Sering Diajukan (FAQ)</h5>

						<!-- Default Accordion -->
						<div class="accordion" id="accordionExample">
							<div class="accordion-item">
								<h2 class="accordion-header" id="headingOne">
									<button class="accordion-button" type="button" data-bs-toggle="collapse"
										data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
										Mengapa Memilih Kami?
									</button>
								</h2>
								<div id="collapseOne" class="accordion-collapse collapse show"
									aria-labelledby="headingOne" data-bs-parent="#accordionExample">
									<div class="accordion-body">
										Tim ahli siap membantu
										dan memberikan solusi terbaik untuk kebutuhan Anda.
										Jangan biarkan kendala teknis menghambat pertumbuhan bisnis Anda! Percayakan
										instalasi dan konfigurasi teknologi kepada kami agar Anda dapat fokus pada
										inovasi dan pengembangan bisnis.
									</div>
								</div>
							</div>
							<div class="accordion-item">
								<h2 class="accordion-header" id="headingTwo">
									<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
										data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
										Apakah saya mendapatkan dokumentasi setelah instalasi?
									</button>
								</h2>
								<div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo"
									data-bs-parent="#accordionExample">
									<div class="accordion-body">
										<strong>Tentu!</strong> Kami memberikan panduan lengkap dan dokumentasi teknis
										agar Anda dapat memahami dan mengelola sistem dengan lebih mudah.
									</div>
								</div>
							</div>
							<div class="accordion-item">
								<h2 class="accordion-header" id="headingThree">
									<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
										data-bs-target="#collapseThree" aria-expanded="false"
										aria-controls="collapseThree">
										Berapa lama proses instalasi dan konfigurasi?
									</button>
								</h2>
								<div id="collapseThree" class="accordion-collapse collapse"
									aria-labelledby="headingThree" data-bs-parent="#accordionExample">
									<div class="accordion-body">
										Waktu pengerjaan tergantung pada kompleksitas sistem, biasanya berkisar antara
										1-7 hari kerja. Kami juga menyediakan layanan prioritas untuk kebutuhan yang
										lebih mendesak.
									</div>
								</div>
							</div>
						</div><!-- End Default Accordion Example -->

					</div>
				</div>


			</div>
			<div class="col-xl-3">

				<div class="card">
					<img src="<?= base_url() ?>images/devops.jpg" class="card-img-top" alt="...">
					<div class="card-body pb-0">
						<h5 class="card-title">Klien Kami<span> | yang sudah kita kerjakan</span></h5>

						<div class="news">
							<div class="post-item clearfix">
								<img src="assets/img/news-1.jpg" alt="">
								<h5><a target="_blank" href="https://joinsecond.space">Join Second</a></h5>
								<p>Aplikasi manajemen waktu, dibangun berdasarkan kalender Anda untuk memastikan setiap
									detik digunakan dengan bijak, sehingga menghasilkan produktivitas yang sesungguhnya.
								</p>
							</div>

						</div><!-- End sidebar recent posts-->

					</div>
				</div>

			</div>
		</div>
	</section>


</main><!-- End #main -->

<div class="modal fade" id="basicModal" tabindex="-1">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Daftar Sekarang</h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body">
				Tingkatkan keahlian kamu dengan mempelajari kelas ini. Daftar buruan sekarang, tunggu apalagi.
			</div>
			<div class="modal-footer">
				<a href="<?= base_url('auth/registrasi') ?>" id="btn-daftar" class="btn btn-secondary">Daftar</a>
				<a id="btn-login" class="btn btn-primary" href="#">Log in</a>
			</div>
		</div>
	</div>
</div><!-- End Basic Modal-->



<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

<script type="text/javascript">
	function alertLogin(url) {
		console.log(url);
		$('#btn-login').attr('href', url);
		$('#basicModal').modal('show');
	}

	$(document).ready(function () {

		$('#add_course').click(function () {
			var user_id = $('#user_id').val();
			var course_id = $('#course_id').val();
			$.ajax({
				url: "<?php echo site_url('Learning/add_course_user'); ?>",
				method: "POST",
				data: {
					user_id: user_id,
					course_id: course_id,
				},
				async: true,
				dataType: 'json',
				success: function (data) {
					alert('Berhasil ditambahkan');
					// console.log(data);
					window.location.reload();
				}
			});
			return false;
		});
	});

</script>
