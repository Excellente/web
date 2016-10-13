<?php
session_start();
require_once "server_connect.php";
$_SESSION['dbname'] = false;

$conn = server_connect();
$sql  = "CREATE DATABASE IF NOT EXISTS accounts";
if ($conn->query($sql))
{
  $_SESSION['dbname'] = true;
  echo "Database created successfully<br>";
  header("Location: main.php");
}
else {
  echo "couldn't create DATABASE<br>";
}
$conn = null;

?>
