<link rel="stylesheet" href="admin/assets/css/bootstrap.css">
<!---navbar--->
<nav class="navbar navbar-default ">
    <div class="container sad">
   

        <ul class="nav navbar-nav sad" style="margin-left:300px;">
            <li><a class="sad" href="index.php">Home</a></li>
            <li><a class="sad" href="about.php">About Us</a></li>
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