<?php
session_start();

if(!isset( $_SESSION['login']))
{	echo "<script> alert('ANDA BELUM LOGIN, SILAHKAN LOGIN TERLEBIH DAHULU'); 
		document.location.href='login.php';</script>";
	exit;
} 

require '../koneksi/functions.php';

if(isset($_POST["submit"]))
{	//ambil data dari tiap elemnt dari form
	
	//check apakah data berhasil ditambah

	if(tambahmk($_POST)>0)
	{	echo "<script>
		alert('data berhasil ditambahkan!');
		document.location.href='matakuliah.php';
		</script>";
	}
	else {
		echo "<script>
		alert('data gagal ditambahkan!');
		document.location.href='tambahmk.php';
		</script>";
	}

	


}

?><!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Tambah Data Mata Kuliah</title>
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
    	<li><h1>Tambah Data Mata Kuliah</h1></li>
        
                </UL>
</nav>
<a href="matakuliah.php">Kembali</a>


   <form method="post" action="">
    <label for="kode_mk">Kode Mata Kuliah :</label>
			<input type="text" name="kode_mk" id="kode_mk" required autocomplete="off"> 
    
    <label for="nama_mk">nama_mk Mata Kuliah:</label>
			<input type="text" name="nama_mk" id="nama_mk" required autocomplete="off">
		
		<label for="sks_mk">SKS :</label>
		  <input type="text" name="sks_mk" id="sks_mk"required autocomplete="off">
			
		
		<button class="btn third" type="submit" name="submit">submit</button>
	 </form>


</body>
</html>