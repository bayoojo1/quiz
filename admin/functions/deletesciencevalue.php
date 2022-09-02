<?php
include("../php_includes/check_login_status.php");
// Gather the variables from ajax
if(isset($_POST['realID'])){
    $id = $_POST['realID'];
}
// Get the audio url from the db
$sql = "SELECT web_url FROM sciences WHERE id=:id LIMIT 1";
$stmt = $db_connect->prepare($sql);
$stmt->bindParam(':id', $id, PDO::PARAM_STR);
$stmt->execute();
$row = $stmt->fetch();
$audioUrl = $row[0];
// Get the filename from the url
$filename = basename($audioUrl);
// Delete the image
$sql = "DELETE FROM sciences WHERE id=:id";
$stmt = $db_connect->prepare($sql);
$stmt->bindParam(':id', $id, PDO::PARAM_STR);
$stmt->execute();
// Delete the image from the folder
unlink("../../../quiz/questions/sciences/$filename");
?>
