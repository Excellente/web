<?php

class Database
{
  private $DB_DSN;
  private $DB_USER;
  private $DB_PASSWORD;

  function __construct($DB_DSN, $DB_USER, $DB_PASSWORD)
  {
    $this->DB_DSN = $DB_DSN;
    $this->DB_USER = $DB_USER;
    $this->DB_PASSWORD = $DB_PASSWORD;
  }

  function server_connect()
  {
    try
    {
      $conn = new PDO($this->DB_DSN, $this->DB_USER, $this->DB_PASSWORD);
      $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
    catch(PDOException $error) {
        echo $sql . "<br>" . $error->getMessage();
    }
    return ($conn);
  }
  function dropdb($conn)
  {
    $sql = "DROP DATABASE IF EXISTS accounts";
    if ($conn->query($sql))
      return TRUE;
    return FALSE;
  }
  function create_schema($conn)
  {
    $sql  = "CREATE DATABASE IF NOT EXISTS accounts;USE accounts;";
    if ($conn->query($sql))
    {
      echo "Database created successfully<br>";
    }
    else {
      echo "couldn't create DATABASE<br>";
    }
    $sql  = "CREATE TABLE IF NOT EXISTS users(
	        `user_id`	 INT(8) PRIMARY KEY AUTO_INCREMENT NOT NULL,
          `active` INT(1) NOT NULL DEFAULT 0,
	        `firstname` VARCHAR(255) NOT NULL,
	        `lastname`  VARCHAR(255) NOT NULL,
	        `login` 	 VARCHAR(80),
	        `email` 	 VARCHAR(80) NOT NULL,
	        `password` VARCHAR(255) NOT NULL,
          `salt` VARCHAR(255),
          `hashkey` VARCHAR(255))";

    if ($conn->query($sql))
    {
      echo "table created successfully<br>";
    }
    else
    {
      echo "couldn't create table<br>";
    }
    $sql = ("CREATE TABLE IF NOT EXISTS images(
  				 `image_id` INT(8) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  				 `user_id` INT(8) NOT NULL,
  				 `image` VARCHAR(255) NOT NULL,
  				 `likes` INT(8))");
    if ($conn->query($sql))
    {
      echo "table created successfully<br>";
    }
    else
    {
      echo "couldn't create table<br>";
    }
    $conn = null;
  }
}

?>
