<?php
session_start();


if(!isset( $_SESSION['login']) || $_SESSION['level'] !== "tamu" )
{   
    echo "<script> 
    document.location.href='../login.php';</script>";
    exit;
} 

require '../koneksi/functions.php';

$query = "SELECT * FROM mata_kuliah ORDER BY mata_kuliah.nama_mk ASC";
$mahasiswa = query($query);

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
    <style type="text/css">
        b:hover c{
        display: block;
        }
        ca {
        display: none;

        }

        ul {
        list-style: none;
        }

        .pilihan > li {
        float: left;
        }
        .pilihan button {
        border: 0;
        background: transparent;
        cursor: pointer;
        }
        .pilihan button:hover,
        .pilihan button:focus {
        outline: 0;
        text-decoration: underline;
        }

        .pilihlah {
        display: none;

        padding: 10px;
        }
        .pilihan button:focus + .pilihlah,
        .pilihlah:hover {
        display: block;
        }
    </style>
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
<as><h1>E-Learning</h1></as>

</div>
<?php foreach( $datamhs as $row3 ) : ?> 
<h2 style="text-transform: uppercase ;"> <?= $row3['nama'];?></h2>
<h3> <?= $row3['nim'];?> | <?= $row3['jurusan'];?></h3>
<?php endforeach; ?>
<hr class="pembatas"><hr>

<ul class="pilihan">
<div class="isi">         

<?php foreach( $mahasiswa as $row ) : ?>

  <div class="<?= $row["kode_mk"];?>" style="background-color: lightgrey;margin-top: 20px;margin-right:30px;margin-left:30px; border-radius: 10px ;border: 1px solid black;line-height: 30px;padding: 5px;padding-left: 30px;padding-right: 5px;">
    <li><?= $row["nama_mk"];?>
    <button style="float:right "><img src="b.gif" width="30px" height="30px" style="position: absolute;right: 40px;"></button>
    <ul class="pilihlah">
       <?php
        $kode = $row["kode_mk"];
        $query1 = "SELECT * FROM $kode";
        if(!$query1)
        {     die('Koneksi Error : ');
        }
        $el = query($query1);
        ?>
        <?php    foreach( $el as $row1 ) : 
            for($urut=1;$urut<=15;$urut++) {
            
            $kata = $row1["$urut"];
            if ($kata==NULL)
            {
                $pecah = array('Eleaning Menyusul','elearning.php');
            } else {
            $pecah = explode(" ", $kata);
            }
            
             ?>
              <li>Pertemuan <?= $urut; ?><a style="text-decoration: none;" target="_blank" href="<?= $pecah[1];?>"> <?= $pecah[0];?></a></li>  
        <?php } ?> 
              
        <?php endforeach; ?>
          </ul>
      </li>
    </div> 

<?php  endforeach; ?>  
</ul>
</div>
</body>
</html>