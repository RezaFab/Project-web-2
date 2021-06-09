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
                <div class="card-header bstatus-0">
                    <table style="width: 100%;">
                        <tr>
                            <td style="text-align: left;">
                                <h3 class="mb-0" id="judul">Data Pelanggan</h3>
                            </td>
                            <td style="text-align: right;">
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#tambah">
                                    <i class="fa fa-plus"></i>
                                </button>
                            </td>
                        </tr>
                    </table>
                </div>

                <!-- Light table -->
                <div class="table-responsive">
                    <table class="table table-flush" id="datatable-basic">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Kode</th>
                                <th>Nama</th>
                                <th>Gambar</th>
                                <th>Harga</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $n = 1;
                            foreach ($data as $d) :
                            ?>
                                <tr>
                                    <td><?= $n++ ?></td>
                                    <td><?= $d['product_kode'] ?></td>
                                    <td><?= $d['product_nama'] ?></td>
                                    <td><img src="<?= base_url('image/' . $d['product_image']); ?>" width="100px" alt=""></td>
                                    <td><?= $d['product_harga'] ?></td>
                                </tr>
                            <?php
                            endforeach;
                            ?>
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