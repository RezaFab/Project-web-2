<?php
class Administrator extends CI_Controller {
    function __construct() {
        parent::__construct();
        if (!isset($this->session->admin_nama)) {
            redirect('Admin');        
        }
        $this->load->model('M_admin');
    }

    function index() {
        $x['title'] = "Admin";
        $x['admin'] = $this->M_admin->get_admin();
        $this->load->view('admin/template/V_header', $x);
        $this->load->view('admin/V_admin', $x);
        $this->load->view('admin/template/V_footer');
    }
    function get_data() {
        $id = $this->input->post('id');
        $a = $this->db->query("SELECT * FROM tbl_admin WHERE admin_id = '$id' ")->row_array();

        $html = '<div id="alert_edit"></div>
        <div class="modal-body">
        <div class="form-group">
        <label>No Hp</label>
        <input type="number" id="nohp" class="form-control" value="'.$a['admin_nohp'].'">
        </div>
        <div class="form-group">
        <label>Name</label>
        <input type="text" id="nama" class="form-control" value="'.$a['admin_nama'].'">
        </div>
        <div class="form-group">
        <label>Email</label>
        <input type="text" id="email" class="form-control" value="'.$a['admin_email'].'">
        </div>
        <div class="form-group">
        <label>Password</label>
        <input type="password" autocomplete="off" id="password" class="form-control">
        <input type="hidden" id="password_default" value="'.$a['admin_password'].'" class="form-control">
        </div>
        </div>
            
            <div class="modal-footer">
                <button id="'.$a['admin_id'].'" type="button" class="btn btn-primary update">Save</button>
                <button type="button" class="btn btn-link  ml-auto" data-dismiss="modal">Close</button>
            </div>';

        echo $html;
    }
    function tambah_admin() {
        $id = 'A-'.time();
        $no_hp = $this->input->post('nohp');
        $nama = $this->input->post('nama');
        $email = $this->input->post('email');
        $password = md5($this->input->post('password'));
        $nohp = str_replace(" ","",$no_hp);
            if(substr(trim($nohp), 0, 1)=='0'){
                $hp = '62'.substr(trim($nohp), 1);
            }else{
                $hp = $no_hp;
            }

        $this->M_admin->tambah_admin($id,$hp,$nama,$email,$password);
        redirect('Administrator');
    }
    function update_admin() {
        $id = $this->input->post('id');
        $no_hp = $this->input->post('nohp');
        $nama = $this->input->post('nama');
        $email = $this->input->post('email');
        $password = md5($this->input->post('password'));
        $password_default = $this->input->post('password_default');
        $nohp = str_replace(" ","",$no_hp);
          $nohp = str_replace(" ","",$no_hp);
            if(substr(trim($nohp), 0, 1)=='0'){
                $hp = '62'.substr(trim($nohp), 1);
            }else{
                $hp = $no_hp;
            }

        if (empty($password)) {
            $p = $password_default;
        }else{
            $p = $password;
        }

        $this->M_admin->update_admin($id,$hp,$nama,$email,$p);
    }
    function hapus_admin() {
        $id = $this->input->post('id');
        $this->M_admin->hapus_admin($id);
    }
}