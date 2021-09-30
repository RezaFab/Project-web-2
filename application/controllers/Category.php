<?php

class Category extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		if (!isset($this->session->admin_nama)) {
			redirect('Admin');
		}
		$this->load->model('M_category');
		if (!$this->M_admin->check_permission('category')) redirect('Dashboard');
	}

	function index()
	{
		$x['title'] = "Kategori";
		$x['category'] = $this->M_category->get_category();
		$this->load->view('admin/template/V_header', $x);
		$this->load->view('admin/V_category', $x);
		$this->load->view('admin/template/V_footer');
	}
	function get_data()
	{
		$id = $this->input->post('id');
		$get = $this->db->query("SELECT * FROM tbl_product_category WHERE category_id = '$id' ")->row_array();
?>
		<div class="modal-body">
			<div id="alert"></div>
			<form method="post">
				<div class="form-group">
					<input type="text" placeholder="Kode" value="<?= $get['category_kode']; ?>" id="kode" name="kode" class="form-control">
				</div>
				<div class="form-group">
					<input type="text" placeholder="Nama" value="<?= $get['category_nama']; ?>" id="nama" name="nama" class="form-control">
				</div>
		</div>
		<div class="modal-footer">
			<button id="<?= $get['category_id']; ?>" type="submit" class="btn btn-primary update">Save</button>
			</form>
			<button type="button" class="btn btn-link  ml-auto" data-dismiss="modal">Close</button>
		</div>
<?php
	}
	function tambah_category()
	{
		$kode = $this->input->post('kode');
		$nama = $this->input->post('nama');

		$this->M_category->tambah_category($kode, $nama);
		redirect('Category');
	}
	function edit_category()
	{
		$id = $this->input->post('id');
		$kode = $this->input->post('kode');
		$nama = $this->input->post('nama');

		$this->db->query("UPDATE tbl_product_category SET category_kode = '$kode', category_nama = '$nama' WHERE category_id = '$id' ");
	}
	function hapus_category()
	{
		$id = $this->input->post('id');

		$this->db->query("DELETE FROM tbl_product_category WHERE category_id = '$id' ");
	}
}
