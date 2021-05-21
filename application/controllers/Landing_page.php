<?php
class Landing_page extends CI_Controller
{

	function index()
	{
		$x['cs'] = $this->db->query("SELECT * FROM tbl_cs")->result_array();
		$this->load->view('V_landing_page', $x);
	}
	function Daftar()
	{
		$nama 		= $this->input->post('nama');
		$no_hp 		= $this->input->post('no_hp');
		$email 		= $this->input->post('email');
		$password 	= md5($this->input->post('password'));
		$alamat 	= $this->input->post('alamat');
		$refrensi 	= $this->input->post('refrensi');
		$telephone 	= $this->input->post('telephone');
		$kecamatan 	= $this->input->post('kecamatan');
		$kabupaten 	= $this->input->post('kabupaten');
		$kodepost 	= $this->input->post('kodepost');
		$tgl_lahir 	= $this->input->post('tgl_lahir');
		$bln_lahir 	= $this->input->post('bln_lahir');
		$thn_lahir 	= $this->input->post('thn_lahir');
		$lahir 		= $thn_lahir . "-" . $bln_lahir . "-" . $tgl_lahir;
		$nohp 		= str_replace(" ", "", $no_hp);

		if (substr(trim($nohp), 0, 1) == '0') {
			$hp = '62' . substr(trim($nohp), 1);
		} else {
			$hp = $no_hp;
		}
		$check = $this->db->query("SELECT * FROM tbl_pelanggan WHERE pelanggan_nohp = '$hp' ");
		$check_email = $this->db->query("SELECT * FROM tbl_pelanggan WHERE pelanggan_email = '$email' ");
		if ($check->num_rows() > 0) {
			echo 'nohp';
		} else if ($check_email->num_rows() > 0) {
			echo 'email';
		} else {
			$this->db->query("INSERT INTO tbl_pelanggan VALUES (NULL,'$hp','$nama','$email','$lahir','$password','$alamat','$refrensi','$telephone','$kecamatan','$kabupaten','$kodepost',1,null,null) ");
			echo 'success';
		}
	}
}
