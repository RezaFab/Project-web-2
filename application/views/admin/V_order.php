<style type="text/css">
    /* Style the tab */
    .tab {
        overflow: hidden;
        border: 1px solid #ccc;
        background-color: #f1f1f1;
    }

    /* Style the buttons inside the tab */
    .tab button {
        background-color: inherit;
        float: left;
        border: none;
        outline: none;
        cursor: pointer;
        padding: 14px 16px;
        transition: 0.3s;
        font-size: 17px;
    }

    /* Change background color of buttons on hover */
    .tab button:hover {
        background-color: #ddd;
    }

    /* Create an active/current tablink class */
    .tab button.active {
        background-color: #ccc;
    }

    /* Style the tab content */
    .tabcontent {
        display: none;
        padding: 6px 12px;
        border: 1px solid #ccc;
        border-top: none;
    }
</style>
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
                    <td>
                        <h3 class="mb-0" style="text-align:left;" id="judul"><?= $title ?></h3>
                    </td>
                </div>


                <!-- Light table -->
                <div class="table-responsive">
                    <table class="table table-flush" id="datatable-basic">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>No Hp</th>
                                <th>Nama</th>
                                <th>Tanggal</th>
                                <th>Jumlah</th>
                                <th>Status</th>
                                <th>Action</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $n = 1;
                            foreach ($order as $o) : ?>
                                <?php if ($o['transaksi_status'] == '0') : ?>
                                    <tr style="background-color:#f7d7d7;">
                                    <?php else : ?>
                                    <tr>
                                    <?php endif; ?>
                                    <td><?= $n++ ?></td>
                                    <td><?= $o['transaksi_nohp'] ?></td>
                                    <td><?= $o['pelanggan_nama'] ?></td>
                                    <td><?= $o['transaksi_tanggal'] ?></td>
                                    <td><?= $o['transaksi_jumlah'] ?></td>
                                    <td><?php
                                        if ($o['transaksi_status'] == '0') {
                                            echo 'Ditolak';
                                        } elseif ($o['transaksi_status'] == '2') {
                                            echo 'Menunggu Konfirmasi';
                                        } elseif ($o['transaksi_paket'] == '0') {
                                            echo 'Ambil Sendiri';
                                        } elseif ($o['transaksi_paket'] == '1') {
                                            echo 'Kirim Paket';
                                        }
                                        ?></td>
                                    <td>
                                        <button id="<?= $o['transaksi_id'] ?>" type="button" class="btn btn-info btn-sm update_status" data-toggle="modal" data-target="#update"><i class="fa fa-pen"></i></button>
                                        <a href="<?= base_url('Order/detail/' . $o['transaksi_id']) ?>" class="btn btn-primary btn-sm"><i class="fa fa-box"></i></a>
                                    </td>
                                    <td>
                                        <button id="<?= $o['transaksi_id'] ?>" type="button" class="btn btn-danger btn-sm hapus" data-toggle="modal" data-target="#hapus"><i class="fa fa-times"></i></button>
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
<div class="modal fade" id="update" tabindex="-1" role="dialog" aria-labelledby="modal-default" aria-hidden="true">
    <div class="modal-dialog modal- modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">

            <div class="modal-header">
                <h6 class="modal-title" id="modal-title-default">Detail Order</h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div id="update_order"></div>
        </div>
    </div>
</div>

</div>
<div class="modal fade" id="hapus" tabindex="-1" role="dialog" aria-labelledby="modal-default" aria-hidden="true">
    <div class="modal-dialog modal- modal-dialog-centered modal-" role="document">
        <div class="modal-content">

            <div class="modal-header">
                <h6 class="modal-title" id="modal-title-default">Hapus order</h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <div id="alert_hapus"></div>
                <h3>Apakah anda yakin?</h3>
            </div>

            <div class="modal-footer">
                <button type="submit" class="btn btn-danger btn_hapus">hapus</button>
                <button type="button" class="btn btn-link  ml-auto" data-dismiss="modal">Close</button>
            </div>

        </div>
    </div>
</div>

</div>
<script>
    $('.update_status').click(function() {
        var id = $(this).attr('id');
        $.ajax({
            type: "POST",
            url: "<?= base_url('order/get_data') ?>",
            data: {
                id: id
            },
            success: function(data) {
                $('#update_order').html(data);
            }
        });
    });

    $(document).on('click', '#update_button', function() {
        var id = $(this).attr('name');
        var harga = $('#harga').val();
        var status = $('#status').val();
        var url = document.URL;
        if (status != '') {
            $.ajax({
                type: "POST",
                url: "<?= base_url('Order/update_order') ?>",
                data: {
                    id: id,
                    status: status,
                    harga: harga
                },
                success: function(data) {
                    $('#alert_update').html('<div class="alert alert-success alert-dismissible fade show" role="alert"><span class="alert-icon"><i class="fa fa-check"></i></span><span class="alert-text"><strong>Berhasil!</strong> Data terupdate</span><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
                    setTimeout(function() {
                        window.location.href = url;
                    }, 1000);
                }
            });
        }
    });

    $(document).on('click', '.hapus', function() {
        var id = $(this).attr('id');
        $('.btn_hapus').attr('id', id);
    });
    $(document).on('click', '.btn_hapus', function() {
        var url = document.URL;
        var id = $(this).attr('id');
        $.ajax({
            type: "POST",
            url: "<?= base_url('Order/hapus_order') ?>",
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
    $(document).on('click', '.btl_trans', function() {
        var id = $(this).attr('id');
        var url = document.URL;
        $.ajax({
            type: "POST",
            url: "<?= base_url('Order/batal_trans') ?>",
            data: {
                id: id
            },
            success: function(data) {
                $('#alert_update').html('<div class="alert alert-success alert-dismissible fade show" role="alert"><span class="alert-icon"><i class="fa fa-check"></i></span><span class="alert-text"><strong>Berhasil!</strong> Data Dibatalkan</span><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
                setTimeout(function() {
                    window.location.href = url;
                }, 1000);
            }
        });
    });
</script>

<script>
    function openTabs(evt, tabname) {
        var i, tabcontent, tablinks;
        tabcontent = document.getElementsByClassName("tabcontent");
        for (i = 0; i < tabcontent.length; i++) {
            tabcontent[i].style.display = "none";
        }
        tablinks = document.getElementsByClassName("tablinks");
        for (i = 0; i < tablinks.length; i++) {
            tablinks[i].className = tablinks[i].className.replace(" active", "");
        }
        document.getElementById(tabname).style.display = "block";
        evt.currentTarget.className += " active";
    }
</script>