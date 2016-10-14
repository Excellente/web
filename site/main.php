
<html>
	<head>
		<title>Aremac</title>
		<link rel="stylesheet" type="text/css" href="css/shared.css">
		<link rel="stylesheet" type="text/css" href="css/main.css">
	</head>
	<body>
		<div id="header">
			<div class="logo">
				<img width="60" height="60" src="logo.png" alt="logo" />
			</div>
		</div>
		<div id="wrapper">
			<video id="video" width="500" height="400"></video>
			<a href="#" class="btn" id="snapshot">Take Snapshot</a>
			<canvas id="canvas" width="500" height="500"></canvas>
			<img id="photo" width="200" height="200" src="thumbnail.jpg">
			<a href="logout.php" class="btn">Logout</a>
		</div>
		<div id="right-content">Right content here</div>
		<div id="footer">i am a footer</div>
		<script src="js/main.js"></script>
	</body>
</html>

<?php
require_once "server_connect.php";
/*
try
{
	$conn = server_connect();
	$sql = $conn->prepare("CREATE TABLE IF NOT EXISTS images(
				 `user_id` INT(8) NOT NULL AUTO_INCREMENT,
				 `image` BLOB
	)");
}
*/
?>
