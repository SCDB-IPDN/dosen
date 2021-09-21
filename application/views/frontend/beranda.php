    <!-- Beranda -->
    <section id="home" class="w3l-banner py-5">
        <div class="banner-image">
        </div>

        <div id="particles-js"></div>
        <script src="<?php echo base_url('assets/frontend/js/particles.min.js'); ?>"></script>

        <div class="banner-content">
            <div class="container pt-5 pb-md-4">
                <div class="row align-items-center">
                    <div class="col-md-6 pt-md-0 pt-4">
                        <div class="card shadow rounded" style="border-radius: 1rem !important;">
                            <h3 class="mb-lg-4 mb-3 mt-3 mx-3 title">Selamat Datang</h3>
                            <p align="justify" class="mx-3 my-3">
                                <?php
                                if (!empty($desc)) {
                                    foreach ($desc as $row) {
                                        if ($row->id_desc == 2) {
                                            echo "&emsp; $row->desc";
                                        }
                                    }
                                } else {
                                    echo "";
                                }
                                ?>
                                <br><br>Klik tombol dibawah untuk melakukan presensi
                            </p>
                        </div>
                        <div class="mt-md-5 mt-4 mb-lg-0 mb-4">
                            <?php if($this->session->userdata('role') == 22 || $this->session->userdata('role') == 29){ ?>
                                <a class="btn button-style animated tada my-1 mx-auto" href="<?php echo base_url('absen'); ?>" role="button">Presensi Kehadiran</a>
                                <a class="btn button-style animated tada my-1 mx-auto" href="<?php echo base_url('monitoring'); ?>" role="button">Monitoring Pembelajaran</a>
                            <?php } elseif($this->session->userdata('role') == 23) { ?>
                                <a class="btn button-style animated tada " href="<?php echo base_url('absen'); ?>" role="button">Presensi Kehadiran</a>
                            <?php } elseif($this->session->userdata('role') == 30 || $this->session->userdata('role') == 31 || $this->session->userdata('role') == 32 || $this->session->userdata('role') == 33 || $this->session->userdata('role') == 34 || $this->session->userdata('role') == 35 || $this->session->userdata('role') == 36 || $this->session->userdata('role') == 37 || $this->session->userdata('role') == 38) { ?>
                                <a class="btn button-style animated tada my-1 mx-auto" href="<?php echo base_url('monitoring'); ?>" role="button">Monitoring Pembelajaran</a>
                            <?php } ?>
                        </div>
                    </div>
                    <div class="col-md-6 mt-md-0 mt-4">
                        <img class="img-fluid animated2 pulse" src="<?php echo base_url('assets/frontend/images/20945183.png'); ?>" alt=" ">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- //Beranda -->