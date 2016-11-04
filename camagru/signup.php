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
            <form action="" onsubmit="return checkForm()" method="post">
              <input type="text" required value="" name="fname" placeholder="firstname">
              <br><input type="text" required name="lname" placeholder="lastname">
              <br><input type="text" name="login" placeholder="username">
              <br><input type="email" required name="email" placeholder="email address">
              <br><input type="password" required name="passwd" placeholder="password" pattern="*{5}">
              <br><input type="password" required name="passwdcon" placeholder="confirm password">
              <div><br><button name="submit">Create Account</button></div>
            </form>
        </div>
        <script src="js/index.js">
        </script>
    </body>
</html>

<?php
session_start();
require_once "config/database.php";
require_once "Database.class.php";

//password preg_match -->>/(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}/<<--
$start = new Database($DB_DSN.$DB, $DB_USER, $DB_PASSWORD);

if (isset($_POST['submit'])) {
  $fname = htmlspecialchars($_POST['fname']);
  $lname = htmlspecialchars($_POST['lname']);
  $login = htmlspecialchars($_POST['login']);
  $email = htmlspecialchars($_POST['email']);
  $passwd = hash('whirlpool', $_POST['passwd']);
  $passwdcon = hash('whirlpool', $_POST['passwdcon']);
  if ($passwd != $passwdcon) {
    print "password dont match". PHP_EOL;
    return;
  }
  if (filter_var($email, FILTER_VALIDATE_EMAIL) === false)
  {
    print "email is not valid";
    return;
  }
  if (strlen($passwd) < 6)
  {
    print "password must be a minimum of 6 characters";
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
      $sql = $conn->prepare("INSERT INTO users(`firstname`, `lastname`, `login`, `email`, `password`)
      VALUES('".$fname."','".$lname."', '".$login."', '".$email."', '".$passwd."')");
      if ($sql->execute())
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
