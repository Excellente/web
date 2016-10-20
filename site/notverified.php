<?php


echo "
<!DOCTYPE html>
<html>
  <head>
    <title>Account verification</title>
    <link rel='stylesheet' type='text/css' href='css/shared.css'>
    <style>
      body {
        margin            : 0;
        background        : linear-gradient(rgba(255,109,0 ,0.5), rgba(255,109,0 ,0.5)),
                            url(http://www.theplunge.com/images/new_york_city.jpg);
      }
      #form {
        font-stretch: 40px;
        color: white;
        text-align: center;
        height: 100vh;
        background-color: rgba(0, 0, 0, 0.5);
      }
      span {
        text-align: center;
        font-stretch: 50px;
        font-family: 'Anton', sans-serif;
      }
    </style>
  </head>
  <body>
    <div id='header'>Not Verified</div>
    <div id='form'>
      <strong><span style='font-size:9em'>
      Account not Verified
      </span></strong><br>
      please check your email to verify account;
    </div>
  </body>
</html>";
header("refresh: 5; login.php");

?>
