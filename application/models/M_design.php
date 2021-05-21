<?php

class M_design extends CI_Model {

    function get_design() {
        $h = $this->db->query("SELECT * FROM tbl_design ");
        return $h->result_array();
    }

    function save($id_user,$name_file,$design,$name,$width,$height,$category) {
        $h=$this->db->query("INSERT INTO tbl_design VALUES (NULL,'$id_user','$name_file','$design','$name','$width','$height','$category') ");
        return $h;
    }
    function save_user_design($id_user,$name_file,$design,$design_image,$width,$height,$category,$id_transaksi) {
        $h=$this->db->query("INSERT INTO tbl_user_design VALUES (NULL,'$id_user','$name_file','$design','$design_image','$width','$height','$category','$id_transaksi') ");
        return $h;
    }
    function update_user_design($myDesign,$id_user,$name_file,$design,$design_image,$width,$height,$category) {
        $h = $this->db->query("UPDATE tbl_user_design SET design_user_id = '$id_user', design_nama = '$name_file', design_design = '$design', design_image = '$design_image', design_width = '$width', design_height = '$height', design_category = '$category' WHERE design_id = '$myDesign' ");
        return $h;
    }
    function update_design($design_id,$id_user,$name_file,$design,$design_image,$width,$height,$category) {
        $h = $this->db->query("UPDATE tbl_design SET design_user_id = '$id_user', design_nama = '$name_file', design_design = '$design', design_image = '$design_image', design_width = '$width', design_height = '$height', design_category = '$category' WHERE design_id = '$design_id' ");
        return $h;
    }
    function get_design_assets() {
        $h = $this->db->query("SELECT * FROM tbl_design");
        return $h->result_array();
    }
    function get_design_user() {
        $h = $this->db->query("SELECT * FROM tbl_user_design");
        return $h->result_array();
    }
}