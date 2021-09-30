<link rel="stylesheet" type="text/css" media="all" href="<?= base_url('assets/admin/css/mab-jquery-taginput.css?v2') ?>">
<link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
<script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
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
                                <h3 class="mb-0" id="judul">Customer Services</h3>
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
                                <th>Foto</th>
                                <th>No HP</th>
                                <th>Nama</th>
                                <th>Daerah</th>
                                <th>BOT</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $n = 1;
                            foreach ($cs as $c) : ?>
                                <tr>
                                    <td><?= $n++ ?></td>
                                    <td>
                                        <img style="width: 50px;" src="<?= base_url('assets/img/cs/' . $c['cs_foto']) ?>">
                                    </td>
                                    <td><?= $c['cs_nohp'] ?></td>
                                    <td><?= $c['cs_nama'] ?></td>
                                    <td><?= $c['cs_daerah'] ?></td>
                                    <td>
                                        <?php if ($c['cs_status'] == '1') : ?>
                                            <input name="<?= $c['cs_nohp'] ?>" class="status" type="checkbox" checked data-toggle="toggle" data-size="small">
                                        <?php else : ?>
                                            <input name="<?= $c['cs_nohp'] ?>" class="status" type="checkbox" data-toggle="toggle" data-size="small">
                                        <?php endif ?>
                                    </td>
                                    <td>
                                        <button id="<?= $c['cs_id'] ?>" type="button" class="btn btn-info btn-sm edit" data-toggle="modal" data-target="#edit"><i class="fa fa-pen"></i></button>
                                        <button id="<?= $c['cs_id'] ?>" type="button" class="btn btn-danger btn-sm hapus" data-toggle="modal" data-target="#hapus"><i class="fa fa-times"></i></button>
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
                <h6 class="modal-title" id="modal-title-default">Tambah cs</h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>

            <div class="modal-body">
                <form method="post" action="<?= base_url('Customer_services/tambah_cs') ?>" enctype="multipart/form-data">
                    <div class="form-group">
                        <input type="text" placeholder="No Hp" name="nohp" required="" class="form-control">
                    </div>
                    <div class="form-group">
                        <input type="text" placeholder="Nama" name="nama" required="" class="form-control">
                    </div>
                    <div class="form-group">
                        <input type="text" placeholder="Daerah" name="daerah" required="" class="form-control">
                    </div>
                    <div class="form-group">
                        <input type="file" name="foto" required="" class="form-control">
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

<div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="modal-default" aria-hidden="true">
    <div class="modal-dialog modal- modal-dialog-centered modal-" role="document">
        <div class="modal-content">

            <div class="modal-header">
                <h6 class="modal-title" id="modal-title-default">Edit cs</h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <form method="post" action="<?= base_url('Customer_services/update_cs') ?>" enctype="multipart/form-data">
                <div id="form_edit"></div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Save</button>
            </form>
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
                <h6 class="modal-title" id="modal-title-default">Hapus cs</h6>
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
        $('.btn_hapus').attr('id', id);
    });
    $(document).on('click', '.btn_hapus', function() {
        var url = document.URL;
        var id = $(this).attr('id');
        $.ajax({
            type: "POST",
            url: "<?= base_url('Customer_services/hapus_cs') ?>",
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
            url: "<?= base_url('Customer_services/get_data') ?>",
            data: {
                id: id
            },
            success: function(data) {
                $('#form_edit').html(data);
            }
        });
    });
    $('.status').change(function() {
        var nohp = $(this).attr('name');
        var toggle = $(this).prop('checked');
        if (toggle == false) {
            $.ajax({
                type: "POST",
                url: "<?= base_url('Customer_services/dimatikan') ?>",
                data: {
                    nohp: nohp,
                }
            });
        } else {
            $.ajax({
                type: "POST",
                url: "<?= base_url('Customer_services/dihidupkan') ?>",
                data: {
                    nohp: nohp,
                }
            });
        }
    });
</script>