<?php
class Administrator extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        if (!isset($this->session->admin_nama)) {
            redirect('Admin');
        }
        $this->load->model('M_admin');
    }

    function index()
    {
        $x['title'] = "Admin";
        $x['admin'] = $this->M_admin->get_admin();
        $this->load->view('admin/template/V_header', $x);
        $this->load->view('admin/V_admin', $x);
        $this->load->view('admin/template/V_footer');
    }
    function get_data()
    {
        $id = $this->input->post('id');
        $a = $this->db->query("SELECT * FROM tbl_admin WHERE admin_id = '$id' ")->row_array();

?>
        <div id="alert_edit"></div>
        <div class="modal-body">
            <div class="form-group">
                <label>No HP</label>
                <input type="number" id="nohp" class="form-control" value="<?= $a['admin_nohp']; ?>">
            </div>
            <div class="form-group">
                <label>Nama</label>
                <input type="text" id="nama" class="form-control" value="<?= $a['admin_nama']; ?>">
            </div>
            <div class="form-group">
                <label>Email</label>
                <input type="text" id="email" class="form-control" value="<?= $a['admin_email']; ?>">
            </div>
            <div class="form-group">
                <label>Kata sandi</label>
                <input type="password" autocomplete="off" id="password" class="form-control" placeholder="Tulis untuk mengganti">
                <input type="hidden" id="password_default" value="<?= $a['admin_password']; ?>" class="form-control">
            </div>
            <div class="form-group">
                <label>Perizinan</label>
                <style>
                    .perm-icon {
                        width: 1%;
                    }

                    .perm-check {
                        width: 20px;
                    }
                </style>
                <script>
                    function selectRow(row) {
                        var inp = $(row).find("input")[0];
                        inp.checked = !inp.checked;
                        if ($(inp).hasClass("perm-order")) $(".perm-orders").prop("checked", $(".perm-order").prop("checked"));
                        if ($(inp).hasClass("perm-orders"))
                            if ($(".perm-orders:checked").length) $(".perm-order").prop("checked", true);
                            else $(".perm-order").prop("checked", false);
                        if ($(inp).hasClass("perm-data")) $(".perm-datas").prop("checked", $(".perm-data").prop("checked"));
                        if ($(inp).hasClass("perm-datas"))
                            if ($(".perm-datas:checked").length) $(".perm-data").prop("checked", true);
                            else $(".perm-data").prop("checked", false);
                        if ($(inp).hasClass("perm-template")) $(".perm-templates").prop("checked", $(".perm-template").prop("checked"));
                        if ($(inp).hasClass("perm-templates"))
                            if ($(".perm-templates:checked").length) $(".perm-template").prop("checked", true);
                            else $(".perm-template").prop("checked", false);
                        if ($(inp).hasClass("perm-image")) $(".perm-images").prop("checked", $(".perm-image").prop("checked"));
                        if ($(inp).hasClass("perm-images"))
                            if ($(".perm-images:checked").length) $(".perm-image").prop("checked", true);
                            else $(".perm-image").prop("checked", false);

                    }
                </script>
                <table class="table" style="cursor: default;">
                    <tr onclick="selectRow(this)">
                        <td class="perm-icon">
                            <i class="ni ni-shop text-primary"></i>
                        </td>
                        <td colspan="2">Dashboard</td>
                        <td class="perm-check">
                            <input type="checkbox" name="perm-dashboard" id="perm-dashboard">
                        </td>
                    </tr>
                    <tr onclick="selectRow(this)">
                        <td class="perm-icon">
                            <i class="ni ni-cart text-green"></i>
                        </td>
                        <td colspan="2">Order</td>
                        <td class="perm-check">
                            <input class="perm-order" type="checkbox" name="perm-order" id="perm-order">
                        </td>
                    </tr>

                    <tr onclick="selectRow(this)">
                        <td></td>
                        <td class="perm-icon">
                            <i class="fa fa-check"></i>
                        </td>
                        <td>VERIFIKASI</td>
                        <td class="perm-check">
                            <input class="perm-orders" type="checkbox" name="perm-verifikasi" id="perm-verifikasi">
                        </td>
                    </tr>
                    <tr onclick="selectRow(this)">
                        <td></td>
                        <td class="perm-icon">
                            <i class="fa fa-image"></i>
                        </td>
                        <td>KIRIM DESIGN</td>
                        <td class="perm-check">
                            <input class="perm-orders" type="checkbox" name="perm-kirimdesign" id="perm-kirimdesign">
                        </td>
                    </tr>
                    <tr onclick="selectRow(this)">
                        <td></td>
                        <td class="perm-icon">
                            <i class="fa fa-credit-card"></i>
                        </td>
                        <td>PEMBAYARAN</td>
                        <td class="perm-check">
                            <input class="perm-orders" type="checkbox" name="perm-pembayaran" id="perm-pembayaran">
                        </td>
                    </tr>
                    <tr onclick="selectRow(this)">
                        <td></td>
                        <td class="perm-icon">
                            <i class="fa fa-check"></i>
                        </td>
                        <td>APPROVAL</td>
                        <td class="perm-check">
                            <input class="perm-orders" type="checkbox" name="perm-approval" id="perm-approval">
                        </td>
                    </tr>
                    <tr onclick="selectRow(this)">
                        <td></td>
                        <td class="perm-icon">
                            <i class="fa fa-print"></i>
                        </td>
                        <td>CETAK PRODUK</td>
                        <td class="perm-check">
                            <input class="perm-orders" type="checkbox" name="perm-cetakproduk" id="perm-cetakproduk">
                        </td>
                    </tr>
                    <tr onclick="selectRow(this)">
                        <td></td>
                        <td class="perm-icon">
                            <i class="fa fa-truck"></i>
                        </td>
                        <td>KIRIM / AMBIL</td>
                        <td class="perm-check">
                            <input class="perm-orders" type="checkbox" name="perm-kirimambil" id="perm-kirimambil">
                        </td>
                    </tr>

                    <tr onclick="selectRow(this)">
                        <td class="perm-icon">
                            <i class="ni ni-cart text-green"></i>
                        </td>
                        <td colspan="2">Order</td>
                        <td class="perm-check">
                            <input type="checkbox" name="perm-order" id="perm-order">
                        </td>
                    </tr>
                    <tr onclick="selectRow(this)">
                        <td class="perm-icon">
                            <i class="fa fa-history text-green"></i>
                        </td>
                        <td colspan="2">Order History</td>
                        <td class="perm-check">
                            <input type="checkbox" name="perm-orderhistory" id="perm-orderhistory">
                        </td>
                    </tr>
                    <tr onclick="selectRow(this)">
                        <td class="perm-icon">
                            <i class="ni ni-single-copy-04 text-info"></i>
                        </td>
                        <td colspan="2">Data</td>
                        <td class="perm-check">
                            <input class="perm-data" type="checkbox" name="perm-data" id="perm-data">
                        </td>
                    </tr>

                    <tr onclick="selectRow(this)">
                        <td></td>
                        <td class="perm-icon"></td>
                        <td>Data Pelanggan</td>
                        <td class="perm-check">
                            <input class="perm-datas" type="checkbox" name="perm-datapelanggan" id="perm-datapelanggan">
                        </td>
                    </tr>
                    <tr onclick="selectRow(this)">
                        <td></td>
                        <td class="perm-icon"></td>
                        <td>Data Produk</td>
                        <td class="perm-check">
                            <input class="perm-datas" type="checkbox" name="perm-dataproduk" id="perm-dataproduk">
                        </td>
                    </tr>
                    <tr onclick="selectRow(this)">
                        <td></td>
                        <td class="perm-icon"></td>
                        <td>Data Penjualan</td>
                        <td class="perm-check">
                            <input class="perm-datas" type="checkbox" name="perm-datapenjualan" id="perm-datapenjualan">
                        </td>
                    </tr>

                    <tr onclick="selectRow(this)">
                        <td class="perm-icon">
                            <i class="ni ni-bullet-list-67 text-primary"></i>
                        </td>
                        <td colspan="2">Category</td>
                        <td class="perm-check">
                            <input type="checkbox" name="perm-category" id="perm-category">
                        </td>
                    </tr>
                    <tr onclick="selectRow(this)">
                        <td class="perm-icon">
                            <i class="ni ni-box-2 text-danger"></i>
                        </td>
                        <td colspan="2">Product</td>
                        <td class="perm-check">
                            <input type="checkbox" name="perm-produk" id="perm-produk">
                        </td>
                    </tr>
                    <tr onclick="selectRow(this)">
                        <td class="perm-icon">
                            <i class="ni ni-image text-green"></i>
                        </td>
                        <td colspan="2">Template</td>
                        <td class="perm-check">
                            <input class="perm-template" type="checkbox" name="perm-template" id="perm-template">
                        </td>
                    </tr>

                    <tr onclick="selectRow(this)">
                        <td></td>
                        <td class="perm-icon">
                            <i class="ni ni-image text-green"></i>
                        </td>
                        <td>Template Assets</td>
                        <td class="perm-check">
                            <input class="perm-templates" type="checkbox" name="perm-templateassets" id="perm-templateassets">
                        </td>
                    </tr>
                    <tr onclick="selectRow(this)">
                        <td></td>
                        <td class="perm-icon">
                            <i class="ni ni-image text-green"></i>
                        </td>
                        <td>Template Pelanggan</td>
                        <td class="perm-check">
                            <input class="perm-templates" type="checkbox" name="perm-templatepelanggan" id="perm-templatepelanggan">
                        </td>
                    </tr>

                    <tr onclick="selectRow(this)">
                        <td class="perm-icon">
                            <i class="ni ni-image text-info"></i>
                        </td>
                        <td colspan="2">Image</td>
                        <td class="perm-check">
                            <input class="perm-image" type="checkbox" name="perm-image" id="perm-image">
                        </td>
                    </tr>

                    <tr onclick="selectRow(this)">
                        <td></td>
                        <td class="perm-icon">
                        </td>
                        <td>Image Assets</td>
                        <td class="perm-check">
                            <input class="perm-images" type="checkbox" name="perm-imageassets" id="perm-imageassets">
                        </td>
                    </tr>
                    <tr onclick="selectRow(this)">
                        <td></td>
                        <td class="perm-icon">
                        </td>
                        <td>Image Pelanggan</td>
                        <td class="perm-check">
                            <input class="perm-images" type="checkbox" name="perm-pelanggan" id="perm-pelanggan">
                        </td>
                    </tr>

                    <tr onclick="selectRow(this)">
                        <td class="perm-icon">
                            <i class="ni ni-single-02 text-info"></i>
                        </td>
                        <td colspan="2">Pelanggan</td>
                        <td class="perm-check">
                            <input type="checkbox" name="perm-pelanggan" id="perm-pelanggan">
                        </td>
                    </tr>
                    <tr onclick="selectRow(this)">
                        <td class="perm-icon">
                            <i class="ni ni-circle-08 text-orange"></i>
                        </td>
                        <td colspan="2">Customer Services</td>
                        <td class="perm-check">
                            <input type="checkbox" name="perm-customerservices" id="perm-customerservices">
                        </td>
                    </tr>
                    <tr onclick="selectRow(this)">
                        <td class="perm-icon">
                            <i class="ni ni-tag text-info"></i>
                        </td>
                        <td colspan="2">Status</td>
                        <td class="perm-check">
                            <input type="checkbox" name="perm-status" id="perm-status">
                        </td>
                    </tr>
                    <tr onclick="selectRow(this)">
                        <td class="perm-icon">
                            <i class="ni ni-credit-card text-success"></i>
                        </td>
                        <td colspan="2">Bank</td>
                        <td class="perm-check">
                            <input type="checkbox" name="perm-bank" id="perm-bank">
                        </td>
                    </tr>
                    <tr onclick="selectRow(this)">
                        <td class="perm-icon">
                            <i class="ni ni-single-02 text-warning"></i>
                        </td>
                        <td colspan="2">Admin</td>
                        <td class="perm-check">
                            <input type="checkbox" name="perm-admin" id="perm-admin">
                        </td>
                    </tr>
                </table>
            </div>
        </div>
        <div class="modal-footer">
            <button id="<?= $a['admin_id']; ?>" type="button" class="btn btn-primary update">Save</button>
            <button type="button" class="btn btn-link  ml-auto" data-dismiss="modal">Close</button>
        </div>
        </div>
<?php

    }
    function tambah_admin()
    {
        $id = 'A-' . time();
        $no_hp = $this->input->post('nohp');
        $nama = $this->input->post('nama');
        $email = $this->input->post('email');
        $password = md5($this->input->post('password'));
        $nohp = str_replace(" ", "", $no_hp);
        if (substr(trim($nohp), 0, 1) == '0') {
            $hp = '62' . substr(trim($nohp), 1);
        } else {
            $hp = $no_hp;
        }

        $this->M_admin->tambah_admin($id, $hp, $nama, $email, $password);
        redirect('Administrator');
    }
    function update_admin()
    {
        $id = $this->input->post('id');
        $nohp = str_replace(" ", "", $this->input->post('nohp'));
        $no_hp = $this->input->post('nohp');
        $nama = $this->input->post('nama');
        $email = $this->input->post('email');
        $password = md5($this->input->post('password'));
        $password_default = $this->input->post('password_default');
        if (substr(trim($nohp), 0, 1) == '0') {
            $hp = '62' . substr(trim($nohp), 1);
        } else {
            $hp = $no_hp;
        }

        if (empty($password)) {
            $p = $password_default;
        } else {
            $p = $password;
        }

        $this->M_admin->update_admin($id, $hp, $nama, $email, $p);
    }
    function hapus_admin()
    {
        $id = $this->input->post('id');
        $this->M_admin->hapus_admin($id);
    }
}
