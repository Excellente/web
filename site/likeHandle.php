<?php
session_start();
require_once "config/database.php";
require_once "Database.class.php";

$start = new Database($DB_DSN.$DB, $DB_USER, $DB_PASSWORD);
if (isset($_SESSION['login']) && !empty($_SESSION['login']))
{
  $login = htmlspecialchars($_SESSION['login']);
  $conn = $start->server_connect();
  $sql = $conn->prepare("SELECT * FROM users WHERE login = :login");
  $sql->bindParam(":login", $login);
  if ($sql->execute())
  {
    $res = $sql->fetch();
    $sql->bindParam(":login", $login);
    echo json_encode(array('rows' => $res, 'data' => $data));
  }
  else {
    echo json_encode(array('error' => "gallery.php sql error"));
  }
}
else {
  echo json_encode(array('error' => "please login to proceed"));
}

?>
