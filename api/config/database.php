<?php
class Database {
  private $host;
  private $db_name;
  private $username;
  private $password;
  public $conn;

  function __construct() {
    $this->host = getenv("database_host");
    $this->db_name = getenv("database_name");
    $this->username = getenv("database_username");
    $this->password = getenv("database_password");
  }

  public function getConnection() {
    $this->conn = null;

    try {
      $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db_name, $this->username, $this->password);
      $this->conn->exec("set names utf8");
    } catch(PDOException $exception) {
      echo "Connection error: " . $exception->getMessage();
    }

    return $this->conn;
  }
}
?>
