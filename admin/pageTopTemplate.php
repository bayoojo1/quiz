<?php
include_once("php_includes/check_login_status.php");
include("php_includes/mysqli_connect.php");

$loginLink = '<ul class="nav navbar-nav navbar-right">
<li class="active"><a id="Home" href="#"><b>HOME</b></a></li>
</ul>';
if($user_ok == true) {
  $loginLink = '<ul class="nav navbar-nav navbar-right">';
  $loginLink .= '<li><a id="adminhome" href="admin.php?u='.$log_username.'"><b>HOME</b></a></li>';
  $loginLink .=  '<li class="dropdown">';
  $loginLink .= '<a id="quizmgt" class="dropdown-toggle" data-toggle="dropdown" href="#"><b>Quiz Management</b> <span class="caret"></span></a>';
  $loginLink .= '<ul class="dropdown-menu">';
  $loginLink .= '<li><a href="quiz.php?u='.$log_username.'">General Knowledge</a></li>';
  $loginLink .= '<li><a href="sport.php?u='.$log_username.'">Sports</a></li>';
  $loginLink .= '<li><a href="sciences.php?u='.$log_username.'">Sciences</a></li>';
  $loginLink .= '<li><a href="social.php?u='.$log_username.'">Arts</a></li>';
  $loginLink .= '<li><a href="commercial.php?u='.$log_username.'">Commercial</a></li>';
  $loginLink .= '</ul>';
  $loginLink .= '</li>';
  $loginLink .= '<li><a id="sponsormgt" href="sponsor.php?u='.$log_username.'"><b>Sponsor Management</b></a></li>';
  $loginLink .= '<li><a id="prizemgt" href="prize.php?u='.$log_username.'"><b>Prize Management</b></a></li>';
  $loginLink .= '<li class="dropdown">';
  $loginLink .= '<a id="winnermgt" class="dropdown-toggle" data-toggle="dropdown" href="#"><b>Winners Management</b> <span class="caret"></span></a>';
  $loginLink .= '<ul class="dropdown-menu">';
  $loginLink .= '<li><a href="winner.php?u='.$log_username.'">Upload Winners Picture</a></li>';
  $loginLink .= '<li><a href="winnerslist.php?u='.$log_username.'">Last Winners List</a></li>';
  $loginLink .= '</ul>';
  $loginLink .= '</li>';
  $loginLink .= '<li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>';
}
?>
<nav class="navbar navbar-inverse navbar-fixed-top"  style="background-color:black;">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
        <a class="navbar-left" href="#"></a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <?php
            echo $loginLink;
       ?>
    </div>
  </div>
</nav>
