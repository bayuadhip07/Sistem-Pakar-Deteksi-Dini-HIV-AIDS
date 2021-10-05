<?php
    include('koneksi.php');
    $nama   = $_POST['nama'];
    $umur   = $_POST['umur'];
    $jk     = $_POST['jk'];
    $alamat = $_POST['alamat'];
    $no_hp  = $_POST['no_hp'];
   
    $query_simpan  = mysqli_query($koneksi, "INSERT INTO pengguna VALUES(NULL, '$nama','$umur', '$jk', '$alamat', '$no_hp')");
    if ($query_simpan) {
        $query_get_id= mysqli_query($koneksi, "SELECT id_pengguna FROM pengguna ORDER BY id_pengguna DESC LIMIT 1");
        while ($row_id = mysqli_fetch_array($query_get_id)) {
            session_start(); 
            $_SESSION['id_pengguna'] = $row_id['id_pengguna'];
        ?>
        
            <script>window.location='konsultasi.php'</script>
        <?php
        }
    }else{
        echo "<script>window.location='/sispak/modul/form_konsultasi.php';</script>";
    }
?>