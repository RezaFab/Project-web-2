<?php
class Template extends CI_Controller {
    function __construct() {
        parent::__construct();
        if (!isset($this->session->pelanggan_nama)) {
            redirect('Admin');        
        }
        $this->load->model('M_design');
    }

    function index() {
        $y['title'] = "Home";
        $x['design'] = $this->db->query("SELECT design_category FROM tbl_design GROUP BY design_category ")->result_array();
        $this->load->view('template/V_header', $y);
        $this->load->view('template/V_home');
        $this->load->view('template/V_footer', $x);
    }
}