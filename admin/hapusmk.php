<?php

	require '../koneksi/functions.php';
	$id = $_GET["id"];

	if (hapusmk($id)>0)
	{
		echo "<script>
		alert('data berhasil dihapus!');
		document.location.href='matakuliah.php';
		</script>";
	}
	else {
		echo "<script>
		alert('data gagal dihapus!');
		document.location.href='matakuliah.php';
		</script>";
	}
	
?>
