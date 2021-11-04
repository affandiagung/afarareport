<?php 
require "../../koneksi/functions.php";

$keyword = $_GET['keyword'];
$query= "SELECT * FROM mahasiswa where  
		awal_kuliah LIKE '%$keyword%' OR 
		nim LIKE '%$keyword%' OR 
		nama LIKE '%$keyword%' OR 
		jurusan LIKE '%$keyword%' OR 
		alamat LIKE '%$keyword%' OR 
		kelas LIKE '%$keyword%' OR 
		gambar LIKE '%$keyword%' OR
		email LIKE '%$keyword%'  ";

$mahasiswa = query($query);

?>
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
		<td> <?= $row["nim"];?> </td>
		<td> <?= $row["nama"];?> </td>
		<td> <?= $row["jurusan"];?></td>
		<td> <?= $row["email"];?></td>
		<td> <img width="50" src="../img/<?= $row["gambar"];?> "></td>
		<td> <?= $row["kelas"];?></td>
		<td> <?= $row["alamat"];?></td>
	</tr>
	<?php $i++; ?>
<?php endforeach; ?>


</table>

