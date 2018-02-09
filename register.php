<?php 
 
 require 'config/connect.php';


 if(isset($_POST) && !empty($_POST)){
    $username = mysqli_real_escape_string($connection,$_POST['username']);
    $verification_key = md5($username);
    $email = mysqli_real_escape_string($connection,$_POST['email']);
    $password = md5(mysqli_real_escape_string($connection, $_POST['password']));
    $passwordagain = md5(mysqli_real_escape_string($connection,$_POST['passwordagain']));
 
    if($password == $passwordagain){
      $fmsg = '';
      $usersql = "SELECT * FROM `users` WHERE username = '$username'";
      $userres = mysqli_query($connection,$usersql) or die(mysqli_error($connection));
      $usercount = mysqli_num_rows($userres);

        if($usercount == 1){
          $fmsg .= "Username exists in database. Please try different username</br></br>";
        }

      $emailsql = "SELECT * FROM `users` WHERE email = '$email'";  
      $emailres = mysqli_query($connection,$emailsql) or die(mysqli_error($connection));
      $emailcount = mysqli_num_rows($emailres);
        if($emailcount == 1){
          $fmsg .= "Email exists in database. Please try different email";
          exit();
        }


    
      $query = "INSERT IGNORE INTO `users` (username, email, password, verification_key,role, join_date) VALUES ('$username', '$email', '$password','$verification_key','new', now())";
            $result = mysqli_query($connection,$query) or die(mysqli_error($connection));
      
              if($result){
                $fmsg .= "User Created Successfully.";
                $id = mysqli_insert_id($connection);

          require 'config/gmailcredentials.php';
          require 'PHPMailer/class.phpmailer.php';
          require 'PHPMailer/class.smtp.php'; 
          require 'PHPMailer/PHPMailerAutoload.php';
          //require 'PHPMailer/src/Exception.php';
          // require 'PHPMailer/src/PHPMailer.php';
          // require 'PHPMailer/src/SMTP.php';
          

          $mail = new PHPMailer();                              // Passing `true` enables ex
          try {
              //Server settings
              $mail->SMTPDebug = 2;                                 // Enable verbose debug output
              $mail->isSMTP();                                      // Set mailer to use SMTP
              $mail->Host = $host;  // Specify main and backup SMTP servers
              $mail->SMTPAuth = true;                               // Enable SMTP authentication
              $mail->Username = $username;                 // SMTP username
              $mail->Password = $pass;                           // SMTP password
              $mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
              $mail->Port = 465;                                    // TCP port to connect to

              //Recipients
              $mail->setFrom('mechaniclady2017@gmail.com', 'mechanic_lay');
              $mail->addAddress($email, $username);     // Add a recipient
          

              //Content
              $mail->isHTML(true);                                  // Set email format to HTML
              $mail->Subject = 'Verify your email';
              $mail->Body    = "http://localhost/apps/verify.php?key=$verification_key&id=$id";
              $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

              $mail->send();
              echo 'Message has been sent';
          } catch (Exception $e) {
              echo 'Message could not be sent.';
              echo 'Mailer Error: ' . $mail->ErrorInfo;
          }


        }else {

          $fmsg .= "Registration failed";
        }  






    }else {

      $fmsg = "Password not matched";

    }


 }


 



 ?>



<!DOCTYPE html>
<html>
<head>
  <title>Register</title>
  <!-- Latest compiled and minified CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" >

  <!-- Optional theme -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" >
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" >

 
  
  <link rel="stylesheet" href="css/login.css" >
  <!-- Latest compiled and minified JavaScript -->
  
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
              <label for="email" class="cols-sm-2 control-label">Username</label>
              <div class="cols-sm-10">
                <span class="" id="usernameLoading"><img src="loading.gif" alt="Ajax Indicator" /></span><span id="usernameResult"></span>
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
                  <input type="text" class="form-control" name="username" id="username"  placeholder="Enter your Username" required="" value="<?php 
                  if(isset($username) & !empty($username)){echo $username;}  ?>" />
                </div>
                
              </div>
            </div>
            
            <div class="form-group">
              <label for="email" class="cols-sm-2 control-label">Email</label>
              <div class="cols-sm-10">
              <span class="" id="emailLoading"><img src="loading.gif" alt="Ajax Indicator" /></span><span id="emailResult"></span>
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-envelope fa" aria-hidden="true"></i></span>
                  <input type="email" class="form-control" name="email" id="email"  placeholder="Enter your Email" required="" value="<?php 
                  if(isset($email) & !empty($email)){echo $email;}  ?>"/>
                </div>
              </div>
            </div>

            <div class="form-group">
              <label for="password" class="cols-sm-2 control-label">Password</label>
              <div class="cols-sm-10">
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-lock fa-lg" aria-hidden="true"></i></span>
                  <input type="password" class="form-control" name="password" id="password"  placeholder="Enter your Password" required="" />
                </div>
              </div>
            </div>

            <div class="form-group">
              <label for="password" class="cols-sm-2 control-label">Repeat Password</label>
              <div class="cols-sm-10">
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-lock fa-lg" aria-hidden="true"></i></span>
                  <input type="password" class="form-control" name="passwordagain" id="password"  placeholder="Repeat your Password" required="" />
                </div>
              </div>
            </div>
            

            <div class="form-group ">
              <button type="submit" class="btn btn-primary btn-lg btn-block login-button">Register</button>
            </div>
          </form>
        </div>
      </div>
    </div>




     <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
     <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" ></script>
      <script type="text/javascript">
          $(document).ready(function() {
            $('#usernameLoading').hide();
            $('#username').keyup(function(){
              $('#usernameLoading').show();
                  $.post("checkuser.php", {
                    username: $('#username').val()
                  }, function(response){
                    $('#usernameResult').fadeOut();
                    setTimeout("finishAjaxuser('usernameResult', '"+escape(response)+"')", 400);
                  });
                  return false;
            });

            $('#emailLoading').hide();
            $('#email').keyup(function(){
              $('#emailLoading').show();
                  $.post("checkemail.php", {
                    email: $('#email').val()
                  }, function(response){
                    $('#emailResult').fadeOut();
                    setTimeout("finishAjaxemail('emailResult', '"+escape(response)+"')", 400);
                  });
                  return false;
            });
            

          });

 
          function finishAjaxuser(id, response) {
            $('#usernameLoading').hide();
            $('#'+id).html(unescape(response));
            $('#'+id).fadeIn();
          }

          function finishAjaxemail(id, response) {
            $('#emailLoading').hide();
            $('#'+id).html(unescape(response));
            $('#'+id).fadeIn();
          }

          

      </script>     
</body>
</html>