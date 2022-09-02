<?php
if($user_ok != true || $log_username == ""){
    header("location: http://localhost:8080/quiz/index.php");
    exit();
}
$paginationCtrls = '<span>';
// Select required data from the quiz table
$sql = "SELECT * FROM prizes ORDER BY id DESC";
$stmt = $db_connect->prepare($sql);
$stmt->execute();
$count = $stmt->rowCount();
// Specify how many result per page
$rpp = '20';
// This tells us the page number of the last page
$last = ceil($count/$rpp);
// This makes sure $last cannot be less than 1
if($last < 1){
    $last = 1;
}
// Define page number
$pn = "1";

// Get pagenum from URL vars if it is present, else it is = 1
if(isset($_GET['pn'])){
    $pn = preg_replace('#[^0-9]#', '', $_GET['pn']);
}

// Make the script run only if there is a page number posted to this script

// This makes sure the page number isn't below 1, or more than our $last page
if ($pn < 1) {
    $pn = 1;
} else if ($pn > $last) {
$pn = $last;
}

// This sets the range of rows to query for the chosen $pn
$limit = 'LIMIT ' .($pn - 1) * $rpp .',' .$rpp;
// This is the query again, it is for grabbing just one page worth of rows by applying $limit
$sql = "$sql"." $limit";
$stmt = $db_connect->prepare($sql);
$stmt->execute();
if($count > 0){
  //$paginationCtrls .= '<div class="col-sm-9">';
  $paginationCtrls .= '<ul class="pagination">';
  if($last != 1){
      /* First we check if we are on page one. If we are then we don't need a link to
         the previous page or the first page so we do nothing. If we aren't then we
         generate links to the first page, and to the previous page. */
      if ($pn > 1) {
          $previous = $pn - 1;
          $paginationCtrls .= '<li><a href="'.$_SERVER['PHP_SELF'].'?u='.$log_username.'&pn='.$previous.'">Previous</a></li> &nbsp; &nbsp;';
          // Render clickable number links that should appear on the left of the target page number
          for($i = $pn-4; $i < $pn; $i++){
              if($i > 0){
                  $paginationCtrls .= '<li><a href="'.$_SERVER['PHP_SELF'].'?u='.$log_username.'&pn='.$i.'">'.$i.'</a></li> &nbsp;';
              }
          }
      }
      // Render the target page number, but without it being a link
      $paginationCtrls .= '<li class="active"><a href="#">'.$pn.'</a></li> &nbsp; ';
      // Render clickable number links that should appear on the right of the target page number
      for($i = $pn+1; $i <= $last; $i++){
          $paginationCtrls .= '<li><a href="'.$_SERVER['PHP_SELF'].'?u='.$log_username.'&pn='.$i.'">'.$i.'</a></li> &nbsp;';
          if($i >= $pn+4){
              break;
          }
      }
      // This does the same as above, only checking if we are on the last page, and then generating the "Next"
      if ($pn != $last) {
          $next = $pn + 1;
          $paginationCtrls .= ' &nbsp; &nbsp; <li><a href="'.$_SERVER['PHP_SELF'].'?u='.$log_username.'&pn='.$next.'">Next</a></li>';
      }
  }
  $paginationCtrls .= '</ul>';
  $paginationCtrls .= '</span>';

  $resultpage = '<div class="container text-center" style="margin-top:10px;">';
  foreach($stmt->fetchAll(PDO::FETCH_ASSOC) as $row) {
    $id = $row['id'];
    $prizeimg = $row['prizesimg'];
    $description = $row['description'];
    // Get the filename from the filepath
    $prizeImgFileName = pathinfo($prizeimg, PATHINFO_BASENAME);

    $resultpage .= '<div class="col-sm-6 col-sm-offset-3">';
    $resultpage .= '<div class="panel panel-default optionals">';
    $resultpage .= '<div id="prize_'.$id.'" class="panel-heading opt-heading">';
    $resultpage .= $description;
    $resultpage .= '</div>';
    $resultpage .= '<div class="panel-body pbody">';
    $resultpage .= '<img src="../images/prizes/'.$prizeImgFileName.'" alt="Image" class="img-responsive center-block">';
    $resultpage .= '</div>';
    $resultpage .= '<div class="panel-footer pfooter">';
    $resultpage .= '<button type="button" id="editprize" class="btn btn-success btn-sm" onclick="editprize(this);">Edit Description</button>';
    $resultpage .= '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
    $resultpage .= '<button type="button" id="saveprize" style="visibility:hidden" class="btn btn-success btn-sm" onclick="save(this);">Save</button>';
    $resultpage .= '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
    $resultpage .= '<button type="button" id="deleteprize" style="visibility:visible" class="btn btn-success btn-sm" onclick="deleteBanner(this);">Delete Prize Banner</button>';
    $resultpage .= '</div>';
    $resultpage .= '</div>';
    $resultpage .= '</div>';
  }
  $resultpage .= '</div>';
  echo $paginationCtrls;
  echo $resultpage;
}
?>
