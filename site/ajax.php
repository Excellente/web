<?php
require_once "config/database.php";
require_once "Database.class.php";

$start = new Database($DB_DSN.$DB, $DB_USER, $DB_PASSWORD);

$data  = $_POST['data'];
$image = str_replace("data:image/png;base64,", "", $data);
$image = str_replace(" ", "+", $image);
$image = base64_decode($image);
$ipath = "images/".time().".png";
file_put_contents($ipath, $image);
try
{
  $conn = $start->server_connect();
  $sql = $conn->prepare("INSERT INTO images(`image`) VALUES (:img)");
  $sql->bindParam(":img", $ipath);
  if ($sql->execute())
  {
    $img = array('image' => $ipath);
    echo json_encode($img);
  }
  else {
    echo "failure". PHP_EOL;
  }
}
catch(PDOException $error)
{
  echo $error->getMessage();
}
$conn = null;

?>
