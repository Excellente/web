<?php
session_start();

$email   = $_SESSION['email'];
$to      = $email; //$_SESSION['email'];
$subject = 'Verification'; // Give the email a subject
$message = '

Thanks for signing up!
Your account has been created, you can login after you have activated your
account.

Please click this link to activate your account:
http://www.aremac.co.za/emsimang/verify.php?email='.$email.;

$error_report = mail($to, $subject, $message);
if ($error_report === true)
  echo "email was successfuly sent". PHP_EOL;
else {
  echo "there was an error in sending the email". PHP_EOL;
//header("Location: login.php");
/*
//$headers = 'From:noreply@yourwebsite.com' . ;
*/
?>
