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
            <input type="password" required name="oldpd" placeholder="Old password">
            <input type="password" required name="newpd" placeholder="New password">
            <input type="password" required name="cnewpd" placeholder="Confirm new password">
            <br><button>Submit</button>
          </form>
        </div>
    </body>
</html>

<?php
require_once "server_connect.php";

$email = $_GET['email'];
try
{
  if (isset($_POST['oldpd']) && isset($_POST['newpd']) && isset($_POST['cnewpd']))
  {
    if ($_POST['newpd'] != $_POST['cnewpd'])
    {
      echo "the new passwords dont match";
      return;
    }
    $oldpd = hash(whirlpool, $_POST['oldpd']);
    $newpd = hash(whirlpool, $_POST['newpd']);
    $conn  = server_connect();
    $sql   = $conn->prepare("SELECT password FROM users WHERE email = :email");
    $sql->bindParam(":email", $email);
    $sql->execute();
    $res = $sql->fetch();
    if (!($res['password'] == $oldpd))
    {
      echo "The old password entered doesn't match any account in our Database". PHP_EOL;
    }
    else
    {
        $sql = $conn->prepare("UPDATE users SET password = :passwd WHERE email = :email");
        $sql->bindParam(":email", $email);
        $sql->bindParam(":passwd", $newpd);
        if ($sql->execute())
          echo "password was successfuly changed, you can now login with your new password :)";
        //header("Location: login.php");
    }
  }
}
catch (PDOException $err)
{
  echo $sql ."". $err->getMessage();
}
?>
