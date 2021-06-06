<input type="hidden" value="<?= $this->uri->segment(3) ?>" id="id">
<link rel="stylesheet" href="<?= base_url('assets/admin/vendor/select2/dist/css/select2.min.css') ?>">
<link rel="stylesheet" href="<?= base_url('assets/admin/vendor/quill/dist/quill.core.css') ?>">
<style>
    .wrapper {
        display: inline-flex;
        height: 100px;
        width: 100%;
        align-items: center;
        justify-content: space-evenly;
        border-radius: 5px;
        padding: 20px 0px;
    }

    .wrapper .option {
        background: #fff;
        height: 100%;
        width: 100%;
        display: flex;
        align-items: center;
        justify-content: space-evenly;
        margin: 0 10px;
        border-radius: 5px;
        cursor: pointer;
        padding: 0 10px;
        border: 2px solid lightgrey;
        transition: all 0.3s ease;
    }

    .wrapper .option .dot {
        height: 20px;
        width: 20px;
        background: #d9d9d9;
        border-radius: 50%;
        position: relative;
    }

    .wrapper .option .dot::before {
        position: absolute;
        content: "";
        top: 4px;
        left: 4px;
        width: 12px;
        height: 12px;
        background: #0069d9;
        border-radius: 50%;
        opacity: 0;
        transform: scale(1.5);
        transition: all 0.3s ease;
    }

    .p {
        display: none;
    }

    #option-1:checked:checked~.option-1,
    #option-2:checked:checked~.option-2 {
        border-color: #0069d9;
        background: #0069d9;
    }

    #option-1:checked:checked~.option-1 .dot,
    #option-2:checked:checked~.option-2 .dot {
        background: #fff;
    }

    #option-1:checked:checked~.option-1 .dot::before,
    #option-2:checked:checked~.option-2 .dot::before {
        opacity: 1;
        transform: scale(1);
    }

    .wrapper .option span {
        font-size: 20px;
        color: #808080;
    }

    #option-1:checked:checked~.option-1 span,
    #option-2:checked:checked~.option-2 span {
        color: #fff;
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
        <div class="col-lg-6">
            <div class="card">
                <div class="card-header bg-transparent">
                    <h3 class="mb-0">Timeline</h3>
                </div>
                <div class="card-body">
                    <div class="timeline timeline-one-side" data-timeline-content="axis" data-timeline-axis-style="dashed">
                        <?php
                        $id_transaksi = $this->uri->segment(3);
                        foreach ($status as $s) : ?>
                            <?php
                            $id_status = $s['status_urut'];
                            $st = $this->db->query("SELECT * FROM tbl_status_transaksi WHERE transaksi_order_id = '$id_transaksi' AND transaksi_status_id = '$id_status' ")->row_array();
                            $verif = $this->db->query("SELECT * FROM tbl_verifikasi WHERE transaksi_id = '$id_transaksi';")->row_array();
                            ?>
                            <?php if (!empty($st) && ($st['transaksi_status'] == NULL || $st['transaksi_status'] == '2')) : ?>
                                <div class="timeline-block">
                                    <span style="background-color: blue;color: white;" class="timeline-step badge-success">
                                        <i class="<?= $s['status_icon'] ?>"></i>
                                    </span>
                                    <div class="timeline-content">
                                        <a type="button" class="tablinks" onclick="status(event, 'status<?= $s['status_urut'] ?>')" id="defaultOpen"><b class="font-weight-bold"><?= $s['status_status'] ?></b></a>
                                        <?php
                                        $max = $this->db->query("SELECT MAX(status_id) AS akhir FROM tbl_status")->row_array();
                                        if ($s['status_urut'] != $max['akhir']) :
                                        ?>
                                            <button id-status="<?= $s['status_id'] ?>" class="btn btn-primary btn-sm status" data-toggle="modal" data-target="#status_update"><i class="fa fa-pen"></i></button>
                                        <?php endif; ?>
                                        <p class=" text-sm mt-1 mb-0"><?= $s['status_keterangan'] ?></p>
                                        <?php if ($s['status_jangka_waktu'] != NULL) : ?>
                                            <?php if ($st['transaksi_status'] == '4') : ?>
                                                <b>Sudah Lewat Tanggal</b>
                                            <?php else : ?>
                                                <strong>Batas Kirim</strong>
                                                <b><?= date('d/m/Y H:m', $st['transaksi_tanggal_hangus']) ?></b>
                                            <?php endif; ?>
                                        <?php endif; ?>
                                        <div class="mt-3">
                                            <?php if ($st['transaksi_status'] == '2') : ?>
                                                <span class="badge badge-pill badge-info">Menunggu Konfirmasi</span>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                            <?php elseif (!empty($st) && $st['transaksi_status'] == '1') : ?>
                                <div class="timeline-block">
                                    <span style="background-color: green;color: white;" class="timeline-step badge-success">
                                        <i class="<?= $s['status_icon'] ?>"></i>
                                    </span>
                                    <div class="timeline-content">
                                        <?php
                                        $max = $this->db->query("SELECT MAX(status_id) AS akhir FROM tbl_status")->row_array();
                                        if ($s['status_urut'] == $max['akhir']) :
                                        ?>
                                            <a type="button" class="tablinks" onclick="status(event, 'status<?= $s['status_urut'] ?>')" id="defaultOpen"><b class="font-weight-bold"><?= $s['status_status'] . (!empty($verif['verif_kirimambil']) ? " ($verif[verif_kirimambil])" : "") ?> </b></a>
                                        <?php else : ?>
                                            <?php
                                            $verifikator = "";
                                            switch ($s['status_urut']) {
                                                case "1":
                                                    $verifikator = $verif['verif_pesanan'];
                                                    break;
                                                case "2":
                                                    $verifikator = $verif['verif_desain'];
                                                    break;
                                                case "3":
                                                    $verifikator = $verif['verif_pembayaran'];
                                                    break;
                                                case "4":
                                                    $verifikator = $verif['verif_cetak'];
                                                    break;
                                            }
                                            ?>
                                            <a type="button" class="tablinks" onclick="status(event, 'status<?= $s['status_urut'] ?>')"><b class="font-weight-bold"><?= $s['status_status'] . (!empty($verifikator) ? " ($verifikator)" : "") ?></b></a>
                                        <?php endif; ?>
                                        <p class=" text-sm mt-1 mb-0"><?= $s['status_keterangan'] ?></p>
                                        <div class="mt-3">
                                            <span class="badge badge-pill badge-success">Diterima</span>
                                            <p class="text-sm mt-2">
                                                <?= $st['transaksi_keterangan'] ?>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            <?php elseif (!empty($st) && ($st['transaksi_status'] == '0' || $st['transaksi_status'] == '4')) : ?>
                                <div class="timeline-block">
                                    <span style="background-color: red;color: white;" class="timeline-step badge-success">
                                        <i class="<?= $s['status_icon'] ?>"></i>
                                    </span>
                                    <div class="timeline-content">
                                        <a type="button" class="tablinks" onclick="status(event, 'status<?= $s['status_urut'] ?>')" id="defaultOpen"><b class="font-weight-bold"><?= $s['status_status'] ?></b></a>
                                        <button id-status="<?= $s['status_id'] ?>" class="btn btn-primary btn-sm status" data-toggle="modal" data-target="#status_update"><i class="fa fa-pen"></i></button>
                                        <p class=" text-sm mt-1 mb-0"><?= $s['status_keterangan'] ?></p>
                                        <div class="mt-3">
                                            <?php if ($s['status_jangka_waktu'] != NULL) : ?>
                                                <?php if ($st['transaksi_status'] == '4') : ?>
                                                    <b>Sudah Lewat Tanggal</b>
                                                <?php else : ?>
                                                    <strong>Batas Kirim</strong>
                                                    <b><?= date('d/m/Y H:m', $st['transaksi_tanggal_hangus']) ?></b>
                                                <?php endif; ?>
                                            <?php endif; ?><br>
                                            <span class="badge badge-pill badge-danger">Ditolak</span>
                                            <p class="text-sm mt-2">
                                                <?= $st['transaksi_keterangan'] ?>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            <?php else : ?>
                                <div class="timeline-block">
                                    <span style="background-color: grey;color: white;" class="timeline-step badge-success">
                                        <i class="<?= $s['status_icon'] ?>"></i>
                                    </span>
                                    <div class="timeline-content">
                                        <b class="font-weight-bold"><?= $s['status_status'] ?></b>
                                        <p class=" text-sm mt-1 mb-0"><?= $s['status_keterangan'] ?></p>
                                        <div class="mt-3">
                                            <!-- <span class="badge badge-pill badge-success">Pesanan anda diverifikasi</span> -->
                                        </div>
                                    </div>
                                </div>
                            <?php endif ?>
                        <?php endforeach ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6">

            <div id="status1" class="tabcontent">
                <div class="card">
                    <div class="card-header bg-transparent">
                        <h3 class="mb-0">Pembelian</h3>
                    </div>
                    <div class="card-body">
                        <div class="container-fluid">
                            <h1>Product</h1>
                            <b>Nama Product</b>
                            <p><?= $p['product_nama'] ?></p>
                            <b>Jumlah</b>
                            <p><?= $o['transaksi_jumlah'] ?></p>
                            <b>Keterangan</b>
                            <p><?= $o['transaksi_keterangan'] ?></p>
                            <h1>Customer</h1>
                            <b>Nama</b>
                            <p><?= $o['pelanggan_nama'] ?></p>
                            <b>Whatsapp</b>
                            <p><?= $o['pelanggan_nohp'] ?></p>
                            <b>Email</b>
                            <p><?= $o['pelanggan_email'] ?></p>
                            <b>Alamat</b>
                            <p><?= $o['pelanggan_alamat'] ?></p>
                            <b>No Telephone</b>
                            <p><?= $o['pelanggan_telephone'] ?></p>
                            <b>Kecamatan</b>
                            <p><?= $o['pelanggan_kecamatan'] ?></p>
                            <b>Kabupaten</b>
                            <p><?= $o['pelanggan_kabupaten'] ?></p>
                            <b>KodePost</b>
                            <p><?= $o['pelanggan_kodepost'] ?></p>
                        </div>
                    </div>
                </div>
            </div>
            <div id="status2" class="tabcontent">
                <div class="card">
                    <div class="card-header bg-transparent">
                        <h3 class="mb-0">Design</h3>
                    </div>
                    <div class="card-body">
                        <?php
                        $id = $this->uri->segment(3);
                        $design = $this->db->query("SELECT * FROM tbl_user_design WHERE design_transaksi_id = '$id' ")->result_array();
                        $upload = $this->db->query("SELECT * FROM tbl_design_kirim WHERE design_transaksi_id = '$id' ")->result_array();
                        if (!$design && !$upload) {
                            echo '<h2>Belum ada design yang dikirim</h2>';
                        }
                        if ($design) : ?>
                            <h3>Design Anda</h3>
                            <br>
                            <?php
                            foreach ($design as $d) :
                            ?>
                                <a title="<?= $d['design_id'] ?>" id="modal_lihat" type="button" class="modal_lihat" data-toggle="modal" data-target="#lihat"><img style="width:100%;" src="<?= base_url('design_user/' . $d['design_image']) ?>" alt=""></a>
                                <hr>
                        <?php
                            endforeach;
                        endif;
                        ?>
                        <?php if ($upload) : ?>
                            <h3>Uploaded File & Design</h3>
                            <br>
                            <div class="table-responsive">
                                <table class="table table-flush" id="datatable-basic">
                                    <thead>
                                        <tr>
                                            <th>File Name</th>
                                            <th>Download</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        foreach ($upload as $u) :
                                        ?>
                                            <tr>
                                                <td><?php echo  $u['design_image']; ?></td>
                                                <td><a href="<?= base_url('design_user/' . $u['design_image']) ?>" download>Download</a></td>
                                            </tr>
                                        <?php
                                        endforeach;
                                        ?>
                                    </tbody>
                                </table>
                            <?php
                        endif;
                            ?>
                            </div>
                    </div>
                </div>
            </div>
            <div id="status3" class="tabcontent">
                <div class="card">
                    <div class="card-header bg-transparent">
                        <h3 class="mb-0">Pembayaran</h3>
                    </div>
                    <div class="card-body">
                        <table>
                            <tr>
                                <td>
                                    <b id="view_harga">Rp. <?= number_format($o['transaksi_harga']) ?></b>
                                    <input value="<?= $o['transaksi_harga'] ?>" id="harga" placeholder="Harga" type="number" class="form-control">
                                </td>
                                <td>
                                    <button id="tombol_update" class="btn btn-primary btn-sm">Update</button>
                                    <button id="update_harga" class="btn btn-primary">Save</button>
                                </td>
                                <td><i id="alert"></i></td>
                            </tr>
                        </table>
                        <br>
                        <?php foreach ($bank as $b) : ?>
                            <div class="panel-group" id="accordion">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h4 class="panel-title">
                                            <table>
                                                <tr>
                                                    <td>
                                                        <?php if ($b['bank_id'] == $o['transaksi_bank']) : ?>
                                                            <input checked="" required="" class="r<?= $b['bank_id'] ?>" data-toggle="collapse" data-parent="#accordion" value="<?= $b['bank_id'] ?>" href="#collapse<?= $b['bank_id'] ?>" style="float: left;" type="radio" name="bank">
                                                        <?php else : ?>
                                                            <input required="" class="r<?= $b['bank_id'] ?>" data-toggle="collapse" data-parent="#accordion" value="<?= $b['bank_id'] ?>" href="#collapse<?= $b['bank_id'] ?>" style="float: left;" type="radio" name="bank">
                                                        <?php endif ?>
                                                    </td>
                                                    <td>
                                                        <?php if ($b['bank_nama'] === 'TUNAI') : ?>
                                                            <a class="t<?= $b['bank_id'] ?>" type="button" style="width: 100%;">
                                                                TUNAI
                                                            </a>
                                                        <?php else : ?>
                                                            <a class="t<?= $b['bank_id'] ?>" type="button" style="width: 100%;" data-toggle="collapse" data-parent="#accordion" href="#collapse<?= $b['bank_id'] ?>">
                                                                &nbsp;<img style="width: 60px;" src="<?= base_url('assets/img/bank/' . $b['bank_image']) ?>">
                                                            </a>
                                                        <?php endif; ?>
                                                        <script>
                                                            var checked = $('.r<?= $b['bank_id'] ?>').attr('checked');
                                                            $('#t<?= $b['bank_id'] ?>').click(function() {
                                                                if (typeof checked !== typeof undefined && checked !== false) {
                                                                    $('.r<?= $b['bank_id'] ?>').attr('checked', '');
                                                                } else {
                                                                    $('.r<?= $b['bank_id'] ?>').removeAttr('checked');
                                                                }
                                                            });
                                                        </script>
                                                    </td>
                                                </tr>
                                            </table>
                                        </h4>
                                    </div>
                                    <?php if ($b['bank_nama'] !== 'TUNAI') : ?>
                                        <div id="collapse<?= $b['bank_id'] ?>" class="panel-collapse collapse in">
                                            <div class="panel-body">
                                                <table class="table">
                                                    <tr>
                                                        <th>Atas Nama</th>
                                                        <th>No Rekening</th>
                                                    </tr>
                                                    <tr>
                                                        <td><?= $b['bank_atas_nama'] ?></td>
                                                        <td><?= $b['bank_no_rek'] ?></td>
                                                    </tr>
                                                </table>
                                            </div>
                                        </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                        <?php endforeach ?>
                        <br>
                        <?php if (!empty($o['transaksi_bukti'])) : ?>
                            <a type="button" class="modal_lihat" data-toggle="modal" data-target="#bukti"><img style="width: 100%;" src="<?= base_url('bukti_transaksi/' . $o['transaksi_bukti']) ?>"></a>
                        <?php else : ?>
                            <h2>Belum ada bukti transfer</h2>
                        <?php endif ?>
                    </div>
                </div>
            </div>

            <div id="status4" class="tabcontent">
                <div class="card">
                    <div class="card-header bg-transparent">
                        <h3 class="mb-0">Cetak Produk</h3>
                    </div>
                    <div class="card-body">
                        <?php
                        $ctk = $this->db->query("SELECT * FROM tbl_status_transaksi WHERE transaksi_status_id = '4' AND transaksi_order_id = '$id_transaksi' ")->row_array();
                        if ($ctk['transaksi_status'] == '1') :
                        ?>
                            <div style="display: flex;justify-content: center;">
                                <img style="width:50%;margin: auto;" src="<?= base_url('assets/img/gifcheck.gif') ?>" alt="">
                            </div>
                            <br>
                            <br>
                            <h2>Sudah Selesai</h2>
                        <?php else : ?>
                            <img style="width:100%;" src="<?= base_url('assets/img/print.gif') ?>" alt="">
                            <br>
                            <br>
                            <h2>Sedang Menyetak Produk</h2>
                        <?php endif; ?>

                    </div>
                </div>
            </div>

            <div id="status5" class="tabcontent">

                <div class="card">

                    <div class="card-header bg-transparent">
                        <h3 class="mb-0">Konfirmasi Pesanan</h3>
                    </div>

                    <div id="terima_p" class="card-body">

                        <?php if ($o['transaksi_terima'] == NULL) : ?>
                            <div class="wrapper">
                                <?php if ($o['transaksi_paket'] == '1') : ?>
                                    <input class="p" type="radio" value="1" name="paket" id="option-1" checked>
                                <?php else : ?>
                                    <input class="p" type="radio" value="1" name="paket" id="option-1">
                                <?php endif; ?>
                                <?php if ($o['transaksi_paket'] == '2') : ?>
                                    <input class="p" type="radio" value="2" name="paket" id="option-2" checked>
                                <?php else : ?>
                                    <input class="p" type="radio" value="2" name="paket" id="option-2">
                                <?php endif; ?>
                                <label for="option-1" class="option option-1">
                                    <div class="dot"></div>
                                    <span>Kirim Product</span>
                                </label>
                                <label for="option-2" class="option option-2">
                                    <div class="dot"></div>
                                    <span>Ambil Sendiri</span>
                                </label>
                            </div>

                            <br>
                            <br>

                            <div id="paket_terima">
                                <!-- <button style="width:100%;display:none;" class="btn btn-primary terima">Paket Sudah Diterima ?</button> -->
                                <?php
                                if ($o['transaksi_paket'] != NULL) :
                                ?>
                                    <table>
                                        <tr>
                                            <td>Alamat</td>
                                            <td> : </td>
                                            <td><?= $o['pelanggan_alamat'] ?></td>
                                        </tr>
                                        <tr>
                                            <td>Kecamatan</td>
                                            <td> : </td>
                                            <td><?= $o['pelanggan_kecamatan'] ?></td>
                                        </tr>
                                        <tr>
                                            <td>Kabupaten</td>
                                            <td> : </td>
                                            <td><?= $o['pelanggan_kabupaten'] ?></td>
                                        </tr>
                                        <tr>
                                            <td>Kode Post</td>
                                            <td> : </td>
                                            <td><?= $o['pelanggan_kodepost'] ?></td>
                                        </tr>
                                    </table>

                                    <br>

                                    <?php
                                    $resi = $this->db->query("SELECT transaksi_resi FROM tbl_transaksi WHERE transaksi_id='$id';")->row_array();
                                    ?>

                                    <?php if ($o['transaksi_paket'] == '1') : ?>
                                        <h3>Nomor Resi</h3>
                                        <div class="form-group row">
                                            <div class="col-sm-8 pr-1">
                                                <input type="text" class="form-control" id="resi" placeholder="Nomor Resi" value="<?= $resi['transaksi_resi']; ?>">
                                            </div>
                                            <div class="col-sm-4 pl-1">
                                                <button type="submit" class="btn btn-primary mb-2 w-100" id="updateResi">Update</button>
                                            </div>
                                        </div>

                                    <?php endif; ?>

                                    <h3>Ongkir</h3>
                                    <div class="form-group row">
                                        <div class="col-sm-8 pr-1">
                                            <input type="number" name="ongkir" id="ongkir" placeholder="Masukkan ongkir">
                                        </div>
                                        <div class="col-sm-4 pl-1">
                                            <button type="submit" class="btn btn-primary mb-2 w-100" id="updateOngkir">Update</button>
                                        </div>
                                    </div>

                                    <br>

                                    <button style="width:100%;" class="btn btn-primary terima">Paket Sudah Diterima ?</button>
                                <?php
                                endif;
                                ?>
                            </div>

                        <?php else : ?>

                            <div class="wrapper">
                                <?php if ($o['transaksi_paket'] == "1") { ?>
                                    <h2>Kirim Paket</h2>
                                <?php } else { ?>
                                    <h2>Ambil Sendiri</h2>
                                <?php } ?>
                                <h2>Paket Sudah diterima</h2>
                            </div>

                        <?php endif; ?>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
