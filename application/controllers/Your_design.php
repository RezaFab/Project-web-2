<?php
class Your_design extends CI_Controller {

    function index() {
        $x['title'] = "Your design";
        $this->load->view('template/V_header', $x);
        $this->load->view('template/V_your_design');
        $this->load->view('template/V_footer');
    }
    function get_your_design() {
        $id = $this->input->post('id');
        $offset = $this->input->post('offset');
        $limit = $this->input->post('limit');
          $result = $this->db->query("SELECT * FROM tbl_user_design WHERE design_user_id = '$id' LIMIT $limit OFFSET $offset ")->result_array();
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
            echo '<div class="mb-3 pics animation all 2"><a href="'. base_url('Editor?design='.$r['design_id'].'&level=2').'" style="padding:0px;border-radius:10px;" id="'.$r['design_id'].'" type="button" class="btn image1 info_design"  data-toggle="modal" data-target="#lihat"><img style="border-radius:10px;" class="img-fluid" src="'.base_url().'design_user/'.$r['design_image'].'"></a></div>';
        }
    }
    function get_design() {
        $id = $this->input->post('id');
        $d = $this->db->query("SELECT * FROM tbl_user_design WHERE design_id = '$id' ")->row_array();
        echo '<div class="row">
        <div class="col-md-5">
            <img src="'.base_url('design_user/'.$d['design_image']).'" alt=""><br>
            <center><p>'.$d['design_width'].' X '.$d['design_height'].'</p></center>
        </div>
        <div class="col-md-7">
            <h3>'.$d['design_nama'].'</h3> 
            <p>Category : '.$d['design_category'].'</p>
            <a target="_blank" style="width:100%;border-radius:0px;" href="'.base_url('Editor?myDesign='.$d['design_id'].'&level=2').'" class="btn btn-primary">Edit</a>
            <button title="'.$d['design_image'].'" id="'.$d['design_id'].'" style="width:100%;border-radius:0px;" class="btn btn-danger delete_user_design">Hapus</button>
        </div>
      </div>';
    }
    function delete_design() {
      $id = $this->input->post('id');
      $nama = $this->input->post('nama');
      unlink('design_user/'.$nama);
      $this->db->query("DELETE FROM tbl_user_design WHERE design_id = '$id' ");
    }
}