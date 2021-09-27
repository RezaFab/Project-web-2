<?php
class Admin extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
    }

    function index()
    {
        if (isset($_SESSION['admin_nama'])) redirect(base_url('Order'));
        else if (isset($_SESSION['pelanggan_nama'])) redirect(base_url('Order_pelanggan'));
        $this->load->view('V_login');
    }
    function login()
    {
        $email = $this->input->post('email');
        $password = md5($this->input->post('password'));

        $admin = $this->db->query("SELECT * FROM tbl_admin WHERE admin_email = '$email' AND admin_password = '$password' ")->row_array();
        $pelanggan = $this->db->query("SELECT * FROM tbl_pelanggan WHERE pelanggan_email = '$email' AND pelanggan_password = '$password' ")->row_array();

        if ($admin) {
            $data = [
                'admin_id' => $admin['admin_id'],
                'admin_nama' => $admin['admin_nama'],
                'admin_nohp' => $admin['admin_nohp'],
                'admin_email' => $admin['admin_email']
            ];
            $this->session->set_userdata($data);
            echo 'admin';
        } else if ($pelanggan) {
            $data = [
                'pelanggan_id' => $pelanggan['pelanggan_id'],
                'pelanggan_nama' => $pelanggan['pelanggan_nama'],
                'pelanggan_nohp' => $pelanggan['pelanggan_nohp'],
                'pelanggan_email' => $pelanggan['pelanggan_email']
            ];
            $this->session->set_userdata($data);
            echo 'pelanggan';
        } else {
            echo 'gagal';
        }
    }
    function logout_pelanggan()
    {
        $this->session->unset_userdata('pelanggan_id');
        $this->session->unset_userdata('pelanggan_nama');
        $this->session->unset_userdata('pelanggan_email');
        $this->session->unset_userdata('pelanggan_nohp');
        redirect('Admin');
    }
    function logout_admin()
    {
        $this->session->unset_userdata('admin_id');
        $this->session->unset_userdata('admin_nama');
        $this->session->unset_userdata('admin_email');
        $this->session->unset_userdata('admin_nohp');
        redirect('Admin');
    }
}
