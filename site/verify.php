<?php
session_start();
require_once "server_connect.php";

if (isset($_GET['email']) && !empty($_GET['email'])) {
  $conn = server_connect();
  $sql  = $conn->prepare("UPDATE users SET active = 1 WHERE email = :email");
  $sql->bindParam(":email", $_GET['email']);
  if (!$sql->execute())
  {
    $error_report = "verification was unsuccessful, DON'T panic, its US not you";
    echo 'account activated '.$_GET['email'].'<br>';
  return;
  }
  header("Location: login.php");
  $conn = null;
}
$email   = $_SESSION['email'];
echo $email."<br>";
$to      = $email;
$subject = 'Account Verification';
$message = '
Thanks for signing up!

Please click this link to activate your account:
http://127.0.0.1:8080/emsimang/verify.php?email='.$email;
$headers = 'From:noreply@aremac.com'."\r\n";
$error_report = mail($to, $subject, $message, $headers);
if ($error_report === true)
  echo "email was successfuly sent". PHP_EOL;
else {
  echo "there was an error in sending the email". PHP_EOL;
}
header("Location: login.php");
?>
