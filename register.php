<?php
//Register an Administrator with this page
//Delete this file to restrict data entry into MySQL from html/php

session_start();
include('connect.php');

if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['register']) && !empty($_POST['usr']) && !empty($_POST['pw'])) {

  date_default_timezone_set('America/New_York');

  //Variable creation
  $usr_insert = htmlspecialchars($_POST['usr_register']);
  $pw_strip = htmlspecialchars($_POST['pw_register']);
  $pw_insert = pasword_hash($pw_strip, DEFAULT_PASSWORD);
  $action_insert = 'New User';
  $date_insert = date('m/d/Y h:i a', time());

  //Check if username exists
  $query = 'SELECT * FROM credentials WHERE usr = '".$usr_insert."'';
  $check_q = mysqli_query($query);
  if(mysqli_num_rows($check_q)) == 1) {

    echo "<script type='text/javascript'>alert('Username already in database!');</script>";
    header('Location: register.php');

  }
  else {

  //Insert values into database
  $query = 'INSERT into credentials (usr, pw, leftaction, rightaction, leftdatetime, rightdatetime)
  VALUES ('".$usr_insert."', '".$pw_insert."', '".$action_insert."', '".$action_insert."', '".$date_insert."', '".$date_insert."')';
  $run_query = mysqli_query($query);

  }
}

else {

  //Admin Reg. Form
  echo('Register an administrator through this form:<br />');

  echo('<form action='$_SERVER['PHP_SELF']' method='post'>
        Desired username: <input type='username' placeholder='Username' name='usr_register'><br /><br />
        Desired password:<input type='password' placeholder='Password' name='pw_register'><br /><br />
        <input type='submit' placeholder='Register' name='register'>
        </form>');
        
}


?>
