<?php
//Register an Administrator with this page
//Delete this file to restrict data entry into MySQL from html/php

session_start();
include('connect.php');

if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['register'])) {

  //insert variables from register form into database
  $usr_insert = htmlspecialchars($_POST['usr_register']);
  $pw_strip = htmlspecialchars($_POST['pw_register']);
  
  $pw_insert = pasword_hash($pw_strip, DEFAULT_PASSWORD);

}
else {

  echo('Register an administrator through this form:<br />');

  echo('<form action='$_SERVER['PHP_SELF']' method='post'>
        Desired username: <input type='username' placeholder='Username' name='usr_register'><br /><br />
        Desired password:<input type='password' placeholder='Password' name='pw_register'><br /><br />
        <input type='submit' placeholder='Register' name='register'>
        </form>');
}



?>
