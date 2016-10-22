<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Gallery</title>
    <link rel="stylesheet" href="css/shared.css" media="screen" title="no title">
    <link rel="stylesheet" href="css/gallery.css" media="screen" title="no title">
  </head>
  <body>
    <div id="header">
        <ul>
          <a href="index.php">Home</a>
          <a href="login.php">Login</a>
          <a href="gallery.php">Gallery</a>
          <a href="logout.php">logout</a>
        </ul>
    </div>
    <div id="container">

    </div>
  </body>
</html>

<?php
//gallery page
require_once "config/database.php";
require_once "Database.class.php";

$start    = new Database($DB_DSN.$DB, $DB_USER, $DB_PASSWORD);
?>
