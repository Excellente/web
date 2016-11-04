<?php
session_start();

if (isset($_SESSION['login']) && !empty($_SESSION['login']))
{
  $login = $_SESSION['login'];
  $login = array('login'=> $login);
  echo json_encode($login);
}
else {
  $error = array('error' => "please login to proceed");
  echo json_encode($error);
}

?>
