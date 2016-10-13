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

if (isset($_POST['user']) && !empty($_POST['user'])) {
  $conn = server_connect();
  $sql  = $conn->prepare("SELECT email FROM users WHERE (email = :email OR login = :login)");
  $sql->bindParam(":email", $_POST['user']);
  $sql->bindParam(":login", $_POST['user']);
  $sql->execute();
  if (!($sql->rowCount() > 0)) {
    echo "please enter your correct email or username";
    return;
  }
  else
  {
    $res     = $sql->fetch();
    $email   = $res['email'];
    echo "an  email has been sent to your mailbox with the password reset link";
    $email   = $_SESSION['email'];
    $to      = $email;
    $subject = 'Password Reset';
    $message = '
    Someone has requested to change your password!

    If it wasn\'t you ignore this email, if it was you, please click this link to reset your password:
    http://127.0.0.1:8080/emsimang/new_password.php?email='.$email;
    $headers = 'From:noreply@aremac.com'."\r\n";
    $error_report = mail($to, $subject, $message, $headers);
  }
}
?>
