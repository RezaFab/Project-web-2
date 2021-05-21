<?php
class Editor extends CI_Controller {

    function __construct() {
        parent::__construct();
        if (!isset($this->session->admin_nama)) {
            if(!isset($this->session->pelanggan_nama)){
            redirect('Admin');        
            }
        }
        $this->load->model('M_images');
        $this->load->model('M_design');
    }

    function index() { 
        $design = $this->input->get('design');
        $new = $this->input->get('new');
        $myDesign = $this->input->get('myDesign');
        $level = $this->input->get('level');
        if (isset($design)) {
            if ($level=='1' || $level=='c') {
                $d = $this->db->get_where('tbl_design', ['design_id' => $design])->row_array();
            }else{
                $d = $this->db->get_where('tbl_user_design', ['design_id' => $design])->row_array();
            }
            $x['design_id'] = $d['design_id'];
            $x['nama'] = $d['design_nama'];
            $x['design'] = $d['design_design'];
            $x['width'] = $d['design_width'];
            $x['height'] = $d['design_height'];
            $x['design_image'] = $d['design_image'];
            $x['category'] = "";
        }elseif(isset($myDesign)) {
            if ($level=='1' || $level=='c') {
                $d = $this->db->get_where('tbl_design', ['design_id' => $design])->row_array();
            }else{
                $d = $this->db->get_where('tbl_user_design', ['design_id' => $design])->row_array();
            }
            $x['design_id'] = $d['design_id'];
            $x['nama'] = $d['design_nama'];
            $x['design'] = $d['design_design']; 
            $x['width'] = $d['design_width'];
            $x['height'] = $d['design_height'];
            $x['design_image'] = $d['design_image'];
            $x['category'] = "";
        }elseif(isset($_GET['width']) && isset($_GET['height'])) {
            $x['design_id'] = "";
            $x['nama'] = "";
            $x['design'] = '{"version":"2.3.6","objects":[]}'; 
            $x['width'] = $_GET['width'];
            $x['height'] = $_GET['height'];
            $x['design_image'] = "";
            $x['category'] = "Custom";
        }else{
            $d = $this->db->get_where('tbl_category', ['category_id' => $new])->row_array();
            $x['design_id'] = "";
            $x['nama'] = "";
            $x['design'] = '{"version":"2.3.6","objects":[]}';
            $x['width'] = $d['category_width'];
            $x['height'] = $d['category_height'];
            $x['design_image'] = "";
            $x['category'] = "";
        }

        $this->load->view('editor/V_editor', $x);
    }
    function get_images() {
        if (isset($_GET['offset']) && isset($_GET['limit']) ) {
            $offset = $_GET['offset'];
            $limit =  $_GET['limit'];

            $row = $this->db->query("SELECT * FROM tbl_image LIMIT $limit OFFSET $offset ")->result_array();

            foreach($row as $r) {
                echo '<div class="mb-3 pics animation all 2"><button style="padding:0px;border-radius:10px;" type="button" class="btn image1" onclick="addImage(\''.$r['image_nama'].'\')"><img style="border-radius:10px;" class="img-fluid" src="'.base_url().'image_assets/'.$r['image_nama'].'" alt="Card image cap"></div>';
            } 


        }
    }
    function get_images_user() {
            if (isset($this->session->user_id)) {
                $id_user = $this->session->user_id;
            }else{
                $id_user = $this->session->admin_id;
            }
            $row = $this->db->query("SELECT * FROM tbl_your_image WHERE image_user_id = '$id_user'")->result_array();

            foreach($row as $r) {
                echo '<div class="mb-3 pics animation all 2"><button style="padding:0px;border-radius:10px;" type="button" class="btn image1" onclick="addImageUser(\''.$r['image_nama'].'\')"><img style="border-radius:10px;" class="img-fluid" src="'.base_url().'image_user/'.$r['image_nama'].'" alt="Card image cap"></div>';
            }

    }
    function upload_image() {
        
        $nama = $_FILES['image']['name'];
        $config['upload_path']          = './image_user/';
        $config['allowed_types']        = 'jpg|jpeg|png';
        $config['max_size']             = 0;
        $config['remove_spaces']        = FALSE;
        $this->load->library('upload', $config);
        if ( $this->upload->do_upload('image')) {
            $this->upload->data();
        }
        if (isset($this->session->user_id)) {
            $id_user = $this->session->user_id;
        }else{
            $id_user = $this->session->admin_id;
        }
        $this->db->query("INSERT INTO tbl_your_image VALUES (NULL,'$id_user','$nama') ");

        echo '<div class="alert alert-success" role="alert">Upload Success</div>';
    }
    function save() {
            $design_id = $this->input->post('design_id');
            $id_user = $this->input->post('id_user');
            $name_file = $this->input->post('name_file');
            $design = $this->input->post('design');
            $width = $this->input->post('width');
            $height = $this->input->post('height');
            $category = $this->input->post('category');
            $design_image = $this->input->post('design_image');
            $level = $this->input->post('level');
            $id_transaksi = $this->input->post('id_transaksi');
            

        if ($level=='2' || $level=='c' || $level=='cp') {
            $check = $this->db->get_where('tbl_user_design', ['design_id' => $design_id])->num_rows();
            if ($check>0) {
                unlink('design_user/'.$design_image);
                define('UPLOAD_DIR', 'design_user/');
                $img = $_POST['imgBase64'];
                $img = str_replace('data:image/png;base64,', '', $img);
                $img = str_replace(' ', '+', $img);
                $data = base64_decode($img);
                $file = UPLOAD_DIR . $design_image;
                $success = file_put_contents($file, $data);
                //send request to ocr 
                $this->M_design->update_user_design($design_id,$id_user,$name_file,$design,$design_image,$width,$height,$category);
                echo 'save';
            }else{
                $name = uniqid();
                define('UPLOAD_DIR', 'design_user/');
                $img = $_POST['imgBase64'];
                $img = str_replace('data:image/png;base64,', '', $img);
                $img = str_replace(' ', '+', $img);
                $data = base64_decode($img);
                $file = UPLOAD_DIR . $name.'.png';
                $success = file_put_contents($file, $data);
                //send request to ocr 
        
                $this->M_design->save_user_design($id_user,$name_file,$design,$name.'.png',$width,$height,$category,$id_transaksi);
                $c = $this->db->query("SELECT * FROM tbl_status_transaksi WHERE transaksi_status_id = '2' AND transaksi_order_id = '$id_transaksi' ")->num_rows();
                if($c['transaksi_keterangan']==NULL) {
                $this->db->query("UPDATE tbl_status_transaksi SET transaksi_status = 2 WHERE transaksi_status_id = '2' AND transaksi_order_id = '$id_transaksi' ");
                }
                $id = $this->db->insert_id();
                echo 'save';
            }


        }elseif($level=='1') {
            $check = $this->db->get_where('tbl_design', ['design_id' => $design_id])->num_rows();
        if ($check>0) {
                unlink('design/'.$design_image);
                define('UPLOAD_DIR', 'design/');
                $img = $_POST['imgBase64'];
                $img = str_replace('data:image/png;base64,', '', $img);
                $img = str_replace(' ', '+', $img);
                $data = base64_decode($img);
                $file = UPLOAD_DIR . $design_image;
                $success = file_put_contents($file, $data);
                //send request to ocr 
                $this->M_design->update_design($design_id,$id_user,$name_file,$design,$design_image,$width,$height,$category);
                echo 'save';
        }else{
            $name = uniqid();
            define('UPLOAD_DIR', 'design/');
            $img = $_POST['imgBase64'];
            $img = str_replace('data:image/png;base64,', '', $img);
            $img = str_replace(' ', '+', $img);
            $data = base64_decode($img);
            $file = UPLOAD_DIR . $name . '.png';
            $success = file_put_contents($file, $data);
            //send request to ocr 
    
            $this->M_design->save($id_user,$name_file,$design,$name.'.png',$width,$height,$category);
            $id = $this->db->insert_id();
            echo 'Editor?design='.$id.'&level='.$level;
        }
        
    }
    }

}