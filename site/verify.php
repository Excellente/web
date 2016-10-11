<?php
session_start();

$to      = "zamanird@gmail.com"; //$_SESSION['email'];
$subject = 'Verification'; // Give the email a subject
$message = 'hello';

$error_report = mail($to, $subject, $message);
if ($error_report === true)
  echo "email was successfuly sent". PHP_EOL;
else {
  echo "there was an error in sending the email";
}
//header("Location: login.php");
/*
//$headers = 'From:noreply@yourwebsite.com' . "\r\n";
Thanks for signing up!'."\r\n".'
Your account has been created, you can login with the following credentials after you have activated your account by pressing the url below.'."\r\n".'

------------------------'."\r\n".'
Username: '.$name.''."\r\n".'
------------------------'."\r\n".'

Please click this link to activate your account:'."\r\n".'
http://www.aremac.co.za/emsimang/verify.php?email='.$email."\r\n
*/
?>
