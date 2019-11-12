
<!---navbar--->
<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container">

        <ul class="nav navbar-nav" style="margin-left:300px;">
            <li><a href="index.php">Home</a></li>
            <li><a href="about.php">About</a></li>
            <li><a href="produk.php">Produk</a></li>
            <li><a href="keranjang.php">Keranjang</a></li>
            

            <?php if (isset($_SESSION["pelanggan"])): ?>
                <li><a href="riwayat.php">Riwayat Belanja</a></li>
                <li><a href="logout.php">Logout</a></li>
            <!---selainitu(blm login||blm ada session pelanggan)--->

            
            <?php else: ?>
                <li><a href="login.php">Login</a></li>
                <li><a href="daftar.php">Daftar</a></li>
            <?php endif?>
                <li><a href="checkout.php">Checkout</a></li>

        </ul>
    </div>
</nav>