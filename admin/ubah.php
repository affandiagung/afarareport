<?php
session_start();

if(!isset( $_SESSION['login']) || $_SESSION['level'] != "admin" )
{	echo "<script> alert('ANDA BELUM LOGIN, SILAHKAN LOGIN TERLEBIH DAHULU'); 
		document.location.href='../index.html';</script>";
	exit;
} 
/* require 'functions.php';


$id=$_GET["id"];
var_dump($id);
//query data mahasiswa berdasarkan
$mhs = query("SELECT * FROM mahasiswa where id=$id")[0];
$data = mysqli_query($conn,"select * from mahasiswa where id='$id'");
$rows =[];
while ( $row = mysqli_fetch_assoc($data))
	{	
		$rows [] = $row;

		}
	return $rows;
if(isset($_POST["submit"])) {	//ambil data dari tiap elemnt dari form
	
	//check apakah data berhasil diubah
	
	if(ubah($_POST)>0) 	{
		echo "
		<script>
			alert('data berhasil diubah!');
			document.location.href='index.php';
		</script>
		";
	} else {
		echo "
		<script>
			alert('data gagal diubah!');
			document.location.href='ubah.php';
		</script>
		";
	}


}
?>
<!DOCTYPE html>
<html>
<head><meta charset="utf-8">
	<title>Ubah data Mahasiswa</title>
</head>
<body>
	<h1>Rubah Data Mahasiswa</h1>

	<form action="" method="post">
		<input type="hidden" name="id" values="<?= $mhs["id"]; ?>">
		<ul>
		<li>
			<label for="nim">Nim :</label>
			<input type="text" name="nim" id="nim" required value="<?= $mhs["nim"]; ?>">
		</li>
		<li>
			<label for="nama">Nama :</label>
			<input type="text" name="nama" id="nama" required required value="<?= $mhs["nama"]; ?>">
		</li>
		<li>
			<label for="email">Email :</label>
			<input type="text" name="email" id="email"required required value="<?= $mhs["email"]; ?>">
		</li>
		<li>
			<label for="gambar">Gambar :</label>
			<input type="text" name="gambar" id="gambar" required required value="<?= $mhs["gambar"]; ?>">
		</li>
		<li>
			<label for="jurusan">Jurusan :</label>
			<input type="text" name="jurusan" id="jurusan" required required value="<?= $mhs["jurusan"]; ?>">
		</li>
		<li><button type="submit" name="submit">Ubah Data</button>
		</li>
	</ul>
		</form>
</body>
</html>
*/
?>
<!DOCTYPE html>
<html>
<head>
	<title>UBAH DATA</title>
	<style type="text/css">
			* {
  box-sizing: border-box;
}

form {
  padding: 1em;
  background: #f9f9f9;
  border: 1px solid #c1c1c1;
  margin-top: 2rem;
  max-width: 600px;
  margin-left: auto;
  margin-right: auto;
  padding: 1em;
  
}
form input {
  margin-bottom: 1rem;
  background: #fff;
  border: 1px solid #9c9c9c;
}
form button {
  background: lightgrey;
  padding: 0.7em;
  border: 0;
}
form button:hover {
  background: gold;
}

label {
  text-align: right;
  display: block;
  padding: 0.5em 1.5em 0.5em 0;
}

input {
  width: 100%;
  padding: 0.7em;
  margin-bottom: 0.5rem;
}
input:focus {
  outline: 3px solid gold;
}

@media (min-width: 400px) {
  form {
    overflow: hidden;
  }

  label {
    float: left;
    width: 200px;
  }

  input {
    float: left;
    width: calc(100% - 200px);
  }

  button {
    float: right;
    width: calc(100% - 200px);
  }
}
nav {
     margin:auto;
     text-align: center;
     width: 100%;
    } 

    nav ul ul {
     display: none;
    }

    nav ul li:hover > ul{
    display: block;
    width: 150px;
    }

    nav ul {
     background: #53bd84;
     padding: 0 20px;
     list-style: none;
     position: relative;
     display: inline-table;
     width: 100%;
    }

    nav ul:after {
     content: ""; 
     clear:both; 
     display: block;
    }

    nav ul li{
     float:left;
    }

   
    nav ul li:hover a{
     color:blue;
    }

    nav ul li a{
     display: block;
     padding: 25px;
     color: #fff;
     text-decoration: none;
     float: left;
	}
						
						.btn {
  box-sizing: border-box;
  -webkit-appearance: none;
     -moz-appearance: none;
          appearance: none;
  background-color: transparent;
  border: 2px solid #e74c3c;
  border-radius: 0.6em;
  color: #e74c3c;
  cursor: pointer;
  display: flex;
  align-self: center;
  font-size: 1rem;
  font-weight: 400;
  line-height: 1;
  margin: 20px;
  padding: 1.2em 2.8em;
  text-decoration: none;
  text-align: center;
  text-transform: uppercase;
  font-family: 'Montserrat', sans-serif;
  font-weight: 700;
}
.btn:hover, .btn:focus {
  color: #fff;
  outline: 0;
}
.third {
  border-color: #3498db;
  color: #fff;
  box-shadow: 0 0 40px 40px #3498db inset, 0 0 0 0 #3498db;
  transition: all 150ms ease-in-out;
}
.third:hover {
  box-shadow: 0 0 10px 0 #3498db inset, 0 0 10px 4px #3498db;
}

	</style>
</head>
<body>
 
<nav>
    <ul>
    	<li><h1>Ubah Data Mahasiswa</h1></li>
        
                </UL>
</nav>
<a href="index.php">Kembali</a>
 
	<?php
	include '../koneksi/functions.php';
	$id = $_GET['id'];
	$data = mysqli_query($conn,"select * from mahasiswa where id='$id'");
	while($d = mysqli_fetch_array($data)){
		?>



		<form method="post" action="ubah_aksi.php" enctype="multipart/form-data">
			
					<input type="hidden" name="id" value="<?php echo $d['id']; ?>">
					<input type="hidden" name="gambarlama" value="<?php echo $d['gambar']; ?>">
						
					<label for="awal_kuliah">Awal Kuliah :</label>
					<input type="text" name="awal_kuliah" id="awal_kuliah" value="<?php echo $d['awal_kuliah']; ?>"> 	

					<label for="nama">Nama :</label>
					<input type="text" name="nama" id="nama" value="<?php echo $d['nama']; ?>"> 	
						
					<label for="nim">Nim :</label>
					<input type="text" name="nim" id="nim" value="<?php echo $d['nim']; ?>"> 	
				
					<label for="jurusan">Jurusan :</label>
					<input type="text" name="jurusan" id="jurusan" value="<?php echo $d['jurusan']; ?>"> 

					<label for="email">Email :</label>
					<input type="text" name="email" id="email" value="<?php echo $d['email']; ?>"> 

					<label for="jurusan">Kelas :</label>
					<input type="text" name="jurusan" id="jurusan" value="<?php echo $d['jurusan']; ?>"> 

					<label for="alamat">Alamat :</label>
					<input type="text" name="alamat" id="alamat" value="<?php echo $d['alamat']; ?>"> 

					<label for="gambar">Gambar :</label><input type="file" name="gambar">
					<label></label><img src="../img/<?= $d['gambar']; ?>" width="100">

					
				<button class="btn third" type="submit" name="submit">submit</button>
			
		</form>
		<?php 
	}
	?>
 
</body>
</html>