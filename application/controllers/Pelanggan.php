<?php
class Pelanggan extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        if (!isset($this->session->admin_nama)) {
            redirect('Admin');
        }
    }

    function index()
    {
        $x['title'] = "Pelanggan";
        $x['pelanggan'] = $this->db->query("SELECT * FROM tbl_pelanggan ORDER BY pelanggan_id DESC")->result_array();
        $this->load->view('admin/template/V_header', $x);
        $this->load->view('admin/V_pelanggan', $x);
        $this->load->view('admin/template/V_footer');
    }
    function tambah_pelanggan()
    {
        $no_hp      = $this->input->post('no_hp');
        $nama       = $this->input->post('nama');
        $email      = $this->input->post('email');
        $password   = md5($this->input->post('pasword'));
        $alamat     = $this->input->post('alamat');
        $telephone  = $this->input->post('telephone');
        $kecamatan  = $this->input->post('kecamatan');
        $kabupaten  = $this->input->post('kabupaten');
        $kodepost   = $this->input->post('kodepost');
        $tgl_lahir  = $this->input->post('tgl_lahir');
        $bln_lahir  = $this->input->post('bln_lahir');
        $thn_lahir  = $this->input->post('thn_lahir');
        $lahir      = $thn_lahir . "-" . $bln_lahir . "-" . $tgl_lahir;
        $nohp       = str_replace(" ", "", $no_hp);

        if (substr(trim($nohp), 0, 1) == '0') $hp = '62' . substr(trim($nohp), 1);
        else $hp = $no_hp;

        $check = $this->db->query("SELECT * FROM tbl_pelanggan WHERE pelanggan_nohp = '$hp' ");
        if ($check->num_rows() > 0) {
            echo '<script>alert("Nomer HP Sudah Terdaftar");</script>';
        } else {
            $this->db->query("INSERT INTO tbl_pelanggan VALUES (NULL,'$hp','$nama','$email','$lahir','$password','$alamat',NULL,'$telephone','$kecamatan','$kabupaten','$kodepost',1,null,null) ");
        }
        redirect('Pelanggan');
    }
    function get_data()
    {
        $id = $this->input->post('id');
        $get = $this->db->query("SELECT * FROM tbl_pelanggan WHERE pelanggan_id = '$id' ")->row_array();
        $html = '<div class="modal-body">
		<div id="alert_edit"></div>
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                  <input type="number" value="' . $get['pelanggan_nohp'] . '" placeholder="No Hp" id="no_hp" required="" class="form-control">
                </div>
                <div class="form-group">
                  <input type="text" value="' . $get['pelanggan_nama'] . '" placeholder="Nama" id="nama" required="" class="form-control">
                </div>
                <div class="form-group">
                  <input type="text" value="' . $get['pelanggan_email'] . '" placeholder="Email" id="email" required="" class="form-control">
                </div>
                <div class="form-group">
                  <input type="password" placeholder="Password" id="password" class="form-control">
                  <input type="hidden" placeholder="Password" id="password_default" value="' . $get['pelanggan_password'] . '" required="" class="form-control">
                </div>
                <div class="form-group">
                  <textarea class="form-control" id="alamat" placeholder="Alamat">' . $get['pelanggan_alamat'] . '</textarea>
                </div>
                  </div>
                  <div class="col-md-6">
                     <div class="form-group">
                  <input type="text" value="' . $get['pelanggan_telephone'] . '" placeholder="Telephone" id="telephone" required="" class="form-control">
                </div>
                <div class="form-group">
                  <input type="text" value="' . $get['pelanggan_kecamatan'] . '" placeholder="Kecamatan" id="kecamatan" required="" class="form-control">
                </div>
                <div class="form-group">
                  <input type="text" value="' . $get['pelanggan_nohp'] . '" placeholder="Kota/Kabupaten" id="kabupaten" required="" class="form-control">
                </div>
                <div class="form-group">
                  <input type="text" value="' . $get['pelanggan_kodepost'] . '" placeholder="Kodepost" id="kodepost" required="" class="form-control">
                </div>
                <div class="form-group">
                  <div class="row">
                    <div class="col-md-4">
                      <select class="form-control" id="tgl_lahir" required="">
                        <option>DD</option>';
        for ($i = 1; $i <= 31; $i++) {
            if (date('d', strtotime($get['pelanggan_lahir'])) == $i) {
                $html .= '<option value="' . $i . '" selected>' . $i . '</option>';
            } else {
                $html .= '<option value="' . $i . '">' . $i . '</option>';
            }
        }
        $html .= '</select>
                    </div>
                    <div class="col-md-4">
                      <select class="form-control" id="bln_lahir" required="">
                        <option>MM</option>';
        for ($i = 1; $i <= 12; $i++) {
            if (date('m', strtotime($get['pelanggan_lahir'])) == $i) {
                $html .= '<option value="' . $i . '" selected>' . $i . '</option>';
            } else {
                $html .= '<option value="' . $i . '">' . $i . '</option>';
            }
        }
        $html .= '</select>
                    </div>
                    <div class="col-md-4">
                      <select class="form-control" id="thn_lahir" required="">
                        <option>YYYY</option>';
        $t = date('Y');
        for ($i = $t; $i >= ($t - 90); $i--) {
            if (date('Y', strtotime($get['pelanggan_lahir'])) == $i) {
                $html .= '<option value="' . $i . '" selected>' . $i . '</option>';
            } else {
                $html .= '<option value="' . $i . '">' . $i . '</option>';
            }
        }
        $html .= '</select>
                    </div>
                  </div>
                </div>
                  </div>
                </div>
            </div>
            
            <div class="modal-footer">
                <button id="' . $get['pelanggan_id'] . '" class="btn btn-primary update">Save</button>
                <button type="button" class="btn btn-link  ml-auto" data-dismiss="modal">Close</button>
            </div>';

        echo $html;
    }
    function get_detail()
    {
        $id = $this->input->post('id');
        $get = $this->db->query("SELECT * FROM tbl_pelanggan WHERE pelanggan_id = '$id' ")->row_array();
        echo '<div class="modal-body">
		<div class="row">
			<div class="col-md-6">
			  <b>Whatsapp</b>
              <p>' . $get['pelanggan_nohp'] . '</p> 
              <b>Nama</b>
              <p>' . $get['pelanggan_nama'] . '</p> 
              <b>Email</b>
              <p>' . $get['pelanggan_email'] . '</p> 
              <b>Tanggal Lahir</b>
              <p>' . $get['pelanggan_lahir'] . '</p>  
              <b>Alamat</b>
              <p>' . $get['pelanggan_alamat'] . '</p>
			</div>
			<div class="col-md-6">
			  <b>Refrensi</b>
              <p>' . $get['pelanggan_refrensi'] . '</p>
              <b>Telephone</b>
              <p>' . $get['pelanggan_telephone'] . '</p>   
              <b>Kecamatan</b>
              <p>' . $get['pelanggan_kecamatan'] . '</p>
              <b>Kabupaten</b>
              <p>' . $get['pelanggan_kabupaten'] . '</p>
              <b>Kodepost</b>
              <p>' . $get['pelanggan_kodepost'] . '</p>
              </div>
			</div>
		</div>';
    }
    function edit_pelanggan()
    {
        $id = $this->input->post('id');
        $no_hp = $this->input->post('no_hp');
        $nama = $this->input->post('nama');
        $email = $this->input->post('email');
        $password = md5($this->input->post('password'));
        $password_default = $this->input->post('password_default');
        $alamat = $this->input->post('alamat');
        $telephone = $this->input->post('telephone');
        $kecamatan = $this->input->post('kecamatan');
        $kabupaten = $this->input->post('kabupaten');
        $kodepost = $this->input->post('kodepost');
        $tgl_lahir = $this->input->post('tgl_lahir');
        $bln_lahir = $this->input->post('bln_lahir');
        $thn_lahir = $this->input->post('thn_lahir');
        $lahir = $thn_lahir . "-" . $bln_lahir . "-" . $tgl_lahir;
        $nohp = str_replace(" ", "", $no_hp);
        if (substr(trim($nohp), 0, 1) == '0') {
            $hp = '62' . substr(trim($nohp), 1);
        } else {
            $hp = $no_hp;
        }
        if (empty($password)) {
            $p = $password_default;
        } else {
            $p = $password;
        }
        $this->db->query("UPDATE tbl_pelanggan SET pelanggan_nohp = '$hp', pelanggan_nama = '$nama', pelanggan_email = '$email', pelanggan_lahir = '$lahir', pelanggan_password = '$p', pelanggan_alamat = '$alamat', pelanggan_telephone = '$telephone', pelanggan_kecamatan = '$kecamatan', pelanggan_kabupaten = '$kabupaten', pelanggan_kodepost = '$kodepost' WHERE pelanggan_id =  '$id' ");
    }
    function hapus_pelanggan()
    {
        $id = $this->input->post('id');
        $this->db->query("DELETE FROM tbl_pelanggan WHERE pelanggan_id = '$id' ");
    }
    function dihidupkan()
    {
        $nohp = $this->input->post('nohp');
        $this->db->query("UPDATE tbl_pelanggan SET pelanggan_status = '1' WHERE pelanggan_nohp = '$nohp' ");
    }
    function dimatikan()
    {
        $nohp = $this->input->post('nohp');
        $this->db->query("UPDATE tbl_pelanggan SET pelanggan_status = '0' WHERE pelanggan_nohp = '$nohp' ");
    }
}
