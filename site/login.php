<?php

session_start();
$_SESSION['login'] = $_POST['login'];
$_SESSION['passwd'] =  $_POST['passwd'];
?>

<html>
	<head>
		<title>login</title>
		<link rel="stylesheet" type="text/css" href="css/login.css">
	</head>

	<body>
		<div id="header">Aremac</div>
		<div id="form">
			<form action="" method="post">
				<input type="text" value="<?php echo $_SESSION['login'];?>" name="login" placeholder="username">
				<br><input type="password" value="<?php echo $_SESSION['passwd'];?>" name="passwd" placeholder="password">
				<br><button >Login</button>
			</form>
			<a href="reset.html">forgot your password?</a><br>
			<br>don't have an account?<a href="signup.php">Sign Up</a>
		</div>
	</body>
</html>
