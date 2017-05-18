<?php
session_start();
require_once "config/database.php";
require_once "Database.class.php";

$img_id = htmlspecialchars($_POST['img_id']);
$_SESSION['img_id'] = $img_id;

if (isset($_SESSION['img_id']))
{
  echo "OK";
}
else
{
  echo "session not set";
}
?>
