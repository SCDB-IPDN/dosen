    <!-- Tentang -->
    <section id="home" class="w3l-banner py-5">
        <div class="banner-image">
        </div>

        <div id="particles-js"></div>
        <script src="<?php echo base_url('assets/frontend/js/particles.min.js'); ?>"></script>

        <div class="banner-content">
            <div class="container pt-5 pb-md-4">
                <div class="row align-items-center">
                    <div class="col-md-6 pt-md-0 pt-4">
                        <div class="card shadow rounded" style="border-radius: 3rem !important;">
                            <h3 class="mb-lg-4 mb-3 mt-3 mx-3 title">Tentang Aplikasi</h3>
                            <p align="justify" class="mx-3 my-3">
                            <?php
                            if (!empty($desc)) {
                                foreach ($desc as $row) {
                                    if ($row->id_desc == 2) {
                                        echo nl2br("$row->desc");
                                    }
                                }
                            } else {
                                echo "";
                            }
                            ?>
                            </p>
                        </div>
                    </div>
                    <div class="col-md-6 mt-md-0 mt-4">
                        <img src="<?php echo base_url('assets/frontend/images/10586.png'); ?>" alt="" class="img-fluid radius-image">
                    </div>
                </div>
                <div class="row align-items-center">
                    <div class="col-md-6 pt-md-0 pt-4 about-right-faq ">
                        <div class="card shadow rounded" style="border-radius: 3rem !important;">
                            <p align="justify" class="mx-3 my-3">
                            <?php
                            if (!empty($desc)) {
                                foreach ($desc as $row) {
                                    if ($row->id_desc == 2) {
                                        echo nl2br("$row->sub_desc");
                                    }
                                }
                            } else {
                                echo "";
                            }
                            ?>
                            </p>
                        </div>
                    </div>
                    <div class="col-lg-6 left-wthree-img mt-lg-0 mt-5 order-lg-first order-last">
                        <img src="<?php echo base_url('assets/frontend/images/service2.png'); ?>" alt="" class="img-fluid radius-image">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- //Tentang -->