</div>


<div class="modal fade" id="lihat" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Detail Design</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div id="alert_design"></div>
                <div id="data_design"></div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>


<div class="modal fade" id="status_update" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Status</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div id="alert_status"></div>
            <div id="data_status"></div>
        </div>
    </div>
</div>

<div class="modal fade" id="bukti" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Bukti Pembayaran</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <img style="width: 100%;" src="<?= base_url('bukti_transaksi/' . $o['transaksi_bukti']) ?>">
            </div>
            <div class="modal-footer">
                <a href="<?= base_url('bukti_transaksi/' . $o['transaksi_bukti']) ?>" class="btn btn-primary"><i class="fa fa-download"></i> Download</a>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="design" tabindex="-1" role="dialog" aria-labelledby="modal-default" aria-hidden="true">
    <div class="modal-dialog modal- modal-dialog-centered modal-" role="document">
        <div class="modal-content">

            <div class="modal-header">
                <h6 class="modal-title" id="modal-title-default">Design</h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <div id="alert_hapus"></div>
                <h3>Ukuran :</h3>
                <h3 id="info_design"></h3>
            </div>

            <div class="modal-footer">
                <button type="submit" class="btn btn-danger btn_hapus">hapus</button>
                <a class="btn btn-info btn_download" download><i class="fa fa-download"></i> Download</a>
                <button type="button" class="btn btn-link  ml-auto" data-dismiss="modal">Close</button>
            </div>

        </div>
    </div>
