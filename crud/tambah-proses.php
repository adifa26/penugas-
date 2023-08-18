<?php
//mulai proses tambah data

//cek dahulu, jika tombol tambah di klik 
if (isset($_POST['tambah'])) {
	//include atau memasukkan file koneksi ke database
	include "koneksi.php";
	//jika tombol tambah benar di klik maka lanjut prosesnya
	$nis = $_POST['nis']; //membuat variabel $nis dan datanya dari inputan NIS
	$nama = $_POST['nama']; //membuat variabel $nama dan datanya dari inputan Nama Lengkap
	$kelas = $_POST['kelas']; //membuat variabel $kelas dan datanya dari inputan Kelas
	$jurusan = $_POST['jrusan']; //membuat variabel $jurusan dan datanya dari inputan dropdown Jurusan
	//melakukan query dengan perintah INSERT INTO untuk memasukkan data ke database 
	$input = mysql_query("INSERT INTO siswa VALUES(NULL, '$nis', '$nama', '$kelas', '$jurusan')") or die(mysql_error());
	//jika query input sukses 
	if ($input) {
		echo "Data berhasil ditambahkan!"; //Pesan jika proses tambah sukses 
		echo "<a href="tambah.php">Kembali</a>"; //membuat Link untuk kembali ke halaman tambah
	}

}else{ //jika tidak terdeteksi tombol tambah di klik

//redirect atau dikembalikan ke halaman tambah 
echo "<script>windows.history.back()</script>";

}
?>