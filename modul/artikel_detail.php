<?php $page='artikel'; include('koneksi.php'); $id_artikel = $_GET['id']; ?>
<html lang="en">
    <head>
        <title>SisPak-HAI</title>
        <?php include('head.php') ?>
    </head>
    <body class="scroll">
        <?php include('navbar.php'); ?>

        <div class="content">
            <div class="container">
                <div class="section">
                    <div class="row">
                        <?php
                            $sql = mysqli_query($koneksi,"SELECT * FROM artikel INNER JOIN admin ON artikel.id_admin = admin.id_admin WHERE id_artikel='$id_artikel'");
                            while ($row = mysqli_fetch_array($sql)) {
                        ?>
                            <div class="col-md-9 col-sm-12 mb-3">
                                <div class="card" style="padding: 3%">
                                    <div style="text-align: center;">
                                        <img src="../assets/gambar/<?php echo $row['gambar'] ?>" alt="<?php echo $row['gambar'] ?>" class="img-artikel">
                                    </div>
                                    <br>
                                    <div class="container">
                                        <h2 style="text-align: justify;"><?php echo $row['judul'] ?></h2>
                                        <?php
                                            if($row['tanggal_diubah']==NULL){
                                            ?>
                                                <p class="text-secondary">Dibuat oleh <?php echo $row['nama'].' pada '.$row['tanggal_dibuat'] ?> </p>
                                            <?php
                                            }else{
                                            ?>
                                                <p class="text-secondary">Dibuat oleh <?php echo $row['nama'].' pada '.$row['tanggal_diubah'] ?> </p>
                                            <?php
                                            }
                                        ?>
                                        
                                        <div style="text-align: justify;">
                                            <?php echo $row['isi'] ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                              <div class="card">
                                  <div class="container" style="padding:5%;">
                                        <h5 style="text-align: center;">Artikel Terbaru</h5>
                                        <hr>
                                        <?php
                                            $sql = mysqli_query($koneksi,"SELECT * FROM artikel ORDER BY id_artikel DESC LIMIT 5");
                                            while ($row = mysqli_fetch_array($sql)) {
                                        ?>
                                            <a href="artikel_detail.php?id=<?php echo $row['id_artikel'] ?>" style="text-decoration: none;">
                                                <h5 style="text-align: justify;"><?php echo $row['judul'] ?></h5>
                                            </a>
                                            <p style="color: black;text-align:justify"><?php echo substr($row['ringkasan'],0,120)."..."; ?></p>
                                            <hr>
                                        <?php
                                            }
                                        ?>
                                  </div>
                              </div>
                            </div>

                        <?php
                            }
                        ?>
                    </div>
                </div>
            </div>
        </div>

        <div class="footer">
            &copy; Bayu Adhi Pamungkas
        </div>
    </body>
    
</html>