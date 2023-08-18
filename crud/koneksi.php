<?php 
 
$server = "localhost";
$user = "root";
$pass = "";
$database = "crud";
 
$koneksi = mysqli_connect($host, $user, $pass) or die("Koneksi ke database gagal!");
mysqli_select_db($name, $koneksi) or die("Tidak ada database yang dipilih!");
?>