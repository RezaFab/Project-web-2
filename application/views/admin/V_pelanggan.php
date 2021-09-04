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
                  <h3 class="mb-0" id="judul">Pelanggan</h3>
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
                  <th>No Hp</th>
                  <th>Nama</th>
                  <th>Email</th>
                  <th>BOT</th>
                  <th>Detail</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <?php $n = 1;
                foreach ($pelanggan as $p) : ?>
                  <tr>
                    <td><?= $n++ ?></td>
                    <td><?= $p['pelanggan_nohp'] ?></td>
                    <td><?= $p['pelanggan_nama'] ?></td>
                    <td><?= $p['pelanggan_email'] ?></td>
                    <td>
                      <?php if ($p['pelanggan_status'] == '1') : ?>
                        <input name="<?= $p['pelanggan_nohp'] ?>" class="status" type="checkbox" checked data-toggle="toggle" data-size="small">
                      <?php else : ?>
                        <input name="<?= $p['pelanggan_nohp'] ?>" class="status" type="checkbox" data-toggle="toggle" data-size="small">
                      <?php endif ?>
                    </td>
                    <td><button id="<?= $p['pelanggan_id'] ?>" type="button" class="btn btn-info btn-sm detail" data-toggle="modal" data-target="#detail"><i class="fa fa-eye"></i></button></td>
                    <td>
                      <button id="<?= $p['pelanggan_id'] ?>" type="button" class="btn btn-info btn-sm edit" data-toggle="modal" data-target="#edit"><i class="fa fa-pen"></i></button>
                      <!--<button id=" ini php //$p['pelanggan_id'] ini php" type="button" class="btn btn-danger btn-sm hapus" data-toggle="modal" data-target="#hapus"><i class="fa fa-times"></i></button> -->
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
    <div class="modal-dialog modal- modal-dialog-centered modal-lg" role="document">
      <div class="modal-content">

        <div class="modal-header">
          <h6 class="modal-title" id="modal-title-default">Tambah Pelanggan</h6>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>

        <div class="modal-body">
          <form method="post" action="<?= base_url('Pelanggan/tambah_pelanggan') ?>">
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <input type="number" placeholder="No Hp" name="no_hp" required="" class="form-control">
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
                <div class="form-group">
                  <textarea class="form-control" name="alamat" placeholder="Alamat"></textarea>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <input type="text" placeholder="Telephone" name="telephone" required="" class="form-control">
                </div>
                <div class="form-group">
                  <input type="text" placeholder="Kecamatan" name="kecamatan" required="" class="form-control">
                </div>
                <div class="form-group">
                  <input type="text" placeholder="Kota/Kabupaten" name="kabupaten" required="" class="form-control">
                </div>
                <div class="form-group">
                  <input type="text" placeholder="Kodepost" name="kodepost" required="" class="form-control">
                </div>
                <div class="form-group">
                  <div class="row">
                    <div class="col-md-4">
                      <select class="form-control" name="tgl_lahir" required="">
                        <option>DD</option>
                        <?php for ($i = 1; $i <= 31; $i++) : ?>
                          <option value="<?= $i ?>"><?= $i ?></option>
                        <?php endfor ?>
                      </select>
                    </div>
                    <div class="col-md-4">
                      <select class="form-control" name="bln_lahir" required="">
                        <option>MM</option>
                        <?php for ($i = 1; $i <= 12; $i++) : ?>
                          <option value="<?= $i ?>"><?= $i ?></option>
                        <?php endfor ?>
                      </select>
                    </div>
                    <div class="col-md-4">
                      <select class="form-control" name="thn_lahir" required="">
                        <option>YYYY</option>
                        <?php $t = date('Y');
                        for ($i = $t; $i >= ($t - 90); $i--) : ?>
                          <option value="<?= $i ?>"><?= $i ?></option>
                        <?php endfor ?>
                      </select>
                    </div>
                  </div>
                </div>
              </div>
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
    <div class="modal-dialog modal- modal-dialog-centered modal-lg" role="document">
      <div class="modal-content">

        <div class="modal-header">
          <h6 class="modal-title" id="modal-title-default">Edit Pelanggan</h6>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div id="form_edit"></div>
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
  <div class="modal fade" id="detail" tabindex="-1" role="dialog" aria-labelledby="modal-default" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered modal-" role="document">
      <div class="modal-content">

        <div class="modal-header">
          <h6 class="modal-title" id="modal-title-default">Detail Pelanggan</h6>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div id="view_detail"></div>
      </div>
    </div>
  </div>

  </div>
  <script>
    $(document).on('click', '.update', function() {
      var id = $(this).attr('id');
      var no_hp = $('#no_hp').val();
      var nama = $('#nama').val();
      var email = $('#email').val();
      var password = $('#password').val();
      var password_default = $('#password_default').val();
      var alamat = $('#alamat').val();
      var telephone = $('#telephone').val();
      var kecamatan = $('#kecamatan').val();
      var kabupaten = $('#kabupaten').val();
      var kodepost = $('#kodepost').val();
      var tgl_lahir = $('#tgl_lahir').val();
      var bln_lahir = $('#bln_lahir').val();
      var thn_lahir = $('#thn_lahir').val();
      var url = document.URL;
      if (no_hp !== '' && nama !== '' && email !== '' && alamat !== '' && telephone !== '' && kecamatan !== '' && kabupaten !== '' && kodepost !== '' && tgl_lahir !== '' && bln_lahir !== '' && thn_lahir !== '') {
        $.ajax({
          type: "POST",
          url: "<?= base_url('Pelanggan/edit_pelanggan') ?>",
          data: {
            id: id,
            no_hp: no_hp,
            nama: nama,
            email: email,
            password: password,
            password_default: password_default,
            alamat: alamat,
            telephone: telephone,
            kecamatan: kecamatan,
            kabupaten: kabupaten,
            kodepost: kodepost,
            tgl_lahir: tgl_lahir,
            bln_lahir: bln_lahir,
            thn_lahir: thn_lahir
          },
          success: function(data) {
            $('#alert_edit').html('<div class="alert alert-success alert-dismissible fade show" role="alert"><span class="alert-icon"><i class="fa fa-check"></i></span><span class="alert-text"><strong>Berhasil!</strong> Data terupdate</span><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            setTimeout(function() {
              window.location.href = url;
            }, 1000);
          }
        });
      } else {
        $('#alert_edit').html('<div class="alert alert-danger alert-dismissible fade show" role="alert"><span class="alert-icon"><i class="fa fa-times"></i></span><span class="alert-text"><strong>Isi semua data</strong> Jangan biarkan data kosong</span><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
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
        url: "<?= base_url('Pelanggan/hapus_pelanggan') ?>",
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
        url: "<?= base_url('Pelanggan/get_data') ?>",
        data: {
          id: id
        },
        success: function(data) {
          $('#form_edit').html(data);
        }
      });
    });
    $('.detail').click(function() {
      var id = $(this).attr('id');
      $.ajax({
        type: "POST",
        url: "<?= base_url('Pelanggan/get_detail') ?>",
        data: {
          id: id
        },
        success: function(data) {
          $('#view_detail').html(data);
        }
      });
    });
    $('.status').change(function() {
      var nohp = $(this).attr('name');
      var toggle = $(this).prop('checked');
      if (toggle == false) {
        $.ajax({
          type: "POST",
          url: "<?= base_url('Pelanggan/dimatikan') ?>",
          data: {
            nohp: nohp,
          }
        });
      } else {
        $.ajax({
          type: "POST",
          url: "<?= base_url('Pelanggan/dihidupkan') ?>",
          data: {
            nohp: nohp,
          }
        });
      }
    });
  </script>