    <!-- Profile -->
    <section id="home" class="w3l-banner py-5">
        <div class="banner-image">
        </div>

        <div id="particles-js"></div>
        <script src="http://cdn.jsdelivr.net/particles.js/2.0.0/particles.min.js"></script>

        <div class="container py-lg-5 py-md-3">
            <!-- <div class="row"> -->
                <div class="card mb-3 shadow rounded" style="border-radius: 3rem !important;">
                    <div class="row no-gutters">
                        <div class="col-md-4 my-1">
                            <?php if (count($get_profile) > 0 && !empty($get_profile[0]->image_url)) { ?>
                                <img src="<?php echo base_url('') . $get_profile[0]->image_url ?>" onerror="this.onerror=null;this.src='<?php echo base_url('assets/frontend/images/image-not-found-scaled-1150x647.png'); ?>'" class="card-img rounded" style="border-radius: 3rem !important;">
                            <?php } else { ?>
                                <img src="<?php echo base_url('assets/frontend/images/image-not-found-scaled-1150x647.png'); ?>" class="card-img rounded" style="border-radius: 3rem !important;">
                            <?php } ?>
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <h3 class="title-big">Profile</h3>
                                <hr>

                                <div class="d-flex contact-grid mt-4 pt-lg-2">
                                    <div class="cont-right">
                                        <h5>NIK / NIP:</h5>
                                        <p><?= count($get_profile) == 0 ? '-' : $this->session->userdata('username'); ?></p>
                                    </div>
                                </div>
                                <div class="d-flex contact-grid mt-4 pt-lg-2">
                                    <div class="cont-right">
                                        <h5>Nama Pengguna:</h5>
                                        <p><?= count($get_profile) == 0 ? '-' : $get_profile[0]->nama; ?></p>
                                    </div>
                                </div>
                                <div class="d-flex contact-grid mt-4 pt-lg-2">
                                    <div class="cont-right">
                                        <h5>Username:</h5>
                                        <p><?= $this->session->userdata('username'); ?></p>
                                    </div>
                                </div>
                                <div class="d-flex contact-grid mt-4 pt-lg-2">
                                    <div class="cont-right">
                                        <h5>Password:</h5>
                                        <p><?= $this->session->userdata('password'); ?></p>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            <!-- </div> -->
        </div>
    </section>
    <!-- //Profile -->