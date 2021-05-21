<?php

class Order_pelanggan extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $ps = $this->uri->segment(4);
        $ck = $this->db->query("SELECT * FROM tbl_pelanggan WHERE pelanggan_password = '$ps' ")->row_array();

        if ($ck) {
            $data = [
                'pelanggan_id' => $ck['pelanggan_id'],
                'pelanggan_nama' => $ck['pelanggan_nama'],
                'pelanggan_nohp' => $ck['pelanggan_nohp'],
                'pelanggan_email' => $ck['pelanggan_email']
            ];
            $this->session->set_userdata($data);
        } else if (!isset($this->session->pelanggan_nama)) {
            redirect('Admin');
        }
    }
    function index()
    {
        $x['title'] = "Order";
        $nohp = $_SESSION['pelanggan_nohp'];
        $x['order'] = $this->db->query("SELECT * FROM tbl_transaksi AS t JOIN tbl_product AS p ON t.transaksi_product_id = p.product_id WHERE transaksi_terima IS NULL AND transaksi_nohp = '$nohp'")->result_array();
        $this->load->view('pelanggan/template/V_header', $x);
        $this->load->view('pelanggan/V_order', $x);
        $this->load->view('pelanggan/template/V_footer');
    }
    function history()
    {
        $x['title'] = "Order History";
        $nohp = $_SESSION['pelanggan_nohp'];
        $x['order'] = $this->db->query("SELECT * FROM tbl_transaksi AS t JOIN tbl_product AS p ON t.transaksi_product_id = p.product_id WHERE (transaksi_terima = '1' OR transaksi_terima = '0') AND transaksi_nohp = '$nohp'")->result_array();
        $this->load->view('pelanggan/template/V_header', $x);
        $this->load->view('pelanggan/V_order_history', $x);
        $this->load->view('pelanggan/template/V_footer');
    }
    function get_data()
    {
        $id = $this->input->post('id');
        $status = $this->db->query("SELECT * FROM tbl_status")->result_array();
        $get = $this->db->query("SELECT * FROM tbl_transaksi WHERE transaksi_id = '$id' ")->row_array();
        $nohp = $get['transaksi_nohp'];
        $pel = $this->db->query("SELECT * FROM tbl_pelanggan WHERE pelanggan_nohp = '$nohp' ")->row_array();
        $id_product = $get['transaksi_product_id'];
        $p = $this->db->query("SELECT * FROM tbl_product WHERE product_id = '$id_product' ")->row_array();
        $bank_id = $get['transaksi_bank'];
        $b = $this->db->query("SELECT * FROM tbl_bank WHERE bank_id = '$bank_id' ")->row_array();
        $html = '<div class="modal-body">
                <div id="alert_update"></div>
                <div class="tab">
                  <button class="tablinks" onclick="detail(event, \'Detail\')">Detail</button>
                  <button class="tablinks" onclick="detail(event, \'bukti\')">Bukti Transaksi</button>
                </div>

<div id="Detail" class="tabcontent">
  <div class="row">
                    <div class="col-md-5">
                    <h2>Pelanggan</h2>
                    <hr>
                    <b>Nama</b>
                    <p>' . $pel['pelanggan_nama'] . '</p>
                    <b>Email</b>
                    <p>' . $pel['pelanggan_email'] . '</p>
                    <b>Tgl Lahir</b>
                    <p>' . $pel['pelanggan_lahir'] . '</p>
                    <b>Alamat</b>
                    <p>' . $pel['pelanggan_alamat'] . '</p>
                    <b>Whatsapp</b>
                    <p>' . $pel['pelanggan_nohp'] . '</p>
                    <b>Kecamatan</b>
                    <p>' . $pel['pelanggan_kecamatan'] . '</p>
                    <b>Kabupaten</b>
                    <p>' . $pel['pelanggan_kabupaten'] . '</p>
                    <b>Kodepost</b>
                    <p>' . $pel['pelanggan_kodepost'] . '</p>
                    </div>
                    <div class="col-md-5">
                    <h2>Product</h2>
                    <hr>
                        <b>Product</b>
                        <p>' . $p['product_nama'] . '</p>
                        <b>Jumlah</b>
                        <p>' . $get['transaksi_jumlah'] . '</p>
                        <b>Harga</b>';
        if (empty($get['transaksi_harga'])) {
            $html .= '<p>Harga Belum Di Tentukan</p>';
        } else {
            $html .= '<p>Rp. ' . number_format($get['transaksi_harga']) . '</p>';
        }
        $html .= '<br>
                    <b>Keterangan</b>
                    <p>' . $get['transaksi_keterangan'] . '</p>
                    </div>
                </div>
</div>

<div id="bukti" class="tabcontent">';
        if ($get['transaksi_bukti'] == NULL) {
            $html .= '<h3>Belum ada bukti transaksi</h3>';
        } else {
            $html .= '<h3>Bukti Transaksi</h3>
    <img style="width: 60px;" src="' . base_url('assets/img/bank/' . $b['bank_image']) . '"> 
    <table class="table">
                          <tr>
                            <th>Atas Nama</th>
                            <th>No Rekening</th>
                          </tr>
                          <tr>
                            <td>' . $b['bank_atas_nama'] . '</td>
                            <td>' . $b['bank_no_rek'] . '</td>
                          </tr>
                        </table>
    <img style="width:100%;" src="' . base_url('bukti_transaksi/' . $get['transaksi_bukti']) . '" >';
        }
        $html .= '
</div>
                
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-link  ml-auto" data-dismiss="modal">Close</button>
            </div>';
        echo $html;
    }
    function update_order()
    {
        $id = $this->input->post('id');
        $status = $this->input->post('status');
        $this->db->query("UPDATE tbl_transaksi SET transaksi_status = '$status' WHERE transaksi_id = '$id' ");
    }
    function hapus_order()
    {
        $id = $this->input->post('id');
        $this->db->query("DELETE FROM tbl_transaksi WHERE transaksi_id = '$id' ");
    }
    function upload_bukti()
    {
        $id = $this->input->post('id');
        $bank = $this->input->post('bank');
        $atas_nama = $this->input->post('atas_nama');
        $bukti_lama = $this->input->post('bukti_lama');
        $id_transaksi = $this->input->post('id_transaksi');
        $bukti = $_FILES['bukti']['name'];
        if (empty($bukti)) {
            $f = $bukti_lama;
        } else {
            $config['upload_path']          = './bukti_transaksi/';
            $config['allowed_types']        = 'jpg|jpeg|png';
            $config['max_size']             = 0;
            $config['remove_spaces']        = FALSE;
            $config['encrypt_name'] = TRUE;
            $this->load->library('upload', $config);
            if ($this->upload->do_upload('bukti')) {
                $this->upload->data();
            }
            $f = $this->upload->data('file_name');
        }
        $c = $this->db->query("SELECT * FROM tbl_status_transaksi WHERE transaksi_status_id = '3' AND transaksi_order_id = '$id_transaksi' ")->num_rows();
        if ($c['transaksi_keterangan'] == NULL) {
            $this->db->query("UPDATE tbl_status_transaksi SET transaksi_status = 2 WHERE transaksi_status_id = '3' AND transaksi_order_id = '$id_transaksi' ");
        }
        $this->db->query("UPDATE tbl_transaksi SET transaksi_bank = '$bank', transaksi_atas_nama = '$atas_nama', transaksi_bukti = '$f' WHERE transaksi_id = '$id' ");
        redirect('Order_pelanggan/detail/' . $id_transaksi);
    }
    function batal_trans()
    {
        $id = $this->input->post('id');
        $this->db->query("UPDATE tbl_transaksi SET transaksi_status = 'DIBATALKAN' WHERE transaksi_id = '$id' ");
    }
    function check_status()
    {
        echo $this->db->query("SELECT transaksi_status FROM tbl_status_transaksi WHERE transaksi_status IS NULL OR transaksi_status = '0' ")->num_rows();
    }
    function new_status()
    {
        $nohp = $_SESSION['pelanggan_nohp'];
        $status = $this->db->query("SELECT * FROM tbl_status_transaksi AS st JOIN tbl_status AS s ON st.transaksi_status_id = s.status_id JOIN tbl_transaksi AS t ON t.transaksi_id = st.transaksi_order_id JOIN tbl_pelanggan AS p ON t.transaksi_nohp = p.pelanggan_nohp WHERE (transaksi_status IS NULL OR transaksi_status = '0') AND transaksi_nohp = '$nohp' ")->result_array();
        $html = '';
        foreach ($status as $s) {
            $html .= '<a href="' . base_url('Order_pelanggan/detail/' . $s['transaksi_id']) . '" class="list-group-item list-group-item-action">
         <div class="row align-items-center">
           <div class="col-auto">
             <!-- Avatar -->
             <i class="' . $s['status_icon'] . '"></i>
           </div>
           <div class="col ml--2">
             <div class="d-flex justify-content-between align-items-center">
               <div>
                 <h4 class="mb-0 text-sm">' . $s['pelanggan_nama'] . '</h4>
               </div>
               <div class="text-right text-muted">
                 <small>' . $s['status_status'] . '</small>
               </div>
             </div>';
            if ($s['transaksi_status'] == '0') {
                $html .= '<p class="text-sm mb-0">Ditolak</p>';
            } elseif ($s['transaksi_status_id'] == '2') {
                $html .= '<p class="text-sm mb-0">Silakan Kirim Design</p>';
            } elseif ($s['transaksi_status_id'] == '3') {
                $html .= '<p class="text-sm mb-0">Silahkan Melakukan Pembayaran</p>';
            } elseif ($s['transaksi_status_id'] == '4') {
                $html .= '<p class="text-sm mb-0">Sedang Di cetak</p>';
            } elseif ($s['transaksi_status_id'] == '5') {
                $html .= '<p class="text-sm mb-0">Kirim / Ambil</p>';
            }
            $html .= '</div>
         </div>
       </a>';
        }
        echo $html;
    }
    function detail()
    {
        $x['title'] = "Detail";
        $id = $this->uri->segment(3);
        $o = $this->db->query("SELECT * FROM tbl_transaksi WHERE transaksi_id = '$id' ")->row_array();
        if (!$o) {
            redirect('Order_pelanggan');
        } else {
            $x['o'] = $o;
            $id_product = $o['transaksi_product_id'];
            $x['p'] = $this->db->query("SELECT * FROM tbl_product WHERE product_id = '$id_product' ")->row_array();
            $x['bank'] = $this->db->query("SELECT * FROM tbl_bank")->result_array();
            $x['status'] = $this->db->query("SELECT * FROM tbl_status")->result_array();
            $this->load->view('pelanggan/template/V_header', $x);
            $this->load->view('pelanggan/V_detail', $x);
            $this->load->view('pelanggan/template/V_footer');
        }
    }
    function upload_design()
    {
        $id_transaksi = $this->input->post('id_transaksi');
        $jumlahFile = count($_FILES['design']['name']);
        $c = $this->db->query("SELECT * FROM tbl_status_transaksi WHERE transaksi_status_id = '2' AND transaksi_order_id = '$id_transaksi';")->result_array()[0];
        if ($c['transaksi_keterangan'] == NULL) {
            $this->db->query("UPDATE tbl_status_transaksi SET transaksi_status = 2 WHERE transaksi_status_id = '2' AND transaksi_order_id = '$id_transaksi' ");
        }
        for ($i = 0; $i < $jumlahFile; $i++) {
            $namafile = $_FILES['design']['name'][$i];
            $tmp = $_FILES['design']['tmp_name'][$i];
            $type = $_FILES['design']['type'][$i];
            $error = $_FILES['design']['error'][$i];
            $size = $_FILES['design']['size'][$i];

            //kalau pengecekan sudah selesai, langsung proses
            // die("file_exists: " . file_exists('design_user/'));
            // die($_FILES['design']['tmp_name'][$i]);
            move_uploaded_file($tmp, 'design_user/' . $namafile);
            $this->db->query("INSERT INTO tbl_design_kirim VALUES (NULL,'$id_transaksi','$namafile') ");
        }
        redirect('Order_pelanggan/detail/' . $id_transaksi);
    }
    function get_data_design()
    {
        $id = $this->input->post('id');
        $id_transaksi = $this->input->post('id_transaksi');
        $g = $this->db->query("SELECT * FROM tbl_user_design WHERE design_id = '$id' ")->row_array();
        $html = '<div id="alert"></div><div class="row">
        <div class="col-md-12">
        <center><img style="width: 200px;border-radius:5px;" src="' . base_url('design_user/') . $g['design_image'] . '" alt=""><br>
        <p>' . $g['design_width'] . ' X ' . $g['design_height'] . '</p>
        <br>
        <div>
        <table style="width:100%;">
        <tr>
        <td><a style="width: 100%;" href="' . base_url('Editor?design=') . $g['design_id'] . '&level=2&id=' . $id_transaksi . '" class="btn btn-primary">Edit Design</a></center></td>
        <td><button style="width: 100%;" id="hapus_design" class="btn btn-danger">Hapus Design</button></center></td>
        </tr>
        </table>
        </div>
        </div>
    </div>';
        echo $html;
    }
    function hapus_design()
    {
        $id = $this->input->post('id');
        $this->db->query("DELETE FROM tbl_user_design WHERE design_id = '$id' ");
    }
    function hapus_design_upload()
    {
        $id = $this->input->post('id');
        $this->db->query("DELETE FROM tbl_design_kirim WHERE design_id = '$id' ");
    }
    function update()
    {
        $id = $this->input->post('id');
        $jumlah = $this->input->post('jumlah');
        $keterangan = $this->input->post('keterangan');
        $this->db->query("UPDATE tbl_transaksi SET transaksi_jumlah = '$jumlah', transaksi_keterangan = '$keterangan' WHERE transaksi_id = '$id' ");
        redirect('Order_pelanggan/detail/' . $id);
    }
    function paket()
    {
        $id = $this->input->post('id');
        $val = $this->input->post('val');
        if ($val == '1') {
            $this->db->query("UPDATE tbl_transaksi SET transaksi_paket = '$val' WHERE transaksi_id = '$id' ");
        } else {
            $this->db->query("UPDATE tbl_transaksi SET transaksi_paket = '$val' WHERE transaksi_id = '$id' ");
        }
    }
    function terima()
    {
        $id = $this->input->post('id');
        $val = $this->input->post('val');
        $user = $this->input->post('user');
        $this->db->query("UPDATE tbl_transaksi SET transaksi_terima = '$val' WHERE transaksi_id = '$id' ");
        $this->db->query("UPDATE tbl_status_transaksi SET transaksi_status = '$val', transaksi_keterangan = 'Sudah Diterima' WHERE transaksi_status_id = '5' AND transaksi_order_id = '$id' ");
        $o = $this->db->query("SELECT * FROM tbl_transaksi WHERE transaksi_id = '$id' ")->row_array();
        $html = '<div class="wrapper">';
        if ($o['transaksi_paket'] == "1") {
            $html .= '<h2>Kirim Paket</h2>';
        } else {
            $html .= '<h2>Ambil Sendiri</h2>';
        }
        $html .= '<h2>Paket Sudah diterima</h2>';
        $html .= '</div>';
        echo $html;

        $this->db->set('verif_kirimambil', $user)->where('transaksi_id', $id)->update('tbl_verifikasi');
    }
}
