<?php
session_start();


if(!isset( $_SESSION['login']) || $_SESSION['level'] !== "tamu" )
{   
    echo "<script> 
    document.location.href='../login.php';</script>";
    exit;
} 

require '../koneksi/functions.php';



$query = "SELECT * FROM nilai_kuliah ";
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
<as><h1>Rangkuman Nilai</h1></as>

</div>
<?php foreach( $datamhs as $row3 ) : ?> 
<h2 style="text-transform: uppercase ;"> <?= $row3['nama'];?></h2>
<h3> <?= $row3['nim'];?> | <?= $row3['jurusan'];?></h3>
<?php endforeach; ?>
<hr class="pembatas"><hr>
<div class="isi">
    <table class="tabel" style="margin-top:20px">
                    <tr style="font-weight:bold;">
                        <td>Nama Mata Kuliah</td>
                        <td>SKS</td>
                        <td>Nilai</td>
                        <td>Angka</td>
                        <td>MUTU</td>
                        
                    </tr>

                    <?php $c=0;$d=0;foreach( $nilai as $row ) : ?>
                    <tr>
                        <?php 

                            if ($row["nilai"]=== 'A')
                                $b = 4;
                            else if ($row["nilai"]=== 'B')
                                $b=3;
                            else if ($row["nilai"]=== 'C')
                                $b=2;
                            else if ($row["nilai"]=== 'D')
                                $b=1;
                            else if ($row["nilai"]=== 'E')
                                $b=0;
                        ?>
                        <td><?= $row["nama_mk"];?></td>
                        <td><?= $row["sks_mk"];?><?php $d +=$row['sks_mk']; ?></td>
                        <td><?= $row["nilai"];?></td>
                        <td><?= $b;?></td>
                        <td><?= $row["mutu"];?></td>
                        <?php 

                           $c += $row["mutu"]; ?>
                    </tr>
                  <?php endforeach; ?>
                  <tr>
                  <td colspan="3" align="center"><h3>   TOTAL MUTU</h3> </td>
                    <td colspan="2" align="center"><h3> <?= $c; ?></h3> </td>
                </tr>
                <tr>
                    <td colspan="3" align="center"><h3>IPK </h3></td>
                    <td colspan="2" align="center"> <h3> 
                        <?php $e= $c/$d;
                         echo number_format((float)$e, 2, '.', ''); ?> </h3>   </td>
                </tr>

    </table>
</div>

</body>
</html>
