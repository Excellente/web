<?php
session_start();
require_once "config/database.php";
require_once "Database.class.php";

function image_clear($img)
{
  imagedestroy($img);
}

function imagefrom_base64($data)
{
  $image = str_replace("data:image/png;base64,", "", $data);
  $image = str_replace(" ", "+", $image);
  $image = base64_decode($image);
  return ($image);
}

function merge_images($img_dst, $img_src)
{
  $image = imagecreatetruecolor(500, 400);
  imagealphablending($image, false);
  imagesavealpha($image, true);
  imagecopy($image, $img_dst, 0, 0, 0, 0, 500, 400);
  imagealphablending($image, true);
  imagescale($img_src, 50, 50);
  imagecopy($image, $img_src, 0, 0, 0, 0, 500, 400);
  return ($image);
}

$start    = new Database($DB_DSN.$DB, $DB_USER, $DB_PASSWORD);
$data     = htmlspecialchars($_POST['data']);
$img_id   = htmlspecialchars($_POST['img_id']);
$toImpose = htmlspecialchars($_POST['toImpose']);
$info     = getimagesize($toImpose);
$ext      = image_type_to_extension($info[2]);
$ipath    = "images/".time().".png";
$image    = imagefrom_base64($data);

file_put_contents($ipath, $image);
if (strcmp($ext, ".gif") == 0)
  $src   = imagecreatefromgif($toImpose);
else
  $src   = imagecreatefrompng($toImpose);
$dest    = imagecreatefrompng($ipath);
$image   = merge_images($dest, $src);
image_clear($src);
image_clear($dest);
header('Content/type: image/png');
imagepng($image, $ipath);
try
{
  if (isset($_SESSION['login']))
  {
    $loggedin = htmlspecialchars($_SESSION['login']);
    $conn = $start->server_connect();
    $sql = $conn->prepare("SELECT * FROM users WHERE login = :login");
    $sql->bindParam(":login", $loggedin);
    if ($sql->execute())
    {
      $res = $sql->fetch();
    }
    else
      echo "error";
    $sql = $conn->prepare("INSERT INTO images(`image_id`, `image`, `email`) VALUES (:img_id, :img, :user)");
    $sql->bindParam(":img", $ipath);
    $sql->bindParam(":img_id", $img_id);
    $sql->bindParam(":user", $res['email']);
    if ($sql->execute())
    {
      $img = array('image' => $ipath, 'img_id' => $img_id);
      echo json_encode($img);
    }
    else {
      echo json_encode(array('error' => "ajax.php insertion failure"));
    }
  }
  else {
    echo json_encode(array("error" => "logged out"));
  }
}
catch(PDOException $error)
{
  echo $error->getMessage();
}
$conn = null;

?>
