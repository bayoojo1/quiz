<?php
include_once("../php_includes/mysqli_connect.php");
if(isset($_FILES["sportaudio"])) {
  $question_uploadDir = '/wamp64/www/quiz/questions/sport/';
  $question_fileName = $_FILES["sportaudio"]["name"];
  $question_fileTmpLoc = $_FILES["sportaudio"]["tmp_name"];
  $question_fileType = $_FILES["sportaudio"]["type"];
  $question_fileSize = $_FILES["sportaudio"]["size"];
  $question_fileErrorMsg = $_FILES["sportaudio"]["error"];
  $kaboom = explode(".", $question_fileName);
  $question_fileExt = end($kaboom);

  $num = 1;
  $id = 0;
  // Check the last insert id of questions audio files in the db
  $sql = "SELECT id FROM sport ORDER BY id DESC LIMIT 1";
  $stmt = $db_connect->prepare($sql);
  $stmt->execute();

  foreach($stmt->fetchAll() as $row) {
    $id = $row['0'];
  }
  $newid = $id + $num;

  $question_file_name = 'sportqustn'.$newid.'.'.$question_fileExt;
  $question_db_file_name = $question_uploadDir . $question_file_name;

  if(!$question_fileTmpLoc) {
      echo "<span style='color:red; font-weight:bold;'>ERROR: You need to upload your sample .wav file.</span>";
      exit();
  } else if ($question_fileSize > 1048576) {
      echo "<span style='color:red; font-weight:bold;'>ERROR: Your audio file is larger than 1mb.</span>";
      exit();
  } else if (!preg_match("/\.(wav)$/i", $question_fileName) ) {
      echo "<span style='color:red; font-weight:bold;'>ERROR: Your file is not .wav type.</span>";
      exit();
  } else if ($question_fileErrorMsg == 1) {
      echo "<span style='color:red; font-weight:bold;'>ERROR: An unknown error occurred.</span>";
      exit();
  }

// Gather the remaining posted variables
if(isset($_POST['sportanswer']) && !empty($_POST['sportanswer'])) {
  $answer = preg_replace('#[^1-4]#i', '', $_POST['sportanswer']);
}
// Ensure answer doesn't have any digit other than 1 to 4
if (!preg_match('/^[1234]$/', $answer)) {
        echo "<span style='color:red; font-weight:bold;'>Answer must be a single digit between 1 to 4</span>";
        exit();
}

// Move uploaded file to the final directories
$moveResult = move_uploaded_file($question_fileTmpLoc, $question_db_file_name);
if ($moveResult != true) {
    echo "<span style='color:red; font-weight:bold;'>ERROR: File upload failed.</span>";
    exit();
  }
// Set the filepath to be sent to the db
$db_file_ur = '../../quiz/questions/sport/'.''.$question_file_name;
$asterisk_url = '/var/www/answerfive/html/questions/general/qustn'.''.$newid;
$asterisk_url = $question_uploadDir.'qustn'.$newid;

// Insert details into the database
$stmt = $db_connect->prepare("INSERT INTO sport (question, answer)
VALUES(:question, :answer)");
if($stmt->execute(array(':question' => $db_file_ur, ':answer' => $answer))) {
  echo "<span style='color:green; font-weight:bold;'>Question successfully uploaded.</span>";
  }
}
?>
