<?php
include_once("php_includes/check_login_status.php");

// If user is already logged in, header that weenis away
if($user_ok == true){
    header("location: admin.php?u=".$_SESSION["username"]);
    exit();
}
?><?php
// AJAX CALLS THIS LOGIN CODE TO EXECUTE
if(isset($_POST["e"])){
    // CONNECT TO THE DATABASE
    // GATHER THE POSTED DATA INTO LOCAL VARIABLES AND SANITIZE
    $e = $_POST['e'];
    $p = $_POST['p'];
    // GET USER IP ADDRESS
    $ip = preg_replace('#[^0-9.]#', '', getenv('REMOTE_ADDR'));
    // FORM DATA ERROR HANDLING
    if($e == "" || $p == ""){
        echo "login_failed";
        exit();
    } else {
    // END FORM DATA ERROR HANDLING
    //include("php_includes/mysqli_connect.php");
    $sql = "SELECT id, username, password, email FROM adminlogin WHERE email=:email AND activated=:activated LIMIT 1";
            $stmt = $db_connect->prepare($sql);
            $stmt->bindParam(':email', $e, PDO::PARAM_STR);
            $stmt->bindValue(':activated', '1', PDO::PARAM_STR);
            $stmt->execute();

            //foreach($stmt->fetchAll() as $row) {
            foreach($stmt->fetchAll(PDO::FETCH_ASSOC) as $row) {
                 $db_id = $row['id'];
                 $db_username = $row['username'];
                 $db_pass_str = $row['password'];
                 $db_email = $row['email'];
            }
        if(!password_verify($p, $db_pass_str)){
            echo "invalid";
            exit();
        } else {
            // CREATE THEIR SESSIONS AND COOKIES
            $_SESSION['userid'] = $db_id;
            $_SESSION['username'] = $db_username;
            $_SESSION['email'] = $db_email;
            $_SESSION['password'] = $db_pass_str;
            setcookie("id", $db_id, strtotime( '+1 day' ), "/", "", "", TRUE);
            setcookie("user", $db_username, strtotime( '+1 day' ), "/", "", "", TRUE);
            setcookie("mail", $db_email, strtotime( '+1 day' ), "/", "", "", TRUE);
            setcookie("pass", $db_pass_str, strtotime( '+1 day' ), "/", "", "", TRUE);

            // UPDATE THEIR "IP" AND "LASTLOGIN" FIELDS
            //include("php_includes/mysqli_connect.php");
            $sql = "UPDATE adminlogin SET ip=:ip, lastlogin=now() WHERE email=:email LIMIT 1";
            $stmt = $db_connect->prepare($sql);
            $stmt->bindParam(':email', $db_email, PDO::PARAM_STR);
            $stmt->bindParam(':ip', $ip, PDO::PARAM_STR);
            $stmt->execute();
            // Get the last visit and update date_visit table
            $sql = "SELECT latest_visit FROM date_visit WHERE username=:username LIMIT 1";
            $stmt = $db_connect->prepare($sql);
            $stmt->bindParam(':username', $db_username, PDO::PARAM_STR);
            $stmt->execute();
            foreach($stmt->fetchAll(PDO::FETCH_ASSOC) as $row) {
              $last_visit = $row['latest_visit'];
            }
            // Update the info in date_visit table
            $sql = "UPDATE date_visit SET last_visited='$last_visit', latest_visit=now() WHERE username=:username LIMIT 1";
            $stmt = $db_connect->prepare($sql);
            $stmt->bindParam(':username', $db_username, PDO::PARAM_STR);
            $stmt->execute();

            echo $db_username;
            exit();
        }
    }
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Admin</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</head>
<body>
  <?php include_once('pageTopTemplate.php'); ?>
  <br>
  <br>
  <br>
  <br>

<!-- Modal for login-->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header" style="padding:35px 50px;">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4><span class="glyphicon glyphicon-lock"></span> Login</h4>
        </div>
        <div class="modal-body" style="padding:40px 50px;">
          <form role="form">
            <div class="form-group">
              <label for="usrname"><span class="glyphicon glyphicon-envelope"></span> Email</label>
              <input type="text" class="form-control" id="usrname" placeholder="Enter email">
            </div>
            <div class="form-group">
              <label for="psw"><span class="glyphicon glyphicon-eye-open"></span> Password</label>
              <input type="password" class="form-control" id="psw" placeholder="Enter password">
            </div>
              <button type="button" id="logbtn" onclick="login();" class="btn btn-success btn-block"><span class="glyphicon glyphicon-off"></span> Login</button>
              <p id="loginstatus" style="text-align:center;"></p>
          </form>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-danger btn-default pull-left" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancel</button>
        </div>
      </div>

    </div>
  </div>
<!-- Ends here -->

<!-- Modal for signup -->
<div class="modal fade" id="regModal" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header" style="padding:35px 50px;">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4><span class="glyphicon glyphicon-lock"></span> Register</h4>
      </div>
      <div class="modal-body" style="padding:40px 50px;">
        <form role="form">
          <div class="form-group">
            <label for="usrname"><span class="glyphicon glyphicon-envelope"></span> Email</label>
            <input type="text" class="form-control" id="signupusrname" placeholder="Enter email">
          </div>
          <div class="form-group">
            <label for="psw"><span class="glyphicon glyphicon-eye-open"></span> Password</label>
            <input type="password" class="form-control" id="signuppsw" placeholder="Enter password">
          </div>
          <div class="form-group">
            <label for="psw"><span class="glyphicon glyphicon-eye-open"></span> Repeat Password</label>
            <input type="password" class="form-control" id="signuppsw1" placeholder="Enter password">
          </div>
            <button type="button" id="signupbtn" onclick="signup();" class="btn btn-success btn-block"><span class="glyphicon glyphicon-off"></span> Register</button>
            <p id="regstatus" style="text-align:center;"></p>
        </form>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-danger btn-default pull-left" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancel</button>
      </div>
    </div>

  </div>
</div>
<!--Registration modal ends here -->
<div class="container text-center" style="margin-top:80px;">
    <div class="col-sm-8 col-sm-offset-2">
      <div class="panel panel-default optionals">
        <div class="panel-heading opt-heading"><h3>Login or Register</h3></div>
        <div class="panel-body pbody" style="height:220px;">
          <div style="margin-top:60px;">
            <button type="button" class="btn btn-success btn-lg" id="loginbtn">Login</button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <button type="button" class="btn btn-success btn-lg" id="regbtn">Register</button>
          </div>
        </div>
      </div>
    </div>
</div>
<footer style="background-color:black; color:white;" class="container-fluid text-center">
  <p>Copyright &copy<?php echo date("Y"); ?> - CallnWin</p>
  <p>Powered by CallNect International Limited.</p>
</footer>
<link rel="stylesheet" href="style/admin.css">
<script src="js/admin.js"></script>
</body>
</html>
