    <!-- Header -->

    <!-- Header -->
    <div class="header bg-primary pb-6">
        <div class="container-fluid">
            <div class="header-body">
            </div>
        </div>
    </div>
    <!-- Page content -->
    <div class="container-fluid mt--6">
        <div class="row">
            <div class="col">
                <div class="card">
                    <!-- Card header -->
                    <div class="card-header border-0">
                        <table style="width: 100%;">
                            <tr>
                                <td style="text-align: left;">
                                    <h3 class="mb-0" id="judul">Admin</h3>
                                </td>
                                <td style="text-align: right;"><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#tambah"><i class="fa fa-plus"></i></button></td>
                            </tr>
                        </table>
                    </div>

                    <!-- Light table -->
                    <div class="table-responsive">
                        <table class="table table-flush" id="datatable-basic">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nohp</th>
                                    <th>Nama</th>
                                    <th>Email</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $n = 1;
                                foreach ($admin as $a) : ?>
                                    <tr>
                                        <td><?= $n++ ?></td>
                                        <td><?= $a['admin_nohp'] ?></td>
                                        <td><?= $a['admin_nama'] ?></td>
                                        <td><?= $a['admin_email'] ?></td>
                                        <td>
                                            <button id="<?= $a['admin_id'] ?>" type="button" class="btn btn-info btn-sm edit" data-toggle="modal" data-target="#edit"><i class="fa fa-pen"></i></button>
                                            <button id="<?= $a['admin_id'] ?>" type="button" class="btn btn-danger btn-sm hapus" data-toggle="modal" data-target="#hapus"><i class="fa fa-times"></i></button>
                                        </td>
                                    </tr>
                                <?php endforeach ?>
                            </tbody>
                        </table>
                    </div>
                    <!-- Card footer -->
                    <div class="card-footer py-4">
                        <nav aria-label="...">
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="tambah" tabindex="-1" role="dialog" aria-labelledby="modal-default" aria-hidden="true">
        <div class="modal-dialog modal- modal-dialog-centered" role="document">
            <form method="post" action="<?= base_url('Administrator/tambah_admin') ?>" style="width: 600px;">
                <div class="modal-content">
                    <div class="modal-header">
                        <h6 class="modal-title" id="modal-title-default">Tambah Admin</h6>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body pb-0">
                        <div class="form-group">
                            <label>No HP</label>
                            <input type="number" name="add_nohp" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Nama</label>
                            <input type="text" name="add_nama" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input type="text" name="add_email" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Kata sandi</label>
                            <input type="password" autocomplete="off" name="add_password" class="form-control" required>
                        </div>
                        <div class="form-group m-0">
                            <label>Perizinan</label>
                            <table id="tblAddAdminPerm" class="table m-0" style="cursor: default;">
                                <tbody>
                                    <tr>
                                        <td class="add_perm_icon">
                                            <i class="ni ni-shop text-primary"></i>
                                        </td>
                                        <td colspan="2">Dashboard</td>
                                        <td class="add_perm_check">
                                            <input type="checkbox" value="1" name="add_perm_dashboard" id="add_perm_dashboard" checked disabled>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="add_perm_icon">
                                            <i class="ni ni-cart text-green"></i>
                                        </td>
                                        <td colspan="2">Order</td>
                                        <td class="add_perm_check">
                                            <input class="add_perm_order" type="checkbox" value="1" name="add_perm_order" id="add_perm_order">
                                        </td>
                                    </tr>

                                    <tr>
                                        <td></td>
                                        <td class="add_perm_icon">
                                            <i class="fa fa-check"></i>
                                        </td>
                                        <td>VERIFIKASI</td>
                                        <td class="add_perm_check">
                                            <input class="add_perm_orders" type="checkbox" value="1" name="add_perm_orderverifikasi" id="add_perm_orderverifikasi">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td class="add_perm_icon">
                                            <i class="fa fa-image"></i>
                                        </td>
                                        <td>KIRIM DESIGN</td>
                                        <td class="add_perm_check">
                                            <input class="add_perm_orders" type="checkbox" value="1" name="add_perm_orderkirimdesign" id="add_perm_orderkirimdesign">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td class="add_perm_icon">
                                            <i class="fa fa-credit-card"></i>
                                        </td>
                                        <td>PEMBAYARAN</td>
                                        <td class="add_perm_check">
                                            <input class="add_perm_orders" type="checkbox" value="1" name="add_perm_orderpembayaran" id="add_perm_orderpembayaran">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td class="add_perm_icon">
                                            <i class="fa fa-check"></i>
                                        </td>
                                        <td>APPROVAL</td>
                                        <td class="add_perm_check">
                                            <input class="add_perm_orders" type="checkbox" value="1" name="add_perm_orderapproval" id="add_perm_orderapproval">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td class="add_perm_icon">
                                            <i class="fa fa-print"></i>
                                        </td>
                                        <td>CETAK PRODUK</td>
                                        <td class="add_perm_check">
                                            <input class="add_perm_orders" type="checkbox" value="1" name="add_perm_ordercetakproduk" id="add_perm_ordercetakproduk">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td class="add_perm_icon">
                                            <i class="fa fa-truck"></i>
                                        </td>
                                        <td>KIRIM / AMBIL</td>
                                        <td class="add_perm_check">
                                            <input class="add_perm_orders" type="checkbox" value="1" name="add_perm_orderkirimambil" id="add_perm_orderkirimambil">
                                        </td>
                                    </tr>

                                    <tr>
                                        <td class="add_perm_icon">
                                            <i class="fa fa-history text-green"></i>
                                        </td>
                                        <td colspan="2">Order History</td>
                                        <td class="add_perm_check">
                                            <input type="checkbox" value="1" name="add_perm_orderhistory" id="add_perm_orderhistory">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="add_perm_icon">
                                            <i class="ni ni-single-copy-04 text-info"></i>
                                        </td>
                                        <td colspan="2">Data</td>
                                        <td class="add_perm_check">
                                            <input class="add_perm_data" type="checkbox" value="1" name="add_perm_data" id="add_perm_data">
                                        </td>
                                    </tr>

                                    <tr>
                                        <td></td>
                                        <td class="add_perm_icon">
                                            <i class="ni ni-single-copy-04 text-info"></i>
                                        </td>
                                        <td>Data Pelanggan</td>
                                        <td class="add_perm_check">
                                            <input class="add_perm_datas" type="checkbox" value="1" name="add_perm_datapelanggan" id="add_perm_datapelanggan">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td class="add_perm_icon">
                                            <i class="ni ni-single-copy-04 text-info"></i>
                                        </td>
                                        <td>Data Produk</td>
                                        <td class="add_perm_check">
                                            <input class="add_perm_datas" type="checkbox" value="1" name="add_perm_dataproduk" id="add_perm_dataproduk">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td class="add_perm_icon">
                                            <i class="ni ni-single-copy-04 text-info"></i>
                                        </td>
                                        <td>Data Penjualan</td>
                                        <td class="add_perm_check">
                                            <input class="add_perm_datas" type="checkbox" value="1" name="add_perm_datapenjualan" id="add_perm_datapenjualan">
                                        </td>
                                    </tr>

                                    <tr>
                                        <td class="add_perm_icon">
                                            <i class="ni ni-bullet-list-67 text-primary"></i>
                                        </td>
                                        <td colspan="2">Category</td>
                                        <td class="add_perm_check">
                                            <input type="checkbox" value="1" name="add_perm_category" id="add_perm_category">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="add_perm_icon">
                                            <i class="ni ni-box-2 text-danger"></i>
                                        </td>
                                        <td colspan="2">Product</td>
                                        <td class="add_perm_check">
                                            <input type="checkbox" value="1" name="add_perm_produk" id="add_perm_produk">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="add_perm_icon">
                                            <i class="ni ni-image text-green"></i>
                                        </td>
                                        <td colspan="2">Template</td>
                                        <td class="add_perm_check">
                                            <input class="add_perm_template" type="checkbox" value="1" name="add_perm_template" id="add_perm_template">
                                        </td>
                                    </tr>

                                    <tr>
                                        <td></td>
                                        <td class="add_perm_icon">
                                            <i class="ni ni-image text-green"></i>
                                        </td>
                                        <td>Template Assets</td>
                                        <td class="add_perm_check">
                                            <input class="add_perm_templates" type="checkbox" value="1" name="add_perm_templateassets" id="add_perm_templateassets">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td class="add_perm_icon">
                                            <i class="ni ni-image text-green"></i>
                                        </td>
                                        <td>Template Pelanggan</td>
                                        <td class="add_perm_check">
                                            <input class="add_perm_templates" type="checkbox" value="1" name="add_perm_templatepelanggan" id="add_perm_templatepelanggan">
                                        </td>
                                    </tr>

                                    <tr>
                                        <td class="add_perm_icon">
                                            <i class="ni ni-image text-info"></i>
                                        </td>
                                        <td colspan="2">Image</td>
                                        <td class="add_perm_check">
                                            <input class="add_perm_image" type="checkbox" value="1" name="add_perm_image" id="add_perm_image">
                                        </td>
                                    </tr>

                                    <tr>
                                        <td></td>
                                        <td class="add_perm_icon">
                                            <i class="ni ni-image text-info"></i>
                                        </td>
                                        <td>Image Assets</td>
                                        <td class="add_perm_check">
                                            <input class="add_perm_images" type="checkbox" value="1" name="add_perm_imageassets" id="add_perm_imageassets">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td class="add_perm_icon">
                                            <i class="ni ni-image text-info"></i>
                                        </td>
                                        <td>Image Pelanggan</td>
                                        <td class="add_perm_check">
                                            <input class="add_perm_images" type="checkbox" value="1" name="add_perm_imagepelanggan" id="add_perm_imagepelanggan">
                                        </td>
                                    </tr>

                                    <tr>
                                        <td class="add_perm_icon">
                                            <i class="ni ni-single-02 text-info"></i>
                                        </td>
                                        <td colspan="2">Pelanggan</td>
                                        <td class="add_perm_check">
                                            <input type="checkbox" value="1" name="add_perm_pelanggan" id="add_perm_pelanggan">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="add_perm_icon">
                                            <i class="ni ni-circle-08 text-orange"></i>
                                        </td>
                                        <td colspan="2">Customer Services</td>
                                        <td class="add_perm_check">
                                            <input type="checkbox" value="1" name="add_perm_customerservices" id="add_perm_customerservices">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="add_perm_icon">
                                            <i class="ni ni-tag text-info"></i>
                                        </td>
                                        <td colspan="2">Status</td>
                                        <td class="add_perm_check">
                                            <input type="checkbox" value="1" name="add_perm_status" id="add_perm_status">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="add_perm_icon">
                                            <i class="ni ni-credit-card text-success"></i>
                                        </td>
                                        <td colspan="2">Bank</td>
                                        <td class="add_perm_check">
                                            <input type="checkbox" value="1" name="add_perm_bank" id="add_perm_bank">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="add_perm_icon">
                                            <i class="ni ni-single-02 text-warning"></i>
                                        </td>
                                        <td colspan="2">Admin</td>
                                        <td class="add_perm_check">
                                            <input type="checkbox" value="1" name="add_perm_admin" id="add_perm_admin">
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Save</button>
                        <button type="button" class="btn btn-link ml-auto" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <style>
        .add_perm_icon {
            width: 1%;
        }

        .add_perm_check {
            width: 20px;
        }
    </style>
    <script>
        $('#tblAddAdminPerm tr').click(function() {
            var inp = $(this).find("input")[0];
            if (!$(inp).is('#perm_dashboard')) {
                inp.checked = !inp.checked;
                if ($(inp).hasClass("add_perm_order")) $(".add_perm_orders").prop("checked", $(".add_perm_order").prop("checked"));
                if ($(inp).hasClass("add_perm_orders"))
                    if ($(".add_perm_orders:checked").length) $(".add_perm_order").prop("checked", true);
                    else $(".add_perm_order").prop("checked", false);
                if ($(inp).hasClass("add_perm_data")) $(".add_perm_datas").prop("checked", $(".add_perm_data").prop("checked"));
                if ($(inp).hasClass("add_perm_datas"))
                    if ($(".add_perm_datas:checked").length) $(".add_perm_data").prop("checked", true);
                    else $(".add_perm_data").prop("checked", false);
                if ($(inp).hasClass("add_perm_template")) $(".add_perm_templates").prop("checked", $(".add_perm_template").prop("checked"));
                if ($(inp).hasClass("add_perm_templates"))
                    if ($(".add_perm_templates:checked").length) $(".add_perm_template").prop("checked", true);
                    else $(".add_perm_template").prop("checked", false);
                if ($(inp).hasClass("add_perm_image")) $(".add_perm_images").prop("checked", $(".add_perm_image").prop("checked"));
                if ($(inp).hasClass("add_perm_images"))
                    if ($(".add_perm_images:checked").length) $(".add_perm_image").prop("checked", true);
                    else $(".add_perm_image").prop("checked", false);
            }
        });
        $('#tblAddAdminPerm input').click(function() {
            this.checked = !this.checked;
        })
    </script>

    </div>

    <div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="modal-default" aria-hidden="true">
        <div class="modal-dialog modal- modal-dialog-centered modal-" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title" id="modal-title-default">Edit Admin</h6>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <form id="form_edit"></form>
            </div>
        </div>
    </div>

    </div>
    <div class="modal fade" id="hapus" tabindex="-1" role="dialog" aria-labelledby="modal-default" aria-hidden="true">
        <div class="modal-dialog modal- modal-dialog-centered modal-" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title" id="modal-title-default">Hapus Admin</h6>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div id="alert_hapus"></div>
                    <h3>Apakah anda yakin?</h3>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-danger btn_hapus">Hapus</button>
                    <button type="button" class="btn btn-link  ml-auto" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    </div>
    <script>
        $(document).ready(function() {
            $('#form_edit').submit(function(e) {
                e.preventDefault()
                var formData = $(this).serialize()

                if (formData['nohp'] !== '' && formData['nama'] !== '' && formData['email'] !== '') {
                    $.ajax({
                        type: "post",
                        url: "<?= base_url('Administrator/update_admin'); ?>",
                        data: formData,
                        success: function(data) {
                            $('#alert_edit').html('<div class="alert alert-success alert-dismissible fade show" role="alert"><span class="alert-icon"><i class="fa fa-check"></i></span><span class="alert-text"><strong>Berhasil!</strong> Data berhasil diperbarui</span><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>')
                            setTimeout(function() {
                                location.reload();
                            }, 2000)
                        }
                    })
                    console.log(formData)
                } else {
                    $('#alert_edit').html('<div class="alert alert-danger alert-dismissible fade show" role="alert"><span class="alert-icon"><i class="fa fa-times"></i></span><span class="alert-text"><strong>Isi semua data</strong> Jangan biarkan data kosong</span><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>')
                }
            })

            $('.hapus').click(function() {
                var id = $(this).attr('id');
                $('.btn_hapus').attr('id', id);
            });
            $('.btn_hapus').click(function() {
                var url = document.URL;
                var id = $(this).attr('id');
                $.ajax({
                    type: "POST",
                    url: "<?= base_url('Administrator/hapus_admin') ?>",
                    data: {
                        id: id
                    },
                    success: function(data) {
                        $('#alert_hapus').html('<div class="alert alert-success alert-dismissible fade show" role="alert"><span class="alert-icon"><i class="fa fa-check"></i></span><span class="alert-text"><strong>Berhasil!</strong> Data dihapus</span><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
                        setTimeout(function() {
                            window.location.href = url;
                        }, 1000);
                    }
                });
            });
            $('.edit').click(function() {
                var id = $(this).attr('id');
                $.ajax({
                    type: "POST",
                    url: "<?= base_url('Administrator/get_data') ?>",
                    data: {
                        id: id
                    },
                    success: function(data) {
                        $('#form_edit').html(data);
                    }
                });
            });
        })
    </script>