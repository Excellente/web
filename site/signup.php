<!DOCTYPE html>
<html>
    <head>
        <title>Sign Up</title>
        <link rel="stylesheet" type="text/css" href="css/shared.css">
        <link rel="stylesheet" type="text/css" href="css/signup.css">
    </head>

    <body>
        <div id="header">Create Account</div>
        <div id="picture"><div>
        <div id="form">
            <form action="" method="post">
              <input type="text" required value="<?php echo $fname?>" name="fname" placeholder="firstname">
              <br><input type="text" required name="lname" placeholder="lastname">
              <br><input type="text" name="login" placeholder="username">
              <br><input type="email" required name="email" placeholder="email address">
              <br><input type="password" required name="passwd" placeholder="password">
              <br><input type="password" required name="passwdcon" placeholder="confirm password">
              <div><br><button name="submit">Create Account</button></div>
            </form>
        </div>
    </body>
</html>

<?php
//create new user
//get account attributes and stored them in a database
//log the new user in
$servername = "localhost";
$username   = "root";
$password   = "wethinkcode";

$fname = $_POST['fname'];
$lname = $_POST['lname'];
$login = $_POST['login'];
$email = $_POST['email'];
$passwd = hash(whirlpool, $_POST['passwd']);
$passwdcon = hash(whirlpool, $_POST['passwdcon']);

if ($passwd != $passwdcon) {
  print "password dont match". PHP_EOL;
  return;
}
else if(isset($_POST['submit'])) {
  try {
    $_SESSION['email'] = $_POST['email'];
    $conn = new PDO("mysql:host=$servername;dbname=accounts", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql  = "CREATE TABLE IF NOT EXISTS users(
	        `user_id`	 INT(8) PRIMARY KEY AUTO_INCREMENT NOT NULL,
	        `firstname` VARCHAR(255) NOT NULL,
	        `lastname`  VARCHAR(255) NOT NULL,
	        `login` 	 VARCHAR(80),
	        `email` 	 VARCHAR(80) NOT NULL,
	        `password` VARCHAR(255) NOT NULL)";
    $conn->exec($sql);
    $sql = $conn->prepare("SELECT * FROM users WHERE email = :email OR login = :login");
    $sql->bindParam(":email", $email);
    $sql->bindParam(":login", $login);
    $sql->execute();
    if($sql->rowCount() > 0) {
      $err_val = "ERROR: either an email or username already exists in database";
      echo $err_val;
      return;
    }
    else {
      $err_val = "<br><strong>this email doesn't exist in the database</strong><br>";
    }
    $sql = "INSERT INTO users(`firstname`, `lastname`, `login`, `email`, `password`)
           VALUES('".$fname."','".$lname."', '".$login."', '".$email."', '".$passwd."')";
    $conn->exec($sql);
    $_SESSION['login'] = $login;
    header("Location: verify.php");
  }
  catch(PDOException $error) {
    echo $sql . "<br>" . $error->getMessage();
  }
$conn = null;
}
?>
