    <!-- Beranda -->
    <section id="home" class="w3l-banner py-5">
        <div class="banner-image">

        </div>
        <div class="banner-content">
            <div class="container pt-5 pb-md-4">
                <div class="row align-items-center">
                    <div class="col-md-6 pt-md-0 pt-4">
                        <h3 class="mb-lg-4 mb-3 title">Selamat Datang</h3>
                        <p align="justify">
                            <?php 
                                if(!empty($desc)) {
                                    foreach ($desc as $row) {
                                        if($row->id_desc == 2) {
                                            echo "&emsp; $row->desc";
                                        }
                                    }
                                } else {
                                    echo "";
                                }
                            ?>
                            <br><br>Klik tombol dibawah untuk melakukan absen
                        </p>
                        <div class="mt-md-5 mt-4 mb-lg-0 mb-4">
                            <a class="btn button-style" href="" role="button">Presensi Kehadiran</a>
                            <a class="btn button-style" href="" role="button">Monitoring Pembelajaran</a>
                        </div>
                    </div>
                    <div class="col-md-6 mt-md-0 mt-4">
                        <img class="img-fluid" src="assets/frontend/images/20945183.png" alt=" ">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- //Beranda -->