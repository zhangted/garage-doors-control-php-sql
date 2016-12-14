<?php
//Connect to database &
//Functions sheet

//Connect to DB
session_start();
$servername = "localhost";
$username = "username";
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
    //End session
    //Store last action variables into sql again
}


?>
