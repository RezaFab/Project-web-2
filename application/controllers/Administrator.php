<?php
class Administrator extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        if (!isset($this->session->admin_nama)) {
            redirect('Admin');
        }
        if (!$this->M_admin->check_permission('admin')) redirect('Dashboard');
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
        <div class="modal-body pb-0">
            <div class="form-group">
                <label>No HP</label>
                <input type="number" name="nohp" class="form-control" value="<?= $a['admin_nohp']; ?>">
            </div>
            <div class="form-group">
                <label>Nama</label>
                <input type="text" name="nama" class="form-control" value="<?= $a['admin_nama']; ?>">
            </div>
            <div class="form-group">
                <label>Email</label>
                <input type="text" name="email" class="form-control" value="<?= $a['admin_email']; ?>">
            </div>
            <div class="form-group">
                <label>Kata sandi</label>
                <input type="password" autocomplete="off" name="password" class="form-control" placeholder="Tulis di sini untuk mengganti">
                <input type="hidden" name="password_default" value="<?= $a['admin_password']; ?>" class="form-control">
            </div>
            <div class="form-group m-0">
                <label>Perizinan</label>
                <style>
                    .perm_icon {
                        width: 1%;
                    }

                    .perm_check {
                        width: 20px;
                    }
                </style>
                <script>
                    $('#tblPerm tr').click(function() {
                        var inp = $(this).find("input")[0];
                        if (!$(inp).is('#perm_dashboard')) {
                            inp.checked = !inp.checked;
                            if ($(inp).hasClass("perm_order")) $(".perm_orders").prop("checked", $(".perm_order").prop("checked"));
                            if ($(inp).hasClass("perm_orders"))
                                if ($(".perm_orders:checked").length) $(".perm_order").prop("checked", true);
                                else $(".perm_order").prop("checked", false);
                            if ($(inp).hasClass("perm_data")) $(".perm_datas").prop("checked", $(".perm_data").prop("checked"));
                            if ($(inp).hasClass("perm_datas"))
                                if ($(".perm_datas:checked").length) $(".perm_data").prop("checked", true);
                                else $(".perm_data").prop("checked", false);
                            if ($(inp).hasClass("perm_template")) $(".perm_templates").prop("checked", $(".perm_template").prop("checked"));
                            if ($(inp).hasClass("perm_templates"))
                                if ($(".perm_templates:checked").length) $(".perm_template").prop("checked", true);
                                else $(".perm_template").prop("checked", false);
                            if ($(inp).hasClass("perm_image")) $(".perm_images").prop("checked", $(".perm_image").prop("checked"));
                            if ($(inp).hasClass("perm_images"))
                                if ($(".perm_images:checked").length) $(".perm_image").prop("checked", true);
                                else $(".perm_image").prop("checked", false);
                        }
                    });
                    $('#tblPerm input').click(function() {
                        this.checked = !this.checked;
                    })
                </script>
                <table id="tblPerm" class="table m-0" style="cursor: default;">
                    <tbody>
                        <tr>
                            <td class="perm_icon">
                                <i class="ni ni-shop text-primary"></i>
                            </td>
                            <td colspan="2">Dashboard</td>
                            <td class="perm_check">
                                <input type="checkbox" value="1" name="perm_dashboard" id="perm_dashboard" checked disabled>
                            </td>
                        </tr>
                        <tr>
                            <td class="perm_icon">
                                <i class="ni ni-cart text-green"></i>
                            </td>
                            <td colspan="2">Order</td>
                            <td class="perm_check">
                                <input class="perm_order" type="checkbox" value="1" name="perm_order" id="perm_order" <?= $a['admin_perm_order'] == 1 ? 'checked' : ''; ?>>
                            </td>
                        </tr>

                        <tr>
                            <td></td>
                            <td class="perm_icon">
                                <i class="fa fa-check"></i>
                            </td>
                            <td>VERIFIKASI</td>
                            <td class="perm_check">
                                <input class="perm_orders" type="checkbox" value="1" name="perm_orderverifikasi" id="perm_orderverifikasi" <?= $a['admin_perm_orderverifikasi'] == 1 ? 'checked' : ''; ?>>
                            </td>
                        </tr>
                        <tr>
                            <td></td>
                            <td class="perm_icon">
                                <i class="fa fa-image"></i>
                            </td>
                            <td>KIRIM DESIGN</td>
                            <td class="perm_check">
                                <input class="perm_orders" type="checkbox" value="1" name="perm_orderkirimdesign" id="perm_orderkirimdesign" <?= $a['admin_perm_orderkirimdesign'] == 1 ? 'checked' : ''; ?>>
                            </td>
                        </tr>
                        <tr>
                            <td></td>
                            <td class="perm_icon">
                                <i class="fa fa-credit-card"></i>
                            </td>
                            <td>PEMBAYARAN</td>
                            <td class="perm_check">
                                <input class="perm_orders" type="checkbox" value="1" name="perm_orderpembayaran" id="perm_orderpembayaran" <?= $a['admin_perm_orderpembayaran'] == 1 ? 'checked' : ''; ?>>
                            </td>
                        </tr>
                        <tr>
                            <td></td>
                            <td class="perm_icon">
                                <i class="fa fa-check"></i>
                            </td>
                            <td>APPROVAL</td>
                            <td class="perm_check">
                                <input class="perm_orders" type="checkbox" value="1" name="perm_orderapproval" id="perm_orderapproval" <?= $a['admin_perm_orderapproval'] == 1 ? 'checked' : ''; ?>>
                            </td>
                        </tr>
                        <tr>
                            <td></td>
                            <td class="perm_icon">
                                <i class="fa fa-print"></i>
                            </td>
                            <td>CETAK PRODUK</td>
                            <td class="perm_check">
                                <input class="perm_orders" type="checkbox" value="1" name="perm_ordercetakproduk" id="perm_ordercetakproduk" <?= $a['admin_perm_ordercetakproduk'] == 1 ? 'checked' : ''; ?>>
                            </td>
                        </tr>
                        <tr>
                            <td></td>
                            <td class="perm_icon">
                                <i class="fa fa-truck"></i>
                            </td>
                            <td>KIRIM / AMBIL</td>
                            <td class="perm_check">
                                <input class="perm_orders" type="checkbox" value="1" name="perm_orderkirimambil" id="perm_orderkirimambil" <?= $a['admin_perm_orderkirimambil'] == 1 ? 'checked' : ''; ?>>
                            </td>
                        </tr>

                        <tr>
                            <td class="perm_icon">
                                <i class="fa fa-history text-green"></i>
                            </td>
                            <td colspan="2">Order History</td>
                            <td class="perm_check">
                                <input type="checkbox" value="1" name="perm_orderhistory" id="perm_orderhistory" <?= $a['admin_perm_orderhistory'] == 1 ? 'checked' : ''; ?>>
                            </td>
                        </tr>
                        <tr>
                            <td class="perm_icon">
                                <i class="ni ni-single-copy-04 text-info"></i>
                            </td>
                            <td colspan="2">Data</td>
                            <td class="perm_check">
                                <input class="perm_data" type="checkbox" value="1" name="perm_data" id="perm_data" <?= $a['admin_perm_data'] == 1 ? 'checked' : ''; ?>>
                            </td>
                        </tr>

                        <tr>
                            <td></td>
                            <td class="perm_icon">
                                <i class="ni ni-single-copy-04 text-info"></i>
                            </td>
                            <td>Data Pelanggan</td>
                            <td class="perm_check">
                                <input class="perm_datas" type="checkbox" value="1" name="perm_datapelanggan" id="perm_datapelanggan" <?= $a['admin_perm_datapelanggan'] == 1 ? 'checked' : ''; ?>>
                            </td>
                        </tr>
                        <tr>
                            <td></td>
                            <td class="perm_icon">
                                <i class="ni ni-single-copy-04 text-info"></i>
                            </td>
                            <td>Data Produk</td>
                            <td class="perm_check">
                                <input class="perm_datas" type="checkbox" value="1" name="perm_dataproduk" id="perm_dataproduk" <?= $a['admin_perm_dataproduk'] == 1 ? 'checked' : ''; ?>>
                            </td>
                        </tr>
                        <tr>
                            <td></td>
                            <td class="perm_icon">
                                <i class="ni ni-single-copy-04 text-info"></i>
                            </td>
                            <td>Data Penjualan</td>
                            <td class="perm_check">
                                <input class="perm_datas" type="checkbox" value="1" name="perm_datapenjualan" id="perm_datapenjualan" <?= $a['admin_perm_datapenjualan'] == 1 ? 'checked' : ''; ?>>
                            </td>
                        </tr>

                        <tr>
                            <td class="perm_icon">
                                <i class="ni ni-bullet-list-67 text-primary"></i>
                            </td>
                            <td colspan="2">Category</td>
                            <td class="perm_check">
                                <input type="checkbox" value="1" name="perm_category" id="perm_category" <?= $a['admin_perm_category'] == 1 ? 'checked' : ''; ?>>
                            </td>
                        </tr>
                        <tr>
                            <td class="perm_icon">
                                <i class="ni ni-box-2 text-danger"></i>
                            </td>
                            <td colspan="2">Product</td>
                            <td class="perm_check">
                                <input type="checkbox" value="1" name="perm_produk" id="perm_produk" <?= $a['admin_perm_produk'] == 1 ? 'checked' : ''; ?>>
                            </td>
                        </tr>
                        <tr>
                            <td class="perm_icon">
                                <i class="ni ni-image text-green"></i>
                            </td>
                            <td colspan="2">Template</td>
                            <td class="perm_check">
                                <input class="perm_template" type="checkbox" value="1" name="perm_template" id="perm_template" <?= $a['admin_perm_template'] == 1 ? 'checked' : ''; ?>>
                            </td>
                        </tr>

                        <tr>
                            <td></td>
                            <td class="perm_icon">
                                <i class="ni ni-image text-green"></i>
                            </td>
                            <td>Template Assets</td>
                            <td class="perm_check">
                                <input class="perm_templates" type="checkbox" value="1" name="perm_templateassets" id="perm_templateassets" <?= $a['admin_perm_templateassets'] == 1 ? 'checked' : ''; ?>>
                            </td>
                        </tr>
                        <tr>
                            <td></td>
                            <td class="perm_icon">
                                <i class="ni ni-image text-green"></i>
                            </td>
                            <td>Template Pelanggan</td>
                            <td class="perm_check">
                                <input class="perm_templates" type="checkbox" value="1" name="perm_templatepelanggan" id="perm_templatepelanggan" <?= $a['admin_perm_templatepelanggan'] == 1 ? 'checked' : ''; ?>>
                            </td>
                        </tr>

                        <tr>
                            <td class="perm_icon">
                                <i class="ni ni-image text-info"></i>
                            </td>
                            <td colspan="2">Image</td>
                            <td class="perm_check">
                                <input class="perm_image" type="checkbox" value="1" name="perm_image" id="perm_image" <?= $a['admin_perm_image'] == 1 ? 'checked' : ''; ?>>
                            </td>
                        </tr>

                        <tr>
                            <td></td>
                            <td class="perm_icon">
                                <i class="ni ni-image text-info"></i>
                            </td>
                            <td>Image Assets</td>
                            <td class="perm_check">
                                <input class="perm_images" type="checkbox" value="1" name="perm_imageassets" id="perm_imageassets" <?= $a['admin_perm_imageassets'] == 1 ? 'checked' : ''; ?>>
                            </td>
                        </tr>
                        <tr>
                            <td></td>
                            <td class="perm_icon">
                                <i class="ni ni-image text-info"></i>
                            </td>
                            <td>Image Pelanggan</td>
                            <td class="perm_check">
                                <input class="perm_images" type="checkbox" value="1" name="perm_imagepelanggan" id="perm_imagepelanggan" <?= $a['admin_perm_imagepelanggan'] == 1 ? 'checked' : ''; ?>>
                            </td>
                        </tr>

                        <tr>
                            <td class="perm_icon">
                                <i class="ni ni-single-02 text-info"></i>
                            </td>
                            <td colspan="2">Pelanggan</td>
                            <td class="perm_check">
                                <input type="checkbox" value="1" name="perm_pelanggan" id="perm_pelanggan" <?= $a['admin_perm_pelanggan'] == 1 ? 'checked' : ''; ?>>
                            </td>
                        </tr>
                        <tr>
                            <td class="perm_icon">
                                <i class="ni ni-circle-08 text-orange"></i>
                            </td>
                            <td colspan="2">Customer Services</td>
                            <td class="perm_check">
                                <input type="checkbox" value="1" name="perm_customerservices" id="perm_customerservices" <?= $a['admin_perm_customerservices'] == 1 ? 'checked' : ''; ?>>
                            </td>
                        </tr>
                        <tr>
                            <td class="perm_icon">
                                <i class="ni ni-tag text-info"></i>
                            </td>
                            <td colspan="2">Status</td>
                            <td class="perm_check">
                                <input type="checkbox" value="1" name="perm_status" id="perm_status" <?= $a['admin_perm_status'] == 1 ? 'checked' : ''; ?>>
                            </td>
                        </tr>
                        <tr>
                            <td class="perm_icon">
                                <i class="ni ni-credit-card text-success"></i>
                            </td>
                            <td colspan="2">Bank</td>
                            <td class="perm_check">
                                <input type="checkbox" value="1" name="perm_bank" id="perm_bank" <?= $a['admin_perm_bank'] == 1 ? 'checked' : ''; ?>>
                            </td>
                        </tr>
                        <tr>
                            <td class="perm_icon">
                                <i class="ni ni-single-02 text-warning"></i>
                            </td>
                            <td colspan="2">Admin</td>
                            <td class="perm_check">
                                <input type="checkbox" value="1" name="perm_admin" id="perm_admin" <?= $a['admin_perm_admin'] == 1 ? 'checked' : ''; ?>>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div id="alert_edit"></div>
        </div>
        <div class="modal-footer">
            <input type="hidden" name="admin_id" value="<?= $a['admin_id']; ?>">
            <button type="submit" class="btn btn-primary update">Save</button>
            <button type="button" class="btn btn-link  ml-auto" data-dismiss="modal">Close</button>
        </div>
