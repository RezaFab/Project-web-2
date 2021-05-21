<?php
class M_images extends CI_Model {
    function __construct() {
        $this->tblName = 'tbl_image';
    }

    function getRows($params = array()){
        $this->db->select('*');
        $this->db->from($this->tblName);
        
        //fetch data by conditions
        if(array_key_exists("where",$params)){
            foreach ($params['where'] as $key => $value){
                $this->db->where($key,$value);
            }
        }
        
        if(array_key_exists("order_by",$params)){
            $this->db->order_by($params['order_by']);
        }
        
        if(array_key_exists("image_id",$params)){
            $this->db->where('image_id',$params['image_id']);
            $query = $this->db->get();
            $result = $query->row_array();
        }else{
            //set start and limit
            if(array_key_exists("start",$params) && array_key_exists("limit",$params)){
                $this->db->limit($params['limit'],$params['start']);
            }elseif(!array_key_exists("start",$params) && array_key_exists("limit",$params)){
                $this->db->limit($params['limit']);
            }
            
            if(array_key_exists("returnType",$params) && $params['returnType'] == 'count'){
                $result = $this->db->count_all_results();
            }else{
                $query = $this->db->get();
                $result = ($query->num_rows() > 0)?$query->result_array():FALSE;
            }
        }

        //return fetched data
        return $result;
    }
    function upload_image($nama_file) {
        $h = $this->db->query("INSERT INTO tbl_your_image VALUES (NULL,20,'$nama_file') ");
        return $h;
    }
    function get_images_assets() {
        $h = $this->db->query("SELECT * FROM tbl_image");
        return $h->result_array();
    }
    function get_images_user() {
        $h = $this->db->query("SELECT * FROM tbl_your_image");
        return $h->result_array();
    }
    function tambah_image($id,$nama) {
        $h = $this->db->query("INSERT INTO tbl_image VALUES (NULL,'$id','$nama') ");
        return $h;
    }
    function hapus_image_assets($id) {
        $h = $this->db->query("DELETE FROM tbl_image WHERE image_id = '$id' ");
        return $h;
    }
    function hapus_image_user($id) {
        $h = $this->db->query("DELETE FROM tbl_your_image WHERE image_id = '$id' ");
        return $h;
    }

}