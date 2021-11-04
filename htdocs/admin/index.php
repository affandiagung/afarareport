<?php
session_start();


if(!isset( $_SESSION['login']) || $_SESSION['level'] !== "admin" )
{	
	echo "<script> 
	document.location.href='login.php';</script>";
	exit;
} 
require '../koneksi/functions.php'; //mengambil data ke file functions.php

//pagination
//konfirgurasi

if (isset($_POST['reset'])) {
 echo "<script> document.location.href='dosen.php'; </script>"; 
}
if(isset($_GET['combo1']))
{
	$jumlahDataPerHalaman = $_GET['combo1'];
	

}else{
	$_GET['combo1']="";
$jumlahDataPerHalaman = 100;
}

$keyword=(isset($_GET['keyword']))? $_GET['keyword'] : "";

$result = mysqli_query($conn,"SELECT * FROM dosen");
$jumlahData = count(query("SELECT * FROM dosen")); // 
$jumlahHalaman = ceil( $jumlahData/$jumlahDataPerHalaman); //var_dump($jumlahHalaman);
$halamanAktif =(isset($_GET['halaman'])) ? $_GET['halaman'] : 1; //if dan else dalam satu baris
					/* if (isset($_GET['halaman']))
						{
							$halamanAktif = $_GET["halaman"];
					} else {
						$halamanAktif = 1;
					}
					*/
$awalData = ( $jumlahDataPerHalaman * $halamanAktif) - $jumlahDataPerHalaman;
// $query = "SELECT * FROM mahasiswa LIMIT $awalData,$jumlahDataPerHalaman";

if (isset($_GET['cari'])) {
	$query= "SELECT * FROM mahasiswa where  
		awal_kuliah LIKE '%$keyword%' OR 
		nim LIKE '%$keyword%' OR 
		nama LIKE '%$keyword%' OR 
		prodi LIKE '%$keyword%' OR 
		alamat LIKE '%$keyword%' OR 
		kelas LIKE '%$keyword%' OR 
		gambar LIKE '%$keyword%' OR
		email LIKE '%$keyword%' 
		LIMIT  $awalData,$jumlahDataPerHalaman ";
	

	
} else 
{	
	$query = "SELECT * FROM mahasiswa LIMIT $awalData,$jumlahDataPerHalaman";
	
}
$mahasiswa = query($query);



?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Halaman Admin</title>
	<link rel="stylesheet" type="text/css" href="../css/style.css">
</head>
<body>
<nav>
    <ul>
        <li><a href="../index.html" >Home</a></li>
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
<h1 align="center">DATA MAHASISWA</h1>
<div align="center">
<form action="" method ="GET">
	<input class="search" type="text" name="keyword" size="40" autofocus autocomplete="off" placeholder="Masukkan data yang dicari" id="keyword">
	<button class="button" id="tombol-cari" type = "submit" name="cari">Cari</button>
	<button class="button" type="submit" name="reset">Reset</button>
</form>

<a class="link" href="tambah.php" >Tambah data mahasiswa</a>
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
		<td> <?= $i+$awalData; ?> </td>
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
