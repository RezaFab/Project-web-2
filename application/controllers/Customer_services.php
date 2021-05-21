<?php  
class Customer_services extends CI_controller {
	function __construct() {
		parent::__construct();
		if (!isset($this->session->admin_nama)) {
            redirect('Admin');        
        }
	}

	function index() {
		$x['cs'] = $this->db->query("SELECT * FROM tbl_cs")->result_array();
		$x['title'] = "Customer services";
		$this->load->view('admin/template/V_header', $x);
		$this->load->view('admin/V_cs', $x);
		$this->load->view('admin/template/V_footer');
	}
	function tambah_cs() {
		$nama = $this->input->post('nama');
		$nohp = $this->input->post('nohp');
		$daerah = $this->input->post('daerah');
		$foto = $_FILES['foto']['name'];
        $config['upload_path']          = './assets/img/cs/';
        $config['allowed_types']        = 'jpg|jpeg|png';
        $config['max_size']             = 0;
        $config['remove_spaces']        = FALSE;
        $this->load->library('upload', $config);
        if ( $this->upload->do_upload('foto')) {
            $this->upload->data();
        }
        $this->db->query("INSERT INTO tbl_cs VALUES (NULL,'$nama','$nohp','$daerah','$foto',1) ");
        redirect('Customer_services');
	}
	function get_data() {
		$id = $this->input->post('id');
		$c = $this->db->query("SELECT * FROM tbl_cs WHERE cs_id = '$id' ")->row_array();
		echo '<div class="modal-body">
		<input type="hidden" name="id" value="'.$c['cs_id'].'" required="" class="form-control">
                <div class="form-group">
                  <input type="text" placeholder="No Hp" value="'.$c['cs_nohp'].'" name="nohp" required="" class="form-control">
                </div>
                <div class="form-group">
                  <input type="text" placeholder="Nama" value="'.$c['cs_nama'].'" name="nama" required="" class="form-control">
                </div>
                <div class="form-group">
                  <input type="text" placeholder="Daerah" value="'.$c['cs_daerah'].'" name="daerah" required="" class="form-control">
                </div>
                <div class="form-group">
                  <input type="file" name="foto" class="form-control">
                  <input type="hidden" name="foto_default" value="'.$c['cs_foto'].'" required="" class="form-control">
                </div>
            </div>';
	}
	function update_cs() {
		$id = $this->input->post('id');
		$nama = $this->input->post('nama');
		$nohp = $this->input->post('nohp');
		$daerah = $this->input->post('daerah');
		$foto_default = $this->input->post('foto_default');
		$foto = $_FILES['foto']['name'];
        $config['upload_path']          = './assets/img/cs/';
        $config['allowed_types']        = 'jpg|jpeg|png';
        $config['max_size']             = 0;
        $config['remove_spaces']        = FALSE;
        $this->load->library('upload', $config);
        if (!empty($foto)) {
        	$f = $foto;
        	if ( $this->upload->do_upload('foto')) {
            $this->upload->data();
        }
        }else{
        	$f = $foto_default;
        }
        $this->db->query("UPDATE tbl_cs SET cs_nama = '$nama', cs_nohp = '$nohp', cs_daerah = '$daerah', cs_foto = '$f' WHERE cs_id = '$id' ");
        redirect('Customer_services');
	}
	function hapus_cs() {
		$id = $this->input->post('id');
		$this->db->query("DELETE FROM tbl_cs WHERE cs_id = '$id' ");
	}
	function dihidupkan() {
		$nohp = $this->input->post('nohp');
		$this->db->query("UPDATE tbl_cs SET cs_status = '1' WHERE cs_nohp = '$nohp' ");
	}
	function dimatikan() {
		$nohp = $this->input->post('nohp');
		$this->db->query("UPDATE tbl_cs SET cs_status = '0' WHERE cs_nohp = '$nohp' ");
	}
}