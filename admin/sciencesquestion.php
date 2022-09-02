<!DOCTYPE html>
<html lang="en">
<head>
  <title>Science Questions Management</title>
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

    <?php include("functions/science_questions_display.php") ?>

<footer style="background-color:black; color:white;" class="container-fluid text-center">
  <p>Copyright &copy<?php echo date("Y"); ?> - AnswerFive</p>
  <p>Powered by CallNect International Limited.</p>
</footer>

<link rel="stylesheet" href="style/admin.css">
<script src="js/questionedit.js"></script>
</body>
