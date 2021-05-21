<?php
class M_admin extends CI_Model {

    function get_admin() {
        $h = $this->db->query("SELECT * FROM tbl_admin");
        return $h->result_array();
    }
    function tambah_admin($id,$nohp,$nama,$email,$password) {
        $h = $this->db->query("INSERT INTO tbl_admin VALUES ('$id','$nama','$email','$nohp','$password') ");
        return $h;
    }
    function update_admin($id,$hp,$nama,$email,$p) {
        $h = $this->db->query("UPDATE tbl_admin SET admin_nama = '$nama', admin_email = '$email', admin_nohp = '$hp', admin_password = '$p' WHERE admin_id = '$id' ");
        return $h;
    }
    function hapus_admin($id) {
        $h = $this->db->query("DELETE FROM tbl_admin WHERE admin_id = '$id' ");
        return $h;
    }
}