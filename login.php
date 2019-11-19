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
    <style>
        body{
            background-image : url("img/back.jpg");
            background-size: cover;
        }
    </style>
</head>
<body>


<!---navbar--->
<nav class="navbar navbar-default navbar-fixed-top">
    <div class="container sad">

        <ul class="nav navbar-nav sad" style="margin-left:300px;">
            <li><a class="sad" href="index.php">Home</a></li>
            <li><a class="sad" href="about.php">About</a></li>
            <li><a class="sad" href="produk.php">Produk</a></li>
            <li><a class="sad" href="keranjang.php">Keranjang</a></li>
            

            <?php if (isset($_SESSION["pelanggan"])): ?>
                <li><a class="sad" href="riwayat.php">Riwayat Belanja</a></li>
                <li><a class="sad" href="logout.php">Logout</a></li>
            <!---selainitu(blm login||blm ada session pelanggan)--->

            
            <?php else: ?>
                <li><a class="sad" href="login.php">Login</a></li>
                <li><a class="sad" href="daftar.php">Daftar</a></li>
            <?php endif?>
                <li><a class="sad" href="checkout.php">Checkout</a></li>

        </ul>
    </div>
</nav>

    <div class="container" style="margin-top:100px; margin-left:500px">
        <div class="row">
            <div class="col-md-4">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Login Pelanggan</h3>
                    </div>
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
                            <button type="submit" class="btn btn-primary" name="login">Login</button>
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