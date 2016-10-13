<?php
session_start();

if (isset($_GET['email']) && !empty($_GET['email'])) {
  echo 'activation '.$_GET['email'].'<br>';
  return;
}
$email   = $_SESSION['email'].'<br>';
echo $email;
$to      = $email; //$_SESSION['email'];
$subject = 'Verification'; // Give the email a subject
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
//header("Location: login.php");
?>
