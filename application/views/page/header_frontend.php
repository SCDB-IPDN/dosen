<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>SCBD IPDN</title>
    <link href="https://upload.wikimedia.org/wikipedia/commons/5/56/Lambang_IPDN.png" rel="icon">
    <link href="//fonts.googleapis.com/css2?family=Ubuntu:wght@300;400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo base_url('assets/frontend/css/fontawesome-all.min.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/frontend/css/style-starter.css'); ?>">
</head>

<body>

    <!-- Header-->
    <header id="site-header" class="fixed-top">
        <div class="container">
            <nav class="navbar navbar-expand-lg stroke px-0">
                <h1>
                    <a class="navbar-brand" href="">
                        <!-- <i class="fab fa-accusoft icon-color mr-1"></i>Set<span>up</span> -->
                        <img src="<?php echo base_url('assets/frontend/images/IPDN.png'); ?>" height="50" width="50" alt="" srcset="">
                        <!-- Smart <span>Campus</span> -->
                    </a>
                </h1>

                <button class="navbar-toggler  collapsed bg-gradient" type="button" data-toggle="collapse"
                    data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false"
                    aria-label="Toggle navigation">
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
                        <li class="nav-item <?php echo empty($tentang) ? '' : $tentang ?>">
                            <a class="nav-link" href="<?php echo base_url('tentang'); ?>">
                                <i class="fa fa-info-circle" aria-hidden="true"></i>
                                Tentang
                            </a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link <?php echo empty($profile) ? '' : $profile ?>" href="<?php echo base_url('profile/'.base64_encode($this->session->userdata('username'))); ?>">
                                <?= $this->session->userdata('username'); ?>
                                <i class="fa fa-user" aria-hidden="true"></i>
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="<?php echo base_url('profile/'.base64_encode($this->session->userdata('username'))); ?>">
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
                <div class="cont-ser-position">
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
                </div>
                <!-- //toggle switch for light and dark theme -->

            </nav>
        </div>
    </header>
    <!-- //Header-->