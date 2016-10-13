<!DOCTYPE html>
<html>
    <head>
      <title>reset password</title>
      <link rel="stylesheet" type="text/css" href="css/shared.css">
      <link rel="stylesheet" type="text/css" href="css/reset.css">
    </head>
    <body>
        <div id="header">Find you account.</div>
        <div id="form">
          <strong><span style="color: black">please enter your email or username.</span></strong>
          <form action="" method="post">
            <input type="text" name="user" placeholder="email or username">
            <br><button>Submit</button>
          </form>
        </div>
    </body>
</html>
<?php
session_start();
require_once "server_connect.php";

$conn = server_connect();
$sql  = $conn->prepare("SELECT email FROM users WHERE (email = :email OR login = :login)");
$sql->bindParam(":email", $_POST['user']);
$sql->bindParam(":login", $_POST['user']);
$sql->execute();
if (!($sql->rowCount() > 0))
  echo "please enter your correct email or username";

?>
