<?php
//What happens after user presses login button

session_start();
include('connect.php');

if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['login'])) {

  if(!empty($_POST['usr']) && !empty($_POST['pw'])) {

    $pw = htmlspecialchars($_POST['pw']);
    $hash = password_hash($pw, PASSWORD_DEFAULT);
    $usr = mysqli_real_escape_string($connect, $_POST['usr']);

    $sql = "SELECT usr,pw,leftaction,rightaction FROM credentials WHERE usr = '$usr'";
    $select = mysqli_query($sql);

    if(mysqli_num_rows($select) > 0) {

      $row = mysqli_fetch_assoc($select))

      if(password_verify($row['pw'], $hash){

        $_SESSION['loggedin'] = 1;
        $_SESSION['usr'] = $usr;
        $_SESSION['lastActionLeftDoor'] = $row['leftaction'];
        $_SESSION['lastActionRightDoor'] = $row['rightaction'];
        echo "<script type='text/javascript'>alert('Success!');</script>";
        header('Location: index.php');

      }
      else {

        $_SESSION['loggedin'] == 0;
        echo "<script type='text/javascript'>alert('Fail!');</script>";
        header('Location: index.php');

      }

    }
    else {

      $_SESSION['loggedin'] == 0;
      echo "<script type='text/javascript'>alert('Fail!');</script>";
      header('Location: index.php');

    }
  }
 ?>
