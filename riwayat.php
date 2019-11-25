<?php
session_start();


include 'koneksi.php';

//jk tdk ada session pelanggan(blm login)
if(!isset($_SESSION["pelanggan"]) OR empty($_SESSION["pelanggan"]))
{
    echo "<script>alert('silahkan login');</script>";
    echo "<script>location='login.php';</script>";
    exit();

}
?> 



<!DOCTYPE html>
<html>
<head>
    <title>Super Racing</title>
    <link rel="stylesheet" href="admin/assets/css/bootstrap.css">
    <!-- <link rel="stylesheet" href="admin/assets/css/style.css"> -->
    <!-- <link rel="stylesheet" href="admin/assets/css/boots.css">     -->

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

        
        <section class="riwayat" style="margin-top: 5%">
            <div class="container">
               <center><h3>Riwayat Belanja <?php echo $_SESSION["pelanggan"]["nama_pelanggan"] ?></h3>
            </center> 
                <table class="table table-bordered" style="margin-top: 5%">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Tanggal</th>
                            <th>Status</th>
                            <th>Total</th>
                            <th>Opsi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $nomor=1;
                        //mndptkn id pelanggan yg login dri session
                        $id_pelanggan = $_SESSION["pelanggan"]["id_pelanggan"];

                        $ambil = $koneksi->query("SELECT * FROM pembelian WHERE id_pelanggan='$id_pelanggan'");
                        while($pecah = $ambil->fetch_assoc()){
                        ?>
                        <tr>
                            <td><?php echo $nomor; ?></td>
                            <td><?php echo $pecah["tanggal_pembelian"]  ?></td>
                            <td>
                                <?php echo $pecah["status_pembelian"] ?>
                                <br>
                                <?php if (!empty($pecah['resi_pengiriman'])): ?>
                                Resi: <?php echo $pecah['resi_pengiriman']; ?>
                                <?php endif ?>
                            </td>
                            
                            <td>Rp. <?php echo number_format($pecah["total_pembelian"]) ?></td>
                            <td>
                                <a href="nota.php?id=<?php echo $pecah["id_pembelian"] ?>" class="btn btn-info">Nota</a>
                                <a href="pembayaran.php?id=<?php echo $pecah["id_pembelian"]; ?>" class="btn btn-success">Pembayaran</a>
                            </td>
                        </tr>
                        <?php $nomor++; ?>
                        <?php } ?>
                    </tbody>
                </table>
            
            
            
            
            
            
            
            
            
            </div>

        </section>
        
<footer class="page-footer bg-primary" style="margin-top:35%; ">
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
                Jl.Raya Lamongan-Mantup Kec.Mantup Kab.lamongan,Jawa Timur
            </div>
            <div class="container text-center" style="margin-top: 20px;">
                Copyright &copy; 2018-2019 Company WEB BY Team Slow Engineering
            </div>

        </div>
</footer>


    
</body>
</html>