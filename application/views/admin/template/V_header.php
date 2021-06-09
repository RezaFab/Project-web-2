<?php
$kd = $this->db->query("SELECT count(t.transaksi_id) AS kd FROM tbl_transaksi AS t JOIN tbl_status_transaksi AS s ON t.transaksi_id = s.transaksi_order_id WHERE s.transaksi_status_id = '2' AND (s.transaksi_status = '2' OR s.transaksi_status IS NULL OR s.transaksi_status = '0')  AND t.transaksi_terima IS NULL ")->row_array();
$pmb = $this->db->query("SELECT count(t.transaksi_id) AS pmb FROM tbl_transaksi AS t JOIN tbl_status_transaksi AS s ON t.transaksi_id = s.transaksi_order_id WHERE s.transaksi_status_id = '3' AND (s.transaksi_status = '2' OR s.transaksi_status IS NULL OR s.transaksi_status = '0')  AND t.transaksi_terima IS NULL ")->row_array();
$ctk = $this->db->query("SELECT count(t.transaksi_id) AS ctk FROM tbl_transaksi AS t JOIN tbl_status_transaksi AS s ON t.transaksi_id = s.transaksi_order_id WHERE s.transaksi_status_id = '4' AND (s.transaksi_status = '2' OR s.transaksi_status IS NULL OR s.transaksi_status = '0')  AND t.transaksi_terima IS NULL ")->row_array();
$k_a = $this->db->query("SELECT count(t.transaksi_id) AS k_a FROM tbl_transaksi AS t JOIN tbl_status_transaksi AS s ON t.transaksi_id = s.transaksi_order_id WHERE s.transaksi_status_id = '5' AND (s.transaksi_status = '2' OR s.transaksi_status IS NULL OR s.transaksi_status = '0')  AND t.transaksi_terima IS NULL ")->row_array();
$h = $this->db->query("SELECT count(transaksi_id) AS h FROM tbl_transaksi WHERE transaksi_terima = '1' ")->row_array();
?>
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
                <a class="navbar-brand" href="<?= base_url('Dashboard') ?>">
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
                            <a class="nav-link" href="<?= base_url('Dashboard') ?>">
                                <i class="ni ni-shop text-primary"></i>
                                <span class="nav-link-text">Dashboard</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="#navbar-order" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="navbar-order">
                                <i class="ni ni-cart text-green"></i>
                                <span class="nav-link-text">Order <span class="badge badge-pill badge-danger to">0</span></span>
                            </a>
                            <?php if ($this->uri->segment(1) == 'Dashboard') : ?>
                                <div class="collapse" id="navbar-order">
                                <?php else : ?>
                                    <div class="collapse show" id="navbar-order">
                                    <?php endif; ?>
                                    <ul class="nav nav-sm flex-column">
                                        <li class="nav-item">
                                            <a href="<?= base_url('Order/verifikasi') ?>" class="nav-link"><i class="fa fa-check"></i>
                                                <table style="width:100%;">
                                                    <tr>
                                                        <td>VERIFIKASI</td>
                                                        <td style="text-align:right;"><span class="badge badge-pill badge-danger c_v">0</span></td>
                                                    </tr>
                                                </table>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="<?= base_url('Order/kirim_design') ?>" class="nav-link"><i class="fa fa-image"></i>
                                                <table style="width:100%;">
                                                    <tr>
                                                        <td>KIRIM DESIGN</td>
                                                        <td style="text-align:right;"><span class="badge badge-pill badge-danger"><?= $kd['kd'] ?></span></td>
                                                    </tr>
                                                </table>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="<?= base_url('Order/pembayaran') ?>" class="nav-link"><i class="fa fa-credit-card"></i>
                                                <table style="width:100%;">
                                                    <tr>
                                                        <td>PEMBAYARAN</td>
                                                        <td style="text-align:right;"><span class="badge badge-pill badge-danger"><?= $pmb['pmb'] ?></span></td>
                                                    </tr>
                                                </table>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="<?= base_url('Order/cetak_produk') ?>" class="nav-link"><i class="fa fa-print"></i>
                                                <table style="width:100%;">
                                                    <tr>
                                                        <td>CETAK PRODUK</td>
                                                        <td style="text-align:right;"><span class="badge badge-pill badge-danger"><?= $ctk['ctk'] ?></span></td>
                                                    </tr>
                                                </table>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="<?= base_url('Order/kirim_ambil') ?>" class="nav-link"><i class="fa fa-truck"></i>
                                                <table style="width:100%;">
                                                    <tr>
                                                        <td>KIRIM / AMBIL</td>
                                                        <td style="text-align:right;"><span class="badge badge-pill badge-danger"><?= $k_a['k_a'] ?></span></td>
                                                    </tr>
                                                </table>
                                            </a>
                                        </li>
                                    </ul>
                                    </div>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?= base_url('Order/history') ?>">
                                <i class="fa fa-history text-green"></i>
                                <span class="nav-link-text">Order History</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#navbar-data" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="navbar-data">
                                <i class="ni ni-single-copy-04 text-info"></i>
                                <span class="nav-link-text">Data</span>
                            </a>
                            <div class="collapse" id="navbar-data">
                                <ul class="nav nav-sm flex-column">
                                    <li class="nav-item">
                                        <a href="<?= base_url('Data/pelanggan') ?>" class="nav-link">Data Pelanggan</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="<?= base_url('Data/produk') ?>" class="nav-link">Data Produk</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="<?= base_url('Data/penjualan') ?>" class="nav-link">Data Penjualan</a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?= base_url('Category') ?>">
                                <i class="ni ni-bullet-list-67 text-primary"></i>
                                <span class="nav-link-text">Category</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?= base_url('Product') ?>">
                                <i class="ni ni-box-2 text-danger"></i>
                                <span class="nav-link-text">Product</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#navbar-template" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="navbar-template">
                                <i class="ni ni-image text-green"></i>
                                <span class="nav-link-text">Template</span>
                            </a>
                            <div class="collapse" id="navbar-template">
                                <ul class="nav nav-sm flex-column">
                                    <li class="nav-item">
                                        <a href="<?= base_url('Daftar_design/design_assets') ?>" class="nav-link">Template Assets</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="<?= base_url('Daftar_design/design_user') ?>" class="nav-link">Template Pelanggan</a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#navbar-image" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="navbar-image">
                                <i class="ni ni-image text-info"></i>
                                <span class="nav-link-text">Image</span>
                            </a>
                            <div class="collapse" id="navbar-image">
                                <ul class="nav nav-sm flex-column">
                                    <li class="nav-item">
                                        <a href="<?= base_url('Image/image_assets') ?>" class="nav-link">Image Assets</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="<?= base_url('Image/image_user') ?>" class="nav-link">Image Pelanggan</a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?= base_url('Pelanggan') ?>">
                                <i class="ni ni-single-02 text-info"></i>
                                <span class="nav-link-text">Pelanggan</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?= base_url('Customer_services') ?>">
                                <i class="ni ni-circle-08 text-orange"></i>
                                <span class="nav-link-text">Customer Services</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?= base_url('Status') ?>">
                                <i class="ni ni-tag text-info"></i>
                                <span class="nav-link-text">Status</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?= base_url('Bank') ?>">
                                <i class="ni ni-credit-card text-success"></i>
                                <span class="nav-link-text">Bank</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?= base_url('Administrator') ?>">
                                <i class="ni ni-single-02 text-warning"></i>
                                <span class="nav-link-text">Admin</span>
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
                        <li class="nav-item dropdown">
                            <a id="s-n" class="nav-link" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
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
                                        <span class="mb-0 text-sm  font-weight-bold"><?= $_SESSION['admin_nama'] ?></span>
                                        <input type="hidden" id="loggeduser" value="<?= $_SESSION['admin_nama'] ?>">
                                    </div>
                                </div>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right">
                                <div class="dropdown-header noti-title">
                                    <h6 class="text-overflow m-0"><?= $_SESSION['admin_nama'] ?></h6>
                                </div>
                                <a href="<?= base_url('Admin/logout_admin') ?>" class="dropdown-item">
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