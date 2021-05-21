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
              <h3 class="mb-0" id="judul">Design Pelanggan</h3>
            </div>

            <!-- Light table -->
            <div class="table-responsive">
                      <table class="table table-flush" id="datatable-basic">
                          <thead>
                          <tr>
                          <th>No</th>
                          <th>Name</th>
                          <th>Category</th>
                          <th>Author</th>
                          <th>Dimension</th>
                          <th>Image</th>
                          <th>Action</th>
                          </tr>
                          </thead>
                          <tbody>
                          <?php $n=1; foreach($design as $d): ?>
                            <tr>
                          <td><?= $n++ ?></td>
                          <td><?= $d['design_nama'] ?>
                          </td>
                          <td><?= $d['design_category'] ?></td>
                          <td>
                            <a href="#">
                              <div class="d-inline-block ml-1">
                                  <?php $author = $this->db->get_where('tbl_pelanggan', ['pelanggan_id' => $d['design_user_id']])->row_array();
                                  echo $author['pelanggan_nama'];
                                  ?>
                              </div>
                            </a>
                          </td>
                          <td>
                              <?= $d['design_width'].' X '.$d['design_height'] ?>
                          </td>
                          <td>
                              <img style="width: 40px;border-radius:5px;" src="<?= base_url('design_user/'.$d['design_image']) ?>" alt="">
                          </td>
                          <td>
                            <button title="<?= $d['design_id'] ?>" id="modal_lihat" type="button" class="btn btn-primary btn-sm modal_lihat"  data-toggle="modal" data-target="#lihat"><i style="color: white;" class="fa fa-pen"></i></button>
                              <button id="<?= $d['design_id'] ?>" type="button" class="btn btn-danger btn-sm hapus" data-toggle="modal" data-target="#hapus"><i class="fa fa-trash"></i></button>
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
        <!-- Modal -->
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
      <div id="data_design"></div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
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
<div class="modal fade" id="create" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Create a design</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div style="border: 0px;" id="accordion">
  <div class="card">
    <div style="background-color:white;" class="card-header" id="headingOne">
      <h5 class="mb-0">
        <button style="height: 50px;text-decoration: none;color:black;" class="btn btn-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
        <i class="fa fa-plus"></i> Custom Dimension
        </button>
      </h5>
    </div>

    <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
      <div class="card-body">
      <table style="width: 100%;">
            <tr>
                <td>Width</td>
                <td>Height</td>
            </tr>
            <tr>
                <form action="<?= base_url('Editor') ?>" method="get" target="_blank">
                  <td><input id="width_custom" name="width" required="" style="border-radius: 0px;" type="text" class="form-control" placeholder="px"></td>
                  <td><input id="height_custom" name="height" required="" style="border-radius: 0px;" type="text" class="form-control" placeholder="px"></td>
                  <input type="hidden" name="level" value="1">
            </tr>
            <tr>
                <td colspan="2"><button id="create_custom" style="border-radius: 0px;width:100%;" class="btn btn-primary">Create</button></td>
            </tr>
                </form>
        </table>
      </div>
    </div>
  </div>
  <div class="card">
    <div style="background-color:white;" class="card-header" id="headingTwo">
      <h5 class="mb-0">
        <button style="height: 50px;text-decoration: none;color:black;" class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
          Suggested
        </button>
      </h5>
    </div>
    <div id="collapseTwo" class="collapse show" aria-labelledby="headingTwo" data-parent="#accordion">
      <div class="card-body">
    <input class="form-control" type="text" id="myInput" onkeyup="myFunction()" placeholder="Search..">
    <br>
      <div style="overflow-y: auto; height: 300px;" class="modal-body">
        
      </div>
      </div>
    </div>
  </div>
</div>
    </div>
  </div>
</div>
  <script>
    $('.modal_lihat').click(function() {
        var id = $(this).attr('title');
        $.ajax({
            url:"<?= base_url('Daftar_design/get_data_user') ?>",
            type:"POST",
            data: {
                id:id
            },
            success:function(data) {
                $('#data_design').html(data);
            }
        });
    });
        $(document).on('click', '.update', function(){
        var nama = $('#design_nama').val();
        var category = $('#design_category').val();
        var id = $(this).attr('id');
        var url = document.URL;

        if (nama!=='' && category!=='') {
            $.ajax({
                url:"<?= base_url('Daftar_design/update_design') ?>",
                type: "POST",
                data: {
                    id:id,
                    nama:nama,
                    category:category
                },
                success:function(data) {
                    $('#alert').html(data);
                    setTimeout(function() {
                        window.location.href = url;
                    }, 1000);
                }
            });
        }
        
    });
      $(document).on('click', '.hapus', function(){
    var id = $(this).attr('id');
    $('.btn_hapus').attr('id',id);
  });
  $(document).on('click', '.btn_hapus', function(){
    var url = document.URL;
    var id = $(this).attr('id');
    $.ajax({
      type:"POST",
      url:"<?= base_url('Daftar_design/hapus_design_user') ?>",
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