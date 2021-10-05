<?php
include('../../koneksi.php');

if ($_GET['act'] == 'tambahAnggota') {
    session_start();
    $nama = $_POST['nama'];
    $username = $_POST['username'];
    $pass = $_POST['password'];
    $password = md5($pass);
    $jabatan = '2';
    $status = '1';

    //query
    $querytambah =  mysqli_query($koneksi, "INSERT INTO admin VALUES(NULL, '$nama' , '$username' , '$password', '$jabatan', '$status')");

    if ($querytambah) {
        $_SESSION['msg'] = 'Data berhasil disimpan !';
        header("Location:/sispak/modul/admin/anggota/show.php");
    } else {
        $_SESSION['err'] = 'Terjadi kesalahan saat menyimpan data !';
        echo "<script>window.location='/sispak/modul/admin/anggota/show.php';</script>";
    }
} elseif ($_GET['act'] == 'ubahAnggota') {
    session_start();
    $id_admin   = $_POST['id_admin'];
    $nama       = $_POST['nama'];
    $username   = $_POST['username'];
    $status     = $_POST['status'];

    //query update
    $queryupdate = mysqli_query($koneksi, "UPDATE admin SET nama='$nama', username='$username' , status='$status' WHERE id_admin='$id_admin' ");

    if ($queryupdate) {
        $_SESSION['msg'] = 'Data berhasil diubah !';
        header("Location:/sispak/modul/admin/anggota/show.php");
    } else {
        $_SESSION['err'] = 'Terjadi kesalahan saat mengubah data !';
        echo "<script>window.location='/sispak/modul/admin/anggota/show.php';</script>";
    }
} elseif ($_GET['act'] == 'hapusAnggota') {
    session_start();
    $id_admin = $_GET['id'];
    //query hapus
    $querydelete = mysqli_query($koneksi, "DELETE FROM admin WHERE id_admin = '$id_admin'");

    if ($querydelete) {
        $_SESSION['msg'] = 'Data berhasil dihapus !';
        header("Location:/sispak/modul/admin/anggota/show.php");
    } else {
        $_SESSION['err'] = 'Terjadi kesalahan saat menghapus data !';
        echo "<script>window.location='/sispak/modul/admin/anggota/show.php';</script>";
    }

    mysqli_close($koneksi);
} elseif ($_GET['act'] == 'profil') {
    session_start();
    $id_admin = $_POST['id_admin'];
    $nama = $_POST['nama'];
    $username = $_POST['username'];
    $pass = $_POST['password'];
    $password = md5($pass);

    //query update
    $queryupdate = mysqli_query($koneksi, "UPDATE admin SET nama='$nama', username='$username' , password='$password' WHERE id_admin='$id_admin' ");

    if ($queryupdate) {
        $_SESSION['msg'] = 'Profil berhasil diubah !';
        header("Location:/sispak/modul/admin/anggota/profil.php");
    } else {
        $_SESSION['err'] = 'Terjadi kesalahan saat mengubah profil !';
        echo "<script>window.location='/sispak/modul/admin/anggota/profil.php';</script>";
    }
} elseif ($_GET['act'] == 'tambahStadium') {
    session_start();
    $stadium = $_POST['stadium_penyakit'];
    $detail = $_POST['detail'];
    $saran = $_POST['saran'];
    //query
    $querytambah =  mysqli_query($koneksi, "INSERT INTO stadium_penyakit VALUES(NULL, '$stadium' , '$detail' , '$saran')");

    if ($querytambah) {
        $_SESSION['msg'] = 'Data berhasil disimpan !';
        header("Location:/sispak/modul/admin/stadium/show.php");
    } else {
        $_SESSION['err'] = 'Terjadi kesalahan saat menyimpan data !';
        echo "<script>window.location='/sispak/modul/admin/stadium/show.php';</script>";
    }
} elseif ($_GET['act'] == 'ubahStadium') {
    session_start();
    $id_penyakit = $_POST['id_penyakit'];
    $stadium = $_POST['stadium_penyakit'];
    $detail = $_POST['detail'];
    $saran = $_POST['saran'];

    //query update
    $queryupdate = mysqli_query($koneksi, "UPDATE stadium_penyakit SET stadium_penyakit='$stadium', detail='$detail' , saran='$saran' WHERE id_penyakit='$id_penyakit' ");

    if ($queryupdate) {
        $_SESSION['msg'] = 'Data berhasil diubah !';
        header("Location:/sispak/modul/admin/stadium/show.php");
    } else {
        $_SESSION['err'] = 'Terjadi kesalahan saat mengubah data !';
        echo "<script>window.location='/sispak/modul/admin/stadium/show.php';</script>";
    }
} elseif ($_GET['act'] == 'hapusStadium') {
    session_start();
    $id_penyakit = $_GET['id'];
    //query hapus
    $querydelete = mysqli_query($koneksi, "DELETE FROM stadium_penyakit WHERE id_penyakit = '$id_penyakit'");
    if ($querydelete) {
        $_SESSION['msg'] = 'Data berhasil dihapus !';
        header("Location:/sispak/modul/admin/stadium/show.php");
    } else {
        $_SESSION['err'] = 'Terjadi kesalahan saat menghapus data !';
        echo "<script>window.location='/sispak/modul/admin/stadium/show.php';</script>";
    }

    mysqli_close($koneksi);
} elseif ($_GET['act'] == 'tambahGejala') {
    session_start();
    $gejala = $_POST['gejala'];
    //query
    $querytambah =  mysqli_query($koneksi, "INSERT INTO gejala VALUES(NULL, '$gejala')");

    if ($querytambah) {
        $_SESSION['msg'] = 'Data berhasil disimpan !';
        header("Location:/sispak/modul/admin/gejala/show.php");
    } else {
        $_SESSION['err'] = 'Terjadi kesalahan saat menyimpan data !';
        echo "<script>window.location='/sispak/modul/admin/gejala/tambah.php';</script>";
    }
} elseif ($_GET['act'] == 'ubahGejala') {
    session_start();
    $id_gejala = $_POST['id_gejala'];
    $gejala = $_POST['gejala'];
    //query update
    $queryupdate = mysqli_query($koneksi, "UPDATE gejala SET gejala='$gejala' WHERE id_gejala='$id_gejala'");

    if ($queryupdate) {
        $_SESSION['msg'] = 'Data berhasil diubah !';
        header("Location:/sispak/modul/admin/gejala/show.php");
    } else {
        $_SESSION['err'] = 'Terjadi kesalahan saat mengubah data !';
        echo "<script>window.location='/sispak/modul/admin/gejala/show.php';</script>";
    }
} elseif ($_GET['act'] == 'hapusGejala') {
    session_start();
    $id_gejala = $_GET['id'];

    //query hapus
    $querydelete = mysqli_query($koneksi, "DELETE FROM gejala WHERE id_gejala = '$id_gejala'");

    if ($querydelete) {
        $_SESSION['msg'] = 'Data berhasil dihapus !';
        header("Location:/sispak/modul/admin/gejala/show.php");
    } else {
        $_SESSION['err'] = 'Terjadi kesalahan saat menghapus data !';
        echo "<script>window.location='/sispak/modul/admin/gejala/show.php';</script>";
    }

    mysqli_close($koneksi);
} elseif ($_GET['act'] == 'tambahPengetahuan') {
    session_start();
    $id_penyakit = $_POST['stadium'];
    $id_gejala = $_POST['gejala'];
    $cf = $_POST['nilai_cf'];
    //query
    $querytambah =  mysqli_query($koneksi, "INSERT INTO basis_pengetahuan VALUES(NULL, '$id_penyakit' , '$id_gejala' , '$cf')");

    if ($querytambah) {
        $_SESSION['msg'] = 'Data berhasil disimpan !';
        header("Location:/sispak/modul/admin/basis_pengetahuan/show.php");
    } else {
        $_SESSION['err'] = 'Terjadi kesalahan saat menyimpan data !';
        echo "<script>window.location='/sispak/modul/admin/basis_pengetahuan/show.php';</script>";
    }
} elseif ($_GET['act'] == 'ubahPengetahuan') {
    session_start();
    $id_pengetahuan = $_POST['id_pengetahuan'];
    $id_penyakit    = $_POST['stadium'];
    $id_gejala      = $_POST['gejala'];
    $cf             = $_POST['nilai_cf'];

    //query update
    $queryupdate = mysqli_query($koneksi, "UPDATE basis_pengetahuan SET id_penyakit='$id_penyakit', id_gejala='$id_gejala' , nilai_cf='$cf' WHERE id_pengetahuan='$id_pengetahuan' ");

    if ($queryupdate) {
        $_SESSION['msg'] = 'Data berhasil diubah !';
        header("Location:/sispak/modul/admin/basis_pengetahuan/show.php");
    } else {
        $_SESSION['err'] = 'Terjadi kesalahan saat mengubah data !';
        echo "<script>window.location='/sispak/modul/admin/basis_pengetahuan/show.php';</script>";
    }
} elseif ($_GET['act'] == 'hapusPengetahuan') {
    session_start();
    $id_pengetahuan = $_GET['id'];

    //query hapus
    $querydelete = mysqli_query($koneksi, "DELETE FROM basis_pengetahuan WHERE id_pengetahuan = '$id_pengetahuan'");

    if ($querydelete) {
        $_SESSION['msg'] = 'Data berhasil dihapus !';
        header("Location:/sispak/modul/admin/basis_pengetahuan/show.php");
    } else {
        $_SESSION['err'] = 'Terjadi kesalahan saat menghapus data !';
        echo "<script>window.location='/sispak/modul/admin/basis_pengetahuan/show.php';</script>";
    }

    mysqli_close($koneksi);
} elseif ($_GET['act'] == 'tambahArtikel') {
    session_start();
    $id_admin   = $_POST['id_admin'];
    $tanggal    = date('d F Y');
    $judul      = $_POST['judul'];
    $isi        = $_POST['isi'];
    $ringkasan  = $_POST['ringkasan'];
    $status     = 1;

    $ekstensi   =  array('png', 'jpg', 'jpeg', 'gif');
    $gambar     = $_FILES['gambar']['name'];
    $ukuran     = $_FILES['gambar']['size'];
    $ext        = pathinfo($gambar, PATHINFO_EXTENSION);

    if (!in_array($ext, $ekstensi)) 
    {
        $_SESSION['err'] = 'Format File Tidak Didukung!';
        header("location:/sispak/modul/admin/artikel/tambah.php");
    } 
    else 
    {
        if ($ukuran < 1044070) 
        {
            $xx = $gambar;
            move_uploaded_file($_FILES['gambar']['tmp_name'], '../../../assets/gambar/'. $gambar);
            if (mysqli_query($koneksi, "INSERT INTO artikel (id_admin, tanggal_dibuat, tanggal_diubah, judul, ringkasan, isi, gambar, status) VALUES('$id_admin','$tanggal', NULL, '$judul', '$ringkasan', '$isi','$xx' ,'$status')")) 
            {
                $_SESSION['msg'] = 'Data berhasil disimpan!';
                header("Location:/sispak/modul/admin/artikel/show.php");
            } else 
            {
                $_SESSION['err'] = 'Terjadi kesalahan saat menyimpan data!';
                echo "<script>window.location='/sispak/modul/admin/artikel/show.php';</script>";
            }
        } 
        else 
        {
            $_SESSION['err'] = 'Ukuran File Terlalu Besar!';
            header("location:/sispak/modul/admin/artikel/tambah.php");
        }
    }
} elseif ($_GET['act'] == 'ubahArtikel') {
    session_start();
    $id_admin   = $_POST['id_admin'];
    $id_artikel = $_POST['id_artikel'];
    $tanggal    = date('d F Y');
    $judul      = $_POST['judul'];
    $isi        = $_POST['isi'];
    $ringkasan  = $_POST['ringkasan'];
    $status     = $_POST['status'];
    $filename   = $_FILES['gambar']['name'];
    $ukuran     = $_FILES['gambar']['size'];
    $ext    = pathinfo($filename, PATHINFO_EXTENSION);

    if ($filename != "") 
    {
        $ekstensi_diperbolehkan = array('png', 'jpg', 'jpeg', 'gif');
        $x                      = explode('.', $filename); //memisahkan nama file dengan ekstensi yang diupload
        $ekstensi               = strtolower(end($x));
        $file_tmp               = $_FILES['gambar']['tmp_name'];
        $nama_gambar_baru       = $filename;
        if (in_array($ekstensi, $ekstensi_diperbolehkan) === true) 
        {
            move_uploaded_file($file_tmp, '../../../assets/gambar/' . $nama_gambar_baru); //memindah file gambar ke folder gambar
            unlink('../../../assets/gambar/' . $_POST['gambar_lama']);

            // jalankan query UPDATE berdasarkan ID yang produknya kita edit
            $query  = "UPDATE artikel SET id_admin = '$id_admin', tanggal_diubah = '$tanggal', judul = '$judul', ringkasan='$ringkasan', isi = '$isi', gambar = '$nama_gambar_baru', status = '$status'";
            $query .= "WHERE id_artikel = '$id_artikel'";
            $result = mysqli_query($koneksi, $query);
            // periska query apakah ada error
            if (!$result) 
            {
                $_SESSION['err'] = 'Terjadi kesalahan saat mengubah data!';
                echo "<script>window.location='/sispak/modul/admin/artikel/show.php';</script>";
            } 
            else 
            {
                $_SESSION['msg'] = 'Data berhasil diubah!';
                header("Location:/sispak/modul/admin/artikel/show.php");
            }
        } 
        else 
        {
            //jika file ekstensi tidak jpg dan png maka alert ini yang tampil
            echo "<script>alert('Ekstensi gambar yang boleh hanya jpg,jpeg atau png.');window.location='../artikel/ubah.php';</script>";
        }
    } 
    else 
    {
        $query  = "UPDATE artikel SET id_admin = '$id_admin', tanggal_diubah = '$tanggal', judul = '$judul',ringkasan='$ringkasan', isi = '$isi', status = '$status'";
        $query .= "WHERE id_artikel = '$id_artikel'";
        $result = mysqli_query($koneksi, $query);
        if (!$result) 
        {
            $_SESSION['err'] = 'Terjadi kesalahan saat mengubah data!';
            echo "<script>window.location='/sispak/modul/admin/artikel/show.php';</script>";
        } 
        else 
        {
            $_SESSION['msg'] = 'Data berhasil diubah!';
            header("Location:/sispak/modul/admin/artikel/show.php");
        }
    }
} elseif ($_GET['act'] == 'hapusArtikel') 
{
    session_start();
    $id_artikel = $_GET['id'];

    $querydelete = mysqli_query($koneksi, "DELETE FROM artikel WHERE id_artikel = '$id_artikel'");
    unlink('../../../assets/gambar/' . $_GET['gambar']);
    if ($querydelete) 
    {
        $_SESSION['msg'] = 'Data berhasil dihapus!';
        header("Location:/sispak/modul/admin/artikel/show.php");
    } 
    else 
    {
        $_SESSION['err'] = 'Terjadi kesalahan saat menghapus data!';
        echo "<script>window.location='/sispak/modul/admin/artikel/show.php';</script>";
    }

    mysqli_close($koneksi);
}
