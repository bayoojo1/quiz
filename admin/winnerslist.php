 <!DOCTYPE html>
<html lang="en">
<head>
  <title>Winners Management</title>
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
    <h3>Winner List</h3>
  </div>
  <div class="container text-center" style="margin-top:50px;">
    <div class="col-sm-8 col-sm-offset-2">
        <div class="col-sm-6">
          <h3><u>LAST MONTH WINNERS</u></h3>
          <div class="panel panel-default optionals">
            <div class="panel-heading opt-heading" style="font-size:14px; height:50px;"><b><u>General Knowledge Last Month Winners</u></b></div>
            <div class="panel-body pbody admgklmwinner" style="font-size:12px; height:70px;"></div>
          </div>
          <div class="panel panel-default optionals">
            <div class="panel-heading opt-heading" style="font-size:14px; height:50px;"><b><u>Sports Last Month Winners</u></b></div>
            <div class="panel-body pbody admslmwinner" style="font-size:12px; height:70px;"></div>
          </div>
        </div>
        <div class="col-sm-6">
          <h3><u>LAST WEEK WINNERS</u></h3>
          <div class="panel panel-default optionals">
            <div class="panel-heading opt-heading" style="font-size:14px; height:50px;"><b><u>General Knowledge Last Week Winners</u></b></div>
            <div class="panel-body pbody admgklwwinner" style="font-size:12px; height:70px;"></div>
          </div>
          <div class="panel panel-default optionals">
            <div class="panel-heading opt-heading" style="font-size:14px; height:50px;"><b><u>Sports Last Week Winners</u></b></div>
            <div class="panel-body pbody admslwwinner" style="font-size:12px; height:70px;"></div>
          </div>
        </div>
    </div>
  </div>
<footer style="background-color:black; color:white; position:fixed; width:100%;" class="container-fluid text-center">
  <p>Copyright &copy<?php echo date("Y"); ?> - CallnWin</p>
  <p>Powered by CallNect International Limited.</p>
</footer>
<link rel="stylesheet" href="style/admin.css">
<script src="js/admin-navbar.js"></script>
<script src="js/admwinnersview.js"></script>
</body>
