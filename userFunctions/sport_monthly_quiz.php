<?php
include("../admin/php_includes/mysqli_connect.php");
if(isset($_POST['mobile'])) {
  $mobile = preg_replace('#[^0-9]#i', '', $_POST['mobile']);
}
// Get the top scorers
$sql = "SELECT sum(total) FROM sport_answers WHERE mobile LIKE :mobile AND MONTH(quiz_date)=MONTH(CURDATE())";
$stmt = $db_connect->prepare($sql);
$stmt->bindValue(':mobile', '%'.$mobile, PDO::PARAM_STR);
$stmt->execute();
foreach($stmt->fetchAll() as $row) {
    $total = $row['0'];
    }
  echo $total;
?>
