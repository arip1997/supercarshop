<?php
session_start();


include 'koneksi.php';
?> 



<!DOCTYPE html>
<html>
<head>
    <title>Super Racing</title>
    <link rel="stylesheet" href="admin/assets/css/bootstrap.css">
    <!--link rel="stylesheet" href="back.css"-->
</head>
<body>

<?php include 'menu.php'; ?>

<section class="konten">
    <div class="container">
        <h1>Produk</h1>

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
<div>
    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Corporis ullam adipisci dolor eaque magni, incidunt ducimus explicabo temporibus laudantium quo impedit repudiandae est sint dolorum commodi ipsam blanditiis nisi aspernatur.</p>
</div>
<?php include "footer.php" ?>
</body>
</html>