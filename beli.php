<?php
session_start();

// mendaptakan id_produk dari url
$id_produk = $_GET['id'];

// jk sudah ada produk itu dikeranjang, maka produk itu jumlahnya di +1 
if(isset($_SESSION['keranjang'][$id_produk]))
{
    $_SESSION['keranjang'][$id_produk]+=1;
}
// selain itu (belum ada di keranjang),mk produk itu dianggap di beli 1 
else
{
    $_SESSION['keranjang'][$id_produk] = 1;
}

//echo "<pre>";
//print_r($_SESSION);
//echo "</pre>";
    echo "<script>alert('produk telah masuk keranjang belanja');</script>";
    echo "<script>location='keranjang.php';</script>";
?>