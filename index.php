<?php $page='home' ?>
<html lang="en">
    <head>
        <title>SisPak-HAI</title>
        <?php include('modul/head.php') ?>
    </head>
    <body class="scroll">
        <?php include('modul/navbar.php') ?>

        <div class="content">
            <div class="container d-flex justify-content-between">
                <div class="section">
                    <div class="section-left" style="padding-top: 20px;">
                        <p style="font-weight: 500;">Selamat Datang di Web</p>
                        <h1 style="font-weight: 700;margin-top:-15px">Sistem Pakar Deteksi Dini HIV/AIDS</h1>
                        <a href="modul/form_konsultasi.php" class="btn btn-success" style="margin-top: 20px;font-weight:500;">Konsultasi</a>
                    </div>
                    <div class="section-right">
                        <img src="/sispak/assets/image/logo.png" alt="">
                    </div>
                </div>
            </div>
        </div>

        <div class="footer">
            &copy; Bayu Adhi Pamungkas
        </div>
    </body>
    
</html>