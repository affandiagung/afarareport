<?php
session_start();
require 'koneksi/functions.php';


if (isset($_COOKIE['id']) && isset($_COOKIE['key']))
{

  $id = $_COOKIE['id'];
  $key = $_COOKIE['key'];

  $result = mysqli_query($conn, "SELECT username FROM user WHere id = $id");
  $row = mysqli_fetch_assoc($result);

  //check cookie & username
  if ( $key === hash('sha256',$row['username']))
  {
    $_SESSION['login'] = true;                            
  }
}

if (isset($_SESSION["login"]))
{ 
  if ($_SESSION['level'] === "admin" ) { header("location: index.html"); }
  else if ($_SESSION['level'] === "tamu" ) { header("location:tampilan\index.php"); }
  exit;
}


if ( isset($_POST["login"]))
{ 
  $username = $_POST["username"];
  $password = $_POST["password"];

  $result = mysqli_query($conn,"SELECT * FROM user WHERE username='$username'");

  //check ada brapa baris yang nilainya sama dengant $result menggunakan mysqli_num_rows();
  if ( mysqli_num_rows($result) === 1 ) {

    //check password
    $row = mysqli_fetch_assoc($result);


    if( password_verify($password, $row["password"]))
    {   //set_session
        $_SESSION['login'] = true;
        $_SESSION['level']= $row['level'];
        //check remember me / cookie
        if(isset($_POST['remember']))
        { setcookie('id',$row['id'],time()+ 604800);
          setcookie('key',hash('sha256',$row['username']),time()+300);
          setcookie('level',$row['level'], time()+300);
        }

        var_dump($_SESSION['level']);


        if($_SESSION['level'] === "admin") {
                header("location:index.html");
        } else if ($_SESSION['level'] === "tamu") {
        header("location:tamu.php"); 
        }
        exit;
    } 
    /*else {
      echo "<script>
        alert('Username dan Password tidak sesuai, silahkan login kembali');
        document.location.href='login.php'; 
        </script>"; } */
  
  }
  $error = true;
  
}
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <link rel="stylesheet" type="text/css" href="css/main.css">
  <title>LOGIN TEST</title>

</head>
<body>

<div class="signin-container">
     <h2 class="title">Sign in</h2>
     <form class="form" method="post">
       <div class="field">
         <label>Username</label>
         <input name="username" type="text" id="username" autocomplete="on" required autofocus="on">
       </div>
       <div class="field">
         <label>Password</label>
         <input type="password" name="password"  id="password" required>

       </div >
            <label class="ingat" name="remember" id="remember" for="ingat" style="position: absolute;">Remember me</label>

    
            <input type="checkbox" id="ingat" style="display: block; position: relative;width: 40px; margin-left: 100px;margin-top: 18px;">
  
             <br>

       <button name="login" class="btn submit" type="submit">Sign in</button>
     
       <button name="lupapass" class="btn forgot">Lupa Password?</button>
     </form>
     <div class="more">
       <p>Don't have an account</p>
       <a href="#">Sign up</a>
     </div>
  </div>
</body>
</html>