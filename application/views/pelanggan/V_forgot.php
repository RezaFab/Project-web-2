<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Start your development with a Dashboard for Bootstrap 4.">
    <meta name="author" content="Creative Tim">
    <title>UCARD Lupa Password</title>
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
        <div class="header bg-gradient-primary py-6">
            <div class="container">
                <div class="header-body text-center mb-0">
                    <div class="row justify-content-center">
                        <div class="col-xl-5 col-lg-6 col-md-8 py-5">
                            <h1 class="text-white">Lupa Password</h1>
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
        <div class="container mt-0 pb-5">
            <div class="row justify-content-center">
                <div class="col-lg-5 col-md-7">
                    <div class="card bg-secondary border-0 mb-0">
                        <form id="reset">
                            <div class="card-body px-lg-5 py-lg-5">
                                <div id="alert"></div>
                                <p id="phint">Masukkan email yang Anda gunakan pada saat mendaftar</p>
                                <div class="form-group mb-3">
                                    <div class="input-group input-group-merge input-group-alternative">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="ni ni-circle-08"></i></span>
                                        </div>
                                        <input class="form-control" placeholder="Email" id="email" type="text" value='<?= $_GET['email'] ?? ""; ?>'>
                                    </div>
                                </div>
                                <div id="formreset" style="<?= isset($_GET['email']) && isset($_GET['resetcode']) ? "" : "display: none;"; ?>">
                                    <div class="form-group">
                                        <div class="input-group input-group-merge input-group-alternative">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="ni ni-key-25"></i></span>
                                            </div>
                                            <input class="form-control" placeholder="Kode reset password" id="resetcode" type="text" value='<?= $_GET['resetcode'] ?? ""; ?>'>
                                        </div>
                                    </div>
                                    <div class="form-group mb-3">
                                        <div class="input-group input-group-merge input-group-alternative">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
                                            </div>
                                            <input class="form-control" placeholder="Password baru" id="newpassword" type="password">
                                        </div>
                                        <div class="input-group input-group-merge input-group-alternative">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
                                            </div>
                                            <input class="form-control" placeholder="Konfirmasi password baru" id="conpassword" type="password">
                                        </div>
                                    </div>
                                </div>
                                <div class="text-center">
                                    <button type="submit" class="btn btn-primary my-4">Reset Password</button>
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
        $('#reset').submit(function(event) {
            event.preventDefault();
            var email = $('#email').val();
            var resetcode = $('#resetcode').val();
            var newpassword = $('#newpassword').val();
            var conpassword = $('#conpassword').val();

            if (email != '' && resetcode == '') {
                $.ajax({
                    type: "POST",
                    url: "<?= base_url('Password/request') ?>",
                    data: {
                        email: email
                    },
                    success: function(data) {
                        if (data == 'success') {
                            $('#alert').html('<div class="alert alert-success alert-dismissible fade show" role="alert"><span class="alert-text"><strong>Silahkan masukkan kode yang telah kami kirim ke email anda</strong></span><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
                            $('#formreset').show();
                            $('#phint').hide();
                        } else {
                            $('#alert').html('<div class="alert alert-danger alert-dismissible fade show" role="alert"><span class="alert-icon"><i class="fa fa-times"></i></span><span class="alert-text"><strong>Email tidak ditemukan</strong></span><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
                        }
                    }
                });
            } else if (email != '' && resetcode != '') {
                if (newpassword == '' || conpassword == '') {
                    $('#alert').html('<div class="alert alert-warning alert-dismissible fade show" role="alert"><span class="alert-text"><strong>Silahkan isi password baru terlebih dahulu</strong></span><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
                } else if (newpassword != conpassword) {
                    $('#alert').html('<div class="alert alert-warning alert-dismissible fade show" role="alert"><span class="alert-text"><strong>Password harus sama</strong></span><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
                } else {
                    $.ajax({
                        type: "POST",
                        url: "<?= base_url('Password/reset') ?>",
                        data: {
                            email: email,
                            resetcode: resetcode,
                            newpassword: newpassword
                        },
                        success: function(data) {
                            if (data == 'success') {
                                $('#alert').html('<div class="alert alert-success alert-dismissible fade show" role="alert"><span class="alert-text"><strong>Kata sandi berhasil diubah!</strong></span><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
                                setTimeout(function() {
                                    window.location.href = '<?= base_url('Admin') ?>';
                                }, 2000);
                            } else if (data == 'expire') {
                                $('#alert').html('<div class="alert alert-danger alert-dismissible fade show" role="alert"><span class="alert-text"><strong>Kode telah kadaluarsa, silahkan lakukan permintaan setel ulang password lagi</strong></span><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
                            } else {
                                $('#alert').html('<div class="alert alert-danger alert-dismissible fade show" role="alert"><span class="alert-text"><strong>Silahkan lakukan permintaan setel ulang password terlebih dahulu</strong></span><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
                            }
                        }
                    });
                }
            } else {
                $('#alert').html('<div class="alert alert-warning alert-dismissible fade show" role="alert"><span class="alert-text"><strong>Email tidak boleh kosong</strong></span><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            }
        });
    </script>
</body>

</html>