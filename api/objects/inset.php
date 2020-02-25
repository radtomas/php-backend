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

  function create() {
    $query = "INSERT INTO " . $this->table_name . "SET title=:title, content=:content";

    $stmt = $this->conn->prepare($query);
    $this->title = htmlspecialchars(strip_tags($this->name));
    $this->content = htmlspecialchars(strip_tags($this->content));

    $stmt->bindParam(":title", $this->title);
    $stmt->bindParam(":content", $this->content);

    if ($stmt->execute()) {
      return true;
    }
    return false;
  }
}
?>
