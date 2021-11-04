<?php
session_start();


if(!isset( $_SESSION['login']) || $_SESSION['level'] !== "admin" )
{	
	echo "<script> 
	document.location.href='../login.php';</script>";
	exit;
} 
require '../koneksi/functions.php'; //mengambil data ke file functions.php


$query = "SELECT * FROM mahasiswa ORDER BY mahasiswa.nama ASC";
$mahasiswa = query($query);


?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Halaman Admin</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	
</head>
<body>
<header class="main-header clearfix" role="header">
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

<h1 align="center" style="margin-top: 100px;">DATA MAHASISWA</h1>
<div align="center">

<br>
<div class="hal">
<a href="tambah.php" >Tambah data mahasiswa</a>
</div><br>
<br>
<!--nav-->
</div>

<div align="center" id="semuanya">


<div align="center" id="isinya">
<table border = "1" cellpadding="10" cellspacing="0">
	<tr>
		<th > No. </th>
		<th > Aksi </th>
		<th > Awal Kuliah </th>
		<th > NIM</th>
		<th > Nama </th>
		<th > Jurusan </th>
		<th > Email </th>
		<th > Gambar</th>
		<th > Kelas</th>
		<th > Alamat</th>
	</tr>
	<?php $i=1; ?>

	<?php foreach( $mahasiswa as $row ) : ?>
	<tr>
		<td> <?= $i; ?> </td>
		<td> <a class="link" href="ubah.php?id=<?= $row["id"];?>" onclick="return confirm('yakin?')">ubah</a> &#160
			 <a class="link" href="hapus.php?id=<?= $row["id"];?>" onclick="return confirm('yakin?')">hapus</a></td>
		
		<td> <?= $row["awal_kuliah"];?> </td>
		<td align="left"> <?= $row["nim"];?> </td>
		<td align="left"> <?= $row["nama"];?> </td>
		<td align="left"> <?= $row["jurusan"];?></td>
		<td align="left"> <?= $row["email"];?></td>
		<td> <img width="50" src="../img/<?= $row["gambar"];?> "></td>
		<td > <?= $row["kelas"];?></td>
		<td align="left"> <?= $row["alamat"];?></td>
	</tr>
	<?php $i++; ?>
<?php endforeach; ?>


</table>


</div>
</div>

</body>
</html>
