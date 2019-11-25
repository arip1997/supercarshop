<?php
session_start();
include 'koneksi.php';

//jk tidak ada session pelanggan(blm login),mk di larikan ke login.php
if (!isset($_SESSION["pelanggan"]))
{
    echo "<script>alert('silahkan login');</script>";
    echo "<script>location='login.php';</script>";
}




?>


<!DOCTYPE html>
<html>
<head>
    <title>checkout</title>
    <link rel="stylesheet" href="admin/assets/css/bootstrap.css">
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

<?php include 'menu.php';?>


<section class="konten">
    <div class="container">
        <center><h1>Checkout</h1>
</center> <hr>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Produk</th>
                    <th>Harga</th>
                    <th>Jumlah</th>
                    <th>Subharga</th>
                   
                </tr>
            
            </thead>
            <tbody>
                <?php $nomor=1; ?>
                <?php $totalbelanja = 0; ?>
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
                    
                </tr>
                <?php $nomor++; ?>
                <?php $totalbelanja+=$subharga; ?>
                <?php endforeach ?>
            </tbody>
            <tfoot>
                <tr>
                    <th colspan="4">Total Belanja</th>
                    <th>Rp. <?php echo number_format($totalbelanja) ?> </th>                
                </tr>
            
            </tfoot>
        </table>

        <form method="post">

            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <input type="text" readonly value="<?php echo $_SESSION
                        ["pelanggan"]['nama_pelanggan']?>"
                        class="form-control">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <input type="text" readonly value="<?php echo $_SESSION
                        ["pelanggan"]['telepon_pelanggan']?>"
                        class="form-control">
                    </div>
                </div>
                <div class="col-md-4">
                    <select class="form-control" name="id_ongkir">
                        <option value="">Pilih Ongkos Kirim</option>
                        <?php
                        $ambil = $koneksi->query("SELECT * FROM ongkir");
                        while($perongkir = $ambil->fetch_assoc()){
                        
                        ?>
                        <option value="<?php echo $perongkir["id_ongkir"] ?>">
                            <?php echo $perongkir['nama_kota'] ?> -
                            Rp. <?php echo number_format($perongkir['tarif']) ?>
                        </option>
                        <?php } ?>
                    </select>

                </div>
            </div>
            <div class="form-group">
                <label>Alamat Lengkap Pengiriman</label>
                <textarea class="form-control" name="alamat_pengiriman" placeholder="masukkan alamat lengkap pengiriman(termasuk kode pos)"></textarea>
            
            </div>
            <button class="btn btn-primary" name="checkout">Checkout</button>
        </form>
        <?php
        if (isset($_POST["checkout"]))
        {
            $id_pelanggan = $_SESSION["pelanggan"]["id_pelanggan"];
            $id_ongkir = $_POST["id_ongkir"];
            $tanggal_pembelian = date("Y-m-d");
            $alamat_pengiriman = $_POST['alamat_pengiriman'];

            $ambil = $koneksi->query("SELECT * FROM ongkir WHERE id_ongkir='$id_ongkir'");
            $arrayongkir = $ambil->fetch_assoc();
            $nama_kota = $arrayongkir['nama_kota'];
            $tarif = $arrayongkir['tarif'];



            $total_pembelian = $totalbelanja + $tarif;
            // 1.menyimpan data ke tabel pembelian
            $koneksi->query("INSERT INTO pembelian 
                (id_pelanggan,id_ongkir,tanggal_pembelian,total_pembelian,nama_kota,tarif,alamat_pengiriman)
                VALUES ('$id_pelanggan','$id_ongkir','$tanggal_pembelian','$total_pembelian',
                        '$nama_kota','$tarif','$alamat_pengiriman') ");

               $id_pembelian_barusan =  $koneksi->insert_id;
            
               foreach ($_SESSION["keranjang"] as $_id_produk => $jumlah)
               {
                   //mendapatkan data produk berdasarkan id_produk
                   $ambil=$koneksi->query("SELECT * FROM produk WHERE id_produk='$id_produk'");
                   $perproduk = $ambil->fetch_assoc();

                   $nama = $perproduk['nama_produk'];
                   $harga = $perproduk['harga_produk'];
                   $berat = $perproduk['berat_produk'];

                   $subberat = $perproduk['berat_produk']*$jumlah;
                   $subharga = $perproduk['harga_produk']*$jumlah;

                   $koneksi->query("INSERT INTO pembelian_produk 
                        (id_pembelian,id_produk,nama,harga,berat,subberat,subharga,jumlah)
                        VALUES ('$id_pembelian_barusan','$id_produk','$nama','$harga','$berat',
                        '$subberat','$subharga','$jumlah')");
                    
                    //skrip update stok
                    $koneksi->query("UPDATE produk SET stok_produk=stok_produk -$jumlah
                        WHERE id_produk='$id_produk'");
               }
               // mengkosongkan keranjang belanja
               unset($_SESSION["keranjang"]);

               //tampilan di alihkan ke halaman nota.nota dari pembelian barusan
               echo "<script>alert('pembelian sukses');</script>";
               echo "<script>location='nota.php?id=$id_pembelian_barusan';</script>";
               
              

        }
        ?>

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
               Jl.Soekano-Hatta No.16 Jakarta Timur,Indonesia
            </div>
            <div class="container text-center" style="margin-top: 20px;">
                Copyright &copy; 2015-2018 Company WEB BY Super Racing
            </div>

        </div>
</footer>


</body>
</html>