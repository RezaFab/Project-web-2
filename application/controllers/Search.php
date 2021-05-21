<?php
class Search extends CI_Controller {

    function index() {
        $x['title'] = $this->input->get('key');
        $this->load->view('template/V_header', $x);
        $this->load->view('template/V_search');
        $this->load->view('template/V_footer');
    }
    function get_data() {
        $key = $this->input->post('key');
        $id = $this->input->post('id');
        $category = $this->input->post('category');
        $offset = $this->input->post('offset');
        $limit = $this->input->post('limit');
        if (!empty($category)) {
          $result = $this->db->query("SELECT * FROM tbl_design WHERE design_category = '$category' LIMIT $limit OFFSET $offset ")->result_array();
        }else{
          $result = $this->db->query("SELECT * FROM tbl_design WHERE design_nama LIKE '%$key%' OR design_category LIKE '%$key%' LIMIT $limit OFFSET $offset ")->result_array();
        }
        foreach($result as $r) {
            if ($r['design_width']>2000 && $r['design_height']>2000) {
                $w = $r['design_width']/13;
              $h = $r['design_height']/13;
              }elseif($r['design_width']>2000 || $r['design_height']>2000){
                $w = $r['design_width']/5;
              $h = $r['design_height']/5;
              }elseif($r['design_width']>1000 && $r['design_height']>1000){
                $w = $r['design_width']/5;
              $h = $r['design_height']/5;
              }elseif($r['design_width']>1000 || $r['design_height']>1000){
                $w = $r['design_width']/5;
              $h = $r['design_height']/5;
              }elseif($r['design_width']<1000 && $r['design_height']<1000){
              $w = $r['design_width']/2.3;
              $h = $r['design_height']/2.3;
              }
            echo '<div class="mb-3 pics animation all 2"><a href="'. base_url('Editor?design='.$r['design_id'].'&level=c&id='.$id).'" style="padding:0px;border-radius:10px;" type="button" class="btn image1"><img style="border-radius:10px;" class="img-fluid" src="'.base_url().'design/'.$r['design_image'].'"></a></div>';
        }
    }
}