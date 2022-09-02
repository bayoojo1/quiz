<?php
// If user is logged in, header them away
if(isset($_SESSION["email"])){
    header("location: message.php?msg=NO to that weenis");
    exit();
}
?><?php
// Ajax calls this REGISTRATION code to execute
if(isset($_POST["e"])){
    // CONNECT TO THE DATABASE
    include_once("php_includes/mysqli_connect.php");
    // GATHER THE POSTED DATA INTO LOCAL VARIABLES
    $e = $_POST['e'];
    $parts = explode("@", $e);
    $u = $parts[0]; // Username
    $p = $_POST['p']; // Password
    // GET USER IP ADDRESS
    $ip = preg_replace('#[^0-9.]#', '', getenv('REMOTE_ADDR'));
    // DUPLICATE DATA CHECKS FOR EMAIL
    $sql = "SELECT id FROM adminlogin WHERE email=:email LIMIT 1";
    $stmt = $db_connect->prepare($sql);
    $stmt->bindParam(':email', $e, PDO::PARAM_STR);
    $stmt->execute();
    $e_check = $stmt->rowCount();
    // DATA CHECK FOR USERNAME
    $sql = "SELECT id FROM adminlogin WHERE username=:username LIMIT 1";
    $stmt = $db_connect->prepare($sql);
    $stmt->bindParam(':username', $u, PDO::PARAM_STR);
    $stmt->execute();
    $u_check = $stmt->rowCount();

    // FORM DATA ERROR HANDLING
     if($e == "" || $p == ""){
        echo '<strong style="color:red;">The form submission is missing values.</strong>';
        exit();
    } else if ($e_check > 0){
        echo '<strong style="color:red;">That email address: ' .$e.' is already in use in the system</strong>';
        exit();
    } else if ($u_check > 0){
        echo '<strong style="color:red;">This username: ' .$u.' is already in use in the system. Please use another email with a different username part.</strong>';
        exit();
    } else if (strlen($e) < 3 || strlen($e) > 40) {
        echo '<strong style="color:red;">Email can only be 3 to 40 characters please</strong>';
        exit();
    } else if (is_numeric($e[0])) {
        echo '<strong style="color:red;">Email must begin with a letter</strong>';
        exit();
      } else {
    // END FORM DATA ERROR HANDLING
        // Begin Insertion of data into the database
        // Hash the password and apply your own mysterious unique salt
        // $cryptpass = crypt($p);
        // include_once ("php_includes/randStrGen.php");
        $p_hash = password_hash($p, PASSWORD_DEFAULT);
        // Generate some md5 from string
        $callnect = "CallNect";
        $somestr = "0987654321";
        $secret = "You cannot hack this! So stop it. $u";
        $string = trim("$u"."$e"."$callnect"."$somestr");
        $str1 = md5 ($string);
        $str2 = md5 ($secret);
        $hash = "$str1"."$str2";

        // Add user info into the database table for the main site table
        $stmt = $db_connect->prepare("INSERT INTO adminlogin (username, email, password, hash, signup, lastlogin)
        VALUES(:username, :email, :password, :hash, now(), now())");
        $stmt->execute(array(':username' => $u, ':email' => $e, ':password' => $p_hash, ':hash' => $hash));

        // Insert the user info into date_visit table
        $stmt = $db_connect->prepare("INSERT INTO date_visit (username, latest_visit) VALUES (:username, now())");
        if($stmt->execute(array(':username' => $u))) {
          echo 'signup_success';
        }
      }
}
?>
