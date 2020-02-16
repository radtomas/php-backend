<?php
class Inset {
  private $conn;
  private $table_name = "inset";

  public $id;
  public $title;
  public $content;

  public function __construct($db) {
    $this->conn = $db;
  }

  function read() {
    $query = "SELECT id, title, content FROM " . $this->table_name;

    $stmt = $this->conn->prepare($query);
    $stmt->execute();
    return $stmt;
  }
}
?>
