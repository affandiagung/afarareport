<?php 
require "../functions.php";
$keyword = $_GET['keyword'];
?>
<?php if($halamanAktif>1) : ?>
		<?php if($keyword =="")	: ?> 
			<a href="?halaman=<?= $halamanAktif-1; ?>"> &laquo; </a>
		<?php else:  ?>
			<a  href="?halaman=<?= $halamanAktif-1; ?>&keyword=<?= $keyword; ?>"></a>
			<?php endif; ?>
	<?php else : ?>
	&laquo
<?php endif; ?>
<!-- end(start now) -->

<!-- kondisi paramaeter cari  == kosong -->
<?php
if($keyword=="") {
$sqlq =mysqli_query($conn,"SELECT * FROM mahasiswa ");
} else {
	$sqlq =mysqli_query($conn,"SELECT * FROM mahasiswa where  
		nama LIKE '%$keyword%' OR 
		nim LIKE '%$keyword%' OR 
		email LIKE '%$keyword%' OR 
		jurusan LIKE '%$keyword%' ");
}

$jumlahData = mysqli_num_rows($sqlq);
$jumlahHalaman = ceil($jumlahData/$jumlahDataPerHalaman);

?>

<?php for($i=1;$i<=$jumlahHalaman;$i++) : ?>
	<?php if ($keyword=="") : ?>
		<?php if ($i==$halamanAktif) : ?>
			<a  href="?halaman=<?= $i ?>" style="font-weight:bold; color:red;"><?= $i ?></a>
		<?php else : ?>
			<a  href="?halaman=<?= $i ?>"><?= $i ?></a>
		<?php endif;	?>
	<?php else : ?>
		<?php if ($i==$halamanAktif) : ?>
			<a  href="?halaman=<?= $i; ?>&keyword=<?= $keyword; ?>" style="font-weight:bold; color:red;"><?= $i ?></a>
		<?php else : ?>
			<a  href="?halaman=<?= $i; ?>&keyword=<?= $keyword; ?>"><?= $i ?></a>
		<?php endif;	?>	
	<?php endif; ?>

<?php endfor; ?>

<!-- start( next page ) -->
<?php if($halamanAktif<$jumlahHalaman) : ?>
	<?php if($keyword =="")	: ?> 
				<a  href="?halaman=<?= $halamanAktif+1; ?>"> &raquo; </a>
			<?php else:  ?>
				<a  href="?halaman=<?= $halamanAktif+1; ?>&keyword=<?= $keyword; ?>"></a>
	<?php endif; ?>
<?php else : ?>
		&raquo
<?php endif; ?>
</div>
<!-- end ( next page ) -->

<div align="center" id="isinya">
<table border = "1" cellpadding="10" cellspacing="0">
	<tr>
		<th> No. </th>
		<th> Aksi </th>
		<th> Gambar</th>
		<th> NIM </th>
		<th> Nama </th>
		<th> Email </th>
		<th> Jurusan</th>
	</tr>
	<?php $i=1; ?>

	<?php foreach( $mahasiswa as $row ) : ?>
	<tr>
		<td> <?= $i+$awalData; ?> </td>
		<td> <a class="link" href="ubah.php?id=<?= $row["id"];?>" onclick="return confirm('yakin?')">ubah </a> &#160
			 <a class="link" href="hapus.php?id=<?= $row["id"];?>" onclick="return confirm('yakin?')">hapus </a></td>
		<td> <img width="50" src="img/<?= $row["gambar"];?> "></td>
		<td> <?= $row["nim"];?> </td>
		<td> <?= $row["nama"];?> </td>
		<td> <?= $row["email"];?> </td>
		<td> <?= $row["jurusan"];?></td>

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