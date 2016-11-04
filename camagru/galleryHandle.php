<?php
session_start();
require_once "config/database.php";
require_once "Database.class.php";

$start = new Database($DB_DSN.$DB, $DB_USER, $DB_PASSWORD);
$conn = $start->server_connect();
$sql = $conn->prepare("SELECT * FROM images");
if ($sql->execute())
{
  $res = $sql->rowCount();
  $data = $sql->fetchAll();
  echo json_encode(array('rows' => $res, 'data' => $data));
}
else {
  echo json_encode(array('error' => "gallery.php sql error"));
}

?>
