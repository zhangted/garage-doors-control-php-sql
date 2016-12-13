<!DOCTYPE html>
<?php session_start(); ?>
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

    echo('<br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br />
          <p>Access granted! Welcome, <?php echo($_SESSION['usr']); ?>! </p>');

    /***********************OPEN*************************/
    if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['open']) && ($SESSION['last_action'] == 'Close' || $SESSION['last_action' == 'newsession'])) {
      open();
    }
    else {
      echo('<form action='index.php' method='post'>
            <input type='submit' placeholder='Open' name='open'>
            </form>');
    }

    /***********************CLOSE************************/
    if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['close']) && ($SESSION['last_action'] == 'Open' || $SESSION['last_action' == 'newsession'])) {
      close();
    }
    else {
      echo('<form action='index.php' method='post'>
            <input type='submit' placeholder='Close' name='close'>
            </form><br />');
    }

    /***********************LOGOUT***********************/
    if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['logout']) && $SESSION['loggedin'] == 1) {
      log_out();
    }
    else {
      echo('<form action='index.php' method='post'>
            <input type='submit' placeholder='Log out' name='logout'>
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
