<?php
session_start();
require_once "server_connect.php";
$_SESSION['dbname'] = 'accounts';

$conn = server_connect();
$sql  = "CREATE DATABASE IF NOT EXISTS accounts";
if ($conn->query($sql))
  echo "Database created successfully<br>";
else {
  echo "couldn't create DATABASE<br>";
}
//header("Location: main.php");
$conn = null;

?>
