
<html>
	<head>
		<title>Aremac</title>
		<link rel="stylesheet" type="text/css" href="css/shared.css">
		<link rel="stylesheet" type="text/css" href="css/main.css">
	</head>
	<body>
		<div id="header">
		</div>
		<div id="wrapper">
			<video id="video" width="500" height="400"></video>
			<a href="#" class="btn" id="snapshot">Take Snapshot</a>
			<canvas id="canvas" width="500" height="500"></canvas>
			<img id="photo" alt="photo" width="200" height="200" src="thumbnail.jpg">
			<a href="logout.php" class="btn">Logout</a>
		</div>
		<div id="right-content">Right content here</div>
		<div id="footer">i am a footer</div>
		<script src="js/main.js"></script>
	</body>
</html>

<?php
require_once "server_connect.php";

try
{
	$conn = server_connect();
	$sql = $conn->prepare("CREATE TABLE IF NOT EXISTS images(
				 `image_id` INT(8) NOT NULL AUTO_INCREMENT PRIMARY KEY,
				 `user_id` INT(8) NOT NULL,
				 `image` BLOB NOT NULL,
				 `likes` INT(8)
	)");
	$conn->query($sql);
}
catch(PDOException $error)
{
	echo $sql ."Error". $error->getMessage();
}
$conn = null;
?>
