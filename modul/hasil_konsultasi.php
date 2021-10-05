<?php
$page = 'konsultasi';
include('koneksi.php');
session_start();
if ($_SESSION['id_pengguna']==NULL) {
    echo "<script>alert('Silakan isi form konsultasi terlebih dahulu!'); window.location=('/sispak/modul/form_konsultasi.php');</script>";
}
date_default_timezone_set("Asia/Jakarta");
$input_tanggal  = date('m-d-Y H:i:s');
$array_bobot = array('0', '0', '0.4', '0.6', '0.8', '1');
$array_gejala = array();

for ($no = 0; $no < count($_POST['kondisi']); $no++) {
    // Explode memisahkan string menjadi array
    $arkondisi = explode("_", $_POST['kondisi'][$no]);
    if (strlen($_POST['kondisi'][$no]) > 1) {
        $array_gejala += array($arkondisi[0] => $arkondisi[1]);
    }
}

// Memanggil kondisi dari db
$sqlkondisi         = mysqli_query($koneksi, "SELECT * FROM kondisi order by id_kondisi+0");
while ($row_kondisi = mysqli_fetch_array($sqlkondisi)) {
    $array_kondisitext[$row_kondisi['id_kondisi']] = $row_kondisi['kondisi'];
}

// Memanggil stadium penyakit
$sqlpkt = mysqli_query($koneksi, "SELECT * FROM stadium_penyakit order by id_penyakit+0");
while ($row_penyakit = mysqli_fetch_array($sqlpkt)) {
    $nama_penyakit[$row_penyakit['id_penyakit']] = $row_penyakit['stadium_penyakit'];
    $detail_penyakit[$row_penyakit['id_penyakit']] = $row_penyakit['detail'];
    $saran_penyakit[$row_penyakit['id_penyakit']] = $row_penyakit['saran'];
}


// PERHITUNGAN CERTAINTY FACTOR

$sqlpenyakit = mysqli_query($koneksi, "SELECT * FROM stadium_penyakit order by id_penyakit");
$arpenyakit = array();
while ($rpenyakit = mysqli_fetch_array($sqlpenyakit)) {
    $cf = 0;
    //filter by penyakit
    $sqlgejala = mysqli_query($koneksi, "SELECT * FROM basis_pengetahuan where id_penyakit=$rpenyakit[id_penyakit]");
    
    // $sqlgejala = mysqli_query($koneksi, "SELECT * FROM basis_pengetahuan where id_penyakit=3");
    $cf_rule = [];
    $c_fold = 0;
    while ($rgejala = mysqli_fetch_array($sqlgejala)) {
        
        $array_kondisi = explode("_", $_POST['kondisi'][0]);
        $gejala = $array_kondisi[0];
        
        for ($i = 0; $i < count($_POST['kondisi']); $i++) {
            $array_kondisi = explode("_", $_POST['kondisi'][$i]);
            $gejala = $array_kondisi[0];
            if ($rgejala['id_gejala'] == $gejala) {
                $cf = ($rgejala['nilai_cf']) * $array_bobot[$array_kondisi[1]];
                array_push($cf_rule, $cf);
                $c_fold_arr = [];
                for ($i = 0; $i < count($cf_rule) - 1; $i++) {
                    $cf1 = $i == 0 ? $cf_rule[$i] : $c_fold;
                    $cf2 = $cf_rule[$i + 1];
                    if (($cf1 >= 0 && $cf2 > 0)) {
                        $cf_combine = $cf1 + $cf2 * (1 - $cf1);
                    } elseif ($cf1 < 0 || $cf2 < 0) {
                        $cf_combine = $cf1 + $cf2 / ((1 - abs($cf1)) + (1 - abs($cf2)));
                    } else {
                        $cf_combine = $cf1 + $cf2 * (1 + $cf1);
                    }
                    $c_fold = $cf_combine;
                    array_push($c_fold_arr, $c_fold);
                }
            }
        }
    }
    if ($c_fold > 0) {
        $arpenyakit += array($rpenyakit['id_penyakit'] => number_format($c_fold, 5));
        arsort($arpenyakit);
    }
    elseif($c_fold==0){
        $arpenyakit += array($rpenyakit['id_penyakit'] => number_format(0, 0));
    }
}

// if (in_array('2', $array_gejala))ggoiikl
// {ok
// 	echo 'OK';
// }

// if (isset($_POST)) {
//     echo json_encode($c_fold);
//     die;
// }

arsort($arpenyakit);

$input_gejala = serialize($array_gejala);
$input_penyakit = serialize($arpenyakit);

$np1 = 0;
foreach ($arpenyakit as $key1 => $value1) {
    $np1++;
    $idpkt1[$np1] = $key1;
    $vlpkt1[$np1] = $value1;
}



