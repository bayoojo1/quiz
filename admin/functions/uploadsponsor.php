<?php
include_once("../php_includes/mysqli_connect.php");
if(isset($_FILES["sponsorUpload"])) {
  $sponsor_uploadDir = '/wamp64/www/quiz/images/sponsors/';
  $sponsor_fileName = $_FILES["sponsorUpload"]["name"];
  $sponsor_fileTmpLoc = $_FILES["sponsorUpload"]["tmp_name"];
  $sponsor_fileType = $_FILES["sponsorUpload"]["type"];
  $sponsor_fileSize = $_FILES["sponsorUpload"]["size"];
  $sponsor_fileErrorMsg = $_FILES["sponsorUpload"]["error"];
  $sponsor_fileExt = pathinfo($_FILES['sponsorUpload']['name'], PATHINFO_EXTENSION);
  $sourceProperties = getimagesize($sponsor_fileTmpLoc);
  if($sourceProperties[0] < 150 || $sourceProperties[1] < 80){
      header("location: ../message.php?msg=ERROR: That image is below recommended dimension");
      exit();
  }
  $imageType = $sourceProperties[2];

  $num = 1;
  $id = 0;
  // Check the last insert id of sponsor url in the db
  $sql = "SELECT id FROM sponsors ORDER BY id DESC LIMIT 1";
  $stmt = $db_connect->prepare($sql);
  $stmt->execute();

  foreach($stmt->fetchAll() as $row) {
    $id = $row['0'];
  }
  $newid = $id + $num;

  $sponsor_fileNewname = 'sponsor';
  $sponsor_db_file_name = $sponsor_uploadDir.$sponsor_fileNewname.'.'.$sponsor_fileExt;
  $sponsor_img_realName = 'sponsor'.$newid.'.'.$sponsor_fileExt;

  if(!$sponsor_fileTmpLoc) {
      echo "<span style='color:red; font-weight:bold;'>ERROR: You need to upload your sample .wav file.</span>";
      exit();
  } else if ($sponsor_fileSize > 1048576) {
      echo "<span style='color:red; font-weight:bold;'>ERROR: Your audio file is larger than 1mb.</span>";
      exit();
  } else if (!preg_match("/\.(gif|jpg|png|jpeg)$/i", $sponsor_fileName) ) {
      echo "<span style='color:red; font-weight:bold;'>ERROR: Your file is not .wav type.</span>";
      exit();
  } else if ($sponsor_fileErrorMsg == 1) {
      echo "<span style='color:red; font-weight:bold;'>ERROR: An unknown error occurred.</span>";
      exit();
  }

  switch ($imageType) {

      case IMAGETYPE_PNG:
          $imageResourceId = imagecreatefrompng($sponsor_fileTmpLoc);
          $targetLayer = imageResize($imageResourceId,$sourceProperties[0],$sourceProperties[1]);
          imagepng($targetLayer,$sponsor_uploadDir . $sponsor_img_realName);
          break;

      case IMAGETYPE_GIF:
          $imageResourceId = imagecreatefromgif($sponsor_fileTmpLoc);
          $targetLayer = imageResize($imageResourceId,$sourceProperties[0],$sourceProperties[1]);
          imagegif($targetLayer,$sponsor_uploadDir . $sponsor_img_realName);
          break;

      case IMAGETYPE_JPEG:
          $imageResourceId = imagecreatefromjpeg($sponsor_fileTmpLoc);
          $targetLayer = imageResize($imageResourceId,$sourceProperties[0],$sourceProperties[1]);
          imagejpeg($targetLayer,$sponsor_uploadDir . $sponsor_img_realName);
          break;

      default:
          echo "Invalid Image type.";
          exit;
          break;
  }

// Gather the remaining posted variables
if(isset($_POST['sponsordesc']) && !empty($_POST['sponsordesc'])) {
  $sponsordesc = preg_replace('#[^a-z0-9,. ]#i', '', $_POST['sponsordesc']);
  $sponsorurl = preg_replace('#[^-:a-z0-9,.\/]#i', '', $_POST['sponsorurl']);
}

// Move uploaded file to the final directories
$moveResult = move_uploaded_file($sponsor_fileTmpLoc, $sponsor_db_file_name);
if ($moveResult != true) {
    echo "<span style='color:red; font-weight:bold;'>ERROR: File upload failed.</span>";
    unlink($sponsor_fileTmpLoc);
    exit();
  }
// Set the filepath to be sent to the db
$db_file_ur = 'images/sponsors/'.$sponsor_img_realName;
// Delete the original image file
$picurl = $sponsor_db_file_name;
unlink($picurl);

// Insert details into the database
$stmt = $db_connect->prepare("INSERT INTO sponsors (sponsorsimg, sponsorsUrl, description)
VALUES(:sponsorsimg, :sponsorsUrl, :description)");
if($stmt->execute(array(':sponsorsimg' => $db_file_ur, ':sponsorsUrl' => $sponsorurl, ':description' => $sponsordesc))) {
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
