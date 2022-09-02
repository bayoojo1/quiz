<?php
include_once("../php_includes/mysqli_connect.php");
if(isset($_FILES["prizesUpload"])) {
  $prize_uploadDir = '/wamp64/www/quiz/images/prizes/';
  $prize_fileName = $_FILES["prizesUpload"]["name"];
  $prize_fileTmpLoc = $_FILES["prizesUpload"]["tmp_name"];
  $prize_fileType = $_FILES["prizesUpload"]["type"];
  $prize_fileSize = $_FILES["prizesUpload"]["size"];
  $prize_fileErrorMsg = $_FILES["prizesUpload"]["error"];
  $prize_fileExt = pathinfo($_FILES['prizesUpload']['name'], PATHINFO_EXTENSION);
  $sourceProperties = getimagesize($prize_fileTmpLoc);
  if($sourceProperties[0] < 150 || $sourceProperties[1] < 80){
      header("location: ../message.php?msg=ERROR: That image is below recommended dimension");
      exit();
  }
  $imageType = $sourceProperties[2];

  $num = 1;
  $id = 0;
  // Check the last insert id of sponsor url in the db
  $sql = "SELECT id FROM prizes ORDER BY id DESC LIMIT 1";
  $stmt = $db_connect->prepare($sql);
  $stmt->execute();

  foreach($stmt->fetchAll() as $row) {
    $id = $row['0'];
  }
  $newid = $id + $num;

  $prize_fileNewname = 'prize';
  $prize_db_file_name = $prize_uploadDir.$prize_fileNewname.'.'.$prize_fileExt;
  $prize_img_realName = 'prize'.$newid.'.'.$prize_fileExt;

  if(!$prize_fileTmpLoc) {
      echo "<span style='color:red; font-weight:bold;'>ERROR: You need to upload your sample .wav file.</span>";
      exit();
  } else if ($prize_fileSize > 1048576) {
      echo "<span style='color:red; font-weight:bold;'>ERROR: Your audio file is larger than 1mb.</span>";
      exit();
  } else if (!preg_match("/\.(gif|jpg|png|jpeg)$/i", $prize_fileName) ) {
      echo "<span style='color:red; font-weight:bold;'>ERROR: Your file is not .wav type.</span>";
      exit();
  } else if ($prize_fileErrorMsg == 1) {
      echo "<span style='color:red; font-weight:bold;'>ERROR: An unknown error occurred.</span>";
      exit();
  }

  switch ($imageType) {

      case IMAGETYPE_PNG:
          $imageResourceId = imagecreatefrompng($prize_fileTmpLoc);
          $targetLayer = imageResize($imageResourceId,$sourceProperties[0],$sourceProperties[1]);
          imagepng($targetLayer,$prize_uploadDir . $prize_img_realName);
          break;

      case IMAGETYPE_GIF:
          $imageResourceId = imagecreatefromgif($prize_fileTmpLoc);
          $targetLayer = imageResize($imageResourceId,$sourceProperties[0],$sourceProperties[1]);
          imagegif($targetLayer,$prize_uploadDir . $prize_img_realName);
          break;

      case IMAGETYPE_JPEG:
          $imageResourceId = imagecreatefromjpeg($prize_fileTmpLoc);
          $targetLayer = imageResize($imageResourceId,$sourceProperties[0],$sourceProperties[1]);
          imagejpeg($targetLayer,$prize_uploadDir . $prize_img_realName);
          break;

      default:
          echo "Invalid Image type.";
          exit;
          break;
  }

// Gather the remaining posted variables
if(isset($_POST['prizesdesc']) && !empty($_POST['prizesdesc'])) {
  $prizedesc = preg_replace('#[^a-z0-9,. ]#i', '', $_POST['prizesdesc']);
}

// Move uploaded file to the final directories
$moveResult = move_uploaded_file($prize_fileTmpLoc, $prize_db_file_name);
if ($moveResult != true) {
    echo "<span style='color:red; font-weight:bold;'>ERROR: File upload failed.</span>";
    unlink($prize_fileTmpLoc);
    exit();
  }
// Set the filepath to be sent to the db
$db_file_ur = 'images/prizes/'.$prize_img_realName;
// Delete the original image file
$picurl = $prize_db_file_name;
unlink($picurl);

// Insert details into the database
$stmt = $db_connect->prepare("INSERT INTO prizes (prizesimg, description)
VALUES(:prizesimg, :description)");
if($stmt->execute(array(':prizesimg' => $db_file_ur, ':description' => $prizedesc))) {
  echo "<span style='color:green; font-weight:bold;'>Sponsor's banner successfully uploaded.</span>";
  }
}
function imageResize($imageResourceId,$width,$height) {

    $targetWidth = 260;
    $targetHeight = 180;

    $targetLayer=imagecreatetruecolor($targetWidth,$targetHeight);
    imagecopyresampled($targetLayer,$imageResourceId,0,0,0,0,$targetWidth,$targetHeight, $width,$height);


    return $targetLayer;
}
?>
