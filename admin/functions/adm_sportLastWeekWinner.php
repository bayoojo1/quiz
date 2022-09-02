<?php
include("../php_includes/mysqli_connect.php");
// Get the top scorers
$sql = "SELECT mobile, score FROM sports_weekly_top_ten ORDER BY id DESC LIMIT 10";
$stmt = $db_connect->prepare($sql);
$stmt->execute();

foreach($stmt->fetchAll() as $row) {
  $mobile = $row['0'];
  $score = $row['1'];
echo $mobile;
echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
echo $score;
echo '<br>';
}
?>
