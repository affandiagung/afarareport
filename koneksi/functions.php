<?php
//koneksi di epizy.com $conn = mysqli_connect("","epiz_29771649","KvV8uTDJBLkTfW","epiz_29771649_phpdasar");
$conn = mysqli_connect("localhost","root","","phpdasar");
function query($query) {
	global $conn;
	$result = mysqli_query($conn, $query);
	$rows = [];
	if(!$result) {
		die("BLM ADA");
	}
	while ( $row = mysqli_fetch_assoc($result))
	{	
		$rows [] = $row;
		}
	return $rows;
}



function tambah($data)
{	global $conn;
	
	$awal_kuliah = htmlspecialchars($data["awal_kuliah"]);
	$nim = htmlspecialchars($data["nim"]);
	$jurusan = htmlspecialchars($data["jurusan"]);
	$kelas = htmlspecialchars($data["kelas"]);
	$alamat = htmlspecialchars($data["alamat"]);
	$nama =htmlspecialchars( $data["nama"]);
	$email = htmlspecialchars($data["email"]);
	

	//upload gambar
	$gambar = upload();
	if ( !$gambar ) {
		return false;
	}

	$query = "INSERT INTO mahasiswa 
			VALUES 
			('', '$awal_kuliah','$nim', '$nama','$jurusan','$alamat','$kelas', '$gambar','$email')
			";
	mysqli_query($conn, $query);

	return mysqli_affected_rows($conn);
}

function tambahmk($data)
{	global $conn;
	
	$kode_mk = htmlspecialchars($data["kode_mk"]);
	$nama_mk = htmlspecialchars($data["nama_mk"]);
	$sks_mk = htmlspecialchars($data["sks_mk"]);
	
	$query = "INSERT INTO mata_kuliah 
			VALUES 
			('', '$kode_mk','$nama_mk', '$sks_mk')
			";
	mysqli_query($conn, $query);

	return mysqli_affected_rows($conn);
}

function tambaheler($data)
{	global $conn;
	$kode_mk = htmlspecialchars($data["kode_mk"]);
    
    $query= "CREATE TABLE $kode_mk (
   id INT NOT NULL AUTO_INCREMENT,`1` text, `2` text,`3` text,`4` text,`5` text,`6` text,`7` text,`8` text,`9` text,`10` text,`11` text,`12` text,`13` text,`14` text,`15` text,`16` text,`17` text, `18` text,`uts` text,`uas` text,    PRIMARY KEY ( id ))";
	
	mysqli_query($conn, $query);

	return mysqli_affected_rows($conn);
}

function tambahdosen($data)
{	global $conn;
	
	$nama_dosen = htmlspecialchars($data["nama_dosen"]);
	$nim_dosen = htmlspecialchars($data["nim_dosen"]);
	$nama_mk = htmlspecialchars($data["nama_mk"]);
	$hari = htmlspecialchars($data["hari"]);
	$jam = htmlspecialchars($data["jam"]);
	$tanggal_mulai = htmlspecialchars($data["tanggal_mulai"]);
	$tanggal_akhir = htmlspecialchars($data["tanggal_akhir"]);
	$semester = htmlspecialchars($data["semester"]);
	$gambar = upload();

	if ( !$gambar ) {
		return false;
	}

	$query = "INSERT INTO dosen
			VALUES 
			('', '$nama_dosen','$nim_dosen','$gambar','$nama_mk', '$hari', '$jam','$tanggal_mulai', '$tanggal_akhir', '$semester' )
			";
	mysqli_query($conn, $query);

	return mysqli_affected_rows($conn);
}


function upload()
{
		$namaFile = $_FILES['gambar']['name'];
		$ukuranFile = $_FILES['gambar']['size'];
		$error = $_FILES['gambar']['error'];
		$tmpName	=$_FILES['gambar']['tmp_name'];
	
		//check gambar yang diupload ada atau tidak
	
		if ($error === 4) {
			echo "<script>alert('pilih gambar');
			</script>";
			return false;
		}

		//check yang diupload apakah gambar , check extensi

	$ekstensiGambarvalid = ['jpg','jpeg','png'];
	$ekstensiGambar = explode(".",$namaFile);
	$ekstensiGambar = strtolower(end($ekstensiGambar));
	
		if ( !in_array($ekstensiGambar,$ekstensiGambarvalid))
		{
			echo "<script> alert('yang anda upload bukan gambar');
					</script>";
			return false;
		}

		$a= 1*1000000;
		if( $ukuranFile > $a)
		{
			echo "<script> alert('Ukuran Gambar Terlalu besar, maksimal '+ $a/1000000+' mb');
					document.location.href='index.php';</script>";
					die;
			
		}
				
		// lolos pengecheckan semua diatas
		//generate nama gambar baru
		$namaFileBaru = uniqid();

		$namaFile = $namaFileBaru.$namaFile;
		move_uploaded_file($tmpName, '../img/'.$namaFile);

		return $namaFile;

}



