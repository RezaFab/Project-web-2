<?php
class Detail_product_pelanggan extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		if (!isset($this->session->pelanggan_nama)) {
			redirect('Admin');
		}
	}

	function index()
	{
		$x['title'] = "Detail Product";
		$id = $this->input->get('id');
		$nohp = $_SESSION['pelanggan_nohp'];
		$x['pel'] = $this->db->query("SELECT * FROM tbl_pelanggan WHERE pelanggan_nohp = '$nohp' ")->row_array();
		$x['p'] = $this->db->query("SELECT * FROM tbl_product WHERE product_id = '$id' ")->row_array();
		$this->load->view('pelanggan/template/V_header', $x);
		$this->load->view('pelanggan/V_detail_product_pelanggan', $x);
		$this->load->view('pelanggan/template/V_footer');
	}
	function order()
	{
		$jumlah = $this->input->post('jumlah');
		$keterangan = $this->input->post('keterangan');
		$id_product = $this->input->post('id_product');
		$nohp = $this->input->post('nohp');
		$harga = $this->input->post('harga');
		$tot_h = $harga * $jumlah;
		$tanggal = date('Y-m-d');

		// $this->db->query(
		// 	"INSERT INTO tbl_transaksi VALUES (NULL,'$nohp','$id_product','$tanggal',
		// 	'$jumlah','$keterangan','$tot_h',NULL,NULL,NULL,NULL,NULL,1) "
		// );

		$data = array(
			'transaksi_id' 					=> null,
			'transaksi_nohp' 				=> $nohp,
			'transaksi_product_id' 			=> $id_product,
			'transaksi_tanggal' 			=> $tanggal,
			'transaksi_jumlah' 				=> $jumlah,
			'transaksi_keterangan' 			=> $keterangan,
			'transaksi_harga' 				=> $tot_h,
			'transaksi_bank' 				=> null,
			'transaksi_atas_nama' 			=> null,
			'transaksi_bukti' 				=> null,
			'transaksi_paket' 				=> null,
			'transaksi_terima' 				=> null,
			'transaksi_new' 				=> 1,
			'transaksi_resi' 				=> null,
			'transaksi_ongkir'				=> 0
		);

		$this->db->insert('tbl_transaksi', $data);

		$id_transaksi = $this->db->insert_id();

		$tanggal_ini = time();
		$s = $this->db->query("SELECT * FROM tbl_status WHERE status_id = '1' ")->row_array();
		$tanggal_hangus = $tanggal_ini + (86400 * $s['status_jangka_waktu']);

		$this->db->query("INSERT INTO tbl_status_transaksi VALUES (NULL,1,'$id_transaksi',2,NULL,$tanggal_ini,$tanggal_hangus) ");
		redirect('Order_pelanggan/detail/' . $id_transaksi);
	}
}
