<?php
//mulai proses edit data

//cek dahulu, jika tombol simpan di klik 
if (isset($_POST['simpan'])) {
	//include atau memasukkan file koneksi ke database
	include('koneksi.php');
	//jika tombol tambah benar di klik makan lanjut prosesnya
	$id = $_POST['id']; //membuat variabel $id dan datanya dari inputan hidden id
	$nis = $_POST['nis']; //membuat variabel $nis dan datanya dari inputan NIS
	$nama = $_POST['nama']; //membuat variabel $nama dan datanya dari inputan Nama Lengkap
	$kelas = $_POST['kelas']; //membuat variabel $kelas dan datanya dari inputan dropdown Kelas
	$jurusan = $_POST['jurusan']; //membuat variabel $jurusan dan datanya dari inputan dropdown Jurusan
	//melakukan query dengan perintah UPDATE untuk update data ke database dengan kondisi WHERE siswa_id='$id' <- diambil dari imputan hidden id 
	$update = mysql_query("UPDATE siswa SET siswa_nis='$nis', siswa_nama='$nama', siswa_kelas='$kelas', siswa_jurusan='$jurusan' WHERE siswa_id='$id'")or die(mysql_error());
	//jika query update sukses 
	if ($update) {
	}
}
?>