<?php
class Profile extends CI_Controller {
    function __construct() {
		parent::__construct();
		if (!isset($this->session->pelanggan_nama)) {
            redirect('Admin');        
        }
	}

    function index() {
        $x['title'] = "Profile";
        $nohp = $_SESSION['pelanggan_nohp'];
        $x['p'] = $this->db->query("SELECT * FROM tbl_pelanggan WHERE pelanggan_nohp = '$nohp' ")->row_array();
        $this->load->view('pelanggan/template/V_header', $x);
        $this->load->view('pelanggan/V_profile', $x);
        $this->load->view('pelanggan/template/V_footer');
    }
    function edit_profile() {
        $id = $this->input->post('id');
        $no_hp = $this->input->post('no_hp');
        $nama = $this->input->post('nama');
        $email = $this->input->post('email');
        $password = md5($this->input->post('password'));
        $password_lama = $this->input->post('password_lama');
        $alamat = $this->input->post('alamat');
        $telephone = $this->input->post('telephone');
        $kecamatan = $this->input->post('kecamatan');
        $kabupaten = $this->input->post('kabupaten');
        $kodepost = $this->input->post('kodepost');
        $tgl_lahir = $this->input->post('tgl_lahir');
        $bln_lahir = $this->input->post('bln_lahir');
        $thn_lahir = $this->input->post('thn_lahir');
        $lahir = $thn_lahir."-".$bln_lahir."-".$tgl_lahir;
		$nohp = str_replace(" ","",$no_hp);
            if(substr(trim($nohp), 0, 1)=='0'){
                $hp = '62'.substr(trim($nohp), 1);
            }else{
                $hp = $no_hp;
            }
            if (empty($password)) {
            $p = $password_lama;
	        }else{
	            $p = $password;
	        }
        $this->db->query("UPDATE tbl_pelanggan SET pelanggan_nohp = '$hp', pelanggan_nama = '$nama', pelanggan_email = '$email', pelanggan_lahir = '$lahir', pelanggan_password = '$p', pelanggan_alamat = '$alamat', pelanggan_telephone = '$telephone', pelanggan_kecamatan = '$kecamatan', pelanggan_kabupaten = '$kabupaten', pelanggan_kodepost = '$kodepost' WHERE pelanggan_id =  '$id' ");
        redirect('Profile');
    }
}