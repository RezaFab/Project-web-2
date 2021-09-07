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
                                    <br><br>
                                    <input type="radio" id="persona1" placeholder="Personalisasi" name="personalisasi" value="1">
                                    <label for="persona1">Blanko</label><br>
                                    <input type="radio" id="persona2" placeholder="Personalisasi" name="personalisasi" value="2">
                                    <label for="persona2">Nomerator</label><br>
                                    <input type="radio" id="persona3" placeholder="Personalisasi" name="personalisasi" value="3">
                                    <label for="persona3">Barcode</label><br>
                                    <input type="radio" id="persona4" placeholder="Personalisasi" name="personalisasi" value="4">
                                    <label for="persona4">Data</label><br>
                                    <input type="radio" id="persona5" placeholder="Personalisasi" name="personalisasi" value="5">
                                    <label for="persona5">Data + Foto</label>

                                </div>
                                <div class="grid-item">
                                    <b>Coating</b>
                                    <br><br>
                                    <input type="radio" id="coating1" placeholder="Coating" name="coating" value="1">
                                    <label for="coating1">Glossy</label><br>
                                    <input type="radio" id="coating2" placeholder="Coating" name="coating" value="2">
                                    <label for="coating2">Doff</label><br>
                                    <input type="radio" id="coating3" placeholder="Coating" name="coating" value="3">
                                    <label for="coating3">Glossy + Doff</label>
                                </div>
                                <div class="grid-item">
                                    <b>Finishing</b>
                                    <br><br>
                                    <input type="radio" id="finish1" placeholder="Finishing" name="finishing" value="1">
                                    <label for="finish1">Tidak ada</label><br>
                                    <input type="radio" id="finish2" placeholder="Finishing" name="finishing" value="2">
                                    <label for="finish2">Urutkan</label><br>
                                    <input type="radio" id="finish3" placeholder="Finishing" name="finishing" value="3">
                                    <label for="finish3">Label Gosok</label><br>
                                    <input type="radio" id="finish4" placeholder="Finishing" name="finishing" value="4">
                                    <label for="finish4">Plong Oval</label><br>
                                    <input type="radio" id="finish5" placeholder="Finishing" name="finishing" value="5">
                                    <label for="finish5">Plong Bulat</label><br>
                                    <input type="radio" id="finish6" placeholder="Finishing" name="finishing" value="6">
                                    <label for="finish6">Copy Data RFID</label><br>
                                    <input type="radio" id="finish7" placeholder="Finishing" name="finishing" value="7">
                                    <label for="finish7">Emboss Silver</label><br>
                                    <input type="radio" id="finish8" placeholder="Finishing" name="finishing" value="8">
                                    <label for="finish8">Emboss Gold</label><br>
                                    <input type="radio" id="finish9" placeholder="Finishing" name="finishing" value="9">
                                    <label for="finish9">Panel</label><br>
                                    <input type="radio" id="finish10" placeholder="Finishing" name="finishing" value="10">
                                    <label for="finish10">Hot Print</label><br>
                                    <input type="radio" id="finish11" placeholder="Finishing" name="finishing" value="11">
                                    <label for="finish11">Swipe</label><br>
                                </div>
                                <div class="grid-item">
                                    <b>Function</b>
                                    <br><br>
                                    <input type="radio" id="function1" placeholder="Function" name="function" value="1">
                                    <label for="function1">Print Thermal</label><br>
                                    <input type="radio" id="function2" placeholder="Function" name="function" value="2">
                                    <label for="function2">Scan Barcode</label><br>
                                    <input type="radio" id="function3" placeholder="Function" name="function" value="3">
                                    <label for="function3">Swipe Magnetic</label><br>
                                    <input type="radio" id="function4" placeholder="Function" name="function" value="4">
                                    <label for="function4">Tap RFID</label>
                                </div>
                                <div class="grid-item">
                                    <b>Packaging</b>
                                    <br><br>
                                    <input type="radio" id="packaging1" placeholder="Packaging" name="packaging" value="1">
                                    <label for="packaging1">Plastik 1 on 1</label><br>
                                    <input type="radio" id="packaging2" placeholder="Packaging" name="packaging" value="2">
                                    <label for="packaging2">Plastik Terpisah</label><br>
                                    <input type="radio" id="packaging3" placeholder="Packaging" name="packaging" value="3">
                                    <label for="packaging3">Box Kartu Nama</label><br>
                                    <input type="radio" id="packaging4" placeholder="Packaging" name="packaging" value="4">
                                    <label for="packaging4">Box Putih</label><br>
                                    <input type="radio" id="packaging5" placeholder="Packaging" name="packaging" value="5">
                                    <label for="packaging5">Small UCARD</label><br>
                                    <input type="radio" id="packaging6" placeholder="Packaging" name="packaging" value="6">
                                    <label for="packaging6">Small Maxi UCARD</label><br>
                                    <input type="radio" id="packaging7" placeholder="Packaging" name="packaging" value="7">
                                    <label for="packaging7">Large UCARD</label><br>
                                    <input type="radio" id="packaging8" placeholder="Packaging" name="packaging" value="8">
                                    <label for="packaging8">Large Maxi UCARD</label>
                                </div>
                                <div class="grid-item">
                                    <b>Ambil/Kirim</b>
                                    <br><br>
                                    <input type="radio" id="kirim" placeholder="Ambil/Kirim" name="status" value="1">
                                    <label for="kirim">Kirim Product</label><br>
                                    <input type="radio" id="ambil" placeholder="Ambil/Kirim" name="Status" value="2">
                                    <label for="ambil">Ambil Sendiri</label>
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