</div>

</div>
<div class="modal fade" id="hapus" tabindex="-1" role="dialog" aria-labelledby="modal-default" aria-hidden="true">
    <div class="modal-dialog modal- modal-dialog-centered modal-" role="document">
        <div class="modal-content">

            <div class="modal-header">
                <h6 class="modal-title" id="modal-title-default">Hapus Pelanggan</h6>
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
<script src="<?= base_url('assets/admin/vendor/dropzone/dist/min/dropzone.min.js') ?>"></script>

<script>
    $('#harga').css('display', 'none');
    $('#update_harga').css('display', 'none');
    $('#tombol_update').click(function() {
        $('#harga').css('display', 'block');
        $('#view_harga').css('display', 'none');
        $('#tombol_update').css('display', 'none');
        $('#update_harga').css('display', 'block');
    });
    $('#update_harga').click(function() {
        var id = $('#id').val();
        var harga = $('#harga').val();
        $('#alert').attr('class', '');
        $.ajax({
            url: "<?= base_url('Order/update_order') ?>",
            type: "POST",
            data: {
                id: id,
                harga: harga
            },
            success: function(data) {
                $('#alert').attr('class', 'fa fa-check fa-2x');
            }
        });
    });
    $('.status').click(function() {
        var id = $('#id').val();
        var id_status = $(this).attr('id-status');
        $.ajax({
            type: 'POST',
            url: '<?= base_url('Order/get_status') ?>',
            data: {
                id: id,
                id_status: id_status
            },
            success: function(data) {
                $('#data_status').html(data);
            }
        });
    });
    $(document).on('click', '#update-status', function() {
        var url = document.URL;
        var id = $('#id').val();
        var id_status = $('#id_status').val();
        var keputusan = $('#keputusan').val();
        var keterangan = $('#keterangan').val();
        var loggeduser = $('#loggeduser').val();
        if (keputusan !== '') {
            if (keputusan == '0' && keterangan == '') {
                $('#alert_status').html('<div class="alert alert-danger alert-dismissible fade show" style="border-radius:0px;" role="alert"><span class="alert-icon"><i class="fa fa-times"></i></span><span class="alert-text"><strong>Harus Ada Keterangan</strong></span></div>');
            } else {
                $('#alert_status').html('<div class="alert alert-info alert-dismissible fade show" style="border-radius:0px;" role="alert"><span class="alert-icon"></span><span class="alert-text"><strong>Loading...</strong></span></div>');
                $.ajax({
                    type: 'POST',
                    url: '<?= base_url('Order/status') ?>',
                    data: {
                        id: id,
                        id_status: id_status,
                        keputusan: keputusan,
                        keterangan: keterangan,
                        user: loggeduser
                    },
                    success: function(data) {
                        $('#alert_status').html('<div class="alert alert-success alert-dismissible fade show" style="border-radius:0px;" role="alert"><span class="alert-icon"><i class="fa fa-check"></i></span><span class="alert-text"><strong>Berhasil!</strong></span></div>');
                        setTimeout(function() {
                            window.location.href = url;
                        }, 1000);
                    }
                });
            }
        } else {
            $('#alert_status').html('<div class="alert alert-danger alert-dismissible fade show" style="border-radius:0px;" role="alert"><span class="alert-icon"><i class="fa fa-times"></i></span><span class="alert-text"><strong>Keputusan Tidak Boleh Kosong</strong></span></div>');
        }
    });
    $('.modal_lihat').click(function() {
        var id = $(this).attr('title');
        $('#data_design').attr('id-design', id);
        $.ajax({
            url: "<?= base_url('Order/get_data_design') ?>",
            type: "POST",
            data: {
                id: id
            },
            success: function(data) {
                $('#data_design').html(data);
            }
        });
    });
    $(document).on('click', '#hapus_design', function() {
        var url = document.URL;
        var id = $('#data_design').attr('id-design');
        $.ajax({
            type: 'POST',
            url: '<?= base_url('Order/hapus_design') ?>',
            data: {
                id: id
            },
            success: function(data) {
                $('#alert_design').html('<div class="alert alert-success alert-dismissible fade show" role="alert"><span class="alert-icon"><i class="fa fa-check"></i></span><span class="alert-text"><strong>Berhasil!</strong> Data dihapus</span><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
                setTimeout(function() {
                    window.location.href = url;
                }, 1000);
            }
        });
    });
    $(document).on('click', '.design', function() {
        var id = $(this).attr('id');
        var d = $(this).attr('design-kirim');
        $.ajax({
            type: 'POST',
            url: '<?= base_url('Order/info_design') ?>',
            data: {
                d: d
            },
            success: function(data) {
                $('#info_design').html(data);
            }
        })
        $('.btn_hapus').attr('id', id);
        $('.btn_download').attr('href', d);
    });
    $(document).on('click', '.btn_hapus', function() {
        var url = document.URL;
        var id = $(this).attr('id');
        $.ajax({
            type: "POST",
            url: "<?= base_url('Order/hapus_design_upload') ?>",
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
</script>
<script>
    function status(evt, status) {
        var i, tabcontent;
        tabcontent = $(".tabcontent").css('display', 'none');
        tablinks = $(".tablinks");
        $('#' + status).css('display', 'block');
    }

    // Get the element with id="defaultOpen" and click on it
    $("#defaultOpen").click();
</script>
<script>
    $('input[type=radio][name=paket]').on('click', function() {
        return confirm('Apakah anda yakin ingin mengubahnya?');
    });
    $('input[type=radio][name=paket]').change(function() {
        var id = $('#id').val();
        var val = $(this).val();
        $.ajax({
            type: 'POST',
            url: '<?= base_url('Order/paket') ?>',
            data: {
                id: id,
                val: val
            },
            success: function(data) {
                $('.terima').css('display', 'block');
                location.reload();
            }
        })
    });
</script>
<script>
    $('.terima').click(function() {
        if (confirm('Apakah anda yakin paket sudah diterima?')) {
            var val = 1;
            var id = $('#id').val();
            var user = $('#loggeduser').val();
            $.ajax({
                type: 'POST',
                url: "<?= base_url('Order/terima') ?>",
                data: {
                    val: val,
                    id: id,
                    user: user
                },
                success: function(data) {
                    $('#terima_p').html(data);
                    location.reload();
                }
            });
        }
    });
</script>
<script>
    $('#updateResi').click(function(e) {
        e.preventDefault();

        // if (confirm('Apakah anda yakin ingin merubah nomor resi?')) {
        var id = $('#id').val();
        var resi = $('#resi').val();

        $.ajax({
            type: 'POST',
            url: "<?= base_url('Order/updateResi') ?>",
            data: {
                id: id,
                resi: resi
            },
            success: function(data) {
                alert('Nomor resi berhasil diubah');
            }
        });
        // }
    });
    $('#updateOngkir').click(function(e) {
        e.preventDefault();

        var id = $('#id').val();
        var ongkir = $('#ongkir').val();

        $.ajax({
            type: 'POST',
            url: "<?= base_url('Order/updateOngkir') ?>",
            data: {
                id: id,
                ongkir: ongkir
            },
            success: function(data) {
                alert('Ongkir berhasil diubah');
            }
        });
    });
</script>