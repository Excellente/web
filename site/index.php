<?php

$servername = "localhost";
$username   = "root";
$password   = "wethinkcode";

try {
    $conn = new PDO("mysql:host=$servername;dbname=", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql  = "CREATE DATABASE IF NOT EXISTS accounts";
    $conn->exec($sql);
    //echo "Database created successfully<br>";
    header("Location: main.php");
}
catch(PDOException $error) {
    echo $sql . "<br>" . $error->getMessage();
}
$conn = null;

?>
