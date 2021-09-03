<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UCARD - Setel Ulang Kata Sandi</title>
    <style>
        body {
            background-color: #F5F5F5;
            text-align: center;
        }

        .btn {
            color: white;
            background-color: #4CAF50;
            font-size: 16px;
            border-radius: 8px;
            border: 0px;
            width: 180px;
            height: 40px;
            cursor: pointer;
        }

        .container {
            background-image: linear-gradient(87deg, #5e72e4 0, #825ee4 100%);
            min-width: 480px;
            max-width: 700px;
            border-radius: 8px;
            height: 580px;
        }

        .body {
            padding: 20px;
            background-color: white;
            text-align: start;
            border-radius: 8px;
        }

        .code {
            text-align: center;
            color: black;
            font-size: 18px;
        }

        .m-auto {
            margin: auto;
        }

        .m-10 {
            margin: 10px;
        }

        .p-10 {
            padding: 10px;
        }

        .text-center {
            text-align: center;
        }

        .w-100 {
            width: 100%;
        }
    </style>
</head>

<body>

    <div class="text-center">
        <div class="container">
            <div class="m-auto p-10 text-center">
                <img src="https://amarizky.com/assets/img/logo-kartuidcard-white.png" alt="">
            </div>
            <div class="m-10 body">
                <h2 class="text-center">Halo, [nama]!</h2>
                <br>
                <p>Kami menerima permintaan setel ulang kata sandi pada akun Anda. Silahkan masukan kode berikut ke dalam form.</p>
                <div class="m-auto w-100">
                    <p class="code"><strong>[kode]</strong></p>
                </div>
                <p>Anda juga bisa menyetel ulang kata sandi Anda dengan menekan tombol di bawah ini.</p>
                <div class="text-center">
                    <a href="https://amarizky.com/Password?email=[email]&resetcode=[kode]">
                        <button class="btn">Reset Password</button>
                    </a>
                </div>
                <p><strong>Kode hanya berlaku 10 menit sejak kode diminta.</strong> Jika bukan Anda yang meminta kode ini, ada kemungkinan bahwa orang lain mencoba untuk mengakses akun Anda. <strong>Jangan berikan kode ini ke siapa pun.</strong></p>
            </div>
            <p style="color: white;">UCard Surabaya<br>Jl. Rungkut Harapan Blk. F No.008, Kali Rungkut, Kec. Rungkut, Kota SBY, Jawa Timur 60293</p>
        </div>
    </div>
</body>

</html>