    <!-- Profile -->
    <section id="home" class="w3l-banner py-5">
        <div class="banner-image"></div>
        <div class="container py-lg-5 py-md-3">
            <div class="row">
                <div class="col-lg-6 about-right-faq align-self pr-lg-5">
                    <h3 class="title-big">Profile</h3>
                    <div class="mx-auto pt-lg-4 pt-md-5 pt-4" style="max-width:1000px">
                        <div class="row contact-block">
                            <div class="col-md-6 contact">
                                <div class="cont-details">
                                    <div class="d-flex contact-grid">
                                        <div class="cont-right">
                                            <h6>NIK / NIP</h6>
                                            <p><?= count($get_profile) == 0 ? '-' : $this->session->userdata('username'); ?></p>
                                        </div>
                                    </div>
                                    <div class="d-flex contact-grid mt-4 pt-lg-2">
                                        <div class="cont-right">
                                            <h6>Nama Pengguna</h6>
                                            <p><?= count($get_profile) == 0 ? '-' : $get_profile[0]->nama; ?></p>
                                        </div>
                                    </div>
                                    <div class="d-flex contact-grid mt-4 pt-lg-2">
                                        <div class="cont-right">
                                            <h6>Username</h6>
                                            <p><?= $this->session->userdata('username'); ?></p>
                                        </div>
                                    </div>
                                    <div class="d-flex contact-grid mt-4 pt-lg-2">
                                        <div class="cont-right">
                                            <h6>Password</h6>
                                            <p><?= $this->session->userdata('password'); ?></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 left-wthree-img mt-lg-0 mt-5">
                    <img src="<?php echo base_url('assets/frontend/images/21207.png'); ?>" alt="" class="img-fluid radius-image">
                </div>
            </div>
        </div>
    </section>
    <!-- //Profile -->