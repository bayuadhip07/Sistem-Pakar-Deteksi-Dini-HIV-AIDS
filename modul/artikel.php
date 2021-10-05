<?php $page='artikel'; include('koneksi.php'); ?>
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

                            $batas = 6;
                            $halaman = isset($_GET['halaman'])?(int)$_GET['halaman'] : 1;
                            $halaman_awal = ($halaman >1) ? ($halaman * $batas) - $batas : 0;	

                            $previous = $halaman - 1;
                            $next = $halaman + 1;

                            $data = mysqli_query($koneksi,"SELECT * FROM artikel");
                            $jumlah_data = mysqli_num_rows($data);
                            $total_halaman = ceil($jumlah_data / $batas);

                            $sql = mysqli_query($koneksi,"SELECT * FROM artikel ORDER BY id_artikel DESC LIMIT $halaman_awal, $batas");
                            $nomor = $halaman_awal+1;
                            while ($row = mysqli_fetch_array($sql)) {
                        ?>
                            <div class="col-md-4 col-sm-12 mb-3">
                                <div class="card">
                                    <img src="/sispak/assets/gambar/<?php echo $row['gambar'] ?>" class="card-img-top" style="height: 200px;" alt="...">
                        
                                    <div class="card-body">
                                        <div class="card-title" style="height: 60px;">
                                            <h4>
                                                <a href="artikel_detail.php?id=<?php echo $row['id_artikel'] ?>" style="text-decoration: none;text-align:justify">
                                                    <?php 
                                                        $strlen= strlen($row['judul']);
                                                        if(strlen($strlen>=30)){
                                                            echo substr($row['judul'], 0 ,40);
                                                        }
                                                        else{
                                                            echo $row['judul'];
                                                        }
                                                    ?>
                                                </a>
                                            </h4>
                                        </div>
                                        <div style="height: 80px;text-align:justify">
                                            <?php
                                                $rangkuman = $row['ringkasan'];
                                                if (strlen($rangkuman)>100) {
                                                   echo substr($rangkuman,0,100).'.....';
                                                }else{
                                                    echo $rangkuman;
                                                }
                                            ?>
                                        </div>
                                    </div>
                                    
                                    <div class="card-footer text-muted">
                                        Dipublikasikan pada <?php if($row['tanggal_diubah']==NULL){echo $row['tanggal_dibuat'];}else{echo $row['tanggal_diubah'];}  ?>
                                    </div>
                                </div>
                            </div>
                        <?php
                            }
                        ?>
                    </div>
                    <?php if($jumlah_data > 6){
                    ?>
                        <nav>
                            <ul class="pagination justify-content-center">
                                <li class="page-item">
                                    <a class="page-link" <?php if($halaman > 1){ echo "href='?halaman=$previous'"; } ?>>Previous</a>
                                </li>
                                <?php 
                                for($x=1;$x<=$total_halaman;$x++){
                                    ?> 
                                    <li class="page-item"><a class="page-link" href="?halaman=<?php echo $x ?>"><?php echo $x; ?></a></li>
                                    <?php
                                }
                                ?>				
                                <li class="page-item">
                                    <a  class="page-link" <?php if($halaman < $total_halaman) { echo "href='?halaman=$next'"; } ?>>Next</a>
                                </li>
                            </ul>
                        </nav>
                    <?php
                    } ?>
                    
                </div>
            </div>
        </div>

        <div class="footer">
            &copy; Bayu Adhi Pamungkas
        </div>
    </body>
    
</html>