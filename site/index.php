<!DOCTYPE html>
<html>
	<head>
		<title>Aremac</title>
		<link rel="stylesheet" type="text/css" href="css/index.css">
	</head>
	<body>
		<div id="header">
				<ul>
					<a href="##">Home</a>
					<a href="##">Login</a>
					<a href="##">Gallery</a>
				</ul>
		</div>
		<div id="wrapper">
			<div id="vid">
				<!--<video controls autoplay id="video" width="500" height="400"></video>
				<button class="snap" id="snap">Take Snapshot</button>-->
				<canvas id="canvas" width="500" height="500"></canvas>
			</div>
			<img id="photo" alt="photo" width="200" height="200" src="">
			<img id="pic" alt="photo" width="200" height="200" src="<?php if (!empty($_SESSION['img'])) echo $_SESSION['img']; ?>">
			<a href="logout.php" class="btn">Logout</a>
		</div>
		<div id="right-content">Right content here</div>
		<div id="footer">i am a footer</div>
		<script src="js/index.js"></script>
	</body>
</html>
