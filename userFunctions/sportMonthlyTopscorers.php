<?php
include("../admin/php_includes/mysqli_connect.php");
// Get the top scorers
$sql = "SELECT mobile, sum(total) FROM sport_answers WHERE MONTH(quiz_date)=MONTH(CURDATE()) GROUP BY mobile ORDER BY sum(total) DESC LIMIT 3";
$stmt = $db_connect->prepare($sql);
$stmt->execute();

foreach($stmt->fetchAll() as $row) {
  $mobile = $row['0'];
  $total = $row['1'];
// Mask part of the mobile number
$phone_number = '******' . substr( $mobile, - 4);
echo $phone_number;
echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
echo $total;
echo '<br>';
}
?>
