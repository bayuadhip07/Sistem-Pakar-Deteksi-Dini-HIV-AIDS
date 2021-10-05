<?php $page='konsultasi';include('koneksi.php') ?>
<html lang="en">
    <head>
        <title>SisPak-HAI</title>
        <?php include('head.php') ?>
    </head>
    <body class="scroll">
        <?php include('navbar.php'); ?>

        <div class="content">
            <div class="row">
                <div class="col-md-12 col-sm-12 mb-3">
                    <div class="card kartu" style="padding: 3%">
                        <h2 style="text-align: center;padding-bottom:2%">Form Konsultasi</h2>
                        <form action="sql_konsultasi.php" method="POST">
                            <div class="form-group">
                                <label for="nama">Nama Lengkap</label>
                                <input type="text" name="nama" id="nama" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="umur">Umur</label>
                                <input type="number" name="umur" id="umur" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="jk">Jenis Kelamin</label>
                                <select name="jk" id="jk" class="form-control" required>
                                    <option disabled selected>Pilih Jenis Kelamin</option>
                                    <option value="1">Laki-laki</option>
                                    <option value="2">Perempuan</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="alamat">Alamat</label>
                                <textarea name="alamat" id="alamat" cols="20" rows="2" class="form-control" required></textarea>
                            </div>
                            <div class="form-group">
                                <label for="no_hp">No. HP</label>
                                <input type="number" name="no_hp" id="no_hp" class="form-control" required>
                            </div>
                            <div style="text-align: right;">
                                <input type="submit" value="Selanjutnya" class="btn btn-success">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="footer">
            &copy; Bayu Adhi Pamungkas
        </div>
    </body>
    
</html>