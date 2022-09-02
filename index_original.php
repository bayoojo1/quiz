<?php
include("admin/php_includes/mysqli_connect.php");
// Select the sponsors banners from the db
$sponsorsAds = '';
$sql = "SELECT sponsorsimg, description FROM sponsors ORDER BY RAND()";
$stmt = $db_connect->prepare($sql);
$stmt->execute();
$numrows = $stmt->rowCount();
if($numrows > 0) {

  foreach($stmt->fetchAll(PDO::FETCH_ASSOC) as $row) {
  $sponsorsImg = $row['sponsorsimg'];
  $sponsorsdesc = $row['description'];
  $sponsorsAds .= '<div>';
    $sponsorsAds .= '<img src="'.$sponsorsImg.'" class="img-responsive" alt="Image" style="width:100%">';
    $sponsorsAds .= '<p style="color:white;">'.$sponsorsdesc.'</p>';
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
  $prizesDisplay .= '<div class="col-sm-2">';
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
  $winnersDisplay .= '<div class="col-sm-2">';
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
  <div class="col-sm-8">
    <div id="myCarousel" class="carousel slide" data-ride="carousel">
      <!-- Indicators -->
      <ol class="carousel-indicators">
        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
        <li data-target="#myCarousel" data-slide-to="1"></li>
        <li data-target="#myCarousel" data-slide-to="2"></li>
        <li data-target="#myCarousel" data-slide-to="3"></li>
        <li data-target="#myCarousel" data-slide-to="4"></li>
      </ol>

      <!-- Wrapper for slides -->
      <div class="carousel-inner" role="listbox">
        <div class="item active">
          <img src="images/banner1.jpg" style="height:550px; width:800px;" alt="Image" class="img-responsive">
          <div class="carousel-caption">
            <h3 style="color:black;">Welcome to Answer Five</h3>
            <p>Test your knowledge and win fantastic prizes!</p>
          </div>
        </div>
        <div class="item">
          <img src="images/banner2.jpg" style="height:550px; width:800px;" alt="Image" class="img-responsive">
          <div class="carousel-caption">
            <h3 style="color:black;">How to play?</h3>
            <p>Call and answer the questions with your mobile keypad.</p>
          </div>
        </div>
        <div class="item">
          <img src="images/3seconds.gif" style="height:550px; width:800px;" alt="Image" class="img-responsive">
          <div class="carousel-caption">
            <h3 style="color:black;">3 Seconds!</h3>
            <p>You have 3 seconds to answer each question.</p>
          </div>
        </div>
        <div class="item">
          <img src="images/banner5.gif" style="height:550px; width:800px;" alt="Image" class="img-responsive">
          <div class="carousel-caption">
            <h3 style="color:black;">Your winning chance</h3>
            <p>The more you call and answer questions correctly, the more your winning chance.</p>
          </div>
        </div>
        <div class="item">
          <img src="images/banner4.jpg" style="height:550px; width:800px;" alt="Image" class="img-responsive">
          <div class="carousel-caption">
            <h3 style="color:black;">Winners</h3>
            <p>Top 5 winners in each category go home with fantastic prizes at the end of each round.</p>
          </div>
        </div>
      </div>

      <!-- Left and right controls -->
      <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
    </div>
  </div>
  <div class="col-sm-4" style="text-align:center;">
    <div class="panel panel-default optionals">
      <div class="panel-heading opt-heading" style="font-size:14px; height:50px;"><b><u>Top 3 Scores</u></b><br>General Knowledge Monthly Category</div>
      <div class="panel-body pbody topScorers" style="font-size:12px; height:70px;"></div>
    </div>
    <div class="panel panel-default optionals">
      <div class="panel-heading opt-heading" style="font-size:14px; height:50px;"><b><u>Top 3 Scores</u></b><br>Sports Monthly Category</div>
      <div class="panel-body pbody sportMonthlyTopScorers" style="font-size:12px; height:70px;"></div>
    </div>
    <div class="panel panel-default optionals">
      <div class="panel-heading opt-heading" style="font-size:14px; height:50px;"><b><u>Top 3 Scores</u></b><br>General Knowledge Weekly Category</div>
      <div class="panel-body pbody generalWeeklyTopScorers" style="font-size:12px; height:70px;"></div>
    </div>
    <div class="panel panel-default optionals">
      <div class="panel-heading opt-heading" style="font-size:14px; height:50px;"><b><u>Top 3 Scores</u></b><br>Sports Weekly Category</div>
      <div class="panel-body pbody sportWeeklyTopScorers" style="font-size:12px; height:70px;"></div>
    </div>
  </div>
</div>
<hr>
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
  <div class="row">
    <div class="col-sm-6">
      <div class="panel panel-default optionals">
        <div class="panel-heading opt-heading"><b>General knowledge</b></div>
        <div class="panel-body pbody" style="height:250px;">
          The questions in this category would test your knowledge of Nigeria current affair and
          history, world current affair and history. You would have to answer 5 objective questions
          on each call. You can call as many times as possible to increase your winning chances.<br>
          <hr>
          <div class="well" style="font-family:cursive;">
          To play the weekly general knowledge quiz game, dial: <b>014400058</b><br>
          To play the monthly general knowledge quiz game, dial: <b>014400067</b>
          </div>
        </div>
        <div class="panel-footer"><span style="display:block; margin-bottom: 10px;">Check your scores</span>
            <div>
              <input type="text" name="weeklyscore" id="weeklyscore" placeholder="Enter your mobile number..">
              <button type="button" class="btn btn-primary btn-xs" id="weeklyscorebtn">Weekly score</button>
              <div id="weeklyResult"></div>
            </div>
            <br><br>
            <div>
              <input type="text" name="monthlyscore" id="monthlyscore" placeholder="Enter your mobile number..">
              <button type="button" class="btn btn-primary btn-xs" id="monthlyscorebtn">Monthly score</button>
              <div id="monthlyResult"></div>
            </div><br>
        </div>
      </div>
    </div>
    <div class="col-sm-6">
      <div class="panel panel-default optionals">
        <div class="panel-heading opt-heading"><b>Sports</b></div>
        <div class="panel-body pbody" style="height:250px;">
          The questions in this category would test your knowledge on sports. You would have to answer 5 objective questions on each call. You can call as many times as possible to increase your winning chances.<br>
          <hr>
          <div class="well" style="font-family:cursive;">
          To play the weekly sports quiz game, dial: <b>014400058</b><br>
          To play the monthly sports quiz game, dial: <b>014400067</b>
          </div>
        </div>
        <div class="panel-footer"><span style="display:block; margin-bottom: 10px;">Check your scores</span>
            <div>
              <input type="text" name="weeklySportscore" id="weeklySportscore" placeholder="Enter your mobile number..">
              <button type="button" class="btn btn-primary btn-xs" id="weeklySportscorebtn">Weekly score</button>
              <div id="weeklySportResult"></div>
            </div>
            <br><br>
            <div>
              <input type="text" name="monthlySportscore" id="monthlySportscore" placeholder="Enter your mobile number..">
              <button type="button" class="btn btn-primary btn-xs" id="monthlySportscorebtn">Monthly score</button>
              <div id="monthlySportResult"></div>
            </div><br>
        </div>
      </div>
    </div>
  </div>
</div>
<div id="how" class="container text-center">
  <div style="margin-bottom:30px;"></div>
  <hr>
  <h3><u>HOW IT WORKS</u></h3>
  <div class="jumbotron text-left">
    Call and win is call-in quiz platform designed to test your knowledge. We believe in using reward system to encourage people to accumulate knowledge and information about the world around them. When there is a prize to win, people are mortivated to context.
    <br>
    <br>
    You are to answer five objective questions in any of the categories - General knowledge and Sports. You play by dialing the provided telephone numbers, listen to the question, and you have five seconds to answer each question by selecting option 1 to 4, corresponding to your choice on your mobile dial pad.
    <br>
    <br>
    The system captures the mobile number used to make the call, and also the options you've selected. Each question carries 1 point, and the five questions give a total of 5 points if answered correctly.
    <br>
    <br>
    The weekly or monthly accumulated scores of each player is calculated to get the top 5 scorers in each category. This means you need to play as many times as possible to get high points.
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
<div class="col-sm-8 col-sm-offset-2">
    <div class="col-sm-6">
      <h3><u>LAST MONTH WINNERS</u></h3>
      <div class="panel panel-default optionals">
        <div class="panel-heading opt-heading" style="font-size:14px; height:50px;"><b><u>General Knowledge Last Month Winners</u></b></div>
        <div class="panel-body pbody gklmwinner" style="font-size:12px; height:70px;"></div>
      </div>
      <div class="panel panel-default optionals">
        <div class="panel-heading opt-heading" style="font-size:14px; height:50px;"><b><u>Sports Last Month Winners</u></b></div>
        <div class="panel-body pbody slmwinner" style="font-size:12px; height:70px;"></div>
      </div>
    </div>
    <div class="col-sm-6">
      <h3><u>LAST WEEK WINNERS</u></h3>
      <div class="panel panel-default optionals">
        <div class="panel-heading opt-heading" style="font-size:14px; height:50px;"><b><u>General Knowledge Last Week Winners</u></b></div>
        <div class="panel-body pbody gklwwinner" style="font-size:12px; height:70px;"></div>
      </div>
      <div class="panel panel-default optionals">
        <div class="panel-heading opt-heading" style="font-size:14px; height:50px;"><b><u>Sports Last Week Winners</u></b></div>
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
