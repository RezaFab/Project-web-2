<?php
class Dashboard extends CI_Controller {
    function __construct() {
        parent::__construct();
        if (!isset($this->session->admin_nama)) {
            redirect('Admin');        
        }
    }

    function index() {
        $x['title'] = "Dashboard";
        $x['kd'] = $this->db->query("SELECT count(t.transaksi_id) AS kd FROM tbl_transaksi AS t JOIN tbl_status_transaksi AS s ON t.transaksi_id = s.transaksi_order_id WHERE t.transaksi_terima IS NULL AND s.transaksi_status_id = '2' AND (s.transaksi_status = '2' OR s.transaksi_status = '0' OR s.transaksi_status IS NULL)")->row_array();
        $x['pmb'] = $this->db->query("SELECT count(t.transaksi_id) AS pmb FROM tbl_transaksi AS t JOIN tbl_status_transaksi AS s ON t.transaksi_id = s.transaksi_order_id WHERE t.transaksi_terima IS NULL AND s.transaksi_status_id = '3' AND (s.transaksi_status = '2' OR s.transaksi_status = '0' OR s.transaksi_status IS NULL) ")->row_array();
        $x['apv'] = $this->db->query("SELECT count(t.transaksi_id) AS apv FROM tbl_transaksi AS t JOIN tbl_status_transaksi AS s ON t.transaksi_id = s.transaksi_order_id WHERE t.transaksi_terima IS NULL AND s.transaksi_status_id = '4' AND (s.transaksi_status = '2' OR s.transaksi_status = '0' OR s.transaksi_status IS NULL) ")->row_array();
        $x['ctk'] = $this->db->query("SELECT count(t.transaksi_id) AS ctk FROM tbl_transaksi AS t JOIN tbl_status_transaksi AS s ON t.transaksi_id = s.transaksi_order_id WHERE t.transaksi_terima IS NULL AND s.transaksi_status_id = '5' AND (s.transaksi_status = '2' OR s.transaksi_status = '0' OR s.transaksi_status IS NULL) ")->row_array();
        $x['k_a'] = $this->db->query("SELECT count(t.transaksi_id) AS k_a FROM tbl_transaksi AS t JOIN tbl_status_transaksi AS s ON t.transaksi_id = s.transaksi_order_id WHERE t.transaksi_terima IS NULL AND s.transaksi_status_id = '6' AND (s.transaksi_status = '2' OR s.transaksi_status = '0' OR s.transaksi_status IS NULL) ")->row_array();
        $x['h'] = $this->db->query("SELECT count(transaksi_id) AS h FROM tbl_transaksi WHERE transaksi_terima = '1' ")->row_array();
        $x['pelanggan'] = $this->db->query("SELECT count(pelanggan_id) AS pelanggan FROM tbl_pelanggan")->row_array();
        $x['product'] = $this->db->query("SELECT count(product_id) AS product FROM tbl_product")->row_array();
        $x['p_b_i'] = $this->db->query("SELECT SUM(transaksi_harga) AS p_b_i FROM tbl_transaksi  WHERE MONTH(transaksi_tanggal)=MONTH(CURDATE()) AND transaksi_terima = '1'")->row_array();
        $x['p_b_l'] = $this->db->query("SELECT SUM(transaksi_harga) AS p_b_l FROM tbl_transaksi  WHERE MONTH(transaksi_tanggal)=MONTH(CURDATE())-1 AND transaksi_terima = '1'")->row_array();
        $this->load->view('admin/template/V_header', $x);
        $this->load->view('admin/V_dashboard', $x);
        $this->load->view('admin/template/V_footer');
    }
    function order_saat_ini() {
        $order = $this->db->query("SELECT * FROM tbl_transaksi WHERE transaksi_terima IS NULL ORDER BY transaksi_id DESC")->result_array();
        $html = '';
        $n=1; foreach($order as $o ) {
            $html .= '<tr>
            <td>'. $n++ .'</td>
            <td>'. $o['transaksi_nohp'].'</td>';
            $nohp = $o['transaksi_nohp']; 
            $p = $this->db->query("SELECT * FROM tbl_pelanggan WHERE pelanggan_nohp = '$nohp' ")->row_array();
            $html .= '<td>'.$p['pelanggan_nama'].'</td>
            <td>'. $o['transaksi_tanggal'].'</td>
            <td>'. $o['transaksi_jumlah'].'</td>
            <td>'. $o['transaksi_status'].'</td>
            <td>
            <a href="'. base_url('Order/detail/'.$o['transaksi_id']).'" class="btn btn-primary btn-sm"><i class="fa fa-box"></i></a>
            </td>
          </tr>';
        }
        echo $html;
    }
}