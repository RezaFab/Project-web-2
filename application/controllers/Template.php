<?php
class Template extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        if (!isset($this->session->admin_nama) && !isset($this->session->pelanggan_nama)) {
            redirect('Admin');
        }
        $this->load->model('M_design');
        if (!$this->M_admin->check_permission('template')) redirect('Dashboard');
    }

    function index()
    {
        $y['title'] = "Home";
        $x['design'] = $this->db->query("SELECT design_category FROM tbl_design GROUP BY design_category ")->result_array();
        $this->load->view('template/V_header', $y);
        $this->load->view('template/V_home');
        $this->load->view('template/V_footer', $x);
    }
    function design_assets()
    {
        if (!$this->M_admin->check_permission('templateassets')) redirect('Dashboard');
        $x['title'] = "Design Assets";
        $x['design'] = $this->M_design->get_design_assets();
        $this->load->view('admin/template/V_header', $x);
        $this->load->view('admin/V_design', $x);
        $this->load->view('admin/template/V_footer');
    }
    function design_user()
    {
        if (!$this->M_admin->check_permission('templatepelanggan')) redirect('Dashboard');
        $x['title'] = "Design User";
        $x['design'] = $this->M_design->get_design_user();
        $this->load->view('admin/template/V_header', $x);
        $this->load->view('admin/V_design_user', $x);
        $this->load->view('admin/template/V_footer');
    }
    function hapus_design()
    {
        $id = $this->input->post('id');
        $d = $this->db->query("SELECT design_image FROM tbl_design WHERE design_id = '$id'  ")->row_array();
        $this->db->query("DELETE FROM tbl_design WHERE design_id = '$id' ");
        unlink("design/" . $d['design_image']);
    }
    function hapus_design_user()
    {
        $id = $this->input->post('id');
        $this->db->query("DELETE FROM tbl_user_design WHERE design_id = '$id' ");
    }
    function get_data()
    {
        $id = $this->input->post('id');
        $g = $this->db->query("SELECT * FROM tbl_design WHERE design_id = '$id' ")->row_array();
        $ctgry = $this->db->query("SELECT * FROM tbl_product_category")->result_array();
?>
        <div id="alert"></div>
        <div class="row">
            <div class="col-md-5">
                <div class="form-group">
                    <label>Name</label>
                    <input type="text" id="design_nama" class="form-control" value="<?= $g['design_nama']; ?>">
                </div>
                <div class="form-group">
                    <label>Cotegory</label>
                    <select class="form-control" id="design_category">
                        <?php foreach ($ctgry as $c) : ?>
                            <?php if ($g['design_category'] == $c['category_nama']) : ?>
                                <option value="<?= $c['category_nama']; ?>" selected><?= $c['category_nama']; ?></option>
                            <?php else : ?>
                                <option value="<?= $c['category_nama']; ?>"><?= $c['category_nama']; ?></option>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </select>
                </div>
                <button id="<?= $g['design_id']; ?>" type="button" class="btn btn-primary update">Save changes</button>
            </div>
            <div class="col-md-5">
                <center><img style="width: 200px;border-radius:5px;" src="' . base_url('design/'<?= $g['design_image']; ?>" alt=""><br>
                    <p><?= $g['design_width']; ?> X <?= $g['design_height']; ?></p>
                    <br>
                    <a style="width: 50%;" target="_black" href="' . base_url('Editor?design='<?= $g['design_id']; ?>&level=1" class="btn btn-primary">Edit Design</a>
                </center>
            </div>
        </div>
    <?php
    }

    function get_data_user()
    {
        $id = $this->input->post('id');
        $g = $this->db->query("SELECT * FROM tbl_user_design WHERE design_id = '$id' ")->row_array();
    ?>
        <div id="alert"></div>
        <div class="row">
            <div class="col-md-5">
                <div class="form-group">
                    <label>Name</label>
                    <input type="text" id="design_nama" class="form-control" value="<?= $g['design_nama']; ?>">
                </div>
                <button id="<?= $g['design_id']; ?>" type="button" class="btn btn-primary update">Save changes</button>
            </div>
            <div class="col-md-5">
                <center><img style="width: 200px;border-radius:5px;" src="' . base_url('design_user/'<?= $g['design_image']; ?>" alt=""><br>
                    <p><?= $g['design_width']; ?> X <?= $g['design_height']; ?></p>
                    <br>
                    <a style="width: 50%;" target="_black" href="' . base_url('Editor?design='<?= $g['design_id']; ?>&level=cp" class="btn btn-primary">Edit Design</a>
                </center>
            </div>
        </div>
    <?php
    }
    function update_design()
    {
        $id = $this->input->post('id');
        $nama = $this->input->post('nama');
        $category = $this->input->post('category');

        $this->db->query("UPDATE tbl_design SET design_nama = '$nama', design_category = '$category' WHERE design_id = '$id' ");

    ?>
        <div class="alert alert-success" role="alert">
            Update Success..
        </div>
<?php
    }
}
