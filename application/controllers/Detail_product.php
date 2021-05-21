<?php  
class Detail_product extends CI_Controller {

	function index() {
		$id = $this->input->get('id');
		$x['p'] = $this->db->query("SELECT * FROM tbl_product WHERE product_id = '$id' ")->row_array();
		$this->load->view('V_detail_product', $x);
	}
} 