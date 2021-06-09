<?php

class Data extends CI_Controller
{
    function index()
    {
        redirect(base_url('Data/penjualan'));
    }
    function pelanggan()
    {
        $data['data'] = $this->db
            ->query("SELECT pelanggan_nama, pelanggan_email, pelanggan_nohp, pelanggan_lahir, pelanggan_alamat, pelanggan_kecamatan, pelanggan_kabupaten, pelanggan_kodepost, pelanggan_telephone FROM tbl_pelanggan;")
            ->result_array();
        $this->load->view('admin/template/V_header', ['title' => 'Data Pelanggan']);
        $this->load->view('admin/V_data_pelanggan', $data);
        $this->load->view('admin/template/V_footer');
    }
    function produk()
    {
        $data['data'] = $this->db
            ->query("SELECT product_kode, product_image, product_nama, product_harga FROM tbl_product;")
            ->result_array();
        $this->load->view('admin/template/V_header', ['title' => 'Data Produk']);
        $this->load->view('admin/V_data_produk', $data);
        $this->load->view('admin/template/V_footer');
    }
}
