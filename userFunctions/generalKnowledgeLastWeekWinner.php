<?php
include("../admin/php_includes/mysqli_connect.php");
// Get the top scorers
$result = '';
$sql = "SELECT mobile, score FROM general_weekly_top_ten ORDER BY id DESC LIMIT 3";
$stmt = $db_connect->prepare($sql);
$stmt->execute();
if($stmt->rowCount() > 0) {

$result .= "<table style='width:100%; margin-top:-5px;'>";
foreach($stmt->fetchAll() as $row) {
  $mobile = $row['0'];
  $score = $row['1'];
// Mask part of the mobile number
$phone_number = '******' . substr( $mobile, - 4);
$result .= "<tbody>";
  $result .= "<tr>";
      $result .= "<td style='text-align:center; font-weight:bold; color:gray;'>" . $phone_number . "</td>";
      $result .= "<td style='text-align:left; font-weight:bold; color:gray;'>" . $score . "</td>";
  $result .= "</tr>";
  $result .= "</tbody>";
  }
$result .= "</table>";
}
echo $result;
?>
