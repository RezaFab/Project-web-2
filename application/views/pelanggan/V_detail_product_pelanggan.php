<style type="text/css">
/* Style the tab */
.tab {
  overflow: hidden;
  border: 1px solid #ccc;
  background-color: #f1f1f1;
}

/* Style the buttons inside the tab */
.tab button {
  background-color: inherit;
  float: left;
  border: none;
  outline: none;
  cursor: pointer;
  padding: 14px 16px;
  transition: 0.3s;
  font-size: 17px;
}

/* Change background color of buttons on hover */
.tab button:hover {
  background-color: #ddd;
}

/* Create an active/current tablink class */
.tab button.active {
  background-color: #ccc;
}

/* Style the tab content */
.tabcontent {
  display: none;
  padding: 6px 12px;
  border: 1px solid #ccc;
  border-top: none;
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
        <div class="col">
          <div class="card">
            <!-- Card header -->
            <div class="card-header border-0">
              <h3><?= $p['product_nama'] ?></h3>
            </div>

            <!-- Light table -->
            <div class="card-body row">
              <div class="col-md-6">
                <img class="img-fluid" style="width: 500px;" src="<?= base_url('image/'.$p['product_image']) ?>">
              </div>
              <div class="col-md-6">
                <br>
                <div class="container-fluid">
                  <b>Nama</b>
                <p><?= $p['product_nama'] ?></p>
                <b>Deskripsi</b>
                <p><?= $p['product_deskripsi'] ?></p>
                <b>Keungulan</b>
                <p><?= $p['product_keunggulan'] ?></p>
                <b>Keterangan</b>
                <p><?= $p['product_keterangan'] ?></p>
                </div>
                <br>
                <form method="post" action="<?= base_url('Detail_product_pelanggan/order') ?>">
                  <input type="hidden" value="<?= $p['product_id'] ?>" name="id_product">
                  <input type="hidden" value="<?= $_SESSION['pelanggan_nohp'] ?>" name="nohp">
                  <div class="form-group">
                  <input type="number" placeholder="jumlah" name="jumlah" class="form-control">
                  <input type="hidden" value="<?= $p['product_harga'] ?>" name="harga">
                </div>
                <div class="form-group">
                <textarea class="form-control" name="keterangan" placeholder="Keterangan"></textarea>
                </div>

                <form action="#" onsubmit="if(document.getElementById('agree').checked) { return true; } else { alert(Tolong Baca dan Setujui Syarat & Ketentuan yang berlaku); return false; }">
                
                <input type="checkbox" name="checkbox" value="check" id="agree" /> Saya Telah Membaca & Menyetujui Syarat & Ketentuan
               
                <button type="submit" class="btn btn-info">Order</button>
                </form>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>