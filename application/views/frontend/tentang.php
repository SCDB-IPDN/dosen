    <!-- Tentang -->
    <section id="home" class="w3l-banner py-5">
        <div class="banner-image"></div>
        <div class="container py-lg-5 py-md-3">
            <div class="row">
                <div class="col-lg-6 about-right-faq align-self pr-lg-5">
                    <h3 class="title-big">Tentang Aplikasi</h3>
                    <p class="mt-3 mb-4" align="justify">
                        <?php 
                            if(!empty($desc)) {
                                foreach ($desc as $row) {
                                    if($row->id_desc == 2) {
                                        echo nl2br("$row->desc");
                                    }
                                }
                            } else {
                                echo "";
                            }
                        ?>
                    </p>
                </div>
                <div class="col-lg-6 left-wthree-img mt-lg-0 mt-5">
                    <img src="<?php echo base_url('assets/frontend/images/10586.png'); ?>" alt="" class="img-fluid radius-image">
                </div>
            </div>
            <div class="row mt-5 pt-5">
                <div class="col-lg-6 left-wthree-img mt-lg-0 mt-5 order-lg-first order-last">
                    <img src="<?php echo base_url('assets/frontend/images/service2.png'); ?>" alt="" class="img-fluid radius-image">
                </div>
                <div class="col-lg-6 about-right-faq align-self pl-lg-5 order-lg-last order-first">
                    <p class="mt-3">
                        <?php 
                            if(!empty($desc)) {
                                foreach ($desc as $row) {
                                    if($row->id_desc == 2) {
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
        </div>
    </section>
    <!-- //Tentang -->