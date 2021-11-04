<?php
session_start();


if(!isset( $_SESSION['login']) || $_SESSION['level'] !== "tamu" )
{   
    echo "<script> 
    document.location.href='../login.php';</script>";
    exit;
} 


require '../koneksi/functions.php';
$data = $_SESSION['data'];
$query = "SELECT * FROM mahasiswa where nim='$data'";
$mahasiswa = query($query);

$query1 = "SELECT * FROM prestasi";
$prestasi = query($query1);
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
</header><div class="utama" >
   
<div class="kanan">
    <as><h1 align="center"> Data Mahasiswa </h1></as>
    
    <div class="nilaia">
        <ul>
            <li>Awal Kuliah</li>
            <li>Nim</li>
            <li>Nama</li>
            <li>Program Studi</li>
            <li>Kelas</li>
            <li>Email </li>
            <li>Alamat</li>
        </ul>
    </div>
    
    <div class="nilaia">
        <ul style="padding-left: 20px;padding;width: 230px;">
        <?php foreach( $mahasiswa as $row ) : ?>
            <li> <?= $row["awal_kuliah"];?> </li>
            <li> <?= $row["nim"];?> </li>
            <li> <?= $row["nama"];?> </li>
            <li><?= $row["jurusan"];?></li>
            <li><?= $row["kelas"];?> </li>
            <li><?= $row["email"];?></li>
            <li><?= $row["alamat"];?></li>    
        </ul>
        <?php endforeach; ?>
    </div>
    <img class="mhs_logo" src="../style/images/logo.png">
    <div style="clear: both;"></div>

    <div class="aa">
        <table class="tabel" style="background-color: darkcyan;">
            <tr style="font-weight:bold">
                <td >Semester</td>
                <td>SKS</td>
                <td>Mutu</td>
                <td>IPS</td>
                <td>IPK</td>
            </tr>
            <?php foreach( $prestasi as $row1 ) : ?>
            <tr>
                <td>Semester <?= $row1["semester"];?></td>
                <td><?= $row1["sks"];?></td>
                <td><?= $row1["mutu"];?></td>
                <td><?= $row1["ips"];?></td>
                <td><?= $row1["ipk"];?></td>
            </tr>
             <?php endforeach; ?>
        </table>
    </div>
</div>  
</body>
</html>