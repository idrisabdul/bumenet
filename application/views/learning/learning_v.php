<main id="main" class="main">

    <div class="pagetitle">
        <h1>Kelas</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item">Components</li>
                <li class="breadcrumb-item active">Cards</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-xl-3">
                <div class="card">
                    <div class="card-body">
                        
                        <ul class="sidebar-nav" id="sidebar-nav">
                        <h5 class="card-title">Kategori</h5>
                            <li class="nav-item">
                                <a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse"
                                    href="#">
                                    <i class="bi bi-menu-button-wide"></i><span>Kelas</span><i
                                        class="bi bi-chevron-down ms-auto"></i>
                                </a>
                                <ul id="components-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                                    <li>
                                        <a href="components-tabs.html">
                                            <i class="bi bi-circle"></i><span>Bussines Analysist</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="components-tabs.html">
                                            <i class="bi bi-circle"></i><span>Backend Developer</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="components-tabs.html">
                                            <i class="bi bi-circle"></i><span>Database Administrator</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="components-tabs.html">
                                            <i class="bi bi-circle"></i><span>DevOps</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="components-tabs.html">
                                            <i class="bi bi-circle"></i><span>Frontend Developer</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="components-tabs.html">
                                            <i class="bi bi-circle"></i><span>Mobile Developer</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="components-tabs.html">
                                            <i class="bi bi-circle"></i><span>Project Manager</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="components-tabs.html">
                                            <i class="bi bi-circle"></i><span>Scrum Master</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="components-tabs.html">
                                            <i class="bi bi-circle"></i><span>QA Software Tester</span>
                                        </a>
                                    </li>
                                </ul>
                            </li><!-- End Components Nav -->

                           
                            <li class="nav-item">
                                <a class="nav-link collapsed" data-bs-target="#tables-nav" data-bs-toggle="collapse"
                                    href="#">
                                    <i class="bi bi-layout-text-window-reverse"></i><span>Harga</span><i
                                        class="bi bi-chevron-down ms-auto"></i>
                                </a>
                                <ul id="tables-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                                    <li>
                                        <a href="tables-general.html">
                                            <i class="bi bi-circle"></i><span>Gratis</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="tables-data.html">
                                            <i class="bi bi-circle"></i><span>Promo</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="tables-data.html">
                                            <i class="bi bi-circle"></i><span>Berbayar</span>
                                        </a>
                                    </li>
                                </ul>
                            </li><!-- End Tables Nav -->

                          

                           


                            <li class="nav-item">
                                <a class="nav-link collapsed" href="pages-error-404.html">
                                    <i class="bi bi-bar-chart"></i>
                                    <span>Top Kelas</span>
                                </a>
                            </li><!-- End Error 404 Page Nav -->
                            
                            <li class="nav-item">
                                <a class="nav-link collapsed" href="pages-error-404.html">
                                    <i class="bi bi-collection-play"></i>
                                    <span>Seminar IT</span>
                                </a>
                            </li><!-- End Error 404 Page Nav -->

                            <li class="nav-item">
                                <a class="nav-link collapsed" href="pages-blank.html">
                                    <i class="bi bi-person"></i>
                                    <span>Bumenet Mengajar</span>
                                </a>
                            </li><!-- End Blank Page Nav -->

                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-xl-9">
                <div class="row align-items-top">
                    <?php foreach ($courses as $cs) { ?>
                        <div class="col-lg-3">
                            <div class="card">
                                <div class="card-header">
                                    <img src="images/<?= $cs->img_service ?>" class="card-img-top" alt="...">
                                    <a href="<?= base_url('/learning/course_detail/' . $cs->service_id) ?>"
                                        class="card-link">
                                        <h5 class="card-title"><?= $cs->service_name ?></h5>
                                    </a>
                                    <h6 class="card-subtitle mb-2 text-muted"><?= $cs->product_category_name ?></h6>
                                </div>
                                <div class="card-body pt-3">
                                    <a href="<?= base_url('/learning/course_detail/' . $cs->service_id) ?>"
                                        class="card-link">Lihat detail</a>
                                </div>
                            </div><!-- End Special title treatmen -->
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </section>

</main><!-- End #main -->