<?php

    }
    function tambah_admin()
    {
        $nohp = $this->input->post('add_nohp');

        $data = [
            'admin_id'                      => 'A-' . time(),
            'admin_nama'                    => $this->input->post('add_nama'),
            'admin_email'                   => $this->input->post('add_email'),
            'admin_nohp'                    => (substr(trim($nohp), 0, 1) == '0' ? '62' . substr(trim($nohp), 1) : $nohp),
            'admin_password'                => md5($this->input->post('add_password')),
            'admin_perm_dashboard'          => "1",
            'admin_perm_order'              => $this->input->post('add_perm_order')              ?? "0",
            'admin_perm_orderverifikasi'    => $this->input->post('add_perm_orderverifikasi')    ?? "0",
            'admin_perm_orderkirimdesign'   => $this->input->post('add_perm_orderkirimdesign')   ?? "0",
            'admin_perm_orderpembayaran'    => $this->input->post('add_perm_orderpembayaran')    ?? "0",
            'admin_perm_orderapproval'      => $this->input->post('add_perm_orderapproval')      ?? "0",
            'admin_perm_ordercetakproduk'   => $this->input->post('add_perm_ordercetakproduk')   ?? "0",
            'admin_perm_orderkirimambil'    => $this->input->post('add_perm_orderkirimambil')    ?? "0",
            'admin_perm_orderhistory'       => $this->input->post('add_perm_orderhistory')       ?? "0",
            'admin_perm_data'               => $this->input->post('add_perm_data')               ?? "0",
            'admin_perm_datapelanggan'      => $this->input->post('add_perm_datapelanggan')      ?? "0",
            'admin_perm_dataproduk'         => $this->input->post('add_perm_dataproduk')         ?? "0",
            'admin_perm_datapenjualan'      => $this->input->post('add_perm_datapenjualan')      ?? "0",
            'admin_perm_category'           => $this->input->post('add_perm_category')           ?? "0",
            'admin_perm_produk'             => $this->input->post('add_perm_produk')             ?? "0",
            'admin_perm_template'           => $this->input->post('add_perm_template')           ?? "0",
            'admin_perm_templateassets'     => $this->input->post('add_perm_templateassets')     ?? "0",
            'admin_perm_templatepelanggan'  => $this->input->post('add_perm_templatepelanggan')  ?? "0",
            'admin_perm_image'              => $this->input->post('add_perm_image')              ?? "0",
            'admin_perm_imageassets'        => $this->input->post('add_perm_imageassets')        ?? "0",
            'admin_perm_imagepelanggan'     => $this->input->post('add_perm_imagepelanggan')     ?? "0",
            'admin_perm_pelanggan'          => $this->input->post('add_perm_pelanggan')          ?? "0",
            'admin_perm_customerservices'   => $this->input->post('add_perm_customerservices')   ?? "0",
            'admin_perm_status'             => $this->input->post('add_perm_status')             ?? "0",
            'admin_perm_bank'               => $this->input->post('add_perm_bank')               ?? "0",
            'admin_perm_admin'              => $this->input->post('add_perm_admin')              ?? "0",
        ];

        $this->db->insert('tbl_admin', $data);
        // $this->M_admin->tambah_admin($id, $hp, $nama, $email, $password);
        redirect('Administrator');
    }
    function update_admin()
    {
        $admin_id = $this->input->post('admin_id');
        $nohp = $this->input->post('nohp');
        $pw = md5($this->input->post('password'));
        $pwDef = $this->input->post('password_default');

        $data = [
            'admin_nama'                    => $this->input->post('nama'),
            'admin_email'                   => $this->input->post('email'),
            'admin_nohp'                    => (substr(trim($nohp), 0, 1) == '0' ? '62' . substr(trim($nohp), 1) : $nohp),
            'admin_password'                => (empty($password) ? $pw : $pwDef),
            'admin_perm_dashboard'          => "1",
            'admin_perm_order'              => $this->input->post('perm_order')              ?? "0",
            'admin_perm_orderverifikasi'    => $this->input->post('perm_orderverifikasi')    ?? "0",
            'admin_perm_orderkirimdesign'   => $this->input->post('perm_orderkirimdesign')   ?? "0",
            'admin_perm_orderpembayaran'    => $this->input->post('perm_orderpembayaran')    ?? "0",
            'admin_perm_orderapproval'      => $this->input->post('perm_orderapproval')      ?? "0",
            'admin_perm_ordercetakproduk'   => $this->input->post('perm_ordercetakproduk')   ?? "0",
            'admin_perm_orderkirimambil'    => $this->input->post('perm_orderkirimambil')    ?? "0",
            'admin_perm_orderhistory'       => $this->input->post('perm_orderhistory')       ?? "0",
            'admin_perm_data'               => $this->input->post('perm_data')               ?? "0",
            'admin_perm_datapelanggan'      => $this->input->post('perm_datapelanggan')      ?? "0",
            'admin_perm_dataproduk'         => $this->input->post('perm_dataproduk')         ?? "0",
            'admin_perm_datapenjualan'      => $this->input->post('perm_datapenjualan')      ?? "0",
            'admin_perm_category'           => $this->input->post('perm_category')           ?? "0",
            'admin_perm_produk'             => $this->input->post('perm_produk')             ?? "0",
            'admin_perm_template'           => $this->input->post('perm_template')           ?? "0",
            'admin_perm_templateassets'     => $this->input->post('perm_templateassets')     ?? "0",
            'admin_perm_templatepelanggan'  => $this->input->post('perm_templatepelanggan')  ?? "0",
            'admin_perm_image'              => $this->input->post('perm_image')              ?? "0",
            'admin_perm_imageassets'        => $this->input->post('perm_imageassets')        ?? "0",
            'admin_perm_imagepelanggan'     => $this->input->post('perm_imagepelanggan')     ?? "0",
            'admin_perm_pelanggan'          => $this->input->post('perm_pelanggan')          ?? "0",
            'admin_perm_customerservices'   => $this->input->post('perm_customerservices')   ?? "0",
            'admin_perm_status'             => $this->input->post('perm_status')             ?? "0",
            'admin_perm_bank'               => $this->input->post('perm_bank')               ?? "0",
            'admin_perm_admin'              => $this->input->post('perm_admin')              ?? "0",
        ];

        $this->db->where('admin_id', $admin_id)->update('tbl_admin', $data);
    }
    function hapus_admin()
    {
        $id = $this->input->post('id');
        $this->M_admin->hapus_admin($id);
    }
}
