<!DOCTYPE html>
<?php
session_start();
include('connect.php');
?>
<html>
<head>
<title>Welcome</title>
<link rel="stylesheet" type="text/css" href="css/style.css"/>
</head>

<body>

  <?php
  if($_SESSION['loggedin'] == 1 && $_SESSION['usr']) {

    echo('<br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br />');
    echo('<p>Access granted! Welcome, '.$_SESSION['usr'].'! </p><br /><br />
          <h1><b>Left Door (Primary)</b> Status : <b>'.$_SESSION['lastActionLeftDoor'].'</b></h1><br />
          <h1><b>Right Door (Secondary)</b> Status: <b>'.$_SESSION['lastActionRightDoor'].'</b></h1><br />
          ');

    //Left Door Button
    if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['left'])) {
      leftDoor_action($_SESSION['lastActionLeftDoor']);
    }
    else {
      echo('<form action='$_SERVER['PHP_SELF']' method='post'>
            <input type='submit' placeholder='Left Door - Primary' define='loggedin' name='left'>
            </form>');
    }

    //Right Door Button
    if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['right'])) {
      rightDoor_action($_SESSION['lastActionRightDoor']);
    }
    else {
      echo('<form action='$_SERVER['PHP_SELF']' method='post'>
            <input type='submit' placeholder='Right Door - Secondary' define='loggedin' name='right'>
            </form><br />');
    }

    //Logout Button
    if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['logout']) && $SESSION['loggedin'] == 1) {
      logout();
    }
    else {
      echo('<form action='$_SERVER['PHP_SELF']' method='post'>
            <input type='submit' placeholder='Log out' define='login' name='logout'>
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
      <input type="submit" define="login" name="login" placeholder="Login">
    </form>

    <?php
    } ?>

</body>
</html>
