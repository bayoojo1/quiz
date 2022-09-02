<?php
include("../admin/php_includes/mysqli_connect.php");
// Get the top scorers
$sql = "SELECT mobile, score FROM general_weekly_top_ten ORDER BY id DESC LIMIT 3";
$stmt = $db_connect->prepare($sql);
$stmt->execute();

foreach($stmt->fetchAll() as $row) {
  $mobile = $row['0'];
  $score = $row['1'];
// Mask part of the mobile number
//$phone_number = '******' . substr( $mobile, - 4);
echo $mobile;
echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
echo $score;
echo '<br>';
}
?>
