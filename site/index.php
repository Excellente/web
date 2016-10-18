<!DOCTYPE html>
<html>
	<head>
		<title>Aremac</title>
		<link rel="stylesheet" type="text/css" href="css/shared.css">
		<link rel="stylesheet" type="text/css" href="css/index.css">
	</head>
	<body>
		<div id="header">
		</div>
		<div id="wrapper">
			<div id="vid">
				<video id="video" width="500" height="400"></video>
				<a href="#" class="btn" id="snapshot">Take Snapshot</a>
				<canvas id="canvas" width="500" height="500"></canvas>
			</div>
			<!--<img id="photo" alt="photo" width="200" height="200" src="thumbnail.jpg">-->
			<a href="logout.php" class="btn">Logout</a>
		</div>
		<div id="right-content">Right content here</div>
		<div id="footer">i am a footer</div>
		<script src="js/main.js"></script>
	</body>
</html>

<?php
require_once "config/database.php";
require_once "Database.class.php";

$start = new Database($DB_DSN."accounts", $DB_USER, $DB_PASSWORD);
try
{
	$conn = $start->server_connect();
}
catch(PDOException $error)
{
	echo $sql ."Error". $error->getMessage();
}
$conn = null;
?>
