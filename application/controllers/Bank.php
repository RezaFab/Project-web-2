<?php
class Bank extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		if (!isset($this->session->admin_nama)) {
			redirect('Admin');
		}
		if (!$this->M_admin->check_permission('bank')) redirect('Dashboard');
	}

	function index()
	{
		$x['title'] = "Bank";
		$x['bank'] = $this->db->query("SELECT * FROM tbl_bank")->result_array();
		$this->load->view('admin/template/V_header', $x);
		$this->load->view('admin/V_bank', $x);
		$this->load->view('admin/template/V_footer');
	}
	function tambah_bank()
	{
		$nama_bank = $this->input->post('nama_bank');
		$atas_nama = $this->input->post('atas_nama');
		$no_rek = $this->input->post('no_rek');
		$icon = $_FILES['icon']['name'];
		$config['upload_path']          = './assets/img/bank/';
		$config['allowed_types']        = 'jpg|jpeg|png';
		$config['max_size']             = 0;
		$config['remove_spaces']        = FALSE;
		$this->load->library('upload', $config);
		if ($this->upload->do_upload('icon')) {
			$this->upload->data();
		}
		$this->db->query("INSERT INTO tbl_bank VALUES (NULL,'$nama_bank','$atas_nama','$no_rek','$icon') ");
		redirect('Bank');
	}
	function update_bank()
	{
		$id = $this->input->post('id');
		$nama_bank = $this->input->post('nama_bank');
		$atas_nama = $this->input->post('atas_nama');
		$no_rek = $this->input->post('no_rek');
		$icon_default = $this->input->post('icon_default');
		$icon = $_FILES['icon']['name'];
		$config['upload_path']          = './assets/img/bank/';
		$config['allowed_types']        = 'jpg|jpeg|png';
		$config['max_size']             = 0;
		$config['remove_spaces']        = FALSE;
		$this->load->library('upload', $config);
		if (!empty($icon)) {
			$i = $icon;
			if ($this->upload->do_upload('icon')) {
				$this->upload->data();
			}
			unlink("assets/img/bank/" . $icon_default);
		} else {
			$i = $icon_default;
		}
		$this->db->query("UPDATE tbl_bank SET bank_nama = '$nama_bank', bank_atas_nama = '$atas_nama', bank_no_rek = '$no_rek', bank_image = '$i' WHERE bank_id = '$id' ");
		redirect('Bank');
	}
	function hapus_bank()
	{
		$id = $this->input->post('id');
		$icon = $this->input->post('icon');
		unlink("assets/img/bank/" . $icon);
		$this->db->query("DELETE FROM tbl_bank WHERE bank_id = '$id' ");
	}
}
