<?php
session_start();

if(!isset( $_SESSION['login']) || $_SESSION['level'] !== "admin" )
{	
	echo "<script> 
	document.location.href='login.php';</script>";
	exit;
} 
require '../koneksi/functions.php'; //mengambil data ke file functions.php


$query = "SELECT * FROM dosen ";
$mahasiswa = query($query);
?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>DATA DOSEN</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<header class="main-header " role="header">
    <div class="logo">
      <a><em>BER</em>ANDA</a>

    </div>
    <ul class="main-menu">
       <li class="has-submenu"><a href="">DATA &#10021</a>
          <ul class="sub-menu">
            <li><a href="index.php">Matahasiswa</a></li>
				<li><a href="matakuliah.php">Mata Kuliah</a></li>
				<li><a href="nilai_mk.php">Nilai Mata Kuliah</a></li>
				<li><a href="dosen.php">Dosen</a></li>
				<li><a href="eler.php">E-Learning</a></li>
				<li><a href="registrasi.php">Tambah User</a></li>
        </ul>
        </li>
        <li><a href="../logout.php">LOG OUT</a></li>
 	</ul>
</header>

<h1 align="center" style="margin-top:100px">DATA DOSEN</h1>
<div align="center">
<br>
<div class="hal">
<a href="tambahdosen.php" >Tambah Data</a>
</div>
<br>
<!--nav-->
</div>

<div align="center" id="semuanya">


<div align="center" id="isinya">
<table border = "1" cellpadding="10" cellspacing="0">
	<tr>
		<th > No. </th>
		<th > Aksi </th>
		<th > Nama Dosen</th>
		<th > Nim Dosen</th>
		<th > Gambar </th>
	</tr>
	<?php $i=1; ?>

	<?php foreach( $mahasiswa as $row ) : ?>
	<tr>
		<td> <?= $i; ?> </td>
		<td> 
			<a class="link" href="ubahdosen.php?id=<?= $row["id"];?>" onclick="return confirm('yakin?')">ubah</a> &#160
			 <a class="link" href="hapusdosen.php?id=<?= $row["id"];?>" onclick="return confirm('yakin?')">hapus</a></td>
		
		<td align="left"> <?= $row["nama_dosen"];?> </td>
		<td align="left"> <?= $row["nim_dosen"];?> </td>
		<td> <img width="50" src="../img/<?= $row["photo_dosen"];?> "></td>
	
		
	</tr>
	<?php $i++; ?>
<?php endforeach; ?>


</table>


<br>

<form action="" method ="GET">
	Jumlah Data Yang Ditampilkan : 
	
		
		<select name="combo1" id="combo1"  onchange="this.form.submit();">
			<option value=" "> </option>
			<option value="3">3</option>
			<option value="5">5</option>
			<option value="10">10</option>
				</select>
	<!--<button type = "submit" name="yangmauditampilkan">Cari</button> -->
</form>

</div>
</div>
</body>
</html>
