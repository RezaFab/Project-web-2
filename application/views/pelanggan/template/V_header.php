<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title><?= $title ?></title>
  <!-- Favicon -->
  <link rel="icon" href="<?= base_url('assets/img/icon.png') ?>" type="image/png">
  <!-- Fonts -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700">
  <!-- Icons -->
  <link rel="stylesheet" href="<?= base_url('assets/admin/vendor/nucleo/css/nucleo.css') ?>" type="text/css">
  <link rel="stylesheet" href="<?= base_url('assets/admin/vendor/@fortawesome/fontawesome-free/css/all.min.css') ?>" type="text/css">
  <!-- Page plugins -->
  <link rel="stylesheet" href="<?= base_url('assets/admin/vendor/datatables.net-bs4/css/dataTables.bootstrap4.min.css') ?>">
  <link rel="stylesheet" href="<?= base_url('assets/admin/vendor/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css') ?>">
  <link rel="stylesheet" href="<?= base_url('assets/admin/vendor/datatables.net-select-bs4/css/select.bootstrap4.min.css') ?>">

  <!-- Argon CSS -->
  <link rel="stylesheet" href="<?= base_url('assets/admin/css/argon.css?v=1.1.0') ?>" type="text/css">
  <script src="<?= base_url('assets/admin/vendor/jquery/dist/jquery.min.js') ?>"></script>
</head>

<body>
  <!-- Sidenav -->
  <nav class="sidenav navbar navbar-vertical fixed-left navbar-expand-xs navbar-light bg-white" id="sidenav-main">
    <div class="scrollbar-inner">
      <!-- Brand -->
      <div class="sidenav-header d-flex align-items-center">
        <a class="navbar-brand" href="<?= base_url('Order_pelanggan') ?>">
          <img src="<?= base_url('assets/img/logo-kartuidcard-blue.png') ?>" class="navbar-brand-img" alt="...">
        </a>
        <div class="ml-auto">
          <!-- Sidenav toggler -->
          <div class="sidenav-toggler d-none d-xl-block" data-action="sidenav-unpin" data-target="#sidenav-main">
            <div class="sidenav-toggler-inner">
              <i class="sidenav-toggler-line"></i>
              <i class="sidenav-toggler-line"></i>
              <i class="sidenav-toggler-line"></i>
            </div>
          </div>
        </div>
      </div>
      <div class="navbar-inner">
        <!-- Collapse -->
        <div class="collapse navbar-collapse" id="sidenav-collapse-main">
          <!-- Nav items -->
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link" href="<?= base_url('Order_pelanggan') ?>">
                <i class="ni ni-cart text-green"></i>
                <span class="nav-link-text">Order</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="<?= base_url('Order_pelanggan/history') ?>">
                <i class="fa fa-history text-green"></i>
                <span class="nav-link-text">Order History</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="<?= base_url('Product_pelanggan') ?>">
                <i class="ni ni-box-2 text-danger"></i>
                <span class="nav-link-text">Product</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="<?= base_url('Profile') ?>">
                <i class="ni ni-single-02 text-info"></i>
                <span class="nav-link-text">Profile</span>
              </a>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </nav>
  <!-- Main content -->
  <div class="main-content" id="panel">
    <!-- Topnav -->
    <nav class="navbar navbar-top navbar-expand navbar-dark bg-primary border-bottom">
      <div class="container-fluid">
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <!-- Navbar links -->
          <ul class="navbar-nav align-items-center ml-md-auto">
            <li class="nav-item d-xl-none">
              <!-- Sidenav toggler -->
              <div class="pr-3 sidenav-toggler sidenav-toggler-dark" data-action="sidenav-pin" data-target="#sidenav-main">
                <div class="sidenav-toggler-inner">
                  <i class="sidenav-toggler-line"></i>
                  <i class="sidenav-toggler-line"></i>
                  <i class="sidenav-toggler-line"></i>
                </div>
              </div>
            </li>
          </ul>
          <ul class="navbar-nav align-items-center ml-auto ml-md-0">
            <li class="nav-item dropdown show">
              <a class="nav-link" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="ni ni-bell-55"></i><b class="notif_status">0</b>
              </a>
              <div class="dropdown-menu dropdown-menu-xl dropdown-menu-right py-0 overflow-hidden">
                <!-- Dropdown header -->
                <div class="px-3 py-3">
                  <h6 class="text-sm text-muted m-0">Ada <b class="text-primary notif_status">0</b> Notifikasi.</h6>
                </div>
                <!-- List group -->
                <div style="max-height:500px;overflow-y:auto;" id="list-notif" class="list-group list-group-flush">

                </div>
              </div>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link pr-0" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <div class="media align-items-center">
                  <div class="media-body ml-2">
                    <span class="mb-0 text-sm font-weight-bold"><?= $_SESSION['pelanggan_nama'] ?></span>
                    <input type="hidden" id="loggeduser" value="<?= $_SESSION['pelanggan_nama'] ?>">
                  </div>
                </div>
              </a>
              <div class="dropdown-menu dropdown-menu-right">
                <div class="dropdown-header noti-title">
                  <h6 class="text-overflow m-0"><?= $_SESSION['pelanggan_nama'] ?></h6>
                </div>
                <a href="<?= isset($_SESSION['admin_nama']) ? base_url('Admin/logout_admin') : base_url('Admin/logout_pelanggan') ?>" class="dropdown-item">
                  <i class="ni ni-user-run"></i>
                  <span>Logout</span>
                </a>
              </div>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <!-- Header -->