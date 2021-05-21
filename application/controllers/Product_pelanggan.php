<?php  

class Product_pelanggan extends CI_Controller {
	function __construct() {
		parent::__construct();
		if (!isset($this->session->pelanggan_nama)) {
            redirect('Admin');        
        }
	}

	function index() {
		$x['title'] = "Product";
		$this->load->view('pelanggan/template/V_header', $x);
		$this->load->view('pelanggan/V_product');
		$this->load->view('pelanggan/template/V_footer');
	}
	function get_product() {
        if (isset($_GET['offset']) && isset($_GET['limit']) ) {
            $offset = $_GET['offset'];
            $limit =  $_GET['limit'];

            $row = $this->db->query("SELECT * FROM tbl_product LIMIT $limit OFFSET $offset ")->result_array();

            foreach($row as $p) {
                echo '<div class="col-lg-3 col-md-4 col-sm-6">
				<a href="'.base_url('Detail_product_pelanggan?id='.$p['product_id']).'">
				<div class="card" style="width: 100%">
				  <img class="card-img-top" src="'. base_url('image/'.$p['product_image']).'" alt="Card image cap">
				  <div class="card-body">
					<h5 class="card-title">'.$p['product_nama'].'</h5>
					<p class="card-text">Rp. '.number_format($p['product_harga']).'</p>
				  </div>
				</div>
				</a>
				</div>';
            } 


        }
	}
	function search_product() {
		$key = $this->input->get('key');
		$row = $this->db->query("SELECT * FROM tbl_product WHERE product_nama LIKE '%$key%' ")->result_array();

		foreach($row as $p) {
			echo '<div class="col-lg-3 col-md-4 col-sm-6">
			<a href="'.base_url('Detail_product_pelanggan?id='.$p['product_id']).'">
			<div class="card" style="width: 100%">
			  <img class="card-img-top" src="'. base_url('image/'.$p['product_image']).'" alt="Card image cap">
			  <div class="card-body">
				<h5 class="card-title">'.$p['product_nama'].'</h5>
				<p class="card-text">Rp. '.number_format($p['product_harga']).'</p>
			  </div>
			</div>
			</a>
			</div>';
		} 
	}
}