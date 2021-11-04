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

$query = "SELECT * FROM nilai_kuliah where semester=$smtr ";
$nilai = query($query);

$query1 = "SELECT * FROM prestasi where semester=$smtr";
$prestasi = query($query1);

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
    <link rel="stylesheet" type="text/css" href="style_user.css">
    <title>Afara Web </title>  
</head>
<body>


<header class="main-header" >
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
<as><h1>Kartu Hasil Studi</h1></as>
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
        </select>
    </form> 

    <table class="tabel" style="">
        <tr style="font-weight:bold; border   ">
            <td width="400px">Nama Mata Kuliah</td>
            <td>SKS</td>
            <td>Absensi</td>
            <td>Tugas</td>
            <td>UTS</td>
            <td>UAS</td>
            <td>NILAI</td>
            <td>MUTU</td>
        </tr>
            <?php 
                $c=0;$d=0; 
                foreach( $nilai as $row ) : 
                 
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
        <tr>
            <td><?= $row["nama_mk"];?></td>
            <td><?= $row["sks_mk"];?></td>
            <td><?= $row["absensi"];?></td>
            <td><?= $row["tugas"];?></td>
            <td><?= $row["uts"];?></td>
            <td><?= $row["uas"];?></td>
            <td><?= $row["nilai"];?></td>
            <td><?php  $total=$b*$row["sks_mk"];echo $total;?></td>
        </tr>
                <?php endforeach; ?>
        <tr style="font-weight:bold;"> 
            <?php foreach( $prestasi as $row1 ) : ?>
            <td colspan="3" align="center">   IPS </td>
            <td colspan="5" align="center"><?= $row1["ips"];?></td>
        </tr>
        <tr style="font-weight:bold;"> 
            <td colspan="3" align="center">   IPK </td>
            <td colspan="5" align="center"><?= $row1["ipk"];?></td>
        </tr>
            <?php endforeach; ?>
                </table>
    </div>

</body>
</html>