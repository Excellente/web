<!DOCTYPE html>
<html>
    <head>
      <title>reset password</title>
      <link rel="stylesheet" type="text/css" href="css/shared.css">
      <link rel="stylesheet" type="text/css" href="css/reset.css">
    </head>
    <body>
        <div id="header">Reset password.</div>
        <div id="form">
          <!--<strong><span style="color: black">please enter your email or username.</span></strong>-->
          <form action="" method="post">
            <input type="password" required name="newpd" placeholder="New password">
            <input type="password" required name="cnewpd" placeholder="Confirm new password">
            <br><button>Submit</button>
          </form>
        </div>
    </body>
</html>

<?php
require_once "Database.class.php";
require_once "config/database.php";

$start = new Database($DB_DSN.$DB, $DB_USER, $DB_PASSWORD);
$email = $_GET['email'];
$hash  = $_GET['hashkey'];
try
{
  if (isset($_POST['newpd']) && isset($_POST['cnewpd']))
  {
    if ($_POST['newpd'] != $_POST['cnewpd'])
    {
      echo "passwords dont match";
      return;
    }
    $newpd = hash(whirlpool, $_POST['newpd']);
    $conn  = $start->server_connect();
    $sql = $conn->prepare("UPDATE users SET password = :passwd WHERE email = :email AND hashkey = :hash");
    $sql->bindParam(":hash", $hash);
    $sql->bindParam(":email", $email);
    $sql->bindParam(":passwd", $newpd);
    if ($sql->execute())
    {
      echo "password was successfuly changed, you can now login with your new password :)". PHP_EOL;
      header("Location: login.php");
    }
    else {
      echo "en error occured changing your password please make sure that all the information entered is coprrect". PHP_EOL;
    }
  }
}
catch (PDOException $err)
{
  echo $sql ."". $err->getMessage();
}
$conn = null;
?>
