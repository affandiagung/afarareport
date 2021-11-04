<?php
session_start();

if(!isset( $_SESSION['login']))
{	echo "<script> alert('ANDA BELUM LOGIN, SILAHKAN LOGIN TERLEBIH DAHULU'); 
		document.location.href='login.php';</script>";
	exit;
} 


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
<a href="eler.php">Kembali</a>
 
	<?php
	include '../koneksi/functions.php';
	if(isset($_POST["submit"])) {	//ambil data dari tiap elemnt dari form
	
	//check apakah data berhasil diubah
	
	if(jadwaleler($_POST)>0) 	{
		echo "
		<script>
			alert('data berhasil diubah!');
			document.location.href='eler.php';
		</script>
		";
	} else {
		echo "
		<script>
			alert('data gagal diubah!');
			document.location.href='index.php?';
		</script>
		";
}
}

	$id = $_GET['id'];
  

	$data = mysqli_query($conn,"select * from $id where id='1'");
  
	while($d = mysqli_fetch_array($data)){
		?>



		<form method="post" action="">
			    <input type="hidden" name="table" value="<?= strtolower($id); ?>">
					<input type="hidden" name="id" value="<?php echo $d['id']; ?>">
					
					
					<label for="1">Pertemuan 1 :</label>
					<input type="text" name="1" id="1" value="<?php echo $d['1']; ?>"> 	
						
					<label for="2">Pertemuan 2 :</label>
          <input type="text" name="2" id="2" value="<?php echo $d['2']; ?>">

          <label for="3">Pertemuan 3 :</label>
          <input type="text" name="3" id="3" value="<?php echo $d['3']; ?>">

          <label for="4">Pertemuan 4 :</label>
          <input type="text" name="4" id="4" value="<?php echo $d['4']; ?>">

          <label for="5">Pertemuan 5 :</label>
          <input type="text" name="5" id="5" value="<?php echo $d['5']; ?>">

          <label for="6">Pertemuan 6 :</label>
          <input type="text" name="6" id="6" value="<?php echo $d['6']; ?>">

          <label for="7">Pertemuan 7 :</label>
          <input type="text" name="7" id="7" value="<?php echo $d['7']; ?>">

          <label for="8">Pertemuan 8 :</label>
          <input type="text" name="8" id="8" value="<?php echo $d['8']; ?>">

          <label for="9">Pertemuan 9 :</label>
          <input type="text" name="9" id="9" value="<?php echo $d['9']; ?>">

          <label for="10">Pertemuan 10 :</label>
          <input type="text" name="10" id="10" value="<?php echo $d['10']; ?>">

          <label for="11">Pertemuan 11 :</label>
          <input type="text" name="11" id="11" value="<?php echo $d['11']; ?>">

          <label for="12">Pertemuan 12 :</label>
          <input type="text" name="12" id="12" value="<?php echo $d['12']; ?>">

          <label for="13">Pertemuan 13 :</label>
          <input type="text" name="13" id="13" value="<?php echo $d['13']; ?>">

          <label for="14">Pertemuan 14 :</label>
          <input type="text" name="14" id="14" value="<?php echo $d['14']; ?>">

          <label for="15">Pertemuan 15 :</label>
          <input type="text" name="15" id="15" value="<?php echo $d['15']; ?>">

          <label for="16">Pertemuan 16 :</label>
          <input type="text" name="16" id="16" value="<?php echo $d['16']; ?>">

          <label for="17">Pertemuan 17 :</label>
          <input type="text" name="17" id="17" value="<?php echo $d['17']; ?>">

          <label for="18">Pertemuan 18 :</label>
          <input type="text" name="18" id="18" value="<?php echo $d['18']; ?>">
          <label for="uts">Pertemuan uts :</label>
          <input type="text" name="uts" id="uts" value="<?php echo $d['uts']; ?>">
          <label for="uas">Pertemuan uas :</label>
          <input type="text" name="uas" id="uas" value="<?php echo $d['uas']; ?>">
					
				<button class="btn third" type="submit" name="submit">submit</button>
			
		</form>
		<?php 
	}
	?>
 
</body>
</html>