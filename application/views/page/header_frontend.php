<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>PRESENSI IPDN &copy;<?php echo date('Y') ?></title>
    <link href="https://upload.wikimedia.org/wikipedia/commons/5/56/Lambang_IPDN.png" rel="icon">
    <link href="//fonts.googleapis.com/css2?family=Ubuntu:wght@300;400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo base_url('assets/frontend/css/fontawesome-all.min.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/frontend/css/style-starter.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/frontend/css/animated.css'); ?>">
    <!-- Particle -->
    <link rel="stylesheet" href="<?php echo base_url('assets/frontend/css/particle.css'); ?>">

    <!-- Bootstrap CSS -->
    <?php if ($this->uri->segment(1) == 'monitoring' || $this->uri->segment(1) == 'absen' || $this->uri->segment(1) == 'dashboard') { ?>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <?php } ?>

    <!-- Toastr -->
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <!-- DataTables -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" />
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.6.1/css/buttons.bootstrap4.min.css" />
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.bootstrap4.min.css" />

    <!-- Maps -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A==" crossorigin="">
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js" integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA==" crossorigin=""></script>


    <style>
        #map {
            /* height: 100%; */
            height: 300px;

        }
    </style>


    <!-- Header-->
    <?php if (!empty($this->session->userdata('username'))) { ?>
        <header id="site-header" class="fixed-top shadow" style="background-color: #0F79ED; border-bottom-right-radius: 3rem !important; border-bottom-left-radius: 3rem !important;">
            <div class="container">
                <nav class="navbar navbar-expand-lg stroke px-0">
                    <h1>
                        <a class="navbar-brand" href="">
                            <!-- <i class="fab fa-accusoft icon-color mr-1"></i>Set<span>up</span> -->
                            <img src="<?php echo base_url('assets/frontend/images/smart-ipdn.png'); ?>" height="50" width="150" alt="" srcset="">
                            <!-- Smart <span>Campus</span> -->
                        </a>
                    </h1>

                    <button class="navbar-toggler  collapsed bg-gradient" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon fa icon-expand fa-bars"></span>
                        <span class="navbar-toggler-icon fa icon-close fa-times"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
                        <ul class="navbar-nav ml-lg-auto">
                            <li class="nav-item <?php echo empty($beranda) ? '' : $beranda ?>">
                                <a class="nav-link" href="<?php echo base_url('beranda'); ?>">
                                    <i class="fa fa-home" aria-hidden="true"></i>
                                    Beranda
                                </a>
                            </li>
                            <li class="nav-item <?php echo empty($dashboard) ? '' : $dashboard ?>">
                                <a class="nav-link" href="<?php echo base_url('dashboard'); ?>">
                                    <i class="far fa-chart-bar" aria-hidden="true"></i>
                                    Dashboard
                                </a>
                            </li>
                            <li class="nav-item <?php echo empty($tentang) ? '' : $tentang ?>">
                                <a class="nav-link" href="<?php echo base_url('tentang'); ?>">
                                    <i class="fa fa-info-circle" aria-hidden="true"></i>
                                    Tentang
                                </a>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link <?php echo empty($profile) ? '' : $profile ?>" href="#">
                                    <?= $this->session->userdata('username'); ?>
                                    <i class="fa fa-user" aria-hidden="true"></i>
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <?php if ($this->session->userdata('role') == 22) { ?>
                                        <a class="dropdown-item" href="<?php echo base_url('absen'); ?>">
                                            <i class="fa fa-file-import" aria-hidden="true"></i>
                                            Presensi Kehadiran
                                        </a>
                                        <a class="dropdown-item" href="<?php echo base_url('monitoring'); ?>">
                                            <i class="fa fa-desktop" aria-hidden="true"></i>
                                            Monitoring Pembelajaran
                                        </a>
                                    <?php } elseif ($this->session->userdata('role') == 29) { ?>
                                        <a class="dropdown-item" href="<?php echo base_url('monitoring'); ?>">
                                            <i class="fa fa-desktop" aria-hidden="true"></i>
                                            Monitoring Pembelajaran
                                        </a>
                                    <?php } elseif ($this->session->userdata('role') == 30 || $this->session->userdata('role') == 31 || $this->session->userdata('role') == 32 || $this->session->userdata('role') == 33 || $this->session->userdata('role') == 34 || $this->session->userdata('role') == 35 || $this->session->userdata('role') == 36 || $this->session->userdata('role') == 37 || $this->session->userdata('role') == 38) { ?>
                                        <a class="dropdown-item" href="<?php echo base_url('monitoring'); ?>">
                                            <i class="fa fa-desktop" aria-hidden="true"></i>
                                            Monitoring Pembelajaran
                                        </a>
                                    <?php } elseif ($this->session->userdata('role') == 39 || $this->session->userdata('role') == 40) { ?>
                                        <a class="dropdown-item" href="<?php echo base_url('absen'); ?>">
                                            <i class="fa fa-file-import" aria-hidden="true"></i>
                                            Presensi Kehadiran
                                        </a>
                                    <?php } ?>

                                    <?php if ($this->session->userdata('role') == 1) { ?>
                                        <a class="dropdown-item" href="<?php echo base_url('absen'); ?>">
                                            <i class="fa fa-book" aria-hidden="true"></i>
                                            Report
                                        </a>
                                        <hr>
                                    <?php } else { ?>
                                        <hr>
                                    <?php } ?>
                                    <a class="dropdown-item" href="<?php echo base_url('profile/' . base64_encode($this->session->userdata('username'))); ?>">
                                        <i class="fa fa-user" aria-hidden="true"></i>
                                        Profile
                                    </a>
                                    <a class="dropdown-item" href="<?php echo base_url('login/logout'); ?>">
                                        <i class="fas fa-sign-out-alt" aria-hidden="true"></i>
                                        Logout
                                    </a>
                                </div>
                            </li>
                    </div>

                    <!-- toggle switch for light and dark theme -->
                    <!-- <div class="cont-ser-position">
                    <nav class="navigation">
                        <div class="theme-switch-wrapper">
                            <label class="theme-switch" for="checkbox">
                                <input type="checkbox" id="checkbox">
                                <div class="mode-container">
                                    <i class="gg-sun"></i>
                                    <i class="gg-moon"></i>
                                </div>
                            </label>
                        </div>
                    </nav>
                    </div> -->
                    <!-- //toggle switch for light and dark theme -->

                </nav>
            </div>
        </header>
</head>

<body>
<?php } ?>
<!-- //Header-->