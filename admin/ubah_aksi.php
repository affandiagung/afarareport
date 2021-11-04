<?php
include  '../koneksi/functions.php';


$id=$_POST['id'];
$nama = $_POST['nama'];
$nim = $_POST['nim'];
$email = $_POST['email'];
$jurusan = $_POST['jurusan'];
$gambarlama = $_POST['gambarlama'];

//check apakah gambar baru dipilih atau tidak

if($_FILES['gambar']['error']===4)
{ $gambar = $gambarlama;
} else {
	$gambar = upload();
	
}


$query=	"UPDATE mahasiswa SET 
				nama = '$nama',
				nim ='$nim', 
				email = '$email', 
				jurusan='$jurusan', 
				gambar='$gambar' 
		   	WHERE id = '$id'
		";

mysqli_query($conn, $query);

$a= mysqli_affected_rows($conn);
if ($a>0)
{
		echo "
		<script>
			alert('data berhasil diubah!');
			document.location.href='index.php';
		</script>
		";
}
else {
	echo "
		<script>
			alert('data gagal diubah!');
			document.location.href='ubah.php?id=$id';
		</script>
		";
	}

?>