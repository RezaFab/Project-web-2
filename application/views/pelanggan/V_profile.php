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
        <div class="col-lg-12">
          <div class="card">
            <div class="card-header bg-transparent">
            <table style="width: 100%;">
                <tr>
                  <td style="text-align: left;"><h3 class="mb-0" id="judul">Profile</h3></td>
                  <td style="text-align: right;"><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#edit"><i class="fa fa-user"></i></button></td>
                </tr>
              </table>
            </div>
            <div class="card-body">
            <div class="row">
			<div class="col-md-6">
			  <b>Whatsapp</b>
              <p><?= $p['pelanggan_nohp']?></p> 
              <b>Nama</b>
              <p><?= $p['pelanggan_nama']?></p> 
              <b>Email</b>
              <p><?= $p['pelanggan_email']?></p> 
              <b>Tanggal Lahir</b>
              <p><?= $p['pelanggan_lahir']?></p>  
              <b>Alamat</b>
              <p><?= $p['pelanggan_alamat']?></p>
			</div>
			<div class="col-md-6">
			  <b>Refrensi</b>
              <p><?= $p['pelanggan_refrensi']?></p>
              <b>Telephone</b>
              <p><?= $p['pelanggan_telephone']?></p>   
              <b>Kecamatan</b>
              <p><?= $p['pelanggan_kecamatan']?></p>
              <b>Kabupaten</b>
              <p><?= $p['pelanggan_kabupaten']?></p>
              <b>Kodepost</b>
              <p><?= $p['pelanggan_kodepost']?></p>
              </div>
			</div>
            </div>
          </div>
        </div>

        <div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="modal-default" aria-hidden="true">
    <div class="modal-dialog modal- modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
          
            <div class="modal-header">
                <h6 class="modal-title" id="modal-title-default">Tambah Pelanggan</h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            
            <div class="modal-body">
                <form method="post" action="<?= base_url('Profile/edit_profile') ?>">
                <input type="hidden" value="<?= $p['pelanggan_id'] ?>" name="id">
                <input type="hidden" value="<?= $p['pelanggan_password'] ?>" name="password_lama">
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                  <input type="number" value="<?= $p['pelanggan_nohp'] ?>" placeholder="No Hp" name="no_hp" required="" class="form-control">
                </div>
                <div class="form-group">
                  <input type="text" value="<?= $p['pelanggan_nama'] ?>" placeholder="Nama" name="nama" required="" class="form-control">
                </div>
                <div class="form-group">
                  <input type="text" value="<?= $p['pelanggan_email'] ?>" placeholder="Email" name="email" required="" class="form-control">
                </div>
                <div class="form-group">
                  <input type="password" placeholder="Password" name="password" required="" class="form-control">
                </div>
                <div class="form-group">
                  <textarea class="form-control" name="alamat" placeholder="Alamat"><?= $p['pelanggan_alamat'] ?></textarea>
                </div>
                  </div>
                  <div class="col-md-6">
                     <div class="form-group">
                  <input type="text" value="<?= $p['pelanggan_telephone'] ?>" placeholder="Telephone" name="telephone" required="" class="form-control">
                </div>
                <div class="form-group">
                  <input type="text" value="<?= $p['pelanggan_kecamatan'] ?>" placeholder="Kecamatan" name="kecamatan" required="" class="form-control">
                </div>
                <div class="form-group">
                  <input type="text" value="<?= $p['pelanggan_kabupaten'] ?>" placeholder="Kota/Kabupaten" name="kabupaten" required="" class="form-control">
                </div>
                <div class="form-group">
                  <input type="text" value="<?= $p['pelanggan_kodepost'] ?>" placeholder="Kodepost" name="kodepost" required="" class="form-control">
                </div>
                <div class="form-group">
                  <div class="row">
                    <div class="col-md-4">
                      <select class="form-control" name="tgl_lahir" required="">
                        <option>DD</option>
                        <?php for($i=1; $i<=31; $i++):
                        if (date('d', strtotime($p['pelanggan_lahir'])) == $i) { ?>
                        	<option value="<?= $i ?>" selected><?= $i ?></option>
                        <?php }else{ ?>
                        	<option value="<?= $i ?>"><?= $i ?></option>
                        <?php } ?>
                        <?php endfor ?>
                      </select>
                    </div>
                    <div class="col-md-4">
                      <select class="form-control" name="bln_lahir" required="">
                        <option>MM</option>
                        <?php for($i=1; $i<=12; $i++): 
                        if (date('m', strtotime($p['pelanggan_lahir'])) == $i) { ?>
                        	<option value="<?= $i ?>" selected><?= $i ?></option>
                        <?php }else{ ?>
                        	<option value="<?= $i ?>"><?= $i ?></option>
                        <?php } ?>
                        <?php endfor ?>
                      </select>
                    </div>
                    <div class="col-md-4">
                      <select class="form-control" name="thn_lahir" required="">
                        <option>YYYY</option>
                        <?php $t = date('Y'); for($i=$t; $i>=($t-90); $i--): 
                        if (date('Y', strtotime($p['pelanggan_lahir'])) == $i) { ?>
                        	<option value="<?= $i ?>" selected><?= $i ?></option>
                        <?php }else{ ?>
                        	<option value="<?= $i ?>"><?= $i ?></option>
                        <?php } ?>
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