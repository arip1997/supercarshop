<?php
session_start();
include 'koneksi.php';
?> 

<!DOCTYPE html>
<html>
<head>
    <title>Produk</title>
    <link rel="stylesheet" href="admin/assets/css/bootstrap.css">
    <link rel="icon" type="" href="./img/Logo-Sumber-Berlian-Motors.png" />
    <link rel="stylesheet" href="admin/assets/css/boots.css">


</head>

    <body>
        
<div class="container" style="margin-bottom:3%">
        <center><div class="row">
            <col>
            <img src="./img/Logo-Sumber-Berlian-Motors.png" alt="" width="90" height="90px">
        </center>
        </div>

        <div class="container" style="margin-bottom:0%">
        <center><div class="row">
        Jl.Raya Lamongan - Mantup, Ds.Pelang, Kec. Mantup, Kota Lamongan, Jawa Timur 65233</center>
        <marquee style="color: black;" direction="right"><h5>Ada Produk Baru dari kita.... silahkan cek <a href="produk.php">disini</a></h5></marquee>
               
    </div>
        <?php include 'menu.php'; ?>

            <section class="konten">
                <div class="container">
                <div class="text-center">
                
                <h1 style="margin-top:5%">Produk</h1>
                <hr>
                
                </div>

                    <div class="row">
                        
                        <?php $ambil = $koneksi->query("SELECT * FROM produk "); ?>
                        <?php while($perproduk = $ambil->fetch_assoc()){ ?>

                        <div class="col-md-3">
                            <div class="thumbnail">
                                <img src="foto_produk/<?php echo $perproduk['foto_produk']; ?>" alt="">
                                <div class="caption">
                                    <h3><?php echo $perproduk['nama_produk']; ?> </h3>
                                    <h5>Rp. <?php echo number_format($perproduk['harga_produk']); ?></h5>
                                    <a href="beli.php?id=<?php echo $perproduk['id_produk']; ?>" 
                                        class="btn btn-primary">Beli</a>
                                    <a href="detail.php?id=<?php echo $perproduk["id_produk"];?>" 
                                        class="btn btn-default">Detail</a>
                                </div>
                            </div>
                        </div>
                        <?php } ?>



                    </div>
                </div>

            </section>

        <?php include "footer.php" ?>
    </body>