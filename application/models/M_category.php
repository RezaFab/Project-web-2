<?php  
class M_category extends CI_Model {

	function get_category() {
		$h = $this->db->query("SELECT * FROM tbl_product_category");
		return $h->result_array();
	}
	function tambah_category($kode,$nama) {
		$h = $this->db->query("INSERT INTO tbl_product_category VALUES (NULL,'$kode','$nama') ");
		return $h;
	}
}