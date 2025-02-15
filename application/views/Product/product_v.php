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
									data-bs-target="#profile-overview">Implementasi CI/CD Pipeline</button>
							</li>

							<li class="nav-item">
								<button class="nav-link" data-bs-toggle="tab"
									data-bs-target="#profile-edit">Containerization & Kubernetes</button>
							</li>

							<li class="nav-item">
								<button class="nav-link" data-bs-toggle="tab"
									data-bs-target="#profile-settings">Implementasi Tools DevOps</button>
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
										✅ Integrasi dengan Docker & Kubernetes <br> Memastikan aplikasi berjalan stabil di
										container & cloud-native environment. <br><br>
										✅ Monitoring & Notifikasi <br> Terintegrasi dengan Slack, email, dan dashboard
										untuk update status pipeline secara langsung. <br><br>
										✅ Custom Workflow Sesuai Kebutuhan <br> Jenkinsfile yang disesuaikan untuk proyek
										Anda, mendukung multi-stage pipeline.
									</div>
								</div>

							</div>

							<div class="tab-pane fade profile-edit pt-3" id="profile-edit">
								<h5 class="card-title">Materi yang akan Kamu pelajari pada kelas ini</h5>
								<div class="list-group">
									<div class="accordion" id="accordionExample">
										<?php $no = 1; ?>
										<?php $no2 = 1; ?>
										<?php foreach ($module_course as $mc) { ?>
											<div class="accordion-item">
												<h2 class="accordion-header" id="headingOne">
													<button class="accordion-button collapsed" type="button"
														data-bs-toggle="collapse" data-bs-target="#collapseOne<?= $no++ ?>"
														aria-expanded="false" aria-controls="collapseOne">
														<?= $mc->module_name ?>
													</button>
												</h2>
												<div id="collapseOne<?= $no2++ ?>" class="accordion-collapse collapse"
													aria-labelledby="headingOne" data-bs-parent="#accordionExample">
													<?php $submodule = $this->db->query("SELECT * FROM submodule_course WHERE module_course_id='$mc->module_course_id'"); ?>
													<ul class="list-group list-group-flush"></ul>
													<?php foreach ($submodule->result() as $sm) { ?>
														<li class="list-group-item">
															<a href="#!">
																<i class="bi bi-lock-fill mr-1"></i>
																<span><?= $sm->submodule_name ?></span>
															</a>
														</li>
													<?php } ?>
													</ul>
												</div>
											</div>
										<?php } ?>

									</div><!-- End Default Accordion Example -->
								</div>
							</div>

							<div class="tab-pane fade profile-edit profile-overview pt-3" id="profile-settings">

								<div class="row mb-3">
									<label for="profileImage" class="col-md-4 col-lg-3 col-form-label">Profile
										Image</label>
									<div class="col-md-8 col-lg-9">
										<!-- <img src="<?= base_url() ?>images/profile/<?= $service->img_profile ?>"
											alt="Profile"> -->
										<div class="pt-2">
											<!-- <a href="#" class="btn btn-primary btn-sm"
													title="Upload new profile image"><i class="bi bi-upload"></i></a> -->
										</div>
									</div>
								</div>
								<input type="text" hidden id="user_id"
									value="<?= $this->session->userdata('user_id') ?>">
								<input type="text" hidden id="course_id" value="<?= $service->service_id ?>">

								<div class="row">
									<div class="col-lg-3 col-md-4 label ">Nama Instruktur</div>
									<!-- <div class="col-lg-9 col-md-8"><?= $service->nickname ?></div> -->
								</div>

								<div class="row">
									<div class="col-lg-3 col-md-4 label ">Tentang Instruktur</div>
									<!-- <div class="col-lg-9 col-md-8"><?= $service->about_person ?></div> -->
								</div>

								<div class="row">
									<div class="col-lg-3 col-md-4 label">Perusahaan</div>
									<!-- <div class="col-lg-9 col-md-8"><?= $service->current_company ?></div> -->
								</div>

								<div class="row">
									<div class="col-lg-3 col-md-4 label">Job</div>
									<!-- <div class="col-lg-9 col-md-8"><?= $service->current_job ?></div> -->
								</div>

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
										Accordion Item #1
									</button>
								</h2>
								<div id="collapseOne" class="accordion-collapse collapse show"
									aria-labelledby="headingOne" data-bs-parent="#accordionExample">
									<div class="accordion-body">
										<strong>This is the first item's accordion body.</strong> It is hidden by
										default, until the collapse plugin adds the appropriate classes that we use to
										style each element. These classes control the overall appearance, as well as the
										showing and hiding via CSS transitions. You can modify any of this with custom
										CSS or overriding our default variables. It's also worth noting that just about
										any HTML can go within the <code>.accordion-body</code>, though the transition
										does limit overflow.
									</div>
								</div>
							</div>
							<div class="accordion-item">
								<h2 class="accordion-header" id="headingTwo">
									<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
										data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
										Accordion Item #2
									</button>
								</h2>
								<div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo"
									data-bs-parent="#accordionExample">
									<div class="accordion-body">
										<strong>This is the second item's accordion body.</strong> It is hidden by
										default, until the collapse plugin adds the appropriate classes that we use to
										style each element. These classes control the overall appearance, as well as the
										showing and hiding via CSS transitions. You can modify any of this with custom
										CSS or overriding our default variables. It's also worth noting that just about
										any HTML can go within the <code>.accordion-body</code>, though the transition
										does limit overflow.
									</div>
								</div>
							</div>
							<div class="accordion-item">
								<h2 class="accordion-header" id="headingThree">
									<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
										data-bs-target="#collapseThree" aria-expanded="false"
										aria-controls="collapseThree">
										Accordion Item #3
									</button>
								</h2>
								<div id="collapseThree" class="accordion-collapse collapse"
									aria-labelledby="headingThree" data-bs-parent="#accordionExample">
									<div class="accordion-body">
										<strong>This is the third item's accordion body.</strong> It is hidden by
										default, until the collapse plugin adds the appropriate classes that we use to
										style each element. These classes control the overall appearance, as well as the
										showing and hiding via CSS transitions. You can modify any of this with custom
										CSS or overriding our default variables. It's also worth noting that just about
										any HTML can go within the <code>.accordion-body</code>, though the transition
										does limit overflow.
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
