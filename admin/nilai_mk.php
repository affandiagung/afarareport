<?php
session_start();

if(!isset( $_SESSION['login']) || $_SESSION['level'] !== "admin" )
{	
	echo "<script> 
	document.location.href='login.php';</script>";
	exit;
} 
require '../koneksi/functions.php'; //mengambil data ke file functions.php


$query = "SELECT * FROM nilai_kuliah ORDER BY nilai_kuliah.semester, nilai_kuliah.nama_mk ASC ";
$mahasiswa = query($query);
?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>NILAI MATA KULIAH</title>
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

<h1 align="center" style="margin-top:100px">NILAI MATA KULIAH</h1>
<div align="center">
<br>
<div class="hal">
<a href="tambahnilai_mk.php" >Tambah Data</a>
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
		<th > Nama Mata Kuliah Dosen</th>
		<th > SKS</th>
		<th > Absensi </th>
		<th > TUGAS</th>
		<th > UTS </th>
		<th > UAS</th>
		<th > Nilai </th>
		<th > Mutu</th>
		<th > Semester </th>
	</tr>
	<?php $i=1; ?>

	<?php foreach( $mahasiswa as $row ) : ?>
	<tr>
		<td> <?= $i; ?> </td>
		<td> 
			<a class="link" href="ubahnilai_mk.php?id=<?= $row["id"];?>" onclick="return confirm('yakin?')">ubah</a> &#160
			 <a class="link" href="ubahnilai_mk.php?id=<?= $row["id"];?>" onclick="return confirm('yakin?')">hapus</a></td>
		
		<td align="left"> <?= $row["nama_mk"];?> </td>
		<td align="left"> <?= $row["sks_mk"];?> </td>
		<td align="left"> <?= $row["absensi"];?> </td>
		<td align="left"> <?= $row["tugas"];?> </td>
		<td align="left"> <?= $row["uts"];?> </td>
		<td align="left"> <?= $row["uas"];?> </td>
		<td align="left"> <?= $row["nilai"];?> </td>
		<td align="left"> <?= $row["mutu"];?> </td>
		<td align="left"> <?= $row["semester"];?> </td>
		
	
		
	</tr>
	<?php $i++; ?>
<?php endforeach; ?>


</table>


<br>


</div>
</div>
</body>
</html>
