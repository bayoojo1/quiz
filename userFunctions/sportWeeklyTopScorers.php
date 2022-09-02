<?php
include("../admin/php_includes/mysqli_connect.php");
// Get the top scorers
$result = '';
$sql = "SELECT mobile, sum(total) FROM sport_answers_weekly WHERE WEEK(quiz_date)=WEEK(CURDATE()) GROUP BY mobile ORDER BY sum(total) DESC LIMIT 3";
$stmt = $db_connect->prepare($sql);
$stmt->execute();
if($stmt->rowCount() > 0) {

  $result .= "<table style='width:100%;'>";
        $result .= "<thead style='border: 1px solid gray; background-color:#004080;'>";
        $result .= "<tr>";
            $result .= "<th width='70%'; style='border: 1px solid gray; color:white;'>Mobile</th>";
            $result .= "<th width='30%'; style='border: 1px solid gray; color:white;'>Score</th>";
        $result .= "</tr>";
        $result .= "</thead>";

foreach($stmt->fetchAll() as $row) {
  $mobile = $row['0'];
  $total = $row['1'];
// Mask part of the mobile number
$phone_number = '******' . substr( $mobile, - 4);
$result .= "<tbody>";
  $result .= "<tr>";
      $result .= "<td style='text-align:center; border: 1px solid gray; color:gray;'>" . $phone_number . "</td>";
      $result .= "<td style='text-align:center; border: 1px solid gray; color:gray;'>" . $total . "</td>";
  $result .= "</tr>";
  $result .= "</tbody>";
  }
$result .= "</table>";
}
?>
