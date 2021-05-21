<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Start your development with a Dashboard for Bootstrap 4.">
    <meta name="author" content="Creative Tim">
    <title>UCARD LOGIN ADMIN</title>
    <!-- Favicon -->
    <link rel="icon" href="<?= base_url('assets/img/icon.png') ?>" type="image/png">
    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700">
    <!-- Icons -->
    <link rel="stylesheet" href="<?= base_url('assets/admin/vendor/nucleo/css/nucleo.css') ?>" type="text/css">
    <link rel="stylesheet" href="<?= base_url('assets/admin/vendor/@fortawesome/fontawesome-free/css/all.min.css') ?>" type="text/css">
    <!-- Argon CSS -->
    <link rel="stylesheet" href="<?= base_url('assets/admin/css/argon.css?v=1.2.0') ?>" type="text/css">
</head>

<body class="bg-default">
    <!-- Main content -->
    <div class="main-content">
        <!-- Header -->
        <div class="header bg-gradient-primary py-7 py-lg-8 pt-lg-9">
            <div class="container">
                <div class="header-body text-center mb-7">
                    <div class="row justify-content-center">
                        <div class="col-xl-5 col-lg-6 col-md-8 px-5">
                            <h1 class="text-white">Selamat Datang!</h1>
                        </div>
                    </div>
                </div>
            </div>
            <div class="separator separator-bottom separator-skew zindex-100">
                <svg x="0" y="0" viewBox="0 0 2560 100" preserveAspectRatio="none" version="1.1" xmlns="http://www.w3.org/2000/svg">
                    <polygon class="fill-default" points="2560 0 2560 100 0 100"></polygon>
                </svg>
            </div>
        </div>
        <!-- Page content -->
        <div class="container mt--8 pb-5">
            <div class="row justify-content-center">
                <div class="col-lg-5 col-md-7">
                    <div class="card bg-secondary border-0 mb-0">
                        <form id="login">
                            <div class="card-body px-lg-5 py-lg-5">
                                <div id="alert"></div>
                                <div class="form-group mb-3">
                                    <div class="input-group input-group-merge input-group-alternative">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="ni ni-circle-08"></i></span>
                                        </div>
                                        <input class="form-control" placeholder="Email" id="email" type="text">
                                    </div>
                                </div>
                                <div class="form-group mb-1">
                                    <div class="input-group input-group-merge input-group-alternative">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
                                        </div>
                                        <input class="form-control" placeholder="Password" id="password" type="password">
                                    </div>
                                </div>
                                <div class="form-group my-0 text-right">
                                    <a class="w-100" style="color: #3e3e3e;" href="<?= base_url('Password'); ?>">Lupa password?</a>
                                </div>
                                <div class="text-center">
                                    <button type="submit" class="btn btn-primary my-4">Login</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Argon Scripts -->
    <!-- Core -->
    <script src="<?= base_url('assets/admin/vendor/jquery/dist/jquery.min.js') ?>"></script>
    <script src="<?= base_url('assets/admin/vendor/bootstrap/dist/js/bootstrap.bundle.min.js') ?>"></script>
    <script src="<?= base_url('assets/admin/vendor/js-cookie/js.cookie.js') ?>"></script>
    <script src="<?= base_url('assets/admin/vendor/jquery.scrollbar/jquery.scrollbar.min.js') ?>"></script>
    <script src="<?= base_url('assets/admin/vendor/jquery-scroll-lock/dist/jquery-scrollLock.min.js') ?>"></script>
    <!-- Argon JS -->
    <script src="<?= base_url('assets/admin/js/argon.js?v=1.2.0') ?>"></script>

    <script>
        $('#login').submit(function(event) {
            event.preventDefault();
            var email = $('#email').val();
            var password = $('#password').val();
            var url_admin = '<?= base_url('Dashboard') ?>';
            var url_pelanggan = '<?= base_url('Order_pelanggan') ?>';
            if (email != '' && password != '') {
                $.ajax({
                    type: "POST",
                    url: "<?= base_url('Admin/login') ?>",
                    data: {
                        email: email,
                        password: password
                    },
                    success: function(data) {
                        if (data == 'admin') {
                            $('#alert').html('<div class="alert alert-success alert-dismissible fade show" role="alert"><span class="alert-icon"><i class="fa fa-check"></i></span><span class="alert-text"><strong>Berhasil!</strong></span><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
                            setTimeout(function() {
                                window.location.href = url_admin;
                            }, 1000);
                        } else if (data == 'pelanggan') {
                            $('#alert').html('<div class="alert alert-success alert-dismissible fade show" role="alert"><span class="alert-icon"><i class="fa fa-check"></i></span><span class="alert-text"><strong>Berhasil!</strong></span><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
                            setTimeout(function() {
                                window.location.href = url_pelanggan;
                            }, 1000);
                        } else {
                            $('#alert').html('<div class="alert alert-danger alert-dismissible fade show" role="alert"><span class="alert-icon"><i class="fa fa-times"></i></span><span class="alert-text"><strong>Email/Password Salah</strong></span><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
                        }
                    }
                });
            } else {
                $('#alert').html('<div class="alert alert-danger alert-dismissible fade show" role="alert"><span class="alert-text"><strong>Email dan Password tidak boleh kosong</strong></span><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            }
        });
    </script>

</body>

</html>