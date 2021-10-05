<?php $page='about' ?>
<html lang="en">
    <head>
        <title>SisPak-HAI</title>
        <?php include('head.php') ?>
    </head>
    <body class="scroll">
        <?php include('navbar.php'); ?>

        <div class="content">
            <div class="container d-flex justify-content-between">
                <div class="section">
                    <img src="/sispak/assets/image/logo.png" alt="logo.png" class="logo-bio">
                    <p class="h1-bio">Sistem Pakar Deteksi Dini HIV/AIDS dengan Metode <i> Forward Chaining</i> dan <i>Certainty Factor</i></p>
                    <div class="biodata">
                        <button type="button" class="btn btn-primary btn-bio" style="font-weight: 500;" data-toggle="modal" data-target="#modalPengembang">
                            Pengembang Aplikasi
                        </button>
                        <button type="button" class="btn btn-primary btn-bio" style="font-weight: 500;" data-toggle="modal" data-target="#modalPakar">
                            Pakar 
                        </button>
                        <button type="button" class="btn btn-primary btn-bio" style="font-weight: 500;" data-toggle="modal" data-target="#modalDosbing">
                            Dosen Pembimbing
                        </button>
                    </div>
                    <div class="container">
                        <p class="deskripsi-bio">
                        Sistem pakar deteksi dini HIV/AIDS ini mampu melakukan deteksi awal untuk penyakit HIV/AIDS dengan memanfaatkan pengetahuan yang bersumber dari pakar serta berdasarkan berbagai macam studi literatur. Penelitian ini menggunakan metode <i>forward chaining</i> sebagai mesin inferensi dan menggunakan metode <i>certainty factor</i> untuk menghitung tingkat kepercayaan pakar terhadap hasil diagnosis yang diberikan oleh sistem.
                        </p>
                    </div>
                    
                    
                    <!-- Modal Pengembang Web -->
                    <div class="modal fade" id="modalPengembang" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-scrollable">
                            <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Biodata Pengembang Web</h5>
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>
                            <div class="modal-body">
                                <table style="width: 95%" align="center">
                                    <tr>
                                        <img src="/sispak/assets/image/bayu.jpeg" style="width: 200px;display:block;margin:auto" alt="Bayu Adhi Pamungkas.jpeg">
                                        <br>
                                    </tr>
                                    <tr>
                                        <td style="width: 40%;"><h6>Nama</h6></td>
                                        <td style="width: 5%"><h6>:</h6></td>
                                        <td><h6>Bayu Adhi Pamungkas</h6></td>
                                    </tr>
                                    <tr>
                                        <td><h6>Tempat, Tanggal Lahir</h6></td>
                                        <td><h6>:</h6></td>
                                        <td><h6>Kebumen, 15 Agustus 1999</h6></td>
                                    </tr>
                                    <tr>
                                        <td><h6>Prodi</h6></td>
                                        <td><h6>:</h6></td>
                                        <td><h6>Teknik Informatika</h6></td>
                                    </tr>
                                    <tr>
                                        <td><h6>Agama</h6></td>
                                        <td><h6>:</h6></td>
                                        <td><h6>Islam</h6></td>
                                    </tr>
                                    <tr>
                                        <td><h6>Alamat</h6></td>
                                        <td><h6>:</h6></td>
                                        <td><h6 style="text-align:justify">Desa Dorowati, Kecamatan Klirong, Kabupaten Kebumen</h6></td>
                                    </tr>
                                    <tr>
                                        <td><h6>No. HP</h6></td>
                                        <td><h6>:</h6></td>
                                        <td><h6>082242484585</h6></td>
                                    </tr>
                                    <tr>
                                        <td><h6>Email</h6></td>
                                        <td><h6>:</h6></td>
                                        <td><h6>bayuadhip01@gmail.com</h6></td>
                                    </tr>
                                </table>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                                <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
                            </div>
                            </div>
                        </div>
                    </div>


                    <!-- Modal Pakar -->
                    <div class="modal fade" id="modalPakar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-scrollable">
                            <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Biodata Pakar</h5>
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>
                            <div class="modal-body">
                                <table style="width: 95%" align="center">
                                    <tr>
                                        <img src="/sispak/assets/image/pakar.jpeg" style="width: 200px;display:block;margin:auto" alt="Bayu Adhi Pamungkas.jpeg">
                                        <br>
                                    </tr>
                                    <tr>
                                        <td style="width: 40%;"><h6>Nama</h6></td>
                                        <td style="width: 5%"><h6>:</h6></td>
                                        <td><h6>dr. Indah Kory'ah</h6></td>
                                    </tr>
                                    <tr>
                                        <td><h6>Tempat, Tanggal Lahir</h6></td>
                                        <td><h6>:</h6></td>
                                        <td><h6>Bekasi, 11 September 1986</h6></td>
                                    </tr>
                                    <tr>
                                        <td><h6>Jenis Kelamin</h6></td>
                                        <td><h6>:</h6></td>
                                        <td><h6>Perempuan</h6></td>
                                    </tr>
                                    <tr>
                                        <td><h6>Agama</h6></td>
                                        <td><h6>:</h6></td>
                                        <td><h6>Islam</h6></td>
                                    </tr>
                                    <tr>
                                        <td><h6>Alamat</h6></td>
                                        <td><h6>:</h6></td>
                                        <td><h6 style="text-align:justify">Desa Podoluhur, Kecamatan Klirong, Kabupaten Kebumen</h6></td>
                                    </tr>
                                    <tr>
                                        <td><h6>No. HP</h6></td>
                                        <td><h6>:</h6></td>
                                        <td><h6>087737767725</h6></td>
                                    </tr>
                                    <tr>
                                        <td><h6>Email</h6></td>
                                        <td><h6>:</h6></td>
                                        <td><h6>indahkoryah79@gmail.com</h6></td>
                                    </tr>
                                </table>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                                <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
                            </div>
                            </div>
                        </div>
                    </div>

                    
                    <!-- Modal dosbing -->
                    <div class="modal fade" id="modalDosbing" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Dosen Pembimbing</h5>
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>
                            <div class="modal-body">
                                <table style="width: 95%" align="center">
                                    <tr>
                                        <td style="width: 40%;"><h6>Dosen Pembimbing 1</h6></td>
                                        <td style="width: 5%"><h6>:</h6></td>
                                        <td><h6>Apriade Voutama, M.Kom.</h6></td>
                                    </tr>
                                    <tr>
                                        <td><h6>Dosen Pembimbing 2</h6></td>
                                        <td><h6>:</h6></td>
                                        <td><h6>Betha Nurina Sari, M.Kom.</h6></td>
                                    </tr>
                                </table>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                            </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <div class="footer">
            &copy; Bayu Adhi Pamungkas
        </div>

    </body>
</html>