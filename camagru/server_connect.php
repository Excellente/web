<?php
session_start();
function server_connect()
{
  $servername = "localhost";
  $username   = "root";
  $password   = "wethinkcode";
  if ($_SESSION['dbname'] === true)
    $dbname   = "accounts";
  else
    $dbname   = "";

  try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  }
  catch(PDOException $error) {
      echo $sql . "<br>" . $error->getMessage();
  }
  return ($conn);
}

?>
