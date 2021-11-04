    <?php
session_start();


if(!isset( $_SESSION['login']) || $_SESSION['level'] !== "tamu" )
{   
    echo "<script> 
    document.location.href='../login.php';</script>";
    exit;
} 

require '../koneksi/functions.php';
if(isset($_GET['combo1']))
{
    $smtr = $_GET['combo1'];
}else{
    $smtr = "1";
}

$query = "SELECT * FROM dosen where semester=$smtr order by dosen.id ASC";
$nilai = query($query);


$data = $_SESSION['data'];
$query2="SELECT * FROM mahasiswa where nim=$data";
$datamhs = query($query2);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="description" content="">
    <meta name="author" content="Affandi Agung L">
    <title>Afara Web </title>
    <link rel="stylesheet" type="text/css" href="style_user.css">
</head>

<body>
<!--header-->

<header class="main-header" role="header">
    <div class="logo">
      <a><em>BER</em>ANDA</a>

    </div>
    <ul class="main-menu">
       <li class="has-submenu"><a href="">DATA &#10021</a>
          <ul class="sub-menu">
            <li><a href="index.php">Data Matahasiswa</a></li>
            <li><a href="khs.php">Kartu Hasil Studi</a></li>
            <li><a href="jadwal.php">Jadwal Kuliah</a></li>
            <li><a href="rangkuman.php">Rangkuman Nilai</a></li>
            <li><a href="elearning.php">Elearning</a></li>
          </ul>
        </li>
        <li><a href="../logout.php">LOG OUT</a></li>
        
    </ul>
</header>

<div class="utama">
<as><h1>JADWAL KULIAH</h1></as>
</div>
<?php foreach( $datamhs as $row3 ) : ?> 
<h2 style="text-transform: uppercase ;"> <?= $row3['nama'];?></h2>
<h3> <?= $row3['nim'];?> | <?= $row3['jurusan'];?></h3>
<?php endforeach; ?>

<hr class="pembatas"><hr>

<div class="isi">
   <form action="" method ="GET">
        <select name="combo1" id="combo1"  onchange="this.form.submit();" style="margin-top:20px">
            <option value=" "> </option>
            <option value="1">Semester 1</option>
            <option value="2">Semester 2</option>
            <option value="3">Semester 3</option>
        </select>
    </form> 
    <table class="tabel" style="font-size: 15px ; margin-top:20px;background-color: ghostwhite;">
        <tr style="font-weight:bold; border   ">
            <td width="400px">Nama Mata Kuliah</td>
            <td>Nama Dosen</td>
            <td>Hari</td>
            <td>Jam</td>
            <td>Tanggal Mulai</td>
            <td>Tanggal Akhir</td>
        </tr>
        <?php foreach( $nilai as $row ) : ?>
        <tr>
            <td><?= $row["nama_mk"];?></td>
            <td><?= $row["nama_dosen"];?></td>
            <td><?= $row["hari"];?></td>
            <td><?= $row["jam"];?></td>
            <td><?= $row["tanggal_mulai"];?></td>
            <td><?= $row["tanggal_akhir"];?></td>
            
        </tr>
        <?php endforeach; ?>
     </table>
 </div>
</body>
</html>