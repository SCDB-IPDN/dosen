<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="<?php echo base_url('assets/login-form-07/fonts/icomoon/style.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/login-form-07/css/owl.carousel.min.css'); ?>">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?php echo base_url('assets/login-form-07/css/bootstrap.min.css'); ?>">
    <!-- Style -->
    <link rel="stylesheet" href="<?php echo base_url('assets/login-form-07/css/style.css'); ?>">

    <title>PRESENSI IPDN &copy;<?php echo date('Y') ?></title>
    <link href="https://upload.wikimedia.org/wikipedia/commons/5/56/Lambang_IPDN.png" rel="icon">
</head>

<body>

    <div class="content">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <img src="<?php echo base_url('assets/login-form-07/images/undraw_remotely_2j6y.svg'); ?>" alt="Image" class="img-fluid">
                </div>
                <div class="col-md-6 contents">
                    <div class="row justify-content-center">
                        <div class="col-md-8">
                            <div class="mb-4">
                                <h3>Login Form</h3>
                                <p class="mb-4">Aplikasi Presensi</p>
                            </div>
                            <form action="<?= base_url('/ceklogin') ?>" method="post">
                                <div class="form-group first">
                                    <label for="username">Username</label>
                                    <input type="text" class="form-control" id="username" name="username">
                                </div>
                                <div class="form-group last mb-4">
                                    <label for="password">Password</label>
                                    <input type="password" class="form-control" id="password" name="password">
                                </div>
                                <input type="submit" value="Log In" class="btn btn-block btn-primary">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="<?php echo base_url('assets/login-form-07/js/jquery-3.3.1.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/login-form-07/js/popper.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/login-form-07/js/bootstrap.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/login-form-07/js/main.js'); ?>"></script>
</body>

</html>