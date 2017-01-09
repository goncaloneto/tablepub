<?php
date_default_timezone_set("Europe/Lisbon");
$conn = new mysqli("localhost", "goncaloneto", "", "pub"); //host, user, password, BD
$conn->set_charset("utf8"); 

if(mysqli_connect_errno()){ //errno - error number
  printf("Error:%s\n", mysqli_connect_error()); 
  exit();
}
?>