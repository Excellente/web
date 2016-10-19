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
				<video controls autoplay id="video" width="500" height="400"></video>
				<button class="snap" id="snap">Take Snapshot</button>
				<canvas id="canvas" width="500" height="500"></canvas>
			</div>
			<img id="photo" alt="photo" width="200" height="200" src="">
			<a href="logout.php" class="btn">Logout</a>
		</div>
		<div id="right-content">Right content here</div>
		<div id="footer">i am a footer</div>
		<script src="js/index.js"></script>
	</body>
</html>

<?php
require_once "config/database.php";
require_once "Database.class.php";

$start = new Database($DB_DSN.$DB, $DB_USER, $DB_PASSWORD);
try
{
	$data = $_REQUEST['image'];
	//$data = base64_decode(preg_replace('#^data:image/\w+;base64,#i', '', $data));
	$conn = $start->server_connect();
}
catch(PDOException $error)
{
	echo $sql ."Error". $error->getMessage();
}
$conn = null;
?>
