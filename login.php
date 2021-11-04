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
  if ($_SESSION['level'] === "admin" ) { header("location:admin/index.php"); }
  else if ($_SESSION['level'] === "tamu" ) { header("location:user/index.php"); }
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
        $_SESSION['login']= true;
        $_SESSION['level']= $row['level'];
        //check remember me / cookie
        if(isset($_POST['remember']))
        { setcookie('id',$row['id'],time()+ 604800);
          setcookie('key',hash('sha256',$row['username']),time()+300);
          setcookie('level',$row['level'], time()+300);
        }


        $_SESSION['data']=$row["username"];
       


        if($_SESSION['level'] === "admin") {
                header("location:admin/index.php");
        } else if ($_SESSION['level'] === "tamu") {
        header("location:user/index.php"); 
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
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <title>Card</title>
  <style type="text/css">a {
  text-decoration: none;
}
body {
  background-image: linear-gradient(rgba(0,0,0,0.5),rgba(0,0,0,0.5)), url(img/background.jpg);
	height: 100vh;

	background-position: center;

}
label {
  font-family: "Raleway", sans-serif;
  font-size: 11pt;
}
#forgot-pass {
  color: #2dbd6e;
  font-family: "Raleway", sans-serif;
  font-size: 10pt;
  margin-top: 3px;
  text-align: ;
}
#card {
  background: #fbfbfb;
  border-radius: 8px;
  box-shadow: 1px 2px 8px rgba(0, 0, 0, 0.65);
  height: 410px;
  margin: 6rem auto 8.1rem auto;
  width: 329px;
}
#card-content {
  padding: 12px 44px;
}
#card-title {
  font-family: "Raleway Thin", sans-serif;
  letter-spacing: 4px;
  padding-bottom: 23px;
  padding-top: 13px;
  text-align: center;
}
#signup {
  color: #2dbd6e;
  font-family: "Raleway", sans-serif;
  font-size: 10pt;
  margin-top: 16px;
  text-align: center;
}
#submit-btn {
  background: -webkit-linear-gradient(right, #a6f77b, #2dbd6e);
  border: none;
  border-radius: 20px;
  box-shadow: 0px 1px 8px #24c64f;
  cursor: pointer;
  color: white;
  font-family: "Raleway SemiBold", sans-serif;
  height: 42.3px;
  margin: 0 auto;
  margin-top: 50px;
  transition: 0.25s;
  width: 153px;
}
#submit-btn:hover {
  box-shadow: 0px 1px 18px #24c64f;
}
.form {
  align-items: left;
  display: flex;
  flex-direction: column;
}
.form-border {
  background: -webkit-linear-gradient(right, #a6f77b, #2ec06f);
  height: 1px;
  width: 100%;
}
.form-content {
  background: #fbfbfb;
  border: none;
  outline: none;
  padding-top: 14px;
}
.underline-title {
  background: -webkit-linear-gradient(right, #a6f77b, #2ec06f);
  height: 2px;
  margin: -1.1rem auto 0 auto;
  width: 89px;
}</style>
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
</head>

<body>
  <div id="card">
    <div id="card-content">
      <div id="card-title">
        <h2>LOGIN</h2>
        <div class="underline-title"></div>
      </div>
      <form method="post" class="form">
        <label for="username" style="padding-top:13px">
            &nbsp;Username
          </label>
        <input id="username" class="form-content" type="username" name="username" autocomplete="on" required  />
        <div class="form-border"></div>
        <label for="password" style="padding-top:22px">&nbsp;Password
          </label>
        <input id="password" class="form-content" type="password" name="password" required/>
        <div class="form-border"></div>
   
       
          <legend id="forgot-pass">
            
              <input type="checkbox" name="remember" id="remember">
                      <label for="remember" >Remember me</label> 
               </legend>
                <input id="submit-btn" type="submit" name="login" value="LOGIN" >
        <a href="#" id="signup">Don't have account yet?</a>

      </form>
    </div>
  </div>
</body>

</html>