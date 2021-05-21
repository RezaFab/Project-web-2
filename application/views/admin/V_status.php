
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
                  <td style="text-align: left;"><h3 class="mb-0" id="judul">Status</h3></td>
                  <!-- <td style="text-align: right;"><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#tambah"><i class="fa fa-plus"></i></button></td> -->
                </tr>
              </table>
            </div>
            <!-- Light table -->
            <div class="table-responsive">
              <table class="table table-flush" id="datatable-basic">
                <thead>
                  <tr>
                    <th>Icon</th>
                    <th>Status</th>
                    <th>Keterangan</th>
                    <th>Tidak Ada</th>
                    <th>jangka Hari</th>
                    <!-- <th>Action</th> -->
                  </tr>
                </thead>
                <tbody>
                  <?php foreach($status as $s ): ?>
                    <tr>
                    <td><i class="<?= $s['status_icon'] ?> fa-2x"></i></td>
                    <td><?= $s['status_status'] ?></td>
                    <td><?= $s['status_keterangan'] ?></td>
                    <td style="text-align:center;">
                        <?php if($s['status_jangka_waktu']==NULL): ?>
                        <input id-s="<?= $s['status_id'] ?>" id="jangka_tidak_ada<?= $s['status_id'] ?>" type="checkbox" checked value="1" class="jangka_tidak_ada">
                        <?php elseif($s['status_jangka_waktu']!==NULL): ?>
                        <input id-s="<?= $s['status_id'] ?>" id="jangka_tidak_ada<?= $s['status_id'] ?>" type="checkbox" value="1" class="jangka_tidak_ada">
                        <?php endif; ?>
                    </td>
                    <td>
                    <?php if($s['status_jangka_waktu']==NULL): ?>
                      <input style="display:none;" id-s="<?= $s['status_id'] ?>" id="jangka<?= $s['status_id'] ?>" type="number" placeholder="HARI" value="1" min='1' class="form-control jangka">
                    <?php elseif($s['status_jangka_waktu']!==NULL): ?>
                      <input id-s="<?= $s['status_id'] ?>" id="jangka<?= $s['status_id'] ?>" type="number" placeholder="HARI" min='1' value="<?= $s['status_jangka_waktu'] ?>" class="form-control jangka">
                    <?php endif; ?>
                    </td>
                    <!-- <td>
                      <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#edit<?= $s['status_id'] ?>"><i class="fa fa-pen"></i></button>
                      <button id="<?= $s['status_id'] ?>" type="button" class="btn btn-danger btn-sm hapus" data-toggle="modal" data-target="#hapus"><i class="fa fa-times"></i></button>
                    </td> -->
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
                <form method="post" action="<?= base_url('Status/tambah_status') ?>">
                  <div class="form-group">
                  <input type="text" placeholder="Status" name="status" class="form-control">
                </div>
                <div class="form-group">
                  <input type="text" placeholder="Keterangan" name="keterangan" class="form-control">
                </div>
                <div class="form-group">
                  <input type="number" placeholder="Urutan" name="urutan" class="form-control">
                </div>
                <div class="form-group">
                  <input type="text" placeholder="Icon contoh : fa fa-home" name="icon" class="form-control">
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
  <?php foreach ($status as $s): ?>
    <div class="modal fade" id="edit<?= $s['status_id'] ?>" tabindex="-1" role="dialog" aria-labelledby="modal-default" aria-hidden="true">
    <div class="modal-dialog modal- modal-dialog-centered modal-" role="document">
        <div class="modal-content">
          
            <div class="modal-header">
                <h6 class="modal-title" id="modal-title-default">Edit Status</h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            
            <div class="modal-body">
                <form method="post" action="<?= base_url('Status/update_status') ?>">
                  <input type="hidden" name="id" value="<?= $s['status_id'] ?>">
                  <div class="form-group">
                  <input type="text" placeholder="Status" value="<?= $s['status_status'] ?>" name="status" class="form-control">
                </div>
                <div class="form-group">
                  <input type="text" placeholder="Keterangan" value="<?= $s['status_keterangan'] ?>" name="keterangan" class="form-control">
                </div>
                <div class="form-group">
                  <input type="number" placeholder="Urutan" value="<?= $s['status_urut'] ?>" name="urutan" class="form-control">
                </div>
                <div class="form-group">
                  <input type="text" placeholder="Icon contoh : fa fa-home"  value="<?= $s['status_icon'] ?>" name="icon" class="form-control">
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

  $(document).on('click', '.hapus', function(){
    var id = $(this).attr('id');
    $('.btn_hapus').attr('id',id);
  });
  $(document).on('click', '.btn_hapus', function(){
    var url = document.URL;
    var id = $(this).attr('id');
    $.ajax({
      type:"POST",
      url:"<?= base_url('Status/hapus_status') ?>",
      data: {
        id:id
      },
      success:function(data) {
        $('#alert_hapus').html('<div class="alert alert-success alert-dismissible fade show" role="alert"><span class="alert-icon"><i class="fa fa-check"></i></span><span class="alert-text"><strong>Berhasil!</strong> Data dihapus</span><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
        setTimeout(function() {
            window.location.href = url;
          }, 1000);
      }
    });
  });
</script>

<script>
  $('.jangka_tidak_ada').change(function() {
    var id = $(this).attr('id-s');
    if($(this).is(":checked")) {
      $('#jangka'+id).css('display','none');
      var j = 0;
      $.ajax({
        type:'POST',
        url:'<?= base_url('Status/status_jangka') ?>',
        data: {
          id:id,
          j:j
        },
        success:function(data) {

        }
      });
    }else{
      $('#jangka'+id).css('display','block');
      var j = 1;
      $.ajax({
        type:'POST',
        url:'<?= base_url('Status/status_jangka') ?>',
        data: {
          id:id,
          j:j
        },
        success:function(data) {

        }
      });
    }
  });
  $('.jangka').change(function() {
    var h = $(this).val();
    var id = $(this).attr('id-s');
    $.ajax({
        type:'POST',
        url:'<?= base_url('Status/status_hari') ?>',
        data: {
          id:id,
          h:h
        }
      });
  });
</script>