function hapus($id)
{	global $conn;
	mysqli_query($conn,"DELETE FROM mahasiswa where id= $id");
	return mysqli_affected_rows($conn);
}

function hapusmk($id)
{	global $conn;
	mysqli_query($conn,"DELETE FROM mata_kuliah where id= $id");
	return mysqli_affected_rows($conn);
}

function hapusdosen($id)
{	global $conn;
	mysqli_query($conn,"DELETE FROM dosen where id= $id");
	return mysqli_affected_rows($conn);
}

function ubaheler($data)
{
	global $conn;
	$id=$data["id"];
	$nama_mk = htmlspecialchars($data["nama_mk"]);
	$kode_mk =htmlspecialchars( $data["kode_mk"]);
	$sks_mk = htmlspecialchars($data["sks_mk"]);
	
	$query=	"UPDATE mata_kuliah SET 
				nama_mk = '$nama_mk',
				kode_mk='$kode_mk', 
				sks_mk = '$sks_mk'
		   	WHERE id = '$id'
		";

	mysqli_query($conn, $query);
	return mysqli_affected_rows($conn);
}

function jadwaleler($data)
{
	global $conn;
	$id=$data["id"];
	$table = htmlspecialchars($data["table"]);
	$a = htmlspecialchars($data["1"]);
	$b = htmlspecialchars($data["2"]);
	$c = htmlspecialchars($data["3"]);
	$d = htmlspecialchars($data["4"]);
	$e = htmlspecialchars($data["5"]);
	$f = htmlspecialchars($data["6"]);
	$g = htmlspecialchars($data["7"]);
	$h = htmlspecialchars($data["8"]);
	$i = htmlspecialchars($data["9"]);
	$j = htmlspecialchars($data["10"]);
	$k= htmlspecialchars($data["11"]);
	$l = htmlspecialchars($data["12"]);
	$m = htmlspecialchars($data["13"]);
	$n = htmlspecialchars($data["14"]);
	$o = htmlspecialchars($data["15"]);
	$p = htmlspecialchars($data["16"]);
	$q = htmlspecialchars($data["17"]);
	$r = htmlspecialchars($data["18"]);
	$uas = htmlspecialchars($data["uas"]);
	$uts = htmlspecialchars($data["uts"]);


	$query=	"UPDATE $table SET 
			`1` = '$a',
			`2` = '$b',
			`3` = '$c', 
			`4` = '$d', 
			`5` = '$e', 
			`6` = '$f',
			`7` = '$g', 
			`8` = '$h', 
			`9` = '$i', 
			`10` = '$j', 
			`11` = '$k', 
			`12` = '$l',
			`13` = '$m', 
			`14` = '$n',
			`15` = '$o',
			`16` = '$p', 
			`17` = '$q', 
			`18` = '$r',
			`uts` = '$uts', 
			`uas` = '$uas' 
			WHERE id = '$id' ";
	

	mysqli_query($conn, $query);
	return mysqli_affected_rows($conn);
}


function ubahmk($data)
{
	global $conn;
	$id=$data["id"];
	$nama_mk = htmlspecialchars($data["nama_mk"]);
	$kode_mk =htmlspecialchars( $data["kode_mk"]);
	$sks_mk = htmlspecialchars($data["sks_mk"]);
	
	$query=	"UPDATE mata_kuliah SET 
				nama_mk = '$nama_mk',
				kode_mk='$kode_mk', 
				sks_mk = '$sks_mk'
		   	WHERE id = '$id'
		";

	mysqli_query($conn, $query);
	return mysqli_affected_rows($conn);
}

function cari($keyword)
{
	$query= "SELECT * FROM mahasiswa where  
		nama LIKE '%$keyword%' OR 
		nim LIKE '%$keyword%' OR 
		email LIKE '%$keyword%' OR 
		jurusan LIKE '%$keyword%' ";
	return query($query);
}

function registrasi($data)
{
	global $conn;
	$username = strtolower(stripslashes($data["username"]));
	$password =mysqli_real_escape_string($conn,$data["password"]);
	$password2 =mysqli_real_escape_string($conn,$data["password2"]);;
	$level = "tamu";

	$result = mysqli_query($conn, "SELECT * FROM user where username = '$username'");

	// check username sudah terdaftar atau belum
	if ( mysqli_fetch_assoc($result) )
	{
		echo "<script> alert ('Username sudah terdaftar')
		</script>";
		return false;
	}
	//check confirm passwrod
	if( $password !== $password2)
	{
		echo "<script> alert ('Password tidak sama')
		</script>";
		return false;
	}

	
	//ekripsi password
	$password= password_hash($password, PASSWORD_DEFAULT);
	
	//tambahkan user ke database
	mysqli_query($conn,"INSERT INTO user VALUES ('', '$username', '$password','$level')");

	return mysqli_affected_rows($conn);
	
}
?>