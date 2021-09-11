
    <div class="header bg-primary pb-3">
      <div class="container-fluid">
        <div class="header-body">
          <!-- Card stats -->
          <div class="row">
          <div class="col-xl-4 col-md-6">
              <div class="card card-stats">
                <!-- Card body -->
                <a href="<?= base_url('Order/verifikasi') ?>">
                <div class="card-body">
                  <div class="row">
                    <div class="col">
                      <h5 class="card-title text-uppercase text-muted mb-0">VERIFIKASI</h5>
                      <span class="h2 font-weight-bold mb-0 c_v">0</span>
                    </div>
                    <div class="col-auto">
                      <div class="icon icon-shape bg-gradient-green text-white rounded-circle shadow">
                        <i class="fa fa-check"></i>
                      </div>
                    </div>
                  </div>
                </div>
                </a>
              </div>
            </div>
          <div class="col-xl-4 col-md-6">
              <div class="card card-stats">
                <!-- Card body -->
                <a href="<?= base_url('Order/kirim_design') ?>">
                <div class="card-body">
                  <div class="row">
                    <div class="col">
                      <h5 class="card-title text-uppercase text-muted mb-0">KIRIM DESIGN</h5>
                      <span class="h2 font-weight-bold mb-0"><?= $kd['kd'] ?></span>
                    </div>
                    <div class="col-auto">
                      <div class="icon icon-shape bg-gradient-green text-white rounded-circle shadow">
                        <i class="fa fa-image"></i>
                      </div>
                    </div>
                  </div>
                </div>
                </a>
              </div>
            </div>
          <div class="col-xl-4 col-md-6">
              <div class="card card-stats">
                <!-- Card body -->
                <a href="<?= base_url('Order/pembayaran') ?>">
                <div class="card-body">
                  <div class="row">
                    <div class="col">
                      <h5 class="card-title text-uppercase text-muted mb-0">PEMBAYARAN</h5>
                      <span class="h2 font-weight-bold mb-0"><?= $pmb['pmb'] ?></span>
                    </div>
                    <div class="col-auto">
                      <div class="icon icon-shape bg-gradient-green text-white rounded-circle shadow">
                        <i class="fa fa-credit-card"></i>
                      </div>
                    </div>
                  </div>
                </div>
                </a>
              </div>
            </div>
          <div class="col-xl-4 col-md-6">
              <div class="card card-stats">
                <!-- Card body -->
                <a href="<?= base_url('Order/approval') ?>">
                <div class="card-body">
                  <div class="row">
                    <div class="col">
                      <h5 class="card-title text-uppercase text-muted mb-0">APPROVAL</h5>
                      <span class="h2 font-weight-bold mb-0"><?= $apv['apv'] ?></span>
                    </div>
                    <div class="col-auto">
                      <div class="icon icon-shape bg-gradient-green text-white rounded-circle shadow">
                        <i class="fa fa-check"></i>
                      </div>
                    </div>
                  </div>
                </div>
                </a>
              </div>
            </div>
          <div class="col-xl-4 col-md-6">
              <div class="card card-stats">
                <!-- Card body -->
                <a href="<?= base_url('Order/cetak_produk') ?>">
                <div class="card-body">
                  <div class="row">
                    <div class="col">
                      <h5 class="card-title text-uppercase text-muted mb-0">CETAK PRODUK</h5>
                      <span class="h2 font-weight-bold mb-0"><?= $ctk['ctk'] ?></span>
                    </div>
                    <div class="col-auto">
                      <div class="icon icon-shape bg-gradient-green text-white rounded-circle shadow">
                        <i class="fa fa-print"></i>
                      </div>
                    </div>
                  </div>
                </div>
                </a>
              </div>
            </div>
          <div class="col-xl-4 col-md-6">
              <div class="card card-stats">
                <!-- Card body -->
                <a href="<?= base_url('Order/kirim_ambil') ?>">
                <div class="card-body">
                  <div class="row">
                    <div class="col">
                      <h5 class="card-title text-uppercase text-muted mb-0">KIRIM / AMBIL</h5>
                      <span class="h2 font-weight-bold mb-0"><?= $k_a['k_a'] ?></span>
                    </div>
                    <div class="col-auto">
                      <div class="icon icon-shape bg-gradient-green text-white rounded-circle shadow">
                        <i class="fa fa-truck"></i>
                      </div>
                    </div>
                  </div>
                </div>
                </a>
              </div>
            </div>
            
          </div>
        </div>
      </div>
    </div>
    <div class="container-fluid mt-5">
    <div class="row">
    <div class="col-xl-6">
              <div class="card card-stats">
                <!-- Card body -->
                <a href="<?= base_url('Pelanggan') ?>">
                <div class="card-body">
                  <div class="row">
                    <div class="col">
                      <h5 class="card-title text-uppercase text-muted mb-0">Pelanggan</h5>
                      <span class="h2 font-weight-bold mb-0"><?= $pelanggan['pelanggan'] ?></span>
                    </div>
                    <div class="col-auto">
                      <div class="icon icon-shape bg-gradient-red text-white rounded-circle shadow">
                        <i class="ni ni-single-02"></i>
                      </div>
                    </div>
                  </div>
                </div>
                </a>
              </div>
            </div>
            <div class="col-xl-6">
              <div class="card card-stats">
                <!-- Card body -->
                <a href="<?= base_url('Product') ?>">
                <div class="card-body">
                  <div class="row">
                    <div class="col">
                      <h5 class="card-title text-uppercase text-muted mb-0">Product</h5>
                      <span class="h2 font-weight-bold mb-0"><?= $product['product'] ?></span>
                    </div>
                    <div class="col-auto">
                      <div class="icon icon-shape bg-gradient-orange text-white rounded-circle shadow">
                        <i class="ni ni-box-2"></i>
                      </div>
                    </div>
                  </div>
                </div>
                </a>
              </div>
            </div>
            <div class="col-xl-6">
              <div class="card card-stats">
                <!-- Card body -->
                <div class="card-body">
                  <div class="row">
                    <div class="col">
                      <h5 class="card-title text-uppercase text-muted mb-0">Hasil Bulan Lalu</h5>
                      <span class="h2 font-weight-bold mb-0">Rp. <?= number_format($p_b_l['p_b_l']) ?></span>
                    </div>
                    <div class="col-auto">
                      <div class="icon icon-shape bg-gradient-blue text-white rounded-circle shadow">
                        <i class="fa fa-chart-line"></i>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-xl-6">
              <div class="card card-stats">
                <!-- Card body -->
                <div class="card-body">
                  <div class="row">
                    <div class="col">
                      <h5 class="card-title text-uppercase text-muted mb-0">Hasil Bulan Ini</h5>
                      <span class="h2 font-weight-bold mb-0">Rp. <?= number_format($p_b_i['p_b_i']) ?></span>
                    </div>
                    <div class="col-auto">
                      <div class="icon icon-shape bg-gradient-blue text-white rounded-circle shadow">
                        <i class="fa fa-chart-line"></i>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
    </div>
    </div>