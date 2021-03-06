<!DOCTYPE html>
<html>
	<head>
		<title>Aremac</title>
		<link rel="stylesheet" type="text/css" href="css/index.css">
	</head>
	<body>
		<div id="header">
				<ul>
					<a href="index.php">Home</a>
					<a href="login.php">Login</a>
					<a href="index.php">Gallery</a>
					<a href="logout.php">logout</a>
				</ul>
		</div>
		<div id="right-content">
			<img src="" id="pic">
			<canvas id="canvas" width="600" height="400"></canvas>
		</div>
		<div id="wrapper">
			<div id="overlay-div">
				<div id="img-div"><img id="imposed" src="" width="150" height="150" alt="">
				</div>
			</div>
			<div id="vid">
				<video controls autoplay id="video" width="500" height="400"></video>
				<img onclick="setId(this)" class="s_i" id="super_1" alt="photo"
					   width="200" height="200" src="super_i/super_1.png">
				<img onclick="setId(this)" class="s_i" id="super_2" alt="photo"
						 width="200" height="200" src="super_i/super_2.png">
				<img onclick="setId(this)" class="s_i" id="super_3" alt="photo"
						 width="200" height="200" src="super_i/super_3.png">
				<a href="#" onclick="flash()" id="snap" style="" class="btn">SnapShot</a>
			</div>
		</div>
		<!--<div id="footer">i am a footer</div>-->
		<script src="js/edit.js">
		</script>
	</body>
</html>
