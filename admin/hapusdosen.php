<?php

	require '../koneksi/functions.php';
	$id = $_GET["id"];

	if (hapusdosen($id)>0)
	{
		echo "<script>
		alert('data berhasil dihapus!');
		document.location.href='dosen.php';
		</script>";
	}
	else {
		echo "<script>
		alert('data gagal dihapus!');
		document.location.href='dosen.php';
		</script>";
	}
	
?>
