<?php
include("cnx.php");
session_start();
if($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $myusername = $_POST['user'];
    $mypassword = $_POST['password']; 
    
    $sql = "SELECT username FROM admin WHERE username = '$myusername' and password = '$mypassword'";
    $result = mysqli_query($conn,$sql);
    $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
    $active = $row['active'];
    
    $count = mysqli_num_rows($result);
    
    // If result matched $myusername and $mypassword, table row must be 1 row
    if($count == 1) {
     //session_register("myusername");
     $_SESSION['login_user'] = $myusername;
     
     header("location: index.php");
    }else {
     $error = "Your Login Name or Password is invalid";
     header("location: login.php");
    }
}
?>

<!DOCTYPE html>
<html >
  <head>
    <title>Lista de Publicações</title>
  
    <meta charset="UTF-8">
    <meta name="viewport" content="width=400px, user-scalable=no">
    
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/w3.css">
    <link rel="stylesheet" href="css/style.css">
  </head>

<body class="w3-content loginform" style="max-width:500px">
  <div class="w3-card-4 ">
    <div class="w3-container w3-green">
      <h2>Login</h2>
    </div>

    <form class="w3-container" action="" method="post">
    
      <p>
      <label>Username</label></p>
      <input class="w3-input" type="text" name="user" autofocus autocomplete="off" autocorrect="off" autocapitalize="off">
      
      <p>    
      <label>Password</label></p>
      <input class="w3-input w3-margin-bottom" type="password" name="password" autocomplete="off" autocorrect="off" autocapitalize="off">
      
      <p>
      <input type="submit" value="Entrar" class='w3-btn w3-green'>
    </form>
    <div style = "font-size:11px; color:#cc0000; margin-top:10px"><?php echo $error; ?></div>
  </div>
  
  </body>
  </html>

