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
				<div id="overlay-div">
					<div id="img-div"><img id="imposed" src="" width="150" height="150" alt="">
					</div>
				</div>
				<video controls autoplay id="video" width="500" height="400"></video>
				<img onclick="setId(this)" class="s_i" id="super_1" alt="photo"
					   width="200" height="200" src="super_i/super_1.gif">
				<img onclick="setId(this)" class="s_i" id="super_2" alt="photo"
						 width="200" height="200" src="super_i/super_2.png">
				<img onclick="setId(this)" class="s_i" id="super_3" alt="photo"
						 width="200" height="200" src="super_i/super_3.png">
				<a href="#" id="snap" style="" class="btn">SnapShot</a>
			</div>
		</div>
		<div class="recent">
			<img src="" id="pic" alt="your-pic">
			<canvas id="canvas" width="500" height="400"></canvas>
		</div>
		<!--
		<div id="right-content">Right content here</div>
		<div id="footer">i am a footer</div>-->
		<script src="js/index.js">
		document.getElementById('super_1').addEventListener('click', funtion ()
		{
			alert('click');
		});
		</script>
	</body>
</html>
