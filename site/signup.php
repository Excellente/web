<!DOCTYPE html>
<html>
    <head>
        <title>Sign Up</title>
        <link rel="stylesheet" type="text/css" href="css/shared.css">
        <link rel="stylesheet" type="text/css" href="css/signup.css">
    </head>

    <body>
        <div id="header">Create Account</div>
        <div id="picture"><div>
        <div id="form">
            <form action="" method="post">
              <input type="text" required value="" name="fname" placeholder="firstname">
              <br><input type="text" required name="lname" placeholder="lastname">
              <br><input type="text" name="login" placeholder="username">
              <br><input type="email" required name="email" placeholder="email address">
              <br><input type="password" required name="passwd" placeholder="password">
              <br><input type="password" required name="passwdcon" placeholder="confirm password">
              <div><br><button name="submit">Create Account</button></div>
            </form>
        </div>
    </body>
</html>

<?php
//require_once "server_connect.php";
require_once "config/database.php";
require_once "Database.class.php";

$start = new Database($DB_DSN.$DB, $DB_USER, $DB_PASSWORD);

if (isset($_POST['submit'])) {
  $fname = $_POST['fname'];
  $lname = $_POST['lname'];
  $login = $_POST['login'];
  $email = $_POST['email'];
  $passwd = hash('whirlpool', $_POST['passwd']);
  $passwdcon = hash('whirlpool', $_POST['passwdcon']);
  if ($passwd != $passwdcon) {
    print "password dont match". PHP_EOL;
    return;
  }
  else
  {
    try {
      $_SESSION['email'] = $email;
      $conn = $start->server_connect();
      $sql = $conn->prepare("SELECT * FROM users WHERE email = :email OR login = :login");
      $sql->bindParam(":email", $email);
      $sql->bindParam(":login", $login);
      $sql->execute();
      if($sql->rowCount() > 0) {
        $err_val = "ERROR: either an email or username already exists in database";
        echo $err_val;
        return;
      }
      else {
        $err_val = "<br><strong>this email doesn't exist in the database</strong><br>";
      }
      $sql = "INSERT INTO users(`firstname`, `lastname`, `login`, `email`, `password`)
            VALUES('".$fname."','".$lname."', '".$login."', '".$email."', '".$passwd."')";
      if ($conn->exec($sql))
        echo "insertion success";
      header("Location: verify.php");
    }
    catch(PDOException $error) {
      echo $error->getMessage();
    }
    $conn = null;
  }
}
?>
