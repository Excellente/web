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
            <input type="password" name="newpd" placeholder="Old password">
            <input type="password" name="newpd" placeholder="New password">
            <input type="password" name="newpd" placeholder="Confirm new password">
            <br><button>Submit</button>
          </form>
        </div>
    </body>
</html>

<?php
require_once "server_connect.php";

$email = $_GET['email'];
$conn  = server_connect();
$sql   = $conn->prepare("SELECT password FROM user WHERE email = :email");
$sql->bindParam(":email", $email);
$sql->execute();
if (!($sql->rowCount() > 0))
{
  echo "The old password entered doesn't mathc any account in our Database". PHP_EOL;
}
else {
  echo "A matching password was found". PHP_EOL;
}

?>
