<?php
include_once("../php_includes/mysqli_connect.php");
if(isset($_FILES["winnersUpload"])) {
  $winner_uploadDir = '/wamp64/www/quiz/images/winners/';
  $winner_fileName = $_FILES["winnersUpload"]["name"];
  $winner_fileTmpLoc = $_FILES["winnersUpload"]["tmp_name"];
  $winner_fileType = $_FILES["winnersUpload"]["type"];
  $winner_fileSize = $_FILES["winnersUpload"]["size"];
  $winner_fileErrorMsg = $_FILES["winnersUpload"]["error"];
  $winner_fileExt = pathinfo($_FILES['winnersUpload']['name'], PATHINFO_EXTENSION);
  $sourceProperties = getimagesize($winner_fileTmpLoc);
  if($sourceProperties[0] < 150 || $sourceProperties[1] < 80){
      header("location: ../message.php?msg=ERROR: That image is below recommended dimension");
      exit();
  }
  $imageType = $sourceProperties[2];

  $num = 1;
  $id = 0;
  // Check the last insert id of sponsor url in the db
  $sql = "SELECT id FROM winners ORDER BY id DESC LIMIT 1";
  $stmt = $db_connect->prepare($sql);
  $stmt->execute();

  foreach($stmt->fetchAll() as $row) {
    $id = $row['0'];
  }
  $newid = $id + $num;

  $winner_fileNewname = 'winner';
  $winner_db_file_name = $winner_uploadDir.$winner_fileNewname.'.'.$winner_fileExt;
  $winner_img_realName = 'winner'.$newid.'.'.$winner_fileExt;

  if(!$winner_fileTmpLoc) {
      echo "<span style='color:red; font-weight:bold;'>ERROR: You need to upload your sample .wav file.</span>";
      exit();
  } else if ($winner_fileSize > 1048576) {
      echo "<span style='color:red; font-weight:bold;'>ERROR: Your audio file is larger than 1mb.</span>";
      exit();
  } else if (!preg_match("/\.(gif|jpg|png|jpeg)$/i", $winner_fileName) ) {
      echo "<span style='color:red; font-weight:bold;'>ERROR: Your file is not .wav type.</span>";
      exit();
  } else if ($winner_fileErrorMsg == 1) {
      echo "<span style='color:red; font-weight:bold;'>ERROR: An unknown error occurred.</span>";
      exit();
  }

  switch ($imageType) {

      case IMAGETYPE_PNG:
          $imageResourceId = imagecreatefrompng($winner_fileTmpLoc);
          $targetLayer = imageResize($imageResourceId,$sourceProperties[0],$sourceProperties[1]);
          imagepng($targetLayer,$winner_uploadDir . $winner_img_realName);
          break;

      case IMAGETYPE_GIF:
          $imageResourceId = imagecreatefromgif($winner_fileTmpLoc);
          $targetLayer = imageResize($imageResourceId,$sourceProperties[0],$sourceProperties[1]);
          imagegif($targetLayer,$winner_uploadDir . $winner_img_realName);
          break;

      case IMAGETYPE_JPEG:
          $imageResourceId = imagecreatefromjpeg($winner_fileTmpLoc);
          $targetLayer = imageResize($imageResourceId,$sourceProperties[0],$sourceProperties[1]);
          imagejpeg($targetLayer,$winner_uploadDir . $winner_img_realName,100);
          break;

      default:
          echo "Invalid Image type.";
          exit;
          break;
  }

// Gather the remaining posted variables
if(isset($_POST['winnersdesc']) && !empty($_POST['winnersdesc'])) {
  $winnerdesc = preg_replace('#[^a-z0-9,. ]#i', '', $_POST['winnersdesc']);
}

// Move uploaded file to the final directories
$moveResult = move_uploaded_file($winner_fileTmpLoc, $winner_db_file_name);
if ($moveResult != true) {
    echo "<span style='color:red; font-weight:bold;'>ERROR: File upload failed.</span>";
    unlink($winner_fileTmpLoc);
    exit();
  }
// Set the filepath to be sent to the db
$db_file_ur = 'images/winners/'.$winner_img_realName;
// Delete the original image file
$picurl = $winner_db_file_name;
unlink($picurl);

// Insert details into the database
$stmt = $db_connect->prepare("INSERT INTO winners (winnersimg, description)
VALUES(:winnersimg, :description)");
if($stmt->execute(array(':winnersimg' => $db_file_ur, ':description' => $winnerdesc))) {
  echo "<span style='color:green; font-weight:bold;'>Winner's banner successfully uploaded.</span>";
  }
}
function imageResize($imageResourceId,$width,$height) {

    $targetWidth = 260;
    $targetHeight = 180;

    $targetLayer=imagecreatetruecolor($targetWidth,$targetHeight);
    imagecopyresampled($targetLayer,$imageResourceId,0,0,0,0,$targetWidth,$targetHeight, $width,$height);
    imageconvolution($imageResourceId,array(array(-1,-1,-1),array(-1,16,-1),array(-1,-1,-1)),8,0);


    return $targetLayer;
}
?>
