<?php
include_once("../php_includes/mysqli_connect.php");
if (isset($_GET["status"])){
    $status = $_GET["status"];
}
if($status == "Save"){
  $id = $_GET['id'];
  $value = $_GET['value'];

  if(strpos($id, 'winner_') !== false) {
      $actual_id = explode("_", $id)[1];
      $sql = "UPDATE winners SET description=:value WHERE id=:id";
      $stmt = $db_connect->prepare($sql);
      $stmt->bindParam(':value', $value, PDO::PARAM_STR);
      $stmt->bindParam(':id', $actual_id, PDO::PARAM_STR);
      $stmt->execute();
      $db_connect = null;
  } else if(strpos($id, 'sponsor_') !== false) {
    $actual_id = explode("_", $id)[1];
    $sql = "UPDATE sponsors SET description=:value WHERE id=:id";
    $stmt = $db_connect->prepare($sql);
    $stmt->bindParam(':value', $value, PDO::PARAM_STR);
    $stmt->bindParam(':id', $actual_id, PDO::PARAM_STR);
    $stmt->execute();
    $db_connect = null;
  } else if(strpos($id, 'prize_') !== false) {
    $actual_id = explode("_", $id)[1];
    $sql = "UPDATE prizes SET description=:value WHERE id=:id";
    $stmt = $db_connect->prepare($sql);
    $stmt->bindParam(':value', $value, PDO::PARAM_STR);
    $stmt->bindParam(':id', $actual_id, PDO::PARAM_STR);
    $stmt->execute();
    $db_connect = null;
  }
}
?>
