    <!-- Banner -->
    <section id="home" class="w3l-banner py-5">
    <div class="banner-image">
    </div>
        <div class="banner-content">
            <div class="container pt-5 pb-md-4">
                <div class="row align-items-center">
                    <div class="col-md-6 content-photo order-md-last order-first">
                        <img src="assets/frontend/images/10586.png" class="img-fluid" alt="content-photo">
                    </div>
                    <div class="col-md-6 content-left mb-md-0 mb-5 pl-lg-5 order-md-first order-last">
                        <h3 class="mb-3">Tentang Aplikasi</h3>
                        <p class="mt-3" align="justify">
                            <?php 
                                if(!empty($desc)) {
                                    foreach ($desc as $row) {
                                        if($row->id_desc == 2) {
                                            echo nl2br("&emsp; $row->desc <br>");
                                            echo nl2br("&emsp; $row->sub_desc");
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
        </div>
    </section>
    <!-- //Banner -->