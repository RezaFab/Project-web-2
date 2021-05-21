<?php  

class Product extends CI_Controller {
	function __construct() {
		parent::__construct();
		if (!isset($this->session->admin_nama)) {
            redirect('Admin');        
        }
	}

	function index() {
		$x['title'] = "Product";
		$x['product'] = $this->db->query("SELECT * FROM tbl_product")->result_array();
		$x['category'] = $this->db->query("SELECT * FROM tbl_product_category")->result_array();
		$this->load->view('admin/template/V_header', $x);
		$this->load->view('admin/V_product', $x);
		$this->load->view('admin/template/V_footer');
	}
	// function get_data() {
	// 	$id = $this->input->post('id');
	// 	$get = $this->db->query("SELECT * FROM tbl_product WHERE product_id = '$id' ")->row_array();
	// 	echo '<div class="modal-body">
	// 			<div id="alert"></div>
 //                <form method="post">
 //                  <div class="form-group">
 //                  <input type="text" placeholder="Kode" value="'.$get['product_kode'].'" id="kode" name="kode" class="form-control">
 //                </div>
 //                <div class="form-group">
 //                  <input type="text" placeholder="Nama" value="'.$get['product_nama'].'" id="nama" name="nama" class="form-control">
 //                </div>
 //                <div class="form-group">
 //                    <input type="text" class="form-control tag-input narrow" value="'.$get['product_category'].'" name="category" id="tags3" placeholder="Category">
 //                </div>
 //                <div class="form-group">
 //                  <textarea class="form-control" id="deskripsi" name="deskripsi">'.$get['product_deskripsi'].'</textarea>
 //                </div>
 //                <div class="form-group">
 //                  <textarea class="form-control" id="keunggulan" name="keunggulan">'.$get['product_keunggulan'].'</textarea>
 //                </div>
 //                <div class="form-group">
 //                  <textarea class="form-control" id="keterangan" name="keterangan">'.$get['product_keterangan'].'</textarea>
 //                </div>
 //              </div>
            
 //              <div class="modal-footer">
 //                <button id="'.$get['product_id'].'" type="submit" class="btn btn-primary update">Save</button>
 //                </form>
 //                <button type="button" class="btn btn-link  ml-auto" data-dismiss="modal">Close</button>
 //            </div>';
	// }
	function get_detail() {
		$id = $this->input->post('id');
		$get = $this->db->query("SELECT * FROM tbl_product WHERE product_id = '$id' ")->row_array();
		echo '<div class="modal-body">
              <b>Kode</b>
              <p>'.$get['product_kode'].'</p> 
              <b>Nama</b>
              <p>'.$get['product_nama'].'</p> 
              <b>Category</b>
              <p>'.$get['product_category'].'</p> 
              <b>Deskripsi</b>
              <p>'.$get['product_deskripsi'].'</p>  
              <b>Keunggulan</b>
              <p>'.$get['product_keunggulan'].'</p>
              <b>Keterangan</b>
              <p>'.$get['product_keterangan'].'</p>    
              <b>Harga</b>
              <p>Rp. '.number_format($get['product_harga']).'</p>    
              </div>';
	}
	function tambah_product() {
		$kode = $this->input->post('kode');
		$nama = $this->input->post('nama');
		$category = $this->input->post('category');
		$deskripsi = $this->input->post('deskripsi');
		$keunggulan = $this->input->post('keunggulan');
		$keterangan = $this->input->post('keterangan');
		$harga = $this->input->post('harga');
		$gambar = $_FILES['gambar']['name'];
        $config['upload_path']          = './image/';
        $config['allowed_types']        = 'jpg|jpeg|png';
        $config['max_size']             = 0;
        $config['remove_spaces']        = FALSE;
        $this->load->library('upload', $config);
        if ( $this->upload->do_upload('gambar')) {
            $this->upload->data();
        }

		$this->db->query("INSERT INTO tbl_product VALUES (NULL,'$kode','$category','$gambar','$nama','$deskripsi','$keunggulan','$keterangan','$harga') ");
		redirect('Product');
	}
	function edit_product() {
		$id = $this->input->post('id');
		$kode = $this->input->post('kode');
		$nama = $this->input->post('nama');
		$category = $this->input->post('category');
		$deskripsi = $this->input->post('deskripsi');
		$keunggulan = $this->input->post('keunggulan');
		$keterangan = $this->input->post('keterangan');
		$gambar_lama = $this->input->post('gambar_lama');
		$harga = $this->input->post('harga');
		$gambar = $_FILES['gambar']['name'];
        if (empty($gambar)) {
            $g = $gambar_lama;
        }else{
			$g = $gambar;
		$config['upload_path']          = './image/';
        $config['allowed_types']        = 'jpg|jpeg|png';
        $config['max_size']             = 0;
        $config['remove_spaces']        = FALSE;
        $this->load->library('upload', $config);
        if ( $this->upload->do_upload('gambar')) {
            $this->upload->data();
        }
        }
        

		$this->db->query("UPDATE tbl_product SET product_kode = '$kode', product_nama = '$nama', product_category = '$category', product_image = '$g', product_deskripsi = '$deskripsi', product_keunggulan = '$keunggulan', product_keterangan = '$keterangan', product_harga = '$harga' WHERE product_id = '$id' ");
		redirect('Product');
	}
	function hapus_product() {
		$id = $this->input->post('id');
		$this->db->query("DELETE FROM tbl_product WHERE product_id = '$id' ");
	}
}