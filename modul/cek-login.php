<?php
session_start();

include "koneksi.php"; //ambil koneksi ke db

$username = $_POST['username'];
$password = $_POST['password'];
$pass     = stripslashes($password);
$pass     = mysqli_real_escape_string($koneksi, $pass); //mencegah mysql injection
$pass     = md5($pass); 

$sql      = "SELECT * FROM admin WHERE username = '$username' AND password='$pass'";
$login    = mysqli_query($koneksi, $sql);
$row      = mysqli_fetch_array($login);

  if ($row['username'] == $username AND $row['password'] == $pass AND $row['status']== 1){
   session_start(); 
    $_SESSION['id'] = $row['id_admin'];
    $_SESSION['nama'] = $row['nama'];
    $_SESSION['status'] = "login";
    $_SESSION['jabatan'] = $row['jabatan'];
    header('location:/sispak/modul/admin/index.php');
  }

  elseif ($row['status']==2) {
    echo "<script>alert('Maaf, Akun anda tidak aktif. Silakan Hubungi Admin !'); window.location=('/sispak/modul/login.php');</script>";
  }
  else{ //kalo levelnya bukan user ato admin maka masuk sini
    echo "<script>alert('Maaf, Pastikan username dan password anda benar!'); window.location=('/sispak/modul/login.php');</script>";
  }
?>