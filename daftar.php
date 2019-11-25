<?php include 'koneksi.php';?>
<!DOCTYPE html>
<html>
<head>
    <title>daftar</title>
    <!-- <link rel="stylesheet" href="admin/assets/css/bootstrap.css"> -->
    <link rel="stylesheet" href="admin/assets/css/style.css">
    <link rel="stylesheet" href="admin/assets/css/boots.css">
    <link rel="icon" type="" href="./img/Logo-Sumber-Berlian-Motors.png" />
    <style>
        body{
            background-image : url("img/bck.jpg");
            background-size: cover;
            background-repeat : no-repeat;
            overflow-x: hidden;
        }
    </style>
</head>
<body>
    <div class="container" style="margin-bottom:3%">
        <center><div class="row">
            <col>
            <img src="./img/Logo-Sumber-Berlian-Motors.png" alt="" width="90" height="90px">
        </center>
        </div>

        <marquee class="ruwet" direction="right">Jl.Raya lamongan - Mantup, Ds.Pelang, Kec. Mantup, Kota Lamongan, Jawa Timur 65233</marquee>
                    
    </div>
    
    <?php include 'menu.php'; ?>

   <div class="container" style="margin-top:5%">
        <div class="row">
            <div class="col-md-5 col-md-offset-8">
                <div class="panel panel-default" style="back">
                    <div class="panel-heading">
                    <center><h3 class="panel-title">Daftar Pelanggan</h3></center>
                    <center><img src="./img/ok.png" alt="" width="60" height="60px">
                   </center> </div>
                    <div class="panel-body">
                        <form method="post" class="form-horizontal">
                            <div class="form-group">
                                <label class="control-label col-md-3">Nama</label>
                                <div class="col-md-7">
                                    <input type="text" class="form-control" name="nama" 
                                    required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3">Email</label>
                                <div class="col-md-7">
                                    <input type="email" class="form-control" name="email"
                                    required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3">Password</label>
                                <div class="col-md-7">
                                    <input type="text" class="form-control" name="password"
                                    required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3">Alamat</label>
                                <div class="col-md-7">
                                    <textarea class="form-control" name="alamat"
                                    required></textarea>    
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3">Telp/HP</label>
                                <div class="col-md-7">
                                    <input type="text" class="form-control" name="telepon"
                                    required>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-7 col-md-offset-3">
                                    <center><button class="btn btn-cah" name="daftar">Daftar</button>
                                </center></div>
                            </div>
                        </form>
                        
                        <?php
                            //jk ada tombol dftr/di tekan
                        if (isset($_POST["daftar"]))
                        {
                            //mngmbl isian nama email password alamat telp.
                            $nama = $_POST["nama"];
                            $email = $_POST["email"];
                            $password = $_POST["password"];
                            $alamat = $_POST["alamat"];
                            $telepon = $_POST["telepon"];

                            //validasi cek apakah email sdh d gunakan
                            $ambil = $koneksi->query("SELECT*FROM pelanggan
                                WHERE email_pelanggan='$email'");
                            $yangcocok = $ambil->num_rows;
                            if ($yangcocok==1)
                            {
                                echo "<script>alert('pendaftaran gagal, email sudah di gunakan');</script>";
                                echo "<script>location='daftar.php';</script>";
                            }
                            else
                            {
                                //query insert ke tbl plnggan
                                $koneksi->query("INSERT INTO pelanggan
                                    (email_pelanggan,password_pelanggan,nama_pelanggan,
                                    telepon_pelanggan,alamat_pelanggan)
                                    VALUES('$email','$password','$nama','$telepon','$alamat')");
                                    
                                    echo "<script>alert('pendaftaran sukses,silahkan login');</script>";
                                    echo "<script>location='login.php';</script>";
                            }
                        }
                        
                        ?>
                    </div>
                </div>
            </div>
        </div>
   </div>
   <footer class="page-footer " style="margin-top:15%">
        <div class="container" >
            <div class="row">
                <div class="col 6" style="margin-top: 20px;">
                    <p style="color: white">Follow Us : @SumberMotor</p>
                    <img src="./img/instagram-png-instagram-png-logo-1455.png" alt="" width="30" height="30px">
                    <img src="./img/600px-Facebook_logo_(square).png" alt="" width="30" height="30px">
                    <img src="./img/b1a3fab214230557053ed1c4bf17b46c-twitter-icon-logo-by-vexels.png" alt="" width="30"
                        height="30px">
                    <img src="./img/1499955335whatsapp-icon-logo-png.png" alt="" width="30" height="30px">

                </div>
                <div class="col 6 " style="margin-top: 20px;">
                    
                    
                </div>
            </div>
        </div>
        <div class="footer-copyright">
            <div class="container text-center" style="margin-top: 20px;">
            Jl.Raya lamongan - Mantup, Ds.Pelang, Kec. Mantup, Kota Lamongan, Jawa Timur 65233
        </div>
            <div class="container text-center" style="margin-top: 20px;">
                Copyright &copy; 2019-2020 Company WEB BY Super Racing
            </div>

        </div>
</footer>



</body>
</html>