<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

include_once '../config/database.php';
include_once '../objects/inset.php';

$database = new Database();
$db = $database->getConnection();

$inset = new Inset($db);

$stmt = $inset->read();
$num = $stmt->rowCount();

if ($num > 0) {
  $inset_arr = array();
  $inset_arr["records"] = array();

  while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    extract($row);

    $inset_item = array(
      "id" => $id,
      "title" => $title,
      "content" => $content
    );

    array_push($inset_arr["records"], $inset_item);
  }

  http_response_code(200);
  echo json_encode($inset_arr);
} else {
  http_response_code(404);
  echo json_encode(array("message" => "No insets found."));
}
?>
