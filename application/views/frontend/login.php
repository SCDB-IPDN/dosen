<link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

<style>
    .container {
        border: 0px solid black;
        margin-top: 0;
        padding-top: 20px;
    }

    .title-big {
        margin-bottom: 20px;
    }

    .bg-doger {
        background-color: dodgerblue;
    }

    .bg-putih {
        border-radius: 10px;
        padding: 20px;
        background-color: white;
        box-shadow: 0 10px 20px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
    }

    .title-header {
        font-size: 65px;
        font-weight: bold;
        letter-spacing: 3px;
    }

    footer {
        border-top: 1px solid gainsboro;
        padding: 30px;
    }

    @media screen and(min-width:500px) {
        .title-header {
            font-size: 15px;
        }

        .bg-putih {
            width: 95%;
        }
    }
</style>

<!-- Login -->
<section id="home" class="w3l-banner py-5">
    <div class="banner-image">
    </div>

    <div id="particles-js"></div>
    <script src="<?php echo base_url('assets/frontend/js/particles.min.js'); ?>"></script>

    <div class="container">
        <center>
            <h2 class="title-header" data-aos="fade-down">PRESENSI</h2>
            <hr>
        </center>
        <div class="mx-auto pt-lg-4 pt-md-5 pt-4" style="max-width:1000px; margin-top:30px">
            <div class="row contact-block">
                <div class="col-md-5 contact-right mt-md-0 mt-4 bg-putih" data-aos="fade-left">
                    <form action="<?= base_url('/ceklogin') ?>" method="post" class="signin-form">
                        <h3 class="title-big">Login</h3>

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
        <p class="copy-text">&copy; <?php echo date('Y') ?> IPDN - All rights reserved.
        </p>
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