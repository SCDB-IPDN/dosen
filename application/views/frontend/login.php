<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>DOSEN IPDN</title>
    <link href="https://upload.wikimedia.org/wikipedia/commons/5/56/Lambang_IPDN.png" rel="icon">
    <link href="//fonts.googleapis.com/css2?family=Ubuntu:wght@300;400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/frontend/css/fontawesome-all.min.css">
    <link rel="stylesheet" href="assets/frontend/css/style-starter.css">
    <link rel="stylesheet" href="assets/frontend/css/style-lg.css">

    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
</head>



<body>


    <!-- Login -->
    <section class="w3l-contact py-5" id="contact">
        <div class="container">
            <center>
                <h1 class="title-header" data-aos="fade-down">RUANG DOSEN</h1>
                <hr>
            </center>
            <div class="mx-auto pt-lg-4 pt-md-5 pt-4" style="max-width:1000px; margin-top:30px">
                <div class="row contact-block">
                    <div class="col-md-5 contact-right mt-md-0 mt-4 bg-putih" data-aos="fade-left">
                        <form action="<?= base_url('/ceklogin') ?>" method="post" class="signin-form">
                            <h3 class="title-big">Login Ruang Dosen</h3>

                            <div class="input-grids">
                                <input type="text" name="username" id="w3lName" placeholder="Username*" class="contact-input inputan" required="" />
                                <input type="password" name="password" id="w3lSender" placeholder="Password*" class="contact-input inputan" required="" />
                            </div>
                            <button type="submit" class="btn button-style bg-doger">LOGIN</button>

                            <div style="margin: 20px 0; text-align:right;">
                                <img style="display: block;" src="assets/frontend/images/smart-ipdn.png" width="40%">
                            </div>
                        </form>
                    </div>
                    <div class="col-md-7">
                        <img data-aos="fade-right" src="assets/frontend/images/5584-2.png" width="100%">
                    </div>
                    
                </div>
            </div>
        </div>

        
    </section>
    <!-- //Login -->

    <footer>
        <center>
            <span>&copy; SCDB IPDN 2021 - All Right Reserved</span>
        </center>
    </footer>

    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init({
            offset: 100, // offset (in px) from the original trigger point
            delay: 1000, // values from 0 to 3000, with step 50ms
            duration: 700, // values from 0 to 3000, with step 50ms
        });

    </script>
</body>
</html>