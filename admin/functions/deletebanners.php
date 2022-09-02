<?php
include("../php_includes/check_login_status.php");
// Gather the variables from ajax
if(isset($_POST['id'])){
    $id = $_POST['id'];
}
if(strpos($id, 'winner_') !== false) {
  $winner_id = explode("_", $id)[1];
  // Get the banner url from the db
  $sql = "SELECT winnersimg FROM winners WHERE id=:id";
  $stmt = $db_connect->prepare($sql);
  $stmt->bindParam(':id', $winner_id, PDO::PARAM_STR);
  $stmt->execute();
  $row = $stmt->fetch();
  $winnerUrl = $row[0];
  // Get the filename from the url
  $filename = basename($winnerUrl);
  // Delete the image
  $sql = "DELETE FROM winners WHERE id=:id";
  $stmt = $db_connect->prepare($sql);
  $stmt->bindParam(':id', $winner_id, PDO::PARAM_STR);
  $stmt->execute();
  // Delete the image from the folder
  unlink("../../../quiz/images/winners/$filename");
} else if(strpos($id, 'sponsor_') !== false) {
  $sponsor_id = explode("_", $id)[1];
  // Get the banner url from the db
  $sql = "SELECT sponsorsimg FROM sponsors WHERE id=:id";
  $stmt = $db_connect->prepare($sql);
  $stmt->bindParam(':id', $sponsor_id, PDO::PARAM_STR);
  $stmt->execute();
  $row = $stmt->fetch();
  $sponsorUrl = $row[0];
  // Get the filename from the url
  $filename = basename($sponsorUrl);
  // Delete the image
  $sql = "DELETE FROM sponsors WHERE id=:id";
  $stmt = $db_connect->prepare($sql);
  $stmt->bindParam(':id', $sponsor_id, PDO::PARAM_STR);
  $stmt->execute();
  // Delete the image from the folder(Don't unlink sponsor!)
  //unlink("../../../quiz/images/sponsors/$filename");
} else if(strpos($id, 'prize_') !== false) {
  $prize_id = explode("_", $id)[1];
  // Get the banner url from the db
  $sql = "SELECT prizesimg FROM prizes WHERE id=:id";
  $stmt = $db_connect->prepare($sql);
  $stmt->bindParam(':id', $prize_id, PDO::PARAM_STR);
  $stmt->execute();
  $row = $stmt->fetch();
  $prizeUrl = $row[0];
  // Get the filename from the url
  $filename = basename($prizeUrl);
  // Delete the image
  $sql = "DELETE FROM prizes WHERE id=:id";
  $stmt = $db_connect->prepare($sql);
  $stmt->bindParam(':id', $prize_id, PDO::PARAM_STR);
  $stmt->execute();
  // Delete the image from the folder
  unlink("../../../quiz/images/prizes/$filename");
}
?>
