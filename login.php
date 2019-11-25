<?php
session_start();
include 'koneksi.php';
?>

<!DOCTYPE html>
<html>
<head>
    <title>login pelanggan</title>
    <link rel="stylesheet" href="admin/assets/css/bootstrap.css">
    <link rel="stylesheet" href="admin/assets/css/style.css">
    <link rel="stylesheet" href="admin/assets/css/boots.css">
    <link rel="icon" type="" href="./img/Logo-Sumber-Berlian-Motors.png" />
    <style>
        body{
            background-image : url("img/keren.jpg");
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
<!---navbar--->
<?php include 'menu.php'; ?>


    <div class="container" style="margin-top:70px; margin-left:550px ">
        <div class="row">
            <div class="col-md-4">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <center><h3 class="panel-title">Login User</h3>
                  </center>
                    <center><img src="./img/ok.png" alt="" width="60" height="60px">
                </center></div>
                    <div class="panel-body">
                        <form method="post">
                            <div class="form-group">
                                <label>Email</label>
                                <input type="email" class="form-control" name="email">
                            </div>
                            <div class="form-group">
                                <label>Password</label>
                                <input type="password" class="form-control" name="password">
                            </div>
                            <center><button type="submit" class="btn btn-cah" name="login">Login</button>
                        </center>
                            </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
<?php
//jk ada tombol login(tombol login di tekan)
if (isset($_POST["login"]))
{
    $email = $_POST["email"];
    $password = $_POST["password"];
    $ambil = $koneksi->query("SELECT * FROM pelanggan
        WHERE email_pelanggan='$email' AND password_pelanggan='$password'");

    $akunyangcocok = $ambil->num_rows;
    
    if($akunyangcocok==1)
    {
        $akun = $ambil->fetch_assoc();
        $_SESSION["pelanggan"] = $akun;
        echo "<script>alert('anda sukses login');</script>";
        
        if (isset($_SESSION["keranjang"]) OR !empty($_SESSION["keranjang"]))
        {
            echo "<script>location='checkout.php';</script>";
        }
        else
        {
            echo "<script>location='riwayat.php';</script>";
        }
        
    }
    else
    {
        echo "<script>alert('anda gagal login,periksa akun anda');</script>";
        echo "<script>location='login.php';</script>";
    }
}

?>

<footer class="page-footer" style="margin-top:30%">

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
               Jl.Soekano-Hatta No.16 Jakarta Timur,Indonesia
            </div>
            <div class="container text-center" style="margin-top: 20px;">
                Copyright &copy; 2019-2020 Company WEB BY Team Slow Engineering
            </div>

        </div>
</footer>


    
</body>
</html>