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
            <div class="modal-content">

                <div class="modal-header">
                    <h6 class="modal-title" id="modal-title-default">Tambah Admin</h6>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>

                <div class="modal-body">
                    <form method="post" action="<?= base_url('Administrator/tambah_admin') ?>">
                        <div class="form-group">
                            <input type="number" placeholder="No Hp" name="nohp" required="" class="form-control">
                        </div>
                        <div class="form-group">
                            <input type="text" placeholder="Nama" name="nama" required="" class="form-control">
                        </div>
                        <div class="form-group">
                            <input type="text" placeholder="Email" name="email" required="" class="form-control">
                        </div>
                        <div class="form-group">
                            <input type="password" placeholder="Password" name="password" required="" class="form-control">
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
                                $('.alert .close').click();
                            }, 3000)
                        }
                    })
                    console.log(formData)
                } else {
                    $('#alert_edit').html('<div class="alert alert-danger alert-dismissible fade show" role="alert"><span class="alert-icon"><i class="fa fa-times"></i></span><span class="alert-text"><strong>Isi semua data</strong> Jangan biarkan data kosong</span><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>')
                }
            })
        })

        $(document).on('click', '.hapus', function() {
            var id = $(this).attr('id');
            $('.btn_hapus').attr('id', id);
        });
        $(document).on('click', '.btn_hapus', function() {
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
    </script>