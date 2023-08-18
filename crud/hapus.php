<?php
//memulai proses hapus data

//cek dahulu, apakah benar URL sudah ada GET id -> hapus.php?id=siswa_id
if (isset($_GET['id'])) {
	//include atau memasukkan file koneksi ke database
	include "koneksi.php";
	//membuat variabel $id yg bernilai dari URL GET id -> hapus.php?id=siswa_id
	$id = $_GET['id'];
	//cek ke database apakah ada data siswa dengan siswa_id='$id'
	$cek = mysql_query("SELECT siswa_id FROM siswa WHERE siswa_id='$id'")or die(mysql_error());
	//jika data siswa tidak ada
	if(mysql_num_rows($cek) == 0){
		//jika data tidak ada, maka redirect atau dikembalikan ke halaman beranda
		echo "Data siswa berhasil di hapus!"; //pesan jika proses hapus berhasil
		echo "<a href="index.php">Kembali</a>"; //membuat Link untuk kembali ke halaman beranda
	}
}else{
	//redirect atau dikembalikan ke halaman beranda
	echo "<script>windows.history.back()</script>";
}
?>