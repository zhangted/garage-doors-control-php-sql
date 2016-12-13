<?php

$servername = "localhost";
$username = "username";
$password = "";

$connect = new mysqli($servername, $username, $password);

if($connect->connect_error) {
  die("Failed to connect: " . $connect->connect_error)
}

/***********************FUNCTIONS***************************/
function open(){
  

}


?>
