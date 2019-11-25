<?php
session_start();
include 'koneksi.php';
?> 



<!DOCTYPE html>
<html>
    <head>
    <link rel="icon" type="" href="./img/Logo-Sumber-Berlian-Motors.png" />
        
        <title>Sumber Motor</title>

        <link rel="stylesheet" href="admin/assets/css/style.css">
        <link rel="stylesheet" href="admin/assets/css/boots.css">
        <link rel="stylesheet" href="admin/assets/css/bootstrap.css">
        
        <style>
        body{
            background-image : url("img/keren.jpg");
            background-size: cover;
            background-repeat : no-repeat;
            overflow-x: hidden;

        }
        </style>
 
        
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
        <footer class="page-footer " style="margin-top:55%">
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
            </div>
            <div class="footer-copyright">
                <div class="container text-center" style="margin-top: 20px;">
                Jl.Raya lamongan - Mantup, Ds.Pelang, Kec. Mantup, Kota Lamongan, Jawa Timur 65233
                </div>
                <div class="container text-center" style="margin-top: 20px;">
                    Copyright &copy; 2015-2018 Company WEB BY Team Slow Engineering
                </div>

            </div>
    </footer>
           <!-- <div class="container">
                <div class="row">
                    <div class="col-6">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Consequuntur non quas libero commodi. Ipsa vel, unde sapiente officiis aut, ea ut, id doloribus recusandae fugiat beatae aliquid. Suscipit, quasi a?
                    </div>
                    <div class="col-6">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Fuga quibusdam esse sed optio sapiente aliquam, doloremque, a quis nemo necessitatibus laborum fugit quo neque eos in suscipit. Voluptates, eius ratione?
                    </div>
                </div> -->
    
    </body>
</html>