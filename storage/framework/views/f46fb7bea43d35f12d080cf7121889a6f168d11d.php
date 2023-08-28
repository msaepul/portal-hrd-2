<!-- =========================================================
* Argon Dashboard PRO v1.1.0
=========================================================

* Product Page: https://www.creative-tim.com/product/argon-dashboard-pro
* Copyright 2019 Creative Tim (https://www.creative-tim.com)

* Coded by Creative Tim

=========================================================

* The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.
 -->
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Start your development with a Dashboard for Bootstrap 4.">
    <meta name="author" content="Creative Tim">
    <title>OTP|| Porta HRD</title>
    <!-- Favicon -->
    <link rel="icon" href="assets/img/brand/favicon.png" type="image/png">
    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700">
    <!-- Icons -->
    <link rel="stylesheet" href="assets/vendor/nucleo/css/nucleo.css" type="text/css">
    <link rel="stylesheet"
        href="assets/vendor/@fortawesome/fontawesome-free/css/all.min.css" type="text/css">
    <!-- Argon CSS -->
    <link rel="stylesheet" href="assets/css/argon.css?v=1.1.0" type="text/css">
</head>

<body class="bg-default">
    <!-- Navbar -->
    <nav id="navbar-main" class="navbar navbar-horizontal navbar-transparent navbar-main navbar-expand-lg navbar-light">
        <div class="container">
            <a class="navbar-brand" href="pages/dashboards/dashboard.html">
                <img src="assets/img/brand/white.png">
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-collapse"
                aria-controls="navbar-collapse" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="navbar-collapse navbar-custom-collapse collapse" id="navbar-collapse">
                <div class="navbar-collapse-header">
                    <div class="row">
                        <div class="col-6 collapse-brand">
                            <a href="pages/dashboards/dashboard.html">
                                <img src="assets/img/brand/blue.png">
                            </a>
                        </div>
                        <div class="col-6 collapse-close">
                            <button type="button" class="navbar-toggler" data-toggle="collapse"
                                data-target="#navbar-collapse" aria-controls="navbar-collapse" aria-expanded="false"
                                aria-label="Toggle navigation">
                                <span></span>
                                <span></span>
                            </button>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </nav>
    <!-- Main content -->
    <div class="main-content">
        <!-- Header -->
        <div class="header bg-gradient-primary py-7 py-lg-8 pt-lg-9">
            <div class="container">
                <div class="header-body text-center mb-5">
                    <div class="row justify-content-center">
                        <div class="col-xl-5 col-lg-6 col-md-8 px-5">
                            <h1 class="text-white">Masukan Kode OTP</h1>
                        </div>
                    </div>
                </div>
            </div>
            <div class="separator separator-bottom separator-skew zindex-100">
                <svg x="0" y="0" viewBox="0 0 2560 100" preserveAspectRatio="none" version="1.1"
                    xmlns="http://www.w3.org/2000/svg">
                    <polygon class="fill-default" points="2560 0 2560 100 0 100"></polygon>
                </svg>
            </div>
        </div>

        <!-- Tambahkan CSRF token untuk keamanan -->
        <!-- Page content -->
        <div class="container mt--8 pb-5">
            <div class="row justify-content-center">
                <div class="col-lg-5 col-md-7">
                    <div class="card bg-secondary border-0 mb-0">

                        <div class="card-body px-lg-5 py-lg-5">

                            <div class="text-center text-muted mb-4">
                                <small>Masukan Kode OTP</small>
                            </div>
           <!-- Inside your OTP verification view -->
<?php if(session('success')): ?>
<div id="success-alert" class="alert alert-success" role="alert">
    <?php echo e(session('success')); ?>

</div>
<?php endif; ?>

<?php if($errors->has('otp')): ?>
<div id="error-alert" class="alert alert-danger" role="alert">
    <?php echo e($errors->first('otp')); ?>

</div> <?php endif; ?>

                            <form method="POST"
        action="<?php echo e(route('verifotp')); ?>">
    <?php echo csrf_field(); ?>
    <div class="form-group mb-3">
        <div class="input-group input-group-merge input-group-alternative">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="ni ni-key-25"></i></span>
            </div>
            <input class="form-control" placeholder="OTP" type="text" name="otp" id="otp">
        </div>
    </div>
    <small>Tidak Menerima Kode OTP? <a href="<?php echo e(route('resendotp')); ?>">Kirim ulang OTP</a></small>
    <div class="text-center">
        <button type="submit" class="btn btn-primary my-4">Submit OTP</button>
    </div>
    </form>

    </div>
    </div>
    <!-- Core -->
    <script src="assets/vendor/jquery/dist/jquery.min.js"></script>
    <script src="assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="assets/vendor/js-cookie/js.cookie.js"></script>
    <script src="assets/vendor/jquery.scrollbar/jquery.scrollbar.min.js"></script>
    <script src="assets/vendor/jquery-scroll-lock/dist/jquery-scrollLock.min.js"></script>
    <!-- Argon JS -->
    <script src="assets/js/argon.js?v=1.1.0"></script>

    <script>
        // Delay in milliseconds (3 seconds)
        const delay = 3000;

        // Function to hide the alert after the specified delay
        const hideAlert = function(alertId) {
            const alert = document.getElementById(alertId);
            if (alert) {
                alert.style.display = 'none';
            }
        };

        // Automatically hide the success and error alerts
        setTimeout(function() {
            hideAlert('success-alert');
            hideAlert('error-alert');
        }, delay);
    </script>
    </body>

</html>
<?php /**PATH C:\xampp\htdocs\portal-hrd\resources\views/auth/otp.blade.php ENDPATH**/ ?>