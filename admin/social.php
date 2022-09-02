<!DOCTYPE html>
<html lang="en">
<head>
  <title>Quiz Management</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</head>
<body>
  <?php include_once("pageTopTemplate.php"); ?>
  <br />
  <br />
  <br />
  <br />
  <div class="well text-center" style="margin-top:-30px;">
    <h3>Quiz Management</h3>
  </div>
  <div class="container text-center" style="margin-top:50px;">
      <div class="col-sm-8 col-sm-offset-2">
        <div class="panel panel-default optionals">
          <div class="panel-heading opt-heading"><h3>Arts(Social)</h3></div>
          <div class="panel-body pbody" style="height:200px; margin-top:60px;">
            <form id="uploadsocialqtn">
              <div style="margin-left:240px;"><input type="file" name="socialaudio" id="socialaudio" required></div><br>
              <input type="text" name="socialanswer" id="socialanswer" placeholder="Enter answer" required>
              <button type="button" class="btn btn-success btn-xs" id="uploadsocialbtn" style="background-color:black; color:white;">Upload</button>
            </form>
              <div id="uploadsocialstatus"></div>
          </div>
          <div class="panel-footer pfooter" style="background-color:black;">
            <a style="color:white;" href="socialquestion.php?u=<?php echo $log_username ?>">Check Arts questions</a>
          </div>
        </div>
        <div style="height:50px;"></div>
      </div>
  </div>
<footer style="background-color:black; color:white; position:fixed; width:100%;" class="container-fluid text-center">
  <p>Copyright &copy<?php echo date("Y"); ?> - AnswerFive</p>
  <p>Powered by CallNect International Limited.</p>
</footer>
<link rel="stylesheet" href="style/admin.css">
<script src="js/admin-navbar.js"></script>
<script src="js/audioupload.js"></script>
</body>
