<?php
class Image extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        if (!isset($this->session->admin_nama)) {
            redirect('Admin');
        }
        $this->load->model('M_images');
        if (!$this->M_admin->check_permission('image')) redirect('Dashboard');
    }

    function index()
    {
        redirect('Image/image_assets');
    }

    function image_assets()
    {
        if (!$this->M_admin->check_permission('imageassets')) redirect('Dashboard');
        $x['title'] = "Image Assets";
        $x['image'] = $this->M_images->get_images_assets();
        $this->load->view('admin/template/V_header', $x);
        $this->load->view('admin/V_image_assets', $x);
        $this->load->view('admin/template/V_footer');
    }
    function image_user()
    {
        if (!$this->M_admin->check_permission('imagepelanggan')) redirect('Dashboard');
        $x['title'] = "Image Pelanggan";
        $x['image'] = $this->M_images->get_images_user();
        $this->load->view('admin/template/V_header', $x);
        $this->load->view('admin/V_image_user', $x);
        $this->load->view('admin/template/V_footer');
    }
    function get_image()
    {
        $id = $this->input->post('id');
        $i = $this->db->get_where('tbl_image', ['image_id' => $id])->row_array();

?>
        <div id="alert"></div>
        <div class="form-group">
            <label>Type</label>
            <select id="premium" class="form-control">
                <?php
                if ($i['image_premium'] == '0') {
                ?>
                    <option value="2" selected>Free</option>
                <?php
                } else {
                ?>
                    <option value="2">Free</option>
                <?php
                }
                if ($i['image_premium'] == '1') {
                ?>
                    <option value="1" selected>Premium</option>
                <?php
                } else {
                ?>
                    <option value="1">Premium</option>
                <?php
                }
                ?>
            </select>
        </div>
        <button id="<?= $i['image_id']; ?>" type="button" class="btn btn-primary update_image">Save changes</button>
    <?php
    }
    function tambah_image()
    {
        $id = $this->input->post('id_user');
        $nama = $_FILES['image']['name'];
        $config['upload_path']          = './image_assets/';
        $config['allowed_types']        = 'jpg|jpeg|png';
        $config['max_size']             = 0;
        $config['remove_spaces']        = FALSE;
        $this->load->library('upload', $config);
        if ($this->upload->do_upload('image')) {
            $this->upload->data();
        }
        $this->M_images->tambah_image($id, $nama);
        redirect('Image/image_assets');
    }
    function update_image()
    {
        $id = $this->input->post('id');
        $premium = $this->input->post('premium');
        $this->db->query("UPDATE tbl_image SET image_premium = '$premium' WHERE image_id = '$id' ");
    ?>
        <div class="alert alert-success" role="alert">
            Update Success..
        </div>
<?php
    }
    function hapus_image_assets()
    {
        $id = $this->input->post('id');
        $nama = $this->input->post('nama');
        unlink('image_assets/' . $nama);
        $this->M_images->hapus_image_assets($id);
    }
    function hapus_image_user()
    {
        $id = $this->input->post('id');
        $nama = $this->input->post('nama');
        unlink('image_user/' . $nama);
        $this->M_images->hapus_image_user($id);
    }
}
