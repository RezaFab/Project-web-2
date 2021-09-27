<?php
class M_admin extends CI_Model
{

    function get_admin()
    {
        $h = $this->db->query("SELECT * FROM tbl_admin");
        return $h->result_array();
    }
    function hapus_admin($id)
    {
        $h = $this->db->query("DELETE FROM tbl_admin WHERE admin_id = '$id' ");
        return $h;
    }
    function check_permission($perm)
    {
        return
            @$this
                ->db
                ->select('admin_perm_' . $perm)
                ->where('admin_id', $_SESSION['admin_id'])
                ->get('tbl_admin')
                ->row_array()['admin_perm_' . $perm] == "1" ? true : false;
    }
}
