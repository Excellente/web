<?php
session_start();
require_once "config/database.php";
require_once "Database.class.php";

$start = new Database($DB_DSN."accounts", $DB_USER, $DB_PASSWORD);
if (isset($_GET['email']) && !empty($_GET['email'])) {
  $conn = $start->server_connect();
  $sql  = $conn->prepare("UPDATE users SET active = 1 WHERE email = :email");
  $sql->bindParam(":email", $_GET['email']);
  if (!$sql->execute())
  {
    $error_report = "verification was unsuccessful, DON'T panic, it's not you it's US";
    echo 'account activated '.$_GET['email'].'<br>';
  return;
  }
  header("Location: login.php");

  $conn = null;
}
else {
  $email   = $_SESSION['email'];
  $to      = $email;
  $subject = 'Account Verification';
  $message = '
  Thanks for signing up!

  Please click the link below to activate your account:
  http://127.0.0.1:8080/emsimang/verify.php?email='.$email.'

  If you feel this is annoying, yeah we know, but this is soley
  done to ensure maximum security of your personal data.';
  $headers = 'From:noreply@aremac.com'."\r\n";
  $error_report = mail($to, $subject, $message, $headers);
  if ($error_report === true)
  echo "
  <!DOCTYPE html>
  <html>
    <head>
      <title>Account verification</title>
      <link rel='stylesheet' type='text/css' href='css/shared.css'>
      <style>
        body {
          margin            : 0;
          background        : linear-gradient(rgba(30,136,229 ,0.7), rgba(30,136,229 ,0.7)),
                              url('http://www.walldevil.com/wallpapers/a63/beautiful-background-sphere-website-backgrounds-different.jpg');
        }
        a {
          width             : 85%;
          display           : block;
          color             : white;
          text-align        : center;
          text-decoration   : none;
          margin            : 20px;
          padding           : 10px;
          font-family       : avenir next;
          border            : 2px solid #42A5F5;
        }
        a:hover {
          background-color  : #42A5F5;
        }
        #form {
          text-align        : center;
          width             : 25%;
          height            : 10%;
          margin            : auto;
          margin-top        : 10%;
          padding-top       : 2%;
          vertical-align    : center;
          font-family       : avenir next;
          box-shadow        : 2px 2px 18px #222222;
          background-color  : #1976D2;
        }
      </style>
    </head>
    <body>
      <div id='header'>Account verification</div>
      <div id='form'>
        <strong><span style='color: white'>
        a verification email has been sent to your email account
        click on the link you received to verify your account and</span></strong><br>
        <a href='login.php'>Proceed To login</a>
      </div>
    </body>
  </html>";
  else {
    echo "there was an error in sending the email". PHP_EOL;
  }
}
?>
