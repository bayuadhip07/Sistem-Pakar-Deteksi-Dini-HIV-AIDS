<?php
$host = 'localhost';
$dbusername = 'root';
$dbpassword = '';
$dbname = 'sispak';

$koneksi = mysqli_connect($host, $dbusername, $dbpassword, $dbname);
if (!$koneksi) {
    die("Koneksi gagal:" . mysqli_connect_error());
}
