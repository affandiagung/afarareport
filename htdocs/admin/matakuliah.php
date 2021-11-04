<?php
session_start();

if(!isset( $_SESSION['login']) || $_SESSION['level'] !== "admin" )
{	
	echo "<script> 
	document.location.href='login.php';</script>";
	exit;
} 
require '../koneksi/functions.php'; //mengambil data ke file functions.php


$query = "SELECT * FROM mata_kuliah ";
$mahasiswa = query($query);

?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>MATA KULIAH</title>
	<link rel="stylesheet" type="text/css" href="../css/style.css">
</head>
<body>
<nav>
    <ul>    <li><a href="../index.html" >Home</a></li>
         <li><a href="index.php">Data Master</a>
             <ul>
                 <li><a href="index.php">Mahasiswa</a></li>                 
            	 <li><a href="matakuliah.php">Mata kuliah</a></li>
            	 <li><a href="dosen.php">Daftar Dosen</a></li>
            	 <li><a href="registrasi.php">Tambah User</a></li>
             </ul>
         </li>
                  <li><a href="../logout.php" onClick="return confirm ('Yakin?')">Logout</a></li>
    </ul>
</nav>
<h1 align="center">DATA MATA KULIAH</h1>
<div align="center">


<a class="link" href="tambahmk.php" >Tambah Data Mata Kuliah</a>
<br>
<!--nav-->
</div>

<div align="center" id="semuanya">


<div align="center" id="isinya">
<table border = "1" cellpadding="10" cellspacing="0">
	<tr>
		<th > No. </th>
		<th > Aksi </th>
		<th > KODE Mata Kuliah </th>
		<th > Nama MAta Kuliah</th>
		<th > SKS </th>
		
	</tr>
	<?php $i=1; ?>

	<?php foreach( $mahasiswa as $row ) : ?>
	<tr>
		<td> <?= $i; ?> </td>
		<td> <a class="link" href="ubahmk.php?id=<?= $row["id"];?>" onclick="return confirm('yakin?')">ubah</a> &#160
			 <a class="link" href="hapusmk.php?id=<?= $row["id"];?>" onclick="return confirm('yakin?')">hapus</a></td>
		
		<td align="left"> <?= $row["kode_mk"];?> </td>
		<td align="left"> <?= $row["nama_mk"];?> </td>
		<td align="left"> <?= $row["sks_mk"];?></td>
		
	</tr>
	<?php $i++; ?>
<?php endforeach; ?>


</table>

<?php ?>
<br>

<form action="" method ="GET">
	Jumlah Data Yang Ditampilkan : 
	<!-- <input class="search" type="number" name="jmlyangmauditampilkan" size="1" autofocus autocomplete="off" placeholder="5"> -->
		
		<select name="combo1" id="combo1"  onchange="this.form.submit();">
			<option value=" "> </option>
			<option value="3">3</option>
			<option value="5">5</option>
			<option value="10">10</option>
				</select>
	<!--<button type = "submit" name="yangmauditampilkan">Cari</button> -->
</form>
<?php ?>
</div>
</div>
<script type="text/javascript" src="js/apa.js"></script>
</body>
</html>
