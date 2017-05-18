<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Gallery</title>
    <link rel="stylesheet" href="css/index.css" media="screen" title="no title">
    <link rel="stylesheet" href="css/gallery.css" media="screen" title="no title">
  </head>
  <body onload="loadGallery()">
		<div id="error" onclick="disappear(this)">
			<div id="text"></div>
			<a href="login.php">login</a>
		</div>
    <div id="header">
        <ul>
          <a href="index.php">Home</a>
          <a href="login.php">Login</a>
          <a onclick="linkOnclick(this)" href="#">Edit</a>
          <a href="logout.php">logout</a>
        </ul>
    </div>
		<div id="comment">
			<div id="inside-comment" scrollable="true">
        <div id="div-image"><img id="to-comment" src="http://lazypenguins.com/wp-content/uploads/2015/11/Fierce-Bengal-Tiger.jpg" alt="" width="400" height="500">
        </div>
        <div>
          <form id="form" action="comment.php" method="post">
            <input type="comment" placeholder="comment" name="p_comment" value="">
          </form>
        </div>
        <div>
          <button id="like" type="button" name="like">like</button>
        </div>
				<div id="exit-button">
					<button id="close" type="button" name="close">close</button>
			</div>
			</div>
		</div>
    <div id="container">
			<table id="layout">
			</table>
    </div>
		<script src="js/index.js">
		</script>
  </body>
</html>

<?php
session_start();
require_once "config/database.php";
require_once "Database.class.php";

$start = new Database($DB_DSN.$DB, $DB_USER, $DB_PASSWORD);


?>
