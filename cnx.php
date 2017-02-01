<?php
date_default_timezone_set("Europe/Lisbon");
$conn->set_charset("utf8"); 
$conn = new mysqli("localhost", "goncaloneto", "dianarute", "pub"); //host, user, password, BD

if(mysqli_connect_errno()){ //errno - error number
  printf("Error:%s\n", mysqli_connect_error()); 
  exit();
}
?>