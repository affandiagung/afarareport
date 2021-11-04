<?php
include  '../koneksi/functions.php';


$id=$_POST['id'];
$nama_dosen = $_POST['nama_dosen'];
$nim_dosen = $_POST['nim_dosen'];
$gambarlama = $_POST['gambarlama'];

//check apakah gambar baru dipilih atau tidak

if($_FILES['gambar']['error']===4)
{ $gambar = $gambarlama;
} else {
	$gambar = upload();
	
}


$query=	"UPDATE dosen SET 
				nama_dosen = '$nama_dosen',
				nim_dosen ='$nim_dosen', 
				photo_dosen='$gambar' 
		   	WHERE id = '$id'
		";

mysqli_query($conn, $query);

$a= mysqli_affected_rows($conn);
if ($a>0)
{
		echo "
		<script>
			alert('data berhasil diubah!');
			document.location.href='dosen.php';
		</script>
		";
}
else {
	echo "
		<script>
			alert('data gagal diubah!');
			document.location.href='ubahdosen.php?id=$id';
		</script>
		";
	}

?>