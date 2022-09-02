<?php
include("../admin/php_includes/mysqli_connect.php");
// Get the top scorers
$sql = "SELECT mobile, sum(total) FROM sport_answer_weekly WHERE WEEK(quiz_date)=WEEK(CURDATE()) GROUP BY mobile ORDER BY sum(total) DESC LIMIT 20";
$stmt = $db_connect->prepare($sql);
$stmt->execute();

foreach($stmt->fetchAll() as $row) {
  $mobile = $row['0'];
  $total = $row['1'];

// Insert this detail into the corresponding table in the db
$stmt = $db_connect->prepare("INSERT INTO sports_weekly_top_ten (mobile, score, record_date)
VALUES(:mobile, :score, now())");
$stmt->execute(array(':mobile' => $mobile, ':score' => $total))
}
?>
