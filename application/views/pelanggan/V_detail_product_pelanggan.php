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

    .grid-container {
        display: inline-grid;
        grid-template-columns: auto auto;
        background-color: #FFFFFF;
        width: 100%;
    }

    .grid-item {
        width: 100%;
        background-color: #FFFFFF;
        border: 0px solid rgba(202, 0, 0, 0.8);
        padding: 20px;
        font-size: 15px;
    }

    .item1 {
        width: 100%;
        grid-column: 2;
    }

    .solid {
        border-style: solid;
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
                        <img class="img-fluid" style="width: 500px;" src="<?= base_url('image/' . $p['product_image']) ?>">
                    </div>
                    <div class="col-md-6">
                        <div>
                            <br>
                            <b>Nama</b>
                            <p><?= $p['product_nama'] ?></p>
                            <b>Deskripsi</b>
                            <p><?= $p['product_deskripsi'] ?></p>
                            <b>Keunggulan</b>
                            <p><?= $p['product_keunggulan'] ?></p>
                            <b>Keterangan</b>
                            <p><?= $p['product_keterangan'] ?></p>
                        </div>
                        <br>
                        <form method="post" onsubmit="if(document.getElementById('agree').checked) { return true; } else { alert('Silahkan baca dan setujui syarat & ketentuan yang berlaku terlebih dahulu'); return false; }" action="<?= base_url('Detail_product_pelanggan/order') ?>">
                            <input type="hidden" value="<?= $p['product_id'] ?>" name="id_product">
                            <input type="hidden" value="<?= $_SESSION['pelanggan_nohp'] ?>" name="nohp">
                            <div class="form-group">
                                <input type="number" placeholder="jumlah" name="jumlah" class="form-control">
                                <input type="hidden" value="<?= $p['product_harga'] ?>" name="harga">
                            </div>
                            <div class="grid-container">
                                <div class="grid-item">
                                    <b>Personalisasi</b>
                                    <br>
                                    <br>
                                    <input type="radio" id="persona1" placeholder="Personalisasi" name="persona1" value="1">
                                    <label for="persona1">Blanko</label><br>
                                    <input type="radio" id="persona2" placeholder="Personalisasi" name="persona2" value="2">
                                    <label for="persona2">Nomerator</label><br>
                                    <input type="radio" id="persona3" placeholder="Personalisasi" name="persona3" value="3">
                                    <label for="persona3">Barcode</label><br>
                                    <input type="radio" id="persona4" placeholder="Personalisasi" name="persona4" value="4">
                                    <label for="persona4">Data</label><br>
                                    <input type="radio" id="persona5" placeholder="Personalisasi" name="persona5" value="5">
                                    <label for="persona5">Data + Foto</label>
                                </div>
                                <div class="grid-item">
                                    <b> </b>
                                </div>
                            </div>
                            <div class="form-group">
                                <textarea class="form-control" name="keterangan" placeholder="Keterangan"></textarea>
                            </div>
                            <br>
                            <input type="checkbox" name="checkbox" value="check" id="agree"></a>
                            <label for="agree">Saya telah membaca & menyetujui <a href="#">Syarat & Ketentuan</label>
                            <br>
                            <button type="submit" class="btn btn-info">Order</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>