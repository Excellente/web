<?php
session_start();

class Database
{
  private $DB_DSN;
  private $DB_USER;
  private $DB_PASSWORD;

  function __construct($DB_DSN, $DB_USER, $DB_PASSWORD)
  {
    $this->$DB_DSN      = $DB_DSN;
    $this->$DB_USER     = $DB_USER;
    $this->$DB_PASSWORD = $DB_PASSWORD;
  }

  function server_connect()
  {
    if ($_SESSION['dbname'] === true)
      $dbname   = "accounts";
    else
      $dbname   = "";

    try {
      $conn = new PDO($this->DB_DSN, $DB_USER, $DB_PASSWORD);
      $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
    catch(PDOException $error) {
        echo $sql . "<br>" . $error->getMessage();
    }
    return ($conn);
  }

  function create_db($conn)
  {
    $sql  = "CREATE DATABASE IF NOT EXISTS accounts";
    if ($conn->query($sql))
    {
      $_SESSION['dbname'] = true;
      echo "Database created successfully<br>";
      header("Location: main.php");
    }
    else {
      echo "couldn't create DATABASE<br>";
    }
    $conn = null;
  }

}
$DB_DSN = "mysql:host=127.0.0.1;dbname=";
$DB_USER = "root";
$DB_PASSWORD = "wethinkcode";
$start = new Database($DB_DSN, $DB_USER, $DB_PASSWORD);
$conn = $start->server_connect();
$start->create_db($conn);

?>
