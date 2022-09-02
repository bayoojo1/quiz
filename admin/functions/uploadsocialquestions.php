<?php
include_once("../php_includes/mysqli_connect.php");
if(isset($_FILES["socialaudio"])) {
  $question_uploadDir = '/wamp64/www/quiz/questions/social/';
  $question_fileName = $_FILES["socialaudio"]["name"];
  $question_fileTmpLoc = $_FILES["socialaudio"]["tmp_name"];
  $question_fileType = $_FILES["socialaudio"]["type"];
  $question_fileSize = $_FILES["socialaudio"]["size"];
  $question_fileErrorMsg = $_FILES["socialaudio"]["error"];
  $kaboom = explode(".", $question_fileName);
  $question_fileExt = end($kaboom);

  $num = 1;
  $id = 0;
  // Check the last insert id of questions audio files in the db
  $sql = "SELECT id FROM social ORDER BY id DESC LIMIT 1";
  $stmt = $db_connect->prepare($sql);
  $stmt->execute();

  foreach($stmt->fetchAll() as $row) {
    $id = $row['0'];
  }
  $newid = $id + $num;

  $question_file_name = 'socialqustn'.$newid.'.'.$question_fileExt;
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
if(isset($_POST['socialanswer']) && !empty($_POST['socialanswer'])) {
  $answer = preg_replace('#[^1-4]#i', '', $_POST['socialanswer']);
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
$web_url = '../../quiz/questions/social/'.''.$question_file_name;
//$asterisk_url = '/var/www/answerfive/html/questions/social/qustn'.''.$newid;
$asterisk_url = $question_uploadDir.'socialqustn'.$newid;

// Insert details into the database
$stmt = $db_connect->prepare("INSERT INTO social (web_url, asterisk_url, answer)
VALUES(:web_url, :asterisk_url, :answer)");
if($stmt->execute(array(':web_url' => $web_url, ':asterisk_url' => $asterisk_url, ':answer' => $answer))) {
  echo "<span style='color:green; font-weight:bold;'>Question successfully uploaded.</span>";
  }
}
?>
