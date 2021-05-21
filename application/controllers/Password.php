<?php
class Password extends CI_Controller
{
    function index()
    {
        $this->load->view('pelanggan/V_forgot');
    }
    function mail()
    {
        $this->load->view('pelanggan/mail_resetpassword');
    }
    function reset()
    {
        if ($this->input->server('REQUEST_METHOD') !== 'POST') {
            redirect(base_url());
        }

        $email          = $this->input->post('email');
        $resetCode      = $this->input->post('resetcode');
        $newpassword    = $this->input->post('newpassword');

        $pelanggan = $this->db->query("SELECT * FROM tbl_pelanggan WHERE pelanggan_email = '$email' AND pelanggan_resetcode = '$resetCode';")->row_array();
        if ($pelanggan) {
            $req = strtotime($pelanggan['pelanggan_resetcode_expire']);
            $now = time();

            if (($now - $req) < 600) {
                $this->db->set([
                    'pelanggan_password' => md5($newpassword),
                    'pelanggan_resetcode_expire' => time()
                ])->where('pelanggan_id', $pelanggan['pelanggan_id'])->update('tbl_pelanggan');
                echo 'success';
            } else {
                echo 'expire';
            }
        } else {
            echo 'failed';
        }
    }
    function request()
    {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $resetCode = '';
        for ($i = 0; $i < 8; $i++) {
            if ($i > 4 && preg_match_all("/[0-9]/", $resetCode) < 3)
                $resetCode .= $characters[rand(0, 10)];
            else $resetCode .= $characters[rand(0, $charactersLength - 1)];
        }

        $email = $this->input->post('email');
        $pelanggan = $this->db->query("SELECT * FROM tbl_pelanggan WHERE pelanggan_email = '$email';")->row_array();

        if ($pelanggan) {
            $this->db->set([
                'pelanggan_resetcode' => $resetCode,
                'pelanggan_resetcode_expire' => date('Y-m-d H:i:s')
            ])->where('pelanggan_id', $pelanggan['pelanggan_id'])->update('tbl_pelanggan');

            $this->load->library('email');

            $this->email->clear();
            $this->email->to($pelanggan['pelanggan_email']);
            $this->email->from('amarizky02@gmail.com');
            $this->email->subject('UCard Surabaya - Setel Ulang Kata Sandi');
            $this->email->set_mailtype('html');
            $this->email->message('
<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UCARD - Setel Ulang Kata Sandi</title>
    <style>
    body{background-color:#f5f5f5;text-align:center}.btn{color:#fff;background-color:#4caf50;font-size:16px;border-radius:8px;border:0;width:180px;height:40px;cursor:pointer}.container{background-image:linear-gradient(87deg,#5e72e4 0,#825ee4 100%);min-width:480px;max-width:700px;border-radius:8px;height:570px}.body{padding:20px;background-color:#fff;text-align:start;border-radius:8px}.code{text-align:center;color:#000;font-size:18px}.m-auto{margin:auto}.m-10{margin:10px}.p-10{padding:10px}.text-center{text-align:center}.w-100{width:100%}
    </style>
</head>

<body>

    <div class="text-center">
        <div class="container">
            <div class="m-auto p-10 text-center">
                <img src="https://amarizky.site/assets/img/logo-kartuidcard-white.png" alt="">
            </div>
            <div class="m-10 body">
                <h2 class="text-center">Halo, ' . $pelanggan["pelanggan_nama"] . '!</h2>
                <br>
                <p>Kami menerima permintaan setel ulang kata sandi pada akun Anda. Silahkan masukan kode berikut ke dalam form.</p>
                <div class="m-auto w-100">
                    <p class="code"><strong>' . $resetCode . '</strong></p>
                </div>
                <p>Anda juga bisa menyetel ulang kata sandi Anda dengan menekan tombol di bawah ini.</p>
                <div class="text-center">
                    <a href="https://amarizky.site/Password?email=' . $pelanggan["pelanggan_email"] . '&resetcode=' . $resetCode . '">
                        <button class="btn">Reset Password</button>
                    </a>
                </div>
                <p><strong>Kode hanya berlaku 10 menit sejak kode diminta.</strong> Jika bukan Anda yang meminta kode ini, ada kemungkinan bahwa orang lain mencoba mengakses akun Anda. <strong>Jangan berikan kode ini ke siapa pun.</strong></p>
            </div>
            <p style="color: white;">UCard Surabaya<br>Jl. Rungkut Harapan Blk. F No.008, Kali Rungkut, Kec. Rungkut, Kota SBY, Jawa Timur 60293</p>
        </div>
    </div>
</body>

</html>
            ');
            $this->email->send();

            echo 'success';
        } else echo 'failed';
    }
}
