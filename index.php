<?php
include("admin/php_includes/mysqli_connect.php");
// Select the sponsors banners from the db
$sponsorsAds = '';
$sql = "SELECT sponsorsimg, description, sponsorsUrl FROM sponsors ORDER BY RAND()";
$stmt = $db_connect->prepare($sql);
$stmt->execute();
$numrows = $stmt->rowCount();
if($numrows > 0) {

  foreach($stmt->fetchAll(PDO::FETCH_ASSOC) as $row) {
  $sponsorsImg = $row['sponsorsimg'];
  $sponsorsdesc = $row['description'];
  $sponsorsUrl = $row['sponsorsUrl'];

  $sponsorsAds .= '<div>';
  if(isset($sponsorsUrl) && !empty($sponsorsUrl)) {
    $sponsorsAds .= '<a href="'.$sponsorsUrl.'">';
    $sponsorsAds .= '<img src="'.$sponsorsImg.'" class="img-responsive" alt="Image" style="width:90%">';
    $sponsorsAds .= '<p style="color:white;">'.$sponsorsdesc.'</p>';
    $sponsorsAds .= '</a>';
  } else {
    $sponsorsAds .= '<img src="'.$sponsorsImg.'" class="img-responsive" alt="Image" style="width:90%">';
    $sponsorsAds .= '<p style="color:white;">'.$sponsorsdesc.'</p>';
  }
  $sponsorsAds .= '</div>';
  }
} else {
  $sponsorsAds .= '<div>';
    $sponsorsAds .= '<img src="https://placehold.it/260x180?text=SPONSOR 1" class="img-responsive" style="width:90%" alt="Image">';
    $sponsorsAds .= '<p style="color:white;">Sponsor 1</p>';
  $sponsorsAds .= '</div>';
  $sponsorsAds .= '<div>';
    $sponsorsAds .= '<img src="https://placehold.it/260x180?text=SPONSOR 2" class="img-responsive" style="width:90%" alt="Image">';
    $sponsorsAds .= '<p style="color:white;">Sponsor 2</p>';
  $sponsorsAds .= '</div>';
  $sponsorsAds .= '<div>';
    $sponsorsAds .= '<img src="https://placehold.it/260x180?text=SPONSOR 3" class="img-responsive" style="width:90%" alt="Image">';
    $sponsorsAds .= '<p style="color:white;">Sponsor 3</p>';
  $sponsorsAds .= '</div>';
  $sponsorsAds .= '<div>';
    $sponsorsAds .= '<img src="https://placehold.it/260x180?text=SPONSOR 4" class="img-responsive" style="width:90%" alt="Image">';
    $sponsorsAds .= '<p style="color:white;">Sponsor 4</p>';
  $sponsorsAds .= '</div>';
  $sponsorsAds .= '<div>';
    $sponsorsAds .= '<img src="https://placehold.it/260x180?text=SPONSOR 5" class="img-responsive" style="width:90%" alt="Image">';
    $sponsorsAds .= '<p style="color:white;">Sponsor 5</p>';
  $sponsorsAds .= '</div>';
  $sponsorsAds .= '<div>';
    $sponsorsAds .= '<img src="https://placehold.it/260x180?text=SPONSOR 6" class="img-responsive" style="width:90%" alt="Image">';
    $sponsorsAds .= '<p style="color:white;">Sponsor 6</p>';
  $sponsorsAds .= '</div>';
}
// Select the prizes pictures from the db
$prizesDisplay = '';
$sql = "SELECT prizesimg, description FROM prizes ORDER BY RAND()";
$stmt = $db_connect->prepare($sql);
$stmt->execute();
$numrows = $stmt->rowCount();
if($numrows > 0) {

  foreach($stmt->fetchAll(PDO::FETCH_ASSOC) as $row) {
  $prizesImg = $row['prizesimg'];
  $prizesdesc = $row['description'];
  $prizesDisplay .= '<div>';
    $prizesDisplay .= '<img src="'.$prizesImg.'" class="img-responsive" alt="Image" style="width:100%">';
    $prizesDisplay .= '<p style="color:white;">'.$prizesdesc.'</p>';
  $prizesDisplay .= '</div>';
  }
} else {
  $prizesDisplay .= '<div>';
    $prizesDisplay .= '<img src="https://placehold.it/260x180?text=PRICE 1" class="img-responsive" style="width:90%" alt="Image">';
    $prizesDisplay .= '<p style="color:white;">Price 1</p>';
  $prizesDisplay .= '</div>';
  $prizesDisplay .= '<div>';
    $prizesDisplay .= '<img src="https://placehold.it/260x180?text=PRICE 2" class="img-responsive" style="width:90%" alt="Image">';
    $prizesDisplay .= '<p style="color:white;">Price 2</p>';
  $prizesDisplay .= '</div>';
  $prizesDisplay .= '<div>';
    $prizesDisplay .= '<img src="https://placehold.it/260x180?text=PRICE 3" class="img-responsive" style="width:90%" alt="Image">';
    $prizesDisplay .= '<p style="color:white;">Price 3</p>';
  $prizesDisplay .= '</div>';
  $prizesDisplay .= '<div>';
    $prizesDisplay .= '<img src="https://placehold.it/260x180?text=PRICE 4" class="img-responsive" style="width:90%" alt="Image">';
    $prizesDisplay .= '<p style="color:white;">Price 4</p>';
  $prizesDisplay .= '</div>';
  $prizesDisplay .= '<div>';
    $prizesDisplay .= '<img src="https://placehold.it/260x180?text=PRICE 5" class="img-responsive" style="width:90%" alt="Image">';
    $prizesDisplay .= '<p style="color:white;">Price 5</p>';
  $prizesDisplay .= '</div>';
  $prizesDisplay .= '<div>';
    $prizesDisplay .= '<img src="https://placehold.it/260x180?text=PRICE 6" class="img-responsive" style="width:90%" alt="Image">';
    $prizesDisplay .= '<p style="color:white;">Price 6</p>';
  $prizesDisplay .= '</div>';
}
// Select the winners pictures from the db
$winnersDisplay = '';
$sql = "SELECT winnersimg, description FROM winners ORDER BY RAND()";
$stmt = $db_connect->prepare($sql);
$stmt->execute();
$numrows = $stmt->rowCount();
if($numrows > 0) {

  foreach($stmt->fetchAll(PDO::FETCH_ASSOC) as $row) {
  $winnersImg = $row['winnersimg'];
  $winnersdesc = $row['description'];
  $winnersDisplay .= '<div>';
    $winnersDisplay .= '<img src="'.$winnersImg.'" class="img-responsive" alt="Image" style="width:100%">';
    $winnersDisplay .= '<p style="color:white;">'.$winnersdesc.'</p>';
  $winnersDisplay .= '</div>';
  }
} else {
  $winnersDisplay .= '<div>';
    $winnersDisplay .= '<img src="https://placehold.it/260x180?text=WINNER 1" class="img-responsive" style="width:90%" alt="Image">';
    $winnersDisplay .= '<p style="color:white;">Winner 1</p>';
  $winnersDisplay .= '</div>';
  $winnersDisplay .= '<div>';
    $winnersDisplay .= '<img src="https://placehold.it/260x180?text=WINNER 2" class="img-responsive" style="width:90%" alt="Image">';
    $winnersDisplay .= '<p style="color:white;">Winner 2</p>';
  $winnersDisplay .= '</div>';
  $winnersDisplay .= '<div>';
    $winnersDisplay .= '<img src="https://placehold.it/260x180?text=WINNER 3" class="img-responsive" style="width:90%" alt="Image">';
    $winnersDisplay .= '<p style="color:white;">Winner 3</p>';
  $winnersDisplay .= '</div>';
  $winnersDisplay .= '<div>';
    $winnersDisplay .= '<img src="https://placehold.it/260x180?text=WINNER 4" class="img-responsive" style="width:90%" alt="Image">';
    $winnersDisplay .= '<p style="color:white;">Winner 4</p>';
  $winnersDisplay .= '</div>';
  $winnersDisplay .= '<div>';
    $winnersDisplay .= '<img src="https://placehold.it/260x180?text=WINNER 5" class="img-responsive" style="width:90%" alt="Image">';
    $winnersDisplay .= '<p style="color:white;">Winner 5</p>';
  $winnersDisplay .= '</div>';
  $winnersDisplay .= '<div>';
    $winnersDisplay .= '<img src="https://placehold.it/260x180?text=WINNER 6" class="img-responsive" style="width:90%" alt="Image">';
    $winnersDisplay .= '<p style="color:white;">Winner 6</p>';
  $winnersDisplay .= '</div>';
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Quiz Platform</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <link rel="stylesheet" href="slick-master/slick/slick.css">
  <link rel="stylesheet" href="slick-master/slick/slick-theme.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  <script src="slick-master/slick/slick.js"></script>
</head>
<body data-spy="scroll" data-target="#myScrollspy" data-offset="100">

  <div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header text-center">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h1 class="modal-title">AnswerFive</h1>
        <span style="font-size:16px; font-style:italic;">rewarding knowledge</span>
      </div>
      <div class="modal-body">
        <img src="images/winners/lastweekwinners.jpg" style="height:350px; width:100%;" alt="Image" class="img-responsive">
      </div>
    </div>
  </div>
</div>

<nav class="navbar navbar-inverse navbar-fixed-top">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">Logo</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav navbar-right" id="myScrollspy">
        <li class="active"><a id="Home" href="#"><b>HOME</b></a></li>
        <li><a id="Sponsors" href="#sponsors"><b>SPONSORS</b></a></li>
        <li><a id="Prizes" href="#prizes"><b>PRIZES</b></a></li>
        <li><a id="Categories" href="#categories"><b>CATEGORIES</b></a></li>
        <li><a id="How" href="#how"><b>HOWITWORKS</b></a></li>
      </ul>
    </div>
  </div>
</nav>

<div class="container" style="margin-top:80px">
  <div class="row">
    <div class="slider single-item">
      <div >
        <img src="images/welcome.png" style="height:550px; width:100%;" alt="Image" class="img-responsive">
      </div>
      <div class="item">
        <img src="images/howtoplay.png" style="height:550px; width:100%;" alt="Image" class="img-responsive">
      </div>
      <div class="item">
        <img src="images/3seconds.gif" style="height:550px; width:100%;" alt="Image" class="img-responsive">
      </div>
      <div class="item">
        <img src="images/freebies1.jpg" style="height:550px; width:100%;" alt="Image" class="img-responsive">
      </div>
      <div class="item">
        <img src="images/banner4.jpg" style="height:550px; width:100%;" alt="Image" class="img-responsive">
      </div>
    </div>
  </div>
<hr>
<div class="container text-center">
  <div style="margin-bottom:50px;"></div>
  <h3><u>TOP 3 SCORERS</u></h3>
  <br>

  <div class="col-sm-10 col-sm-offset-1 center">


    <div class="col-sm-6" style="text-align:center;">
        <div class="panel panel-default optionals">
          <div class="panel-heading opt-heading" style="font-size:14px; height:50px;">General Knowledge Weekly</div>
          <div class="panel-body pbody topScorers" style="font-size:12px; height:70px;"></div>
        </div>
    </div>
    <div class="col-sm-6" style="text-align:center;">
        <div class="panel panel-default optionals">
          <div class="panel-heading" style="font-size:14px; height:50px; background-color:yellow;">Monthly Stars</div>
          <div class="panel-body pbody generalWeeklyTopScorers" style="font-size:12px; height:70px;"></div>
        </div>
    </div>

    <div class="col-sm-6" style="text-align:center;">
        <div class="panel panel-default optionals">
          <div class="panel-heading opt-heading" style="font-size:14px; height:50px;">Sports Weekly</div>
          <div class="panel-body pbody sportMonthlyTopScorers" style="font-size:12px; height:70px;"></div>
        </div>
    </div>

    <div class="col-sm-6" style="text-align:center;">
        <div class="panel panel-default optionals">
          <div class="panel-heading opt-heading" style="font-size:14px; height:50px; background-color:yellow;">Science Weekly</div>
          <div class="panel-body pbody sportMonthlyTopScorers" style="font-size:12px; height:70px;"></div>
        </div>
    </div>

    <div class="col-sm-6" style="text-align:center;">
        <div class="panel panel-default optionals">
          <div class="panel-heading opt-heading" style="font-size:14px; height:50px;">Art Weekly</div>
          <div class="panel-body pbody sportWeeklyTopScorers" style="font-size:12px; height:70px;"></div>
        </div>
    </div>

    <div class="col-sm-6" style="text-align:center;">
        <div class="panel panel-default optionals">
          <div class="panel-heading opt-heading" style="font-size:14px; height:50px;">Commercial Weekly</div>
          <div class="panel-body pbody sportWeeklyTopScorers" style="font-size:12px; height:70px;"></div>
        </div>
    </div>
    <div class="col-sm-6" style="text-align:center;">
        <div class="panel panel-default optionals">
          <div class="panel-heading" style="font-size:14px; height:50px; background-color:yellow;">Weekly Stars</div>
          <div class="panel-body pbody sportWeeklyTopScorers" style="font-size:12px; height:70px;"></div>
        </div>
    </div>

  </div>

</div>
</div>

<div id="sponsors" class="container text-center">
  <div style="margin-bottom:50px;"></div>
  <h3><u>OUR SPONSORS</u></h3>
  <br>
  <div class="slider demo">
    <?php echo $sponsorsAds; ?>
  </div>
</div>

<div id="prizes" class="container text-center">
  <div style="margin-bottom:30px;"></div>
  <hr>
  <h3><u>PRIZES</u></h3>
  <br>
  <div class="row slide one-time">
    <?php echo $prizesDisplay; ?>
  </div>
</div><br>

<div id="categories" class="container text-center">
  <div style="margin-bottom:30px;"></div>
  <hr>
  <h3><u>CATEGORIES</u></h3>
  <br>
  <div class="col-sm-8 col-sm-offset-2">
    <div class="panel panel-default optionals">
      <div class="panel-heading opt-heading"><b>Score Checker</b></div>
      <div class="panel-body pbody" style="height:250px;">
        <div class="well" style="font-family:cursive;">
        Weekly quiz line: <b>014400058</b><br>
        <!--Monthly quiz line: <b>014400067</b>-->
        </div>
      </div>
      <div class="panel-footer">
        <form>
          <div class="input-group">
            <span class="input-group-addon"><i class="glyphicon glyphicon-phone"></i></span>
            <input type="text" class="form-control" id="mobile" name="mobile" placeholder="Enter your mobile number.." required>
          </div>
          <div style="margin-bottom:5px;"></div>
            <select class="form-control" id="category">
              <option selected disabled>Drop down to select your category:</option>
              <option value="gkweekly">General Knowledge Weekly Quiz</option>
              <option value="gkmonthly" disabled>General Knowledge Monthly Quiz</option>
              <option value="sportweekly">Sports Weekly Quiz</option>
              <option value="sportmonthly" disabled>Sports Monthly Quiz</option>
            </select>
        </form>
        <br>
        <button type="button" class="btn btn-primary btn-xs" id="scorebtn">Check Score</button>
        <div id="Result"></div>
        <br>
      </div>
    </div>
  </div>
  <br>
</div>




<div id="categories" class="container text-center">
  <div style="margin-bottom:30px;"></div>
  <hr>
  <h3><u>QUICK QUIZ</u></h3>
  <br>
  <div class="col-sm-8 col-sm-offset-2">
    <div class="panel panel-default optionals">
      <div class="panel-heading opt-heading"><b>Test Yourself</b></div>
      <div class="panel-body pbody">
        <img src="images/ocq.jpg" style="height:550px; width:100%;" alt="Image" class="img-responsive">
        </div>
      </div>
    </div>
  </div>
  <br>








<div id="how" class="container text-center">
  <div style="margin-bottom:30px;"></div>
  <hr>
  <h3><u>HOW IT WORKS</u></h3>
  <div class="jumbotron text-left">
    Call and win is call-in quiz platform designed to test your knowledge. We believe in using reward system to encourage people to accumulate knowledge and information about the world around them. When there is a prize to win, people are mortivated to context.
    <br>
    <br>
    You are to answer five objective questions in any of the categories - General knowledge and Sports. You play by dialing the provided telephone numbers, listen to the question, and you have five seconds to answer each question by selecting option 1 to 4 with your mobile dial pad, corresponding to your choice.
    <br>
    <br>
    Each question carries 1 point, and the five questions give a total of 5 points if answered correctly.
    <br>
    <br>
    The weekly or monthly accumulated scores of each player is calculated to get the top 3 scorers in each category. This means you need to play as many times as possible to get high points.
    <br>
    <br>
    We display the top 3 scorers on the website to give players the points to beat!. Also, you can check your score at any time to know where you stand in each category.
    <br>
    <br>
    <div style="text-align:center; font-size:20px;">The prizes are fantastic!</div>
  </div>
</div>

<div class="container text-center">
  <hr>
  <h3><u>WINNERS ARCADE</u></h3>
  <br>
  <div class="row slide one-time">
    <?php echo $winnersDisplay; ?>
  </div>
  <hr>
</div><br>
<div class="container text-center">
  <h3><u>WINNERS SCOREBOARD</u></h3>
<div class="col-sm-10 col-sm-offset-1 center">
    <div class="col-sm-6">

      <div class="panel panel-default optionals">
        <div class="panel-heading opt-heading" style="font-size:14px; height:50px;"><b><u>Science Last Week Winners</u></b></div>
        <div class="panel-body pbody gklmwinner" style="font-size:12px; height:70px;"></div>
      </div>
    </div>
      <div class="col-sm-6">
      <div class="panel panel-default optionals">
        <div class="panel-heading opt-heading" style="font-size:14px; height:50px;"><b><u>Art Last Week Winners</u></b></div>
        <div class="panel-body pbody slmwinner" style="font-size:12px; height:70px;"></div>
      </div>
    </div>

    <div class="col-sm-6">
      <div class="panel panel-default optionals">
        <div class="panel-heading opt-heading" style="font-size:14px; height:50px;"><b><u>General Knowledge Last Week Winners</u></b></div>
        <div class="panel-body pbody gklwwinner" style="font-size:12px; height:70px;"></div>
      </div>
    </div>
    <div class="col-sm-6">
      <div class="panel panel-default optionals">
        <div class="panel-heading opt-heading" style="font-size:14px; height:50px;"><b><u>Sports Last Week Winners</u></b></div>
        <div class="panel-body pbody slwwinner" style="font-size:12px; height:70px;"></div>
      </div>
    </div>
    <div class="col-sm-6">
      <div class="panel panel-default optionals">
        <div class="panel-heading opt-heading" style="font-size:14px; height:50px;"><b><u>Last Week Star Winners</u></b></div>
        <div class="panel-body pbody slwwinner" style="font-size:12px; height:70px;"></div>
      </div>
    </div>
    <div class="col-sm-6">
      <div class="panel panel-default optionals">
        <div class="panel-heading opt-heading" style="font-size:14px; height:50px;"><b><u>Last Month Star Winners</u></b></div>
        <div class="panel-body pbody slwwinner" style="font-size:12px; height:70px;"></div>
      </div>
    </div>
</div>
</div>

<footer style="background-color:black; color:white;" class="container-fluid text-center">
  <p>Copyright &copy<?php echo date("Y"); ?> - CallnWin</p>
  <p>Powered by CallNect International Limited</p>
</footer>
<link rel="stylesheet" href="style/user.css">
<script src="js/user.js"></script>
</body>
</html>
