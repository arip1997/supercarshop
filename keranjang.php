<?php
session_start();



include 'koneksi.php';



if(empty($_SESSION["keranjang"]) OR !isset($_SESSION["keranjang"]))
{
    echo "<script>alert('keranjang kosong, silahkan belanja dulu');</script>";
    echo "<script>location='index.php';</script>";
}

?>
<!DOCTYPE html>
<html>
<head>
    <title>Keranjang</title>
    <link rel="stylesheet" href="admin/assets/css/bootstrap.css">
    <link rel="icon" type="" href="./img/Logo-Sumber-Berlian-Motors.png" />
</head>
<body>
<div class="container" style="margin-bottom:3%">
        <center><div class="row">
            <col>
            <img src="./img/Logo-Sumber-Berlian-Motors.png" alt="" width="90" height="90px">
        </center>
        </div>

        <marquee class="ruwet" direction="right">Jl.Raya Lamongan - Mantup, Ds.Pelang, Kec. Mantup, Kota Lamongan, Jawa Timur 65233</marquee>
                    
    </div>

<?php include 'menu.php'; ?>

<section class="konten">
    <div class="container" style="margin-top:5%">
        <center><h1>Keranjang Belanja</h1>
      </center>  <hr>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Produk</th>
                    <th>Harga</th>
                    <th>Jumlah</th>
                    <th>Subharga</th>
                    <th>Aksi</th>
                </tr>
            
            </thead>
            <tbody>
                <?php $nomor=1; ?>
                <?php foreach ($_SESSION["keranjang"] as $id_produk => $jumlah): ?>
                <!-- menampilkan produk yang sedang diperlungkan berdasarkan id_produk -->

                <?php
                $ambil = $koneksi->query("SELECT * FROM produk
                    WHERE id_produk= $id_produk");
                $pecah = $ambil->fetch_assoc();
                $subharga = $pecah["harga_produk"]*$jumlah;
                ?>
                <tr>
                    <td><?php echo $nomor; ?></td>
                    <td><?php echo $pecah["nama_produk"]; ?></td>
                    <td>Rp. <?php echo number_format($pecah["harga_produk"]); ?></td>
                    <td><?php echo $jumlah; ?></td>
                    <td>Rp. <?php echo number_format($subharga); ?></td>
                    <td>
                        <a href="hapuskeranjang.php?id=<?php echo $id_produk?>" class="btn btn-danger btn-xs">Hapus</a>
                    </td>
                </tr>
                <?php $nomor++; ?>
                <?php endforeach ?>
            </tbody>
        </table>

        <a href="index.php" class="btn btn-default">Lanjutkan Belanja</a>
        <a href="checkout.php" class="btn btn-primary">Checkout</a>

    </div>
</section>

<footer class="page-footer bg-primary" style="margin-top:25%">
        <div class="container" >
            <div class="row">
                <div class="col 6" style="margin-top: 20px;">
                    <p style="color: white">Follow Us : @Sumbermotor</p>
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
                Copyright &copy; 2015-2018 Company WEB BY Super Racing
            </div>

        </div>
</footer>


    
</body>
</html>