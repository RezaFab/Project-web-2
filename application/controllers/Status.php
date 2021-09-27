<?php
class Status extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		if (!isset($this->session->admin_nama)) {
			redirect('Admin');
		}
		if (!$this->M_admin->check_permission('status')) redirect('Dashboard');
	}

	function index()
	{
		$x['title'] = "Status";
		$x['status'] = $this->db->query("SELECT * FROM tbl_status WHERE status_id LIKE '_' ORDER BY status_urut ASC ")->result_array();
		$this->load->view('admin/template/V_header', $x);
		$this->load->view('admin/V_status', $x);
		$this->load->view('admin/template/V_footer');
	}
	function tambah_status()
	{
		$status = $this->input->post('status');
		$keterangan = $this->input->post('keterangan');
		$urutan = $this->input->post('urutan');
		$icon = $this->input->post('icon');
		$this->db->query("INSERT INTO tbl_status VALUES (NULL,'$status','$keterangan','$urutan','$icon') ");
		redirect('Status');
	}
	function update_status()
	{
		$id = $this->input->post('id');
		$status = $this->input->post('status');
		$keterangan = $this->input->post('keterangan');
		$urutan = $this->input->post('urutan');
		$icon = $this->input->post('icon');
		$this->db->query("UPDATE tbl_status SET status_status = '$status', status_keterangan = '$keterangan', status_urut = '$urutan', status_icon = '$icon' WHERE status_id = '$id' ");
		redirect('Status');
	}
	function hapus_status()
	{
		$id = $this->input->post('id');
		$this->db->query("DELETE FROM tbl_status WHERE status_id = '$id' ");
	}
	function status_jangka()
	{
		$id = $this->input->post('id');
		$j = $this->input->post('j');
		if ($j == 0) {
			$this->db->query("UPDATE tbl_status SET status_jangka_waktu = NULL WHERE status_id = '$id' ");
		} elseif ($j == 1) {
			$this->db->query("UPDATE tbl_status SET status_jangka_waktu = 1 WHERE status_id = '$id' ");
		}
	}
	function status_hari()
	{
		$id = $this->input->post('id');
		$h = $this->input->post('h');
		$this->db->query("UPDATE tbl_status SET status_jangka_waktu = '$h' WHERE status_id = '$id' ");
	}
}
