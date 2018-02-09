<?php 
 session_start(); 
 require('config/connect.php'); 
 require 'function.php';
 

 if(isset($_POST) && !empty($_POST)){
    $email = mysqli_real_escape_string($connection, $_POST['email']);
    $password = md5(mysqli_real_escape_string($connection, $_POST['password']));

    $sql = "SELECT * FROM `users` WHERE email='$email' AND password='$password' AND active=1";
    $res = mysqli_query($connection,$sql) or die(mysqli_error($connection));
    $count = mysqli_num_rows($res);
    $q = mysqli_fetch_assoc($res);

    if($q) {
      $_SESSION["email"] = $q["email"];
      
      if(!empty($_POST["remember"])) {
        setcookie ("email",$_POST["email"],time()+ (10 * 365 * 24 * 60 * 60));
        setcookie ("password",$_POST["password"],time()+ (10 * 365 * 24 * 60 * 60));
      } else {
        if(isset($_COOKIE["email"])) {
          setcookie ("email","");
        }
        if(isset($_COOKIE["password"])) {
          setcookie ("password","");
        }
      }

    }  



     
      if($count == 1 && $q['role'] == 'writer' OR $q['role'] == 'vip' OR $q['role'] == 'webmaster' OR $q['role'] == 'admin'){
        $_SESSION['email'] = $email;
        $ipupdate = "UPDATE `users` SET ip ='".getUserIpAddr()."' WHERE email='$email' AND password='$password' AND active=1";
        $resip = mysqli_query($connection,$ipupdate) or die(mysqli_error($connection));


        redirect_to('index.php');

      }else if($count == 1 && $q['role'] == 'banned'){
          $fmsg ="Sorry ". $q['username'] ." you are permanently banned to our site.";
      }

      else if($count == 1 && $q['role'] == 'new'){
          $smsg = "Hi VIP ".$q['username']."! Please wait for admin's approval before you can log in to your account. Thank you.";
      }

      else {
         $fmsg = "Invalid Login Credentials.";
       }
 }

?>



<!DOCTYPE html>
<html>
<head>
  <title>Login</title>
  <!-- Latest compiled and minified CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" >

  <!-- Optional theme -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" >
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" >

  <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
  
  <link rel="stylesheet" href="css/login.css" >
  <!-- Latest compiled and minified JavaScript -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" ></script>
</head>
<body class="login">
<div class="container">
      <div class="row main">
        <div class="panel-heading">
                 <div class="panel-title text-center">
                    
                  </div>
              </div> 
        <div class="main-login main-center">
        <?php if(isset($fmsg)){ ?><div class="alert alert-danger" role="alert"> <?php echo $fmsg; ?> </div><?php } ?>
        <?php if(isset($smsg)){ ?><div class="alert alert-success" role="alert"> <?php echo $smsg; ?> </div><?php } ?>
          <form class="form-horizontal" method="post" action="#">

            <div class="form-group">
              <label for="email" class="cols-sm-2 control-label">Your Email</label>
              <div class="cols-sm-10">
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-envelope fa" aria-hidden="true"></i></span>
                  <input type="email" class="form-control" name="email" id="email" value="<?php if(isset($_COOKIE["email"])) { echo $_COOKIE["email"]; } ?>"  placeholder="Enter your Email"/>
                </div>
              </div>
            </div>

            <div class="form-group">
              <label for="password" class="cols-sm-2 control-label">Password</label>
              <div class="cols-sm-10">
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-lock fa-lg" aria-hidden="true"></i></span>
                  <input type="password" class="form-control" name="password" id="password" value="<?php if(isset($_COOKIE["password"])) { echo $_COOKIE["password"]; } ?>" placeholder="Enter your Password"/>
                </div>
              </div>
            </div>

            <div class="form-group ">
              <button type="submit" class="btn btn-primary btn-lg btn-block login-button">Login</button>
            </div>
            <span><a href="forgot-password.php">Forgot Password?</a></span>&nbsp;&nbsp;&nbsp; 
            <span>
                <input type="checkbox" name="remember" id="remember" checked <?php if(isset($_COOKIE["member_login"])) { ?> checked <?php } ?> />
                <label for="remember-me">Remember me</label>
            </span>
          </form>
        </div>
      </div>
    </div>
</body>
</html>