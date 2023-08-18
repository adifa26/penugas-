<!DOCTYPE html>
<html>
<head>
	<title>Simple CRUD</title>
</head>
<body>
    <h2>Simple CRUD</h2>
    <p><a href="index.php">Beranda</a> / <a href="tambah.php">Tambah Data</a></p>
    <h3>Edit Data Siswa</h3>
    <?php

    //proses mengambil data ke database untuk ditampilkan di form edit berdasarkan siswa_id yang didapatkan dariGET id -> edit.php/id=siswa_id
    //include atau memasukkan file koneksi ke database 
    include "koneksi.php";
    //membuat variabel $id yg nilainya adalah URL GET id -> edit.php?id=siswa_id
    $id = $_GET['id'];
    //melakukan query ke database dengan SELECT table siswa dengan kondisi WHERE 
    $siswa_id='[$id]';
    $query_mysql = mysql_query("SELECT * FROM siswa WHERE siswa_id='$id'")or die(mysql_error());
    //cek apakah data dari hasil query ada atau tidak
    if (mysql_num_rows($query_mysql) == 0) {
    	//jika tidak ada data yang sesuai maka langsung di arahkan ke halaman depan atau beranda -> index.php
    	echo "<script>windows.history.back()</script>";
    }else {
    	//jika data ditemukan, maka membuat veriabel $data
    	$data = mysql_fetch_assoc($query_mysql);//mengambil data ke database yang nantinya akan ditampilkan di form edit di bawah
    }
?>
<form action="edit-proses.php" method="post">
	<input type="hidden" name="id" value="<?php echo $id; ?>"> <!-- membuat inputan hidden dan nilainya adalah siswa_id -->
	<table cellpadding="3" cellspacing="0">
		<tr>
			<td>NIS</td>
			<td>:</td>
			<td><input type="text" name="nis" value="<?php echo $data['siswa_nis']; ?>">
            <required></td> <!-- value diambil dari hasil query -->
            </tr>
            <tr>
            	<td>Nama Lengkap</td>
            	<td>:</td>
            	<td><input type="text" name="nama" size="30" value="<?php echo $data['siswa_nama']; ?>" required></td> <!-- value diambil dari hasil query -->
            </tr>
            <tr>
            	<td>Kelas</td>
            	<td>:</td>
            	<td>
            		 
            		<select name="Kelas" requuired>
            			<option value="Pilih Kelas"></option>
            			<option value="X" <?php if($data['siswa_kelas'] =='X'){ echo"selected";}
            		?>>X</option> <!-- jika data di database sama dengan value maka akan terselect/terpilih -->
            		<option value="XI" <?php if($data['siswa_kelas'] =='XI'){ echo"selected";}
            		?>>XI</option> <!-- jika data di database sama dengan value maka akan terselect/terpilih -->
            		<option value="XII" <?php if($data['siswa_kelas'] =='XII'){ echo"selected";}
            		?>>XII</option> <!-- jika data di database sama dengan value maka akan terselect/terpilih -->
            	</select>
            	</td>
            </tr>
            <tr>
            	<td>Jurusan</td>
            	<td>:</td>
            	<td>
            		<select name="jurusan" required>
            			<option value="Pilih Jurusan"></option>
            			<option value="Teknik Komputer dan Jaringan" <?php if($data['siswa_jurusan'] =='siswa jurusan'){ echo"selected";}
            		?>>Siswa Jurusan</option> <!-- jika data di database sama dengan value maka akan terselect/terpilih -->
            		<option value="Multimedia" <?php if($data['siswa_jurusan'] =='multimedia'){ echo"selected";}
            		?>>Multimedia</option> <!-- jika data di database sama dengan value maka akan terselect/terpilih -->
            		<option value="Akuntansi" <?php if($data['siswa_jurusan'] =='akuntansi'){ echo"selected";}
            		?>>Akuntansi</option> <!-- jika data di database sama dengan value maka akan terselect/terpilih -->
            		<option value="Pemasaran" <?php if($data['siswa_jurusan'] =='pemasaran'){ echo"selected";}
            		?>>Pemasaran</option> <!-- jika data di database sama dengan value maka akan terselect/terpilih -->
            		<option value="Perbankan" <?php if($data['siswa_jurusan'] =='perbankan'){ echo"selected";}
            		?>>Perbankan</option> <!-- jika data di database sama dengan value maka akan terselect/terpilih -->
            	</select>
            	</td>
            </tr>
            <tr>
            	<td>&nbsp;</td>
            	<td></td>
            	<td><input type="submit" name="simpan" value="Simpan"></td>
            </tr>
	</table>
</form>
</body>
</html>