$simpan = mysqli_query($koneksi, "INSERT INTO konsultasi(tanggal, gejala, penyakit) VALUES ('$input_tanggal','$input_gejala', '$input_penyakit')");
if($simpan){
    $id_pengguna = $_SESSION['id_pengguna'];
    $get_id_konsultasi  = mysqli_query($koneksi, "SELECT id_konsultasi FROM konsultasi ORDER BY id_konsultasi DESC LIMIT 1");
    while ($row_id_konsul = mysqli_fetch_array($get_id_konsultasi)) {
        $id_konsultasi  = $row_id_konsul['id_konsultasi'];
    }
    mysqli_query($koneksi, "INSERT INTO hasil_konsultasi(id_konsultasi, id_pengguna, id_penyakit, nilai_akurasi) VALUES ('$id_konsultasi', '$id_pengguna', '$idpkt1[1]', '$vlpkt1[1]')");
}
?>


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
                    <h2>Hasil Diagnosa</h2>
                    <hr>
                    <div class="table-responsive">
                        <table width='100%' class="table table-bordered table-striped" border='1'>
                            <thead style="text-align: center;">
                                <th>No</th>
                                <th>Kode</th>
                                <th>Gejala yang dialami</th>
                                <th>Kondisi</th>
                            </thead>
                            <tbody>
                                <?php
                                $ig = 0;
                                foreach ($array_gejala as $key => $value) {
                                    $kondisi = $value;
                                    $ig++;
                                    $gejala = $key;
                                    $query_gejala_hasil = mysqli_query($koneksi, "SELECT * FROM gejala where id_gejala = '$key'");
                                    $r4 = mysqli_fetch_array($query_gejala_hasil);
                                ?>
                                    <tr style="text-align: center;">
                                        <td><?php echo $ig ?></td>
                                        <td><?php echo 'G' . str_pad($r4['id_gejala'], 3, '0', STR_PAD_LEFT); ?></td>
                                        <td style="text-align: justify;"><?php echo $r4['gejala'] ?></td>
                                        <td><?php echo $array_kondisitext[$kondisi] ?></td>
                                        
                                    </tr>
                                <?php
                                }
                                ?>
                                
                            </tbody>
                        </table>
                    </div>
                    <div class="card card-body bg-light">
                        <h5>Diagnosa</h5>
                        <div class="jumbotron jumbotron-fluid">
                            <?php 
                                $np = 0;
                                foreach ($arpenyakit as $key => $value) 
                                {
                                    $np++;
                                    $idpkt[$np] = $key;
                                    $nmpkt[$np] = $nama_penyakit[$key];
                                    $vlpkt[$np] = $value;
                                }
                                
                            ?>
                                <div class="container">
                                    <div style="padding-left: 3%;">
                                        <?php 
                                            if($nmpkt[1]!="Tidak Terkena HIV/AIDS"){
                                                echo "<p class='lead' style='text-align: justify;'>Berdasarkan kondisi yang telah anda pilih pada halaman sebelumnya, dapat disimpulkan bahwa </p>";
                                                echo "<p style='font-size: 30px;font-weight:400'>Terdapat Kemungkinan Anda Terkena HIV/AIDS $nmpkt[1] </p>";
                                                echo "<h6 style='margin-top: -20px;'>dengan tingkat akurasi sebesar ".number_format($vlpkt[1] * 100, 2)."%</h6>";
                                            }
                                            else {
                                                echo "<p class='lead' style='text-align: justify;'>Berdasarkan kondisi yang telah anda pilih pada halaman sebelumnya, dapat disimpulkan bahwa anda</p>";
                                                echo "<p style='font-size: 40px;font-weight:500'> $nmpkt[1]</p>";
                                            }
                                        ?>
                                    </div>
                                </div>
                        </div>
                    </div>
                    <div class="card" style="margin-top: 2%;">
                        <div class="card-header" style="background-color: rgba(0, 212, 255, 1);">
                            <b>Detail</b>
                        </div>
                        <div class="card-body">
                            <?php echo $detail_penyakit[$idpkt[1]] ?>
                        </div>
                    </div>
                    <div class="card" style="margin-top: 2%;">
                        <div class="card-header" style="background-color: rgba(255, 143, 0, 1);">
                            <b>Saran</b>
                        </div>
                        <div class="card-body">
                            <p>Untuk mendapatkan hasil diagnosa yang lebih akurat, anda dapat menghubungi dokter terdekat untuk melakukan pemeriksaan lebih lanjut.</p>
                            <?php echo $saran_penyakit[$idpkt[1]] ?>.
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
<?php 
    unset($_SESSION['id_pengguna']);
?>
</html>