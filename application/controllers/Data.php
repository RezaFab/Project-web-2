<?php

class Data extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        if (!isset($this->session->admin_nama)) {
            redirect('Admin');
        }
        if (!$this->M_admin->check_permission('data')) redirect('Dashboard');
    }
    function index()
    {
        redirect('Data/penjualan');
    }
    function pelanggan()
    {
        if (!$this->M_admin->check_permission('datapelanggan')) redirect('Dashboard');
        $data['data'] = $this->db
            ->query("SELECT pelanggan_nama, pelanggan_email, pelanggan_nohp, pelanggan_lahir, pelanggan_alamat, pelanggan_kecamatan, pelanggan_kabupaten, pelanggan_kodepost, pelanggan_telephone FROM tbl_pelanggan;")
            ->result_array();
        $this->load->view('admin/template/V_header', ['title' => 'Data Pelanggan']);
        $this->load->view('admin/V_data_pelanggan', $data);
        $this->load->view('admin/template/V_footer');
    }
    function produk()
    {
        if (!$this->M_admin->check_permission('dataproduk')) redirect('Dashboard');
        $data['data'] = $this->db
            ->query("SELECT product_kode, product_image, product_nama, product_harga FROM tbl_product;")
            ->result_array();
        $this->load->view('admin/template/V_header', ['title' => 'Data Produk']);
        $this->load->view('admin/V_data_produk', $data);
        $this->load->view('admin/template/V_footer');
    }
    function penjualan()
    {
        if (!$this->M_admin->check_permission('datapenjualan')) redirect('Dashboard');
        $data['data'] = $this->db
            ->query("SELECT pe.pelanggan_nama, pr.product_nama, tr.transaksi_atas_nama, tr.transaksi_tanggal, tr.transaksi_jumlah, tr.transaksi_harga
                    FROM tbl_transaksi tr JOIN tbl_pelanggan pe ON (tr.transaksi_nohp=pe.pelanggan_nohp) JOIN tbl_product pr ON (tr.transaksi_product_id=pr.product_id);")
            ->result_array();
        $this->load->view('admin/template/V_header', ['title' => 'Data Produk']);
        $this->load->view('admin/V_data_penjualan', $data);
        $this->load->view('admin/template/V_footer');
    }
}
