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

    .grid-container {
        display: inline-grid;
        grid-template-columns: auto auto;
        background-color: #FFFFFF;
        width: 100%;
    }

    .grid-item {
        width: 100%;
        background-color: #FFFFFF;
        border: 0px solid rgba(202, 0, 0, 0.8);
        padding: 20px;
        font-size: 15px;
    }

    .item1 {
        width: 100%;
        grid-column: 2;
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

    .btnreviewcenter {
        text-align: center;
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
                        $ctk = $this->db->query("SELECT * FROM tbl_status_transaksi WHERE transaksi_status_id = '5' AND transaksi_order_id = '$id_transaksi' ORDER BY transaksi_id DESC ")->row_array();
                        $statusproduksi = @$ctk['transaksi_produksi_status_id'];

                        foreach ($status as $s) : ?>
                            <?php
                            $id_status = $s['status_urut'];
                            $st = $this->db->query("SELECT * FROM tbl_status_transaksi WHERE transaksi_order_id = '$id_transaksi' AND transaksi_status_id = '$id_status' ORDER BY transaksi_id DESC ")->row_array();
                            $verif = $this->db->query("SELECT * FROM tbl_verifikasi WHERE transaksi_id = '$id_transaksi';")->row_array();
                            ?>
                            <?php if (!empty($st) && ($st['transaksi_status'] == NULL || $st['transaksi_status'] == '2')) : ?>
                                <div class="timeline-block">
                                    <span style="background-color: blue;color: white;" class="timeline-step badge-success">
                                        <i class="<?= $s['status_icon'] ?>"></i>
                                    </span>
                                    <div class="timeline-content">
                                        <a type="button" class="tablinks" onclick="status(event, 'status<?= $s['status_urut'] ?>')" id="defaultOpen"><b class="font-weight-bold"><?= $s['status_status'] ?></b></a>
                                        <p class=" text-sm mt-1 mb-0"><?= $s['status_keterangan'] ?></p>
                                        <?php if ($s['status_jangka_waktu'] != NULL) : ?>
                                            <?php if ($st['transaksi_status'] == '4') : ?>
                                                <b>Sudah Lewat Tanggal</b>
                                            <?php else : ?>
                                                <strong>Kirim sebelum</strong>
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
                                        $max = $this->db->query("SELECT MAX(transaksi_status_id) AS akhir FROM tbl_status_transaksi WHERE transaksi_order_id = '$id_transaksi'  ")->row_array();
                                        if ($s['status_urut'] == $max['akhir']) :
                                        ?>
                                            <a type="button" class="tablinks" onclick="status(event, 'status<?= $s['status_urut'] ?>')" id="defaultOpen"><b class="font-weight-bold"><?= $s['status_status'] . (!empty($verif['verif_kirimambil']) ? " ($verif[verif_kirimambil])" : "") ?></b></a>
                                        <?php else : ?>
                                            <?php
                                            $verifikator = "";
                                            switch ($s['status_urut']) {
                                                case "1":
                                                    $verifikator = (!empty($verif['verif_pesanan']) ? $verif['verif_pesanan'] : "-");
                                                    break;
                                                case "2":
                                                    $verifikator = (!empty($verif['verif_desain']) ? $verif['verif_desain'] : "-");
                                                    break;
                                                case "3":
                                                    $verifikator = (!empty($verif['verif_pembayaran']) ? $verif['verif_pembayaran'] : "-");
                                                    break;
                                                case "4":
                                                    $verifikator = (!empty($verif['verif_approval']) ? $verif['verif_approval'] : "-");
                                                    break;
                                                case "5":
                                                    $verifikator = (!empty($verif['verif_cetak']) ? $verif['verif_cetak'] : "-");
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
                                        <p class=" text-sm mt-1 mb-0"><?= $s['status_keterangan'] ?></p>
                                        <?php if ($s['status_jangka_waktu'] != NULL) : ?>
                                            <?php if ($st['transaksi_status'] == '4') : ?>
                                                <b>Sudah lewat tanggal</b>
                                            <?php else : ?>
                                                <strong>Kirim sebelum</strong>
                                                <b><?= date('d/m/Y H:m', $st['transaksi_tanggal_hangus']) ?></b>
                                            <?php endif; ?>
                                        <?php endif; ?>
                                        <div class="mt-3">
                                            <span class="badge badge-pill badge-danger">Ditolak</span>
                                            <p class="text-sm mt-2">
                                                <?= $st['transaksi_keterangan'] ?>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            <?php else : ?>
                                <div class="timeline-block">
                                    <span style="background-color: grey; color: white;" class="timeline-step badge-success">
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
        <?php if ($o['transaksi_terima'] == '0') : ?>
            <div style="display:none;" class="col-lg-6">
            <?php else : ?>
                <div class="col-lg-6">
                <?php endif; ?>
                <div id="status1" class="tabcontent">
                    <div class="card">
                        <div class="card-header bg-transparent">
                            <h3 class="mb-0">Product</h3>
                        </div>
                        <div class="card-body">
                            <div class="container-fluid">
                                <b>Nama</b>
                                <p><?= $p['product_nama'] ?></p>
                                <b>Deskripsi</b>
                                <p><?= $p['product_deskripsi'] ?></p>
                                <b>Keunggulan</b>
                                <p><?= $p['product_keunggulan'] ?></p>
                                <b>Keterangan</b>
                                <p><?= $p['product_keterangan'] ?></p>
                                <b>Jumlah</b>
                                <p><?= $o['transaksi_jumlah'] ?></p>
                                <b>Keterangan</b>
                                <p><?= $o['transaksi_keterangan'] ?></p>
                                <div class="grid-container">
                                    <div class="grid-item">
                                        <b>Personalisasi</b>
                                        <p><?php
                                            if ($o['transaksi_personalisasi'] == 1) {
                                                echo "Blanko";
                                            } elseif ($o['transaksi_personalisasi'] == 2) {
                                                echo "Nomerator";
                                            } elseif ($o['transaksi_personalisasi'] == 3) {
                                                echo "Barcode";
                                            } elseif ($o['transaksi_personalisasi'] == 4) {
                                                echo "Data";
                                            } elseif ($o['transaksi_personalisasi'] == 5) {
                                                echo "Data + Foto";
                                            } else {
                                                echo "Tidak Diketahui";
                                            } ?></p>
                                    </div>
                                    <div class="grid-item">
                                        <b>Coating</b>
                                        <p><?php
                                            if ($o['transaksi_coating'] == 1) {
                                                echo "Glossy";
                                            } elseif ($o['transaksi_coating'] == 2) {
                                                echo "Doff";
                                            } elseif ($o['transaksi_coating'] == 3) {
                                                echo "Glossy + Doff";
                                            } else {
                                                echo "Tidak Diketahui";
                                            } ?></p>
                                    </div>
                                    <div class="grid-item">
                                        <b>Finishing</b>
                                        <p><?php
                                            if ($o['transaksi_finishing'] == 1) {
                                                echo "Tidak Ada";
                                            } elseif ($o['transaksi_finishing'] == 2) {
                                                echo "Urutkan";
                                            } elseif ($o['transaksi_finishing'] == 3) {
                                                echo "Label Gosok";
                                            } elseif ($o['transaksi_finishing'] == 4) {
                                                echo "Plong Oval";
                                            } elseif ($o['transaksi_finishing'] == 5) {
                                                echo "Plong Bulat";
                                            } elseif ($o['transaksi_finishing'] == 6) {
                                                echo "Urutkan";
                                            } elseif ($o['transaksi_finishing'] == 7) {
                                                echo "Emboss Silver";
                                            } elseif ($o['transaksi_finishing'] == 8) {
                                                echo "Emboss Gold";
                                            } elseif ($o['transaksi_finishing'] == 9) {
                                                echo "Panel";
                                            } elseif ($o['transaksi_finishing'] == 10) {
                                                echo "Hot Print";
                                            } elseif ($o['transaksi_finishing'] == 11) {
                                                echo "Swipe";
                                            } else {
                                                echo "Tidak Diketahui";
                                            } ?></p>
                                    </div>
                                    <div class="grid-item">
                                        <b>Function</b>
                                        <p><?php
                                            if ($o['transaksi_function'] == 1) {
                                                echo "Print Thermal";
                                            } elseif ($o['transaksi_function'] == 2) {
                                                echo "Scan Barcode";
                                            } elseif ($o['transaksi_function'] == 3) {
                                                echo "Swipe Magnetic";
                                            } elseif ($o['transaksi_function'] == 4) {
                                                echo "Tap RFID";
                                            } else {
                                                echo "Tidak Diketahui";
                                            } ?></p>
                                    </div>
                                    <div class="grid-item">
                                        <b>Packaging</b>
                                        <p><?php
                                            if ($o['transaksi_packaging'] == 1) {
                                                echo "Plastik 1 on 1";
                                            } elseif ($o['transaksi_packaging'] == 2) {
                                                echo "Plastik Terpisah";
                                            } elseif ($o['transaksi_packaging'] == 3) {
                                                echo "Box Kartu Nama";
                                            } elseif ($o['transaksi_packaging'] == 4) {
                                                echo "Box Putih";
                                            } elseif ($o['transaksi_packaging'] == 5) {
                                                echo "Small UCARD";
                                            } elseif ($o['transaksi_packaging'] == 6) {
                                                echo "Small Maxi UCARD";
                                            } elseif ($o['transaksi_packaging'] == 7) {
                                                echo "Large UCARD";
                                            } elseif ($o['transaksi_packaging'] == 8) {
                                                echo "Large Maxi UCARD";
                                            } else {
                                                echo "Tidak Diketahui";
                                            } ?></p>
                                    </div>
                                    <div class="grid-item">
                                        <b>Ambil/Kirim</b>
                                        <p><?php
                                            if ($o['transaksi_paket'] == 1) {
                                                echo "Kirim Product";
                                            } elseif ($o['transaksi_paket'] == 2) {
                                                echo "Ambil Sendiri";
                                            } else {
                                                echo "Tidak Diketahui";
                                            } ?></p>
                                    </div>
                                </div>

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
                            <?php if ($o['transaksi_terima'] !== '1') : ?>
                                <a href="<?= base_url('Template?id=' . $this->uri->segment(3)) ?>" style="text-align: center;" class="form-control"><i class="fa fa-image"></i> Pilih Template</a>
                                <br>
                                <form method="post" action="<?= base_url('Order_pelanggan/upload_design') ?>" enctype="multipart/form-data">
                                    <h3>Upload Design</h3>
                                    <input type="file" class="form-control" multiple name="design[]">
                                    <input type="hidden" value="<?= $this->uri->segment(3) ?>" name="id_transaksi">
                                    <br>
                                    <button type="submit" style="width: 100%;" class="btn btn-primary">Kirim</button>
                                </form>
                                <hr>
                            <?php endif ?>
                            <?php
                            $id = $this->uri->segment(3);
                            $design = $this->db->query("SELECT * FROM tbl_user_design WHERE design_transaksi_id = '$id' ")->result_array();
                            $upload = $this->db->query("SELECT * FROM tbl_design_kirim WHERE design_transaksi_id = '$id' ")->result_array();
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
                                <h3>Uploaded File/Link Design </h3>
                                <br>
                                <div class="table-responsive">
                                    <table class="table table-flush" id="datatable-basic">
                                        <thead>
                                            <tr>
                                                <th>File Name</th>
                                                <th>View</th>
                                                <th>Download</th>
                                                <th>Delete</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            foreach ($upload as $u) :
                                            ?>
                                                <tr>
                                                    <td><?php echo  $u['design_image']; ?></td>
                                                    <td><a href="<?= base_url('design_user/' . $u['design_image']) ?>" target="_blank">View</a></td>
                                                    <td><a href="<?= base_url('design_user/' . $u['design_image']) ?>" download>Download</a></td>
                                                    <td><a id="<?= $u['design_id'] ?>" type="button" class="hapus" data-toggle="modal" data-target="#hapus" style="color:red;">Delete</a></td>
                                                </tr>
                                            <?php
                                            endforeach;
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            <?php
                            endif;
                            ?>
                            <?php
                            $link = $this->db->query("SELECT transaksi_link_desain FROM tbl_transaksi WHERE transaksi_id='$id';")->row_array();
                            ?>
                            <h3>Link File </h3>
                            <div class="form-group row">
                                <div class="col-sm-8 pr-1">
                                    <input type="text" class="form-control" id="link" placeholder="link file" value="<?= $link['transaksi_link_desain']; ?>">
                                </div>
                                <div class="col-sm-4 pl-1">
                                    <button type="submit" class="btn btn-primary mb-2 w-100" id="updateLink">Save</button>
                                </div>
                            </div>



                        </div>
                    </div>
                </div>
                <div id="status3" class="tabcontent">
                    <?php
                    $ongkir = $this->db->query("SELECT transaksi_ongkir FROM tbl_transaksi WHERE transaksi_id='$id';")->row_array();
                    $total_bayar = $this->db->query("SELECT*, (transaksi_harga+transaksi_ongkir) as transaksi_total FROM tbl_transaksi WHERE transaksi_id='$id';")->row_array();
                    ?>
                    <div class="card">
                        <div class="card-header bg-transparent">
                            <h3 class="mb-0">Pembayaran</h3>
                        </div>
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
                        <div class="card-body">
                            <p>Silahkan melakukan transaksi sesuai harga yang di sepakati</p>
                            <h3>Silahkan pilih salah satu</h3>

                            <input type="radio" name="opsibayar" id="opsibayarlunas" required>
                            <label for="opsibayarlunas">Lunas</label>
                            <br>
                            <input type="radio" name="opsibayar" id="opsibayardp" required>
                            <label for="opsibayardp">DP</label>

                            <br>
                            <br>
                            <?php if ($o['transaksi_harga'] == NULL || $o['transaksi_harga'] == '0') : ?>
                                <h3>Harga Belum Ditentukan</h3>
                            <?php else : ?>
                                <table style="width: 100%;">
                                    <tr>
                                        <td style="width: 30%;">
                                            <h3>Harga barang:</h3>
                                        </td>
                                        <td>
                                            Rp <?= number_format($o['transaksi_harga'], 2, ',', '.') ?>
                                        </td>
                                    </tr>
                                    <?php if ($o['transaksi_paket'] == '1') : ?>
                                        <tr>
                                            <td>
                                                <h3>Ongkos kirim:</h3>
                                            </td>
                                            <td>
                                                Rp <?= number_format($ongkir['transaksi_ongkir'], 2, ',', '.') ?>
                                            </td>
                                        </tr>
                                    <?php endif; ?>
                                    <tr>
                                        <td>
                                            <h3>Total:</h3>
                                        </td>
                                        <td>
                                            Rp <?= number_format($total_bayar['transaksi_total'], 2, ',', '.') ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <h3>Harus dibayar:</h3>
                                        </td>
                                        <td id="totalbayar">
                                            Rp <?= number_format($total_bayar['transaksi_total'], 2, ',', '.') ?>
                                        </td>
                                    </tr>
                                </table>
                            <?php endif ?>
                            <br>
                            <form method="post" action="<?= base_url('Order_pelanggan/upload_bukti') ?>" enctype="multipart/form-data">
                                <input type="hidden" value="<?= $o['transaksi_id'] ?>" name="id">
                                <input type="hidden" value="<?= $o['transaksi_bukti'] ?>" name="bukti_lama">
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
                                    <b><?= $o['transaksi_atas_nama'] ?></b>
                                    <img style="width: 100%;" src="<?= base_url('bukti_transaksi/' . $o['transaksi_bukti']) ?>">
                                <?php endif ?>
                                <?php if ($o['transaksi_terima'] !== '1') : ?>
                                    <input type="hidden" value="<?= $this->uri->segment(3) ?>" name="id_transaksi">

                                    <div class="form-group">
                                        <p class="mb-1">Atas Nama</p>
                                        <input id="atas_nama" placeholder="Misal: Reza Fabriza Lesmana" type="text" name="atas_nama" class="form-control" required>
                                    </div>
                                    <div class="form-group">
                                        <p class="mb-1">Jumlah yang ditransfer</p>
                                        <input id="transfer" placeholder="Misal: 500000" type="number" name="transfer" class="form-control" required>
                                    </div>
                                    <div class="form-group">
                                        <input type="file" required="" name="bukti" class="form-control">
                                    </div>
                                    <br>
                                    <button type="submit" style="width: 100%;" class="btn btn-primary">Kirim</button>
                            </form>
                        <?php endif; ?>
                        </div>
                    </div>
                </div>
                <div id="status4" class="tabcontent">
                    <div class="card">
                        <div class="card-header bg-transparent">
                            <h3 class="mb-0">Approval</h3>
                        </div>
                        <div class="card-body">
                        <form action="">
                            <input type="radio" id="apv1" placeholder="Pilih Approval" name="approval" value="Ori">
                            <label for="apv1">Ori</label><br>
                            <a type="button" class="modal_lihat" data-toggle="modal" data-target="#approval1"><img style="width: 100%;" src="<?= base_url('design_approval/' . $o['transaksi_approval_1']) ?>"></a><br>
                            <input type="radio" id="apv2" placeholder="Pilih Approval" name="approval" value="Gelap">
                            <label for="apv2">Gelap</label><br>
                            <a type="button" class="modal_lihat" data-toggle="modal" data-target="#approval2"><img style="width: 100%;" src="<?= base_url('design_approval/' . $o['transaksi_approval_2']) ?>"></a><br>
                            <input type="radio" id="apv3" placeholder="Pilih Approval" name="approval" value="Terang">
                            <label for="apv3">Terang</label><br>
                            <a type="button" class="modal_lihat" data-toggle="modal" data-target="#approval3"><img style="width: 100%;" src="<?= base_url('design_approval/' . $o['transaksi_approval_3']) ?>"></a><br>
                            <button type="submit" style="width: 100%;" class="btn btn-primary">Kirim</button> 
                        </form> 
                        </div>
                    </div>
                </div>
                <div id="status5" class="tabcontent">
                    <div class="card">
                        <div class="card-header bg-transparent">
                            <h3 class="mb-0">Cetak Produk</h3>
                        </div>
                        <div class="card-body">
                            <?php
                            if (!empty($ctk['transaksi_status']) && @$ctk['transaksi_status'] == '1') :
                            ?>
                                <div style="display: flex;justify-content: center;">
                                    <img style="width:50%;margin: auto;" src="<?= base_url('assets/img/gifcheck.gif') ?>" alt="">
                                </div>
                                <br>
                                <br>
                                <h2>Sudah selesai</h2>
                            <?php else : ?>
                                <img style="width:100%;" src="<?= base_url('assets/img/print.gif') ?>" alt="">
                                <br>
                                <br>
                                <h2>Sedang membuat produk</h2>
                                <br>
                                <div class="timeline timeline-one-side" data-timeline-content="axis" data-timeline-axis-style="dashed">
                                    <?php
                                    $produksi = $this->db->query("SELECT * FROM tbl_status WHERE status_id LIKE '5_';")->result_array();
                                    $produksicount = 51;
                                    ?>
                                    <?php foreach ($produksi as $p) : ?>
                                        <div class="timeline-block mt-1 mb-0">
                                            <span style="background-color: <?= ($statusproduksi == $produksicount) ? "blue" : ($statusproduksi > $produksicount ? "green" : "grey"); ?>;color: white;" class="timeline-step badge-success">
                                                <i class="fa fa-image"></i>
                                            </span>
                                            <div class="timeline-content">
                                                <p class="my-0"><b class="font-weight-bold"><?= $p['status_status']; ?></b></p>
                                                <p class=" text-sm mt-1 mb-0"><?= $p['status_keterangan']; ?></p>
                                                <!-- <div class="mt-3">
                                                    <span class="badge badge-pill badge-success">Diterima</span>
                                                    <p class="text-sm mt-2">
                                                    </p>
                                                </div> -->
                                            </div>
                                        </div>
                                        <?php $produksicount++ ?>
                                    <?php endforeach; ?>

                                </div>
                            <?php endif; ?>

                        </div>
                    </div>
                </div>
                <div id="status6" class="tabcontent">

                    <div class="card">

                        <div class="card-header bg-transparent">
                            <h3 class="mb-0">Konfirmasi Pesanan</h3>
                        </div>

                        <div id="terima_p" class="card-body">

                            <?php if ($o['transaksi_terima'] == NULL) : ?>

                                <?php
                                $resi = $this->db->query("SELECT transaksi_resi FROM tbl_transaksi WHERE transaksi_id='$id';")->row_array();
                                ?>

                                <?php if ($o['transaksi_paket'] == '1') : ?>
                                    <div class="wrapper">
                                        <div class="form-group row w-100">
                                            <label for="noresi" class="col-sm-4 col-form-label">Nomor Resi:</label>
                                            <div class="col-sm-8">
                                                <input type="text" readonly class="form-control-plaintext" id="noresi" value="<?= (is_null($resi['transaksi_resi']) || empty($resi['transaksi_resi']) ? 'Belum ada resi' : $resi['transaksi_resi']); ?>">
                                            </div>
                                        </div>
                                    </div>
                                    <a class="btn btn-success" style="width:100%;" style="text-align: center;" href="https://cekresi.com/?v=wdg&noresi=<?= $resi['transaksi_resi'] ?>">
                                        Cek Resi
                                    </a>
                                <?php endif; ?>
                                <br>
                                <br>
                                <div id="paket_terima">
                                    <!-- <button style="width:100%;display:none;" class="btn btn-primary terima">Paket Sudah Diterima</button> -->
                                    <?php
                                    if ($o['transaksi_paket'] != NULL) :
                                    ?>
                                        <button id="terima" style="width:100%;" class="btn btn-primary terima">Paket Sudah Diterima</button>
                                    <?php
                                    endif;
                                    ?>
                                </div>
                            <?php else : ?>
                                <h2 style="text-align: center;">Transaksi Anda Selesai</h2>
                                <h2 style="text-align: center;">Terima kasih telah berbelanja di<br>UCARD Indonesia</h2>
                                <br>
                                <h2 style="text-align: center;">Tulis review tentang kami di Google</h2>
                                <br>
                                <div class="btnreviewcenter">
                                    <a class="btn btn-info" style="text-align: center;" href="https://g.page/r/Ce2lxSIiDOxWEAE/review">
                                        UCARD Surabaya
                                    </a>
                                    <a class="btn btn-danger" style="text-align: center;" href="https://g.page/r/CTvioWQ51qDNEAg/review">
                                        UCARD Semarang
                                    </a>
                                    <br>
                                    <br>
                                    <a class="btn btn-success" style="text-align: center;" href="https://g.page/r/CQCSzZXego0MEAg/review">
                                        UCARD Jakarta
                                    </a>
                                </div>
                            <?php endif; ?>
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
            <?php if ($o['transaksi_terima'] !== '1') : ?>
                <div class="modal fade" id="hapus" tabindex="-1" role="dialog" aria-labelledby="modal-default" aria-hidden="true">
                    <div class="modal-dialog modal- modal-dialog-centered modal-" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h6 class="modal-title" id="modal-title-default">Hapus Design</h6>
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
<?php endif ?>
<script src="<?= base_url('assets/admin/vendor/dropzone/dist/min/dropzone.min.js') ?>"></script>

<script>
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
    $(document).on('click', '.hapus', function() {
        var id = $(this).attr('id');
        $('.btn_hapus').attr('id', id);
    });
    $(document).on('click', '.btn_hapus', function() {
        var url = document.URL;
        var id = $(this).attr('id');
        $.ajax({
            type: "POST",
            url: "<?= base_url('Order_pelanggan/hapus_design_upload') ?>",
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
        for (i = 0; i < tablinks.length; i++) {
            tablinks[i].className = tablinks[i].className.replace(" active", "");
        }
        $('#' + status).css('display', 'block');
        evt.currentTarget.className += " active";
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
            url: '<?= base_url('Order_pelanggan/paket') ?>',
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
    $('#updateLink').click(function(e) {
        e.preventDefault();

        var id = $('#id').val();
        var link = $('#link').val();

        $.ajax({
            type: 'POST',
            url: "<?= base_url('Order_pelanggan/updateLink') ?>",
            data: {
                id: id,
                link: link
            },
            success: function(data) {
                alert('Link Berhasil Di Update');
            }
        });
    });
    $('.terima').click(function() {
        if (confirm('Apakah anda yakin paket sudah diterima?')) {
            var val = 1;
            var id = $('#id').val();
            var user = $('#loggeduser').val();
            $.ajax({
                type: 'POST',
                url: "<?= base_url('Order_pelanggan/terima') ?>",
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
<?php
$statusRefresh = $this->db->query("SELECT max(transaksi_status_id) st, max(transaksi_produksi_status_id) pd FROM tbl_status_transaksi WHERE transaksi_order_id=" . $this->uri->segment(3))->row_array();

?>
<script>
    $(document).ready(function() {
        $('#opsibayarlunas').click(function() {
            $('#totalbayar').html('Rp  ' +
                '<?= number_format($total_bayar["transaksi_total"], 2, ',', '.'); ?>');
        });
        $('#opsibayardp').click(function() {
            $('#totalbayar').html('Rp  ' + '<?= number_format($total_bayar["transaksi_total"] * 0.5, 2, ',', '.'); ?>');
        });

        setInterval(function() {
            var id = $('#id').val();
            var status = '<?= $statusRefresh['st']; ?>';
            var produksi = '<?= $statusRefresh['pd']; ?>';
            $.ajax({
                type: 'POST',
                url: '<?= base_url('Detail_product_pelanggan/checkStatus') ?>',
                data: {
                    id: id,
                    status: status,
                    produksi: produksi
                },
                success: function(data) {
                    if (data === 'refresh') {
                        location.reload();
                    }
                }
            });
        }, 5000);
    });
</script>