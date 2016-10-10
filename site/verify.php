<?php
session_start();
$name = $_SESSION['login'];
echo "logged-in as: "$name;
$to      = "pcheerza@gmail.com";//$_SESSION['email'];
echo "email: ". $to;
$subject = 'Signup | Verification'; // Give the email a subject
$message = '

Thanks for signing up!
Your account has been created, you can login with the following credentials after you have activated your account by pressing the url below.

------------------------
Username: '.$name.'
------------------------

Please click this link to activate your account:
http://www.aremac.co.za/emsimang/verify.php?email='.$email;
$headers = 'From:noreply@yourwebsite.com' . "\r\n";
mail($to, $subject, $message, $header);
//header("Location: login.php");
?>
