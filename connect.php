<?php
//Connect to database & Other functions sheet

//Connect to DB
session_start();
$servername = "localhost";
$username = "yqeoivwd";
$password = "";

$connect = new mysqli($servername, $username, $password);

if($connect->connect_error) {
  die("Failed to connect: " . $connect->connect_error)
}


//Control left door
function leftDoor_action($lastActionLeftDoor){

  if($lastActionLeftDoor == "open") {
    //Close door
  }
  elseif($lastActionLastDoor == "close") {
    //Open door
  }
  else {
    //Do nothing
  }

}


//Control right door
function rightDoor_action($lastActionRightDoor){

  if($lastActionRightDoor == "open") {
    //Close door
  }
  elseif($lastActionRightDoor == "close") {
    //Open door
  }
  else {
    //Do nothing
  }

}


//Logout and Save
function logout(){

  //Store last action variables into sql again

  session_destroy();

}


?>
