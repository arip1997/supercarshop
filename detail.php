<?php session_start(); ?>
<?php include 'koneksi.php'; ?>
<?php
//mendapatkan id_produk dari url
$id_produk = $_GET["id"];

//query ambil data
$ambil = $koneksi->query("SELECT * FROM produk WHERE id_produk='$id_produk'");
$detail = $ambil->fetch_assoc();


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Document</title>
    <link rel="stylesheet" href="admin/assets/css/bootstrap.css">

</head>
<body>
<div class="container" style="margin-bottom:3%">
        <center><div class="row">
            <col>
            <img src="./img/Logo-Sumber-Berlian-Motors.png" alt="" width="90" height="90px">
        </center>
        </div>
        <div class="container" style="margin-bottom:3%">
        <center><div class="row">
        Jl.Raya Lamongan - Mantup, Ds.Pelang, Kec. Mantup, Kota Lamongan, Jawa Timur 65233</center>
                    
    </div>

 <?php include 'menu.php'; ?>   


<section class="kontent">
    <div class="container" style="margin-top:150px;">
        <div class="row">

            <div class="col-md-6">
                <img src="foto_produk/<?php echo $detail["foto_produk"]; ?>" alt="" class="img-responsive">
            </div>
            <div class="col-md-6">
                <h2><?php echo $detail["nama_produk"] ?></h2>
                <h4>Rp. <?php echo number_format($detail["harga_produk"]);?></h4>

                <h5>Stok : <?php echo $detail['stok_produk'] ?></h5>

                <form method="post">
                    <div class="form-group">
                        <div class="input-group">
                            
                            <input type="number" min="1" class="form-control" name="jumlah">
                            
                            <div class="input-group-btn">
                                <button class="btn btn-primary" name="beli">Beli</button>
                            </div>
                        </div>
                    </div>
                </form>
                
                <?php
                    //jika ada tombol beli
                if (isset($_POST["beli"]))
                {
                    // mndptkn jmlh yg di inputkan
                $jumlah =  $_POST["jumlah"];
                $details = $detail['stok_produk'];
                if ($jumlah > $details){
                    echo "<script>alert('jumlah pembelian melebihi stock barang');</script>";
                    echo "<script>location='detail.php?id=".$id_produk."';</script>";
                    die();
                }
                
                //mskan di krnjang blnja
                $_SESSION["keranjang"][$id_produk] = $jumlah;

                echo "<script>alert('produk telah masuk ke keranjang belanja');</script>";
                echo "<script>location='keranjang.php';</script>";
                }
                ?>
                <p><?php echo $detail["deskripsi_produk"]; ?></p>
            </div>
        </div>  
    </div>
</section>


<footer class="page-footer bg-primary" style="margin-top:15%">
        <div class="container" >
            <div class="row">
                <div class="col 6" style="margin-top: 20px;">
                    <p style="color: white">Follow Us : @Superracing</p>
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
            Jl.Raya Lamongan - Mantup, Ds.Pelang, Kec. Mantup, Kota Lamongan, Jawa Timur 65233
            </div>
            <div class="container text-center" style="margin-top: 20px;">
                Copyright &copy; 2019-2020 Company WEB BY Team Slow Engineering
            </div>

        </div>
</footer>




</body>
</html>