<?php
include("../admin/php_includes/mysqli_connect.php");
// Get the top scorers
$sql = "SELECT mobile, sum(total) FROM users_weekly WHERE WEEK(quiz_date)=WEEK(CURDATE()) AND total != 0 GROUP BY mobile ORDER BY sum(total) DESC LIMIT 3";
$stmt = $db_connect->prepare($sql);
$stmt->execute();

foreach($stmt->fetchAll() as $row) {
  $mobile = $row['0'];
  $total = $row['1'];

// Insert this detail into the corresponding table in the db
$stmt = $db_connect->prepare("INSERT INTO general_weekly_top_ten (mobile, score, record_date)
VALUES(:mobile, :score, now())");
$stmt->execute(array(':mobile' => $mobile, ':score' => $total));
}
?>
