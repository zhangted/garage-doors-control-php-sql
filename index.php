<!DOCTYPE html>
<?php
session_start();
include('connect.php');
?>
<html>
<head>
<title>Welcome</title>
<style>
  body {
    background: url("bg.jpg");
    background-size: cover;
    background-position center;
    font-family: verdana;
    text-align: center;
  }
  p {
    color: white;
    font-size: 22px;
  }
  h1 {
    color: white;
    font-size: 15px;
  }
  input[define="box"] {
    padding: 5px;
    border: 0;
    color: brown;
    background: beige;
  }
  input[type="submit"] {
    padding: 10px;
    font-size: 18px;
    border: 0;
    color: white;
    background: brown;
  }
</style>
</head>

<body>

  <?php
  if($_SESSION['loggedin'] == 1 && $_SESSION['usr']) {

    echo('<br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br />');
    echo('<p>Access granted! Welcome, '.$_SESSION['usr'].'! </p><br /><br />
          <h1>Left Door (Primary) Status : '.$_SESSION['lastActionLeftDoor'].'</h1><br />
          <h1>Right Door (Secondary) Status: '.$_SESSION['lastActionRightDoor'].'</h1><br />
          ');

    //Left Door Button
    if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['left'])) {
      leftDoor_action($_SESSION['lastActionLeftDoor']);
    }
    else {
      echo('<form action='$_SERVER['PHP_SELF']' method='post'>
            <input type='submit' placeholder='Left Door - Primary' define='box' name='left'>
            </form>');
    }

    //Right Door Button
    if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['right'])) {
      rightDoor_action($_SESSION['lastActionRightDoor']);
    }
    else {
      echo('<form action='$_SERVER['PHP_SELF']' method='post'>
            <input type='submit' placeholder='Right Door - Secondary' define='box' name='right'>
            </form><br />');
    }

    //Logout Button
    if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['logout']) && $SESSION['loggedin'] == 1) {
      logout();
    }
    else {
      echo('<form action='$_SERVER['PHP_SELF']' method='post'>
            <input type='submit' placeholder='Log out' define='box' name='logout'>
            </form>');
    }
    }
    else {
    ?>

    <br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br />
    <p>Your credentials?</p>

    <form action="check.php" method="post">
      <input type="username" define="box" placeholder="Username" name="usr"><br /><br />
      <input type="password" define="box" placeholder="Password" name="pw"><br /><br />
      <input type="submit" name="login" placeholder="Login">
    </form>

    <?php
    } ?>

</body>
</html>
