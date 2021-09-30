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
                <div class="card-header bstatus-0">
                    <table style="width: 100%;">
                        <tr>
                            <td style="text-align: left;">
                                <h3 class="mb-0" id="judul">Status</h3>
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
                                <th>Ikon</th>
                                <th>Nama Bank</th>
                                <th>Atas Nama</th>
                                <th>No Rekening</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $n = 1;
                            foreach ($bank as $b) : ?>
                                <tr>
                                    <td><?= $n++ ?></td>
                                    <td><img style="width: 70px;" src="<?= base_url('assets/img/bank/' . $b['bank_image']) ?>"></td>
                                    <td><?= $b['bank_nama'] ?></td>
                                    <td><?= $b['bank_atas_nama'] ?></td>
                                    <td><?= $b['bank_no_rek'] ?></td>
                                    <td>
                                        <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#edit<?= $b['bank_id'] ?>"><i class="fa fa-pen"></i></button>
                                        <button id="<?= $b['bank_id'] ?>" name="<?= $b['bank_image'] ?>" type="button" class="btn btn-danger btn-sm hapus" data-toggle="modal" data-target="#hapus"><i class="fa fa-times"></i></button>
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
    <div class="modal-dialog modal- modal-dialog-centered modal-" role="document">
        <div class="modal-content">

            <div class="modal-header">
                <h6 class="modal-title" id="modal-title-default">Tambah Status</h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>

            <div class="modal-body">
                <form method="post" action="<?= base_url('Bank/tambah_bank') ?>" enctype="multipart/form-data">
                    <div class="form-group">
                        <input type="text" placeholder="Nama Bank" name="nama_bank" class="form-control">
                    </div>
                    <div class="form-group">
                        <input type="text" placeholder="Atas Nama" name="atas_nama" class="form-control">
                    </div>
                    <div class="form-group">
                        <input type="text" placeholder="No Rekening" name="no_rek" class="form-control">
                    </div>
                    <div class="form-group">
                        <input type="file" name="icon" class="form-control">
                    </div>
            </div>

            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Save</button>
                </form>
                <button type="button" class="btn btn-link  ml-auto" data-dismiss="modal">Close</button>
            </div>

        </div>
    </div>
</div>

</div>
<?php foreach ($bank as $b) : ?>
    <div class="modal fade" id="edit<?= $b['bank_id'] ?>" tabindex="-1" role="dialog" aria-labelledby="modal-default" aria-hidden="true">
        <div class="modal-dialog modal- modal-dialog-centered modal-" role="document">
            <div class="modal-content">

                <div class="modal-header">
                    <h6 class="modal-title" id="modal-title-default">Edit Status</h6>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>

                <div class="modal-body">
                    <form method="post" action="<?= base_url('Bank/update_bank') ?>" enctype="multipart/form-data">
                        <input type="hidden" name="id" value="<?= $b['bank_id'] ?>">
                        <div class="form-group">
                            <input type="text" placeholder="Nama Bank" value="<?= $b['bank_nama'] ?>" name="nama_bank" class="form-control">
                        </div>
                        <div class="form-group">
                            <input type="text" placeholder="Atas Nama" value="<?= $b['bank_atas_nama'] ?>" name="atas_nama" class="form-control">
                        </div>
                        <div class="form-group">
                            <input type="text" placeholder="No Rekening" value="<?= $b['bank_no_rek'] ?>" name="no_rek" class="form-control">
                        </div>
                        <div class="form-group">
                            <input type="file" name="icon" class="form-control">
                            <input type="hidden" value="<?= $b['bank_image'] ?>" name="icon_default">
                        </div>
                </div>

                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Save</button>
                    </form>
                    <button type="button" class="btn btn-link  ml-auto" data-dismiss="modal">Close</button>
                </div>

            </div>
        </div>
    </div>

    </div>
<?php endforeach ?>
<div class="modal fade" id="hapus" tabindex="-1" role="dialog" aria-labelledby="modal-default" aria-hidden="true">
    <div class="modal-dialog modal- modal-dialog-centered modal-" role="document">
        <div class="modal-content">

            <div class="modal-header">
                <h6 class="modal-title" id="modal-title-default">Hapus status</h6>
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
    $(document).on('click', '.hapus', function() {
        var id = $(this).attr('id');
        var icon = $(this).attr('name');
        $('.btn_hapus').attr('id', id);
        $('.btn_hapus').attr('name', icon);
    });
    $(document).on('click', '.btn_hapus', function() {
        var url = document.URL;
        var id = $(this).attr('id');
        var icon = $(this).attr('name');
        $.ajax({
            type: "POST",
            url: "<?= base_url('Bank/hapus_bank') ?>",
            data: {
                id: id,
                icon: icon
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