<!DOCTYPE html>
<html>
	<head>
		<title>login</title>
		<link rel="stylesheet" type="text/css" href="css/login.css">
	</head>

	<body>
		<div id="header">Aremac</div>
		<div id="form">
			<form action="" method="post">
				<input type="text" required name="login" placeholder="username or email">
				<br><input type="password" required name="passwd" placeholder="password">
				<br><button id="login" name="signin">Login</button>
			</form>
			<a href="reset.php">forgot your password?</a><br>
			<br>don't have an account?<a href="signup.php">Sign Up</a>
		</div>
	</body>
</html>

<?php
session_start();
$error = "";
$servername = "localhost";
$username   = "root";
$password   = "wethinkcode";

if (!empty($_SESSION['login'])) {
	header("Location: index.php");
}
if(isset($_POST['signin']))
{
  try
	{
		$login = $_POST['login'];
		$passwd = hash('whirlpool', $_POST['passwd']);
    $conn = new PDO("mysql:host=$servername;dbname=accounts", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = $conn->prepare("SELECT active, login, password, email FROM users
					 WHERE (email = :email OR login = :login) AND password = :passwd");
		$sql->bindParam(":email", $login);
		$sql->bindParam(":login", $login);
		$sql->bindParam(":passwd", $passwd);
    $sql->execute();
		$res = $sql->fetch();
		if ($sql->rowCount() > 0 && $res['active'] == 0)
		{
			header("Location: notverified.php");
		}
    if($sql->rowCount() > 0 && $res['active'] == 1) {
			$_SESSION['login'] = $login;
			header("Location: index.php");
		}
		else {
			echo "<strong>unknown user</strong>". PHP_EOL;
		}
	}
	catch (PDOException $err) {
		echo $sql ."". $err->getMessage();
	}
}
$conn = null;

?>
